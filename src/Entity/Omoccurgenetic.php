<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Omoccurgenetic
 *
 * @ORM\Table(name="omoccurgenetic", indexes={@ORM\Index(name="FK_omoccurgenetic", columns={"occid"}), @ORM\Index(name="INDEX_omoccurgenetic_name", columns={"resourcename"})})
 * @ORM\Entity(repositoryClass="App\Repository\OmoccurgeneticRepository")
 */
class Omoccurgenetic
{
    /**
     * @var int
     *
     * @ORM\Column(name="idoccurgenetic", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idoccurgenetic;

    /**
     * @var string|null
     *
     * @ORM\Column(name="identifier", type="string", length=150, nullable=true, options={"default"=NULL})
     */
    private $identifier = 'NULL';

    /**
     * @var string
     *
     * @ORM\Column(name="resourcename", type="string", length=150, nullable=false)
     */
    private $resourcename;

    /**
     * @var string|null
     *
     * @ORM\Column(name="title", type="string", length=150, nullable=true, options={"default"=NULL})
     */
    private $title = 'NULL';

    /**
     * @var string|null
     *
     * @ORM\Column(name="locus", type="string", length=500, nullable=true, options={"default"=NULL})
     */
    private $locus = 'NULL';

    /**
     * @var string|null
     *
     * @ORM\Column(name="resourceurl", type="string", length=500, nullable=true, options={"default"=NULL})
     */
    private $resourceurl = 'NULL';

    /**
     * @var string|null
     *
     * @ORM\Column(name="notes", type="string", length=45, nullable=true, options={"default"=NULL})
     */
    private $notes = 'NULL';

    /**
     * @var string|null
     *
     * @ORM\Column(name="initialtimestamp", type="string", length=45, nullable=true, options={"default"=NULL})
     */
    private $initialtimestamp = 'NULL';

    /**
     * @var \Omoccurrences
     *
     * @ORM\ManyToOne(targetEntity="Omoccurrences")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="occid", referencedColumnName="occid")
     * })
     */
    private $occid;

    public function getIdoccurgenetic(): ?int
    {
        return $this->idoccurgenetic;
    }

    public function getIdentifier(): ?string
    {
        return $this->identifier;
    }

    public function setIdentifier(?string $identifier): self
    {
        $this->identifier = $identifier;

        return $this;
    }

    public function getResourcename(): ?string
    {
        return $this->resourcename;
    }

    public function setResourcename(string $resourcename): self
    {
        $this->resourcename = $resourcename;

        return $this;
    }

    public function getTitle(): ?string
    {
        return $this->title;
    }

    public function setTitle(?string $title): self
    {
        $this->title = $title;

        return $this;
    }

    public function getLocus(): ?string
    {
        return $this->locus;
    }

    public function setLocus(?string $locus): self
    {
        $this->locus = $locus;

        return $this;
    }

    public function getResourceurl(): ?string
    {
        return $this->resourceurl;
    }

    public function setResourceurl(?string $resourceurl): self
    {
        $this->resourceurl = $resourceurl;

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

    public function getInitialtimestamp(): ?string
    {
        return $this->initialtimestamp;
    }

    public function setInitialtimestamp(?string $initialtimestamp): self
    {
        $this->initialtimestamp = $initialtimestamp;

        return $this;
    }

    public function getOccid(): ?Omoccurrences
    {
        return $this->occid;
    }

    public function setOccid(?Omoccurrences $occid): self
    {
        $this->occid = $occid;

        return $this;
    }


}
