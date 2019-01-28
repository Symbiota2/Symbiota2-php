<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Kmcs
 *
 * @ORM\Table(name="kmcs", uniqueConstraints={@ORM\UniqueConstraint(name="FK_cidclid_id", columns={"cid", "cs"})}, indexes={@ORM\Index(name="FK_cs_chars", columns={"cid"})})
 * @ORM\Entity(repositoryClass="App\Repository\KmcsRepository")
 */
class Kmcs
{
    /**
     * @var int
     *
     * @ORM\Column(name="kmcsid", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $kmcsid;

    /**
     * @var \Kmcharacters
     *
     * @ORM\ManyToOne(targetEntity="Kmcharacters")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="cid", referencedColumnName="cid")
     * })
     */
    private $cid;

    /**
     * @var string
     *
     * @ORM\Column(name="cs", type="string", length=16, nullable=false)
     */
    private $cs;

    /**
     * @var string|null
     *
     * @ORM\Column(name="CharStateName", type="string", length=255, nullable=true, options={"default"=NULL})
     */
    private $charstatename = 'NULL';

    /**
     * @var bool
     *
     * @ORM\Column(name="Implicit", type="boolean", nullable=false)
     */
    private $implicit;

    /**
     * @var string|null
     *
     * @ORM\Column(name="Notes", type="text", length=0, nullable=true, options={"default"=NULL})
     */
    private $notes = 'NULL';

    /**
     * @var string|null
     *
     * @ORM\Column(name="Description", type="string", length=255, nullable=true, options={"default"=NULL})
     */
    private $description = 'NULL';

    /**
     * @var string|null
     *
     * @ORM\Column(name="IllustrationUrl", type="string", length=250, nullable=true, options={"default"=NULL})
     */
    private $illustrationurl = 'NULL';

    /**
     * @var int|null
     *
     * @ORM\Column(name="StateID", type="integer", nullable=true, options={"default"=NULL,"unsigned"=true})
     */
    private $stateid = 'NULL';

    /**
     * @var int|null
     *
     * @ORM\Column(name="SortSequence", type="integer", nullable=true, options={"default"=NULL,"unsigned"=true})
     */
    private $sortsequence = 'NULL';

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="InitialTimeStamp", type="datetime", nullable=false, options={"default"="CURRENT_TIMESTAMP"})
     */
    private $initialtimestamp = 'CURRENT_TIMESTAMP';

    /**
     * @var string|null
     *
     * @ORM\Column(name="EnteredBy", type="string", length=45, nullable=true, options={"default"=NULL})
     */
    private $enteredby = 'NULL';

    public function getKmcsid(): ?int
    {
        return $this->kmcsid;
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

    public function getCharstatename(): ?string
    {
        return $this->charstatename;
    }

    public function setCharstatename(?string $charstatename): self
    {
        $this->charstatename = $charstatename;

        return $this;
    }

    public function getImplicit(): ?bool
    {
        return $this->implicit;
    }

    public function setImplicit(bool $implicit): self
    {
        $this->implicit = $implicit;

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

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(?string $description): self
    {
        $this->description = $description;

        return $this;
    }

    public function getIllustrationurl(): ?string
    {
        return $this->illustrationurl;
    }

    public function setIllustrationurl(?string $illustrationurl): self
    {
        $this->illustrationurl = $illustrationurl;

        return $this;
    }

    public function getStateid(): ?int
    {
        return $this->stateid;
    }

    public function setStateid(?int $stateid): self
    {
        $this->stateid = $stateid;

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

    public function getEnteredby(): ?string
    {
        return $this->enteredby;
    }

    public function setEnteredby(?string $enteredby): self
    {
        $this->enteredby = $enteredby;

        return $this;
    }

    public function getCid(): ?Kmcharacters
    {
        return $this->cid;
    }

    public function setCid(?Kmcharacters $cid): self
    {
        $this->cid = $cid;

        return $this;
    }


}
