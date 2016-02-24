<?php

namespace GithubService\Model;

class EmojiList implements \IteratorAggregate
{
    use GithubTrait;
    use SafeAccess;
    
    /** @var \GithubService\Model\Emoji[] */
    public $emojis = [];

    public function getIterator()
    {
        return new \ArrayIterator($this->emojis);
    }
}
