<?php


namespace Core\Entity;

/**
 * InitialTimestampTrait - This trait implements the initial timestamp.
 */
trait InitialTimestampTrait
{
    /**
     * @var \DateTime
     *
     * @ORM\Column(name="initialTimeStamp", type="datetime")
     * @Assert\DateTime
     */
    private $initialTimestamp;


    public function getInitialTimestamp(): ?\DateTimeInterface
    {
        return $this->initialTimestamp;
    }

    public function setInitialTimestamp(\DateTimeInterface $initialTimestamp)
    {
        $this->initialTimestamp = $initialTimestamp;

        //return $this;
    }

}