<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * Referenceauthors
 *
 * @ORM\Table(name="referenceauthors", indexes={@ORM\Index(name="INDEX_refauthlastname", columns={"lastname"})})
 * @ORM\Entity(repositoryClass="App\Repository\ReferenceauthorsRepository")
 */
class Referenceauthors
{
    /**
     * @var int
     *
     * @ORM\Column(name="refauthorid", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $refauthorid;

    /**
     * @var string
     *
     * @ORM\Column(name="lastname", type="string", length=100, nullable=false)
     */
    private $lastname;

    /**
     * @var string|null
     *
     * @ORM\Column(name="firstname", type="string", length=100, nullable=true, options={"default"=NULL})
     */
    private $firstname = 'NULL';

    /**
     * @var string|null
     *
     * @ORM\Column(name="middlename", type="string", length=100, nullable=true, options={"default"=NULL})
     */
    private $middlename = 'NULL';

    /**
     * @var int|null
     *
     * @ORM\Column(name="modifieduid", type="integer", nullable=true, options={"default"=NULL,"unsigned"=true})
     */
    private $modifieduid = 'NULL';

    /**
     * @var \DateTime|null
     *
     * @ORM\Column(name="modifiedtimestamp", type="datetime", nullable=true, options={"default"=NULL})
     */
    private $modifiedtimestamp = 'NULL';

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="initialtimestamp", type="datetime", nullable=false, options={"default"="CURRENT_TIMESTAMP"})
     */
    private $initialtimestamp = 'CURRENT_TIMESTAMP';

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="Referenceobject", mappedBy="refauthid")
     */
    private $refid;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->refid = new \Doctrine\Common\Collections\ArrayCollection();
    }

    public function getRefauthorid(): ?int
    {
        return $this->refauthorid;
    }

    public function getLastname(): ?string
    {
        return $this->lastname;
    }

    public function setLastname(string $lastname): self
    {
        $this->lastname = $lastname;

        return $this;
    }

    public function getFirstname(): ?string
    {
        return $this->firstname;
    }

    public function setFirstname(?string $firstname): self
    {
        $this->firstname = $firstname;

        return $this;
    }

    public function getMiddlename(): ?string
    {
        return $this->middlename;
    }

    public function setMiddlename(?string $middlename): self
    {
        $this->middlename = $middlename;

        return $this;
    }

    public function getModifieduid(): ?int
    {
        return $this->modifieduid;
    }

    public function setModifieduid(?int $modifieduid): self
    {
        $this->modifieduid = $modifieduid;

        return $this;
    }

    public function getModifiedtimestamp(): ?\DateTimeInterface
    {
        return $this->modifiedtimestamp;
    }

    public function setModifiedtimestamp(?\DateTimeInterface $modifiedtimestamp): self
    {
        $this->modifiedtimestamp = $modifiedtimestamp;

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
     * @return Collection|Referenceobject[]
     */
    public function getRefid(): Collection
    {
        return $this->refid;
    }

    public function addRefid(Referenceobject $refid): self
    {
        if (!$this->refid->contains($refid)) {
            $this->refid[] = $refid;
            $refid->addRefauthid($this);
        }

        return $this;
    }

    public function removeRefid(Referenceobject $refid): self
    {
        if ($this->refid->contains($refid)) {
            $this->refid->removeElement($refid);
            $refid->removeRefauthid($this);
        }

        return $this;
    }

}
