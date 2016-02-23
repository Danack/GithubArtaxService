<?php 

namespace GithubService\Model;

class Matches
{
    /**
     * @var \GithubService\Model\ $matchesChild
     */
    public $matchesChild = [];

    protected function getDataMap() {
        $dataMap = [
            ['matchesChild', '', 'multiple' => true, 'class' => 'GithubService\\Model\\MatchesChild'],
        ];

        return $dataMap;
    }
}
