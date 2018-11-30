<?php

namespace App\Entities;

use Doctrine\ORM\Mapping as ORM;

/**
 * Actionrequesttype
 *
 * @ORM\Table(name="actionrequesttype")
 * @ORM\Entity
 */
class Actionrequesttype
{
    /**
     * @var string
     *
     * @ORM\Column(name="requesttype", type="string", length=30, precision=0, scale=0, nullable=false, unique=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $requesttype;

    /**
     * @var string|null
     *
     * @ORM\Column(name="context", type="string", length=255, precision=0, scale=0, nullable=true, unique=false)
     */
    private $context;

    /**
     * @var string|null
     *
     * @ORM\Column(name="description", type="string", length=255, precision=0, scale=0, nullable=true, unique=false)
     */
    private $description;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="initialtimestamp", type="datetime", precision=0, scale=0, nullable=false, options={"default"="CURRENT_TIMESTAMP"}, unique=false)
     */
    private $initialtimestamp = 'CURRENT_TIMESTAMP';


    /**
     * Get requesttype.
     *
     * @return string
     */
    public function getRequesttype()
    {
        return $this->requesttype;
    }

    /**
     * Set context.
     *
     * @param string|null $context
     *
     * @return Actionrequesttype
     */
    public function setContext($context = null)
    {
        $this->context = $context;

        return $this;
    }

    /**
     * Get context.
     *
     * @return string|null
     */
    public function getContext()
    {
        return $this->context;
    }

    /**
     * Set description.
     *
     * @param string|null $description
     *
     * @return Actionrequesttype
     */
    public function setDescription($description = null)
    {
        $this->description = $description;

        return $this;
    }

    /**
     * Get description.
     *
     * @return string|null
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Set initialtimestamp.
     *
     * @param \DateTime $initialtimestamp
     *
     * @return Actionrequesttype
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
