<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Annotation\Groups;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * UploadMappings
 *
 * @ORM\Table(name="uploadspecmap", uniqueConstraints={@ORM\UniqueConstraint(name="Index_unique_uploadspecmap", columns={"uspid", "symbspecfield", "sourcefield"})}, indexes={@ORM\Index(name="IDX_2B717C4B248B8A2F", columns={"uspid"})})
 * @ORM\Entity(repositoryClass="App\Repository\UploadMappingsRepository")
 * @ApiResource(
 *     itemOperations={"get"},
 *     collectionOperations={"get"}
 * )
 */
class UploadMappings implements InitialTimestampInterface
{
    /**
     * @var int
     *
     * @ORM\Column(name="usmid", type="integer", options={"unsigned"=true})
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var \App\Entity\UploadParameters
     *
     * @ORM\ManyToOne(targetEntity="\App\Entity\UploadParameters")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="uspid", referencedColumnName="uspid")
     * })
     * @Assert\NotBlank()
     * @Assert\Type(type="integer")
     */
    private $uploadParameterId;

    /**
     * @var string
     *
     * @ORM\Column(name="sourcefield", type="string", length=45)
     * @Assert\NotBlank()
     * @Assert\Length(max=45)
     */
    private $sourceField;

    /**
     * @var string
     *
     * @ORM\Column(name="symbdatatype", type="string", length=45, options={"default"="string","comment"="string, numeric, datetime"})
     * @Assert\NotBlank()
     * @Assert\Length(max=45)
     */
    private $mappedDataType = 'string';

    /**
     * @var string
     *
     * @ORM\Column(name="symbspecfield", type="string", length=45)
     * @Assert\NotBlank()
     * @Assert\Length(max=45)
     */
    private $mappedField;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="initialtimestamp", type="datetime")
     * @Assert\DateTime
     */
    private $initialTimestamp;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getSourceField(): ?string
    {
        return $this->sourceField;
    }

    public function setSourceField(string $sourceField): self
    {
        $this->sourceField = $sourceField;

        return $this;
    }

    public function getMappedDataType(): ?string
    {
        return $this->mappedDataType;
    }

    public function setMappedDataType(string $mappedDataType): self
    {
        $this->mappedDataType = $mappedDataType;

        return $this;
    }

    public function getMappedField(): ?string
    {
        return $this->mappedField;
    }

    public function setMappedField(string $mappedField): self
    {
        $this->mappedField = $mappedField;

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

    public function getUploadParameterId(): ?UploadParameters
    {
        return $this->uploadParameterId;
    }

    public function setUploadParameterId(?UploadParameters $uploadParameterId): self
    {
        $this->uploadParameterId = $uploadParameterId;

        return $this;
    }


}
