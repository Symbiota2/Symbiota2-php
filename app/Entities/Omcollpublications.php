<?php

namespace App\Entities;

use Doctrine\ORM\Mapping as ORM;

/**
 * Omcollpublications
 *
 * @ORM\Table(name="omcollpublications", indexes={@ORM\Index(name="FK_adminpub_collid_idx", columns={"collid"})})
 * @ORM\Entity
 */
class Omcollpublications
{
    /**
     * @var int
     *
     * @ORM\Column(name="pubid", type="integer", precision=0, scale=0, nullable=false, options={"unsigned"=true}, unique=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $pubid;

    /**
     * @var string
     *
     * @ORM\Column(name="targeturl", type="string", length=250, precision=0, scale=0, nullable=false, unique=false)
     */
    private $targeturl;

    /**
     * @var string
     *
     * @ORM\Column(name="securityguid", type="string", length=45, precision=0, scale=0, nullable=false, unique=false)
     */
    private $securityguid;

    /**
     * @var string|null
     *
     * @ORM\Column(name="criteriajson", type="string", length=250, precision=0, scale=0, nullable=true, unique=false)
     */
    private $criteriajson;

    /**
     * @var int|null
     *
     * @ORM\Column(name="includedeterminations", type="integer", precision=0, scale=0, nullable=true, options={"default"="1"}, unique=false)
     */
    private $includedeterminations = '1';

    /**
     * @var int|null
     *
     * @ORM\Column(name="includeimages", type="integer", precision=0, scale=0, nullable=true, options={"default"="1"}, unique=false)
     */
    private $includeimages = '1';

    /**
     * @var int|null
     *
     * @ORM\Column(name="autoupdate", type="integer", precision=0, scale=0, nullable=true, unique=false)
     */
    private $autoupdate;

    /**
     * @var \DateTime|null
     *
     * @ORM\Column(name="lastdateupdate", type="datetime", precision=0, scale=0, nullable=true, unique=false)
     */
    private $lastdateupdate;

    /**
     * @var int|null
     *
     * @ORM\Column(name="updateinterval", type="integer", precision=0, scale=0, nullable=true, unique=false)
     */
    private $updateinterval;

    /**
     * @var \DateTime|null
     *
     * @ORM\Column(name="initialtimestamp", type="datetime", precision=0, scale=0, nullable=true, options={"default"="CURRENT_TIMESTAMP"}, unique=false)
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
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="App\Entities\Omoccurrences", inversedBy="pubid")
     * @ORM\JoinTable(name="omcollpuboccurlink",
     *   joinColumns={
     *     @ORM\JoinColumn(name="pubid", referencedColumnName="pubid", nullable=true)
     *   },
     *   inverseJoinColumns={
     *     @ORM\JoinColumn(name="occid", referencedColumnName="occid", nullable=true)
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

    /**
     * Get pubid.
     *
     * @return int
     */
    public function getPubid()
    {
        return $this->pubid;
    }

    /**
     * Set targeturl.
     *
     * @param string $targeturl
     *
     * @return Omcollpublications
     */
    public function setTargeturl($targeturl)
    {
        $this->targeturl = $targeturl;

        return $this;
    }

    /**
     * Get targeturl.
     *
     * @return string
     */
    public function getTargeturl()
    {
        return $this->targeturl;
    }

    /**
     * Set securityguid.
     *
     * @param string $securityguid
     *
     * @return Omcollpublications
     */
    public function setSecurityguid($securityguid)
    {
        $this->securityguid = $securityguid;

        return $this;
    }

    /**
     * Get securityguid.
     *
     * @return string
     */
    public function getSecurityguid()
    {
        return $this->securityguid;
    }

    /**
     * Set criteriajson.
     *
     * @param string|null $criteriajson
     *
     * @return Omcollpublications
     */
    public function setCriteriajson($criteriajson = null)
    {
        $this->criteriajson = $criteriajson;

        return $this;
    }

    /**
     * Get criteriajson.
     *
     * @return string|null
     */
    public function getCriteriajson()
    {
        return $this->criteriajson;
    }

    /**
     * Set includedeterminations.
     *
     * @param int|null $includedeterminations
     *
     * @return Omcollpublications
     */
    public function setIncludedeterminations($includedeterminations = null)
    {
        $this->includedeterminations = $includedeterminations;

        return $this;
    }

    /**
     * Get includedeterminations.
     *
     * @return int|null
     */
    public function getIncludedeterminations()
    {
        return $this->includedeterminations;
    }

    /**
     * Set includeimages.
     *
     * @param int|null $includeimages
     *
     * @return Omcollpublications
     */
    public function setIncludeimages($includeimages = null)
    {
        $this->includeimages = $includeimages;

        return $this;
    }

    /**
     * Get includeimages.
     *
     * @return int|null
     */
    public function getIncludeimages()
    {
        return $this->includeimages;
    }

    /**
     * Set autoupdate.
     *
     * @param int|null $autoupdate
     *
     * @return Omcollpublications
     */
    public function setAutoupdate($autoupdate = null)
    {
        $this->autoupdate = $autoupdate;

        return $this;
    }

    /**
     * Get autoupdate.
     *
     * @return int|null
     */
    public function getAutoupdate()
    {
        return $this->autoupdate;
    }

    /**
     * Set lastdateupdate.
     *
     * @param \DateTime|null $lastdateupdate
     *
     * @return Omcollpublications
     */
    public function setLastdateupdate($lastdateupdate = null)
    {
        $this->lastdateupdate = $lastdateupdate;

        return $this;
    }

    /**
     * Get lastdateupdate.
     *
     * @return \DateTime|null
     */
    public function getLastdateupdate()
    {
        return $this->lastdateupdate;
    }

    /**
     * Set updateinterval.
     *
     * @param int|null $updateinterval
     *
     * @return Omcollpublications
     */
    public function setUpdateinterval($updateinterval = null)
    {
        $this->updateinterval = $updateinterval;

        return $this;
    }

    /**
     * Get updateinterval.
     *
     * @return int|null
     */
    public function getUpdateinterval()
    {
        return $this->updateinterval;
    }

    /**
     * Set initialtimestamp.
     *
     * @param \DateTime|null $initialtimestamp
     *
     * @return Omcollpublications
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
     * Set collid.
     *
     * @param \App\Entities\Omcollections|null $collid
     *
     * @return Omcollpublications
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

    /**
     * Add occid.
     *
     * @param \App\Entities\Omoccurrences $occid
     *
     * @return Omcollpublications
     */
    public function addOccid(\App\Entities\Omoccurrences $occid)
    {
        $this->occid[] = $occid;

        return $this;
    }

    /**
     * Remove occid.
     *
     * @param \App\Entities\Omoccurrences $occid
     *
     * @return boolean TRUE if this collection contained the specified element, FALSE otherwise.
     */
    public function removeOccid(\App\Entities\Omoccurrences $occid)
    {
        return $this->occid->removeElement($occid);
    }

    /**
     * Get occid.
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getOccid()
    {
        return $this->occid;
    }
}
