<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Omoccuraccessstats
 *
 * @ORM\Table(name="omoccuraccessstats", uniqueConstraints={@ORM\UniqueConstraint(name="UNIQUE_occuraccess", columns={"occid", "accessdate", "ipaddress", "accesstype"})}, indexes={@ORM\Index(name="IDX_FB36281B40A24FBA", columns={"occid"})})
 * @ORM\Entity(repositoryClass="App\Repository\OmoccuraccessstatsRepository")
 */
class Omoccuraccessstats
{
    /**
     * @var int
     *
     * @ORM\Column(name="oasid", type="integer", nullable=false, options={"unsigned"=true})
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $oasid;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="accessdate", type="date", nullable=false)
     */
    private $accessdate;

    /**
     * @var string
     *
     * @ORM\Column(name="ipaddress", type="string", length=45, nullable=false)
     */
    private $ipaddress;

    /**
     * @var int
     *
     * @ORM\Column(name="cnt", type="integer", nullable=false, options={"unsigned"=true})
     */
    private $cnt;

    /**
     * @var string
     *
     * @ORM\Column(name="accesstype", type="string", length=45, nullable=false)
     */
    private $accesstype;

    /**
     * @var string|null
     *
     * @ORM\Column(name="dynamicProperties", type="string", length=250, nullable=true, options={"default"=NULL})
     */
    private $dynamicproperties = 'NULL';

    /**
     * @var string|null
     *
     * @ORM\Column(name="notes", type="string", length=250, nullable=true, options={"default"=NULL})
     */
    private $notes = 'NULL';

    /**
     * @var \DateTime|null
     *
     * @ORM\Column(name="initialtimestamp", type="datetime", nullable=false, options={"default"="CURRENT_TIMESTAMP"})
     */
    private $initialtimestamp = 'CURRENT_TIMESTAMP';

    /**
     * @var \Omoccurrences
     *
     * @ORM\ManyToOne(targetEntity="Omoccurrences")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="occid", referencedColumnName="occid")
     * })
     */
    private $occid;

    public function getOasid(): ?int
    {
        return $this->oasid;
    }

    public function getAccessdate(): ?\DateTimeInterface
    {
        return $this->accessdate;
    }

    public function setAccessdate(\DateTimeInterface $accessdate): self
    {
        $this->accessdate = $accessdate;

        return $this;
    }

    public function getIpaddress(): ?string
    {
        return $this->ipaddress;
    }

    public function setIpaddress(string $ipaddress): self
    {
        $this->ipaddress = $ipaddress;

        return $this;
    }

    public function getCnt(): ?int
    {
        return $this->cnt;
    }

    public function setCnt(int $cnt): self
    {
        $this->cnt = $cnt;

        return $this;
    }

    public function getAccesstype(): ?string
    {
        return $this->accesstype;
    }

    public function setAccesstype(string $accesstype): self
    {
        $this->accesstype = $accesstype;

        return $this;
    }

    public function getDynamicproperties(): ?string
    {
        return $this->dynamicproperties;
    }

    public function setDynamicproperties(?string $dynamicproperties): self
    {
        $this->dynamicproperties = $dynamicproperties;

        return $this;
    }

    public function getNotes(): ?string
    {
        return $this->notes;
    }

    public function setNotes(?string $notes): self
    {
        $this->notes = $notes;

        return $this;
    }

    public function getInitialtimestamp(): ?\DateTimeInterface
    {
        return $this->initialtimestamp;
    }

    public function setInitialtimestamp(?\DateTimeInterface $initialtimestamp): self
    {
        $this->initialtimestamp = $initialtimestamp;

        return $this;
    }

    public function getOccid(): ?Omoccurrences
    {
        return $this->occid;
    }

    public function setOccid(?Omoccurrences $occid): self
    {
        $this->occid = $occid;

        return $this;
    }


}
