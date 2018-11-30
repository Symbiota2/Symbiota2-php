<?php

namespace App\Entities;

use Doctrine\ORM\Mapping as ORM;

/**
 * Lkupcounty
 *
 * @ORM\Table(name="lkupcounty", uniqueConstraints={@ORM\UniqueConstraint(name="unique_county", columns={"stateId", "countyName"})}, indexes={@ORM\Index(name="fk_stateprovince", columns={"stateId"}), @ORM\Index(name="index_countyname", columns={"countyName"})})
 * @ORM\Entity
 */
class Lkupcounty
{
    /**
     * @var int
     *
     * @ORM\Column(name="countyId", type="integer", precision=0, scale=0, nullable=false, unique=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $countyid;

    /**
     * @var string
     *
     * @ORM\Column(name="countyName", type="string", length=100, precision=0, scale=0, nullable=false, unique=false)
     */
    private $countyname;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="initialtimestamp", type="datetime", precision=0, scale=0, nullable=false, options={"default"="CURRENT_TIMESTAMP"}, unique=false)
     */
    private $initialtimestamp = 'CURRENT_TIMESTAMP';

    /**
     * @var \App\Entities\Lkupstateprovince
     *
     * @ORM\ManyToOne(targetEntity="App\Entities\Lkupstateprovince")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="stateId", referencedColumnName="stateId", nullable=true)
     * })
     */
    private $stateid;


    /**
     * Get countyid.
     *
     * @return int
     */
    public function getCountyid()
    {
        return $this->countyid;
    }

    /**
     * Set countyname.
     *
     * @param string $countyname
     *
     * @return Lkupcounty
     */
    public function setCountyname($countyname)
    {
        $this->countyname = $countyname;

        return $this;
    }

    /**
     * Get countyname.
     *
     * @return string
     */
    public function getCountyname()
    {
        return $this->countyname;
    }

    /**
     * Set initialtimestamp.
     *
     * @param \DateTime $initialtimestamp
     *
     * @return Lkupcounty
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
     * Set stateid.
     *
     * @param \App\Entities\Lkupstateprovince|null $stateid
     *
     * @return Lkupcounty
     */
    public function setStateid(\App\Entities\Lkupstateprovince $stateid = null)
    {
        $this->stateid = $stateid;

        return $this;
    }

    /**
     * Get stateid.
     *
     * @return \App\Entities\Lkupstateprovince|null
     */
    public function getStateid()
    {
        return $this->stateid;
    }
}
