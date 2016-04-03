<?php

require_once "1_ListRepositoryTags.php";

use GithubService\AuthToken\NullToken;
// This example follows on from example 1
    
/** @var $github GithubService\GithubArtaxService\GithubService */
/** @var $repoTags GithubService\Model\Tags  */


echo "Following pagination:\n";
// All github services are paged with RFC 5988 https://tools.ietf.org/html/rfc5988
// I don't think this is great for an api. It's fine for web content, where there
// is no clear mapping from input to output, but for a defined api, it seems not great.
if ($repoTags->pager) {
    $pages = $repoTags->pager->getAllKnownPages();
    foreach ($pages as $page) {
        echo "Page: ".$page."\n";
        $command = $github->listRepoTagsPaginate(
            new NullToken(),
            $page
        );
        $nextRepoTags = $command->execute();
        displayTags($nextRepoTags);
    }
}


