<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * Glossary
 *
 * @ORM\Table(name="glossary", indexes={@ORM\Index(name="FK_glossary_uid_idx", columns={"createduid"}), @ORM\Index(name="Index_glossary_lang", columns={"language"}), @ORM\Index(name="Index_term", columns={"term"})})
 * @ORM\Entity(repositoryClass="App\Repository\GlossaryRepository")
 */
class Glossary
{
    /**
     * @var int
     *
     * @ORM\Column(name="glossid", type="integer", nullable=false, options={"unsigned"=true})
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $glossid;

    /**
     * @var string
     *
     * @ORM\Column(name="term", type="string", length=150, nullable=false)
     */
    private $term;

    /**
     * @var string|null
     *
     * @ORM\Column(name="definition", type="string", length=2000, nullable=true, options={"default"=NULL})
     */
    private $definition = 'NULL';

    /**
     * @var string
     *
     * @ORM\Column(name="language", type="string", length=45, nullable=false, options={"default"="English"})
     */
    private $language = 'English';

    /**
     * @var string|null
     *
     * @ORM\Column(name="source", type="string", length=1000, nullable=true, options={"default"=NULL})
     */
    private $source = 'NULL';

    /**
     * @var string|null
     *
     * @ORM\Column(name="translator", type="string", length=250, nullable=true, options={"default"=NULL})
     */
    private $translator = 'NULL';

    /**
     * @var string|null
     *
     * @ORM\Column(name="author", type="string", length=250, nullable=true, options={"default"=NULL})
     */
    private $author = 'NULL';

    /**
     * @var string|null
     *
     * @ORM\Column(name="notes", type="string", length=250, nullable=true, options={"default"=NULL})
     */
    private $notes = 'NULL';

    /**
     * @var string|null
     *
     * @ORM\Column(name="resourceurl", type="string", length=600, nullable=true, options={"default"=NULL})
     */
    private $resourceurl = 'NULL';

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

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="Taxa", inversedBy="glossid")
     * @ORM\JoinTable(name="glossarytaxalink",
     *   joinColumns={
     *     @ORM\JoinColumn(name="glossid", referencedColumnName="glossid")
     *   },
     *   inverseJoinColumns={
     *     @ORM\JoinColumn(name="tid", referencedColumnName="TID")
     *   }
     * )
     */
    private $tid;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->tid = new \Doctrine\Common\Collections\ArrayCollection();
    }

    public function getGlossid(): ?int
    {
        return $this->glossid;
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

    public function getResourceurl(): ?string
    {
        return $this->resourceurl;
    }

    public function setResourceurl(?string $resourceurl): self
    {
        $this->resourceurl = $resourceurl;

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

    /**
     * @return Collection|Taxa[]
     */
    public function getTid(): Collection
    {
        return $this->tid;
    }

    public function addTid(Taxa $tid): self
    {
        if (!$this->tid->contains($tid)) {
            $this->tid[] = $tid;
        }

        return $this;
    }

    public function removeTid(Taxa $tid): self
    {
        if ($this->tid->contains($tid)) {
            $this->tid->removeElement($tid);
        }

        return $this;
    }

}
