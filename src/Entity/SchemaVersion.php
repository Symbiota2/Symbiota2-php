<?php

namespace Core\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Annotation\Groups;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * SchemaVersion
 *
 * @ORM\Table(name="schemaversion", uniqueConstraints={@ORM\UniqueConstraint(name="versionnumber_UNIQUE", columns={"versionnumber"})})
 * @ORM\Entity()
 * @ApiResource(
 *     itemOperations={"get"},
 *     collectionOperations={"get"}
 * )
 */
class SchemaVersion implements ModifiedTimestampInterface
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="versionnumber", type="string", length=20)
     * @Assert\NotBlank()
     * @Assert\Length(max=20)
     */
    private $versionNumber;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="modifiedtimestamp", type="datetime")
     * @Assert\DateTime
     */
    private $modifiedTimestamp;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getVersionNumber(): ?string
    {
        return $this->versionNumber;
    }

    public function setVersionNumber(string $versionNumber): self
    {
        $this->versionNumber = $versionNumber;

        return $this;
    }

    public function getModifiedTimestamp(): ?\DateTimeInterface
    {
        return $this->modifiedTimestamp;
    }

    public function setModifiedTimestamp(\DateTimeInterface $modifiedTimestamp): ModifiedTimestampInterface
    {
        $this->modifiedTimestamp = $modifiedTimestamp;

        return $this;
    }


}
