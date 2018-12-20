<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Omoccurdeterminations
 *
 * @ORM\Table(name="omoccurdeterminations", uniqueConstraints={@ORM\UniqueConstraint(name="Index_unique", columns={"occid", "dateIdentified", "identifiedBy", "sciname"})}, indexes={@ORM\Index(name="FK_omoccurdets_idby_idx", columns={"idbyid"}), @ORM\Index(name="FK_omoccurdets_tid", columns={"tidinterpreted"}), @ORM\Index(name="Index_dateIdentInterpreted", columns={"dateIdentifiedInterpreted"}), @ORM\Index(name="IDX_CA5B5A7F40A24FBA", columns={"occid"})})
 * @ORM\Entity(repositoryClass="App\Repository\OmoccurdeterminationsRepository")
 */
class Omoccurdeterminations
{
    /**
     * @var int
     *
     * @ORM\Column(name="detid", type="integer", nullable=false, options={"unsigned"=true})
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $detid;

    /**
     * @var string
     *
     * @ORM\Column(name="identifiedBy", type="string", length=60, nullable=false)
     */
    private $identifiedby;

    /**
     * @var string
     *
     * @ORM\Column(name="dateIdentified", type="string", length=45, nullable=false)
     */
    private $dateidentified;

    /**
     * @var \DateTime|null
     *
     * @ORM\Column(name="dateIdentifiedInterpreted", type="date", nullable=true, options={"default"="NULL"})
     */
    private $dateidentifiedinterpreted = 'NULL';

    /**
     * @var string
     *
     * @ORM\Column(name="sciname", type="string", length=100, nullable=false)
     */
    private $sciname;

    /**
     * @var string|null
     *
     * @ORM\Column(name="scientificNameAuthorship", type="string", length=100, nullable=true, options={"default"="NULL"})
     */
    private $scientificnameauthorship = 'NULL';

    /**
     * @var string|null
     *
     * @ORM\Column(name="identificationQualifier", type="string", length=45, nullable=true, options={"default"="NULL"})
     */
    private $identificationqualifier = 'NULL';

    /**
     * @var int|null
     *
     * @ORM\Column(name="iscurrent", type="integer", nullable=true, options={"default"="NULL"})
     */
    private $iscurrent = 'NULL';

    /**
     * @var int|null
     *
     * @ORM\Column(name="printqueue", type="integer", nullable=true, options={"default"="NULL"})
     */
    private $printqueue = 'NULL';

    /**
     * @var int|null
     *
     * @ORM\Column(name="appliedStatus", type="integer", nullable=true, options={"default"="1"})
     */
    private $appliedstatus = '1';

    /**
     * @var string|null
     *
     * @ORM\Column(name="detType", type="string", length=45, nullable=true, options={"default"="NULL"})
     */
    private $dettype = 'NULL';

    /**
     * @var string|null
     *
     * @ORM\Column(name="identificationReferences", type="string", length=255, nullable=true, options={"default"="NULL"})
     */
    private $identificationreferences = 'NULL';

    /**
     * @var string|null
     *
     * @ORM\Column(name="identificationRemarks", type="string", length=500, nullable=true, options={"default"="NULL"})
     */
    private $identificationremarks = 'NULL';

    /**
     * @var string|null
     *
     * @ORM\Column(name="sourceIdentifier", type="string", length=45, nullable=true, options={"default"="NULL"})
     */
    private $sourceidentifier = 'NULL';

    /**
     * @var int|null
     *
     * @ORM\Column(name="sortsequence", type="integer", nullable=true, options={"default"="10","unsigned"=true})
     */
    private $sortsequence = '10';

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="initialtimestamp", type="datetime", nullable=false, options={"default"="current_timestamp()"})
     */
    private $initialtimestamp = 'current_timestamp()';

    /**
     * @var \Omoccurrences
     *
     * @ORM\ManyToOne(targetEntity="Omoccurrences")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="occid", referencedColumnName="occid")
     * })
     */
    private $occid;

    /**
     * @var \Taxa
     *
     * @ORM\ManyToOne(targetEntity="Taxa")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="tidinterpreted", referencedColumnName="TID")
     * })
     */
    private $tidinterpreted;

    /**
     * @var \Omcollectors
     *
     * @ORM\ManyToOne(targetEntity="Omcollectors")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="idbyid", referencedColumnName="recordedById")
     * })
     */
    private $idbyid;

    public function getDetid(): ?int
    {
        return $this->detid;
    }

    public function getIdentifiedby(): ?string
    {
        return $this->identifiedby;
    }

    public function setIdentifiedby(string $identifiedby): self
    {
        $this->identifiedby = $identifiedby;

        return $this;
    }

    public function getDateidentified(): ?string
    {
        return $this->dateidentified;
    }

    public function setDateidentified(string $dateidentified): self
    {
        $this->dateidentified = $dateidentified;

        return $this;
    }

    public function getDateidentifiedinterpreted(): ?\DateTimeInterface
    {
        return $this->dateidentifiedinterpreted;
    }

    public function setDateidentifiedinterpreted(?\DateTimeInterface $dateidentifiedinterpreted): self
    {
        $this->dateidentifiedinterpreted = $dateidentifiedinterpreted;

        return $this;
    }

    public function getSciname(): ?string
    {
        return $this->sciname;
    }

    public function setSciname(string $sciname): self
    {
        $this->sciname = $sciname;

        return $this;
    }

    public function getScientificnameauthorship(): ?string
    {
        return $this->scientificnameauthorship;
    }

    public function setScientificnameauthorship(?string $scientificnameauthorship): self
    {
        $this->scientificnameauthorship = $scientificnameauthorship;

        return $this;
    }

    public function getIdentificationqualifier(): ?string
    {
        return $this->identificationqualifier;
    }

    public function setIdentificationqualifier(?string $identificationqualifier): self
    {
        $this->identificationqualifier = $identificationqualifier;

        return $this;
    }

    public function getIscurrent(): ?int
    {
        return $this->iscurrent;
    }

    public function setIscurrent(?int $iscurrent): self
    {
        $this->iscurrent = $iscurrent;

        return $this;
    }

    public function getPrintqueue(): ?int
    {
        return $this->printqueue;
    }

    public function setPrintqueue(?int $printqueue): self
    {
        $this->printqueue = $printqueue;

        return $this;
    }

    public function getAppliedstatus(): ?int
    {
        return $this->appliedstatus;
    }

    public function setAppliedstatus(?int $appliedstatus): self
    {
        $this->appliedstatus = $appliedstatus;

        return $this;
    }

    public function getDettype(): ?string
    {
        return $this->dettype;
    }

    public function setDettype(?string $dettype): self
    {
        $this->dettype = $dettype;

        return $this;
    }

    public function getIdentificationreferences(): ?string
    {
        return $this->identificationreferences;
    }

    public function setIdentificationreferences(?string $identificationreferences): self
    {
        $this->identificationreferences = $identificationreferences;

        return $this;
    }

    public function getIdentificationremarks(): ?string
    {
        return $this->identificationremarks;
    }

    public function setIdentificationremarks(?string $identificationremarks): self
    {
        $this->identificationremarks = $identificationremarks;

        return $this;
    }

    public function getSourceidentifier(): ?string
    {
        return $this->sourceidentifier;
    }

    public function setSourceidentifier(?string $sourceidentifier): self
    {
        $this->sourceidentifier = $sourceidentifier;

        return $this;
    }

    public function getSortsequence(): ?int
    {
        return $this->sortsequence;
    }

    public function setSortsequence(?int $sortsequence): self
    {
        $this->sortsequence = $sortsequence;

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

    public function getOccid(): ?Omoccurrences
    {
        return $this->occid;
    }

    public function setOccid(?Omoccurrences $occid): self
    {
        $this->occid = $occid;

        return $this;
    }

    public function getTidinterpreted(): ?Taxa
    {
        return $this->tidinterpreted;
    }

    public function setTidinterpreted(?Taxa $tidinterpreted): self
    {
        $this->tidinterpreted = $tidinterpreted;

        return $this;
    }

    public function getIdbyid(): ?Omcollectors
    {
        return $this->idbyid;
    }

    public function setIdbyid(?Omcollectors $idbyid): self
    {
        $this->idbyid = $idbyid;

        return $this;
    }


}
