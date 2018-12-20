<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Configpage
 *
 * @ORM\Table(name="configpage")
 * @ORM\Entity(repositoryClass="App\Repository\ConfigpageRepository")
 */
class Configpage
{
    /**
     * @var int
     *
     * @ORM\Column(name="configpageid", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $configpageid;

    /**
     * @var string
     *
     * @ORM\Column(name="pagename", type="string", length=45, nullable=false)
     */
    private $pagename;

    /**
     * @var string
     *
     * @ORM\Column(name="title", type="string", length=150, nullable=false)
     */
    private $title;

    /**
     * @var string|null
     *
     * @ORM\Column(name="cssname", type="string", length=45, nullable=true, options={"default"="NULL"})
     */
    private $cssname = 'NULL';

    /**
     * @var string
     *
     * @ORM\Column(name="language", type="string", length=45, nullable=false, options={"default"="'english'"})
     */
    private $language = '\'english\'';

    /**
     * @var int|null
     *
     * @ORM\Column(name="displaymode", type="integer", nullable=true, options={"default"="NULL"})
     */
    private $displaymode = 'NULL';

    /**
     * @var string|null
     *
     * @ORM\Column(name="notes", type="string", length=250, nullable=true, options={"default"="NULL"})
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
     * @ORM\Column(name="modifiedtimestamp", type="datetime", nullable=true, options={"default"="NULL"})
     */
    private $modifiedtimestamp = 'NULL';

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="initialtimestamp", type="datetime", nullable=false, options={"default"="current_timestamp()"})
     */
    private $initialtimestamp = 'current_timestamp()';

    public function getConfigpageid(): ?int
    {
        return $this->configpageid;
    }

    public function getPagename(): ?string
    {
        return $this->pagename;
    }

    public function setPagename(string $pagename): self
    {
        $this->pagename = $pagename;

        return $this;
    }

    public function getTitle(): ?string
    {
        return $this->title;
    }

    public function setTitle(string $title): self
    {
        $this->title = $title;

        return $this;
    }

    public function getCssname(): ?string
    {
        return $this->cssname;
    }

    public function setCssname(?string $cssname): self
    {
        $this->cssname = $cssname;

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

    public function getDisplaymode(): ?int
    {
        return $this->displaymode;
    }

    public function setDisplaymode(?int $displaymode): self
    {
        $this->displaymode = $displaymode;

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


}
