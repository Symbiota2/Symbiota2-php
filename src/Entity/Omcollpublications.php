<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * Omcollpublications
 *
 * @ORM\Table(name="omcollpublications", indexes={@ORM\Index(name="FK_adminpub_collid_idx", columns={"collid"})})
 * @ORM\Entity(repositoryClass="App\Repository\OmcollpublicationsRepository")
 */
class Omcollpublications
{
    /**
     * @var int
     *
     * @ORM\Column(name="pubid", type="integer", nullable=false, options={"unsigned"=true})
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $pubid;

    /**
     * @var string
     *
     * @ORM\Column(name="targeturl", type="string", length=250, nullable=false)
     */
    private $targeturl;

    /**
     * @var string
     *
     * @ORM\Column(name="securityguid", type="string", length=45, nullable=false)
     */
    private $securityguid;

    /**
     * @var string|null
     *
     * @ORM\Column(name="criteriajson", type="string", length=250, nullable=true, options={"default"="NULL"})
     */
    private $criteriajson = 'NULL';

    /**
     * @var int|null
     *
     * @ORM\Column(name="includedeterminations", type="integer", nullable=true, options={"default"="1"})
     */
    private $includedeterminations = '1';

    /**
     * @var int|null
     *
     * @ORM\Column(name="includeimages", type="integer", nullable=true, options={"default"="1"})
     */
    private $includeimages = '1';

    /**
     * @var int|null
     *
     * @ORM\Column(name="autoupdate", type="integer", nullable=true, options={"default"="NULL"})
     */
    private $autoupdate = 'NULL';

    /**
     * @var \DateTime|null
     *
     * @ORM\Column(name="lastdateupdate", type="datetime", nullable=true, options={"default"="NULL"})
     */
    private $lastdateupdate = 'NULL';

    /**
     * @var int|null
     *
     * @ORM\Column(name="updateinterval", type="integer", nullable=true, options={"default"="NULL"})
     */
    private $updateinterval = 'NULL';

    /**
     * @var \DateTime|null
     *
     * @ORM\Column(name="initialtimestamp", type="datetime", nullable=true, options={"default"="current_timestamp()"})
     */
    private $initialtimestamp = 'current_timestamp()';

    /**
     * @var \Omcollections
     *
     * @ORM\ManyToOne(targetEntity="Omcollections")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="collid", referencedColumnName="CollID")
     * })
     */
    private $collid;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="Omoccurrences", inversedBy="pubid")
     * @ORM\JoinTable(name="omcollpuboccurlink",
     *   joinColumns={
     *     @ORM\JoinColumn(name="pubid", referencedColumnName="pubid")
     *   },
     *   inverseJoinColumns={
     *     @ORM\JoinColumn(name="occid", referencedColumnName="occid")
     *   }
     * )
     */
    private $occid;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->occid = new \Doctrine\Common\Collections\ArrayCollection();
    }

    public function getPubid(): ?int
    {
        return $this->pubid;
    }

    public function getTargeturl(): ?string
    {
        return $this->targeturl;
    }

    public function setTargeturl(string $targeturl): self
    {
        $this->targeturl = $targeturl;

        return $this;
    }

    public function getSecurityguid(): ?string
    {
        return $this->securityguid;
    }

    public function setSecurityguid(string $securityguid): self
    {
        $this->securityguid = $securityguid;

        return $this;
    }

    public function getCriteriajson(): ?string
    {
        return $this->criteriajson;
    }

    public function setCriteriajson(?string $criteriajson): self
    {
        $this->criteriajson = $criteriajson;

        return $this;
    }

    public function getIncludedeterminations(): ?int
    {
        return $this->includedeterminations;
    }

    public function setIncludedeterminations(?int $includedeterminations): self
    {
        $this->includedeterminations = $includedeterminations;

        return $this;
    }

    public function getIncludeimages(): ?int
    {
        return $this->includeimages;
    }

    public function setIncludeimages(?int $includeimages): self
    {
        $this->includeimages = $includeimages;

        return $this;
    }

    public function getAutoupdate(): ?int
    {
        return $this->autoupdate;
    }

    public function setAutoupdate(?int $autoupdate): self
    {
        $this->autoupdate = $autoupdate;

        return $this;
    }

    public function getLastdateupdate(): ?\DateTimeInterface
    {
        return $this->lastdateupdate;
    }

    public function setLastdateupdate(?\DateTimeInterface $lastdateupdate): self
    {
        $this->lastdateupdate = $lastdateupdate;

        return $this;
    }

    public function getUpdateinterval(): ?int
    {
        return $this->updateinterval;
    }

    public function setUpdateinterval(?int $updateinterval): self
    {
        $this->updateinterval = $updateinterval;

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

    public function getCollid(): ?Omcollections
    {
        return $this->collid;
    }

    public function setCollid(?Omcollections $collid): self
    {
        $this->collid = $collid;

        return $this;
    }

    /**
     * @return Collection|Omoccurrences[]
     */
    public function getOccid(): Collection
    {
        return $this->occid;
    }

    public function addOccid(Omoccurrences $occid): self
    {
        if (!$this->occid->contains($occid)) {
            $this->occid[] = $occid;
        }

        return $this;
    }

    public function removeOccid(Omoccurrences $occid): self
    {
        if ($this->occid->contains($occid)) {
            $this->occid->removeElement($occid);
        }

        return $this;
    }

}
