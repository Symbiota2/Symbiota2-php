<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * ImageProcessorProjects
 *
 * @ORM\Table(name="specprocessorprojects", indexes={@ORM\Index(name="FK_specprocessorprojects_coll", columns={"collid"})})
 * @ORM\Entity(repositoryClass="App\Repository\ImageProcessorProjectsRepository")
 */
class ImageProcessorProjects
{
    /**
     * @var int
     *
     * @ORM\Column(name="spprid", type="integer", nullable=false, options={"unsigned"=true})
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $spprid;

    /**
     * @var \Collections
     *
     * @ORM\ManyToOne(targetEntity="Collections")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="collid", referencedColumnName="CollID")
     * })
     */
    private $collid;

    /**
     * @var string
     *
     * @ORM\Column(name="title", type="string", length=100, nullable=false)
     */
    private $title;

    /**
     * @var string|null
     *
     * @ORM\Column(name="projecttype", type="string", length=45, nullable=true, options={"default"=NULL})
     */
    private $projecttype = 'NULL';

    /**
     * @var string|null
     *
     * @ORM\Column(name="specKeyPattern", type="string", length=155, nullable=true, options={"default"=NULL})
     */
    private $speckeypattern = 'NULL';

    /**
     * @var string|null
     *
     * @ORM\Column(name="patternReplace", type="string", length=45, nullable=true, options={"default"=NULL})
     */
    private $patternreplace = 'NULL';

    /**
     * @var string|null
     *
     * @ORM\Column(name="replaceStr", type="string", length=45, nullable=true, options={"default"=NULL})
     */
    private $replacestr = 'NULL';

    /**
     * @var string|null
     *
     * @ORM\Column(name="speckeyretrieval", type="string", length=45, nullable=true, options={"default"=NULL})
     */
    private $speckeyretrieval = 'NULL';

    /**
     * @var int|null
     *
     * @ORM\Column(name="coordX1", type="integer", nullable=true, options={"default"=NULL,"unsigned"=true})
     */
    private $coordx1 = 'NULL';

    /**
     * @var int|null
     *
     * @ORM\Column(name="coordX2", type="integer", nullable=true, options={"default"=NULL,"unsigned"=true})
     */
    private $coordx2 = 'NULL';

    /**
     * @var int|null
     *
     * @ORM\Column(name="coordY1", type="integer", nullable=true, options={"default"=NULL,"unsigned"=true})
     */
    private $coordy1 = 'NULL';

    /**
     * @var int|null
     *
     * @ORM\Column(name="coordY2", type="integer", nullable=true, options={"default"=NULL,"unsigned"=true})
     */
    private $coordy2 = 'NULL';

    /**
     * @var string|null
     *
     * @ORM\Column(name="sourcePath", type="string", length=250, nullable=true, options={"default"=NULL})
     */
    private $sourcepath = 'NULL';

    /**
     * @var string|null
     *
     * @ORM\Column(name="targetPath", type="string", length=250, nullable=true, options={"default"=NULL})
     */
    private $targetpath = 'NULL';

    /**
     * @var string|null
     *
     * @ORM\Column(name="imgUrl", type="string", length=250, nullable=true, options={"default"=NULL})
     */
    private $imgurl = 'NULL';

    /**
     * @var int|null
     *
     * @ORM\Column(name="webPixWidth", type="integer", nullable=true, options={"default"="1200","unsigned"=true})
     */
    private $webpixwidth = '1200';

    /**
     * @var int|null
     *
     * @ORM\Column(name="tnPixWidth", type="integer", nullable=true, options={"default"="130","unsigned"=true})
     */
    private $tnpixwidth = '130';

    /**
     * @var int|null
     *
     * @ORM\Column(name="lgPixWidth", type="integer", nullable=true, options={"default"="2400","unsigned"=true})
     */
    private $lgpixwidth = '2400';

    /**
     * @var int|null
     *
     * @ORM\Column(name="jpgcompression", type="integer", nullable=true, options={"default"="70"})
     */
    private $jpgcompression = '70';

    /**
     * @var int|null
     *
     * @ORM\Column(name="createTnImg", type="integer", nullable=true, options={"default"="1","unsigned"=true})
     */
    private $createtnimg = '1';

    /**
     * @var int|null
     *
     * @ORM\Column(name="createLgImg", type="integer", nullable=true, options={"default"="1","unsigned"=true})
     */
    private $createlgimg = '1';

    /**
     * @var string|null
     *
     * @ORM\Column(name="source", type="string", length=45, nullable=true, options={"default"=NULL})
     */
    private $source = 'NULL';

    /**
     * @var \DateTime|null
     *
     * @ORM\Column(name="lastrundate", type="date", nullable=true, options={"default"=NULL})
     */
    private $lastrundate = 'NULL';

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="initialTimestamp", type="datetime", nullable=false, options={"default"="CURRENT_TIMESTAMP"})
     */
    private $initialtimestamp = 'CURRENT_TIMESTAMP';

    public function getSpprid(): ?int
    {
        return $this->spprid;
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

    public function getProjecttype(): ?string
    {
        return $this->projecttype;
    }

    public function setProjecttype(?string $projecttype): self
    {
        $this->projecttype = $projecttype;

        return $this;
    }

    public function getSpeckeypattern(): ?string
    {
        return $this->speckeypattern;
    }

    public function setSpeckeypattern(?string $speckeypattern): self
    {
        $this->speckeypattern = $speckeypattern;

        return $this;
    }

    public function getPatternreplace(): ?string
    {
        return $this->patternreplace;
    }

    public function setPatternreplace(?string $patternreplace): self
    {
        $this->patternreplace = $patternreplace;

        return $this;
    }

    public function getReplacestr(): ?string
    {
        return $this->replacestr;
    }

    public function setReplacestr(?string $replacestr): self
    {
        $this->replacestr = $replacestr;

        return $this;
    }

    public function getSpeckeyretrieval(): ?string
    {
        return $this->speckeyretrieval;
    }

    public function setSpeckeyretrieval(?string $speckeyretrieval): self
    {
        $this->speckeyretrieval = $speckeyretrieval;

        return $this;
    }

    public function getCoordx1(): ?int
    {
        return $this->coordx1;
    }

    public function setCoordx1(?int $coordx1): self
    {
        $this->coordx1 = $coordx1;

        return $this;
    }

    public function getCoordx2(): ?int
    {
        return $this->coordx2;
    }

    public function setCoordx2(?int $coordx2): self
    {
        $this->coordx2 = $coordx2;

        return $this;
    }

    public function getCoordy1(): ?int
    {
        return $this->coordy1;
    }

    public function setCoordy1(?int $coordy1): self
    {
        $this->coordy1 = $coordy1;

        return $this;
    }

    public function getCoordy2(): ?int
    {
        return $this->coordy2;
    }

    public function setCoordy2(?int $coordy2): self
    {
        $this->coordy2 = $coordy2;

        return $this;
    }

    public function getSourcepath(): ?string
    {
        return $this->sourcepath;
    }

    public function setSourcepath(?string $sourcepath): self
    {
        $this->sourcepath = $sourcepath;

        return $this;
    }

    public function getTargetpath(): ?string
    {
        return $this->targetpath;
    }

    public function setTargetpath(?string $targetpath): self
    {
        $this->targetpath = $targetpath;

        return $this;
    }

    public function getImgurl(): ?string
    {
        return $this->imgurl;
    }

    public function setImgurl(?string $imgurl): self
    {
        $this->imgurl = $imgurl;

        return $this;
    }

    public function getWebpixwidth(): ?int
    {
        return $this->webpixwidth;
    }

    public function setWebpixwidth(?int $webpixwidth): self
    {
        $this->webpixwidth = $webpixwidth;

        return $this;
    }

    public function getTnpixwidth(): ?int
    {
        return $this->tnpixwidth;
    }

    public function setTnpixwidth(?int $tnpixwidth): self
    {
        $this->tnpixwidth = $tnpixwidth;

        return $this;
    }

    public function getLgpixwidth(): ?int
    {
        return $this->lgpixwidth;
    }

    public function setLgpixwidth(?int $lgpixwidth): self
    {
        $this->lgpixwidth = $lgpixwidth;

        return $this;
    }

    public function getJpgcompression(): ?int
    {
        return $this->jpgcompression;
    }

    public function setJpgcompression(?int $jpgcompression): self
    {
        $this->jpgcompression = $jpgcompression;

        return $this;
    }

    public function getCreatetnimg(): ?int
    {
        return $this->createtnimg;
    }

    public function setCreatetnimg(?int $createtnimg): self
    {
        $this->createtnimg = $createtnimg;

        return $this;
    }

    public function getCreatelgimg(): ?int
    {
        return $this->createlgimg;
    }

    public function setCreatelgimg(?int $createlgimg): self
    {
        $this->createlgimg = $createlgimg;

        return $this;
    }

    public function getSource(): ?string
    {
        return $this->source;
    }

    public function setSource(?string $source): self
    {
        $this->source = $source;

        return $this;
    }

    public function getLastrundate(): ?\DateTimeInterface
    {
        return $this->lastrundate;
    }

    public function setLastrundate(?\DateTimeInterface $lastrundate): self
    {
        $this->lastrundate = $lastrundate;

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

    public function getCollid(): ?Collections
    {
        return $this->collid;
    }

    public function setCollid(?Collections $collid): self
    {
        $this->collid = $collid;

        return $this;
    }


}
