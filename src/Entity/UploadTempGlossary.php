<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Annotation\Groups;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * UploadTempGlossary
 *
 * @ORM\Table(name="uploadglossary", indexes={@ORM\Index(name="relatedterm_index", columns={"newGroupId"}), @ORM\Index(name="term_index", columns={"term"})})
 * @ORM\Entity(repositoryClass="App\Repository\UploadTempGlossaryRepository")
 * @ApiResource(
 *     itemOperations={"get"},
 *     collectionOperations={"get"}
 * )
 */
class UploadTempGlossary implements InitialTimestampInterface
{
    /**
     * @var int
     *
     * @ORM\Column(name="upgid", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var string|null
     *
     * @ORM\Column(name="term", type="string", length=150)
     * @Assert\NotBlank()
     * @Assert\Length(max=150)
     */
    private $term;

    /**
     * @var string|null
     *
     * @ORM\Column(name="definition", type="string", length=1000, nullable=true)
     * @Assert\Length(max=1000)
     */
    private $definition;

    /**
     * @var string|null
     *
     * @ORM\Column(name="language", type="string", length=45, nullable=true)
     * @Assert\Length(max=45)
     */
    private $language;

    /**
     * @var string|null
     *
     * @ORM\Column(name="source", type="string", length=1000, nullable=true)
     * @Assert\Length(max=1000)
     */
    private $source;

    /**
     * @var string|null
     *
     * @ORM\Column(name="author", type="string", length=250, nullable=true)
     * @Assert\Length(max=250)
     */
    private $author;

    /**
     * @var string|null
     *
     * @ORM\Column(name="translator", type="string", length=250, nullable=true)
     * @Assert\Length(max=250)
     */
    private $translator;

    /**
     * @var string|null
     *
     * @ORM\Column(name="notes", type="string", length=250, nullable=true)
     * @Assert\Length(max=250)
     */
    private $notes;

    /**
     * @var string|null
     *
     * @ORM\Column(name="resourceurl", type="string", length=600, nullable=true)
     * @Assert\Length(max=600)
     */
    private $resourceUrl;

    /**
     * @var string|null
     *
     * @ORM\Column(name="tidStr", type="string", length=100, nullable=true)
     * @Assert\Length(max=100)
     */
    private $taxaIdString;

    /**
     * @var bool|null
     *
     * @ORM\Column(name="synonym", type="integer", nullable=true)
     * @Assert\Type(type="integer")
     */
    private $synonym;

    /**
     * @var int|null
     *
     * @ORM\Column(name="newGroupId", type="integer", nullable=true)
     * @Assert\Type(type="integer")
     */
    private $newGroupId;

    /**
     * @var int|null
     *
     * @ORM\Column(name="currentGroupId", type="integer", nullable=true)
     * @Assert\Type(type="integer")
     */
    private $currentGroupId;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="InitialTimeStamp", type="datetime")
     * @Assert\DateTime
     */
    private $initialTimestamp;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTerm(): ?string
    {
        return $this->term;
    }

    public function setTerm(?string $term): self
    {
        $this->term = $term;

        return $this;
    }

    public function getDefinition(): ?string
    {
        return $this->definition;
    }

    public function setDefinition(?string $definition): self
    {
        $this->definition = $definition;

        return $this;
    }

    public function getLanguage(): ?string
    {
        return $this->language;
    }

    public function setLanguage(?string $language): self
    {
        $this->language = $language;

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

    public function getAuthor(): ?string
    {
        return $this->author;
    }

    public function setAuthor(?string $author): self
    {
        $this->author = $author;

        return $this;
    }

    public function getTranslator(): ?string
    {
        return $this->translator;
    }

    public function setTranslator(?string $translator): self
    {
        $this->translator = $translator;

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

    public function getResourceUrl(): ?string
    {
        return $this->resourceUrl;
    }

    public function setResourceUrl(?string $resourceUrl): self
    {
        $this->resourceUrl = $resourceUrl;

        return $this;
    }

    public function getTaxaIdString(): ?string
    {
        return $this->taxaIdString;
    }

    public function setTaxaIdString(?string $taxaIdString): self
    {
        $this->taxaIdString = $taxaIdString;

        return $this;
    }

    public function getSynonym(): ?bool
    {
        return $this->synonym;
    }

    public function setSynonym(?bool $synonym): self
    {
        $this->synonym = $synonym;

        return $this;
    }

    public function getNewGroupId(): ?int
    {
        return $this->newGroupId;
    }

    public function setNewGroupId(?int $newGroupId): self
    {
        $this->newGroupId = $newGroupId;

        return $this;
    }

    public function getCurrentGroupId(): ?int
    {
        return $this->currentGroupId;
    }

    public function setCurrentGroupId(?int $currentGroupId): self
    {
        $this->currentGroupId = $currentGroupId;

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


}
