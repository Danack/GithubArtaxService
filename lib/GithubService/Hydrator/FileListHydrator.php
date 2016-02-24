<?php

namespace GithubService\Hydrator;

use GithubService\Hydrator;
use GithubService\HydratorRegistry;
use GithubService\Model\File;
use GithubService\Model\FileList;

class FileListHydrator implements Hydrator
{
    public function hydrate(array $data, HydratorRegistry $hydratorRegistry)
    {
        $fileList = new FileList();
        foreach ($data as $key => $value) {
            $name = $key;
            $language = $hydratorRegistry->extractValue($value, 'language');
            $rawURL = $hydratorRegistry->extractValue($value, 'raw_url');
            $size = $hydratorRegistry->extractValue($value, 'size');
            $truncated = $hydratorRegistry->extractValue($value, 'truncated');
            $type = $hydratorRegistry->extractValue($value, 'type');

            $fileList->files[] = new File($name, $language, $rawURL, $size, $truncated, $type);
        }

        return $fileList;
    }
}
