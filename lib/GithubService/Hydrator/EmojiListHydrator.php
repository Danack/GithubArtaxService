<?php

namespace GithubService\Hydrator;

use GithubService\DataMapper;
use GithubService\Hydrator;
use GithubService\Model\Emoji;
use GithubService\Model\EmojiList;

class EmojiListHydrator implements Hydrator
{
    public function hydrate(array $data, DataMapper $dataMapper)
    {
        $emojiList = new EmojiList();
        foreach ($data as $key => $value) {
            $emojiList->emojis[] = new Emoji($key, $value);
        }

        return $emojiList;
    }
}
