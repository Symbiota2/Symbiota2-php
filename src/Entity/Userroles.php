<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Security\Core\User\UserInterface;
use Symfony\Component\Serializer\Annotation\Groups;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Userroles
 *
 * @ORM\Table(name="userroles", indexes={@ORM\Index(name="Index_userroles_table", columns={"tablepk"}), @ORM\Index(name="FK_usrroles_uid2_idx", columns={"uidassignedby"}), @ORM\Index(name="FK_userroles_uid_idx", columns={"uid"})})
 * @ORM\Entity(repositoryClass="App\Repository\UserrolesRepository")
 * @ApiResource(
 *      collectionOperations={
 *          "post"={
 *              "access_control"="is_granted('IS_AUTHENTICATED_FULLY')",
 *              "normalization_context"={
 *                 "groups"={"get-roles"}
 *              }
 *          },
 *          "api_users_roles_get_subresource"={
 *              "normalization_context"={
 *                  "groups"={"get-roles"}
 *              }
 *          }
 *      },
 *      denormalizationContext={
 *          "groups"={"post"}
 *      }
 * )
 */
class Userroles implements UidassignedbyInterface, InitialtimestampInterface
{
    /**
     * @var int
     *
     * @ORM\Column(name="userroleid", type="integer", nullable=false, options={"unsigned"=true})
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     * @Groups({"get-roles"})
     */
    private $userroleid;

    /**
     * @var \App\Entity\Users
     *
     * @ORM\ManyToOne(targetEntity="App\Entity\Users")
     * @ORM\JoinColumns({
     *      @ORM\JoinColumn(name="uid", referencedColumnName="uid")
     * })
     * @Assert\NotBlank()
     * @Groups({"post"})
     */
    private $uid;

    /**
     * @var string
     *
     * @ORM\Column(name="role", type="string", length=45)
     * @Assert\NotBlank()
     * @Assert\Length(max=45)
     * @Groups({"post", "get-roles"})
     */
    private $role;

    /**
     * @var int|null
     *
     * @ORM\Column(name="tablepk", type="integer", nullable=true)
     * @Assert\Type(
     *      type="integer"
     * )
     * @Groups({"post", "get-roles"})
     */
    private $tablepk;

    /**
     * @var string|null
     *
     * @ORM\Column(name="secondaryVariable", type="string", length=45, nullable=true)
     * @Assert\Length(max=45)
     * @Groups({"post", "get-roles"})
     */
    private $secondaryvariable;

    /**
     * @var \App\Entity\Users
     *
     * @ORM\ManyToOne(targetEntity="Users")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="uidassignedby", referencedColumnName="uid")
     * })
     * @Groups({"get-roles"})
     */
    private $uidassignedby;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="initialtimestamp", type="datetime")
     */
    private $initialtimestamp;

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

    public function setInitialtimestamp(\DateTimeInterface $initialtimestamp): InitialtimestampInterface
    {
        $this->initialtimestamp = $initialtimestamp;

        return $this;
    }

    /**
     * @return Users|null
     */
    public function getUidassignedby(): ?Users
    {
        return $this->uidassignedby;
    }

    /**
     * @param UserInterface $uidassignedby
     * @return UidassignedbyInterface
     */
    public function setUidassignedby(UserInterface $uidassignedby): UidassignedbyInterface
    {
        $this->uidassignedby = $uidassignedby;

        return $this;
    }

    /**
     * @return Users|null
     */
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
