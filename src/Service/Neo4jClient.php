<?php

namespace App\Service;

use Laudis\Neo4j\ClientBuilder;
use Laudis\Neo4j\Authentication\Authenticate;
use Laudis\Neo4j\Contracts\ClientInterface;
use Laudis\Neo4j\Contracts\TransactionInterface;
use Laudis\Neo4j\Types\CypherList;

class Neo4jClient
{

    private ClientInterface $client;

    public function __construct(
        string $alias,
        string $url,
        string $username,
        string $password
    )
    {
        $this->client = ClientBuilder::create()
            ->withDriver($alias, $url, Authenticate::basic($username, $password))
            ->build();
    }

    public function getClient(): ClientInterface
    {
        return $this->client;
    }

    public function setClient(ClientInterface $client): self
    {
        $this->client = $client;

        return $this;
    }

    public function getAllEntities(): CypherList
    {
        $result = $this->client->readTransaction(static function (TransactionInterface $tsx) {
           return $tsx->run('MATCH (n: Movie) RETURN n');
        });

        return $result;
    }
}