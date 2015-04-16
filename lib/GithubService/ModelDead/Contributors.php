<?php

namespace GithubService\Model;


class Contributors extends DataMapper {

    /**
     * Author can be null when Github doesn't know who they are
     * @var \GithubService\Model\Person[]
     */
    public $people = [];

    /**
     * @return mixed
     */
    function getDataMap() {
        $dataMap = array(
            ['people', [], 'class' => 'GithubService\Model\Person', 'multiple' => true],
        );
        
        return $dataMap;
    }
}