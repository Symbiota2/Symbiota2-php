<?php

namespace App\Entities;

use Doctrine\ORM\Mapping as ORM;

/**
 * Omoccureditlocks
 *
 * @ORM\Table(name="omoccureditlocks")
 * @ORM\Entity
 */
class Omoccureditlocks
{
    /**
     * @var int
     *
     * @ORM\Column(name="occid", type="integer", precision=0, scale=0, nullable=false, options={"unsigned"=true}, unique=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $occid;

    /**
     * @var int
     *
     * @ORM\Column(name="uid", type="integer", precision=0, scale=0, nullable=false, unique=false)
     */
    private $uid;

    /**
     * @var int
     *
     * @ORM\Column(name="ts", type="integer", precision=0, scale=0, nullable=false, unique=false)
     */
    private $ts;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="initialtimestamp", type="datetime", precision=0, scale=0, nullable=false, options={"default"="CURRENT_TIMESTAMP"}, unique=false)
     */
    private $initialtimestamp = 'CURRENT_TIMESTAMP';


    /**
     * Get occid.
     *
     * @return int
     */
    public function getOccid()
    {
        return $this->occid;
    }

    /**
     * Set uid.
     *
     * @param int $uid
     *
     * @return Omoccureditlocks
     */
    public function setUid($uid)
    {
        $this->uid = $uid;

        return $this;
    }

    /**
     * Get uid.
     *
     * @return int
     */
    public function getUid()
    {
        return $this->uid;
    }

    /**
     * Set ts.
     *
     * @param int $ts
     *
     * @return Omoccureditlocks
     */
    public function setTs($ts)
    {
        $this->ts = $ts;

        return $this;
    }

    /**
     * Get ts.
     *
     * @return int
     */
    public function getTs()
    {
        return $this->ts;
    }

    /**
     * Set initialtimestamp.
     *
     * @param \DateTime $initialtimestamp
     *
     * @return Omoccureditlocks
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
