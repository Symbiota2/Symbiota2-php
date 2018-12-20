<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Omexsiccatititles
 *
 * @ORM\Table(name="omexsiccatititles", indexes={@ORM\Index(name="index_exsiccatiTitle", columns={"title"})})
 * @ORM\Entity(repositoryClass="App\Repository\OmexsiccatititlesRepository")
 */
class Omexsiccatititles
{
    /**
     * @var int
     *
     * @ORM\Column(name="ometid", type="integer", nullable=false, options={"unsigned"=true})
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $ometid;

    /**
     * @var string
     *
     * @ORM\Column(name="title", type="string", length=150, nullable=false)
     */
    private $title;

    /**
     * @var string|null
     *
     * @ORM\Column(name="abbreviation", type="string", length=100, nullable=true, options={"default"="NULL"})
     */
    private $abbreviation = 'NULL';

    /**
     * @var string|null
     *
     * @ORM\Column(name="editor", type="string", length=150, nullable=true, options={"default"="NULL"})
     */
    private $editor = 'NULL';

    /**
     * @var string|null
     *
     * @ORM\Column(name="exsrange", type="string", length=45, nullable=true, options={"default"="NULL"})
     */
    private $exsrange = 'NULL';

    /**
     * @var string|null
     *
     * @ORM\Column(name="startdate", type="string", length=45, nullable=true, options={"default"="NULL"})
     */
    private $startdate = 'NULL';

    /**
     * @var string|null
     *
     * @ORM\Column(name="enddate", type="string", length=45, nullable=true, options={"default"="NULL"})
     */
    private $enddate = 'NULL';

    /**
     * @var string|null
     *
     * @ORM\Column(name="source", type="string", length=250, nullable=true, options={"default"="NULL"})
     */
    private $source = 'NULL';

    /**
     * @var string|null
     *
     * @ORM\Column(name="notes", type="string", length=2000, nullable=true, options={"default"="NULL"})
     */
    private $notes = 'NULL';

    /**
     * @var string|null
     *
     * @ORM\Column(name="lasteditedby", type="string", length=45, nullable=true, options={"default"="NULL"})
     */
    private $lasteditedby = 'NULL';

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="initialtimestamp", type="datetime", nullable=false, options={"default"="current_timestamp()"})
     */
    private $initialtimestamp = 'current_timestamp()';

    public function getOmetid(): ?int
    {
        return $this->ometid;
    }

    public function getTitle(): ?string
    {
        return $this->title;
    }

    public function setTitle(string $title): self
    {
        $this->title = $title;

        return $this;
    }

    public function getAbbreviation(): ?string
    {
        return $this->abbreviation;
    }

    public function setAbbreviation(?string $abbreviation): self
    {
        $this->abbreviation = $abbreviation;

        return $this;
    }

    public function getEditor(): ?string
    {
        return $this->editor;
    }

    public function setEditor(?string $editor): self
    {
        $this->editor = $editor;

        return $this;
    }

    public function getExsrange(): ?string
    {
        return $this->exsrange;
    }

    public function setExsrange(?string $exsrange): self
    {
        $this->exsrange = $exsrange;

        return $this;
    }

    public function getStartdate(): ?string
    {
        return $this->startdate;
    }

    public function setStartdate(?string $startdate): self
    {
        $this->startdate = $startdate;

        return $this;
    }

    public function getEnddate(): ?string
    {
        return $this->enddate;
    }

    public function setEnddate(?string $enddate): self
    {
        $this->enddate = $enddate;

        return $this;
    }

    public function getSource(): ?string
    {
        return $this->source;
    }

    public function setSource(?string $source): self
    {
        $this->source = $source;

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

    public function getLasteditedby(): ?string
    {
        return $this->lasteditedby;
    }

    public function setLasteditedby(?string $lasteditedby): self
    {
        $this->lasteditedby = $lasteditedby;

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
