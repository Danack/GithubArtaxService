<?php 

namespace GithubService\Model;

class TemplateList  implements \IteratorAggregate 
{
    use GithubTrait;
    use SafeAccess;
    
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
