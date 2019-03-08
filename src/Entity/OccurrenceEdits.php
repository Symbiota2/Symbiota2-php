<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * OccurrenceEdits
 *
 * @ORM\Table(name="omoccuredits", uniqueConstraints={@ORM\UniqueConstraint(name="guid_UNIQUE_omoccuredits", columns={"guid"})}, indexes={@ORM\Index(name="fk_omoccuredits_occid", columns={"occid"}), @ORM\Index(name="fk_omoccuredits_uid", columns={"uid"})})
 * @ORM\Entity(repositoryClass="App\Repository\OccurrenceEditsRepository")
 */
class OccurrenceEdits
{
    /**
     * @var int
     *
     * @ORM\Column(name="ocedid", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $ocedid;

    /**
     * @var \Occurrences
     *
     * @ORM\ManyToOne(targetEntity="Occurrences")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="occid", referencedColumnName="occid")
     * })
     */
    private $occid;

    /**
     * @var string
     *
     * @ORM\Column(name="FieldName", type="string", length=45, nullable=false)
     */
    private $fieldname;

    /**
     * @var string
     *
     * @ORM\Column(name="FieldValueNew", type="text", length=65535, nullable=false)
     */
    private $fieldvaluenew;

    /**
     * @var string
     *
     * @ORM\Column(name="FieldValueOld", type="text", length=65535, nullable=false)
     */
    private $fieldvalueold;

    /**
     * @var int
     *
     * @ORM\Column(name="ReviewStatus", type="integer", nullable=false, options={"default"="1","comment"="1=Open;2=Pending;3=Closed"})
     */
    private $reviewstatus = '1';

    /**
     * @var int
     *
     * @ORM\Column(name="AppliedStatus", type="integer", nullable=false, options={"comment"="0=Not Applied;1=Applied"})
     */
    private $appliedstatus;

    /**
     * @var int
     *
     * @ORM\Column(name="editType", type="integer", nullable=false, options={"comment"="0=general edit;1=batch edit"})
     */
    private $edittype = '0';

    /**
     * @var string|null
     *
     * @ORM\Column(name="guid", type="string", length=45, nullable=true, options={"default"=NULL})
     */
    private $guid = 'NULL';

    /**
     * @var \Users
     *
     * @ORM\ManyToOne(targetEntity="Users")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="uid", referencedColumnName="uid")
     * })
     */
    private $uid;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="initialtimestamp", type="datetime", nullable=false, options={"default"="CURRENT_TIMESTAMP"})
     */
    private $initialtimestamp = 'CURRENT_TIMESTAMP';

    public function getOcedid(): ?int
    {
        return $this->ocedid;
    }

    public function getFieldname(): ?string
    {
        return $this->fieldname;
    }

    public function setFieldname(string $fieldname): self
    {
        $this->fieldname = $fieldname;

        return $this;
    }

    public function getFieldvaluenew(): ?string
    {
        return $this->fieldvaluenew;
    }

    public function setFieldvaluenew(string $fieldvaluenew): self
    {
        $this->fieldvaluenew = $fieldvaluenew;

        return $this;
    }

    public function getFieldvalueold(): ?string
    {
        return $this->fieldvalueold;
    }

    public function setFieldvalueold(string $fieldvalueold): self
    {
        $this->fieldvalueold = $fieldvalueold;

        return $this;
    }

    public function getReviewstatus(): ?int
    {
        return $this->reviewstatus;
    }

    public function setReviewstatus(int $reviewstatus): self
    {
        $this->reviewstatus = $reviewstatus;

        return $this;
    }

    public function getAppliedstatus(): ?int
    {
        return $this->appliedstatus;
    }

    public function setAppliedstatus(int $appliedstatus): self
    {
        $this->appliedstatus = $appliedstatus;

        return $this;
    }

    public function getEdittype(): ?int
    {
        return $this->edittype;
    }

    public function setEdittype(int $edittype): self
    {
        $this->edittype = $edittype;

        return $this;
    }

    public function getGuid(): ?string
    {
        return $this->guid;
    }

    public function setGuid(?string $guid): self
    {
        $this->guid = $guid;

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

    public function getOccid(): ?Occurrences
    {
        return $this->occid;
    }

    public function setOccid(?Occurrences $occid): self
    {
        $this->occid = $occid;

        return $this;
    }

    public function getUid(): ?Users
    {
        return $this->uid;
    }

    public function setUid(?Users $uid): self
    {
        $this->uid = $uid;

        return $this;
    }


}
