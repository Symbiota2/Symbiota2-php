<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Omoccurrencesfulltext
 *
 * @ORM\Table(name="omoccurrencesfulltext", indexes={@ORM\Index(name="ft_occur_locality", columns={"locality"}), @ORM\Index(name="ft_occur_recordedby", columns={"recordedby"})})
 * @ORM\Entity(repositoryClass="App\Repository\OmoccurrencesfulltextRepository")
 */
class Omoccurrencesfulltext
{
    /**
     * @var int
     *
     * @ORM\Column(name="occid", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $occid;

    /**
     * @var string|null
     *
     * @ORM\Column(name="locality", type="text", length=65535, nullable=true, options={"default"="NULL"})
     */
    private $locality = 'NULL';

    /**
     * @var string|null
     *
     * @ORM\Column(name="recordedby", type="string", length=255, nullable=true, options={"default"="NULL"})
     */
    private $recordedby = 'NULL';

    public function getOccid(): ?int
    {
        return $this->occid;
    }

    public function getLocality(): ?string
    {
        return $this->locality;
    }

    public function setLocality(?string $locality): self
    {
        $this->locality = $locality;

        return $this;
    }

    public function getRecordedby(): ?string
    {
        return $this->recordedby;
    }

    public function setRecordedby(?string $recordedby): self
    {
        $this->recordedby = $recordedby;

        return $this;
    }


}
