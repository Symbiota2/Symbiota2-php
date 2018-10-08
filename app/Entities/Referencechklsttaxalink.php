<?php

namespace App\Entities;

use Doctrine\ORM\Mapping as ORM;

/**
 * Referencechklsttaxalink
 *
 * @ORM\Table(name="referencechklsttaxalink", indexes={@ORM\Index(name="FK_refchktaxalink_clidtid_idx", columns={"clid", "tid"}), @ORM\Index(name="IDX_1B708068FB7281BE", columns={"refid"})})
 * @ORM\Entity
 */
class Referencechklsttaxalink
{
    /**
     * @var int
     *
     * @ORM\Column(name="clid", type="integer", precision=0, scale=0, nullable=false, options={"unsigned"=true}, unique=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     */
    private $clid;

    /**
     * @var int
     *
     * @ORM\Column(name="tid", type="integer", precision=0, scale=0, nullable=false, options={"unsigned"=true}, unique=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     */
    private $tid;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="initialtimestamp", type="datetime", precision=0, scale=0, nullable=false, options={"default"="CURRENT_TIMESTAMP"}, unique=false)
     */
    private $initialtimestamp = 'CURRENT_TIMESTAMP';

    /**
     * @var \App\Entities\Referenceobject
     *
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     * @ORM\OneToOne(targetEntity="App\Entities\Referenceobject")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="refid", referencedColumnName="refid", nullable=true)
     * })
     */
    private $refid;


    /**
     * Set clid.
     *
     * @param int $clid
     *
     * @return Referencechklsttaxalink
     */
    public function setClid($clid)
    {
        $this->clid = $clid;

        return $this;
    }

    /**
     * Get clid.
     *
     * @return int
     */
    public function getClid()
    {
        return $this->clid;
    }

    /**
     * Set tid.
     *
     * @param int $tid
     *
     * @return Referencechklsttaxalink
     */
    public function setTid($tid)
    {
        $this->tid = $tid;

        return $this;
    }

    /**
     * Get tid.
     *
     * @return int
     */
    public function getTid()
    {
        return $this->tid;
    }

    /**
     * Set initialtimestamp.
     *
     * @param \DateTime $initialtimestamp
     *
     * @return Referencechklsttaxalink
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
     * Set refid.
     *
     * @param \App\Entities\Referenceobject $refid
     *
     * @return Referencechklsttaxalink
     */
    public function setRefid(\App\Entities\Referenceobject $refid)
    {
        $this->refid = $refid;

        return $this;
    }

    /**
     * Get refid.
     *
     * @return \App\Entities\Referenceobject
     */
    public function getRefid()
    {
        return $this->refid;
    }
}
