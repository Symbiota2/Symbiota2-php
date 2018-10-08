<?php

namespace App\Entities;

use Doctrine\ORM\Mapping as ORM;

/**
 * Taxonunits
 *
 * @ORM\Table(name="taxonunits", uniqueConstraints={@ORM\UniqueConstraint(name="UNIQUE_taxonunits", columns={"kingdomName", "rankid"})})
 * @ORM\Entity
 */
class Taxonunits
{
    /**
     * @var int
     *
     * @ORM\Column(name="taxonunitid", type="integer", precision=0, scale=0, nullable=false, unique=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $taxonunitid;

    /**
     * @var string
     *
     * @ORM\Column(name="kingdomName", type="string", length=45, precision=0, scale=0, nullable=false, options={"default"="Organism"}, unique=false)
     */
    private $kingdomname = 'Organism';

    /**
     * @var int
     *
     * @ORM\Column(name="rankid", type="smallint", precision=0, scale=0, nullable=false, options={"unsigned"=true}, unique=false)
     */
    private $rankid;

    /**
     * @var string
     *
     * @ORM\Column(name="rankname", type="string", length=15, precision=0, scale=0, nullable=false, unique=false)
     */
    private $rankname;

    /**
     * @var string|null
     *
     * @ORM\Column(name="suffix", type="string", length=45, precision=0, scale=0, nullable=true, unique=false)
     */
    private $suffix;

    /**
     * @var int
     *
     * @ORM\Column(name="dirparentrankid", type="smallint", precision=0, scale=0, nullable=false, unique=false)
     */
    private $dirparentrankid;

    /**
     * @var int|null
     *
     * @ORM\Column(name="reqparentrankid", type="smallint", precision=0, scale=0, nullable=true, unique=false)
     */
    private $reqparentrankid;

    /**
     * @var string|null
     *
     * @ORM\Column(name="modifiedby", type="string", length=45, precision=0, scale=0, nullable=true, unique=false)
     */
    private $modifiedby;

    /**
     * @var \DateTime|null
     *
     * @ORM\Column(name="modifiedtimestamp", type="datetime", precision=0, scale=0, nullable=true, unique=false)
     */
    private $modifiedtimestamp;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="initialtimestamp", type="datetime", precision=0, scale=0, nullable=false, options={"default"="CURRENT_TIMESTAMP"}, unique=false)
     */
    private $initialtimestamp = 'CURRENT_TIMESTAMP';


    /**
     * Get taxonunitid.
     *
     * @return int
     */
    public function getTaxonunitid()
    {
        return $this->taxonunitid;
    }

    /**
     * Set kingdomname.
     *
     * @param string $kingdomname
     *
     * @return Taxonunits
     */
    public function setKingdomname($kingdomname)
    {
        $this->kingdomname = $kingdomname;

        return $this;
    }

    /**
     * Get kingdomname.
     *
     * @return string
     */
    public function getKingdomname()
    {
        return $this->kingdomname;
    }

    /**
     * Set rankid.
     *
     * @param int $rankid
     *
     * @return Taxonunits
     */
    public function setRankid($rankid)
    {
        $this->rankid = $rankid;

        return $this;
    }

    /**
     * Get rankid.
     *
     * @return int
     */
    public function getRankid()
    {
        return $this->rankid;
    }

    /**
     * Set rankname.
     *
     * @param string $rankname
     *
     * @return Taxonunits
     */
    public function setRankname($rankname)
    {
        $this->rankname = $rankname;

        return $this;
    }

    /**
     * Get rankname.
     *
     * @return string
     */
    public function getRankname()
    {
        return $this->rankname;
    }

    /**
     * Set suffix.
     *
     * @param string|null $suffix
     *
     * @return Taxonunits
     */
    public function setSuffix($suffix = null)
    {
        $this->suffix = $suffix;

        return $this;
    }

    /**
     * Get suffix.
     *
     * @return string|null
     */
    public function getSuffix()
    {
        return $this->suffix;
    }

    /**
     * Set dirparentrankid.
     *
     * @param int $dirparentrankid
     *
     * @return Taxonunits
     */
    public function setDirparentrankid($dirparentrankid)
    {
        $this->dirparentrankid = $dirparentrankid;

        return $this;
    }

    /**
     * Get dirparentrankid.
     *
     * @return int
     */
    public function getDirparentrankid()
    {
        return $this->dirparentrankid;
    }

    /**
     * Set reqparentrankid.
     *
     * @param int|null $reqparentrankid
     *
     * @return Taxonunits
     */
    public function setReqparentrankid($reqparentrankid = null)
    {
        $this->reqparentrankid = $reqparentrankid;

        return $this;
    }

    /**
     * Get reqparentrankid.
     *
     * @return int|null
     */
    public function getReqparentrankid()
    {
        return $this->reqparentrankid;
    }

    /**
     * Set modifiedby.
     *
     * @param string|null $modifiedby
     *
     * @return Taxonunits
     */
    public function setModifiedby($modifiedby = null)
    {
        $this->modifiedby = $modifiedby;

        return $this;
    }

    /**
     * Get modifiedby.
     *
     * @return string|null
     */
    public function getModifiedby()
    {
        return $this->modifiedby;
    }

    /**
     * Set modifiedtimestamp.
     *
     * @param \DateTime|null $modifiedtimestamp
     *
     * @return Taxonunits
     */
    public function setModifiedtimestamp($modifiedtimestamp = null)
    {
        $this->modifiedtimestamp = $modifiedtimestamp;

        return $this;
    }

    /**
     * Get modifiedtimestamp.
     *
     * @return \DateTime|null
     */
    public function getModifiedtimestamp()
    {
        return $this->modifiedtimestamp;
    }

    /**
     * Set initialtimestamp.
     *
     * @param \DateTime $initialtimestamp
     *
     * @return Taxonunits
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
}
