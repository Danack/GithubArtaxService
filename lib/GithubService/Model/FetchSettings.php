<?php 

namespace GithubService\Model;

class FetchSettings
{
    use GithubTrait;
    use SafeAccess;

    /**
     * @var \GithubService\Model\Enterprise
     */
    public $enterprise = null;

    /**
     * @var \GithubService\Model\Indices $runList
     */
    public $runList = array(
        
    );

    protected function getDataMap() {
        $dataMap = [
            ['enterprise', 'enterprise', 'class' => 'GithubService\\Model\\Enterprise'],
            ['runList', 'run_list', 'multiple' => true, 'class' => 'GithubService\\Model\\Indices'],
        ];

        return $dataMap;
    }
}
