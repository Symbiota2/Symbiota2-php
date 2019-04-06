<?php

namespace Taxa\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Annotation\Groups;
use Symfony\Component\Validator\Constraints as Assert;
use Core\Entity\InitialTimestampInterface;

/**
 * Relationships
 *
 * @ORM\Table(name="taxaenumtree", indexes={@ORM\Index(name="FK_tet_taxa", columns={"tid"}), @ORM\Index(name="FK_tet_taxa2", columns={"parenttid"}), @ORM\Index(name="FK_tet_taxauth", columns={"taxauthid"})})
 * @ORM\Entity()
 * @ApiResource(
 *     routePrefix="/taxa",
 *     itemOperations={"get"},
 *     collectionOperations={"get"}
 * )
 */
class Relationships implements InitialTimestampInterface
{
    /**
     * @var \Taxa\Entity\Taxa
     *
     * @ORM\Id
     * @ORM\OneToOne(targetEntity="Taxa\Entity\Taxa")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="tid", referencedColumnName="TID", nullable=false)
     * })
     */
    private $taxaId;

    /**
     * @var \Taxa\Entity\Authorities
     *
     * @ORM\Id
     * @ORM\OneToOne(targetEntity="Taxa\Entity\Authorities")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="taxauthid", referencedColumnName="taxauthid", nullable=false)
     * })
     */
    private $taxaAuthorityId;

    /**
     * @var \Taxa\Entity\Taxa
     *
     * @ORM\Id
     * @ORM\OneToOne(targetEntity="Taxa\Entity\Taxa")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="parenttid", referencedColumnName="TID", nullable=false)
     * })
     */
    private $parentTaxaId;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="initialtimestamp", type="datetime")
     * @Assert\DateTime
     */
    private $initialTimestamp;

    public function getInitialTimestamp(): ?\DateTimeInterface
    {
        return $this->initialTimestamp;
    }

    public function setInitialTimestamp(\DateTimeInterface $initialTimestamp): InitialTimestampInterface
    {
        $this->initialTimestamp = $initialTimestamp;

        return $this;
    }

    public function getTaxaAuthorityId(): ?Authorities
    {
        return $this->taxaAuthorityId;
    }

    public function setTaxaAuthorityId(?Authorities $taxaAuthorityId): self
    {
        $this->taxaAuthorityId = $taxaAuthorityId;

        return $this;
    }

    public function getParentTaxaId(): ?Taxa
    {
        return $this->parentTaxaId;
    }

    public function setParentTaxaId(?Taxa $parentTaxaId): self
    {
        $this->parentTaxaId = $parentTaxaId;

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
