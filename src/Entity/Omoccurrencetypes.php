<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Omoccurrencetypes
 *
 * @ORM\Table(name="omoccurrencetypes", indexes={@ORM\Index(name="FK_occurtype_tid_idx", columns={"tidinterpreted"}), @ORM\Index(name="FK_occurtype_refid_idx", columns={"refid"}), @ORM\Index(name="FK_occurtype_occid_idx", columns={"occid"})})
 * @ORM\Entity(repositoryClass="App\Repository\OmoccurrencetypesRepository")
 */
class Omoccurrencetypes
{
    /**
     * @var int
     *
     * @ORM\Column(name="occurtypeid", type="integer", nullable=false, options={"unsigned"=true})
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $occurtypeid;

    /**
     * @var string|null
     *
     * @ORM\Column(name="typestatus", type="string", length=45, nullable=true, options={"default"="NULL"})
     */
    private $typestatus = 'NULL';

    /**
     * @var string|null
     *
     * @ORM\Column(name="typeDesignationType", type="string", length=45, nullable=true, options={"default"="NULL"})
     */
    private $typedesignationtype = 'NULL';

    /**
     * @var string|null
     *
     * @ORM\Column(name="typeDesignatedBy", type="string", length=45, nullable=true, options={"default"="NULL"})
     */
    private $typedesignatedby = 'NULL';

    /**
     * @var string|null
     *
     * @ORM\Column(name="scientificName", type="string", length=250, nullable=true, options={"default"="NULL"})
     */
    private $scientificname = 'NULL';

    /**
     * @var string|null
     *
     * @ORM\Column(name="scientificNameAuthorship", type="string", length=45, nullable=true, options={"default"="NULL"})
     */
    private $scientificnameauthorship = 'NULL';

    /**
     * @var string|null
     *
     * @ORM\Column(name="basionym", type="string", length=250, nullable=true, options={"default"="NULL"})
     */
    private $basionym = 'NULL';

    /**
     * @var string|null
     *
     * @ORM\Column(name="bibliographicCitation", type="string", length=250, nullable=true, options={"default"="NULL"})
     */
    private $bibliographiccitation = 'NULL';

    /**
     * @var string|null
     *
     * @ORM\Column(name="dynamicProperties", type="string", length=250, nullable=true, options={"default"="NULL"})
     */
    private $dynamicproperties = 'NULL';

    /**
     * @var string|null
     *
     * @ORM\Column(name="notes", type="string", length=250, nullable=true, options={"default"="NULL"})
     */
    private $notes = 'NULL';

    /**
     * @var \DateTime|null
     *
     * @ORM\Column(name="initialtimestamp", type="datetime", nullable=true, options={"default"="current_timestamp()"})
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
     * @var \Referenceobject
     *
     * @ORM\ManyToOne(targetEntity="Referenceobject")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="refid", referencedColumnName="refid")
     * })
     */
    private $refid;

    public function getOccurtypeid(): ?int
    {
        return $this->occurtypeid;
    }

    public function getTypestatus(): ?string
    {
        return $this->typestatus;
    }

    public function setTypestatus(?string $typestatus): self
    {
        $this->typestatus = $typestatus;

        return $this;
    }

    public function getTypedesignationtype(): ?string
    {
        return $this->typedesignationtype;
    }

    public function setTypedesignationtype(?string $typedesignationtype): self
    {
        $this->typedesignationtype = $typedesignationtype;

        return $this;
    }

    public function getTypedesignatedby(): ?string
    {
        return $this->typedesignatedby;
    }

    public function setTypedesignatedby(?string $typedesignatedby): self
    {
        $this->typedesignatedby = $typedesignatedby;

        return $this;
    }

    public function getScientificname(): ?string
    {
        return $this->scientificname;
    }

    public function setScientificname(?string $scientificname): self
    {
        $this->scientificname = $scientificname;

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

    public function getBasionym(): ?string
    {
        return $this->basionym;
    }

    public function setBasionym(?string $basionym): self
    {
        $this->basionym = $basionym;

        return $this;
    }

    public function getBibliographiccitation(): ?string
    {
        return $this->bibliographiccitation;
    }

    public function setBibliographiccitation(?string $bibliographiccitation): self
    {
        $this->bibliographiccitation = $bibliographiccitation;

        return $this;
    }

    public function getDynamicproperties(): ?string
    {
        return $this->dynamicproperties;
    }

    public function setDynamicproperties(?string $dynamicproperties): self
    {
        $this->dynamicproperties = $dynamicproperties;

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

    public function getInitialtimestamp(): ?\DateTimeInterface
    {
        return $this->initialtimestamp;
    }

    public function setInitialtimestamp(?\DateTimeInterface $initialtimestamp): self
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

    public function getRefid(): ?Referenceobject
    {
        return $this->refid;
    }

    public function setRefid(?Referenceobject $refid): self
    {
        $this->refid = $refid;

        return $this;
    }


}
