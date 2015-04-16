<?php 

namespace GithubService\Model;

class MatchesChild extends \GithubService\Model\DataMapper {

    /**
     * @var \GithubService\Model\ $indices
     */
    public $indices = array(
        
    );

    public $text = null;

    protected function getDataMap() {
        $dataMap = [
            ['indices', 'indices', 'multiple' => true, 'class' => 'GithubService\\Model\\Indices'],
            ['text', 'text'],
        ];

        return $dataMap;
    }


}
