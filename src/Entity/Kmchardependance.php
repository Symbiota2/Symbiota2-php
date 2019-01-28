<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Kmchardependance
 *
 * @ORM\Table(name="kmchardependance", indexes={@ORM\Index(name="FK_chardependance_cs_idx", columns={"CIDDependance", "CSDependance"}), @ORM\Index(name="FK_chardependance_cid_idx", columns={"CID"})})
 * @ORM\Entity(repositoryClass="App\Repository\KmchardependanceRepository")
 */
class Kmchardependance
{
    /**
     * @var \Kmcharacters
     *
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     * @ORM\OneToOne(targetEntity="Kmcharacters")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="CID", referencedColumnName="cid")
     * })
     */
    private $cid;

    /**
     * @var int
     *
     * @ORM\Column(name="CIDDependance", type="integer", nullable=false, options={"unsigned"=true})
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     */
    private $ciddependance;

    /**
     * @var string
     *
     * @ORM\Column(name="CSDependance", type="string", length=16, nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     */
    private $csdependance;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="InitialTimeStamp", type="datetime", nullable=false, options={"default"="CURRENT_TIMESTAMP"})
     */
    private $initialtimestamp = 'CURRENT_TIMESTAMP';

    public function getCiddependance(): ?int
    {
        return $this->ciddependance;
    }

    public function getCsdependance(): ?string
    {
        return $this->csdependance;
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

    public function getCid(): ?Kmcharacters
    {
        return $this->cid;
    }

    public function setCid(?Kmcharacters $cid): self
    {
        $this->cid = $cid;

        return $this;
    }


}
