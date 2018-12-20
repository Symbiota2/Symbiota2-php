<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Uploaddetermtemp
 *
 * @ORM\Table(name="uploaddetermtemp", indexes={@ORM\Index(name="Index_uploaddet_dbpk", columns={"dbpk"}), @ORM\Index(name="Index_uploaddet_collid", columns={"collid"}), @ORM\Index(name="Index_uploaddet_occid", columns={"occid"})})
 * @ORM\Entity(repositoryClass="App\Repository\UploaddetermtempRepository")
 */
class Uploaddetermtemp
{
    /**
     * @var int
     *
     * @ORM\Column(name="updetid", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $updetid;

    /**
     * @var int|null
     *
     * @ORM\Column(name="occid", type="integer", nullable=true, options={"default"="NULL","unsigned"=true})
     */
    private $occid = 'NULL';

    /**
     * @var int|null
     *
     * @ORM\Column(name="collid", type="integer", nullable=true, options={"default"="NULL","unsigned"=true})
     */
    private $collid = 'NULL';

    /**
     * @var string|null
     *
     * @ORM\Column(name="dbpk", type="string", length=150, nullable=true, options={"default"="NULL"})
     */
    private $dbpk = 'NULL';

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
     * @ORM\Column(name="identificationRemarks", type="string", length=255, nullable=true, options={"default"="NULL"})
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

    public function getUpdetid(): ?int
    {
        return $this->updetid;
    }

    public function getOccid(): ?int
    {
        return $this->occid;
    }

    public function setOccid(?int $occid): self
    {
        $this->occid = $occid;

        return $this;
    }

    public function getCollid(): ?int
    {
        return $this->collid;
    }

    public function setCollid(?int $collid): self
    {
        $this->collid = $collid;

        return $this;
    }

    public function getDbpk(): ?string
    {
        return $this->dbpk;
    }

    public function setDbpk(?string $dbpk): self
    {
        $this->dbpk = $dbpk;

        return $this;
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


}
