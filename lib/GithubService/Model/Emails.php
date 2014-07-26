<?php

namespace GithubService\Model;

use ArtaxServiceBuilder\Operation;
use Artax\Response;

class Emails {

    use DataMapper;

    /** @var  \GithubService\Model\Email[] */
    public $emails;

    static protected $dataMap = array(
        ['emails', [], 'class' => 'GithubService\Model\Email', 'multiple' => true],
    );
}
