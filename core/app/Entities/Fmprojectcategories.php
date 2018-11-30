<?php

namespace App\Entities;

use Doctrine\ORM\Mapping as ORM;

/**
 * Fmprojectcategories
 *
 * @ORM\Table(name="fmprojectcategories", indexes={@ORM\Index(name="FK_fmprojcat_pid_idx", columns={"pid"})})
 * @ORM\Entity
 */
class Fmprojectcategories
{
    /**
     * @var int
     *
     * @ORM\Column(name="projcatid", type="integer", precision=0, scale=0, nullable=false, options={"unsigned"=true}, unique=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $projcatid;

    /**
     * @var string
     *
     * @ORM\Column(name="categoryname", type="string", length=150, precision=0, scale=0, nullable=false, unique=false)
     */
    private $categoryname;

    /**
     * @var string|null
     *
     * @ORM\Column(name="managers", type="string", length=100, precision=0, scale=0, nullable=true, unique=false)
     */
    private $managers;

    /**
     * @var string|null
     *
     * @ORM\Column(name="description", type="string", length=250, precision=0, scale=0, nullable=true, unique=false)
     */
    private $description;

    /**
     * @var int|null
     *
     * @ORM\Column(name="parentpid", type="integer", precision=0, scale=0, nullable=true, unique=false)
     */
    private $parentpid;

    /**
     * @var int|null
     *
     * @ORM\Column(name="occurrencesearch", type="integer", precision=0, scale=0, nullable=true, unique=false)
     */
    private $occurrencesearch;

    /**
     * @var int|null
     *
     * @ORM\Column(name="ispublic", type="integer", precision=0, scale=0, nullable=true, options={"default"="1"}, unique=false)
     */
    private $ispublic = '1';

    /**
     * @var string|null
     *
     * @ORM\Column(name="notes", type="string", length=250, precision=0, scale=0, nullable=true, unique=false)
     */
    private $notes;

    /**
     * @var int|null
     *
     * @ORM\Column(name="sortsequence", type="integer", precision=0, scale=0, nullable=true, unique=false)
     */
    private $sortsequence;

    /**
     * @var \DateTime|null
     *
     * @ORM\Column(name="initialtimestamp", type="datetime", precision=0, scale=0, nullable=true, options={"default"="CURRENT_TIMESTAMP"}, unique=false)
     */
    private $initialtimestamp = 'CURRENT_TIMESTAMP';

    /**
     * @var \App\Entities\Fmprojects
     *
     * @ORM\ManyToOne(targetEntity="App\Entities\Fmprojects")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="pid", referencedColumnName="pid", nullable=true)
     * })
     */
    private $pid;


    /**
     * Get projcatid.
     *
     * @return int
     */
    public function getProjcatid()
    {
        return $this->projcatid;
    }

    /**
     * Set categoryname.
     *
     * @param string $categoryname
     *
     * @return Fmprojectcategories
     */
    public function setCategoryname($categoryname)
    {
        $this->categoryname = $categoryname;

        return $this;
    }

    /**
     * Get categoryname.
     *
     * @return string
     */
    public function getCategoryname()
    {
        return $this->categoryname;
    }

    /**
     * Set managers.
     *
     * @param string|null $managers
     *
     * @return Fmprojectcategories
     */
    public function setManagers($managers = null)
    {
        $this->managers = $managers;

        return $this;
    }

    /**
     * Get managers.
     *
     * @return string|null
     */
    public function getManagers()
    {
        return $this->managers;
    }

    /**
     * Set description.
     *
     * @param string|null $description
     *
     * @return Fmprojectcategories
     */
    public function setDescription($description = null)
    {
        $this->description = $description;

        return $this;
    }

    /**
     * Get description.
     *
     * @return string|null
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Set parentpid.
     *
     * @param int|null $parentpid
     *
     * @return Fmprojectcategories
     */
    public function setParentpid($parentpid = null)
    {
        $this->parentpid = $parentpid;

        return $this;
    }

    /**
     * Get parentpid.
     *
     * @return int|null
     */
    public function getParentpid()
    {
        return $this->parentpid;
    }

    /**
     * Set occurrencesearch.
     *
     * @param int|null $occurrencesearch
     *
     * @return Fmprojectcategories
     */
    public function setOccurrencesearch($occurrencesearch = null)
    {
        $this->occurrencesearch = $occurrencesearch;

        return $this;
    }

    /**
     * Get occurrencesearch.
     *
     * @return int|null
     */
    public function getOccurrencesearch()
    {
        return $this->occurrencesearch;
    }

    /**
     * Set ispublic.
     *
     * @param int|null $ispublic
     *
     * @return Fmprojectcategories
     */
    public function setIspublic($ispublic = null)
    {
        $this->ispublic = $ispublic;

        return $this;
    }

    /**
     * Get ispublic.
     *
     * @return int|null
     */
    public function getIspublic()
    {
        return $this->ispublic;
    }

    /**
     * Set notes.
     *
     * @param string|null $notes
     *
     * @return Fmprojectcategories
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
     * Set sortsequence.
     *
     * @param int|null $sortsequence
     *
     * @return Fmprojectcategories
     */
    public function setSortsequence($sortsequence = null)
    {
        $this->sortsequence = $sortsequence;

        return $this;
    }

    /**
     * Get sortsequence.
     *
     * @return int|null
     */
    public function getSortsequence()
    {
        return $this->sortsequence;
    }

    /**
     * Set initialtimestamp.
     *
     * @param \DateTime|null $initialtimestamp
     *
     * @return Fmprojectcategories
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

    /**
     * Set pid.
     *
     * @param \App\Entities\Fmprojects|null $pid
     *
     * @return Fmprojectcategories
     */
    public function setPid(\App\Entities\Fmprojects $pid = null)
    {
        $this->pid = $pid;

        return $this;
    }

    /**
     * Get pid.
     *
     * @return \App\Entities\Fmprojects|null
     */
    public function getPid()
    {
        return $this->pid;
    }
}
