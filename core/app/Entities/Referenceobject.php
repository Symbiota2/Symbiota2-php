<?php

namespace App\Entities;

use Doctrine\ORM\Mapping as ORM;

/**
 * Referenceobject
 *
 * @ORM\Table(name="referenceobject", indexes={@ORM\Index(name="INDEX_refobj_title", columns={"title"}), @ORM\Index(name="FK_refobj_parentrefid_idx", columns={"parentRefId"}), @ORM\Index(name="FK_refobj_typeid_idx", columns={"ReferenceTypeId"})})
 * @ORM\Entity
 */
class Referenceobject
{
    /**
     * @var int
     *
     * @ORM\Column(name="refid", type="integer", precision=0, scale=0, nullable=false, unique=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $refid;

    /**
     * @var string
     *
     * @ORM\Column(name="title", type="string", length=150, precision=0, scale=0, nullable=false, unique=false)
     */
    private $title;

    /**
     * @var string|null
     *
     * @ORM\Column(name="secondarytitle", type="string", length=250, precision=0, scale=0, nullable=true, unique=false)
     */
    private $secondarytitle;

    /**
     * @var string|null
     *
     * @ORM\Column(name="shorttitle", type="string", length=250, precision=0, scale=0, nullable=true, unique=false)
     */
    private $shorttitle;

    /**
     * @var string|null
     *
     * @ORM\Column(name="tertiarytitle", type="string", length=250, precision=0, scale=0, nullable=true, unique=false)
     */
    private $tertiarytitle;

    /**
     * @var string|null
     *
     * @ORM\Column(name="alternativetitle", type="string", length=250, precision=0, scale=0, nullable=true, unique=false)
     */
    private $alternativetitle;

    /**
     * @var string|null
     *
     * @ORM\Column(name="typework", type="string", length=150, precision=0, scale=0, nullable=true, unique=false)
     */
    private $typework;

    /**
     * @var string|null
     *
     * @ORM\Column(name="figures", type="string", length=150, precision=0, scale=0, nullable=true, unique=false)
     */
    private $figures;

    /**
     * @var string|null
     *
     * @ORM\Column(name="pubdate", type="string", length=45, precision=0, scale=0, nullable=true, unique=false)
     */
    private $pubdate;

    /**
     * @var string|null
     *
     * @ORM\Column(name="edition", type="string", length=45, precision=0, scale=0, nullable=true, unique=false)
     */
    private $edition;

    /**
     * @var string|null
     *
     * @ORM\Column(name="volume", type="string", length=45, precision=0, scale=0, nullable=true, unique=false)
     */
    private $volume;

    /**
     * @var string|null
     *
     * @ORM\Column(name="numbervolumnes", type="string", length=45, precision=0, scale=0, nullable=true, unique=false)
     */
    private $numbervolumnes;

    /**
     * @var string|null
     *
     * @ORM\Column(name="number", type="string", length=45, precision=0, scale=0, nullable=true, unique=false)
     */
    private $number;

    /**
     * @var string|null
     *
     * @ORM\Column(name="pages", type="string", length=45, precision=0, scale=0, nullable=true, unique=false)
     */
    private $pages;

    /**
     * @var string|null
     *
     * @ORM\Column(name="section", type="string", length=45, precision=0, scale=0, nullable=true, unique=false)
     */
    private $section;

    /**
     * @var string|null
     *
     * @ORM\Column(name="placeofpublication", type="string", length=45, precision=0, scale=0, nullable=true, unique=false)
     */
    private $placeofpublication;

    /**
     * @var string|null
     *
     * @ORM\Column(name="publisher", type="string", length=150, precision=0, scale=0, nullable=true, unique=false)
     */
    private $publisher;

    /**
     * @var string|null
     *
     * @ORM\Column(name="isbn_issn", type="string", length=45, precision=0, scale=0, nullable=true, unique=false)
     */
    private $isbnIssn;

    /**
     * @var string|null
     *
     * @ORM\Column(name="url", type="string", length=150, precision=0, scale=0, nullable=true, unique=false)
     */
    private $url;

    /**
     * @var string|null
     *
     * @ORM\Column(name="guid", type="string", length=45, precision=0, scale=0, nullable=true, unique=false)
     */
    private $guid;

    /**
     * @var string|null
     *
     * @ORM\Column(name="ispublished", type="string", length=45, precision=0, scale=0, nullable=true, unique=false)
     */
    private $ispublished;

    /**
     * @var string|null
     *
     * @ORM\Column(name="notes", type="string", length=45, precision=0, scale=0, nullable=true, unique=false)
     */
    private $notes;

    /**
     * @var string|null
     *
     * @ORM\Column(name="cheatauthors", type="string", length=250, precision=0, scale=0, nullable=true, unique=false)
     */
    private $cheatauthors;

    /**
     * @var string|null
     *
     * @ORM\Column(name="cheatcitation", type="string", length=250, precision=0, scale=0, nullable=true, unique=false)
     */
    private $cheatcitation;

    /**
     * @var int|null
     *
     * @ORM\Column(name="modifieduid", type="integer", precision=0, scale=0, nullable=true, options={"unsigned"=true}, unique=false)
     */
    private $modifieduid;

    /**
     * @var \DateTime|null
     *
     * @ORM\Column(name="modifiedtimestamp", type="datetime", precision=0, scale=0, nullable=true, unique=false)
     */
    private $modifiedtimestamp;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="initialtimestamp", type="datetime", precision=0, scale=0, nullable=false, options={"default"="CURRENT_TIMESTAMP"}, unique=false)
     */
    private $initialtimestamp = 'CURRENT_TIMESTAMP';

    /**
     * @var \App\Entities\Referenceobject
     *
     * @ORM\ManyToOne(targetEntity="App\Entities\Referenceobject")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="parentRefId", referencedColumnName="refid", nullable=true)
     * })
     */
    private $parentrefid;

    /**
     * @var \App\Entities\Referencetype
     *
     * @ORM\ManyToOne(targetEntity="App\Entities\Referencetype")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="ReferenceTypeId", referencedColumnName="ReferenceTypeId", nullable=true)
     * })
     */
    private $referencetypeid;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="App\Entities\Referenceauthors", inversedBy="refid")
     * @ORM\JoinTable(name="referenceauthorlink",
     *   joinColumns={
     *     @ORM\JoinColumn(name="refid", referencedColumnName="refid", nullable=true)
     *   },
     *   inverseJoinColumns={
     *     @ORM\JoinColumn(name="refauthid", referencedColumnName="refauthorid", nullable=true)
     *   }
     * )
     */
    private $refauthid;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="App\Entities\Fmchecklists", inversedBy="refid")
     * @ORM\JoinTable(name="referencechecklistlink",
     *   joinColumns={
     *     @ORM\JoinColumn(name="refid", referencedColumnName="refid", nullable=true)
     *   },
     *   inverseJoinColumns={
     *     @ORM\JoinColumn(name="clid", referencedColumnName="CLID", nullable=true)
     *   }
     * )
     */
    private $clid;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="App\Entities\Omcollections", inversedBy="refid")
     * @ORM\JoinTable(name="referencecollectionlink",
     *   joinColumns={
     *     @ORM\JoinColumn(name="refid", referencedColumnName="refid", nullable=true)
     *   },
     *   inverseJoinColumns={
     *     @ORM\JoinColumn(name="collid", referencedColumnName="CollID", nullable=true)
     *   }
     * )
     */
    private $collid;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="App\Entities\Omoccurrences", inversedBy="refid")
     * @ORM\JoinTable(name="referenceoccurlink",
     *   joinColumns={
     *     @ORM\JoinColumn(name="refid", referencedColumnName="refid", nullable=true)
     *   },
     *   inverseJoinColumns={
     *     @ORM\JoinColumn(name="occid", referencedColumnName="occid", nullable=true)
     *   }
     * )
     */
    private $occid;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="App\Entities\Taxa", inversedBy="refid")
     * @ORM\JoinTable(name="referencetaxalink",
     *   joinColumns={
     *     @ORM\JoinColumn(name="refid", referencedColumnName="refid", nullable=true)
     *   },
     *   inverseJoinColumns={
     *     @ORM\JoinColumn(name="tid", referencedColumnName="tid", nullable=true)
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

    /**
     * Get refid.
     *
     * @return int
     */
    public function getRefid()
    {
        return $this->refid;
    }

    /**
     * Set title.
     *
     * @param string $title
     *
     * @return Referenceobject
     */
    public function setTitle($title)
    {
        $this->title = $title;

        return $this;
    }

    /**
     * Get title.
     *
     * @return string
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * Set secondarytitle.
     *
     * @param string|null $secondarytitle
     *
     * @return Referenceobject
     */
    public function setSecondarytitle($secondarytitle = null)
    {
        $this->secondarytitle = $secondarytitle;

        return $this;
    }

    /**
     * Get secondarytitle.
     *
     * @return string|null
     */
    public function getSecondarytitle()
    {
        return $this->secondarytitle;
    }

    /**
     * Set shorttitle.
     *
     * @param string|null $shorttitle
     *
     * @return Referenceobject
     */
    public function setShorttitle($shorttitle = null)
    {
        $this->shorttitle = $shorttitle;

        return $this;
    }

    /**
     * Get shorttitle.
     *
     * @return string|null
     */
    public function getShorttitle()
    {
        return $this->shorttitle;
    }

    /**
     * Set tertiarytitle.
     *
     * @param string|null $tertiarytitle
     *
     * @return Referenceobject
     */
    public function setTertiarytitle($tertiarytitle = null)
    {
        $this->tertiarytitle = $tertiarytitle;

        return $this;
    }

    /**
     * Get tertiarytitle.
     *
     * @return string|null
     */
    public function getTertiarytitle()
    {
        return $this->tertiarytitle;
    }

    /**
     * Set alternativetitle.
     *
     * @param string|null $alternativetitle
     *
     * @return Referenceobject
     */
    public function setAlternativetitle($alternativetitle = null)
    {
        $this->alternativetitle = $alternativetitle;

        return $this;
    }

    /**
     * Get alternativetitle.
     *
     * @return string|null
     */
    public function getAlternativetitle()
    {
        return $this->alternativetitle;
    }

    /**
     * Set typework.
     *
     * @param string|null $typework
     *
     * @return Referenceobject
     */
    public function setTypework($typework = null)
    {
        $this->typework = $typework;

        return $this;
    }

    /**
     * Get typework.
     *
     * @return string|null
     */
    public function getTypework()
    {
        return $this->typework;
    }

    /**
     * Set figures.
     *
     * @param string|null $figures
     *
     * @return Referenceobject
     */
    public function setFigures($figures = null)
    {
        $this->figures = $figures;

        return $this;
    }

    /**
     * Get figures.
     *
     * @return string|null
     */
    public function getFigures()
    {
        return $this->figures;
    }

    /**
     * Set pubdate.
     *
     * @param string|null $pubdate
     *
     * @return Referenceobject
     */
    public function setPubdate($pubdate = null)
    {
        $this->pubdate = $pubdate;

        return $this;
    }

    /**
     * Get pubdate.
     *
     * @return string|null
     */
    public function getPubdate()
    {
        return $this->pubdate;
    }

    /**
     * Set edition.
     *
     * @param string|null $edition
     *
     * @return Referenceobject
     */
    public function setEdition($edition = null)
    {
        $this->edition = $edition;

        return $this;
    }

    /**
     * Get edition.
     *
     * @return string|null
     */
    public function getEdition()
    {
        return $this->edition;
    }

    /**
     * Set volume.
     *
     * @param string|null $volume
     *
     * @return Referenceobject
     */
    public function setVolume($volume = null)
    {
        $this->volume = $volume;

        return $this;
    }

    /**
     * Get volume.
     *
     * @return string|null
     */
    public function getVolume()
    {
        return $this->volume;
    }

    /**
     * Set numbervolumnes.
     *
     * @param string|null $numbervolumnes
     *
     * @return Referenceobject
     */
    public function setNumbervolumnes($numbervolumnes = null)
    {
        $this->numbervolumnes = $numbervolumnes;

        return $this;
    }

    /**
     * Get numbervolumnes.
     *
     * @return string|null
     */
    public function getNumbervolumnes()
    {
        return $this->numbervolumnes;
    }

    /**
     * Set number.
     *
     * @param string|null $number
     *
     * @return Referenceobject
     */
    public function setNumber($number = null)
    {
        $this->number = $number;

        return $this;
    }

    /**
     * Get number.
     *
     * @return string|null
     */
    public function getNumber()
    {
        return $this->number;
    }

    /**
     * Set pages.
     *
     * @param string|null $pages
     *
     * @return Referenceobject
     */
    public function setPages($pages = null)
    {
        $this->pages = $pages;

        return $this;
    }

    /**
     * Get pages.
     *
     * @return string|null
     */
    public function getPages()
    {
        return $this->pages;
    }

    /**
     * Set section.
     *
     * @param string|null $section
     *
     * @return Referenceobject
     */
    public function setSection($section = null)
    {
        $this->section = $section;

        return $this;
    }

    /**
     * Get section.
     *
     * @return string|null
     */
    public function getSection()
    {
        return $this->section;
    }

    /**
     * Set placeofpublication.
     *
     * @param string|null $placeofpublication
     *
     * @return Referenceobject
     */
    public function setPlaceofpublication($placeofpublication = null)
    {
        $this->placeofpublication = $placeofpublication;

        return $this;
    }

    /**
     * Get placeofpublication.
     *
     * @return string|null
     */
    public function getPlaceofpublication()
    {
        return $this->placeofpublication;
    }

    /**
     * Set publisher.
     *
     * @param string|null $publisher
     *
     * @return Referenceobject
     */
    public function setPublisher($publisher = null)
    {
        $this->publisher = $publisher;

        return $this;
    }

    /**
     * Get publisher.
     *
     * @return string|null
     */
    public function getPublisher()
    {
        return $this->publisher;
    }

    /**
     * Set isbnIssn.
     *
     * @param string|null $isbnIssn
     *
     * @return Referenceobject
     */
    public function setIsbnIssn($isbnIssn = null)
    {
        $this->isbnIssn = $isbnIssn;

        return $this;
    }

    /**
     * Get isbnIssn.
     *
     * @return string|null
     */
    public function getIsbnIssn()
    {
        return $this->isbnIssn;
    }

    /**
     * Set url.
     *
     * @param string|null $url
     *
     * @return Referenceobject
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
     * Set guid.
     *
     * @param string|null $guid
     *
     * @return Referenceobject
     */
    public function setGuid($guid = null)
    {
        $this->guid = $guid;

        return $this;
    }

    /**
     * Get guid.
     *
     * @return string|null
     */
    public function getGuid()
    {
        return $this->guid;
    }

    /**
     * Set ispublished.
     *
     * @param string|null $ispublished
     *
     * @return Referenceobject
     */
    public function setIspublished($ispublished = null)
    {
        $this->ispublished = $ispublished;

        return $this;
    }

    /**
     * Get ispublished.
     *
     * @return string|null
     */
    public function getIspublished()
    {
        return $this->ispublished;
    }

    /**
     * Set notes.
     *
     * @param string|null $notes
     *
     * @return Referenceobject
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
     * Set cheatauthors.
     *
     * @param string|null $cheatauthors
     *
     * @return Referenceobject
     */
    public function setCheatauthors($cheatauthors = null)
    {
        $this->cheatauthors = $cheatauthors;

        return $this;
    }

    /**
     * Get cheatauthors.
     *
     * @return string|null
     */
    public function getCheatauthors()
    {
        return $this->cheatauthors;
    }

    /**
     * Set cheatcitation.
     *
     * @param string|null $cheatcitation
     *
     * @return Referenceobject
     */
    public function setCheatcitation($cheatcitation = null)
    {
        $this->cheatcitation = $cheatcitation;

        return $this;
    }

    /**
     * Get cheatcitation.
     *
     * @return string|null
     */
    public function getCheatcitation()
    {
        return $this->cheatcitation;
    }

    /**
     * Set modifieduid.
     *
     * @param int|null $modifieduid
     *
     * @return Referenceobject
     */
    public function setModifieduid($modifieduid = null)
    {
        $this->modifieduid = $modifieduid;

        return $this;
    }

    /**
     * Get modifieduid.
     *
     * @return int|null
     */
    public function getModifieduid()
    {
        return $this->modifieduid;
    }

    /**
     * Set modifiedtimestamp.
     *
     * @param \DateTime|null $modifiedtimestamp
     *
     * @return Referenceobject
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
     * Set initialtimestamp.
     *
     * @param \DateTime $initialtimestamp
     *
     * @return Referenceobject
     */
    public function setInitialtimestamp($initialtimestamp)
    {
        $this->initialtimestamp = $initialtimestamp;

        return $this;
    }

    /**
     * Get initialtimestamp.
     *
     * @return \DateTime
     */
    public function getInitialtimestamp()
    {
        return $this->initialtimestamp;
    }

    /**
     * Set parentrefid.
     *
     * @param \App\Entities\Referenceobject|null $parentrefid
     *
     * @return Referenceobject
     */
    public function setParentrefid(\App\Entities\Referenceobject $parentrefid = null)
    {
        $this->parentrefid = $parentrefid;

        return $this;
    }

    /**
     * Get parentrefid.
     *
     * @return \App\Entities\Referenceobject|null
     */
    public function getParentrefid()
    {
        return $this->parentrefid;
    }

    /**
     * Set referencetypeid.
     *
     * @param \App\Entities\Referencetype|null $referencetypeid
     *
     * @return Referenceobject
     */
    public function setReferencetypeid(\App\Entities\Referencetype $referencetypeid = null)
    {
        $this->referencetypeid = $referencetypeid;

        return $this;
    }

    /**
     * Get referencetypeid.
     *
     * @return \App\Entities\Referencetype|null
     */
    public function getReferencetypeid()
    {
        return $this->referencetypeid;
    }

    /**
     * Add refauthid.
     *
     * @param \App\Entities\Referenceauthors $refauthid
     *
     * @return Referenceobject
     */
    public function addRefauthid(\App\Entities\Referenceauthors $refauthid)
    {
        $this->refauthid[] = $refauthid;

        return $this;
    }

    /**
     * Remove refauthid.
     *
     * @param \App\Entities\Referenceauthors $refauthid
     *
     * @return boolean TRUE if this collection contained the specified element, FALSE otherwise.
     */
    public function removeRefauthid(\App\Entities\Referenceauthors $refauthid)
    {
        return $this->refauthid->removeElement($refauthid);
    }

    /**
     * Get refauthid.
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getRefauthid()
    {
        return $this->refauthid;
    }

    /**
     * Add clid.
     *
     * @param \App\Entities\Fmchecklists $clid
     *
     * @return Referenceobject
     */
    public function addClid(\App\Entities\Fmchecklists $clid)
    {
        $this->clid[] = $clid;

        return $this;
    }

    /**
     * Remove clid.
     *
     * @param \App\Entities\Fmchecklists $clid
     *
     * @return boolean TRUE if this collection contained the specified element, FALSE otherwise.
     */
    public function removeClid(\App\Entities\Fmchecklists $clid)
    {
        return $this->clid->removeElement($clid);
    }

    /**
     * Get clid.
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getClid()
    {
        return $this->clid;
    }

    /**
     * Add collid.
     *
     * @param \App\Entities\Omcollections $collid
     *
     * @return Referenceobject
     */
    public function addCollid(\App\Entities\Omcollections $collid)
    {
        $this->collid[] = $collid;

        return $this;
    }

    /**
     * Remove collid.
     *
     * @param \App\Entities\Omcollections $collid
     *
     * @return boolean TRUE if this collection contained the specified element, FALSE otherwise.
     */
    public function removeCollid(\App\Entities\Omcollections $collid)
    {
        return $this->collid->removeElement($collid);
    }

    /**
     * Get collid.
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getCollid()
    {
        return $this->collid;
    }

    /**
     * Add occid.
     *
     * @param \App\Entities\Omoccurrences $occid
     *
     * @return Referenceobject
     */
    public function addOccid(\App\Entities\Omoccurrences $occid)
    {
        $this->occid[] = $occid;

        return $this;
    }

    /**
     * Remove occid.
     *
     * @param \App\Entities\Omoccurrences $occid
     *
     * @return boolean TRUE if this collection contained the specified element, FALSE otherwise.
     */
    public function removeOccid(\App\Entities\Omoccurrences $occid)
    {
        return $this->occid->removeElement($occid);
    }

    /**
     * Get occid.
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getOccid()
    {
        return $this->occid;
    }

    /**
     * Add tid.
     *
     * @param \App\Entities\Taxa $tid
     *
     * @return Referenceobject
     */
    public function addTid(\App\Entities\Taxa $tid)
    {
        $this->tid[] = $tid;

        return $this;
    }

    /**
     * Remove tid.
     *
     * @param \App\Entities\Taxa $tid
     *
     * @return boolean TRUE if this collection contained the specified element, FALSE otherwise.
     */
    public function removeTid(\App\Entities\Taxa $tid)
    {
        return $this->tid->removeElement($tid);
    }

    /**
     * Get tid.
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getTid()
    {
        return $this->tid;
    }
}
