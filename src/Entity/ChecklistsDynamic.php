<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * ChecklistsDynamic
 *
 * @ORM\Table(name="fmdynamicchecklists")
 * @ORM\Entity(repositoryClass="App\Repository\ChecklistsDynamicRepository")
 */
class ChecklistsDynamic
{
    /**
     * @var int
     *
     * @ORM\Column(name="dynclid", type="integer", nullable=false, options={"unsigned"=true})
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $dynclid;

    /**
     * @var string|null
     *
     * @ORM\Column(name="name", type="string", length=50, nullable=true, options={"default"=NULL})
     */
    private $name = 'NULL';

    /**
     * @var string|null
     *
     * @ORM\Column(name="details", type="string", length=250, nullable=true, options={"default"=NULL})
     */
    private $details = 'NULL';

    /**
     * @var string
     *
     * @ORM\Column(name="type", type="string", length=45, nullable=false, options={"default"="DynamicList"})
     */
    private $type = 'DynamicList';

    /**
     * @var string|null
     *
     * @ORM\Column(name="notes", type="string", length=250, nullable=true, options={"default"=NULL})
     */
    private $notes = 'NULL';

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="expiration", type="datetime", nullable=false)
     */
    private $expiration;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="initialtimestamp", type="datetime", nullable=false, options={"default"="CURRENT_TIMESTAMP"})
     */
    private $initialtimestamp = 'CURRENT_TIMESTAMP';

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="Taxa", inversedBy="dynclid")
     * @ORM\JoinTable(name="fmdyncltaxalink",
     *   joinColumns={
     *     @ORM\JoinColumn(name="dynclid", referencedColumnName="dynclid")
     *   },
     *   inverseJoinColumns={
     *     @ORM\JoinColumn(name="tid", referencedColumnName="TID")
     *   }
     * )
     */
    private $tid;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->tid = new \Doctrine\Common\Collections\ArrayCollection();
    }

    public function getDynclid(): ?int
    {
        return $this->dynclid;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(?string $name): self
    {
        $this->name = $name;

        return $this;
    }

    public function getDetails(): ?string
    {
        return $this->details;
    }

    public function setDetails(?string $details): self
    {
        $this->details = $details;

        return $this;
    }

    public function getType(): ?string
    {
        return $this->type;
    }

    public function setType(string $type): self
    {
        $this->type = $type;

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

    public function getExpiration(): ?\DateTimeInterface
    {
        return $this->expiration;
    }

    public function setExpiration(\DateTimeInterface $expiration): self
    {
        $this->expiration = $expiration;

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
     * @return Collection|Taxa[]
     */
    public function getTid(): Collection
    {
        return $this->tid;
    }

    public function addTid(Taxa $tid): self
    {
        if (!$this->tid->contains($tid)) {
            $this->tid[] = $tid;
        }

        return $this;
    }

    public function removeTid(Taxa $tid): self
    {
        if ($this->tid->contains($tid)) {
            $this->tid->removeElement($tid);
        }

        return $this;
    }

}
