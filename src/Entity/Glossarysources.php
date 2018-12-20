<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Glossarysources
 *
 * @ORM\Table(name="glossarysources")
 * @ORM\Entity(repositoryClass="App\Repository\GlossarysourcesRepository")
 */
class Glossarysources
{
    /**
     * @var string|null
     *
     * @ORM\Column(name="contributorTerm", type="string", length=1000, nullable=true, options={"default"="NULL"})
     */
    private $contributorterm = 'NULL';

    /**
     * @var string|null
     *
     * @ORM\Column(name="contributorImage", type="string", length=1000, nullable=true, options={"default"="NULL"})
     */
    private $contributorimage = 'NULL';

    /**
     * @var string|null
     *
     * @ORM\Column(name="translator", type="string", length=1000, nullable=true, options={"default"="NULL"})
     */
    private $translator = 'NULL';

    /**
     * @var string|null
     *
     * @ORM\Column(name="additionalSources", type="string", length=1000, nullable=true, options={"default"="NULL"})
     */
    private $additionalsources = 'NULL';

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="initialtimestamp", type="datetime", nullable=false, options={"default"="current_timestamp()"})
     */
    private $initialtimestamp = 'current_timestamp()';

    /**
     * @var \Taxa
     *
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     * @ORM\OneToOne(targetEntity="Taxa")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="tid", referencedColumnName="TID")
     * })
     */
    private $tid;

    public function getContributorterm(): ?string
    {
        return $this->contributorterm;
    }

    public function setContributorterm(?string $contributorterm): self
    {
        $this->contributorterm = $contributorterm;

        return $this;
    }

    public function getContributorimage(): ?string
    {
        return $this->contributorimage;
    }

    public function setContributorimage(?string $contributorimage): self
    {
        $this->contributorimage = $contributorimage;

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

    public function getAdditionalsources(): ?string
    {
        return $this->additionalsources;
    }

    public function setAdditionalsources(?string $additionalsources): self
    {
        $this->additionalsources = $additionalsources;

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

    public function getTid(): ?Taxa
    {
        return $this->tid;
    }

    public function setTid(?Taxa $tid): self
    {
        $this->tid = $tid;

        return $this;
    }


}
