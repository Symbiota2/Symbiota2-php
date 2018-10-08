<?php

namespace App\Entities;

use Doctrine\ORM\Mapping as ORM;

/**
 * Omoccurrencetypes
 *
 * @ORM\Table(name="omoccurrencetypes", indexes={@ORM\Index(name="FK_occurtype_occid_idx", columns={"occid"}), @ORM\Index(name="FK_occurtype_refid_idx", columns={"refid"}), @ORM\Index(name="FK_occurtype_tid_idx", columns={"tidinterpreted"})})
 * @ORM\Entity
 */
class Omoccurrencetypes
{
    /**
     * @var int
     *
     * @ORM\Column(name="occurtypeid", type="integer", precision=0, scale=0, nullable=false, options={"unsigned"=true}, unique=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $occurtypeid;

    /**
     * @var string|null
     *
     * @ORM\Column(name="typestatus", type="string", length=45, precision=0, scale=0, nullable=true, unique=false)
     */
    private $typestatus;

    /**
     * @var string|null
     *
     * @ORM\Column(name="typeDesignationType", type="string", length=45, precision=0, scale=0, nullable=true, unique=false)
     */
    private $typedesignationtype;

    /**
     * @var string|null
     *
     * @ORM\Column(name="typeDesignatedBy", type="string", length=45, precision=0, scale=0, nullable=true, unique=false)
     */
    private $typedesignatedby;

    /**
     * @var string|null
     *
     * @ORM\Column(name="scientificName", type="string", length=250, precision=0, scale=0, nullable=true, unique=false)
     */
    private $scientificname;

    /**
     * @var string|null
     *
     * @ORM\Column(name="scientificNameAuthorship", type="string", length=45, precision=0, scale=0, nullable=true, unique=false)
     */
    private $scientificnameauthorship;

    /**
     * @var string|null
     *
     * @ORM\Column(name="basionym", type="string", length=250, precision=0, scale=0, nullable=true, unique=false)
     */
    private $basionym;

    /**
     * @var string|null
     *
     * @ORM\Column(name="bibliographicCitation", type="string", length=250, precision=0, scale=0, nullable=true, unique=false)
     */
    private $bibliographiccitation;

    /**
     * @var string|null
     *
     * @ORM\Column(name="dynamicProperties", type="string", length=250, precision=0, scale=0, nullable=true, unique=false)
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
     * @ORM\Column(name="initialtimestamp", type="datetime", precision=0, scale=0, nullable=true, options={"default"="CURRENT_TIMESTAMP"}, unique=false)
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
     * @var \App\Entities\Referenceobject
     *
     * @ORM\ManyToOne(targetEntity="App\Entities\Referenceobject")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="refid", referencedColumnName="refid", nullable=true)
     * })
     */
    private $refid;

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
     * Get occurtypeid.
     *
     * @return int
     */
    public function getOccurtypeid()
    {
        return $this->occurtypeid;
    }

    /**
     * Set typestatus.
     *
     * @param string|null $typestatus
     *
     * @return Omoccurrencetypes
     */
    public function setTypestatus($typestatus = null)
    {
        $this->typestatus = $typestatus;

        return $this;
    }

    /**
     * Get typestatus.
     *
     * @return string|null
     */
    public function getTypestatus()
    {
        return $this->typestatus;
    }

    /**
     * Set typedesignationtype.
     *
     * @param string|null $typedesignationtype
     *
     * @return Omoccurrencetypes
     */
    public function setTypedesignationtype($typedesignationtype = null)
    {
        $this->typedesignationtype = $typedesignationtype;

        return $this;
    }

    /**
     * Get typedesignationtype.
     *
     * @return string|null
     */
    public function getTypedesignationtype()
    {
        return $this->typedesignationtype;
    }

    /**
     * Set typedesignatedby.
     *
     * @param string|null $typedesignatedby
     *
     * @return Omoccurrencetypes
     */
    public function setTypedesignatedby($typedesignatedby = null)
    {
        $this->typedesignatedby = $typedesignatedby;

        return $this;
    }

    /**
     * Get typedesignatedby.
     *
     * @return string|null
     */
    public function getTypedesignatedby()
    {
        return $this->typedesignatedby;
    }

    /**
     * Set scientificname.
     *
     * @param string|null $scientificname
     *
     * @return Omoccurrencetypes
     */
    public function setScientificname($scientificname = null)
    {
        $this->scientificname = $scientificname;

        return $this;
    }

    /**
     * Get scientificname.
     *
     * @return string|null
     */
    public function getScientificname()
    {
        return $this->scientificname;
    }

    /**
     * Set scientificnameauthorship.
     *
     * @param string|null $scientificnameauthorship
     *
     * @return Omoccurrencetypes
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
     * Set basionym.
     *
     * @param string|null $basionym
     *
     * @return Omoccurrencetypes
     */
    public function setBasionym($basionym = null)
    {
        $this->basionym = $basionym;

        return $this;
    }

    /**
     * Get basionym.
     *
     * @return string|null
     */
    public function getBasionym()
    {
        return $this->basionym;
    }

    /**
     * Set bibliographiccitation.
     *
     * @param string|null $bibliographiccitation
     *
     * @return Omoccurrencetypes
     */
    public function setBibliographiccitation($bibliographiccitation = null)
    {
        $this->bibliographiccitation = $bibliographiccitation;

        return $this;
    }

    /**
     * Get bibliographiccitation.
     *
     * @return string|null
     */
    public function getBibliographiccitation()
    {
        return $this->bibliographiccitation;
    }

    /**
     * Set dynamicproperties.
     *
     * @param string|null $dynamicproperties
     *
     * @return Omoccurrencetypes
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
     * @return Omoccurrencetypes
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
     * Set initialtimestamp.
     *
     * @param \DateTime|null $initialtimestamp
     *
     * @return Omoccurrencetypes
     */
    public function setInitialtimestamp($initialtimestamp = null)
    {
        $this->initialtimestamp = $initialtimestamp;

        return $this;
    }

    /**
     * Get initialtimestamp.
     *
     * @return \DateTime|null
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
     * @return Omoccurrencetypes
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
     * Set refid.
     *
     * @param \App\Entities\Referenceobject|null $refid
     *
     * @return Omoccurrencetypes
     */
    public function setRefid(\App\Entities\Referenceobject $refid = null)
    {
        $this->refid = $refid;

        return $this;
    }

    /**
     * Get refid.
     *
     * @return \App\Entities\Referenceobject|null
     */
    public function getRefid()
    {
        return $this->refid;
    }

    /**
     * Set tidinterpreted.
     *
     * @param \App\Entities\Taxa|null $tidinterpreted
     *
     * @return Omoccurrencetypes
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
