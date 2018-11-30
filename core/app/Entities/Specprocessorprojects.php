<?php

namespace App\Entities;

use Doctrine\ORM\Mapping as ORM;

/**
 * Specprocessorprojects
 *
 * @ORM\Table(name="specprocessorprojects", indexes={@ORM\Index(name="FK_specprocessorprojects_coll", columns={"collid"})})
 * @ORM\Entity
 */
class Specprocessorprojects
{
    /**
     * @var int
     *
     * @ORM\Column(name="spprid", type="integer", precision=0, scale=0, nullable=false, options={"unsigned"=true}, unique=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $spprid;

    /**
     * @var string
     *
     * @ORM\Column(name="title", type="string", length=100, precision=0, scale=0, nullable=false, unique=false)
     */
    private $title;

    /**
     * @var string|null
     *
     * @ORM\Column(name="projecttype", type="string", length=45, precision=0, scale=0, nullable=true, unique=false)
     */
    private $projecttype;

    /**
     * @var string|null
     *
     * @ORM\Column(name="specKeyPattern", type="string", length=45, precision=0, scale=0, nullable=true, unique=false)
     */
    private $speckeypattern;

    /**
     * @var string|null
     *
     * @ORM\Column(name="patternReplace", type="string", length=45, precision=0, scale=0, nullable=true, unique=false)
     */
    private $patternreplace;

    /**
     * @var string|null
     *
     * @ORM\Column(name="replaceStr", type="string", length=45, precision=0, scale=0, nullable=true, unique=false)
     */
    private $replacestr;

    /**
     * @var string|null
     *
     * @ORM\Column(name="speckeyretrieval", type="string", length=45, precision=0, scale=0, nullable=true, unique=false)
     */
    private $speckeyretrieval;

    /**
     * @var int|null
     *
     * @ORM\Column(name="coordX1", type="integer", precision=0, scale=0, nullable=true, options={"unsigned"=true}, unique=false)
     */
    private $coordx1;

    /**
     * @var int|null
     *
     * @ORM\Column(name="coordX2", type="integer", precision=0, scale=0, nullable=true, options={"unsigned"=true}, unique=false)
     */
    private $coordx2;

    /**
     * @var int|null
     *
     * @ORM\Column(name="coordY1", type="integer", precision=0, scale=0, nullable=true, options={"unsigned"=true}, unique=false)
     */
    private $coordy1;

    /**
     * @var int|null
     *
     * @ORM\Column(name="coordY2", type="integer", precision=0, scale=0, nullable=true, options={"unsigned"=true}, unique=false)
     */
    private $coordy2;

    /**
     * @var string|null
     *
     * @ORM\Column(name="sourcePath", type="string", length=250, precision=0, scale=0, nullable=true, unique=false)
     */
    private $sourcepath;

    /**
     * @var string|null
     *
     * @ORM\Column(name="targetPath", type="string", length=250, precision=0, scale=0, nullable=true, unique=false)
     */
    private $targetpath;

    /**
     * @var string|null
     *
     * @ORM\Column(name="imgUrl", type="string", length=250, precision=0, scale=0, nullable=true, unique=false)
     */
    private $imgurl;

    /**
     * @var int|null
     *
     * @ORM\Column(name="webPixWidth", type="integer", precision=0, scale=0, nullable=true, options={"default"="1200","unsigned"=true}, unique=false)
     */
    private $webpixwidth = '1200';

    /**
     * @var int|null
     *
     * @ORM\Column(name="tnPixWidth", type="integer", precision=0, scale=0, nullable=true, options={"default"="130","unsigned"=true}, unique=false)
     */
    private $tnpixwidth = '130';

    /**
     * @var int|null
     *
     * @ORM\Column(name="lgPixWidth", type="integer", precision=0, scale=0, nullable=true, options={"default"="2400","unsigned"=true}, unique=false)
     */
    private $lgpixwidth = '2400';

    /**
     * @var int|null
     *
     * @ORM\Column(name="jpgcompression", type="integer", precision=0, scale=0, nullable=true, options={"default"="70"}, unique=false)
     */
    private $jpgcompression = '70';

    /**
     * @var int|null
     *
     * @ORM\Column(name="createTnImg", type="integer", precision=0, scale=0, nullable=true, options={"default"="1","unsigned"=true}, unique=false)
     */
    private $createtnimg = '1';

    /**
     * @var int|null
     *
     * @ORM\Column(name="createLgImg", type="integer", precision=0, scale=0, nullable=true, options={"default"="1","unsigned"=true}, unique=false)
     */
    private $createlgimg = '1';

    /**
     * @var string|null
     *
     * @ORM\Column(name="source", type="string", length=45, precision=0, scale=0, nullable=true, unique=false)
     */
    private $source;

    /**
     * @var \DateTime|null
     *
     * @ORM\Column(name="lastrundate", type="date", precision=0, scale=0, nullable=true, unique=false)
     */
    private $lastrundate;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="initialTimestamp", type="datetime", precision=0, scale=0, nullable=false, options={"default"="CURRENT_TIMESTAMP"}, unique=false)
     */
    private $initialtimestamp = 'CURRENT_TIMESTAMP';

    /**
     * @var \App\Entities\Omcollections
     *
     * @ORM\ManyToOne(targetEntity="App\Entities\Omcollections")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="collid", referencedColumnName="CollID", nullable=true)
     * })
     */
    private $collid;


    /**
     * Get spprid.
     *
     * @return int
     */
    public function getSpprid()
    {
        return $this->spprid;
    }

    /**
     * Set title.
     *
     * @param string $title
     *
     * @return Specprocessorprojects
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
     * Set projecttype.
     *
     * @param string|null $projecttype
     *
     * @return Specprocessorprojects
     */
    public function setProjecttype($projecttype = null)
    {
        $this->projecttype = $projecttype;

        return $this;
    }

    /**
     * Get projecttype.
     *
     * @return string|null
     */
    public function getProjecttype()
    {
        return $this->projecttype;
    }

    /**
     * Set speckeypattern.
     *
     * @param string|null $speckeypattern
     *
     * @return Specprocessorprojects
     */
    public function setSpeckeypattern($speckeypattern = null)
    {
        $this->speckeypattern = $speckeypattern;

        return $this;
    }

    /**
     * Get speckeypattern.
     *
     * @return string|null
     */
    public function getSpeckeypattern()
    {
        return $this->speckeypattern;
    }

    /**
     * Set patternreplace.
     *
     * @param string|null $patternreplace
     *
     * @return Specprocessorprojects
     */
    public function setPatternreplace($patternreplace = null)
    {
        $this->patternreplace = $patternreplace;

        return $this;
    }

    /**
     * Get patternreplace.
     *
     * @return string|null
     */
    public function getPatternreplace()
    {
        return $this->patternreplace;
    }

    /**
     * Set replacestr.
     *
     * @param string|null $replacestr
     *
     * @return Specprocessorprojects
     */
    public function setReplacestr($replacestr = null)
    {
        $this->replacestr = $replacestr;

        return $this;
    }

    /**
     * Get replacestr.
     *
     * @return string|null
     */
    public function getReplacestr()
    {
        return $this->replacestr;
    }

    /**
     * Set speckeyretrieval.
     *
     * @param string|null $speckeyretrieval
     *
     * @return Specprocessorprojects
     */
    public function setSpeckeyretrieval($speckeyretrieval = null)
    {
        $this->speckeyretrieval = $speckeyretrieval;

        return $this;
    }

    /**
     * Get speckeyretrieval.
     *
     * @return string|null
     */
    public function getSpeckeyretrieval()
    {
        return $this->speckeyretrieval;
    }

    /**
     * Set coordx1.
     *
     * @param int|null $coordx1
     *
     * @return Specprocessorprojects
     */
    public function setCoordx1($coordx1 = null)
    {
        $this->coordx1 = $coordx1;

        return $this;
    }

    /**
     * Get coordx1.
     *
     * @return int|null
     */
    public function getCoordx1()
    {
        return $this->coordx1;
    }

    /**
     * Set coordx2.
     *
     * @param int|null $coordx2
     *
     * @return Specprocessorprojects
     */
    public function setCoordx2($coordx2 = null)
    {
        $this->coordx2 = $coordx2;

        return $this;
    }

    /**
     * Get coordx2.
     *
     * @return int|null
     */
    public function getCoordx2()
    {
        return $this->coordx2;
    }

    /**
     * Set coordy1.
     *
     * @param int|null $coordy1
     *
     * @return Specprocessorprojects
     */
    public function setCoordy1($coordy1 = null)
    {
        $this->coordy1 = $coordy1;

        return $this;
    }

    /**
     * Get coordy1.
     *
     * @return int|null
     */
    public function getCoordy1()
    {
        return $this->coordy1;
    }

    /**
     * Set coordy2.
     *
     * @param int|null $coordy2
     *
     * @return Specprocessorprojects
     */
    public function setCoordy2($coordy2 = null)
    {
        $this->coordy2 = $coordy2;

        return $this;
    }

    /**
     * Get coordy2.
     *
     * @return int|null
     */
    public function getCoordy2()
    {
        return $this->coordy2;
    }

    /**
     * Set sourcepath.
     *
     * @param string|null $sourcepath
     *
     * @return Specprocessorprojects
     */
    public function setSourcepath($sourcepath = null)
    {
        $this->sourcepath = $sourcepath;

        return $this;
    }

    /**
     * Get sourcepath.
     *
     * @return string|null
     */
    public function getSourcepath()
    {
        return $this->sourcepath;
    }

    /**
     * Set targetpath.
     *
     * @param string|null $targetpath
     *
     * @return Specprocessorprojects
     */
    public function setTargetpath($targetpath = null)
    {
        $this->targetpath = $targetpath;

        return $this;
    }

    /**
     * Get targetpath.
     *
     * @return string|null
     */
    public function getTargetpath()
    {
        return $this->targetpath;
    }

    /**
     * Set imgurl.
     *
     * @param string|null $imgurl
     *
     * @return Specprocessorprojects
     */
    public function setImgurl($imgurl = null)
    {
        $this->imgurl = $imgurl;

        return $this;
    }

    /**
     * Get imgurl.
     *
     * @return string|null
     */
    public function getImgurl()
    {
        return $this->imgurl;
    }

    /**
     * Set webpixwidth.
     *
     * @param int|null $webpixwidth
     *
     * @return Specprocessorprojects
     */
    public function setWebpixwidth($webpixwidth = null)
    {
        $this->webpixwidth = $webpixwidth;

        return $this;
    }

    /**
     * Get webpixwidth.
     *
     * @return int|null
     */
    public function getWebpixwidth()
    {
        return $this->webpixwidth;
    }

    /**
     * Set tnpixwidth.
     *
     * @param int|null $tnpixwidth
     *
     * @return Specprocessorprojects
     */
    public function setTnpixwidth($tnpixwidth = null)
    {
        $this->tnpixwidth = $tnpixwidth;

        return $this;
    }

    /**
     * Get tnpixwidth.
     *
     * @return int|null
     */
    public function getTnpixwidth()
    {
        return $this->tnpixwidth;
    }

    /**
     * Set lgpixwidth.
     *
     * @param int|null $lgpixwidth
     *
     * @return Specprocessorprojects
     */
    public function setLgpixwidth($lgpixwidth = null)
    {
        $this->lgpixwidth = $lgpixwidth;

        return $this;
    }

    /**
     * Get lgpixwidth.
     *
     * @return int|null
     */
    public function getLgpixwidth()
    {
        return $this->lgpixwidth;
    }

    /**
     * Set jpgcompression.
     *
     * @param int|null $jpgcompression
     *
     * @return Specprocessorprojects
     */
    public function setJpgcompression($jpgcompression = null)
    {
        $this->jpgcompression = $jpgcompression;

        return $this;
    }

    /**
     * Get jpgcompression.
     *
     * @return int|null
     */
    public function getJpgcompression()
    {
        return $this->jpgcompression;
    }

    /**
     * Set createtnimg.
     *
     * @param int|null $createtnimg
     *
     * @return Specprocessorprojects
     */
    public function setCreatetnimg($createtnimg = null)
    {
        $this->createtnimg = $createtnimg;

        return $this;
    }

    /**
     * Get createtnimg.
     *
     * @return int|null
     */
    public function getCreatetnimg()
    {
        return $this->createtnimg;
    }

    /**
     * Set createlgimg.
     *
     * @param int|null $createlgimg
     *
     * @return Specprocessorprojects
     */
    public function setCreatelgimg($createlgimg = null)
    {
        $this->createlgimg = $createlgimg;

        return $this;
    }

    /**
     * Get createlgimg.
     *
     * @return int|null
     */
    public function getCreatelgimg()
    {
        return $this->createlgimg;
    }

    /**
     * Set source.
     *
     * @param string|null $source
     *
     * @return Specprocessorprojects
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
     * Set lastrundate.
     *
     * @param \DateTime|null $lastrundate
     *
     * @return Specprocessorprojects
     */
    public function setLastrundate($lastrundate = null)
    {
        $this->lastrundate = $lastrundate;

        return $this;
    }

    /**
     * Get lastrundate.
     *
     * @return \DateTime|null
     */
    public function getLastrundate()
    {
        return $this->lastrundate;
    }

    /**
     * Set initialtimestamp.
     *
     * @param \DateTime $initialtimestamp
     *
     * @return Specprocessorprojects
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
     * Set collid.
     *
     * @param \App\Entities\Omcollections|null $collid
     *
     * @return Specprocessorprojects
     */
    public function setCollid(\App\Entities\Omcollections $collid = null)
    {
        $this->collid = $collid;

        return $this;
    }

    /**
     * Get collid.
     *
     * @return \App\Entities\Omcollections|null
     */
    public function getCollid()
    {
        return $this->collid;
    }
}
