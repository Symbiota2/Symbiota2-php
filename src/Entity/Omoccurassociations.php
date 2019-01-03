<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Omoccurassociations
 *
 * @ORM\Table(name="omoccurassociations", indexes={@ORM\Index(name="omossococcur_occidassoc_idx", columns={"occidassociate"}), @ORM\Index(name="FK_occurassoc_uidcreated_idx", columns={"createduid"}), @ORM\Index(name="omossococcur_occid_idx", columns={"occid"}), @ORM\Index(name="FK_occurassoc_uidmodified_idx", columns={"modifieduid"}), @ORM\Index(name="INDEX_verbatimSciname", columns={"verbatimsciname"}), @ORM\Index(name="FK_occurassoc_tid_idx", columns={"tid"})})
 * @ORM\Entity(repositoryClass="App\Repository\OmoccurassociationsRepository")
 */
class Omoccurassociations
{
    /**
     * @var int
     *
     * @ORM\Column(name="associd", type="integer", nullable=false, options={"unsigned"=true})
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $associd;

    /**
     * @var string
     *
     * @ORM\Column(name="relationship", type="string", length=150, nullable=false)
     */
    private $relationship;

    /**
     * @var string|null
     *
     * @ORM\Column(name="identifier", type="string", length=250, nullable=true, options={"default"=NULL,"comment"="e.g. GUID"})
     */
    private $identifier = 'NULL';

    /**
     * @var string|null
     *
     * @ORM\Column(name="basisOfRecord", type="string", length=45, nullable=true, options={"default"=NULL})
     */
    private $basisofrecord = 'NULL';

    /**
     * @var string|null
     *
     * @ORM\Column(name="resourceurl", type="string", length=250, nullable=true, options={"default"=NULL})
     */
    private $resourceurl = 'NULL';

    /**
     * @var string|null
     *
     * @ORM\Column(name="verbatimsciname", type="string", length=250, nullable=true, options={"default"=NULL})
     */
    private $verbatimsciname = 'NULL';

    /**
     * @var string|null
     *
     * @ORM\Column(name="locationOnHost", type="string", length=250, nullable=true, options={"default"=NULL})
     */
    private $locationonhost = 'NULL';

    /**
     * @var string|null
     *
     * @ORM\Column(name="condition", type="string", length=250, nullable=true, options={"default"=NULL})
     */
    private $condition = 'NULL';

    /**
     * @var \DateTime|null
     *
     * @ORM\Column(name="dateEmerged", type="datetime", nullable=true, options={"default"=NULL})
     */
    private $dateemerged = 'NULL';

    /**
     * @var string|null
     *
     * @ORM\Column(name="dynamicProperties", type="text", length=65535, nullable=true, options={"default"=NULL})
     */
    private $dynamicproperties = 'NULL';

    /**
     * @var string|null
     *
     * @ORM\Column(name="notes", type="string", length=250, nullable=true, options={"default"=NULL})
     */
    private $notes = 'NULL';

    /**
     * @var \DateTime|null
     *
     * @ORM\Column(name="datelastmodified", type="datetime", nullable=true, options={"default"=NULL})
     */
    private $datelastmodified = 'NULL';

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
     * @var \Taxa
     *
     * @ORM\ManyToOne(targetEntity="Taxa")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="tid", referencedColumnName="TID")
     * })
     */
    private $tid;

    /**
     * @var \Users
     *
     * @ORM\ManyToOne(targetEntity="Users")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="createduid", referencedColumnName="uid")
     * })
     */
    private $createduid;

    /**
     * @var \Users
     *
     * @ORM\ManyToOne(targetEntity="Users")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="modifieduid", referencedColumnName="uid")
     * })
     */
    private $modifieduid;

    /**
     * @var \Omoccurrences
     *
     * @ORM\ManyToOne(targetEntity="Omoccurrences")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="occidassociate", referencedColumnName="occid")
     * })
     */
    private $occidassociate;

    public function getAssocid(): ?int
    {
        return $this->associd;
    }

    public function getRelationship(): ?string
    {
        return $this->relationship;
    }

    public function setRelationship(string $relationship): self
    {
        $this->relationship = $relationship;

        return $this;
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

    public function getBasisofrecord(): ?string
    {
        return $this->basisofrecord;
    }

    public function setBasisofrecord(?string $basisofrecord): self
    {
        $this->basisofrecord = $basisofrecord;

        return $this;
    }

    public function getResourceurl(): ?string
    {
        return $this->resourceurl;
    }

    public function setResourceurl(?string $resourceurl): self
    {
        $this->resourceurl = $resourceurl;

        return $this;
    }

    public function getVerbatimsciname(): ?string
    {
        return $this->verbatimsciname;
    }

    public function setVerbatimsciname(?string $verbatimsciname): self
    {
        $this->verbatimsciname = $verbatimsciname;

        return $this;
    }

    public function getLocationonhost(): ?string
    {
        return $this->locationonhost;
    }

    public function setLocationonhost(?string $locationonhost): self
    {
        $this->locationonhost = $locationonhost;

        return $this;
    }

    public function getCondition(): ?string
    {
        return $this->condition;
    }

    public function setCondition(?string $condition): self
    {
        $this->condition = $condition;

        return $this;
    }

    public function getDateemerged(): ?\DateTimeInterface
    {
        return $this->dateemerged;
    }

    public function setDateemerged(?\DateTimeInterface $dateemerged): self
    {
        $this->dateemerged = $dateemerged;

        return $this;
    }

    public function getDynamicproperties(): ?string
    {
        return $this->dynamicproperties;
    }

    public function setDynamicproperties(?string $dynamicproperties): self
    {
        $this->dynamicproperties = $dynamicproperties;

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

    public function getDatelastmodified(): ?\DateTimeInterface
    {
        return $this->datelastmodified;
    }

    public function setDatelastmodified(?\DateTimeInterface $datelastmodified): self
    {
        $this->datelastmodified = $datelastmodified;

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

    public function getTid(): ?Taxa
    {
        return $this->tid;
    }

    public function setTid(?Taxa $tid): self
    {
        $this->tid = $tid;

        return $this;
    }

    public function getCreateduid(): ?Users
    {
        return $this->createduid;
    }

    public function setCreateduid(?Users $createduid): self
    {
        $this->createduid = $createduid;

        return $this;
    }

    public function getModifieduid(): ?Users
    {
        return $this->modifieduid;
    }

    public function setModifieduid(?Users $modifieduid): self
    {
        $this->modifieduid = $modifieduid;

        return $this;
    }

    public function getOccidassociate(): ?Omoccurrences
    {
        return $this->occidassociate;
    }

    public function setOccidassociate(?Omoccurrences $occidassociate): self
    {
        $this->occidassociate = $occidassociate;

        return $this;
    }


}
