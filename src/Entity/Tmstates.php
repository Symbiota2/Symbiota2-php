<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Tmstates
 *
 * @ORM\Table(name="tmstates", uniqueConstraints={@ORM\UniqueConstraint(name="traitid_code_UNIQUE", columns={"traitid", "statecode"})}, indexes={@ORM\Index(name="FK_tmstate_uidcreated_idx", columns={"createduid"}), @ORM\Index(name="FK_tmstate_uidmodified_idx", columns={"modifieduid"}), @ORM\Index(name="IDX_2759BBC88CC5D4DB", columns={"traitid"})})
 * @ORM\Entity(repositoryClass="App\Repository\TmstatesRepository")
 */
class Tmstates
{
    /**
     * @var int
     *
     * @ORM\Column(name="stateid", type="integer", nullable=false, options={"unsigned"=true})
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $stateid;

    /**
     * @var string
     *
     * @ORM\Column(name="statecode", type="string", length=2, nullable=false)
     */
    private $statecode;

    /**
     * @var string
     *
     * @ORM\Column(name="statename", type="string", length=75, nullable=false)
     */
    private $statename;

    /**
     * @var string|null
     *
     * @ORM\Column(name="description", type="string", length=250, nullable=true, options={"default"="NULL"})
     */
    private $description = 'NULL';

    /**
     * @var string|null
     *
     * @ORM\Column(name="refurl", type="string", length=250, nullable=true, options={"default"="NULL"})
     */
    private $refurl = 'NULL';

    /**
     * @var string|null
     *
     * @ORM\Column(name="notes", type="string", length=250, nullable=true, options={"default"="NULL"})
     */
    private $notes = 'NULL';

    /**
     * @var int|null
     *
     * @ORM\Column(name="sortseq", type="integer", nullable=true, options={"default"="NULL"})
     */
    private $sortseq = 'NULL';

    /**
     * @var \DateTime|null
     *
     * @ORM\Column(name="datelastmodified", type="datetime", nullable=true, options={"default"="NULL"})
     */
    private $datelastmodified = 'NULL';

    /**
     * @var \DateTime|null
     *
     * @ORM\Column(name="initialtimestamp", type="datetime", nullable=true, options={"default"="current_timestamp()"})
     */
    private $initialtimestamp = 'current_timestamp()';

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
     * @var \Tmtraits
     *
     * @ORM\ManyToOne(targetEntity="Tmtraits")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="traitid", referencedColumnName="traitid")
     * })
     */
    private $traitid;

    /**
     * @var \Users
     *
     * @ORM\ManyToOne(targetEntity="Users")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="modifieduid", referencedColumnName="uid")
     * })
     */
    private $modifieduid;

    public function getStateid(): ?int
    {
        return $this->stateid;
    }

    public function getStatecode(): ?string
    {
        return $this->statecode;
    }

    public function setStatecode(string $statecode): self
    {
        $this->statecode = $statecode;

        return $this;
    }

    public function getStatename(): ?string
    {
        return $this->statename;
    }

    public function setStatename(string $statename): self
    {
        $this->statename = $statename;

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

    public function getRefurl(): ?string
    {
        return $this->refurl;
    }

    public function setRefurl(?string $refurl): self
    {
        $this->refurl = $refurl;

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

    public function getSortseq(): ?int
    {
        return $this->sortseq;
    }

    public function setSortseq(?int $sortseq): self
    {
        $this->sortseq = $sortseq;

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

    public function setInitialtimestamp(?\DateTimeInterface $initialtimestamp): self
    {
        $this->initialtimestamp = $initialtimestamp;

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

    public function getTraitid(): ?Tmtraits
    {
        return $this->traitid;
    }

    public function setTraitid(?Tmtraits $traitid): self
    {
        $this->traitid = $traitid;

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
