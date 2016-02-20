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

//    static function createFromData($data) {
//        $instance = new static();
//        foreach ($data as $key => $value) {
//            $instance->emojiList[] = new Emoji($key, $value);
//        }
//
//        return $instance;
//    }
}
