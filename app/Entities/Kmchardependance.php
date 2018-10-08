<?php

namespace App\Entities;

use Doctrine\ORM\Mapping as ORM;

/**
 * Kmchardependance
 *
 * @ORM\Table(name="kmchardependance", indexes={@ORM\Index(name="FK_chardependance_cid_idx", columns={"CID"}), @ORM\Index(name="FK_chardependance_cs_idx", columns={"CIDDependance", "CSDependance"})})
 * @ORM\Entity
 */
class Kmchardependance
{
    /**
     * @var int
     *
     * @ORM\Column(name="CIDDependance", type="integer", precision=0, scale=0, nullable=false, options={"unsigned"=true}, unique=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     */
    private $ciddependance;

    /**
     * @var string
     *
     * @ORM\Column(name="CSDependance", type="string", length=16, precision=0, scale=0, nullable=false, unique=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     */
    private $csdependance;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="InitialTimeStamp", type="datetime", precision=0, scale=0, nullable=false, options={"default"="CURRENT_TIMESTAMP"}, unique=false)
     */
    private $initialtimestamp = 'CURRENT_TIMESTAMP';

    /**
     * @var \App\Entities\Kmcharacters
     *
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     * @ORM\OneToOne(targetEntity="App\Entities\Kmcharacters")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="CID", referencedColumnName="cid", nullable=true)
     * })
     */
    private $cid;


    /**
     * Set ciddependance.
     *
     * @param int $ciddependance
     *
     * @return Kmchardependance
     */
    public function setCiddependance($ciddependance)
    {
        $this->ciddependance = $ciddependance;

        return $this;
    }

    /**
     * Get ciddependance.
     *
     * @return int
     */
    public function getCiddependance()
    {
        return $this->ciddependance;
    }

    /**
     * Set csdependance.
     *
     * @param string $csdependance
     *
     * @return Kmchardependance
     */
    public function setCsdependance($csdependance)
    {
        $this->csdependance = $csdependance;

        return $this;
    }

    /**
     * Get csdependance.
     *
     * @return string
     */
    public function getCsdependance()
    {
        return $this->csdependance;
    }

    /**
     * Set initialtimestamp.
     *
     * @param \DateTime $initialtimestamp
     *
     * @return Kmchardependance
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
     * Set cid.
     *
     * @param \App\Entities\Kmcharacters $cid
     *
     * @return Kmchardependance
     */
    public function setCid(\App\Entities\Kmcharacters $cid)
    {
        $this->cid = $cid;

        return $this;
    }

    /**
     * Get cid.
     *
     * @return \App\Entities\Kmcharacters
     */
    public function getCid()
    {
        return $this->cid;
    }
}
