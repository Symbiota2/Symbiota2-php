<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Guidoccurdeterminations
 *
 * @ORM\Table(name="guidoccurdeterminations", uniqueConstraints={@ORM\UniqueConstraint(name="guidoccurdet_detid_unique", columns={"detid"})})
 * @ORM\Entity(repositoryClass="App\Repository\GuidoccurdeterminationsRepository")
 */
class Guidoccurdeterminations
{
    /**
     * @var string
     *
     * @ORM\Column(name="guid", type="string", length=45, nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $guid;

    /**
     * @var int|null
     *
     * @ORM\Column(name="detid", type="integer", nullable=true, options={"default"=NULL,"unsigned"=true})
     */
    private $detid = 'NULL';

    /**
     * @var int
     *
     * @ORM\Column(name="archivestatus", type="integer", nullable=false)
     */
    private $archivestatus;

    /**
     * @var string|null
     *
     * @ORM\Column(name="archiveobj", type="text", length=65535, nullable=true, options={"default"=NULL})
     */
    private $archiveobj = 'NULL';

    /**
     * @var string|null
     *
     * @ORM\Column(name="notes", type="string", length=250, nullable=true, options={"default"=NULL})
     */
    private $notes = 'NULL';

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="initialtimestamp", type="datetime", nullable=false, options={"default"="CURRENT_TIMESTAMP"})
     */
    private $initialtimestamp = 'CURRENT_TIMESTAMP';

    public function getGuid(): ?string
    {
        return $this->guid;
    }

    public function getDetid(): ?int
    {
        return $this->detid;
    }

    public function setDetid(?int $detid): self
    {
        $this->detid = $detid;

        return $this;
    }

    public function getArchivestatus(): ?int
    {
        return $this->archivestatus;
    }

    public function setArchivestatus(int $archivestatus): self
    {
        $this->archivestatus = $archivestatus;

        return $this;
    }

    public function getArchiveobj(): ?string
    {
        return $this->archiveobj;
    }

    public function setArchiveobj(?string $archiveobj): self
    {
        $this->archiveobj = $archiveobj;

        return $this;
    }

    public function getNotes(): ?string
    {
        return $this->notes;
    }

    public function setNotes(?string $notes): self
    {
        $this->notes = $notes;

        return $this;
    }

    public function getInitialtimestamp(): ?\DateTimeInterface
    {
        return $this->initialtimestamp;
    }

    public function setInitialtimestamp(\DateTimeInterface $initialtimestamp): self
    {
        $this->initialtimestamp = $initialtimestamp;

        return $this;
    }


}
