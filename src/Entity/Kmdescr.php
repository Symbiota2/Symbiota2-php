<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Kmdescr
 *
 * @ORM\Table(name="kmdescr", indexes={@ORM\Index(name="CSDescr", columns={"CID", "CS"}), @ORM\Index(name="IDX_6691F324C4FE2EBB", columns={"tid"})})
 * @ORM\Entity(repositoryClass="App\Repository\KmdescrRepository")
 */
class Kmdescr
{
    /**
     * @var \Taxa
     *
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     * @ORM\OneToOne(targetEntity="Taxa")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="tid", referencedColumnName="TID")
     * })
     */
    private $tid;

    /**
     * @var int
     *
     * @ORM\Column(name="CID", type="integer", nullable=false, options={"unsigned"=true})
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     */
    private $cid;

    /**
     * @var string|null
     *
     * @ORM\Column(name="Modifier", type="string", length=255, nullable=true, options={"default"=NULL})
     */
    private $modifier = 'NULL';

    /**
     * @var string
     *
     * @ORM\Column(name="CS", type="string", length=16, nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     */
    private $cs;

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
     * @var int|null
     *
     * @ORM\Column(name="PseudoTrait", type="integer", nullable=true, options={"default"=NULL,"unsigned"=true})
     */
    private $pseudotrait = 'NULL';

    /**
     * @var int
     *
     * @ORM\Column(name="Frequency", type="integer", nullable=false, options={"default"="5","unsigned"=true,"comment"="Frequency of occurrence; 1 = rare... 5 = common"})
     */
    private $frequency = '5';

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
     * @ORM\Column(name="Seq", type="integer", nullable=true, options={"default"=NULL})
     */
    private $seq = 'NULL';

    /**
     * @var string|null
     *
     * @ORM\Column(name="Notes", type="text", length=0, nullable=true, options={"default"=NULL})
     */
    private $notes = 'NULL';

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="DateEntered", type="datetime", nullable=false, options={"default"="CURRENT_TIMESTAMP"})
     */
    private $dateentered = 'CURRENT_TIMESTAMP';

    public function getCid(): ?int
    {
        return $this->cid;
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

    public function getCs(): ?string
    {
        return $this->cs;
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

    public function getPseudotrait(): ?int
    {
        return $this->pseudotrait;
    }

    public function setPseudotrait(?int $pseudotrait): self
    {
        $this->pseudotrait = $pseudotrait;

        return $this;
    }

    public function getFrequency(): ?int
    {
        return $this->frequency;
    }

    public function setFrequency(int $frequency): self
    {
        $this->frequency = $frequency;

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

    public function getDateentered(): ?\DateTimeInterface
    {
        return $this->dateentered;
    }

    public function setDateentered(\DateTimeInterface $dateentered): self
    {
        $this->dateentered = $dateentered;

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
