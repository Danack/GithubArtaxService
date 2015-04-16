<?php 

namespace GithubService\Model;

class UserInBranchAuthor extends \GithubService\Model\DataMapper {

    public $avatar_url;
    public $gravatar_id;
    public $login;
    public $url;
    public $id;

    protected function getDataMap() {
        $dataMap = [
            ["avatar_url" , "avatar_url"],
            ["gravatar_id", "gravatar_id"],
            ["login"      , "login"],
            ["url"        , "url"],
            ["id"         , "id"],
        ];

        return $dataMap;
    }
}
