<?php

namespace App\Entities;

use Doctrine\ORM\Mapping as ORM;

/**
 * Taxauthority
 *
 * @ORM\Table(name="taxauthority")
 * @ORM\Entity
 */
class Taxauthority
{
    /**
     * @var int
     *
     * @ORM\Column(name="taxauthid", type="integer", precision=0, scale=0, nullable=false, options={"unsigned"=true})
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $taxauthid;

    /**
     * @var int
     *
     * @ORM\Column(name="isprimary", type="integer", precision=0, scale=0, nullable=false, options={"unsigned"=true}, unique=false)
     */
    private $isprimary;

    /**
     * @var string
     *
     * @ORM\Column(name="name", type="string", length=45, precision=0, scale=0, nullable=false, unique=false)
     */
    private $name;

    /**
     * @var string|null
     *
     * @ORM\Column(name="description", type="string", length=250, precision=0, scale=0, nullable=true, unique=false)
     */
    private $description;

    /**
     * @var string|null
     *
     * @ORM\Column(name="editors", type="string", length=150, precision=0, scale=0, nullable=true, unique=false)
     */
    private $editors;

    /**
     * @var string|null
     *
     * @ORM\Column(name="contact", type="string", length=45, precision=0, scale=0, nullable=true, unique=false)
     */
    private $contact;

    /**
     * @var string|null
     *
     * @ORM\Column(name="email", type="string", length=100, precision=0, scale=0, nullable=true, unique=false)
     */
    private $email;

    /**
     * @var string|null
     *
     * @ORM\Column(name="url", type="string", length=150, precision=0, scale=0, nullable=true, unique=false)
     */
    private $url;

    /**
     * @var string|null
     *
     * @ORM\Column(name="notes", type="string", length=250, precision=0, scale=0, nullable=true, unique=false)
     */
    private $notes;

    /**
     * @var int
     *
     * @ORM\Column(name="isactive", type="integer", precision=0, scale=0, nullable=false, options={"default"="1","unsigned"=true}, unique=false)
     */
    private $isactive = '1';

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="initialtimestamp", type="datetime", precision=0, scale=0, nullable=false, options={"default"="CURRENT_TIMESTAMP"}, unique=false)
     */
    private $initialtimestamp = 'CURRENT_TIMESTAMP';

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="App\Entities\Taxa", mappedBy="taxauthid")
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
     * Get taxauthid.
     *
     * @return int
     */
    public function getTaxauthid()
    {
        return $this->taxauthid;
    }

    /**
     * Set isprimary.
     *
     * @param int $isprimary
     *
     * @return Taxauthority
     */
    public function setIsprimary($isprimary)
    {
        $this->isprimary = $isprimary;

        return $this;
    }

    /**
     * Get isprimary.
     *
     * @return int
     */
    public function getIsprimary()
    {
        return $this->isprimary;
    }

    /**
     * Set name.
     *
     * @param string $name
     *
     * @return Taxauthority
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get name.
     *
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set description.
     *
     * @param string|null $description
     *
     * @return Taxauthority
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
     * Set editors.
     *
     * @param string|null $editors
     *
     * @return Taxauthority
     */
    public function setEditors($editors = null)
    {
        $this->editors = $editors;

        return $this;
    }

    /**
     * Get editors.
     *
     * @return string|null
     */
    public function getEditors()
    {
        return $this->editors;
    }

    /**
     * Set contact.
     *
     * @param string|null $contact
     *
     * @return Taxauthority
     */
    public function setContact($contact = null)
    {
        $this->contact = $contact;

        return $this;
    }

    /**
     * Get contact.
     *
     * @return string|null
     */
    public function getContact()
    {
        return $this->contact;
    }

    /**
     * Set email.
     *
     * @param string|null $email
     *
     * @return Taxauthority
     */
    public function setEmail($email = null)
    {
        $this->email = $email;

        return $this;
    }

    /**
     * Get email.
     *
     * @return string|null
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * Set url.
     *
     * @param string|null $url
     *
     * @return Taxauthority
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
     * Set notes.
     *
     * @param string|null $notes
     *
     * @return Taxauthority
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
     * Set isactive.
     *
     * @param int $isactive
     *
     * @return Taxauthority
     */
    public function setIsactive($isactive)
    {
        $this->isactive = $isactive;

        return $this;
    }

    /**
     * Get isactive.
     *
     * @return int
     */
    public function getIsactive()
    {
        return $this->isactive;
    }

    /**
     * Set initialtimestamp.
     *
     * @param \DateTime $initialtimestamp
     *
     * @return Taxauthority
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
     * Add tid.
     *
     * @param \App\Entities\Taxa $tid
     *
     * @return Taxauthority
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
