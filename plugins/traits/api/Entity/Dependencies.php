<?php

namespace Traits\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Annotation\Groups;
use Symfony\Component\Validator\Constraints as Assert;
use Core\Entity\InitialTimestampInterface;

/**
 * Dependencies
 *
 * @ORM\Table(name="tmtraitdependencies", indexes={@ORM\Index(name="FK_tmdepend_stateid_idx", columns={"parentstateid"}), @ORM\Index(name="FK_tmdepend_traitid_idx", columns={"traitid"})})
 * @ORM\Entity()
 * @ApiResource(
 *     routePrefix="/traits",
 *     itemOperations={"get"},
 *     collectionOperations={"get"}
 * )
 */
class Dependencies implements InitialTimestampInterface
{
    /**
     * @var \Traits\Entity\Traits
     *
     * @ORM\Id
     * @ORM\OneToOne(targetEntity="Traits\Entity\Traits")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="traitid", referencedColumnName="traitid", nullable=false)
     * })
     */
    private $traitId;

    /**
     * @var \Traits\Entity\States
     *
     * @ORM\Id
     * @ORM\OneToOne(targetEntity="Traits\Entity\States")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="parentstateid", referencedColumnName="stateid", nullable=false)
     * })
     */
    private $parentStateId;

    /**
     * @var \DateTime|null
     *
     * @ORM\Column(name="initialtimestamp", type="datetime", nullable=true)
     * @Assert\DateTime
     */
    private $initialTimestamp;

    public function getTraitId(): ?Traits
    {
        return $this->traitId;
    }

    public function setTraitId(?Traits $traitId): self
    {
        $this->traitId = $traitId;

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

    public function getParentStateId(): ?States
    {
        return $this->parentStateId;
    }

    public function setParentStateId(?States $parentStateId): self
    {
        $this->parentStateId = $parentStateId;

        return $this;
    }


}
