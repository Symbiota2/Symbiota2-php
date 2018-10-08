<?php

namespace App\Entities;

use Doctrine\ORM\Mapping as ORM;

/**
 * Fmchklstchildren
 *
 * @ORM\Table(name="fmchklstchildren", indexes={@ORM\Index(name="FK_fmchklstchild_clid_idx", columns={"clid"}), @ORM\Index(name="FK_fmchklstchild_child_idx", columns={"clidchild"})})
 * @ORM\Entity
 */
class Fmchklstchildren
{
    /**
     * @var int
     *
     * @ORM\Column(name="clidchild", type="integer", precision=0, scale=0, nullable=false, options={"unsigned"=true}, unique=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     */
    private $clidchild;

    /**
     * @var int
     *
     * @ORM\Column(name="modifiedUid", type="integer", precision=0, scale=0, nullable=false, options={"unsigned"=true}, unique=false)
     */
    private $modifieduid;

    /**
     * @var \DateTime|null
     *
     * @ORM\Column(name="modifiedtimestamp", type="datetime", precision=0, scale=0, nullable=true, unique=false)
     */
    private $modifiedtimestamp;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="initialtimestamp", type="datetime", precision=0, scale=0, nullable=false, options={"default"="CURRENT_TIMESTAMP"}, unique=false)
     */
    private $initialtimestamp = 'CURRENT_TIMESTAMP';

    /**
     * @var \App\Entities\Fmchecklists
     *
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     * @ORM\OneToOne(targetEntity="App\Entities\Fmchecklists")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="clid", referencedColumnName="CLID", nullable=true)
     * })
     */
    private $clid;


    /**
     * Set clidchild.
     *
     * @param int $clidchild
     *
     * @return Fmchklstchildren
     */
    public function setClidchild($clidchild)
    {
        $this->clidchild = $clidchild;

        return $this;
    }

    /**
     * Get clidchild.
     *
     * @return int
     */
    public function getClidchild()
    {
        return $this->clidchild;
    }

    /**
     * Set modifieduid.
     *
     * @param int $modifieduid
     *
     * @return Fmchklstchildren
     */
    public function setModifieduid($modifieduid)
    {
        $this->modifieduid = $modifieduid;

        return $this;
    }

    /**
     * Get modifieduid.
     *
     * @return int
     */
    public function getModifieduid()
    {
        return $this->modifieduid;
    }

    /**
     * Set modifiedtimestamp.
     *
     * @param \DateTime|null $modifiedtimestamp
     *
     * @return Fmchklstchildren
     */
    public function setModifiedtimestamp($modifiedtimestamp = null)
    {
        $this->modifiedtimestamp = $modifiedtimestamp;

        return $this;
    }

    /**
     * Get modifiedtimestamp.
     *
     * @return \DateTime|null
     */
    public function getModifiedtimestamp()
    {
        return $this->modifiedtimestamp;
    }

    /**
     * Set initialtimestamp.
     *
     * @param \DateTime $initialtimestamp
     *
     * @return Fmchklstchildren
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
     * Set clid.
     *
     * @param \App\Entities\Fmchecklists $clid
     *
     * @return Fmchklstchildren
     */
    public function setClid(\App\Entities\Fmchecklists $clid)
    {
        $this->clid = $clid;

        return $this;
    }

    /**
     * Get clid.
     *
     * @return \App\Entities\Fmchecklists
     */
    public function getClid()
    {
        return $this->clid;
    }
}
