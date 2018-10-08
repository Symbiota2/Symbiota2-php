<?php

namespace App\Entities;

use Doctrine\ORM\Mapping as ORM;

/**
 * Referenceauthors
 *
 * @ORM\Table(name="referenceauthors", indexes={@ORM\Index(name="INDEX_refauthlastname", columns={"lastname"})})
 * @ORM\Entity
 */
class Referenceauthors
{
    /**
     * @var int
     *
     * @ORM\Column(name="refauthorid", type="integer", precision=0, scale=0, nullable=false, unique=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $refauthorid;

    /**
     * @var string
     *
     * @ORM\Column(name="lastname", type="string", length=100, precision=0, scale=0, nullable=false, unique=false)
     */
    private $lastname;

    /**
     * @var string|null
     *
     * @ORM\Column(name="firstname", type="string", length=100, precision=0, scale=0, nullable=true, unique=false)
     */
    private $firstname;

    /**
     * @var string|null
     *
     * @ORM\Column(name="middlename", type="string", length=100, precision=0, scale=0, nullable=true, unique=false)
     */
    private $middlename;

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
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="App\Entities\Referenceobject", mappedBy="refauthid")
     */
    private $refid;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->refid = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Get refauthorid.
     *
     * @return int
     */
    public function getRefauthorid()
    {
        return $this->refauthorid;
    }

    /**
     * Set lastname.
     *
     * @param string $lastname
     *
     * @return Referenceauthors
     */
    public function setLastname($lastname)
    {
        $this->lastname = $lastname;

        return $this;
    }

    /**
     * Get lastname.
     *
     * @return string
     */
    public function getLastname()
    {
        return $this->lastname;
    }

    /**
     * Set firstname.
     *
     * @param string|null $firstname
     *
     * @return Referenceauthors
     */
    public function setFirstname($firstname = null)
    {
        $this->firstname = $firstname;

        return $this;
    }

    /**
     * Get firstname.
     *
     * @return string|null
     */
    public function getFirstname()
    {
        return $this->firstname;
    }

    /**
     * Set middlename.
     *
     * @param string|null $middlename
     *
     * @return Referenceauthors
     */
    public function setMiddlename($middlename = null)
    {
        $this->middlename = $middlename;

        return $this;
    }

    /**
     * Get middlename.
     *
     * @return string|null
     */
    public function getMiddlename()
    {
        return $this->middlename;
    }

    /**
     * Set modifieduid.
     *
     * @param int|null $modifieduid
     *
     * @return Referenceauthors
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
     * @return Referenceauthors
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
     * @return Referenceauthors
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
     * Add refid.
     *
     * @param \App\Entities\Referenceobject $refid
     *
     * @return Referenceauthors
     */
    public function addRefid(\App\Entities\Referenceobject $refid)
    {
        $this->refid[] = $refid;

        return $this;
    }

    /**
     * Remove refid.
     *
     * @param \App\Entities\Referenceobject $refid
     *
     * @return boolean TRUE if this collection contained the specified element, FALSE otherwise.
     */
    public function removeRefid(\App\Entities\Referenceobject $refid)
    {
        return $this->refid->removeElement($refid);
    }

    /**
     * Get refid.
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getRefid()
    {
        return $this->refid;
    }
}
