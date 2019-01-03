<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * Omoccurduplicates
 *
 * @ORM\Table(name="omoccurduplicates")
 * @ORM\Entity(repositoryClass="App\Repository\OmoccurduplicatesRepository")
 */
class Omoccurduplicates
{
    /**
     * @var int
     *
     * @ORM\Column(name="duplicateid", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $duplicateid;

    /**
     * @var string
     *
     * @ORM\Column(name="title", type="string", length=50, nullable=false)
     */
    private $title;

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
     * @var string
     *
     * @ORM\Column(name="dupeType", type="string", length=45, nullable=false, options={"default"="Exact Duplicate"})
     */
    private $dupetype = 'Exact Duplicate';

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="initialTimestamp", type="datetime", nullable=false, options={"default"="CURRENT_TIMESTAMP"})
     */
    private $initialtimestamp = 'CURRENT_TIMESTAMP';

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="Omoccurrences", mappedBy="duplicateid")
     */
    private $occid;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->occid = new \Doctrine\Common\Collections\ArrayCollection();
    }

    public function getDuplicateid(): ?int
    {
        return $this->duplicateid;
    }

    public function getTitle(): ?string
    {
        return $this->title;
    }

    public function setTitle(string $title): self
    {
        $this->title = $title;

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

    public function getDupetype(): ?string
    {
        return $this->dupetype;
    }

    public function setDupetype(string $dupetype): self
    {
        $this->dupetype = $dupetype;

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
     * @return Collection|Omoccurrences[]
     */
    public function getOccid(): Collection
    {
        return $this->occid;
    }

    public function addOccid(Omoccurrences $occid): self
    {
        if (!$this->occid->contains($occid)) {
            $this->occid[] = $occid;
            $occid->addDuplicateid($this);
        }

        return $this;
    }

    public function removeOccid(Omoccurrences $occid): self
    {
        if ($this->occid->contains($occid)) {
            $this->occid->removeElement($occid);
            $occid->removeDuplicateid($this);
        }

        return $this;
    }

}
