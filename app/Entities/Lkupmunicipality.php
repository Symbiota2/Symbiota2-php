<?php

namespace App\Entities;

use Doctrine\ORM\Mapping as ORM;

/**
 * Lkupmunicipality
 *
 * @ORM\Table(name="lkupmunicipality", uniqueConstraints={@ORM\UniqueConstraint(name="unique_municipality", columns={"stateId", "municipalityName"})}, indexes={@ORM\Index(name="fk_stateprovince", columns={"stateId"}), @ORM\Index(name="index_municipalityname", columns={"municipalityName"})})
 * @ORM\Entity
 */
class Lkupmunicipality
{
    /**
     * @var int
     *
     * @ORM\Column(name="municipalityId", type="integer", precision=0, scale=0, nullable=false, unique=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $municipalityid;

    /**
     * @var string
     *
     * @ORM\Column(name="municipalityName", type="string", length=100, precision=0, scale=0, nullable=false, unique=false)
     */
    private $municipalityname;

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
     * Get municipalityid.
     *
     * @return int
     */
    public function getMunicipalityid()
    {
        return $this->municipalityid;
    }

    /**
     * Set municipalityname.
     *
     * @param string $municipalityname
     *
     * @return Lkupmunicipality
     */
    public function setMunicipalityname($municipalityname)
    {
        $this->municipalityname = $municipalityname;

        return $this;
    }

    /**
     * Get municipalityname.
     *
     * @return string
     */
    public function getMunicipalityname()
    {
        return $this->municipalityname;
    }

    /**
     * Set initialtimestamp.
     *
     * @param \DateTime $initialtimestamp
     *
     * @return Lkupmunicipality
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
     * @return Lkupmunicipality
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
