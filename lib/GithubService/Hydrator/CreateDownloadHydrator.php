<?php

namespace GithubService\Hydrator;

use GithubService\Hydrator;
use GithubService\HydratorRegistry;
use GithubService\Model\CreateDownload;

class CreateDownloadHydrator implements Hydrator
{
    public function hydrate(array $data, HydratorRegistry $hydratorRegistry)
    {
        $ref = new CreateDownload();
        $ref->accesskeyid = $hydratorRegistry->extractValue($data, 'accesskeyid');
        $ref->acl = $hydratorRegistry->extractValue($data, 'acl');
        $ref->bucket = $hydratorRegistry->extractValue($data, 'bucket');
        $ref->contentType = $hydratorRegistry->extractValue($data, 'content_type');
        $ref->description = $hydratorRegistry->extractValue($data, 'description');
        $ref->downloadCount = $hydratorRegistry->extractValue($data, 'download_count');
        $ref->expirationDate = $hydratorRegistry->extractValue($data, 'expirationdate');
        $ref->htmlUrl = $hydratorRegistry->extractValue($data, 'html_url');
        $ref->id = $hydratorRegistry->extractValue($data, 'id');
        $ref->mimeType = $hydratorRegistry->extractValue($data, 'mime_type');
        $ref->name = $hydratorRegistry->extractValue($data, 'name');
        $ref->path = $hydratorRegistry->extractValue($data, 'path');
        $ref->policy = $hydratorRegistry->extractValue($data, 'policy');
        $ref->prefix = $hydratorRegistry->extractValue($data, 'prefix');
        $ref->redirect = $hydratorRegistry->extractValue($data, 'redirect');
        $ref->redirect = $hydratorRegistry->extractValue($data, 'redirect');
        $ref->s3Url = $hydratorRegistry->extractValue($data, 's3_url');
        $ref->signature = $hydratorRegistry->extractValue($data, 'signature');
        $ref->size = $hydratorRegistry->extractValue($data, 'size');
        $ref->url = $hydratorRegistry->extractValue($data, 'url');

        return $ref;
    }
}
