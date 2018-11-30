<?php

namespace App\Entities;

use Doctrine\ORM\Mapping as ORM;

/**
 * Omoccurrevisions
 *
 * @ORM\Table(name="omoccurrevisions", uniqueConstraints={@ORM\UniqueConstraint(name="guid_UNIQUE", columns={"guid"})}, indexes={@ORM\Index(name="fk_omrevisions_occid_idx", columns={"occid"}), @ORM\Index(name="fk_omrevisions_uid_idx", columns={"uid"}), @ORM\Index(name="Index_omrevisions_applied", columns={"appliedStatus"}), @ORM\Index(name="Index_omrevisions_reviewed", columns={"reviewStatus"}), @ORM\Index(name="Index_omrevisions_source", columns={"externalSource"}), @ORM\Index(name="Index_omrevisions_editor", columns={"externalEditor"})})
 * @ORM\Entity
 */
class Omoccurrevisions
{
    /**
     * @var int
     *
     * @ORM\Column(name="orid", type="integer", precision=0, scale=0, nullable=false, unique=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $orid;

    /**
     * @var string|null
     *
     * @ORM\Column(name="oldValues", type="text", length=65535, precision=0, scale=0, nullable=true, unique=false)
     */
    private $oldvalues;

    /**
     * @var string|null
     *
     * @ORM\Column(name="newValues", type="text", length=65535, precision=0, scale=0, nullable=true, unique=false)
     */
    private $newvalues;

    /**
     * @var string|null
     *
     * @ORM\Column(name="externalSource", type="string", length=45, precision=0, scale=0, nullable=true, unique=false)
     */
    private $externalsource;

    /**
     * @var string|null
     *
     * @ORM\Column(name="externalEditor", type="string", length=100, precision=0, scale=0, nullable=true, unique=false)
     */
    private $externaleditor;

    /**
     * @var string|null
     *
     * @ORM\Column(name="guid", type="string", length=45, precision=0, scale=0, nullable=true, unique=false)
     */
    private $guid;

    /**
     * @var int|null
     *
     * @ORM\Column(name="reviewStatus", type="integer", precision=0, scale=0, nullable=true, unique=false)
     */
    private $reviewstatus;

    /**
     * @var int|null
     *
     * @ORM\Column(name="appliedStatus", type="integer", precision=0, scale=0, nullable=true, unique=false)
     */
    private $appliedstatus;

    /**
     * @var string|null
     *
     * @ORM\Column(name="errorMessage", type="string", length=500, precision=0, scale=0, nullable=true, unique=false)
     */
    private $errormessage;

    /**
     * @var \DateTime|null
     *
     * @ORM\Column(name="externalTimestamp", type="datetime", precision=0, scale=0, nullable=true, unique=false)
     */
    private $externaltimestamp;

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
     * Get orid.
     *
     * @return int
     */
    public function getOrid()
    {
        return $this->orid;
    }

    /**
     * Set oldvalues.
     *
     * @param string|null $oldvalues
     *
     * @return Omoccurrevisions
     */
    public function setOldvalues($oldvalues = null)
    {
        $this->oldvalues = $oldvalues;

        return $this;
    }

    /**
     * Get oldvalues.
     *
     * @return string|null
     */
    public function getOldvalues()
    {
        return $this->oldvalues;
    }

    /**
     * Set newvalues.
     *
     * @param string|null $newvalues
     *
     * @return Omoccurrevisions
     */
    public function setNewvalues($newvalues = null)
    {
        $this->newvalues = $newvalues;

        return $this;
    }

    /**
     * Get newvalues.
     *
     * @return string|null
     */
    public function getNewvalues()
    {
        return $this->newvalues;
    }

    /**
     * Set externalsource.
     *
     * @param string|null $externalsource
     *
     * @return Omoccurrevisions
     */
    public function setExternalsource($externalsource = null)
    {
        $this->externalsource = $externalsource;

        return $this;
    }

    /**
     * Get externalsource.
     *
     * @return string|null
     */
    public function getExternalsource()
    {
        return $this->externalsource;
    }

    /**
     * Set externaleditor.
     *
     * @param string|null $externaleditor
     *
     * @return Omoccurrevisions
     */
    public function setExternaleditor($externaleditor = null)
    {
        $this->externaleditor = $externaleditor;

        return $this;
    }

    /**
     * Get externaleditor.
     *
     * @return string|null
     */
    public function getExternaleditor()
    {
        return $this->externaleditor;
    }

    /**
     * Set guid.
     *
     * @param string|null $guid
     *
     * @return Omoccurrevisions
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
     * Set reviewstatus.
     *
     * @param int|null $reviewstatus
     *
     * @return Omoccurrevisions
     */
    public function setReviewstatus($reviewstatus = null)
    {
        $this->reviewstatus = $reviewstatus;

        return $this;
    }

    /**
     * Get reviewstatus.
     *
     * @return int|null
     */
    public function getReviewstatus()
    {
        return $this->reviewstatus;
    }

    /**
     * Set appliedstatus.
     *
     * @param int|null $appliedstatus
     *
     * @return Omoccurrevisions
     */
    public function setAppliedstatus($appliedstatus = null)
    {
        $this->appliedstatus = $appliedstatus;

        return $this;
    }

    /**
     * Get appliedstatus.
     *
     * @return int|null
     */
    public function getAppliedstatus()
    {
        return $this->appliedstatus;
    }

    /**
     * Set errormessage.
     *
     * @param string|null $errormessage
     *
     * @return Omoccurrevisions
     */
    public function setErrormessage($errormessage = null)
    {
        $this->errormessage = $errormessage;

        return $this;
    }

    /**
     * Get errormessage.
     *
     * @return string|null
     */
    public function getErrormessage()
    {
        return $this->errormessage;
    }

    /**
     * Set externaltimestamp.
     *
     * @param \DateTime|null $externaltimestamp
     *
     * @return Omoccurrevisions
     */
    public function setExternaltimestamp($externaltimestamp = null)
    {
        $this->externaltimestamp = $externaltimestamp;

        return $this;
    }

    /**
     * Get externaltimestamp.
     *
     * @return \DateTime|null
     */
    public function getExternaltimestamp()
    {
        return $this->externaltimestamp;
    }

    /**
     * Set initialtimestamp.
     *
     * @param \DateTime $initialtimestamp
     *
     * @return Omoccurrevisions
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
     * @return Omoccurrevisions
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
     * @return Omoccurrevisions
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
