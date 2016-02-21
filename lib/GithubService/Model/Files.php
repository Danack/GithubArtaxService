<?php 

namespace GithubService\Model;

class FileList
{ //extends \GithubService\Model\DataMapper {

    /**
     * @var \GithubService\Model\File[]
     */
    public $files = [];

//    static public function createFromData($data) {
//        $instance = new self();
//        foreach ($data as $key => $values) {
//            $instance->files[] = new File(
//                $key,
//                $values['language'],
//                $values['raw_url'],
//                $values['size'],
//                $values['truncated'],
//                $values['type']
//            );
//        }
//        
//        return $instance;
//    }
}
