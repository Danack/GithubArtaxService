<?php 

namespace GithubService\Model;

class TextMatches
{
    use GithubTrait;
    use SafeAccess;
    
    /**
     * @var \GithubService\Model\ $textMatchesChild
     */
    public $textMatchesChild = [];

    protected function getDataMap() {
        $dataMap = [
            ['textMatchesChild', '', 'multiple' => true, 'class' => 'GithubService\\Model\\TextMatchesChild'],
        ];

        return $dataMap;
    }
}
