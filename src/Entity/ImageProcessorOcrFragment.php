<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * ImageProcessorOcrFragment
 *
 * @ORM\Table(name="specprococrfrag", indexes={@ORM\Index(name="FK_specprococrfrag_prlid_idx", columns={"prlid"}), @ORM\Index(name="Index_keyterm", columns={"keyterm"})})
 * @ORM\Entity(repositoryClass="App\Repository\ImageProcessorOcrFragmentRepository")
 */
class ImageProcessorOcrFragment
{
    /**
     * @var int
     *
     * @ORM\Column(name="ocrfragid", type="integer", nullable=false, options={"unsigned"=true})
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $ocrfragid;

    /**
     * @var \ImageProcessorRawLabels
     *
     * @ORM\ManyToOne(targetEntity="ImageProcessorRawLabels")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="prlid", referencedColumnName="prlid")
     * })
     */
    private $prlid;

    /**
     * @var string
     *
     * @ORM\Column(name="firstword", type="string", length=45, nullable=false)
     */
    private $firstword;

    /**
     * @var string|null
     *
     * @ORM\Column(name="secondword", type="string", length=45, nullable=true, options={"default"=NULL})
     */
    private $secondword = 'NULL';

    /**
     * @var string|null
     *
     * @ORM\Column(name="keyterm", type="string", length=45, nullable=true, options={"default"=NULL})
     */
    private $keyterm = 'NULL';

    /**
     * @var int|null
     *
     * @ORM\Column(name="wordorder", type="integer", nullable=true, options={"default"=NULL})
     */
    private $wordorder = 'NULL';

    /**
     * @var \DateTime|null
     *
     * @ORM\Column(name="initialtimestamp", type="datetime", nullable=true, options={"default"="CURRENT_TIMESTAMP"})
     */
    private $initialtimestamp = 'CURRENT_TIMESTAMP';

    public function getOcrfragid(): ?int
    {
        return $this->ocrfragid;
    }

    public function getFirstword(): ?string
    {
        return $this->firstword;
    }

    public function setFirstword(string $firstword): self
    {
        $this->firstword = $firstword;

        return $this;
    }

    public function getSecondword(): ?string
    {
        return $this->secondword;
    }

    public function setSecondword(?string $secondword): self
    {
        $this->secondword = $secondword;

        return $this;
    }

    public function getKeyterm(): ?string
    {
        return $this->keyterm;
    }

    public function setKeyterm(?string $keyterm): self
    {
        $this->keyterm = $keyterm;

        return $this;
    }

    public function getWordorder(): ?int
    {
        return $this->wordorder;
    }

    public function setWordorder(?int $wordorder): self
    {
        $this->wordorder = $wordorder;

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

    public function getPrlid(): ?ImageProcessorRawLabels
    {
        return $this->prlid;
    }

    public function setPrlid(?ImageProcessorRawLabels $prlid): self
    {
        $this->prlid = $prlid;

        return $this;
    }


}
