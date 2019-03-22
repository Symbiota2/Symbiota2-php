<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Annotation\Groups;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * OccurrenceAccessStats
 *
 * @ORM\Table(name="omoccuraccessstats", uniqueConstraints={@ORM\UniqueConstraint(name="UNIQUE_occuraccess", columns={"occid", "accessdate", "ipaddress", "accesstype"})}, indexes={@ORM\Index(name="IDX_FB36281B40A24FBA", columns={"occid"})})
 * @ORM\Entity(repositoryClass="App\Repository\OccurrenceAccessStatsRepository")
 * @ApiResource(
 *     itemOperations={"get"},
 *     collectionOperations={"get"}
 * )
 */
class OccurrenceAccessStats implements InitialTimestampInterface
{
    /**
     * @var int
     *
     * @ORM\Column(name="oasid", type="integer", options={"unsigned"=true})
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var \App\Entity\Occurrences
     *
     * @ORM\ManyToOne(targetEntity="\App\Entity\Occurrences")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="occid", referencedColumnName="occid", nullable=false)
     * })
     */
    private $occurrenceId;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="accessdate", type="date")
     * @Assert\NotBlank()
     * @Assert\Date
     */
    private $accessDate;

    /**
     * @var string
     *
     * @ORM\Column(name="ipaddress", type="string", length=45)
     * @Assert\NotBlank()
     * @Assert\Length(max=45)
     */
    private $ipAddress;

    /**
     * @var int
     *
     * @ORM\Column(name="cnt", type="integer", options={"unsigned"=true})
     * @Assert\NotBlank()
     * @Assert\Type(type="integer")
     */
    private $count;

    /**
     * @var string
     *
     * @ORM\Column(name="accesstype", type="string", length=45)
     * @Assert\NotBlank()
     * @Assert\Length(max=45)
     */
    private $accessType;

    /**
     * @var string|null
     *
     * @ORM\Column(name="dynamicProperties", type="string", length=250, nullable=true)
     * @Assert\Length(max=250)
     */
    private $dynamicProperties;

    /**
     * @var string|null
     *
     * @ORM\Column(name="notes", type="string", length=250, nullable=true)
     * @Assert\Length(max=250)
     */
    private $notes;

    /**
     * @var \DateTime|null
     *
     * @ORM\Column(name="initialtimestamp", type="datetime")
     * @Assert\DateTime
     */
    private $initialTimestamp;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getAccessDate(): ?\DateTimeInterface
    {
        return $this->accessDate;
    }

    public function setAccessDate(\DateTimeInterface $accessDate): self
    {
        $this->accessDate = $accessDate;

        return $this;
    }

    public function getIpAddress(): ?string
    {
        return $this->ipAddress;
    }

    public function setIpAddress(string $ipAddress): self
    {
        $this->ipAddress = $ipAddress;

        return $this;
    }

    public function getCount(): ?int
    {
        return $this->count;
    }

    public function setCount(int $count): self
    {
        $this->count = $count;

        return $this;
    }

    public function getAccessType(): ?string
    {
        return $this->accessType;
    }

    public function setAccessType(string $accessType): self
    {
        $this->accessType = $accessType;

        return $this;
    }

    public function getDynamicProperties(): ?string
    {
        return $this->dynamicProperties;
    }

    public function setDynamicProperties(?string $dynamicProperties): self
    {
        $this->dynamicProperties = $dynamicProperties;

        return $this;
    }

    public function getNotes(): ?string
    {
        return $this->notes;
    }

    public function setNotes(?string $notes): self
    {
        $this->notes = $notes;

        return $this;
    }

    public function getInitialTimestamp(): ?\DateTimeInterface
    {
        return $this->initialTimestamp;
    }

    public function setInitialTimestamp(?\DateTimeInterface $initialTimestamp): InitialTimestampInterface
    {
        $this->initialTimestamp = $initialTimestamp;

        return $this;
    }

    public function getOccurrenceId(): ?Occurrences
    {
        return $this->occurrenceId;
    }

    public function setOccurrenceId(?Occurrences $occurrenceId): self
    {
        $this->occurrenceId = $occurrenceId;

        return $this;
    }


}
