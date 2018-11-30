<?php

namespace App\Entities;

use Doctrine\ORM\Mapping as ORM;

/**
 * Userroles
 *
 * @ORM\Table(name="userroles", indexes={@ORM\Index(name="FK_userroles_uid_idx", columns={"uid"}), @ORM\Index(name="FK_usrroles_uid2_idx", columns={"uidassignedby"}), @ORM\Index(name="Index_userroles_table", columns={"tablepk"})})
 * @ORM\Entity
 */
class Userroles
{
    public $transformer = UserrolesTransformer::class;

    /**
     * @var int
     *
     * @ORM\Column(name="userroleid", type="integer", precision=0, scale=0, nullable=false, options={"unsigned"=true}, unique=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $userroleid;

    /**
     * @var string
     *
     * @ORM\Column(name="role", type="string", length=45, precision=0, scale=0, nullable=false, unique=false)
     */
    private $role;

    /**
     * @var int|null
     *
     * @ORM\Column(name="tablepk", type="integer", precision=0, scale=0, nullable=true, unique=false)
     */
    private $tablepk;

    /**
     * @var string|null
     *
     * @ORM\Column(name="secondaryVariable", type="string", length=45, precision=0, scale=0, nullable=true, unique=false)
     */
    private $secondaryvariable;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="initialtimestamp", type="datetime", precision=0, scale=0, nullable=false, options={"default"="CURRENT_TIMESTAMP"}, unique=false)
     */
    private $initialtimestamp = 'CURRENT_TIMESTAMP';

    /**
     * @var int
     *
     * @ORM\ManyToOne(targetEntity="App\Entities\User")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="uid", referencedColumnName="uid", nullable=false)
     * })
     */
    private $uid;

    /**
     * @var int|null
     *
     * @ORM\ManyToOne(targetEntity="App\Entities\User")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="uidassignedby", referencedColumnName="uid", nullable=true)
     * })
     */
    private $uidassignedby;


    /**
     * Get userroleid.
     *
     * @return int
     */
    public function getUserroleid()
    {
        return $this->userroleid;
    }

    /**
     * Set role.
     *
     * @param string $role
     *
     * @return Userroles
     */
    public function setRole($role)
    {
        $this->role = $role;

        return $this;
    }

    /**
     * Get role.
     *
     * @return string
     */
    public function getRole()
    {
        return $this->role;
    }

    /**
     * Set tablepk.
     *
     * @param int|null $tablepk
     *
     * @return Userroles
     */
    public function setTablepk($tablepk = null)
    {
        $this->tablepk = $tablepk;

        return $this;
    }

    /**
     * Get tablepk.
     *
     * @return int|null
     */
    public function getTablepk()
    {
        return $this->tablepk;
    }

    /**
     * Set secondaryvariable.
     *
     * @param string|null $secondaryvariable
     *
     * @return Userroles
     */
    public function setSecondaryvariable($secondaryvariable = null)
    {
        $this->secondaryvariable = $secondaryvariable;

        return $this;
    }

    /**
     * Get secondaryvariable.
     *
     * @return string|null
     */
    public function getSecondaryvariable()
    {
        return $this->secondaryvariable;
    }

    /**
     * Set initialtimestamp.
     *
     * @param \DateTime $initialtimestamp
     *
     * @return Userroles
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
     * @param int|null $uid
     *
     * @return Userroles
     */
    public function setUid($uid)
    {
        $this->uid = $uid;

        return $this;
    }

    /**
     * Get uid.
     *
     * @return int|null $uid
     */
    public function getUid()
    {
        return $this->uid;
    }

    /**
     * Set uidassignedby.
     *
     * @param \App\Entities\User|null $uidassignedby
     *
     * @return Userroles
     */
    public function setUidassignedby(\App\Entities\User $uidassignedby = null)
    {
        $this->uidassignedby = $uidassignedby;

        return $this;
    }

    /**
     * Get uidassignedby.
     *
     * @return \App\Entities\User|null
     */
    public function getUidassignedby()
    {
        return $this->uidassignedby;
    }
}
