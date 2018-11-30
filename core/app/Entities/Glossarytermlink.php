<?php

namespace App\Entities;

use Doctrine\ORM\Mapping as ORM;

/**
 * Glossarytermlink
 *
 * @ORM\Table(name="glossarytermlink", uniqueConstraints={@ORM\UniqueConstraint(name="Unique_termkeys", columns={"glossgrpid", "glossid"})}, indexes={@ORM\Index(name="glossarytermlink_ibfk_1", columns={"glossid"}), @ORM\Index(name="IDX_5FB96611732EDCB4", columns={"glossgrpid"})})
 * @ORM\Entity
 */
class Glossarytermlink
{
    /**
     * @var int
     *
     * @ORM\Column(name="gltlinkid", type="integer", precision=0, scale=0, nullable=false, unique=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $gltlinkid;

    /**
     * @var string|null
     *
     * @ORM\Column(name="relationshipType", type="string", length=45, precision=0, scale=0, nullable=true, unique=false)
     */
    private $relationshiptype;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="initialtimestamp", type="datetime", precision=0, scale=0, nullable=false, options={"default"="CURRENT_TIMESTAMP"}, unique=false)
     */
    private $initialtimestamp = 'CURRENT_TIMESTAMP';

    /**
     * @var \App\Entities\Glossary
     *
     * @ORM\ManyToOne(targetEntity="App\Entities\Glossary")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="glossgrpid", referencedColumnName="glossid", nullable=true)
     * })
     */
    private $glossgrpid;

    /**
     * @var \App\Entities\Glossary
     *
     * @ORM\ManyToOne(targetEntity="App\Entities\Glossary")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="glossid", referencedColumnName="glossid", nullable=true)
     * })
     */
    private $glossid;


    /**
     * Get gltlinkid.
     *
     * @return int
     */
    public function getGltlinkid()
    {
        return $this->gltlinkid;
    }

    /**
     * Set relationshiptype.
     *
     * @param string|null $relationshiptype
     *
     * @return Glossarytermlink
     */
    public function setRelationshiptype($relationshiptype = null)
    {
        $this->relationshiptype = $relationshiptype;

        return $this;
    }

    /**
     * Get relationshiptype.
     *
     * @return string|null
     */
    public function getRelationshiptype()
    {
        return $this->relationshiptype;
    }

    /**
     * Set initialtimestamp.
     *
     * @param \DateTime $initialtimestamp
     *
     * @return Glossarytermlink
     */
    public function setInitialtimestamp($initialtimestamp)
    {
        $this->initialtimestamp = $initialtimestamp;

        return $this;
    }

    /**
     * Get initialtimestamp.
     *
     * @return \DateTime
     */
    public function getInitialtimestamp()
    {
        return $this->initialtimestamp;
    }

    /**
     * Set glossgrpid.
     *
     * @param \App\Entities\Glossary|null $glossgrpid
     *
     * @return Glossarytermlink
     */
    public function setGlossgrpid(\App\Entities\Glossary $glossgrpid = null)
    {
        $this->glossgrpid = $glossgrpid;

        return $this;
    }

    /**
     * Get glossgrpid.
     *
     * @return \App\Entities\Glossary|null
     */
    public function getGlossgrpid()
    {
        return $this->glossgrpid;
    }

    /**
     * Set glossid.
     *
     * @param \App\Entities\Glossary|null $glossid
     *
     * @return Glossarytermlink
     */
    public function setGlossid(\App\Entities\Glossary $glossid = null)
    {
        $this->glossid = $glossid;

        return $this;
    }

    /**
     * Get glossid.
     *
     * @return \App\Entities\Glossary|null
     */
    public function getGlossid()
    {
        return $this->glossid;
    }
}
