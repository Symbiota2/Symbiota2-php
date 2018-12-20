<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * Taxadescrblock
 *
 * @ORM\Table(name="taxadescrblock", uniqueConstraints={@ORM\UniqueConstraint(name="Index_unique", columns={"tid", "displaylevel", "language"})}, indexes={@ORM\Index(name="FK_taxadesc_lang_idx", columns={"langid"}), @ORM\Index(name="IDX_17AB94AF52596C31", columns={"tid"})})
 * @ORM\Entity(repositoryClass="App\Repository\TaxadescrblockRepository")
 */
class Taxadescrblock
{
    /**
     * @var int
     *
     * @ORM\Column(name="tdbid", type="integer", nullable=false, options={"unsigned"=true})
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $tdbid;

    /**
     * @var string|null
     *
     * @ORM\Column(name="caption", type="string", length=40, nullable=true, options={"default"="NULL"})
     */
    private $caption = 'NULL';

    /**
     * @var string|null
     *
     * @ORM\Column(name="source", type="string", length=250, nullable=true, options={"default"="NULL"})
     */
    private $source = 'NULL';

    /**
     * @var string|null
     *
     * @ORM\Column(name="sourceurl", type="string", length=250, nullable=true, options={"default"="NULL"})
     */
    private $sourceurl = 'NULL';

    /**
     * @var string|null
     *
     * @ORM\Column(name="language", type="string", length=45, nullable=true, options={"default"="'English'"})
     */
    private $language = '\'English\'';

    /**
     * @var int
     *
     * @ORM\Column(name="displaylevel", type="integer", nullable=false, options={"default"="1","unsigned"=true,"comment"="1 = short descr, 2 = intermediate descr"})
     */
    private $displaylevel = '1';

    /**
     * @var int
     *
     * @ORM\Column(name="uid", type="integer", nullable=false, options={"unsigned"=true})
     */
    private $uid;

    /**
     * @var string|null
     *
     * @ORM\Column(name="notes", type="string", length=250, nullable=true, options={"default"="NULL"})
     */
    private $notes = 'NULL';

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="initialtimestamp", type="datetime", nullable=false, options={"default"="current_timestamp()"})
     */
    private $initialtimestamp = 'current_timestamp()';

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

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="Taxaprofilepubs", inversedBy="tdbid")
     * @ORM\JoinTable(name="taxaprofilepubdesclink",
     *   joinColumns={
     *     @ORM\JoinColumn(name="tdbid", referencedColumnName="tdbid")
     *   },
     *   inverseJoinColumns={
     *     @ORM\JoinColumn(name="tppid", referencedColumnName="tppid")
     *   }
     * )
     */
    private $tppid;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->tppid = new \Doctrine\Common\Collections\ArrayCollection();
    }

    public function getTdbid(): ?int
    {
        return $this->tdbid;
    }

    public function getCaption(): ?string
    {
        return $this->caption;
    }

    public function setCaption(?string $caption): self
    {
        $this->caption = $caption;

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

    public function getSourceurl(): ?string
    {
        return $this->sourceurl;
    }

    public function setSourceurl(?string $sourceurl): self
    {
        $this->sourceurl = $sourceurl;

        return $this;
    }

    public function getLanguage(): ?string
    {
        return $this->language;
    }

    public function setLanguage(?string $language): self
    {
        $this->language = $language;

        return $this;
    }

    public function getDisplaylevel(): ?int
    {
        return $this->displaylevel;
    }

    public function setDisplaylevel(int $displaylevel): self
    {
        $this->displaylevel = $displaylevel;

        return $this;
    }

    public function getUid(): ?int
    {
        return $this->uid;
    }

    public function setUid(int $uid): self
    {
        $this->uid = $uid;

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

    /**
     * @return Collection|Taxaprofilepubs[]
     */
    public function getTppid(): Collection
    {
        return $this->tppid;
    }

    public function addTppid(Taxaprofilepubs $tppid): self
    {
        if (!$this->tppid->contains($tppid)) {
            $this->tppid[] = $tppid;
        }

        return $this;
    }

    public function removeTppid(Taxaprofilepubs $tppid): self
    {
        if ($this->tppid->contains($tppid)) {
            $this->tppid->removeElement($tppid);
        }

        return $this;
    }

}
