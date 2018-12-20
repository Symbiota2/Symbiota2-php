<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Omcollectors
 *
 * @ORM\Table(name="omcollectors", indexes={@ORM\Index(name="FK_preferred_recby_idx", columns={"preferredrecbyid"}), @ORM\Index(name="fullname", columns={"familyname", "firstname"})})
 * @ORM\Entity(repositoryClass="App\Repository\OmcollectorsRepository")
 */
class Omcollectors
{
    /**
     * @var int
     *
     * @ORM\Column(name="recordedById", type="integer", nullable=false, options={"unsigned"=true})
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $recordedbyid;

    /**
     * @var string
     *
     * @ORM\Column(name="familyname", type="string", length=45, nullable=false)
     */
    private $familyname;

    /**
     * @var string|null
     *
     * @ORM\Column(name="firstname", type="string", length=45, nullable=true, options={"default"="NULL"})
     */
    private $firstname = 'NULL';

    /**
     * @var string|null
     *
     * @ORM\Column(name="middlename", type="string", length=45, nullable=true, options={"default"="NULL"})
     */
    private $middlename = 'NULL';

    /**
     * @var int|null
     *
     * @ORM\Column(name="startyearactive", type="integer", nullable=true, options={"default"="NULL"})
     */
    private $startyearactive = 'NULL';

    /**
     * @var int|null
     *
     * @ORM\Column(name="endyearactive", type="integer", nullable=true, options={"default"="NULL"})
     */
    private $endyearactive = 'NULL';

    /**
     * @var string|null
     *
     * @ORM\Column(name="notes", type="string", length=255, nullable=true, options={"default"="NULL"})
     */
    private $notes = 'NULL';

    /**
     * @var int|null
     *
     * @ORM\Column(name="rating", type="integer", nullable=true, options={"default"="10"})
     */
    private $rating = '10';

    /**
     * @var string|null
     *
     * @ORM\Column(name="guid", type="string", length=45, nullable=true, options={"default"="NULL"})
     */
    private $guid = 'NULL';

    /**
     * @var int|null
     *
     * @ORM\Column(name="preferredrecbyid", type="integer", nullable=true, options={"default"="NULL","unsigned"=true})
     */
    private $preferredrecbyid = 'NULL';

    /**
     * @var \DateTime|null
     *
     * @ORM\Column(name="initialtimestamp", type="datetime", nullable=true, options={"default"="current_timestamp()"})
     */
    private $initialtimestamp = 'current_timestamp()';

    public function getRecordedbyid(): ?int
    {
        return $this->recordedbyid;
    }

    public function getFamilyname(): ?string
    {
        return $this->familyname;
    }

    public function setFamilyname(string $familyname): self
    {
        $this->familyname = $familyname;

        return $this;
    }

    public function getFirstname(): ?string
    {
        return $this->firstname;
    }

    public function setFirstname(?string $firstname): self
    {
        $this->firstname = $firstname;

        return $this;
    }

    public function getMiddlename(): ?string
    {
        return $this->middlename;
    }

    public function setMiddlename(?string $middlename): self
    {
        $this->middlename = $middlename;

        return $this;
    }

    public function getStartyearactive(): ?int
    {
        return $this->startyearactive;
    }

    public function setStartyearactive(?int $startyearactive): self
    {
        $this->startyearactive = $startyearactive;

        return $this;
    }

    public function getEndyearactive(): ?int
    {
        return $this->endyearactive;
    }

    public function setEndyearactive(?int $endyearactive): self
    {
        $this->endyearactive = $endyearactive;

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

    public function getRating(): ?int
    {
        return $this->rating;
    }

    public function setRating(?int $rating): self
    {
        $this->rating = $rating;

        return $this;
    }

    public function getGuid(): ?string
    {
        return $this->guid;
    }

    public function setGuid(?string $guid): self
    {
        $this->guid = $guid;

        return $this;
    }

    public function getPreferredrecbyid(): ?int
    {
        return $this->preferredrecbyid;
    }

    public function setPreferredrecbyid(?int $preferredrecbyid): self
    {
        $this->preferredrecbyid = $preferredrecbyid;

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


}
