<?php

namespace GithubService\Hydrator;

use GithubService\DataMapper;
use GithubService\Hydrator;
use GithubService\Model\File;
use GithubService\Model\FileList;

class FileListHydrator implements Hydrator
{
    public function hydrate(array $data, DataMapper $dataMapper)
    {
        $fileList = new FileList();
        foreach ($data as $key => $value) {
            $name = $key;
            $language = $dataMapper->extractValue($value, 'language');
            $rawURL = $dataMapper->extractValue($value, 'raw_url');
            $size = $dataMapper->extractValue($value, 'size');
            $truncated = $dataMapper->extractValue($value, 'truncated');
            $type = $dataMapper->extractValue($value, 'type');

            $fileList->files[] = new File($name, $language, $rawURL, $size, $truncated, $type);
        }

        return $fileList;
    }
}
