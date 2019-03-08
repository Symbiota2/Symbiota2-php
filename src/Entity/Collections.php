<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * Collections
 *
 * @ORM\Table(name="omcollections", uniqueConstraints={@ORM\UniqueConstraint(name="Index_inst", columns={"InstitutionCode", "CollectionCode"})}, indexes={@ORM\Index(name="FK_collid_iid_idx", columns={"iid"})})
 * @ORM\Entity(repositoryClass="App\Repository\CollectionsRepository")
 */
class Collections
{
    /**
     * @var int
     *
     * @ORM\Column(name="CollID", type="integer", nullable=false, options={"unsigned"=true})
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $collid;

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
     * @ORM\Column(name="collectionId", type="string", length=100, nullable=true, options={"default"=NULL})
     */
    private $collectionid = 'NULL';

    /**
     * @var string|null
     *
     * @ORM\Column(name="datasetName", type="string", length=100, nullable=true, options={"default"=NULL})
     */
    private $datasetname = 'NULL';

    /**
     * @var \Institutions
     *
     * @ORM\ManyToOne(targetEntity="Institutions")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="iid", referencedColumnName="iid")
     * })
     */
    private $iid;

    /**
     * @var string|null
     *
     * @ORM\Column(name="fulldescription", type="string", length=2000, nullable=true, options={"default"=NULL})
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
     * @ORM\Column(name="Contact", type="string", length=250, nullable=true, options={"default"=NULL})
     */
    private $contact = 'NULL';

    /**
     * @var string|null
     *
     * @ORM\Column(name="email", type="string", length=45, nullable=true, options={"default"=NULL})
     */
    private $email = 'NULL';

    /**
     * @var string|null
     *
     * @ORM\Column(name="latitudedecimal", type="decimal", precision=8, scale=6, nullable=true, options={"default"=NULL})
     */
    private $latitudedecimal = 'NULL';

    /**
     * @var string|null
     *
     * @ORM\Column(name="longitudedecimal", type="decimal", precision=9, scale=6, nullable=true, options={"default"=NULL})
     */
    private $longitudedecimal = 'NULL';

    /**
     * @var string|null
     *
     * @ORM\Column(name="icon", type="string", length=250, nullable=true, options={"default"=NULL})
     */
    private $icon = 'NULL';

    /**
     * @var string
     *
     * @ORM\Column(name="CollType", type="string", length=45, nullable=false, options={"default"="Preserved Specimens","comment"="Preserved Specimens, General Observations, Observations"})
     */
    private $colltype = 'Preserved Specimens';

    /**
     * @var string|null
     *
     * @ORM\Column(name="ManagementType", type="string", length=45, nullable=true, options={"default"="Snapshot","comment"="Snapshot, Live Data"})
     */
    private $managementtype = 'Snapshot';

    /**
     * @var int
     *
     * @ORM\Column(name="PublicEdits", type="integer", nullable=false, options={"default"="1","unsigned"=true})
     */
    private $publicedits = '1';

    /**
     * @var string|null
     *
     * @ORM\Column(name="collectionguid", type="string", length=45, nullable=true, options={"default"=NULL})
     */
    private $collectionguid = 'NULL';

    /**
     * @var string|null
     *
     * @ORM\Column(name="securitykey", type="string", length=45, nullable=true, options={"default"=NULL})
     */
    private $securitykey = 'NULL';

    /**
     * @var string|null
     *
     * @ORM\Column(name="guidtarget", type="string", length=45, nullable=true, options={"default"=NULL})
     */
    private $guidtarget = 'NULL';

    /**
     * @var string|null
     *
     * @ORM\Column(name="rightsHolder", type="string", length=250, nullable=true, options={"default"=NULL})
     */
    private $rightsholder = 'NULL';

    /**
     * @var string|null
     *
     * @ORM\Column(name="rights", type="string", length=250, nullable=true, options={"default"=NULL})
     */
    private $rights = 'NULL';

    /**
     * @var string|null
     *
     * @ORM\Column(name="usageTerm", type="string", length=250, nullable=true, options={"default"=NULL})
     */
    private $usageterm = 'NULL';

    /**
     * @var int|null
     *
     * @ORM\Column(name="publishToGbif", type="integer", nullable=true, options={"default"=NULL})
     */
    private $publishtogbif = 'NULL';

    /**
     * @var int|null
     *
     * @ORM\Column(name="publishToIdigbio", type="integer", nullable=true, options={"default"=NULL})
     */
    private $publishtoidigbio = 'NULL';

    /**
     * @var string|null
     *
     * @ORM\Column(name="aggKeysStr", type="string", length=1000, nullable=true, options={"default"=NULL})
     */
    private $aggkeysstr = 'NULL';

    /**
     * @var string|null
     *
     * @ORM\Column(name="dwcaUrl", type="string", length=250, nullable=true, options={"default"=NULL})
     */
    private $dwcaurl = 'NULL';

    /**
     * @var string|null
     *
     * @ORM\Column(name="bibliographicCitation", type="string", length=1000, nullable=true, options={"default"=NULL})
     */
    private $bibliographiccitation = 'NULL';

    /**
     * @var string|null
     *
     * @ORM\Column(name="accessrights", type="string", length=1000, nullable=true, options={"default"=NULL})
     */
    private $accessrights = 'NULL';

    /**
     * @var int|null
     *
     * @ORM\Column(name="SortSeq", type="integer", nullable=true, options={"default"=NULL,"unsigned"=true})
     */
    private $sortseq = 'NULL';

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="InitialTimeStamp", type="datetime", nullable=false, options={"default"="CURRENT_TIMESTAMP"})
     */
    private $initialtimestamp = 'CURRENT_TIMESTAMP';

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="CollectionCategories", mappedBy="collid")
     */
    private $ccpk;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="Users", inversedBy="collid")
     * @ORM\JoinTable(name="omcollectioncontacts",
     *   joinColumns={
     *     @ORM\JoinColumn(name="collid", referencedColumnName="CollID")
     *   },
     *   inverseJoinColumns={
     *     @ORM\JoinColumn(name="uid", referencedColumnName="uid")
     *   }
     * )
     */
    private $uid;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="References", mappedBy="collid")
     */
    private $refid;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->ccpk = new \Doctrine\Common\Collections\ArrayCollection();
        $this->uid = new \Doctrine\Common\Collections\ArrayCollection();
        $this->refid = new \Doctrine\Common\Collections\ArrayCollection();
    }

    public function getCollid(): ?int
    {
        return $this->collid;
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

    public function getCollectionid(): ?string
    {
        return $this->collectionid;
    }

    public function setCollectionid(?string $collectionid): self
    {
        $this->collectionid = $collectionid;

        return $this;
    }

    public function getDatasetname(): ?string
    {
        return $this->datasetname;
    }

    public function setDatasetname(?string $datasetname): self
    {
        $this->datasetname = $datasetname;

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

    public function getLatitudedecimal()
    {
        return $this->latitudedecimal;
    }

    public function setLatitudedecimal($latitudedecimal): self
    {
        $this->latitudedecimal = $latitudedecimal;

        return $this;
    }

    public function getLongitudedecimal()
    {
        return $this->longitudedecimal;
    }

    public function setLongitudedecimal($longitudedecimal): self
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

    public function setColltype(string $colltype): self
    {
        $this->colltype = $colltype;

        return $this;
    }

    public function getManagementtype(): ?string
    {
        return $this->managementtype;
    }

    public function setManagementtype(?string $managementtype): self
    {
        $this->managementtype = $managementtype;

        return $this;
    }

    public function getPublicedits(): ?int
    {
        return $this->publicedits;
    }

    public function setPublicedits(int $publicedits): self
    {
        $this->publicedits = $publicedits;

        return $this;
    }

    public function getCollectionguid(): ?string
    {
        return $this->collectionguid;
    }

    public function setCollectionguid(?string $collectionguid): self
    {
        $this->collectionguid = $collectionguid;

        return $this;
    }

    public function getSecuritykey(): ?string
    {
        return $this->securitykey;
    }

    public function setSecuritykey(?string $securitykey): self
    {
        $this->securitykey = $securitykey;

        return $this;
    }

    public function getGuidtarget(): ?string
    {
        return $this->guidtarget;
    }

    public function setGuidtarget(?string $guidtarget): self
    {
        $this->guidtarget = $guidtarget;

        return $this;
    }

    public function getRightsholder(): ?string
    {
        return $this->rightsholder;
    }

    public function setRightsholder(?string $rightsholder): self
    {
        $this->rightsholder = $rightsholder;

        return $this;
    }

    public function getRights(): ?string
    {
        return $this->rights;
    }

    public function setRights(?string $rights): self
    {
        $this->rights = $rights;

        return $this;
    }

    public function getUsageterm(): ?string
    {
        return $this->usageterm;
    }

    public function setUsageterm(?string $usageterm): self
    {
        $this->usageterm = $usageterm;

        return $this;
    }

    public function getPublishtogbif(): ?int
    {
        return $this->publishtogbif;
    }

    public function setPublishtogbif(?int $publishtogbif): self
    {
        $this->publishtogbif = $publishtogbif;

        return $this;
    }

    public function getPublishtoidigbio(): ?int
    {
        return $this->publishtoidigbio;
    }

    public function setPublishtoidigbio(?int $publishtoidigbio): self
    {
        $this->publishtoidigbio = $publishtoidigbio;

        return $this;
    }

    public function getAggkeysstr(): ?string
    {
        return $this->aggkeysstr;
    }

    public function setAggkeysstr(?string $aggkeysstr): self
    {
        $this->aggkeysstr = $aggkeysstr;

        return $this;
    }

    public function getDwcaurl(): ?string
    {
        return $this->dwcaurl;
    }

    public function setDwcaurl(?string $dwcaurl): self
    {
        $this->dwcaurl = $dwcaurl;

        return $this;
    }

    public function getBibliographiccitation(): ?string
    {
        return $this->bibliographiccitation;
    }

    public function setBibliographiccitation(?string $bibliographiccitation): self
    {
        $this->bibliographiccitation = $bibliographiccitation;

        return $this;
    }

    public function getAccessrights(): ?string
    {
        return $this->accessrights;
    }

    public function setAccessrights(?string $accessrights): self
    {
        $this->accessrights = $accessrights;

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

    public function getIid(): ?Institutions
    {
        return $this->iid;
    }

    public function setIid(?Institutions $iid): self
    {
        $this->iid = $iid;

        return $this;
    }

    /**
     * @return Collection|CollectionCategories[]
     */
    public function getCcpk(): Collection
    {
        return $this->ccpk;
    }

    public function addCcpk(CollectionCategories $ccpk): self
    {
        if (!$this->ccpk->contains($ccpk)) {
            $this->ccpk[] = $ccpk;
            $ccpk->addCollid($this);
        }

        return $this;
    }

    public function removeCcpk(CollectionCategories $ccpk): self
    {
        if ($this->ccpk->contains($ccpk)) {
            $this->ccpk->removeElement($ccpk);
            $ccpk->removeCollid($this);
        }

        return $this;
    }

    /**
     * @return Collection|Users[]
     */
    public function getUid(): Collection
    {
        return $this->uid;
    }

    public function addUid(Users $uid): self
    {
        if (!$this->uid->contains($uid)) {
            $this->uid[] = $uid;
        }

        return $this;
    }

    public function removeUid(Users $uid): self
    {
        if ($this->uid->contains($uid)) {
            $this->uid->removeElement($uid);
        }

        return $this;
    }

    /**
     * @return Collection|References[]
     */
    public function getRefid(): Collection
    {
        return $this->refid;
    }

    public function addRefid(References $refid): self
    {
        if (!$this->refid->contains($refid)) {
            $this->refid[] = $refid;
            $refid->addCollid($this);
        }

        return $this;
    }

    public function removeRefid(References $refid): self
    {
        if ($this->refid->contains($refid)) {
            $this->refid->removeElement($refid);
            $refid->removeCollid($this);
        }

        return $this;
    }

}
