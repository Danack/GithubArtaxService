<?php 

namespace GithubService\Model;

class FilesChild extends \GithubService\Model\DataMapper {

    public $additions = null;

    public $blobUrl = null;

    public $changes = null;

    public $deletions = null;

    public $filename = null;

    public $patch = null;

    public $rawUrl = null;

    public $status = null;

    protected function getDataMap() {
        $dataMap = [
            ['additions', 'additions'],
            ['blobUrl', 'blob_url'],
            ['changes', 'changes'],
            ['deletions', 'deletions'],
            ['filename', 'filename'],
            ['patch', 'patch'],
            ['rawUrl', 'raw_url'],
            ['status', 'status'],
        ];

        return $dataMap;
    }


}
