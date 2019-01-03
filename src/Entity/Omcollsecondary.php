<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Omcollsecondary
 *
 * @ORM\Table(name="omcollsecondary", indexes={@ORM\Index(name="FK_omcollsecondary_coll", columns={"collid"})})
 * @ORM\Entity(repositoryClass="App\Repository\OmcollsecondaryRepository")
 */
class Omcollsecondary
{
    /**
     * @var int
     *
     * @ORM\Column(name="ocsid", type="integer", nullable=false, options={"unsigned"=true})
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $ocsid;

    /**
     * @var string
     *
     * @ORM\Column(name="InstitutionCode", type="string", length=45, nullable=false)
     */
    private $institutioncode;

    /**
     * @var string|null
     *
     * @ORM\Column(name="CollectionCode", type="string", length=45, nullable=true, options={"default"=NULL})
     */
    private $collectioncode = 'NULL';

    /**
     * @var string
     *
     * @ORM\Column(name="CollectionName", type="string", length=150, nullable=false)
     */
    private $collectionname;

    /**
     * @var string|null
     *
     * @ORM\Column(name="BriefDescription", type="string", length=300, nullable=true, options={"default"=NULL})
     */
    private $briefdescription = 'NULL';

    /**
     * @var string|null
     *
     * @ORM\Column(name="FullDescription", type="string", length=1000, nullable=true, options={"default"=NULL})
     */
    private $fulldescription = 'NULL';

    /**
     * @var string|null
     *
     * @ORM\Column(name="Homepage", type="string", length=250, nullable=true, options={"default"=NULL})
     */
    private $homepage = 'NULL';

    /**
     * @var string|null
     *
     * @ORM\Column(name="IndividualUrl", type="string", length=500, nullable=true, options={"default"=NULL})
     */
    private $individualurl = 'NULL';

    /**
     * @var string|null
     *
     * @ORM\Column(name="Contact", type="string", length=45, nullable=true, options={"default"=NULL})
     */
    private $contact = 'NULL';

    /**
     * @var string|null
     *
     * @ORM\Column(name="Email", type="string", length=45, nullable=true, options={"default"=NULL})
     */
    private $email = 'NULL';

    /**
     * @var float|null
     *
     * @ORM\Column(name="LatitudeDecimal", type="float", precision=10, scale=0, nullable=true, options={"default"=NULL})
     */
    private $latitudedecimal = 'NULL';

    /**
     * @var float|null
     *
     * @ORM\Column(name="LongitudeDecimal", type="float", precision=10, scale=0, nullable=true, options={"default"=NULL})
     */
    private $longitudedecimal = 'NULL';

    /**
     * @var string|null
     *
     * @ORM\Column(name="icon", type="string", length=250, nullable=true, options={"default"=NULL})
     */
    private $icon = 'NULL';

    /**
     * @var string|null
     *
     * @ORM\Column(name="CollType", type="string", length=45, nullable=true, options={"default"=NULL})
     */
    private $colltype = 'NULL';

    /**
     * @var int|null
     *
     * @ORM\Column(name="SortSeq", type="integer", nullable=true, options={"default"=NULL,"unsigned"=true})
     */
    private $sortseq = 'NULL';

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="InitialTimestamp", type="datetime", nullable=false, options={"default"="CURRENT_TIMESTAMP"})
     */
    private $initialtimestamp = 'CURRENT_TIMESTAMP';

    /**
     * @var \Omcollections
     *
     * @ORM\ManyToOne(targetEntity="Omcollections")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="collid", referencedColumnName="CollID")
     * })
     */
    private $collid;

    public function getOcsid(): ?int
    {
        return $this->ocsid;
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

    public function getCollectioncode(): ?string
    {
        return $this->collectioncode;
    }

    public function setCollectioncode(?string $collectioncode): self
    {
        $this->collectioncode = $collectioncode;

        return $this;
    }

    public function getCollectionname(): ?string
    {
        return $this->collectionname;
    }

    public function setCollectionname(string $collectionname): self
    {
        $this->collectionname = $collectionname;

        return $this;
    }

    public function getBriefdescription(): ?string
    {
        return $this->briefdescription;
    }

    public function setBriefdescription(?string $briefdescription): self
    {
        $this->briefdescription = $briefdescription;

        return $this;
    }

    public function getFulldescription(): ?string
    {
        return $this->fulldescription;
    }

    public function setFulldescription(?string $fulldescription): self
    {
        $this->fulldescription = $fulldescription;

        return $this;
    }

    public function getHomepage(): ?string
    {
        return $this->homepage;
    }

    public function setHomepage(?string $homepage): self
    {
        $this->homepage = $homepage;

        return $this;
    }

    public function getIndividualurl(): ?string
    {
        return $this->individualurl;
    }

    public function setIndividualurl(?string $individualurl): self
    {
        $this->individualurl = $individualurl;

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

    public function getLatitudedecimal(): ?float
    {
        return $this->latitudedecimal;
    }

    public function setLatitudedecimal(?float $latitudedecimal): self
    {
        $this->latitudedecimal = $latitudedecimal;

        return $this;
    }

    public function getLongitudedecimal(): ?float
    {
        return $this->longitudedecimal;
    }

    public function setLongitudedecimal(?float $longitudedecimal): self
    {
        $this->longitudedecimal = $longitudedecimal;

        return $this;
    }

    public function getIcon(): ?string
    {
        return $this->icon;
    }

    public function setIcon(?string $icon): self
    {
        $this->icon = $icon;

        return $this;
    }

    public function getColltype(): ?string
    {
        return $this->colltype;
    }

    public function setColltype(?string $colltype): self
    {
        $this->colltype = $colltype;

        return $this;
    }

    public function getSortseq(): ?int
    {
        return $this->sortseq;
    }

    public function setSortseq(?int $sortseq): self
    {
        $this->sortseq = $sortseq;

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

    public function getCollid(): ?Omcollections
    {
        return $this->collid;
    }

    public function setCollid(?Omcollections $collid): self
    {
        $this->collid = $collid;

        return $this;
    }


}
