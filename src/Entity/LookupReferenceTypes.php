<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Security\Core\User\UserInterface;
use Symfony\Component\Serializer\Annotation\Groups;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * LookupReferenceTypes
 *
 * @ORM\Table(name="referencetype", uniqueConstraints={@ORM\UniqueConstraint(name="ReferenceType_UNIQUE", columns={"ReferenceType"})})
 * @ORM\Entity(repositoryClass="App\Repository\LookupReferenceTypesRepository")
 * @ApiResource(
 *     itemOperations={"get"},
 *     collectionOperations={"get"}
 * )
 */
class LookupReferenceTypes implements CreatedUserIdInterface, InitialTimestampInterface
{
    /**
     * @var int
     *
     * @ORM\Column(name="ReferenceTypeId", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="ReferenceType", type="string", length=45)
     * @Assert\NotBlank()
     * @Assert\Length(max=45)
     */
    private $referenceType;

    /**
     * @var int|null
     *
     * @ORM\Column(name="IsParent", type="integer", nullable=true)
     * @Assert\Type(type="integer")
     */
    private $isParent;

    /**
     * @var string|null
     *
     * @ORM\Column(name="Title", type="string", length=45, nullable=true)
     * @Assert\Length(max=45)
     */
    private $title;

    /**
     * @var string|null
     *
     * @ORM\Column(name="SecondaryTitle", type="string", length=45, nullable=true)
     * @Assert\Length(max=45)
     */
    private $secondaryTitle;

    /**
     * @var string|null
     *
     * @ORM\Column(name="PlacePublished", type="string", length=45, nullable=true)
     * @Assert\Length(max=45)
     */
    private $placePublished;

    /**
     * @var string|null
     *
     * @ORM\Column(name="Publisher", type="string", length=45, nullable=true)
     * @Assert\Length(max=45)
     */
    private $publisher;

    /**
     * @var string|null
     *
     * @ORM\Column(name="Volume", type="string", length=45, nullable=true)
     * @Assert\Length(max=45)
     */
    private $volume;

    /**
     * @var string|null
     *
     * @ORM\Column(name="NumberVolumes", type="string", length=45, nullable=true)
     * @Assert\Length(max=45)
     */
    private $numberOfVolumes;

    /**
     * @var string|null
     *
     * @ORM\Column(name="Number", type="string", length=45, nullable=true)
     * @Assert\Length(max=45)
     */
    private $number;

    /**
     * @var string|null
     *
     * @ORM\Column(name="Pages", type="string", length=45, nullable=true)
     * @Assert\Length(max=45)
     */
    private $pages;

    /**
     * @var string|null
     *
     * @ORM\Column(name="Section", type="string", length=45, nullable=true)
     * @Assert\Length(max=45)
     */
    private $section;

    /**
     * @var string|null
     *
     * @ORM\Column(name="TertiaryTitle", type="string", length=45, nullable=true)
     * @Assert\Length(max=45)
     */
    private $tertiaryTitle;

    /**
     * @var string|null
     *
     * @ORM\Column(name="Edition", type="string", length=45, nullable=true)
     * @Assert\Length(max=45)
     */
    private $edition;

    /**
     * @var string|null
     *
     * @ORM\Column(name="Date", type="string", length=45, nullable=true)
     * @Assert\Length(max=45)
     */
    private $date;

    /**
     * @var string|null
     *
     * @ORM\Column(name="TypeWork", type="string", length=45, nullable=true)
     * @Assert\Length(max=45)
     */
    private $typeOfWork;

    /**
     * @var string|null
     *
     * @ORM\Column(name="ShortTitle", type="string", length=45, nullable=true)
     * @Assert\Length(max=45)
     */
    private $shortTitle;

    /**
     * @var string|null
     *
     * @ORM\Column(name="AlternativeTitle", type="string", length=45, nullable=true)
     * @Assert\Length(max=45)
     */
    private $alternativeTitle;

    /**
     * @var string|null
     *
     * @ORM\Column(name="ISBN_ISSN", type="string", length=45, nullable=true)
     * @Assert\Length(max=45)
     */
    private $isbnIssn;

    /**
     * @var string|null
     *
     * @ORM\Column(name="Figures", type="string", length=45, nullable=true)
     * @Assert\Length(max=45)
     */
    private $figures;

    /**
     * @var int|null
     *
     * @ORM\Column(name="createduid", type="integer", nullable=true)
     * @Assert\Type(type="integer")
     */
    private $createdUserId;

    /**
     * @var \DateTime|null
     *
     * @ORM\Column(name="initialTimestamp", type="datetime", nullable=true)
     * @Assert\DateTime
     */
    private $initialTimestamp;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getReferenceType(): ?string
    {
        return $this->referenceType;
    }

    public function setReferenceType(string $referenceType): self
    {
        $this->referenceType = $referenceType;

        return $this;
    }

    public function getIsParent(): ?int
    {
        return $this->isParent;
    }

    public function setIsParent(?int $isParent): self
    {
        $this->isParent = $isParent;

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

    public function getSecondaryTitle(): ?string
    {
        return $this->secondaryTitle;
    }

    public function setSecondaryTitle(?string $secondaryTitle): self
    {
        $this->secondaryTitle = $secondaryTitle;

        return $this;
    }

    public function getPlacePublished(): ?string
    {
        return $this->placePublished;
    }

    public function setPlacePublished(?string $placePublished): self
    {
        $this->placePublished = $placePublished;

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

    public function getNumberOfVolumes(): ?string
    {
        return $this->numberOfVolumes;
    }

    public function setNumberOfVolumes(?string $numberOfVolumes): self
    {
        $this->numberOfVolumes = $numberOfVolumes;

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

    public function getTertiaryTitle(): ?string
    {
        return $this->tertiaryTitle;
    }

    public function setTertiaryTitle(?string $tertiaryTitle): self
    {
        $this->tertiaryTitle = $tertiaryTitle;

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

    public function getTypeOfWork(): ?string
    {
        return $this->typeOfWork;
    }

    public function setTypeOfWork(?string $typeOfWork): self
    {
        $this->typeOfWork = $typeOfWork;

        return $this;
    }

    public function getShortTitle(): ?string
    {
        return $this->shortTitle;
    }

    public function setShortTitle(?string $shortTitle): self
    {
        $this->shortTitle = $shortTitle;

        return $this;
    }

    public function getAlternativeTitle(): ?string
    {
        return $this->alternativeTitle;
    }

    public function setAlternativeTitle(?string $alternativeTitle): self
    {
        $this->alternativeTitle = $alternativeTitle;

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

    /**
     * @return int|null
     */
    public function getCreatedUserId(): ?int
    {
        return $this->createdUserId;
    }

    /**
     * @param UserInterface $createdUserId
     * @return CreatedUserIdInterface
     */
    public function setCreatedUserId(UserInterface $createdUserId): CreatedUserIdInterface
    {
        $this->createdUserId = $createdUserId;

        return $this;
    }

    public function getInitialTimestamp(): ?\DateTimeInterface
    {
        return $this->initialTimestamp;
    }

    public function setInitialTimestamp(?\DateTimeInterface $initialTimestamp): InitialTimestampInterface
    {
        $this->initialTimestamp = $initialTimestamp;

        return $this;
    }


}
