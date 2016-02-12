<?php 

namespace GithubService\Model;

class TemplateList extends \GithubService\Model\DataMapper implements \IteratorAggregate {

    public $name = [];

    protected function getDataMap() {
        $dataMap = [
            ['name', '', 'multiple' => 'true'],
        ];

        return $dataMap;
    }

    public function getIterator() {
        return new \ArrayIterator($this->name);
    }
}
