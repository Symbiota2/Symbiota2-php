<?php

namespace Occurrence\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Security\Core\User\UserInterface;
use Symfony\Component\Serializer\Annotation\Groups;
use Symfony\Component\Validator\Constraints as Assert;
use Core\Entity\CreatedUserIdInterface;
use Core\Entity\InitialTimestampInterface;
use Core\Entity\Users;

/**
 * Verification
 *
 * @ORM\Table(name="omoccurverification", uniqueConstraints={@ORM\UniqueConstraint(name="UNIQUE_omoccurverification", columns={"occid", "category"})}, indexes={@ORM\Index(name="FK_omoccurverification_occid_idx", columns={"occid"}), @ORM\Index(name="FK_omoccurverification_uid_idx", columns={"createduid"})})
 * @ORM\Entity()
 * @ApiResource(
 *     routePrefix="/occurrence",
 *     itemOperations={"get"},
 *     collectionOperations={"get"}
 * )
 */
class Verification implements CreatedUserIdInterface, InitialTimestampInterface
{
    /**
     * @var int
     *
     * @ORM\Column(name="ovsid", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var \Occurrence\Entity\Occurrences
     *
     * @ORM\ManyToOne(targetEntity="Occurrence\Entity\Occurrences")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="occid", referencedColumnName="occid", nullable=false)
     * })
     */
    private $occurrenceId;

    /**
     * @var string
     *
     * @ORM\Column(name="category", type="string", length=45)
     * @Assert\NotBlank()
     * @Assert\Length(max=45)
     */
    private $category;

    /**
     * @var int
     *
     * @ORM\Column(name="ranking", type="integer")
     * @Assert\NotBlank()
     * @Assert\Type(type="integer")
     */
    private $ranking;

    /**
     * @var string|null
     *
     * @ORM\Column(name="protocol", type="string", length=100, nullable=true)
     * @Assert\Length(max=100)
     */
    private $protocol;

    /**
     * @var string|null
     *
     * @ORM\Column(name="source", type="string", length=45, nullable=true)
     * @Assert\Length(max=45)
     */
    private $source;

    /**
     * @var \Core\Entity\Users
     *
     * @ORM\ManyToOne(targetEntity="Core\Entity\Users")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="createduid", referencedColumnName="uid")
     * })
     */
    private $createdUserId;

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
     * @ORM\Column(name="initialtimestamp", type="datetime", nullable=true)
     * @Assert\DateTime
     */
    private $initialTimestamp;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getCategory(): ?string
    {
        return $this->category;
    }

    public function setCategory(string $category): self
    {
        $this->category = $category;

        return $this;
    }

    public function getRanking(): ?int
    {
        return $this->ranking;
    }

    public function setRanking(int $ranking): self
    {
        $this->ranking = $ranking;

        return $this;
    }

    public function getProtocol(): ?string
    {
        return $this->protocol;
    }

    public function setProtocol(?string $protocol): self
    {
        $this->protocol = $protocol;

        return $this;
    }

    public function getSource(): ?string
    {
        return $this->source;
    }

    public function setSource(?string $source): self
    {
        $this->source = $source;

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

    /**
     * @return Users|null
     */
    public function getCreatedUserId(): ?Users
    {
        return $this->createdUserId;
    }

    /**
     * @param UserInterface $createdUserId
     * @return CreatedUserIdInterface
     */
    public function setCreatedUserId(UserInterface $createdUserId): CreatedUserIdInterface
    {
        $this->createdUserId = $createdUserId;

        return $this;
    }


}
