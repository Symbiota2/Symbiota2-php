<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Ctnametypes
 *
 * @ORM\Table(name="ctnametypes")
 * @ORM\Entity(repositoryClass="App\Repository\CtnametypesRepository")
 */
class Ctnametypes
{
    /**
     * @var string
     *
     * @ORM\Column(name="type", type="string", length=32, nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $type;

    public function getType(): ?string
    {
        return $this->type;
    }


}
