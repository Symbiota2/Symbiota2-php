<?php

namespace App\Entities;

use Doctrine\ORM\Mapping as ORM;

/**
 * Actionrequest
 *
 * @ORM\Table(name="actionrequest", indexes={@ORM\Index(name="FK_actionreq_uid1_idx", columns={"uid_requestor"}), @ORM\Index(name="FK_actionreq_uid2_idx", columns={"uid_fullfillor"}), @ORM\Index(name="FK_actionreq_type_idx", columns={"requesttype"})})
 * @ORM\Entity
 */
class Actionrequest
{
    /**
     * @var int
     *
     * @ORM\Column(name="actionrequestid", type="bigint", precision=0, scale=0, nullable=false, unique=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $actionrequestid;

    /**
     * @var int
     *
     * @ORM\Column(name="fk", type="integer", precision=0, scale=0, nullable=false, unique=false)
     */
    private $fk;

    /**
     * @var string|null
     *
     * @ORM\Column(name="tablename", type="string", length=255, precision=0, scale=0, nullable=true, unique=false)
     */
    private $tablename;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="requestdate", type="datetime", precision=0, scale=0, nullable=false, options={"default"="CURRENT_TIMESTAMP"}, unique=false)
     */
    private $requestdate = 'CURRENT_TIMESTAMP';

    /**
     * @var string|null
     *
     * @ORM\Column(name="requestremarks", type="string", length=900, precision=0, scale=0, nullable=true, unique=false)
     */
    private $requestremarks;

    /**
     * @var int|null
     *
     * @ORM\Column(name="priority", type="integer", precision=0, scale=0, nullable=true, unique=false)
     */
    private $priority;

    /**
     * @var string|null
     *
     * @ORM\Column(name="state", type="string", length=12, precision=0, scale=0, nullable=true, unique=false)
     */
    private $state;

    /**
     * @var string|null
     *
     * @ORM\Column(name="resolution", type="string", length=12, precision=0, scale=0, nullable=true, unique=false)
     */
    private $resolution;

    /**
     * @var \DateTime|null
     *
     * @ORM\Column(name="statesetdate", type="datetime", precision=0, scale=0, nullable=true, unique=false)
     */
    private $statesetdate;

    /**
     * @var string|null
     *
     * @ORM\Column(name="resolutionremarks", type="string", length=900, precision=0, scale=0, nullable=true, unique=false)
     */
    private $resolutionremarks;

    /**
     * @var \App\Entities\Actionrequesttype
     *
     * @ORM\ManyToOne(targetEntity="App\Entities\Actionrequesttype")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="requesttype", referencedColumnName="requesttype", nullable=true)
     * })
     */
    private $requesttype;

    /**
     * @var \App\Entities\User
     *
     * @ORM\ManyToOne(targetEntity="App\Entities\User")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="uid_requestor", referencedColumnName="uid", nullable=true)
     * })
     */
    private $uidRequestor;

    /**
     * @var \App\Entities\User
     *
     * @ORM\ManyToOne(targetEntity="App\Entities\User")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="uid_fullfillor", referencedColumnName="uid", nullable=true)
     * })
     */
    private $uidFullfillor;


    /**
     * Get actionrequestid.
     *
     * @return int
     */
    public function getActionrequestid()
    {
        return $this->actionrequestid;
    }

    /**
     * Set fk.
     *
     * @param int $fk
     *
     * @return Actionrequest
     */
    public function setFk($fk)
    {
        $this->fk = $fk;

        return $this;
    }

    /**
     * Get fk.
     *
     * @return int
     */
    public function getFk()
    {
        return $this->fk;
    }

    /**
     * Set tablename.
     *
     * @param string|null $tablename
     *
     * @return Actionrequest
     */
    public function setTablename($tablename = null)
    {
        $this->tablename = $tablename;

        return $this;
    }

    /**
     * Get tablename.
     *
     * @return string|null
     */
    public function getTablename()
    {
        return $this->tablename;
    }

    /**
     * Set requestdate.
     *
     * @param \DateTime $requestdate
     *
     * @return Actionrequest
     */
    public function setRequestdate($requestdate)
    {
        $this->requestdate = $requestdate;

        return $this;
    }

    /**
     * Get requestdate.
     *
     * @return \DateTime
     */
    public function getRequestdate()
    {
        return $this->requestdate;
    }

    /**
     * Set requestremarks.
     *
     * @param string|null $requestremarks
     *
     * @return Actionrequest
     */
    public function setRequestremarks($requestremarks = null)
    {
        $this->requestremarks = $requestremarks;

        return $this;
    }

    /**
     * Get requestremarks.
     *
     * @return string|null
     */
    public function getRequestremarks()
    {
        return $this->requestremarks;
    }

    /**
     * Set priority.
     *
     * @param int|null $priority
     *
     * @return Actionrequest
     */
    public function setPriority($priority = null)
    {
        $this->priority = $priority;

        return $this;
    }

    /**
     * Get priority.
     *
     * @return int|null
     */
    public function getPriority()
    {
        return $this->priority;
    }

    /**
     * Set state.
     *
     * @param string|null $state
     *
     * @return Actionrequest
     */
    public function setState($state = null)
    {
        $this->state = $state;

        return $this;
    }

    /**
     * Get state.
     *
     * @return string|null
     */
    public function getState()
    {
        return $this->state;
    }

    /**
     * Set resolution.
     *
     * @param string|null $resolution
     *
     * @return Actionrequest
     */
    public function setResolution($resolution = null)
    {
        $this->resolution = $resolution;

        return $this;
    }

    /**
     * Get resolution.
     *
     * @return string|null
     */
    public function getResolution()
    {
        return $this->resolution;
    }

    /**
     * Set statesetdate.
     *
     * @param \DateTime|null $statesetdate
     *
     * @return Actionrequest
     */
    public function setStatesetdate($statesetdate = null)
    {
        $this->statesetdate = $statesetdate;

        return $this;
    }

    /**
     * Get statesetdate.
     *
     * @return \DateTime|null
     */
    public function getStatesetdate()
    {
        return $this->statesetdate;
    }

    /**
     * Set resolutionremarks.
     *
     * @param string|null $resolutionremarks
     *
     * @return Actionrequest
     */
    public function setResolutionremarks($resolutionremarks = null)
    {
        $this->resolutionremarks = $resolutionremarks;

        return $this;
    }

    /**
     * Get resolutionremarks.
     *
     * @return string|null
     */
    public function getResolutionremarks()
    {
        return $this->resolutionremarks;
    }

    /**
     * Set requesttype.
     *
     * @param \App\Entities\Actionrequesttype|null $requesttype
     *
     * @return Actionrequest
     */
    public function setRequesttype(\App\Entities\Actionrequesttype $requesttype = null)
    {
        $this->requesttype = $requesttype;

        return $this;
    }

    /**
     * Get requesttype.
     *
     * @return \App\Entities\Actionrequesttype|null
     */
    public function getRequesttype()
    {
        return $this->requesttype;
    }

    /**
     * Set uidRequestor.
     *
     * @param \App\Entities\User|null $uidRequestor
     *
     * @return Actionrequest
     */
    public function setUidRequestor(\App\Entities\User $uidRequestor = null)
    {
        $this->uidRequestor = $uidRequestor;

        return $this;
    }

    /**
     * Get uidRequestor.
     *
     * @return \App\Entities\User|null
     */
    public function getUidRequestor()
    {
        return $this->uidRequestor;
    }

    /**
     * Set uidFullfillor.
     *
     * @param \App\Entities\User|null $uidFullfillor
     *
     * @return Actionrequest
     */
    public function setUidFullfillor(\App\Entities\User $uidFullfillor = null)
    {
        $this->uidFullfillor = $uidFullfillor;

        return $this;
    }

    /**
     * Get uidFullfillor.
     *
     * @return \App\Entities\User|null
     */
    public function getUidFullfillor()
    {
        return $this->uidFullfillor;
    }
}
