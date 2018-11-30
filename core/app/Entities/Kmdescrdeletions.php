<?php

namespace App\Entities;

use Doctrine\ORM\Mapping as ORM;

/**
 * Kmdescrdeletions
 *
 * @ORM\Table(name="kmdescrdeletions")
 * @ORM\Entity
 */
class Kmdescrdeletions
{
    /**
     * @var int
     *
     * @ORM\Column(name="tid", type="integer", precision=0, scale=0, nullable=false, options={"unsigned"=true}, unique=false)
     */
    private $tid;

    /**
     * @var int
     *
     * @ORM\Column(name="CID", type="integer", precision=0, scale=0, nullable=false, options={"unsigned"=true}, unique=false)
     */
    private $cid;

    /**
     * @var string
     *
     * @ORM\Column(name="CS", type="string", length=16, precision=0, scale=0, nullable=false, unique=false)
     */
    private $cs;

    /**
     * @var string|null
     *
     * @ORM\Column(name="Modifier", type="string", length=255, precision=0, scale=0, nullable=true, unique=false)
     */
    private $modifier;

    /**
     * @var float|null
     *
     * @ORM\Column(name="X", type="float", precision=15, scale=5, nullable=true, unique=false)
     */
    private $x;

    /**
     * @var string|null
     *
     * @ORM\Column(name="TXT", type="text", length=0, precision=0, scale=0, nullable=true, unique=false)
     */
    private $txt;

    /**
     * @var string|null
     *
     * @ORM\Column(name="Inherited", type="string", length=50, precision=0, scale=0, nullable=true, unique=false)
     */
    private $inherited;

    /**
     * @var string|null
     *
     * @ORM\Column(name="Source", type="string", length=100, precision=0, scale=0, nullable=true, unique=false)
     */
    private $source;

    /**
     * @var int|null
     *
     * @ORM\Column(name="Seq", type="integer", precision=0, scale=0, nullable=true, options={"unsigned"=true}, unique=false)
     */
    private $seq;

    /**
     * @var string|null
     *
     * @ORM\Column(name="Notes", type="text", length=0, precision=0, scale=0, nullable=true, unique=false)
     */
    private $notes;

    /**
     * @var \DateTime|null
     *
     * @ORM\Column(name="InitialTimeStamp", type="datetime", precision=0, scale=0, nullable=true, unique=false)
     */
    private $initialtimestamp;

    /**
     * @var string
     *
     * @ORM\Column(name="DeletedBy", type="string", length=100, precision=0, scale=0, nullable=false, unique=false)
     */
    private $deletedby;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="DeletedTimeStamp", type="datetime", precision=0, scale=0, nullable=false, options={"default"="CURRENT_TIMESTAMP"}, unique=false)
     */
    private $deletedtimestamp = 'CURRENT_TIMESTAMP';

    /**
     * @var int
     *
     * @ORM\Column(name="PK", type="integer", precision=0, scale=0, nullable=false, options={"unsigned"=true}, unique=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $pk;


    /**
     * Set tid.
     *
     * @param int $tid
     *
     * @return Kmdescrdeletions
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
     * Set cid.
     *
     * @param int $cid
     *
     * @return Kmdescrdeletions
     */
    public function setCid($cid)
    {
        $this->cid = $cid;

        return $this;
    }

    /**
     * Get cid.
     *
     * @return int
     */
    public function getCid()
    {
        return $this->cid;
    }

    /**
     * Set cs.
     *
     * @param string $cs
     *
     * @return Kmdescrdeletions
     */
    public function setCs($cs)
    {
        $this->cs = $cs;

        return $this;
    }

    /**
     * Get cs.
     *
     * @return string
     */
    public function getCs()
    {
        return $this->cs;
    }

    /**
     * Set modifier.
     *
     * @param string|null $modifier
     *
     * @return Kmdescrdeletions
     */
    public function setModifier($modifier = null)
    {
        $this->modifier = $modifier;

        return $this;
    }

    /**
     * Get modifier.
     *
     * @return string|null
     */
    public function getModifier()
    {
        return $this->modifier;
    }

    /**
     * Set x.
     *
     * @param float|null $x
     *
     * @return Kmdescrdeletions
     */
    public function setX($x = null)
    {
        $this->x = $x;

        return $this;
    }

    /**
     * Get x.
     *
     * @return float|null
     */
    public function getX()
    {
        return $this->x;
    }

    /**
     * Set txt.
     *
     * @param string|null $txt
     *
     * @return Kmdescrdeletions
     */
    public function setTxt($txt = null)
    {
        $this->txt = $txt;

        return $this;
    }

    /**
     * Get txt.
     *
     * @return string|null
     */
    public function getTxt()
    {
        return $this->txt;
    }

    /**
     * Set inherited.
     *
     * @param string|null $inherited
     *
     * @return Kmdescrdeletions
     */
    public function setInherited($inherited = null)
    {
        $this->inherited = $inherited;

        return $this;
    }

    /**
     * Get inherited.
     *
     * @return string|null
     */
    public function getInherited()
    {
        return $this->inherited;
    }

    /**
     * Set source.
     *
     * @param string|null $source
     *
     * @return Kmdescrdeletions
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
     * Set seq.
     *
     * @param int|null $seq
     *
     * @return Kmdescrdeletions
     */
    public function setSeq($seq = null)
    {
        $this->seq = $seq;

        return $this;
    }

    /**
     * Get seq.
     *
     * @return int|null
     */
    public function getSeq()
    {
        return $this->seq;
    }

    /**
     * Set notes.
     *
     * @param string|null $notes
     *
     * @return Kmdescrdeletions
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
     * @return Kmdescrdeletions
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
     * Set deletedby.
     *
     * @param string $deletedby
     *
     * @return Kmdescrdeletions
     */
    public function setDeletedby($deletedby)
    {
        $this->deletedby = $deletedby;

        return $this;
    }

    /**
     * Get deletedby.
     *
     * @return string
     */
    public function getDeletedby()
    {
        return $this->deletedby;
    }

    /**
     * Set deletedtimestamp.
     *
     * @param \DateTime $deletedtimestamp
     *
     * @return Kmdescrdeletions
     */
    public function setDeletedtimestamp($deletedtimestamp)
    {
        $this->deletedtimestamp = $deletedtimestamp;

        return $this;
    }

    /**
     * Get deletedtimestamp.
     *
     * @return \DateTime
     */
    public function getDeletedtimestamp()
    {
        return $this->deletedtimestamp;
    }

    /**
     * Get pk.
     *
     * @return int
     */
    public function getPk()
    {
        return $this->pk;
    }
}
