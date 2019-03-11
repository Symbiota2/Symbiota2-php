<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Annotation\Groups;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * GlossarySources
 *
 * @ORM\Table(name="glossarysources")
 * @ORM\Entity(repositoryClass="App\Repository\GlossarySourcesRepository")
 * @ApiResource(
 *     itemOperations={"get"},
 *     collectionOperations={"get"}
 * )
 */
class GlossarySources implements InitialTimestampInterface
{
    /**
     * @var \App\Entity\Taxa
     *
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     * @ORM\OneToOne(targetEntity="\App\Entity\Taxa")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="tid", referencedColumnName="TID")
     * })
     * @Assert\NotBlank()
     */
    private $taxaId;

    /**
     * @var string|null
     *
     * @ORM\Column(name="contributorTerm", type="string", length=1000, nullable=true)
     * @Assert\Length(max=1000)
     */
    private $contributorTerm;

    /**
     * @var string|null
     *
     * @ORM\Column(name="contributorImage", type="string", length=1000, nullable=true)
     * @Assert\Length(max=1000)
     */
    private $contributorImage;

    /**
     * @var string|null
     *
     * @ORM\Column(name="translator", type="string", length=1000, nullable=true)
     * @Assert\Length(max=1000)
     */
    private $translator;

    /**
     * @var string|null
     *
     * @ORM\Column(name="additionalSources", type="string", length=1000, nullable=true)
     * @Assert\Length(max=1000)
     */
    private $additionalSources;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="initialtimestamp", type="datetime")
     * @Assert\NotBlank()
     */
    private $initialTimestamp;

    public function getContributorTerm(): ?string
    {
        return $this->contributorTerm;
    }

    public function setContributorTerm(?string $contributorTerm): self
    {
        $this->contributorTerm = $contributorTerm;

        return $this;
    }

    public function getContributorImage(): ?string
    {
        return $this->contributorImage;
    }

    public function setContributorImage(?string $contributorImage): self
    {
        $this->contributorImage = $contributorImage;

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

    public function getAdditionalSources(): ?string
    {
        return $this->additionalSources;
    }

    public function setAdditionalSources(?string $additionalSources): self
    {
        $this->additionalSources = $additionalSources;

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

    public function getTaxaId(): ?Taxa
    {
        return $this->taxaId;
    }

    public function setTaxaId(?Taxa $taxaId): self
    {
        $this->taxaId = $taxaId;

        return $this;
    }


}
