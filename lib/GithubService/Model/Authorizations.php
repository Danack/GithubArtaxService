<?php


namespace GithubService\Model;


class Authorizations implements \IteratorAggregate  {

    use DataMapper;

    /** @var  \GithubService\Model\Authorization[] */
    public $authorizations = [];
    
    static protected $dataMap = array(
        ['authorizations', [], 'class' => 'GithubService\Model\Authorization', 'multiple' => true],
    );

    /**
     * @return \GithubService\Model\Authorization[]
     */
    public function getIterator() {
        return new \ArrayIterator($this->authorizations);
    }

    /**
     * @param $note
     * @return Authorization|null
     */
    public function findNoteAuthorization($note) {
        foreach($this->authorizations as $authorization) {
            if (strcmp($authorization->note, $note) === 0) {
                return $authorization;
            }
        }
        
        return null;
    }
    
}

 