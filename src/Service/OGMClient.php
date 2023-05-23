<?php

namespace App\Service;

use GraphAware\Neo4j\OGM\EntityManager;

class OGMClient
{
    private EntityManager $entityManager;

    public function __construct(
        string $url,
    )
    {
        $this->entityManager = EntityManager::create($url);
    }


}