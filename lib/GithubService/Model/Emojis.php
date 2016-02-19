<?php

namespace GithubService\Model;

class Emojis extends \GithubService\Model\DataMapper {

    /** @var \GithubService\Model\Emoji[] */
    public $emojiList = [];

    protected function getDataMap() {
        $dataMap = [
            ['emojiList', '', 'class' => 'GithubService\Model\Emoji', 'multiple' => true, 'recycleKey' => 'name'],
        ];

        return $dataMap;
    }


    static function createFromData($data) {
        $instance = new static();
        foreach ($data as $key => $value) {
            $instance->emojiList[] = new Emoji($key, $value);
        }

        return $instance;
    }
}
