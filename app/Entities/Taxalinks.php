<?php

namespace App\Entities;

use Doctrine\ORM\Mapping as ORM;

/**
 * Taxalinks
 *
 * @ORM\Table(name="taxalinks", indexes={@ORM\Index(name="Index_unique", columns={"tid", "url"}), @ORM\Index(name="IDX_5C8832E452596C31", columns={"tid"})})
 * @ORM\Entity
 */
class Taxalinks
{
    /**
     * @var int
     *
     * @ORM\Column(name="tlid", type="integer", precision=0, scale=0, nullable=false, options={"unsigned"=true}, unique=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $tlid;

    /**
     * @var string
     *
     * @ORM\Column(name="url", type="string", length=500, precision=0, scale=0, nullable=false, unique=false)
     */
    private $url;

    /**
     * @var string
     *
     * @ORM\Column(name="title", type="string", length=100, precision=0, scale=0, nullable=false, unique=false)
     */
    private $title;

    /**
     * @var string|null
     *
     * @ORM\Column(name="sourceIdentifier", type="string", length=45, precision=0, scale=0, nullable=true, unique=false)
     */
    private $sourceidentifier;

    /**
     * @var string|null
     *
     * @ORM\Column(name="owner", type="string", length=100, precision=0, scale=0, nullable=true, unique=false)
     */
    private $owner;

    /**
     * @var string|null
     *
     * @ORM\Column(name="icon", type="string", length=45, precision=0, scale=0, nullable=true, unique=false)
     */
    private $icon;

    /**
     * @var int|null
     *
     * @ORM\Column(name="inherit", type="integer", precision=0, scale=0, nullable=true, options={"default"="1"}, unique=false)
     */
    private $inherit = '1';

    /**
     * @var string|null
     *
     * @ORM\Column(name="notes", type="string", length=250, precision=0, scale=0, nullable=true, unique=false)
     */
    private $notes;

    /**
     * @var int
     *
     * @ORM\Column(name="sortsequence", type="integer", precision=0, scale=0, nullable=false, options={"default"="50","unsigned"=true}, unique=false)
     */
    private $sortsequence = '50';

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
     * Get tlid.
     *
     * @return int
     */
    public function getTlid()
    {
        return $this->tlid;
    }

    /**
     * Set url.
     *
     * @param string $url
     *
     * @return Taxalinks
     */
    public function setUrl($url)
    {
        $this->url = $url;

        return $this;
    }

    /**
     * Get url.
     *
     * @return string
     */
    public function getUrl()
    {
        return $this->url;
    }

    /**
     * Set title.
     *
     * @param string $title
     *
     * @return Taxalinks
     */
    public function setTitle($title)
    {
        $this->title = $title;

        return $this;
    }

    /**
     * Get title.
     *
     * @return string
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * Set sourceidentifier.
     *
     * @param string|null $sourceidentifier
     *
     * @return Taxalinks
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
     * Set owner.
     *
     * @param string|null $owner
     *
     * @return Taxalinks
     */
    public function setOwner($owner = null)
    {
        $this->owner = $owner;

        return $this;
    }

    /**
     * Get owner.
     *
     * @return string|null
     */
    public function getOwner()
    {
        return $this->owner;
    }

    /**
     * Set icon.
     *
     * @param string|null $icon
     *
     * @return Taxalinks
     */
    public function setIcon($icon = null)
    {
        $this->icon = $icon;

        return $this;
    }

    /**
     * Get icon.
     *
     * @return string|null
     */
    public function getIcon()
    {
        return $this->icon;
    }

    /**
     * Set inherit.
     *
     * @param int|null $inherit
     *
     * @return Taxalinks
     */
    public function setInherit($inherit = null)
    {
        $this->inherit = $inherit;

        return $this;
    }

    /**
     * Get inherit.
     *
     * @return int|null
     */
    public function getInherit()
    {
        return $this->inherit;
    }

    /**
     * Set notes.
     *
     * @param string|null $notes
     *
     * @return Taxalinks
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
     * @return Taxalinks
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
     * @return Taxalinks
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
     * @return Taxalinks
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
