<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Security\Core\User\UserInterface;
use Symfony\Component\Serializer\Annotation\Groups;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Glossary
 *
 * @ORM\Table(name="glossary", indexes={@ORM\Index(name="FK_glossary_uid_idx", columns={"createduid"}), @ORM\Index(name="Index_glossary_lang", columns={"language"}), @ORM\Index(name="Index_term", columns={"term"})})
 * @ORM\Entity(repositoryClass="App\Repository\GlossaryRepository")
 * @ApiResource(
 *     itemOperations={"get"},
 *     collectionOperations={"get"}
 * )
 */
class Glossary implements CreatedUserIdInterface, InitialTimestampInterface
{
    /**
     * @var int
     *
     * @ORM\Column(name="glossid", type="integer", options={"unsigned"=true})
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="term", type="string", length=150)
     * @Assert\NotBlank()
     * @Assert\Length(max=150)
     */
    private $term;

    /**
     * @var string|null
     *
     * @ORM\Column(name="definition", type="string", length=2000, nullable=true)
     * @Assert\Length(max=2000)
     */
    private $definition;

    /**
     * @var string
     *
     * @ORM\Column(name="language", type="string", length=45, options={"default"="English"})
     * @Assert\NotBlank()
     * @Assert\Length(max=45)
     */
    private $language = 'English';

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
     * @ORM\Column(name="translator", type="string", length=250, nullable=true)
     * @Assert\Length(max=250)
     */
    private $translator;

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
     * @var \App\Entity\Users
     *
     * @ORM\ManyToOne(targetEntity="\App\Entity\Users")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="createduid", referencedColumnName="uid")
     * })
     */
    private $createdUserId;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="initialtimestamp", type="datetime")
     * @Assert\NotBlank()
     */
    private $initialTimestamp;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="\App\Entity\Taxa", inversedBy="glossid")
     * @ORM\JoinTable(name="glossarytaxalink",
     *   joinColumns={
     *     @ORM\JoinColumn(name="glossid", referencedColumnName="glossid")
     *   },
     *   inverseJoinColumns={
     *     @ORM\JoinColumn(name="tid", referencedColumnName="TID")
     *   }
     * )
     */
    private $taxaId;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->taxaId = new \Doctrine\Common\Collections\ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTerm(): ?string
    {
        return $this->term;
    }

    public function setTerm(string $term): self
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

    public function setLanguage(string $language): self
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

    public function getTranslator(): ?string
    {
        return $this->translator;
    }

    public function setTranslator(?string $translator): self
    {
        $this->translator = $translator;

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

    public function getInitialTimestamp(): ?\DateTimeInterface
    {
        return $this->initialTimestamp;
    }

    public function setInitialTimestamp(\DateTimeInterface $initialTimestamp): InitialTimestampInterface
    {
        $this->initialTimestamp = $initialTimestamp;

        return $this;
    }

    /**
     * @return Users|null
     */
    public function getCreatedUserId(): ?Users
    {
        return $this->createdUserId;
    }

    /**
     * @param UserInterface $createdUserId
     * @return CreatedUserIdInterface
     */
    public function setCreatedUserId(UserInterface $createdUserId): CreatedUserIdInterface
    {
        $this->createdUserId = $createdUserId;

        return $this;
    }

    /**
     * @return Collection|Taxa[]
     */
    public function getTaxaId(): Collection
    {
        return $this->taxaId;
    }

    public function addTaxaId(Taxa $taxaId): self
    {
        if (!$this->taxaId->contains($taxaId)) {
            $this->taxaId[] = $taxaId;
        }

        return $this;
    }

    public function removeTaxaId(Taxa $taxaId): self
    {
        if ($this->taxaId->contains($taxaId)) {
            $this->taxaId->removeElement($taxaId);
        }

        return $this;
    }

}
