<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Omcrowdsourcecentral
 *
 * @ORM\Table(name="omcrowdsourcecentral", uniqueConstraints={@ORM\UniqueConstraint(name="Index_omcrowdsourcecentral_collid", columns={"collid"})})
 * @ORM\Entity(repositoryClass="App\Repository\OmcrowdsourcecentralRepository")
 */
class Omcrowdsourcecentral
{
    /**
     * @var int
     *
     * @ORM\Column(name="omcsid", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $omcsid;

    /**
     * @var string|null
     *
     * @ORM\Column(name="instructions", type="text", length=65535, nullable=true, options={"default"=NULL})
     */
    private $instructions = 'NULL';

    /**
     * @var string|null
     *
     * @ORM\Column(name="trainingurl", type="string", length=500, nullable=true, options={"default"=NULL})
     */
    private $trainingurl = 'NULL';

    /**
     * @var int
     *
     * @ORM\Column(name="editorlevel", type="integer", nullable=false, options={"comment"="0=public, 1=public limited, 2=private"})
     */
    private $editorlevel;

    /**
     * @var string|null
     *
     * @ORM\Column(name="notes", type="string", length=250, nullable=true, options={"default"=NULL})
     */
    private $notes = 'NULL';

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="initialtimestamp", type="datetime", nullable=false, options={"default"="CURRENT_TIMESTAMP"})
     */
    private $initialtimestamp = 'CURRENT_TIMESTAMP';

    /**
     * @var \Omcollections
     *
     * @ORM\ManyToOne(targetEntity="Omcollections")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="collid", referencedColumnName="CollID")
     * })
     */
    private $collid;

    public function getOmcsid(): ?int
    {
        return $this->omcsid;
    }

    public function getInstructions(): ?string
    {
        return $this->instructions;
    }

    public function setInstructions(?string $instructions): self
    {
        $this->instructions = $instructions;

        return $this;
    }

    public function getTrainingurl(): ?string
    {
        return $this->trainingurl;
    }

    public function setTrainingurl(?string $trainingurl): self
    {
        $this->trainingurl = $trainingurl;

        return $this;
    }

    public function getEditorlevel(): ?int
    {
        return $this->editorlevel;
    }

    public function setEditorlevel(int $editorlevel): self
    {
        $this->editorlevel = $editorlevel;

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

    public function getInitialtimestamp(): ?\DateTimeInterface
    {
        return $this->initialtimestamp;
    }

    public function setInitialtimestamp(\DateTimeInterface $initialtimestamp): self
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


}
