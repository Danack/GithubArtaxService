<?php

namespace GithubService\Model;


class Emails {

    use DataMapper;

    /** @var  \GithubService\Model\Email[] */
    public $emails;

    static protected $dataMap = array(
        ['emails', [], 'class' => 'GithubService\Model\Email', 'multiple' => true],
    );
}
