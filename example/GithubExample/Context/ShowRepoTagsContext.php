<?php


namespace GithubExample\Context;


use GithubService\Model\Tags;

class ShowRepoTagsContext
{
    public $tags;
    
    private function __construct()
    {
    }

    public static function fromTags(Tags $tags)
    {
        $instance = new self();
        $instance->tags = $tags;

        return $instance;
    }
}
