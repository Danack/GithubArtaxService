<?php 

namespace GithubService\Model;

class GistList
{
    use GithubTrait;
    use SafeAccess;
    
    public $gists = [];

    protected function getDataMap() {
        $dataMap = [
            ['gists', '', 'multiple' => true, 'class' => 'GithubService\Model\Gist'],
        ];

        return $dataMap;
    }
}
