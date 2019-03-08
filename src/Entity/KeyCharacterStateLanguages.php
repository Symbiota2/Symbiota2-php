<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * KeyCharacterStateLanguages
 *
 * @ORM\Table(name="kmcslang", indexes={@ORM\Index(name="FK_cslang_lang_idx", columns={"langid"})})
 * @ORM\Entity(repositoryClass="App\Repository\KeyCharacterStateLanguagesRepository")
 */
class KeyCharacterStateLanguages
{
    /**
     * @var int
     *
     * @ORM\Column(name="cid", type="integer", nullable=false, options={"unsigned"=true})
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     */
    private $cid;

    /**
     * @var string
     *
     * @ORM\Column(name="cs", type="string", length=16, nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     */
    private $cs;

    /**
     * @var string
     *
     * @ORM\Column(name="charstatename", type="string", length=150, nullable=false)
     */
    private $charstatename;

    /**
     * @var string
     *
     * @ORM\Column(name="language", type="string", length=45, nullable=false)
     */
    private $language;

    /**
     * @var int
     *
     * @ORM\Column(name="langid", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     */
    private $langid;

    /**
     * @var string|null
     *
     * @ORM\Column(name="description", type="string", length=255, nullable=true, options={"default"=NULL})
     */
    private $description = 'NULL';

    /**
     * @var string|null
     *
     * @ORM\Column(name="notes", type="string", length=255, nullable=true, options={"default"=NULL})
     */
    private $notes = 'NULL';

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="initialtimestamp", type="datetime", nullable=false, options={"default"="CURRENT_TIMESTAMP"})
     */
    private $initialtimestamp = 'CURRENT_TIMESTAMP';

    public function getCid(): ?int
    {
        return $this->cid;
    }

    public function getCs(): ?string
    {
        return $this->cs;
    }

    public function getLangid(): ?int
    {
        return $this->langid;
    }

    public function getCharstatename(): ?string
    {
        return $this->charstatename;
    }

    public function setCharstatename(string $charstatename): self
    {
        $this->charstatename = $charstatename;

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

    public function getInitialtimestamp(): ?\DateTimeInterface
    {
        return $this->initialtimestamp;
    }

    public function setInitialtimestamp(\DateTimeInterface $initialtimestamp): self
    {
        $this->initialtimestamp = $initialtimestamp;

        return $this;
    }


}
