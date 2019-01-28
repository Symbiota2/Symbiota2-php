<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * Referenceobject
 *
 * @ORM\Table(name="referenceobject", indexes={@ORM\Index(name="FK_refobj_typeid_idx", columns={"ReferenceTypeId"}), @ORM\Index(name="FK_refobj_parentrefid_idx", columns={"parentRefId"}), @ORM\Index(name="INDEX_refobj_title", columns={"title"})})
 * @ORM\Entity(repositoryClass="App\Repository\ReferenceobjectRepository")
 */
class Referenceobject
{
    /**
     * @var int
     *
     * @ORM\Column(name="refid", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $refid;

    /**
     * @var \Referenceobject
     *
     * @ORM\ManyToOne(targetEntity="Referenceobject")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="parentRefId", referencedColumnName="refid")
     * })
     */
    private $parentrefid;

    /**
     * @var \Referencetype
     *
     * @ORM\ManyToOne(targetEntity="Referencetype")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="ReferenceTypeId", referencedColumnName="ReferenceTypeId")
     * })
     */
    private $referencetypeid;

    /**
     * @var string
     *
     * @ORM\Column(name="title", type="string", length=150, nullable=false)
     */
    private $title;

    /**
     * @var string|null
     *
     * @ORM\Column(name="secondarytitle", type="string", length=250, nullable=true, options={"default"=NULL})
     */
    private $secondarytitle = 'NULL';

    /**
     * @var string|null
     *
     * @ORM\Column(name="shorttitle", type="string", length=250, nullable=true, options={"default"=NULL})
     */
    private $shorttitle = 'NULL';

    /**
     * @var string|null
     *
     * @ORM\Column(name="tertiarytitle", type="string", length=250, nullable=true, options={"default"=NULL})
     */
    private $tertiarytitle = 'NULL';

    /**
     * @var string|null
     *
     * @ORM\Column(name="alternativetitle", type="string", length=250, nullable=true, options={"default"=NULL})
     */
    private $alternativetitle = 'NULL';

    /**
     * @var string|null
     *
     * @ORM\Column(name="typework", type="string", length=150, nullable=true, options={"default"=NULL})
     */
    private $typework = 'NULL';

    /**
     * @var string|null
     *
     * @ORM\Column(name="figures", type="string", length=150, nullable=true, options={"default"=NULL})
     */
    private $figures = 'NULL';

    /**
     * @var string|null
     *
     * @ORM\Column(name="pubdate", type="string", length=45, nullable=true, options={"default"=NULL})
     */
    private $pubdate = 'NULL';

    /**
     * @var string|null
     *
     * @ORM\Column(name="edition", type="string", length=45, nullable=true, options={"default"=NULL})
     */
    private $edition = 'NULL';

    /**
     * @var string|null
     *
     * @ORM\Column(name="volume", type="string", length=45, nullable=true, options={"default"=NULL})
     */
    private $volume = 'NULL';

    /**
     * @var string|null
     *
     * @ORM\Column(name="numbervolumnes", type="string", length=45, nullable=true, options={"default"=NULL})
     */
    private $numbervolumnes = 'NULL';

    /**
     * @var string|null
     *
     * @ORM\Column(name="number", type="string", length=45, nullable=true, options={"default"=NULL})
     */
    private $number = 'NULL';

    /**
     * @var string|null
     *
     * @ORM\Column(name="pages", type="string", length=45, nullable=true, options={"default"=NULL})
     */
    private $pages = 'NULL';

    /**
     * @var string|null
     *
     * @ORM\Column(name="section", type="string", length=45, nullable=true, options={"default"=NULL})
     */
    private $section = 'NULL';

    /**
     * @var string|null
     *
     * @ORM\Column(name="placeofpublication", type="string", length=45, nullable=true, options={"default"=NULL})
     */
    private $placeofpublication = 'NULL';

    /**
     * @var string|null
     *
     * @ORM\Column(name="publisher", type="string", length=150, nullable=true, options={"default"=NULL})
     */
    private $publisher = 'NULL';

    /**
     * @var string|null
     *
     * @ORM\Column(name="isbn_issn", type="string", length=45, nullable=true, options={"default"=NULL})
     */
    private $isbnIssn = 'NULL';

    /**
     * @var string|null
     *
     * @ORM\Column(name="url", type="string", length=150, nullable=true, options={"default"=NULL})
     */
    private $url = 'NULL';

    /**
     * @var string|null
     *
     * @ORM\Column(name="guid", type="string", length=45, nullable=true, options={"default"=NULL})
     */
    private $guid = 'NULL';

    /**
     * @var string|null
     *
     * @ORM\Column(name="ispublished", type="string", length=45, nullable=true, options={"default"=NULL})
     */
    private $ispublished = 'NULL';

    /**
     * @var string|null
     *
     * @ORM\Column(name="notes", type="string", length=45, nullable=true, options={"default"=NULL})
     */
    private $notes = 'NULL';

    /**
     * @var string|null
     *
     * @ORM\Column(name="cheatauthors", type="string", length=250, nullable=true, options={"default"=NULL})
     */
    private $cheatauthors = 'NULL';

    /**
     * @var string|null
     *
     * @ORM\Column(name="cheatcitation", type="string", length=250, nullable=true, options={"default"=NULL})
     */
    private $cheatcitation = 'NULL';

    /**
     * @var int|null
     *
     * @ORM\Column(name="modifieduid", type="integer", nullable=true, options={"default"=NULL,"unsigned"=true})
     */
    private $modifieduid = 'NULL';

    /**
     * @var \DateTime|null
     *
     * @ORM\Column(name="modifiedtimestamp", type="datetime", nullable=true, options={"default"=NULL})
     */
    private $modifiedtimestamp = 'NULL';

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="initialtimestamp", type="datetime", nullable=false, options={"default"="CURRENT_TIMESTAMP"})
     */
    private $initialtimestamp = 'CURRENT_TIMESTAMP';

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="Referenceauthors", inversedBy="refid")
     * @ORM\JoinTable(name="referenceauthorlink",
     *   joinColumns={
     *     @ORM\JoinColumn(name="refid", referencedColumnName="refid")
     *   },
     *   inverseJoinColumns={
     *     @ORM\JoinColumn(name="refauthid", referencedColumnName="refauthorid")
     *   }
     * )
     */
    private $refauthid;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="Fmchecklists", inversedBy="refid")
     * @ORM\JoinTable(name="referencechecklistlink",
     *   joinColumns={
     *     @ORM\JoinColumn(name="refid", referencedColumnName="refid")
     *   },
     *   inverseJoinColumns={
     *     @ORM\JoinColumn(name="clid", referencedColumnName="CLID")
     *   }
     * )
     */
    private $clid;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="Omcollections", inversedBy="refid")
     * @ORM\JoinTable(name="referencecollectionlink",
     *   joinColumns={
     *     @ORM\JoinColumn(name="refid", referencedColumnName="refid")
     *   },
     *   inverseJoinColumns={
     *     @ORM\JoinColumn(name="collid", referencedColumnName="CollID")
     *   }
     * )
     */
    private $collid;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="Omoccurrences", inversedBy="refid")
     * @ORM\JoinTable(name="referenceoccurlink",
     *   joinColumns={
     *     @ORM\JoinColumn(name="refid", referencedColumnName="refid")
     *   },
     *   inverseJoinColumns={
     *     @ORM\JoinColumn(name="occid", referencedColumnName="occid")
     *   }
     * )
     */
    private $occid;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="Taxa", inversedBy="refid")
     * @ORM\JoinTable(name="referencetaxalink",
     *   joinColumns={
     *     @ORM\JoinColumn(name="refid", referencedColumnName="refid")
     *   },
     *   inverseJoinColumns={
     *     @ORM\JoinColumn(name="tid", referencedColumnName="TID")
     *   }
     * )
     */
    private $tid;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->refauthid = new \Doctrine\Common\Collections\ArrayCollection();
        $this->clid = new \Doctrine\Common\Collections\ArrayCollection();
        $this->collid = new \Doctrine\Common\Collections\ArrayCollection();
        $this->occid = new \Doctrine\Common\Collections\ArrayCollection();
        $this->tid = new \Doctrine\Common\Collections\ArrayCollection();
    }

    public function getRefid(): ?int
    {
        return $this->refid;
    }

    public function getTitle(): ?string
    {
        return $this->title;
    }

    public function setTitle(string $title): self
    {
        $this->title = $title;

        return $this;
    }

    public function getSecondarytitle(): ?string
    {
        return $this->secondarytitle;
    }

    public function setSecondarytitle(?string $secondarytitle): self
    {
        $this->secondarytitle = $secondarytitle;

        return $this;
    }

    public function getShorttitle(): ?string
    {
        return $this->shorttitle;
    }

    public function setShorttitle(?string $shorttitle): self
    {
        $this->shorttitle = $shorttitle;

        return $this;
    }

    public function getTertiarytitle(): ?string
    {
        return $this->tertiarytitle;
    }

    public function setTertiarytitle(?string $tertiarytitle): self
    {
        $this->tertiarytitle = $tertiarytitle;

        return $this;
    }

    public function getAlternativetitle(): ?string
    {
        return $this->alternativetitle;
    }

    public function setAlternativetitle(?string $alternativetitle): self
    {
        $this->alternativetitle = $alternativetitle;

        return $this;
    }

    public function getTypework(): ?string
    {
        return $this->typework;
    }

    public function setTypework(?string $typework): self
    {
        $this->typework = $typework;

        return $this;
    }

    public function getFigures(): ?string
    {
        return $this->figures;
    }

    public function setFigures(?string $figures): self
    {
        $this->figures = $figures;

        return $this;
    }

    public function getPubdate(): ?string
    {
        return $this->pubdate;
    }

    public function setPubdate(?string $pubdate): self
    {
        $this->pubdate = $pubdate;

        return $this;
    }

    public function getEdition(): ?string
    {
        return $this->edition;
    }

    public function setEdition(?string $edition): self
    {
        $this->edition = $edition;

        return $this;
    }

    public function getVolume(): ?string
    {
        return $this->volume;
    }

    public function setVolume(?string $volume): self
    {
        $this->volume = $volume;

        return $this;
    }

    public function getNumbervolumnes(): ?string
    {
        return $this->numbervolumnes;
    }

    public function setNumbervolumnes(?string $numbervolumnes): self
    {
        $this->numbervolumnes = $numbervolumnes;

        return $this;
    }

    public function getNumber(): ?string
    {
        return $this->number;
    }

    public function setNumber(?string $number): self
    {
        $this->number = $number;

        return $this;
    }

    public function getPages(): ?string
    {
        return $this->pages;
    }

    public function setPages(?string $pages): self
    {
        $this->pages = $pages;

        return $this;
    }

    public function getSection(): ?string
    {
        return $this->section;
    }

    public function setSection(?string $section): self
    {
        $this->section = $section;

        return $this;
    }

    public function getPlaceofpublication(): ?string
    {
        return $this->placeofpublication;
    }

    public function setPlaceofpublication(?string $placeofpublication): self
    {
        $this->placeofpublication = $placeofpublication;

        return $this;
    }

    public function getPublisher(): ?string
    {
        return $this->publisher;
    }

    public function setPublisher(?string $publisher): self
    {
        $this->publisher = $publisher;

        return $this;
    }

    public function getIsbnIssn(): ?string
    {
        return $this->isbnIssn;
    }

    public function setIsbnIssn(?string $isbnIssn): self
    {
        $this->isbnIssn = $isbnIssn;

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

    public function getGuid(): ?string
    {
        return $this->guid;
    }

    public function setGuid(?string $guid): self
    {
        $this->guid = $guid;

        return $this;
    }

    public function getIspublished(): ?string
    {
        return $this->ispublished;
    }

    public function setIspublished(?string $ispublished): self
    {
        $this->ispublished = $ispublished;

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

    public function getCheatauthors(): ?string
    {
        return $this->cheatauthors;
    }

    public function setCheatauthors(?string $cheatauthors): self
    {
        $this->cheatauthors = $cheatauthors;

        return $this;
    }

    public function getCheatcitation(): ?string
    {
        return $this->cheatcitation;
    }

    public function setCheatcitation(?string $cheatcitation): self
    {
        $this->cheatcitation = $cheatcitation;

        return $this;
    }

    public function getModifieduid(): ?int
    {
        return $this->modifieduid;
    }

    public function setModifieduid(?int $modifieduid): self
    {
        $this->modifieduid = $modifieduid;

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

    public function getInitialtimestamp(): ?\DateTimeInterface
    {
        return $this->initialtimestamp;
    }

    public function setInitialtimestamp(\DateTimeInterface $initialtimestamp): self
    {
        $this->initialtimestamp = $initialtimestamp;

        return $this;
    }

    public function getReferencetypeid(): ?Referencetype
    {
        return $this->referencetypeid;
    }

    public function setReferencetypeid(?Referencetype $referencetypeid): self
    {
        $this->referencetypeid = $referencetypeid;

        return $this;
    }

    public function getParentrefid(): ?self
    {
        return $this->parentrefid;
    }

    public function setParentrefid(?self $parentrefid): self
    {
        $this->parentrefid = $parentrefid;

        return $this;
    }

    /**
     * @return Collection|Referenceauthors[]
     */
    public function getRefauthid(): Collection
    {
        return $this->refauthid;
    }

    public function addRefauthid(Referenceauthors $refauthid): self
    {
        if (!$this->refauthid->contains($refauthid)) {
            $this->refauthid[] = $refauthid;
        }

        return $this;
    }

    public function removeRefauthid(Referenceauthors $refauthid): self
    {
        if ($this->refauthid->contains($refauthid)) {
            $this->refauthid->removeElement($refauthid);
        }

        return $this;
    }

    /**
     * @return Collection|Fmchecklists[]
     */
    public function getClid(): Collection
    {
        return $this->clid;
    }

    public function addClid(Fmchecklists $clid): self
    {
        if (!$this->clid->contains($clid)) {
            $this->clid[] = $clid;
        }

        return $this;
    }

    public function removeClid(Fmchecklists $clid): self
    {
        if ($this->clid->contains($clid)) {
            $this->clid->removeElement($clid);
        }

        return $this;
    }

    /**
     * @return Collection|Omcollections[]
     */
    public function getCollid(): Collection
    {
        return $this->collid;
    }

    public function addCollid(Omcollections $collid): self
    {
        if (!$this->collid->contains($collid)) {
            $this->collid[] = $collid;
        }

        return $this;
    }

    public function removeCollid(Omcollections $collid): self
    {
        if ($this->collid->contains($collid)) {
            $this->collid->removeElement($collid);
        }

        return $this;
    }

    /**
     * @return Collection|Omoccurrences[]
     */
    public function getOccid(): Collection
    {
        return $this->occid;
    }

    public function addOccid(Omoccurrences $occid): self
    {
        if (!$this->occid->contains($occid)) {
            $this->occid[] = $occid;
        }

        return $this;
    }

    public function removeOccid(Omoccurrences $occid): self
    {
        if ($this->occid->contains($occid)) {
            $this->occid->removeElement($occid);
        }

        return $this;
    }

    /**
     * @return Collection|Taxa[]
     */
    public function getTid(): Collection
    {
        return $this->tid;
    }

    public function addTid(Taxa $tid): self
    {
        if (!$this->tid->contains($tid)) {
            $this->tid[] = $tid;
        }

        return $this;
    }

    public function removeTid(Taxa $tid): self
    {
        if ($this->tid->contains($tid)) {
            $this->tid->removeElement($tid);
        }

        return $this;
    }

}
