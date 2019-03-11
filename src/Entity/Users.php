<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use ApiPlatform\Core\Annotation\ApiSubresource;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;
use Symfony\Component\Security\Core\User\UserInterface;
use Symfony\Component\Security\Core\Validator\Constraints\UserPassword;
use Symfony\Component\Serializer\Annotation\Groups;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Users
 *
 * @ApiResource(
 *      itemOperations={
 *          "get"={
 *              "access_control"="is_granted('SuperAdmin', object) or object == user",
 *              "normalization_context"={
 *                  "groups"={"get"}
 *              }
 *          },
 *          "put"={
 *              "access_control"="is_granted('SuperAdmin', object) or object == user",
 *              "denormalization_context"={
 *                  "groups"={"put"}
 *              },
 *              "normalization_context"={
 *                  "groups"={"get"}
 *              },
 *              "validation_groups"={"put"}
 *          }
 *      },
 *      collectionOperations={
 *          "get"={
 *              "access_control"="is_granted('SuperAdmin', object)",
 *              "normalization_context"={
 *                  "groups"={"get"}
 *              }
 *          },
 *          "post"={
 *              "denormalization_context"={
 *                  "groups"={"post"}
 *              },
 *              "normalization_context"={
 *                  "groups"={"get"}
 *              },
 *              "validation_groups"={"post"}
 *          }
 *      },
 * )
 * @ORM\Table(name="users")
 * @ORM\Entity(repositoryClass="App\Repository\UsersRepository")
 * @UniqueEntity("username", errorPath="username", groups={"post"})
 * @UniqueEntity("email", groups={"post", "put"})
 */
class Users implements UserInterface, InitialTimestampInterface, ModifiedTimestampInterface
{
    /**
     * @var int
     *
     * @ORM\Column(name="uid", type="integer", options={"unsigned"=true})
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     * @Groups({"get", "get-roles", "get-checklist-info"})
     */
    private $id;

    /**
     * @var string|null
     *
     * @ORM\Column(name="firstname", type="string", length=45, nullable=true)
     * @Groups({"get", "get-roles", "get-checklist-info", "post", "put"})
     * @Assert\Length(max=45, groups={"post", "put"})
     */
    private $firstName;

    /**
     * @var string|null
     *
     * @ORM\Column(name="middleinitial", type="string", length=2, nullable=true)
     * @Groups({"get", "get-roles", "get-checklist-info", "post", "put"})
     * @Assert\Length(max=2, groups={"post", "put"})
     */
    private $middleInitial;

    /**
     * @var string
     *
     * @ORM\Column(name="lastname", type="string", length=45, nullable=false)
     * @Groups({"get", "get-roles", "get-checklist-info", "post", "put"})
     * @Assert\NotBlank(groups={"post", "put"})
     * @Assert\Length(max=45, groups={"post", "put"})
     */
    private $lastName;

    /**
     * @var string
     *
     * @ORM\Column(name="username", type="string", length=45, nullable=false)
     * @Groups({"get", "get-roles", "get-checklist-info", "post"})
     * @Assert\NotBlank(groups={"post"})
     * @Assert\Length(min=6, max=45, groups={"post"})
     */
    private $username;

    /**
     * @var string
     *
     * @ORM\Column(name="password", type="string", length=255, nullable=false)
     * @Groups({"post", "put"})
     * @Assert\NotBlank(groups={"post", "put"})
     * @Assert\Regex(
     *     pattern="/(?=.*[A-Za-z])(?=.*[0-9]).{6,}/",
     *     message="Password must be at least six characters long and contain at least one digit and one upper or lower case letter",
     *     groups={"post", "put"}
     * )
     */
    private $password;

    /**
     * @Groups({"post", "put"})
     * @Assert\NotBlank(groups={"post", "put"})
     * @Assert\Expression(
     *     "this.getPassword() === this.getRetypedPassword()",
     *     message="Passwords do not match",
     *     groups={"post", "put"}
     * )
     */
    private $retypedPassword;

    /**
     * @Groups({"password_reset"})
     * @Assert\NotBlank(groups={"password_reset"})
     * @Assert\Regex(
     *     pattern="/(?=.*[A-Za-z])(?=.*[0-9]).{6,}/",
     *     message="Password must be at least six characters long and contain at least one digit and one upper or lower case letter",
     *     groups={"password_reset"}
     * )
     */
    private $newPassword;

    /**
     * @Groups({"password_reset"})
     * @Assert\NotBlank(groups={"password_reset"})
     * @Assert\Expression(
     *     "this.getNewPassword() === this.getNewRetypedPassword()",
     *     message="Passwords do not match",
     *     groups={"password_reset"}
     * )
     */
    private $newRetypedPassword;

    /**
     * @Groups({"password_reset"})
     * @Assert\NotBlank(groups={"password_reset"})
     * @UserPassword(groups={"password_reset"})
     */
    private $oldPassword;

    /**
     * @var string|null
     *
     * @ORM\Column(name="title", type="string", length=150, nullable=true)
     * @Groups({"get", "post", "put"})
     * @Assert\Length(max=150, groups={"post", "put"})
     */
    private $title;

    /**
     * @var string|null
     *
     * @ORM\Column(name="institution", type="string", length=200, nullable=true)
     * @Groups({"get", "post", "put"})
     * @Assert\Length(max=200, groups={"post", "put"})
     */
    private $institution;

    /**
     * @var string|null
     *
     * @ORM\Column(name="department", type="string", length=200, nullable=true)
     * @Groups({"get", "post", "put"})
     * @Assert\Length(max=200, groups={"post", "put"})
     */
    private $department;

    /**
     * @var string|null
     *
     * @ORM\Column(name="address", type="string", length=255, nullable=true)
     * @Groups({"get", "post", "put"})
     * @Assert\Length(max=255, groups={"post", "put"})
     */
    private $address;

    /**
     * @var string|null
     *
     * @ORM\Column(name="city", type="string", length=100, nullable=true)
     * @Groups({"get", "post", "put"})
     * @Assert\Length(max=100, groups={"post", "put"})
     */
    private $city;

    /**
     * @var string|null
     *
     * @ORM\Column(name="state", type="string", length=50, nullable=true)
     * @Groups({"get", "post", "put"})
     * @Assert\Length(max=50, groups={"post", "put"})
     */
    private $state;

    /**
     * @var string|null
     *
     * @ORM\Column(name="zip", type="string", length=15, nullable=true)
     * @Groups({"get", "post", "put"})
     * @Assert\Length(max=15, groups={"post", "put"})
     */
    private $zip;

    /**
     * @var string|null
     *
     * @ORM\Column(name="country", type="string", length=50, nullable=true)
     * @Groups({"get", "post", "put"})
     * @Assert\Length(max=50, groups={"post", "put"})
     */
    private $country;

    /**
     * @var string|null
     *
     * @ORM\Column(name="phone", type="string", length=45, nullable=true)
     * @Groups({"get", "post", "put"})
     * @Assert\Length(max=45, groups={"post", "put"})
     */
    private $phone;

    /**
     * @var string
     *
     * @ORM\Column(name="email", type="string", length=100, nullable=false)
     * @Groups({"post", "put"})
     * @Assert\NotBlank(groups={"post", "put"})
     * @Assert\Email(groups={"post", "put"})
     * @Assert\Length(max=100, groups={"post", "put"})
     */
    private $email;

    /**
     * @var string|null
     *
     * @ORM\Column(name="url", type="string", length=400, nullable=true)
     * @Groups({"get", "post", "put"})
     * @Assert\Length(max=400, groups={"post", "put"})
     */
    private $url;

    /**
     * @var string|null
     *
     * @ORM\Column(name="Biography", type="string", length=1500, nullable=true)
     * @Groups({"get", "post", "put"})
     * @Assert\Length(max=1500, groups={"post", "put"})
     */
    private $biography;

    /**
     * @var int
     *
     * @ORM\Column(name="ispublic", type="integer", nullable=false, options={"unsigned"=true, "default"="1"})
     * @Groups({"get", "post", "put"})
     * @Assert\NotBlank(groups={"post"})
     */
    private $isPublic = 1;

    /**
     * @var \DateTime|null
     *
     * @ORM\Column(name="lastlogindate", type="datetime", nullable=true)
     * @Groups({"get"})
     */
    private $lastLoginDate;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="InitialTimeStamp", type="datetime")
     * @Groups({"get"})
     */
    private $initialTimestamp;

    /**
     * @var \DateTime|null
     *
     * @ORM\Column(name="modifiedTimeStamp", type="datetime", nullable=true)
     * @Groups({"get"})
     */
    private $modifiedTimestamp;

    /**
     * @var int
     *
     * @ORM\Column(name="verified", type="integer", nullable=false, options={"default"="0"})
     * @Groups({"get"})
     */
    private $verified;

    /**
     * @var string|null
     *
     * @ORM\Column(name="verification_token", type="string", length=255, nullable=true)
     */
    private $verificationToken;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="Collections", mappedBy="userId")
     */
    private $collectionId;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\UserRoles", mappedBy="userId")
     * @ApiSubresource()
     * @Groups({"get"})
     */
    private $permissions;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->collectionId = new ArrayCollection();
        $this->permissions = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getFirstName(): ?string
    {
        return $this->firstName;
    }

    public function setFirstName(?string $firstName): self
    {
        $this->firstName = $firstName;

        return $this;
    }

    public function getLastName(): ?string
    {
        return $this->lastName;
    }

    public function setLastName(string $lastName): self
    {
        $this->lastName = $lastName;

        return $this;
    }

    public function getUsername(): ?string
    {
        return $this->username;
    }

    public function setUsername(string $username): self
    {
        $this->username = $username;

        return $this;
    }

    public function getPassword(): ?string
    {
        return $this->password;
    }

    public function setPassword(string $password): self
    {
        $this->password = $password;

        return $this;
    }

    public function getTitle(): ?string
    {
        return $this->title;
    }

    public function setTitle(?string $title): self
    {
        $this->title = $title;

        return $this;
    }

    public function getInstitution(): ?string
    {
        return $this->institution;
    }

    public function setInstitution(?string $institution): self
    {
        $this->institution = $institution;

        return $this;
    }

    public function getDepartment(): ?string
    {
        return $this->department;
    }

    public function setDepartment(?string $department): self
    {
        $this->department = $department;

        return $this;
    }

    public function getAddress(): ?string
    {
        return $this->address;
    }

    public function setAddress(?string $address): self
    {
        $this->address = $address;

        return $this;
    }

    public function getCity(): ?string
    {
        return $this->city;
    }

    public function setCity(?string $city): self
    {
        $this->city = $city;

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

    public function getZip(): ?string
    {
        return $this->zip;
    }

    public function setZip(?string $zip): self
    {
        $this->zip = $zip;

        return $this;
    }

    public function getCountry(): ?string
    {
        return $this->country;
    }

    public function setCountry(?string $country): self
    {
        $this->country = $country;

        return $this;
    }

    public function getPhone(): ?string
    {
        return $this->phone;
    }

    public function setPhone(?string $phone): self
    {
        $this->phone = $phone;

        return $this;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(string $email): self
    {
        $this->email = $email;

        return $this;
    }

    public function getUrl(): ?string
    {
        return $this->url;
    }

    public function setUrl(?string $url): self
    {
        $this->url = $url;

        return $this;
    }

    public function getBiography(): ?string
    {
        return $this->biography;
    }

    public function setBiography(?string $biography): self
    {
        $this->biography = $biography;

        return $this;
    }

    public function getIsPublic(): ?int
    {
        return $this->isPublic;
    }

    public function setIsPublic(int $isPublic): self
    {
        $this->isPublic = $isPublic;

        return $this;
    }

    public function getLastLoginDate(): ?\DateTimeInterface
    {
        return $this->lastLoginDate;
    }

    public function setLastLoginDate(?\DateTimeInterface $lastLoginDate): self
    {
        $this->lastLoginDate = $lastLoginDate;

        return $this;
    }

    public function setInitialTimestamp(\DateTimeInterface $initialTimestamp): InitialTimestampInterface
    {
        $this->initialTimestamp = $initialTimestamp;

        return $this;
    }

    public function getInitialTimestamp(): ?\DateTimeInterface
    {
        return $this->initialTimestamp;
    }

    public function getMiddleInitial(): ?string
    {
        return $this->middleInitial;
    }

    public function setMiddleInitial(?string $middleInitial): self
    {
        $this->middleInitial = $middleInitial;

        return $this;
    }

    public function getModifiedTimestamp(): ?\DateTimeInterface
    {
        return $this->modifiedTimestamp;
    }

    public function setModifiedTimestamp(\DateTimeInterface $modifiedTimestamp): ModifiedTimestampInterface
    {
        $this->modifiedTimestamp = $modifiedTimestamp;

        return $this;
    }

    public function getVerified(): ?int
    {
        return $this->verified;
    }

    public function setVerified(int $verified): self
    {
        $this->verified = $verified;

        return $this;
    }

    public function getVerificationToken(): ?string
    {
        return $this->verificationToken;
    }

    public function setVerificationToken(?string $verificationToken): self
    {
        $this->verificationToken = $verificationToken;

        return $this;
    }

    /**
     * @return Collection|Collections[]
     */
    public function getCollectionId(): Collection
    {
        return $this->collectionId;
    }

    public function addCollectionId(Collections $collectionId): self
    {
        if (!$this->collectionId->contains($collectionId)) {
            $this->collectionId[] = $collectionId;
            $collectionId->addUserId($this);
        }

        return $this;
    }

    public function removeCollectionId(Collections $collectionId): self
    {
        if ($this->collectionId->contains($collectionId)) {
            $this->collectionId->removeElement($collectionId);
            $collectionId->removeUserId($this);
        }

        return $this;
    }

    public function getPermissions(): Collection
    {
        return $this->permissions;

    }

    public function getRoles(): array
    {
        return ['ROLE_USER'];
    }

    public function getSalt()
    {
        return null;
    }

    public function eraseCredentials()
    {

    }

    public function getRetypedPassword()
    {
        return $this->retypedPassword;
    }

    public function setRetypedPassword($retypedPassword): void
    {
        $this->retypedPassword = $retypedPassword;
    }

    public function getNewPassword(): ?string
    {
        return $this->newPassword;
    }

    public function setNewPassword($newPassword): void
    {
        $this->newPassword = $newPassword;
    }

    public function getNewRetypedPassword(): ?string
    {
        return $this->newRetypedPassword;
    }

    public function setNewRetypedPassword($newRetypedPassword): void
    {
        $this->newRetypedPassword = $newRetypedPassword;
    }

    public function getOldPassword(): ?string
    {
        return $this->oldPassword;
    }

    public function setOldPassword($oldPassword): void
    {
        $this->oldPassword = $oldPassword;
    }

}
