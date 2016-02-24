<?php

namespace GithubService\Hydrator;

use GithubService\Hydrator;
use GithubService\HydratorRegistry;
use GithubService\Model\Emoji;
use GithubService\Model\EmojiList;

class EmojiListHydrator implements Hydrator
{
    public function hydrate(array $data, HydratorRegistry $hydratorRegistry)
    {
        $emojiList = new EmojiList();
        foreach ($data as $key => $value) {
            $emojiList->emojis[] = new Emoji($key, $value);
        }

        return $emojiList;
    }
}
