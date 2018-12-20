<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Uploadglossary
 *
 * @ORM\Table(name="uploadglossary", indexes={@ORM\Index(name="relatedterm_index", columns={"newGroupId"}), @ORM\Index(name="term_index", columns={"term"})})
 * @ORM\Entity(repositoryClass="App\Repository\UploadglossaryRepository")
 */
class Uploadglossary
{
    /**
     * @var int
     *
     * @ORM\Column(name="upgid", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $upgid;

    /**
     * @var string|null
     *
     * @ORM\Column(name="term", type="string", length=150, nullable=true, options={"default"="NULL"})
     */
    private $term = 'NULL';

    /**
     * @var string|null
     *
     * @ORM\Column(name="definition", type="string", length=1000, nullable=true, options={"default"="NULL"})
     */
    private $definition = 'NULL';

    /**
     * @var string|null
     *
     * @ORM\Column(name="language", type="string", length=45, nullable=true, options={"default"="NULL"})
     */
    private $language = 'NULL';

    /**
     * @var string|null
     *
     * @ORM\Column(name="source", type="string", length=1000, nullable=true, options={"default"="NULL"})
     */
    private $source = 'NULL';

    /**
     * @var string|null
     *
     * @ORM\Column(name="author", type="string", length=250, nullable=true, options={"default"="NULL"})
     */
    private $author = 'NULL';

    /**
     * @var string|null
     *
     * @ORM\Column(name="translator", type="string", length=250, nullable=true, options={"default"="NULL"})
     */
    private $translator = 'NULL';

    /**
     * @var string|null
     *
     * @ORM\Column(name="notes", type="string", length=250, nullable=true, options={"default"="NULL"})
     */
    private $notes = 'NULL';

    /**
     * @var string|null
     *
     * @ORM\Column(name="resourceurl", type="string", length=600, nullable=true, options={"default"="NULL"})
     */
    private $resourceurl = 'NULL';

    /**
     * @var string|null
     *
     * @ORM\Column(name="tidStr", type="string", length=100, nullable=true, options={"default"="NULL"})
     */
    private $tidstr = 'NULL';

    /**
     * @var bool|null
     *
     * @ORM\Column(name="synonym", type="boolean", nullable=true, options={"default"="NULL"})
     */
    private $synonym = 'NULL';

    /**
     * @var int|null
     *
     * @ORM\Column(name="newGroupId", type="integer", nullable=true, options={"default"="NULL"})
     */
    private $newgroupid = 'NULL';

    /**
     * @var int|null
     *
     * @ORM\Column(name="currentGroupId", type="integer", nullable=true, options={"default"="NULL"})
     */
    private $currentgroupid = 'NULL';

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="InitialTimeStamp", type="datetime", nullable=false, options={"default"="current_timestamp()"})
     */
    private $initialtimestamp = 'current_timestamp()';

    public function getUpgid(): ?int
    {
        return $this->upgid;
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

    public function getResourceurl(): ?string
    {
        return $this->resourceurl;
    }

    public function setResourceurl(?string $resourceurl): self
    {
        $this->resourceurl = $resourceurl;

        return $this;
    }

    public function getTidstr(): ?string
    {
        return $this->tidstr;
    }

    public function setTidstr(?string $tidstr): self
    {
        $this->tidstr = $tidstr;

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

    public function getNewgroupid(): ?int
    {
        return $this->newgroupid;
    }

    public function setNewgroupid(?int $newgroupid): self
    {
        $this->newgroupid = $newgroupid;

        return $this;
    }

    public function getCurrentgroupid(): ?int
    {
        return $this->currentgroupid;
    }

    public function setCurrentgroupid(?int $currentgroupid): self
    {
        $this->currentgroupid = $currentgroupid;

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


}
