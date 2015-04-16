<?php 

namespace GithubService\Model;

class Item extends \GithubService\Model\DataMapper {

    public $path = null;
    public $repository = null;
    public $score = null;
    public $url = null;
    public $sha = null;
    public $html_url = null;
    public $git_url = null;
    public $name = null;

    protected function getDataMap() {
        $dataMap = [
            ['path', 'path', ],
            ['repository', 'repository', ],
            ['score', 'score', ],
            ['url', 'url', ],
            ['html_url', 'html_url', ],
            ['git_url', 'git_url', ],
            ['name', 'name', ],
        ];

        return $dataMap;
    }


}
