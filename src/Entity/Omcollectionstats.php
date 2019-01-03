<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Omcollectionstats
 *
 * @ORM\Table(name="omcollectionstats")
 * @ORM\Entity(repositoryClass="App\Repository\OmcollectionstatsRepository")
 */
class Omcollectionstats
{
    /**
     * @var int
     *
     * @ORM\Column(name="recordcnt", type="integer", nullable=false, options={"unsigned"=true})
     */
    private $recordcnt;

    /**
     * @var int|null
     *
     * @ORM\Column(name="georefcnt", type="integer", nullable=true, options={"default"=NULL,"unsigned"=true})
     */
    private $georefcnt = 'NULL';

    /**
     * @var int|null
     *
     * @ORM\Column(name="familycnt", type="integer", nullable=true, options={"default"=NULL,"unsigned"=true})
     */
    private $familycnt = 'NULL';

    /**
     * @var int|null
     *
     * @ORM\Column(name="genuscnt", type="integer", nullable=true, options={"default"=NULL,"unsigned"=true})
     */
    private $genuscnt = 'NULL';

    /**
     * @var int|null
     *
     * @ORM\Column(name="speciescnt", type="integer", nullable=true, options={"default"=NULL,"unsigned"=true})
     */
    private $speciescnt = 'NULL';

    /**
     * @var \DateTime|null
     *
     * @ORM\Column(name="uploaddate", type="datetime", nullable=true, options={"default"=NULL})
     */
    private $uploaddate = 'NULL';

    /**
     * @var \DateTime|null
     *
     * @ORM\Column(name="datelastmodified", type="datetime", nullable=true, options={"default"=NULL})
     */
    private $datelastmodified = 'NULL';

    /**
     * @var string|null
     *
     * @ORM\Column(name="uploadedby", type="string", length=45, nullable=true, options={"default"=NULL})
     */
    private $uploadedby = 'NULL';

    /**
     * @var string|null
     *
     * @ORM\Column(name="dynamicProperties", type="text", length=0, nullable=true, options={"default"=NULL})
     */
    private $dynamicproperties = 'NULL';

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="initialtimestamp", type="datetime", nullable=false, options={"default"="CURRENT_TIMESTAMP"})
     */
    private $initialtimestamp = 'CURRENT_TIMESTAMP';

    /**
     * @var \Omcollections
     *
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     * @ORM\OneToOne(targetEntity="Omcollections")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="collid", referencedColumnName="CollID")
     * })
     */
    private $collid;

    public function getRecordcnt(): ?int
    {
        return $this->recordcnt;
    }

    public function setRecordcnt(int $recordcnt): self
    {
        $this->recordcnt = $recordcnt;

        return $this;
    }

    public function getGeorefcnt(): ?int
    {
        return $this->georefcnt;
    }

    public function setGeorefcnt(?int $georefcnt): self
    {
        $this->georefcnt = $georefcnt;

        return $this;
    }

    public function getFamilycnt(): ?int
    {
        return $this->familycnt;
    }

    public function setFamilycnt(?int $familycnt): self
    {
        $this->familycnt = $familycnt;

        return $this;
    }

    public function getGenuscnt(): ?int
    {
        return $this->genuscnt;
    }

    public function setGenuscnt(?int $genuscnt): self
    {
        $this->genuscnt = $genuscnt;

        return $this;
    }

    public function getSpeciescnt(): ?int
    {
        return $this->speciescnt;
    }

    public function setSpeciescnt(?int $speciescnt): self
    {
        $this->speciescnt = $speciescnt;

        return $this;
    }

    public function getUploaddate(): ?\DateTimeInterface
    {
        return $this->uploaddate;
    }

    public function setUploaddate(?\DateTimeInterface $uploaddate): self
    {
        $this->uploaddate = $uploaddate;

        return $this;
    }

    public function getDatelastmodified(): ?\DateTimeInterface
    {
        return $this->datelastmodified;
    }

    public function setDatelastmodified(?\DateTimeInterface $datelastmodified): self
    {
        $this->datelastmodified = $datelastmodified;

        return $this;
    }

    public function getUploadedby(): ?string
    {
        return $this->uploadedby;
    }

    public function setUploadedby(?string $uploadedby): self
    {
        $this->uploadedby = $uploadedby;

        return $this;
    }

    public function getDynamicproperties(): ?string
    {
        return $this->dynamicproperties;
    }

    public function setDynamicproperties(?string $dynamicproperties): self
    {
        $this->dynamicproperties = $dynamicproperties;

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

    public function getCollid(): ?Omcollections
    {
        return $this->collid;
    }

    public function setCollid(?Omcollections $collid): self
    {
        $this->collid = $collid;

        return $this;
    }


}
