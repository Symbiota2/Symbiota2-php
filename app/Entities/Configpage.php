<?php

namespace App\Entities;

use Doctrine\ORM\Mapping as ORM;

/**
 * Configpage
 *
 * @ORM\Table(name="configpage")
 * @ORM\Entity
 */
class Configpage
{
    /**
     * @var int
     *
     * @ORM\Column(name="configpageid", type="integer", precision=0, scale=0, nullable=false, unique=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $configpageid;

    /**
     * @var string
     *
     * @ORM\Column(name="pagename", type="string", length=45, precision=0, scale=0, nullable=false, unique=false)
     */
    private $pagename;

    /**
     * @var string
     *
     * @ORM\Column(name="title", type="string", length=150, precision=0, scale=0, nullable=false, unique=false)
     */
    private $title;

    /**
     * @var string|null
     *
     * @ORM\Column(name="cssname", type="string", length=45, precision=0, scale=0, nullable=true, unique=false)
     */
    private $cssname;

    /**
     * @var string
     *
     * @ORM\Column(name="language", type="string", length=45, precision=0, scale=0, nullable=false, options={"default"="english"}, unique=false)
     */
    private $language = 'english';

    /**
     * @var int|null
     *
     * @ORM\Column(name="displaymode", type="integer", precision=0, scale=0, nullable=true, unique=false)
     */
    private $displaymode;

    /**
     * @var string|null
     *
     * @ORM\Column(name="notes", type="string", length=250, precision=0, scale=0, nullable=true, unique=false)
     */
    private $notes;

    /**
     * @var int
     *
     * @ORM\Column(name="modifiedUid", type="integer", precision=0, scale=0, nullable=false, options={"unsigned"=true}, unique=false)
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
     * Get configpageid.
     *
     * @return int
     */
    public function getConfigpageid()
    {
        return $this->configpageid;
    }

    /**
     * Set pagename.
     *
     * @param string $pagename
     *
     * @return Configpage
     */
    public function setPagename($pagename)
    {
        $this->pagename = $pagename;

        return $this;
    }

    /**
     * Get pagename.
     *
     * @return string
     */
    public function getPagename()
    {
        return $this->pagename;
    }

    /**
     * Set title.
     *
     * @param string $title
     *
     * @return Configpage
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
     * Set cssname.
     *
     * @param string|null $cssname
     *
     * @return Configpage
     */
    public function setCssname($cssname = null)
    {
        $this->cssname = $cssname;

        return $this;
    }

    /**
     * Get cssname.
     *
     * @return string|null
     */
    public function getCssname()
    {
        return $this->cssname;
    }

    /**
     * Set language.
     *
     * @param string $language
     *
     * @return Configpage
     */
    public function setLanguage($language)
    {
        $this->language = $language;

        return $this;
    }

    /**
     * Get language.
     *
     * @return string
     */
    public function getLanguage()
    {
        return $this->language;
    }

    /**
     * Set displaymode.
     *
     * @param int|null $displaymode
     *
     * @return Configpage
     */
    public function setDisplaymode($displaymode = null)
    {
        $this->displaymode = $displaymode;

        return $this;
    }

    /**
     * Get displaymode.
     *
     * @return int|null
     */
    public function getDisplaymode()
    {
        return $this->displaymode;
    }

    /**
     * Set notes.
     *
     * @param string|null $notes
     *
     * @return Configpage
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
     * Set modifieduid.
     *
     * @param int $modifieduid
     *
     * @return Configpage
     */
    public function setModifieduid($modifieduid)
    {
        $this->modifieduid = $modifieduid;

        return $this;
    }

    /**
     * Get modifieduid.
     *
     * @return int
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
     * @return Configpage
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
     * @return Configpage
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
}
