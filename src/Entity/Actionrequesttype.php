<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Actionrequesttype
 *
 * @ORM\Table(name="actionrequesttype")
 * @ORM\Entity(repositoryClass="App\Repository\ActionrequesttypeRepository")
 */
class Actionrequesttype
{
    /**
     * @var string
     *
     * @ORM\Column(name="requesttype", type="string", length=30, nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $requesttype;

    /**
     * @var string|null
     *
     * @ORM\Column(name="context", type="string", length=255, nullable=true, options={"default"="NULL"})
     */
    private $context = 'NULL';

    /**
     * @var string|null
     *
     * @ORM\Column(name="description", type="string", length=255, nullable=true, options={"default"="NULL"})
     */
    private $description = 'NULL';

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="initialtimestamp", type="datetime", nullable=false, options={"default"="current_timestamp()"})
     */
    private $initialtimestamp = 'current_timestamp()';

    public function getRequesttype(): ?string
    {
        return $this->requesttype;
    }

    public function getContext(): ?string
    {
        return $this->context;
    }

    public function setContext(?string $context): self
    {
        $this->context = $context;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(?string $description): self
    {
        $this->description = $description;

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
