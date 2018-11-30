<?php

namespace App\Entities;

use Doctrine\ORM\Mapping as ORM;

/**
 * Fmchklsttaxalink
 *
 * @ORM\Table(name="fmchklsttaxalink", uniqueConstraints={@ORM\UniqueConstraint(name="FK_clidtidmorph_id", columns={"tid", "CLID", "morphospecies"})}, indexes={@ORM\Index(name="FK_chklsttaxalink_cid", columns={"CLID"})})
 * @ORM\Entity
 */
class Fmchklsttaxalink
{
    /**
     * @var int
     *
     * @ORM\Column(name="cltlid", type="integer", precision=0, scale=0, nullable=false, unique=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $cltlid;

    /**
     * @var int
     *
     * @ORM\Column(name="tid", type="integer", precision=0, scale=0, nullable=false, options={"unsigned"=true}, unique=false)
     */
    private $tid;

    /**
     * @var int
     *
     * @ORM\Column(name="CLID", type="integer", precision=0, scale=0, nullable=false, options={"unsigned"=true}, unique=false)
     */
    private $clid;

    /**
     * @var string
     *
     * @ORM\Column(name="morphospecies", type="string", length=45, precision=0, scale=0, nullable=false, unique=false)
     */
    private $morphospecies;

    /**
     * @var string|null
     *
     * @ORM\Column(name="familyoverride", type="string", length=50, precision=0, scale=0, nullable=true, unique=false)
     */
    private $familyoverride;

    /**
     * @var string|null
     *
     * @ORM\Column(name="Habitat", type="string", length=250, precision=0, scale=0, nullable=true, unique=false)
     */
    private $habitat;

    /**
     * @var string|null
     *
     * @ORM\Column(name="Abundance", type="string", length=50, precision=0, scale=0, nullable=true, unique=false)
     */
    private $abundance;

    /**
     * @var string|null
     *
     * @ORM\Column(name="Notes", type="string", length=2000, precision=0, scale=0, nullable=true, unique=false)
     */
    private $notes;

    /**
     * @var int|null
     *
     * @ORM\Column(name="explicitExclude", type="smallint", precision=0, scale=0, nullable=true, unique=false)
     */
    private $explicitexclude;

    /**
     * @var string|null
     *
     * @ORM\Column(name="source", type="string", length=250, precision=0, scale=0, nullable=true, unique=false)
     */
    private $source;

    /**
     * @var string|null
     *
     * @ORM\Column(name="Nativity", type="string", length=50, precision=0, scale=0, nullable=true, options={"comment"="native, introducted"}, unique=false)
     */
    private $nativity;

    /**
     * @var string|null
     *
     * @ORM\Column(name="Endemic", type="string", length=45, precision=0, scale=0, nullable=true, unique=false)
     */
    private $endemic;

    /**
     * @var string|null
     *
     * @ORM\Column(name="invasive", type="string", length=45, precision=0, scale=0, nullable=true, unique=false)
     */
    private $invasive;

    /**
     * @var string|null
     *
     * @ORM\Column(name="internalnotes", type="string", length=250, precision=0, scale=0, nullable=true, unique=false)
     */
    private $internalnotes;

    /**
     * @var string|null
     *
     * @ORM\Column(name="dynamicProperties", type="text", length=65535, precision=0, scale=0, nullable=true, unique=false)
     */
    private $dynamicproperties;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="InitialTimeStamp", type="datetime", precision=0, scale=0, nullable=false, options={"default"="CURRENT_TIMESTAMP"}, unique=false)
     */
    private $initialtimestamp = 'CURRENT_TIMESTAMP';


    /**
     * Get cltlid.
     *
     * @return int
     */
    public function getCltlid()
    {
        return $this->cltlid;
    }

    /**
     * Set tid.
     *
     * @param int $tid
     *
     * @return Fmchklsttaxalink
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
     * Set clid.
     *
     * @param int $clid
     *
     * @return Fmchklsttaxalink
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
     * Set morphospecies.
     *
     * @param string $morphospecies
     *
     * @return Fmchklsttaxalink
     */
    public function setMorphospecies($morphospecies)
    {
        $this->morphospecies = $morphospecies;

        return $this;
    }

    /**
     * Get morphospecies.
     *
     * @return string
     */
    public function getMorphospecies()
    {
        return $this->morphospecies;
    }

    /**
     * Set familyoverride.
     *
     * @param string|null $familyoverride
     *
     * @return Fmchklsttaxalink
     */
    public function setFamilyoverride($familyoverride = null)
    {
        $this->familyoverride = $familyoverride;

        return $this;
    }

    /**
     * Get familyoverride.
     *
     * @return string|null
     */
    public function getFamilyoverride()
    {
        return $this->familyoverride;
    }

    /**
     * Set habitat.
     *
     * @param string|null $habitat
     *
     * @return Fmchklsttaxalink
     */
    public function setHabitat($habitat = null)
    {
        $this->habitat = $habitat;

        return $this;
    }

    /**
     * Get habitat.
     *
     * @return string|null
     */
    public function getHabitat()
    {
        return $this->habitat;
    }

    /**
     * Set abundance.
     *
     * @param string|null $abundance
     *
     * @return Fmchklsttaxalink
     */
    public function setAbundance($abundance = null)
    {
        $this->abundance = $abundance;

        return $this;
    }

    /**
     * Get abundance.
     *
     * @return string|null
     */
    public function getAbundance()
    {
        return $this->abundance;
    }

    /**
     * Set notes.
     *
     * @param string|null $notes
     *
     * @return Fmchklsttaxalink
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
     * Set explicitexclude.
     *
     * @param int|null $explicitexclude
     *
     * @return Fmchklsttaxalink
     */
    public function setExplicitexclude($explicitexclude = null)
    {
        $this->explicitexclude = $explicitexclude;

        return $this;
    }

    /**
     * Get explicitexclude.
     *
     * @return int|null
     */
    public function getExplicitexclude()
    {
        return $this->explicitexclude;
    }

    /**
     * Set source.
     *
     * @param string|null $source
     *
     * @return Fmchklsttaxalink
     */
    public function setSource($source = null)
    {
        $this->source = $source;

        return $this;
    }

    /**
     * Get source.
     *
     * @return string|null
     */
    public function getSource()
    {
        return $this->source;
    }

    /**
     * Set nativity.
     *
     * @param string|null $nativity
     *
     * @return Fmchklsttaxalink
     */
    public function setNativity($nativity = null)
    {
        $this->nativity = $nativity;

        return $this;
    }

    /**
     * Get nativity.
     *
     * @return string|null
     */
    public function getNativity()
    {
        return $this->nativity;
    }

    /**
     * Set endemic.
     *
     * @param string|null $endemic
     *
     * @return Fmchklsttaxalink
     */
    public function setEndemic($endemic = null)
    {
        $this->endemic = $endemic;

        return $this;
    }

    /**
     * Get endemic.
     *
     * @return string|null
     */
    public function getEndemic()
    {
        return $this->endemic;
    }

    /**
     * Set invasive.
     *
     * @param string|null $invasive
     *
     * @return Fmchklsttaxalink
     */
    public function setInvasive($invasive = null)
    {
        $this->invasive = $invasive;

        return $this;
    }

    /**
     * Get invasive.
     *
     * @return string|null
     */
    public function getInvasive()
    {
        return $this->invasive;
    }

    /**
     * Set internalnotes.
     *
     * @param string|null $internalnotes
     *
     * @return Fmchklsttaxalink
     */
    public function setInternalnotes($internalnotes = null)
    {
        $this->internalnotes = $internalnotes;

        return $this;
    }

    /**
     * Get internalnotes.
     *
     * @return string|null
     */
    public function getInternalnotes()
    {
        return $this->internalnotes;
    }

    /**
     * Set dynamicproperties.
     *
     * @param string|null $dynamicproperties
     *
     * @return Fmchklsttaxalink
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
     * @return Fmchklsttaxalink
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
