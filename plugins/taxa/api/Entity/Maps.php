<?php

namespace Taxa\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Annotation\Groups;
use Symfony\Component\Validator\Constraints as Assert;
use Core\Entity\InitialTimestampInterface;

/**
 * Maps
 *
 * @ORM\Table(name="taxamaps", indexes={@ORM\Index(name="FK_tid_idx", columns={"tid"})})
 * @ORM\Entity()
 * @ApiResource(
 *     routePrefix="/taxa",
 *     itemOperations={"get"},
 *     collectionOperations={"get"}
 * )
 */
class Maps implements InitialTimestampInterface
{
    /**
     * @var int
     *
     * @ORM\Column(name="mid", type="integer", options={"unsigned"=true})
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var \Taxa\Entity\Taxa
     *
     * @ORM\ManyToOne(targetEntity="Taxa\Entity\Taxa")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="tid", referencedColumnName="TID", nullable=false)
     * })
     */
    private $taxaId;

    /**
     * @var string
     *
     * @ORM\Column(name="url", type="string", length=255)
     * @Assert\NotBlank()
     * @Assert\Length(max=255)
     */
    private $url;

    /**
     * @var string|null
     *
     * @ORM\Column(name="title", type="string", length=100, nullable=true)
     * @Assert\Length(max=100)
     */
    private $title;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="initialtimestamp", type="datetime")
     * @Assert\DateTime
     */
    private $initialTimestamp;

    /**
     * Constructor
     */
    public function __construct()
    {

    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getUrl(): ?string
    {
        return $this->url;
    }

    public function setUrl(string $url): self
    {
        $this->url = $url;

        return $this;
    }

    public function getTitle(): ?string
    {
        return $this->title;
    }

    public function setTitle(?string $title): self
    {
        $this->title = $title;

        return $this;
    }

    public function getInitialTimestamp(): ?\DateTimeInterface
    {
        return $this->initialTimestamp;
    }

    public function setInitialTimestamp(\DateTimeInterface $initialTimestamp): InitialTimestampInterface
    {
        $this->initialTimestamp = $initialTimestamp;

        return $this;
    }

    public function getTaxaId(): ?Taxa
    {
        return $this->taxaId;
    }

    public function setTaxaId(?Taxa $taxaId): self
    {
        $this->taxaId = $taxaId;

        return $this;
    }

}
