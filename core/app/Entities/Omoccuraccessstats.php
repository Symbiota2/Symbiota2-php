<?php

namespace App\Entities;

use Doctrine\ORM\Mapping as ORM;

/**
 * Omoccuraccessstats
 *
 * @ORM\Table(name="omoccuraccessstats", uniqueConstraints={@ORM\UniqueConstraint(name="UNIQUE_occuraccess", columns={"occid", "accessdate", "ipaddress", "accesstype"})}, indexes={@ORM\Index(name="IDX_FB36281B40A24FBA", columns={"occid"})})
 * @ORM\Entity
 */
class Omoccuraccessstats
{
    /**
     * @var int
     *
     * @ORM\Column(name="oasid", type="integer", precision=0, scale=0, nullable=false, options={"unsigned"=true}, unique=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $oasid;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="accessdate", type="date", precision=0, scale=0, nullable=false, unique=false)
     */
    private $accessdate;

    /**
     * @var string
     *
     * @ORM\Column(name="ipaddress", type="string", length=45, precision=0, scale=0, nullable=false, unique=false)
     */
    private $ipaddress;

    /**
     * @var int
     *
     * @ORM\Column(name="cnt", type="integer", precision=0, scale=0, nullable=false, options={"unsigned"=true}, unique=false)
     */
    private $cnt;

    /**
     * @var string
     *
     * @ORM\Column(name="accesstype", type="string", length=45, precision=0, scale=0, nullable=false, unique=false)
     */
    private $accesstype;

    /**
     * @var string|null
     *
     * @ORM\Column(name="dynamicProperties", type="string", length=250, precision=0, scale=0, nullable=true, unique=false)
     */
    private $dynamicproperties;

    /**
     * @var string|null
     *
     * @ORM\Column(name="notes", type="string", length=250, precision=0, scale=0, nullable=true, unique=false)
     */
    private $notes;

    /**
     * @var \DateTime|null
     *
     * @ORM\Column(name="initialtimestamp", type="datetime", precision=0, scale=0, nullable=true, options={"default"="CURRENT_TIMESTAMP"}, unique=false)
     */
    private $initialtimestamp = 'CURRENT_TIMESTAMP';

    /**
     * @var \App\Entities\Omoccurrences
     *
     * @ORM\ManyToOne(targetEntity="App\Entities\Omoccurrences")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="occid", referencedColumnName="occid", nullable=true)
     * })
     */
    private $occid;


    /**
     * Get oasid.
     *
     * @return int
     */
    public function getOasid()
    {
        return $this->oasid;
    }

    /**
     * Set accessdate.
     *
     * @param \DateTime $accessdate
     *
     * @return Omoccuraccessstats
     */
    public function setAccessdate($accessdate)
    {
        $this->accessdate = $accessdate;

        return $this;
    }

    /**
     * Get accessdate.
     *
     * @return \DateTime
     */
    public function getAccessdate()
    {
        return $this->accessdate;
    }

    /**
     * Set ipaddress.
     *
     * @param string $ipaddress
     *
     * @return Omoccuraccessstats
     */
    public function setIpaddress($ipaddress)
    {
        $this->ipaddress = $ipaddress;

        return $this;
    }

    /**
     * Get ipaddress.
     *
     * @return string
     */
    public function getIpaddress()
    {
        return $this->ipaddress;
    }

    /**
     * Set cnt.
     *
     * @param int $cnt
     *
     * @return Omoccuraccessstats
     */
    public function setCnt($cnt)
    {
        $this->cnt = $cnt;

        return $this;
    }

    /**
     * Get cnt.
     *
     * @return int
     */
    public function getCnt()
    {
        return $this->cnt;
    }

    /**
     * Set accesstype.
     *
     * @param string $accesstype
     *
     * @return Omoccuraccessstats
     */
    public function setAccesstype($accesstype)
    {
        $this->accesstype = $accesstype;

        return $this;
    }

    /**
     * Get accesstype.
     *
     * @return string
     */
    public function getAccesstype()
    {
        return $this->accesstype;
    }

    /**
     * Set dynamicproperties.
     *
     * @param string|null $dynamicproperties
     *
     * @return Omoccuraccessstats
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
     * Set notes.
     *
     * @param string|null $notes
     *
     * @return Omoccuraccessstats
     */
    public function setNotes($notes = null)
    {
        $this->notes = $notes;

        return $this;
    }

    /**
     * Get notes.
     *
     * @return string|null
     */
    public function getNotes()
    {
        return $this->notes;
    }

    /**
     * Set initialtimestamp.
     *
     * @param \DateTime|null $initialtimestamp
     *
     * @return Omoccuraccessstats
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
     * Set occid.
     *
     * @param \App\Entities\Omoccurrences|null $occid
     *
     * @return Omoccuraccessstats
     */
    public function setOccid(\App\Entities\Omoccurrences $occid = null)
    {
        $this->occid = $occid;

        return $this;
    }

    /**
     * Get occid.
     *
     * @return \App\Entities\Omoccurrences|null
     */
    public function getOccid()
    {
        return $this->occid;
    }
}
