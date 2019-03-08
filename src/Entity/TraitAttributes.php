<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * TraitAttributes
 *
 * @ORM\Table(name="tmattributes", indexes={@ORM\Index(name="FK_tmattr_occid_idx", columns={"occid"}), @ORM\Index(name="FK_tmattr_uidmodified_idx", columns={"modifieduid"}), @ORM\Index(name="FK_tmattr_stateid_idx", columns={"stateid"}), @ORM\Index(name="FK_attr_uidcreate_idx", columns={"createduid"}), @ORM\Index(name="FK_tmattr_imgid_idx", columns={"imgid"})})
 * @ORM\Entity(repositoryClass="App\Repository\TraitAttributesRepository")
 */
class TraitAttributes
{
    /**
     * @var \TraitStates
     *
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     * @ORM\OneToOne(targetEntity="TraitStates")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="stateid", referencedColumnName="stateid")
     * })
     */
    private $stateid;

    /**
     * @var \Occurrences
     *
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     * @ORM\OneToOne(targetEntity="Occurrences")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="occid", referencedColumnName="occid")
     * })
     */
    private $occid;

    /**
     * @var string|null
     *
     * @ORM\Column(name="modifier", type="string", length=100, nullable=true, options={"default"=NULL})
     */
    private $modifier = 'NULL';

    /**
     * @var float|null
     *
     * @ORM\Column(name="xvalue", type="float", precision=15, scale=5, nullable=true, options={"default"=NULL})
     */
    private $xvalue = 'NULL';

    /**
     * @var \Images
     *
     * @ORM\ManyToOne(targetEntity="Images")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="imgid", referencedColumnName="imgid")
     * })
     */
    private $imgid;

    /**
     * @var string|null
     *
     * @ORM\Column(name="imagecoordinates", type="string", length=45, nullable=true, options={"default"=NULL})
     */
    private $imagecoordinates = 'NULL';

    /**
     * @var string|null
     *
     * @ORM\Column(name="source", type="string", length=250, nullable=true, options={"default"=NULL})
     */
    private $source = 'NULL';

    /**
     * @var string|null
     *
     * @ORM\Column(name="notes", type="string", length=250, nullable=true, options={"default"=NULL})
     */
    private $notes = 'NULL';

    /**
     * @var bool|null
     *
     * @ORM\Column(name="statuscode", type="boolean", nullable=true, options={"default"=NULL})
     */
    private $statuscode = 'NULL';

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
     * @var \DateTime|null
     *
     * @ORM\Column(name="modifiedTimeStamp", type="datetime", nullable=true, options={"default"=NULL})
     */
    private $modifiedtimestamp = 'NULL';

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
     * @var \DateTime|null
     *
     * @ORM\Column(name="initialtimestamp", type="datetime", nullable=true, options={"default"="CURRENT_TIMESTAMP"})
     */
    private $initialtimestamp = 'CURRENT_TIMESTAMP';

    public function getModifier(): ?string
    {
        return $this->modifier;
    }

    public function setModifier(?string $modifier): self
    {
        $this->modifier = $modifier;

        return $this;
    }

    public function getXvalue(): ?float
    {
        return $this->xvalue;
    }

    public function setXvalue(?float $xvalue): self
    {
        $this->xvalue = $xvalue;

        return $this;
    }

    public function getImagecoordinates(): ?string
    {
        return $this->imagecoordinates;
    }

    public function setImagecoordinates(?string $imagecoordinates): self
    {
        $this->imagecoordinates = $imagecoordinates;

        return $this;
    }

    public function getSource(): ?string
    {
        return $this->source;
    }

    public function setSource(?string $source): self
    {
        $this->source = $source;

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

    public function getStatuscode(): ?bool
    {
        return $this->statuscode;
    }

    public function setStatuscode(?bool $statuscode): self
    {
        $this->statuscode = $statuscode;

        return $this;
    }

    public function getModifiedtimestamp(): ?\DateTimeInterface
    {
        return $this->modifiedtimestamp;
    }

    public function setModifiedtimestamp(?\DateTimeInterface $modifiedtimestamp): self
    {
        $this->modifiedtimestamp = $modifiedtimestamp;

        return $this;
    }

    public function getInitialtimestamp(): ?\DateTimeInterface
    {
        return $this->initialtimestamp;
    }

    public function setInitialtimestamp(?\DateTimeInterface $initialtimestamp): self
    {
        $this->initialtimestamp = $initialtimestamp;

        return $this;
    }

    public function getStateid(): ?TraitStates
    {
        return $this->stateid;
    }

    public function setStateid(?TraitStates $stateid): self
    {
        $this->stateid = $stateid;

        return $this;
    }

    public function getImgid(): ?Images
    {
        return $this->imgid;
    }

    public function setImgid(?Images $imgid): self
    {
        $this->imgid = $imgid;

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


}
