<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Annotation\Groups;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * TraitDependencies
 *
 * @ORM\Table(name="tmtraitdependencies", indexes={@ORM\Index(name="FK_tmdepend_stateid_idx", columns={"parentstateid"}), @ORM\Index(name="FK_tmdepend_traitid_idx", columns={"traitid"})})
 * @ORM\Entity(repositoryClass="App\Repository\TraitDependenciesRepository")
 * @ApiResource(
 *     itemOperations={"get"},
 *     collectionOperations={"get"}
 * )
 */
class TraitDependencies implements InitialTimestampInterface
{
    /**
     * @var int
     *
     * @ORM\Column(name="traitid", type="integer", options={"unsigned"=true})
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     * @Assert\NotBlank()
     * @Assert\Type(type="integer")
     */
    private $traitId;

    /**
     * @var \App\Entity\TraitStates
     *
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     * @ORM\OneToOne(targetEntity="\App\Entity\TraitStates")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="parentstateid", referencedColumnName="stateid")
     * })
     * @Assert\NotBlank()
     * @Assert\Type(type="integer")
     */
    private $parentStateId;

    /**
     * @var \DateTime|null
     *
     * @ORM\Column(name="initialtimestamp", type="datetime", nullable=true)
     * @Assert\DateTime
     */
    private $initialTimestamp;

    public function getTraitId(): ?int
    {
        return $this->traitId;
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

    public function getParentStateId(): ?TraitStates
    {
        return $this->parentStateId;
    }

    public function setParentStateId(?TraitStates $parentStateId): self
    {
        $this->parentStateId = $parentStateId;

        return $this;
    }


}
