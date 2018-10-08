<?php

namespace App\Entities;

use Doctrine\ORM\Mapping as ORM;

/**
 * Omoccurloans
 *
 * @ORM\Table(name="omoccurloans", indexes={@ORM\Index(name="FK_occurloans_owninst", columns={"iidOwner"}), @ORM\Index(name="FK_occurloans_borrinst", columns={"iidBorrower"}), @ORM\Index(name="FK_occurloans_owncoll", columns={"collidOwn"}), @ORM\Index(name="FK_occurloans_borrcoll", columns={"collidBorr"})})
 * @ORM\Entity
 */
class Omoccurloans
{
    /**
     * @var int
     *
     * @ORM\Column(name="loanid", type="integer", precision=0, scale=0, nullable=false, options={"unsigned"=true}, unique=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $loanid;

    /**
     * @var string|null
     *
     * @ORM\Column(name="loanIdentifierOwn", type="string", length=30, precision=0, scale=0, nullable=true, unique=false)
     */
    private $loanidentifierown;

    /**
     * @var string|null
     *
     * @ORM\Column(name="loanIdentifierBorr", type="string", length=30, precision=0, scale=0, nullable=true, unique=false)
     */
    private $loanidentifierborr;

    /**
     * @var \DateTime|null
     *
     * @ORM\Column(name="dateSent", type="date", precision=0, scale=0, nullable=true, unique=false)
     */
    private $datesent;

    /**
     * @var \DateTime|null
     *
     * @ORM\Column(name="dateSentReturn", type="date", precision=0, scale=0, nullable=true, unique=false)
     */
    private $datesentreturn;

    /**
     * @var string|null
     *
     * @ORM\Column(name="receivedStatus", type="string", length=250, precision=0, scale=0, nullable=true, unique=false)
     */
    private $receivedstatus;

    /**
     * @var int|null
     *
     * @ORM\Column(name="totalBoxes", type="integer", precision=0, scale=0, nullable=true, unique=false)
     */
    private $totalboxes;

    /**
     * @var int|null
     *
     * @ORM\Column(name="totalBoxesReturned", type="integer", precision=0, scale=0, nullable=true, unique=false)
     */
    private $totalboxesreturned;

    /**
     * @var int|null
     *
     * @ORM\Column(name="numSpecimens", type="integer", precision=0, scale=0, nullable=true, unique=false)
     */
    private $numspecimens;

    /**
     * @var string|null
     *
     * @ORM\Column(name="shippingMethod", type="string", length=50, precision=0, scale=0, nullable=true, unique=false)
     */
    private $shippingmethod;

    /**
     * @var string|null
     *
     * @ORM\Column(name="shippingMethodReturn", type="string", length=50, precision=0, scale=0, nullable=true, unique=false)
     */
    private $shippingmethodreturn;

    /**
     * @var \DateTime|null
     *
     * @ORM\Column(name="dateDue", type="date", precision=0, scale=0, nullable=true, unique=false)
     */
    private $datedue;

    /**
     * @var \DateTime|null
     *
     * @ORM\Column(name="dateReceivedOwn", type="date", precision=0, scale=0, nullable=true, unique=false)
     */
    private $datereceivedown;

    /**
     * @var \DateTime|null
     *
     * @ORM\Column(name="dateReceivedBorr", type="date", precision=0, scale=0, nullable=true, unique=false)
     */
    private $datereceivedborr;

    /**
     * @var \DateTime|null
     *
     * @ORM\Column(name="dateClosed", type="date", precision=0, scale=0, nullable=true, unique=false)
     */
    private $dateclosed;

    /**
     * @var string|null
     *
     * @ORM\Column(name="forWhom", type="string", length=50, precision=0, scale=0, nullable=true, unique=false)
     */
    private $forwhom;

    /**
     * @var string|null
     *
     * @ORM\Column(name="description", type="string", length=1000, precision=0, scale=0, nullable=true, unique=false)
     */
    private $description;

    /**
     * @var string|null
     *
     * @ORM\Column(name="invoiceMessageOwn", type="string", length=500, precision=0, scale=0, nullable=true, unique=false)
     */
    private $invoicemessageown;

    /**
     * @var string|null
     *
     * @ORM\Column(name="invoiceMessageBorr", type="string", length=500, precision=0, scale=0, nullable=true, unique=false)
     */
    private $invoicemessageborr;

    /**
     * @var string|null
     *
     * @ORM\Column(name="notes", type="string", length=500, precision=0, scale=0, nullable=true, unique=false)
     */
    private $notes;

    /**
     * @var string|null
     *
     * @ORM\Column(name="createdByOwn", type="string", length=30, precision=0, scale=0, nullable=true, unique=false)
     */
    private $createdbyown;

    /**
     * @var string|null
     *
     * @ORM\Column(name="createdByBorr", type="string", length=30, precision=0, scale=0, nullable=true, unique=false)
     */
    private $createdbyborr;

    /**
     * @var int|null
     *
     * @ORM\Column(name="processingStatus", type="integer", precision=0, scale=0, nullable=true, options={"default"="1","unsigned"=true}, unique=false)
     */
    private $processingstatus = '1';

    /**
     * @var string|null
     *
     * @ORM\Column(name="processedByOwn", type="string", length=30, precision=0, scale=0, nullable=true, unique=false)
     */
    private $processedbyown;

    /**
     * @var string|null
     *
     * @ORM\Column(name="processedByBorr", type="string", length=30, precision=0, scale=0, nullable=true, unique=false)
     */
    private $processedbyborr;

    /**
     * @var string|null
     *
     * @ORM\Column(name="processedByReturnOwn", type="string", length=30, precision=0, scale=0, nullable=true, unique=false)
     */
    private $processedbyreturnown;

    /**
     * @var string|null
     *
     * @ORM\Column(name="processedByReturnBorr", type="string", length=30, precision=0, scale=0, nullable=true, unique=false)
     */
    private $processedbyreturnborr;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="initialTimestamp", type="datetime", precision=0, scale=0, nullable=false, options={"default"="CURRENT_TIMESTAMP"}, unique=false)
     */
    private $initialtimestamp = 'CURRENT_TIMESTAMP';

    /**
     * @var \App\Entities\Omcollections
     *
     * @ORM\ManyToOne(targetEntity="App\Entities\Omcollections")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="collidBorr", referencedColumnName="CollID", nullable=true)
     * })
     */
    private $collidborr;

    /**
     * @var \App\Entities\Institutions
     *
     * @ORM\ManyToOne(targetEntity="App\Entities\Institutions")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="iidBorrower", referencedColumnName="iid", nullable=true)
     * })
     */
    private $iidborrower;

    /**
     * @var \App\Entities\Omcollections
     *
     * @ORM\ManyToOne(targetEntity="App\Entities\Omcollections")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="collidOwn", referencedColumnName="CollID", nullable=true)
     * })
     */
    private $collidown;

    /**
     * @var \App\Entities\Institutions
     *
     * @ORM\ManyToOne(targetEntity="App\Entities\Institutions")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="iidOwner", referencedColumnName="iid", nullable=true)
     * })
     */
    private $iidowner;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="App\Entities\Omoccurrences", inversedBy="loanid")
     * @ORM\JoinTable(name="omoccurloanslink",
     *   joinColumns={
     *     @ORM\JoinColumn(name="loanid", referencedColumnName="loanid", nullable=true)
     *   },
     *   inverseJoinColumns={
     *     @ORM\JoinColumn(name="occid", referencedColumnName="occid", nullable=true)
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

    /**
     * Get loanid.
     *
     * @return int
     */
    public function getLoanid()
    {
        return $this->loanid;
    }

    /**
     * Set loanidentifierown.
     *
     * @param string|null $loanidentifierown
     *
     * @return Omoccurloans
     */
    public function setLoanidentifierown($loanidentifierown = null)
    {
        $this->loanidentifierown = $loanidentifierown;

        return $this;
    }

    /**
     * Get loanidentifierown.
     *
     * @return string|null
     */
    public function getLoanidentifierown()
    {
        return $this->loanidentifierown;
    }

    /**
     * Set loanidentifierborr.
     *
     * @param string|null $loanidentifierborr
     *
     * @return Omoccurloans
     */
    public function setLoanidentifierborr($loanidentifierborr = null)
    {
        $this->loanidentifierborr = $loanidentifierborr;

        return $this;
    }

    /**
     * Get loanidentifierborr.
     *
     * @return string|null
     */
    public function getLoanidentifierborr()
    {
        return $this->loanidentifierborr;
    }

    /**
     * Set datesent.
     *
     * @param \DateTime|null $datesent
     *
     * @return Omoccurloans
     */
    public function setDatesent($datesent = null)
    {
        $this->datesent = $datesent;

        return $this;
    }

    /**
     * Get datesent.
     *
     * @return \DateTime|null
     */
    public function getDatesent()
    {
        return $this->datesent;
    }

    /**
     * Set datesentreturn.
     *
     * @param \DateTime|null $datesentreturn
     *
     * @return Omoccurloans
     */
    public function setDatesentreturn($datesentreturn = null)
    {
        $this->datesentreturn = $datesentreturn;

        return $this;
    }

    /**
     * Get datesentreturn.
     *
     * @return \DateTime|null
     */
    public function getDatesentreturn()
    {
        return $this->datesentreturn;
    }

    /**
     * Set receivedstatus.
     *
     * @param string|null $receivedstatus
     *
     * @return Omoccurloans
     */
    public function setReceivedstatus($receivedstatus = null)
    {
        $this->receivedstatus = $receivedstatus;

        return $this;
    }

    /**
     * Get receivedstatus.
     *
     * @return string|null
     */
    public function getReceivedstatus()
    {
        return $this->receivedstatus;
    }

    /**
     * Set totalboxes.
     *
     * @param int|null $totalboxes
     *
     * @return Omoccurloans
     */
    public function setTotalboxes($totalboxes = null)
    {
        $this->totalboxes = $totalboxes;

        return $this;
    }

    /**
     * Get totalboxes.
     *
     * @return int|null
     */
    public function getTotalboxes()
    {
        return $this->totalboxes;
    }

    /**
     * Set totalboxesreturned.
     *
     * @param int|null $totalboxesreturned
     *
     * @return Omoccurloans
     */
    public function setTotalboxesreturned($totalboxesreturned = null)
    {
        $this->totalboxesreturned = $totalboxesreturned;

        return $this;
    }

    /**
     * Get totalboxesreturned.
     *
     * @return int|null
     */
    public function getTotalboxesreturned()
    {
        return $this->totalboxesreturned;
    }

    /**
     * Set numspecimens.
     *
     * @param int|null $numspecimens
     *
     * @return Omoccurloans
     */
    public function setNumspecimens($numspecimens = null)
    {
        $this->numspecimens = $numspecimens;

        return $this;
    }

    /**
     * Get numspecimens.
     *
     * @return int|null
     */
    public function getNumspecimens()
    {
        return $this->numspecimens;
    }

    /**
     * Set shippingmethod.
     *
     * @param string|null $shippingmethod
     *
     * @return Omoccurloans
     */
    public function setShippingmethod($shippingmethod = null)
    {
        $this->shippingmethod = $shippingmethod;

        return $this;
    }

    /**
     * Get shippingmethod.
     *
     * @return string|null
     */
    public function getShippingmethod()
    {
        return $this->shippingmethod;
    }

    /**
     * Set shippingmethodreturn.
     *
     * @param string|null $shippingmethodreturn
     *
     * @return Omoccurloans
     */
    public function setShippingmethodreturn($shippingmethodreturn = null)
    {
        $this->shippingmethodreturn = $shippingmethodreturn;

        return $this;
    }

    /**
     * Get shippingmethodreturn.
     *
     * @return string|null
     */
    public function getShippingmethodreturn()
    {
        return $this->shippingmethodreturn;
    }

    /**
     * Set datedue.
     *
     * @param \DateTime|null $datedue
     *
     * @return Omoccurloans
     */
    public function setDatedue($datedue = null)
    {
        $this->datedue = $datedue;

        return $this;
    }

    /**
     * Get datedue.
     *
     * @return \DateTime|null
     */
    public function getDatedue()
    {
        return $this->datedue;
    }

    /**
     * Set datereceivedown.
     *
     * @param \DateTime|null $datereceivedown
     *
     * @return Omoccurloans
     */
    public function setDatereceivedown($datereceivedown = null)
    {
        $this->datereceivedown = $datereceivedown;

        return $this;
    }

    /**
     * Get datereceivedown.
     *
     * @return \DateTime|null
     */
    public function getDatereceivedown()
    {
        return $this->datereceivedown;
    }

    /**
     * Set datereceivedborr.
     *
     * @param \DateTime|null $datereceivedborr
     *
     * @return Omoccurloans
     */
    public function setDatereceivedborr($datereceivedborr = null)
    {
        $this->datereceivedborr = $datereceivedborr;

        return $this;
    }

    /**
     * Get datereceivedborr.
     *
     * @return \DateTime|null
     */
    public function getDatereceivedborr()
    {
        return $this->datereceivedborr;
    }

    /**
     * Set dateclosed.
     *
     * @param \DateTime|null $dateclosed
     *
     * @return Omoccurloans
     */
    public function setDateclosed($dateclosed = null)
    {
        $this->dateclosed = $dateclosed;

        return $this;
    }

    /**
     * Get dateclosed.
     *
     * @return \DateTime|null
     */
    public function getDateclosed()
    {
        return $this->dateclosed;
    }

    /**
     * Set forwhom.
     *
     * @param string|null $forwhom
     *
     * @return Omoccurloans
     */
    public function setForwhom($forwhom = null)
    {
        $this->forwhom = $forwhom;

        return $this;
    }

    /**
     * Get forwhom.
     *
     * @return string|null
     */
    public function getForwhom()
    {
        return $this->forwhom;
    }

    /**
     * Set description.
     *
     * @param string|null $description
     *
     * @return Omoccurloans
     */
    public function setDescription($description = null)
    {
        $this->description = $description;

        return $this;
    }

    /**
     * Get description.
     *
     * @return string|null
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Set invoicemessageown.
     *
     * @param string|null $invoicemessageown
     *
     * @return Omoccurloans
     */
    public function setInvoicemessageown($invoicemessageown = null)
    {
        $this->invoicemessageown = $invoicemessageown;

        return $this;
    }

    /**
     * Get invoicemessageown.
     *
     * @return string|null
     */
    public function getInvoicemessageown()
    {
        return $this->invoicemessageown;
    }

    /**
     * Set invoicemessageborr.
     *
     * @param string|null $invoicemessageborr
     *
     * @return Omoccurloans
     */
    public function setInvoicemessageborr($invoicemessageborr = null)
    {
        $this->invoicemessageborr = $invoicemessageborr;

        return $this;
    }

    /**
     * Get invoicemessageborr.
     *
     * @return string|null
     */
    public function getInvoicemessageborr()
    {
        return $this->invoicemessageborr;
    }

    /**
     * Set notes.
     *
     * @param string|null $notes
     *
     * @return Omoccurloans
     */
    public function setNotes($notes = null)
    {
        $this->notes = $notes;

        return $this;
    }

    /**
     * Get notes.
     *
     * @return string|null
     */
    public function getNotes()
    {
        return $this->notes;
    }

    /**
     * Set createdbyown.
     *
     * @param string|null $createdbyown
     *
     * @return Omoccurloans
     */
    public function setCreatedbyown($createdbyown = null)
    {
        $this->createdbyown = $createdbyown;

        return $this;
    }

    /**
     * Get createdbyown.
     *
     * @return string|null
     */
    public function getCreatedbyown()
    {
        return $this->createdbyown;
    }

    /**
     * Set createdbyborr.
     *
     * @param string|null $createdbyborr
     *
     * @return Omoccurloans
     */
    public function setCreatedbyborr($createdbyborr = null)
    {
        $this->createdbyborr = $createdbyborr;

        return $this;
    }

    /**
     * Get createdbyborr.
     *
     * @return string|null
     */
    public function getCreatedbyborr()
    {
        return $this->createdbyborr;
    }

    /**
     * Set processingstatus.
     *
     * @param int|null $processingstatus
     *
     * @return Omoccurloans
     */
    public function setProcessingstatus($processingstatus = null)
    {
        $this->processingstatus = $processingstatus;

        return $this;
    }

    /**
     * Get processingstatus.
     *
     * @return int|null
     */
    public function getProcessingstatus()
    {
        return $this->processingstatus;
    }

    /**
     * Set processedbyown.
     *
     * @param string|null $processedbyown
     *
     * @return Omoccurloans
     */
    public function setProcessedbyown($processedbyown = null)
    {
        $this->processedbyown = $processedbyown;

        return $this;
    }

    /**
     * Get processedbyown.
     *
     * @return string|null
     */
    public function getProcessedbyown()
    {
        return $this->processedbyown;
    }

    /**
     * Set processedbyborr.
     *
     * @param string|null $processedbyborr
     *
     * @return Omoccurloans
     */
    public function setProcessedbyborr($processedbyborr = null)
    {
        $this->processedbyborr = $processedbyborr;

        return $this;
    }

    /**
     * Get processedbyborr.
     *
     * @return string|null
     */
    public function getProcessedbyborr()
    {
        return $this->processedbyborr;
    }

    /**
     * Set processedbyreturnown.
     *
     * @param string|null $processedbyreturnown
     *
     * @return Omoccurloans
     */
    public function setProcessedbyreturnown($processedbyreturnown = null)
    {
        $this->processedbyreturnown = $processedbyreturnown;

        return $this;
    }

    /**
     * Get processedbyreturnown.
     *
     * @return string|null
     */
    public function getProcessedbyreturnown()
    {
        return $this->processedbyreturnown;
    }

    /**
     * Set processedbyreturnborr.
     *
     * @param string|null $processedbyreturnborr
     *
     * @return Omoccurloans
     */
    public function setProcessedbyreturnborr($processedbyreturnborr = null)
    {
        $this->processedbyreturnborr = $processedbyreturnborr;

        return $this;
    }

    /**
     * Get processedbyreturnborr.
     *
     * @return string|null
     */
    public function getProcessedbyreturnborr()
    {
        return $this->processedbyreturnborr;
    }

    /**
     * Set initialtimestamp.
     *
     * @param \DateTime $initialtimestamp
     *
     * @return Omoccurloans
     */
    public function setInitialtimestamp($initialtimestamp)
    {
        $this->initialtimestamp = $initialtimestamp;

        return $this;
    }

    /**
     * Get initialtimestamp.
     *
     * @return \DateTime
     */
    public function getInitialtimestamp()
    {
        return $this->initialtimestamp;
    }

    /**
     * Set collidborr.
     *
     * @param \App\Entities\Omcollections|null $collidborr
     *
     * @return Omoccurloans
     */
    public function setCollidborr(\App\Entities\Omcollections $collidborr = null)
    {
        $this->collidborr = $collidborr;

        return $this;
    }

    /**
     * Get collidborr.
     *
     * @return \App\Entities\Omcollections|null
     */
    public function getCollidborr()
    {
        return $this->collidborr;
    }

    /**
     * Set iidborrower.
     *
     * @param \App\Entities\Institutions|null $iidborrower
     *
     * @return Omoccurloans
     */
    public function setIidborrower(\App\Entities\Institutions $iidborrower = null)
    {
        $this->iidborrower = $iidborrower;

        return $this;
    }

    /**
     * Get iidborrower.
     *
     * @return \App\Entities\Institutions|null
     */
    public function getIidborrower()
    {
        return $this->iidborrower;
    }

    /**
     * Set collidown.
     *
     * @param \App\Entities\Omcollections|null $collidown
     *
     * @return Omoccurloans
     */
    public function setCollidown(\App\Entities\Omcollections $collidown = null)
    {
        $this->collidown = $collidown;

        return $this;
    }

    /**
     * Get collidown.
     *
     * @return \App\Entities\Omcollections|null
     */
    public function getCollidown()
    {
        return $this->collidown;
    }

    /**
     * Set iidowner.
     *
     * @param \App\Entities\Institutions|null $iidowner
     *
     * @return Omoccurloans
     */
    public function setIidowner(\App\Entities\Institutions $iidowner = null)
    {
        $this->iidowner = $iidowner;

        return $this;
    }

    /**
     * Get iidowner.
     *
     * @return \App\Entities\Institutions|null
     */
    public function getIidowner()
    {
        return $this->iidowner;
    }

    /**
     * Add occid.
     *
     * @param \App\Entities\Omoccurrences $occid
     *
     * @return Omoccurloans
     */
    public function addOccid(\App\Entities\Omoccurrences $occid)
    {
        $this->occid[] = $occid;

        return $this;
    }

    /**
     * Remove occid.
     *
     * @param \App\Entities\Omoccurrences $occid
     *
     * @return boolean TRUE if this collection contained the specified element, FALSE otherwise.
     */
    public function removeOccid(\App\Entities\Omoccurrences $occid)
    {
        return $this->occid->removeElement($occid);
    }

    /**
     * Get occid.
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getOccid()
    {
        return $this->occid;
    }
}
