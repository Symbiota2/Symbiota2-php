<?php

namespace App\Entities;

use Doctrine\ORM\Mapping as ORM;

/**
 * Taxaresourcelinks
 *
 * @ORM\Table(name="taxaresourcelinks", indexes={@ORM\Index(name="taxaresource_name", columns={"sourcename"}), @ORM\Index(name="FK_taxaresource_tid_idx", columns={"tid"})})
 * @ORM\Entity
 */
class Taxaresourcelinks
{
    /**
     * @var int
     *
     * @ORM\Column(name="taxaresourceid", type="integer", precision=0, scale=0, nullable=false, unique=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $taxaresourceid;

    /**
     * @var string
     *
     * @ORM\Column(name="sourcename", type="string", length=150, precision=0, scale=0, nullable=false, unique=false)
     */
    private $sourcename;

    /**
     * @var string|null
     *
     * @ORM\Column(name="sourceidentifier", type="string", length=45, precision=0, scale=0, nullable=true, unique=false)
     */
    private $sourceidentifier;

    /**
     * @var string|null
     *
     * @ORM\Column(name="sourceguid", type="string", length=150, precision=0, scale=0, nullable=true, unique=false)
     */
    private $sourceguid;

    /**
     * @var string|null
     *
     * @ORM\Column(name="url", type="string", length=250, precision=0, scale=0, nullable=true, unique=false)
     */
    private $url;

    /**
     * @var string|null
     *
     * @ORM\Column(name="notes", type="string", length=250, precision=0, scale=0, nullable=true, unique=false)
     */
    private $notes;

    /**
     * @var int|null
     *
     * @ORM\Column(name="ranking", type="integer", precision=0, scale=0, nullable=true, unique=false)
     */
    private $ranking;

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
     * Get taxaresourceid.
     *
     * @return int
     */
    public function getTaxaresourceid()
    {
        return $this->taxaresourceid;
    }

    /**
     * Set sourcename.
     *
     * @param string $sourcename
     *
     * @return Taxaresourcelinks
     */
    public function setSourcename($sourcename)
    {
        $this->sourcename = $sourcename;

        return $this;
    }

    /**
     * Get sourcename.
     *
     * @return string
     */
    public function getSourcename()
    {
        return $this->sourcename;
    }

    /**
     * Set sourceidentifier.
     *
     * @param string|null $sourceidentifier
     *
     * @return Taxaresourcelinks
     */
    public function setSourceidentifier($sourceidentifier = null)
    {
        $this->sourceidentifier = $sourceidentifier;

        return $this;
    }

    /**
     * Get sourceidentifier.
     *
     * @return string|null
     */
    public function getSourceidentifier()
    {
        return $this->sourceidentifier;
    }

    /**
     * Set sourceguid.
     *
     * @param string|null $sourceguid
     *
     * @return Taxaresourcelinks
     */
    public function setSourceguid($sourceguid = null)
    {
        $this->sourceguid = $sourceguid;

        return $this;
    }

    /**
     * Get sourceguid.
     *
     * @return string|null
     */
    public function getSourceguid()
    {
        return $this->sourceguid;
    }

    /**
     * Set url.
     *
     * @param string|null $url
     *
     * @return Taxaresourcelinks
     */
    public function setUrl($url = null)
    {
        $this->url = $url;

        return $this;
    }

    /**
     * Get url.
     *
     * @return string|null
     */
    public function getUrl()
    {
        return $this->url;
    }

    /**
     * Set notes.
     *
     * @param string|null $notes
     *
     * @return Taxaresourcelinks
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
     * Set ranking.
     *
     * @param int|null $ranking
     *
     * @return Taxaresourcelinks
     */
    public function setRanking($ranking = null)
    {
        $this->ranking = $ranking;

        return $this;
    }

    /**
     * Get ranking.
     *
     * @return int|null
     */
    public function getRanking()
    {
        return $this->ranking;
    }

    /**
     * Set initialtimestamp.
     *
     * @param \DateTime $initialtimestamp
     *
     * @return Taxaresourcelinks
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
     * @return Taxaresourcelinks
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
