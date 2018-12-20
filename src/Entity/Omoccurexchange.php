<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Omoccurexchange
 *
 * @ORM\Table(name="omoccurexchange", indexes={@ORM\Index(name="FK_occexch_coll", columns={"collid"})})
 * @ORM\Entity(repositoryClass="App\Repository\OmoccurexchangeRepository")
 */
class Omoccurexchange
{
    /**
     * @var int
     *
     * @ORM\Column(name="exchangeid", type="integer", nullable=false, options={"unsigned"=true})
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $exchangeid;

    /**
     * @var string|null
     *
     * @ORM\Column(name="identifier", type="string", length=30, nullable=true, options={"default"="NULL"})
     */
    private $identifier = 'NULL';

    /**
     * @var int|null
     *
     * @ORM\Column(name="iid", type="integer", nullable=true, options={"default"="NULL","unsigned"=true})
     */
    private $iid = 'NULL';

    /**
     * @var string|null
     *
     * @ORM\Column(name="transactionType", type="string", length=10, nullable=true, options={"default"="NULL"})
     */
    private $transactiontype = 'NULL';

    /**
     * @var string|null
     *
     * @ORM\Column(name="in_out", type="string", length=3, nullable=true, options={"default"="NULL"})
     */
    private $inOut = 'NULL';

    /**
     * @var \DateTime|null
     *
     * @ORM\Column(name="dateSent", type="date", nullable=true, options={"default"="NULL"})
     */
    private $datesent = 'NULL';

    /**
     * @var \DateTime|null
     *
     * @ORM\Column(name="dateReceived", type="date", nullable=true, options={"default"="NULL"})
     */
    private $datereceived = 'NULL';

    /**
     * @var int|null
     *
     * @ORM\Column(name="totalBoxes", type="integer", nullable=true, options={"default"="NULL"})
     */
    private $totalboxes = 'NULL';

    /**
     * @var string|null
     *
     * @ORM\Column(name="shippingMethod", type="string", length=50, nullable=true, options={"default"="NULL"})
     */
    private $shippingmethod = 'NULL';

    /**
     * @var int|null
     *
     * @ORM\Column(name="totalExMounted", type="integer", nullable=true, options={"default"="NULL"})
     */
    private $totalexmounted = 'NULL';

    /**
     * @var int|null
     *
     * @ORM\Column(name="totalExUnmounted", type="integer", nullable=true, options={"default"="NULL"})
     */
    private $totalexunmounted = 'NULL';

    /**
     * @var int|null
     *
     * @ORM\Column(name="totalGift", type="integer", nullable=true, options={"default"="NULL"})
     */
    private $totalgift = 'NULL';

    /**
     * @var int|null
     *
     * @ORM\Column(name="totalGiftDet", type="integer", nullable=true, options={"default"="NULL"})
     */
    private $totalgiftdet = 'NULL';

    /**
     * @var int|null
     *
     * @ORM\Column(name="adjustment", type="integer", nullable=true, options={"default"="NULL"})
     */
    private $adjustment = 'NULL';

    /**
     * @var int|null
     *
     * @ORM\Column(name="invoiceBalance", type="integer", nullable=true, options={"default"="NULL"})
     */
    private $invoicebalance = 'NULL';

    /**
     * @var string|null
     *
     * @ORM\Column(name="invoiceMessage", type="string", length=500, nullable=true, options={"default"="NULL"})
     */
    private $invoicemessage = 'NULL';

    /**
     * @var string|null
     *
     * @ORM\Column(name="description", type="string", length=1000, nullable=true, options={"default"="NULL"})
     */
    private $description = 'NULL';

    /**
     * @var string|null
     *
     * @ORM\Column(name="notes", type="string", length=500, nullable=true, options={"default"="NULL"})
     */
    private $notes = 'NULL';

    /**
     * @var string|null
     *
     * @ORM\Column(name="createdBy", type="string", length=20, nullable=true, options={"default"="NULL"})
     */
    private $createdby = 'NULL';

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="initialTimestamp", type="datetime", nullable=false, options={"default"="current_timestamp()"})
     */
    private $initialtimestamp = 'current_timestamp()';

    /**
     * @var \Omcollections
     *
     * @ORM\ManyToOne(targetEntity="Omcollections")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="collid", referencedColumnName="CollID")
     * })
     */
    private $collid;

    public function getExchangeid(): ?int
    {
        return $this->exchangeid;
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

    public function getIid(): ?int
    {
        return $this->iid;
    }

    public function setIid(?int $iid): self
    {
        $this->iid = $iid;

        return $this;
    }

    public function getTransactiontype(): ?string
    {
        return $this->transactiontype;
    }

    public function setTransactiontype(?string $transactiontype): self
    {
        $this->transactiontype = $transactiontype;

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

    public function getDatesent(): ?\DateTimeInterface
    {
        return $this->datesent;
    }

    public function setDatesent(?\DateTimeInterface $datesent): self
    {
        $this->datesent = $datesent;

        return $this;
    }

    public function getDatereceived(): ?\DateTimeInterface
    {
        return $this->datereceived;
    }

    public function setDatereceived(?\DateTimeInterface $datereceived): self
    {
        $this->datereceived = $datereceived;

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

    public function getShippingmethod(): ?string
    {
        return $this->shippingmethod;
    }

    public function setShippingmethod(?string $shippingmethod): self
    {
        $this->shippingmethod = $shippingmethod;

        return $this;
    }

    public function getTotalexmounted(): ?int
    {
        return $this->totalexmounted;
    }

    public function setTotalexmounted(?int $totalexmounted): self
    {
        $this->totalexmounted = $totalexmounted;

        return $this;
    }

    public function getTotalexunmounted(): ?int
    {
        return $this->totalexunmounted;
    }

    public function setTotalexunmounted(?int $totalexunmounted): self
    {
        $this->totalexunmounted = $totalexunmounted;

        return $this;
    }

    public function getTotalgift(): ?int
    {
        return $this->totalgift;
    }

    public function setTotalgift(?int $totalgift): self
    {
        $this->totalgift = $totalgift;

        return $this;
    }

    public function getTotalgiftdet(): ?int
    {
        return $this->totalgiftdet;
    }

    public function setTotalgiftdet(?int $totalgiftdet): self
    {
        $this->totalgiftdet = $totalgiftdet;

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

    public function getInvoicebalance(): ?int
    {
        return $this->invoicebalance;
    }

    public function setInvoicebalance(?int $invoicebalance): self
    {
        $this->invoicebalance = $invoicebalance;

        return $this;
    }

    public function getInvoicemessage(): ?string
    {
        return $this->invoicemessage;
    }

    public function setInvoicemessage(?string $invoicemessage): self
    {
        $this->invoicemessage = $invoicemessage;

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

    public function getCreatedby(): ?string
    {
        return $this->createdby;
    }

    public function setCreatedby(?string $createdby): self
    {
        $this->createdby = $createdby;

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

    public function getCollid(): ?Omcollections
    {
        return $this->collid;
    }

    public function setCollid(?Omcollections $collid): self
    {
        $this->collid = $collid;

        return $this;
    }


}
