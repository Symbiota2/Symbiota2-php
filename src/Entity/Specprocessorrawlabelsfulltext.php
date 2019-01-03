<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Specprocessorrawlabelsfulltext
 *
 * @ORM\Table(name="specprocessorrawlabelsfulltext", indexes={@ORM\Index(name="Index_ocr_fulltext", columns={"rawstr"}, flags={"fulltext"}), @ORM\Index(name="Index_ocr_imgid", columns={"imgid"})})
 * @ORM\Entity(repositoryClass="App\Repository\SpecprocessorrawlabelsfulltextRepository")
 */
class Specprocessorrawlabelsfulltext
{
    /**
     * @var int
     *
     * @ORM\Column(name="prlid", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $prlid;

    /**
     * @var int
     *
     * @ORM\Column(name="imgid", type="integer", nullable=false)
     */
    private $imgid;

    /**
     * @var string
     *
     * @ORM\Column(name="rawstr", type="text", length=65535, nullable=false)
     */
    private $rawstr;

    public function getPrlid(): ?int
    {
        return $this->prlid;
    }

    public function getImgid(): ?int
    {
        return $this->imgid;
    }

    public function setImgid(int $imgid): self
    {
        $this->imgid = $imgid;

        return $this;
    }

    public function getRawstr(): ?string
    {
        return $this->rawstr;
    }

    public function setRawstr(string $rawstr): self
    {
        $this->rawstr = $rawstr;

        return $this;
    }


}
