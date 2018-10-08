<?php

namespace App\Entities;

use Doctrine\ORM\Mapping as ORM;

/**
 * Glossary
 *
 * @ORM\Table(name="glossary", indexes={@ORM\Index(name="Index_term", columns={"term"}), @ORM\Index(name="Index_glossary_lang", columns={"language"}), @ORM\Index(name="FK_glossary_uid_idx", columns={"uid"})})
 * @ORM\Entity
 */
class Glossary
{
    /**
     * @var int
     *
     * @ORM\Column(name="glossid", type="integer", precision=0, scale=0, nullable=false, options={"unsigned"=true}, unique=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $glossid;

    /**
     * @var string
     *
     * @ORM\Column(name="term", type="string", length=150, precision=0, scale=0, nullable=false, unique=false)
     */
    private $term;

    /**
     * @var string|null
     *
     * @ORM\Column(name="definition", type="string", length=2000, precision=0, scale=0, nullable=true, unique=false)
     */
    private $definition;

    /**
     * @var string
     *
     * @ORM\Column(name="language", type="string", length=45, precision=0, scale=0, nullable=false, options={"default"="English"}, unique=false)
     */
    private $language = 'English';

    /**
     * @var string|null
     *
     * @ORM\Column(name="source", type="string", length=1000, precision=0, scale=0, nullable=true, unique=false)
     */
    private $source;

    /**
     * @var string|null
     *
     * @ORM\Column(name="translator", type="string", length=250, precision=0, scale=0, nullable=true, unique=false)
     */
    private $translator;

    /**
     * @var string|null
     *
     * @ORM\Column(name="author", type="string", length=250, precision=0, scale=0, nullable=true, unique=false)
     */
    private $author;

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
     * @var \DateTime
     *
     * @ORM\Column(name="initialtimestamp", type="datetime", precision=0, scale=0, nullable=false, options={"default"="CURRENT_TIMESTAMP"}, unique=false)
     */
    private $initialtimestamp = 'CURRENT_TIMESTAMP';

    /**
     * @var \App\Entities\User
     *
     * @ORM\ManyToOne(targetEntity="App\Entities\User")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="uid", referencedColumnName="uid", nullable=true)
     * })
     */
    private $uid;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="App\Entities\Taxa", inversedBy="glossid")
     * @ORM\JoinTable(name="glossarytaxalink",
     *   joinColumns={
     *     @ORM\JoinColumn(name="glossid", referencedColumnName="glossid", nullable=true)
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
        $this->tid = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Get glossid.
     *
     * @return int
     */
    public function getGlossid()
    {
        return $this->glossid;
    }

    /**
     * Set term.
     *
     * @param string $term
     *
     * @return Glossary
     */
    public function setTerm($term)
    {
        $this->term = $term;

        return $this;
    }

    /**
     * Get term.
     *
     * @return string
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
     * @return Glossary
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
     * @param string $language
     *
     * @return Glossary
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
     * Set source.
     *
     * @param string|null $source
     *
     * @return Glossary
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
     * Set translator.
     *
     * @param string|null $translator
     *
     * @return Glossary
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
     * Set author.
     *
     * @param string|null $author
     *
     * @return Glossary
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
     * Set notes.
     *
     * @param string|null $notes
     *
     * @return Glossary
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
     * @return Glossary
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
     * Set initialtimestamp.
     *
     * @param \DateTime $initialtimestamp
     *
     * @return Glossary
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
     * Set uid.
     *
     * @param \App\Entities\User|null $uid
     *
     * @return Glossary
     */
    public function setUid(\App\Entities\User $uid = null)
    {
        $this->uid = $uid;

        return $this;
    }

    /**
     * Get uid.
     *
     * @return \App\Entities\User|null
     */
    public function getUid()
    {
        return $this->uid;
    }

    /**
     * Add tid.
     *
     * @param \App\Entities\Taxa $tid
     *
     * @return Glossary
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
