<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * Taxaprofilepubs
 *
 * @ORM\Table(name="taxaprofilepubs", indexes={@ORM\Index(name="FK_taxaprofilepubs_uid_idx", columns={"uidowner"}), @ORM\Index(name="INDEX_taxaprofilepubs_title", columns={"pubtitle"})})
 * @ORM\Entity(repositoryClass="App\Repository\TaxaprofilepubsRepository")
 */
class Taxaprofilepubs
{
    /**
     * @var int
     *
     * @ORM\Column(name="tppid", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $tppid;

    /**
     * @var string
     *
     * @ORM\Column(name="pubtitle", type="string", length=150, nullable=false)
     */
    private $pubtitle;

    /**
     * @var string|null
     *
     * @ORM\Column(name="authors", type="string", length=150, nullable=true, options={"default"="NULL"})
     */
    private $authors = 'NULL';

    /**
     * @var string|null
     *
     * @ORM\Column(name="description", type="string", length=500, nullable=true, options={"default"="NULL"})
     */
    private $description = 'NULL';

    /**
     * @var string|null
     *
     * @ORM\Column(name="abstract", type="text", length=65535, nullable=true, options={"default"="NULL"})
     */
    private $abstract = 'NULL';

    /**
     * @var string|null
     *
     * @ORM\Column(name="externalurl", type="string", length=250, nullable=true, options={"default"="NULL"})
     */
    private $externalurl = 'NULL';

    /**
     * @var string|null
     *
     * @ORM\Column(name="rights", type="string", length=250, nullable=true, options={"default"="NULL"})
     */
    private $rights = 'NULL';

    /**
     * @var string|null
     *
     * @ORM\Column(name="usageterm", type="string", length=250, nullable=true, options={"default"="NULL"})
     */
    private $usageterm = 'NULL';

    /**
     * @var string|null
     *
     * @ORM\Column(name="accessrights", type="string", length=250, nullable=true, options={"default"="NULL"})
     */
    private $accessrights = 'NULL';

    /**
     * @var int|null
     *
     * @ORM\Column(name="ispublic", type="integer", nullable=true, options={"default"="NULL"})
     */
    private $ispublic = 'NULL';

    /**
     * @var int|null
     *
     * @ORM\Column(name="inclusive", type="integer", nullable=true, options={"default"="NULL"})
     */
    private $inclusive = 'NULL';

    /**
     * @var string|null
     *
     * @ORM\Column(name="dynamicProperties", type="text", length=65535, nullable=true, options={"default"="NULL"})
     */
    private $dynamicproperties = 'NULL';

    /**
     * @var \DateTime|null
     *
     * @ORM\Column(name="initialtimestamp", type="datetime", nullable=true, options={"default"="current_timestamp()"})
     */
    private $initialtimestamp = 'current_timestamp()';

    /**
     * @var \Users
     *
     * @ORM\ManyToOne(targetEntity="Users")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="uidowner", referencedColumnName="uid")
     * })
     */
    private $uidowner;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="Taxadescrblock", mappedBy="tppid")
     */
    private $tdbid;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="Images", mappedBy="tppid")
     */
    private $imgid;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="Taxamaps", mappedBy="tppid")
     */
    private $mid;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->tdbid = new \Doctrine\Common\Collections\ArrayCollection();
        $this->imgid = new \Doctrine\Common\Collections\ArrayCollection();
        $this->mid = new \Doctrine\Common\Collections\ArrayCollection();
    }

    public function getTppid(): ?int
    {
        return $this->tppid;
    }

    public function getPubtitle(): ?string
    {
        return $this->pubtitle;
    }

    public function setPubtitle(string $pubtitle): self
    {
        $this->pubtitle = $pubtitle;

        return $this;
    }

    public function getAuthors(): ?string
    {
        return $this->authors;
    }

    public function setAuthors(?string $authors): self
    {
        $this->authors = $authors;

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

    public function getAbstract(): ?string
    {
        return $this->abstract;
    }

    public function setAbstract(?string $abstract): self
    {
        $this->abstract = $abstract;

        return $this;
    }

    public function getExternalurl(): ?string
    {
        return $this->externalurl;
    }

    public function setExternalurl(?string $externalurl): self
    {
        $this->externalurl = $externalurl;

        return $this;
    }

    public function getRights(): ?string
    {
        return $this->rights;
    }

    public function setRights(?string $rights): self
    {
        $this->rights = $rights;

        return $this;
    }

    public function getUsageterm(): ?string
    {
        return $this->usageterm;
    }

    public function setUsageterm(?string $usageterm): self
    {
        $this->usageterm = $usageterm;

        return $this;
    }

    public function getAccessrights(): ?string
    {
        return $this->accessrights;
    }

    public function setAccessrights(?string $accessrights): self
    {
        $this->accessrights = $accessrights;

        return $this;
    }

    public function getIspublic(): ?int
    {
        return $this->ispublic;
    }

    public function setIspublic(?int $ispublic): self
    {
        $this->ispublic = $ispublic;

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

    public function getDynamicproperties(): ?string
    {
        return $this->dynamicproperties;
    }

    public function setDynamicproperties(?string $dynamicproperties): self
    {
        $this->dynamicproperties = $dynamicproperties;

        return $this;
    }

    public function getInitialtimestamp(): ?\DateTimeInterface
    {
        return $this->initialtimestamp;
    }

    public function setInitialtimestamp(?\DateTimeInterface $initialtimestamp): self
    {
        $this->initialtimestamp = $initialtimestamp;

        return $this;
    }

    public function getUidowner(): ?Users
    {
        return $this->uidowner;
    }

    public function setUidowner(?Users $uidowner): self
    {
        $this->uidowner = $uidowner;

        return $this;
    }

    /**
     * @return Collection|Taxadescrblock[]
     */
    public function getTdbid(): Collection
    {
        return $this->tdbid;
    }

    public function addTdbid(Taxadescrblock $tdbid): self
    {
        if (!$this->tdbid->contains($tdbid)) {
            $this->tdbid[] = $tdbid;
            $tdbid->addTppid($this);
        }

        return $this;
    }

    public function removeTdbid(Taxadescrblock $tdbid): self
    {
        if ($this->tdbid->contains($tdbid)) {
            $this->tdbid->removeElement($tdbid);
            $tdbid->removeTppid($this);
        }

        return $this;
    }

    /**
     * @return Collection|Images[]
     */
    public function getImgid(): Collection
    {
        return $this->imgid;
    }

    public function addImgid(Images $imgid): self
    {
        if (!$this->imgid->contains($imgid)) {
            $this->imgid[] = $imgid;
            $imgid->addTppid($this);
        }

        return $this;
    }

    public function removeImgid(Images $imgid): self
    {
        if ($this->imgid->contains($imgid)) {
            $this->imgid->removeElement($imgid);
            $imgid->removeTppid($this);
        }

        return $this;
    }

    /**
     * @return Collection|Taxamaps[]
     */
    public function getMid(): Collection
    {
        return $this->mid;
    }

    public function addMid(Taxamaps $mid): self
    {
        if (!$this->mid->contains($mid)) {
            $this->mid[] = $mid;
            $mid->addTppid($this);
        }

        return $this;
    }

    public function removeMid(Taxamaps $mid): self
    {
        if ($this->mid->contains($mid)) {
            $this->mid->removeElement($mid);
            $mid->removeTppid($this);
        }

        return $this;
    }

}
