<?php 

namespace GithubService\Model;

class Users extends \GithubService\Model\DataMapper {

    /**
     * @var \GithubService\Model\UserSearchItem $usersChild
     */
    public $usersChild = array(
        
    );

    protected function getDataMap() {
        $dataMap = [
            ['usersChild', '', 'multiple' => true, 'class' => 'GithubService\\Model\\UserSearchItem'],
        ];

        return $dataMap;
    }


}
