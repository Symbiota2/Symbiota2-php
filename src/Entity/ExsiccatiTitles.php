<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Annotation\Groups;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * ExsiccatiTitles
 *
 * @ORM\Table(name="omexsiccatititles", indexes={@ORM\Index(name="index_exsiccatiTitle", columns={"title"})})
 * @ORM\Entity(repositoryClass="App\Repository\ExsiccatiTitlesRepository")
 * @ApiResource(
 *     itemOperations={"get"},
 *     collectionOperations={"get"}
 * )
 */
class ExsiccatiTitles implements InitialTimestampInterface
{
    /**
     * @var int
     *
     * @ORM\Column(name="ometid", type="integer", options={"unsigned"=true})
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="title", type="string", length=150)
     * @Assert\NotBlank()
     * @Assert\Length(max=150)
     */
    private $title;

    /**
     * @var string|null
     *
     * @ORM\Column(name="abbreviation", type="string", length=100, nullable=true)
     * @Assert\Length(max=100)
     */
    private $abbreviation;

    /**
     * @var string|null
     *
     * @ORM\Column(name="editor", type="string", length=150, nullable=true)
     * @Assert\Length(max=150)
     */
    private $editor;

    /**
     * @var string|null
     *
     * @ORM\Column(name="exsrange", type="string", length=45, nullable=true)
     * @Assert\Length(max=45)
     */
    private $exsiccatiRange;

    /**
     * @var string|null
     *
     * @ORM\Column(name="startdate", type="string", length=45, nullable=true)
     * @Assert\Length(max=45)
     */
    private $startDate;

    /**
     * @var string|null
     *
     * @ORM\Column(name="enddate", type="string", length=45, nullable=true)
     * @Assert\Length(max=45)
     */
    private $endDate;

    /**
     * @var string|null
     *
     * @ORM\Column(name="source", type="string", length=250, nullable=true)
     * @Assert\Length(max=250)
     */
    private $source;

    /**
     * @var string|null
     *
     * @ORM\Column(name="notes", type="string", length=2000, nullable=true)
     * @Assert\Length(max=2000)
     */
    private $notes;

    /**
     * @var string|null
     *
     * @ORM\Column(name="lasteditedby", type="string", length=45, nullable=true)
     * @Assert\Length(max=45)
     */
    private $lastEditedBy;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="initialtimestamp", type="datetime")
     * @Assert\NotBlank()
     */
    private $initialTimestamp;

    public function getId(): ?int
    {
        return $this->id;
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

    public function getExsiccatiRange(): ?string
    {
        return $this->exsiccatiRange;
    }

    public function setExsiccatiRange(?string $exsiccatiRange): self
    {
        $this->exsiccatiRange = $exsiccatiRange;

        return $this;
    }

    public function getStartDate(): ?string
    {
        return $this->startDate;
    }

    public function setStartDate(?string $startDate): self
    {
        $this->startDate = $startDate;

        return $this;
    }

    public function getEndDate(): ?string
    {
        return $this->endDate;
    }

    public function setEndDate(?string $endDate): self
    {
        $this->endDate = $endDate;

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

    public function getLastEditedBy(): ?string
    {
        return $this->lastEditedBy;
    }

    public function setLastEditedBy(?string $lastEditedBy): self
    {
        $this->lastEditedBy = $lastEditedBy;

        return $this;
    }

    public function getInitialTimestamp(): ?\DateTimeInterface
    {
        return $this->initialTimestamp;
    }

    public function setInitialTimestamp(\DateTimeInterface $initialTimestamp): InitialTimestampInterface
    {
        $this->initialTimestamp = $initialTimestamp;

        return $this;
    }


}
