<?php

namespace App\Entities;

use Doctrine\ORM\Mapping as ORM;

/**
 * Kmdescr
 *
 * @ORM\Table(name="kmdescr", indexes={@ORM\Index(name="CSDescr", columns={"CID", "CS"}), @ORM\Index(name="IDX_6691F324C4FE2EBB", columns={"tid"})})
 * @ORM\Entity
 */
class Kmdescr
{
    /**
     * @var int
     *
     * @ORM\Column(name="CID", type="integer", precision=0, scale=0, nullable=false, options={"unsigned"=true}, unique=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     */
    private $cid;

    /**
     * @var string|null
     *
     * @ORM\Column(name="Modifier", type="string", length=255, precision=0, scale=0, nullable=true, unique=false)
     */
    private $modifier;

    /**
     * @var string
     *
     * @ORM\Column(name="CS", type="string", length=16, precision=0, scale=0, nullable=false, unique=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     */
    private $cs;

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
     * @var int|null
     *
     * @ORM\Column(name="PseudoTrait", type="integer", precision=0, scale=0, nullable=true, options={"unsigned"=true}, unique=false)
     */
    private $pseudotrait;

    /**
     * @var int
     *
     * @ORM\Column(name="Frequency", type="integer", precision=0, scale=0, nullable=false, options={"default"="5","unsigned"=true,"comment"="Frequency of occurrence; 1 = rare... 5 = common"}, unique=false)
     */
    private $frequency = '5';

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
     * @ORM\Column(name="Seq", type="integer", precision=0, scale=0, nullable=true, unique=false)
     */
    private $seq;

    /**
     * @var string|null
     *
     * @ORM\Column(name="Notes", type="text", length=0, precision=0, scale=0, nullable=true, unique=false)
     */
    private $notes;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="DateEntered", type="datetime", precision=0, scale=0, nullable=false, options={"default"="CURRENT_TIMESTAMP"}, unique=false)
     */
    private $dateentered = 'CURRENT_TIMESTAMP';

    /**
     * @var \App\Entities\Taxa
     *
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     * @ORM\OneToOne(targetEntity="App\Entities\Taxa")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="tid", referencedColumnName="tid", nullable=true)
     * })
     */
    private $tid;


    /**
     * Set cid.
     *
     * @param int $cid
     *
     * @return Kmdescr
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
     * Set modifier.
     *
     * @param string|null $modifier
     *
     * @return Kmdescr
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
     * Set cs.
     *
     * @param string $cs
     *
     * @return Kmdescr
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
     * Set x.
     *
     * @param float|null $x
     *
     * @return Kmdescr
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
     * @return Kmdescr
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
     * Set pseudotrait.
     *
     * @param int|null $pseudotrait
     *
     * @return Kmdescr
     */
    public function setPseudotrait($pseudotrait = null)
    {
        $this->pseudotrait = $pseudotrait;

        return $this;
    }

    /**
     * Get pseudotrait.
     *
     * @return int|null
     */
    public function getPseudotrait()
    {
        return $this->pseudotrait;
    }

    /**
     * Set frequency.
     *
     * @param int $frequency
     *
     * @return Kmdescr
     */
    public function setFrequency($frequency)
    {
        $this->frequency = $frequency;

        return $this;
    }

    /**
     * Get frequency.
     *
     * @return int
     */
    public function getFrequency()
    {
        return $this->frequency;
    }

    /**
     * Set inherited.
     *
     * @param string|null $inherited
     *
     * @return Kmdescr
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
     * @return Kmdescr
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
     * @return Kmdescr
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
     * @return Kmdescr
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
     * Set dateentered.
     *
     * @param \DateTime $dateentered
     *
     * @return Kmdescr
     */
    public function setDateentered($dateentered)
    {
        $this->dateentered = $dateentered;

        return $this;
    }

    /**
     * Get dateentered.
     *
     * @return \DateTime
     */
    public function getDateentered()
    {
        return $this->dateentered;
    }

    /**
     * Set tid.
     *
     * @param \App\Entities\Taxa $tid
     *
     * @return Kmdescr
     */
    public function setTid(\App\Entities\Taxa $tid)
    {
        $this->tid = $tid;

        return $this;
    }

    /**
     * Get tid.
     *
     * @return \App\Entities\Taxa
     */
    public function getTid()
    {
        return $this->tid;
    }
}
