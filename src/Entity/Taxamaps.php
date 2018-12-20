<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * Taxamaps
 *
 * @ORM\Table(name="taxamaps", indexes={@ORM\Index(name="FK_tid_idx", columns={"tid"})})
 * @ORM\Entity(repositoryClass="App\Repository\TaxamapsRepository")
 */
class Taxamaps
{
    /**
     * @var int
     *
     * @ORM\Column(name="mid", type="integer", nullable=false, options={"unsigned"=true})
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $mid;

    /**
     * @var string
     *
     * @ORM\Column(name="url", type="string", length=255, nullable=false)
     */
    private $url;

    /**
     * @var string|null
     *
     * @ORM\Column(name="title", type="string", length=100, nullable=true, options={"default"="NULL"})
     */
    private $title = 'NULL';

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="initialtimestamp", type="datetime", nullable=false, options={"default"="current_timestamp()"})
     */
    private $initialtimestamp = 'current_timestamp()';

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
     * @ORM\ManyToMany(targetEntity="Taxaprofilepubs", inversedBy="mid")
     * @ORM\JoinTable(name="taxaprofilepubmaplink",
     *   joinColumns={
     *     @ORM\JoinColumn(name="mid", referencedColumnName="mid")
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

    public function getMid(): ?int
    {
        return $this->mid;
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

    public function getTitle(): ?string
    {
        return $this->title;
    }

    public function setTitle(?string $title): self
    {
        $this->title = $title;

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
