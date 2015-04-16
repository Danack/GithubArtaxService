<?php 

namespace GithubService\Model;

class Matches extends \GithubService\Model\DataMapper {

    /**
     * @var \GithubService\Model\ $matchesChild
     */
    public $matchesChild = array(
        
    );

    protected function getDataMap() {
        $dataMap = [
            ['matchesChild', '', 'multiple' => true, 'class' => 'GithubService\\Model\\MatchesChild'],
        ];

        return $dataMap;
    }


}
