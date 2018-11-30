<?php

namespace App\Entities;

use Doctrine\ORM\Mapping as ORM;

/**
 * Configpageattributes
 *
 * @ORM\Table(name="configpageattributes", indexes={@ORM\Index(name="FK_configpageattributes_id_idx", columns={"configpageid"})})
 * @ORM\Entity
 */
class Configpageattributes
{
    /**
     * @var int
     *
     * @ORM\Column(name="attributeid", type="integer", precision=0, scale=0, nullable=false, unique=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $attributeid;

    /**
     * @var string|null
     *
     * @ORM\Column(name="objid", type="string", length=45, precision=0, scale=0, nullable=true, unique=false)
     */
    private $objid;

    /**
     * @var string
     *
     * @ORM\Column(name="objname", type="string", length=45, precision=0, scale=0, nullable=false, unique=false)
     */
    private $objname;

    /**
     * @var string|null
     *
     * @ORM\Column(name="value", type="string", length=45, precision=0, scale=0, nullable=true, unique=false)
     */
    private $value;

    /**
     * @var string|null
     *
     * @ORM\Column(name="type", type="string", length=45, precision=0, scale=0, nullable=true, options={"comment"="text, submit, div"}, unique=false)
     */
    private $type;

    /**
     * @var int|null
     *
     * @ORM\Column(name="width", type="integer", precision=0, scale=0, nullable=true, unique=false)
     */
    private $width;

    /**
     * @var int|null
     *
     * @ORM\Column(name="top", type="integer", precision=0, scale=0, nullable=true, unique=false)
     */
    private $top;

    /**
     * @var int|null
     *
     * @ORM\Column(name="left", type="integer", precision=0, scale=0, nullable=true, unique=false)
     */
    private $left;

    /**
     * @var string|null
     *
     * @ORM\Column(name="stylestr", type="string", length=45, precision=0, scale=0, nullable=true, unique=false)
     */
    private $stylestr;

    /**
     * @var string|null
     *
     * @ORM\Column(name="notes", type="string", length=250, precision=0, scale=0, nullable=true, unique=false)
     */
    private $notes;

    /**
     * @var int
     *
     * @ORM\Column(name="modifiedUid", type="integer", precision=0, scale=0, nullable=false, options={"unsigned"=true}, unique=false)
     */
    private $modifieduid;

    /**
     * @var \DateTime|null
     *
     * @ORM\Column(name="modifiedtimestamp", type="datetime", precision=0, scale=0, nullable=true, unique=false)
     */
    private $modifiedtimestamp;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="initialtimestamp", type="datetime", precision=0, scale=0, nullable=false, options={"default"="CURRENT_TIMESTAMP"}, unique=false)
     */
    private $initialtimestamp = 'CURRENT_TIMESTAMP';

    /**
     * @var \App\Entities\Configpage
     *
     * @ORM\ManyToOne(targetEntity="App\Entities\Configpage")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="configpageid", referencedColumnName="configpageid", nullable=true)
     * })
     */
    private $configpageid;


    /**
     * Get attributeid.
     *
     * @return int
     */
    public function getAttributeid()
    {
        return $this->attributeid;
    }

    /**
     * Set objid.
     *
     * @param string|null $objid
     *
     * @return Configpageattributes
     */
    public function setObjid($objid = null)
    {
        $this->objid = $objid;

        return $this;
    }

    /**
     * Get objid.
     *
     * @return string|null
     */
    public function getObjid()
    {
        return $this->objid;
    }

    /**
     * Set objname.
     *
     * @param string $objname
     *
     * @return Configpageattributes
     */
    public function setObjname($objname)
    {
        $this->objname = $objname;

        return $this;
    }

    /**
     * Get objname.
     *
     * @return string
     */
    public function getObjname()
    {
        return $this->objname;
    }

    /**
     * Set value.
     *
     * @param string|null $value
     *
     * @return Configpageattributes
     */
    public function setValue($value = null)
    {
        $this->value = $value;

        return $this;
    }

    /**
     * Get value.
     *
     * @return string|null
     */
    public function getValue()
    {
        return $this->value;
    }

    /**
     * Set type.
     *
     * @param string|null $type
     *
     * @return Configpageattributes
     */
    public function setType($type = null)
    {
        $this->type = $type;

        return $this;
    }

    /**
     * Get type.
     *
     * @return string|null
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * Set width.
     *
     * @param int|null $width
     *
     * @return Configpageattributes
     */
    public function setWidth($width = null)
    {
        $this->width = $width;

        return $this;
    }

    /**
     * Get width.
     *
     * @return int|null
     */
    public function getWidth()
    {
        return $this->width;
    }

    /**
     * Set top.
     *
     * @param int|null $top
     *
     * @return Configpageattributes
     */
    public function setTop($top = null)
    {
        $this->top = $top;

        return $this;
    }

    /**
     * Get top.
     *
     * @return int|null
     */
    public function getTop()
    {
        return $this->top;
    }

    /**
     * Set left.
     *
     * @param int|null $left
     *
     * @return Configpageattributes
     */
    public function setLeft($left = null)
    {
        $this->left = $left;

        return $this;
    }

    /**
     * Get left.
     *
     * @return int|null
     */
    public function getLeft()
    {
        return $this->left;
    }

    /**
     * Set stylestr.
     *
     * @param string|null $stylestr
     *
     * @return Configpageattributes
     */
    public function setStylestr($stylestr = null)
    {
        $this->stylestr = $stylestr;

        return $this;
    }

    /**
     * Get stylestr.
     *
     * @return string|null
     */
    public function getStylestr()
    {
        return $this->stylestr;
    }

    /**
     * Set notes.
     *
     * @param string|null $notes
     *
     * @return Configpageattributes
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
     * Set modifieduid.
     *
     * @param int $modifieduid
     *
     * @return Configpageattributes
     */
    public function setModifieduid($modifieduid)
    {
        $this->modifieduid = $modifieduid;

        return $this;
    }

    /**
     * Get modifieduid.
     *
     * @return int
     */
    public function getModifieduid()
    {
        return $this->modifieduid;
    }

    /**
     * Set modifiedtimestamp.
     *
     * @param \DateTime|null $modifiedtimestamp
     *
     * @return Configpageattributes
     */
    public function setModifiedtimestamp($modifiedtimestamp = null)
    {
        $this->modifiedtimestamp = $modifiedtimestamp;

        return $this;
    }

    /**
     * Get modifiedtimestamp.
     *
     * @return \DateTime|null
     */
    public function getModifiedtimestamp()
    {
        return $this->modifiedtimestamp;
    }

    /**
     * Set initialtimestamp.
     *
     * @param \DateTime $initialtimestamp
     *
     * @return Configpageattributes
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
     * Set configpageid.
     *
     * @param \App\Entities\Configpage|null $configpageid
     *
     * @return Configpageattributes
     */
    public function setConfigpageid(\App\Entities\Configpage $configpageid = null)
    {
        $this->configpageid = $configpageid;

        return $this;
    }

    /**
     * Get configpageid.
     *
     * @return \App\Entities\Configpage|null
     */
    public function getConfigpageid()
    {
        return $this->configpageid;
    }
}
