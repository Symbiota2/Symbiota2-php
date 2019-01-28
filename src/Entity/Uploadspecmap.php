<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Uploadspecmap
 *
 * @ORM\Table(name="uploadspecmap", uniqueConstraints={@ORM\UniqueConstraint(name="Index_unique_uploadspecmap", columns={"uspid", "symbspecfield", "sourcefield"})}, indexes={@ORM\Index(name="IDX_2B717C4B248B8A2F", columns={"uspid"})})
 * @ORM\Entity(repositoryClass="App\Repository\UploadspecmapRepository")
 */
class Uploadspecmap
{
    /**
     * @var int
     *
     * @ORM\Column(name="usmid", type="integer", nullable=false, options={"unsigned"=true})
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $usmid;

    /**
     * @var \Uploadspecparameters
     *
     * @ORM\ManyToOne(targetEntity="Uploadspecparameters")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="uspid", referencedColumnName="uspid")
     * })
     */
    private $uspid;

    /**
     * @var string
     *
     * @ORM\Column(name="sourcefield", type="string", length=45, nullable=false)
     */
    private $sourcefield;

    /**
     * @var string
     *
     * @ORM\Column(name="symbdatatype", type="string", length=45, nullable=false, options={"default"="string","comment"="string, numeric, datetime"})
     */
    private $symbdatatype = 'string';

    /**
     * @var string
     *
     * @ORM\Column(name="symbspecfield", type="string", length=45, nullable=false)
     */
    private $symbspecfield;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="initialtimestamp", type="datetime", nullable=false, options={"default"="CURRENT_TIMESTAMP"})
     */
    private $initialtimestamp = 'CURRENT_TIMESTAMP';

    public function getUsmid(): ?int
    {
        return $this->usmid;
    }

    public function getSourcefield(): ?string
    {
        return $this->sourcefield;
    }

    public function setSourcefield(string $sourcefield): self
    {
        $this->sourcefield = $sourcefield;

        return $this;
    }

    public function getSymbdatatype(): ?string
    {
        return $this->symbdatatype;
    }

    public function setSymbdatatype(string $symbdatatype): self
    {
        $this->symbdatatype = $symbdatatype;

        return $this;
    }

    public function getSymbspecfield(): ?string
    {
        return $this->symbspecfield;
    }

    public function setSymbspecfield(string $symbspecfield): self
    {
        $this->symbspecfield = $symbspecfield;

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

    public function getUspid(): ?Uploadspecparameters
    {
        return $this->uspid;
    }

    public function setUspid(?Uploadspecparameters $uspid): self
    {
        $this->uspid = $uspid;

        return $this;
    }


}
