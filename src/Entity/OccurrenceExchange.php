<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Annotation\Groups;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * OccurrenceExchange
 *
 * @ORM\Table(name="omoccurexchange", indexes={@ORM\Index(name="FK_occexch_coll", columns={"collid"})})
 * @ORM\Entity(repositoryClass="App\Repository\OccurrenceExchangeRepository")
 * @ApiResource(
 *     itemOperations={"get"},
 *     collectionOperations={"get"}
 * )
 */
class OccurrenceExchange implements InitialTimestampInterface
{
    /**
     * @var int
     *
     * @ORM\Column(name="exchangeid", type="integer", options={"unsigned"=true})
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var string|null
     *
     * @ORM\Column(name="identifier", type="string", length=30, nullable=true)
     * @Assert\Length(max=30)
     */
    private $identifier;

    /**
     * @var \App\Entity\Collections
     *
     * @ORM\ManyToOne(targetEntity="\App\Entity\Collections")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="collid", referencedColumnName="CollID")
     * })
     * @Assert\NotBlank()
     * @Assert\Type(type="integer")
     */
    private $collectionId;

    /**
     * @var int|null
     *
     * @ORM\Column(name="iid", type="integer", nullable=true, options={"unsigned"=true})
     * @Assert\Type(type="integer")
     */
    private $institutionId;

    /**
     * @var string|null
     *
     * @ORM\Column(name="transactionType", type="string", length=10, nullable=true)
     * @Assert\Length(max=10)
     */
    private $transactionType;

    /**
     * @var string|null
     *
     * @ORM\Column(name="in_out", type="string", length=3, nullable=true)
     * @Assert\Length(max=3)
     */
    private $inOut;

    /**
     * @var \DateTime|null
     *
     * @ORM\Column(name="dateSent", type="date", nullable=true)
     * @Assert\Date
     */
    private $dateSent;

    /**
     * @var \DateTime|null
     *
     * @ORM\Column(name="dateReceived", type="date", nullable=true)
     * @Assert\Date
     */
    private $dateReceived;

    /**
     * @var int|null
     *
     * @ORM\Column(name="totalBoxes", type="integer", nullable=true)
     * @Assert\Type(type="integer")
     */
    private $totalBoxes;

    /**
     * @var string|null
     *
     * @ORM\Column(name="shippingMethod", type="string", length=50, nullable=true)
     * @Assert\Length(max=50)
     */
    private $shippingMethod;

    /**
     * @var int|null
     *
     * @ORM\Column(name="totalExMounted", type="integer", nullable=true)
     * @Assert\Type(type="integer")
     */
    private $totalExchangeMounted;

    /**
     * @var int|null
     *
     * @ORM\Column(name="totalExUnmounted", type="integer", nullable=true)
     * @Assert\Type(type="integer")
     */
    private $totalExchangeUnmounted;

    /**
     * @var int|null
     *
     * @ORM\Column(name="totalGift", type="integer", nullable=true)
     * @Assert\Type(type="integer")
     */
    private $totalGift;

    /**
     * @var int|null
     *
     * @ORM\Column(name="totalGiftDet", type="integer", nullable=true)
     * @Assert\Type(type="integer")
     */
    private $totalGiftForDetermination;

    /**
     * @var int|null
     *
     * @ORM\Column(name="adjustment", type="integer", nullable=true)
     * @Assert\Type(type="integer")
     */
    private $adjustment;

    /**
     * @var int|null
     *
     * @ORM\Column(name="invoiceBalance", type="integer", nullable=true)
     * @Assert\Type(type="integer")
     */
    private $invoiceBalance;

    /**
     * @var string|null
     *
     * @ORM\Column(name="invoiceMessage", type="string", length=500, nullable=true)
     * @Assert\Length(max=500)
     */
    private $invoiceMessage;

    /**
     * @var string|null
     *
     * @ORM\Column(name="description", type="string", length=1000, nullable=true)
     * @Assert\Length(max=1000)
     */
    private $description;

    /**
     * @var string|null
     *
     * @ORM\Column(name="notes", type="string", length=500, nullable=true)
     * @Assert\Length(max=500)
     */
    private $notes;

    /**
     * @var string|null
     *
     * @ORM\Column(name="createdBy", type="string", length=20, nullable=true)
     * @Assert\Length(max=20)
     */
    private $createdBy;

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

    public function getIdentifier(): ?string
    {
        return $this->identifier;
    }

    public function setIdentifier(?string $identifier): self
    {
        $this->identifier = $identifier;

        return $this;
    }

    public function getInstitutionId(): ?int
    {
        return $this->institutionId;
    }

    public function setInstitutionId(?int $institutionId): self
    {
        $this->institutionId = $institutionId;

        return $this;
    }

    public function getTransactionType(): ?string
    {
        return $this->transactionType;
    }

    public function setTransactionType(?string $transactionType): self
    {
        $this->transactionType = $transactionType;

        return $this;
    }

    public function getInOut(): ?string
    {
        return $this->inOut;
    }

    public function setInOut(?string $inOut): self
    {
        $this->inOut = $inOut;

        return $this;
    }

    public function getDateSent(): ?\DateTimeInterface
    {
        return $this->dateSent;
    }

    public function setDateSent(?\DateTimeInterface $dateSent): self
    {
        $this->dateSent = $dateSent;

        return $this;
    }

    public function getDateReceived(): ?\DateTimeInterface
    {
        return $this->dateReceived;
    }

    public function setDateReceived(?\DateTimeInterface $dateReceived): self
    {
        $this->dateReceived = $dateReceived;

        return $this;
    }

    public function getTotalBoxes(): ?int
    {
        return $this->totalBoxes;
    }

    public function setTotalBoxes(?int $totalBoxes): self
    {
        $this->totalBoxes = $totalBoxes;

        return $this;
    }

    public function getShippingMethod(): ?string
    {
        return $this->shippingMethod;
    }

    public function setShippingMethod(?string $shippingMethod): self
    {
        $this->shippingMethod = $shippingMethod;

        return $this;
    }

    public function getTotalExchangeMounted(): ?int
    {
        return $this->totalExchangeMounted;
    }

    public function setTotalExchangeMounted(?int $totalExchangeMounted): self
    {
        $this->totalExchangeMounted = $totalExchangeMounted;

        return $this;
    }

    public function getTotalExchangeUnmounted(): ?int
    {
        return $this->totalExchangeUnmounted;
    }

    public function setTotalExchangeUnmounted(?int $totalExchangeUnmounted): self
    {
        $this->totalExchangeUnmounted = $totalExchangeUnmounted;

        return $this;
    }

    public function getTotalGift(): ?int
    {
        return $this->totalGift;
    }

    public function setTotalGift(?int $totalGift): self
    {
        $this->totalGift = $totalGift;

        return $this;
    }

    public function getTotalGiftForDetermination(): ?int
    {
        return $this->totalGiftForDetermination;
    }

    public function setTotalGiftForDetermination(?int $totalGiftForDetermination): self
    {
        $this->totalGiftForDetermination = $totalGiftForDetermination;

        return $this;
    }

    public function getAdjustment(): ?int
    {
        return $this->adjustment;
    }

    public function setAdjustment(?int $adjustment): self
    {
        $this->adjustment = $adjustment;

        return $this;
    }

    public function getInvoiceBalance(): ?int
    {
        return $this->invoiceBalance;
    }

    public function setInvoiceBalance(?int $invoiceBalance): self
    {
        $this->invoiceBalance = $invoiceBalance;

        return $this;
    }

    public function getInvoiceMessage(): ?string
    {
        return $this->invoiceMessage;
    }

    public function setInvoiceMessage(?string $invoiceMessage): self
    {
        $this->invoiceMessage = $invoiceMessage;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(?string $description): self
    {
        $this->description = $description;

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

    public function getCreatedBy(): ?string
    {
        return $this->createdBy;
    }

    public function setCreatedBy(?string $createdBy): self
    {
        $this->createdBy = $createdBy;

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
