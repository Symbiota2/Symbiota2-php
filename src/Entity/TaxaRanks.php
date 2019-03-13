<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Annotation\Groups;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * TaxaRanks
 *
 * @ORM\Table(name="taxonunits", uniqueConstraints={@ORM\UniqueConstraint(name="UNIQUE_taxonunits", columns={"rankid", "rankname"})})
 * @ORM\Entity(repositoryClass="App\Repository\TaxaRanksRepository")
 * @ApiResource(
 *     itemOperations={"get"},
 *     collectionOperations={"get"}
 * )
 */
class TaxaRanks implements InitialTimestampInterface, ModifiedTimestampInterface
{
    /**
     * @var int
     *
     * @ORM\Column(name="taxonunitid", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var int
     *
     * @ORM\Column(name="rankid", type="integer", options={"unsigned"=true})
     * @Assert\NotBlank()
     * @Assert\Type(type="integer")
     */
    private $rankId;

    /**
     * @var string
     *
     * @ORM\Column(name="rankname", type="string", length=15)
     * @Assert\NotBlank()
     * @Assert\Length(max=15)
     */
    private $rankName;

    /**
     * @var string|null
     *
     * @ORM\Column(name="suffix", type="string", length=45, nullable=true)
     * @Assert\Length(max=45)
     */
    private $suffix;

    /**
     * @var int
     *
     * @ORM\Column(name="dirparentrankid", type="integer")
     * @Assert\NotBlank()
     * @Assert\Type(type="integer")
     */
    private $directParentRankId;

    /**
     * @var int|null
     *
     * @ORM\Column(name="reqparentrankid", type="integer", nullable=true)
     * @Assert\Type(type="integer")
     */
    private $requiredParentRankId;

    /**
     * @var string|null
     *
     * @ORM\Column(name="modifiedby", type="string", length=45, nullable=true)
     * @Assert\Length(max=45)
     */
    private $modifiedBy;

    /**
     * @var \DateTime|null
     *
     * @ORM\Column(name="modifiedtimestamp", type="datetime", nullable=true)
     * @Assert\DateTime
     */
    private $modifiedTimestamp;

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

    public function getRankId(): ?int
    {
        return $this->rankId;
    }

    public function setRankId(int $rankId): self
    {
        $this->rankId = $rankId;

        return $this;
    }

    public function getRankName(): ?string
    {
        return $this->rankName;
    }

    public function setRankName(string $rankName): self
    {
        $this->rankName = $rankName;

        return $this;
    }

    public function getSuffix(): ?string
    {
        return $this->suffix;
    }

    public function setSuffix(?string $suffix): self
    {
        $this->suffix = $suffix;

        return $this;
    }

    public function getDirectParentRankId(): ?int
    {
        return $this->directParentRankId;
    }

    public function setDirectParentRankId(int $directParentRankId): self
    {
        $this->directParentRankId = $directParentRankId;

        return $this;
    }

    public function getRequiredParentRankId(): ?int
    {
        return $this->requiredParentRankId;
    }

    public function setRequiredParentRankId(?int $requiredParentRankId): self
    {
        $this->requiredParentRankId = $requiredParentRankId;

        return $this;
    }

    public function getModifiedBy(): ?string
    {
        return $this->modifiedBy;
    }

    public function setModifiedBy(?string $modifiedBy): self
    {
        $this->modifiedBy = $modifiedBy;

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

    public function getInitialTimestamp(): ?\DateTimeInterface
    {
        return $this->initialTimestamp;
    }

    public function setInitialTimestamp(\DateTimeInterface $initialTimestamp): InitialTimestampInterface
    {
        $this->initialTimestamp = $initialTimestamp;

        return $this;
    }


}
