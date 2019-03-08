<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * KeyCharacterHeading
 *
 * @ORM\Table(name="kmcharheading", uniqueConstraints={@ORM\UniqueConstraint(name="unique_kmcharheading", columns={"headingname", "langid"})}, indexes={@ORM\Index(name="FK_kmcharheading_lang_idx", columns={"langid"}), @ORM\Index(name="HeadingName", columns={"headingname"})})
 * @ORM\Entity(repositoryClass="App\Repository\KeyCharacterHeadingRepository")
 */
class KeyCharacterHeading
{
    /**
     * @var int
     *
     * @ORM\Column(name="hid", type="integer", nullable=false, options={"unsigned"=true})
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $hid;

    /**
     * @var string
     *
     * @ORM\Column(name="headingname", type="string", length=255, nullable=false)
     */
    private $headingname;

    /**
     * @var string
     *
     * @ORM\Column(name="language", type="string", length=45, nullable=false, options={"default"="English"})
     */
    private $language = 'English';

    /**
     * @var \LookupLanguages
     *
     * @ORM\ManyToOne(targetEntity="LookupLanguages")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="langid", referencedColumnName="langid")
     * })
     */
    private $langid;

    /**
     * @var string|null
     *
     * @ORM\Column(name="notes", type="text", length=0, nullable=true, options={"default"=NULL})
     */
    private $notes = 'NULL';

    /**
     * @var int|null
     *
     * @ORM\Column(name="sortsequence", type="integer", nullable=true, options={"default"=NULL})
     */
    private $sortsequence = 'NULL';

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="initialtimestamp", type="datetime", nullable=false, options={"default"="CURRENT_TIMESTAMP"})
     */
    private $initialtimestamp = 'CURRENT_TIMESTAMP';

    public function getHid(): ?int
    {
        return $this->hid;
    }

    public function getHeadingname(): ?string
    {
        return $this->headingname;
    }

    public function setHeadingname(string $headingname): self
    {
        $this->headingname = $headingname;

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

    public function getSortsequence(): ?int
    {
        return $this->sortsequence;
    }

    public function setSortsequence(?int $sortsequence): self
    {
        $this->sortsequence = $sortsequence;

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

    public function getLangid(): ?LookupLanguages
    {
        return $this->langid;
    }

    public function setLangid(?LookupLanguages $langid): self
    {
        $this->langid = $langid;

        return $this;
    }


}
