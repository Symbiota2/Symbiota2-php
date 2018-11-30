<?php

namespace App\Entities;

use Doctrine\ORM\Mapping as ORM;

/**
 * Omoccuredits
 *
 * @ORM\Table(name="omoccuredits", uniqueConstraints={@ORM\UniqueConstraint(name="guid_UNIQUE", columns={"guid"})}, indexes={@ORM\Index(name="fk_omoccuredits_uid", columns={"uid"}), @ORM\Index(name="fk_omoccuredits_occid", columns={"occid"})})
 * @ORM\Entity
 */
class Omoccuredits
{
    /**
     * @var int
     *
     * @ORM\Column(name="ocedid", type="integer", precision=0, scale=0, nullable=false, unique=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $ocedid;

    /**
     * @var string
     *
     * @ORM\Column(name="FieldName", type="string", length=45, precision=0, scale=0, nullable=false, unique=false)
     */
    private $fieldname;

    /**
     * @var string
     *
     * @ORM\Column(name="FieldValueNew", type="text", length=65535, precision=0, scale=0, nullable=false, unique=false)
     */
    private $fieldvaluenew;

    /**
     * @var string
     *
     * @ORM\Column(name="FieldValueOld", type="text", length=65535, precision=0, scale=0, nullable=false, unique=false)
     */
    private $fieldvalueold;

    /**
     * @var int
     *
     * @ORM\Column(name="ReviewStatus", type="integer", precision=0, scale=0, nullable=false, options={"default"="1","comment"="1=Open;2=Pending;3=Closed"}, unique=false)
     */
    private $reviewstatus = '1';

    /**
     * @var int
     *
     * @ORM\Column(name="AppliedStatus", type="integer", precision=0, scale=0, nullable=false, options={"comment"="0=Not Applied;1=Applied"}, unique=false)
     */
    private $appliedstatus;

    /**
     * @var int
     *
     * @ORM\Column(name="editType", type="integer", precision=0, scale=0, nullable=false, options={"default"="0","comment"="0=general edit;1=batch edit"}, unique=false)
     */
    private $edittype = '0';

    /**
     * @var string|null
     *
     * @ORM\Column(name="guid", type="string", length=45, precision=0, scale=0, nullable=true, unique=false)
     */
    private $guid;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="initialtimestamp", type="datetime", precision=0, scale=0, nullable=false, options={"default"="CURRENT_TIMESTAMP"}, unique=false)
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
     * @var \App\Entities\User
     *
     * @ORM\ManyToOne(targetEntity="App\Entities\User")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="uid", referencedColumnName="uid", nullable=true)
     * })
     */
    private $uid;


    /**
     * Get ocedid.
     *
     * @return int
     */
    public function getOcedid()
    {
        return $this->ocedid;
    }

    /**
     * Set fieldname.
     *
     * @param string $fieldname
     *
     * @return Omoccuredits
     */
    public function setFieldname($fieldname)
    {
        $this->fieldname = $fieldname;

        return $this;
    }

    /**
     * Get fieldname.
     *
     * @return string
     */
    public function getFieldname()
    {
        return $this->fieldname;
    }

    /**
     * Set fieldvaluenew.
     *
     * @param string $fieldvaluenew
     *
     * @return Omoccuredits
     */
    public function setFieldvaluenew($fieldvaluenew)
    {
        $this->fieldvaluenew = $fieldvaluenew;

        return $this;
    }

    /**
     * Get fieldvaluenew.
     *
     * @return string
     */
    public function getFieldvaluenew()
    {
        return $this->fieldvaluenew;
    }

    /**
     * Set fieldvalueold.
     *
     * @param string $fieldvalueold
     *
     * @return Omoccuredits
     */
    public function setFieldvalueold($fieldvalueold)
    {
        $this->fieldvalueold = $fieldvalueold;

        return $this;
    }

    /**
     * Get fieldvalueold.
     *
     * @return string
     */
    public function getFieldvalueold()
    {
        return $this->fieldvalueold;
    }

    /**
     * Set reviewstatus.
     *
     * @param int $reviewstatus
     *
     * @return Omoccuredits
     */
    public function setReviewstatus($reviewstatus)
    {
        $this->reviewstatus = $reviewstatus;

        return $this;
    }

    /**
     * Get reviewstatus.
     *
     * @return int
     */
    public function getReviewstatus()
    {
        return $this->reviewstatus;
    }

    /**
     * Set appliedstatus.
     *
     * @param int $appliedstatus
     *
     * @return Omoccuredits
     */
    public function setAppliedstatus($appliedstatus)
    {
        $this->appliedstatus = $appliedstatus;

        return $this;
    }

    /**
     * Get appliedstatus.
     *
     * @return int
     */
    public function getAppliedstatus()
    {
        return $this->appliedstatus;
    }

    /**
     * Set edittype.
     *
     * @param int $edittype
     *
     * @return Omoccuredits
     */
    public function setEdittype($edittype)
    {
        $this->edittype = $edittype;

        return $this;
    }

    /**
     * Get edittype.
     *
     * @return int
     */
    public function getEdittype()
    {
        return $this->edittype;
    }

    /**
     * Set guid.
     *
     * @param string|null $guid
     *
     * @return Omoccuredits
     */
    public function setGuid($guid = null)
    {
        $this->guid = $guid;

        return $this;
    }

    /**
     * Get guid.
     *
     * @return string|null
     */
    public function getGuid()
    {
        return $this->guid;
    }

    /**
     * Set initialtimestamp.
     *
     * @param \DateTime $initialtimestamp
     *
     * @return Omoccuredits
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
     * Set occid.
     *
     * @param \App\Entities\Omoccurrences|null $occid
     *
     * @return Omoccuredits
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

    /**
     * Set uid.
     *
     * @param \App\Entities\User|null $uid
     *
     * @return Omoccuredits
     */
    public function setUid(\App\Entities\User $uid = null)
    {
        $this->uid = $uid;

        return $this;
    }

    /**
     * Get uid.
     *
     * @return \App\Entities\User|null
     */
    public function getUid()
    {
        return $this->uid;
    }
}
