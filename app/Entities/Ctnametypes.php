<?php

namespace App\Entities;

use Doctrine\ORM\Mapping as ORM;

/**
 * Ctnametypes
 *
 * @ORM\Table(name="ctnametypes")
 * @ORM\Entity
 */
class Ctnametypes
{
    /**
     * @var string
     *
     * @ORM\Column(name="type", type="string", length=32, precision=0, scale=0, nullable=false, unique=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $type;


    /**
     * Get type.
     *
     * @return string
     */
    public function getType()
    {
        return $this->type;
    }
}
