<?php 

namespace GithubService\Model;

class ContentCrud
{
    use GithubTrait;
    use SafeAccess;
    
    /**
     * @var \GithubService\Model\ $commit
     */
    public $commit = null;

    /**
     * @var \GithubService\Model\ $content
     */
    public $content = null;

    protected function getDataMap() {
        $dataMap = [
            ['commit', 'commit', 'class' => 'GithubService\\Model\\Commit'],
            ['content', 'content', 'class' => 'GithubService\\Model\\Content'],
        ];

        return $dataMap;
    }
}
