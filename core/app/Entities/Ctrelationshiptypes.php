<?php

namespace App\Entities;

use Doctrine\ORM\Mapping as ORM;

/**
 * Ctrelationshiptypes
 *
 * @ORM\Table(name="ctrelationshiptypes")
 * @ORM\Entity
 */
class Ctrelationshiptypes
{
    /**
     * @var string
     *
     * @ORM\Column(name="relationship", type="string", length=50, precision=0, scale=0, nullable=false, unique=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $relationship;

    /**
     * @var string|null
     *
     * @ORM\Column(name="inverse", type="string", length=50, precision=0, scale=0, nullable=true, unique=false)
     */
    private $inverse;

    /**
     * @var string|null
     *
     * @ORM\Column(name="collective", type="string", length=50, precision=0, scale=0, nullable=true, unique=false)
     */
    private $collective;


    /**
     * Get relationship.
     *
     * @return string
     */
    public function getRelationship()
    {
        return $this->relationship;
    }

    /**
     * Set inverse.
     *
     * @param string|null $inverse
     *
     * @return Ctrelationshiptypes
     */
    public function setInverse($inverse = null)
    {
        $this->inverse = $inverse;

        return $this;
    }

    /**
     * Get inverse.
     *
     * @return string|null
     */
    public function getInverse()
    {
        return $this->inverse;
    }

    /**
     * Set collective.
     *
     * @param string|null $collective
     *
     * @return Ctrelationshiptypes
     */
    public function setCollective($collective = null)
    {
        $this->collective = $collective;

        return $this;
    }

    /**
     * Get collective.
     *
     * @return string|null
     */
    public function getCollective()
    {
        return $this->collective;
    }
}
