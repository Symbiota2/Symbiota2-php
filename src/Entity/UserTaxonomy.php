<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Annotation\Groups;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * UserTaxonomy
 *
 * @ORM\Table(name="usertaxonomy", uniqueConstraints={@ORM\UniqueConstraint(name="usertaxonomy_UNIQUE", columns={"uid", "tid", "taxauthid", "editorstatus"})}, indexes={@ORM\Index(name="FK_usertaxonomy_taxauthid_idx", columns={"taxauthid"}), @ORM\Index(name="FK_usertaxonomy_tid_idx", columns={"tid"}), @ORM\Index(name="FK_usertaxonomy_uid_idx", columns={"uid"})})
 * @ORM\Entity(repositoryClass="App\Repository\UserTaxonomyRepository")
 * @ApiResource(
 *     itemOperations={"get"},
 *     collectionOperations={"get"}
 * )
 */
class UserTaxonomy implements InitialTimeStampInterface, ModifiedTimeStampInterface
{
    /**
     * @var int
     *
     * @ORM\Column(name="idusertaxonomy", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var \App\Entity\Users
     *
     * @ORM\ManyToOne(targetEntity="Users")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="uid", referencedColumnName="uid")
     * })
     * @Assert\NotBlank()
     */
    private $userid;

    /**
     * @var \App\Entity\Taxa
     *
     * @ORM\ManyToOne(targetEntity="Taxa")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="tid", referencedColumnName="TID")
     * })
     * @Assert\NotBlank()
     */
    private $taxaid;

    /**
     * @var \App\Entity\TaxaAuthorities
     *
     * @ORM\ManyToOne(targetEntity="TaxaAuthorities")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="taxauthid", referencedColumnName="taxauthid")
     * })
     * @Assert\NotBlank()
     */
    private $taxaauthorityid;

    /**
     * @var string|null
     *
     * @ORM\Column(name="editorstatus", type="string", length=45, nullable=true)
     * @Assert\Length(max=45)
     */
    private $editorstatus;

    /**
     * @var string|null
     *
     * @ORM\Column(name="geographicScope", type="string", length=250, nullable=true)
     * @Assert\Length(max=250)
     */
    private $geographicscope;

    /**
     * @var string|null
     *
     * @ORM\Column(name="notes", type="string", length=250, nullable=true)
     * @Assert\Length(max=250)
     */
    private $notes;

    /**
     * @var int
     *
     * @ORM\Column(name="modifiedUid", type="integer", options={"unsigned"=true})
     * @Assert\Type(
     *      type="integer"
     * )
     */
    private $modifieduserid;

    /**
     * @var \DateTime|null
     *
     * @ORM\Column(name="modifiedtimestamp", type="datetime", nullable=true)
     */
    private $modifiedtimestamp;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="initialtimestamp", type="datetime")
     */
    private $initialtimestamp;

    public function getId(): ?int
    {
        return $this->id;
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

    public function getModifieduserid(): ?int
    {
        return $this->modifieduserid;
    }

    public function setModifieduserid(int $modifieduserid): self
    {
        $this->modifieduserid = $modifieduserid;

        return $this;
    }

    public function getModifiedtimestamp(): ?\DateTimeInterface
    {
        return $this->modifiedtimestamp;
    }

    public function setModifiedtimestamp(?\DateTimeInterface $modifiedtimestamp): ModifiedTimeStampInterface
    {
        $this->modifiedtimestamp = $modifiedtimestamp;

        return $this;
    }

    public function getInitialtimestamp(): ?\DateTimeInterface
    {
        return $this->initialtimestamp;
    }

    public function setInitialtimestamp(\DateTimeInterface $initialtimestamp): InitialTimeStampInterface
    {
        $this->initialtimestamp = $initialtimestamp;

        return $this;
    }

    public function getTaxaauthorityid(): ?TaxaAuthorities
    {
        return $this->taxaauthorityid;
    }

    public function setTaxaauthorityid(?TaxaAuthorities $taxaauthorityid): self
    {
        $this->taxaauthorityid = $taxaauthorityid;

        return $this;
    }

    public function getTaxaid(): ?Taxa
    {
        return $this->taxaid;
    }

    public function setTaxaid(?Taxa $taxaid): self
    {
        $this->taxaid = $taxaid;

        return $this;
    }

    public function getUserid(): ?Users
    {
        return $this->userid;
    }

    public function setUserid(?Users $userid): self
    {
        $this->userid = $userid;

        return $this;
    }

}
