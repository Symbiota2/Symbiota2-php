<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * ExsiccatiNumbers
 *
 * @ORM\Table(name="omexsiccatinumbers", uniqueConstraints={@ORM\UniqueConstraint(name="Index_omexsiccatinumbers_unique", columns={"exsnumber", "ometid"})}, indexes={@ORM\Index(name="FK_exsiccatiTitleNumber", columns={"ometid"})})
 * @ORM\Entity(repositoryClass="App\Repository\ExsiccatiNumbersRepository")
 */
class ExsiccatiNumbers
{
    /**
     * @var int
     *
     * @ORM\Column(name="omenid", type="integer", nullable=false, options={"unsigned"=true})
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $omenid;

    /**
     * @var string
     *
     * @ORM\Column(name="exsnumber", type="string", length=45, nullable=false)
     */
    private $exsnumber;

    /**
     * @var \ExsiccatiTitles
     *
     * @ORM\ManyToOne(targetEntity="ExsiccatiTitles")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="ometid", referencedColumnName="ometid")
     * })
     */
    private $ometid;

    /**
     * @var string|null
     *
     * @ORM\Column(name="notes", type="string", length=250, nullable=true, options={"default"=NULL})
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
     * @ORM\ManyToMany(targetEntity="Occurrences", inversedBy="omenid")
     * @ORM\JoinTable(name="omexsiccatiocclink",
     *   joinColumns={
     *     @ORM\JoinColumn(name="omenid", referencedColumnName="omenid")
     *   },
     *   inverseJoinColumns={
     *     @ORM\JoinColumn(name="occid", referencedColumnName="occid")
     *   }
     * )
     */
    private $occid;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->occid = new \Doctrine\Common\Collections\ArrayCollection();
    }

    public function getOmenid(): ?int
    {
        return $this->omenid;
    }

    public function getExsnumber(): ?string
    {
        return $this->exsnumber;
    }

    public function setExsnumber(string $exsnumber): self
    {
        $this->exsnumber = $exsnumber;

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

    public function getOmetid(): ?ExsiccatiTitles
    {
        return $this->ometid;
    }

    public function setOmetid(?ExsiccatiTitles $ometid): self
    {
        $this->ometid = $ometid;

        return $this;
    }

    /**
     * @return Collection|Occurrences[]
     */
    public function getOccid(): Collection
    {
        return $this->occid;
    }

    public function addOccid(Occurrences $occid): self
    {
        if (!$this->occid->contains($occid)) {
            $this->occid[] = $occid;
        }

        return $this;
    }

    public function removeOccid(Occurrences $occid): self
    {
        if ($this->occid->contains($occid)) {
            $this->occid->removeElement($occid);
        }

        return $this;
    }

}
