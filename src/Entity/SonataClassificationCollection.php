<?php

declare(strict_types=1);

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use JMS\Serializer\Annotation as Serializer;
use Sonata\ClassificationBundle\Entity\BaseCollection;
use Sonata\ClassificationBundle\Model\ContextInterface;
use Sonata\ClassificationBundle\Model\CategoryInterface;

/**
 * @ORM\Entity
 * @ORM\Table(name="classification__collection")
 * @ORM\HasLifecycleCallbacks
 */
#[ORM\Entity(repositoryClass: SonataClassificationCollectionRepository::class)]
class SonataClassificationCollection extends BaseCollection
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     * // Serializer\Groups(groups={"sonata_api_read", "sonata_api_write", "sonata_search"})
     *
     * @var int
     */
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type:"integer")]
    protected $id;

    /**
     * @ORM\ManyToOne(
     *     targetEntity="App\Entity\SonataClassificationContext",
     *     cascade={"persist"}
     * )
     * @ORM\JoinColumn(name="context", referencedColumnName="id", nullable=false)
     *
     * @var SonataClassificationContext
     */
    protected ?ContextInterface $context;

    public function getId()
    {
        return $this->id;
    }

    /**
     * @ORM\PrePersist
     */
    public function prePersist(): void
    {
        parent::prePersist();
    }

    /**
     * @ORM\PreUpdate
     */
    public function preUpdate(): void
    {
        parent::preUpdate();
    }
}
