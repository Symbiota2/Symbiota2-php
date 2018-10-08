<?php

namespace App\Entities;

use Doctrine\ORM\Mapping as ORM;

/**
 * Omoccurgenetic
 *
 * @ORM\Table(name="omoccurgenetic", indexes={@ORM\Index(name="FK_omoccurgenetic", columns={"occid"}), @ORM\Index(name="INDEX_omoccurgenetic_name", columns={"resourcename"})})
 * @ORM\Entity
 */
class Omoccurgenetic
{
    /**
     * @var int
     *
     * @ORM\Column(name="idoccurgenetic", type="integer", precision=0, scale=0, nullable=false, unique=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idoccurgenetic;

    /**
     * @var string|null
     *
     * @ORM\Column(name="identifier", type="string", length=150, precision=0, scale=0, nullable=true, unique=false)
     */
    private $identifier;

    /**
     * @var string
     *
     * @ORM\Column(name="resourcename", type="string", length=150, precision=0, scale=0, nullable=false, unique=false)
     */
    private $resourcename;

    /**
     * @var string|null
     *
     * @ORM\Column(name="title", type="string", length=150, precision=0, scale=0, nullable=true, unique=false)
     */
    private $title;

    /**
     * @var string|null
     *
     * @ORM\Column(name="locus", type="string", length=500, precision=0, scale=0, nullable=true, unique=false)
     */
    private $locus;

    /**
     * @var string|null
     *
     * @ORM\Column(name="resourceurl", type="string", length=500, precision=0, scale=0, nullable=true, unique=false)
     */
    private $resourceurl;

    /**
     * @var string|null
     *
     * @ORM\Column(name="notes", type="string", length=45, precision=0, scale=0, nullable=true, unique=false)
     */
    private $notes;

    /**
     * @var string|null
     *
     * @ORM\Column(name="initialtimestamp", type="string", length=45, precision=0, scale=0, nullable=true, unique=false)
     */
    private $initialtimestamp;

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
     * Get idoccurgenetic.
     *
     * @return int
     */
    public function getIdoccurgenetic()
    {
        return $this->idoccurgenetic;
    }

    /**
     * Set identifier.
     *
     * @param string|null $identifier
     *
     * @return Omoccurgenetic
     */
    public function setIdentifier($identifier = null)
    {
        $this->identifier = $identifier;

        return $this;
    }

    /**
     * Get identifier.
     *
     * @return string|null
     */
    public function getIdentifier()
    {
        return $this->identifier;
    }

    /**
     * Set resourcename.
     *
     * @param string $resourcename
     *
     * @return Omoccurgenetic
     */
    public function setResourcename($resourcename)
    {
        $this->resourcename = $resourcename;

        return $this;
    }

    /**
     * Get resourcename.
     *
     * @return string
     */
    public function getResourcename()
    {
        return $this->resourcename;
    }

    /**
     * Set title.
     *
     * @param string|null $title
     *
     * @return Omoccurgenetic
     */
    public function setTitle($title = null)
    {
        $this->title = $title;

        return $this;
    }

    /**
     * Get title.
     *
     * @return string|null
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * Set locus.
     *
     * @param string|null $locus
     *
     * @return Omoccurgenetic
     */
    public function setLocus($locus = null)
    {
        $this->locus = $locus;

        return $this;
    }

    /**
     * Get locus.
     *
     * @return string|null
     */
    public function getLocus()
    {
        return $this->locus;
    }

    /**
     * Set resourceurl.
     *
     * @param string|null $resourceurl
     *
     * @return Omoccurgenetic
     */
    public function setResourceurl($resourceurl = null)
    {
        $this->resourceurl = $resourceurl;

        return $this;
    }

    /**
     * Get resourceurl.
     *
     * @return string|null
     */
    public function getResourceurl()
    {
        return $this->resourceurl;
    }

    /**
     * Set notes.
     *
     * @param string|null $notes
     *
     * @return Omoccurgenetic
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
     * @param string|null $initialtimestamp
     *
     * @return Omoccurgenetic
     */
    public function setInitialtimestamp($initialtimestamp = null)
    {
        $this->initialtimestamp = $initialtimestamp;

        return $this;
    }

    /**
     * Get initialtimestamp.
     *
     * @return string|null
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
     * @return Omoccurgenetic
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
