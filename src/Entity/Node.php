<?php

namespace App\Entity;

use GraphAware\Neo4j\OGM\Annotations as OGM;
use Symfony\Component\Validator\Constraints as Assert;
use Doctrine\Common\Collections\ArrayCollection;
use GraphAware\Neo4j\OGM\Common\Collection\LazyCollection;

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

    /**
     * @var Collection|Node[]
     * @OGM\Relationship(type="RELATES_TO", direction="OUTGOING", targetEntity="App\Entity\Node", collection=true)
     */
    protected $relatedNodes;

//    /**
//     * @OGM\Property(type="string")
//     */
//    protected string $externalId;

    public function __construct() 
    {
        $this->nodes = new ArrayCollection();
    }

    public function addRelatedNode(Node $node): void
    {
        if (!$this->relatedNodes->contains($node)) {
            $this->relatedNodes->add($node);
        }
    }

    public function removeRelatedNode(Node $node): void
    {
        $this->relatedNodes->removeElement($node);
    }
    
    public function getRelatedNodes()
    {
        return $this->relatedNodes;
    }

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