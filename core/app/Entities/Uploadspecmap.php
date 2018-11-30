<?php

namespace App\Entities;

use Doctrine\ORM\Mapping as ORM;

/**
 * Uploadspecmap
 *
 * @ORM\Table(name="uploadspecmap", uniqueConstraints={@ORM\UniqueConstraint(name="Index_unique", columns={"uspid", "symbspecfield", "sourcefield"})}, indexes={@ORM\Index(name="IDX_2B717C4B248B8A2F", columns={"uspid"})})
 * @ORM\Entity
 */
class Uploadspecmap
{
    /**
     * @var int
     *
     * @ORM\Column(name="usmid", type="integer", precision=0, scale=0, nullable=false, options={"unsigned"=true}, unique=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $usmid;

    /**
     * @var string
     *
     * @ORM\Column(name="sourcefield", type="string", length=45, precision=0, scale=0, nullable=false, unique=false)
     */
    private $sourcefield;

    /**
     * @var string
     *
     * @ORM\Column(name="symbdatatype", type="string", length=45, precision=0, scale=0, nullable=false, options={"default"="string","comment"="string, numeric, datetime"}, unique=false)
     */
    private $symbdatatype = 'string';

    /**
     * @var string
     *
     * @ORM\Column(name="symbspecfield", type="string", length=45, precision=0, scale=0, nullable=false, unique=false)
     */
    private $symbspecfield;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="initialtimestamp", type="datetime", precision=0, scale=0, nullable=false, options={"default"="CURRENT_TIMESTAMP"}, unique=false)
     */
    private $initialtimestamp = 'CURRENT_TIMESTAMP';

    /**
     * @var \App\Entities\Uploadspecparameters
     *
     * @ORM\ManyToOne(targetEntity="App\Entities\Uploadspecparameters")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="uspid", referencedColumnName="uspid", nullable=true)
     * })
     */
    private $uspid;


    /**
     * Get usmid.
     *
     * @return int
     */
    public function getUsmid()
    {
        return $this->usmid;
    }

    /**
     * Set sourcefield.
     *
     * @param string $sourcefield
     *
     * @return Uploadspecmap
     */
    public function setSourcefield($sourcefield)
    {
        $this->sourcefield = $sourcefield;

        return $this;
    }

    /**
     * Get sourcefield.
     *
     * @return string
     */
    public function getSourcefield()
    {
        return $this->sourcefield;
    }

    /**
     * Set symbdatatype.
     *
     * @param string $symbdatatype
     *
     * @return Uploadspecmap
     */
    public function setSymbdatatype($symbdatatype)
    {
        $this->symbdatatype = $symbdatatype;

        return $this;
    }

    /**
     * Get symbdatatype.
     *
     * @return string
     */
    public function getSymbdatatype()
    {
        return $this->symbdatatype;
    }

    /**
     * Set symbspecfield.
     *
     * @param string $symbspecfield
     *
     * @return Uploadspecmap
     */
    public function setSymbspecfield($symbspecfield)
    {
        $this->symbspecfield = $symbspecfield;

        return $this;
    }

    /**
     * Get symbspecfield.
     *
     * @return string
     */
    public function getSymbspecfield()
    {
        return $this->symbspecfield;
    }

    /**
     * Set initialtimestamp.
     *
     * @param \DateTime $initialtimestamp
     *
     * @return Uploadspecmap
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
     * Set uspid.
     *
     * @param \App\Entities\Uploadspecparameters|null $uspid
     *
     * @return Uploadspecmap
     */
    public function setUspid(\App\Entities\Uploadspecparameters $uspid = null)
    {
        $this->uspid = $uspid;

        return $this;
    }

    /**
     * Get uspid.
     *
     * @return \App\Entities\Uploadspecparameters|null
     */
    public function getUspid()
    {
        return $this->uspid;
    }
}
