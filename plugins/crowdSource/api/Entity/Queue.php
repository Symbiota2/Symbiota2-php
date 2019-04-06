<?php

namespace CrowdSource\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Annotation\Groups;
use Symfony\Component\Validator\Constraints as Assert;
use Core\Entity\InitialTimestampInterface;
use Occurrence\Entity\Occurrences;
use Core\Entity\Users;

/**
 * Queue
 *
 * @ORM\Table(name="omcrowdsourcequeue", uniqueConstraints={@ORM\UniqueConstraint(name="Index_omcrowdsource_occid", columns={"occid"})}, indexes={@ORM\Index(name="FK_omcrowdsourcequeue_uid", columns={"uidprocessor"})})
 * @ORM\Entity()
 * @ApiResource(
 *     routePrefix="/crowdsource",
 *     itemOperations={"get"},
 *     collectionOperations={"get"}
 * )
 */
class Queue implements InitialTimestampInterface
{
    /**
     * @var int
     *
     * @ORM\Column(name="idomcrowdsourcequeue", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var \CrowdSource\Entity\Central
     *
     * @ORM\ManyToOne(targetEntity="CrowdSource\Entity\Central")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="omcsid", referencedColumnName="omcsid", nullable=false)
     * })
     */
    private $crowdSourceCentralId;

    /**
     * @var \Occurrence\Entity\Occurrences
     *
     * @ORM\ManyToOne(targetEntity="Occurrence\Entity\Occurrences")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="occid", referencedColumnName="occid", nullable=false)
     * })
     */
    private $occurrenceId;

    /**
     * @var int
     *
     * @ORM\Column(name="reviewstatus", type="integer", options={"comment"="0=open,5=pending review, 10=closed"})
     * @Assert\NotBlank()
     * @Assert\Type(type="integer")
     */
    private $reviewStatus;

    /**
     * @var \Core\Entity\Users
     *
     * @ORM\ManyToOne(targetEntity="Core\Entity\Users")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="uidprocessor", referencedColumnName="uid")
     * })
     * @Assert\NotBlank()
     */
    private $userIdProcessor;

    /**
     * @var int|null
     *
     * @ORM\Column(name="points", type="integer", nullable=true, options={"comment"="0=fail, 1=minor edits, 2=no edits <default>, 3=excelled"})
     * @Assert\Type(type="integer")
     */
    private $points;

    /**
     * @var int
     *
     * @ORM\Column(name="isvolunteer", type="integer", options={"default"="1"})
     * @Assert\NotBlank()
     * @Assert\Type(type="integer")
     */
    private $isVolunteer = 1;

    /**
     * @var string|null
     *
     * @ORM\Column(name="notes", type="string", length=250, nullable=true)
     * @Assert\Length(max=250)
     */
    private $notes;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="initialtimestamp", type="datetime")
     * @Assert\DateTime
     */
    private $initialTimestamp;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getCrowdSourceCentralId(): ?Central
    {
        return $this->crowdSourceCentralId;
    }

    public function setCrowdSourceCentralId(?Central $crowdSourceCentralId): self
    {
        $this->crowdSourceCentralId = $crowdSourceCentralId;

        return $this;
    }

    public function getReviewStatus(): ?int
    {
        return $this->reviewStatus;
    }

    public function setReviewStatus(int $reviewStatus): self
    {
        $this->reviewStatus = $reviewStatus;

        return $this;
    }

    public function getPoints(): ?int
    {
        return $this->points;
    }

    public function setPoints(?int $points): self
    {
        $this->points = $points;

        return $this;
    }

    public function getIsVolunteer(): ?int
    {
        return $this->isVolunteer;
    }

    public function setIsVolunteer(int $isVolunteer): self
    {
        $this->isVolunteer = $isVolunteer;

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

    public function getInitialTimestamp(): ?\DateTimeInterface
    {
        return $this->initialTimestamp;
    }

    public function setInitialTimestamp(\DateTimeInterface $initialTimestamp): InitialTimestampInterface
    {
        $this->initialTimestamp = $initialTimestamp;

        return $this;
    }

    public function getOccurrenceId(): ?Occurrences
    {
        return $this->occurrenceId;
    }

    public function setOccurrenceId(?Occurrences $occurrenceId): self
    {
        $this->occurrenceId = $occurrenceId;

        return $this;
    }

    public function getUserIdProcessor(): ?Users
    {
        return $this->userIdProcessor;
    }

    public function setUserIdProcessor(?Users $userIdProcessor): self
    {
        $this->userIdProcessor = $userIdProcessor;

        return $this;
    }


}
