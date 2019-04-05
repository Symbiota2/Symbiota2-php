<?php

namespace Checklist\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Annotation\Groups;
use Symfony\Component\Validator\Constraints as Assert;
use App\Entity\InitialTimestampInterface;

/**
 * ChecklistProjects
 *
 * @ORM\Table(name="fmprojects", indexes={@ORM\Index(name="FK_parentpid_proj", columns={"parentpid"})})
 * @ORM\Entity()
 * @ApiResource(
 *     routePrefix="/checklist",
 *     itemOperations={"get"},
 *     collectionOperations={"get"}
 * )
 */
class ChecklistProjects implements InitialTimestampInterface
{
    /**
     * @var int
     *
     * @ORM\Column(name="pid", type="integer", options={"unsigned"=true})
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="projname", type="string", length=60)
     * @Assert\NotBlank()
     * @Assert\Length(max=60)
     */
    private $projectName;

    /**
     * @var string|null
     *
     * @ORM\Column(name="displayname", type="string", length=150, nullable=true)
     * @Assert\Length(max=150)
     */
    private $displayName;

    /**
     * @var string|null
     *
     * @ORM\Column(name="managers", type="string", length=150, nullable=true)
     * @Assert\Length(max=150)
     */
    private $managers;

    /**
     * @var string|null
     *
     * @ORM\Column(name="briefdescription", type="string", length=300, nullable=true)
     * @Assert\Length(max=300)
     */
    private $briefDescription;

    /**
     * @var string|null
     *
     * @ORM\Column(name="fulldescription", type="string", length=2000, nullable=true)
     * @Assert\Length(max=2000)
     */
    private $fullDescription;

    /**
     * @var string|null
     *
     * @ORM\Column(name="notes", type="string", length=250, nullable=true)
     * @Assert\Length(max=250)
     */
    private $notes;

    /**
     * @var string|null
     *
     * @ORM\Column(name="iconUrl", type="string", length=150, nullable=true)
     * @Assert\Length(max=150)
     */
    private $iconUrl;

    /**
     * @var string|null
     *
     * @ORM\Column(name="headerUrl", type="string", length=150, nullable=true)
     * @Assert\Length(max=150)
     */
    private $headerUrl;

    /**
     * @var int
     *
     * @ORM\Column(name="occurrencesearch", type="integer", options={"unsigned"=true})
     * @Assert\NotBlank()
     * @Assert\Type(type="integer")
     */
    private $occurrenceSearch;

    /**
     * @var int
     *
     * @ORM\Column(name="ispublic", type="integer", options={"unsigned"=true})
     * @Assert\NotBlank()
     * @Assert\Type(type="integer")
     */
    private $isPublic;

    /**
     * @var string|null
     *
     * @ORM\Column(name="dynamicProperties", type="text", length=65535, nullable=true)
     * @Assert\Length(max=65535)
     */
    private $dynamicProperties;

    /**
     * @var \Checklist\Entity\ChecklistProjects
     *
     * @ORM\ManyToOne(targetEntity="\Checklist\Entity\ChecklistProjects")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="parentpid", referencedColumnName="pid")
     * })
     */
    private $parentProjectId;

    /**
     * @var int
     *
     * @ORM\Column(name="SortSequence", type="integer", options={"default"="50","unsigned"=true})
     * @Assert\NotBlank()
     * @Assert\Type(type="integer")
     */
    private $sortSequence = 50;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="InitialTimeStamp", type="datetime")
     * @Assert\DateTime
     */
    private $initialTimestamp;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="\Checklist\Entity\Checklists", inversedBy="projectId")
     * @ORM\JoinTable(name="fmchklstprojlink",
     *   joinColumns={
     *     @ORM\JoinColumn(name="pid", referencedColumnName="pid")
     *   },
     *   inverseJoinColumns={
     *     @ORM\JoinColumn(name="clid", referencedColumnName="CLID")
     *   }
     * )
     */
    private $checklistId;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->checklistId = new \Doctrine\Common\Collections\ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getProjectName(): ?string
    {
        return $this->projectName;
    }

    public function setProjectName(string $projectName): self
    {
        $this->projectName = $projectName;

        return $this;
    }

    public function getDisplayName(): ?string
    {
        return $this->displayName;
    }

    public function setDisplayName(?string $displayName): self
    {
        $this->displayName = $displayName;

        return $this;
    }

    public function getManagers(): ?string
    {
        return $this->managers;
    }

    public function setManagers(?string $managers): self
    {
        $this->managers = $managers;

        return $this;
    }

    public function getBriefDescription(): ?string
    {
        return $this->briefDescription;
    }

    public function setBriefDescription(?string $briefDescription): self
    {
        $this->briefDescription = $briefDescription;

        return $this;
    }

    public function getFullDescription(): ?string
    {
        return $this->fullDescription;
    }

    public function setFullDescription(?string $fullDescription): self
    {
        $this->fullDescription = $fullDescription;

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

    public function getOccurrenceSearch(): ?int
    {
        return $this->occurrenceSearch;
    }

    public function setOccurrenceSearch(int $occurrenceSearch): self
    {
        $this->occurrenceSearch = $occurrenceSearch;

        return $this;
    }

    public function getIsPublic(): ?int
    {
        return $this->isPublic;
    }

    public function setIsPublic(int $isPublic): self
    {
        $this->isPublic = $isPublic;

        return $this;
    }

    public function getDynamicProperties(): ?string
    {
        return $this->dynamicProperties;
    }

    public function setDynamicProperties(?string $dynamicProperties): self
    {
        $this->dynamicProperties = $dynamicProperties;

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

    public function getInitialTimestamp(): ?\DateTimeInterface
    {
        return $this->initialTimestamp;
    }

    public function setInitialTimestamp(\DateTimeInterface $initialTimestamp): InitialTimestampInterface
    {
        $this->initialTimestamp = $initialTimestamp;

        return $this;
    }

    public function getParentProjectId(): ?self
    {
        return $this->parentProjectId;
    }

    public function setParentProjectId(?self $parentProjectId): self
    {
        $this->parentProjectId = $parentProjectId;

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

}
