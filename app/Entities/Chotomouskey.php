<?php

namespace App\Entities;

use Doctrine\ORM\Mapping as ORM;

/**
 * Chotomouskey
 *
 * @ORM\Table(name="chotomouskey", indexes={@ORM\Index(name="FK_chotomouskey_taxa", columns={"tid"})})
 * @ORM\Entity
 */
class Chotomouskey
{
    /**
     * @var int
     *
     * @ORM\Column(name="stmtid", type="integer", precision=0, scale=0, nullable=false, options={"unsigned"=true}, unique=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $stmtid;

    /**
     * @var string
     *
     * @ORM\Column(name="statement", type="string", length=300, precision=0, scale=0, nullable=false, unique=false)
     */
    private $statement;

    /**
     * @var int
     *
     * @ORM\Column(name="nodeid", type="integer", precision=0, scale=0, nullable=false, options={"unsigned"=true}, unique=false)
     */
    private $nodeid;

    /**
     * @var int
     *
     * @ORM\Column(name="parentid", type="integer", precision=0, scale=0, nullable=false, options={"unsigned"=true}, unique=false)
     */
    private $parentid;

    /**
     * @var string|null
     *
     * @ORM\Column(name="notes", type="string", length=250, precision=0, scale=0, nullable=true, unique=false)
     */
    private $notes;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="initialtimestamp", type="datetime", precision=0, scale=0, nullable=false, options={"default"="CURRENT_TIMESTAMP"}, unique=false)
     */
    private $initialtimestamp = 'CURRENT_TIMESTAMP';

    /**
     * @var \App\Entities\Taxa
     *
     * @ORM\ManyToOne(targetEntity="App\Entities\Taxa")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="tid", referencedColumnName="tid", nullable=true)
     * })
     */
    private $tid;


    /**
     * Get stmtid.
     *
     * @return int
     */
    public function getStmtid()
    {
        return $this->stmtid;
    }

    /**
     * Set statement.
     *
     * @param string $statement
     *
     * @return Chotomouskey
     */
    public function setStatement($statement)
    {
        $this->statement = $statement;

        return $this;
    }

    /**
     * Get statement.
     *
     * @return string
     */
    public function getStatement()
    {
        return $this->statement;
    }

    /**
     * Set nodeid.
     *
     * @param int $nodeid
     *
     * @return Chotomouskey
     */
    public function setNodeid($nodeid)
    {
        $this->nodeid = $nodeid;

        return $this;
    }

    /**
     * Get nodeid.
     *
     * @return int
     */
    public function getNodeid()
    {
        return $this->nodeid;
    }

    /**
     * Set parentid.
     *
     * @param int $parentid
     *
     * @return Chotomouskey
     */
    public function setParentid($parentid)
    {
        $this->parentid = $parentid;

        return $this;
    }

    /**
     * Get parentid.
     *
     * @return int
     */
    public function getParentid()
    {
        return $this->parentid;
    }

    /**
     * Set notes.
     *
     * @param string|null $notes
     *
     * @return Chotomouskey
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
     * @return Chotomouskey
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
     * Set tid.
     *
     * @param \App\Entities\Taxa|null $tid
     *
     * @return Chotomouskey
     */
    public function setTid(\App\Entities\Taxa $tid = null)
    {
        $this->tid = $tid;

        return $this;
    }

    /**
     * Get tid.
     *
     * @return \App\Entities\Taxa|null
     */
    public function getTid()
    {
        return $this->tid;
    }
}
