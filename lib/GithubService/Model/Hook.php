<?php 

namespace GithubService\Model;

class Hook extends \GithubService\Model\DataMapper {

    public $active = null;

    /**
     * @var \GithubService\Model\ $config
     */
    public $config = null;

    public $createdAt = null;

    /**
     * @var \GithubService\Model\Indices $events
     */
    public $events = array(
        
    );

    public $id = null;

    public $name = null;

    public $pingUrl = null;

    public $testUrl = null;

    public $updatedAt = null;

    public $url = null;

    protected function getDataMap() {
        $dataMap = [
            ['active', 'active'],
            ['config', 'config', 'class' => 'GithubService\\Model\\Config'],
            ['createdAt', 'created_at'],
            ['events', 'events', 'multiple' => true, 'class' => 'GithubService\\Model\\Indices'],
            ['id', 'id'],
            ['name', 'name'],
            ['pingUrl', 'ping_url'],
            ['testUrl', 'test_url'],
            ['updatedAt', 'updated_at'],
            ['url', 'url'],
        ];

        return $dataMap;
    }


}
