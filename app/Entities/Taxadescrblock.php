<?php

namespace App\Entities;

use Doctrine\ORM\Mapping as ORM;

/**
 * Taxadescrblock
 *
 * @ORM\Table(name="taxadescrblock", uniqueConstraints={@ORM\UniqueConstraint(name="Index_unique", columns={"tid", "displaylevel", "language"})}, indexes={@ORM\Index(name="FK_taxadesc_lang_idx", columns={"langid"}), @ORM\Index(name="IDX_17AB94AF52596C31", columns={"tid"})})
 * @ORM\Entity
 */
class Taxadescrblock
{
    /**
     * @var int
     *
     * @ORM\Column(name="tdbid", type="integer", precision=0, scale=0, nullable=false, options={"unsigned"=true}, unique=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $tdbid;

    /**
     * @var string|null
     *
     * @ORM\Column(name="caption", type="string", length=40, precision=0, scale=0, nullable=true, unique=false)
     */
    private $caption;

    /**
     * @var string|null
     *
     * @ORM\Column(name="source", type="string", length=250, precision=0, scale=0, nullable=true, unique=false)
     */
    private $source;

    /**
     * @var string|null
     *
     * @ORM\Column(name="sourceurl", type="string", length=250, precision=0, scale=0, nullable=true, unique=false)
     */
    private $sourceurl;

    /**
     * @var string|null
     *
     * @ORM\Column(name="language", type="string", length=45, precision=0, scale=0, nullable=true, options={"default"="English"}, unique=false)
     */
    private $language = 'English';

    /**
     * @var int
     *
     * @ORM\Column(name="displaylevel", type="integer", precision=0, scale=0, nullable=false, options={"default"="1","unsigned"=true,"comment"="1 = short descr, 2 = intermediate descr"}, unique=false)
     */
    private $displaylevel = '1';

    /**
     * @var int
     *
     * @ORM\Column(name="uid", type="integer", precision=0, scale=0, nullable=false, options={"unsigned"=true}, unique=false)
     */
    private $uid;

    /**
     * @var string|null
     *
     * @ORM\Column(name="notes", type="string", length=250, precision=0, scale=0, nullable=true, unique=false)
     */
    private $notes;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="initialtimestamp", type="datetime", precision=0, scale=0, nullable=false, options={"default"="CURRENT_TIMESTAMP"}, unique=false)
     */
    private $initialtimestamp = 'CURRENT_TIMESTAMP';

    /**
     * @var \App\Entities\Adminlanguages
     *
     * @ORM\ManyToOne(targetEntity="App\Entities\Adminlanguages")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="langid", referencedColumnName="langid", nullable=true)
     * })
     */
    private $langid;

    /**
     * @var \App\Entities\Taxa
     *
     * @ORM\ManyToOne(targetEntity="App\Entities\Taxa")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="tid", referencedColumnName="tid", nullable=true)
     * })
     */
    private $tid;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="App\Entities\Taxaprofilepubs", inversedBy="tdbid")
     * @ORM\JoinTable(name="taxaprofilepubdesclink",
     *   joinColumns={
     *     @ORM\JoinColumn(name="tdbid", referencedColumnName="tdbid", nullable=true)
     *   },
     *   inverseJoinColumns={
     *     @ORM\JoinColumn(name="tppid", referencedColumnName="tppid", nullable=true)
     *   }
     * )
     */
    private $tppid;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->tppid = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Get tdbid.
     *
     * @return int
     */
    public function getTdbid()
    {
        return $this->tdbid;
    }

    /**
     * Set caption.
     *
     * @param string|null $caption
     *
     * @return Taxadescrblock
     */
    public function setCaption($caption = null)
    {
        $this->caption = $caption;

        return $this;
    }

    /**
     * Get caption.
     *
     * @return string|null
     */
    public function getCaption()
    {
        return $this->caption;
    }

    /**
     * Set source.
     *
     * @param string|null $source
     *
     * @return Taxadescrblock
     */
    public function setSource($source = null)
    {
        $this->source = $source;

        return $this;
    }

    /**
     * Get source.
     *
     * @return string|null
     */
    public function getSource()
    {
        return $this->source;
    }

    /**
     * Set sourceurl.
     *
     * @param string|null $sourceurl
     *
     * @return Taxadescrblock
     */
    public function setSourceurl($sourceurl = null)
    {
        $this->sourceurl = $sourceurl;

        return $this;
    }

    /**
     * Get sourceurl.
     *
     * @return string|null
     */
    public function getSourceurl()
    {
        return $this->sourceurl;
    }

    /**
     * Set language.
     *
     * @param string|null $language
     *
     * @return Taxadescrblock
     */
    public function setLanguage($language = null)
    {
        $this->language = $language;

        return $this;
    }

    /**
     * Get language.
     *
     * @return string|null
     */
    public function getLanguage()
    {
        return $this->language;
    }

    /**
     * Set displaylevel.
     *
     * @param int $displaylevel
     *
     * @return Taxadescrblock
     */
    public function setDisplaylevel($displaylevel)
    {
        $this->displaylevel = $displaylevel;

        return $this;
    }

    /**
     * Get displaylevel.
     *
     * @return int
     */
    public function getDisplaylevel()
    {
        return $this->displaylevel;
    }

    /**
     * Set uid.
     *
     * @param int $uid
     *
     * @return Taxadescrblock
     */
    public function setUid($uid)
    {
        $this->uid = $uid;

        return $this;
    }

    /**
     * Get uid.
     *
     * @return int
     */
    public function getUid()
    {
        return $this->uid;
    }

    /**
     * Set notes.
     *
     * @param string|null $notes
     *
     * @return Taxadescrblock
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
     * Set initialtimestamp.
     *
     * @param \DateTime $initialtimestamp
     *
     * @return Taxadescrblock
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
     * Set langid.
     *
     * @param \App\Entities\Adminlanguages|null $langid
     *
     * @return Taxadescrblock
     */
    public function setLangid(\App\Entities\Adminlanguages $langid = null)
    {
        $this->langid = $langid;

        return $this;
    }

    /**
     * Get langid.
     *
     * @return \App\Entities\Adminlanguages|null
     */
    public function getLangid()
    {
        return $this->langid;
    }

    /**
     * Set tid.
     *
     * @param \App\Entities\Taxa|null $tid
     *
     * @return Taxadescrblock
     */
    public function setTid(\App\Entities\Taxa $tid = null)
    {
        $this->tid = $tid;

        return $this;
    }

    /**
     * Get tid.
     *
     * @return \App\Entities\Taxa|null
     */
    public function getTid()
    {
        return $this->tid;
    }

    /**
     * Add tppid.
     *
     * @param \App\Entities\Taxaprofilepubs $tppid
     *
     * @return Taxadescrblock
     */
    public function addTppid(\App\Entities\Taxaprofilepubs $tppid)
    {
        $this->tppid[] = $tppid;

        return $this;
    }

    /**
     * Remove tppid.
     *
     * @param \App\Entities\Taxaprofilepubs $tppid
     *
     * @return boolean TRUE if this collection contained the specified element, FALSE otherwise.
     */
    public function removeTppid(\App\Entities\Taxaprofilepubs $tppid)
    {
        return $this->tppid->removeElement($tppid);
    }

    /**
     * Get tppid.
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getTppid()
    {
        return $this->tppid;
    }
}
