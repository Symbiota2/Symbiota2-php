<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * LookupCounties
 *
 * @ORM\Table(name="lkupcounty", uniqueConstraints={@ORM\UniqueConstraint(name="unique_county", columns={"stateId", "countyName"})}, indexes={@ORM\Index(name="index_countyname", columns={"countyName"}), @ORM\Index(name="fk_stateprovince_lkupcounty", columns={"stateId"})})
 * @ORM\Entity(repositoryClass="App\Repository\LookupCountiesRepository")
 */
class LookupCounties
{
    /**
     * @var int
     *
     * @ORM\Column(name="countyId", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $countyid;

    /**
     * @var \LookupStateProvinces
     *
     * @ORM\ManyToOne(targetEntity="LookupStateProvinces")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="stateId", referencedColumnName="stateId")
     * })
     */
    private $stateid;

    /**
     * @var string
     *
     * @ORM\Column(name="countyName", type="string", length=100, nullable=false)
     */
    private $countyname;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="initialtimestamp", type="datetime", nullable=false, options={"default"="CURRENT_TIMESTAMP"})
     */
    private $initialtimestamp = 'CURRENT_TIMESTAMP';

    public function getCountyid(): ?int
    {
        return $this->countyid;
    }

    public function getCountyname(): ?string
    {
        return $this->countyname;
    }

    public function setCountyname(string $countyname): self
    {
        $this->countyname = $countyname;

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

    public function getStateid(): ?LookupStateProvinces
    {
        return $this->stateid;
    }

    public function setStateid(?LookupStateProvinces $stateid): self
    {
        $this->stateid = $stateid;

        return $this;
    }


}
