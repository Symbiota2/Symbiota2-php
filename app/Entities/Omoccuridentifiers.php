<?php

namespace App\Entities;

use Doctrine\ORM\Mapping as ORM;

/**
 * Omoccuridentifiers
 *
 * @ORM\Table(name="omoccuridentifiers", indexes={@ORM\Index(name="FK_omoccuridentifiers_occid_idx", columns={"occid"}), @ORM\Index(name="Index_value", columns={"identifiervalue"})})
 * @ORM\Entity
 */
class Omoccuridentifiers
{
    /**
     * @var int
     *
     * @ORM\Column(name="idomoccuridentifiers", type="integer", precision=0, scale=0, nullable=false, unique=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idomoccuridentifiers;

    /**
     * @var string
     *
     * @ORM\Column(name="identifiervalue", type="string", length=45, precision=0, scale=0, nullable=false, unique=false)
     */
    private $identifiervalue;

    /**
     * @var string|null
     *
     * @ORM\Column(name="identifiername", type="string", length=45, precision=0, scale=0, nullable=true, options={"comment"="barcode, accession number, old catalog number, NPS, etc"}, unique=false)
     */
    private $identifiername;

    /**
     * @var string|null
     *
     * @ORM\Column(name="notes", type="string", length=250, precision=0, scale=0, nullable=true, unique=false)
     */
    private $notes;

    /**
     * @var int
     *
     * @ORM\Column(name="modifiedUid", type="integer", precision=0, scale=0, nullable=false, options={"unsigned"=true}, unique=false)
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
     * @var \App\Entities\Omoccurrences
     *
     * @ORM\ManyToOne(targetEntity="App\Entities\Omoccurrences")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="occid", referencedColumnName="occid", nullable=true)
     * })
     */
    private $occid;


    /**
     * Get idomoccuridentifiers.
     *
     * @return int
     */
    public function getIdomoccuridentifiers()
    {
        return $this->idomoccuridentifiers;
    }

    /**
     * Set identifiervalue.
     *
     * @param string $identifiervalue
     *
     * @return Omoccuridentifiers
     */
    public function setIdentifiervalue($identifiervalue)
    {
        $this->identifiervalue = $identifiervalue;

        return $this;
    }

    /**
     * Get identifiervalue.
     *
     * @return string
     */
    public function getIdentifiervalue()
    {
        return $this->identifiervalue;
    }

    /**
     * Set identifiername.
     *
     * @param string|null $identifiername
     *
     * @return Omoccuridentifiers
     */
    public function setIdentifiername($identifiername = null)
    {
        $this->identifiername = $identifiername;

        return $this;
    }

    /**
     * Get identifiername.
     *
     * @return string|null
     */
    public function getIdentifiername()
    {
        return $this->identifiername;
    }

    /**
     * Set notes.
     *
     * @param string|null $notes
     *
     * @return Omoccuridentifiers
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
     * @param int $modifieduid
     *
     * @return Omoccuridentifiers
     */
    public function setModifieduid($modifieduid)
    {
        $this->modifieduid = $modifieduid;

        return $this;
    }

    /**
     * Get modifieduid.
     *
     * @return int
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
     * @return Omoccuridentifiers
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
     * @return Omoccuridentifiers
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
     * @return Omoccuridentifiers
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
}
