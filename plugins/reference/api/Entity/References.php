<?php

namespace Reference\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Security\Core\User\UserInterface;
use Symfony\Component\Serializer\Annotation\Groups;
use Symfony\Component\Validator\Constraints as Assert;
use App\Entity\ModifiedUserIdInterface;
use App\Entity\InitialTimestampInterface;
use App\Entity\ModifiedTimestampInterface;
use App\Entity\Users;
use Checklist\Entity\Checklists;
use App\Entity\Collections;
use App\Entity\Occurrences;
use App\Entity\Taxa;

/**
 * References
 *
 * @ORM\Table(name="referenceobject", indexes={@ORM\Index(name="FK_refobj_typeid_idx", columns={"ReferenceTypeId"}), @ORM\Index(name="FK_refobj_parentrefid_idx", columns={"parentRefId"}), @ORM\Index(name="INDEX_refobj_title", columns={"title"})})
 * @ORM\Entity(repositoryClass="App\Repository\ReferencesRepository")
 * @ApiResource(
 *     itemOperations={"get"},
 *     collectionOperations={"get"}
 * )
 */
class References implements ModifiedUserIdInterface, InitialTimestampInterface, ModifiedTimestampInterface
{
    /**
     * @var int
     *
     * @ORM\Column(name="refid", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var \Reference\Entity\References
     *
     * @ORM\ManyToOne(targetEntity="\Reference\Entity\References")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="parentRefId", referencedColumnName="refid")
     * })
     */
    private $parentReferenceId;

    /**
     * @var \Reference\Entity\LookupReferenceTypes
     *
     * @ORM\ManyToOne(targetEntity="\Reference\Entity\LookupReferenceTypes")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="ReferenceTypeId", referencedColumnName="ReferenceTypeId", nullable=false)
     * })
     */
    private $referenceTypeId;

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
     * @ORM\Column(name="secondarytitle", type="string", length=250, nullable=true)
     * @Assert\Length(max=250)
     */
    private $secondaryTitle;

    /**
     * @var string|null
     *
     * @ORM\Column(name="shorttitle", type="string", length=250, nullable=true)
     * @Assert\Length(max=250)
     */
    private $shortTitle;

    /**
     * @var string|null
     *
     * @ORM\Column(name="tertiarytitle", type="string", length=250, nullable=true)
     * @Assert\Length(max=250)
     */
    private $tertiaryTitle;

    /**
     * @var string|null
     *
     * @ORM\Column(name="alternativetitle", type="string", length=250, nullable=true)
     * @Assert\Length(max=250)
     */
    private $alternativeTitle;

    /**
     * @var string|null
     *
     * @ORM\Column(name="typework", type="string", length=150, nullable=true)
     * @Assert\Length(max=150)
     */
    private $typeWork;

    /**
     * @var string|null
     *
     * @ORM\Column(name="figures", type="string", length=150, nullable=true)
     * @Assert\Length(max=150)
     */
    private $figures;

    /**
     * @var string|null
     *
     * @ORM\Column(name="pubdate", type="string", length=45, nullable=true)
     * @Assert\Length(max=45)
     */
    private $datePublished;

    /**
     * @var string|null
     *
     * @ORM\Column(name="edition", type="string", length=45, nullable=true)
     * @Assert\Length(max=45)
     */
    private $edition;

    /**
     * @var string|null
     *
     * @ORM\Column(name="volume", type="string", length=45, nullable=true)
     * @Assert\Length(max=45)
     */
    private $volume;

    /**
     * @var string|null
     *
     * @ORM\Column(name="numbervolumes", type="string", length=45, nullable=true)
     * @Assert\Length(max=45)
     */
    private $numberOfVolumes;

    /**
     * @var string|null
     *
     * @ORM\Column(name="number", type="string", length=45, nullable=true)
     * @Assert\Length(max=45)
     */
    private $number;

    /**
     * @var string|null
     *
     * @ORM\Column(name="pages", type="string", length=45, nullable=true)
     * @Assert\Length(max=45)
     */
    private $pages;

    /**
     * @var string|null
     *
     * @ORM\Column(name="section", type="string", length=45, nullable=true)
     * @Assert\Length(max=45)
     */
    private $section;

    /**
     * @var string|null
     *
     * @ORM\Column(name="placeofpublication", type="string", length=45, nullable=true)
     * @Assert\Length(max=45)
     */
    private $placeOfPublication;

    /**
     * @var string|null
     *
     * @ORM\Column(name="publisher", type="string", length=150, nullable=true)
     * @Assert\Length(max=150)
     */
    private $publisher;

    /**
     * @var string|null
     *
     * @ORM\Column(name="isbn_issn", type="string", length=45, nullable=true)
     * @Assert\Length(max=45)
     */
    private $isbnIssn;

    /**
     * @var string|null
     *
     * @ORM\Column(name="url", type="string", length=150, nullable=true)
     * @Assert\Length(max=150)
     */
    private $url;

    /**
     * @var string|null
     *
     * @ORM\Column(name="guid", type="string", length=45, nullable=true)
     * @Assert\Length(max=45)
     */
    private $guid;

    /**
     * @var string|null
     *
     * @ORM\Column(name="ispublished", type="string", length=45, nullable=true)
     * @Assert\Length(max=45)
     */
    private $isPublished;

    /**
     * @var string|null
     *
     * @ORM\Column(name="notes", type="string", length=45, nullable=true)
     * @Assert\Length(max=45)
     */
    private $notes;

    /**
     * @var string|null
     *
     * @ORM\Column(name="cheatauthors", type="string", length=250, nullable=true)
     * @Assert\Length(max=250)
     */
    private $cheatAuthors;

    /**
     * @var string|null
     *
     * @ORM\Column(name="cheatcitation", type="string", length=250, nullable=true)
     * @Assert\Length(max=250)
     */
    private $cheatCitation;

    /**
     * @var \App\Entity\Users
     *
     * @ORM\ManyToOne(targetEntity="\App\Entity\Users")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="modifieduid", referencedColumnName="uid")
     * })
     */
    private $modifiedUserId;

    /**
     * @var \DateTime|null
     *
     * @ORM\Column(name="modifiedtimestamp", type="datetime", nullable=true)
     * @Assert\DateTime
     */
    private $modifiedTimestamp;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="initialtimestamp", type="datetime")
     * @Assert\DateTime
     */
    private $initialTimestamp;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="\Reference\Entity\ReferenceAuthors", inversedBy="referenceId")
     * @ORM\JoinTable(name="referenceauthorlink",
     *   joinColumns={
     *     @ORM\JoinColumn(name="refid", referencedColumnName="refid")
     *   },
     *   inverseJoinColumns={
     *     @ORM\JoinColumn(name="refauthid", referencedColumnName="refauthorid")
     *   }
     * )
     */
    private $referenceAuthorId;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="\Checklist\Entity\Checklists")
     * @ORM\JoinTable(name="referencechecklistlink",
     *   joinColumns={
     *     @ORM\JoinColumn(name="refid", referencedColumnName="refid")
     *   },
     *   inverseJoinColumns={
     *     @ORM\JoinColumn(name="clid", referencedColumnName="CLID")
     *   }
     * )
     */
    private $checklistId;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="\App\Entity\Collections")
     * @ORM\JoinTable(name="referencecollectionlink",
     *   joinColumns={
     *     @ORM\JoinColumn(name="refid", referencedColumnName="refid")
     *   },
     *   inverseJoinColumns={
     *     @ORM\JoinColumn(name="collid", referencedColumnName="CollID")
     *   }
     * )
     */
    private $collectionId;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="\App\Entity\Occurrences")
     * @ORM\JoinTable(name="referenceoccurlink",
     *   joinColumns={
     *     @ORM\JoinColumn(name="refid", referencedColumnName="refid")
     *   },
     *   inverseJoinColumns={
     *     @ORM\JoinColumn(name="occid", referencedColumnName="occid")
     *   }
     * )
     */
    private $occurrenceId;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="\App\Entity\Taxa")
     * @ORM\JoinTable(name="referencetaxalink",
     *   joinColumns={
     *     @ORM\JoinColumn(name="refid", referencedColumnName="refid")
     *   },
     *   inverseJoinColumns={
     *     @ORM\JoinColumn(name="tid", referencedColumnName="TID")
     *   }
     * )
     */
    private $taxaId;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->referenceAuthorId = new \Doctrine\Common\Collections\ArrayCollection();
        $this->checklistId = new \Doctrine\Common\Collections\ArrayCollection();
        $this->collectionId = new \Doctrine\Common\Collections\ArrayCollection();
        $this->occurrenceId = new \Doctrine\Common\Collections\ArrayCollection();
        $this->taxaId = new \Doctrine\Common\Collections\ArrayCollection();
    }

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

    public function getSecondaryTitle(): ?string
    {
        return $this->secondaryTitle;
    }

    public function setSecondaryTitle(?string $secondaryTitle): self
    {
        $this->secondaryTitle = $secondaryTitle;

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

    public function getTertiaryTitle(): ?string
    {
        return $this->tertiaryTitle;
    }

    public function setTertiaryTitle(?string $tertiaryTitle): self
    {
        $this->tertiaryTitle = $tertiaryTitle;

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

    public function getTypeWork(): ?string
    {
        return $this->typeWork;
    }

    public function setTypeWork(?string $typeWork): self
    {
        $this->typeWork = $typeWork;

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

    public function getDatePublished(): ?string
    {
        return $this->datePublished;
    }

    public function setDatePublished(?string $datePublished): self
    {
        $this->datePublished = $datePublished;

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

    public function getPlaceOfPublication(): ?string
    {
        return $this->placeOfPublication;
    }

    public function setPlaceOfPublication(?string $placeOfPublication): self
    {
        $this->placeOfPublication = $placeOfPublication;

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

    public function getIsbnIssn(): ?string
    {
        return $this->isbnIssn;
    }

    public function setIsbnIssn(?string $isbnIssn): self
    {
        $this->isbnIssn = $isbnIssn;

        return $this;
    }

    public function getUrl(): ?string
    {
        return $this->url;
    }

    public function setUrl(?string $url): self
    {
        $this->url = $url;

        return $this;
    }

    public function getGuid(): ?string
    {
        return $this->guid;
    }

    public function setGuid(?string $guid): self
    {
        $this->guid = $guid;

        return $this;
    }

    public function getIsPublished(): ?string
    {
        return $this->isPublished;
    }

    public function setIsPublished(?string $isPublished): self
    {
        $this->isPublished = $isPublished;

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

    public function getCheatAuthors(): ?string
    {
        return $this->cheatAuthors;
    }

    public function setCheatAuthors(?string $cheatAuthors): self
    {
        $this->cheatAuthors = $cheatAuthors;

        return $this;
    }

    public function getCheatCitation(): ?string
    {
        return $this->cheatCitation;
    }

    public function setCheatCitation(?string $cheatCitation): self
    {
        $this->cheatCitation = $cheatCitation;

        return $this;
    }

    public function getModifiedUserId(): ?Users
    {
        return $this->modifiedUserId;
    }

    /**
     * @param UserInterface $modifiedUserId
     * @return ModifiedUserIdInterface
     */
    public function setModifiedUserId(UserInterface $modifiedUserId): ModifiedUserIdInterface
    {
        $this->modifiedUserId = $modifiedUserId;

        return $this;
    }

    public function getModifiedTimestamp(): ?\DateTimeInterface
    {
        return $this->modifiedTimestamp;
    }

    public function setModifiedTimestamp(?\DateTimeInterface $modifiedTimestamp): ModifiedTimestampInterface
    {
        $this->modifiedTimestamp = $modifiedTimestamp;

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

    public function getReferenceTypeId(): ?LookupReferenceTypes
    {
        return $this->referenceTypeId;
    }

    public function setReferenceTypeId(?LookupReferenceTypes $referenceTypeId): self
    {
        $this->referenceTypeId = $referenceTypeId;

        return $this;
    }

    public function getParentReferenceId(): ?self
    {
        return $this->parentReferenceId;
    }

    public function setParentReferenceId(?self $parentReferenceId): self
    {
        $this->parentReferenceId = $parentReferenceId;

        return $this;
    }

    /**
     * @return Collection|ReferenceAuthors[]
     */
    public function getReferenceAuthorId(): Collection
    {
        return $this->referenceAuthorId;
    }

    public function addReferenceAuthorId(ReferenceAuthors $referenceAuthorId): self
    {
        if (!$this->referenceAuthorId->contains($referenceAuthorId)) {
            $this->referenceAuthorId[] = $referenceAuthorId;
        }

        return $this;
    }

    public function removeReferenceAuthorId(ReferenceAuthors $referenceAuthorId): self
    {
        if ($this->referenceAuthorId->contains($referenceAuthorId)) {
            $this->referenceAuthorId->removeElement($referenceAuthorId);
        }

        return $this;
    }

    /**
     * @return Collection|Checklists[]
     */
    public function getChecklistId(): Collection
    {
        return $this->checklistId;
    }

    public function addChecklistId(Checklists $checklistId): self
    {
        if (!$this->checklistId->contains($checklistId)) {
            $this->checklistId[] = $checklistId;
        }

        return $this;
    }

    public function removeChecklistId(Checklists $checklistId): self
    {
        if ($this->checklistId->contains($checklistId)) {
            $this->checklistId->removeElement($checklistId);
        }

        return $this;
    }

    /**
     * @return Collection|Collections[]
     */
    public function getCollectionId(): Collection
    {
        return $this->collectionId;
    }

    public function addCollectionId(Collections $collectionId): self
    {
        if (!$this->collectionId->contains($collectionId)) {
            $this->collectionId[] = $collectionId;
        }

        return $this;
    }

    public function removeCollectionId(Collections $collectionId): self
    {
        if ($this->collectionId->contains($collectionId)) {
            $this->collectionId->removeElement($collectionId);
        }

        return $this;
    }

    /**
     * @return Collection|Occurrences[]
     */
    public function getOccurrenceId(): Collection
    {
        return $this->occurrenceId;
    }

    public function addOccurrenceId(Occurrences $occurrenceId): self
    {
        if (!$this->occurrenceId->contains($occurrenceId)) {
            $this->occurrenceId[] = $occurrenceId;
        }

        return $this;
    }

    public function removeOccurrenceId(Occurrences $occurrenceId): self
    {
        if ($this->occurrenceId->contains($occurrenceId)) {
            $this->occurrenceId->removeElement($occurrenceId);
        }

        return $this;
    }

    /**
     * @return Collection|Taxa[]
     */
    public function getTaxaId(): Collection
    {
        return $this->taxaId;
    }

    public function addTaxaId(Taxa $taxaId): self
    {
        if (!$this->taxaId->contains($taxaId)) {
            $this->taxaId[] = $taxaId;
        }

        return $this;
    }

    public function removeTaxaId(Taxa $taxaId): self
    {
        if ($this->taxaId->contains($taxaId)) {
            $this->taxaId->removeElement($taxaId);
        }

        return $this;
    }

}
