<?php

namespace App\Entities;

use Doctrine\ORM\Mapping as ORM;

/**
 * Specprocessorrawlabelsfulltext
 *
 * @ORM\Table(name="specprocessorrawlabelsfulltext", indexes={@ORM\Index(name="Index_ocr_imgid", columns={"imgid"}), @ORM\Index(name="Index_ocr_fulltext", columns={"rawstr"}, flags={"fulltext"})})
 * @ORM\Entity
 */
class Specprocessorrawlabelsfulltext
{
    /**
     * @var int
     *
     * @ORM\Column(name="prlid", type="integer", precision=0, scale=0, nullable=false, unique=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $prlid;

    /**
     * @var int
     *
     * @ORM\Column(name="imgid", type="integer", precision=0, scale=0, nullable=false, unique=false)
     */
    private $imgid;

    /**
     * @var string
     *
     * @ORM\Column(name="rawstr", type="text", length=65535, precision=0, scale=0, nullable=false, unique=false)
     */
    private $rawstr;


    /**
     * Get prlid.
     *
     * @return int
     */
    public function getPrlid()
    {
        return $this->prlid;
    }

    /**
     * Set imgid.
     *
     * @param int $imgid
     *
     * @return Specprocessorrawlabelsfulltext
     */
    public function setImgid($imgid)
    {
        $this->imgid = $imgid;

        return $this;
    }

    /**
     * Get imgid.
     *
     * @return int
     */
    public function getImgid()
    {
        return $this->imgid;
    }

    /**
     * Set rawstr.
     *
     * @param string $rawstr
     *
     * @return Specprocessorrawlabelsfulltext
     */
    public function setRawstr($rawstr)
    {
        $this->rawstr = $rawstr;

        return $this;
    }

    /**
     * Get rawstr.
     *
     * @return string
     */
    public function getRawstr()
    {
        return $this->rawstr;
    }
}
