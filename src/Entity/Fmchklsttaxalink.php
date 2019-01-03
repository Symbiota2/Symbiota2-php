<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Fmchklsttaxalink
 *
 * @ORM\Table(name="fmchklsttaxalink", uniqueConstraints={@ORM\UniqueConstraint(name="FK_clidtidmorph_id", columns={"tid", "CLID", "morphospecies"})}, indexes={@ORM\Index(name="FK_chklsttaxalink_cid", columns={"CLID"})})
 * @ORM\Entity(repositoryClass="App\Repository\FmchklsttaxalinkRepository")
 */
class Fmchklsttaxalink
{
    /**
     * @var int
     *
     * @ORM\Column(name="cltlid", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $cltlid;

    /**
     * @var int
     *
     * @ORM\Column(name="tid", type="integer", nullable=false, options={"unsigned"=true})
     */
    private $tid;

    /**
     * @var int
     *
     * @ORM\Column(name="CLID", type="integer", nullable=false, options={"unsigned"=true})
     */
    private $clid;

    /**
     * @var string
     *
     * @ORM\Column(name="morphospecies", type="string", length=45, nullable=false)
     */
    private $morphospecies;

    /**
     * @var string|null
     *
     * @ORM\Column(name="familyoverride", type="string", length=50, nullable=true, options={"default"=NULL})
     */
    private $familyoverride = 'NULL';

    /**
     * @var string|null
     *
     * @ORM\Column(name="Habitat", type="string", length=250, nullable=true, options={"default"=NULL})
     */
    private $habitat = 'NULL';

    /**
     * @var string|null
     *
     * @ORM\Column(name="Abundance", type="string", length=50, nullable=true, options={"default"=NULL})
     */
    private $abundance = 'NULL';

    /**
     * @var string|null
     *
     * @ORM\Column(name="Notes", type="string", length=2000, nullable=true, options={"default"=NULL})
     */
    private $notes = 'NULL';

    /**
     * @var int|null
     *
     * @ORM\Column(name="explicitExclude", type="smallint", nullable=true, options={"default"=NULL})
     */
    private $explicitexclude = 'NULL';

    /**
     * @var string|null
     *
     * @ORM\Column(name="source", type="string", length=250, nullable=true, options={"default"=NULL})
     */
    private $source = 'NULL';

    /**
     * @var string|null
     *
     * @ORM\Column(name="Nativity", type="string", length=50, nullable=true, options={"default"=NULL,"comment"="native, introducted"})
     */
    private $nativity = 'NULL';

    /**
     * @var string|null
     *
     * @ORM\Column(name="Endemic", type="string", length=45, nullable=true, options={"default"=NULL})
     */
    private $endemic = 'NULL';

    /**
     * @var string|null
     *
     * @ORM\Column(name="invasive", type="string", length=45, nullable=true, options={"default"=NULL})
     */
    private $invasive = 'NULL';

    /**
     * @var string|null
     *
     * @ORM\Column(name="internalnotes", type="string", length=250, nullable=true, options={"default"=NULL})
     */
    private $internalnotes = 'NULL';

    /**
     * @var string|null
     *
     * @ORM\Column(name="dynamicProperties", type="text", length=65535, nullable=true, options={"default"=NULL})
     */
    private $dynamicproperties = 'NULL';

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="InitialTimeStamp", type="datetime", nullable=false, options={"default"="CURRENT_TIMESTAMP"})
     */
    private $initialtimestamp = 'CURRENT_TIMESTAMP';

    public function getCltlid(): ?int
    {
        return $this->cltlid;
    }

    public function getTid(): ?int
    {
        return $this->tid;
    }

    public function setTid(int $tid): self
    {
        $this->tid = $tid;

        return $this;
    }

    public function getClid(): ?int
    {
        return $this->clid;
    }

    public function setClid(int $clid): self
    {
        $this->clid = $clid;

        return $this;
    }

    public function getMorphospecies(): ?string
    {
        return $this->morphospecies;
    }

    public function setMorphospecies(string $morphospecies): self
    {
        $this->morphospecies = $morphospecies;

        return $this;
    }

    public function getFamilyoverride(): ?string
    {
        return $this->familyoverride;
    }

    public function setFamilyoverride(?string $familyoverride): self
    {
        $this->familyoverride = $familyoverride;

        return $this;
    }

    public function getHabitat(): ?string
    {
        return $this->habitat;
    }

    public function setHabitat(?string $habitat): self
    {
        $this->habitat = $habitat;

        return $this;
    }

    public function getAbundance(): ?string
    {
        return $this->abundance;
    }

    public function setAbundance(?string $abundance): self
    {
        $this->abundance = $abundance;

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

    public function getExplicitexclude(): ?int
    {
        return $this->explicitexclude;
    }

    public function setExplicitexclude(?int $explicitexclude): self
    {
        $this->explicitexclude = $explicitexclude;

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

    public function getNativity(): ?string
    {
        return $this->nativity;
    }

    public function setNativity(?string $nativity): self
    {
        $this->nativity = $nativity;

        return $this;
    }

    public function getEndemic(): ?string
    {
        return $this->endemic;
    }

    public function setEndemic(?string $endemic): self
    {
        $this->endemic = $endemic;

        return $this;
    }

    public function getInvasive(): ?string
    {
        return $this->invasive;
    }

    public function setInvasive(?string $invasive): self
    {
        $this->invasive = $invasive;

        return $this;
    }

    public function getInternalnotes(): ?string
    {
        return $this->internalnotes;
    }

    public function setInternalnotes(?string $internalnotes): self
    {
        $this->internalnotes = $internalnotes;

        return $this;
    }

    public function getDynamicproperties(): ?string
    {
        return $this->dynamicproperties;
    }

    public function setDynamicproperties(?string $dynamicproperties): self
    {
        $this->dynamicproperties = $dynamicproperties;

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
