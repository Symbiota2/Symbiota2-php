<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Actionrequest
 *
 * @ORM\Table(name="actionrequest", indexes={@ORM\Index(name="FK_actionreq_type_idx", columns={"requesttype"}), @ORM\Index(name="FK_actionreq_uid2_idx", columns={"uid_fullfillor"}), @ORM\Index(name="FK_actionreq_uid1_idx", columns={"uid_requestor"})})
 * @ORM\Entity(repositoryClass="App\Repository\ActionrequestRepository")
 */
class Actionrequest
{
    /**
     * @var int
     *
     * @ORM\Column(name="actionrequestid", type="bigint", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $actionrequestid;

    /**
     * @var int
     *
     * @ORM\Column(name="fk", type="integer", nullable=false)
     */
    private $fk;

    /**
     * @var string|null
     *
     * @ORM\Column(name="tablename", type="string", length=255, nullable=true, options={"default"="NULL"})
     */
    private $tablename = 'NULL';

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="requestdate", type="datetime", nullable=false, options={"default"="current_timestamp()"})
     */
    private $requestdate = 'current_timestamp()';

    /**
     * @var string|null
     *
     * @ORM\Column(name="requestremarks", type="string", length=900, nullable=true, options={"default"="NULL"})
     */
    private $requestremarks = 'NULL';

    /**
     * @var int|null
     *
     * @ORM\Column(name="priority", type="integer", nullable=true, options={"default"="NULL"})
     */
    private $priority = 'NULL';

    /**
     * @var string|null
     *
     * @ORM\Column(name="state", type="string", length=12, nullable=true, options={"default"="NULL"})
     */
    private $state = 'NULL';

    /**
     * @var string|null
     *
     * @ORM\Column(name="resolution", type="string", length=12, nullable=true, options={"default"="NULL"})
     */
    private $resolution = 'NULL';

    /**
     * @var \DateTime|null
     *
     * @ORM\Column(name="statesetdate", type="datetime", nullable=true, options={"default"="NULL"})
     */
    private $statesetdate = 'NULL';

    /**
     * @var string|null
     *
     * @ORM\Column(name="resolutionremarks", type="string", length=900, nullable=true, options={"default"="NULL"})
     */
    private $resolutionremarks = 'NULL';

    /**
     * @var \Users
     *
     * @ORM\ManyToOne(targetEntity="Users")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="uid_fullfillor", referencedColumnName="uid")
     * })
     */
    private $uidFullfillor;

    /**
     * @var \Users
     *
     * @ORM\ManyToOne(targetEntity="Users")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="uid_requestor", referencedColumnName="uid")
     * })
     */
    private $uidRequestor;

    /**
     * @var \Actionrequesttype
     *
     * @ORM\ManyToOne(targetEntity="Actionrequesttype")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="requesttype", referencedColumnName="requesttype")
     * })
     */
    private $requesttype;

    public function getActionrequestid(): ?int
    {
        return $this->actionrequestid;
    }

    public function getFk(): ?int
    {
        return $this->fk;
    }

    public function setFk(int $fk): self
    {
        $this->fk = $fk;

        return $this;
    }

    public function getTablename(): ?string
    {
        return $this->tablename;
    }

    public function setTablename(?string $tablename): self
    {
        $this->tablename = $tablename;

        return $this;
    }

    public function getRequestdate(): ?\DateTimeInterface
    {
        return $this->requestdate;
    }

    public function setRequestdate(\DateTimeInterface $requestdate): self
    {
        $this->requestdate = $requestdate;

        return $this;
    }

    public function getRequestremarks(): ?string
    {
        return $this->requestremarks;
    }

    public function setRequestremarks(?string $requestremarks): self
    {
        $this->requestremarks = $requestremarks;

        return $this;
    }

    public function getPriority(): ?int
    {
        return $this->priority;
    }

    public function setPriority(?int $priority): self
    {
        $this->priority = $priority;

        return $this;
    }

    public function getState(): ?string
    {
        return $this->state;
    }

    public function setState(?string $state): self
    {
        $this->state = $state;

        return $this;
    }

    public function getResolution(): ?string
    {
        return $this->resolution;
    }

    public function setResolution(?string $resolution): self
    {
        $this->resolution = $resolution;

        return $this;
    }

    public function getStatesetdate(): ?\DateTimeInterface
    {
        return $this->statesetdate;
    }

    public function setStatesetdate(?\DateTimeInterface $statesetdate): self
    {
        $this->statesetdate = $statesetdate;

        return $this;
    }

    public function getResolutionremarks(): ?string
    {
        return $this->resolutionremarks;
    }

    public function setResolutionremarks(?string $resolutionremarks): self
    {
        $this->resolutionremarks = $resolutionremarks;

        return $this;
    }

    public function getUidFullfillor(): ?Users
    {
        return $this->uidFullfillor;
    }

    public function setUidFullfillor(?Users $uidFullfillor): self
    {
        $this->uidFullfillor = $uidFullfillor;

        return $this;
    }

    public function getUidRequestor(): ?Users
    {
        return $this->uidRequestor;
    }

    public function setUidRequestor(?Users $uidRequestor): self
    {
        $this->uidRequestor = $uidRequestor;

        return $this;
    }

    public function getRequesttype(): ?Actionrequesttype
    {
        return $this->requesttype;
    }

    public function setRequesttype(?Actionrequesttype $requesttype): self
    {
        $this->requesttype = $requesttype;

        return $this;
    }


}
