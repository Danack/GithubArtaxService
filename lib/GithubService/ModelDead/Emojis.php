<?php

namespace GithubService\Model;


class Emojis {

    use DataMapper;

    /**
     * @var Emoji[]
     */
    public $emojis;
   
    static protected $dataMap = array(
        ['emojis', '', 'multiple' => true, 'preserveKeys' => 'true'],
    );
    
    private function finishMapping() {
        $emojiObjects = [];
        foreach ($this->emojis as $key => $value) {
            $emojiObjects[] = new Emoji($key, $value);
        }
        $this->emojis = $emojiObjects;
    }
}
