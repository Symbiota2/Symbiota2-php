<?php

namespace App\Entities;

use Doctrine\ORM\Mapping as ORM;

/**
 * Uploadtaxa
 *
 * @ORM\Table(name="uploadtaxa", uniqueConstraints={@ORM\UniqueConstraint(name="UNIQUE_sciname", columns={"SciName", "RankId", "Author", "AcceptedStr"})}, indexes={@ORM\Index(name="sourceID_index", columns={"SourceId"}), @ORM\Index(name="sourceAcceptedId_index", columns={"SourceAcceptedId"}), @ORM\Index(name="sciname_index", columns={"SciName"}), @ORM\Index(name="scinameinput_index", columns={"scinameinput"}), @ORM\Index(name="parentStr_index", columns={"ParentStr"}), @ORM\Index(name="acceptedStr_index", columns={"AcceptedStr"}), @ORM\Index(name="unitname1_index", columns={"UnitName1"}), @ORM\Index(name="sourceParentId_index", columns={"SourceParentId"}), @ORM\Index(name="acceptance_index", columns={"Acceptance"})})
 * @ORM\Entity
 */
class Uploadtaxa
{
    /**
     * @var int
     *
     * @ORM\Column(name="uptid", type="integer", precision=0, scale=0, nullable=false, unique=true)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $uptid;

    /**
     * @var int|null
     *
     * @ORM\Column(name="tid", type="integer", precision=0, scale=0, nullable=true, options={"unsigned"=true}, unique=false)
     */
    private $tid;

    /**
     * @var int|null
     *
     * @ORM\Column(name="SourceId", type="integer", precision=0, scale=0, nullable=true, options={"unsigned"=true}, unique=false)
     */
    private $sourceid;

    /**
     * @var string|null
     *
     * @ORM\Column(name="Family", type="string", length=50, precision=0, scale=0, nullable=true, unique=false)
     */
    private $family;

    /**
     * @var int|null
     *
     * @ORM\Column(name="RankId", type="smallint", precision=0, scale=0, nullable=true, unique=false)
     */
    private $rankid;

    /**
     * @var string|null
     *
     * @ORM\Column(name="RankName", type="string", length=45, precision=0, scale=0, nullable=true, unique=false)
     */
    private $rankname;

    /**
     * @var string
     *
     * @ORM\Column(name="scinameinput", type="string", length=250, precision=0, scale=0, nullable=false, unique=false)
     */
    private $scinameinput;

    /**
     * @var string|null
     *
     * @ORM\Column(name="SciName", type="string", length=250, precision=0, scale=0, nullable=true, unique=false)
     */
    private $sciname;

    /**
     * @var string|null
     *
     * @ORM\Column(name="UnitInd1", type="string", length=1, precision=0, scale=0, nullable=true, unique=false)
     */
    private $unitind1;

    /**
     * @var string|null
     *
     * @ORM\Column(name="UnitName1", type="string", length=50, precision=0, scale=0, nullable=true, unique=false)
     */
    private $unitname1;

    /**
     * @var string|null
     *
     * @ORM\Column(name="UnitInd2", type="string", length=1, precision=0, scale=0, nullable=true, unique=false)
     */
    private $unitind2;

    /**
     * @var string|null
     *
     * @ORM\Column(name="UnitName2", type="string", length=50, precision=0, scale=0, nullable=true, unique=false)
     */
    private $unitname2;

    /**
     * @var string|null
     *
     * @ORM\Column(name="UnitInd3", type="string", length=7, precision=0, scale=0, nullable=true, unique=false)
     */
    private $unitind3;

    /**
     * @var string|null
     *
     * @ORM\Column(name="UnitName3", type="string", length=35, precision=0, scale=0, nullable=true, unique=false)
     */
    private $unitname3;

    /**
     * @var string|null
     *
     * @ORM\Column(name="Author", type="string", length=100, precision=0, scale=0, nullable=true, unique=false)
     */
    private $author;

    /**
     * @var string|null
     *
     * @ORM\Column(name="InfraAuthor", type="string", length=100, precision=0, scale=0, nullable=true, unique=false)
     */
    private $infraauthor;

    /**
     * @var int|null
     *
     * @ORM\Column(name="Acceptance", type="integer", precision=0, scale=0, nullable=true, options={"default"="1","unsigned"=true,"comment"="0 = not accepted; 1 = accepted"}, unique=false)
     */
    private $acceptance = '1';

    /**
     * @var int|null
     *
     * @ORM\Column(name="TidAccepted", type="integer", precision=0, scale=0, nullable=true, options={"unsigned"=true}, unique=false)
     */
    private $tidaccepted;

    /**
     * @var string|null
     *
     * @ORM\Column(name="AcceptedStr", type="string", length=250, precision=0, scale=0, nullable=true, unique=false)
     */
    private $acceptedstr;

    /**
     * @var int|null
     *
     * @ORM\Column(name="SourceAcceptedId", type="integer", precision=0, scale=0, nullable=true, options={"unsigned"=true}, unique=false)
     */
    private $sourceacceptedid;

    /**
     * @var string|null
     *
     * @ORM\Column(name="UnacceptabilityReason", type="string", length=24, precision=0, scale=0, nullable=true, unique=false)
     */
    private $unacceptabilityreason;

    /**
     * @var int|null
     *
     * @ORM\Column(name="ParentTid", type="integer", precision=0, scale=0, nullable=true, unique=false)
     */
    private $parenttid;

    /**
     * @var string|null
     *
     * @ORM\Column(name="ParentStr", type="string", length=250, precision=0, scale=0, nullable=true, unique=false)
     */
    private $parentstr;

    /**
     * @var int|null
     *
     * @ORM\Column(name="SourceParentId", type="integer", precision=0, scale=0, nullable=true, options={"unsigned"=true}, unique=false)
     */
    private $sourceparentid;

    /**
     * @var int
     *
     * @ORM\Column(name="SecurityStatus", type="integer", precision=0, scale=0, nullable=false, options={"unsigned"=true,"comment"="0 = no security; 1 = hidden locality"}, unique=false)
     */
    private $securitystatus;

    /**
     * @var string|null
     *
     * @ORM\Column(name="Source", type="string", length=250, precision=0, scale=0, nullable=true, unique=false)
     */
    private $source;

    /**
     * @var string|null
     *
     * @ORM\Column(name="Notes", type="string", length=250, precision=0, scale=0, nullable=true, unique=false)
     */
    private $notes;

    /**
     * @var string|null
     *
     * @ORM\Column(name="vernacular", type="string", length=250, precision=0, scale=0, nullable=true, unique=false)
     */
    private $vernacular;

    /**
     * @var string|null
     *
     * @ORM\Column(name="vernlang", type="string", length=15, precision=0, scale=0, nullable=true, unique=false)
     */
    private $vernlang;

    /**
     * @var string|null
     *
     * @ORM\Column(name="Hybrid", type="string", length=50, precision=0, scale=0, nullable=true, unique=false)
     */
    private $hybrid;

    /**
     * @var string|null
     *
     * @ORM\Column(name="ErrorStatus", type="string", length=150, precision=0, scale=0, nullable=true, unique=false)
     */
    private $errorstatus;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="InitialTimeStamp", type="datetime", precision=0, scale=0, nullable=false, options={"default"="CURRENT_TIMESTAMP"}, unique=false)
     */
    private $initialtimestamp = 'CURRENT_TIMESTAMP';


    /**
     * Get uptid.
     *
     * @return int
     */
    public function getUptid()
    {
        return $this->uptid;
    }

    /**
     * Set tid.
     *
     * @param int|null $tid
     *
     * @return Uploadtaxa
     */
    public function setTid($tid = null)
    {
        $this->tid = $tid;

        return $this;
    }

    /**
     * Get tid.
     *
     * @return int|null
     */
    public function getTid()
    {
        return $this->tid;
    }

    /**
     * Set sourceid.
     *
     * @param int|null $sourceid
     *
     * @return Uploadtaxa
     */
    public function setSourceid($sourceid = null)
    {
        $this->sourceid = $sourceid;

        return $this;
    }

    /**
     * Get sourceid.
     *
     * @return int|null
     */
    public function getSourceid()
    {
        return $this->sourceid;
    }

    /**
     * Set family.
     *
     * @param string|null $family
     *
     * @return Uploadtaxa
     */
    public function setFamily($family = null)
    {
        $this->family = $family;

        return $this;
    }

    /**
     * Get family.
     *
     * @return string|null
     */
    public function getFamily()
    {
        return $this->family;
    }

    /**
     * Set rankid.
     *
     * @param int|null $rankid
     *
     * @return Uploadtaxa
     */
    public function setRankid($rankid = null)
    {
        $this->rankid = $rankid;

        return $this;
    }

    /**
     * Get rankid.
     *
     * @return int|null
     */
    public function getRankid()
    {
        return $this->rankid;
    }

    /**
     * Set rankname.
     *
     * @param string|null $rankname
     *
     * @return Uploadtaxa
     */
    public function setRankname($rankname = null)
    {
        $this->rankname = $rankname;

        return $this;
    }

    /**
     * Get rankname.
     *
     * @return string|null
     */
    public function getRankname()
    {
        return $this->rankname;
    }

    /**
     * Set scinameinput.
     *
     * @param string $scinameinput
     *
     * @return Uploadtaxa
     */
    public function setScinameinput($scinameinput)
    {
        $this->scinameinput = $scinameinput;

        return $this;
    }

    /**
     * Get scinameinput.
     *
     * @return string
     */
    public function getScinameinput()
    {
        return $this->scinameinput;
    }

    /**
     * Set sciname.
     *
     * @param string|null $sciname
     *
     * @return Uploadtaxa
     */
    public function setSciname($sciname = null)
    {
        $this->sciname = $sciname;

        return $this;
    }

    /**
     * Get sciname.
     *
     * @return string|null
     */
    public function getSciname()
    {
        return $this->sciname;
    }

    /**
     * Set unitind1.
     *
     * @param string|null $unitind1
     *
     * @return Uploadtaxa
     */
    public function setUnitind1($unitind1 = null)
    {
        $this->unitind1 = $unitind1;

        return $this;
    }

    /**
     * Get unitind1.
     *
     * @return string|null
     */
    public function getUnitind1()
    {
        return $this->unitind1;
    }

    /**
     * Set unitname1.
     *
     * @param string|null $unitname1
     *
     * @return Uploadtaxa
     */
    public function setUnitname1($unitname1 = null)
    {
        $this->unitname1 = $unitname1;

        return $this;
    }

    /**
     * Get unitname1.
     *
     * @return string|null
     */
    public function getUnitname1()
    {
        return $this->unitname1;
    }

    /**
     * Set unitind2.
     *
     * @param string|null $unitind2
     *
     * @return Uploadtaxa
     */
    public function setUnitind2($unitind2 = null)
    {
        $this->unitind2 = $unitind2;

        return $this;
    }

    /**
     * Get unitind2.
     *
     * @return string|null
     */
    public function getUnitind2()
    {
        return $this->unitind2;
    }

    /**
     * Set unitname2.
     *
     * @param string|null $unitname2
     *
     * @return Uploadtaxa
     */
    public function setUnitname2($unitname2 = null)
    {
        $this->unitname2 = $unitname2;

        return $this;
    }

    /**
     * Get unitname2.
     *
     * @return string|null
     */
    public function getUnitname2()
    {
        return $this->unitname2;
    }

    /**
     * Set unitind3.
     *
     * @param string|null $unitind3
     *
     * @return Uploadtaxa
     */
    public function setUnitind3($unitind3 = null)
    {
        $this->unitind3 = $unitind3;

        return $this;
    }

    /**
     * Get unitind3.
     *
     * @return string|null
     */
    public function getUnitind3()
    {
        return $this->unitind3;
    }

    /**
     * Set unitname3.
     *
     * @param string|null $unitname3
     *
     * @return Uploadtaxa
     */
    public function setUnitname3($unitname3 = null)
    {
        $this->unitname3 = $unitname3;

        return $this;
    }

    /**
     * Get unitname3.
     *
     * @return string|null
     */
    public function getUnitname3()
    {
        return $this->unitname3;
    }

    /**
     * Set author.
     *
     * @param string|null $author
     *
     * @return Uploadtaxa
     */
    public function setAuthor($author = null)
    {
        $this->author = $author;

        return $this;
    }

    /**
     * Get author.
     *
     * @return string|null
     */
    public function getAuthor()
    {
        return $this->author;
    }

    /**
     * Set infraauthor.
     *
     * @param string|null $infraauthor
     *
     * @return Uploadtaxa
     */
    public function setInfraauthor($infraauthor = null)
    {
        $this->infraauthor = $infraauthor;

        return $this;
    }

    /**
     * Get infraauthor.
     *
     * @return string|null
     */
    public function getInfraauthor()
    {
        return $this->infraauthor;
    }

    /**
     * Set acceptance.
     *
     * @param int|null $acceptance
     *
     * @return Uploadtaxa
     */
    public function setAcceptance($acceptance = null)
    {
        $this->acceptance = $acceptance;

        return $this;
    }

    /**
     * Get acceptance.
     *
     * @return int|null
     */
    public function getAcceptance()
    {
        return $this->acceptance;
    }

    /**
     * Set tidaccepted.
     *
     * @param int|null $tidaccepted
     *
     * @return Uploadtaxa
     */
    public function setTidaccepted($tidaccepted = null)
    {
        $this->tidaccepted = $tidaccepted;

        return $this;
    }

    /**
     * Get tidaccepted.
     *
     * @return int|null
     */
    public function getTidaccepted()
    {
        return $this->tidaccepted;
    }

    /**
     * Set acceptedstr.
     *
     * @param string|null $acceptedstr
     *
     * @return Uploadtaxa
     */
    public function setAcceptedstr($acceptedstr = null)
    {
        $this->acceptedstr = $acceptedstr;

        return $this;
    }

    /**
     * Get acceptedstr.
     *
     * @return string|null
     */
    public function getAcceptedstr()
    {
        return $this->acceptedstr;
    }

    /**
     * Set sourceacceptedid.
     *
     * @param int|null $sourceacceptedid
     *
     * @return Uploadtaxa
     */
    public function setSourceacceptedid($sourceacceptedid = null)
    {
        $this->sourceacceptedid = $sourceacceptedid;

        return $this;
    }

    /**
     * Get sourceacceptedid.
     *
     * @return int|null
     */
    public function getSourceacceptedid()
    {
        return $this->sourceacceptedid;
    }

    /**
     * Set unacceptabilityreason.
     *
     * @param string|null $unacceptabilityreason
     *
     * @return Uploadtaxa
     */
    public function setUnacceptabilityreason($unacceptabilityreason = null)
    {
        $this->unacceptabilityreason = $unacceptabilityreason;

        return $this;
    }

    /**
     * Get unacceptabilityreason.
     *
     * @return string|null
     */
    public function getUnacceptabilityreason()
    {
        return $this->unacceptabilityreason;
    }

    /**
     * Set parenttid.
     *
     * @param int|null $parenttid
     *
     * @return Uploadtaxa
     */
    public function setParenttid($parenttid = null)
    {
        $this->parenttid = $parenttid;

        return $this;
    }

    /**
     * Get parenttid.
     *
     * @return int|null
     */
    public function getParenttid()
    {
        return $this->parenttid;
    }

    /**
     * Set parentstr.
     *
     * @param string|null $parentstr
     *
     * @return Uploadtaxa
     */
    public function setParentstr($parentstr = null)
    {
        $this->parentstr = $parentstr;

        return $this;
    }

    /**
     * Get parentstr.
     *
     * @return string|null
     */
    public function getParentstr()
    {
        return $this->parentstr;
    }

    /**
     * Set sourceparentid.
     *
     * @param int|null $sourceparentid
     *
     * @return Uploadtaxa
     */
    public function setSourceparentid($sourceparentid = null)
    {
        $this->sourceparentid = $sourceparentid;

        return $this;
    }

    /**
     * Get sourceparentid.
     *
     * @return int|null
     */
    public function getSourceparentid()
    {
        return $this->sourceparentid;
    }

    /**
     * Set securitystatus.
     *
     * @param int $securitystatus
     *
     * @return Uploadtaxa
     */
    public function setSecuritystatus($securitystatus)
    {
        $this->securitystatus = $securitystatus;

        return $this;
    }

    /**
     * Get securitystatus.
     *
     * @return int
     */
    public function getSecuritystatus()
    {
        return $this->securitystatus;
    }

    /**
     * Set source.
     *
     * @param string|null $source
     *
     * @return Uploadtaxa
     */
    public function setSource($source = null)
    {
        $this->source = $source;

        return $this;
    }

    /**
     * Get source.
     *
     * @return string|null
     */
    public function getSource()
    {
        return $this->source;
    }

    /**
     * Set notes.
     *
     * @param string|null $notes
     *
     * @return Uploadtaxa
     */
    public function setNotes($notes = null)
    {
        $this->notes = $notes;

        return $this;
    }

    /**
     * Get notes.
     *
     * @return string|null
     */
    public function getNotes()
    {
        return $this->notes;
    }

    /**
     * Set vernacular.
     *
     * @param string|null $vernacular
     *
     * @return Uploadtaxa
     */
    public function setVernacular($vernacular = null)
    {
        $this->vernacular = $vernacular;

        return $this;
    }

    /**
     * Get vernacular.
     *
     * @return string|null
     */
    public function getVernacular()
    {
        return $this->vernacular;
    }

    /**
     * Set vernlang.
     *
     * @param string|null $vernlang
     *
     * @return Uploadtaxa
     */
    public function setVernlang($vernlang = null)
    {
        $this->vernlang = $vernlang;

        return $this;
    }

    /**
     * Get vernlang.
     *
     * @return string|null
     */
    public function getVernlang()
    {
        return $this->vernlang;
    }

    /**
     * Set hybrid.
     *
     * @param string|null $hybrid
     *
     * @return Uploadtaxa
     */
    public function setHybrid($hybrid = null)
    {
        $this->hybrid = $hybrid;

        return $this;
    }

    /**
     * Get hybrid.
     *
     * @return string|null
     */
    public function getHybrid()
    {
        return $this->hybrid;
    }

    /**
     * Set errorstatus.
     *
     * @param string|null $errorstatus
     *
     * @return Uploadtaxa
     */
    public function setErrorstatus($errorstatus = null)
    {
        $this->errorstatus = $errorstatus;

        return $this;
    }

    /**
     * Get errorstatus.
     *
     * @return string|null
     */
    public function getErrorstatus()
    {
        return $this->errorstatus;
    }

    /**
     * Set initialtimestamp.
     *
     * @param \DateTime $initialtimestamp
     *
     * @return Uploadtaxa
     */
    public function setInitialtimestamp($initialtimestamp)
    {
        $this->initialtimestamp = $initialtimestamp;

        return $this;
    }

    /**
     * Get initialtimestamp.
     *
     * @return \DateTime
     */
    public function getInitialtimestamp()
    {
        return $this->initialtimestamp;
    }
}
