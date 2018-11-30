<?php

namespace App\Entities;

use Doctrine\ORM\Mapping as ORM;

/**
 * Usertaxonomy
 *
 * @ORM\Table(name="usertaxonomy", uniqueConstraints={@ORM\UniqueConstraint(name="usertaxonomy_UNIQUE", columns={"uid", "tid", "taxauthid", "editorstatus"})}, indexes={@ORM\Index(name="FK_usertaxonomy_uid_idx", columns={"uid"}), @ORM\Index(name="FK_usertaxonomy_tid_idx", columns={"tid"}), @ORM\Index(name="FK_usertaxonomy_taxauthid_idx", columns={"taxauthid"})})
 * @ORM\Entity
 */
class Usertaxonomy
{
    /**
     * @var int
     *
     * @ORM\Column(name="idusertaxonomy", type="integer", precision=0, scale=0, nullable=false, unique=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idusertaxonomy;

    /**
     * @var string|null
     *
     * @ORM\Column(name="editorstatus", type="string", length=45, precision=0, scale=0, nullable=true, unique=false)
     */
    private $editorstatus;

    /**
     * @var string|null
     *
     * @ORM\Column(name="geographicScope", type="string", length=250, precision=0, scale=0, nullable=true, unique=false)
     */
    private $geographicscope;

    /**
     * @var string|null
     *
     * @ORM\Column(name="notes", type="string", length=250, precision=0, scale=0, nullable=true, unique=false)
     */
    private $notes;

    /**
     * @var int
     *
     * @ORM\Column(name="modifiedUid", type="integer", precision=0, scale=0, nullable=false, options={"unsigned"=true}, unique=false)
     */
    private $modifieduid;

    /**
     * @var \DateTime|null
     *
     * @ORM\Column(name="modifiedtimestamp", type="datetime", precision=0, scale=0, nullable=true, unique=false)
     */
    private $modifiedtimestamp;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="initialtimestamp", type="datetime", precision=0, scale=0, nullable=false, options={"default"="CURRENT_TIMESTAMP"}, unique=false)
     */
    private $initialtimestamp = 'CURRENT_TIMESTAMP';

    /**
     * @var \App\Entities\Taxauthority
     *
     * @ORM\ManyToOne(targetEntity="App\Entities\Taxauthority")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="taxauthid", referencedColumnName="taxauthid", nullable=true)
     * })
     */
    private $taxauthid;

    /**
     * @var \App\Entities\Taxa
     *
     * @ORM\ManyToOne(targetEntity="App\Entities\Taxa")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="tid", referencedColumnName="tid", nullable=true)
     * })
     */
    private $tid;

    /**
     * @var \App\Entities\User
     *
     * @ORM\ManyToOne(targetEntity="App\Entities\User")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="uid", referencedColumnName="uid", nullable=true)
     * })
     */
    private $uid;


    /**
     * Get idusertaxonomy.
     *
     * @return int
     */
    public function getIdusertaxonomy()
    {
        return $this->idusertaxonomy;
    }

    /**
     * Set editorstatus.
     *
     * @param string|null $editorstatus
     *
     * @return Usertaxonomy
     */
    public function setEditorstatus($editorstatus = null)
    {
        $this->editorstatus = $editorstatus;

        return $this;
    }

    /**
     * Get editorstatus.
     *
     * @return string|null
     */
    public function getEditorstatus()
    {
        return $this->editorstatus;
    }

    /**
     * Set geographicscope.
     *
     * @param string|null $geographicscope
     *
     * @return Usertaxonomy
     */
    public function setGeographicscope($geographicscope = null)
    {
        $this->geographicscope = $geographicscope;

        return $this;
    }

    /**
     * Get geographicscope.
     *
     * @return string|null
     */
    public function getGeographicscope()
    {
        return $this->geographicscope;
    }

    /**
     * Set notes.
     *
     * @param string|null $notes
     *
     * @return Usertaxonomy
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
     * Set modifieduid.
     *
     * @param int $modifieduid
     *
     * @return Usertaxonomy
     */
    public function setModifieduid($modifieduid)
    {
        $this->modifieduid = $modifieduid;

        return $this;
    }

    /**
     * Get modifieduid.
     *
     * @return int
     */
    public function getModifieduid()
    {
        return $this->modifieduid;
    }

    /**
     * Set modifiedtimestamp.
     *
     * @param \DateTime|null $modifiedtimestamp
     *
     * @return Usertaxonomy
     */
    public function setModifiedtimestamp($modifiedtimestamp = null)
    {
        $this->modifiedtimestamp = $modifiedtimestamp;

        return $this;
    }

    /**
     * Get modifiedtimestamp.
     *
     * @return \DateTime|null
     */
    public function getModifiedtimestamp()
    {
        return $this->modifiedtimestamp;
    }

    /**
     * Set initialtimestamp.
     *
     * @param \DateTime $initialtimestamp
     *
     * @return Usertaxonomy
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

    /**
     * Set taxauthid.
     *
     * @param \App\Entities\Taxauthority|null $taxauthid
     *
     * @return Usertaxonomy
     */
    public function setTaxauthid(\App\Entities\Taxauthority $taxauthid = null)
    {
        $this->taxauthid = $taxauthid;

        return $this;
    }

    /**
     * Get taxauthid.
     *
     * @return \App\Entities\Taxauthority|null
     */
    public function getTaxauthid()
    {
        return $this->taxauthid;
    }

    /**
     * Set tid.
     *
     * @param \App\Entities\Taxa|null $tid
     *
     * @return Usertaxonomy
     */
    public function setTid(\App\Entities\Taxa $tid = null)
    {
        $this->tid = $tid;

        return $this;
    }

    /**
     * Get tid.
     *
     * @return \App\Entities\Taxa|null
     */
    public function getTid()
    {
        return $this->tid;
    }

    /**
     * Set uid.
     *
     * @param \App\Entities\User|null $uid
     *
     * @return Usertaxonomy
     */
    public function setUid(\App\Entities\User $uid = null)
    {
        $this->uid = $uid;

        return $this;
    }

    /**
     * Get uid.
     *
     * @return \App\Entities\User|null
     */
    public function getUid()
    {
        return $this->uid;
    }
}
