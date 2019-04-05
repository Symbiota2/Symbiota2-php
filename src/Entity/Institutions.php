<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Security\Core\User\UserInterface;
use Symfony\Component\Serializer\Annotation\Groups;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Institutions
 *
 * @ORM\Table(name="institutions", indexes={@ORM\Index(name="FK_inst_uid_idx", columns={"modifieduid"})})
 * @ORM\Entity()
 * @ApiResource(
 *      itemOperations={
 *          "get",
 *          "put"={
 *              "access_control"="is_granted('IS_AUTHENTICATED_FULLY')",
 *              "denormalization_context"={
 *                  "groups"={"put"}
 *              }
 *          }
 *      },
 *      collectionOperations={
 *          "get",
 *          "post"={
 *              "access_control"="is_granted('IS_AUTHENTICATED_FULLY')",
 *              "denormalization_context"={
 *                  "groups"={"post"}
 *              }
 *          }
 *      }
 * )
 */
class Institutions implements ModifiedUserIdInterface, InitialTimestampInterface, ModifiedTimestampInterface
{
    /**
     * @var int
     *
     * @ORM\Column(name="iid", type="integer", options={"unsigned"=true})
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     * @Groups({"get"})
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="InstitutionCode", type="string", length=45)
     * @Assert\NotBlank()
     * @Assert\Length(max=45)
     * @Groups({"get", "post", "put"})
     */
    private $institutionCode;

    /**
     * @var string
     *
     * @ORM\Column(name="InstitutionName", type="string", length=150)
     * @Assert\NotBlank()
     * @Assert\Length(max=150)
     * @Groups({"get", "post", "put"})
     */
    private $institutionName;

    /**
     * @var string|null
     *
     * @ORM\Column(name="InstitutionName2", type="string", length=150, nullable=true)
     * @Assert\Length(max=150)
     * @Groups({"get", "post", "put"})
     */
    private $institutionNameSecondary;

    /**
     * @var string|null
     *
     * @ORM\Column(name="Address1", type="string", length=150, nullable=true)
     * @Assert\Length(max=150)
     * @Groups({"get", "post", "put"})
     */
    private $addressLineOne;

    /**
     * @var string|null
     *
     * @ORM\Column(name="Address2", type="string", length=150, nullable=true)
     * @Assert\Length(max=150)
     * @Groups({"get", "post", "put"})
     */
    private $addressLineTwo;

    /**
     * @var string|null
     *
     * @ORM\Column(name="City", type="string", length=45, nullable=true)
     * @Assert\Length(max=45)
     * @Groups({"get", "post", "put"})
     */
    private $city;

    /**
     * @var string|null
     *
     * @ORM\Column(name="StateProvince", type="string", length=45, nullable=true)
     * @Assert\Length(max=45)
     * @Groups({"get", "post", "put"})
     */
    private $stateProvince;

    /**
     * @var string|null
     *
     * @ORM\Column(name="PostalCode", type="string", length=45, nullable=true)
     * @Assert\Length(max=45)
     * @Groups({"get", "post", "put"})
     */
    private $postalCode;

    /**
     * @var string|null
     *
     * @ORM\Column(name="Country", type="string", length=45, nullable=true)
     * @Assert\Length(max=45)
     * @Groups({"get", "post", "put"})
     */
    private $country;

    /**
     * @var string|null
     *
     * @ORM\Column(name="Phone", type="string", length=45, nullable=true)
     * @Assert\Length(max=45)
     * @Groups({"get", "post", "put"})
     */
    private $phone;

    /**
     * @var string|null
     *
     * @ORM\Column(name="Contact", type="string", length=65, nullable=true)
     * @Assert\Length(max=65)
     * @Groups({"get", "post", "put"})
     */
    private $contact;

    /**
     * @var string|null
     *
     * @ORM\Column(name="Email", type="string", length=45, nullable=true)
     * @Assert\Email()
     * @Assert\Length(max=45)
     * @Groups({"get", "post", "put"})
     */
    private $email;

    /**
     * @var string|null
     *
     * @ORM\Column(name="Url", type="string", length=250, nullable=true)
     * @Assert\Length(max=250)
     * @Groups({"get", "post", "put"})
     */
    private $url;

    /**
     * @var string|null
     *
     * @ORM\Column(name="Notes", type="string", length=250, nullable=true)
     * @Assert\Length(max=250)
     * @Groups({"get", "post", "put"})
     */
    private $notes;

    /**
     * @var \App\Entity\Users
     *
     * @ORM\ManyToOne(targetEntity="Users")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="modifieduid", referencedColumnName="uid")
     * })
     * @Groups({"get"})
     */
    private $modifiedUserId;

    /**
     * @var \DateTime|null
     *
     * @ORM\Column(name="modifiedTimeStamp", type="datetime", nullable=true)
     * @Assert\DateTime
     * @Groups({"get"})
     */
    private $modifiedTimestamp;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="InitialTimeStamp", type="datetime")
     * @Assert\DateTime
     * @Groups({"get"})
     */
    private $initialTimestamp;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getInstitutionCode(): ?string
    {
        return $this->institutionCode;
    }

    public function setInstitutionCode(string $institutionCode): self
    {
        $this->institutionCode = $institutionCode;

        return $this;
    }

    public function getInstitutionName(): ?string
    {
        return $this->institutionName;
    }

    public function setInstitutionName(string $institutionName): self
    {
        $this->institutionName = $institutionName;

        return $this;
    }

    public function getInstitutionNameSecondary(): ?string
    {
        return $this->institutionNameSecondary;
    }

    public function setInstitutionNameSecondary(?string $institutionNameSecondary): self
    {
        $this->institutionNameSecondary = $institutionNameSecondary;

        return $this;
    }

    public function getAddressLineOne(): ?string
    {
        return $this->addressLineOne;
    }

    public function setAddressLineOne(?string $addressLineOne): self
    {
        $this->addressLineOne = $addressLineOne;

        return $this;
    }

    public function getAddressLineTwo(): ?string
    {
        return $this->addressLineTwo;
    }

    public function setAddressLineTwo(?string $addressLineTwo): self
    {
        $this->addressLineTwo = $addressLineTwo;

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

    public function getStateProvince(): ?string
    {
        return $this->stateProvince;
    }

    public function setStateProvince(?string $stateProvince): self
    {
        $this->stateProvince = $stateProvince;

        return $this;
    }

    public function getPostalCode(): ?string
    {
        return $this->postalCode;
    }

    public function setPostalCode(?string $postalCode): self
    {
        $this->postalCode = $postalCode;

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

    public function getContact(): ?string
    {
        return $this->contact;
    }

    public function setContact(?string $contact): self
    {
        $this->contact = $contact;

        return $this;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(?string $email): self
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

    public function getNotes(): ?string
    {
        return $this->notes;
    }

    public function setNotes(?string $notes): self
    {
        $this->notes = $notes;

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
     * @return \App\Entity\Users|null
     */
    public function getModifiedUserId(): ?Users
    {
        return $this->modifiedUserId;
    }

    /**
     * @param UserInterface $modifiedUserId
     * @return ModifiedUserIdInterface
     */
    public function setModifiedUserId(UserInterface $modifiedUserId): ModifiedUserIdInterface
    {
        $this->modifiedUserId = $modifiedUserId;

        return $this;
    }


}
