<?php

namespace GithubService\Hydrator;

use GithubService\Hydrator;
use GithubService\DataMapper;
use GithubService\Model\CreateDownload;




class CreateDownloadHydrator implements Hydrator
{
    public function hydrate(array $data, DataMapper $dataMapper)
    {
        $ref = new CreateDownload();
        $ref->accesskeyid = $dataMapper->extractValue($data, 'accesskeyid');
        $ref->acl = $dataMapper->extractValue($data, 'acl');
        $ref->bucket = $dataMapper->extractValue($data, 'bucket');
        $ref->contentType = $dataMapper->extractValue($data, 'content_type');
        $ref->description = $dataMapper->extractValue($data, 'description');
        $ref->downloadCount = $dataMapper->extractValue($data, 'download_count');
        $ref->expirationDate = $dataMapper->extractValue($data, 'expirationdate');
        $ref->htmlUrl = $dataMapper->extractValue($data, 'html_url');
        $ref->id = $dataMapper->extractValue($data, 'id');
        $ref->mimeType = $dataMapper->extractValue($data, 'mime_type');
        $ref->name = $dataMapper->extractValue($data, 'name');
        $ref->path = $dataMapper->extractValue($data, 'path');
        $ref->policy = $dataMapper->extractValue($data, 'policy');
        $ref->prefix = $dataMapper->extractValue($data, 'prefix');
        $ref->redirect = $dataMapper->extractValue($data, 'redirect');
        $ref->redirect = $dataMapper->extractValue($data, 'redirect');
        $ref->s3Url = $dataMapper->extractValue($data, 's3_url');
        $ref->signature = $dataMapper->extractValue($data, 'signature');
        $ref->size = $dataMapper->extractValue($data, 'size');
        $ref->url = $dataMapper->extractValue($data, 'url');

        return $ref;
    }
}
