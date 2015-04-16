<?php 

namespace GithubService\Model;

class TextMatches extends \GithubService\Model\DataMapper {

    /**
     * @var \GithubService\Model\ $textMatchesChild
     */
    public $textMatchesChild = array(
        
    );

    protected function getDataMap() {
        $dataMap = [
            ['textMatchesChild', '', 'multiple' => true, 'class' => 'GithubService\\Model\\TextMatchesChild'],
        ];

        return $dataMap;
    }


}
