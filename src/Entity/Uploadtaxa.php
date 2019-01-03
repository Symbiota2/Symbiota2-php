<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Uploadtaxa
 *
 * @ORM\Table(name="uploadtaxa", uniqueConstraints={@ORM\UniqueConstraint(name="UNIQUE_sciname", columns={"SciName", "RankId", "Author", "AcceptedStr"})}, indexes={@ORM\Index(name="sciname_index", columns={"SciName"}), @ORM\Index(name="acceptedStr_index", columns={"AcceptedStr"}), @ORM\Index(name="sourceAcceptedId_index", columns={"SourceAcceptedId"}), @ORM\Index(name="acceptance_index", columns={"Acceptance"}), @ORM\Index(name="parentStr_index", columns={"ParentStr"}), @ORM\Index(name="sourceID_index", columns={"SourceId"}), @ORM\Index(name="sourceParentId_index", columns={"SourceParentId"}), @ORM\Index(name="scinameinput_index", columns={"scinameinput"}), @ORM\Index(name="unitname1_index", columns={"UnitName1"})})
 * @ORM\Entity(repositoryClass="App\Repository\UploadtaxaRepository")
 */
class Uploadtaxa
{
    /**
     * @var int
     *
     * @ORM\Column(name="uptid", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $uptid;

    /**
     * @var int|null
     *
     * @ORM\Column(name="TID", type="integer", nullable=true, options={"default"=NULL,"unsigned"=true})
     */
    private $tid = 'NULL';

    /**
     * @var int|null
     *
     * @ORM\Column(name="SourceId", type="integer", nullable=true, options={"default"=NULL,"unsigned"=true})
     */
    private $sourceid = 'NULL';

    /**
     * @var string|null
     *
     * @ORM\Column(name="Family", type="string", length=50, nullable=true, options={"default"=NULL})
     */
    private $family = 'NULL';

    /**
     * @var int|null
     *
     * @ORM\Column(name="RankId", type="smallint", nullable=true, options={"default"=NULL})
     */
    private $rankid = 'NULL';

    /**
     * @var string|null
     *
     * @ORM\Column(name="RankName", type="string", length=45, nullable=true, options={"default"=NULL})
     */
    private $rankname = 'NULL';

    /**
     * @var string
     *
     * @ORM\Column(name="scinameinput", type="string", length=250, nullable=false)
     */
    private $scinameinput;

    /**
     * @var string|null
     *
     * @ORM\Column(name="SciName", type="string", length=250, nullable=true, options={"default"=NULL})
     */
    private $sciname = 'NULL';

    /**
     * @var string|null
     *
     * @ORM\Column(name="UnitInd1", type="string", length=1, nullable=true, options={"default"=NULL})
     */
    private $unitind1 = 'NULL';

    /**
     * @var string|null
     *
     * @ORM\Column(name="UnitName1", type="string", length=50, nullable=true, options={"default"=NULL})
     */
    private $unitname1 = 'NULL';

    /**
     * @var string|null
     *
     * @ORM\Column(name="UnitInd2", type="string", length=1, nullable=true, options={"default"=NULL})
     */
    private $unitind2 = 'NULL';

    /**
     * @var string|null
     *
     * @ORM\Column(name="UnitName2", type="string", length=50, nullable=true, options={"default"=NULL})
     */
    private $unitname2 = 'NULL';

    /**
     * @var string|null
     *
     * @ORM\Column(name="UnitInd3", type="string", length=7, nullable=true, options={"default"=NULL})
     */
    private $unitind3 = 'NULL';

    /**
     * @var string|null
     *
     * @ORM\Column(name="UnitName3", type="string", length=35, nullable=true, options={"default"=NULL})
     */
    private $unitname3 = 'NULL';

    /**
     * @var string|null
     *
     * @ORM\Column(name="Author", type="string", length=100, nullable=true, options={"default"=NULL})
     */
    private $author = 'NULL';

    /**
     * @var string|null
     *
     * @ORM\Column(name="InfraAuthor", type="string", length=100, nullable=true, options={"default"=NULL})
     */
    private $infraauthor = 'NULL';

    /**
     * @var int|null
     *
     * @ORM\Column(name="Acceptance", type="integer", nullable=true, options={"default"="1","unsigned"=true,"comment"="0 = not accepted; 1 = accepted"})
     */
    private $acceptance = '1';

    /**
     * @var int|null
     *
     * @ORM\Column(name="TidAccepted", type="integer", nullable=true, options={"default"=NULL,"unsigned"=true})
     */
    private $tidaccepted = 'NULL';

    /**
     * @var string|null
     *
     * @ORM\Column(name="AcceptedStr", type="string", length=250, nullable=true, options={"default"=NULL})
     */
    private $acceptedstr = 'NULL';

    /**
     * @var int|null
     *
     * @ORM\Column(name="SourceAcceptedId", type="integer", nullable=true, options={"default"=NULL,"unsigned"=true})
     */
    private $sourceacceptedid = 'NULL';

    /**
     * @var string|null
     *
     * @ORM\Column(name="UnacceptabilityReason", type="string", length=24, nullable=true, options={"default"=NULL})
     */
    private $unacceptabilityreason = 'NULL';

    /**
     * @var int|null
     *
     * @ORM\Column(name="ParentTid", type="integer", nullable=true, options={"default"=NULL})
     */
    private $parenttid = 'NULL';

    /**
     * @var string|null
     *
     * @ORM\Column(name="ParentStr", type="string", length=250, nullable=true, options={"default"=NULL})
     */
    private $parentstr = 'NULL';

    /**
     * @var int|null
     *
     * @ORM\Column(name="SourceParentId", type="integer", nullable=true, options={"default"=NULL,"unsigned"=true})
     */
    private $sourceparentid = 'NULL';

    /**
     * @var int
     *
     * @ORM\Column(name="SecurityStatus", type="integer", nullable=false, options={"unsigned"=true,"comment"="0 = no security; 1 = hidden locality"})
     */
    private $securitystatus;

    /**
     * @var string|null
     *
     * @ORM\Column(name="Source", type="string", length=250, nullable=true, options={"default"=NULL})
     */
    private $source = 'NULL';

    /**
     * @var string|null
     *
     * @ORM\Column(name="Notes", type="string", length=250, nullable=true, options={"default"=NULL})
     */
    private $notes = 'NULL';

    /**
     * @var string|null
     *
     * @ORM\Column(name="vernacular", type="string", length=250, nullable=true, options={"default"=NULL})
     */
    private $vernacular = 'NULL';

    /**
     * @var string|null
     *
     * @ORM\Column(name="vernlang", type="string", length=15, nullable=true, options={"default"=NULL})
     */
    private $vernlang = 'NULL';

    /**
     * @var string|null
     *
     * @ORM\Column(name="Hybrid", type="string", length=50, nullable=true, options={"default"=NULL})
     */
    private $hybrid = 'NULL';

    /**
     * @var string|null
     *
     * @ORM\Column(name="ErrorStatus", type="string", length=150, nullable=true, options={"default"=NULL})
     */
    private $errorstatus = 'NULL';

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="InitialTimeStamp", type="datetime", nullable=false, options={"default"="CURRENT_TIMESTAMP"})
     */
    private $initialtimestamp = 'CURRENT_TIMESTAMP';

    public function getUptid(): ?int
    {
        return $this->uptid;
    }

    public function getTid(): ?int
    {
        return $this->tid;
    }

    public function setTid(?int $tid): self
    {
        $this->tid = $tid;

        return $this;
    }

    public function getSourceid(): ?int
    {
        return $this->sourceid;
    }

    public function setSourceid(?int $sourceid): self
    {
        $this->sourceid = $sourceid;

        return $this;
    }

    public function getFamily(): ?string
    {
        return $this->family;
    }

    public function setFamily(?string $family): self
    {
        $this->family = $family;

        return $this;
    }

    public function getRankid(): ?int
    {
        return $this->rankid;
    }

    public function setRankid(?int $rankid): self
    {
        $this->rankid = $rankid;

        return $this;
    }

    public function getRankname(): ?string
    {
        return $this->rankname;
    }

    public function setRankname(?string $rankname): self
    {
        $this->rankname = $rankname;

        return $this;
    }

    public function getScinameinput(): ?string
    {
        return $this->scinameinput;
    }

    public function setScinameinput(string $scinameinput): self
    {
        $this->scinameinput = $scinameinput;

        return $this;
    }

    public function getSciname(): ?string
    {
        return $this->sciname;
    }

    public function setSciname(?string $sciname): self
    {
        $this->sciname = $sciname;

        return $this;
    }

    public function getUnitind1(): ?string
    {
        return $this->unitind1;
    }

    public function setUnitind1(?string $unitind1): self
    {
        $this->unitind1 = $unitind1;

        return $this;
    }

    public function getUnitname1(): ?string
    {
        return $this->unitname1;
    }

    public function setUnitname1(?string $unitname1): self
    {
        $this->unitname1 = $unitname1;

        return $this;
    }

    public function getUnitind2(): ?string
    {
        return $this->unitind2;
    }

    public function setUnitind2(?string $unitind2): self
    {
        $this->unitind2 = $unitind2;

        return $this;
    }

    public function getUnitname2(): ?string
    {
        return $this->unitname2;
    }

    public function setUnitname2(?string $unitname2): self
    {
        $this->unitname2 = $unitname2;

        return $this;
    }

    public function getUnitind3(): ?string
    {
        return $this->unitind3;
    }

    public function setUnitind3(?string $unitind3): self
    {
        $this->unitind3 = $unitind3;

        return $this;
    }

    public function getUnitname3(): ?string
    {
        return $this->unitname3;
    }

    public function setUnitname3(?string $unitname3): self
    {
        $this->unitname3 = $unitname3;

        return $this;
    }

    public function getAuthor(): ?string
    {
        return $this->author;
    }

    public function setAuthor(?string $author): self
    {
        $this->author = $author;

        return $this;
    }

    public function getInfraauthor(): ?string
    {
        return $this->infraauthor;
    }

    public function setInfraauthor(?string $infraauthor): self
    {
        $this->infraauthor = $infraauthor;

        return $this;
    }

    public function getAcceptance(): ?int
    {
        return $this->acceptance;
    }

    public function setAcceptance(?int $acceptance): self
    {
        $this->acceptance = $acceptance;

        return $this;
    }

    public function getTidaccepted(): ?int
    {
        return $this->tidaccepted;
    }

    public function setTidaccepted(?int $tidaccepted): self
    {
        $this->tidaccepted = $tidaccepted;

        return $this;
    }

    public function getAcceptedstr(): ?string
    {
        return $this->acceptedstr;
    }

    public function setAcceptedstr(?string $acceptedstr): self
    {
        $this->acceptedstr = $acceptedstr;

        return $this;
    }

    public function getSourceacceptedid(): ?int
    {
        return $this->sourceacceptedid;
    }

    public function setSourceacceptedid(?int $sourceacceptedid): self
    {
        $this->sourceacceptedid = $sourceacceptedid;

        return $this;
    }

    public function getUnacceptabilityreason(): ?string
    {
        return $this->unacceptabilityreason;
    }

    public function setUnacceptabilityreason(?string $unacceptabilityreason): self
    {
        $this->unacceptabilityreason = $unacceptabilityreason;

        return $this;
    }

    public function getParenttid(): ?int
    {
        return $this->parenttid;
    }

    public function setParenttid(?int $parenttid): self
    {
        $this->parenttid = $parenttid;

        return $this;
    }

    public function getParentstr(): ?string
    {
        return $this->parentstr;
    }

    public function setParentstr(?string $parentstr): self
    {
        $this->parentstr = $parentstr;

        return $this;
    }

    public function getSourceparentid(): ?int
    {
        return $this->sourceparentid;
    }

    public function setSourceparentid(?int $sourceparentid): self
    {
        $this->sourceparentid = $sourceparentid;

        return $this;
    }

    public function getSecuritystatus(): ?int
    {
        return $this->securitystatus;
    }

    public function setSecuritystatus(int $securitystatus): self
    {
        $this->securitystatus = $securitystatus;

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

    public function getNotes(): ?string
    {
        return $this->notes;
    }

    public function setNotes(?string $notes): self
    {
        $this->notes = $notes;

        return $this;
    }

    public function getVernacular(): ?string
    {
        return $this->vernacular;
    }

    public function setVernacular(?string $vernacular): self
    {
        $this->vernacular = $vernacular;

        return $this;
    }

    public function getVernlang(): ?string
    {
        return $this->vernlang;
    }

    public function setVernlang(?string $vernlang): self
    {
        $this->vernlang = $vernlang;

        return $this;
    }

    public function getHybrid(): ?string
    {
        return $this->hybrid;
    }

    public function setHybrid(?string $hybrid): self
    {
        $this->hybrid = $hybrid;

        return $this;
    }

    public function getErrorstatus(): ?string
    {
        return $this->errorstatus;
    }

    public function setErrorstatus(?string $errorstatus): self
    {
        $this->errorstatus = $errorstatus;

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
