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
 * TaxaDescriptionBlock
 *
 * @ORM\Table(name="taxadescrblock", uniqueConstraints={@ORM\UniqueConstraint(name="Index_unique_taxadescrblock", columns={"tid", "displaylevel", "language"})}, indexes={@ORM\Index(name="FK_taxadesc_lang_idx", columns={"langid"}), @ORM\Index(name="IDX_17AB94AF52596C31", columns={"tid"})})
 * @ORM\Entity(repositoryClass="App\Repository\TaxaDescriptionBlockRepository")
 * @ApiResource(
 *     itemOperations={"get"},
 *     collectionOperations={"get"}
 * )
 */
class TaxaDescriptionBlock implements CreatedUserIdInterface, InitialTimestampInterface
{
    /**
     * @var int
     *
     * @ORM\Column(name="tdbid", type="integer", options={"unsigned"=true})
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var \App\Entity\Taxa
     *
     * @ORM\ManyToOne(targetEntity="\App\Entity\Taxa")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="tid", referencedColumnName="TID")
     * })
     * @Assert\NotBlank()
     * @Assert\Type(type="integer")
     */
    private $taxaId;

    /**
     * @var string|null
     *
     * @ORM\Column(name="caption", type="string", length=40, nullable=true)
     * @Assert\Length(max=40)
     */
    private $caption;

    /**
     * @var string|null
     *
     * @ORM\Column(name="source", type="string", length=250, nullable=true)
     * @Assert\Length(max=250)
     */
    private $source;

    /**
     * @var string|null
     *
     * @ORM\Column(name="sourceurl", type="string", length=250, nullable=true)
     * @Assert\Length(max=250)
     */
    private $sourceUrl;

    /**
     * @var string|null
     *
     * @ORM\Column(name="language", type="string", length=45, nullable=true, options={"default"="English"})
     * @Assert\Length(max=45)
     */
    private $language = 'English';

    /**
     * @var \App\Entity\LookupLanguages
     *
     * @ORM\ManyToOne(targetEntity="\App\Entity\LookupLanguages")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="langid", referencedColumnName="langid")
     * })
     * @Assert\Type(type="integer")
     */
    private $languageId;

    /**
     * @var int
     *
     * @ORM\Column(name="displaylevel", type="integer", options={"default"="1","unsigned"=true,"comment"="1 = short descr, 2 = intermediate descr"})
     * @Assert\NotBlank()
     * @Assert\Type(type="integer")
     */
    private $displayLevel = 1;

    /**
     * @var int
     *
     * @ORM\Column(name="createduid", type="integer", options={"unsigned"=true})
     * @Assert\NotBlank()
     * @Assert\Type(type="integer")
     */
    private $createdUserId;

    /**
     * @var string|null
     *
     * @ORM\Column(name="notes", type="string", length=250, nullable=true)
     * @Assert\Length(max=250)
     */
    private $notes;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="initialtimestamp", type="datetime")
     * @Assert\DateTime
     */
    private $initialTimestamp;

    /**
     * Constructor
     */
    public function __construct()
    {

    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getCaption(): ?string
    {
        return $this->caption;
    }

    public function setCaption(?string $caption): self
    {
        $this->caption = $caption;

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

    public function getSourceUrl(): ?string
    {
        return $this->sourceUrl;
    }

    public function setSourceUrl(?string $sourceUrl): self
    {
        $this->sourceUrl = $sourceUrl;

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

    public function getDisplayLevel(): ?int
    {
        return $this->displayLevel;
    }

    public function setDisplayLevel(int $displayLevel): self
    {
        $this->displayLevel = $displayLevel;

        return $this;
    }

    /**
     * @return int|null
     */
    public function getCreatedUserId(): ?int
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

    public function getNotes(): ?string
    {
        return $this->notes;
    }

    public function setNotes(?string $notes): self
    {
        $this->notes = $notes;

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
