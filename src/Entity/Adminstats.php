<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Adminstats
 *
 * @ORM\Table(name="adminstats", indexes={@ORM\Index(name="FK_adminstats_collid_idx", columns={"collid"}), @ORM\Index(name="Index_category", columns={"category"}), @ORM\Index(name="Index_adminstats_ts", columns={"initialtimestamp"}), @ORM\Index(name="FK_adminstats_uid_idx", columns={"uid"})})
 * @ORM\Entity(repositoryClass="App\Repository\AdminstatsRepository")
 */
class Adminstats
{
    /**
     * @var int
     *
     * @ORM\Column(name="idadminstats", type="integer", nullable=false, options={"unsigned"=true})
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idadminstats;

    /**
     * @var string
     *
     * @ORM\Column(name="category", type="string", length=45, nullable=false)
     */
    private $category;

    /**
     * @var string
     *
     * @ORM\Column(name="statname", type="string", length=45, nullable=false)
     */
    private $statname;

    /**
     * @var int|null
     *
     * @ORM\Column(name="statvalue", type="integer", nullable=true, options={"default"="NULL"})
     */
    private $statvalue = 'NULL';

    /**
     * @var int|null
     *
     * @ORM\Column(name="statpercentage", type="integer", nullable=true, options={"default"="NULL"})
     */
    private $statpercentage = 'NULL';

    /**
     * @var string|null
     *
     * @ORM\Column(name="dynamicProperties", type="text", length=65535, nullable=true, options={"default"="NULL"})
     */
    private $dynamicproperties = 'NULL';

    /**
     * @var int
     *
     * @ORM\Column(name="groupid", type="integer", nullable=false)
     */
    private $groupid;

    /**
     * @var string|null
     *
     * @ORM\Column(name="note", type="string", length=250, nullable=true, options={"default"="NULL"})
     */
    private $note = 'NULL';

    /**
     * @var \DateTime|null
     *
     * @ORM\Column(name="initialtimestamp", type="datetime", nullable=true, options={"default"="current_timestamp()"})
     */
    private $initialtimestamp = 'current_timestamp()';

    /**
     * @var \Users
     *
     * @ORM\ManyToOne(targetEntity="Users")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="uid", referencedColumnName="uid")
     * })
     */
    private $uid;

    /**
     * @var \Omcollections
     *
     * @ORM\ManyToOne(targetEntity="Omcollections")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="collid", referencedColumnName="CollID")
     * })
     */
    private $collid;

    public function getIdadminstats(): ?int
    {
        return $this->idadminstats;
    }

    public function getCategory(): ?string
    {
        return $this->category;
    }

    public function setCategory(string $category): self
    {
        $this->category = $category;

        return $this;
    }

    public function getStatname(): ?string
    {
        return $this->statname;
    }

    public function setStatname(string $statname): self
    {
        $this->statname = $statname;

        return $this;
    }

    public function getStatvalue(): ?int
    {
        return $this->statvalue;
    }

    public function setStatvalue(?int $statvalue): self
    {
        $this->statvalue = $statvalue;

        return $this;
    }

    public function getStatpercentage(): ?int
    {
        return $this->statpercentage;
    }

    public function setStatpercentage(?int $statpercentage): self
    {
        $this->statpercentage = $statpercentage;

        return $this;
    }

    public function getDynamicproperties(): ?string
    {
        return $this->dynamicproperties;
    }

    public function setDynamicproperties(?string $dynamicproperties): self
    {
        $this->dynamicproperties = $dynamicproperties;

        return $this;
    }

    public function getGroupid(): ?int
    {
        return $this->groupid;
    }

    public function setGroupid(int $groupid): self
    {
        $this->groupid = $groupid;

        return $this;
    }

    public function getNote(): ?string
    {
        return $this->note;
    }

    public function setNote(?string $note): self
    {
        $this->note = $note;

        return $this;
    }

    public function getInitialtimestamp(): ?\DateTimeInterface
    {
        return $this->initialtimestamp;
    }

    public function setInitialtimestamp(?\DateTimeInterface $initialtimestamp): self
    {
        $this->initialtimestamp = $initialtimestamp;

        return $this;
    }

    public function getUid(): ?Users
    {
        return $this->uid;
    }

    public function setUid(?Users $uid): self
    {
        $this->uid = $uid;

        return $this;
    }

    public function getCollid(): ?Omcollections
    {
        return $this->collid;
    }

    public function setCollid(?Omcollections $collid): self
    {
        $this->collid = $collid;

        return $this;
    }


}
