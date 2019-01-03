<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * Adminlanguages
 *
 * @ORM\Table(name="adminlanguages", uniqueConstraints={@ORM\UniqueConstraint(name="index_langname_unique", columns={"langname"})})
 * @ORM\Entity(repositoryClass="App\Repository\AdminlanguagesRepository")
 */
class Adminlanguages
{
    /**
     * @var int
     *
     * @ORM\Column(name="langid", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $langid;

    /**
     * @var string
     *
     * @ORM\Column(name="langname", type="string", length=45, nullable=false)
     */
    private $langname;

    /**
     * @var string|null
     *
     * @ORM\Column(name="iso639_1", type="string", length=10, nullable=true, options={"default"=NULL})
     */
    private $iso6391 = 'NULL';

    /**
     * @var string|null
     *
     * @ORM\Column(name="iso639_2", type="string", length=10, nullable=true, options={"default"=NULL})
     */
    private $iso6392 = 'NULL';

    /**
     * @var string|null
     *
     * @ORM\Column(name="notes", type="string", length=45, nullable=true, options={"default"=NULL})
     */
    private $notes = 'NULL';

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="initialtimestamp", type="datetime", nullable=false, options={"default"="CURRENT_TIMESTAMP"})
     */
    private $initialtimestamp = 'CURRENT_TIMESTAMP';

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="Kmcharacters", mappedBy="langid")
     */
    private $cid;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->cid = new \Doctrine\Common\Collections\ArrayCollection();
    }

    public function getLangid(): ?int
    {
        return $this->langid;
    }

    public function getLangname(): ?string
    {
        return $this->langname;
    }

    public function setLangname(string $langname): self
    {
        $this->langname = $langname;

        return $this;
    }

    public function getIso6391(): ?string
    {
        return $this->iso6391;
    }

    public function setIso6391(?string $iso6391): self
    {
        $this->iso6391 = $iso6391;

        return $this;
    }

    public function getIso6392(): ?string
    {
        return $this->iso6392;
    }

    public function setIso6392(?string $iso6392): self
    {
        $this->iso6392 = $iso6392;

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

    /**
     * @return Collection|Kmcharacters[]
     */
    public function getCid(): Collection
    {
        return $this->cid;
    }

    public function addCid(Kmcharacters $cid): self
    {
        if (!$this->cid->contains($cid)) {
            $this->cid[] = $cid;
            $cid->addLangid($this);
        }

        return $this;
    }

    public function removeCid(Kmcharacters $cid): self
    {
        if ($this->cid->contains($cid)) {
            $this->cid->removeElement($cid);
            $cid->removeLangid($this);
        }

        return $this;
    }

}
