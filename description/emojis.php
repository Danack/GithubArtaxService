<?php


return array(

    //# Emojis
    'listEmojis' => array(
        "description" => "Lists all the emojis available to use on GitHub.",
        'extends' => 'defaultGetOauthOperation',
        'uri' => '/emojis',
        'responseClass' => 'GithubService\Model\Emojis',
    )
);