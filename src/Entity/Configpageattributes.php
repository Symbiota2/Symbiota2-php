<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Configpageattributes
 *
 * @ORM\Table(name="configpageattributes", indexes={@ORM\Index(name="FK_configpageattributes_id_idx", columns={"configpageid"})})
 * @ORM\Entity(repositoryClass="App\Repository\ConfigpageattributesRepository")
 */
class Configpageattributes
{
    /**
     * @var int
     *
     * @ORM\Column(name="attributeid", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $attributeid;

    /**
     * @var string|null
     *
     * @ORM\Column(name="objid", type="string", length=45, nullable=true, options={"default"="NULL"})
     */
    private $objid = 'NULL';

    /**
     * @var string
     *
     * @ORM\Column(name="objname", type="string", length=45, nullable=false)
     */
    private $objname;

    /**
     * @var string|null
     *
     * @ORM\Column(name="value", type="string", length=45, nullable=true, options={"default"="NULL"})
     */
    private $value = 'NULL';

    /**
     * @var string|null
     *
     * @ORM\Column(name="type", type="string", length=45, nullable=true, options={"default"="NULL","comment"="text, submit, div"})
     */
    private $type = 'NULL';

    /**
     * @var int|null
     *
     * @ORM\Column(name="width", type="integer", nullable=true, options={"default"="NULL"})
     */
    private $width = 'NULL';

    /**
     * @var int|null
     *
     * @ORM\Column(name="top", type="integer", nullable=true, options={"default"="NULL"})
     */
    private $top = 'NULL';

    /**
     * @var int|null
     *
     * @ORM\Column(name="left", type="integer", nullable=true, options={"default"="NULL"})
     */
    private $left = 'NULL';

    /**
     * @var string|null
     *
     * @ORM\Column(name="stylestr", type="string", length=45, nullable=true, options={"default"="NULL"})
     */
    private $stylestr = 'NULL';

    /**
     * @var string|null
     *
     * @ORM\Column(name="notes", type="string", length=250, nullable=true, options={"default"="NULL"})
     */
    private $notes = 'NULL';

    /**
     * @var int
     *
     * @ORM\Column(name="modifiedUid", type="integer", nullable=false, options={"unsigned"=true})
     */
    private $modifieduid;

    /**
     * @var \DateTime|null
     *
     * @ORM\Column(name="modifiedtimestamp", type="datetime", nullable=true, options={"default"="NULL"})
     */
    private $modifiedtimestamp = 'NULL';

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="initialtimestamp", type="datetime", nullable=false, options={"default"="current_timestamp()"})
     */
    private $initialtimestamp = 'current_timestamp()';

    /**
     * @var \Configpage
     *
     * @ORM\ManyToOne(targetEntity="Configpage")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="configpageid", referencedColumnName="configpageid")
     * })
     */
    private $configpageid;

    public function getAttributeid(): ?int
    {
        return $this->attributeid;
    }

    public function getObjid(): ?string
    {
        return $this->objid;
    }

    public function setObjid(?string $objid): self
    {
        $this->objid = $objid;

        return $this;
    }

    public function getObjname(): ?string
    {
        return $this->objname;
    }

    public function setObjname(string $objname): self
    {
        $this->objname = $objname;

        return $this;
    }

    public function getValue(): ?string
    {
        return $this->value;
    }

    public function setValue(?string $value): self
    {
        $this->value = $value;

        return $this;
    }

    public function getType(): ?string
    {
        return $this->type;
    }

    public function setType(?string $type): self
    {
        $this->type = $type;

        return $this;
    }

    public function getWidth(): ?int
    {
        return $this->width;
    }

    public function setWidth(?int $width): self
    {
        $this->width = $width;

        return $this;
    }

    public function getTop(): ?int
    {
        return $this->top;
    }

    public function setTop(?int $top): self
    {
        $this->top = $top;

        return $this;
    }

    public function getLeft(): ?int
    {
        return $this->left;
    }

    public function setLeft(?int $left): self
    {
        $this->left = $left;

        return $this;
    }

    public function getStylestr(): ?string
    {
        return $this->stylestr;
    }

    public function setStylestr(?string $stylestr): self
    {
        $this->stylestr = $stylestr;

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

    public function getModifieduid(): ?int
    {
        return $this->modifieduid;
    }

    public function setModifieduid(int $modifieduid): self
    {
        $this->modifieduid = $modifieduid;

        return $this;
    }

    public function getModifiedtimestamp(): ?\DateTimeInterface
    {
        return $this->modifiedtimestamp;
    }

    public function setModifiedtimestamp(?\DateTimeInterface $modifiedtimestamp): self
    {
        $this->modifiedtimestamp = $modifiedtimestamp;

        return $this;
    }

    public function getInitialtimestamp(): ?\DateTimeInterface
    {
        return $this->initialtimestamp;
    }

    public function setInitialtimestamp(\DateTimeInterface $initialtimestamp): self
    {
        $this->initialtimestamp = $initialtimestamp;

        return $this;
    }

    public function getConfigpageid(): ?Configpage
    {
        return $this->configpageid;
    }

    public function setConfigpageid(?Configpage $configpageid): self
    {
        $this->configpageid = $configpageid;

        return $this;
    }


}
