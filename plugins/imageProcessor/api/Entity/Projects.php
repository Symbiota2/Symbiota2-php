<?php

namespace ImageProcessor\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Annotation\Groups;
use Symfony\Component\Validator\Constraints as Assert;
use Core\Entity\InitialTimestampInterface;
use Collection\Entity\Collections;

/**
 * Projects
 *
 * @ORM\Table(name="specprocessorprojects", indexes={@ORM\Index(name="FK_specprocessorprojects_coll", columns={"collid"})})
 * @ORM\Entity()
 * @ApiResource(
 *     routePrefix="/imageprocessor",
 *     itemOperations={"get"},
 *     collectionOperations={"get"}
 * )
 */
class Projects implements InitialTimestampInterface
{
    /**
     * @var int
     *
     * @ORM\Column(name="spprid", type="integer", options={"unsigned"=true})
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var \Collection\Entity\Collections
     *
     * @ORM\ManyToOne(targetEntity="Collection\Entity\Collections")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="collid", referencedColumnName="CollID", nullable=false)
     * })
     */
    private $collectionId;

    /**
     * @var string
     *
     * @ORM\Column(name="title", type="string", length=100)
     * @Assert\NotBlank()
     * @Assert\Length(max=100)
     */
    private $title;

    /**
     * @var string|null
     *
     * @ORM\Column(name="projecttype", type="string", length=45, nullable=true)
     * @Assert\Length(max=45)
     */
    private $projectType;

    /**
     * @var string|null
     *
     * @ORM\Column(name="specKeyPattern", type="string", length=155, nullable=true)
     * @Assert\Length(max=155)
     */
    private $patternMatchString;

    /**
     * @var string|null
     *
     * @ORM\Column(name="patternReplace", type="string", length=45, nullable=true)
     * @Assert\Length(max=45)
     */
    private $patternReplace;

    /**
     * @var string|null
     *
     * @ORM\Column(name="replaceStr", type="string", length=45, nullable=true)
     * @Assert\Length(max=45)
     */
    private $replaceString;

    /**
     * @var string|null
     *
     * @ORM\Column(name="speckeyretrieval", type="string", length=45, nullable=true)
     * @Assert\Length(max=45)
     */
    private $occurrenceKeyRetrieval;

    /**
     * @var int|null
     *
     * @ORM\Column(name="coordX1", type="integer", nullable=true, options={"unsigned"=true})
     * @Assert\Type(type="integer")
     */
    private $coordinateX1;

    /**
     * @var int|null
     *
     * @ORM\Column(name="coordX2", type="integer", nullable=true, options={"unsigned"=true})
     * @Assert\Type(type="integer")
     */
    private $coordinateX2;

    /**
     * @var int|null
     *
     * @ORM\Column(name="coordY1", type="integer", nullable=true, options={"unsigned"=true})
     * @Assert\Type(type="integer")
     */
    private $coordinateY1;

    /**
     * @var int|null
     *
     * @ORM\Column(name="coordY2", type="integer", nullable=true, options={"unsigned"=true})
     * @Assert\Type(type="integer")
     */
    private $coordinateY2;

    /**
     * @var string|null
     *
     * @ORM\Column(name="sourcePath", type="string", length=250, nullable=true)
     * @Assert\Length(max=250)
     */
    private $sourcePath;

    /**
     * @var string|null
     *
     * @ORM\Column(name="targetPath", type="string", length=250, nullable=true)
     * @Assert\Length(max=250)
     */
    private $targetPath;

    /**
     * @var string|null
     *
     * @ORM\Column(name="imgUrl", type="string", length=250, nullable=true)
     * @Assert\Length(max=250)
     */
    private $imageUrl;

    /**
     * @var int|null
     *
     * @ORM\Column(name="webPixWidth", type="integer", nullable=true, options={"default"="1200","unsigned"=true})
     * @Assert\Type(type="integer")
     */
    private $webPixelWidth = 1200;

    /**
     * @var int|null
     *
     * @ORM\Column(name="tnPixWidth", type="integer", nullable=true, options={"default"="130","unsigned"=true})
     * @Assert\Type(type="integer")
     */
    private $thumbnailPixelWidth = 130;

    /**
     * @var int|null
     *
     * @ORM\Column(name="lgPixWidth", type="integer", nullable=true, options={"default"="2400","unsigned"=true})
     * @Assert\Type(type="integer")
     */
    private $largePixelWidth = 2400;

    /**
     * @var int|null
     *
     * @ORM\Column(name="jpgcompression", type="integer", nullable=true, options={"default"="70"})
     * @Assert\Type(type="integer")
     */
    private $jpgCompression = 70;

    /**
     * @var int|null
     *
     * @ORM\Column(name="createTnImg", type="integer", nullable=true, options={"default"="1","unsigned"=true})
     * @Assert\Type(type="integer")
     */
    private $createThumbnailImage = 1;

    /**
     * @var int|null
     *
     * @ORM\Column(name="createLgImg", type="integer", nullable=true, options={"default"="1","unsigned"=true})
     * @Assert\Type(type="integer")
     */
    private $createLargeImage = 1;

    /**
     * @var string|null
     *
     * @ORM\Column(name="source", type="string", length=45, nullable=true)
     * @Assert\Length(max=45)
     */
    private $source;

    /**
     * @var \DateTime|null
     *
     * @ORM\Column(name="lastrundate", type="date", nullable=true)
     * @Assert\Date
     */
    private $lastRunDate;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="initialTimestamp", type="datetime")
     * @Assert\DateTime
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

    public function getProjectType(): ?string
    {
        return $this->projectType;
    }

    public function setProjectType(?string $projectType): self
    {
        $this->projectType = $projectType;

        return $this;
    }

    public function getPatternMatchString(): ?string
    {
        return $this->patternMatchString;
    }

    public function setPatternMatchString(?string $patternMatchString): self
    {
        $this->patternMatchString = $patternMatchString;

        return $this;
    }

    public function getPatternReplace(): ?string
    {
        return $this->patternReplace;
    }

    public function setPatternReplace(?string $patternReplace): self
    {
        $this->patternReplace = $patternReplace;

        return $this;
    }

    public function getReplaceString(): ?string
    {
        return $this->replaceString;
    }

    public function setReplaceString(?string $replaceString): self
    {
        $this->replaceString = $replaceString;

        return $this;
    }

    public function getOccurrenceKeyRetrieval(): ?string
    {
        return $this->occurrenceKeyRetrieval;
    }

    public function setOccurrenceKeyRetrieval(?string $occurrenceKeyRetrieval): self
    {
        $this->occurrenceKeyRetrieval = $occurrenceKeyRetrieval;

        return $this;
    }

    public function getCoordinateX1(): ?int
    {
        return $this->coordinateX1;
    }

    public function setCoordinateX1(?int $coordinateX1): self
    {
        $this->coordinateX1 = $coordinateX1;

        return $this;
    }

    public function getCoordinateX2(): ?int
    {
        return $this->coordinateX2;
    }

    public function setCoordinateX2(?int $coordinateX2): self
    {
        $this->coordinateX2 = $coordinateX2;

        return $this;
    }

    public function getCoordinateY1(): ?int
    {
        return $this->coordinateY1;
    }

    public function setCoordinateY1(?int $coordinateY1): self
    {
        $this->coordinateY1 = $coordinateY1;

        return $this;
    }

    public function getCoordinateY2(): ?int
    {
        return $this->coordinateY2;
    }

    public function setCoordinateY2(?int $coordinateY2): self
    {
        $this->coordinateY2 = $coordinateY2;

        return $this;
    }

    public function getSourcePath(): ?string
    {
        return $this->sourcePath;
    }

    public function setSourcePath(?string $sourcePath): self
    {
        $this->sourcePath = $sourcePath;

        return $this;
    }

    public function getTargetPath(): ?string
    {
        return $this->targetPath;
    }

    public function setTargetPath(?string $targetPath): self
    {
        $this->targetPath = $targetPath;

        return $this;
    }

    public function getImageUrl(): ?string
    {
        return $this->imageUrl;
    }

    public function setImageUrl(?string $imageUrl): self
    {
        $this->imageUrl = $imageUrl;

        return $this;
    }

    public function getWebPixelWidth(): ?int
    {
        return $this->webPixelWidth;
    }

    public function setWebPixelWidth(?int $webPixelWidth): self
    {
        $this->webPixelWidth = $webPixelWidth;

        return $this;
    }

    public function getThumbnailPixelWidth(): ?int
    {
        return $this->thumbnailPixelWidth;
    }

    public function setThumbnailPixelWidth(?int $thumbnailPixelWidth): self
    {
        $this->thumbnailPixelWidth = $thumbnailPixelWidth;

        return $this;
    }

    public function getLargePixelWidth(): ?int
    {
        return $this->largePixelWidth;
    }

    public function setLargePixelWidth(?int $largePixelWidth): self
    {
        $this->largePixelWidth = $largePixelWidth;

        return $this;
    }

    public function getJpgCompression(): ?int
    {
        return $this->jpgCompression;
    }

    public function setJpgCompression(?int $jpgCompression): self
    {
        $this->jpgCompression = $jpgCompression;

        return $this;
    }

    public function getCreateThumbnailImage(): ?int
    {
        return $this->createThumbnailImage;
    }

    public function setCreateThumbnailImage(?int $createThumbnailImage): self
    {
        $this->createThumbnailImage = $createThumbnailImage;

        return $this;
    }

    public function getCreateLargeImage(): ?int
    {
        return $this->createLargeImage;
    }

    public function setCreateLargeImage(?int $createLargeImage): self
    {
        $this->createLargeImage = $createLargeImage;

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

    public function getLastRunDate(): ?\DateTimeInterface
    {
        return $this->lastRunDate;
    }

    public function setLastRunDate(?\DateTimeInterface $lastRunDate): self
    {
        $this->lastRunDate = $lastRunDate;

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

    public function getCollectionId(): ?Collections
    {
        return $this->collectionId;
    }

    public function setCollectionId(?Collections $collectionId): self
    {
        $this->collectionId = $collectionId;

        return $this;
    }


}
