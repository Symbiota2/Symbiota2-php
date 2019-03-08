<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * GlossaryImages
 *
 * @ORM\Table(name="glossaryimages", indexes={@ORM\Index(name="FK_glossaryimages_uid_idx", columns={"createduid"}), @ORM\Index(name="FK_glossaryimages_gloss", columns={"glossid"})})
 * @ORM\Entity(repositoryClass="App\Repository\GlossaryImagesRepository")
 */
class GlossaryImages
{
    /**
     * @var int
     *
     * @ORM\Column(name="glimgid", type="integer", nullable=false, options={"unsigned"=true})
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $glimgid;

    /**
     * @var \Glossary
     *
     * @ORM\ManyToOne(targetEntity="Glossary")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="glossid", referencedColumnName="glossid")
     * })
     */
    private $glossid;

    /**
     * @var string
     *
     * @ORM\Column(name="url", type="string", length=255, nullable=false)
     */
    private $url;

    /**
     * @var string|null
     *
     * @ORM\Column(name="thumbnailurl", type="string", length=255, nullable=true, options={"default"=NULL})
     */
    private $thumbnailurl = 'NULL';

    /**
     * @var string|null
     *
     * @ORM\Column(name="structures", type="string", length=150, nullable=true, options={"default"=NULL})
     */
    private $structures = 'NULL';

    /**
     * @var string|null
     *
     * @ORM\Column(name="notes", type="string", length=250, nullable=true, options={"default"=NULL})
     */
    private $notes = 'NULL';

    /**
     * @var string|null
     *
     * @ORM\Column(name="createdBy", type="string", length=250, nullable=true, options={"default"=NULL})
     */
    private $createdby = 'NULL';

    /**
     * @var \Users
     *
     * @ORM\ManyToOne(targetEntity="Users")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="createduid", referencedColumnName="uid")
     * })
     */
    private $createduid;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="initialtimestamp", type="datetime", nullable=false, options={"default"="CURRENT_TIMESTAMP"})
     */
    private $initialtimestamp = 'CURRENT_TIMESTAMP';

    public function getGlimgid(): ?int
    {
        return $this->glimgid;
    }

    public function getUrl(): ?string
    {
        return $this->url;
    }

    public function setUrl(string $url): self
    {
        $this->url = $url;

        return $this;
    }

    public function getThumbnailurl(): ?string
    {
        return $this->thumbnailurl;
    }

    public function setThumbnailurl(?string $thumbnailurl): self
    {
        $this->thumbnailurl = $thumbnailurl;

        return $this;
    }

    public function getStructures(): ?string
    {
        return $this->structures;
    }

    public function setStructures(?string $structures): self
    {
        $this->structures = $structures;

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

    public function getCreatedby(): ?string
    {
        return $this->createdby;
    }

    public function setCreatedby(?string $createdby): self
    {
        $this->createdby = $createdby;

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

    public function getCreateduid(): ?Users
    {
        return $this->createduid;
    }

    public function setCreateduid(?Users $createduid): self
    {
        $this->createduid = $createduid;

        return $this;
    }

    public function getGlossid(): ?Glossary
    {
        return $this->glossid;
    }

    public function setGlossid(?Glossary $glossid): self
    {
        $this->glossid = $glossid;

        return $this;
    }


}
