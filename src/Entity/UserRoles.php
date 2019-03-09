<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Security\Core\User\UserInterface;
use Symfony\Component\Serializer\Annotation\Groups;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * UserRoles
 *
 * @ORM\Table(name="userroles", indexes={@ORM\Index(name="Index_userroles_table", columns={"tablepk"}), @ORM\Index(name="FK_usrroles_uid2_idx", columns={"uidassignedby"}), @ORM\Index(name="FK_userroles_uid_idx", columns={"uid"})})
 * @ORM\Entity(repositoryClass="App\Repository\UserRolesRepository")
 * @ApiResource(
 *      collectionOperations={
 *          "post"={
 *              "access_control"="is_granted('IS_AUTHENTICATED_FULLY')",
 *              "normalization_context"={
 *                 "groups"={"get-roles"}
 *              }
 *          },
 *          "api_users_permissions_get_subresource"={
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
class UserRoles implements UserIdAssignedByInterface, InitialTimeStampInterface
{
    /**
     * @var int
     *
     * @ORM\Column(name="userroleid", type="integer", options={"unsigned"=true})
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     * @Groups({"get-roles"})
     */
    private $id;

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
    private $userid;

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
     * @var \App\Entity\Users
     *
     * @ORM\ManyToOne(targetEntity="App\Entity\Users")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="uidassignedby", referencedColumnName="uid")
     * })
     * @Groups({"get-roles"})
     */
    private $useridassignedby;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="initialtimestamp", type="datetime")
     */
    private $initialtimestamp;

    public function getId(): ?int
    {
        return $this->id;
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

    public function getInitialtimestamp(): ?\DateTimeInterface
    {
        return $this->initialtimestamp;
    }

    public function setInitialtimestamp(\DateTimeInterface $initialtimestamp): InitialTimeStampInterface
    {
        $this->initialtimestamp = $initialtimestamp;

        return $this;
    }

    /**
     * @return Users|null
     */
    public function getUseridassignedby(): ?Users
    {
        return $this->useridassignedby;
    }

    /**
     * @param UserInterface $useridassignedby
     * @return UserIdAssignedByInterface
     */
    public function setUseridassignedby(UserInterface $useridassignedby): UserIdAssignedByInterface
    {
        $this->useridassignedby = $useridassignedby;

        return $this;
    }

    /**
     * @return Users|null
     */
    public function getUserid(): ?Users
    {
        return $this->userid;
    }

    /**
     * @param Users|null $userid
     * @return UserRoles
     */
    public function setUserid(?Users $userid): self
    {
        $this->userid = $userid;

        return $this;
    }


}
