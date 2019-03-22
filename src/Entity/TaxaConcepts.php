<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Annotation\Groups;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * TaxaConcepts
 *
 * @ORM\Table(name="taxstatus", indexes={@ORM\Index(name="Index_ts_taid", columns={"taxauthid"}), @ORM\Index(name="Index_ts_tidacc", columns={"tidaccepted"}), @ORM\Index(name="Index_ts_tid", columns={"tid"}), @ORM\Index(name="Index_ts_family", columns={"family"}), @ORM\Index(name="Index_ts_parenttid", columns={"parenttid"})})
 * @ORM\Entity(repositoryClass="App\Repository\TaxaConceptsRepository")
 * @ApiResource(
 *     itemOperations={"get"},
 *     collectionOperations={"get"}
 * )
 */
class TaxaConcepts implements InitialTimestampInterface
{
    /**
     * @var int
     *
     * @ORM\Column(name="tsid", type="integer", options={"unsigned"=true})
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var \App\Entity\Taxa
     *
     * @ORM\ManyToOne(targetEntity="\App\Entity\Taxa")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="tid", referencedColumnName="TID", nullable=false)
     * })
     */
    private $taxaId;

    /**
     * @var \App\Entity\Taxa
     *
     * @ORM\ManyToOne(targetEntity="\App\Entity\Taxa")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="tidaccepted", referencedColumnName="TID", nullable=false)
     * })
     */
    private $taxaIdAccepted;

    /**
     * @var \App\Entity\TaxaAuthorities
     *
     * @ORM\ManyToOne(targetEntity="\App\Entity\TaxaAuthorities")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="taxauthid", referencedColumnName="taxauthid", nullable=false)
     * })
     */
    private $taxaAuthorityId;

    /**
     * @var \App\Entity\Taxa
     *
     * @ORM\ManyToOne(targetEntity="\App\Entity\Taxa")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="parenttid", referencedColumnName="TID")
     * })
     */
    private $parentTaxaId;

    /**
     * @var string|null
     *
     * @ORM\Column(name="family", type="string", length=50, nullable=true)
     * @Assert\Length(max=50)
     */
    private $family;

    /**
     * @var string|null
     *
     * @ORM\Column(name="UnacceptabilityReason", type="string", length=250, nullable=true)
     * @Assert\Length(max=250)
     */
    private $unacceptabilityReason;

    /**
     * @var string|null
     *
     * @ORM\Column(name="notes", type="string", length=250, nullable=true)
     * @Assert\Length(max=250)
     */
    private $notes;

    /**
     * @var int|null
     *
     * @ORM\Column(name="SortSequence", type="integer", nullable=true, options={"default"="50","unsigned"=true})
     * @Assert\Type(type="integer")
     */
    private $sortSequence = 50;

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

    public function getFamily(): ?string
    {
        return $this->family;
    }

    public function setFamily(?string $family): self
    {
        $this->family = $family;

        return $this;
    }

    public function getUnacceptabilityReason(): ?string
    {
        return $this->unacceptabilityReason;
    }

    public function setUnacceptabilityReason(?string $unacceptabilityReason): self
    {
        $this->unacceptabilityReason = $unacceptabilityReason;

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

    public function getSortSequence(): ?int
    {
        return $this->sortSequence;
    }

    public function setSortSequence(?int $sortSequence): self
    {
        $this->sortSequence = $sortSequence;

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

    public function getTaxaIdAccepted(): ?Taxa
    {
        return $this->taxaIdAccepted;
    }

    public function setTaxaIdAccepted(?Taxa $taxaIdAccepted): self
    {
        $this->taxaIdAccepted = $taxaIdAccepted;

        return $this;
    }

    public function getTaxaAuthorityId(): ?TaxaAuthorities
    {
        return $this->taxaAuthorityId;
    }

    public function setTaxaAuthorityId(?TaxaAuthorities $taxaAuthorityId): self
    {
        $this->taxaAuthorityId = $taxaAuthorityId;

        return $this;
    }

    public function getParentTaxaId(): ?Taxa
    {
        return $this->parentTaxaId;
    }

    public function setParentTaxaId(?Taxa $parentTaxaId): self
    {
        $this->parentTaxaId = $parentTaxaId;

        return $this;
    }

    public function getTaxaId(): ?Taxa
    {
        return $this->taxaId;
    }

    public function setTaxaId(?Taxa $taxaId): self
    {
        $this->taxaId = $taxaId;

        return $this;
    }


}
