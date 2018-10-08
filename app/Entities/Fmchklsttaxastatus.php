<?php

namespace App\Entities;

use Doctrine\ORM\Mapping as ORM;

/**
 * Fmchklsttaxastatus
 *
 * @ORM\Table(name="fmchklsttaxastatus", indexes={@ORM\Index(name="FK_fmchklsttaxastatus_clid_idx", columns={"clid", "tid"})})
 * @ORM\Entity
 */
class Fmchklsttaxastatus
{
    /**
     * @var int
     *
     * @ORM\Column(name="clid", type="integer", precision=0, scale=0, nullable=false, options={"unsigned"=true}, unique=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     */
    private $clid;

    /**
     * @var int
     *
     * @ORM\Column(name="tid", type="integer", precision=0, scale=0, nullable=false, options={"unsigned"=true}, unique=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     */
    private $tid;

    /**
     * @var int
     *
     * @ORM\Column(name="geographicRange", type="integer", precision=0, scale=0, nullable=false, unique=false)
     */
    private $geographicrange;

    /**
     * @var int
     *
     * @ORM\Column(name="populationRank", type="integer", precision=0, scale=0, nullable=false, unique=false)
     */
    private $populationrank;

    /**
     * @var int
     *
     * @ORM\Column(name="abundance", type="integer", precision=0, scale=0, nullable=false, unique=false)
     */
    private $abundance;

    /**
     * @var int
     *
     * @ORM\Column(name="habitatSpecificity", type="integer", precision=0, scale=0, nullable=false, unique=false)
     */
    private $habitatspecificity;

    /**
     * @var int
     *
     * @ORM\Column(name="intrinsicRarity", type="integer", precision=0, scale=0, nullable=false, unique=false)
     */
    private $intrinsicrarity;

    /**
     * @var int
     *
     * @ORM\Column(name="threatImminence", type="integer", precision=0, scale=0, nullable=false, unique=false)
     */
    private $threatimminence;

    /**
     * @var int
     *
     * @ORM\Column(name="populationTrends", type="integer", precision=0, scale=0, nullable=false, unique=false)
     */
    private $populationtrends;

    /**
     * @var string|null
     *
     * @ORM\Column(name="nativeStatus", type="string", length=45, precision=0, scale=0, nullable=true, unique=false)
     */
    private $nativestatus;

    /**
     * @var int
     *
     * @ORM\Column(name="endemicStatus", type="integer", precision=0, scale=0, nullable=false, unique=false)
     */
    private $endemicstatus;

    /**
     * @var string|null
     *
     * @ORM\Column(name="protectedStatus", type="string", length=45, precision=0, scale=0, nullable=true, unique=false)
     */
    private $protectedstatus;

    /**
     * @var int|null
     *
     * @ORM\Column(name="localitySecurity", type="integer", precision=0, scale=0, nullable=true, unique=false)
     */
    private $localitysecurity;

    /**
     * @var string|null
     *
     * @ORM\Column(name="localitySecurityReason", type="string", length=45, precision=0, scale=0, nullable=true, unique=false)
     */
    private $localitysecurityreason;

    /**
     * @var string|null
     *
     * @ORM\Column(name="invasiveStatus", type="string", length=45, precision=0, scale=0, nullable=true, unique=false)
     */
    private $invasivestatus;

    /**
     * @var string|null
     *
     * @ORM\Column(name="notes", type="string", length=250, precision=0, scale=0, nullable=true, unique=false)
     */
    private $notes;

    /**
     * @var int|null
     *
     * @ORM\Column(name="modifiedUid", type="integer", precision=0, scale=0, nullable=true, options={"unsigned"=true}, unique=false)
     */
    private $modifieduid;

    /**
     * @var \DateTime|null
     *
     * @ORM\Column(name="modifiedtimestamp", type="datetime", precision=0, scale=0, nullable=true, unique=false)
     */
    private $modifiedtimestamp;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="initialtimestamp", type="datetime", precision=0, scale=0, nullable=false, options={"default"="CURRENT_TIMESTAMP"}, unique=false)
     */
    private $initialtimestamp = 'CURRENT_TIMESTAMP';


    /**
     * Set clid.
     *
     * @param int $clid
     *
     * @return Fmchklsttaxastatus
     */
    public function setClid($clid)
    {
        $this->clid = $clid;

        return $this;
    }

    /**
     * Get clid.
     *
     * @return int
     */
    public function getClid()
    {
        return $this->clid;
    }

    /**
     * Set tid.
     *
     * @param int $tid
     *
     * @return Fmchklsttaxastatus
     */
    public function setTid($tid)
    {
        $this->tid = $tid;

        return $this;
    }

    /**
     * Get tid.
     *
     * @return int
     */
    public function getTid()
    {
        return $this->tid;
    }

    /**
     * Set geographicrange.
     *
     * @param int $geographicrange
     *
     * @return Fmchklsttaxastatus
     */
    public function setGeographicrange($geographicrange)
    {
        $this->geographicrange = $geographicrange;

        return $this;
    }

    /**
     * Get geographicrange.
     *
     * @return int
     */
    public function getGeographicrange()
    {
        return $this->geographicrange;
    }

    /**
     * Set populationrank.
     *
     * @param int $populationrank
     *
     * @return Fmchklsttaxastatus
     */
    public function setPopulationrank($populationrank)
    {
        $this->populationrank = $populationrank;

        return $this;
    }

    /**
     * Get populationrank.
     *
     * @return int
     */
    public function getPopulationrank()
    {
        return $this->populationrank;
    }

    /**
     * Set abundance.
     *
     * @param int $abundance
     *
     * @return Fmchklsttaxastatus
     */
    public function setAbundance($abundance)
    {
        $this->abundance = $abundance;

        return $this;
    }

    /**
     * Get abundance.
     *
     * @return int
     */
    public function getAbundance()
    {
        return $this->abundance;
    }

    /**
     * Set habitatspecificity.
     *
     * @param int $habitatspecificity
     *
     * @return Fmchklsttaxastatus
     */
    public function setHabitatspecificity($habitatspecificity)
    {
        $this->habitatspecificity = $habitatspecificity;

        return $this;
    }

    /**
     * Get habitatspecificity.
     *
     * @return int
     */
    public function getHabitatspecificity()
    {
        return $this->habitatspecificity;
    }

    /**
     * Set intrinsicrarity.
     *
     * @param int $intrinsicrarity
     *
     * @return Fmchklsttaxastatus
     */
    public function setIntrinsicrarity($intrinsicrarity)
    {
        $this->intrinsicrarity = $intrinsicrarity;

        return $this;
    }

    /**
     * Get intrinsicrarity.
     *
     * @return int
     */
    public function getIntrinsicrarity()
    {
        return $this->intrinsicrarity;
    }

    /**
     * Set threatimminence.
     *
     * @param int $threatimminence
     *
     * @return Fmchklsttaxastatus
     */
    public function setThreatimminence($threatimminence)
    {
        $this->threatimminence = $threatimminence;

        return $this;
    }

    /**
     * Get threatimminence.
     *
     * @return int
     */
    public function getThreatimminence()
    {
        return $this->threatimminence;
    }

    /**
     * Set populationtrends.
     *
     * @param int $populationtrends
     *
     * @return Fmchklsttaxastatus
     */
    public function setPopulationtrends($populationtrends)
    {
        $this->populationtrends = $populationtrends;

        return $this;
    }

    /**
     * Get populationtrends.
     *
     * @return int
     */
    public function getPopulationtrends()
    {
        return $this->populationtrends;
    }

    /**
     * Set nativestatus.
     *
     * @param string|null $nativestatus
     *
     * @return Fmchklsttaxastatus
     */
    public function setNativestatus($nativestatus = null)
    {
        $this->nativestatus = $nativestatus;

        return $this;
    }

    /**
     * Get nativestatus.
     *
     * @return string|null
     */
    public function getNativestatus()
    {
        return $this->nativestatus;
    }

    /**
     * Set endemicstatus.
     *
     * @param int $endemicstatus
     *
     * @return Fmchklsttaxastatus
     */
    public function setEndemicstatus($endemicstatus)
    {
        $this->endemicstatus = $endemicstatus;

        return $this;
    }

    /**
     * Get endemicstatus.
     *
     * @return int
     */
    public function getEndemicstatus()
    {
        return $this->endemicstatus;
    }

    /**
     * Set protectedstatus.
     *
     * @param string|null $protectedstatus
     *
     * @return Fmchklsttaxastatus
     */
    public function setProtectedstatus($protectedstatus = null)
    {
        $this->protectedstatus = $protectedstatus;

        return $this;
    }

    /**
     * Get protectedstatus.
     *
     * @return string|null
     */
    public function getProtectedstatus()
    {
        return $this->protectedstatus;
    }

    /**
     * Set localitysecurity.
     *
     * @param int|null $localitysecurity
     *
     * @return Fmchklsttaxastatus
     */
    public function setLocalitysecurity($localitysecurity = null)
    {
        $this->localitysecurity = $localitysecurity;

        return $this;
    }

    /**
     * Get localitysecurity.
     *
     * @return int|null
     */
    public function getLocalitysecurity()
    {
        return $this->localitysecurity;
    }

    /**
     * Set localitysecurityreason.
     *
     * @param string|null $localitysecurityreason
     *
     * @return Fmchklsttaxastatus
     */
    public function setLocalitysecurityreason($localitysecurityreason = null)
    {
        $this->localitysecurityreason = $localitysecurityreason;

        return $this;
    }

    /**
     * Get localitysecurityreason.
     *
     * @return string|null
     */
    public function getLocalitysecurityreason()
    {
        return $this->localitysecurityreason;
    }

    /**
     * Set invasivestatus.
     *
     * @param string|null $invasivestatus
     *
     * @return Fmchklsttaxastatus
     */
    public function setInvasivestatus($invasivestatus = null)
    {
        $this->invasivestatus = $invasivestatus;

        return $this;
    }

    /**
     * Get invasivestatus.
     *
     * @return string|null
     */
    public function getInvasivestatus()
    {
        return $this->invasivestatus;
    }

    /**
     * Set notes.
     *
     * @param string|null $notes
     *
     * @return Fmchklsttaxastatus
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
     * Set modifieduid.
     *
     * @param int|null $modifieduid
     *
     * @return Fmchklsttaxastatus
     */
    public function setModifieduid($modifieduid = null)
    {
        $this->modifieduid = $modifieduid;

        return $this;
    }

    /**
     * Get modifieduid.
     *
     * @return int|null
     */
    public function getModifieduid()
    {
        return $this->modifieduid;
    }

    /**
     * Set modifiedtimestamp.
     *
     * @param \DateTime|null $modifiedtimestamp
     *
     * @return Fmchklsttaxastatus
     */
    public function setModifiedtimestamp($modifiedtimestamp = null)
    {
        $this->modifiedtimestamp = $modifiedtimestamp;

        return $this;
    }

    /**
     * Get modifiedtimestamp.
     *
     * @return \DateTime|null
     */
    public function getModifiedtimestamp()
    {
        return $this->modifiedtimestamp;
    }

    /**
     * Set initialtimestamp.
     *
     * @param \DateTime $initialtimestamp
     *
     * @return Fmchklsttaxastatus
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
