<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Taxavernaculars
 *
 * @ORM\Table(name="taxavernaculars", uniqueConstraints={@ORM\UniqueConstraint(name="unique_key", columns={"Language", "VernacularName", "tid"})}, indexes={@ORM\Index(name="FK_vern_lang_idx", columns={"langid"}), @ORM\Index(name="tid1", columns={"tid"}), @ORM\Index(name="vernacularsnames", columns={"VernacularName"})})
 * @ORM\Entity(repositoryClass="App\Repository\TaxavernacularsRepository")
 */
class Taxavernaculars
{
    /**
     * @var string
     *
     * @ORM\Column(name="VernacularName", type="string", length=80, nullable=false)
     */
    private $vernacularname;

    /**
     * @var string
     *
     * @ORM\Column(name="Language", type="string", length=15, nullable=false, options={"default"="English"})
     */
    private $language = 'English';

    /**
     * @var string|null
     *
     * @ORM\Column(name="Source", type="string", length=50, nullable=true, options={"default"=NULL})
     */
    private $source = 'NULL';

    /**
     * @var string|null
     *
     * @ORM\Column(name="notes", type="string", length=250, nullable=true, options={"default"=NULL})
     */
    private $notes = 'NULL';

    /**
     * @var string|null
     *
     * @ORM\Column(name="username", type="string", length=45, nullable=true, options={"default"=NULL})
     */
    private $username = 'NULL';

    /**
     * @var int|null
     *
     * @ORM\Column(name="isupperterm", type="integer", nullable=true, options={"default"=NULL})
     */
    private $isupperterm = 'NULL';

    /**
     * @var int|null
     *
     * @ORM\Column(name="SortSequence", type="integer", nullable=true, options={"default"="50"})
     */
    private $sortsequence = '50';

    /**
     * @var int
     *
     * @ORM\Column(name="VID", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $vid;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="InitialTimeStamp", type="datetime", nullable=false, options={"default"="CURRENT_TIMESTAMP"})
     */
    private $initialtimestamp = 'CURRENT_TIMESTAMP';

    /**
     * @var \Adminlanguages
     *
     * @ORM\ManyToOne(targetEntity="Adminlanguages")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="langid", referencedColumnName="langid")
     * })
     */
    private $langid;

    /**
     * @var \Taxa
     *
     * @ORM\ManyToOne(targetEntity="Taxa")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="tid", referencedColumnName="TID")
     * })
     */
    private $tid;

    public function getVernacularname(): ?string
    {
        return $this->vernacularname;
    }

    public function setVernacularname(string $vernacularname): self
    {
        $this->vernacularname = $vernacularname;

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

    public function getSource(): ?string
    {
        return $this->source;
    }

    public function setSource(?string $source): self
    {
        $this->source = $source;

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

    public function getUsername(): ?string
    {
        return $this->username;
    }

    public function setUsername(?string $username): self
    {
        $this->username = $username;

        return $this;
    }

    public function getIsupperterm(): ?int
    {
        return $this->isupperterm;
    }

    public function setIsupperterm(?int $isupperterm): self
    {
        $this->isupperterm = $isupperterm;

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

    public function getVid(): ?int
    {
        return $this->vid;
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

    public function getLangid(): ?Adminlanguages
    {
        return $this->langid;
    }

    public function setLangid(?Adminlanguages $langid): self
    {
        $this->langid = $langid;

        return $this;
    }

    public function getTid(): ?Taxa
    {
        return $this->tid;
    }

    public function setTid(?Taxa $tid): self
    {
        $this->tid = $tid;

        return $this;
    }


}
