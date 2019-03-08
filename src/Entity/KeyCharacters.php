<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * KeyCharacters
 *
 * @ORM\Table(name="kmcharacters", indexes={@ORM\Index(name="FK_charheading_idx", columns={"hid"}), @ORM\Index(name="Index_sort", columns={"sortsequence"}), @ORM\Index(name="Index_charname", columns={"charname"})})
 * @ORM\Entity(repositoryClass="App\Repository\KeyCharactersRepository")
 */
class KeyCharacters
{
    /**
     * @var int
     *
     * @ORM\Column(name="cid", type="integer", nullable=false, options={"unsigned"=true})
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $cid;

    /**
     * @var string
     *
     * @ORM\Column(name="charname", type="string", length=150, nullable=false)
     */
    private $charname;

    /**
     * @var string
     *
     * @ORM\Column(name="chartype", type="string", length=2, nullable=false, options={"default"="UM"})
     */
    private $chartype = 'UM';

    /**
     * @var string
     *
     * @ORM\Column(name="defaultlang", type="string", length=45, nullable=false, options={"default"="English"})
     */
    private $defaultlang = 'English';

    /**
     * @var int
     *
     * @ORM\Column(name="difficultyrank", type="smallint", nullable=false, options={"default"="1","unsigned"=true})
     */
    private $difficultyrank = '1';

    /**
     * @var \KeyCharacterHeading
     *
     * @ORM\ManyToOne(targetEntity="KeyCharacterHeading")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="hid", referencedColumnName="hid")
     * })
     */
    private $hid;

    /**
     * @var string|null
     *
     * @ORM\Column(name="units", type="string", length=45, nullable=true, options={"default"=NULL})
     */
    private $units = 'NULL';

    /**
     * @var string|null
     *
     * @ORM\Column(name="description", type="string", length=255, nullable=true, options={"default"=NULL})
     */
    private $description = 'NULL';

    /**
     * @var string|null
     *
     * @ORM\Column(name="notes", type="string", length=255, nullable=true, options={"default"=NULL})
     */
    private $notes = 'NULL';

    /**
     * @var string|null
     *
     * @ORM\Column(name="helpurl", type="string", length=500, nullable=true, options={"default"=NULL})
     */
    private $helpurl = 'NULL';

    /**
     * @var string|null
     *
     * @ORM\Column(name="enteredby", type="string", length=45, nullable=true, options={"default"=NULL})
     */
    private $enteredby = 'NULL';

    /**
     * @var int|null
     *
     * @ORM\Column(name="sortsequence", type="integer", nullable=true, options={"default"=NULL,"unsigned"=true})
     */
    private $sortsequence = 'NULL';

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="initialtimestamp", type="datetime", nullable=false, options={"default"="CURRENT_TIMESTAMP"})
     */
    private $initialtimestamp = 'CURRENT_TIMESTAMP';

    /**
     * @var string|null
     *
     * @ORM\Column(name="display", type="string", length=45, nullable=true, options={"default"=NULL})
     */
    private $display = 'NULL';

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="LookupLanguages", inversedBy="cid")
     * @ORM\JoinTable(name="kmcharacterlang",
     *   joinColumns={
     *     @ORM\JoinColumn(name="cid", referencedColumnName="cid")
     *   },
     *   inverseJoinColumns={
     *     @ORM\JoinColumn(name="langid", referencedColumnName="langid")
     *   }
     * )
     */
    private $langid;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="Taxa", mappedBy="cid")
     */
    private $tid;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->langid = new \Doctrine\Common\Collections\ArrayCollection();
        $this->tid = new \Doctrine\Common\Collections\ArrayCollection();
    }

    public function getCid(): ?int
    {
        return $this->cid;
    }

    public function getCharname(): ?string
    {
        return $this->charname;
    }

    public function setCharname(string $charname): self
    {
        $this->charname = $charname;

        return $this;
    }

    public function getChartype(): ?string
    {
        return $this->chartype;
    }

    public function setChartype(string $chartype): self
    {
        $this->chartype = $chartype;

        return $this;
    }

    public function getDefaultlang(): ?string
    {
        return $this->defaultlang;
    }

    public function setDefaultlang(string $defaultlang): self
    {
        $this->defaultlang = $defaultlang;

        return $this;
    }

    public function getDifficultyrank(): ?int
    {
        return $this->difficultyrank;
    }

    public function setDifficultyrank(int $difficultyrank): self
    {
        $this->difficultyrank = $difficultyrank;

        return $this;
    }

    public function getUnits(): ?string
    {
        return $this->units;
    }

    public function setUnits(?string $units): self
    {
        $this->units = $units;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(?string $description): self
    {
        $this->description = $description;

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

    public function getHelpurl(): ?string
    {
        return $this->helpurl;
    }

    public function setHelpurl(?string $helpurl): self
    {
        $this->helpurl = $helpurl;

        return $this;
    }

    public function getEnteredby(): ?string
    {
        return $this->enteredby;
    }

    public function setEnteredby(?string $enteredby): self
    {
        $this->enteredby = $enteredby;

        return $this;
    }

    public function getSortsequence(): ?int
    {
        return $this->sortsequence;
    }

    public function setSortsequence(?int $sortsequence): self
    {
        $this->sortsequence = $sortsequence;

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

    public function getDisplay(): ?string
    {
        return $this->display;
    }

    public function setDisplay(?string $display): self
    {
        $this->display = $display;

        return $this;
    }

    public function getHid(): ?KeyCharacterHeading
    {
        return $this->hid;
    }

    public function setHid(?KeyCharacterHeading $hid): self
    {
        $this->hid = $hid;

        return $this;
    }

    /**
     * @return Collection|LookupLanguages[]
     */
    public function getLangid(): Collection
    {
        return $this->langid;
    }

    public function addLangid(LookupLanguages $langid): self
    {
        if (!$this->langid->contains($langid)) {
            $this->langid[] = $langid;
        }

        return $this;
    }

    public function removeLangid(LookupLanguages $langid): self
    {
        if ($this->langid->contains($langid)) {
            $this->langid->removeElement($langid);
        }

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
            $tid->addCid($this);
        }

        return $this;
    }

    public function removeTid(Taxa $tid): self
    {
        if ($this->tid->contains($tid)) {
            $this->tid->removeElement($tid);
            $tid->removeCid($this);
        }

        return $this;
    }

}
