<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * ChecklistChildren
 *
 * @ORM\Table(name="fmchklstchildren", indexes={@ORM\Index(name="FK_fmchklstchild_clid_idx", columns={"clid"}), @ORM\Index(name="FK_fmchklstchild_child_idx", columns={"clidchild"})})
 * @ORM\Entity(repositoryClass="App\Repository\ChecklistChildrenRepository")
 */
class ChecklistChildren
{
    /**
     * @var \Checklists
     *
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     * @ORM\OneToOne(targetEntity="Checklists")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="clid", referencedColumnName="CLID")
     * })
     */
    private $clid;

    /**
     * @var int
     *
     * @ORM\Column(name="clidchild", type="integer", nullable=false, options={"unsigned"=true})
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     */
    private $clidchild;

    /**
     * @var int
     *
     * @ORM\Column(name="modifiedUid", type="integer", nullable=false, options={"unsigned"=true})
     */
    private $modifieduid;

    /**
     * @var \DateTime|null
     *
     * @ORM\Column(name="modifiedtimestamp", type="datetime", nullable=true, options={"default"=NULL})
     */
    private $modifiedtimestamp = 'NULL';

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="initialtimestamp", type="datetime", nullable=false, options={"default"="CURRENT_TIMESTAMP"})
     */
    private $initialtimestamp = 'CURRENT_TIMESTAMP';

    public function getClidchild(): ?int
    {
        return $this->clidchild;
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

    public function getClid(): ?Checklists
    {
        return $this->clid;
    }

    public function setClid(?Checklists $clid): self
    {
        $this->clid = $clid;

        return $this;
    }


}
