<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * Taxauthority
 *
 * @ORM\Table(name="taxauthority")
 * @ORM\Entity(repositoryClass="App\Repository\TaxauthorityRepository")
 */
class Taxauthority
{
    /**
     * @var int
     *
     * @ORM\Column(name="taxauthid", type="integer", nullable=false, options={"unsigned"=true})
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $taxauthid;

    /**
     * @var int
     *
     * @ORM\Column(name="isprimary", type="integer", nullable=false, options={"unsigned"=true})
     */
    private $isprimary;

    /**
     * @var string
     *
     * @ORM\Column(name="name", type="string", length=45, nullable=false)
     */
    private $name;

    /**
     * @var string|null
     *
     * @ORM\Column(name="description", type="string", length=250, nullable=true, options={"default"="NULL"})
     */
    private $description = 'NULL';

    /**
     * @var string|null
     *
     * @ORM\Column(name="editors", type="string", length=150, nullable=true, options={"default"="NULL"})
     */
    private $editors = 'NULL';

    /**
     * @var string|null
     *
     * @ORM\Column(name="contact", type="string", length=45, nullable=true, options={"default"="NULL"})
     */
    private $contact = 'NULL';

    /**
     * @var string|null
     *
     * @ORM\Column(name="email", type="string", length=100, nullable=true, options={"default"="NULL"})
     */
    private $email = 'NULL';

    /**
     * @var string|null
     *
     * @ORM\Column(name="url", type="string", length=150, nullable=true, options={"default"="NULL"})
     */
    private $url = 'NULL';

    /**
     * @var string|null
     *
     * @ORM\Column(name="notes", type="string", length=250, nullable=true, options={"default"="NULL"})
     */
    private $notes = 'NULL';

    /**
     * @var int
     *
     * @ORM\Column(name="isactive", type="integer", nullable=false, options={"default"="1","unsigned"=true})
     */
    private $isactive = '1';

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="initialtimestamp", type="datetime", nullable=false, options={"default"="current_timestamp()"})
     */
    private $initialtimestamp = 'current_timestamp()';

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="Taxa", mappedBy="taxauthid")
     */
    private $tid;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->tid = new \Doctrine\Common\Collections\ArrayCollection();
    }

    public function getTaxauthid(): ?int
    {
        return $this->taxauthid;
    }

    public function getIsprimary(): ?int
    {
        return $this->isprimary;
    }

    public function setIsprimary(int $isprimary): self
    {
        $this->isprimary = $isprimary;

        return $this;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): self
    {
        $this->name = $name;

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

    public function getEditors(): ?string
    {
        return $this->editors;
    }

    public function setEditors(?string $editors): self
    {
        $this->editors = $editors;

        return $this;
    }

    public function getContact(): ?string
    {
        return $this->contact;
    }

    public function setContact(?string $contact): self
    {
        $this->contact = $contact;

        return $this;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(?string $email): self
    {
        $this->email = $email;

        return $this;
    }

    public function getUrl(): ?string
    {
        return $this->url;
    }

    public function setUrl(?string $url): self
    {
        $this->url = $url;

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

    public function getIsactive(): ?int
    {
        return $this->isactive;
    }

    public function setIsactive(int $isactive): self
    {
        $this->isactive = $isactive;

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
     * @return Collection|Taxa[]
     */
    public function getTid(): Collection
    {
        return $this->tid;
    }

    public function addTid(Taxa $tid): self
    {
        if (!$this->tid->contains($tid)) {
            $this->tid[] = $tid;
            $tid->addTaxauthid($this);
        }

        return $this;
    }

    public function removeTid(Taxa $tid): self
    {
        if ($this->tid->contains($tid)) {
            $this->tid->removeElement($tid);
            $tid->removeTaxauthid($this);
        }

        return $this;
    }

}
