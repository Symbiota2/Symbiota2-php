<?php

namespace App\Entities;

use Doctrine\ORM\Mapping as ORM;

/**
 * Omoccurrencesfulltext
 *
 * @ORM\Table(name="omoccurrencesfulltext", indexes={@ORM\Index(name="ft_occur_locality", columns={"locality"}, flags={"fulltext"}), @ORM\Index(name="ft_occur_recordedby", columns={"recordedby"})})
 * @ORM\Entity
 */
class Omoccurrencesfulltext
{
    /**
     * @var int
     *
     * @ORM\Column(name="occid", type="integer", precision=0, scale=0, nullable=false, unique=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $occid;

    /**
     * @var string|null
     *
     * @ORM\Column(name="locality", type="text", length=65535, precision=0, scale=0, nullable=true, unique=false)
     */
    private $locality;

    /**
     * @var string|null
     *
     * @ORM\Column(name="recordedby", type="string", length=255, precision=0, scale=0, nullable=true, unique=false)
     */
    private $recordedby;


    /**
     * Get occid.
     *
     * @return int
     */
    public function getOccid()
    {
        return $this->occid;
    }

    /**
     * Set locality.
     *
     * @param string|null $locality
     *
     * @return Omoccurrencesfulltext
     */
    public function setLocality($locality = null)
    {
        $this->locality = $locality;

        return $this;
    }

    /**
     * Get locality.
     *
     * @return string|null
     */
    public function getLocality()
    {
        return $this->locality;
    }

    /**
     * Set recordedby.
     *
     * @param string|null $recordedby
     *
     * @return Omoccurrencesfulltext
     */
    public function setRecordedby($recordedby = null)
    {
        $this->recordedby = $recordedby;

        return $this;
    }

    /**
     * Get recordedby.
     *
     * @return string|null
     */
    public function getRecordedby()
    {
        return $this->recordedby;
    }
}
