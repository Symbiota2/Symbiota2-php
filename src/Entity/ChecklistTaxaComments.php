<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * ChecklistTaxaComments
 *
 * @ORM\Table(name="fmcltaxacomments", indexes={@ORM\Index(name="FK_clcomment_users", columns={"createduid"}), @ORM\Index(name="FK_clcomment_cltaxa", columns={"clid", "tid"})})
 * @ORM\Entity(repositoryClass="App\Repository\ChecklistTaxaCommentsRepository")
 */
class ChecklistTaxaComments
{
    /**
     * @var int
     *
     * @ORM\Column(name="cltaxacommentsid", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $cltaxacommentsid;

    /**
     * @var int
     *
     * @ORM\Column(name="clid", type="integer", nullable=false, options={"unsigned"=true})
     */
    private $clid;

    /**
     * @var int
     *
     * @ORM\Column(name="tid", type="integer", nullable=false, options={"unsigned"=true})
     */
    private $tid;

    /**
     * @var string
     *
     * @ORM\Column(name="comment", type="text", length=65535, nullable=false)
     */
    private $comment;

    /**
     * @var \Users
     *
     * @ORM\ManyToOne(targetEntity="Users")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="createduid", referencedColumnName="uid")
     * })
     */
    private $createduid;

    /**
     * @var int
     *
     * @ORM\Column(name="ispublic", type="integer", nullable=false, options={"default"="1"})
     */
    private $ispublic = '1';

    /**
     * @var int|null
     *
     * @ORM\Column(name="parentid", type="integer", nullable=true, options={"default"=NULL})
     */
    private $parentid = 'NULL';

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="initialtimestamp", type="datetime", nullable=false, options={"default"="CURRENT_TIMESTAMP"})
     */
    private $initialtimestamp = 'CURRENT_TIMESTAMP';

    public function getCltaxacommentsid(): ?int
    {
        return $this->cltaxacommentsid;
    }

    public function getClid(): ?int
    {
        return $this->clid;
    }

    public function setClid(int $clid): self
    {
        $this->clid = $clid;

        return $this;
    }

    public function getTid(): ?int
    {
        return $this->tid;
    }

    public function setTid(int $tid): self
    {
        $this->tid = $tid;

        return $this;
    }

    public function getComment(): ?string
    {
        return $this->comment;
    }

    public function setComment(string $comment): self
    {
        $this->comment = $comment;

        return $this;
    }

    public function getIspublic(): ?int
    {
        return $this->ispublic;
    }

    public function setIspublic(int $ispublic): self
    {
        $this->ispublic = $ispublic;

        return $this;
    }

    public function getParentid(): ?int
    {
        return $this->parentid;
    }

    public function setParentid(?int $parentid): self
    {
        $this->parentid = $parentid;

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

    public function getCreateduid(): ?Users
    {
        return $this->createduid;
    }

    public function setCreateduid(?Users $createduid): self
    {
        $this->createduid = $createduid;

        return $this;
    }


}
