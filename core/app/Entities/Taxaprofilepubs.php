<?php

namespace App\Entities;

use Doctrine\ORM\Mapping as ORM;

/**
 * Taxaprofilepubs
 *
 * @ORM\Table(name="taxaprofilepubs", indexes={@ORM\Index(name="FK_taxaprofilepubs_uid_idx", columns={"uidowner"}), @ORM\Index(name="INDEX_taxaprofilepubs_title", columns={"pubtitle"})})
 * @ORM\Entity
 */
class Taxaprofilepubs
{
    /**
     * @var int
     *
     * @ORM\Column(name="tppid", type="integer", precision=0, scale=0, nullable=false, unique=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $tppid;

    /**
     * @var string
     *
     * @ORM\Column(name="pubtitle", type="string", length=150, precision=0, scale=0, nullable=false, unique=false)
     */
    private $pubtitle;

    /**
     * @var string|null
     *
     * @ORM\Column(name="authors", type="string", length=150, precision=0, scale=0, nullable=true, unique=false)
     */
    private $authors;

    /**
     * @var string|null
     *
     * @ORM\Column(name="description", type="string", length=500, precision=0, scale=0, nullable=true, unique=false)
     */
    private $description;

    /**
     * @var string|null
     *
     * @ORM\Column(name="abstract", type="text", length=65535, precision=0, scale=0, nullable=true, unique=false)
     */
    private $abstract;

    /**
     * @var string|null
     *
     * @ORM\Column(name="externalurl", type="string", length=250, precision=0, scale=0, nullable=true, unique=false)
     */
    private $externalurl;

    /**
     * @var string|null
     *
     * @ORM\Column(name="rights", type="string", length=250, precision=0, scale=0, nullable=true, unique=false)
     */
    private $rights;

    /**
     * @var string|null
     *
     * @ORM\Column(name="usageterm", type="string", length=250, precision=0, scale=0, nullable=true, unique=false)
     */
    private $usageterm;

    /**
     * @var string|null
     *
     * @ORM\Column(name="accessrights", type="string", length=250, precision=0, scale=0, nullable=true, unique=false)
     */
    private $accessrights;

    /**
     * @var int|null
     *
     * @ORM\Column(name="ispublic", type="integer", precision=0, scale=0, nullable=true, unique=false)
     */
    private $ispublic;

    /**
     * @var int|null
     *
     * @ORM\Column(name="inclusive", type="integer", precision=0, scale=0, nullable=true, unique=false)
     */
    private $inclusive;

    /**
     * @var string|null
     *
     * @ORM\Column(name="dynamicProperties", type="text", length=65535, precision=0, scale=0, nullable=true, unique=false)
     */
    private $dynamicproperties;

    /**
     * @var \DateTime|null
     *
     * @ORM\Column(name="initialtimestamp", type="datetime", precision=0, scale=0, nullable=true, options={"default"="CURRENT_TIMESTAMP"}, unique=false)
     */
    private $initialtimestamp = 'CURRENT_TIMESTAMP';

    /**
     * @var \App\Entities\User
     *
     * @ORM\ManyToOne(targetEntity="App\Entities\User")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="uidowner", referencedColumnName="uid", nullable=true)
     * })
     */
    private $uidowner;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="App\Entities\Taxadescrblock", mappedBy="tppid")
     */
    private $tdbid;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="App\Entities\Images", mappedBy="tppid")
     */
    private $imgid;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="App\Entities\Taxamaps", mappedBy="tppid")
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

    /**
     * Get tppid.
     *
     * @return int
     */
    public function getTppid()
    {
        return $this->tppid;
    }

    /**
     * Set pubtitle.
     *
     * @param string $pubtitle
     *
     * @return Taxaprofilepubs
     */
    public function setPubtitle($pubtitle)
    {
        $this->pubtitle = $pubtitle;

        return $this;
    }

    /**
     * Get pubtitle.
     *
     * @return string
     */
    public function getPubtitle()
    {
        return $this->pubtitle;
    }

    /**
     * Set authors.
     *
     * @param string|null $authors
     *
     * @return Taxaprofilepubs
     */
    public function setAuthors($authors = null)
    {
        $this->authors = $authors;

        return $this;
    }

    /**
     * Get authors.
     *
     * @return string|null
     */
    public function getAuthors()
    {
        return $this->authors;
    }

    /**
     * Set description.
     *
     * @param string|null $description
     *
     * @return Taxaprofilepubs
     */
    public function setDescription($description = null)
    {
        $this->description = $description;

        return $this;
    }

    /**
     * Get description.
     *
     * @return string|null
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Set abstract.
     *
     * @param string|null $abstract
     *
     * @return Taxaprofilepubs
     */
    public function setAbstract($abstract = null)
    {
        $this->abstract = $abstract;

        return $this;
    }

    /**
     * Get abstract.
     *
     * @return string|null
     */
    public function getAbstract()
    {
        return $this->abstract;
    }

    /**
     * Set externalurl.
     *
     * @param string|null $externalurl
     *
     * @return Taxaprofilepubs
     */
    public function setExternalurl($externalurl = null)
    {
        $this->externalurl = $externalurl;

        return $this;
    }

    /**
     * Get externalurl.
     *
     * @return string|null
     */
    public function getExternalurl()
    {
        return $this->externalurl;
    }

    /**
     * Set rights.
     *
     * @param string|null $rights
     *
     * @return Taxaprofilepubs
     */
    public function setRights($rights = null)
    {
        $this->rights = $rights;

        return $this;
    }

    /**
     * Get rights.
     *
     * @return string|null
     */
    public function getRights()
    {
        return $this->rights;
    }

    /**
     * Set usageterm.
     *
     * @param string|null $usageterm
     *
     * @return Taxaprofilepubs
     */
    public function setUsageterm($usageterm = null)
    {
        $this->usageterm = $usageterm;

        return $this;
    }

    /**
     * Get usageterm.
     *
     * @return string|null
     */
    public function getUsageterm()
    {
        return $this->usageterm;
    }

    /**
     * Set accessrights.
     *
     * @param string|null $accessrights
     *
     * @return Taxaprofilepubs
     */
    public function setAccessrights($accessrights = null)
    {
        $this->accessrights = $accessrights;

        return $this;
    }

    /**
     * Get accessrights.
     *
     * @return string|null
     */
    public function getAccessrights()
    {
        return $this->accessrights;
    }

    /**
     * Set ispublic.
     *
     * @param int|null $ispublic
     *
     * @return Taxaprofilepubs
     */
    public function setIspublic($ispublic = null)
    {
        $this->ispublic = $ispublic;

        return $this;
    }

    /**
     * Get ispublic.
     *
     * @return int|null
     */
    public function getIspublic()
    {
        return $this->ispublic;
    }

    /**
     * Set inclusive.
     *
     * @param int|null $inclusive
     *
     * @return Taxaprofilepubs
     */
    public function setInclusive($inclusive = null)
    {
        $this->inclusive = $inclusive;

        return $this;
    }

    /**
     * Get inclusive.
     *
     * @return int|null
     */
    public function getInclusive()
    {
        return $this->inclusive;
    }

    /**
     * Set dynamicproperties.
     *
     * @param string|null $dynamicproperties
     *
     * @return Taxaprofilepubs
     */
    public function setDynamicproperties($dynamicproperties = null)
    {
        $this->dynamicproperties = $dynamicproperties;

        return $this;
    }

    /**
     * Get dynamicproperties.
     *
     * @return string|null
     */
    public function getDynamicproperties()
    {
        return $this->dynamicproperties;
    }

    /**
     * Set initialtimestamp.
     *
     * @param \DateTime|null $initialtimestamp
     *
     * @return Taxaprofilepubs
     */
    public function setInitialtimestamp($initialtimestamp = null)
    {
        $this->initialtimestamp = $initialtimestamp;

        return $this;
    }

    /**
     * Get initialtimestamp.
     *
     * @return \DateTime|null
     */
    public function getInitialtimestamp()
    {
        return $this->initialtimestamp;
    }

    /**
     * Set uidowner.
     *
     * @param \App\Entities\User|null $uidowner
     *
     * @return Taxaprofilepubs
     */
    public function setUidowner(\App\Entities\User $uidowner = null)
    {
        $this->uidowner = $uidowner;

        return $this;
    }

    /**
     * Get uidowner.
     *
     * @return \App\Entities\User|null
     */
    public function getUidowner()
    {
        return $this->uidowner;
    }

    /**
     * Add tdbid.
     *
     * @param \App\Entities\Taxadescrblock $tdbid
     *
     * @return Taxaprofilepubs
     */
    public function addTdbid(\App\Entities\Taxadescrblock $tdbid)
    {
        $this->tdbid[] = $tdbid;

        return $this;
    }

    /**
     * Remove tdbid.
     *
     * @param \App\Entities\Taxadescrblock $tdbid
     *
     * @return boolean TRUE if this collection contained the specified element, FALSE otherwise.
     */
    public function removeTdbid(\App\Entities\Taxadescrblock $tdbid)
    {
        return $this->tdbid->removeElement($tdbid);
    }

    /**
     * Get tdbid.
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getTdbid()
    {
        return $this->tdbid;
    }

    /**
     * Add imgid.
     *
     * @param \App\Entities\Images $imgid
     *
     * @return Taxaprofilepubs
     */
    public function addImgid(\App\Entities\Images $imgid)
    {
        $this->imgid[] = $imgid;

        return $this;
    }

    /**
     * Remove imgid.
     *
     * @param \App\Entities\Images $imgid
     *
     * @return boolean TRUE if this collection contained the specified element, FALSE otherwise.
     */
    public function removeImgid(\App\Entities\Images $imgid)
    {
        return $this->imgid->removeElement($imgid);
    }

    /**
     * Get imgid.
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getImgid()
    {
        return $this->imgid;
    }

    /**
     * Add mid.
     *
     * @param \App\Entities\Taxamaps $mid
     *
     * @return Taxaprofilepubs
     */
    public function addMid(\App\Entities\Taxamaps $mid)
    {
        $this->mid[] = $mid;

        return $this;
    }

    /**
     * Remove mid.
     *
     * @param \App\Entities\Taxamaps $mid
     *
     * @return boolean TRUE if this collection contained the specified element, FALSE otherwise.
     */
    public function removeMid(\App\Entities\Taxamaps $mid)
    {
        return $this->mid->removeElement($mid);
    }

    /**
     * Get mid.
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getMid()
    {
        return $this->mid;
    }
}
