<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * TraitDependencies
 *
 * @ORM\Table(name="tmtraitdependencies", indexes={@ORM\Index(name="FK_tmdepend_stateid_idx", columns={"parentstateid"}), @ORM\Index(name="FK_tmdepend_traitid_idx", columns={"traitid"})})
 * @ORM\Entity(repositoryClass="App\Repository\TraitDependenciesRepository")
 */
class TraitDependencies
{
    /**
     * @var int
     *
     * @ORM\Column(name="traitid", type="integer", nullable=false, options={"unsigned"=true})
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     */
    private $traitid;

    /**
     * @var \TraitStates
     *
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     * @ORM\OneToOne(targetEntity="TraitStates")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="parentstateid", referencedColumnName="stateid")
     * })
     */
    private $parentstateid;

    /**
     * @var \DateTime|null
     *
     * @ORM\Column(name="initialtimestamp", type="datetime", nullable=true, options={"default"="CURRENT_TIMESTAMP"})
     */
    private $initialtimestamp = 'CURRENT_TIMESTAMP';

    public function getTraitid(): ?int
    {
        return $this->traitid;
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

    public function getParentstateid(): ?TraitStates
    {
        return $this->parentstateid;
    }

    public function setParentstateid(?TraitStates $parentstateid): self
    {
        $this->parentstateid = $parentstateid;

        return $this;
    }


}
