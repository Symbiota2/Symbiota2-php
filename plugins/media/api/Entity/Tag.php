<?php

namespace Media\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Annotation\Groups;
use Symfony\Component\Validator\Constraints as Assert;
use Core\Entity\InitialTimestampInterface;

/**
 * Tag
 *
 * @ORM\Table(name="imagetag", uniqueConstraints={@ORM\UniqueConstraint(name="imgid", columns={"imgid", "keyvalue"})}, indexes={@ORM\Index(name="keyvalue", columns={"keyvalue"}), @ORM\Index(name="FK_imagetag_imgid_idx", columns={"imgid"})})
 * @ORM\Entity()
 * @ApiResource(
 *     routePrefix="/media",
 *     itemOperations={"get"},
 *     collectionOperations={"get"}
 * )
 */
class Tag implements InitialTimestampInterface
{
    /**
     * @var int
     *
     * @ORM\Column(name="imagetagid", type="integer", options={"unsigned"=true})
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var \Media\Entity\Images
     *
     * @ORM\ManyToOne(targetEntity="Media\Entity\Images")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="imgid", referencedColumnName="imgid", nullable=false)
     * })
     */
    private $imageId;

    /**
     * @var \Media\Entity\TagKey
     *
     * @ORM\ManyToOne(targetEntity="Media\Entity\TagKey")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="keyvalue", referencedColumnName="tagkey")
     * })
     * @Assert\NotBlank()
     * @Assert\Length(max=30)
     */
    private $keyValue;

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

    public function getInitialTimestamp(): ?\DateTimeInterface
    {
        return $this->initialTimestamp;
    }

    public function setInitialTimestamp(\DateTimeInterface $initialTimestamp): InitialTimestampInterface
    {
        $this->initialTimestamp = $initialTimestamp;

        return $this;
    }

    public function getImageId(): ?Images
    {
        return $this->imageId;
    }

    public function setImageId(?Images $imageId): self
    {
        $this->imageId = $imageId;

        return $this;
    }

    public function getKeyValue(): ?TagKey
    {
        return $this->keyValue;
    }

    public function setKeyValue(?TagKey $keyValue): self
    {
        $this->keyValue = $keyValue;

        return $this;
    }


}
