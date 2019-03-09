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
 * @ORM\Entity(repositoryClass="App\Repository\InstitutionsRepository")
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
class Institutions implements ModifiedUserIdInterface, InitialTimeStampInterface, ModifiedTimeStampInterface
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
    private $institutioncode;

    /**
     * @var string
     *
     * @ORM\Column(name="InstitutionName", type="string", length=150)
     * @Assert\NotBlank()
     * @Assert\Length(max=150)
     * @Groups({"get", "post", "put"})
     */
    private $institutionname;

    /**
     * @var string|null
     *
     * @ORM\Column(name="InstitutionName2", type="string", length=150, nullable=true)
     * @Assert\Length(max=150)
     * @Groups({"get", "post", "put"})
     */
    private $institutionname2;

    /**
     * @var string|null
     *
     * @ORM\Column(name="Address1", type="string", length=150, nullable=true)
     * @Assert\Length(max=150)
     * @Groups({"get", "post", "put"})
     */
    private $address1;

    /**
     * @var string|null
     *
     * @ORM\Column(name="Address2", type="string", length=150, nullable=true)
     * @Assert\Length(max=150)
     * @Groups({"get", "post", "put"})
     */
    private $address2;

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
    private $stateprovince;

    /**
     * @var string|null
     *
     * @ORM\Column(name="PostalCode", type="string", length=45, nullable=true)
     * @Assert\Length(max=45)
     * @Groups({"get", "post", "put"})
     */
    private $postalcode;

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
    private $modifieduserid;

    /**
     * @var \DateTime|null
     *
     * @ORM\Column(name="modifiedTimeStamp", type="datetime", nullable=true)
     * @Groups({"get"})
     */
    private $modifiedtimestamp;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="InitialTimeStamp", type="datetime")
     * @Assert\DateTime()
     * @Groups({"get"})
     */
    private $initialtimestamp;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getInstitutioncode(): ?string
    {
        return $this->institutioncode;
    }

    public function setInstitutioncode(string $institutioncode): self
    {
        $this->institutioncode = $institutioncode;

        return $this;
    }

    public function getInstitutionname(): ?string
    {
        return $this->institutionname;
    }

    public function setInstitutionname(string $institutionname): self
    {
        $this->institutionname = $institutionname;

        return $this;
    }

    public function getInstitutionname2(): ?string
    {
        return $this->institutionname2;
    }

    public function setInstitutionname2(?string $institutionname2): self
    {
        $this->institutionname2 = $institutionname2;

        return $this;
    }

    public function getAddress1(): ?string
    {
        return $this->address1;
    }

    public function setAddress1(?string $address1): self
    {
        $this->address1 = $address1;

        return $this;
    }

    public function getAddress2(): ?string
    {
        return $this->address2;
    }

    public function setAddress2(?string $address2): self
    {
        $this->address2 = $address2;

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

    public function getStateprovince(): ?string
    {
        return $this->stateprovince;
    }

    public function setStateprovince(?string $stateprovince): self
    {
        $this->stateprovince = $stateprovince;

        return $this;
    }

    public function getPostalcode(): ?string
    {
        return $this->postalcode;
    }

    public function setPostalcode(?string $postalcode): self
    {
        $this->postalcode = $postalcode;

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

    public function getModifiedtimestamp(): ?\DateTimeInterface
    {
        return $this->modifiedtimestamp;
    }

    public function setModifiedtimestamp(\DateTimeInterface $modifiedtimestamp): ModifiedTimeStampInterface
    {
        $this->modifiedtimestamp = $modifiedtimestamp;

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
     * @return \App\Entity\Users|null
     */
    public function getModifieduserid(): ?Users
    {
        return $this->modifieduserid;
    }

    /**
     * @param UserInterface $modifieduserid
     * @return ModifiedUserIdInterface
     */
    public function setModifieduserid(UserInterface $modifieduserid): ModifiedUserIdInterface
    {
        $this->modifieduserid = $modifieduserid;

        return $this;
    }


}
