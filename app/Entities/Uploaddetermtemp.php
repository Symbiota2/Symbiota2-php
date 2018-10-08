<?php

namespace App\Entities;

use Doctrine\ORM\Mapping as ORM;

/**
 * Uploaddetermtemp
 *
 * @ORM\Table(name="uploaddetermtemp", indexes={@ORM\Index(name="Index_uploaddet_occid", columns={"occid"}), @ORM\Index(name="Index_uploaddet_collid", columns={"collid"}), @ORM\Index(name="Index_uploaddet_dbpk", columns={"dbpk"})})
 * @ORM\Entity
 */
class Uploaddetermtemp
{
    /**
     * @var int
     *
     * @ORM\Column(name="updetid", type="integer", precision=0, scale=0, nullable=false, unique=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $updetid;

    /**
     * @var int|null
     *
     * @ORM\Column(name="occid", type="integer", precision=0, scale=0, nullable=true, options={"unsigned"=true}, unique=false)
     */
    private $occid;

    /**
     * @var int|null
     *
     * @ORM\Column(name="collid", type="integer", precision=0, scale=0, nullable=true, options={"unsigned"=true}, unique=false)
     */
    private $collid;

    /**
     * @var string|null
     *
     * @ORM\Column(name="dbpk", type="string", length=150, precision=0, scale=0, nullable=true, unique=false)
     */
    private $dbpk;

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
     * @ORM\Column(name="identificationRemarks", type="string", length=255, precision=0, scale=0, nullable=true, unique=false)
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
     * Get updetid.
     *
     * @return int
     */
    public function getUpdetid()
    {
        return $this->updetid;
    }

    /**
     * Set occid.
     *
     * @param int|null $occid
     *
     * @return Uploaddetermtemp
     */
    public function setOccid($occid = null)
    {
        $this->occid = $occid;

        return $this;
    }

    /**
     * Get occid.
     *
     * @return int|null
     */
    public function getOccid()
    {
        return $this->occid;
    }

    /**
     * Set collid.
     *
     * @param int|null $collid
     *
     * @return Uploaddetermtemp
     */
    public function setCollid($collid = null)
    {
        $this->collid = $collid;

        return $this;
    }

    /**
     * Get collid.
     *
     * @return int|null
     */
    public function getCollid()
    {
        return $this->collid;
    }

    /**
     * Set dbpk.
     *
     * @param string|null $dbpk
     *
     * @return Uploaddetermtemp
     */
    public function setDbpk($dbpk = null)
    {
        $this->dbpk = $dbpk;

        return $this;
    }

    /**
     * Get dbpk.
     *
     * @return string|null
     */
    public function getDbpk()
    {
        return $this->dbpk;
    }

    /**
     * Set identifiedby.
     *
     * @param string $identifiedby
     *
     * @return Uploaddetermtemp
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
     * @return Uploaddetermtemp
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
     * @return Uploaddetermtemp
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
     * @return Uploaddetermtemp
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
     * @return Uploaddetermtemp
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
     * @return Uploaddetermtemp
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
     * @return Uploaddetermtemp
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
     * Set dettype.
     *
     * @param string|null $dettype
     *
     * @return Uploaddetermtemp
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
     * @return Uploaddetermtemp
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
     * @return Uploaddetermtemp
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
     * @return Uploaddetermtemp
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
     * @return Uploaddetermtemp
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
     * @return Uploaddetermtemp
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
}
