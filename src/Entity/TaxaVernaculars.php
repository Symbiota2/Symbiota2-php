<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Annotation\Groups;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * TaxaVernaculars
 *
 * @ORM\Table(name="taxavernaculars", uniqueConstraints={@ORM\UniqueConstraint(name="unique_key", columns={"Language", "VernacularName", "tid"})}, indexes={@ORM\Index(name="FK_vern_lang_idx", columns={"langid"}), @ORM\Index(name="tid1", columns={"tid"}), @ORM\Index(name="vernacularsnames", columns={"VernacularName"})})
 * @ORM\Entity(repositoryClass="App\Repository\TaxaVernacularsRepository")
 * @ApiResource(
 *     itemOperations={"get"},
 *     collectionOperations={"get"}
 * )
 */
class TaxaVernaculars implements InitialTimestampInterface
{
    /**
     * @var \App\Entity\Taxa
     *
     * @ORM\ManyToOne(targetEntity="\App\Entity\Taxa")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="tid", referencedColumnName="TID")
     * })
     * @Assert\NotBlank()
     */
    private $taxaId;

    /**
     * @var string
     *
     * @ORM\Column(name="VernacularName", type="string", length=80)
     * @Assert\NotBlank()
     * @Assert\Length(max=80)
     */
    private $vernacularName;

    /**
     * @var string
     *
     * @ORM\Column(name="Language", type="string", length=15, options={"default"="English"})
     * @Assert\NotBlank()
     * @Assert\Length(max=15)
     */
    private $language = 'English';

    /**
     * @var \App\Entity\LookupLanguages
     *
     * @ORM\ManyToOne(targetEntity="\App\Entity\LookupLanguages")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="langid", referencedColumnName="langid")
     * })
     */
    private $languageId;

    /**
     * @var string|null
     *
     * @ORM\Column(name="Source", type="string", length=50, nullable=true)
     * @Assert\Length(max=50)
     */
    private $source;

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
     * @ORM\Column(name="username", type="string", length=45, nullable=true)
     * @Assert\Length(max=45)
     */
    private $username;

    /**
     * @var int|null
     *
     * @ORM\Column(name="isupperterm", type="integer", nullable=true)
     * @Assert\Type(type="integer")
     */
    private $isUpperTerm;

    /**
     * @var int|null
     *
     * @ORM\Column(name="SortSequence", type="integer", nullable=true, options={"default"="50"})
     * @Assert\Type(type="integer")
     */
    private $sortSequence = 50;

    /**
     * @var int
     *
     * @ORM\Column(name="VID", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="InitialTimeStamp", type="datetime")
     * @Assert\DateTime
     */
    private $initialTimestamp;

    public function getVernacularName(): ?string
    {
        return $this->vernacularName;
    }

    public function setVernacularName(string $vernacularName): self
    {
        $this->vernacularName = $vernacularName;

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

    public function getNotes(): ?string
    {
        return $this->notes;
    }

    public function setNotes(?string $notes): self
    {
        $this->notes = $notes;

        return $this;
    }

    public function getUsername(): ?string
    {
        return $this->username;
    }

    public function setUsername(?string $username): self
    {
        $this->username = $username;

        return $this;
    }

    public function getIsUpperTerm(): ?int
    {
        return $this->isUpperTerm;
    }

    public function setIsUpperTerm(?int $isUpperTerm): self
    {
        $this->isUpperTerm = $isUpperTerm;

        return $this;
    }

    public function getSortSequence(): ?int
    {
        return $this->sortSequence;
    }

    public function setSortSequence(?int $sortSequence): self
    {
        $this->sortSequence = $sortSequence;

        return $this;
    }

    public function getId(): ?int
    {
        return $this->id;
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

    public function getLanguageId(): ?LookupLanguages
    {
        return $this->languageId;
    }

    public function setLanguageId(?LookupLanguages $languageId): self
    {
        $this->languageId = $languageId;

        return $this;
    }

    public function getTaxaId(): ?Taxa
    {
        return $this->taxaId;
    }

    public function setTaxaId(?Taxa $taxaId): self
    {
        $this->taxaId = $taxaId;

        return $this;
    }


}
