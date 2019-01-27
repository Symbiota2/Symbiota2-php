<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Omoccurrevisions
 *
 * @ORM\Table(name="omoccurrevisions", uniqueConstraints={@ORM\UniqueConstraint(name="guid_UNIQUE_omoccurrevisions", columns={"guid"})}, indexes={@ORM\Index(name="fk_omrevisions_uid_idx", columns={"uid"}), @ORM\Index(name="Index_omrevisions_reviewed", columns={"reviewStatus"}), @ORM\Index(name="fk_omrevisions_occid_idx", columns={"occid"}), @ORM\Index(name="Index_omrevisions_applied", columns={"appliedStatus"}), @ORM\Index(name="Index_omrevisions_editor", columns={"externalEditor"}), @ORM\Index(name="Index_omrevisions_source", columns={"externalSource"})})
 * @ORM\Entity(repositoryClass="App\Repository\OmoccurrevisionsRepository")
 */
class Omoccurrevisions
{
    /**
     * @var int
     *
     * @ORM\Column(name="orid", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $orid;

    /**
     * @var string|null
     *
     * @ORM\Column(name="oldValues", type="text", length=65535, nullable=true, options={"default"=NULL})
     */
    private $oldvalues = 'NULL';

    /**
     * @var string|null
     *
     * @ORM\Column(name="newValues", type="text", length=65535, nullable=true, options={"default"=NULL})
     */
    private $newvalues = 'NULL';

    /**
     * @var string|null
     *
     * @ORM\Column(name="externalSource", type="string", length=45, nullable=true, options={"default"=NULL})
     */
    private $externalsource = 'NULL';

    /**
     * @var string|null
     *
     * @ORM\Column(name="externalEditor", type="string", length=100, nullable=true, options={"default"=NULL})
     */
    private $externaleditor = 'NULL';

    /**
     * @var string|null
     *
     * @ORM\Column(name="guid", type="string", length=45, nullable=true, options={"default"=NULL})
     */
    private $guid = 'NULL';

    /**
     * @var int|null
     *
     * @ORM\Column(name="reviewStatus", type="integer", nullable=true, options={"default"=NULL})
     */
    private $reviewstatus = 'NULL';

    /**
     * @var int|null
     *
     * @ORM\Column(name="appliedStatus", type="integer", nullable=true, options={"default"=NULL})
     */
    private $appliedstatus = 'NULL';

    /**
     * @var string|null
     *
     * @ORM\Column(name="errorMessage", type="string", length=500, nullable=true, options={"default"=NULL})
     */
    private $errormessage = 'NULL';

    /**
     * @var \DateTime|null
     *
     * @ORM\Column(name="externalTimestamp", type="datetime", nullable=true, options={"default"=NULL})
     */
    private $externaltimestamp = 'NULL';

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="initialtimestamp", type="datetime", nullable=false, options={"default"="CURRENT_TIMESTAMP"})
     */
    private $initialtimestamp = 'CURRENT_TIMESTAMP';

    /**
     * @var \Omoccurrences
     *
     * @ORM\ManyToOne(targetEntity="Omoccurrences")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="occid", referencedColumnName="occid")
     * })
     */
    private $occid;

    /**
     * @var \Users
     *
     * @ORM\ManyToOne(targetEntity="Users")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="uid", referencedColumnName="uid")
     * })
     */
    private $uid;

    public function getOrid(): ?int
    {
        return $this->orid;
    }

    public function getOldvalues(): ?string
    {
        return $this->oldvalues;
    }

    public function setOldvalues(?string $oldvalues): self
    {
        $this->oldvalues = $oldvalues;

        return $this;
    }

    public function getNewvalues(): ?string
    {
        return $this->newvalues;
    }

    public function setNewvalues(?string $newvalues): self
    {
        $this->newvalues = $newvalues;

        return $this;
    }

    public function getExternalsource(): ?string
    {
        return $this->externalsource;
    }

    public function setExternalsource(?string $externalsource): self
    {
        $this->externalsource = $externalsource;

        return $this;
    }

    public function getExternaleditor(): ?string
    {
        return $this->externaleditor;
    }

    public function setExternaleditor(?string $externaleditor): self
    {
        $this->externaleditor = $externaleditor;

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

    public function getReviewstatus(): ?int
    {
        return $this->reviewstatus;
    }

    public function setReviewstatus(?int $reviewstatus): self
    {
        $this->reviewstatus = $reviewstatus;

        return $this;
    }

    public function getAppliedstatus(): ?int
    {
        return $this->appliedstatus;
    }

    public function setAppliedstatus(?int $appliedstatus): self
    {
        $this->appliedstatus = $appliedstatus;

        return $this;
    }

    public function getErrormessage(): ?string
    {
        return $this->errormessage;
    }

    public function setErrormessage(?string $errormessage): self
    {
        $this->errormessage = $errormessage;

        return $this;
    }

    public function getExternaltimestamp(): ?\DateTimeInterface
    {
        return $this->externaltimestamp;
    }

    public function setExternaltimestamp(?\DateTimeInterface $externaltimestamp): self
    {
        $this->externaltimestamp = $externaltimestamp;

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

    public function getOccid(): ?Omoccurrences
    {
        return $this->occid;
    }

    public function setOccid(?Omoccurrences $occid): self
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
