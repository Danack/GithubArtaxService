<?php

namespace GithubService\Hydrator;

use GithubService\Hydrator;
use GithubService\DataMapper;
use GithubService\Model\SubmoduleContent;


class SubmoduleContentHydrator implements Hydrator
{
    public function hydrate(array $data, DataMapper $dataMapper)
    {
        $submoduleContent = new SubmoduleContent();
        $submoduleContent->downloadUrl = $dataMapper->extractValue($data, 'download_url');
        $submoduleContent->gitUrl = $dataMapper->extractValue($data, 'git_url');
        $submoduleContent->htmlUrl = $dataMapper->extractValue($data, 'html_url');
        $submoduleContent->name = $dataMapper->extractValue($data, 'name');
        $submoduleContent->path = $dataMapper->extractValue($data, 'path');
        $submoduleContent->sha = $dataMapper->extractValue($data, 'sha');
        $submoduleContent->size = $dataMapper->extractValue($data, 'size');
        $submoduleContent->submoduleGitUrl = $dataMapper->extractValue($data, 'submodule_git_url');
        $submoduleContent->type = $dataMapper->extractValue($data, 'type');
        $submoduleContent->url = $dataMapper->extractValue($data, 'url');

        return $submoduleContent;
    }
}
