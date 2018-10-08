<?php

namespace App\Entities;

use Doctrine\ORM\Mapping as ORM;

/**
 * Taxaenumtree
 *
 * @ORM\Table(name="taxaenumtree", indexes={@ORM\Index(name="FK_tet_taxa", columns={"tid"}), @ORM\Index(name="FK_tet_taxauth", columns={"taxauthid"}), @ORM\Index(name="FK_tet_taxa2", columns={"parenttid"})})
 * @ORM\Entity
 */
class Taxaenumtree
{
    /**
     * @var \DateTime
     *
     * @ORM\Column(name="initialtimestamp", type="datetime", precision=0, scale=0, nullable=false, options={"default"="CURRENT_TIMESTAMP"}, unique=false)
     */
    private $initialtimestamp = 'CURRENT_TIMESTAMP';

    /**
     * @var \App\Entities\Taxa
     *
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     * @ORM\OneToOne(targetEntity="App\Entities\Taxa")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="tid", referencedColumnName="tid", nullable=true)
     * })
     */
    private $tid;

    /**
     * @var \App\Entities\Taxa
     *
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     * @ORM\OneToOne(targetEntity="App\Entities\Taxa")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="parenttid", referencedColumnName="tid", nullable=true)
     * })
     */
    private $parenttid;

    /**
     * @var \App\Entities\Taxauthority
     *
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     * @ORM\OneToOne(targetEntity="App\Entities\Taxauthority")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="taxauthid", referencedColumnName="taxauthid", nullable=true)
     * })
     */
    private $taxauthid;


    /**
     * Set initialtimestamp.
     *
     * @param \DateTime $initialtimestamp
     *
     * @return Taxaenumtree
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
     * Set tid.
     *
     * @param \App\Entities\Taxa $tid
     *
     * @return Taxaenumtree
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
     * Set parenttid.
     *
     * @param \App\Entities\Taxa $parenttid
     *
     * @return Taxaenumtree
     */
    public function setParenttid(\App\Entities\Taxa $parenttid)
    {
        $this->parenttid = $parenttid;

        return $this;
    }

    /**
     * Get parenttid.
     *
     * @return \App\Entities\Taxa
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
     * @return Taxaenumtree
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
}
