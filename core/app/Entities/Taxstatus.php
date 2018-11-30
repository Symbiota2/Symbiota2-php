<?php

namespace App\Entities;

use Doctrine\ORM\Mapping as ORM;

/**
 * Taxstatus
 *
 * @ORM\Table(name="taxstatus", indexes={@ORM\Index(name="Index_ts_tidacc", columns={"tidaccepted"}), @ORM\Index(name="Index_ts_taid", columns={"taxauthid"}), @ORM\Index(name="Index_ts_family", columns={"family"}), @ORM\Index(name="Index_ts_parenttid", columns={"parenttid"}), @ORM\Index(name="Index_ts_tid", columns={"tid"})})
 * @ORM\Entity
 */
class Taxstatus
{
    /**
     * @var int
     *
     * @ORM\Column(name="tsid", type="integer", precision=0, scale=0, nullable=false, options={"unsigned"=true})
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $tsid;

    /**
     * @var string|null
     *
     * @ORM\Column(name="hierarchystr", type="string", length=200, precision=0, scale=0, nullable=true, unique=false)
     */
    private $hierarchystr;

    /**
     * @var string|null
     *
     * @ORM\Column(name="family", type="string", length=50, precision=0, scale=0, nullable=true, unique=false)
     */
    private $family;

    /**
     * @var string|null
     *
     * @ORM\Column(name="UnacceptabilityReason", type="string", length=250, precision=0, scale=0, nullable=true, unique=false)
     */
    private $unacceptabilityreason;

    /**
     * @var string|null
     *
     * @ORM\Column(name="notes", type="string", length=250, precision=0, scale=0, nullable=true, unique=false)
     */
    private $notes;

    /**
     * @var int|null
     *
     * @ORM\Column(name="SortSequence", type="integer", precision=0, scale=0, nullable=true, options={"default"="50","unsigned"=true}, unique=false)
     */
    private $sortsequence = '50';

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="initialtimestamp", type="datetime", precision=0, scale=0, nullable=false, options={"default"="CURRENT_TIMESTAMP"}, unique=false)
     */
    private $initialtimestamp = 'CURRENT_TIMESTAMP';

    /**
     * @var \App\Entities\Taxa
     *
     * @ORM\ManyToOne(targetEntity="App\Entities\Taxa")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="parenttid", referencedColumnName="tid", nullable=false)
     * })
     */
    private $parenttid;

    /**
     * @var \App\Entities\Taxauthority
     *
     * @ORM\ManyToOne(targetEntity="App\Entities\Taxauthority")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="taxauthid", referencedColumnName="taxauthid", nullable=false)
     * })
     */
    private $taxauthid;

    /**
     * @var \App\Entities\Taxa
     *
     * @ORM\ManyToOne(targetEntity="Taxa", inversedBy="tsid")
     * @ORM\JoinColumn(name="tid", referencedColumnName="tid")
     */
    private $tid;

    /**
     * @var \App\Entities\Taxa
     *
     * @ORM\ManyToOne(targetEntity="App\Entities\Taxa")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="tidaccepted", referencedColumnName="tid", nullable=false)
     * })
     */
    private $tidaccepted;

    /**
     * Get tsid.
     *
     * @return int
     */
    public function getTsid()
    {
        return $this->tsid;
    }

    /**
     * Set hierarchystr.
     *
     * @param string|null $hierarchystr
     *
     * @return Taxstatus
     */
    public function setHierarchystr($hierarchystr = null)
    {
        $this->hierarchystr = $hierarchystr;

        return $this;
    }

    /**
     * Get hierarchystr.
     *
     * @return string|null
     */
    public function getHierarchystr()
    {
        return $this->hierarchystr;
    }

    /**
     * Set family.
     *
     * @param string|null $family
     *
     * @return Taxstatus
     */
    public function setFamily($family = null)
    {
        $this->family = $family;

        return $this;
    }

    /**
     * Get family.
     *
     * @return string|null
     */
    public function getFamily()
    {
        return $this->family;
    }

    /**
     * Set unacceptabilityreason.
     *
     * @param string|null $unacceptabilityreason
     *
     * @return Taxstatus
     */
    public function setUnacceptabilityreason($unacceptabilityreason = null)
    {
        $this->unacceptabilityreason = $unacceptabilityreason;

        return $this;
    }

    /**
     * Get unacceptabilityreason.
     *
     * @return string|null
     */
    public function getUnacceptabilityreason()
    {
        return $this->unacceptabilityreason;
    }

    /**
     * Set notes.
     *
     * @param string|null $notes
     *
     * @return Taxstatus
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
     * Set sortsequence.
     *
     * @param int|null $sortsequence
     *
     * @return Taxstatus
     */
    public function setSortsequence($sortsequence = null)
    {
        $this->sortsequence = $sortsequence;

        return $this;
    }

    /**
     * Get sortsequence.
     *
     * @return int|null
     */
    public function getSortsequence()
    {
        return $this->sortsequence;
    }

    /**
     * Set initialtimestamp.
     *
     * @param \DateTime $initialtimestamp
     *
     * @return Taxstatus
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
     * Set parenttid.
     *
     * @param \App\Entities\Taxa|null $parenttid
     *
     * @return Taxstatus
     */
    public function setParenttid(\App\Entities\Taxa $parenttid = null)
    {
        $this->parenttid = $parenttid;

        return $this;
    }

    /**
     * Get parenttid.
     *
     * @return \App\Entities\Taxa|null
     */
    public function getParenttid()
    {
        return $this->parenttid;
    }

    /**
     * Set taxauthid.
     *
     * @param \App\Entities\Taxauthority $taxauthid
     *
     * @return Taxstatus
     */
    public function setTaxauthid(\App\Entities\Taxauthority $taxauthid)
    {
        $this->taxauthid = $taxauthid;

        return $this;
    }

    /**
     * Get taxauthid.
     *
     * @return \App\Entities\Taxauthority
     */
    public function getTaxauthid()
    {
        return $this->taxauthid;
    }

    /**
     * Set tid.
     *
     * @param \App\Entities\Taxa $tid
     *
     * @return Taxstatus
     */
    public function setTid(\App\Entities\Taxa $tid)
    {
        $this->tid = $tid;

        return $this;
    }

    /**
     * Get tid.
     *
     * @return \App\Entities\Taxa
     */
    public function getTid()
    {
        return $this->tid;
    }

    /**
     * Set tidaccepted.
     *
     * @param \App\Entities\Taxa $tidaccepted
     *
     * @return Taxstatus
     */
    public function setTidaccepted(\App\Entities\Taxa $tidaccepted)
    {
        $this->tidaccepted = $tidaccepted;

        return $this;
    }

    /**
     * Get tidaccepted.
     *
     * @return \App\Entities\Taxa
     */
    public function getTidaccepted()
    {
        return $this->tidaccepted;
    }
}
