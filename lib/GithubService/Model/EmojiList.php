<?php

namespace GithubService\Model;

class EmojiList implements \IteratorAggregate
{
    use GithubTrait;
    
    /** @var \GithubService\Model\Emoji[] */
    public $emojis = [];

    public function getIterator()
    {
        return new \ArrayIterator($this->emojis);
    }
}
