<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Omoccurverification
 *
 * @ORM\Table(name="omoccurverification", uniqueConstraints={@ORM\UniqueConstraint(name="UNIQUE_omoccurverification", columns={"occid", "category"})}, indexes={@ORM\Index(name="FK_omoccurverification_occid_idx", columns={"occid"}), @ORM\Index(name="FK_omoccurverification_uid_idx", columns={"uid"})})
 * @ORM\Entity(repositoryClass="App\Repository\OmoccurverificationRepository")
 */
class Omoccurverification
{
    /**
     * @var int
     *
     * @ORM\Column(name="ovsid", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $ovsid;

    /**
     * @var string
     *
     * @ORM\Column(name="category", type="string", length=45, nullable=false)
     */
    private $category;

    /**
     * @var int
     *
     * @ORM\Column(name="ranking", type="integer", nullable=false)
     */
    private $ranking;

    /**
     * @var string|null
     *
     * @ORM\Column(name="protocol", type="string", length=100, nullable=true, options={"default"="NULL"})
     */
    private $protocol = 'NULL';

    /**
     * @var string|null
     *
     * @ORM\Column(name="source", type="string", length=45, nullable=true, options={"default"="NULL"})
     */
    private $source = 'NULL';

    /**
     * @var string|null
     *
     * @ORM\Column(name="notes", type="string", length=250, nullable=true, options={"default"="NULL"})
     */
    private $notes = 'NULL';

    /**
     * @var \DateTime|null
     *
     * @ORM\Column(name="initialtimestamp", type="datetime", nullable=true, options={"default"="current_timestamp()"})
     */
    private $initialtimestamp = 'current_timestamp()';

    /**
     * @var \Omoccurrences
     *
     * @ORM\ManyToOne(targetEntity="Omoccurrences")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="occid", referencedColumnName="occid")
     * })
     */
    private $occid;

    /**
     * @var \Users
     *
     * @ORM\ManyToOne(targetEntity="Users")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="uid", referencedColumnName="uid")
     * })
     */
    private $uid;

    public function getOvsid(): ?int
    {
        return $this->ovsid;
    }

    public function getCategory(): ?string
    {
        return $this->category;
    }

    public function setCategory(string $category): self
    {
        $this->category = $category;

        return $this;
    }

    public function getRanking(): ?int
    {
        return $this->ranking;
    }

    public function setRanking(int $ranking): self
    {
        $this->ranking = $ranking;

        return $this;
    }

    public function getProtocol(): ?string
    {
        return $this->protocol;
    }

    public function setProtocol(?string $protocol): self
    {
        $this->protocol = $protocol;

        return $this;
    }

    public function getSource(): ?string
    {
        return $this->source;
    }

    public function setSource(?string $source): self
    {
        $this->source = $source;

        return $this;
    }

    public function getNotes(): ?string
    {
        return $this->notes;
    }

    public function setNotes(?string $notes): self
    {
        $this->notes = $notes;

        return $this;
    }

    public function getInitialtimestamp(): ?\DateTimeInterface
    {
        return $this->initialtimestamp;
    }

    public function setInitialtimestamp(?\DateTimeInterface $initialtimestamp): self
    {
        $this->initialtimestamp = $initialtimestamp;

        return $this;
    }

    public function getOccid(): ?Omoccurrences
    {
        return $this->occid;
    }

    public function setOccid(?Omoccurrences $occid): self
    {
        $this->occid = $occid;

        return $this;
    }

    public function getUid(): ?Users
    {
        return $this->uid;
    }

    public function setUid(?Users $uid): self
    {
        $this->uid = $uid;

        return $this;
    }


}
