<?php 

namespace GithubService\Model;

class CodeSearchV3ResultsHighlighting
{
    use GithubTrait;
    use SafeAccess;

    /**
     * @var \GithubService\Model\ $textMatches
     */
    public $textMatches = null;

    protected function getDataMap() {
        $dataMap = [
            ['textMatches', 'text_matches', 'class' => 'GithubService\\Model\\TextMatches'],
        ];

        return $dataMap;
    }
}
