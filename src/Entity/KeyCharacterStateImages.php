<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Annotation\Groups;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * KeyCharacterStateImages
 *
 * @ORM\Table(name="kmcsimages", indexes={@ORM\Index(name="FK_kscsimages_kscs_idx", columns={"kmcsid"})})
 * @ORM\Entity(repositoryClass="App\Repository\KeyCharacterStateImagesRepository")
 * @ApiResource(
 *     itemOperations={"get"},
 *     collectionOperations={"get"}
 * )
 */
class KeyCharacterStateImages implements InitialTimestampInterface
{
    /**
     * @var int
     *
     * @ORM\Column(name="csimgid", type="integer", options={"unsigned"=true})
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var \App\Entity\KeyCharacterStates
     *
     * @ORM\ManyToOne(targetEntity="\App\Entity\KeyCharacterStates")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="kmcsid", referencedColumnName="kmcsid", nullable=false)
     * })
     */
    private $characterStateId;

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
     * @ORM\Column(name="notes", type="string", length=250, nullable=true)
     * @Assert\Length(max=250)
     */
    private $notes;

    /**
     * @var string
     *
     * @ORM\Column(name="sortsequence", type="integer", options={"default"="50","unsigned"=true})
     * @Assert\NotBlank()
     * @Assert\Type(type="integer")
     */
    private $sortSequence = 50;

    /**
     * @var string|null
     *
     * @ORM\Column(name="username", type="string", length=45, nullable=true)
     * @Assert\Length(max=45)
     */
    private $username;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="initialtimestamp", type="datetime")
     * @Assert\DateTime
     */
    private $initialTimestamp;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getCharacterStateId(): ?KeyCharacterStates
    {
        return $this->characterStateId;
    }

    public function setCharacterStateId(?KeyCharacterStates $characterStateId): self
    {
        $this->characterStateId = $characterStateId;

        return $this;
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

    public function getNotes(): ?string
    {
        return $this->notes;
    }

    public function setNotes(?string $notes): self
    {
        $this->notes = $notes;

        return $this;
    }

    public function getSortSequence(): ?string
    {
        return $this->sortSequence;
    }

    public function setSortSequence(string $sortSequence): self
    {
        $this->sortSequence = $sortSequence;

        return $this;
    }

    public function getUsername(): ?string
    {
        return $this->username;
    }

    public function setUsername(?string $username): self
    {
        $this->username = $username;

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


}
