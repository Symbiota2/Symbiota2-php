<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Taxonunits
 *
 * @ORM\Table(name="taxonunits", uniqueConstraints={@ORM\UniqueConstraint(name="UNIQUE_taxonunits", columns={"kingdomName", "rankid"})})
 * @ORM\Entity(repositoryClass="App\Repository\TaxonunitsRepository")
 */
class Taxonunits
{
    /**
     * @var int
     *
     * @ORM\Column(name="taxonunitid", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $taxonunitid;

    /**
     * @var string
     *
     * @ORM\Column(name="kingdomName", type="string", length=45, nullable=false, options={"default"="'Organism'"})
     */
    private $kingdomname = 'Organism';

    /**
     * @var int
     *
     * @ORM\Column(name="rankid", type="smallint", nullable=false, options={"unsigned"=true})
     */
    private $rankid;

    /**
     * @var string
     *
     * @ORM\Column(name="rankname", type="string", length=15, nullable=false)
     */
    private $rankname;

    /**
     * @var string|null
     *
     * @ORM\Column(name="suffix", type="string", length=45, nullable=true, options={"default"="NULL"})
     */
    private $suffix = 'NULL';

    /**
     * @var int
     *
     * @ORM\Column(name="dirparentrankid", type="smallint", nullable=false)
     */
    private $dirparentrankid;

    /**
     * @var int|null
     *
     * @ORM\Column(name="reqparentrankid", type="smallint", nullable=true, options={"default"="NULL"})
     */
    private $reqparentrankid = 'NULL';

    /**
     * @var string|null
     *
     * @ORM\Column(name="modifiedby", type="string", length=45, nullable=true, options={"default"="NULL"})
     */
    private $modifiedby = 'NULL';

    /**
     * @var \DateTime|null
     *
     * @ORM\Column(name="modifiedtimestamp", type="datetime", nullable=true, options={"default"="NULL"})
     */
    private $modifiedtimestamp = 'NULL';

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="initialtimestamp", type="datetime", nullable=false, options={"default"="current_timestamp()"})
     */
    private $initialtimestamp = 'current_timestamp()';

    public function getTaxonunitid(): ?int
    {
        return $this->taxonunitid;
    }

    public function getKingdomname(): ?string
    {
        return $this->kingdomname;
    }

    public function setKingdomname(string $kingdomname): self
    {
        $this->kingdomname = $kingdomname;

        return $this;
    }

    public function getRankid(): ?int
    {
        return $this->rankid;
    }

    public function setRankid(int $rankid): self
    {
        $this->rankid = $rankid;

        return $this;
    }

    public function getRankname(): ?string
    {
        return $this->rankname;
    }

    public function setRankname(string $rankname): self
    {
        $this->rankname = $rankname;

        return $this;
    }

    public function getSuffix(): ?string
    {
        return $this->suffix;
    }

    public function setSuffix(?string $suffix): self
    {
        $this->suffix = $suffix;

        return $this;
    }

    public function getDirparentrankid(): ?int
    {
        return $this->dirparentrankid;
    }

    public function setDirparentrankid(int $dirparentrankid): self
    {
        $this->dirparentrankid = $dirparentrankid;

        return $this;
    }

    public function getReqparentrankid(): ?int
    {
        return $this->reqparentrankid;
    }

    public function setReqparentrankid(?int $reqparentrankid): self
    {
        $this->reqparentrankid = $reqparentrankid;

        return $this;
    }

    public function getModifiedby(): ?string
    {
        return $this->modifiedby;
    }

    public function setModifiedby(?string $modifiedby): self
    {
        $this->modifiedby = $modifiedby;

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


}
