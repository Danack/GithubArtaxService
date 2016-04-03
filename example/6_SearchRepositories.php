<?php

$autoloader = require __DIR__.'/../vendor/autoload.php';


use Amp\Artax\Client as ArtaxClient;
use ArtaxServiceBuilder\ResponseCache\FileResponseCache;
use ArtaxServiceBuilder\ResponseCache\FileCachePath;
use GithubService\SearchHelper;
use GithubService\AuthToken\Oauth2Token;
use GithubService\GithubArtaxService\GithubService;
use GithubExample\RepoToScan;
use GithubService\AuthToken;
use GithubService\Model\Commit;
use GithubService\Model\SearchRepoItem;

use BetterReflection\Reflector\ClassReflector;
use BetterReflection\SourceLocator\Type\AggregateSourceLocator;
use BetterReflection\SourceLocator\Type\SingleFileSourceLocator;
use PhpParser\ParserFactory;


$tokenFileLocation = __DIR__."/../../github_oauth_token.txt";
$existingToken = @file_get_contents($tokenFileLocation);
$existingToken = trim($existingToken);

if (!$existingToken) {
    echo "token not found\n";
    exit(0);
}

echo "Using token from file $tokenFileLocation \n";
$token = new Oauth2Token($existingToken);

$githubClient = new GithubService(
    new ArtaxClient(),
    \Amp\reactor(),
    new FileResponseCache(new FileCachePath(__DIR__."/fileCache")),
    'Danack/GithubArtaxService'
);


$downloadedFiles = [];

if (false) {
    // for debugging
    //$downloadedFiles[] = "./download/phanan_koel_8c862cb9cc43a6715fbd9d9a289ef7e2ac81b523.tar.gz";
}
else {
    $downloadedFiles = downloadFiles($githubClient, $token);
}

analyzeFiles($downloadedFiles);

echo "fin\n";

exit(0);



function removeDirectory($path)
{    
    
    if (is_dir($path) == false) {
        //Directory doesn't exist.
        return;
    }
    $files = new DirectoryIterator($path);
    foreach ($files as $file) {        
        if (!$file->isDot()) {
            if (is_dir($file->getPathname())) {
                removeDirectory($file->getPathname());
            }
            else {
                unlink($file->getPathname());
            }
        }
    }

    rmdir($path);
    return;
}







function parseNodes($nodes, $namespace = null)
{
    $classes = [];
    foreach ($nodes as $node) {
        if ($node instanceof \PhpParser\Node\Stmt\Namespace_) {
            $namespace = implode('\\', $node->name->parts);
            $namespaceClasses = parseNodes($node->stmts, $namespace);
            $classes = array_merge($classes, $namespaceClasses);
        }
        if ($node instanceof \PhpParser\Node\Stmt\Class_) {
            if ($namespace === null) {
                $classes[] = $node->name;
            }
            else {
                $classes[] = $namespace.'\\'.$node->name;
            }
        }
    }
    
    return $classes;
}


function analyzeCodeInPath($srcPath) {

    $objects = new \RecursiveIteratorIterator(
        new \RecursiveDirectoryIterator($srcPath),
        \RecursiveIteratorIterator::SELF_FIRST
    );
    
    $extensions = [
        'php',
        'php5',
        'phtml',
        'inc',
        'module',
        'install'
    ];
    
    $regexString = '#.*\.('.implode('|', $extensions).')#';
    $templateObjects = new \RegexIterator($objects, $regexString);
    
    $sourceFiles = [];
    foreach ($templateObjects as $key => $var) {
        $sourceFiles[] = $var;
    }

    try {
        foreach ($sourceFiles as $sourceFile) {
            $parser = (new ParserFactory)->create(ParserFactory::PREFER_PHP7);
    
            try {
                $code = @file_get_contents($sourceFile);
    
                if ($code === false) {
                    echo "Failed to get contents of $sourceFile \n";
                    continue;
                }
    
                $nodes = $parser->parse($code);
                if ($code === null) {
                    echo "Failed to parse code for file $sourceFile";
                    continue;
                }
    
                $classes = parseNodes($nodes);
    
                $sourceLocator = new SingleFileSourceLocator($sourceFile);
                $reflector = new ClassReflector($sourceLocator);
    
                foreach ($classes as $class) {
                    echo "Attempting to analyze class [$class]\n";
                    $reflClass = $reflector->reflect($class);
    
                    if ($reflClass == null) {
                        echo "Failed to reflect class [$reflClass]";
                        break 2;
                    }
    
                    $properties = $reflClass->getProperties();
                    $methods = $reflClass->getMethods();
    
                    $clashingProperties = [];
    
                    foreach ($properties as $property) {
                        foreach ($methods as $method) {
                            if (strcasecmp($property->getName(), $method->getName()) === 0) {
                                $clashingProperties[] = $property->getName();
                            }
                        }
                    }
    
                    if (count($clashingProperties) == 0) {
                        echo "Class [$class] has no clashing properties\n";
                    }
                    else {
                        echo "Class [$class] has the following clashing properties\n";
                        foreach ($clashingProperties as $clashingProperty) {
                            echo "    $clashingProperty\n";
                        }
                    }
                }
            }
            catch (PhpParser\Error $e) {
                echo "Failed to parse code\n";
            }
        }
    }
    catch (\Throwable $t) {
        echo "Code analysis failed.'\n";
        echo get_class($t)." : ".$t->getMessage()."\n";
        echo $t->getTraceAsString();
    }
}


function printRepo(SearchRepoItem $repo)
{
    printf(
        "Package: %s/%s stars: %d\n",
        $repo->owner->login,
        $repo->name,
        $repo->stargazersCount
    );
}



function downloadFiles($githubClient, $token)
{
    $downloadedFiles = [];
    $repoSearcher = new RepoSearcher($githubClient, $token);
    $repoList = $repoSearcher->findTopRepos(500, 20000);

    foreach ($repoList as $repo) {
        $lastCommit = $repoSearcher->findLastCommit($repo->owner, $repo->name);
        if ($lastCommit === null) {
            printf(
                "Package %s/%s has no commit, cannot scan\n",
                $repo->owner,
                $repo->name
            );
            continue;
        }

        $downloadedFilename = $repoSearcher->downloadPackage($repo->owner, $repo->name, $lastCommit);
        $downloadedFiles[] = $downloadedFilename;
    }
    
    return $downloadedFiles;
}




function analyzeFiles($downloadedFiles)
{
    $count = 0;

    foreach ($downloadedFiles as $downloadedFile) {
        
        try {
            echo "Analyzing $downloadedFile:\n";

            $tmpFilename = "./testExtract/temp$count.tar.gz";
            copy($downloadedFile, $tmpFilename);
            $pharData = new PharData($tmpFilename);
            @unlink("./testExtract/temp$count.tar");
            $pharData->decompress(); // creates files.tar

            $tarFileName = "./testExtract/temp$count.tar";
            $decompPhar = new PharData($tarFileName);
            //$result = @rmdir("./testExtract/blahblah");

            $count++;

            removeDirectory("./testExtract/blahblah");
            @mkdir("./testExtract/blahblah");

            $decompPhar->extractTo("./testExtract/blahblah");

            analyzeCodeInPath("./testExtract/blahblah");

            @unlink($tmpFilename);
            @unlink($tarFileName);

            removeDirectory("./testExtract/blahblah");
        }
        catch (\PharException $pe) {
            echo "Failed to extract files: ".$pe->getMessage()."\n";
        }
    }
}

class RepoSearcher
{
    public $reposToScan = [];
    public $githubClient;
    public $authToken;

    public function __construct(GithubService $githubClient, AuthToken $authToken)
    {
        $this->githubClient = $githubClient;
        $this->authToken = $authToken;
    }

    /**
     * @param $numberReposToFind
     * @param $maxSizeInKB
     * @return \GithubExample\RepoToScan[]
     */
    function findTopRepos($numberReposToFind, $maxSizeInKB)
    {
        $searchDoofer = new SearchHelper();
        $searchDoofer->languages[] = 'php';
        $searchDoofer->sizeMax = $maxSizeInKB;

        $qString = $searchDoofer->createString();
        $reposToScan = [];
        $command = $this->githubClient->searchRepos(
            $this->authToken,
            $qString
        );

        $searchRepoResult = $command->execute();
        $command->setSort('stars');

        foreach ($searchRepoResult->repoList as $repo) {
            printRepo($repo);
            $reposToScan[] = new RepoToScan($repo->owner->login, $repo->name, $repo->url);
        }

        $pages = $searchRepoResult->pager->getAllKnownPages();

        foreach ($pages as $page) {
            echo "Page $page \n";
            $command = $this->githubClient->searchReposPaginate($this->authToken, $page);
            $foo = $command->execute();
            foreach ($foo->repoList as $repo) {
                
                printRepo($repo);
                $reposToScan[] = new RepoToScan($repo->owner->login, $repo->name, $repo->url);
            }
            if (count($reposToScan) > $numberReposToFind) {
                break;
            }
        }
        
        return $reposToScan;
    }

    /**
     * @param $author
     * @param $packageName
     * @return null|\GithubService\Model\Commit
     */
    function findLastCommit($author, $packageName)
    {
        $operation = $this->githubClient->listRepoCommits(
            $this->authToken,
            $author,
            $packageName
        );

        $commitList = $operation->execute();

        foreach ($commitList->commitsChild as $commit) {
            return $commit;
        }
        return null;
    }

    function downloadPackage($author, $packageName, Commit $commit)
    {
        static $count = 0;
        $blobType = 'tar.gz';

        $archiveOperation = $this->githubClient->getArchiveLink(
            $this->authToken,
            $author,
            $packageName,
            $commit->sha
        );

        $cacheDirectory = "./download";

        $archiveFilename = sprintf(
            "%s/%s_%s_%s.%s",
            $cacheDirectory,
            $author,
            $packageName,
            $commit->sha,
            $blobType
        );

        if (file_exists($archiveFilename)) {
            echo "File $archiveFilename already exists, skipping\n";
            return $archiveFilename; //Already exists 
        }
        
        echo "Downloading file $count $archiveFilename\n";
        $count++;

        $filebody = $archiveOperation->execute();
        file_put_contents($archiveFilename, $filebody);

        return $archiveFilename;
    }
}

class Problem
{
    public $package;
    
    public $fqcn;

}


class AnalysisResults
{
    public $classesScanned = 0;
    
    /** @var Problem[]  */
    public $problems = [];
}

