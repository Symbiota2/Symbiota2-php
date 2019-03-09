<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
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
class Checklists implements CreatedUserIdInterface, InitialTimeStampInterface, ModifiedTimeStampInterface
{
    /**
     * @var int
     *
     * @ORM\Column(name="CLID", type="integer", options={"unsigned"=true})
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     * @Groups({"get", "get-checklist-info"})
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="Name", type="string", length=100)
     * @Assert\NotBlank()
     * @Assert\Length(max=100)
     * @Groups({"get", "get-checklist-info", "post", "put"})
     */
    private $name;

    /**
     * @var string|null
     *
     * @ORM\Column(name="Title", type="string", length=150, nullable=true)
     * @Assert\Length(max=150)
     * @Groups({"get", "get-checklist-info", "post", "put"})
     */
    private $title;

    /**
     * @var string|null
     *
     * @ORM\Column(name="Locality", type="string", length=500, nullable=true)
     * @Assert\Length(max=500)
     * @Groups({"get", "get-checklist-info", "post", "put"})
     */
    private $locality;

    /**
     * @var string|null
     *
     * @ORM\Column(name="Publication", type="string", length=500, nullable=true)
     * @Assert\Length(max=500)
     * @Groups({"get", "get-checklist-info", "post", "put"})
     */
    private $publication;

    /**
     * @var string|null
     *
     * @ORM\Column(name="Abstract", type="text", length=65535, nullable=true)
     * @Assert\Length(max=65535)
     * @Groups({"get", "get-checklist-info", "post", "put"})
     */
    private $abstract;

    /**
     * @var string|null
     *
     * @ORM\Column(name="Authors", type="string", length=250, nullable=true)
     * @Assert\Length(max=250)
     * @Groups({"get", "get-checklist-info", "post", "put"})
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
    private $politicaldivision;

    /**
     * @var string|null
     *
     * @ORM\Column(name="dynamicsql", type="string", length=500, nullable=true)
     * @Assert\Length(max=500)
     * @Groups({"get", "get-checklist-info", "post", "put"})
     */
    private $dynamicsql;

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
     * @Assert\Type(
     *      type="integer"
     * )
     * @Groups({"get", "get-checklist-info", "post", "put"})
     */
    private $parentchecklistid;

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
     * @Assert\Type(
     *      type="float"
     * )
     * @Groups({"get", "get-checklist-info", "post", "put"})
     */
    private $latitudecentroid;

    /**
     * @var float|null
     *
     * @ORM\Column(name="LongCentroid", type="float", precision=9, scale=6, nullable=true)
     * @Assert\Type(
     *      type="float"
     * )
     * @Groups({"get", "get-checklist-info", "post", "put"})
     */
    private $longitudecentroid;

    /**
     * @var int|null
     *
     * @ORM\Column(name="pointradiusmeters", type="integer", nullable=true, options={"unsigned"=true})
     * @Assert\Type(
     *      type="integer"
     * )
     * @Groups({"get", "get-checklist-info", "post", "put"})
     */
    private $pointradiusinmeters;

    /**
     * @var string|null
     *
     * @ORM\Column(name="footprintWKT", type="text", length=65535, nullable=true)
     * @Assert\Length(max=65535)
     * @Groups({"get", "get-checklist-info", "post", "put"})
     */
    private $footprintwkt;

    /**
     * @var int|null
     *
     * @ORM\Column(name="percenteffort", type="integer", nullable=true)
     * @Assert\Type(
     *      type="integer"
     * )
     * @Groups({"get", "get-checklist-info", "post", "put"})
     */
    private $percenteffort;

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
    private $defaultsettings;

    /**
     * @var string|null
     *
     * @ORM\Column(name="iconUrl", type="string", length=150, nullable=true)
     * @Assert\Length(max=150)
     * @Groups({"get", "get-checklist-info", "post", "put"})
     */
    private $iconurl;

    /**
     * @var string|null
     *
     * @ORM\Column(name="headerUrl", type="string", length=150, nullable=true)
     * @Assert\Length(max=150)
     * @Groups({"get", "get-checklist-info", "post", "put"})
     */
    private $headerurl;

    /**
     * @var \App\Entity\Users
     *
     * @ORM\ManyToOne(targetEntity="Users")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="createduid", referencedColumnName="uid")
     * })
     * @Groups({"get", "get-checklist-info"})
     */
    private $createduserid;

    /**
     * @var int
     *
     * @ORM\Column(name="SortSequence", type="integer", options={"default"=50,"unsigned"=true})
     * @Assert\Type(
     *      type="integer"
     * )
     * @Groups({"get", "get-checklist-info", "post", "put"})
     */
    private $sortsequence = 50;

    /**
     * @var int|null
     *
     * @ORM\Column(name="expiration", type="integer", nullable=true, options={"unsigned"=true})
     * @Assert\Type(
     *      type="integer"
     * )
     * @Groups({"get", "get-checklist-info", "post", "put"})
     */
    private $expiration;

    /**
     * @var \DateTime|null
     *
     * @ORM\Column(name="modifiedTimeStamp", type="datetime", nullable=true)
     * @Groups({"get", "get-checklist-info"})
     */
    private $modifiedtimestamp;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="InitialTimeStamp", type="datetime")
     * @Groups({"get", "get-checklist-info"})
     */
    private $initialtimestamp;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="ChecklistProjects", mappedBy="clid")
     * @Groups({"get", "get-checklist-info"})
     */
    private $projectid;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="References", mappedBy="clid")
     * @Groups({"get", "get-checklist-info"})
     */
    private $referenceid;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->projectid = new \Doctrine\Common\Collections\ArrayCollection();
        $this->referenceid = new \Doctrine\Common\Collections\ArrayCollection();
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

    public function getPoliticaldivision(): ?string
    {
        return $this->politicaldivision;
    }

    public function setPoliticaldivision(?string $politicaldivision): self
    {
        $this->politicaldivision = $politicaldivision;

        return $this;
    }

    public function getDynamicsql(): ?string
    {
        return $this->dynamicsql;
    }

    public function setDynamicsql(?string $dynamicsql): self
    {
        $this->dynamicsql = $dynamicsql;

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

    public function getParentchecklistid(): ?int
    {
        return $this->parentchecklistid;
    }

    public function setParentchecklistid(?int $parentchecklistid): self
    {
        $this->parentchecklistid = $parentchecklistid;

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

    public function getLatitudecentroid(): ?float
    {
        return $this->latitudecentroid;
    }

    public function setLatitudecentroid(?float $latitudecentroid): self
    {
        $this->latitudecentroid = $latitudecentroid;

        return $this;
    }

    public function getLongitudecentroid(): ?float
    {
        return $this->longitudecentroid;
    }

    public function setLongitudecentroid(?float $longitudecentroid): self
    {
        $this->longitudecentroid = $longitudecentroid;

        return $this;
    }

    public function getPointradiusinmeters(): ?int
    {
        return $this->pointradiusinmeters;
    }

    public function setPointradiusinmeters(?int $pointradiusinmeters): self
    {
        $this->pointradiusinmeters = $pointradiusinmeters;

        return $this;
    }

    public function getFootprintwkt(): ?string
    {
        return $this->footprintwkt;
    }

    public function setFootprintwkt(?string $footprintwkt): self
    {
        $this->footprintwkt = $footprintwkt;

        return $this;
    }

    public function getPercenteffort(): ?int
    {
        return $this->percenteffort;
    }

    public function setPercenteffort(?int $percenteffort): self
    {
        $this->percenteffort = $percenteffort;

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

    public function getDefaultsettings(): ?string
    {
        return $this->defaultsettings;
    }

    public function setDefaultsettings(?string $defaultsettings): self
    {
        $this->defaultsettings = $defaultsettings;

        return $this;
    }

    public function getIconurl(): ?string
    {
        return $this->iconurl;
    }

    public function setIconurl(?string $iconurl): self
    {
        $this->iconurl = $iconurl;

        return $this;
    }

    public function getHeaderurl(): ?string
    {
        return $this->headerurl;
    }

    public function setHeaderurl(?string $headerurl): self
    {
        $this->headerurl = $headerurl;

        return $this;
    }

    public function getSortsequence(): ?int
    {
        return $this->sortsequence;
    }

    public function setSortsequence(int $sortsequence): self
    {
        $this->sortsequence = $sortsequence;

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

    public function getModifiedtimestamp(): ?\DateTimeInterface
    {
        return $this->modifiedtimestamp;
    }

    public function setModifiedtimestamp(?\DateTimeInterface $modifiedtimestamp): ModifiedTimeStampInterface
    {
        $this->modifiedtimestamp = $modifiedtimestamp;

        return $this;
    }

    public function getInitialtimestamp(): ?\DateTimeInterface
    {
        return $this->initialtimestamp;
    }

    public function setInitialtimestamp(\DateTimeInterface $initialtimestamp): InitialTimeStampInterface
    {
        $this->initialtimestamp = $initialtimestamp;

        return $this;
    }

    /**
     * @return \App\Entity\Users|null
     */
    public function getCreateduserid(): ?Users
    {
        return $this->createduserid;
    }

    /**
     * @param UserInterface $createduserid
     * @return CreatedUserIdInterface
     */
    public function setCreateduserid(UserInterface $createduserid): CreatedUserIdInterface
    {
        $this->createduserid = $createduserid;

        return $this;
    }

    /**
     * @return Collection|ChecklistProjects[]
     */
    public function getProjectid(): Collection
    {
        return $this->projectid;
    }

    public function addProjectid(ChecklistProjects $projectid): self
    {
        if (!$this->projectid->contains($projectid)) {
            $this->projectid[] = $projectid;
            $projectid->addClid($this);
        }

        return $this;
    }

    public function removeProjectid(ChecklistProjects $projectid): self
    {
        if ($this->projectid->contains($projectid)) {
            $this->projectid->removeElement($projectid);
            $projectid->removeClid($this);
        }

        return $this;
    }

    /**
     * @return Collection|References[]
     */
    public function getReferenceid(): Collection
    {
        return $this->referenceid;
    }

    public function addReferenceid(References $referenceid): self
    {
        if (!$this->referenceid->contains($referenceid)) {
            $this->referenceid[] = $referenceid;
            $referenceid->addClid($this);
        }

        return $this;
    }

    public function removeReferenceid(References $referenceid): self
    {
        if ($this->referenceid->contains($referenceid)) {
            $this->referenceid->removeElement($referenceid);
            $referenceid->removeClid($this);
        }

        return $this;
    }

}
