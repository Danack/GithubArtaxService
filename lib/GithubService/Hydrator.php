<?php


namespace GithubService;

interface Hydrator
{
    public function hydrate(array $data, DataMapper $dataMapper);
}
