<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Lkupmunicipality
 *
 * @ORM\Table(name="lkupmunicipality", uniqueConstraints={@ORM\UniqueConstraint(name="unique_municipality", columns={"stateId", "municipalityName"})}, indexes={@ORM\Index(name="index_municipalityname", columns={"municipalityName"}), @ORM\Index(name="fk_stateprovince", columns={"stateId"})})
 * @ORM\Entity(repositoryClass="App\Repository\LkupmunicipalityRepository")
 */
class Lkupmunicipality
{
    /**
     * @var int
     *
     * @ORM\Column(name="municipalityId", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $municipalityid;

    /**
     * @var \Lkupstateprovince
     *
     * @ORM\ManyToOne(targetEntity="Lkupstateprovince")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="stateId", referencedColumnName="stateId")
     * })
     */
    private $stateid;

    /**
     * @var string
     *
     * @ORM\Column(name="municipalityName", type="string", length=100, nullable=false)
     */
    private $municipalityname;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="initialtimestamp", type="datetime", nullable=false, options={"default"="CURRENT_TIMESTAMP"})
     */
    private $initialtimestamp = 'CURRENT_TIMESTAMP';

    public function getMunicipalityid(): ?int
    {
        return $this->municipalityid;
    }

    public function getMunicipalityname(): ?string
    {
        return $this->municipalityname;
    }

    public function setMunicipalityname(string $municipalityname): self
    {
        $this->municipalityname = $municipalityname;

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
