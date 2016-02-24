<?php

namespace GithubService\Hydrator;

use GithubService\Hydrator;
use GithubService\HydratorRegistry;
use GithubService\Model\Template;

class TemplateHydrator implements Hydrator
{
    public function hydrate(array $data, HydratorRegistry $hydratorRegistry)
    {
        $template = new Template();
        $template->name = $hydratorRegistry->extractValue($data, 'name');
        $template->source = $hydratorRegistry->extractValue($data, 'source');

        return $template;
    }
}
