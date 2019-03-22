<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Annotation\Groups;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * LookupLanguages
 *
 * @ORM\Table(name="adminlanguages", uniqueConstraints={@ORM\UniqueConstraint(name="index_langname_unique", columns={"langname"})})
 * @ORM\Entity(repositoryClass="App\Repository\LookupLanguagesRepository")
 * @ApiResource(
 *     itemOperations={"get"},
 *     collectionOperations={"get"}
 * )
 */
class LookupLanguages implements InitialTimestampInterface
{
    /**
     * @var int
     *
     * @ORM\Column(name="langid", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="langname", type="string", length=45)
     * @Assert\NotBlank()
     * @Assert\Length(max=45)
     */
    private $languageName;

    /**
     * @var string|null
     *
     * @ORM\Column(name="iso639_1", type="string", length=10, nullable=true)
     * @Assert\Length(max=10)
     */
    private $iso6391;

    /**
     * @var string|null
     *
     * @ORM\Column(name="iso639_2", type="string", length=10, nullable=true)
     * @Assert\Length(max=10)
     */
    private $iso6392;

    /**
     * @var string|null
     *
     * @ORM\Column(name="notes", type="string", length=45, nullable=true)
     * @Assert\Length(max=45)
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
        $this->characterId = new \Doctrine\Common\Collections\ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getLanguageName(): ?string
    {
        return $this->languageName;
    }

    public function setLanguageName(string $languageName): self
    {
        $this->languageName = $languageName;

        return $this;
    }

    public function getIso6391(): ?string
    {
        return $this->iso6391;
    }

    public function setIso6391(?string $iso6391): self
    {
        $this->iso6391 = $iso6391;

        return $this;
    }

    public function getIso6392(): ?string
    {
        return $this->iso6392;
    }

    public function setIso6392(?string $iso6392): self
    {
        $this->iso6392 = $iso6392;

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

}
