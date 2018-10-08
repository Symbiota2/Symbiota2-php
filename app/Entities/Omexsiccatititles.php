<?php

namespace App\Entities;

use Doctrine\ORM\Mapping as ORM;

/**
 * Omexsiccatititles
 *
 * @ORM\Table(name="omexsiccatititles", indexes={@ORM\Index(name="index_exsiccatiTitle", columns={"title"})})
 * @ORM\Entity
 */
class Omexsiccatititles
{
    /**
     * @var int
     *
     * @ORM\Column(name="ometid", type="integer", precision=0, scale=0, nullable=false, options={"unsigned"=true}, unique=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $ometid;

    /**
     * @var string
     *
     * @ORM\Column(name="title", type="string", length=150, precision=0, scale=0, nullable=false, unique=false)
     */
    private $title;

    /**
     * @var string|null
     *
     * @ORM\Column(name="abbreviation", type="string", length=100, precision=0, scale=0, nullable=true, unique=false)
     */
    private $abbreviation;

    /**
     * @var string|null
     *
     * @ORM\Column(name="editor", type="string", length=150, precision=0, scale=0, nullable=true, unique=false)
     */
    private $editor;

    /**
     * @var string|null
     *
     * @ORM\Column(name="exsrange", type="string", length=45, precision=0, scale=0, nullable=true, unique=false)
     */
    private $exsrange;

    /**
     * @var string|null
     *
     * @ORM\Column(name="startdate", type="string", length=45, precision=0, scale=0, nullable=true, unique=false)
     */
    private $startdate;

    /**
     * @var string|null
     *
     * @ORM\Column(name="enddate", type="string", length=45, precision=0, scale=0, nullable=true, unique=false)
     */
    private $enddate;

    /**
     * @var string|null
     *
     * @ORM\Column(name="source", type="string", length=250, precision=0, scale=0, nullable=true, unique=false)
     */
    private $source;

    /**
     * @var string|null
     *
     * @ORM\Column(name="notes", type="string", length=2000, precision=0, scale=0, nullable=true, unique=false)
     */
    private $notes;

    /**
     * @var string|null
     *
     * @ORM\Column(name="lasteditedby", type="string", length=45, precision=0, scale=0, nullable=true, unique=false)
     */
    private $lasteditedby;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="initialtimestamp", type="datetime", precision=0, scale=0, nullable=false, options={"default"="CURRENT_TIMESTAMP"}, unique=false)
     */
    private $initialtimestamp = 'CURRENT_TIMESTAMP';


    /**
     * Get ometid.
     *
     * @return int
     */
    public function getOmetid()
    {
        return $this->ometid;
    }

    /**
     * Set title.
     *
     * @param string $title
     *
     * @return Omexsiccatititles
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
     * Set abbreviation.
     *
     * @param string|null $abbreviation
     *
     * @return Omexsiccatititles
     */
    public function setAbbreviation($abbreviation = null)
    {
        $this->abbreviation = $abbreviation;

        return $this;
    }

    /**
     * Get abbreviation.
     *
     * @return string|null
     */
    public function getAbbreviation()
    {
        return $this->abbreviation;
    }

    /**
     * Set editor.
     *
     * @param string|null $editor
     *
     * @return Omexsiccatititles
     */
    public function setEditor($editor = null)
    {
        $this->editor = $editor;

        return $this;
    }

    /**
     * Get editor.
     *
     * @return string|null
     */
    public function getEditor()
    {
        return $this->editor;
    }

    /**
     * Set exsrange.
     *
     * @param string|null $exsrange
     *
     * @return Omexsiccatititles
     */
    public function setExsrange($exsrange = null)
    {
        $this->exsrange = $exsrange;

        return $this;
    }

    /**
     * Get exsrange.
     *
     * @return string|null
     */
    public function getExsrange()
    {
        return $this->exsrange;
    }

    /**
     * Set startdate.
     *
     * @param string|null $startdate
     *
     * @return Omexsiccatititles
     */
    public function setStartdate($startdate = null)
    {
        $this->startdate = $startdate;

        return $this;
    }

    /**
     * Get startdate.
     *
     * @return string|null
     */
    public function getStartdate()
    {
        return $this->startdate;
    }

    /**
     * Set enddate.
     *
     * @param string|null $enddate
     *
     * @return Omexsiccatititles
     */
    public function setEnddate($enddate = null)
    {
        $this->enddate = $enddate;

        return $this;
    }

    /**
     * Get enddate.
     *
     * @return string|null
     */
    public function getEnddate()
    {
        return $this->enddate;
    }

    /**
     * Set source.
     *
     * @param string|null $source
     *
     * @return Omexsiccatititles
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
     * Set notes.
     *
     * @param string|null $notes
     *
     * @return Omexsiccatititles
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
     * Set lasteditedby.
     *
     * @param string|null $lasteditedby
     *
     * @return Omexsiccatititles
     */
    public function setLasteditedby($lasteditedby = null)
    {
        $this->lasteditedby = $lasteditedby;

        return $this;
    }

    /**
     * Get lasteditedby.
     *
     * @return string|null
     */
    public function getLasteditedby()
    {
        return $this->lasteditedby;
    }

    /**
     * Set initialtimestamp.
     *
     * @param \DateTime $initialtimestamp
     *
     * @return Omexsiccatititles
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
}
