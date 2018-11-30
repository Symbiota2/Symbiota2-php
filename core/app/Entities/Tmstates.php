<?php

namespace App\Entities;

use Doctrine\ORM\Mapping as ORM;

/**
 * Tmstates
 *
 * @ORM\Table(name="tmstates", uniqueConstraints={@ORM\UniqueConstraint(name="traitid_code_UNIQUE", columns={"traitid", "statecode"})}, indexes={@ORM\Index(name="FK_tmstate_uidcreated_idx", columns={"createduid"}), @ORM\Index(name="FK_tmstate_uidmodified_idx", columns={"modifieduid"}), @ORM\Index(name="IDX_2759BBC88CC5D4DB", columns={"traitid"})})
 * @ORM\Entity
 */
class Tmstates
{
    /**
     * @var int
     *
     * @ORM\Column(name="stateid", type="integer", precision=0, scale=0, nullable=false, options={"unsigned"=true}, unique=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $stateid;

    /**
     * @var string
     *
     * @ORM\Column(name="statecode", type="string", length=2, precision=0, scale=0, nullable=false, unique=false)
     */
    private $statecode;

    /**
     * @var string
     *
     * @ORM\Column(name="statename", type="string", length=75, precision=0, scale=0, nullable=false, unique=false)
     */
    private $statename;

    /**
     * @var string|null
     *
     * @ORM\Column(name="description", type="string", length=250, precision=0, scale=0, nullable=true, unique=false)
     */
    private $description;

    /**
     * @var string|null
     *
     * @ORM\Column(name="refurl", type="string", length=250, precision=0, scale=0, nullable=true, unique=false)
     */
    private $refurl;

    /**
     * @var string|null
     *
     * @ORM\Column(name="notes", type="string", length=250, precision=0, scale=0, nullable=true, unique=false)
     */
    private $notes;

    /**
     * @var int|null
     *
     * @ORM\Column(name="sortseq", type="integer", precision=0, scale=0, nullable=true, unique=false)
     */
    private $sortseq;

    /**
     * @var \DateTime|null
     *
     * @ORM\Column(name="datelastmodified", type="datetime", precision=0, scale=0, nullable=true, unique=false)
     */
    private $datelastmodified;

    /**
     * @var \DateTime|null
     *
     * @ORM\Column(name="initialtimestamp", type="datetime", precision=0, scale=0, nullable=true, options={"default"="CURRENT_TIMESTAMP"}, unique=false)
     */
    private $initialtimestamp = 'CURRENT_TIMESTAMP';

    /**
     * @var \App\Entities\Tmtraits
     *
     * @ORM\ManyToOne(targetEntity="App\Entities\Tmtraits")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="traitid", referencedColumnName="traitid", nullable=true)
     * })
     */
    private $traitid;

    /**
     * @var \App\Entities\User
     *
     * @ORM\ManyToOne(targetEntity="App\Entities\User")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="createduid", referencedColumnName="uid", nullable=true)
     * })
     */
    private $createduid;

    /**
     * @var \App\Entities\User
     *
     * @ORM\ManyToOne(targetEntity="App\Entities\User")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="modifieduid", referencedColumnName="uid", nullable=true)
     * })
     */
    private $modifieduid;


    /**
     * Get stateid.
     *
     * @return int
     */
    public function getStateid()
    {
        return $this->stateid;
    }

    /**
     * Set statecode.
     *
     * @param string $statecode
     *
     * @return Tmstates
     */
    public function setStatecode($statecode)
    {
        $this->statecode = $statecode;

        return $this;
    }

    /**
     * Get statecode.
     *
     * @return string
     */
    public function getStatecode()
    {
        return $this->statecode;
    }

    /**
     * Set statename.
     *
     * @param string $statename
     *
     * @return Tmstates
     */
    public function setStatename($statename)
    {
        $this->statename = $statename;

        return $this;
    }

    /**
     * Get statename.
     *
     * @return string
     */
    public function getStatename()
    {
        return $this->statename;
    }

    /**
     * Set description.
     *
     * @param string|null $description
     *
     * @return Tmstates
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
     * Set refurl.
     *
     * @param string|null $refurl
     *
     * @return Tmstates
     */
    public function setRefurl($refurl = null)
    {
        $this->refurl = $refurl;

        return $this;
    }

    /**
     * Get refurl.
     *
     * @return string|null
     */
    public function getRefurl()
    {
        return $this->refurl;
    }

    /**
     * Set notes.
     *
     * @param string|null $notes
     *
     * @return Tmstates
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
     * Set sortseq.
     *
     * @param int|null $sortseq
     *
     * @return Tmstates
     */
    public function setSortseq($sortseq = null)
    {
        $this->sortseq = $sortseq;

        return $this;
    }

    /**
     * Get sortseq.
     *
     * @return int|null
     */
    public function getSortseq()
    {
        return $this->sortseq;
    }

    /**
     * Set datelastmodified.
     *
     * @param \DateTime|null $datelastmodified
     *
     * @return Tmstates
     */
    public function setDatelastmodified($datelastmodified = null)
    {
        $this->datelastmodified = $datelastmodified;

        return $this;
    }

    /**
     * Get datelastmodified.
     *
     * @return \DateTime|null
     */
    public function getDatelastmodified()
    {
        return $this->datelastmodified;
    }

    /**
     * Set initialtimestamp.
     *
     * @param \DateTime|null $initialtimestamp
     *
     * @return Tmstates
     */
    public function setInitialtimestamp($initialtimestamp = null)
    {
        $this->initialtimestamp = $initialtimestamp;

        return $this;
    }

    /**
     * Get initialtimestamp.
     *
     * @return \DateTime|null
     */
    public function getInitialtimestamp()
    {
        return $this->initialtimestamp;
    }

    /**
     * Set traitid.
     *
     * @param \App\Entities\Tmtraits|null $traitid
     *
     * @return Tmstates
     */
    public function setTraitid(\App\Entities\Tmtraits $traitid = null)
    {
        $this->traitid = $traitid;

        return $this;
    }

    /**
     * Get traitid.
     *
     * @return \App\Entities\Tmtraits|null
     */
    public function getTraitid()
    {
        return $this->traitid;
    }

    /**
     * Set createduid.
     *
     * @param \App\Entities\User|null $createduid
     *
     * @return Tmstates
     */
    public function setCreateduid(\App\Entities\User $createduid = null)
    {
        $this->createduid = $createduid;

        return $this;
    }

    /**
     * Get createduid.
     *
     * @return \App\Entities\User|null
     */
    public function getCreateduid()
    {
        return $this->createduid;
    }

    /**
     * Set modifieduid.
     *
     * @param \App\Entities\User|null $modifieduid
     *
     * @return Tmstates
     */
    public function setModifieduid(\App\Entities\User $modifieduid = null)
    {
        $this->modifieduid = $modifieduid;

        return $this;
    }

    /**
     * Get modifieduid.
     *
     * @return \App\Entities\User|null
     */
    public function getModifieduid()
    {
        return $this->modifieduid;
    }
}
