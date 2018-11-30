<?php

namespace App\Entities;

use Doctrine\ORM\Mapping as ORM;

/**
 * Uploadglossary
 *
 * @ORM\Table(name="uploadglossary", indexes={@ORM\Index(name="term_index", columns={"term"}), @ORM\Index(name="relatedterm_index", columns={"newGroupId"})})
 * @ORM\Entity
 */
class Uploadglossary
{
    /**
     * @var int
     *
     * @ORM\Column(name="upgid", type="integer", precision=0, scale=0, nullable=false, unique=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $upgid;

    /**
     * @var string|null
     *
     * @ORM\Column(name="term", type="string", length=150, precision=0, scale=0, nullable=true, unique=false)
     */
    private $term;

    /**
     * @var string|null
     *
     * @ORM\Column(name="definition", type="string", length=1000, precision=0, scale=0, nullable=true, unique=false)
     */
    private $definition;

    /**
     * @var string|null
     *
     * @ORM\Column(name="language", type="string", length=45, precision=0, scale=0, nullable=true, unique=false)
     */
    private $language;

    /**
     * @var string|null
     *
     * @ORM\Column(name="source", type="string", length=1000, precision=0, scale=0, nullable=true, unique=false)
     */
    private $source;

    /**
     * @var string|null
     *
     * @ORM\Column(name="author", type="string", length=250, precision=0, scale=0, nullable=true, unique=false)
     */
    private $author;

    /**
     * @var string|null
     *
     * @ORM\Column(name="translator", type="string", length=250, precision=0, scale=0, nullable=true, unique=false)
     */
    private $translator;

    /**
     * @var string|null
     *
     * @ORM\Column(name="notes", type="string", length=250, precision=0, scale=0, nullable=true, unique=false)
     */
    private $notes;

    /**
     * @var string|null
     *
     * @ORM\Column(name="resourceurl", type="string", length=600, precision=0, scale=0, nullable=true, unique=false)
     */
    private $resourceurl;

    /**
     * @var string|null
     *
     * @ORM\Column(name="tidStr", type="string", length=100, precision=0, scale=0, nullable=true, unique=false)
     */
    private $tidstr;

    /**
     * @var bool|null
     *
     * @ORM\Column(name="synonym", type="boolean", precision=0, scale=0, nullable=true, unique=false)
     */
    private $synonym;

    /**
     * @var int|null
     *
     * @ORM\Column(name="newGroupId", type="integer", precision=0, scale=0, nullable=true, unique=false)
     */
    private $newgroupid;

    /**
     * @var int|null
     *
     * @ORM\Column(name="currentGroupId", type="integer", precision=0, scale=0, nullable=true, unique=false)
     */
    private $currentgroupid;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="InitialTimeStamp", type="datetime", precision=0, scale=0, nullable=false, options={"default"="CURRENT_TIMESTAMP"}, unique=false)
     */
    private $initialtimestamp = 'CURRENT_TIMESTAMP';


    /**
     * Get upgid.
     *
     * @return int
     */
    public function getUpgid()
    {
        return $this->upgid;
    }

    /**
     * Set term.
     *
     * @param string|null $term
     *
     * @return Uploadglossary
     */
    public function setTerm($term = null)
    {
        $this->term = $term;

        return $this;
    }

    /**
     * Get term.
     *
     * @return string|null
     */
    public function getTerm()
    {
        return $this->term;
    }

    /**
     * Set definition.
     *
     * @param string|null $definition
     *
     * @return Uploadglossary
     */
    public function setDefinition($definition = null)
    {
        $this->definition = $definition;

        return $this;
    }

    /**
     * Get definition.
     *
     * @return string|null
     */
    public function getDefinition()
    {
        return $this->definition;
    }

    /**
     * Set language.
     *
     * @param string|null $language
     *
     * @return Uploadglossary
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
     * Set source.
     *
     * @param string|null $source
     *
     * @return Uploadglossary
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
     * Set author.
     *
     * @param string|null $author
     *
     * @return Uploadglossary
     */
    public function setAuthor($author = null)
    {
        $this->author = $author;

        return $this;
    }

    /**
     * Get author.
     *
     * @return string|null
     */
    public function getAuthor()
    {
        return $this->author;
    }

    /**
     * Set translator.
     *
     * @param string|null $translator
     *
     * @return Uploadglossary
     */
    public function setTranslator($translator = null)
    {
        $this->translator = $translator;

        return $this;
    }

    /**
     * Get translator.
     *
     * @return string|null
     */
    public function getTranslator()
    {
        return $this->translator;
    }

    /**
     * Set notes.
     *
     * @param string|null $notes
     *
     * @return Uploadglossary
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
     * Set resourceurl.
     *
     * @param string|null $resourceurl
     *
     * @return Uploadglossary
     */
    public function setResourceurl($resourceurl = null)
    {
        $this->resourceurl = $resourceurl;

        return $this;
    }

    /**
     * Get resourceurl.
     *
     * @return string|null
     */
    public function getResourceurl()
    {
        return $this->resourceurl;
    }

    /**
     * Set tidstr.
     *
     * @param string|null $tidstr
     *
     * @return Uploadglossary
     */
    public function setTidstr($tidstr = null)
    {
        $this->tidstr = $tidstr;

        return $this;
    }

    /**
     * Get tidstr.
     *
     * @return string|null
     */
    public function getTidstr()
    {
        return $this->tidstr;
    }

    /**
     * Set synonym.
     *
     * @param bool|null $synonym
     *
     * @return Uploadglossary
     */
    public function setSynonym($synonym = null)
    {
        $this->synonym = $synonym;

        return $this;
    }

    /**
     * Get synonym.
     *
     * @return bool|null
     */
    public function getSynonym()
    {
        return $this->synonym;
    }

    /**
     * Set newgroupid.
     *
     * @param int|null $newgroupid
     *
     * @return Uploadglossary
     */
    public function setNewgroupid($newgroupid = null)
    {
        $this->newgroupid = $newgroupid;

        return $this;
    }

    /**
     * Get newgroupid.
     *
     * @return int|null
     */
    public function getNewgroupid()
    {
        return $this->newgroupid;
    }

    /**
     * Set currentgroupid.
     *
     * @param int|null $currentgroupid
     *
     * @return Uploadglossary
     */
    public function setCurrentgroupid($currentgroupid = null)
    {
        $this->currentgroupid = $currentgroupid;

        return $this;
    }

    /**
     * Get currentgroupid.
     *
     * @return int|null
     */
    public function getCurrentgroupid()
    {
        return $this->currentgroupid;
    }

    /**
     * Set initialtimestamp.
     *
     * @param \DateTime $initialtimestamp
     *
     * @return Uploadglossary
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
