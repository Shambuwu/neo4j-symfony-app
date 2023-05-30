<?php

namespace App\Entity;

use GraphAware\Neo4j\OGM\Annotations as OGM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @OGM\Node(label="Node")
 */
class Node
{
    /**
     * @OGM\GraphId()
     */
    protected string $id;

    /**
     * @OGM\Property(type="string")
     * @Assert\NotBlank()
     */
    protected string $type;

//    /**
//     * @OGM\Property(type="string")
//     */
//    protected string $externalId;

    public function getId(): string
    {
        return $this->id;
    }

    public function getType(): string
    {
        return $this->type;
    }

    public function setType(string $type): self
    {
        $this->type = $type;

        return $this;
    }

//    public function getExternalId(): string
//    {
//        return $this->externalId;
//    }
//
//    public function setExternalId(string $externalId): self
//    {
//        $this->externalId = $externalId;
//
//        return $this;
//    }
}