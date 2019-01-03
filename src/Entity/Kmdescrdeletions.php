<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Kmdescrdeletions
 *
 * @ORM\Table(name="kmdescrdeletions")
 * @ORM\Entity(repositoryClass="App\Repository\KmdescrdeletionsRepository")
 */
class Kmdescrdeletions
{
    /**
     * @var int
     *
     * @ORM\Column(name="TID", type="integer", nullable=false, options={"unsigned"=true})
     */
    private $tid;

    /**
     * @var int
     *
     * @ORM\Column(name="CID", type="integer", nullable=false, options={"unsigned"=true})
     */
    private $cid;

    /**
     * @var string
     *
     * @ORM\Column(name="CS", type="string", length=16, nullable=false)
     */
    private $cs;

    /**
     * @var string|null
     *
     * @ORM\Column(name="Modifier", type="string", length=255, nullable=true, options={"default"=NULL})
     */
    private $modifier = 'NULL';

    /**
     * @var float|null
     *
     * @ORM\Column(name="X", type="float", precision=15, scale=5, nullable=true, options={"default"=NULL})
     */
    private $x = 'NULL';

    /**
     * @var string|null
     *
     * @ORM\Column(name="TXT", type="text", length=0, nullable=true, options={"default"=NULL})
     */
    private $txt = 'NULL';

    /**
     * @var string|null
     *
     * @ORM\Column(name="Inherited", type="string", length=50, nullable=true, options={"default"=NULL})
     */
    private $inherited = 'NULL';

    /**
     * @var string|null
     *
     * @ORM\Column(name="Source", type="string", length=100, nullable=true, options={"default"=NULL})
     */
    private $source = 'NULL';

    /**
     * @var int|null
     *
     * @ORM\Column(name="Seq", type="integer", nullable=true, options={"default"=NULL,"unsigned"=true})
     */
    private $seq = 'NULL';

    /**
     * @var string|null
     *
     * @ORM\Column(name="Notes", type="text", length=0, nullable=true, options={"default"=NULL})
     */
    private $notes = 'NULL';

    /**
     * @var \DateTime|null
     *
     * @ORM\Column(name="InitialTimeStamp", type="datetime", nullable=true, options={"default"=NULL})
     */
    private $initialtimestamp = 'NULL';

    /**
     * @var string
     *
     * @ORM\Column(name="DeletedBy", type="string", length=100, nullable=false)
     */
    private $deletedby;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="DeletedTimeStamp", type="datetime", nullable=false, options={"default"="CURRENT_TIMESTAMP"})
     */
    private $deletedtimestamp = 'CURRENT_TIMESTAMP';

    /**
     * @var int
     *
     * @ORM\Column(name="PK", type="integer", nullable=false, options={"unsigned"=true})
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $pk;

    public function getTid(): ?int
    {
        return $this->tid;
    }

    public function setTid(int $tid): self
    {
        $this->tid = $tid;

        return $this;
    }

    public function getCid(): ?int
    {
        return $this->cid;
    }

    public function setCid(int $cid): self
    {
        $this->cid = $cid;

        return $this;
    }

    public function getCs(): ?string
    {
        return $this->cs;
    }

    public function setCs(string $cs): self
    {
        $this->cs = $cs;

        return $this;
    }

    public function getModifier(): ?string
    {
        return $this->modifier;
    }

    public function setModifier(?string $modifier): self
    {
        $this->modifier = $modifier;

        return $this;
    }

    public function getX(): ?float
    {
        return $this->x;
    }

    public function setX(?float $x): self
    {
        $this->x = $x;

        return $this;
    }

    public function getTxt(): ?string
    {
        return $this->txt;
    }

    public function setTxt(?string $txt): self
    {
        $this->txt = $txt;

        return $this;
    }

    public function getInherited(): ?string
    {
        return $this->inherited;
    }

    public function setInherited(?string $inherited): self
    {
        $this->inherited = $inherited;

        return $this;
    }

    public function getSource(): ?string
    {
        return $this->source;
    }

    public function setSource(?string $source): self
    {
        $this->source = $source;

        return $this;
    }

    public function getSeq(): ?int
    {
        return $this->seq;
    }

    public function setSeq(?int $seq): self
    {
        $this->seq = $seq;

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

    public function setInitialtimestamp(?\DateTimeInterface $initialtimestamp): self
    {
        $this->initialtimestamp = $initialtimestamp;

        return $this;
    }

    public function getDeletedby(): ?string
    {
        return $this->deletedby;
    }

    public function setDeletedby(string $deletedby): self
    {
        $this->deletedby = $deletedby;

        return $this;
    }

    public function getDeletedtimestamp(): ?\DateTimeInterface
    {
        return $this->deletedtimestamp;
    }

    public function setDeletedtimestamp(\DateTimeInterface $deletedtimestamp): self
    {
        $this->deletedtimestamp = $deletedtimestamp;

        return $this;
    }

    public function getPk(): ?int
    {
        return $this->pk;
    }


}
