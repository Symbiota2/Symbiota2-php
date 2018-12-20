<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Fmchklsttaxastatus
 *
 * @ORM\Table(name="fmchklsttaxastatus", indexes={@ORM\Index(name="FK_fmchklsttaxastatus_clid_idx", columns={"clid", "tid"})})
 * @ORM\Entity(repositoryClass="App\Repository\FmchklsttaxastatusRepository")
 */
class Fmchklsttaxastatus
{
    /**
     * @var int
     *
     * @ORM\Column(name="clid", type="integer", nullable=false, options={"unsigned"=true})
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     */
    private $clid;

    /**
     * @var int
     *
     * @ORM\Column(name="tid", type="integer", nullable=false, options={"unsigned"=true})
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     */
    private $tid;

    /**
     * @var int
     *
     * @ORM\Column(name="geographicRange", type="integer", nullable=false)
     */
    private $geographicrange;

    /**
     * @var int
     *
     * @ORM\Column(name="populationRank", type="integer", nullable=false)
     */
    private $populationrank;

    /**
     * @var int
     *
     * @ORM\Column(name="abundance", type="integer", nullable=false)
     */
    private $abundance;

    /**
     * @var int
     *
     * @ORM\Column(name="habitatSpecificity", type="integer", nullable=false)
     */
    private $habitatspecificity;

    /**
     * @var int
     *
     * @ORM\Column(name="intrinsicRarity", type="integer", nullable=false)
     */
    private $intrinsicrarity;

    /**
     * @var int
     *
     * @ORM\Column(name="threatImminence", type="integer", nullable=false)
     */
    private $threatimminence;

    /**
     * @var int
     *
     * @ORM\Column(name="populationTrends", type="integer", nullable=false)
     */
    private $populationtrends;

    /**
     * @var string|null
     *
     * @ORM\Column(name="nativeStatus", type="string", length=45, nullable=true, options={"default"="NULL"})
     */
    private $nativestatus = 'NULL';

    /**
     * @var int
     *
     * @ORM\Column(name="endemicStatus", type="integer", nullable=false)
     */
    private $endemicstatus;

    /**
     * @var string|null
     *
     * @ORM\Column(name="protectedStatus", type="string", length=45, nullable=true, options={"default"="NULL"})
     */
    private $protectedstatus = 'NULL';

    /**
     * @var int|null
     *
     * @ORM\Column(name="localitySecurity", type="integer", nullable=true, options={"default"="NULL"})
     */
    private $localitysecurity = 'NULL';

    /**
     * @var string|null
     *
     * @ORM\Column(name="localitySecurityReason", type="string", length=45, nullable=true, options={"default"="NULL"})
     */
    private $localitysecurityreason = 'NULL';

    /**
     * @var string|null
     *
     * @ORM\Column(name="invasiveStatus", type="string", length=45, nullable=true, options={"default"="NULL"})
     */
    private $invasivestatus = 'NULL';

    /**
     * @var string|null
     *
     * @ORM\Column(name="notes", type="string", length=250, nullable=true, options={"default"="NULL"})
     */
    private $notes = 'NULL';

    /**
     * @var int|null
     *
     * @ORM\Column(name="modifiedUid", type="integer", nullable=true, options={"default"="NULL","unsigned"=true})
     */
    private $modifieduid = 'NULL';

    /**
     * @var \DateTime|null
     *
     * @ORM\Column(name="modifiedtimestamp", type="datetime", nullable=true, options={"default"="NULL"})
     */
    private $modifiedtimestamp = 'NULL';

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="initialtimestamp", type="datetime", nullable=false, options={"default"="current_timestamp()"})
     */
    private $initialtimestamp = 'current_timestamp()';

    public function getClid(): ?int
    {
        return $this->clid;
    }

    public function getTid(): ?int
    {
        return $this->tid;
    }

    public function getGeographicrange(): ?int
    {
        return $this->geographicrange;
    }

    public function setGeographicrange(int $geographicrange): self
    {
        $this->geographicrange = $geographicrange;

        return $this;
    }

    public function getPopulationrank(): ?int
    {
        return $this->populationrank;
    }

    public function setPopulationrank(int $populationrank): self
    {
        $this->populationrank = $populationrank;

        return $this;
    }

    public function getAbundance(): ?int
    {
        return $this->abundance;
    }

    public function setAbundance(int $abundance): self
    {
        $this->abundance = $abundance;

        return $this;
    }

    public function getHabitatspecificity(): ?int
    {
        return $this->habitatspecificity;
    }

    public function setHabitatspecificity(int $habitatspecificity): self
    {
        $this->habitatspecificity = $habitatspecificity;

        return $this;
    }

    public function getIntrinsicrarity(): ?int
    {
        return $this->intrinsicrarity;
    }

    public function setIntrinsicrarity(int $intrinsicrarity): self
    {
        $this->intrinsicrarity = $intrinsicrarity;

        return $this;
    }

    public function getThreatimminence(): ?int
    {
        return $this->threatimminence;
    }

    public function setThreatimminence(int $threatimminence): self
    {
        $this->threatimminence = $threatimminence;

        return $this;
    }

    public function getPopulationtrends(): ?int
    {
        return $this->populationtrends;
    }

    public function setPopulationtrends(int $populationtrends): self
    {
        $this->populationtrends = $populationtrends;

        return $this;
    }

    public function getNativestatus(): ?string
    {
        return $this->nativestatus;
    }

    public function setNativestatus(?string $nativestatus): self
    {
        $this->nativestatus = $nativestatus;

        return $this;
    }

    public function getEndemicstatus(): ?int
    {
        return $this->endemicstatus;
    }

    public function setEndemicstatus(int $endemicstatus): self
    {
        $this->endemicstatus = $endemicstatus;

        return $this;
    }

    public function getProtectedstatus(): ?string
    {
        return $this->protectedstatus;
    }

    public function setProtectedstatus(?string $protectedstatus): self
    {
        $this->protectedstatus = $protectedstatus;

        return $this;
    }

    public function getLocalitysecurity(): ?int
    {
        return $this->localitysecurity;
    }

    public function setLocalitysecurity(?int $localitysecurity): self
    {
        $this->localitysecurity = $localitysecurity;

        return $this;
    }

    public function getLocalitysecurityreason(): ?string
    {
        return $this->localitysecurityreason;
    }

    public function setLocalitysecurityreason(?string $localitysecurityreason): self
    {
        $this->localitysecurityreason = $localitysecurityreason;

        return $this;
    }

    public function getInvasivestatus(): ?string
    {
        return $this->invasivestatus;
    }

    public function setInvasivestatus(?string $invasivestatus): self
    {
        $this->invasivestatus = $invasivestatus;

        return $this;
    }

    public function getNotes(): ?string
    {
        return $this->notes;
    }

    public function setNotes(?string $notes): self
    {
        $this->notes = $notes;

        return $this;
    }

    public function getModifieduid(): ?int
    {
        return $this->modifieduid;
    }

    public function setModifieduid(?int $modifieduid): self
    {
        $this->modifieduid = $modifieduid;

        return $this;
    }

    public function getModifiedtimestamp(): ?\DateTimeInterface
    {
        return $this->modifiedtimestamp;
    }

    public function setModifiedtimestamp(?\DateTimeInterface $modifiedtimestamp): self
    {
        $this->modifiedtimestamp = $modifiedtimestamp;

        return $this;
    }

    public function getInitialtimestamp(): ?\DateTimeInterface
    {
        return $this->initialtimestamp;
    }

    public function setInitialtimestamp(\DateTimeInterface $initialtimestamp): self
    {
        $this->initialtimestamp = $initialtimestamp;

        return $this;
    }


}
