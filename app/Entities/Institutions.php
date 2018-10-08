<?php

namespace App\Entities;

use Doctrine\ORM\Mapping as ORM;

/**
 * Institutions
 *
 * @ORM\Table(name="institutions", indexes={@ORM\Index(name="FK_inst_uid_idx", columns={"modifieduid"})})
 * @ORM\Entity
 */
class Institutions
{
    /**
     * @var int
     *
     * @ORM\Column(name="iid", type="integer", precision=0, scale=0, nullable=false, options={"unsigned"=true}, unique=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $iid;

    /**
     * @var string
     *
     * @ORM\Column(name="InstitutionCode", type="string", length=45, precision=0, scale=0, nullable=false, unique=false)
     */
    private $institutioncode;

    /**
     * @var string
     *
     * @ORM\Column(name="InstitutionName", type="string", length=150, precision=0, scale=0, nullable=false, unique=false)
     */
    private $institutionname;

    /**
     * @var string|null
     *
     * @ORM\Column(name="InstitutionName2", type="string", length=150, precision=0, scale=0, nullable=true, unique=false)
     */
    private $institutionname2;

    /**
     * @var string|null
     *
     * @ORM\Column(name="Address1", type="string", length=150, precision=0, scale=0, nullable=true, unique=false)
     */
    private $address1;

    /**
     * @var string|null
     *
     * @ORM\Column(name="Address2", type="string", length=150, precision=0, scale=0, nullable=true, unique=false)
     */
    private $address2;

    /**
     * @var string|null
     *
     * @ORM\Column(name="City", type="string", length=45, precision=0, scale=0, nullable=true, unique=false)
     */
    private $city;

    /**
     * @var string|null
     *
     * @ORM\Column(name="StateProvince", type="string", length=45, precision=0, scale=0, nullable=true, unique=false)
     */
    private $stateprovince;

    /**
     * @var string|null
     *
     * @ORM\Column(name="PostalCode", type="string", length=45, precision=0, scale=0, nullable=true, unique=false)
     */
    private $postalcode;

    /**
     * @var string|null
     *
     * @ORM\Column(name="Country", type="string", length=45, precision=0, scale=0, nullable=true, unique=false)
     */
    private $country;

    /**
     * @var string|null
     *
     * @ORM\Column(name="Phone", type="string", length=45, precision=0, scale=0, nullable=true, unique=false)
     */
    private $phone;

    /**
     * @var string|null
     *
     * @ORM\Column(name="Contact", type="string", length=65, precision=0, scale=0, nullable=true, unique=false)
     */
    private $contact;

    /**
     * @var string|null
     *
     * @ORM\Column(name="Email", type="string", length=45, precision=0, scale=0, nullable=true, unique=false)
     */
    private $email;

    /**
     * @var string|null
     *
     * @ORM\Column(name="Url", type="string", length=250, precision=0, scale=0, nullable=true, unique=false)
     */
    private $url;

    /**
     * @var string|null
     *
     * @ORM\Column(name="Notes", type="string", length=250, precision=0, scale=0, nullable=true, unique=false)
     */
    private $notes;

    /**
     * @var \DateTime|null
     *
     * @ORM\Column(name="modifiedTimeStamp", type="datetime", precision=0, scale=0, nullable=true, unique=false)
     */
    private $modifiedtimestamp;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="IntialTimeStamp", type="datetime", precision=0, scale=0, nullable=false, options={"default"="CURRENT_TIMESTAMP"}, unique=false)
     */
    private $intialtimestamp = 'CURRENT_TIMESTAMP';

    /**
     * @var \App\Entities\User
     *
     * @ORM\ManyToOne(targetEntity="App\Entities\User")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="modifieduid", referencedColumnName="uid", nullable=true)
     * })
     */
    private $modifieduid;


    /**
     * Get iid.
     *
     * @return int
     */
    public function getIid()
    {
        return $this->iid;
    }

    /**
     * Set institutioncode.
     *
     * @param string $institutioncode
     *
     * @return Institutions
     */
    public function setInstitutioncode($institutioncode)
    {
        $this->institutioncode = $institutioncode;

        return $this;
    }

    /**
     * Get institutioncode.
     *
     * @return string
     */
    public function getInstitutioncode()
    {
        return $this->institutioncode;
    }

    /**
     * Set institutionname.
     *
     * @param string $institutionname
     *
     * @return Institutions
     */
    public function setInstitutionname($institutionname)
    {
        $this->institutionname = $institutionname;

        return $this;
    }

    /**
     * Get institutionname.
     *
     * @return string
     */
    public function getInstitutionname()
    {
        return $this->institutionname;
    }

    /**
     * Set institutionname2.
     *
     * @param string|null $institutionname2
     *
     * @return Institutions
     */
    public function setInstitutionname2($institutionname2 = null)
    {
        $this->institutionname2 = $institutionname2;

        return $this;
    }

    /**
     * Get institutionname2.
     *
     * @return string|null
     */
    public function getInstitutionname2()
    {
        return $this->institutionname2;
    }

    /**
     * Set address1.
     *
     * @param string|null $address1
     *
     * @return Institutions
     */
    public function setAddress1($address1 = null)
    {
        $this->address1 = $address1;

        return $this;
    }

    /**
     * Get address1.
     *
     * @return string|null
     */
    public function getAddress1()
    {
        return $this->address1;
    }

    /**
     * Set address2.
     *
     * @param string|null $address2
     *
     * @return Institutions
     */
    public function setAddress2($address2 = null)
    {
        $this->address2 = $address2;

        return $this;
    }

    /**
     * Get address2.
     *
     * @return string|null
     */
    public function getAddress2()
    {
        return $this->address2;
    }

    /**
     * Set city.
     *
     * @param string|null $city
     *
     * @return Institutions
     */
    public function setCity($city = null)
    {
        $this->city = $city;

        return $this;
    }

    /**
     * Get city.
     *
     * @return string|null
     */
    public function getCity()
    {
        return $this->city;
    }

    /**
     * Set stateprovince.
     *
     * @param string|null $stateprovince
     *
     * @return Institutions
     */
    public function setStateprovince($stateprovince = null)
    {
        $this->stateprovince = $stateprovince;

        return $this;
    }

    /**
     * Get stateprovince.
     *
     * @return string|null
     */
    public function getStateprovince()
    {
        return $this->stateprovince;
    }

    /**
     * Set postalcode.
     *
     * @param string|null $postalcode
     *
     * @return Institutions
     */
    public function setPostalcode($postalcode = null)
    {
        $this->postalcode = $postalcode;

        return $this;
    }

    /**
     * Get postalcode.
     *
     * @return string|null
     */
    public function getPostalcode()
    {
        return $this->postalcode;
    }

    /**
     * Set country.
     *
     * @param string|null $country
     *
     * @return Institutions
     */
    public function setCountry($country = null)
    {
        $this->country = $country;

        return $this;
    }

    /**
     * Get country.
     *
     * @return string|null
     */
    public function getCountry()
    {
        return $this->country;
    }

    /**
     * Set phone.
     *
     * @param string|null $phone
     *
     * @return Institutions
     */
    public function setPhone($phone = null)
    {
        $this->phone = $phone;

        return $this;
    }

    /**
     * Get phone.
     *
     * @return string|null
     */
    public function getPhone()
    {
        return $this->phone;
    }

    /**
     * Set contact.
     *
     * @param string|null $contact
     *
     * @return Institutions
     */
    public function setContact($contact = null)
    {
        $this->contact = $contact;

        return $this;
    }

    /**
     * Get contact.
     *
     * @return string|null
     */
    public function getContact()
    {
        return $this->contact;
    }

    /**
     * Set email.
     *
     * @param string|null $email
     *
     * @return Institutions
     */
    public function setEmail($email = null)
    {
        $this->email = $email;

        return $this;
    }

    /**
     * Get email.
     *
     * @return string|null
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * Set url.
     *
     * @param string|null $url
     *
     * @return Institutions
     */
    public function setUrl($url = null)
    {
        $this->url = $url;

        return $this;
    }

    /**
     * Get url.
     *
     * @return string|null
     */
    public function getUrl()
    {
        return $this->url;
    }

    /**
     * Set notes.
     *
     * @param string|null $notes
     *
     * @return Institutions
     */
    public function setNotes($notes = null)
    {
        $this->notes = $notes;

        return $this;
    }

    /**
     * Get notes.
     *
     * @return string|null
     */
    public function getNotes()
    {
        return $this->notes;
    }

    /**
     * Set modifiedtimestamp.
     *
     * @param \DateTime|null $modifiedtimestamp
     *
     * @return Institutions
     */
    public function setModifiedtimestamp($modifiedtimestamp = null)
    {
        $this->modifiedtimestamp = $modifiedtimestamp;

        return $this;
    }

    /**
     * Get modifiedtimestamp.
     *
     * @return \DateTime|null
     */
    public function getModifiedtimestamp()
    {
        return $this->modifiedtimestamp;
    }

    /**
     * Set intialtimestamp.
     *
     * @param \DateTime $intialtimestamp
     *
     * @return Institutions
     */
    public function setIntialtimestamp($intialtimestamp)
    {
        $this->intialtimestamp = $intialtimestamp;

        return $this;
    }

    /**
     * Get intialtimestamp.
     *
     * @return \DateTime
     */
    public function getIntialtimestamp()
    {
        return $this->intialtimestamp;
    }

    /**
     * Set modifieduid.
     *
     * @param \App\Entities\User|null $modifieduid
     *
     * @return Institutions
     */
    public function setModifieduid(\App\Entities\User $modifieduid = null)
    {
        $this->modifieduid = $modifieduid;

        return $this;
    }

    /**
     * Get modifieduid.
     *
     * @return \App\Entities\User|null
     */
    public function getModifieduid()
    {
        return $this->modifieduid;
    }
}
