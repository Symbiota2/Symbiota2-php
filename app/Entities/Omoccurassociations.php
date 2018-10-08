<?php

namespace App\Entities;

use Doctrine\ORM\Mapping as ORM;

/**
 * Omoccurassociations
 *
 * @ORM\Table(name="omoccurassociations", indexes={@ORM\Index(name="omossococcur_occid_idx", columns={"occid"}), @ORM\Index(name="omossococcur_occidassoc_idx", columns={"occidassociate"}), @ORM\Index(name="FK_occurassoc_tid_idx", columns={"tid"}), @ORM\Index(name="FK_occurassoc_uidmodified_idx", columns={"modifieduid"}), @ORM\Index(name="FK_occurassoc_uidcreated_idx", columns={"createduid"}), @ORM\Index(name="INDEX_verbatimSciname", columns={"verbatimsciname"})})
 * @ORM\Entity
 */
class Omoccurassociations
{
    /**
     * @var int
     *
     * @ORM\Column(name="associd", type="integer", precision=0, scale=0, nullable=false, options={"unsigned"=true}, unique=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $associd;

    /**
     * @var string
     *
     * @ORM\Column(name="relationship", type="string", length=150, precision=0, scale=0, nullable=false, unique=false)
     */
    private $relationship;

    /**
     * @var string|null
     *
     * @ORM\Column(name="identifier", type="string", length=250, precision=0, scale=0, nullable=true, options={"comment"="e.g. GUID"}, unique=false)
     */
    private $identifier;

    /**
     * @var string|null
     *
     * @ORM\Column(name="basisOfRecord", type="string", length=45, precision=0, scale=0, nullable=true, unique=false)
     */
    private $basisofrecord;

    /**
     * @var string|null
     *
     * @ORM\Column(name="resourceurl", type="string", length=250, precision=0, scale=0, nullable=true, unique=false)
     */
    private $resourceurl;

    /**
     * @var string|null
     *
     * @ORM\Column(name="verbatimsciname", type="string", length=250, precision=0, scale=0, nullable=true, unique=false)
     */
    private $verbatimsciname;

    /**
     * @var string|null
     *
     * @ORM\Column(name="locationOnHost", type="string", length=250, precision=0, scale=0, nullable=true, unique=false)
     */
    private $locationonhost;

    /**
     * @var string|null
     *
     * @ORM\Column(name="condition", type="string", length=250, precision=0, scale=0, nullable=true, unique=false)
     */
    private $condition;

    /**
     * @var \DateTime|null
     *
     * @ORM\Column(name="dateEmerged", type="datetime", precision=0, scale=0, nullable=true, unique=false)
     */
    private $dateemerged;

    /**
     * @var string|null
     *
     * @ORM\Column(name="dynamicProperties", type="text", length=65535, precision=0, scale=0, nullable=true, unique=false)
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
     * @ORM\Column(name="datelastmodified", type="datetime", precision=0, scale=0, nullable=true, unique=false)
     */
    private $datelastmodified;

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
     * @var \App\Entities\Omoccurrences
     *
     * @ORM\ManyToOne(targetEntity="App\Entities\Omoccurrences")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="occidassociate", referencedColumnName="occid", nullable=true)
     * })
     */
    private $occidassociate;

    /**
     * @var \App\Entities\Taxa
     *
     * @ORM\ManyToOne(targetEntity="App\Entities\Taxa")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="tid", referencedColumnName="tid", nullable=true)
     * })
     */
    private $tid;

    /**
     * @var \App\Entities\User
     *
     * @ORM\ManyToOne(targetEntity="App\Entities\User")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="createduid", referencedColumnName="uid", nullable=true)
     * })
     */
    private $createduid;

    /**
     * @var \App\Entities\User
     *
     * @ORM\ManyToOne(targetEntity="App\Entities\User")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="modifieduid", referencedColumnName="uid", nullable=true)
     * })
     */
    private $modifieduid;


    /**
     * Get associd.
     *
     * @return int
     */
    public function getAssocid()
    {
        return $this->associd;
    }

    /**
     * Set relationship.
     *
     * @param string $relationship
     *
     * @return Omoccurassociations
     */
    public function setRelationship($relationship)
    {
        $this->relationship = $relationship;

        return $this;
    }

    /**
     * Get relationship.
     *
     * @return string
     */
    public function getRelationship()
    {
        return $this->relationship;
    }

    /**
     * Set identifier.
     *
     * @param string|null $identifier
     *
     * @return Omoccurassociations
     */
    public function setIdentifier($identifier = null)
    {
        $this->identifier = $identifier;

        return $this;
    }

    /**
     * Get identifier.
     *
     * @return string|null
     */
    public function getIdentifier()
    {
        return $this->identifier;
    }

    /**
     * Set basisofrecord.
     *
     * @param string|null $basisofrecord
     *
     * @return Omoccurassociations
     */
    public function setBasisofrecord($basisofrecord = null)
    {
        $this->basisofrecord = $basisofrecord;

        return $this;
    }

    /**
     * Get basisofrecord.
     *
     * @return string|null
     */
    public function getBasisofrecord()
    {
        return $this->basisofrecord;
    }

    /**
     * Set resourceurl.
     *
     * @param string|null $resourceurl
     *
     * @return Omoccurassociations
     */
    public function setResourceurl($resourceurl = null)
    {
        $this->resourceurl = $resourceurl;

        return $this;
    }

    /**
     * Get resourceurl.
     *
     * @return string|null
     */
    public function getResourceurl()
    {
        return $this->resourceurl;
    }

    /**
     * Set verbatimsciname.
     *
     * @param string|null $verbatimsciname
     *
     * @return Omoccurassociations
     */
    public function setVerbatimsciname($verbatimsciname = null)
    {
        $this->verbatimsciname = $verbatimsciname;

        return $this;
    }

    /**
     * Get verbatimsciname.
     *
     * @return string|null
     */
    public function getVerbatimsciname()
    {
        return $this->verbatimsciname;
    }

    /**
     * Set locationonhost.
     *
     * @param string|null $locationonhost
     *
     * @return Omoccurassociations
     */
    public function setLocationonhost($locationonhost = null)
    {
        $this->locationonhost = $locationonhost;

        return $this;
    }

    /**
     * Get locationonhost.
     *
     * @return string|null
     */
    public function getLocationonhost()
    {
        return $this->locationonhost;
    }

    /**
     * Set condition.
     *
     * @param string|null $condition
     *
     * @return Omoccurassociations
     */
    public function setCondition($condition = null)
    {
        $this->condition = $condition;

        return $this;
    }

    /**
     * Get condition.
     *
     * @return string|null
     */
    public function getCondition()
    {
        return $this->condition;
    }

    /**
     * Set dateemerged.
     *
     * @param \DateTime|null $dateemerged
     *
     * @return Omoccurassociations
     */
    public function setDateemerged($dateemerged = null)
    {
        $this->dateemerged = $dateemerged;

        return $this;
    }

    /**
     * Get dateemerged.
     *
     * @return \DateTime|null
     */
    public function getDateemerged()
    {
        return $this->dateemerged;
    }

    /**
     * Set dynamicproperties.
     *
     * @param string|null $dynamicproperties
     *
     * @return Omoccurassociations
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
     * @return Omoccurassociations
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
     * Set datelastmodified.
     *
     * @param \DateTime|null $datelastmodified
     *
     * @return Omoccurassociations
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
     * Set initialtimestamp.
     *
     * @param \DateTime $initialtimestamp
     *
     * @return Omoccurassociations
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
     * @return Omoccurassociations
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
     * Set occidassociate.
     *
     * @param \App\Entities\Omoccurrences|null $occidassociate
     *
     * @return Omoccurassociations
     */
    public function setOccidassociate(\App\Entities\Omoccurrences $occidassociate = null)
    {
        $this->occidassociate = $occidassociate;

        return $this;
    }

    /**
     * Get occidassociate.
     *
     * @return \App\Entities\Omoccurrences|null
     */
    public function getOccidassociate()
    {
        return $this->occidassociate;
    }

    /**
     * Set tid.
     *
     * @param \App\Entities\Taxa|null $tid
     *
     * @return Omoccurassociations
     */
    public function setTid(\App\Entities\Taxa $tid = null)
    {
        $this->tid = $tid;

        return $this;
    }

    /**
     * Get tid.
     *
     * @return \App\Entities\Taxa|null
     */
    public function getTid()
    {
        return $this->tid;
    }

    /**
     * Set createduid.
     *
     * @param \App\Entities\User|null $createduid
     *
     * @return Omoccurassociations
     */
    public function setCreateduid(\App\Entities\User $createduid = null)
    {
        $this->createduid = $createduid;

        return $this;
    }

    /**
     * Get createduid.
     *
     * @return \App\Entities\User|null
     */
    public function getCreateduid()
    {
        return $this->createduid;
    }

    /**
     * Set modifieduid.
     *
     * @param \App\Entities\User|null $modifieduid
     *
     * @return Omoccurassociations
     */
    public function setModifieduid(\App\Entities\User $modifieduid = null)
    {
        $this->modifieduid = $modifieduid;

        return $this;
    }

    /**
     * Get modifieduid.
     *
     * @return \App\Entities\User|null
     */
    public function getModifieduid()
    {
        return $this->modifieduid;
    }
}
