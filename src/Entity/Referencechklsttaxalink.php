<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Referencechklsttaxalink
 *
 * @ORM\Table(name="referencechklsttaxalink", indexes={@ORM\Index(name="FK_refchktaxalink_clidtid_idx", columns={"clid", "tid"}), @ORM\Index(name="IDX_1B708068FB7281BE", columns={"refid"})})
 * @ORM\Entity(repositoryClass="App\Repository\ReferencechklsttaxalinkRepository")
 */
class Referencechklsttaxalink
{
    /**
     * @var int
     *
     * @ORM\Column(name="clid", type="integer", nullable=false, options={"unsigned"=true})
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     */
    private $clid;

    /**
     * @var int
     *
     * @ORM\Column(name="tid", type="integer", nullable=false, options={"unsigned"=true})
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     */
    private $tid;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="initialtimestamp", type="datetime", nullable=false, options={"default"="current_timestamp()"})
     */
    private $initialtimestamp = 'current_timestamp()';

    /**
     * @var \Referenceobject
     *
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     * @ORM\OneToOne(targetEntity="Referenceobject")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="refid", referencedColumnName="refid")
     * })
     */
    private $refid;

    public function getClid(): ?int
    {
        return $this->clid;
    }

    public function getTid(): ?int
    {
        return $this->tid;
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

    public function getRefid(): ?Referenceobject
    {
        return $this->refid;
    }

    public function setRefid(?Referenceobject $refid): self
    {
        $this->refid = $refid;

        return $this;
    }


}
