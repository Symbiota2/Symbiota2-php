<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use Doctrine\ORM\Mapping as ORM;

/**
 * Userroles
 *
 * @ORM\Table(name="userroles", indexes={@ORM\Index(name="Index_userroles_table", columns={"tablepk"}), @ORM\Index(name="FK_usrroles_uid2_idx", columns={"uidassignedby"}), @ORM\Index(name="FK_userroles_uid_idx", columns={"uid"})})
 * @ORM\Entity(repositoryClass="App\Repository\UserrolesRepository")
 * @ApiResource(
 *     itemOperations={"get"},
 *     collectionOperations={"get"}
 * )
 */
class Userroles
{
    /**
     * @var int
     *
     * @ORM\Column(name="userroleid", type="integer", nullable=false, options={"unsigned"=true})
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $userroleid;

    /**
     * @var \Users
     *
     * @ORM\ManyToOne(targetEntity="App\Entity\Users")
     * @ORM\JoinColumns({
     *      @ORM\JoinColumn(name="uid", referencedColumnName="uid")
     * })
     */
    private $uid;

    /**
     * @var string
     *
     * @ORM\Column(name="role", type="string", length=45, nullable=false)
     */
    private $role;

    /**
     * @var int|null
     *
     * @ORM\Column(name="tablepk", type="integer", nullable=true, options={"default"=NULL})
     */
    private $tablepk = 'NULL';

    /**
     * @var string|null
     *
     * @ORM\Column(name="secondaryVariable", type="string", length=45, nullable=true, options={"default"=NULL})
     */
    private $secondaryvariable = 'NULL';

    /**
     * @var \Users
     *
     * @ORM\ManyToOne(targetEntity="Users")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="uidassignedby", referencedColumnName="uid")
     * })
     */
    private $uidassignedby;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="initialtimestamp", type="datetime", nullable=false, options={"default"="CURRENT_TIMESTAMP"})
     */
    private $initialtimestamp = 'CURRENT_TIMESTAMP';

    public function getUserroleid(): ?int
    {
        return $this->userroleid;
    }

    public function getRole(): ?string
    {
        return $this->role;
    }

    public function setRole(string $role): self
    {
        $this->role = $role;

        return $this;
    }

    public function getTablepk(): ?int
    {
        return $this->tablepk;
    }

    public function setTablepk(?int $tablepk): self
    {
        $this->tablepk = $tablepk;

        return $this;
    }

    public function getSecondaryvariable(): ?string
    {
        return $this->secondaryvariable;
    }

    public function setSecondaryvariable(?string $secondaryvariable): self
    {
        $this->secondaryvariable = $secondaryvariable;

        return $this;
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

    public function getUidassignedby(): ?Users
    {
        return $this->uidassignedby;
    }

    public function setUidassignedby(?Users $uidassignedby): self
    {
        $this->uidassignedby = $uidassignedby;

        return $this;
    }

    public function getUid(): ?Users
    {
        return $this->uid;
    }

    public function setUid(?Users $uid): self
    {
        $this->uid = $uid;

        return $this;
    }


}
