<?php

namespace App\Entities;

use Doctrine\ORM\Mapping as ORM;

/**
 * Omoccurexchange
 *
 * @ORM\Table(name="omoccurexchange", indexes={@ORM\Index(name="FK_occexch_coll", columns={"collid"})})
 * @ORM\Entity
 */
class Omoccurexchange
{
    /**
     * @var int
     *
     * @ORM\Column(name="exchangeid", type="integer", precision=0, scale=0, nullable=false, options={"unsigned"=true}, unique=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $exchangeid;

    /**
     * @var string|null
     *
     * @ORM\Column(name="identifier", type="string", length=30, precision=0, scale=0, nullable=true, unique=false)
     */
    private $identifier;

    /**
     * @var int|null
     *
     * @ORM\Column(name="iid", type="integer", precision=0, scale=0, nullable=true, options={"unsigned"=true}, unique=false)
     */
    private $iid;

    /**
     * @var string|null
     *
     * @ORM\Column(name="transactionType", type="string", length=10, precision=0, scale=0, nullable=true, unique=false)
     */
    private $transactiontype;

    /**
     * @var string|null
     *
     * @ORM\Column(name="in_out", type="string", length=3, precision=0, scale=0, nullable=true, unique=false)
     */
    private $inOut;

    /**
     * @var \DateTime|null
     *
     * @ORM\Column(name="dateSent", type="date", precision=0, scale=0, nullable=true, unique=false)
     */
    private $datesent;

    /**
     * @var \DateTime|null
     *
     * @ORM\Column(name="dateReceived", type="date", precision=0, scale=0, nullable=true, unique=false)
     */
    private $datereceived;

    /**
     * @var int|null
     *
     * @ORM\Column(name="totalBoxes", type="integer", precision=0, scale=0, nullable=true, unique=false)
     */
    private $totalboxes;

    /**
     * @var string|null
     *
     * @ORM\Column(name="shippingMethod", type="string", length=50, precision=0, scale=0, nullable=true, unique=false)
     */
    private $shippingmethod;

    /**
     * @var int|null
     *
     * @ORM\Column(name="totalExMounted", type="integer", precision=0, scale=0, nullable=true, unique=false)
     */
    private $totalexmounted;

    /**
     * @var int|null
     *
     * @ORM\Column(name="totalExUnmounted", type="integer", precision=0, scale=0, nullable=true, unique=false)
     */
    private $totalexunmounted;

    /**
     * @var int|null
     *
     * @ORM\Column(name="totalGift", type="integer", precision=0, scale=0, nullable=true, unique=false)
     */
    private $totalgift;

    /**
     * @var int|null
     *
     * @ORM\Column(name="totalGiftDet", type="integer", precision=0, scale=0, nullable=true, unique=false)
     */
    private $totalgiftdet;

    /**
     * @var int|null
     *
     * @ORM\Column(name="adjustment", type="integer", precision=0, scale=0, nullable=true, unique=false)
     */
    private $adjustment;

    /**
     * @var int|null
     *
     * @ORM\Column(name="invoiceBalance", type="integer", precision=0, scale=0, nullable=true, unique=false)
     */
    private $invoicebalance;

    /**
     * @var string|null
     *
     * @ORM\Column(name="invoiceMessage", type="string", length=500, precision=0, scale=0, nullable=true, unique=false)
     */
    private $invoicemessage;

    /**
     * @var string|null
     *
     * @ORM\Column(name="description", type="string", length=1000, precision=0, scale=0, nullable=true, unique=false)
     */
    private $description;

    /**
     * @var string|null
     *
     * @ORM\Column(name="notes", type="string", length=500, precision=0, scale=0, nullable=true, unique=false)
     */
    private $notes;

    /**
     * @var string|null
     *
     * @ORM\Column(name="createdBy", type="string", length=20, precision=0, scale=0, nullable=true, unique=false)
     */
    private $createdby;

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
     *   @ORM\JoinColumn(name="collid", referencedColumnName="CollID", nullable=true)
     * })
     */
    private $collid;


    /**
     * Get exchangeid.
     *
     * @return int
     */
    public function getExchangeid()
    {
        return $this->exchangeid;
    }

    /**
     * Set identifier.
     *
     * @param string|null $identifier
     *
     * @return Omoccurexchange
     */
    public function setIdentifier($identifier = null)
    {
        $this->identifier = $identifier;

        return $this;
    }

    /**
     * Get identifier.
     *
     * @return string|null
     */
    public function getIdentifier()
    {
        return $this->identifier;
    }

    /**
     * Set iid.
     *
     * @param int|null $iid
     *
     * @return Omoccurexchange
     */
    public function setIid($iid = null)
    {
        $this->iid = $iid;

        return $this;
    }

    /**
     * Get iid.
     *
     * @return int|null
     */
    public function getIid()
    {
        return $this->iid;
    }

    /**
     * Set transactiontype.
     *
     * @param string|null $transactiontype
     *
     * @return Omoccurexchange
     */
    public function setTransactiontype($transactiontype = null)
    {
        $this->transactiontype = $transactiontype;

        return $this;
    }

    /**
     * Get transactiontype.
     *
     * @return string|null
     */
    public function getTransactiontype()
    {
        return $this->transactiontype;
    }

    /**
     * Set inOut.
     *
     * @param string|null $inOut
     *
     * @return Omoccurexchange
     */
    public function setInOut($inOut = null)
    {
        $this->inOut = $inOut;

        return $this;
    }

    /**
     * Get inOut.
     *
     * @return string|null
     */
    public function getInOut()
    {
        return $this->inOut;
    }

    /**
     * Set datesent.
     *
     * @param \DateTime|null $datesent
     *
     * @return Omoccurexchange
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
     * Set datereceived.
     *
     * @param \DateTime|null $datereceived
     *
     * @return Omoccurexchange
     */
    public function setDatereceived($datereceived = null)
    {
        $this->datereceived = $datereceived;

        return $this;
    }

    /**
     * Get datereceived.
     *
     * @return \DateTime|null
     */
    public function getDatereceived()
    {
        return $this->datereceived;
    }

    /**
     * Set totalboxes.
     *
     * @param int|null $totalboxes
     *
     * @return Omoccurexchange
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
     * Set shippingmethod.
     *
     * @param string|null $shippingmethod
     *
     * @return Omoccurexchange
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
     * Set totalexmounted.
     *
     * @param int|null $totalexmounted
     *
     * @return Omoccurexchange
     */
    public function setTotalexmounted($totalexmounted = null)
    {
        $this->totalexmounted = $totalexmounted;

        return $this;
    }

    /**
     * Get totalexmounted.
     *
     * @return int|null
     */
    public function getTotalexmounted()
    {
        return $this->totalexmounted;
    }

    /**
     * Set totalexunmounted.
     *
     * @param int|null $totalexunmounted
     *
     * @return Omoccurexchange
     */
    public function setTotalexunmounted($totalexunmounted = null)
    {
        $this->totalexunmounted = $totalexunmounted;

        return $this;
    }

    /**
     * Get totalexunmounted.
     *
     * @return int|null
     */
    public function getTotalexunmounted()
    {
        return $this->totalexunmounted;
    }

    /**
     * Set totalgift.
     *
     * @param int|null $totalgift
     *
     * @return Omoccurexchange
     */
    public function setTotalgift($totalgift = null)
    {
        $this->totalgift = $totalgift;

        return $this;
    }

    /**
     * Get totalgift.
     *
     * @return int|null
     */
    public function getTotalgift()
    {
        return $this->totalgift;
    }

    /**
     * Set totalgiftdet.
     *
     * @param int|null $totalgiftdet
     *
     * @return Omoccurexchange
     */
    public function setTotalgiftdet($totalgiftdet = null)
    {
        $this->totalgiftdet = $totalgiftdet;

        return $this;
    }

    /**
     * Get totalgiftdet.
     *
     * @return int|null
     */
    public function getTotalgiftdet()
    {
        return $this->totalgiftdet;
    }

    /**
     * Set adjustment.
     *
     * @param int|null $adjustment
     *
     * @return Omoccurexchange
     */
    public function setAdjustment($adjustment = null)
    {
        $this->adjustment = $adjustment;

        return $this;
    }

    /**
     * Get adjustment.
     *
     * @return int|null
     */
    public function getAdjustment()
    {
        return $this->adjustment;
    }

    /**
     * Set invoicebalance.
     *
     * @param int|null $invoicebalance
     *
     * @return Omoccurexchange
     */
    public function setInvoicebalance($invoicebalance = null)
    {
        $this->invoicebalance = $invoicebalance;

        return $this;
    }

    /**
     * Get invoicebalance.
     *
     * @return int|null
     */
    public function getInvoicebalance()
    {
        return $this->invoicebalance;
    }

    /**
     * Set invoicemessage.
     *
     * @param string|null $invoicemessage
     *
     * @return Omoccurexchange
     */
    public function setInvoicemessage($invoicemessage = null)
    {
        $this->invoicemessage = $invoicemessage;

        return $this;
    }

    /**
     * Get invoicemessage.
     *
     * @return string|null
     */
    public function getInvoicemessage()
    {
        return $this->invoicemessage;
    }

    /**
     * Set description.
     *
     * @param string|null $description
     *
     * @return Omoccurexchange
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
     * Set notes.
     *
     * @param string|null $notes
     *
     * @return Omoccurexchange
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
     * Set createdby.
     *
     * @param string|null $createdby
     *
     * @return Omoccurexchange
     */
    public function setCreatedby($createdby = null)
    {
        $this->createdby = $createdby;

        return $this;
    }

    /**
     * Get createdby.
     *
     * @return string|null
     */
    public function getCreatedby()
    {
        return $this->createdby;
    }

    /**
     * Set initialtimestamp.
     *
     * @param \DateTime $initialtimestamp
     *
     * @return Omoccurexchange
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
     * Set collid.
     *
     * @param \App\Entities\Omcollections|null $collid
     *
     * @return Omoccurexchange
     */
    public function setCollid(\App\Entities\Omcollections $collid = null)
    {
        $this->collid = $collid;

        return $this;
    }

    /**
     * Get collid.
     *
     * @return \App\Entities\Omcollections|null
     */
    public function getCollid()
    {
        return $this->collid;
    }
}
