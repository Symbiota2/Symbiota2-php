<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Ctrelationshiptypes
 *
 * @ORM\Table(name="ctrelationshiptypes")
 * @ORM\Entity(repositoryClass="App\Repository\CtrelationshiptypesRepository")
 */
class Ctrelationshiptypes
{
    /**
     * @var string
     *
     * @ORM\Column(name="relationship", type="string", length=50, nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $relationship;

    /**
     * @var string|null
     *
     * @ORM\Column(name="inverse", type="string", length=50, nullable=true, options={"default"="NULL"})
     */
    private $inverse = 'NULL';

    /**
     * @var string|null
     *
     * @ORM\Column(name="collective", type="string", length=50, nullable=true, options={"default"="NULL"})
     */
    private $collective = 'NULL';

    public function getRelationship(): ?string
    {
        return $this->relationship;
    }

    public function getInverse(): ?string
    {
        return $this->inverse;
    }

    public function setInverse(?string $inverse): self
    {
        $this->inverse = $inverse;

        return $this;
    }

    public function getCollective(): ?string
    {
        return $this->collective;
    }

    public function setCollective(?string $collective): self
    {
        $this->collective = $collective;

        return $this;
    }


}
