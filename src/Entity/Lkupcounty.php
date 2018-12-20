<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Lkupcounty
 *
 * @ORM\Table(name="lkupcounty", uniqueConstraints={@ORM\UniqueConstraint(name="unique_county", columns={"stateId", "countyName"})}, indexes={@ORM\Index(name="index_countyname", columns={"countyName"}), @ORM\Index(name="fk_stateprovince", columns={"stateId"})})
 * @ORM\Entity(repositoryClass="App\Repository\LkupcountyRepository")
 */
class Lkupcounty
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
     * @var string
     *
     * @ORM\Column(name="countyName", type="string", length=100, nullable=false)
     */
    private $countyname;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="initialtimestamp", type="datetime", nullable=false, options={"default"="current_timestamp()"})
     */
    private $initialtimestamp = 'current_timestamp()';

    /**
     * @var \Lkupstateprovince
     *
     * @ORM\ManyToOne(targetEntity="Lkupstateprovince")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="stateId", referencedColumnName="stateId")
     * })
     */
    private $stateid;

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

    public function getStateid(): ?Lkupstateprovince
    {
        return $this->stateid;
    }

    public function setStateid(?Lkupstateprovince $stateid): self
    {
        $this->stateid = $stateid;

        return $this;
    }


}
