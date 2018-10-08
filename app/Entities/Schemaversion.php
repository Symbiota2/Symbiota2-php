<?php

namespace App\Entities;

use Doctrine\ORM\Mapping as ORM;

/**
 * Schemaversion
 *
 * @ORM\Table(name="schemaversion", uniqueConstraints={@ORM\UniqueConstraint(name="versionnumber_UNIQUE", columns={"versionnumber"})})
 * @ORM\Entity
 */
class Schemaversion
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer", precision=0, scale=0, nullable=false, unique=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="versionnumber", type="string", length=20, precision=0, scale=0, nullable=false, unique=false)
     */
    private $versionnumber;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="dateapplied", type="datetime", precision=0, scale=0, nullable=false, options={"default"="CURRENT_TIMESTAMP"}, unique=false)
     */
    private $dateapplied = 'CURRENT_TIMESTAMP';


    /**
     * Get id.
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set versionnumber.
     *
     * @param string $versionnumber
     *
     * @return Schemaversion
     */
    public function setVersionnumber($versionnumber)
    {
        $this->versionnumber = $versionnumber;

        return $this;
    }

    /**
     * Get versionnumber.
     *
     * @return string
     */
    public function getVersionnumber()
    {
        return $this->versionnumber;
    }

    /**
     * Set dateapplied.
     *
     * @param \DateTime $dateapplied
     *
     * @return Schemaversion
     */
    public function setDateapplied($dateapplied)
    {
        $this->dateapplied = $dateapplied;

        return $this;
    }

    /**
     * Get dateapplied.
     *
     * @return \DateTime
     */
    public function getDateapplied()
    {
        return $this->dateapplied;
    }
}
