<?php

namespace App\Service;

use App\Entity\Node;
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

    public function getEntityManager(): EntityManager
    {
        return $this->entityManager;
    }

    public function getAllEntities(): array
    {
        return $this->entityManager->getRepository(Node::class)->findAll();
    }

    public function getEntity(string $id): Node
    {
        return $this->entityManager->getRepository(Node::class)->findOneBy(array('id' => $id));
    }
}