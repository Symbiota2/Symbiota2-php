<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Security\Core\User\UserInterface;
use Symfony\Component\Serializer\Annotation\Groups;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * ChecklistTaxaComments
 *
 * @ORM\Table(name="fmcltaxacomments", indexes={@ORM\Index(name="FK_clcomment_users", columns={"createduid"}), @ORM\Index(name="FK_clcomment_cltaxa", columns={"clid", "tid"})})
 * @ORM\Entity(repositoryClass="App\Repository\ChecklistTaxaCommentsRepository")
 * @ApiResource(
 *     itemOperations={"get"},
 *     collectionOperations={"get"}
 * )
 */
class ChecklistTaxaComments implements CreatedUserIdInterface, InitialTimestampInterface
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
     * @var int
     *
     * @ORM\Column(name="clid", type="integer", options={"unsigned"=true})
     * @Assert\NotBlank()
     * @Assert\Type(type="integer")
     */
    private $checklistId;

    /**
     * @var int
     *
     * @ORM\Column(name="tid", type="integer", options={"unsigned"=true})
     * @Assert\NotBlank()
     * @Assert\Type(type="integer")
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
     * @var \App\Entity\Users
     *
     * @ORM\ManyToOne(targetEntity="\App\Entity\Users")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="createduid", referencedColumnName="uid")
     * })
     * @Assert\NotBlank()
     * @Assert\Type(type="integer")
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
     * @var int|null
     *
     * @ORM\Column(name="parentid", type="integer", nullable=true)
     * @Assert\Type(type="integer")
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

    /**
     * @return int|null
     */
    public function getChecklistId(): ?int
    {
        return $this->checklistId;
    }

    /**
     * @param int $checklistId
     * @return ChecklistTaxaComments
     */
    public function setChecklistId(int $checklistId): self
    {
        $this->checklistId = $checklistId;

        return $this;
    }

    /**
     * @return int|null
     */
    public function getTaxaId(): ?int
    {
        return $this->taxaId;
    }

    public function setTaxaId(int $taxaId): self
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

    public function getParentCommentId(): ?int
    {
        return $this->parentCommentId;
    }

    public function setParentCommentId(?int $parentCommentId): self
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
