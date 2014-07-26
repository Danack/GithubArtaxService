<?php

namespace GithubService\Model;


class Contributors {

    use DataMapper;

    /**
     * Author can be null when Github doesn't know who they are
     * @var \GithubService\Model\Person[]
     */
    public $people = [];
    

    static protected $dataMap = array(
        ['people', [], 'class' => 'GithubService\Model\Person', 'multiple' => true],
    );

}