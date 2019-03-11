<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Security\Core\User\UserInterface;
use Symfony\Component\Serializer\Annotation\Groups;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * GlossaryImages
 *
 * @ORM\Table(name="glossaryimages", indexes={@ORM\Index(name="FK_glossaryimages_uid_idx", columns={"createduid"}), @ORM\Index(name="FK_glossaryimages_gloss", columns={"glossid"})})
 * @ORM\Entity(repositoryClass="App\Repository\GlossaryImagesRepository")
 * @ApiResource(
 *     itemOperations={"get"},
 *     collectionOperations={"get"}
 * )
 */
class GlossaryImages implements CreatedUserIdInterface, InitialTimestampInterface
{
    /**
     * @var int
     *
     * @ORM\Column(name="glimgid", type="integer", options={"unsigned"=true})
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var \App\Entity\Glossary
     *
     * @ORM\ManyToOne(targetEntity="\App\Entity\Glossary")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="glossid", referencedColumnName="glossid")
     * })
     * @Assert\NotBlank()
     */
    private $glossaryId;

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
     * @ORM\Column(name="thumbnailurl", type="string", length=255, nullable=true)
     * @Assert\Length(max=255)
     */
    private $thumbnailUrl;

    /**
     * @var string|null
     *
     * @ORM\Column(name="structures", type="string", length=150, nullable=true)
     * @Assert\Length(max=150)
     */
    private $structures;

    /**
     * @var string|null
     *
     * @ORM\Column(name="notes", type="string", length=250, nullable=true)
     * @Assert\Length(max=250)
     */
    private $notes;

    /**
     * @var string|null
     *
     * @ORM\Column(name="createdBy", type="string", length=250, nullable=true)
     * @Assert\Length(max=250)
     */
    private $createdBy;

    /**
     * @var \App\Entity\Users
     *
     * @ORM\ManyToOne(targetEntity="\App\Entity\Users")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="createduid", referencedColumnName="uid")
     * })
     * @Assert\NotBlank()
     */
    private $createdUserId;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="initialtimestamp", type="datetime")
     * @Assert\NotBlank()
     */
    private $initialTimestamp;

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

    public function getThumbnailUrl(): ?string
    {
        return $this->thumbnailUrl;
    }

    public function setThumbnailUrl(?string $thumbnailUrl): self
    {
        $this->thumbnailUrl = $thumbnailUrl;

        return $this;
    }

    public function getStructures(): ?string
    {
        return $this->structures;
    }

    public function setStructures(?string $structures): self
    {
        $this->structures = $structures;

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

    public function getCreatedBy(): ?string
    {
        return $this->createdBy;
    }

    public function setCreatedBy(?string $createdBy): self
    {
        $this->createdBy = $createdBy;

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

    public function getGlossaryId(): ?Glossary
    {
        return $this->glossaryId;
    }

    public function setGlossaryId(?Glossary $glossaryId): self
    {
        $this->glossaryId = $glossaryId;

        return $this;
    }


}
