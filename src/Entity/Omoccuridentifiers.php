<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Omoccuridentifiers
 *
 * @ORM\Table(name="omoccuridentifiers", indexes={@ORM\Index(name="FK_omoccuridentifiers_occid_idx", columns={"occid"}), @ORM\Index(name="Index_value", columns={"identifiervalue"})})
 * @ORM\Entity(repositoryClass="App\Repository\OmoccuridentifiersRepository")
 */
class Omoccuridentifiers
{
    /**
     * @var int
     *
     * @ORM\Column(name="idomoccuridentifiers", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idomoccuridentifiers;

    /**
     * @var string
     *
     * @ORM\Column(name="identifiervalue", type="string", length=45, nullable=false)
     */
    private $identifiervalue;

    /**
     * @var string|null
     *
     * @ORM\Column(name="identifiername", type="string", length=45, nullable=true, options={"default"=NULL,"comment"="barcode, accession number, old catalog number, NPS, etc"})
     */
    private $identifiername = 'NULL';

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

    /**
     * @var \Omoccurrences
     *
     * @ORM\ManyToOne(targetEntity="Omoccurrences")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="occid", referencedColumnName="occid")
     * })
     */
    private $occid;

    public function getIdomoccuridentifiers(): ?int
    {
        return $this->idomoccuridentifiers;
    }

    public function getIdentifiervalue(): ?string
    {
        return $this->identifiervalue;
    }

    public function setIdentifiervalue(string $identifiervalue): self
    {
        $this->identifiervalue = $identifiervalue;

        return $this;
    }

    public function getIdentifiername(): ?string
    {
        return $this->identifiername;
    }

    public function setIdentifiername(?string $identifiername): self
    {
        $this->identifiername = $identifiername;

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
