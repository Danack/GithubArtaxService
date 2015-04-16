<?php 

namespace GithubService\Model;

class File { //extends \GithubService\Model\DataMapper {

    public $name;
    
    public $language = null;

    public $rawUrl = null;

    public $size = null;

    public $truncated = null;

    public $type = null;

    public function __constructor($name, $language, $rawURL, $size, $truncated, $type) {
        $this->name = $name;
        $this->language = $language;
        $this->rawUrl = $rawURL;
        $this->size = $size;
        $this->truncated = $truncated;
        $this->type = $type;
    }
}
