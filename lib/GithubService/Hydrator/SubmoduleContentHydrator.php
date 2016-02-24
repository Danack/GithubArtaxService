<?php

namespace GithubService\Hydrator;

use GithubService\Hydrator;
use GithubService\HydratorRegistry;
use GithubService\Model\SubmoduleContent;

class SubmoduleContentHydrator implements Hydrator
{
    public function hydrate(array $data, HydratorRegistry $hydratorRegistry)
    {
        $submoduleContent = new SubmoduleContent();
        $submoduleContent->downloadUrl = $hydratorRegistry->extractValue($data, 'download_url');
        $submoduleContent->gitUrl = $hydratorRegistry->extractValue($data, 'git_url');
        $submoduleContent->htmlUrl = $hydratorRegistry->extractValue($data, 'html_url');
        $submoduleContent->name = $hydratorRegistry->extractValue($data, 'name');
        $submoduleContent->path = $hydratorRegistry->extractValue($data, 'path');
        $submoduleContent->sha = $hydratorRegistry->extractValue($data, 'sha');
        $submoduleContent->size = $hydratorRegistry->extractValue($data, 'size');
        $submoduleContent->submoduleGitUrl = $hydratorRegistry->extractValue($data, 'submodule_git_url');
        $submoduleContent->type = $hydratorRegistry->extractValue($data, 'type');
        $submoduleContent->url = $hydratorRegistry->extractValue($data, 'url');

        return $submoduleContent;
    }
}
