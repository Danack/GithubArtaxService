<?php


namespace GithubService;

use GithubService\EmojiListHydrator;
use GithubService\Hydrator\BlobHydrator;

class GithubDataMapper extends DataMapper
{
    public function __construct()
    {
//        $dataMappings = [];
//        $dataMappings['GithubService\Model\CommitList'] = $this->getCommitListDataMap();
//        $dataMappings['GithubService\Model\EmojiList'] = $this->getEmojiListDataMap();
//        
//        $dataMappings['GithubService\Model\Emoji'] = $this->getEmojiDataMap();
        
        $this->registerType('GithubService\Model\Blob', new BlobHydrator());
        $this->registerType('GithubService\Model\EmojiList', new EmojiListHydrator());
        
        
//        foreach ($dataMappings as $classname => $dataMapping) {
//            
//        }
    }

    protected function getCommitListDataMap()
    {
        $dataMap = [
            ['commitsChild', '', 'multiple' => true, 'class' => 'GithubService\\Model\\Commit'],
        ];

        return $dataMap;
    }

    protected function getEmojiDataMap()
    {
        $dataMap = [
            ['name', 'name'],
            ['url', 'url'],
        ];

        return $dataMap;
    }
    

    protected function getEmojiListDataMap()
    {
        $dataMap = [
            ['emojiList', '', 'class' => 'GithubService\Model\Emoji', 'multiple' => true, 'recycleKey' => 'name'],
        ];

        return $dataMap;
    }
}
