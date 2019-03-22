<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Annotation\Groups;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * KeyCharacterLanguages
 *
 * @ORM\Table(name="kmcharacterlang")
 * @ORM\Entity(repositoryClass="App\Repository\KeyCharacterLanguagesRepository")
 * @ApiResource(
 *     itemOperations={"get"},
 *     collectionOperations={"get"}
 * )
 */
class KeyCharacterLanguages implements InitialTimestampInterface
{
    /**
     * @var \App\Entity\KeyCharacters
     *
     * @ORM\Id
     * @ORM\ManyToOne(targetEntity="\App\Entity\KeyCharacters")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="cid", referencedColumnName="cid")
     * })
     * @Assert\NotBlank()
     */
    private $characterId;

    /**
     * @var string
     *
     * @ORM\Column(name="charname", type="string", length=150)
     * @Assert\NotBlank()
     * @Assert\Length(max=150)
     */
    private $characterName;

    /**
     * @var string
     *
     * @ORM\Column(name="language", type="string", length=45)
     * @Assert\NotBlank()
     * @Assert\Length(max=45)
     */
    private $language;

    /**
     * @var \App\Entity\LookupLanguages
     *
     * @ORM\Id
     * @ORM\ManyToOne(targetEntity="\App\Entity\LookupLanguages")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="langid", referencedColumnName="langid")
     * })
     * @Assert\NotBlank()
     */
    private $languageId;

    /**
     * @var string|null
     *
     * @ORM\Column(name="description", type="string", length=255, nullable=true)
     * @Assert\Length(max=255)
     */
    private $description;

    /**
     * @var string|null
     *
     * @ORM\Column(name="notes", type="string", length=255, nullable=true)
     * @Assert\Length(max=255)
     */
    private $notes;

    /**
     * @var string|null
     *
     * @ORM\Column(name="helpurl", type="string", length=500, nullable=true)
     * @Assert\Length(max=500)
     */
    private $helpUrl;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="initialtimestamp", type="datetime")
     * @Assert\DateTime
     */
    private $initialTimestamp;

    public function getCharacterId(): ?KeyCharacters
    {
        return $this->characterId;
    }

    public function setCharacterId(?KeyCharacters $characterId): self
    {
        $this->characterId = $characterId;

        return $this;
    }

    public function getCharacterName(): ?string
    {
        return $this->characterName;
    }

    public function setCharacterName(string $characterName): self
    {
        $this->characterName = $characterName;

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

    public function getLanguage(): ?string
    {
        return $this->language;
    }

    public function setLanguage(string $language): self
    {
        $this->language = $language;

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

    public function getNotes(): ?string
    {
        return $this->notes;
    }

    public function setNotes(?string $notes): self
    {
        $this->notes = $notes;

        return $this;
    }

    public function getHelpUrl(): ?string
    {
        return $this->helpUrl;
    }

    public function setHelpUrl(?string $helpUrl): self
    {
        $this->helpUrl = $helpUrl;

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
