<?php

namespace App\Entities;

use Doctrine\ORM\Mapping as ORM;

/**
 * Fmvouchers
 *
 * @ORM\Table(name="fmvouchers", indexes={@ORM\Index(name="chklst_taxavouchers", columns={"tid", "CLID"}), @ORM\Index(name="IDX_6468A29340A24FBA", columns={"occid"})})
 * @ORM\Entity
 */
class Fmvouchers
{
    /**
     * @var int|null
     *
     * @ORM\Column(name="tid", type="integer", precision=0, scale=0, nullable=true, options={"unsigned"=true}, unique=false)
     */
    private $tid;

    /**
     * @var int
     *
     * @ORM\Column(name="CLID", type="integer", precision=0, scale=0, nullable=false, options={"unsigned"=true}, unique=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     */
    private $clid;

    /**
     * @var string|null
     *
     * @ORM\Column(name="editornotes", type="string", length=50, precision=0, scale=0, nullable=true, unique=false)
     */
    private $editornotes;

    /**
     * @var int|null
     *
     * @ORM\Column(name="preferredImage", type="integer", precision=0, scale=0, nullable=true, unique=false)
     */
    private $preferredimage;

    /**
     * @var string|null
     *
     * @ORM\Column(name="Notes", type="string", length=250, precision=0, scale=0, nullable=true, unique=false)
     */
    private $notes;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="InitialTimeStamp", type="datetime", precision=0, scale=0, nullable=false, options={"default"="CURRENT_TIMESTAMP"}, unique=false)
     */
    private $initialtimestamp = 'CURRENT_TIMESTAMP';

    /**
     * @var \App\Entities\Omoccurrences
     *
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     * @ORM\OneToOne(targetEntity="App\Entities\Omoccurrences")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="occid", referencedColumnName="occid", nullable=true)
     * })
     */
    private $occid;


    /**
     * Set tid.
     *
     * @param int|null $tid
     *
     * @return Fmvouchers
     */
    public function setTid($tid = null)
    {
        $this->tid = $tid;

        return $this;
    }

    /**
     * Get tid.
     *
     * @return int|null
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
     * @return Fmvouchers
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
     * Set editornotes.
     *
     * @param string|null $editornotes
     *
     * @return Fmvouchers
     */
    public function setEditornotes($editornotes = null)
    {
        $this->editornotes = $editornotes;

        return $this;
    }

    /**
     * Get editornotes.
     *
     * @return string|null
     */
    public function getEditornotes()
    {
        return $this->editornotes;
    }

    /**
     * Set preferredimage.
     *
     * @param int|null $preferredimage
     *
     * @return Fmvouchers
     */
    public function setPreferredimage($preferredimage = null)
    {
        $this->preferredimage = $preferredimage;

        return $this;
    }

    /**
     * Get preferredimage.
     *
     * @return int|null
     */
    public function getPreferredimage()
    {
        return $this->preferredimage;
    }

    /**
     * Set notes.
     *
     * @param string|null $notes
     *
     * @return Fmvouchers
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
     * @param \DateTime $initialtimestamp
     *
     * @return Fmvouchers
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
     * @param \App\Entities\Omoccurrences $occid
     *
     * @return Fmvouchers
     */
    public function setOccid(\App\Entities\Omoccurrences $occid)
    {
        $this->occid = $occid;

        return $this;
    }

    /**
     * Get occid.
     *
     * @return \App\Entities\Omoccurrences
     */
    public function getOccid()
    {
        return $this->occid;
    }
}
