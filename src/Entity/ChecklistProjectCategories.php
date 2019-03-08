<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * ChecklistProjectCategories
 *
 * @ORM\Table(name="fmprojectcategories", indexes={@ORM\Index(name="FK_fmprojcat_pid_idx", columns={"pid"})})
 * @ORM\Entity(repositoryClass="App\Repository\ChecklistProjectCategoriesRepository")
 */
class ChecklistProjectCategories
{
    /**
     * @var int
     *
     * @ORM\Column(name="projcatid", type="integer", nullable=false, options={"unsigned"=true})
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $projcatid;

    /**
     * @var \ChecklistProjects
     *
     * @ORM\ManyToOne(targetEntity="ChecklistProjects")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="pid", referencedColumnName="pid")
     * })
     */
    private $pid;

    /**
     * @var string
     *
     * @ORM\Column(name="categoryname", type="string", length=150, nullable=false)
     */
    private $categoryname;

    /**
     * @var string|null
     *
     * @ORM\Column(name="managers", type="string", length=100, nullable=true, options={"default"=NULL})
     */
    private $managers = 'NULL';

    /**
     * @var string|null
     *
     * @ORM\Column(name="description", type="string", length=250, nullable=true, options={"default"=NULL})
     */
    private $description = 'NULL';

    /**
     * @var int|null
     *
     * @ORM\Column(name="parentpid", type="integer", nullable=true, options={"default"=NULL})
     */
    private $parentpid = 'NULL';

    /**
     * @var int|null
     *
     * @ORM\Column(name="occurrencesearch", type="integer", nullable=true, options={"default"=NULL})
     */
    private $occurrencesearch = 'NULL';

    /**
     * @var int|null
     *
     * @ORM\Column(name="ispublic", type="integer", nullable=true, options={"default"="1"})
     */
    private $ispublic = '1';

    /**
     * @var string|null
     *
     * @ORM\Column(name="notes", type="string", length=250, nullable=true, options={"default"=NULL})
     */
    private $notes = 'NULL';

    /**
     * @var int|null
     *
     * @ORM\Column(name="sortsequence", type="integer", nullable=true, options={"default"=NULL})
     */
    private $sortsequence = 'NULL';

    /**
     * @var \DateTime|null
     *
     * @ORM\Column(name="initialtimestamp", type="datetime", nullable=true, options={"default"="CURRENT_TIMESTAMP"})
     */
    private $initialtimestamp = 'CURRENT_TIMESTAMP';

    public function getProjcatid(): ?int
    {
        return $this->projcatid;
    }

    public function getCategoryname(): ?string
    {
        return $this->categoryname;
    }

    public function setCategoryname(string $categoryname): self
    {
        $this->categoryname = $categoryname;

        return $this;
    }

    public function getManagers(): ?string
    {
        return $this->managers;
    }

    public function setManagers(?string $managers): self
    {
        $this->managers = $managers;

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

    public function getParentpid(): ?int
    {
        return $this->parentpid;
    }

    public function setParentpid(?int $parentpid): self
    {
        $this->parentpid = $parentpid;

        return $this;
    }

    public function getOccurrencesearch(): ?int
    {
        return $this->occurrencesearch;
    }

    public function setOccurrencesearch(?int $occurrencesearch): self
    {
        $this->occurrencesearch = $occurrencesearch;

        return $this;
    }

    public function getIspublic(): ?int
    {
        return $this->ispublic;
    }

    public function setIspublic(?int $ispublic): self
    {
        $this->ispublic = $ispublic;

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

    public function setInitialtimestamp(?\DateTimeInterface $initialtimestamp): self
    {
        $this->initialtimestamp = $initialtimestamp;

        return $this;
    }

    public function getPid(): ?ChecklistProjects
    {
        return $this->pid;
    }

    public function setPid(?ChecklistProjects $pid): self
    {
        $this->pid = $pid;

        return $this;
    }


}
