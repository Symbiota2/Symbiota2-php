<?php

namespace App\Entities;

use Doctrine\ORM\Mapping as ORM;

/**
 * Omcrowdsourcecentral
 *
 * @ORM\Table(name="omcrowdsourcecentral", uniqueConstraints={@ORM\UniqueConstraint(name="Index_omcrowdsourcecentral_collid", columns={"collid"})}, indexes={@ORM\Index(name="FK_omcrowdsourcecentral_collid", columns={"collid"})})
 * @ORM\Entity
 */
class Omcrowdsourcecentral
{
    /**
     * @var int
     *
     * @ORM\Column(name="omcsid", type="integer", precision=0, scale=0, nullable=false, unique=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $omcsid;

    /**
     * @var string|null
     *
     * @ORM\Column(name="instructions", type="text", length=65535, precision=0, scale=0, nullable=true, unique=false)
     */
    private $instructions;

    /**
     * @var string|null
     *
     * @ORM\Column(name="trainingurl", type="string", length=500, precision=0, scale=0, nullable=true, unique=false)
     */
    private $trainingurl;

    /**
     * @var int
     *
     * @ORM\Column(name="editorlevel", type="integer", precision=0, scale=0, nullable=false, options={"comment"="0=public, 1=public limited, 2=private"}, unique=false)
     */
    private $editorlevel;

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
     * @var \App\Entities\Omcollections
     *
     * @ORM\ManyToOne(targetEntity="App\Entities\Omcollections")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="collid", referencedColumnName="CollID", nullable=true)
     * })
     */
    private $collid;


    /**
     * Get omcsid.
     *
     * @return int
     */
    public function getOmcsid()
    {
        return $this->omcsid;
    }

    /**
     * Set instructions.
     *
     * @param string|null $instructions
     *
     * @return Omcrowdsourcecentral
     */
    public function setInstructions($instructions = null)
    {
        $this->instructions = $instructions;

        return $this;
    }

    /**
     * Get instructions.
     *
     * @return string|null
     */
    public function getInstructions()
    {
        return $this->instructions;
    }

    /**
     * Set trainingurl.
     *
     * @param string|null $trainingurl
     *
     * @return Omcrowdsourcecentral
     */
    public function setTrainingurl($trainingurl = null)
    {
        $this->trainingurl = $trainingurl;

        return $this;
    }

    /**
     * Get trainingurl.
     *
     * @return string|null
     */
    public function getTrainingurl()
    {
        return $this->trainingurl;
    }

    /**
     * Set editorlevel.
     *
     * @param int $editorlevel
     *
     * @return Omcrowdsourcecentral
     */
    public function setEditorlevel($editorlevel)
    {
        $this->editorlevel = $editorlevel;

        return $this;
    }

    /**
     * Get editorlevel.
     *
     * @return int
     */
    public function getEditorlevel()
    {
        return $this->editorlevel;
    }

    /**
     * Set notes.
     *
     * @param string|null $notes
     *
     * @return Omcrowdsourcecentral
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
     * @return Omcrowdsourcecentral
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
     * Set collid.
     *
     * @param \App\Entities\Omcollections|null $collid
     *
     * @return Omcrowdsourcecentral
     */
    public function setCollid(\App\Entities\Omcollections $collid = null)
    {
        $this->collid = $collid;

        return $this;
    }

    /**
     * Get collid.
     *
     * @return \App\Entities\Omcollections|null
     */
    public function getCollid()
    {
        return $this->collid;
    }
}
