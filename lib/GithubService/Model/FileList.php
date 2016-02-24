<?php 

namespace GithubService\Model;

class FileList
{
    use GithubTrait;
    use SafeAccess;
    
    /** @var \GithubService\Model\File[] */
    public $files = [];
}
