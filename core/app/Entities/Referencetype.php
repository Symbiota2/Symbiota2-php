<?php

namespace App\Entities;

use Doctrine\ORM\Mapping as ORM;

/**
 * Referencetype
 *
 * @ORM\Table(name="referencetype", uniqueConstraints={@ORM\UniqueConstraint(name="ReferenceType_UNIQUE", columns={"ReferenceType"})})
 * @ORM\Entity
 */
class Referencetype
{
    /**
     * @var int
     *
     * @ORM\Column(name="ReferenceTypeId", type="integer", precision=0, scale=0, nullable=false, unique=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $referencetypeid;

    /**
     * @var string
     *
     * @ORM\Column(name="ReferenceType", type="string", length=45, precision=0, scale=0, nullable=false, unique=false)
     */
    private $referencetype;

    /**
     * @var int|null
     *
     * @ORM\Column(name="IsParent", type="integer", precision=0, scale=0, nullable=true, unique=false)
     */
    private $isparent;

    /**
     * @var string|null
     *
     * @ORM\Column(name="Title", type="string", length=45, precision=0, scale=0, nullable=true, unique=false)
     */
    private $title;

    /**
     * @var string|null
     *
     * @ORM\Column(name="SecondaryTitle", type="string", length=45, precision=0, scale=0, nullable=true, unique=false)
     */
    private $secondarytitle;

    /**
     * @var string|null
     *
     * @ORM\Column(name="PlacePublished", type="string", length=45, precision=0, scale=0, nullable=true, unique=false)
     */
    private $placepublished;

    /**
     * @var string|null
     *
     * @ORM\Column(name="Publisher", type="string", length=45, precision=0, scale=0, nullable=true, unique=false)
     */
    private $publisher;

    /**
     * @var string|null
     *
     * @ORM\Column(name="Volume", type="string", length=45, precision=0, scale=0, nullable=true, unique=false)
     */
    private $volume;

    /**
     * @var string|null
     *
     * @ORM\Column(name="NumberVolumes", type="string", length=45, precision=0, scale=0, nullable=true, unique=false)
     */
    private $numbervolumes;

    /**
     * @var string|null
     *
     * @ORM\Column(name="Number", type="string", length=45, precision=0, scale=0, nullable=true, unique=false)
     */
    private $number;

    /**
     * @var string|null
     *
     * @ORM\Column(name="Pages", type="string", length=45, precision=0, scale=0, nullable=true, unique=false)
     */
    private $pages;

    /**
     * @var string|null
     *
     * @ORM\Column(name="Section", type="string", length=45, precision=0, scale=0, nullable=true, unique=false)
     */
    private $section;

    /**
     * @var string|null
     *
     * @ORM\Column(name="TertiaryTitle", type="string", length=45, precision=0, scale=0, nullable=true, unique=false)
     */
    private $tertiarytitle;

    /**
     * @var string|null
     *
     * @ORM\Column(name="Edition", type="string", length=45, precision=0, scale=0, nullable=true, unique=false)
     */
    private $edition;

    /**
     * @var string|null
     *
     * @ORM\Column(name="Date", type="string", length=45, precision=0, scale=0, nullable=true, unique=false)
     */
    private $date;

    /**
     * @var string|null
     *
     * @ORM\Column(name="TypeWork", type="string", length=45, precision=0, scale=0, nullable=true, unique=false)
     */
    private $typework;

    /**
     * @var string|null
     *
     * @ORM\Column(name="ShortTitle", type="string", length=45, precision=0, scale=0, nullable=true, unique=false)
     */
    private $shorttitle;

    /**
     * @var string|null
     *
     * @ORM\Column(name="AlternativeTitle", type="string", length=45, precision=0, scale=0, nullable=true, unique=false)
     */
    private $alternativetitle;

    /**
     * @var string|null
     *
     * @ORM\Column(name="ISBN_ISSN", type="string", length=45, precision=0, scale=0, nullable=true, unique=false)
     */
    private $isbnIssn;

    /**
     * @var string|null
     *
     * @ORM\Column(name="Figures", type="string", length=45, precision=0, scale=0, nullable=true, unique=false)
     */
    private $figures;

    /**
     * @var int|null
     *
     * @ORM\Column(name="addedByUid", type="integer", precision=0, scale=0, nullable=true, unique=false)
     */
    private $addedbyuid;

    /**
     * @var \DateTime|null
     *
     * @ORM\Column(name="initialTimestamp", type="datetime", precision=0, scale=0, nullable=true, options={"default"="CURRENT_TIMESTAMP"}, unique=false)
     */
    private $initialtimestamp = 'CURRENT_TIMESTAMP';


    /**
     * Get referencetypeid.
     *
     * @return int
     */
    public function getReferencetypeid()
    {
        return $this->referencetypeid;
    }

    /**
     * Set referencetype.
     *
     * @param string $referencetype
     *
     * @return Referencetype
     */
    public function setReferencetype($referencetype)
    {
        $this->referencetype = $referencetype;

        return $this;
    }

    /**
     * Get referencetype.
     *
     * @return string
     */
    public function getReferencetype()
    {
        return $this->referencetype;
    }

    /**
     * Set isparent.
     *
     * @param int|null $isparent
     *
     * @return Referencetype
     */
    public function setIsparent($isparent = null)
    {
        $this->isparent = $isparent;

        return $this;
    }

    /**
     * Get isparent.
     *
     * @return int|null
     */
    public function getIsparent()
    {
        return $this->isparent;
    }

    /**
     * Set title.
     *
     * @param string|null $title
     *
     * @return Referencetype
     */
    public function setTitle($title = null)
    {
        $this->title = $title;

        return $this;
    }

    /**
     * Get title.
     *
     * @return string|null
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
     * @return Referencetype
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
     * Set placepublished.
     *
     * @param string|null $placepublished
     *
     * @return Referencetype
     */
    public function setPlacepublished($placepublished = null)
    {
        $this->placepublished = $placepublished;

        return $this;
    }

    /**
     * Get placepublished.
     *
     * @return string|null
     */
    public function getPlacepublished()
    {
        return $this->placepublished;
    }

    /**
     * Set publisher.
     *
     * @param string|null $publisher
     *
     * @return Referencetype
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
     * Set volume.
     *
     * @param string|null $volume
     *
     * @return Referencetype
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
     * Set numbervolumes.
     *
     * @param string|null $numbervolumes
     *
     * @return Referencetype
     */
    public function setNumbervolumes($numbervolumes = null)
    {
        $this->numbervolumes = $numbervolumes;

        return $this;
    }

    /**
     * Get numbervolumes.
     *
     * @return string|null
     */
    public function getNumbervolumes()
    {
        return $this->numbervolumes;
    }

    /**
     * Set number.
     *
     * @param string|null $number
     *
     * @return Referencetype
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
     * @return Referencetype
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
     * @return Referencetype
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
     * Set tertiarytitle.
     *
     * @param string|null $tertiarytitle
     *
     * @return Referencetype
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
     * Set edition.
     *
     * @param string|null $edition
     *
     * @return Referencetype
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
     * Set date.
     *
     * @param string|null $date
     *
     * @return Referencetype
     */
    public function setDate($date = null)
    {
        $this->date = $date;

        return $this;
    }

    /**
     * Get date.
     *
     * @return string|null
     */
    public function getDate()
    {
        return $this->date;
    }

    /**
     * Set typework.
     *
     * @param string|null $typework
     *
     * @return Referencetype
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
     * Set shorttitle.
     *
     * @param string|null $shorttitle
     *
     * @return Referencetype
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
     * Set alternativetitle.
     *
     * @param string|null $alternativetitle
     *
     * @return Referencetype
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
     * Set isbnIssn.
     *
     * @param string|null $isbnIssn
     *
     * @return Referencetype
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
     * Set figures.
     *
     * @param string|null $figures
     *
     * @return Referencetype
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
     * Set addedbyuid.
     *
     * @param int|null $addedbyuid
     *
     * @return Referencetype
     */
    public function setAddedbyuid($addedbyuid = null)
    {
        $this->addedbyuid = $addedbyuid;

        return $this;
    }

    /**
     * Get addedbyuid.
     *
     * @return int|null
     */
    public function getAddedbyuid()
    {
        return $this->addedbyuid;
    }

    /**
     * Set initialtimestamp.
     *
     * @param \DateTime|null $initialtimestamp
     *
     * @return Referencetype
     */
    public function setInitialtimestamp($initialtimestamp = null)
    {
        $this->initialtimestamp = $initialtimestamp;

        return $this;
    }

    /**
     * Get initialtimestamp.
     *
     * @return \DateTime|null
     */
    public function getInitialtimestamp()
    {
        return $this->initialtimestamp;
    }
}
