<?php

namespace App\Entities;

use Doctrine\ORM\Mapping as ORM;

/**
 * Taxadescrstmts
 *
 * @ORM\Table(name="taxadescrstmts", indexes={@ORM\Index(name="FK_taxadescrstmts_tblock", columns={"tdbid"})})
 * @ORM\Entity
 */
class Taxadescrstmts
{
    /**
     * @var int
     *
     * @ORM\Column(name="tdsid", type="integer", precision=0, scale=0, nullable=false, options={"unsigned"=true}, unique=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $tdsid;

    /**
     * @var string
     *
     * @ORM\Column(name="heading", type="string", length=75, precision=0, scale=0, nullable=false, unique=false)
     */
    private $heading;

    /**
     * @var string
     *
     * @ORM\Column(name="statement", type="text", length=65535, precision=0, scale=0, nullable=false, unique=false)
     */
    private $statement;

    /**
     * @var int
     *
     * @ORM\Column(name="displayheader", type="integer", precision=0, scale=0, nullable=false, options={"default"="1","unsigned"=true}, unique=false)
     */
    private $displayheader = '1';

    /**
     * @var string|null
     *
     * @ORM\Column(name="notes", type="string", length=250, precision=0, scale=0, nullable=true, unique=false)
     */
    private $notes;

    /**
     * @var int
     *
     * @ORM\Column(name="sortsequence", type="integer", precision=0, scale=0, nullable=false, options={"default"="89","unsigned"=true}, unique=false)
     */
    private $sortsequence = '89';

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="initialtimestamp", type="datetime", precision=0, scale=0, nullable=false, options={"default"="CURRENT_TIMESTAMP"}, unique=false)
     */
    private $initialtimestamp = 'CURRENT_TIMESTAMP';

    /**
     * @var \App\Entities\Taxadescrblock
     *
     * @ORM\ManyToOne(targetEntity="App\Entities\Taxadescrblock")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="tdbid", referencedColumnName="tdbid", nullable=true)
     * })
     */
    private $tdbid;


    /**
     * Get tdsid.
     *
     * @return int
     */
    public function getTdsid()
    {
        return $this->tdsid;
    }

    /**
     * Set heading.
     *
     * @param string $heading
     *
     * @return Taxadescrstmts
     */
    public function setHeading($heading)
    {
        $this->heading = $heading;

        return $this;
    }

    /**
     * Get heading.
     *
     * @return string
     */
    public function getHeading()
    {
        return $this->heading;
    }

    /**
     * Set statement.
     *
     * @param string $statement
     *
     * @return Taxadescrstmts
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
     * Set displayheader.
     *
     * @param int $displayheader
     *
     * @return Taxadescrstmts
     */
    public function setDisplayheader($displayheader)
    {
        $this->displayheader = $displayheader;

        return $this;
    }

    /**
     * Get displayheader.
     *
     * @return int
     */
    public function getDisplayheader()
    {
        return $this->displayheader;
    }

    /**
     * Set notes.
     *
     * @param string|null $notes
     *
     * @return Taxadescrstmts
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
     * Set sortsequence.
     *
     * @param int $sortsequence
     *
     * @return Taxadescrstmts
     */
    public function setSortsequence($sortsequence)
    {
        $this->sortsequence = $sortsequence;

        return $this;
    }

    /**
     * Get sortsequence.
     *
     * @return int
     */
    public function getSortsequence()
    {
        return $this->sortsequence;
    }

    /**
     * Set initialtimestamp.
     *
     * @param \DateTime $initialtimestamp
     *
     * @return Taxadescrstmts
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
     * Set tdbid.
     *
     * @param \App\Entities\Taxadescrblock|null $tdbid
     *
     * @return Taxadescrstmts
     */
    public function setTdbid(\App\Entities\Taxadescrblock $tdbid = null)
    {
        $this->tdbid = $tdbid;

        return $this;
    }

    /**
     * Get tdbid.
     *
     * @return \App\Entities\Taxadescrblock|null
     */
    public function getTdbid()
    {
        return $this->tdbid;
    }
}
