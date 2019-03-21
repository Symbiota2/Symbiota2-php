<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Annotation\Groups;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * CollectionStats
 *
 * @ORM\Table(name="omcollectionstats")
 * @ORM\Entity(repositoryClass="App\Repository\CollectionStatsRepository")
 * @ApiResource(
 *     itemOperations={"get"},
 *     collectionOperations={"get"}
 * )
 */
class CollectionStats implements InitialTimestampInterface, ModifiedTimestampInterface
{
    /**
     * @var \App\Entity\Collections
     *
     * @ORM\Id
     * @ORM\OneToOne(targetEntity="\App\Entity\Collections")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="collid", referencedColumnName="CollID")
     * })
     */
    private $collectionId;

    /**
     * @var int
     *
     * @ORM\Column(name="recordcnt", type="integer", options={"unsigned"=true})
     * @Assert\NotBlank()
     * @Assert\Type(type="integer")
     */
    private $recordCount;

    /**
     * @var int|null
     *
     * @ORM\Column(name="georefcnt", type="integer", nullable=true, options={"unsigned"=true})
     * @Assert\Type(type="integer")
     */
    private $georeferencedCount;

    /**
     * @var int|null
     *
     * @ORM\Column(name="familycnt", type="integer", nullable=true, options={"unsigned"=true})
     * @Assert\Type(type="integer")
     */
    private $familyCount;

    /**
     * @var int|null
     *
     * @ORM\Column(name="genuscnt", type="integer", nullable=true, options={"unsigned"=true})
     * @Assert\Type(type="integer")
     */
    private $genusCount;

    /**
     * @var int|null
     *
     * @ORM\Column(name="speciescnt", type="integer", nullable=true, options={"unsigned"=true})
     * @Assert\Type(type="integer")
     */
    private $speciesCount;

    /**
     * @var \DateTime|null
     *
     * @ORM\Column(name="uploaddate", type="datetime", nullable=true)
     * @Assert\DateTime
     */
    private $uploadDate;

    /**
     * @var \DateTime|null
     *
     * @ORM\Column(name="modifiedTimeStamp", type="datetime", nullable=true)
     * @Assert\DateTime
     */
    private $modifiedTimestamp;

    /**
     * @var string|null
     *
     * @ORM\Column(name="uploadedby", type="string", length=45, nullable=true)
     * @Assert\Length(max=45)
     */
    private $uploadedBy;

    /**
     * @var string|null
     *
     * @ORM\Column(name="dynamicProperties", type="text", length=0, nullable=true)
     */
    private $dynamicProperties;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="initialtimestamp", type="datetime")
     * @Assert\DateTime
     */
    private $initialTimestamp;

    public function getRecordCount(): ?int
    {
        return $this->recordCount;
    }

    public function setRecordCount(int $recordCount): self
    {
        $this->recordCount = $recordCount;

        return $this;
    }

    public function getGeoreferencedCount(): ?int
    {
        return $this->georeferencedCount;
    }

    public function setGeoreferencedCount(?int $georeferencedCount): self
    {
        $this->georeferencedCount = $georeferencedCount;

        return $this;
    }

    public function getFamilyCount(): ?int
    {
        return $this->familyCount;
    }

    public function setFamilyCount(?int $familyCount): self
    {
        $this->familyCount = $familyCount;

        return $this;
    }

    public function getGenusCount(): ?int
    {
        return $this->genusCount;
    }

    public function setGenusCount(?int $genusCount): self
    {
        $this->genusCount = $genusCount;

        return $this;
    }

    public function getSpeciesCount(): ?int
    {
        return $this->speciesCount;
    }

    public function setSpeciesCount(?int $speciesCount): self
    {
        $this->speciesCount = $speciesCount;

        return $this;
    }

    public function getUploadDate(): ?\DateTimeInterface
    {
        return $this->uploadDate;
    }

    public function setUploadDate(?\DateTimeInterface $uploadDate): self
    {
        $this->uploadDate = $uploadDate;

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

    public function getUploadedBy(): ?string
    {
        return $this->uploadedBy;
    }

    public function setUploadedBy(?string $uploadedBy): self
    {
        $this->uploadedBy = $uploadedBy;

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
