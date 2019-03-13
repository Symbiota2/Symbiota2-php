<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Security\Core\User\UserInterface;
use Symfony\Component\Serializer\Annotation\Groups;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * OccurrenceEditLocks
 *
 * @ORM\Table(name="omoccureditlocks")
 * @ORM\Entity(repositoryClass="App\Repository\OccurrenceEditLocksRepository")
 * @ApiResource(
 *     itemOperations={"get"},
 *     collectionOperations={"get"}
 * )
 */
class OccurrenceEditLocks implements CreatedUserIdInterface, InitialTimestampInterface
{
    /**
     * @var int
     *
     * @ORM\Column(name="occid", type="integer", options={"unsigned"=true})
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     * @Assert\NotBlank()
     * @Assert\Type(type="integer")
     */
    private $occurrenceId;

    /**
     * @var int
     *
     * @ORM\Column(name="createduid", type="integer")
     * @Assert\NotBlank()
     * @Assert\Type(type="integer")
     */
    private $createdUserId;

    /**
     * @var int
     *
     * @ORM\Column(name="ts", type="integer")
     * @Assert\NotBlank()
     * @Assert\Type(type="integer")
     */
    private $timeInSeconds;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="initialtimestamp", type="datetime")
     * @Assert\DateTime
     */
    private $initialTimestamp;

    public function getOccurrenceId(): ?int
    {
        return $this->occurrenceId;
    }

    /**
     * @return int|null
     */
    public function getCreatedUserId(): ?int
    {
        return $this->createdUserId;
    }

    /**
     * @param UserInterface $createdUserId
     * @return CreatedUserIdInterface
     */
    public function setCreatedUserId(UserInterface $createdUserId): CreatedUserIdInterface
    {
        $this->createdUserId = $createdUserId;

        return $this;
    }

    public function getTimeInSeconds(): ?int
    {
        return $this->timeInSeconds;
    }

    public function setTimeInSeconds(int $timeInSeconds): self
    {
        $this->timeInSeconds = $timeInSeconds;

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


}
