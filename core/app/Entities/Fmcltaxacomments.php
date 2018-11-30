<?php

namespace App\Entities;

use Doctrine\ORM\Mapping as ORM;

/**
 * Fmcltaxacomments
 *
 * @ORM\Table(name="fmcltaxacomments", indexes={@ORM\Index(name="FK_clcomment_users", columns={"uid"}), @ORM\Index(name="FK_clcomment_cltaxa", columns={"clid", "tid"})})
 * @ORM\Entity
 */
class Fmcltaxacomments
{
    /**
     * @var int
     *
     * @ORM\Column(name="cltaxacommentsid", type="integer", precision=0, scale=0, nullable=false, unique=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $cltaxacommentsid;

    /**
     * @var int
     *
     * @ORM\Column(name="clid", type="integer", precision=0, scale=0, nullable=false, options={"unsigned"=true}, unique=false)
     */
    private $clid;

    /**
     * @var int
     *
     * @ORM\Column(name="tid", type="integer", precision=0, scale=0, nullable=false, options={"unsigned"=true}, unique=false)
     */
    private $tid;

    /**
     * @var string
     *
     * @ORM\Column(name="comment", type="text", length=65535, precision=0, scale=0, nullable=false, unique=false)
     */
    private $comment;

    /**
     * @var int
     *
     * @ORM\Column(name="ispublic", type="integer", precision=0, scale=0, nullable=false, options={"default"="1"}, unique=false)
     */
    private $ispublic = '1';

    /**
     * @var int|null
     *
     * @ORM\Column(name="parentid", type="integer", precision=0, scale=0, nullable=true, unique=false)
     */
    private $parentid;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="initialtimestamp", type="datetime", precision=0, scale=0, nullable=false, options={"default"="CURRENT_TIMESTAMP"}, unique=false)
     */
    private $initialtimestamp = 'CURRENT_TIMESTAMP';

    /**
     * @var \App\Entities\User
     *
     * @ORM\ManyToOne(targetEntity="App\Entities\User")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="uid", referencedColumnName="uid", nullable=false)
     * })
     */
    private $uid;


    /**
     * Get cltaxacommentsid.
     *
     * @return int
     */
    public function getCltaxacommentsid()
    {
        return $this->cltaxacommentsid;
    }

    /**
     * Set clid.
     *
     * @param int $clid
     *
     * @return Fmcltaxacomments
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
     * @return Fmcltaxacomments
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
     * Set comment.
     *
     * @param string $comment
     *
     * @return Fmcltaxacomments
     */
    public function setComment($comment)
    {
        $this->comment = $comment;

        return $this;
    }

    /**
     * Get comment.
     *
     * @return string
     */
    public function getComment()
    {
        return $this->comment;
    }

    /**
     * Set ispublic.
     *
     * @param int $ispublic
     *
     * @return Fmcltaxacomments
     */
    public function setIspublic($ispublic)
    {
        $this->ispublic = $ispublic;

        return $this;
    }

    /**
     * Get ispublic.
     *
     * @return int
     */
    public function getIspublic()
    {
        return $this->ispublic;
    }

    /**
     * Set parentid.
     *
     * @param int|null $parentid
     *
     * @return Fmcltaxacomments
     */
    public function setParentid($parentid = null)
    {
        $this->parentid = $parentid;

        return $this;
    }

    /**
     * Get parentid.
     *
     * @return int|null
     */
    public function getParentid()
    {
        return $this->parentid;
    }

    /**
     * Set initialtimestamp.
     *
     * @param \DateTime $initialtimestamp
     *
     * @return Fmcltaxacomments
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
     * Set uid.
     *
     * @param \App\Entities\User|null $uid
     *
     * @return Fmcltaxacomments
     */
    public function setUid(\App\Entities\User $uid = null)
    {
        $this->uid = $uid;

        return $this;
    }

    /**
     * Get uid.
     *
     * @return \App\Entities\User|null
     */
    public function getUid()
    {
        return $this->uid;
    }
}
