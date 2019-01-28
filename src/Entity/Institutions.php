<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Institutions
 *
 * @ORM\Table(name="institutions", indexes={@ORM\Index(name="FK_inst_uid_idx", columns={"modifieduid"})})
 * @ORM\Entity(repositoryClass="App\Repository\InstitutionsRepository")
 */
class Institutions
{
    /**
     * @var int
     *
     * @ORM\Column(name="iid", type="integer", nullable=false, options={"unsigned"=true})
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $iid;

    /**
     * @var string
     *
     * @ORM\Column(name="InstitutionCode", type="string", length=45, nullable=false)
     */
    private $institutioncode;

    /**
     * @var string
     *
     * @ORM\Column(name="InstitutionName", type="string", length=150, nullable=false)
     */
    private $institutionname;

    /**
     * @var string|null
     *
     * @ORM\Column(name="InstitutionName2", type="string", length=150, nullable=true, options={"default"=NULL})
     */
    private $institutionname2 = 'NULL';

    /**
     * @var string|null
     *
     * @ORM\Column(name="Address1", type="string", length=150, nullable=true, options={"default"=NULL})
     */
    private $address1 = 'NULL';

    /**
     * @var string|null
     *
     * @ORM\Column(name="Address2", type="string", length=150, nullable=true, options={"default"=NULL})
     */
    private $address2 = 'NULL';

    /**
     * @var string|null
     *
     * @ORM\Column(name="City", type="string", length=45, nullable=true, options={"default"=NULL})
     */
    private $city = 'NULL';

    /**
     * @var string|null
     *
     * @ORM\Column(name="StateProvince", type="string", length=45, nullable=true, options={"default"=NULL})
     */
    private $stateprovince = 'NULL';

    /**
     * @var string|null
     *
     * @ORM\Column(name="PostalCode", type="string", length=45, nullable=true, options={"default"=NULL})
     */
    private $postalcode = 'NULL';

    /**
     * @var string|null
     *
     * @ORM\Column(name="Country", type="string", length=45, nullable=true, options={"default"=NULL})
     */
    private $country = 'NULL';

    /**
     * @var string|null
     *
     * @ORM\Column(name="Phone", type="string", length=45, nullable=true, options={"default"=NULL})
     */
    private $phone = 'NULL';

    /**
     * @var string|null
     *
     * @ORM\Column(name="Contact", type="string", length=65, nullable=true, options={"default"=NULL})
     */
    private $contact = 'NULL';

    /**
     * @var string|null
     *
     * @ORM\Column(name="Email", type="string", length=45, nullable=true, options={"default"=NULL})
     */
    private $email = 'NULL';

    /**
     * @var string|null
     *
     * @ORM\Column(name="Url", type="string", length=250, nullable=true, options={"default"=NULL})
     */
    private $url = 'NULL';

    /**
     * @var string|null
     *
     * @ORM\Column(name="Notes", type="string", length=250, nullable=true, options={"default"=NULL})
     */
    private $notes = 'NULL';

    /**
     * @var \Users
     *
     * @ORM\ManyToOne(targetEntity="Users")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="modifieduid", referencedColumnName="uid")
     * })
     */
    private $modifieduid;

    /**
     * @var \DateTime|null
     *
     * @ORM\Column(name="modifiedTimeStamp", type="datetime", nullable=true, options={"default"=NULL})
     */
    private $modifiedtimestamp = 'NULL';

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="IntialTimeStamp", type="datetime", nullable=false, options={"default"="CURRENT_TIMESTAMP"})
     */
    private $intialtimestamp = 'CURRENT_TIMESTAMP';

    public function getIid(): ?int
    {
        return $this->iid;
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

    public function setModifiedtimestamp(?\DateTimeInterface $modifiedtimestamp): self
    {
        $this->modifiedtimestamp = $modifiedtimestamp;

        return $this;
    }

    public function getIntialtimestamp(): ?\DateTimeInterface
    {
        return $this->intialtimestamp;
    }

    public function setIntialtimestamp(\DateTimeInterface $intialtimestamp): self
    {
        $this->intialtimestamp = $intialtimestamp;

        return $this;
    }

    public function getModifieduid(): ?Users
    {
        return $this->modifieduid;
    }

    public function setModifieduid(?Users $modifieduid): self
    {
        $this->modifieduid = $modifieduid;

        return $this;
    }


}
