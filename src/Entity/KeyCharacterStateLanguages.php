<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Annotation\Groups;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * KeyCharacterStateLanguages
 *
 * @ORM\Table(name="kmcslang", indexes={@ORM\Index(name="FK_cslang_lang_idx", columns={"langid"})})
 * @ORM\Entity()
 * @ApiResource(
 *     itemOperations={"get"},
 *     collectionOperations={"get"}
 * )
 */
class KeyCharacterStateLanguages implements InitialTimestampInterface
{
    /**
     * @var \App\Entity\KeyCharacterStates
     *
     * @ORM\Id
     * @ORM\ManyToOne(targetEntity="\App\Entity\KeyCharacterStates")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="kmcsid", referencedColumnName="kmcsid", nullable=false)
     * })
     */
    private $characterStateId;

    /**
     * @var string
     *
     * @ORM\Column(name="cs", type="string", length=16)
     * @Assert\NotBlank()
     * @Assert\Length(max=16)
     */
    private $characterState;

    /**
     * @var string
     *
     * @ORM\Column(name="charstatename", type="string", length=150)
     * @Assert\NotBlank()
     * @Assert\Length(max=150)
     */
    private $characterStateName;

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
     *   @ORM\JoinColumn(name="langid", referencedColumnName="langid", nullable=false)
     * })
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
     * @var \DateTime
     *
     * @ORM\Column(name="initialtimestamp", type="datetime")
     * @Assert\DateTime
     */
    private $initialTimestamp;

    public function getCharacterStateId(): ?KeyCharacterStates
    {
        return $this->characterStateId;
    }

    public function setCharacterStateId(?KeyCharacterStates $characterStateId): self
    {
        $this->characterStateId = $characterStateId;

        return $this;
    }

    public function getCharacterState(): ?string
    {
        return $this->characterState;
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

    public function getCharacterStateName(): ?string
    {
        return $this->characterStateName;
    }

    public function setCharacterStateName(string $characterStateName): self
    {
        $this->characterStateName = $characterStateName;

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
