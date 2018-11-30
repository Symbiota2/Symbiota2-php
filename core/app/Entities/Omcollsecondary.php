<?php

namespace App\Entities;

use Doctrine\ORM\Mapping as ORM;

/**
 * Omcollsecondary
 *
 * @ORM\Table(name="omcollsecondary", indexes={@ORM\Index(name="FK_omcollsecondary_coll", columns={"collid"})})
 * @ORM\Entity
 */
class Omcollsecondary
{
    /**
     * @var int
     *
     * @ORM\Column(name="ocsid", type="integer", precision=0, scale=0, nullable=false, options={"unsigned"=true}, unique=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $ocsid;

    /**
     * @var string
     *
     * @ORM\Column(name="InstitutionCode", type="string", length=45, precision=0, scale=0, nullable=false, unique=false)
     */
    private $institutioncode;

    /**
     * @var string|null
     *
     * @ORM\Column(name="CollectionCode", type="string", length=45, precision=0, scale=0, nullable=true, unique=false)
     */
    private $collectioncode;

    /**
     * @var string
     *
     * @ORM\Column(name="CollectionName", type="string", length=150, precision=0, scale=0, nullable=false, unique=false)
     */
    private $collectionname;

    /**
     * @var string|null
     *
     * @ORM\Column(name="BriefDescription", type="string", length=300, precision=0, scale=0, nullable=true, unique=false)
     */
    private $briefdescription;

    /**
     * @var string|null
     *
     * @ORM\Column(name="FullDescription", type="string", length=1000, precision=0, scale=0, nullable=true, unique=false)
     */
    private $fulldescription;

    /**
     * @var string|null
     *
     * @ORM\Column(name="Homepage", type="string", length=250, precision=0, scale=0, nullable=true, unique=false)
     */
    private $homepage;

    /**
     * @var string|null
     *
     * @ORM\Column(name="IndividualUrl", type="string", length=500, precision=0, scale=0, nullable=true, unique=false)
     */
    private $individualurl;

    /**
     * @var string|null
     *
     * @ORM\Column(name="Contact", type="string", length=45, precision=0, scale=0, nullable=true, unique=false)
     */
    private $contact;

    /**
     * @var string|null
     *
     * @ORM\Column(name="Email", type="string", length=45, precision=0, scale=0, nullable=true, unique=false)
     */
    private $email;

    /**
     * @var float|null
     *
     * @ORM\Column(name="LatitudeDecimal", type="float", precision=10, scale=0, nullable=true, unique=false)
     */
    private $latitudedecimal;

    /**
     * @var float|null
     *
     * @ORM\Column(name="LongitudeDecimal", type="float", precision=10, scale=0, nullable=true, unique=false)
     */
    private $longitudedecimal;

    /**
     * @var string|null
     *
     * @ORM\Column(name="icon", type="string", length=250, precision=0, scale=0, nullable=true, unique=false)
     */
    private $icon;

    /**
     * @var string|null
     *
     * @ORM\Column(name="CollType", type="string", length=45, precision=0, scale=0, nullable=true, unique=false)
     */
    private $colltype;

    /**
     * @var int|null
     *
     * @ORM\Column(name="SortSeq", type="integer", precision=0, scale=0, nullable=true, options={"unsigned"=true}, unique=false)
     */
    private $sortseq;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="InitialTimestamp", type="datetime", precision=0, scale=0, nullable=false, options={"default"="CURRENT_TIMESTAMP"}, unique=false)
     */
    private $initialtimestamp = 'CURRENT_TIMESTAMP';

    /**
     * @var \App\Entities\Omcollections
     *
     * @ORM\ManyToOne(targetEntity="App\Entities\Omcollections")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="collid", referencedColumnName="CollID", nullable=true)
     * })
     */
    private $collid;


    /**
     * Get ocsid.
     *
     * @return int
     */
    public function getOcsid()
    {
        return $this->ocsid;
    }

    /**
     * Set institutioncode.
     *
     * @param string $institutioncode
     *
     * @return Omcollsecondary
     */
    public function setInstitutioncode($institutioncode)
    {
        $this->institutioncode = $institutioncode;

        return $this;
    }

    /**
     * Get institutioncode.
     *
     * @return string
     */
    public function getInstitutioncode()
    {
        return $this->institutioncode;
    }

    /**
     * Set collectioncode.
     *
     * @param string|null $collectioncode
     *
     * @return Omcollsecondary
     */
    public function setCollectioncode($collectioncode = null)
    {
        $this->collectioncode = $collectioncode;

        return $this;
    }

    /**
     * Get collectioncode.
     *
     * @return string|null
     */
    public function getCollectioncode()
    {
        return $this->collectioncode;
    }

    /**
     * Set collectionname.
     *
     * @param string $collectionname
     *
     * @return Omcollsecondary
     */
    public function setCollectionname($collectionname)
    {
        $this->collectionname = $collectionname;

        return $this;
    }

    /**
     * Get collectionname.
     *
     * @return string
     */
    public function getCollectionname()
    {
        return $this->collectionname;
    }

    /**
     * Set briefdescription.
     *
     * @param string|null $briefdescription
     *
     * @return Omcollsecondary
     */
    public function setBriefdescription($briefdescription = null)
    {
        $this->briefdescription = $briefdescription;

        return $this;
    }

    /**
     * Get briefdescription.
     *
     * @return string|null
     */
    public function getBriefdescription()
    {
        return $this->briefdescription;
    }

    /**
     * Set fulldescription.
     *
     * @param string|null $fulldescription
     *
     * @return Omcollsecondary
     */
    public function setFulldescription($fulldescription = null)
    {
        $this->fulldescription = $fulldescription;

        return $this;
    }

    /**
     * Get fulldescription.
     *
     * @return string|null
     */
    public function getFulldescription()
    {
        return $this->fulldescription;
    }

    /**
     * Set homepage.
     *
     * @param string|null $homepage
     *
     * @return Omcollsecondary
     */
    public function setHomepage($homepage = null)
    {
        $this->homepage = $homepage;

        return $this;
    }

    /**
     * Get homepage.
     *
     * @return string|null
     */
    public function getHomepage()
    {
        return $this->homepage;
    }

    /**
     * Set individualurl.
     *
     * @param string|null $individualurl
     *
     * @return Omcollsecondary
     */
    public function setIndividualurl($individualurl = null)
    {
        $this->individualurl = $individualurl;

        return $this;
    }

    /**
     * Get individualurl.
     *
     * @return string|null
     */
    public function getIndividualurl()
    {
        return $this->individualurl;
    }

    /**
     * Set contact.
     *
     * @param string|null $contact
     *
     * @return Omcollsecondary
     */
    public function setContact($contact = null)
    {
        $this->contact = $contact;

        return $this;
    }

    /**
     * Get contact.
     *
     * @return string|null
     */
    public function getContact()
    {
        return $this->contact;
    }

    /**
     * Set email.
     *
     * @param string|null $email
     *
     * @return Omcollsecondary
     */
    public function setEmail($email = null)
    {
        $this->email = $email;

        return $this;
    }

    /**
     * Get email.
     *
     * @return string|null
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * Set latitudedecimal.
     *
     * @param float|null $latitudedecimal
     *
     * @return Omcollsecondary
     */
    public function setLatitudedecimal($latitudedecimal = null)
    {
        $this->latitudedecimal = $latitudedecimal;

        return $this;
    }

    /**
     * Get latitudedecimal.
     *
     * @return float|null
     */
    public function getLatitudedecimal()
    {
        return $this->latitudedecimal;
    }

    /**
     * Set longitudedecimal.
     *
     * @param float|null $longitudedecimal
     *
     * @return Omcollsecondary
     */
    public function setLongitudedecimal($longitudedecimal = null)
    {
        $this->longitudedecimal = $longitudedecimal;

        return $this;
    }

    /**
     * Get longitudedecimal.
     *
     * @return float|null
     */
    public function getLongitudedecimal()
    {
        return $this->longitudedecimal;
    }

    /**
     * Set icon.
     *
     * @param string|null $icon
     *
     * @return Omcollsecondary
     */
    public function setIcon($icon = null)
    {
        $this->icon = $icon;

        return $this;
    }

    /**
     * Get icon.
     *
     * @return string|null
     */
    public function getIcon()
    {
        return $this->icon;
    }

    /**
     * Set colltype.
     *
     * @param string|null $colltype
     *
     * @return Omcollsecondary
     */
    public function setColltype($colltype = null)
    {
        $this->colltype = $colltype;

        return $this;
    }

    /**
     * Get colltype.
     *
     * @return string|null
     */
    public function getColltype()
    {
        return $this->colltype;
    }

    /**
     * Set sortseq.
     *
     * @param int|null $sortseq
     *
     * @return Omcollsecondary
     */
    public function setSortseq($sortseq = null)
    {
        $this->sortseq = $sortseq;

        return $this;
    }

    /**
     * Get sortseq.
     *
     * @return int|null
     */
    public function getSortseq()
    {
        return $this->sortseq;
    }

    /**
     * Set initialtimestamp.
     *
     * @param \DateTime $initialtimestamp
     *
     * @return Omcollsecondary
     */
    public function setInitialtimestamp($initialtimestamp)
    {
        $this->initialtimestamp = $initialtimestamp;

        return $this;
    }

    /**
     * Get initialtimestamp.
     *
     * @return \DateTime
     */
    public function getInitialtimestamp()
    {
        return $this->initialtimestamp;
    }

    /**
     * Set collid.
     *
     * @param \App\Entities\Omcollections|null $collid
     *
     * @return Omcollsecondary
     */
    public function setCollid(\App\Entities\Omcollections $collid = null)
    {
        $this->collid = $collid;

        return $this;
    }

    /**
     * Get collid.
     *
     * @return \App\Entities\Omcollections|null
     */
    public function getCollid()
    {
        return $this->collid;
    }
}
