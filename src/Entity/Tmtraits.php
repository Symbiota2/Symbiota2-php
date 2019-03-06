<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * Tmtraits
 *
 * @ORM\Table(name="tmtraits", indexes={@ORM\Index(name="FK_traits_uidmodified_idx", columns={"modifieduid"}), @ORM\Index(name="FK_traits_uidcreated_idx", columns={"createduid"}), @ORM\Index(name="traitsname", columns={"traitname"})})
 * @ORM\Entity(repositoryClass="App\Repository\TmtraitsRepository")
 */
class Tmtraits
{
    /**
     * @var int
     *
     * @ORM\Column(name="traitid", type="integer", nullable=false, options={"unsigned"=true})
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $traitid;

    /**
     * @var string
     *
     * @ORM\Column(name="traitname", type="string", length=100, nullable=false)
     */
    private $traitname;

    /**
     * @var string
     *
     * @ORM\Column(name="traittype", type="string", length=2, nullable=false, options={"default"="UM"})
     */
    private $traittype = 'UM';

    /**
     * @var string|null
     *
     * @ORM\Column(name="units", type="string", length=45, nullable=true, options={"default"=NULL})
     */
    private $units = 'NULL';

    /**
     * @var string|null
     *
     * @ORM\Column(name="description", type="string", length=250, nullable=true, options={"default"=NULL})
     */
    private $description = 'NULL';

    /**
     * @var string|null
     *
     * @ORM\Column(name="refurl", type="string", length=250, nullable=true, options={"default"=NULL})
     */
    private $refurl = 'NULL';

    /**
     * @var string|null
     *
     * @ORM\Column(name="notes", type="string", length=250, nullable=true, options={"default"=NULL})
     */
    private $notes = 'NULL';

    /**
     * @var string|null
     *
     * @ORM\Column(name="dynamicProperties", type="text", length=65535, nullable=true, options={"default"=NULL})
     */
    private $dynamicproperties = 'NULL';

    /**
     * @var \Users
     *
     * @ORM\ManyToOne(targetEntity="Users")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="modifieduid", referencedColumnName="uid")
     * })
     */
    private $modifieduid;

    /**
     * @var \DateTime|null
     *
     * @ORM\Column(name="modifiedTimeStamp", type="datetime", nullable=true, options={"default"=NULL})
     */
    private $modifiedtimestamp = 'NULL';

    /**
     * @var \Users
     *
     * @ORM\ManyToOne(targetEntity="Users")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="createduid", referencedColumnName="uid")
     * })
     */
    private $createduid;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="initialtimestamp", type="datetime", nullable=false, options={"default"="CURRENT_TIMESTAMP"})
     */
    private $initialtimestamp = 'CURRENT_TIMESTAMP';

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="Taxa", inversedBy="traitid")
     * @ORM\JoinTable(name="tmtraittaxalink",
     *   joinColumns={
     *     @ORM\JoinColumn(name="traitid", referencedColumnName="traitid")
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

    public function getTraitid(): ?int
    {
        return $this->traitid;
    }

    public function getTraitname(): ?string
    {
        return $this->traitname;
    }

    public function setTraitname(string $traitname): self
    {
        $this->traitname = $traitname;

        return $this;
    }

    public function getTraittype(): ?string
    {
        return $this->traittype;
    }

    public function setTraittype(string $traittype): self
    {
        $this->traittype = $traittype;

        return $this;
    }

    public function getUnits(): ?string
    {
        return $this->units;
    }

    public function setUnits(?string $units): self
    {
        $this->units = $units;

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

    public function getRefurl(): ?string
    {
        return $this->refurl;
    }

    public function setRefurl(?string $refurl): self
    {
        $this->refurl = $refurl;

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

    public function getDynamicproperties(): ?string
    {
        return $this->dynamicproperties;
    }

    public function setDynamicproperties(?string $dynamicproperties): self
    {
        $this->dynamicproperties = $dynamicproperties;

        return $this;
    }

    public function getModifiedtimestamp(): ?\DateTimeInterface
    {
        return $this->modifiedtimestamp;
    }

    public function setModifiedtimestamp(?\DateTimeInterface $modifiedtimestamp): self
    {
        $this->modifiedtimestamp = $modifiedtimestamp;

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

    public function getCreateduid(): ?Users
    {
        return $this->createduid;
    }

    public function setCreateduid(?Users $createduid): self
    {
        $this->createduid = $createduid;

        return $this;
    }

    public function getModifieduid(): ?Users
    {
        return $this->modifieduid;
    }

    public function setModifieduid(?Users $modifieduid): self
    {
        $this->modifieduid = $modifieduid;

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
