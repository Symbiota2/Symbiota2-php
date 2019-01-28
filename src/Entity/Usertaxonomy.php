<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Usertaxonomy
 *
 * @ORM\Table(name="usertaxonomy", uniqueConstraints={@ORM\UniqueConstraint(name="usertaxonomy_UNIQUE", columns={"uid", "tid", "taxauthid", "editorstatus"})}, indexes={@ORM\Index(name="FK_usertaxonomy_taxauthid_idx", columns={"taxauthid"}), @ORM\Index(name="FK_usertaxonomy_tid_idx", columns={"tid"}), @ORM\Index(name="FK_usertaxonomy_uid_idx", columns={"uid"})})
 * @ORM\Entity(repositoryClass="App\Repository\UsertaxonomyRepository")
 */
class Usertaxonomy
{
    /**
     * @var int
     *
     * @ORM\Column(name="idusertaxonomy", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idusertaxonomy;

    /**
     * @var \Users
     *
     * @ORM\ManyToOne(targetEntity="Users")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="uid", referencedColumnName="uid")
     * })
     */
    private $uid;

    /**
     * @var \Taxa
     *
     * @ORM\ManyToOne(targetEntity="Taxa")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="tid", referencedColumnName="TID")
     * })
     */
    private $tid;

    /**
     * @var \Taxauthority
     *
     * @ORM\ManyToOne(targetEntity="Taxauthority")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="taxauthid", referencedColumnName="taxauthid")
     * })
     */
    private $taxauthid;

    /**
     * @var string|null
     *
     * @ORM\Column(name="editorstatus", type="string", length=45, nullable=true, options={"default"=NULL})
     */
    private $editorstatus = 'NULL';

    /**
     * @var string|null
     *
     * @ORM\Column(name="geographicScope", type="string", length=250, nullable=true, options={"default"=NULL})
     */
    private $geographicscope = 'NULL';

    /**
     * @var string|null
     *
     * @ORM\Column(name="notes", type="string", length=250, nullable=true, options={"default"=NULL})
     */
    private $notes = 'NULL';

    /**
     * @var int
     *
     * @ORM\Column(name="modifiedUid", type="integer", nullable=false, options={"unsigned"=true})
     */
    private $modifieduid;

    /**
     * @var \DateTime|null
     *
     * @ORM\Column(name="modifiedtimestamp", type="datetime", nullable=true, options={"default"=NULL})
     */
    private $modifiedtimestamp = 'NULL';

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="initialtimestamp", type="datetime", nullable=false, options={"default"="CURRENT_TIMESTAMP"})
     */
    private $initialtimestamp = 'CURRENT_TIMESTAMP';

    public function getIdusertaxonomy(): ?int
    {
        return $this->idusertaxonomy;
    }

    public function getEditorstatus(): ?string
    {
        return $this->editorstatus;
    }

    public function setEditorstatus(?string $editorstatus): self
    {
        $this->editorstatus = $editorstatus;

        return $this;
    }

    public function getGeographicscope(): ?string
    {
        return $this->geographicscope;
    }

    public function setGeographicscope(?string $geographicscope): self
    {
        $this->geographicscope = $geographicscope;

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

    public function getModifieduid(): ?int
    {
        return $this->modifieduid;
    }

    public function setModifieduid(int $modifieduid): self
    {
        $this->modifieduid = $modifieduid;

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

    public function getTaxauthid(): ?Taxauthority
    {
        return $this->taxauthid;
    }

    public function setTaxauthid(?Taxauthority $taxauthid): self
    {
        $this->taxauthid = $taxauthid;

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

    public function getUid(): ?Users
    {
        return $this->uid;
    }

    public function setUid(?Users $uid): self
    {
        $this->uid = $uid;

        return $this;
    }


}
