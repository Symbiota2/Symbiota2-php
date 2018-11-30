<?php

namespace App\Entities;

use Doctrine\ORM\Mapping as ORM;

/**
 * Adminstats
 *
 * @ORM\Table(name="adminstats", indexes={@ORM\Index(name="FK_adminstats_collid_idx", columns={"collid"}), @ORM\Index(name="FK_adminstats_uid_idx", columns={"uid"}), @ORM\Index(name="Index_adminstats_ts", columns={"initialtimestamp"}), @ORM\Index(name="Index_category", columns={"category"})})
 * @ORM\Entity
 */
class Adminstats
{
    /**
     * @var int
     *
     * @ORM\Column(name="idadminstats", type="integer", precision=0, scale=0, nullable=false, options={"unsigned"=true}, unique=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idadminstats;

    /**
     * @var string
     *
     * @ORM\Column(name="category", type="string", length=45, precision=0, scale=0, nullable=false, unique=false)
     */
    private $category;

    /**
     * @var string
     *
     * @ORM\Column(name="statname", type="string", length=45, precision=0, scale=0, nullable=false, unique=false)
     */
    private $statname;

    /**
     * @var int|null
     *
     * @ORM\Column(name="statvalue", type="integer", precision=0, scale=0, nullable=true, unique=false)
     */
    private $statvalue;

    /**
     * @var int|null
     *
     * @ORM\Column(name="statpercentage", type="integer", precision=0, scale=0, nullable=true, unique=false)
     */
    private $statpercentage;

    /**
     * @var string|null
     *
     * @ORM\Column(name="dynamicProperties", type="text", length=65535, precision=0, scale=0, nullable=true, unique=false)
     */
    private $dynamicproperties;

    /**
     * @var int
     *
     * @ORM\Column(name="groupid", type="integer", precision=0, scale=0, nullable=false, unique=false)
     */
    private $groupid;

    /**
     * @var string|null
     *
     * @ORM\Column(name="note", type="string", length=250, precision=0, scale=0, nullable=true, unique=false)
     */
    private $note;

    /**
     * @var \DateTime|null
     *
     * @ORM\Column(name="initialtimestamp", type="datetime", precision=0, scale=0, nullable=true, options={"default"="CURRENT_TIMESTAMP"}, unique=false)
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
     * @var \App\Entities\User
     *
     * @ORM\ManyToOne(targetEntity="App\Entities\User")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="uid", referencedColumnName="uid", nullable=true)
     * })
     */
    private $uid;


    /**
     * Get idadminstats.
     *
     * @return int
     */
    public function getIdadminstats()
    {
        return $this->idadminstats;
    }

    /**
     * Set category.
     *
     * @param string $category
     *
     * @return Adminstats
     */
    public function setCategory($category)
    {
        $this->category = $category;

        return $this;
    }

    /**
     * Get category.
     *
     * @return string
     */
    public function getCategory()
    {
        return $this->category;
    }

    /**
     * Set statname.
     *
     * @param string $statname
     *
     * @return Adminstats
     */
    public function setStatname($statname)
    {
        $this->statname = $statname;

        return $this;
    }

    /**
     * Get statname.
     *
     * @return string
     */
    public function getStatname()
    {
        return $this->statname;
    }

    /**
     * Set statvalue.
     *
     * @param int|null $statvalue
     *
     * @return Adminstats
     */
    public function setStatvalue($statvalue = null)
    {
        $this->statvalue = $statvalue;

        return $this;
    }

    /**
     * Get statvalue.
     *
     * @return int|null
     */
    public function getStatvalue()
    {
        return $this->statvalue;
    }

    /**
     * Set statpercentage.
     *
     * @param int|null $statpercentage
     *
     * @return Adminstats
     */
    public function setStatpercentage($statpercentage = null)
    {
        $this->statpercentage = $statpercentage;

        return $this;
    }

    /**
     * Get statpercentage.
     *
     * @return int|null
     */
    public function getStatpercentage()
    {
        return $this->statpercentage;
    }

    /**
     * Set dynamicproperties.
     *
     * @param string|null $dynamicproperties
     *
     * @return Adminstats
     */
    public function setDynamicproperties($dynamicproperties = null)
    {
        $this->dynamicproperties = $dynamicproperties;

        return $this;
    }

    /**
     * Get dynamicproperties.
     *
     * @return string|null
     */
    public function getDynamicproperties()
    {
        return $this->dynamicproperties;
    }

    /**
     * Set groupid.
     *
     * @param int $groupid
     *
     * @return Adminstats
     */
    public function setGroupid($groupid)
    {
        $this->groupid = $groupid;

        return $this;
    }

    /**
     * Get groupid.
     *
     * @return int
     */
    public function getGroupid()
    {
        return $this->groupid;
    }

    /**
     * Set note.
     *
     * @param string|null $note
     *
     * @return Adminstats
     */
    public function setNote($note = null)
    {
        $this->note = $note;

        return $this;
    }

    /**
     * Get note.
     *
     * @return string|null
     */
    public function getNote()
    {
        return $this->note;
    }

    /**
     * Set initialtimestamp.
     *
     * @param \DateTime|null $initialtimestamp
     *
     * @return Adminstats
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
     * Set collid.
     *
     * @param \App\Entities\Omcollections|null $collid
     *
     * @return Adminstats
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

    /**
     * Set uid.
     *
     * @param \App\Entities\User|null $uid
     *
     * @return Adminstats
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
}
