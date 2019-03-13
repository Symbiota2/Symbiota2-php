<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Annotation\Groups;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * KeyCharacterDependence
 *
 * @ORM\Table(name="kmchardependance", indexes={@ORM\Index(name="FK_chardependance_cs_idx", columns={"CIDDependance", "CSDependance"}), @ORM\Index(name="FK_chardependance_cid_idx", columns={"CID"})})
 * @ORM\Entity(repositoryClass="App\Repository\KeyCharacterDependenceRepository")
 * @ApiResource(
 *     itemOperations={"get"},
 *     collectionOperations={"get"}
 * )
 */
class KeyCharacterDependence implements InitialTimestampInterface
{
    /**
     * @var \App\Entity\KeyCharacters
     *
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     * @ORM\OneToOne(targetEntity="\App\Entity\KeyCharacters")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="CID", referencedColumnName="cid")
     * })
     * @Assert\NotBlank()
     * @Assert\Type(type="integer")
     */
    private $characterId;

    /**
     * @var int
     *
     * @ORM\Column(name="CIDDependance", type="integer", options={"unsigned"=true})
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     * @Assert\NotBlank()
     * @Assert\Type(type="integer")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="CSDependance", type="string", length=16)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     * @Assert\NotBlank()
     * @Assert\Length(max=16)
     */
    private $characterStateDependance;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="InitialTimeStamp", type="datetime")
     * @Assert\DateTime
     */
    private $initialTimestamp;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getCharacterStateDependance(): ?string
    {
        return $this->characterStateDependance;
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

    public function getCharacterId(): ?KeyCharacters
    {
        return $this->characterId;
    }

    public function setCharacterId(?KeyCharacters $characterId): self
    {
        $this->characterId = $characterId;

        return $this;
    }


}
