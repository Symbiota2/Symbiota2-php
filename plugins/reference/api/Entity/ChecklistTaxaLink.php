<?php

namespace Reference\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Annotation\Groups;
use Symfony\Component\Validator\Constraints as Assert;
use Checklist\Entity\Checklists;
use Core\Entity\InitialTimestampInterface;
use Taxa\Entity\Taxa;

/**
 * ChecklistTaxaLink
 *
 * @ORM\Table(name="referencechklsttaxalink", indexes={@ORM\Index(name="FK_refchktaxalink_clidtid_idx", columns={"clid", "tid"}), @ORM\Index(name="IDX_1B708068FB7281BE", columns={"refid"})})
 * @ORM\Entity()
 * @ApiResource(
 *     routePrefix="/reference",
 *     itemOperations={"get"},
 *     collectionOperations={"get"}
 * )
 */
class ChecklistTaxaLink implements InitialTimestampInterface
{
    /**
     * @var \Reference\Entity\References
     *
     * @ORM\Id
     * @ORM\ManyToOne(targetEntity="Reference\Entity\References")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="refid", referencedColumnName="refid", nullable=false)
     * })
     */
    private $referenceId;

    /**
     * @var \Checklist\Entity\Checklists
     *
     * @ORM\Id
     * @ORM\ManyToOne(targetEntity="Checklist\Entity\Checklists")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="clid", referencedColumnName="CLID", nullable=false)
     * })
     */
    private $checklistId;

    /**
     * @var \Taxa\Entity\Taxa
     *
     * @ORM\Id
     * @ORM\ManyToOne(targetEntity="Taxa\Entity\Taxa")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="tid", referencedColumnName="TID", nullable=false)
     * })
     */
    private $taxaId;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="initialtimestamp", type="datetime")
     * @Assert\DateTime
     */
    private $initialTimestamp;

    public function getChecklistId(): ?Checklists
    {
        return $this->checklistId;
    }

    public function setChecklistId(?Checklists $checklistId): self
    {
        $this->checklistId = $checklistId;

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

    public function getInitialTimestamp(): ?\DateTimeInterface
    {
        return $this->initialTimestamp;
    }

    public function setInitialTimestamp(\DateTimeInterface $initialTimestamp): InitialTimestampInterface
    {
        $this->initialTimestamp = $initialTimestamp;

        return $this;
    }

    public function getReferenceId(): ?References
    {
        return $this->referenceId;
    }

    public function setReferenceId(?References $referenceId): self
    {
        $this->referenceId = $referenceId;

        return $this;
    }


}
