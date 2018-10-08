<?php

namespace App\Entities;

use Doctrine\ORM\Mapping as ORM;

/**
 * Specprococrfrag
 *
 * @ORM\Table(name="specprococrfrag", indexes={@ORM\Index(name="FK_specprococrfrag_prlid_idx", columns={"prlid"}), @ORM\Index(name="Index_keyterm", columns={"keyterm"})})
 * @ORM\Entity
 */
class Specprococrfrag
{
    /**
     * @var int
     *
     * @ORM\Column(name="ocrfragid", type="integer", precision=0, scale=0, nullable=false, options={"unsigned"=true}, unique=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $ocrfragid;

    /**
     * @var string
     *
     * @ORM\Column(name="firstword", type="string", length=45, precision=0, scale=0, nullable=false, unique=false)
     */
    private $firstword;

    /**
     * @var string|null
     *
     * @ORM\Column(name="secondword", type="string", length=45, precision=0, scale=0, nullable=true, unique=false)
     */
    private $secondword;

    /**
     * @var string|null
     *
     * @ORM\Column(name="keyterm", type="string", length=45, precision=0, scale=0, nullable=true, unique=false)
     */
    private $keyterm;

    /**
     * @var int|null
     *
     * @ORM\Column(name="wordorder", type="integer", precision=0, scale=0, nullable=true, unique=false)
     */
    private $wordorder;

    /**
     * @var \DateTime|null
     *
     * @ORM\Column(name="initialtimestamp", type="datetime", precision=0, scale=0, nullable=true, options={"default"="CURRENT_TIMESTAMP"}, unique=false)
     */
    private $initialtimestamp = 'CURRENT_TIMESTAMP';

    /**
     * @var \App\Entities\Specprocessorrawlabels
     *
     * @ORM\ManyToOne(targetEntity="App\Entities\Specprocessorrawlabels")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="prlid", referencedColumnName="prlid", nullable=true)
     * })
     */
    private $prlid;


    /**
     * Get ocrfragid.
     *
     * @return int
     */
    public function getOcrfragid()
    {
        return $this->ocrfragid;
    }

    /**
     * Set firstword.
     *
     * @param string $firstword
     *
     * @return Specprococrfrag
     */
    public function setFirstword($firstword)
    {
        $this->firstword = $firstword;

        return $this;
    }

    /**
     * Get firstword.
     *
     * @return string
     */
    public function getFirstword()
    {
        return $this->firstword;
    }

    /**
     * Set secondword.
     *
     * @param string|null $secondword
     *
     * @return Specprococrfrag
     */
    public function setSecondword($secondword = null)
    {
        $this->secondword = $secondword;

        return $this;
    }

    /**
     * Get secondword.
     *
     * @return string|null
     */
    public function getSecondword()
    {
        return $this->secondword;
    }

    /**
     * Set keyterm.
     *
     * @param string|null $keyterm
     *
     * @return Specprococrfrag
     */
    public function setKeyterm($keyterm = null)
    {
        $this->keyterm = $keyterm;

        return $this;
    }

    /**
     * Get keyterm.
     *
     * @return string|null
     */
    public function getKeyterm()
    {
        return $this->keyterm;
    }

    /**
     * Set wordorder.
     *
     * @param int|null $wordorder
     *
     * @return Specprococrfrag
     */
    public function setWordorder($wordorder = null)
    {
        $this->wordorder = $wordorder;

        return $this;
    }

    /**
     * Get wordorder.
     *
     * @return int|null
     */
    public function getWordorder()
    {
        return $this->wordorder;
    }

    /**
     * Set initialtimestamp.
     *
     * @param \DateTime|null $initialtimestamp
     *
     * @return Specprococrfrag
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
     * Set prlid.
     *
     * @param \App\Entities\Specprocessorrawlabels|null $prlid
     *
     * @return Specprococrfrag
     */
    public function setPrlid(\App\Entities\Specprocessorrawlabels $prlid = null)
    {
        $this->prlid = $prlid;

        return $this;
    }

    /**
     * Get prlid.
     *
     * @return \App\Entities\Specprocessorrawlabels|null
     */
    public function getPrlid()
    {
        return $this->prlid;
    }
}
