<?php

namespace Checklist\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Security\Core\User\UserInterface;
use Symfony\Component\Serializer\Annotation\Groups;
use Symfony\Component\Validator\Constraints as Assert;
use Core\Entity\CreatedUserIdInterface;
use Core\Entity\InitialTimestampInterface;
use Taxa\Entity\Taxa;
use Core\Entity\Users;

/**
 * TaxaComments
 *
 * @ORM\Table(name="fmcltaxacomments", indexes={@ORM\Index(name="FK_clcomment_users", columns={"createduid"}), @ORM\Index(name="FK_clcomment_cltaxa", columns={"clid", "tid"})})
 * @ORM\Entity()
 * @ApiResource(
 *     routePrefix="/checklist",
 *     itemOperations={"get"},
 *     collectionOperations={"get"}
 * )
 */
class TaxaComments implements CreatedUserIdInterface, InitialTimestampInterface
{
    /**
     * @var int
     *
     * @ORM\Column(name="cltaxacommentsid", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var \Checklist\Entity\Checklists
     *
     * @ORM\ManyToOne(targetEntity="Checklist\Entity\Checklists")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="clid", referencedColumnName="CLID", nullable=false)
     * })
     */
    private $checklistId;

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
     * @ORM\Column(name="comment", type="text", length=65535)
     * @Assert\NotBlank()
     * @Assert\Length(max=65535)
     */
    private $comment;

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
     * @var int
     *
     * @ORM\Column(name="ispublic", type="integer", options={"default"="1"})
     * @Assert\NotBlank()
     * @Assert\Type(type="integer")
     */
    private $isPublic = 1;

    /**
     * @var \Checklist\Entity\TaxaComments
     *
     * @ORM\ManyToOne(targetEntity="Checklist\Entity\TaxaComments")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="parentid", referencedColumnName="cltaxacommentsid")
     * })
     */
    private $parentCommentId;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="initialtimestamp", type="datetime")
     * @Assert\DateTime
     */
    private $initialTimestamp;

    /**
     * @return int|null
     */
    public function getId(): ?int
    {
        return $this->id;
    }

    public function getChecklistId(): ?Checklists
    {
        return $this->checklistId;
    }

    public function setChecklistId(?Checklists $checklistId): self
    {
        $this->checklistId = $checklistId;

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

    public function getComment(): ?string
    {
        return $this->comment;
    }

    public function setComment(string $comment): self
    {
        $this->comment = $comment;

        return $this;
    }

    public function getIsPublic(): ?int
    {
        return $this->isPublic;
    }

    public function setIsPublic(int $isPublic): self
    {
        $this->isPublic = $isPublic;

        return $this;
    }

    public function getParentCommentId(): ?TaxaComments
    {
        return $this->parentCommentId;
    }

    public function setParentCommentId(?TaxaComments $parentCommentId): self
    {
        $this->parentCommentId = $parentCommentId;

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
