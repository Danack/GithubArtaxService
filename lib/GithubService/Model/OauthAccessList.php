<?php 

namespace GithubService\Model;

class OauthAccessList
{
    use GithubTrait;
    use SafeAccess;
    
    /**
     * @var \GithubService\Model\OauthAccess[]
     */
    public $accessList = [];

    protected function getDataMap() {
        $dataMap = [
            ['accessList', '', 'class' => 'GithubService\\Model\\OauthAccess', 'multiple' => true],
        ];

        return $dataMap;
    }
    
        /**
     * @param $note
     * @return OauthAccess|null
     */
    public function findOauthAccessByNote($note)
    {
        foreach($this->accessList as $authorization) {
            if (strcmp($authorization->note, $note) === 0) {
                return $authorization;
            }
        }

        return null;
    }
}
