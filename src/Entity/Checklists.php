<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use ApiPlatform\Core\Annotation\ApiProperty;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Security\Core\User\UserInterface;
use Symfony\Component\Serializer\Annotation\Groups;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Checklists
 *
 * @ORM\Table(name="fmchecklists", indexes={@ORM\Index(name="FK_checklists_uid", columns={"createduid"}), @ORM\Index(name="name", columns={"Name", "Type"})})
 * @ORM\Entity(repositoryClass="App\Repository\ChecklistsRepository")
 * @ApiResource(
 *     itemOperations={
 *          "get"={
 *             "normalization_context"={
 *                 "groups"={"get-checklist-info"}
 *             }
 *          },
 *          "put"={
 *              "access_control"="is_granted('IS_AUTHENTICATED_FULLY')",
 *              "denormalization_context"={
 *                  "groups"={"put"}
 *              }
 *          }
 *      },
 *      collectionOperations={
 *          "get",
 *          "post"={
 *              "access_control"="is_granted('IS_AUTHENTICATED_FULLY')",
 *              "denormalization_context"={
 *                  "groups"={"post"}
 *              }
 *          }
 *      }
 * )
 */
class Checklists implements CreatedUserIdInterface, InitialTimestampInterface, ModifiedTimestampInterface
{
    /**
     * @var int
     *
     * @ORM\Column(name="CLID", type="integer", options={"unsigned"=true})
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     * @Groups({"get", "get-checklist-info"})
     * @ApiProperty(iri="http://schema.org/identifier")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="Name", type="string", length=100)
     * @Assert\NotBlank()
     * @Assert\Length(max=100)
     * @Groups({"get", "get-checklist-info", "post", "put"})
     * @ApiProperty(iri="http://schema.org/name")
     */
    private $name;

    /**
     * @var string|null
     *
     * @ORM\Column(name="Title", type="string", length=150, nullable=true)
     * @Assert\Length(max=150)
     * @Groups({"get", "get-checklist-info", "post", "put"})
     * @ApiProperty(iri="http://purl.org/dc/terms/title")
     */
    private $title;

    /**
     * @var string|null
     *
     * @ORM\Column(name="Locality", type="string", length=500, nullable=true)
     * @Assert\Length(max=500)
     * @Groups({"get", "get-checklist-info", "post", "put"})
     * @ApiProperty(iri="http://dbpedia.org/ontology/Locality")
     */
    private $locality;

    /**
     * @var string|null
     *
     * @ORM\Column(name="Publication", type="string", length=500, nullable=true)
     * @Assert\Length(max=500)
     * @Groups({"get", "get-checklist-info", "post", "put"})
     * @ApiProperty(iri="http://schema.org/publication")
     */
    private $publication;

    /**
     * @var string|null
     *
     * @ORM\Column(name="Abstract", type="text", length=65535, nullable=true)
     * @Assert\Length(max=65535)
     * @Groups({"get", "get-checklist-info", "post", "put"})
     * @ApiProperty(iri="http://purl.org/dc/terms/description")
     */
    private $abstract;

    /**
     * @var string|null
     *
     * @ORM\Column(name="Authors", type="string", length=250, nullable=true)
     * @Assert\Length(max=250)
     * @Groups({"get", "get-checklist-info", "post", "put"})
     * @ApiProperty(iri="http://www.aktors.org/ontology/portal#has-author")
     */
    private $authors;

    /**
     * @var string|null
     *
     * @ORM\Column(name="Type", type="string", length=50, nullable=true, options={"default"="static"})
     * @Assert\Length(max=50)
     * @Groups({"get", "get-checklist-info", "post", "put"})
     */
    private $type = 'static';

    /**
     * @var string|null
     *
     * @ORM\Column(name="politicalDivision", type="string", length=45, nullable=true)
     * @Assert\Length(max=45)
     * @Groups({"get", "get-checklist-info", "post", "put"})
     */
    private $politicalDivision;

    /**
     * @var string|null
     *
     * @ORM\Column(name="dynamicsql", type="string", length=500, nullable=true)
     * @Assert\Length(max=500)
     * @Groups({"get", "get-checklist-info", "post", "put"})
     */
    private $dynamicSql;

    /**
     * @var string|null
     *
     * @ORM\Column(name="Parent", type="string", length=50, nullable=true)
     * @Assert\Length(max=50)
     * @Groups({"get", "get-checklist-info", "post", "put"})
     */
    private $parent;

    /**
     * @var int|null
     *
     * @ORM\Column(name="parentclid", type="integer", nullable=true, options={"unsigned"=true})
     * @Assert\Type(type="integer")
     * @Groups({"get", "get-checklist-info", "post", "put"})
     */
    private $parentChecklistId;

    /**
     * @var string|null
     *
     * @ORM\Column(name="Notes", type="string", length=500, nullable=true)
     * @Assert\Length(max=500)
     * @Groups({"get", "get-checklist-info", "post", "put"})
     */
    private $notes;

    /**
     * @var float|null
     *
     * @ORM\Column(name="LatCentroid", type="float", precision=9, scale=6, nullable=true)
     * @Assert\Type(type="float")
     * @Groups({"get", "get-checklist-info", "post", "put"})
     */
    private $latitudeCentroid;

    /**
     * @var float|null
     *
     * @ORM\Column(name="LongCentroid", type="float", precision=9, scale=6, nullable=true)
     * @Assert\Type(type="float")
     * @Groups({"get", "get-checklist-info", "post", "put"})
     */
    private $longitudeCentroid;

    /**
     * @var int|null
     *
     * @ORM\Column(name="pointradiusmeters", type="integer", nullable=true, options={"unsigned"=true})
     * @Assert\Type(type="integer")
     * @Groups({"get", "get-checklist-info", "post", "put"})
     */
    private $pointRadiusInMeters;

    /**
     * @var string|null
     *
     * @ORM\Column(name="footprintWKT", type="text", length=65535, nullable=true)
     * @Assert\Length(max=65535)
     * @Groups({"get", "get-checklist-info", "post", "put"})
     */
    private $footprintWkt;

    /**
     * @var int|null
     *
     * @ORM\Column(name="percenteffort", type="integer", nullable=true)
     * @Assert\Type(type="integer")
     * @Groups({"get", "get-checklist-info", "post", "put"})
     */
    private $percentEffort;

    /**
     * @var string|null
     *
     * @ORM\Column(name="Access", type="string", length=45, nullable=true, options={"default"="private"})
     * @Assert\Length(max=45)
     * @Groups({"get", "get-checklist-info", "post", "put"})
     */
    private $access = 'private';

    /**
     * @var string|null
     *
     * @ORM\Column(name="defaultSettings", type="string", length=250, nullable=true)
     * @Assert\Length(max=250)
     * @Groups({"get", "get-checklist-info", "post", "put"})
     */
    private $defaultSettings;

    /**
     * @var string|null
     *
     * @ORM\Column(name="iconUrl", type="string", length=150, nullable=true)
     * @Assert\Length(max=150)
     * @Groups({"get", "get-checklist-info", "post", "put"})
     */
    private $iconUrl;

    /**
     * @var string|null
     *
     * @ORM\Column(name="headerUrl", type="string", length=150, nullable=true)
     * @Assert\Length(max=150)
     * @Groups({"get", "get-checklist-info", "post", "put"})
     */
    private $headerUrl;

    /**
     * @var \App\Entity\Users
     *
     * @ORM\ManyToOne(targetEntity="\App\Entity\Users")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="createduid", referencedColumnName="uid")
     * })
     * @Assert\Type(type="integer")
     * @Groups({"get", "get-checklist-info"})
     */
    private $createdUserId;

    /**
     * @var int
     *
     * @ORM\Column(name="SortSequence", type="integer", options={"default"=50,"unsigned"=true})
     * @Assert\Type(type="integer")
     * @Groups({"get", "get-checklist-info", "post", "put"})
     */
    private $sortSequence = 50;

    /**
     * @var int|null
     *
     * @ORM\Column(name="expiration", type="integer", nullable=true, options={"unsigned"=true})
     * @Assert\Type(type="integer")
     * @Groups({"get", "get-checklist-info", "post", "put"})
     */
    private $expiration;

    /**
     * @var \DateTime|null
     *
     * @ORM\Column(name="modifiedTimeStamp", type="datetime", nullable=true)
     * @Assert\DateTime
     * @Groups({"get", "get-checklist-info"})
     */
    private $modifiedTimestamp;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="InitialTimeStamp", type="datetime")
     * @Assert\DateTime
     * @Groups({"get", "get-checklist-info"})
     */
    private $initialTimestamp;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="\App\Entity\ChecklistProjects", mappedBy="checklistId")
     * @Groups({"get", "get-checklist-info"})
     */
    private $projectId;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="\App\Entity\References", mappedBy="checklistId")
     * @Groups({"get", "get-checklist-info"})
     */
    private $referenceId;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->projectId = new \Doctrine\Common\Collections\ArrayCollection();
        $this->referenceId = new \Doctrine\Common\Collections\ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): self
    {
        $this->name = $name;

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

    public function getLocality(): ?string
    {
        return $this->locality;
    }

    public function setLocality(?string $locality): self
    {
        $this->locality = $locality;

        return $this;
    }

    public function getPublication(): ?string
    {
        return $this->publication;
    }

    public function setPublication(?string $publication): self
    {
        $this->publication = $publication;

        return $this;
    }

    public function getAbstract(): ?string
    {
        return $this->abstract;
    }

    public function setAbstract(?string $abstract): self
    {
        $this->abstract = $abstract;

        return $this;
    }

    public function getAuthors(): ?string
    {
        return $this->authors;
    }

    public function setAuthors(?string $authors): self
    {
        $this->authors = $authors;

        return $this;
    }

    public function getType(): ?string
    {
        return $this->type;
    }

    public function setType(?string $type): self
    {
        $this->type = $type;

        return $this;
    }

    public function getPoliticalDivision(): ?string
    {
        return $this->politicalDivision;
    }

    public function setPoliticalDivision(?string $politicalDivision): self
    {
        $this->politicalDivision = $politicalDivision;

        return $this;
    }

    public function getDynamicSql(): ?string
    {
        return $this->dynamicSql;
    }

    public function setDynamicSql(?string $dynamicSql): self
    {
        $this->dynamicSql = $dynamicSql;

        return $this;
    }

    public function getParent(): ?string
    {
        return $this->parent;
    }

    public function setParent(?string $parent): self
    {
        $this->parent = $parent;

        return $this;
    }

    public function getParentChecklistId(): ?int
    {
        return $this->parentChecklistId;
    }

    public function setParentChecklistId(?int $parentChecklistId): self
    {
        $this->parentChecklistId = $parentChecklistId;

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

    public function getLatitudeCentroid(): ?float
    {
        return $this->latitudeCentroid;
    }

    public function setLatitudeCentroid(?float $latitudeCentroid): self
    {
        $this->latitudeCentroid = $latitudeCentroid;

        return $this;
    }

    public function getLongitudeCentroid(): ?float
    {
        return $this->longitudeCentroid;
    }

    public function setLongitudeCentroid(?float $longitudeCentroid): self
    {
        $this->longitudeCentroid = $longitudeCentroid;

        return $this;
    }

    public function getPointRadiusInMeters(): ?int
    {
        return $this->pointRadiusInMeters;
    }

    public function setPointRadiusInMeters(?int $pointRadiusInMeters): self
    {
        $this->pointRadiusInMeters = $pointRadiusInMeters;

        return $this;
    }

    public function getFootprintWkt(): ?string
    {
        return $this->footprintWkt;
    }

    public function setFootprintWkt(?string $footprintWkt): self
    {
        $this->footprintWkt = $footprintWkt;

        return $this;
    }

    public function getPercentEffort(): ?int
    {
        return $this->percentEffort;
    }

    public function setPercentEffort(?int $percentEffort): self
    {
        $this->percentEffort = $percentEffort;

        return $this;
    }

    public function getAccess(): ?string
    {
        return $this->access;
    }

    public function setAccess(?string $access): self
    {
        $this->access = $access;

        return $this;
    }

    public function getDefaultSettings(): ?string
    {
        return $this->defaultSettings;
    }

    public function setDefaultSettings(?string $defaultSettings): self
    {
        $this->defaultSettings = $defaultSettings;

        return $this;
    }

    public function getIconUrl(): ?string
    {
        return $this->iconUrl;
    }

    public function setIconUrl(?string $iconUrl): self
    {
        $this->iconUrl = $iconUrl;

        return $this;
    }

    public function getHeaderUrl(): ?string
    {
        return $this->headerUrl;
    }

    public function setHeaderUrl(?string $headerUrl): self
    {
        $this->headerUrl = $headerUrl;

        return $this;
    }

    public function getSortSequence(): ?int
    {
        return $this->sortSequence;
    }

    public function setSortSequence(int $sortSequence): self
    {
        $this->sortSequence = $sortSequence;

        return $this;
    }

    public function getExpiration(): ?int
    {
        return $this->expiration;
    }

    public function setExpiration(?int $expiration): self
    {
        $this->expiration = $expiration;

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

    /**
     * @return \App\Entity\Users|null
     */
    public function getCreatedUserId(): ?Users
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

    /**
     * @return Collection|ChecklistProjects[]
     */
    public function getProjectId(): Collection
    {
        return $this->projectId;
    }

    public function addProjectId(ChecklistProjects $projectId): self
    {
        if (!$this->projectId->contains($projectId)) {
            $this->projectId[] = $projectId;
            $projectId->addChecklistId($this);
        }

        return $this;
    }

    public function removeProjectId(ChecklistProjects $projectId): self
    {
        if ($this->projectId->contains($projectId)) {
            $this->projectId->removeElement($projectId);
            $projectId->removeChecklistId($this);
        }

        return $this;
    }

    /**
     * @return Collection|References[]
     */
    public function getReferenceId(): Collection
    {
        return $this->referenceId;
    }

    public function addReferenceId(References $referenceId): self
    {
        if (!$this->referenceId->contains($referenceId)) {
            $this->referenceId[] = $referenceId;
            $referenceId->addChecklistId($this);
        }

        return $this;
    }

    public function removeReferenceId(References $referenceId): self
    {
        if ($this->referenceId->contains($referenceId)) {
            $this->referenceId->removeElement($referenceId);
            $referenceId->removeChecklistId($this);
        }

        return $this;
    }

}
