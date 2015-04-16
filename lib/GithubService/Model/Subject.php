<?php 

namespace GithubService\Model;

class Subject extends \GithubService\Model\DataMapper {

    public $latestCommentUrl = null;

    public $title = null;

    public $type = null;

    public $url = null;

    protected function getDataMap() {
        $dataMap = [
            ['latestCommentUrl', 'latest_comment_url'],
            ['title', 'title'],
            ['type', 'type'],
            ['url', 'url'],
        ];

        return $dataMap;
    }


}
