<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Annotation\Groups;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * KeyCharacterHeading
 *
 * @ORM\Table(name="kmcharheading", uniqueConstraints={@ORM\UniqueConstraint(name="unique_kmcharheading", columns={"headingname", "langid"})}, indexes={@ORM\Index(name="FK_kmcharheading_lang_idx", columns={"langid"}), @ORM\Index(name="HeadingName", columns={"headingname"})})
 * @ORM\Entity(repositoryClass="App\Repository\KeyCharacterHeadingRepository")
 * @ApiResource(
 *     itemOperations={"get"},
 *     collectionOperations={"get"}
 * )
 */
class KeyCharacterHeading implements InitialTimestampInterface
{
    /**
     * @var int
     *
     * @ORM\Column(name="hid", type="integer", options={"unsigned"=true})
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="headingname", type="string", length=255)
     * @Assert\NotBlank()
     * @Assert\Length(max=255)
     */
    private $headingName;

    /**
     * @var string
     *
     * @ORM\Column(name="language", type="string", length=45, options={"default"="English"})
     * @Assert\NotBlank()
     * @Assert\Length(max=45)
     */
    private $language = 'English';

    /**
     * @var \App\Entity\LookupLanguages
     *
     * @ORM\ManyToOne(targetEntity="\App\Entity\LookupLanguages")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="langid", referencedColumnName="langid", nullable=false)
     * })
     */
    private $languageId;

    /**
     * @var string|null
     *
     * @ORM\Column(name="notes", type="text", length=0, nullable=true)
     */
    private $notes;

    /**
     * @var int|null
     *
     * @ORM\Column(name="sortsequence", type="integer", nullable=true)
     * @Assert\Type(type="integer")
     */
    private $sortSequence;

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

    public function getHeadingName(): ?string
    {
        return $this->headingName;
    }

    public function setHeadingName(string $headingName): self
    {
        $this->headingName = $headingName;

        return $this;
    }

    public function getLanguage(): ?string
    {
        return $this->language;
    }

    public function setLanguage(string $language): self
    {
        $this->language = $language;

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

    public function getInitialTimestamp(): ?\DateTimeInterface
    {
        return $this->initialTimestamp;
    }

    public function setInitialTimestamp(\DateTimeInterface $initialTimestamp): InitialTimestampInterface
    {
        $this->initialTimestamp = $initialTimestamp;

        return $this;
    }

    public function getLanguageId(): ?LookupLanguages
    {
        return $this->languageId;
    }

    public function setLanguageId(?LookupLanguages $languageId): self
    {
        $this->languageId = $languageId;

        return $this;
    }


}
