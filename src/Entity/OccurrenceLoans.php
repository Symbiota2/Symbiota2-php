<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Annotation\Groups;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * OccurrenceLoans
 *
 * @ORM\Table(name="omoccurloans", indexes={@ORM\Index(name="FK_occurloans_owncoll", columns={"collidOwn"}), @ORM\Index(name="FK_occurloans_borrinst", columns={"iidBorrower"}), @ORM\Index(name="FK_occurloans_owninst", columns={"iidOwner"}), @ORM\Index(name="FK_occurloans_borrcoll", columns={"collidBorr"})})
 * @ORM\Entity(repositoryClass="App\Repository\OccurrenceLoansRepository")
 * @ApiResource(
 *     itemOperations={"get"},
 *     collectionOperations={"get"}
 * )
 */
class OccurrenceLoans implements InitialTimestampInterface
{
    /**
     * @var int
     *
     * @ORM\Column(name="loanid", type="integer", options={"unsigned"=true})
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var string|null
     *
     * @ORM\Column(name="loanIdentifierOwn", type="string", length=30, nullable=true)
     * @Assert\Length(max=30)
     */
    private $loanIdentifierOwner;

    /**
     * @var string|null
     *
     * @ORM\Column(name="loanIdentifierBorr", type="string", length=30, nullable=true)
     * @Assert\Length(max=30)
     */
    private $loanIdentifierBorrower;

    /**
     * @var \App\Entity\Collections
     *
     * @ORM\ManyToOne(targetEntity="\App\Entity\Collections")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="collidOwn", referencedColumnName="CollID")
     * })
     */
    private $collectionIdOwner;

    /**
     * @var \App\Entity\Collections
     *
     * @ORM\ManyToOne(targetEntity="\App\Entity\Collections")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="collidBorr", referencedColumnName="CollID")
     * })
     */
    private $collectionIdBorrower;

    /**
     * @var \App\Entity\Institutions
     *
     * @ORM\ManyToOne(targetEntity="\App\Entity\Institutions")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="iidOwner", referencedColumnName="iid")
     * })
     */
    private $institutionIdOwner;

    /**
     * @var \App\Entity\Institutions
     *
     * @ORM\ManyToOne(targetEntity="\App\Entity\Institutions")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="iidBorrower", referencedColumnName="iid")
     * })
     */
    private $institutionIdBorrower;

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
     * @ORM\Column(name="dateSentReturn", type="date", nullable=true)
     * @Assert\Date
     */
    private $dateSentReturn;

    /**
     * @var string|null
     *
     * @ORM\Column(name="receivedStatus", type="string", length=250, nullable=true)
     * @Assert\Length(max=250)
     */
    private $receivedStatus;

    /**
     * @var int|null
     *
     * @ORM\Column(name="totalBoxes", type="integer", nullable=true)
     * @Assert\Type(type="integer")
     */
    private $totalBoxes;

    /**
     * @var int|null
     *
     * @ORM\Column(name="totalBoxesReturned", type="integer", nullable=true)
     * @Assert\Type(type="integer")
     */
    private $totalBoxesReturned;

    /**
     * @var int|null
     *
     * @ORM\Column(name="numSpecimens", type="integer", nullable=true)
     * @Assert\Type(type="integer")
     */
    private $numberOfSpecimens;

    /**
     * @var string|null
     *
     * @ORM\Column(name="shippingMethod", type="string", length=50, nullable=true)
     * @Assert\Length(max=50)
     */
    private $shippingMethod;

    /**
     * @var string|null
     *
     * @ORM\Column(name="shippingMethodReturn", type="string", length=50, nullable=true)
     * @Assert\Length(max=50)
     */
    private $shippingMethodReturn;

    /**
     * @var \DateTime|null
     *
     * @ORM\Column(name="dateDue", type="date", nullable=true)
     * @Assert\Date
     */
    private $dateDue;

    /**
     * @var \DateTime|null
     *
     * @ORM\Column(name="dateReceivedOwn", type="date", nullable=true)
     * @Assert\Date
     */
    private $dateReceivedOwner;

    /**
     * @var \DateTime|null
     *
     * @ORM\Column(name="dateReceivedBorr", type="date", nullable=true)
     * @Assert\Date
     */
    private $dateReceivedBorrower;

    /**
     * @var \DateTime|null
     *
     * @ORM\Column(name="dateClosed", type="date", nullable=true)
     * @Assert\Date
     */
    private $dateClosed;

    /**
     * @var string|null
     *
     * @ORM\Column(name="forWhom", type="string", length=50, nullable=true)
     * @Assert\Length(max=50)
     */
    private $forWhom;

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
     * @ORM\Column(name="invoiceMessageOwn", type="string", length=500, nullable=true)
     * @Assert\Length(max=500)
     */
    private $invoiceMessageOwner;

    /**
     * @var string|null
     *
     * @ORM\Column(name="invoiceMessageBorr", type="string", length=500, nullable=true)
     * @Assert\Length(max=500)
     */
    private $invoiceMessageBorrower;

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
     * @ORM\Column(name="createdByOwn", type="string", length=30, nullable=true)
     * @Assert\Length(max=30)
     */
    private $createdByOwner;

    /**
     * @var string|null
     *
     * @ORM\Column(name="createdByBorr", type="string", length=30, nullable=true)
     * @Assert\Length(max=30)
     */
    private $createdByBorrower;

    /**
     * @var int|null
     *
     * @ORM\Column(name="processingStatus", type="integer", nullable=true, options={"default"="1","unsigned"=true})
     * @Assert\Type(type="integer")
     */
    private $processingStatus = 1;

    /**
     * @var string|null
     *
     * @ORM\Column(name="processedByOwn", type="string", length=30, nullable=true)
     * @Assert\Length(max=30)
     */
    private $processedByOwner;

    /**
     * @var string|null
     *
     * @ORM\Column(name="processedByBorr", type="string", length=30, nullable=true)
     * @Assert\Length(max=30)
     */
    private $processedByBorrower;

    /**
     * @var string|null
     *
     * @ORM\Column(name="processedByReturnOwn", type="string", length=30, nullable=true)
     * @Assert\Length(max=30)
     */
    private $returnProcessedByOwner;

    /**
     * @var string|null
     *
     * @ORM\Column(name="processedByReturnBorr", type="string", length=30, nullable=true)
     * @Assert\Length(max=30)
     */
    private $returnProcessedByBorrower;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="initialTimestamp", type="datetime")
     * @Assert\DateTime
     */
    private $initialTimestamp;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="\App\Entity\Occurrences", inversedBy="loanId")
     * @ORM\JoinTable(name="omoccurloanslink",
     *   joinColumns={
     *     @ORM\JoinColumn(name="loanid", referencedColumnName="loanid")
     *   },
     *   inverseJoinColumns={
     *     @ORM\JoinColumn(name="occid", referencedColumnName="occid")
     *   }
     * )
     */
    private $occurrenceId;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->occurrenceId = new \Doctrine\Common\Collections\ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getLoanIdentifierOwner(): ?string
    {
        return $this->loanIdentifierOwner;
    }

    public function setLoanIdentifierOwner(?string $loanIdentifierOwner): self
    {
        $this->loanIdentifierOwner = $loanIdentifierOwner;

        return $this;
    }

    public function getLoanIdentifierBorrower(): ?string
    {
        return $this->loanIdentifierBorrower;
    }

    public function setLoanIdentifierBorrower(?string $loanIdentifierBorrower): self
    {
        $this->loanIdentifierBorrower = $loanIdentifierBorrower;

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

    public function getDateSentReturn(): ?\DateTimeInterface
    {
        return $this->dateSentReturn;
    }

    public function setDateSentReturn(?\DateTimeInterface $dateSentReturn): self
    {
        $this->dateSentReturn = $dateSentReturn;

        return $this;
    }

    public function getReceivedStatus(): ?string
    {
        return $this->receivedStatus;
    }

    public function setReceivedStatus(?string $receivedStatus): self
    {
        $this->receivedStatus = $receivedStatus;

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

    public function getTotalBoxesReturned(): ?int
    {
        return $this->totalBoxesReturned;
    }

    public function setTotalBoxesReturned(?int $totalBoxesReturned): self
    {
        $this->totalBoxesReturned = $totalBoxesReturned;

        return $this;
    }

    public function getNumberOfSpecimens(): ?int
    {
        return $this->numberOfSpecimens;
    }

    public function setNumberOfSpecimens(?int $numberOfSpecimens): self
    {
        $this->numberOfSpecimens = $numberOfSpecimens;

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

    public function getShippingMethodReturn(): ?string
    {
        return $this->shippingMethodReturn;
    }

    public function setShippingMethodReturn(?string $shippingMethodReturn): self
    {
        $this->shippingMethodReturn = $shippingMethodReturn;

        return $this;
    }

    public function getDateDue(): ?\DateTimeInterface
    {
        return $this->dateDue;
    }

    public function setDateDue(?\DateTimeInterface $dateDue): self
    {
        $this->dateDue = $dateDue;

        return $this;
    }

    public function getDateReceivedOwner(): ?\DateTimeInterface
    {
        return $this->dateReceivedOwner;
    }

    public function setDateReceivedOwner(?\DateTimeInterface $dateReceivedOwner): self
    {
        $this->dateReceivedOwner = $dateReceivedOwner;

        return $this;
    }

    public function getDateReceivedBorrower(): ?\DateTimeInterface
    {
        return $this->dateReceivedBorrower;
    }

    public function setDateReceivedBorrower(?\DateTimeInterface $dateReceivedBorrower): self
    {
        $this->dateReceivedBorrower = $dateReceivedBorrower;

        return $this;
    }

    public function getDateClosed(): ?\DateTimeInterface
    {
        return $this->dateClosed;
    }

    public function setDateClosed(?\DateTimeInterface $dateClosed): self
    {
        $this->dateClosed = $dateClosed;

        return $this;
    }

    public function getForWhom(): ?string
    {
        return $this->forWhom;
    }

    public function setForWhom(?string $forWhom): self
    {
        $this->forWhom = $forWhom;

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

    public function getInvoiceMessageOwner(): ?string
    {
        return $this->invoiceMessageOwner;
    }

    public function setInvoiceMessageOwner(?string $invoiceMessageOwner): self
    {
        $this->invoiceMessageOwner = $invoiceMessageOwner;

        return $this;
    }

    public function getInvoiceMessageBorrower(): ?string
    {
        return $this->invoiceMessageBorrower;
    }

    public function setInvoiceMessageBorrower(?string $invoiceMessageBorrower): self
    {
        $this->invoiceMessageBorrower = $invoiceMessageBorrower;

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

    public function getCreatedByOwner(): ?string
    {
        return $this->createdByOwner;
    }

    public function setCreatedByOwner(?string $createdByOwner): self
    {
        $this->createdByOwner = $createdByOwner;

        return $this;
    }

    public function getCreatedByBorrower(): ?string
    {
        return $this->createdByBorrower;
    }

    public function setCreatedByBorrower(?string $createdByBorrower): self
    {
        $this->createdByBorrower = $createdByBorrower;

        return $this;
    }

    public function getProcessingStatus(): ?int
    {
        return $this->processingStatus;
    }

    public function setProcessingStatus(?int $processingStatus): self
    {
        $this->processingStatus = $processingStatus;

        return $this;
    }

    public function getProcessedByOwner(): ?string
    {
        return $this->processedByOwner;
    }

    public function setProcessedByOwner(?string $processedByOwner): self
    {
        $this->processedByOwner = $processedByOwner;

        return $this;
    }

    public function getProcessedByBorrower(): ?string
    {
        return $this->processedByBorrower;
    }

    public function setProcessedByBorrower(?string $processedByBorrower): self
    {
        $this->processedByBorrower = $processedByBorrower;

        return $this;
    }

    public function getReturnProcessedByOwner(): ?string
    {
        return $this->returnProcessedByOwner;
    }

    public function setReturnProcessedByOwner(?string $returnProcessedByOwner): self
    {
        $this->returnProcessedByOwner = $returnProcessedByOwner;

        return $this;
    }

    public function getReturnProcessedByBorrower(): ?string
    {
        return $this->returnProcessedByBorrower;
    }

    public function setReturnProcessedByBorrower(?string $returnProcessedByBorrower): self
    {
        $this->returnProcessedByBorrower = $returnProcessedByBorrower;

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

    public function getCollectionIdOwner(): ?Collections
    {
        return $this->collectionIdOwner;
    }

    public function setCollectionIdOwner(?Collections $collectionIdOwner): self
    {
        $this->collectionIdOwner = $collectionIdOwner;

        return $this;
    }

    public function getInstitutionIdBorrower(): ?Institutions
    {
        return $this->institutionIdBorrower;
    }

    public function setInstitutionIdBorrower(?Institutions $institutionIdBorrower): self
    {
        $this->institutionIdBorrower = $institutionIdBorrower;

        return $this;
    }

    public function getCollectionIdBorrower(): ?Collections
    {
        return $this->collectionIdBorrower;
    }

    public function setCollectionIdBorrower(?Collections $collectionIdBorrower): self
    {
        $this->collectionIdBorrower = $collectionIdBorrower;

        return $this;
    }

    public function getInstitutionIdOwner(): ?Institutions
    {
        return $this->institutionIdOwner;
    }

    public function setInstitutionIdOwner(?Institutions $institutionIdOwner): self
    {
        $this->institutionIdOwner = $institutionIdOwner;

        return $this;
    }

    /**
     * @return Collection|Occurrences[]
     */
    public function getOccurrenceId(): Collection
    {
        return $this->occurrenceId;
    }

    public function addOccurrenceId(Occurrences $occurrenceId): self
    {
        if (!$this->occurrenceId->contains($occurrenceId)) {
            $this->occurrenceId[] = $occurrenceId;
        }

        return $this;
    }

    public function removeOccurrenceId(Occurrences $occurrenceId): self
    {
        if ($this->occurrenceId->contains($occurrenceId)) {
            $this->occurrenceId->removeElement($occurrenceId);
        }

        return $this;
    }

}
