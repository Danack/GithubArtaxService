<?php

namespace GithubService\Hydrator;

use GithubService\Hydrator;
use GithubService\DataMapper;
use GithubService\Model\GistComment;





class GistCommentHydrator implements Hydrator
{
    public function hydrate(array $data, DataMapper $dataMapper)
    {
        $gistComment = new GistComment();

        $gistComment->body = $dataMapper->extractValue($data, 'body');
        $gistComment->createdAt = $dataMapper->extractValue($data, 'created_at');
        $gistComment->id = $dataMapper->extractValue($data, 'id');
        $gistComment->updatedAt = $dataMapper->extractValue($data, 'updated_at');
        $gistComment->url= $dataMapper->extractValue($data, 'url');
  
        
        $user = $dataMapper->extractValue($data, 'user');
        $gistComment->refObject = $dataMapper->instantiate('GithubService\Model\User', $user);

        return $gistComment;
    }
}
