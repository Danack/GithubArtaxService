<?php

namespace GithubService\Hydrator;

use GithubService\DataMapper;
use GithubService\Hydrator;
use GithubService\Model\Template;

class TemplateHydrator implements Hydrator
{
    public function hydrate(array $data, DataMapper $dataMapper)
    {
        $template = new Template();
        $template->name = $dataMapper->extractValue($data, 'name');
        $template->source = $dataMapper->extractValue($data, 'source');

        return $template;
    }
}
