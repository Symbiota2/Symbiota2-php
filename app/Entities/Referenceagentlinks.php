<?php

namespace App\Entities;

use Doctrine\ORM\Mapping as ORM;

/**
 * Referenceagentlinks
 *
 * @ORM\Table(name="referenceagentlinks")
 * @ORM\Entity
 */
class Referenceagentlinks
{
    /**
     * @var int
     *
     * @ORM\Column(name="refid", type="integer", precision=0, scale=0, nullable=false, unique=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     */
    private $refid;

    /**
     * @var int
     *
     * @ORM\Column(name="agentid", type="integer", precision=0, scale=0, nullable=false, unique=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     */
    private $agentid;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="initialtimestamp", type="datetime", precision=0, scale=0, nullable=false, options={"default"="CURRENT_TIMESTAMP"}, unique=false)
     */
    private $initialtimestamp = 'CURRENT_TIMESTAMP';

    /**
     * @var int
     *
     * @ORM\Column(name="createdbyid", type="integer", precision=0, scale=0, nullable=false, unique=false)
     */
    private $createdbyid;


    /**
     * Set refid.
     *
     * @param int $refid
     *
     * @return Referenceagentlinks
     */
    public function setRefid($refid)
    {
        $this->refid = $refid;

        return $this;
    }

    /**
     * Get refid.
     *
     * @return int
     */
    public function getRefid()
    {
        return $this->refid;
    }

    /**
     * Set agentid.
     *
     * @param int $agentid
     *
     * @return Referenceagentlinks
     */
    public function setAgentid($agentid)
    {
        $this->agentid = $agentid;

        return $this;
    }

    /**
     * Get agentid.
     *
     * @return int
     */
    public function getAgentid()
    {
        return $this->agentid;
    }

    /**
     * Set initialtimestamp.
     *
     * @param \DateTime $initialtimestamp
     *
     * @return Referenceagentlinks
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
     * Set createdbyid.
     *
     * @param int $createdbyid
     *
     * @return Referenceagentlinks
     */
    public function setCreatedbyid($createdbyid)
    {
        $this->createdbyid = $createdbyid;

        return $this;
    }

    /**
     * Get createdbyid.
     *
     * @return int
     */
    public function getCreatedbyid()
    {
        return $this->createdbyid;
    }
}
