<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Chotomouskey
 *
 * @ORM\Table(name="chotomouskey", indexes={@ORM\Index(name="FK_chotomouskey_taxa", columns={"tid"})})
 * @ORM\Entity(repositoryClass="App\Repository\ChotomouskeyRepository")
 */
class Chotomouskey
{
    /**
     * @var int
     *
     * @ORM\Column(name="stmtid", type="integer", nullable=false, options={"unsigned"=true})
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $stmtid;

    /**
     * @var string
     *
     * @ORM\Column(name="statement", type="string", length=300, nullable=false)
     */
    private $statement;

    /**
     * @var int
     *
     * @ORM\Column(name="nodeid", type="integer", nullable=false, options={"unsigned"=true})
     */
    private $nodeid;

    /**
     * @var int
     *
     * @ORM\Column(name="parentid", type="integer", nullable=false, options={"unsigned"=true})
     */
    private $parentid;

    /**
     * @var string|null
     *
     * @ORM\Column(name="notes", type="string", length=250, nullable=true, options={"default"="NULL"})
     */
    private $notes = 'NULL';

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="initialtimestamp", type="datetime", nullable=false, options={"default"="current_timestamp()"})
     */
    private $initialtimestamp = 'current_timestamp()';

    /**
     * @var \Taxa
     *
     * @ORM\ManyToOne(targetEntity="Taxa")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="tid", referencedColumnName="TID")
     * })
     */
    private $tid;

    public function getStmtid(): ?int
    {
        return $this->stmtid;
    }

    public function getStatement(): ?string
    {
        return $this->statement;
    }

    public function setStatement(string $statement): self
    {
        $this->statement = $statement;

        return $this;
    }

    public function getNodeid(): ?int
    {
        return $this->nodeid;
    }

    public function setNodeid(int $nodeid): self
    {
        $this->nodeid = $nodeid;

        return $this;
    }

    public function getParentid(): ?int
    {
        return $this->parentid;
    }

    public function setParentid(int $parentid): self
    {
        $this->parentid = $parentid;

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

    public function getTid(): ?Taxa
    {
        return $this->tid;
    }

    public function setTid(?Taxa $tid): self
    {
        $this->tid = $tid;

        return $this;
    }


}
