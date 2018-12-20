<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Referencetype
 *
 * @ORM\Table(name="referencetype", uniqueConstraints={@ORM\UniqueConstraint(name="ReferenceType_UNIQUE", columns={"ReferenceType"})})
 * @ORM\Entity(repositoryClass="App\Repository\ReferencetypeRepository")
 */
class Referencetype
{
    /**
     * @var int
     *
     * @ORM\Column(name="ReferenceTypeId", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $referencetypeid;

    /**
     * @var string
     *
     * @ORM\Column(name="ReferenceType", type="string", length=45, nullable=false)
     */
    private $referencetype;

    /**
     * @var int|null
     *
     * @ORM\Column(name="IsParent", type="integer", nullable=true, options={"default"="NULL"})
     */
    private $isparent = 'NULL';

    /**
     * @var string|null
     *
     * @ORM\Column(name="Title", type="string", length=45, nullable=true, options={"default"="NULL"})
     */
    private $title = 'NULL';

    /**
     * @var string|null
     *
     * @ORM\Column(name="SecondaryTitle", type="string", length=45, nullable=true, options={"default"="NULL"})
     */
    private $secondarytitle = 'NULL';

    /**
     * @var string|null
     *
     * @ORM\Column(name="PlacePublished", type="string", length=45, nullable=true, options={"default"="NULL"})
     */
    private $placepublished = 'NULL';

    /**
     * @var string|null
     *
     * @ORM\Column(name="Publisher", type="string", length=45, nullable=true, options={"default"="NULL"})
     */
    private $publisher = 'NULL';

    /**
     * @var string|null
     *
     * @ORM\Column(name="Volume", type="string", length=45, nullable=true, options={"default"="NULL"})
     */
    private $volume = 'NULL';

    /**
     * @var string|null
     *
     * @ORM\Column(name="NumberVolumes", type="string", length=45, nullable=true, options={"default"="NULL"})
     */
    private $numbervolumes = 'NULL';

    /**
     * @var string|null
     *
     * @ORM\Column(name="Number", type="string", length=45, nullable=true, options={"default"="NULL"})
     */
    private $number = 'NULL';

    /**
     * @var string|null
     *
     * @ORM\Column(name="Pages", type="string", length=45, nullable=true, options={"default"="NULL"})
     */
    private $pages = 'NULL';

    /**
     * @var string|null
     *
     * @ORM\Column(name="Section", type="string", length=45, nullable=true, options={"default"="NULL"})
     */
    private $section = 'NULL';

    /**
     * @var string|null
     *
     * @ORM\Column(name="TertiaryTitle", type="string", length=45, nullable=true, options={"default"="NULL"})
     */
    private $tertiarytitle = 'NULL';

    /**
     * @var string|null
     *
     * @ORM\Column(name="Edition", type="string", length=45, nullable=true, options={"default"="NULL"})
     */
    private $edition = 'NULL';

    /**
     * @var string|null
     *
     * @ORM\Column(name="Date", type="string", length=45, nullable=true, options={"default"="NULL"})
     */
    private $date = 'NULL';

    /**
     * @var string|null
     *
     * @ORM\Column(name="TypeWork", type="string", length=45, nullable=true, options={"default"="NULL"})
     */
    private $typework = 'NULL';

    /**
     * @var string|null
     *
     * @ORM\Column(name="ShortTitle", type="string", length=45, nullable=true, options={"default"="NULL"})
     */
    private $shorttitle = 'NULL';

    /**
     * @var string|null
     *
     * @ORM\Column(name="AlternativeTitle", type="string", length=45, nullable=true, options={"default"="NULL"})
     */
    private $alternativetitle = 'NULL';

    /**
     * @var string|null
     *
     * @ORM\Column(name="ISBN_ISSN", type="string", length=45, nullable=true, options={"default"="NULL"})
     */
    private $isbnIssn = 'NULL';

    /**
     * @var string|null
     *
     * @ORM\Column(name="Figures", type="string", length=45, nullable=true, options={"default"="NULL"})
     */
    private $figures = 'NULL';

    /**
     * @var int|null
     *
     * @ORM\Column(name="addedByUid", type="integer", nullable=true, options={"default"="NULL"})
     */
    private $addedbyuid = 'NULL';

    /**
     * @var \DateTime|null
     *
     * @ORM\Column(name="initialTimestamp", type="datetime", nullable=true, options={"default"="current_timestamp()"})
     */
    private $initialtimestamp = 'current_timestamp()';

    public function getReferencetypeid(): ?int
    {
        return $this->referencetypeid;
    }

    public function getReferencetype(): ?string
    {
        return $this->referencetype;
    }

    public function setReferencetype(string $referencetype): self
    {
        $this->referencetype = $referencetype;

        return $this;
    }

    public function getIsparent(): ?int
    {
        return $this->isparent;
    }

    public function setIsparent(?int $isparent): self
    {
        $this->isparent = $isparent;

        return $this;
    }

    public function getTitle(): ?string
    {
        return $this->title;
    }

    public function setTitle(?string $title): self
    {
        $this->title = $title;

        return $this;
    }

    public function getSecondarytitle(): ?string
    {
        return $this->secondarytitle;
    }

    public function setSecondarytitle(?string $secondarytitle): self
    {
        $this->secondarytitle = $secondarytitle;

        return $this;
    }

    public function getPlacepublished(): ?string
    {
        return $this->placepublished;
    }

    public function setPlacepublished(?string $placepublished): self
    {
        $this->placepublished = $placepublished;

        return $this;
    }

    public function getPublisher(): ?string
    {
        return $this->publisher;
    }

    public function setPublisher(?string $publisher): self
    {
        $this->publisher = $publisher;

        return $this;
    }

    public function getVolume(): ?string
    {
        return $this->volume;
    }

    public function setVolume(?string $volume): self
    {
        $this->volume = $volume;

        return $this;
    }

    public function getNumbervolumes(): ?string
    {
        return $this->numbervolumes;
    }

    public function setNumbervolumes(?string $numbervolumes): self
    {
        $this->numbervolumes = $numbervolumes;

        return $this;
    }

    public function getNumber(): ?string
    {
        return $this->number;
    }

    public function setNumber(?string $number): self
    {
        $this->number = $number;

        return $this;
    }

    public function getPages(): ?string
    {
        return $this->pages;
    }

    public function setPages(?string $pages): self
    {
        $this->pages = $pages;

        return $this;
    }

    public function getSection(): ?string
    {
        return $this->section;
    }

    public function setSection(?string $section): self
    {
        $this->section = $section;

        return $this;
    }

    public function getTertiarytitle(): ?string
    {
        return $this->tertiarytitle;
    }

    public function setTertiarytitle(?string $tertiarytitle): self
    {
        $this->tertiarytitle = $tertiarytitle;

        return $this;
    }

    public function getEdition(): ?string
    {
        return $this->edition;
    }

    public function setEdition(?string $edition): self
    {
        $this->edition = $edition;

        return $this;
    }

    public function getDate(): ?string
    {
        return $this->date;
    }

    public function setDate(?string $date): self
    {
        $this->date = $date;

        return $this;
    }

    public function getTypework(): ?string
    {
        return $this->typework;
    }

    public function setTypework(?string $typework): self
    {
        $this->typework = $typework;

        return $this;
    }

    public function getShorttitle(): ?string
    {
        return $this->shorttitle;
    }

    public function setShorttitle(?string $shorttitle): self
    {
        $this->shorttitle = $shorttitle;

        return $this;
    }

    public function getAlternativetitle(): ?string
    {
        return $this->alternativetitle;
    }

    public function setAlternativetitle(?string $alternativetitle): self
    {
        $this->alternativetitle = $alternativetitle;

        return $this;
    }

    public function getIsbnIssn(): ?string
    {
        return $this->isbnIssn;
    }

    public function setIsbnIssn(?string $isbnIssn): self
    {
        $this->isbnIssn = $isbnIssn;

        return $this;
    }

    public function getFigures(): ?string
    {
        return $this->figures;
    }

    public function setFigures(?string $figures): self
    {
        $this->figures = $figures;

        return $this;
    }

    public function getAddedbyuid(): ?int
    {
        return $this->addedbyuid;
    }

    public function setAddedbyuid(?int $addedbyuid): self
    {
        $this->addedbyuid = $addedbyuid;

        return $this;
    }

    public function getInitialtimestamp(): ?\DateTimeInterface
    {
        return $this->initialtimestamp;
    }

    public function setInitialtimestamp(?\DateTimeInterface $initialtimestamp): self
    {
        $this->initialtimestamp = $initialtimestamp;

        return $this;
    }


}
