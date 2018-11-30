<?php

namespace App\Entities;

use Doctrine\ORM\Mapping as ORM;

/**
 * Glossarysources
 *
 * @ORM\Table(name="glossarysources")
 * @ORM\Entity
 */
class Glossarysources
{
    /**
     * @var string|null
     *
     * @ORM\Column(name="contributorTerm", type="string", length=1000, precision=0, scale=0, nullable=true, unique=false)
     */
    private $contributorterm;

    /**
     * @var string|null
     *
     * @ORM\Column(name="contributorImage", type="string", length=1000, precision=0, scale=0, nullable=true, unique=false)
     */
    private $contributorimage;

    /**
     * @var string|null
     *
     * @ORM\Column(name="translator", type="string", length=1000, precision=0, scale=0, nullable=true, unique=false)
     */
    private $translator;

    /**
     * @var string|null
     *
     * @ORM\Column(name="additionalSources", type="string", length=1000, precision=0, scale=0, nullable=true, unique=false)
     */
    private $additionalsources;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="initialtimestamp", type="datetime", precision=0, scale=0, nullable=false, options={"default"="CURRENT_TIMESTAMP"}, unique=false)
     */
    private $initialtimestamp = 'CURRENT_TIMESTAMP';

    /**
     * @var \App\Entities\Taxa
     *
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     * @ORM\OneToOne(targetEntity="App\Entities\Taxa")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="tid", referencedColumnName="tid", nullable=true)
     * })
     */
    private $tid;


    /**
     * Set contributorterm.
     *
     * @param string|null $contributorterm
     *
     * @return Glossarysources
     */
    public function setContributorterm($contributorterm = null)
    {
        $this->contributorterm = $contributorterm;

        return $this;
    }

    /**
     * Get contributorterm.
     *
     * @return string|null
     */
    public function getContributorterm()
    {
        return $this->contributorterm;
    }

    /**
     * Set contributorimage.
     *
     * @param string|null $contributorimage
     *
     * @return Glossarysources
     */
    public function setContributorimage($contributorimage = null)
    {
        $this->contributorimage = $contributorimage;

        return $this;
    }

    /**
     * Get contributorimage.
     *
     * @return string|null
     */
    public function getContributorimage()
    {
        return $this->contributorimage;
    }

    /**
     * Set translator.
     *
     * @param string|null $translator
     *
     * @return Glossarysources
     */
    public function setTranslator($translator = null)
    {
        $this->translator = $translator;

        return $this;
    }

    /**
     * Get translator.
     *
     * @return string|null
     */
    public function getTranslator()
    {
        return $this->translator;
    }

    /**
     * Set additionalsources.
     *
     * @param string|null $additionalsources
     *
     * @return Glossarysources
     */
    public function setAdditionalsources($additionalsources = null)
    {
        $this->additionalsources = $additionalsources;

        return $this;
    }

    /**
     * Get additionalsources.
     *
     * @return string|null
     */
    public function getAdditionalsources()
    {
        return $this->additionalsources;
    }

    /**
     * Set initialtimestamp.
     *
     * @param \DateTime $initialtimestamp
     *
     * @return Glossarysources
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

    /**
     * Set tid.
     *
     * @param \App\Entities\Taxa $tid
     *
     * @return Glossarysources
     */
    public function setTid(\App\Entities\Taxa $tid)
    {
        $this->tid = $tid;

        return $this;
    }

    /**
     * Get tid.
     *
     * @return \App\Entities\Taxa
     */
    public function getTid()
    {
        return $this->tid;
    }
}
