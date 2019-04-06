<?php

namespace Core\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Security\Core\User\UserInterface;
use Symfony\Component\Serializer\Annotation\Groups;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * UserRoles
 *
 * @ORM\Table(name="userroles", indexes={@ORM\Index(name="Index_userroles_table", columns={"tablepk"}), @ORM\Index(name="FK_usrroles_uid2_idx", columns={"uidassignedby"}), @ORM\Index(name="FK_userroles_uid_idx", columns={"uid"})})
 * @ORM\Entity()
 * @ApiResource(
 *     routePrefix="/core",
 *     collectionOperations={
 *          "post"={
 *              "access_control"="is_granted('SuperAdmin', object)",
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
class UserRoles implements UserIdAssignedByInterface, InitialTimestampInterface
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
     * @var \Core\Entity\Users
     *
     * @ORM\ManyToOne(targetEntity="Core\Entity\Users")
     * @ORM\JoinColumns({
     *      @ORM\JoinColumn(name="uid", referencedColumnName="uid", nullable=false)
     * })
     * @Groups({"post"})
     */
    private $userId;

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
     * @Assert\Type(type="integer")
     * @Groups({"post", "get-roles"})
     */
    private $tableId;

    /**
     * @var \Core\Entity\Users
     *
     * @ORM\ManyToOne(targetEntity="Core\Entity\Users")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="uidassignedby", referencedColumnName="uid")
     * })
     * @Groups({"get-roles"})
     */
    private $userIdAssignedBy;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="initialtimestamp", type="datetime")
     */
    private $initialTimestamp;

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

    public function getTableId(): ?int
    {
        return $this->tableId;
    }

    public function setTableId(?int $tableId): self
    {
        $this->tableId = $tableId;

        return $this;
    }

    public function getInitialTimestamp(): ?\DateTimeInterface
    {
        return $this->initialTimestamp;
    }

    public function setInitialTimestamp(\DateTimeInterface $initialTimestamp): InitialTimestampInterface
    {
        $this->initialTimestamp = $initialTimestamp;

        return $this;
    }

    /**
     * @return Users|null
     */
    public function getUserIdAssignedBy(): ?Users
    {
        return $this->userIdAssignedBy;
    }

    /**
     * @param UserInterface $userIdAssignedBy
     * @return UserIdAssignedByInterface
     */
    public function setUserIdAssignedBy(UserInterface $userIdAssignedBy): UserIdAssignedByInterface
    {
        $this->userIdAssignedBy = $userIdAssignedBy;

        return $this;
    }

    /**
     * @return Users|null
     */
    public function getUserId(): ?Users
    {
        return $this->userId;
    }

    /**
     * @param Users|null $userId
     * @return UserRoles
     */
    public function setUserId(?Users $userId): self
    {
        $this->userId = $userId;

        return $this;
    }


}
