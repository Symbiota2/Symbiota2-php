<?php

namespace App\Entities;

use Doctrine\ORM\Mapping as ORM;

/**
 * Omcollectionstats
 *
 * @ORM\Table(name="omcollectionstats")
 * @ORM\Entity
 */
class Omcollectionstats
{
    /**
     * @var int
     *
     * @ORM\Column(name="recordcnt", type="integer", precision=0, scale=0, nullable=false, options={"unsigned"=true}, unique=false)
     */
    private $recordcnt;

    /**
     * @var int|null
     *
     * @ORM\Column(name="georefcnt", type="integer", precision=0, scale=0, nullable=true, options={"unsigned"=true}, unique=false)
     */
    private $georefcnt;

    /**
     * @var int|null
     *
     * @ORM\Column(name="familycnt", type="integer", precision=0, scale=0, nullable=true, options={"unsigned"=true}, unique=false)
     */
    private $familycnt;

    /**
     * @var int|null
     *
     * @ORM\Column(name="genuscnt", type="integer", precision=0, scale=0, nullable=true, options={"unsigned"=true}, unique=false)
     */
    private $genuscnt;

    /**
     * @var int|null
     *
     * @ORM\Column(name="speciescnt", type="integer", precision=0, scale=0, nullable=true, options={"unsigned"=true}, unique=false)
     */
    private $speciescnt;

    /**
     * @var \DateTime|null
     *
     * @ORM\Column(name="uploaddate", type="datetime", precision=0, scale=0, nullable=true, unique=false)
     */
    private $uploaddate;

    /**
     * @var \DateTime|null
     *
     * @ORM\Column(name="datelastmodified", type="datetime", precision=0, scale=0, nullable=true, unique=false)
     */
    private $datelastmodified;

    /**
     * @var string|null
     *
     * @ORM\Column(name="uploadedby", type="string", length=45, precision=0, scale=0, nullable=true, unique=false)
     */
    private $uploadedby;

    /**
     * @var string|null
     *
     * @ORM\Column(name="dynamicProperties", type="text", length=0, precision=0, scale=0, nullable=true, unique=false)
     */
    private $dynamicproperties;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="initialtimestamp", type="datetime", precision=0, scale=0, nullable=false, options={"default"="CURRENT_TIMESTAMP"}, unique=false)
     */
    private $initialtimestamp = 'CURRENT_TIMESTAMP';

    /**
     * @var \App\Entities\Omcollections
     *
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     * @ORM\OneToOne(targetEntity="App\Entities\Omcollections")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="collid", referencedColumnName="CollID", nullable=true)
     * })
     */
    private $collid;


    /**
     * Set recordcnt.
     *
     * @param int $recordcnt
     *
     * @return Omcollectionstats
     */
    public function setRecordcnt($recordcnt)
    {
        $this->recordcnt = $recordcnt;

        return $this;
    }

    /**
     * Get recordcnt.
     *
     * @return int
     */
    public function getRecordcnt()
    {
        return $this->recordcnt;
    }

    /**
     * Set georefcnt.
     *
     * @param int|null $georefcnt
     *
     * @return Omcollectionstats
     */
    public function setGeorefcnt($georefcnt = null)
    {
        $this->georefcnt = $georefcnt;

        return $this;
    }

    /**
     * Get georefcnt.
     *
     * @return int|null
     */
    public function getGeorefcnt()
    {
        return $this->georefcnt;
    }

    /**
     * Set familycnt.
     *
     * @param int|null $familycnt
     *
     * @return Omcollectionstats
     */
    public function setFamilycnt($familycnt = null)
    {
        $this->familycnt = $familycnt;

        return $this;
    }

    /**
     * Get familycnt.
     *
     * @return int|null
     */
    public function getFamilycnt()
    {
        return $this->familycnt;
    }

    /**
     * Set genuscnt.
     *
     * @param int|null $genuscnt
     *
     * @return Omcollectionstats
     */
    public function setGenuscnt($genuscnt = null)
    {
        $this->genuscnt = $genuscnt;

        return $this;
    }

    /**
     * Get genuscnt.
     *
     * @return int|null
     */
    public function getGenuscnt()
    {
        return $this->genuscnt;
    }

    /**
     * Set speciescnt.
     *
     * @param int|null $speciescnt
     *
     * @return Omcollectionstats
     */
    public function setSpeciescnt($speciescnt = null)
    {
        $this->speciescnt = $speciescnt;

        return $this;
    }

    /**
     * Get speciescnt.
     *
     * @return int|null
     */
    public function getSpeciescnt()
    {
        return $this->speciescnt;
    }

    /**
     * Set uploaddate.
     *
     * @param \DateTime|null $uploaddate
     *
     * @return Omcollectionstats
     */
    public function setUploaddate($uploaddate = null)
    {
        $this->uploaddate = $uploaddate;

        return $this;
    }

    /**
     * Get uploaddate.
     *
     * @return \DateTime|null
     */
    public function getUploaddate()
    {
        return $this->uploaddate;
    }

    /**
     * Set datelastmodified.
     *
     * @param \DateTime|null $datelastmodified
     *
     * @return Omcollectionstats
     */
    public function setDatelastmodified($datelastmodified = null)
    {
        $this->datelastmodified = $datelastmodified;

        return $this;
    }

    /**
     * Get datelastmodified.
     *
     * @return \DateTime|null
     */
    public function getDatelastmodified()
    {
        return $this->datelastmodified;
    }

    /**
     * Set uploadedby.
     *
     * @param string|null $uploadedby
     *
     * @return Omcollectionstats
     */
    public function setUploadedby($uploadedby = null)
    {
        $this->uploadedby = $uploadedby;

        return $this;
    }

    /**
     * Get uploadedby.
     *
     * @return string|null
     */
    public function getUploadedby()
    {
        return $this->uploadedby;
    }

    /**
     * Set dynamicproperties.
     *
     * @param string|null $dynamicproperties
     *
     * @return Omcollectionstats
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
     * @param \DateTime $initialtimestamp
     *
     * @return Omcollectionstats
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
     * @param \App\Entities\Omcollections $collid
     *
     * @return Omcollectionstats
     */
    public function setCollid(\App\Entities\Omcollections $collid)
    {
        $this->collid = $collid;

        return $this;
    }

    /**
     * Get collid.
     *
     * @return \App\Entities\Omcollections
     */
    public function getCollid()
    {
        return $this->collid;
    }
}
