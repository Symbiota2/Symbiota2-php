<?php

namespace App\Entities;

use Doctrine\ORM\Mapping as ORM;

/**
 * Omoccurverification
 *
 * @ORM\Table(name="omoccurverification", uniqueConstraints={@ORM\UniqueConstraint(name="UNIQUE_omoccurverification", columns={"occid", "category"})}, indexes={@ORM\Index(name="FK_omoccurverification_occid_idx", columns={"occid"}), @ORM\Index(name="FK_omoccurverification_uid_idx", columns={"uid"})})
 * @ORM\Entity
 */
class Omoccurverification
{
    /**
     * @var int
     *
     * @ORM\Column(name="ovsid", type="integer", precision=0, scale=0, nullable=false, unique=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $ovsid;

    /**
     * @var string
     *
     * @ORM\Column(name="category", type="string", length=45, precision=0, scale=0, nullable=false, unique=false)
     */
    private $category;

    /**
     * @var int
     *
     * @ORM\Column(name="ranking", type="integer", precision=0, scale=0, nullable=false, unique=false)
     */
    private $ranking;

    /**
     * @var string|null
     *
     * @ORM\Column(name="protocol", type="string", length=100, precision=0, scale=0, nullable=true, unique=false)
     */
    private $protocol;

    /**
     * @var string|null
     *
     * @ORM\Column(name="source", type="string", length=45, precision=0, scale=0, nullable=true, unique=false)
     */
    private $source;

    /**
     * @var string|null
     *
     * @ORM\Column(name="notes", type="string", length=250, precision=0, scale=0, nullable=true, unique=false)
     */
    private $notes;

    /**
     * @var \DateTime|null
     *
     * @ORM\Column(name="initialtimestamp", type="datetime", precision=0, scale=0, nullable=true, options={"default"="CURRENT_TIMESTAMP"}, unique=false)
     */
    private $initialtimestamp = 'CURRENT_TIMESTAMP';

    /**
     * @var \App\Entities\Omoccurrences
     *
     * @ORM\ManyToOne(targetEntity="App\Entities\Omoccurrences")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="occid", referencedColumnName="occid", nullable=true)
     * })
     */
    private $occid;

    /**
     * @var \App\Entities\User
     *
     * @ORM\ManyToOne(targetEntity="App\Entities\User")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="uid", referencedColumnName="uid", nullable=true)
     * })
     */
    private $uid;


    /**
     * Get ovsid.
     *
     * @return int
     */
    public function getOvsid()
    {
        return $this->ovsid;
    }

    /**
     * Set category.
     *
     * @param string $category
     *
     * @return Omoccurverification
     */
    public function setCategory($category)
    {
        $this->category = $category;

        return $this;
    }

    /**
     * Get category.
     *
     * @return string
     */
    public function getCategory()
    {
        return $this->category;
    }

    /**
     * Set ranking.
     *
     * @param int $ranking
     *
     * @return Omoccurverification
     */
    public function setRanking($ranking)
    {
        $this->ranking = $ranking;

        return $this;
    }

    /**
     * Get ranking.
     *
     * @return int
     */
    public function getRanking()
    {
        return $this->ranking;
    }

    /**
     * Set protocol.
     *
     * @param string|null $protocol
     *
     * @return Omoccurverification
     */
    public function setProtocol($protocol = null)
    {
        $this->protocol = $protocol;

        return $this;
    }

    /**
     * Get protocol.
     *
     * @return string|null
     */
    public function getProtocol()
    {
        return $this->protocol;
    }

    /**
     * Set source.
     *
     * @param string|null $source
     *
     * @return Omoccurverification
     */
    public function setSource($source = null)
    {
        $this->source = $source;

        return $this;
    }

    /**
     * Get source.
     *
     * @return string|null
     */
    public function getSource()
    {
        return $this->source;
    }

    /**
     * Set notes.
     *
     * @param string|null $notes
     *
     * @return Omoccurverification
     */
    public function setNotes($notes = null)
    {
        $this->notes = $notes;

        return $this;
    }

    /**
     * Get notes.
     *
     * @return string|null
     */
    public function getNotes()
    {
        return $this->notes;
    }

    /**
     * Set initialtimestamp.
     *
     * @param \DateTime|null $initialtimestamp
     *
     * @return Omoccurverification
     */
    public function setInitialtimestamp($initialtimestamp = null)
    {
        $this->initialtimestamp = $initialtimestamp;

        return $this;
    }

    /**
     * Get initialtimestamp.
     *
     * @return \DateTime|null
     */
    public function getInitialtimestamp()
    {
        return $this->initialtimestamp;
    }

    /**
     * Set occid.
     *
     * @param \App\Entities\Omoccurrences|null $occid
     *
     * @return Omoccurverification
     */
    public function setOccid(\App\Entities\Omoccurrences $occid = null)
    {
        $this->occid = $occid;

        return $this;
    }

    /**
     * Get occid.
     *
     * @return \App\Entities\Omoccurrences|null
     */
    public function getOccid()
    {
        return $this->occid;
    }

    /**
     * Set uid.
     *
     * @param \App\Entities\User|null $uid
     *
     * @return Omoccurverification
     */
    public function setUid(\App\Entities\User $uid = null)
    {
        $this->uid = $uid;

        return $this;
    }

    /**
     * Get uid.
     *
     * @return \App\Entities\User|null
     */
    public function getUid()
    {
        return $this->uid;
    }
}
