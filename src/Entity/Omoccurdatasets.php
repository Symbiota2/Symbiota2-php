<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Omoccurdatasets
 *
 * @ORM\Table(name="omoccurdatasets", indexes={@ORM\Index(name="FK_omcollections_collid_idx", columns={"collid"}), @ORM\Index(name="FK_omoccurdatasets_uid_idx", columns={"createduid"})})
 * @ORM\Entity(repositoryClass="App\Repository\OmoccurdatasetsRepository")
 */
class Omoccurdatasets
{
    /**
     * @var int
     *
     * @ORM\Column(name="datasetid", type="integer", nullable=false, options={"unsigned"=true})
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $datasetid;

    /**
     * @var string
     *
     * @ORM\Column(name="name", type="string", length=100, nullable=false)
     */
    private $name;

    /**
     * @var string|null
     *
     * @ORM\Column(name="notes", type="string", length=250, nullable=true, options={"default"=NULL})
     */
    private $notes = 'NULL';

    /**
     * @var int|null
     *
     * @ORM\Column(name="sortsequence", type="integer", nullable=true, options={"default"=NULL})
     */
    private $sortsequence = 'NULL';

    /**
     * @var \Users
     *
     * @ORM\ManyToOne(targetEntity="Users")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="createduid", referencedColumnName="uid")
     * })
     */
    private $createduid;

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
     * @var \DateTime
     *
     * @ORM\Column(name="initialtimestamp", type="datetime", nullable=false, options={"default"="CURRENT_TIMESTAMP"})
     */
    private $initialtimestamp = 'CURRENT_TIMESTAMP';

    public function getDatasetid(): ?int
    {
        return $this->datasetid;
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

    public function getNotes(): ?string
    {
        return $this->notes;
    }

    public function setNotes(?string $notes): self
    {
        $this->notes = $notes;

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

    public function getCreateduid(): ?Users
    {
        return $this->createduid;
    }

    public function setCreateduid(?Users $createduid): self
    {
        $this->createduid = $createduid;

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
