<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Annotation\Groups;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * OccurrenceFullText
 *
 * @ORM\Table(name="omoccurrencesfulltext", indexes={@ORM\Index(name="ft_occur_locality", columns={"locality"}, flags={"fulltext"}), @ORM\Index(name="ft_occur_recordedby", columns={"recordedby"})})
 * @ORM\Entity(repositoryClass="App\Repository\OccurrenceFullTextRepository")
 * @ApiResource(
 *     itemOperations={"get"},
 *     collectionOperations={"get"}
 * )
 */
class OccurrenceFullText
{
    /**
     * @var int
     *
     * @ORM\Column(name="occid", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     * @Assert\Type(type="integer")
     */
    private $occurrenceId;

    /**
     * @var string|null
     *
     * @ORM\Column(name="locality", type="text", length=65535, nullable=true)
     * @Assert\Length(max=65535)
     */
    private $locality;

    /**
     * @var string|null
     *
     * @ORM\Column(name="recordedby", type="string", length=255, nullable=true)
     * @Assert\Length(max=255)
     */
    private $recordedBy;

    public function getOccurrenceId(): ?int
    {
        return $this->occurrenceId;
    }

    public function getLocality(): ?string
    {
        return $this->locality;
    }

    public function setLocality(?string $locality): self
    {
        $this->locality = $locality;

        return $this;
    }

    public function getRecordedBy(): ?string
    {
        return $this->recordedBy;
    }

    public function setRecordedBy(?string $recordedBy): self
    {
        $this->recordedBy = $recordedBy;

        return $this;
    }


}
