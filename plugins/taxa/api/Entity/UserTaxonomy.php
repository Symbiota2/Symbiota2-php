<?php

namespace Taxa\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Security\Core\User\UserInterface;
use Symfony\Component\Serializer\Annotation\Groups;
use Symfony\Component\Validator\Constraints as Assert;
use Core\Entity\InitialTimestampInterface;
use Core\Entity\ModifiedTimestampInterface;
use Core\Entity\ModifiedUserIdInterface;
use Core\Entity\Users;

/**
 * UserTaxonomy
 *
 * @ORM\Table(name="usertaxonomy", uniqueConstraints={@ORM\UniqueConstraint(name="usertaxonomy_UNIQUE", columns={"uid", "tid", "taxauthid", "editorstatus"})}, indexes={@ORM\Index(name="FK_usertaxonomy_taxauthid_idx", columns={"taxauthid"}), @ORM\Index(name="FK_usertaxonomy_tid_idx", columns={"tid"}), @ORM\Index(name="FK_usertaxonomy_uid_idx", columns={"uid"})})
 * @ORM\Entity()
 * @ApiResource(
 *     routePrefix="/taxa",
 *     itemOperations={"get"},
 *     collectionOperations={"get"}
 * )
 */
class UserTaxonomy implements InitialTimestampInterface, ModifiedTimestampInterface, ModifiedUserIdInterface
{
    /**
     * @var int
     *
     * @ORM\Column(name="idusertaxonomy", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var \Core\Entity\Users
     *
     * @ORM\ManyToOne(targetEntity="Core\Entity\Users")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="uid", referencedColumnName="uid", nullable=false)
     * })
     */
    private $userId;

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
     * @var \Taxa\Entity\Authorities
     *
     * @ORM\ManyToOne(targetEntity="Taxa\Entity\Authorities")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="taxauthid", referencedColumnName="taxauthid", nullable=false)
     * })
     */
    private $taxaAuthorityId;

    /**
     * @var string|null
     *
     * @ORM\Column(name="editorstatus", type="string", length=45, nullable=true)
     * @Assert\Length(max=45)
     */
    private $editorStatus;

    /**
     * @var string|null
     *
     * @ORM\Column(name="geographicScope", type="string", length=250, nullable=true)
     * @Assert\Length(max=250)
     */
    private $geographicScope;

    /**
     * @var string|null
     *
     * @ORM\Column(name="notes", type="string", length=250, nullable=true)
     * @Assert\Length(max=250)
     */
    private $notes;

    /**
     * @var \Core\Entity\Users
     *
     * @ORM\ManyToOne(targetEntity="Core\Entity\Users")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="modifiedUid", referencedColumnName="uid")
     * })
     */
    private $modifiedUserId;

    /**
     * @var \DateTime|null
     *
     * @ORM\Column(name="modifiedtimestamp", type="datetime", nullable=true)
     */
    private $modifiedTimestamp;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="initialtimestamp", type="datetime")
     */
    private $initialTimestamp;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getEditorStatus(): ?string
    {
        return $this->editorStatus;
    }

    public function setEditorStatus(?string $editorStatus): self
    {
        $this->editorStatus = $editorStatus;

        return $this;
    }

    public function getGeographicScope(): ?string
    {
        return $this->geographicScope;
    }

    public function setGeographicScope(?string $geographicScope): self
    {
        $this->geographicScope = $geographicScope;

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

    public function getModifiedUserId(): ?Users
    {
        return $this->modifiedUserId;
    }

    public function setModifiedUserId(UserInterface $modifiedUserId): ModifiedUserIdInterface
    {
        $this->modifiedUserId = $modifiedUserId;

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

    public function setInitialTimestamp(\DateTimeInterface $initialTimestamp): InitialTimestampInterface
    {
        $this->initialTimestamp = $initialTimestamp;

        return $this;
    }

    public function getTaxaAuthorityId(): ?Authorities
    {
        return $this->taxaAuthorityId;
    }

    public function setTaxaAuthorityId(?Authorities $taxaAuthorityId): self
    {
        $this->taxaAuthorityId = $taxaAuthorityId;

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

    public function getUserId(): ?Users
    {
        return $this->userId;
    }

    public function setUserId(?Users $userId): self
    {
        $this->userId = $userId;

        return $this;
    }

}
