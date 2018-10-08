<?php

namespace App\Entities;

use Doctrine\ORM\Mapping as ORM;

/**
 * Omcollectors
 *
 * @ORM\Table(name="omcollectors", indexes={@ORM\Index(name="fullname", columns={"familyname", "firstname"}), @ORM\Index(name="FK_preferred_recby_idx", columns={"preferredrecbyid"})})
 * @ORM\Entity
 */
class Omcollectors
{
    /**
     * @var int
     *
     * @ORM\Column(name="recordedById", type="integer", precision=0, scale=0, nullable=false, options={"unsigned"=true}, unique=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $recordedbyid;

    /**
     * @var string
     *
     * @ORM\Column(name="familyname", type="string", length=45, precision=0, scale=0, nullable=false, unique=false)
     */
    private $familyname;

    /**
     * @var string|null
     *
     * @ORM\Column(name="firstname", type="string", length=45, precision=0, scale=0, nullable=true, unique=false)
     */
    private $firstname;

    /**
     * @var string|null
     *
     * @ORM\Column(name="middlename", type="string", length=45, precision=0, scale=0, nullable=true, unique=false)
     */
    private $middlename;

    /**
     * @var int|null
     *
     * @ORM\Column(name="startyearactive", type="integer", precision=0, scale=0, nullable=true, unique=false)
     */
    private $startyearactive;

    /**
     * @var int|null
     *
     * @ORM\Column(name="endyearactive", type="integer", precision=0, scale=0, nullable=true, unique=false)
     */
    private $endyearactive;

    /**
     * @var string|null
     *
     * @ORM\Column(name="notes", type="string", length=255, precision=0, scale=0, nullable=true, unique=false)
     */
    private $notes;

    /**
     * @var int|null
     *
     * @ORM\Column(name="rating", type="integer", precision=0, scale=0, nullable=true, options={"default"="10"}, unique=false)
     */
    private $rating = '10';

    /**
     * @var string|null
     *
     * @ORM\Column(name="guid", type="string", length=45, precision=0, scale=0, nullable=true, unique=false)
     */
    private $guid;

    /**
     * @var int|null
     *
     * @ORM\Column(name="preferredrecbyid", type="integer", precision=0, scale=0, nullable=true, options={"unsigned"=true}, unique=false)
     */
    private $preferredrecbyid;

    /**
     * @var \DateTime|null
     *
     * @ORM\Column(name="initialtimestamp", type="datetime", precision=0, scale=0, nullable=true, options={"default"="CURRENT_TIMESTAMP"}, unique=false)
     */
    private $initialtimestamp = 'CURRENT_TIMESTAMP';


    /**
     * Get recordedbyid.
     *
     * @return int
     */
    public function getRecordedbyid()
    {
        return $this->recordedbyid;
    }

    /**
     * Set familyname.
     *
     * @param string $familyname
     *
     * @return Omcollectors
     */
    public function setFamilyname($familyname)
    {
        $this->familyname = $familyname;

        return $this;
    }

    /**
     * Get familyname.
     *
     * @return string
     */
    public function getFamilyname()
    {
        return $this->familyname;
    }

    /**
     * Set firstname.
     *
     * @param string|null $firstname
     *
     * @return Omcollectors
     */
    public function setFirstname($firstname = null)
    {
        $this->firstname = $firstname;

        return $this;
    }

    /**
     * Get firstname.
     *
     * @return string|null
     */
    public function getFirstname()
    {
        return $this->firstname;
    }

    /**
     * Set middlename.
     *
     * @param string|null $middlename
     *
     * @return Omcollectors
     */
    public function setMiddlename($middlename = null)
    {
        $this->middlename = $middlename;

        return $this;
    }

    /**
     * Get middlename.
     *
     * @return string|null
     */
    public function getMiddlename()
    {
        return $this->middlename;
    }

    /**
     * Set startyearactive.
     *
     * @param int|null $startyearactive
     *
     * @return Omcollectors
     */
    public function setStartyearactive($startyearactive = null)
    {
        $this->startyearactive = $startyearactive;

        return $this;
    }

    /**
     * Get startyearactive.
     *
     * @return int|null
     */
    public function getStartyearactive()
    {
        return $this->startyearactive;
    }

    /**
     * Set endyearactive.
     *
     * @param int|null $endyearactive
     *
     * @return Omcollectors
     */
    public function setEndyearactive($endyearactive = null)
    {
        $this->endyearactive = $endyearactive;

        return $this;
    }

    /**
     * Get endyearactive.
     *
     * @return int|null
     */
    public function getEndyearactive()
    {
        return $this->endyearactive;
    }

    /**
     * Set notes.
     *
     * @param string|null $notes
     *
     * @return Omcollectors
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
     * Set rating.
     *
     * @param int|null $rating
     *
     * @return Omcollectors
     */
    public function setRating($rating = null)
    {
        $this->rating = $rating;

        return $this;
    }

    /**
     * Get rating.
     *
     * @return int|null
     */
    public function getRating()
    {
        return $this->rating;
    }

    /**
     * Set guid.
     *
     * @param string|null $guid
     *
     * @return Omcollectors
     */
    public function setGuid($guid = null)
    {
        $this->guid = $guid;

        return $this;
    }

    /**
     * Get guid.
     *
     * @return string|null
     */
    public function getGuid()
    {
        return $this->guid;
    }

    /**
     * Set preferredrecbyid.
     *
     * @param int|null $preferredrecbyid
     *
     * @return Omcollectors
     */
    public function setPreferredrecbyid($preferredrecbyid = null)
    {
        $this->preferredrecbyid = $preferredrecbyid;

        return $this;
    }

    /**
     * Get preferredrecbyid.
     *
     * @return int|null
     */
    public function getPreferredrecbyid()
    {
        return $this->preferredrecbyid;
    }

    /**
     * Set initialtimestamp.
     *
     * @param \DateTime|null $initialtimestamp
     *
     * @return Omcollectors
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
}
