<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Glossarytermlink
 *
 * @ORM\Table(name="glossarytermlink", uniqueConstraints={@ORM\UniqueConstraint(name="Unique_termkeys", columns={"glossgrpid", "glossid"})}, indexes={@ORM\Index(name="glossarytermlink_ibfk_1", columns={"glossid"}), @ORM\Index(name="IDX_5FB96611732EDCB4", columns={"glossgrpid"})})
 * @ORM\Entity(repositoryClass="App\Repository\GlossarytermlinkRepository")
 */
class Glossarytermlink
{
    /**
     * @var int
     *
     * @ORM\Column(name="gltlinkid", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $gltlinkid;

    /**
     * @var string|null
     *
     * @ORM\Column(name="relationshipType", type="string", length=45, nullable=true, options={"default"="NULL"})
     */
    private $relationshiptype = 'NULL';

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="initialtimestamp", type="datetime", nullable=false, options={"default"="current_timestamp()"})
     */
    private $initialtimestamp = 'current_timestamp()';

    /**
     * @var \Glossary
     *
     * @ORM\ManyToOne(targetEntity="Glossary")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="glossid", referencedColumnName="glossid")
     * })
     */
    private $glossid;

    /**
     * @var \Glossary
     *
     * @ORM\ManyToOne(targetEntity="Glossary")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="glossgrpid", referencedColumnName="glossid")
     * })
     */
    private $glossgrpid;

    public function getGltlinkid(): ?int
    {
        return $this->gltlinkid;
    }

    public function getRelationshiptype(): ?string
    {
        return $this->relationshiptype;
    }

    public function setRelationshiptype(?string $relationshiptype): self
    {
        $this->relationshiptype = $relationshiptype;

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

    public function getGlossid(): ?Glossary
    {
        return $this->glossid;
    }

    public function setGlossid(?Glossary $glossid): self
    {
        $this->glossid = $glossid;

        return $this;
    }

    public function getGlossgrpid(): ?Glossary
    {
        return $this->glossgrpid;
    }

    public function setGlossgrpid(?Glossary $glossgrpid): self
    {
        $this->glossgrpid = $glossgrpid;

        return $this;
    }


}
