<?php

namespace App\Entities;

use Doctrine\ORM\Mapping as ORM;

/**
 * Imagetagkey
 *
 * @ORM\Table(name="imagetagkey", indexes={@ORM\Index(name="sortorder", columns={"sortorder"})})
 * @ORM\Entity
 */
class Imagetagkey
{
    /**
     * @var string
     *
     * @ORM\Column(name="tagkey", type="string", length=30, precision=0, scale=0, nullable=false, unique=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $tagkey;

    /**
     * @var string
     *
     * @ORM\Column(name="shortlabel", type="string", length=30, precision=0, scale=0, nullable=false, unique=false)
     */
    private $shortlabel;

    /**
     * @var string
     *
     * @ORM\Column(name="description_en", type="string", length=255, precision=0, scale=0, nullable=false, unique=false)
     */
    private $descriptionEn;

    /**
     * @var int
     *
     * @ORM\Column(name="sortorder", type="integer", precision=0, scale=0, nullable=false, unique=false)
     */
    private $sortorder;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="initialtimestamp", type="datetime", precision=0, scale=0, nullable=false, options={"default"="CURRENT_TIMESTAMP"}, unique=false)
     */
    private $initialtimestamp = 'CURRENT_TIMESTAMP';


    /**
     * Get tagkey.
     *
     * @return string
     */
    public function getTagkey()
    {
        return $this->tagkey;
    }

    /**
     * Set shortlabel.
     *
     * @param string $shortlabel
     *
     * @return Imagetagkey
     */
    public function setShortlabel($shortlabel)
    {
        $this->shortlabel = $shortlabel;

        return $this;
    }

    /**
     * Get shortlabel.
     *
     * @return string
     */
    public function getShortlabel()
    {
        return $this->shortlabel;
    }

    /**
     * Set descriptionEn.
     *
     * @param string $descriptionEn
     *
     * @return Imagetagkey
     */
    public function setDescriptionEn($descriptionEn)
    {
        $this->descriptionEn = $descriptionEn;

        return $this;
    }

    /**
     * Get descriptionEn.
     *
     * @return string
     */
    public function getDescriptionEn()
    {
        return $this->descriptionEn;
    }

    /**
     * Set sortorder.
     *
     * @param int $sortorder
     *
     * @return Imagetagkey
     */
    public function setSortorder($sortorder)
    {
        $this->sortorder = $sortorder;

        return $this;
    }

    /**
     * Get sortorder.
     *
     * @return int
     */
    public function getSortorder()
    {
        return $this->sortorder;
    }

    /**
     * Set initialtimestamp.
     *
     * @param \DateTime $initialtimestamp
     *
     * @return Imagetagkey
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
}
