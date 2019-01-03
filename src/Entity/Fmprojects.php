<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * Fmprojects
 *
 * @ORM\Table(name="fmprojects", indexes={@ORM\Index(name="FK_parentpid_proj", columns={"parentpid"})})
 * @ORM\Entity(repositoryClass="App\Repository\FmprojectsRepository")
 */
class Fmprojects
{
    /**
     * @var int
     *
     * @ORM\Column(name="pid", type="integer", nullable=false, options={"unsigned"=true})
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $pid;

    /**
     * @var string
     *
     * @ORM\Column(name="projname", type="string", length=45, nullable=false)
     */
    private $projname;

    /**
     * @var string|null
     *
     * @ORM\Column(name="displayname", type="string", length=150, nullable=true, options={"default"=NULL})
     */
    private $displayname = 'NULL';

    /**
     * @var string|null
     *
     * @ORM\Column(name="managers", type="string", length=150, nullable=true, options={"default"=NULL})
     */
    private $managers = 'NULL';

    /**
     * @var string|null
     *
     * @ORM\Column(name="briefdescription", type="string", length=300, nullable=true, options={"default"=NULL})
     */
    private $briefdescription = 'NULL';

    /**
     * @var string|null
     *
     * @ORM\Column(name="fulldescription", type="string", length=2000, nullable=true, options={"default"=NULL})
     */
    private $fulldescription = 'NULL';

    /**
     * @var string|null
     *
     * @ORM\Column(name="notes", type="string", length=250, nullable=true, options={"default"=NULL})
     */
    private $notes = 'NULL';

    /**
     * @var string|null
     *
     * @ORM\Column(name="iconUrl", type="string", length=150, nullable=true, options={"default"=NULL})
     */
    private $iconurl = 'NULL';

    /**
     * @var string|null
     *
     * @ORM\Column(name="headerUrl", type="string", length=150, nullable=true, options={"default"=NULL})
     */
    private $headerurl = 'NULL';

    /**
     * @var int
     *
     * @ORM\Column(name="occurrencesearch", type="integer", nullable=false, options={"unsigned"=true})
     */
    private $occurrencesearch;

    /**
     * @var int
     *
     * @ORM\Column(name="ispublic", type="integer", nullable=false, options={"unsigned"=true})
     */
    private $ispublic;

    /**
     * @var string|null
     *
     * @ORM\Column(name="dynamicProperties", type="text", length=65535, nullable=true, options={"default"=NULL})
     */
    private $dynamicproperties = 'NULL';

    /**
     * @var int
     *
     * @ORM\Column(name="SortSequence", type="integer", nullable=false, options={"default"="50","unsigned"=true})
     */
    private $sortsequence = '50';

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="InitialTimeStamp", type="datetime", nullable=false, options={"default"="CURRENT_TIMESTAMP"})
     */
    private $initialtimestamp = 'CURRENT_TIMESTAMP';

    /**
     * @var \Fmprojects
     *
     * @ORM\ManyToOne(targetEntity="Fmprojects")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="parentpid", referencedColumnName="pid")
     * })
     */
    private $parentpid;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="Fmchecklists", inversedBy="pid")
     * @ORM\JoinTable(name="fmchklstprojlink",
     *   joinColumns={
     *     @ORM\JoinColumn(name="pid", referencedColumnName="pid")
     *   },
     *   inverseJoinColumns={
     *     @ORM\JoinColumn(name="clid", referencedColumnName="CLID")
     *   }
     * )
     */
    private $clid;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->clid = new \Doctrine\Common\Collections\ArrayCollection();
    }

    public function getPid(): ?int
    {
        return $this->pid;
    }

    public function getProjname(): ?string
    {
        return $this->projname;
    }

    public function setProjname(string $projname): self
    {
        $this->projname = $projname;

        return $this;
    }

    public function getDisplayname(): ?string
    {
        return $this->displayname;
    }

    public function setDisplayname(?string $displayname): self
    {
        $this->displayname = $displayname;

        return $this;
    }

    public function getManagers(): ?string
    {
        return $this->managers;
    }

    public function setManagers(?string $managers): self
    {
        $this->managers = $managers;

        return $this;
    }

    public function getBriefdescription(): ?string
    {
        return $this->briefdescription;
    }

    public function setBriefdescription(?string $briefdescription): self
    {
        $this->briefdescription = $briefdescription;

        return $this;
    }

    public function getFulldescription(): ?string
    {
        return $this->fulldescription;
    }

    public function setFulldescription(?string $fulldescription): self
    {
        $this->fulldescription = $fulldescription;

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

    public function getIconurl(): ?string
    {
        return $this->iconurl;
    }

    public function setIconurl(?string $iconurl): self
    {
        $this->iconurl = $iconurl;

        return $this;
    }

    public function getHeaderurl(): ?string
    {
        return $this->headerurl;
    }

    public function setHeaderurl(?string $headerurl): self
    {
        $this->headerurl = $headerurl;

        return $this;
    }

    public function getOccurrencesearch(): ?int
    {
        return $this->occurrencesearch;
    }

    public function setOccurrencesearch(int $occurrencesearch): self
    {
        $this->occurrencesearch = $occurrencesearch;

        return $this;
    }

    public function getIspublic(): ?int
    {
        return $this->ispublic;
    }

    public function setIspublic(int $ispublic): self
    {
        $this->ispublic = $ispublic;

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

    public function getSortsequence(): ?int
    {
        return $this->sortsequence;
    }

    public function setSortsequence(int $sortsequence): self
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

    public function getParentpid(): ?self
    {
        return $this->parentpid;
    }

    public function setParentpid(?self $parentpid): self
    {
        $this->parentpid = $parentpid;

        return $this;
    }

    /**
     * @return Collection|Fmchecklists[]
     */
    public function getClid(): Collection
    {
        return $this->clid;
    }

    public function addClid(Fmchecklists $clid): self
    {
        if (!$this->clid->contains($clid)) {
            $this->clid[] = $clid;
        }

        return $this;
    }

    public function removeClid(Fmchecklists $clid): self
    {
        if ($this->clid->contains($clid)) {
            $this->clid->removeElement($clid);
        }

        return $this;
    }

}
