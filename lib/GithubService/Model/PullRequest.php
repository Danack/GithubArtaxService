<?php 

namespace GithubService\Model;

class PullRequest extends \GithubService\Model\DataMapper {

    public $diffUrl = null;

    public $htmlUrl = null;

    public $patchUrl = null;

    protected function getDataMap() {
        $dataMap = [
            ['diffUrl', 'diff_url'],
            ['htmlUrl', 'html_url'],
            ['patchUrl', 'patch_url'],
        ];

        return $dataMap;
    }


}
