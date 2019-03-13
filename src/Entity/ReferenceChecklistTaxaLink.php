<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Annotation\Groups;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * ReferenceChecklistTaxaLink
 *
 * @ORM\Table(name="referencechklsttaxalink", indexes={@ORM\Index(name="FK_refchktaxalink_clidtid_idx", columns={"clid", "tid"}), @ORM\Index(name="IDX_1B708068FB7281BE", columns={"refid"})})
 * @ORM\Entity(repositoryClass="App\Repository\ReferenceChecklistTaxaLinkRepository")
 * @ApiResource(
 *     itemOperations={"get"},
 *     collectionOperations={"get"}
 * )
 */
class ReferenceChecklistTaxaLink implements InitialTimestampInterface
{
    /**
     * @var \App\Entity\References
     *
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     * @ORM\OneToOne(targetEntity="\App\Entity\References")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="refid", referencedColumnName="refid")
     * })
     * @Assert\NotBlank()
     * @Assert\Type(type="integer")
     */
    private $referenceId;

    /**
     * @var int
     *
     * @ORM\Column(name="clid", type="integer", options={"unsigned"=true})
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     * @Assert\NotBlank()
     * @Assert\Type(type="integer")
     */
    private $checklistId;

    /**
     * @var int
     *
     * @ORM\Column(name="tid", type="integer", options={"unsigned"=true})
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     * @Assert\NotBlank()
     * @Assert\Type(type="integer")
     */
    private $taxaId;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="initialtimestamp", type="datetime")
     * @Assert\DateTime
     */
    private $initialTimestamp;

    public function getChecklistId(): ?int
    {
        return $this->checklistId;
    }

    public function getTaxaId(): ?int
    {
        return $this->taxaId;
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
