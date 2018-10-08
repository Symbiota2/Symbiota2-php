<?php

namespace App\Entities;

use Doctrine\ORM\Mapping as ORM;

/**
 * Tmtraitdependencies
 *
 * @ORM\Table(name="tmtraitdependencies", indexes={@ORM\Index(name="FK_tmdepend_traitid_idx", columns={"traitid"}), @ORM\Index(name="FK_tmdepend_stateid_idx", columns={"parentstateid"})})
 * @ORM\Entity
 */
class Tmtraitdependencies
{
    /**
     * @var int
     *
     * @ORM\Column(name="traitid", type="integer", precision=0, scale=0, nullable=false, options={"unsigned"=true}, unique=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     */
    private $traitid;

    /**
     * @var \DateTime|null
     *
     * @ORM\Column(name="initialtimestamp", type="datetime", precision=0, scale=0, nullable=true, options={"default"="CURRENT_TIMESTAMP"}, unique=false)
     */
    private $initialtimestamp = 'CURRENT_TIMESTAMP';

    /**
     * @var \App\Entities\Tmstates
     *
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     * @ORM\OneToOne(targetEntity="App\Entities\Tmstates")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="parentstateid", referencedColumnName="stateid", nullable=true)
     * })
     */
    private $parentstateid;


    /**
     * Set traitid.
     *
     * @param int $traitid
     *
     * @return Tmtraitdependencies
     */
    public function setTraitid($traitid)
    {
        $this->traitid = $traitid;

        return $this;
    }

    /**
     * Get traitid.
     *
     * @return int
     */
    public function getTraitid()
    {
        return $this->traitid;
    }

    /**
     * Set initialtimestamp.
     *
     * @param \DateTime|null $initialtimestamp
     *
     * @return Tmtraitdependencies
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
     * Set parentstateid.
     *
     * @param \App\Entities\Tmstates $parentstateid
     *
     * @return Tmtraitdependencies
     */
    public function setParentstateid(\App\Entities\Tmstates $parentstateid)
    {
        $this->parentstateid = $parentstateid;

        return $this;
    }

    /**
     * Get parentstateid.
     *
     * @return \App\Entities\Tmstates
     */
    public function getParentstateid()
    {
        return $this->parentstateid;
    }
}
