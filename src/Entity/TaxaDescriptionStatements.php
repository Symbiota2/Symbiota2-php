<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Annotation\Groups;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * TaxaDescriptionStatements
 *
 * @ORM\Table(name="taxadescrstmts", indexes={@ORM\Index(name="FK_taxadescrstmts_tblock", columns={"tdbid"})})
 * @ORM\Entity(repositoryClass="App\Repository\TaxaDescriptionStatementsRepository")
 * @ApiResource(
 *     itemOperations={"get"},
 *     collectionOperations={"get"}
 * )
 */
class TaxaDescriptionStatements implements InitialTimestampInterface
{
    /**
     * @var int
     *
     * @ORM\Column(name="tdsid", type="integer", options={"unsigned"=true})
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var \App\Entity\TaxaDescriptionBlock
     *
     * @ORM\ManyToOne(targetEntity="\App\Entity\TaxaDescriptionBlock")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="tdbid", referencedColumnName="tdbid", nullable=false)
     * })
     */
    private $descriptionBlockId;

    /**
     * @var string
     *
     * @ORM\Column(name="heading", type="string", length=75)
     * @Assert\NotBlank()
     * @Assert\Length(max=75)
     */
    private $heading;

    /**
     * @var string
     *
     * @ORM\Column(name="statement", type="text", length=65535)
     * @Assert\NotBlank()
     * @Assert\Length(max=65535)
     */
    private $statement;

    /**
     * @var int
     *
     * @ORM\Column(name="displayheader", type="integer", options={"default"="1","unsigned"=true})
     * @Assert\NotBlank()
     * @Assert\Type(type="integer")
     */
    private $displayHeader = 1;

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
     * @ORM\Column(name="sortsequence", type="integer", options={"default"="89","unsigned"=true})
     * @Assert\NotBlank()
     * @Assert\Type(type="integer")
     */
    private $sortSequence = 89;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="initialtimestamp", type="datetime")
     * @Assert\DateTime
     */
    private $initialTimestamp;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getHeading(): ?string
    {
        return $this->heading;
    }

    public function setHeading(string $heading): self
    {
        $this->heading = $heading;

        return $this;
    }

    public function getStatement(): ?string
    {
        return $this->statement;
    }

    public function setStatement(string $statement): self
    {
        $this->statement = $statement;

        return $this;
    }

    public function getDisplayHeader(): ?int
    {
        return $this->displayHeader;
    }

    public function setDisplayHeader(int $displayHeader): self
    {
        $this->displayHeader = $displayHeader;

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

    public function getSortSequence(): ?int
    {
        return $this->sortSequence;
    }

    public function setSortSequence(int $sortSequence): self
    {
        $this->sortSequence = $sortSequence;

        return $this;
    }

    public function getInitialTimestamp(): ?\DateTimeInterface
    {
        return $this->initialTimestamp;
    }

    public function setInitialTimestamp(\DateTimeInterface $initialTimestamp): InitialTimestampInterface
    {
        $this->initialTimestamp = $initialTimestamp;

        return $this;
    }

    public function getDescriptionBlockId(): ?TaxaDescriptionBlock
    {
        return $this->descriptionBlockId;
    }

    public function setDescriptionBlockId(?TaxaDescriptionBlock $descriptionBlockId): self
    {
        $this->descriptionBlockId = $descriptionBlockId;

        return $this;
    }


}
