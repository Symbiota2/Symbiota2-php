<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * Imageprojects
 *
 * @ORM\Table(name="imageprojects")
 * @ORM\Entity(repositoryClass="App\Repository\ImageprojectsRepository")
 */
class Imageprojects
{
    /**
     * @var int
     *
     * @ORM\Column(name="imgprojid", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $imgprojid;

    /**
     * @var string
     *
     * @ORM\Column(name="projectname", type="string", length=75, nullable=false)
     */
    private $projectname;

    /**
     * @var string|null
     *
     * @ORM\Column(name="managers", type="string", length=150, nullable=true, options={"default"="NULL"})
     */
    private $managers = 'NULL';

    /**
     * @var string|null
     *
     * @ORM\Column(name="description", type="string", length=1000, nullable=true, options={"default"="NULL"})
     */
    private $description = 'NULL';

    /**
     * @var int
     *
     * @ORM\Column(name="ispublic", type="integer", nullable=false, options={"default"="1"})
     */
    private $ispublic = '1';

    /**
     * @var string|null
     *
     * @ORM\Column(name="notes", type="string", length=250, nullable=true, options={"default"="NULL"})
     */
    private $notes = 'NULL';

    /**
     * @var int|null
     *
     * @ORM\Column(name="uidcreated", type="integer", nullable=true, options={"default"="NULL"})
     */
    private $uidcreated = 'NULL';

    /**
     * @var int|null
     *
     * @ORM\Column(name="sortsequence", type="integer", nullable=true, options={"default"="50"})
     */
    private $sortsequence = '50';

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="initialtimestamp", type="datetime", nullable=false, options={"default"="current_timestamp()"})
     */
    private $initialtimestamp = 'current_timestamp()';

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="Images", mappedBy="imgprojid")
     */
    private $imgid;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->imgid = new \Doctrine\Common\Collections\ArrayCollection();
    }

    public function getImgprojid(): ?int
    {
        return $this->imgprojid;
    }

    public function getProjectname(): ?string
    {
        return $this->projectname;
    }

    public function setProjectname(string $projectname): self
    {
        $this->projectname = $projectname;

        return $this;
    }

    public function getManagers(): ?string
    {
        return $this->managers;
    }

    public function setManagers(?string $managers): self
    {
        $this->managers = $managers;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(?string $description): self
    {
        $this->description = $description;

        return $this;
    }

    public function getIspublic(): ?int
    {
        return $this->ispublic;
    }

    public function setIspublic(int $ispublic): self
    {
        $this->ispublic = $ispublic;

        return $this;
    }

    public function getNotes(): ?string
    {
        return $this->notes;
    }

    public function setNotes(?string $notes): self
    {
        $this->notes = $notes;

        return $this;
    }

    public function getUidcreated(): ?int
    {
        return $this->uidcreated;
    }

    public function setUidcreated(?int $uidcreated): self
    {
        $this->uidcreated = $uidcreated;

        return $this;
    }

    public function getSortsequence(): ?int
    {
        return $this->sortsequence;
    }

    public function setSortsequence(?int $sortsequence): self
    {
        $this->sortsequence = $sortsequence;

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

    /**
     * @return Collection|Images[]
     */
    public function getImgid(): Collection
    {
        return $this->imgid;
    }

    public function addImgid(Images $imgid): self
    {
        if (!$this->imgid->contains($imgid)) {
            $this->imgid[] = $imgid;
            $imgid->addImgprojid($this);
        }

        return $this;
    }

    public function removeImgid(Images $imgid): self
    {
        if ($this->imgid->contains($imgid)) {
            $this->imgid->removeElement($imgid);
            $imgid->removeImgprojid($this);
        }

        return $this;
    }

}
