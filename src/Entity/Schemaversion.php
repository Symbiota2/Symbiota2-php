<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Schemaversion
 *
 * @ORM\Table(name="schemaversion", uniqueConstraints={@ORM\UniqueConstraint(name="versionnumber_UNIQUE", columns={"versionnumber"})})
 * @ORM\Entity(repositoryClass="App\Repository\SchemaversionRepository")
 */
class Schemaversion
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="versionnumber", type="string", length=20, nullable=false)
     */
    private $versionnumber;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="dateapplied", type="datetime", nullable=false, options={"default"="current_timestamp()"})
     */
    private $dateapplied = 'current_timestamp()';

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getVersionnumber(): ?string
    {
        return $this->versionnumber;
    }

    public function setVersionnumber(string $versionnumber): self
    {
        $this->versionnumber = $versionnumber;

        return $this;
    }

    public function getDateapplied(): ?\DateTimeInterface
    {
        return $this->dateapplied;
    }

    public function setDateapplied(\DateTimeInterface $dateapplied): self
    {
        $this->dateapplied = $dateapplied;

        return $this;
    }


}
