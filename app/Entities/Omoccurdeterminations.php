<?php

namespace App\Entities;

use Doctrine\ORM\Mapping as ORM;

/**
 * Omoccurdeterminations
 *
 * @ORM\Table(name="omoccurdeterminations", uniqueConstraints={@ORM\UniqueConstraint(name="Index_unique", columns={"occid", "dateIdentified", "identifiedBy", "sciname"})}, indexes={@ORM\Index(name="FK_omoccurdets_tid", columns={"tidinterpreted"}), @ORM\Index(name="FK_omoccurdets_idby_idx", columns={"idbyid"}), @ORM\Index(name="Index_dateIdentInterpreted", columns={"dateIdentifiedInterpreted"}), @ORM\Index(name="IDX_CA5B5A7F40A24FBA", columns={"occid"})})
 * @ORM\Entity
 */
class Omoccurdeterminations
{
    /**
     * @var int
     *
     * @ORM\Column(name="detid", type="integer", precision=0, scale=0, nullable=false, options={"unsigned"=true}, unique=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $detid;

    /**
     * @var string
     *
     * @ORM\Column(name="identifiedBy", type="string", length=60, precision=0, scale=0, nullable=false, unique=false)
     */
    private $identifiedby;

    /**
     * @var string
     *
     * @ORM\Column(name="dateIdentified", type="string", length=45, precision=0, scale=0, nullable=false, unique=false)
     */
    private $dateidentified;

    /**
     * @var \DateTime|null
     *
     * @ORM\Column(name="dateIdentifiedInterpreted", type="date", precision=0, scale=0, nullable=true, unique=false)
     */
    private $dateidentifiedinterpreted;

    /**
     * @var string
     *
     * @ORM\Column(name="sciname", type="string", length=100, precision=0, scale=0, nullable=false, unique=false)
     */
    private $sciname;

    /**
     * @var string|null
     *
     * @ORM\Column(name="scientificNameAuthorship", type="string", length=100, precision=0, scale=0, nullable=true, unique=false)
     */
    private $scientificnameauthorship;

    /**
     * @var string|null
     *
     * @ORM\Column(name="identificationQualifier", type="string", length=45, precision=0, scale=0, nullable=true, unique=false)
     */
    private $identificationqualifier;

    /**
     * @var int|null
     *
     * @ORM\Column(name="iscurrent", type="integer", precision=0, scale=0, nullable=true, unique=false)
     */
    private $iscurrent;

    /**
     * @var int|null
     *
     * @ORM\Column(name="printqueue", type="integer", precision=0, scale=0, nullable=true, unique=false)
     */
    private $printqueue;

    /**
     * @var int|null
     *
     * @ORM\Column(name="appliedStatus", type="integer", precision=0, scale=0, nullable=true, options={"default"="1"}, unique=false)
     */
    private $appliedstatus = '1';

    /**
     * @var string|null
     *
     * @ORM\Column(name="detType", type="string", length=45, precision=0, scale=0, nullable=true, unique=false)
     */
    private $dettype;

    /**
     * @var string|null
     *
     * @ORM\Column(name="identificationReferences", type="string", length=255, precision=0, scale=0, nullable=true, unique=false)
     */
    private $identificationreferences;

    /**
     * @var string|null
     *
     * @ORM\Column(name="identificationRemarks", type="string", length=500, precision=0, scale=0, nullable=true, unique=false)
     */
    private $identificationremarks;

    /**
     * @var string|null
     *
     * @ORM\Column(name="sourceIdentifier", type="string", length=45, precision=0, scale=0, nullable=true, unique=false)
     */
    private $sourceidentifier;

    /**
     * @var int|null
     *
     * @ORM\Column(name="sortsequence", type="integer", precision=0, scale=0, nullable=true, options={"default"="10","unsigned"=true}, unique=false)
     */
    private $sortsequence = '10';

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="initialtimestamp", type="datetime", precision=0, scale=0, nullable=false, options={"default"="CURRENT_TIMESTAMP"}, unique=false)
     */
    private $initialtimestamp = 'CURRENT_TIMESTAMP';

    /**
     * @var \App\Entities\Omcollectors
     *
     * @ORM\ManyToOne(targetEntity="App\Entities\Omcollectors")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="idbyid", referencedColumnName="recordedById", nullable=true)
     * })
     */
    private $idbyid;

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
     * @var \App\Entities\Taxa
     *
     * @ORM\ManyToOne(targetEntity="App\Entities\Taxa")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="tidinterpreted", referencedColumnName="tid", nullable=true)
     * })
     */
    private $tidinterpreted;


    /**
     * Get detid.
     *
     * @return int
     */
    public function getDetid()
    {
        return $this->detid;
    }

    /**
     * Set identifiedby.
     *
     * @param string $identifiedby
     *
     * @return Omoccurdeterminations
     */
    public function setIdentifiedby($identifiedby)
    {
        $this->identifiedby = $identifiedby;

        return $this;
    }

    /**
     * Get identifiedby.
     *
     * @return string
     */
    public function getIdentifiedby()
    {
        return $this->identifiedby;
    }

    /**
     * Set dateidentified.
     *
     * @param string $dateidentified
     *
     * @return Omoccurdeterminations
     */
    public function setDateidentified($dateidentified)
    {
        $this->dateidentified = $dateidentified;

        return $this;
    }

    /**
     * Get dateidentified.
     *
     * @return string
     */
    public function getDateidentified()
    {
        return $this->dateidentified;
    }

    /**
     * Set dateidentifiedinterpreted.
     *
     * @param \DateTime|null $dateidentifiedinterpreted
     *
     * @return Omoccurdeterminations
     */
    public function setDateidentifiedinterpreted($dateidentifiedinterpreted = null)
    {
        $this->dateidentifiedinterpreted = $dateidentifiedinterpreted;

        return $this;
    }

    /**
     * Get dateidentifiedinterpreted.
     *
     * @return \DateTime|null
     */
    public function getDateidentifiedinterpreted()
    {
        return $this->dateidentifiedinterpreted;
    }

    /**
     * Set sciname.
     *
     * @param string $sciname
     *
     * @return Omoccurdeterminations
     */
    public function setSciname($sciname)
    {
        $this->sciname = $sciname;

        return $this;
    }

    /**
     * Get sciname.
     *
     * @return string
     */
    public function getSciname()
    {
        return $this->sciname;
    }

    /**
     * Set scientificnameauthorship.
     *
     * @param string|null $scientificnameauthorship
     *
     * @return Omoccurdeterminations
     */
    public function setScientificnameauthorship($scientificnameauthorship = null)
    {
        $this->scientificnameauthorship = $scientificnameauthorship;

        return $this;
    }

    /**
     * Get scientificnameauthorship.
     *
     * @return string|null
     */
    public function getScientificnameauthorship()
    {
        return $this->scientificnameauthorship;
    }

    /**
     * Set identificationqualifier.
     *
     * @param string|null $identificationqualifier
     *
     * @return Omoccurdeterminations
     */
    public function setIdentificationqualifier($identificationqualifier = null)
    {
        $this->identificationqualifier = $identificationqualifier;

        return $this;
    }

    /**
     * Get identificationqualifier.
     *
     * @return string|null
     */
    public function getIdentificationqualifier()
    {
        return $this->identificationqualifier;
    }

    /**
     * Set iscurrent.
     *
     * @param int|null $iscurrent
     *
     * @return Omoccurdeterminations
     */
    public function setIscurrent($iscurrent = null)
    {
        $this->iscurrent = $iscurrent;

        return $this;
    }

    /**
     * Get iscurrent.
     *
     * @return int|null
     */
    public function getIscurrent()
    {
        return $this->iscurrent;
    }

    /**
     * Set printqueue.
     *
     * @param int|null $printqueue
     *
     * @return Omoccurdeterminations
     */
    public function setPrintqueue($printqueue = null)
    {
        $this->printqueue = $printqueue;

        return $this;
    }

    /**
     * Get printqueue.
     *
     * @return int|null
     */
    public function getPrintqueue()
    {
        return $this->printqueue;
    }

    /**
     * Set appliedstatus.
     *
     * @param int|null $appliedstatus
     *
     * @return Omoccurdeterminations
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
     * Set dettype.
     *
     * @param string|null $dettype
     *
     * @return Omoccurdeterminations
     */
    public function setDettype($dettype = null)
    {
        $this->dettype = $dettype;

        return $this;
    }

    /**
     * Get dettype.
     *
     * @return string|null
     */
    public function getDettype()
    {
        return $this->dettype;
    }

    /**
     * Set identificationreferences.
     *
     * @param string|null $identificationreferences
     *
     * @return Omoccurdeterminations
     */
    public function setIdentificationreferences($identificationreferences = null)
    {
        $this->identificationreferences = $identificationreferences;

        return $this;
    }

    /**
     * Get identificationreferences.
     *
     * @return string|null
     */
    public function getIdentificationreferences()
    {
        return $this->identificationreferences;
    }

    /**
     * Set identificationremarks.
     *
     * @param string|null $identificationremarks
     *
     * @return Omoccurdeterminations
     */
    public function setIdentificationremarks($identificationremarks = null)
    {
        $this->identificationremarks = $identificationremarks;

        return $this;
    }

    /**
     * Get identificationremarks.
     *
     * @return string|null
     */
    public function getIdentificationremarks()
    {
        return $this->identificationremarks;
    }

    /**
     * Set sourceidentifier.
     *
     * @param string|null $sourceidentifier
     *
     * @return Omoccurdeterminations
     */
    public function setSourceidentifier($sourceidentifier = null)
    {
        $this->sourceidentifier = $sourceidentifier;

        return $this;
    }

    /**
     * Get sourceidentifier.
     *
     * @return string|null
     */
    public function getSourceidentifier()
    {
        return $this->sourceidentifier;
    }

    /**
     * Set sortsequence.
     *
     * @param int|null $sortsequence
     *
     * @return Omoccurdeterminations
     */
    public function setSortsequence($sortsequence = null)
    {
        $this->sortsequence = $sortsequence;

        return $this;
    }

    /**
     * Get sortsequence.
     *
     * @return int|null
     */
    public function getSortsequence()
    {
        return $this->sortsequence;
    }

    /**
     * Set initialtimestamp.
     *
     * @param \DateTime $initialtimestamp
     *
     * @return Omoccurdeterminations
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
     * Set idbyid.
     *
     * @param \App\Entities\Omcollectors|null $idbyid
     *
     * @return Omoccurdeterminations
     */
    public function setIdbyid(\App\Entities\Omcollectors $idbyid = null)
    {
        $this->idbyid = $idbyid;

        return $this;
    }

    /**
     * Get idbyid.
     *
     * @return \App\Entities\Omcollectors|null
     */
    public function getIdbyid()
    {
        return $this->idbyid;
    }

    /**
     * Set occid.
     *
     * @param \App\Entities\Omoccurrences|null $occid
     *
     * @return Omoccurdeterminations
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
     * Set tidinterpreted.
     *
     * @param \App\Entities\Taxa|null $tidinterpreted
     *
     * @return Omoccurdeterminations
     */
    public function setTidinterpreted(\App\Entities\Taxa $tidinterpreted = null)
    {
        $this->tidinterpreted = $tidinterpreted;

        return $this;
    }

    /**
     * Get tidinterpreted.
     *
     * @return \App\Entities\Taxa|null
     */
    public function getTidinterpreted()
    {
        return $this->tidinterpreted;
    }
}
