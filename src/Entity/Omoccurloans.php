<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * Omoccurloans
 *
 * @ORM\Table(name="omoccurloans", indexes={@ORM\Index(name="FK_occurloans_owncoll", columns={"collidOwn"}), @ORM\Index(name="FK_occurloans_borrinst", columns={"iidBorrower"}), @ORM\Index(name="FK_occurloans_owninst", columns={"iidOwner"}), @ORM\Index(name="FK_occurloans_borrcoll", columns={"collidBorr"})})
 * @ORM\Entity(repositoryClass="App\Repository\OmoccurloansRepository")
 */
class Omoccurloans
{
    /**
     * @var int
     *
     * @ORM\Column(name="loanid", type="integer", nullable=false, options={"unsigned"=true})
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $loanid;

    /**
     * @var string|null
     *
     * @ORM\Column(name="loanIdentifierOwn", type="string", length=30, nullable=true, options={"default"=NULL})
     */
    private $loanidentifierown = 'NULL';

    /**
     * @var string|null
     *
     * @ORM\Column(name="loanIdentifierBorr", type="string", length=30, nullable=true, options={"default"=NULL})
     */
    private $loanidentifierborr = 'NULL';

    /**
     * @var \DateTime|null
     *
     * @ORM\Column(name="dateSent", type="date", nullable=true, options={"default"=NULL})
     */
    private $datesent = 'NULL';

    /**
     * @var \DateTime|null
     *
     * @ORM\Column(name="dateSentReturn", type="date", nullable=true, options={"default"=NULL})
     */
    private $datesentreturn = 'NULL';

    /**
     * @var string|null
     *
     * @ORM\Column(name="receivedStatus", type="string", length=250, nullable=true, options={"default"=NULL})
     */
    private $receivedstatus = 'NULL';

    /**
     * @var int|null
     *
     * @ORM\Column(name="totalBoxes", type="integer", nullable=true, options={"default"=NULL})
     */
    private $totalboxes = 'NULL';

    /**
     * @var int|null
     *
     * @ORM\Column(name="totalBoxesReturned", type="integer", nullable=true, options={"default"=NULL})
     */
    private $totalboxesreturned = 'NULL';

    /**
     * @var int|null
     *
     * @ORM\Column(name="numSpecimens", type="integer", nullable=true, options={"default"=NULL})
     */
    private $numspecimens = 'NULL';

    /**
     * @var string|null
     *
     * @ORM\Column(name="shippingMethod", type="string", length=50, nullable=true, options={"default"=NULL})
     */
    private $shippingmethod = 'NULL';

    /**
     * @var string|null
     *
     * @ORM\Column(name="shippingMethodReturn", type="string", length=50, nullable=true, options={"default"=NULL})
     */
    private $shippingmethodreturn = 'NULL';

    /**
     * @var \DateTime|null
     *
     * @ORM\Column(name="dateDue", type="date", nullable=true, options={"default"=NULL})
     */
    private $datedue = 'NULL';

    /**
     * @var \DateTime|null
     *
     * @ORM\Column(name="dateReceivedOwn", type="date", nullable=true, options={"default"=NULL})
     */
    private $datereceivedown = 'NULL';

    /**
     * @var \DateTime|null
     *
     * @ORM\Column(name="dateReceivedBorr", type="date", nullable=true, options={"default"=NULL})
     */
    private $datereceivedborr = 'NULL';

    /**
     * @var \DateTime|null
     *
     * @ORM\Column(name="dateClosed", type="date", nullable=true, options={"default"=NULL})
     */
    private $dateclosed = 'NULL';

    /**
     * @var string|null
     *
     * @ORM\Column(name="forWhom", type="string", length=50, nullable=true, options={"default"=NULL})
     */
    private $forwhom = 'NULL';

    /**
     * @var string|null
     *
     * @ORM\Column(name="description", type="string", length=1000, nullable=true, options={"default"=NULL})
     */
    private $description = 'NULL';

    /**
     * @var string|null
     *
     * @ORM\Column(name="invoiceMessageOwn", type="string", length=500, nullable=true, options={"default"=NULL})
     */
    private $invoicemessageown = 'NULL';

    /**
     * @var string|null
     *
     * @ORM\Column(name="invoiceMessageBorr", type="string", length=500, nullable=true, options={"default"=NULL})
     */
    private $invoicemessageborr = 'NULL';

    /**
     * @var string|null
     *
     * @ORM\Column(name="notes", type="string", length=500, nullable=true, options={"default"=NULL})
     */
    private $notes = 'NULL';

    /**
     * @var string|null
     *
     * @ORM\Column(name="createdByOwn", type="string", length=30, nullable=true, options={"default"=NULL})
     */
    private $createdbyown = 'NULL';

    /**
     * @var string|null
     *
     * @ORM\Column(name="createdByBorr", type="string", length=30, nullable=true, options={"default"=NULL})
     */
    private $createdbyborr = 'NULL';

    /**
     * @var int|null
     *
     * @ORM\Column(name="processingStatus", type="integer", nullable=true, options={"default"="1","unsigned"=true})
     */
    private $processingstatus = '1';

    /**
     * @var string|null
     *
     * @ORM\Column(name="processedByOwn", type="string", length=30, nullable=true, options={"default"=NULL})
     */
    private $processedbyown = 'NULL';

    /**
     * @var string|null
     *
     * @ORM\Column(name="processedByBorr", type="string", length=30, nullable=true, options={"default"=NULL})
     */
    private $processedbyborr = 'NULL';

    /**
     * @var string|null
     *
     * @ORM\Column(name="processedByReturnOwn", type="string", length=30, nullable=true, options={"default"=NULL})
     */
    private $processedbyreturnown = 'NULL';

    /**
     * @var string|null
     *
     * @ORM\Column(name="processedByReturnBorr", type="string", length=30, nullable=true, options={"default"=NULL})
     */
    private $processedbyreturnborr = 'NULL';

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="initialTimestamp", type="datetime", nullable=false, options={"default"="CURRENT_TIMESTAMP"})
     */
    private $initialtimestamp = 'CURRENT_TIMESTAMP';

    /**
     * @var \Omcollections
     *
     * @ORM\ManyToOne(targetEntity="Omcollections")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="collidOwn", referencedColumnName="CollID")
     * })
     */
    private $collidown;

    /**
     * @var \Institutions
     *
     * @ORM\ManyToOne(targetEntity="Institutions")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="iidBorrower", referencedColumnName="iid")
     * })
     */
    private $iidborrower;

    /**
     * @var \Omcollections
     *
     * @ORM\ManyToOne(targetEntity="Omcollections")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="collidBorr", referencedColumnName="CollID")
     * })
     */
    private $collidborr;

    /**
     * @var \Institutions
     *
     * @ORM\ManyToOne(targetEntity="Institutions")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="iidOwner", referencedColumnName="iid")
     * })
     */
    private $iidowner;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="Omoccurrences", inversedBy="loanid")
     * @ORM\JoinTable(name="omoccurloanslink",
     *   joinColumns={
     *     @ORM\JoinColumn(name="loanid", referencedColumnName="loanid")
     *   },
     *   inverseJoinColumns={
     *     @ORM\JoinColumn(name="occid", referencedColumnName="occid")
     *   }
     * )
     */
    private $occid;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->occid = new \Doctrine\Common\Collections\ArrayCollection();
    }

    public function getLoanid(): ?int
    {
        return $this->loanid;
    }

    public function getLoanidentifierown(): ?string
    {
        return $this->loanidentifierown;
    }

    public function setLoanidentifierown(?string $loanidentifierown): self
    {
        $this->loanidentifierown = $loanidentifierown;

        return $this;
    }

    public function getLoanidentifierborr(): ?string
    {
        return $this->loanidentifierborr;
    }

    public function setLoanidentifierborr(?string $loanidentifierborr): self
    {
        $this->loanidentifierborr = $loanidentifierborr;

        return $this;
    }

    public function getDatesent(): ?\DateTimeInterface
    {
        return $this->datesent;
    }

    public function setDatesent(?\DateTimeInterface $datesent): self
    {
        $this->datesent = $datesent;

        return $this;
    }

    public function getDatesentreturn(): ?\DateTimeInterface
    {
        return $this->datesentreturn;
    }

    public function setDatesentreturn(?\DateTimeInterface $datesentreturn): self
    {
        $this->datesentreturn = $datesentreturn;

        return $this;
    }

    public function getReceivedstatus(): ?string
    {
        return $this->receivedstatus;
    }

    public function setReceivedstatus(?string $receivedstatus): self
    {
        $this->receivedstatus = $receivedstatus;

        return $this;
    }

    public function getTotalboxes(): ?int
    {
        return $this->totalboxes;
    }

    public function setTotalboxes(?int $totalboxes): self
    {
        $this->totalboxes = $totalboxes;

        return $this;
    }

    public function getTotalboxesreturned(): ?int
    {
        return $this->totalboxesreturned;
    }

    public function setTotalboxesreturned(?int $totalboxesreturned): self
    {
        $this->totalboxesreturned = $totalboxesreturned;

        return $this;
    }

    public function getNumspecimens(): ?int
    {
        return $this->numspecimens;
    }

    public function setNumspecimens(?int $numspecimens): self
    {
        $this->numspecimens = $numspecimens;

        return $this;
    }

    public function getShippingmethod(): ?string
    {
        return $this->shippingmethod;
    }

    public function setShippingmethod(?string $shippingmethod): self
    {
        $this->shippingmethod = $shippingmethod;

        return $this;
    }

    public function getShippingmethodreturn(): ?string
    {
        return $this->shippingmethodreturn;
    }

    public function setShippingmethodreturn(?string $shippingmethodreturn): self
    {
        $this->shippingmethodreturn = $shippingmethodreturn;

        return $this;
    }

    public function getDatedue(): ?\DateTimeInterface
    {
        return $this->datedue;
    }

    public function setDatedue(?\DateTimeInterface $datedue): self
    {
        $this->datedue = $datedue;

        return $this;
    }

    public function getDatereceivedown(): ?\DateTimeInterface
    {
        return $this->datereceivedown;
    }

    public function setDatereceivedown(?\DateTimeInterface $datereceivedown): self
    {
        $this->datereceivedown = $datereceivedown;

        return $this;
    }

    public function getDatereceivedborr(): ?\DateTimeInterface
    {
        return $this->datereceivedborr;
    }

    public function setDatereceivedborr(?\DateTimeInterface $datereceivedborr): self
    {
        $this->datereceivedborr = $datereceivedborr;

        return $this;
    }

    public function getDateclosed(): ?\DateTimeInterface
    {
        return $this->dateclosed;
    }

    public function setDateclosed(?\DateTimeInterface $dateclosed): self
    {
        $this->dateclosed = $dateclosed;

        return $this;
    }

    public function getForwhom(): ?string
    {
        return $this->forwhom;
    }

    public function setForwhom(?string $forwhom): self
    {
        $this->forwhom = $forwhom;

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

    public function getInvoicemessageown(): ?string
    {
        return $this->invoicemessageown;
    }

    public function setInvoicemessageown(?string $invoicemessageown): self
    {
        $this->invoicemessageown = $invoicemessageown;

        return $this;
    }

    public function getInvoicemessageborr(): ?string
    {
        return $this->invoicemessageborr;
    }

    public function setInvoicemessageborr(?string $invoicemessageborr): self
    {
        $this->invoicemessageborr = $invoicemessageborr;

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

    public function getCreatedbyown(): ?string
    {
        return $this->createdbyown;
    }

    public function setCreatedbyown(?string $createdbyown): self
    {
        $this->createdbyown = $createdbyown;

        return $this;
    }

    public function getCreatedbyborr(): ?string
    {
        return $this->createdbyborr;
    }

    public function setCreatedbyborr(?string $createdbyborr): self
    {
        $this->createdbyborr = $createdbyborr;

        return $this;
    }

    public function getProcessingstatus(): ?int
    {
        return $this->processingstatus;
    }

    public function setProcessingstatus(?int $processingstatus): self
    {
        $this->processingstatus = $processingstatus;

        return $this;
    }

    public function getProcessedbyown(): ?string
    {
        return $this->processedbyown;
    }

    public function setProcessedbyown(?string $processedbyown): self
    {
        $this->processedbyown = $processedbyown;

        return $this;
    }

    public function getProcessedbyborr(): ?string
    {
        return $this->processedbyborr;
    }

    public function setProcessedbyborr(?string $processedbyborr): self
    {
        $this->processedbyborr = $processedbyborr;

        return $this;
    }

    public function getProcessedbyreturnown(): ?string
    {
        return $this->processedbyreturnown;
    }

    public function setProcessedbyreturnown(?string $processedbyreturnown): self
    {
        $this->processedbyreturnown = $processedbyreturnown;

        return $this;
    }

    public function getProcessedbyreturnborr(): ?string
    {
        return $this->processedbyreturnborr;
    }

    public function setProcessedbyreturnborr(?string $processedbyreturnborr): self
    {
        $this->processedbyreturnborr = $processedbyreturnborr;

        return $this;
    }

    public function getInitialtimestamp(): ?\DateTimeInterface
    {
        return $this->initialtimestamp;
    }

    public function setInitialtimestamp(\DateTimeInterface $initialtimestamp): self
    {
        $this->initialtimestamp = $initialtimestamp;

        return $this;
    }

    public function getCollidown(): ?Omcollections
    {
        return $this->collidown;
    }

    public function setCollidown(?Omcollections $collidown): self
    {
        $this->collidown = $collidown;

        return $this;
    }

    public function getIidborrower(): ?Institutions
    {
        return $this->iidborrower;
    }

    public function setIidborrower(?Institutions $iidborrower): self
    {
        $this->iidborrower = $iidborrower;

        return $this;
    }

    public function getCollidborr(): ?Omcollections
    {
        return $this->collidborr;
    }

    public function setCollidborr(?Omcollections $collidborr): self
    {
        $this->collidborr = $collidborr;

        return $this;
    }

    public function getIidowner(): ?Institutions
    {
        return $this->iidowner;
    }

    public function setIidowner(?Institutions $iidowner): self
    {
        $this->iidowner = $iidowner;

        return $this;
    }

    /**
     * @return Collection|Omoccurrences[]
     */
    public function getOccid(): Collection
    {
        return $this->occid;
    }

    public function addOccid(Omoccurrences $occid): self
    {
        if (!$this->occid->contains($occid)) {
            $this->occid[] = $occid;
        }

        return $this;
    }

    public function removeOccid(Omoccurrences $occid): self
    {
        if ($this->occid->contains($occid)) {
            $this->occid->removeElement($occid);
        }

        return $this;
    }

}
