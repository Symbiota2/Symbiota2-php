<?php

namespace Traits\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Security\Core\User\UserInterface;
use Symfony\Component\Serializer\Annotation\Groups;
use Symfony\Component\Validator\Constraints as Assert;
use Core\Entity\ModifiedUserIdInterface;
use Core\Entity\CreatedUserIdInterface;
use Core\Entity\InitialTimestampInterface;
use Core\Entity\ModifiedTimestampInterface;
use Core\Entity\Users;

/**
 * States
 *
 * @ORM\Table(name="tmstates", uniqueConstraints={@ORM\UniqueConstraint(name="traitid_code_UNIQUE", columns={"traitid", "statecode"})}, indexes={@ORM\Index(name="FK_tmstate_uidcreated_idx", columns={"createduid"}), @ORM\Index(name="FK_tmstate_uidmodified_idx", columns={"modifieduid"}), @ORM\Index(name="IDX_2759BBC88CC5D4DB", columns={"traitid"})})
 * @ORM\Entity()
 * @ApiResource(
 *     routePrefix="/traits",
 *     itemOperations={"get"},
 *     collectionOperations={"get"}
 * )
 */
class States implements ModifiedUserIdInterface, CreatedUserIdInterface, InitialTimestampInterface, ModifiedTimestampInterface
{
    /**
     * @var int
     *
     * @ORM\Column(name="stateid", type="integer", options={"unsigned"=true})
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var \Traits\Entity\Traits
     *
     * @ORM\ManyToOne(targetEntity="Traits\Entity\Traits")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="traitid", referencedColumnName="traitid", nullable=false)
     * })
     */
    private $traitId;

    /**
     * @var string
     *
     * @ORM\Column(name="statecode", type="string", length=2)
     * @Assert\NotBlank()
     * @Assert\Length(max=2)
     */
    private $stateCode;

    /**
     * @var string
     *
     * @ORM\Column(name="statename", type="string", length=75)
     * @Assert\NotBlank()
     * @Assert\Length(max=75)
     */
    private $stateName;

    /**
     * @var string|null
     *
     * @ORM\Column(name="description", type="string", length=250, nullable=true)
     * @Assert\Length(max=250)
     */
    private $description;

    /**
     * @var string|null
     *
     * @ORM\Column(name="refurl", type="string", length=250, nullable=true)
     * @Assert\Length(max=250)
     */
    private $referenceUrl;

    /**
     * @var string|null
     *
     * @ORM\Column(name="notes", type="string", length=250, nullable=true)
     * @Assert\Length(max=250)
     */
    private $notes;

    /**
     * @var int|null
     *
     * @ORM\Column(name="sortseq", type="integer", nullable=true)
     * @Assert\Type(type="integer")
     */
    private $sortSequence;

    /**
     * @var \Core\Entity\Users
     *
     * @ORM\ManyToOne(targetEntity="Core\Entity\Users")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="modifieduid", referencedColumnName="uid")
     * })
     */
    private $modifiedUserId;

    /**
     * @var \DateTime|null
     *
     * @ORM\Column(name="modifiedTimeStamp", type="datetime", nullable=true)
     * @Assert\DateTime
     */
    private $modifiedTimestamp;

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

    public function getStateCode(): ?string
    {
        return $this->stateCode;
    }

    public function setStateCode(string $stateCode): self
    {
        $this->stateCode = $stateCode;

        return $this;
    }

    public function getStateName(): ?string
    {
        return $this->stateName;
    }

    public function setStateName(string $stateName): self
    {
        $this->stateName = $stateName;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(?string $description): self
    {
        $this->description = $description;

        return $this;
    }

    public function getReferenceUrl(): ?string
    {
        return $this->referenceUrl;
    }

    public function setReferenceUrl(?string $referenceUrl): self
    {
        $this->referenceUrl = $referenceUrl;

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

    public function getSortSequence(): ?int
    {
        return $this->sortSequence;
    }

    public function setSortSequence(?int $sortSequence): self
    {
        $this->sortSequence = $sortSequence;

        return $this;
    }

    public function getModifiedTimestamp(): ?\DateTimeInterface
    {
        return $this->modifiedTimestamp;
    }

    public function setModifiedTimestamp(?\DateTimeInterface $modifiedTimestamp): ModifiedTimestampInterface
    {
        $this->modifiedTimestamp = $modifiedTimestamp;

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

    public function getTraitId(): ?Traits
    {
        return $this->traitId;
    }

    public function setTraitId(?Traits $traitId): self
    {
        $this->traitId = $traitId;

        return $this;
    }

    /**
     * @return Users|null
     */
    public function getModifiedUserId(): ?Users
    {
        return $this->modifiedUserId;
    }

    /**
     * @param UserInterface $modifiedUserId
     * @return ModifiedUserIdInterface
     */
    public function setModifiedUserId(UserInterface $modifiedUserId): ModifiedUserIdInterface
    {
        $this->modifiedUserId = $modifiedUserId;

        return $this;
    }


}
