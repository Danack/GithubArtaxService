<?php

namespace GithubService\Hydrator;

use GithubService\DataMapper;
use GithubService\Hydrator;
use GithubService\Model\RepoStatsCommitActivityChild;


class RepoStatsCommitActivityChildHydrator implements Hydrator
{
    public function hydrate(array $data, DataMapper $dataMapper)
    {
        $repoStatsCommitActivity = new RepoStatsCommitActivityChild();
        
        $repoStatsCommitActivity->total = $dataMapper->extractValue($data, 'total');
        $repoStatsCommitActivity->week = $dataMapper->extractValue($data, 'week');

        //TODO - check is array
        $repoStatsCommitActivity->days = $dataMapper->extractValue($data, 'days');


        return $repoStatsCommitActivity;
    }
}
