<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * Omcollcategories
 *
 * @ORM\Table(name="omcollcategories")
 * @ORM\Entity(repositoryClass="App\Repository\OmcollcategoriesRepository")
 */
class Omcollcategories
{
    /**
     * @var int
     *
     * @ORM\Column(name="ccpk", type="integer", nullable=false, options={"unsigned"=true})
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $ccpk;

    /**
     * @var string
     *
     * @ORM\Column(name="category", type="string", length=75, nullable=false)
     */
    private $category;

    /**
     * @var string|null
     *
     * @ORM\Column(name="icon", type="string", length=250, nullable=true, options={"default"="NULL"})
     */
    private $icon = 'NULL';

    /**
     * @var string|null
     *
     * @ORM\Column(name="acronym", type="string", length=45, nullable=true, options={"default"="NULL"})
     */
    private $acronym = 'NULL';

    /**
     * @var string|null
     *
     * @ORM\Column(name="url", type="string", length=250, nullable=true, options={"default"="NULL"})
     */
    private $url = 'NULL';

    /**
     * @var int|null
     *
     * @ORM\Column(name="inclusive", type="integer", nullable=true, options={"default"="1"})
     */
    private $inclusive = '1';

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
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="Omcollections", inversedBy="ccpk")
     * @ORM\JoinTable(name="omcollcatlink",
     *   joinColumns={
     *     @ORM\JoinColumn(name="ccpk", referencedColumnName="ccpk")
     *   },
     *   inverseJoinColumns={
     *     @ORM\JoinColumn(name="collid", referencedColumnName="CollID")
     *   }
     * )
     */
    private $collid;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->collid = new \Doctrine\Common\Collections\ArrayCollection();
    }

    public function getCcpk(): ?int
    {
        return $this->ccpk;
    }

    public function getCategory(): ?string
    {
        return $this->category;
    }

    public function setCategory(string $category): self
    {
        $this->category = $category;

        return $this;
    }

    public function getIcon(): ?string
    {
        return $this->icon;
    }

    public function setIcon(?string $icon): self
    {
        $this->icon = $icon;

        return $this;
    }

    public function getAcronym(): ?string
    {
        return $this->acronym;
    }

    public function setAcronym(?string $acronym): self
    {
        $this->acronym = $acronym;

        return $this;
    }

    public function getUrl(): ?string
    {
        return $this->url;
    }

    public function setUrl(?string $url): self
    {
        $this->url = $url;

        return $this;
    }

    public function getInclusive(): ?int
    {
        return $this->inclusive;
    }

    public function setInclusive(?int $inclusive): self
    {
        $this->inclusive = $inclusive;

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
     * @return Collection|Omcollections[]
     */
    public function getCollid(): Collection
    {
        return $this->collid;
    }

    public function addCollid(Omcollections $collid): self
    {
        if (!$this->collid->contains($collid)) {
            $this->collid[] = $collid;
        }

        return $this;
    }

    public function removeCollid(Omcollections $collid): self
    {
        if ($this->collid->contains($collid)) {
            $this->collid->removeElement($collid);
        }

        return $this;
    }

}
