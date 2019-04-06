<?php

namespace Occurrence\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Annotation\Groups;
use Symfony\Component\Validator\Constraints as Assert;
use Core\Entity\InitialTimestampInterface;
use Taxa\Entity\Taxa;
use Collection\Entity\Collections;

/**
 * UploadOccurrences
 *
 * @ORM\Table(name="uploadspectemp", indexes={@ORM\Index(name="Index_uploadspectemp_dbpk", columns={"dbpk"}), @ORM\Index(name="Index_uploadspectemp_occid", columns={"occid"}), @ORM\Index(name="Index_uploadspec_catalognumber", columns={"catalogNumber"}), @ORM\Index(name="FK_uploadspectemp_coll", columns={"collid"}), @ORM\Index(name="Index_uploadspec_sciname", columns={"sciname"})})
 * @ORM\Entity()
 * @ApiResource(
 *     routePrefix="/occurrence",
 *     itemOperations={"get"},
 *     collectionOperations={"get"}
 * )
 */
class UploadOccurrences implements InitialTimestampInterface
{
    /**
     * @var int
     *
     * @ORM\Column(name="upspecid", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var \Collection\Entity\Collections
     *
     * @ORM\ManyToOne(targetEntity="Collection\Entity\Collections")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="collid", referencedColumnName="CollID", nullable=false)
     * })
     */
    private $collectionId;

    /**
     * @var string|null
     *
     * @ORM\Column(name="dbpk", type="string", length=150, nullable=true)
     * @Assert\Length(max=150)
     */
    private $sourcePrimaryKey;

    /**
     * @var int|null
     *
     * @ORM\Column(name="occid", type="integer", nullable=true, options={"unsigned"=true})
     * @Assert\Type(type="integer")
     */
    private $occurrenceId;

    /**
     * @var string|null
     *
     * @ORM\Column(name="basisOfRecord", type="string", length=32, nullable=true, options={"comment"="PreservedSpecimen, LivingSpecimen, HumanObservation"})
     * @Assert\Length(max=32)
     */
    private $basisOfRecord;

    /**
     * @var string|null
     *
     * @ORM\Column(name="occurrenceID", type="string", length=255, nullable=true, options={"comment"="UniqueGlobalIdentifier"})
     * @Assert\Length(max=255)
     */
    private $occurrenceIdentifier;

    /**
     * @var string|null
     *
     * @ORM\Column(name="catalogNumber", type="string", length=32, nullable=true)
     * @Assert\Length(max=32)
     */
    private $catalogNumber;

    /**
     * @var string|null
     *
     * @ORM\Column(name="otherCatalogNumbers", type="string", length=255, nullable=true)
     * @Assert\Length(max=255)
     */
    private $otherCatalogNumbers;

    /**
     * @var string|null
     *
     * @ORM\Column(name="ownerInstitutionCode", type="string", length=32, nullable=true)
     * @Assert\Length(max=32)
     */
    private $ownerInstitutionCode;

    /**
     * @var string|null
     *
     * @ORM\Column(name="institutionID", type="string", length=255, nullable=true)
     * @Assert\Length(max=255)
     */
    private $institutionIdentifier;

    /**
     * @var string|null
     *
     * @ORM\Column(name="collectionID", type="string", length=255, nullable=true)
     * @Assert\Length(max=255)
     */
    private $collectionIdentifier;

    /**
     * @var string|null
     *
     * @ORM\Column(name="datasetID", type="string", length=255, nullable=true)
     * @Assert\Length(max=255)
     */
    private $datasetIdentifier;

    /**
     * @var string|null
     *
     * @ORM\Column(name="institutionCode", type="string", length=64, nullable=true)
     * @Assert\Length(max=64)
     */
    private $institutionCode;

    /**
     * @var string|null
     *
     * @ORM\Column(name="collectionCode", type="string", length=64, nullable=true)
     * @Assert\Length(max=64)
     */
    private $collectionCode;

    /**
     * @var string|null
     *
     * @ORM\Column(name="family", type="string", length=255, nullable=true)
     * @Assert\Length(max=255)
     */
    private $family;

    /**
     * @var string|null
     *
     * @ORM\Column(name="scientificName", type="string", length=255, nullable=true)
     * @Assert\Length(max=255)
     */
    private $scientificNameFull;

    /**
     * @var string|null
     *
     * @ORM\Column(name="sciname", type="string", length=255, nullable=true)
     * @Assert\Length(max=255)
     */
    private $scientificName;

    /**
     * @var \Taxa\Entity\Taxa
     *
     * @ORM\ManyToOne(targetEntity="Taxa\Entity\Taxa")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="tid", referencedColumnName="TID")
     * })
     */
    private $taxaId;

    /**
     * @var string|null
     *
     * @ORM\Column(name="genus", type="string", length=255, nullable=true)
     * @Assert\Length(max=255)
     */
    private $genus;

    /**
     * @var string|null
     *
     * @ORM\Column(name="specificEpithet", type="string", length=255, nullable=true)
     * @Assert\Length(max=255)
     */
    private $specificEpithet;

    /**
     * @var string|null
     *
     * @ORM\Column(name="taxonRank", type="string", length=32, nullable=true)
     * @Assert\Length(max=32)
     */
    private $taxonRank;

    /**
     * @var string|null
     *
     * @ORM\Column(name="infraspecificEpithet", type="string", length=255, nullable=true)
     * @Assert\Length(max=255)
     */
    private $infraspecificEpithet;

    /**
     * @var string|null
     *
     * @ORM\Column(name="scientificNameAuthorship", type="string", length=255, nullable=true)
     * @Assert\Length(max=255)
     */
    private $scientificNameAuthorship;

    /**
     * @var string|null
     *
     * @ORM\Column(name="taxonRemarks", type="text", length=65535, nullable=true)
     * @Assert\Length(max=65535)
     */
    private $taxonRemarks;

    /**
     * @var string|null
     *
     * @ORM\Column(name="identifiedBy", type="string", length=255, nullable=true)
     * @Assert\Length(max=255)
     */
    private $identifiedBy;

    /**
     * @var string|null
     *
     * @ORM\Column(name="dateIdentified", type="string", length=45, nullable=true)
     * @Assert\Length(max=45)
     */
    private $dateIdentified;

    /**
     * @var string|null
     *
     * @ORM\Column(name="identificationReferences", type="text", length=65535, nullable=true)
     * @Assert\Length(max=65535)
     */
    private $identificationReferences;

    /**
     * @var string|null
     *
     * @ORM\Column(name="identificationRemarks", type="text", length=65535, nullable=true)
     * @Assert\Length(max=65535)
     */
    private $identificationRemarks;

    /**
     * @var string|null
     *
     * @ORM\Column(name="identificationQualifier", type="string", length=255, nullable=true, options={"comment"="cf, aff, etc"})
     * @Assert\Length(max=255)
     */
    private $identificationQualifier;

    /**
     * @var string|null
     *
     * @ORM\Column(name="typeStatus", type="string", length=255, nullable=true)
     * @Assert\Length(max=255)
     */
    private $typeStatus;

    /**
     * @var string|null
     *
     * @ORM\Column(name="recordedBy", type="string", length=255, nullable=true, options={"comment"="Collector(s)"})
     * @Assert\Length(max=255)
     */
    private $recordedBy;

    /**
     * @var string|null
     *
     * @ORM\Column(name="recordNumberPrefix", type="string", length=45, nullable=true)
     * @Assert\Length(max=45)
     */
    private $recordNumberPrefix;

    /**
     * @var string|null
     *
     * @ORM\Column(name="recordNumberSuffix", type="string", length=45, nullable=true)
     * @Assert\Length(max=45)
     */
    private $recordNumberSuffix;

    /**
     * @var string|null
     *
     * @ORM\Column(name="recordNumber", type="string", length=32, nullable=true, options={"comment"="Collector Number"})
     * @Assert\Length(max=32)
     */
    private $recordNumber;

    /**
     * @var string|null
     *
     * @ORM\Column(name="CollectorFamilyName", type="string", length=255, nullable=true)
     * @Assert\Length(max=255)
     */
    private $collectorFamilyName;

    /**
     * @var string|null
     *
     * @ORM\Column(name="CollectorInitials", type="string", length=255, nullable=true)
     * @Assert\Length(max=255)
     */
    private $collectorInitials;

    /**
     * @var string|null
     *
     * @ORM\Column(name="associatedCollectors", type="string", length=255, nullable=true)
     * @Assert\Length(max=255)
     */
    private $associatedCollectors;

    /**
     * @var \DateTime|null
     *
     * @ORM\Column(name="eventDate", type="date", nullable=true)
     * @Assert\Date
     */
    private $eventDate;

    /**
     * @var int|null
     *
     * @ORM\Column(name="year", type="integer", nullable=true)
     * @Assert\Type(type="integer")
     */
    private $year;

    /**
     * @var int|null
     *
     * @ORM\Column(name="month", type="integer", nullable=true)
     * @Assert\Type(type="integer")
     */
    private $month;

    /**
     * @var int|null
     *
     * @ORM\Column(name="day", type="integer", nullable=true)
     * @Assert\Type(type="integer")
     */
    private $day;

    /**
     * @var int|null
     *
     * @ORM\Column(name="startDayOfYear", type="integer", nullable=true)
     * @Assert\Type(type="integer")
     */
    private $startDayOfYear;

    /**
     * @var int|null
     *
     * @ORM\Column(name="endDayOfYear", type="integer", nullable=true)
     * @Assert\Type(type="integer")
     */
    private $endDayOfYear;

    /**
     * @var \DateTime|null
     *
     * @ORM\Column(name="LatestDateCollected", type="date", nullable=true)
     * @Assert\Date
     */
    private $latestDateCollected;

    /**
     * @var string|null
     *
     * @ORM\Column(name="verbatimEventDate", type="string", length=255, nullable=true)
     * @Assert\Length(max=255)
     */
    private $verbatimEventDate;

    /**
     * @var string|null
     *
     * @ORM\Column(name="habitat", type="text", length=65535, nullable=true, options={"comment"="Habitat, substrait, etc"})
     * @Assert\Length(max=65535)
     */
    private $habitat;

    /**
     * @var string|null
     *
     * @ORM\Column(name="substrate", type="string", length=500, nullable=true)
     * @Assert\Length(max=500)
     */
    private $substrate;

    /**
     * @var string|null
     *
     * @ORM\Column(name="host", type="string", length=250, nullable=true)
     * @Assert\Length(max=250)
     */
    private $host;

    /**
     * @var string|null
     *
     * @ORM\Column(name="fieldNotes", type="text", length=65535, nullable=true)
     * @Assert\Length(max=65535)
     */
    private $fieldNotes;

    /**
     * @var string|null
     *
     * @ORM\Column(name="fieldnumber", type="string", length=45, nullable=true)
     * @Assert\Length(max=45)
     */
    private $fieldNumber;

    /**
     * @var string|null
     *
     * @ORM\Column(name="occurrenceRemarks", type="text", length=65535, nullable=true, options={"comment"="General Notes"})
     * @Assert\Length(max=65535)
     */
    private $occurrenceRemarks;

    /**
     * @var string|null
     *
     * @ORM\Column(name="informationWithheld", type="string", length=250, nullable=true)
     * @Assert\Length(max=250)
     */
    private $informationWithheld;

    /**
     * @var string|null
     *
     * @ORM\Column(name="dataGeneralizations", type="string", length=250, nullable=true)
     * @Assert\Length(max=250)
     */
    private $dataGeneralizations;

    /**
     * @var string|null
     *
     * @ORM\Column(name="associatedOccurrences", type="text", length=65535, nullable=true)
     * @Assert\Length(max=65535)
     */
    private $associatedOccurrences;

    /**
     * @var string|null
     *
     * @ORM\Column(name="associatedMedia", type="text", length=65535, nullable=true)
     * @Assert\Length(max=65535)
     */
    private $associatedMedia;

    /**
     * @var string|null
     *
     * @ORM\Column(name="associatedReferences", type="text", length=65535, nullable=true)
     * @Assert\Length(max=65535)
     */
    private $associatedReferences;

    /**
     * @var string|null
     *
     * @ORM\Column(name="associatedSequences", type="text", length=65535, nullable=true)
     * @Assert\Length(max=65535)
     */
    private $associatedSequences;

    /**
     * @var string|null
     *
     * @ORM\Column(name="associatedTaxa", type="text", length=65535, nullable=true, options={"comment"="Associated Species"})
     * @Assert\Length(max=65535)
     */
    private $associatedTaxa;

    /**
     * @var string|null
     *
     * @ORM\Column(name="dynamicProperties", type="text", length=65535, nullable=true, options={"comment"="Plant Description?"})
     * @Assert\Length(max=65535)
     */
    private $dynamicProperties;

    /**
     * @var string|null
     *
     * @ORM\Column(name="verbatimAttributes", type="text", length=65535, nullable=true)
     * @Assert\Length(max=65535)
     */
    private $verbatimAttributes;

    /**
     * @var string|null
     *
     * @ORM\Column(name="behavior", type="string", length=500, nullable=true)
     * @Assert\Length(max=500)
     */
    private $behavior;

    /**
     * @var string|null
     *
     * @ORM\Column(name="reproductiveCondition", type="string", length=255, nullable=true, options={"comment"="Phenology: flowers, fruit, sterile"})
     * @Assert\Length(max=255)
     */
    private $reproductiveCondition;

    /**
     * @var int|null
     *
     * @ORM\Column(name="cultivationStatus", type="integer", nullable=true, options={"comment"="0 = wild, 1 = cultivated"})
     * @Assert\Type(type="integer")
     */
    private $cultivationStatus;

    /**
     * @var string|null
     *
     * @ORM\Column(name="establishmentMeans", type="string", length=32, nullable=true, options={"comment"="cultivated, invasive, escaped from captivity, wild, native"})
     * @Assert\Length(max=32)
     */
    private $establishmentMeans;

    /**
     * @var string|null
     *
     * @ORM\Column(name="lifeStage", type="string", length=45, nullable=true)
     * @Assert\Length(max=45)
     */
    private $lifeStage;

    /**
     * @var string|null
     *
     * @ORM\Column(name="sex", type="string", length=45, nullable=true)
     * @Assert\Length(max=45)
     */
    private $sex;

    /**
     * @var string|null
     *
     * @ORM\Column(name="individualCount", type="string", length=45, nullable=true)
     * @Assert\Length(max=45)
     */
    private $individualCount;

    /**
     * @var string|null
     *
     * @ORM\Column(name="samplingProtocol", type="string", length=100, nullable=true)
     * @Assert\Length(max=100)
     */
    private $samplingProtocol;

    /**
     * @var string|null
     *
     * @ORM\Column(name="samplingEffort", type="string", length=200, nullable=true)
     * @Assert\Length(max=200)
     */
    private $samplingEffort;

    /**
     * @var string|null
     *
     * @ORM\Column(name="preparations", type="string", length=100, nullable=true)
     * @Assert\Length(max=100)
     */
    private $preparations;

    /**
     * @var string|null
     *
     * @ORM\Column(name="country", type="string", length=64, nullable=true)
     * @Assert\Length(max=64)
     */
    private $country;

    /**
     * @var string|null
     *
     * @ORM\Column(name="stateProvince", type="string", length=255, nullable=true)
     * @Assert\Length(max=255)
     */
    private $stateProvince;

    /**
     * @var string|null
     *
     * @ORM\Column(name="county", type="string", length=255, nullable=true)
     * @Assert\Length(max=255)
     */
    private $county;

    /**
     * @var string|null
     *
     * @ORM\Column(name="municipality", type="string", length=255, nullable=true)
     * @Assert\Length(max=255)
     */
    private $municipality;

    /**
     * @var string|null
     *
     * @ORM\Column(name="locality", type="text", length=65535, nullable=true)
     * @Assert\Length(max=65535)
     */
    private $locality;

    /**
     * @var int|null
     *
     * @ORM\Column(name="localitySecurity", type="integer", nullable=true, options={"comment"="0 = display locality, 1 = hide locality"})
     * @Assert\Type(type="integer")
     */
    private $localitySecurity;

    /**
     * @var string|null
     *
     * @ORM\Column(name="localitySecurityReason", type="string", length=100, nullable=true)
     * @Assert\Length(max=100)
     */
    private $localitySecurityReason;

    /**
     * @var float|null
     *
     * @ORM\Column(name="decimalLatitude", type="float", precision=10, scale=0, nullable=true)
     * @Assert\Type(type="float")
     */
    private $decimalLatitude;

    /**
     * @var float|null
     *
     * @ORM\Column(name="decimalLongitude", type="float", precision=10, scale=0, nullable=true)
     * @Assert\Type(type="float")
     */
    private $decimalLongitude;

    /**
     * @var string|null
     *
     * @ORM\Column(name="geodeticDatum", type="string", length=255, nullable=true)
     * @Assert\Length(max=255)
     */
    private $geodeticDatum;

    /**
     * @var int|null
     *
     * @ORM\Column(name="coordinateUncertaintyInMeters", type="integer", nullable=true, options={"unsigned"=true})
     * @Assert\Type(type="integer")
     */
    private $coordinateUncertaintyInMeters;

    /**
     * @var string|null
     *
     * @ORM\Column(name="footprintWKT", type="text", length=65535, nullable=true)
     * @Assert\Length(max=65535)
     */
    private $footprintWkt;

    /**
     * @var string|null
     *
     * @ORM\Column(name="coordinatePrecision", type="decimal", precision=9, scale=7, nullable=true)
     * @Assert\Type(type="float")
     */
    private $coordinatePrecision;

    /**
     * @var string|null
     *
     * @ORM\Column(name="locationRemarks", type="text", length=65535, nullable=true)
     * @Assert\Length(max=65535)
     */
    private $locationRemarks;

    /**
     * @var string|null
     *
     * @ORM\Column(name="verbatimCoordinates", type="string", length=255, nullable=true)
     * @Assert\Length(max=255)
     */
    private $verbatimCoordinates;

    /**
     * @var string|null
     *
     * @ORM\Column(name="verbatimCoordinateSystem", type="string", length=255, nullable=true)
     * @Assert\Length(max=255)
     */
    private $verbatimCoordinateSystem;

    /**
     * @var int|null
     *
     * @ORM\Column(name="latDeg", type="integer", nullable=true)
     * @Assert\Type(type="integer")
     */
    private $latitudeDegrees;

    /**
     * @var float|null
     *
     * @ORM\Column(name="latMin", type="float", precision=10, scale=0, nullable=true)
     * @Assert\Type(type="float")
     */
    private $latitudeMinutes;

    /**
     * @var float|null
     *
     * @ORM\Column(name="latSec", type="float", precision=10, scale=0, nullable=true)
     * @Assert\Type(type="float")
     */
    private $latitudeSeconds;

    /**
     * @var string|null
     *
     * @ORM\Column(name="latNS", type="string", length=3, nullable=true)
     * @Assert\Length(max=3)
     */
    private $latitudeNorthSouth;

    /**
     * @var int|null
     *
     * @ORM\Column(name="lngDeg", type="integer", nullable=true)
     * @Assert\Type(type="integer")
     */
    private $longitudeDegrees;

    /**
     * @var float|null
     *
     * @ORM\Column(name="lngMin", type="float", precision=10, scale=0, nullable=true)
     * @Assert\Type(type="float")
     */
    private $longitudeMinutes;

    /**
     * @var float|null
     *
     * @ORM\Column(name="lngSec", type="float", precision=10, scale=0, nullable=true)
     * @Assert\Type(type="float")
     */
    private $longitudeSeconds;

    /**
     * @var string|null
     *
     * @ORM\Column(name="lngEW", type="string", length=3, nullable=true)
     * @Assert\Length(max=3)
     */
    private $longitudeEastWest;

    /**
     * @var string|null
     *
     * @ORM\Column(name="verbatimLatitude", type="string", length=45, nullable=true)
     * @Assert\Length(max=45)
     */
    private $verbatimLatitude;

    /**
     * @var string|null
     *
     * @ORM\Column(name="verbatimLongitude", type="string", length=45, nullable=true)
     * @Assert\Length(max=45)
     */
    private $verbatimLongitude;

    /**
     * @var string|null
     *
     * @ORM\Column(name="UtmNorthing", type="string", length=45, nullable=true)
     * @Assert\Length(max=45)
     */
    private $utmNorthing;

    /**
     * @var string|null
     *
     * @ORM\Column(name="UtmEasting", type="string", length=45, nullable=true)
     * @Assert\Length(max=45)
     */
    private $utmEasting;

    /**
     * @var string|null
     *
     * @ORM\Column(name="UtmZoning", type="string", length=45, nullable=true)
     * @Assert\Length(max=45)
     */
    private $utmZone;

    /**
     * @var string|null
     *
     * @ORM\Column(name="trsTownship", type="string", length=45, nullable=true)
     * @Assert\Length(max=45)
     */
    private $township;

    /**
     * @var string|null
     *
     * @ORM\Column(name="trsRange", type="string", length=45, nullable=true)
     * @Assert\Length(max=45)
     */
    private $range;

    /**
     * @var string|null
     *
     * @ORM\Column(name="trsSection", type="string", length=45, nullable=true)
     * @Assert\Length(max=45)
     */
    private $section;

    /**
     * @var string|null
     *
     * @ORM\Column(name="trsSectionDetails", type="string", length=45, nullable=true)
     * @Assert\Length(max=45)
     */
    private $sectionDetails;

    /**
     * @var string|null
     *
     * @ORM\Column(name="georeferencedBy", type="string", length=255, nullable=true)
     * @Assert\Length(max=255)
     */
    private $georeferencedBy;

    /**
     * @var string|null
     *
     * @ORM\Column(name="georeferenceProtocol", type="string", length=255, nullable=true)
     * @Assert\Length(max=255)
     */
    private $georeferenceProtocol;

    /**
     * @var string|null
     *
     * @ORM\Column(name="georeferenceSources", type="string", length=255, nullable=true)
     * @Assert\Length(max=255)
     */
    private $georeferenceSources;

    /**
     * @var string|null
     *
     * @ORM\Column(name="georeferenceVerificationStatus", type="string", length=32, nullable=true)
     * @Assert\Length(max=32)
     */
    private $georeferenceVerificationStatus;

    /**
     * @var string|null
     *
     * @ORM\Column(name="georeferenceRemarks", type="string", length=255, nullable=true)
     * @Assert\Length(max=255)
     */
    private $georeferenceRemarks;

    /**
     * @var int|null
     *
     * @ORM\Column(name="minimumElevationInMeters", type="integer", nullable=true)
     * @Assert\Type(type="integer")
     */
    private $minimumelEvationInMeters;

    /**
     * @var int|null
     *
     * @ORM\Column(name="maximumElevationInMeters", type="integer", nullable=true)
     * @Assert\Type(type="integer")
     */
    private $maximumElevationInMeters;

    /**
     * @var string|null
     *
     * @ORM\Column(name="elevationNumber", type="string", length=45, nullable=true)
     * @Assert\Length(max=45)
     */
    private $elevationNumber;

    /**
     * @var string|null
     *
     * @ORM\Column(name="elevationUnits", type="string", length=45, nullable=true)
     * @Assert\Length(max=45)
     */
    private $elevationUnits;

    /**
     * @var string|null
     *
     * @ORM\Column(name="verbatimElevation", type="string", length=255, nullable=true)
     * @Assert\Length(max=255)
     */
    private $verbatimElevation;

    /**
     * @var int|null
     *
     * @ORM\Column(name="minimumDepthInMeters", type="integer", nullable=true)
     * @Assert\Type(type="integer")
     */
    private $minimumDepthInMeters;

    /**
     * @var int|null
     *
     * @ORM\Column(name="maximumDepthInMeters", type="integer", nullable=true)
     * @Assert\Type(type="integer")
     */
    private $maximumDepthInMeters;

    /**
     * @var string|null
     *
     * @ORM\Column(name="verbatimDepth", type="string", length=50, nullable=true)
     * @Assert\Length(max=50)
     */
    private $verbatimDepth;

    /**
     * @var string|null
     *
     * @ORM\Column(name="previousIdentifications", type="text", length=65535, nullable=true)
     * @Assert\Length(max=65535)
     */
    private $previousIdentifications;

    /**
     * @var string|null
     *
     * @ORM\Column(name="disposition", type="string", length=32, nullable=true, options={"comment"="Dups to"})
     * @Assert\Length(max=32)
     */
    private $disposition;

    /**
     * @var string|null
     *
     * @ORM\Column(name="storageLocation", type="string", length=100, nullable=true)
     * @Assert\Length(max=100)
     */
    private $storageLocation;

    /**
     * @var int|null
     *
     * @ORM\Column(name="exsiccatiIdentifier", type="integer", nullable=true)
     * @Assert\Type(type="integer")
     */
    private $exsiccatiIdentifier;

    /**
     * @var string|null
     *
     * @ORM\Column(name="exsiccatiNumber", type="string", length=45, nullable=true)
     * @Assert\Length(max=45)
     */
    private $exsiccatiNumber;

    /**
     * @var string|null
     *
     * @ORM\Column(name="exsiccatiNotes", type="string", length=250, nullable=true)
     * @Assert\Length(max=250)
     */
    private $exsiccatiNotes;

    /**
     * @var \DateTime|null
     *
     * @ORM\Column(name="modified", type="datetime", nullable=true, options={"comment"="DateLastModified"})
     * @Assert\DateTime
     */
    private $modified;

    /**
     * @var string|null
     *
     * @ORM\Column(name="language", type="string", length=20, nullable=true)
     * @Assert\Length(max=20)
     */
    private $language;

    /**
     * @var string|null
     *
     * @ORM\Column(name="recordEnteredBy", type="string", length=250, nullable=true)
     * @Assert\Length(max=250)
     */
    private $recordEnteredBy;

    /**
     * @var int|null
     *
     * @ORM\Column(name="duplicateQuantity", type="integer", nullable=true, options={"unsigned"=true})
     * @Assert\Type(type="integer")
     */
    private $duplicateQuantity;

    /**
     * @var string|null
     *
     * @ORM\Column(name="labelProject", type="string", length=45, nullable=true)
     * @Assert\Length(max=45)
     */
    private $labelProject;

    /**
     * @var string|null
     *
     * @ORM\Column(name="processingStatus", type="string", length=45, nullable=true)
     * @Assert\Length(max=45)
     */
    private $processingStatus;

    /**
     * @var string|null
     *
     * @ORM\Column(name="tempfield01", type="text", length=65535, nullable=true)
     * @Assert\Length(max=65535)
     */
    private $tempField01;

    /**
     * @var string|null
     *
     * @ORM\Column(name="tempfield02", type="text", length=65535, nullable=true)
     * @Assert\Length(max=65535)
     */
    private $tempField02;

    /**
     * @var string|null
     *
     * @ORM\Column(name="tempfield03", type="text", length=65535, nullable=true)
     * @Assert\Length(max=65535)
     */
    private $tempField03;

    /**
     * @var string|null
     *
     * @ORM\Column(name="tempfield04", type="text", length=65535, nullable=true)
     * @Assert\Length(max=65535)
     */
    private $tempField04;

    /**
     * @var string|null
     *
     * @ORM\Column(name="tempfield05", type="text", length=65535, nullable=true)
     * @Assert\Length(max=65535)
     */
    private $tempField05;

    /**
     * @var string|null
     *
     * @ORM\Column(name="tempfield06", type="text", length=65535, nullable=true)
     * @Assert\Length(max=65535)
     */
    private $tempField06;

    /**
     * @var string|null
     *
     * @ORM\Column(name="tempfield07", type="text", length=65535, nullable=true)
     * @Assert\Length(max=65535)
     */
    private $tempField07;

    /**
     * @var string|null
     *
     * @ORM\Column(name="tempfield08", type="text", length=65535, nullable=true)
     * @Assert\Length(max=65535)
     */
    private $tempField08;

    /**
     * @var string|null
     *
     * @ORM\Column(name="tempfield09", type="text", length=65535, nullable=true)
     * @Assert\Length(max=65535)
     */
    private $tempField09;

    /**
     * @var string|null
     *
     * @ORM\Column(name="tempfield10", type="text", length=65535, nullable=true)
     * @Assert\Length(max=65535)
     */
    private $tempField10;

    /**
     * @var string|null
     *
     * @ORM\Column(name="tempfield11", type="text", length=65535, nullable=true)
     * @Assert\Length(max=65535)
     */
    private $tempField11;

    /**
     * @var string|null
     *
     * @ORM\Column(name="tempfield12", type="text", length=65535, nullable=true)
     * @Assert\Length(max=65535)
     */
    private $tempField12;

    /**
     * @var string|null
     *
     * @ORM\Column(name="tempfield13", type="text", length=65535, nullable=true)
     * @Assert\Length(max=65535)
     */
    private $tempField13;

    /**
     * @var string|null
     *
     * @ORM\Column(name="tempfield14", type="text", length=65535, nullable=true)
     * @Assert\Length(max=65535)
     */
    private $tempField14;

    /**
     * @var string|null
     *
     * @ORM\Column(name="tempfield15", type="text", length=65535, nullable=true)
     * @Assert\Length(max=65535)
     */
    private $tempField15;

    /**
     * @var \DateTime|null
     *
     * @ORM\Column(name="initialTimestamp", type="datetime", nullable=true)
     */
    private $initialTimestamp;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getSourcePrimaryKey(): ?string
    {
        return $this->sourcePrimaryKey;
    }

    public function setSourcePrimaryKey(?string $sourcePrimaryKey): self
    {
        $this->sourcePrimaryKey = $sourcePrimaryKey;

        return $this;
    }

    public function getOccurrenceId(): ?int
    {
        return $this->occurrenceId;
    }

    public function setOccurrenceId(?int $occurrenceId): self
    {
        $this->occurrenceId = $occurrenceId;

        return $this;
    }

    public function getBasisOfRecord(): ?string
    {
        return $this->basisOfRecord;
    }

    public function setBasisOfRecord(?string $basisOfRecord): self
    {
        $this->basisOfRecord = $basisOfRecord;

        return $this;
    }

    public function getOccurrenceIdentifier(): ?string
    {
        return $this->occurrenceIdentifier;
    }

    public function setOccurrenceIdentifier(?string $occurrenceIdentifier): self
    {
        $this->occurrenceIdentifier = $occurrenceIdentifier;

        return $this;
    }

    public function getCatalogNumber(): ?string
    {
        return $this->catalogNumber;
    }

    public function setCatalogNumber(?string $catalogNumber): self
    {
        $this->catalogNumber = $catalogNumber;

        return $this;
    }

    public function getOtherCatalogNumbers(): ?string
    {
        return $this->otherCatalogNumbers;
    }

    public function setOtherCatalogNumbers(?string $otherCatalogNumbers): self
    {
        $this->otherCatalogNumbers = $otherCatalogNumbers;

        return $this;
    }

    public function getOwnerInstitutionCode(): ?string
    {
        return $this->ownerInstitutionCode;
    }

    public function setOwnerInstitutionCode(?string $ownerInstitutionCode): self
    {
        $this->ownerInstitutionCode = $ownerInstitutionCode;

        return $this;
    }

    public function getInstitutionIdentifier(): ?string
    {
        return $this->institutionIdentifier;
    }

    public function setInstitutionIdentifier(?string $institutionIdentifier): self
    {
        $this->institutionIdentifier = $institutionIdentifier;

        return $this;
    }

    public function getCollectionIdentifier(): ?string
    {
        return $this->collectionIdentifier;
    }

    public function setCollectionIdentifier(?string $collectionIdentifier): self
    {
        $this->collectionIdentifier = $collectionIdentifier;

        return $this;
    }

    public function getDatasetIdentifier(): ?string
    {
        return $this->datasetIdentifier;
    }

    public function setDatasetIdentifier(?string $datasetIdentifier): self
    {
        $this->datasetIdentifier = $datasetIdentifier;

        return $this;
    }

    public function getInstitutionCode(): ?string
    {
        return $this->institutionCode;
    }

    public function setInstitutionCode(?string $institutionCode): self
    {
        $this->institutionCode = $institutionCode;

        return $this;
    }

    public function getCollectionCode(): ?string
    {
        return $this->collectionCode;
    }

    public function setCollectionCode(?string $collectionCode): self
    {
        $this->collectionCode = $collectionCode;

        return $this;
    }

    public function getFamily(): ?string
    {
        return $this->family;
    }

    public function setFamily(?string $family): self
    {
        $this->family = $family;

        return $this;
    }

    public function getScientificNameFull(): ?string
    {
        return $this->scientificNameFull;
    }

    public function setScientificNameFull(?string $scientificNameFull): self
    {
        $this->scientificNameFull = $scientificNameFull;

        return $this;
    }

    public function getScientificName(): ?string
    {
        return $this->scientificName;
    }

    public function setScientificName(?string $scientificName): self
    {
        $this->scientificName = $scientificName;

        return $this;
    }

    public function getTaxaId(): ?Taxa
    {
        return $this->taxaId;
    }

    public function setTaxaId(?int $taxaId): self
    {
        $this->taxaId = $taxaId;

        return $this;
    }

    public function getGenus(): ?string
    {
        return $this->genus;
    }

    public function setGenus(?string $genus): self
    {
        $this->genus = $genus;

        return $this;
    }

    public function getSpecificEpithet(): ?string
    {
        return $this->specificEpithet;
    }

    public function setSpecificEpithet(?string $specificEpithet): self
    {
        $this->specificEpithet = $specificEpithet;

        return $this;
    }

    public function getTaxonRank(): ?string
    {
        return $this->taxonRank;
    }

    public function setTaxonRank(?string $taxonRank): self
    {
        $this->taxonRank = $taxonRank;

        return $this;
    }

    public function getInfraspecificEpithet(): ?string
    {
        return $this->infraspecificEpithet;
    }

    public function setInfraspecificEpithet(?string $infraspecificEpithet): self
    {
        $this->infraspecificEpithet = $infraspecificEpithet;

        return $this;
    }

    public function getScientificNameAuthorship(): ?string
    {
        return $this->scientificNameAuthorship;
    }

    public function setScientificNameAuthorship(?string $scientificNameAuthorship): self
    {
        $this->scientificNameAuthorship = $scientificNameAuthorship;

        return $this;
    }

    public function getTaxonRemarks(): ?string
    {
        return $this->taxonRemarks;
    }

    public function setTaxonRemarks(?string $taxonRemarks): self
    {
        $this->taxonRemarks = $taxonRemarks;

        return $this;
    }

    public function getIdentifiedBy(): ?string
    {
        return $this->identifiedBy;
    }

    public function setIdentifiedBy(?string $identifiedBy): self
    {
        $this->identifiedBy = $identifiedBy;

        return $this;
    }

    public function getDateIdentified(): ?string
    {
        return $this->dateIdentified;
    }

    public function setDateIdentified(?string $dateIdentified): self
    {
        $this->dateIdentified = $dateIdentified;

        return $this;
    }

    public function getIdentificationReferences(): ?string
    {
        return $this->identificationReferences;
    }

    public function setIdentificationReferences(?string $identificationReferences): self
    {
        $this->identificationReferences = $identificationReferences;

        return $this;
    }

    public function getIdentificationRemarks(): ?string
    {
        return $this->identificationRemarks;
    }

    public function setIdentificationRemarks(?string $identificationRemarks): self
    {
        $this->identificationRemarks = $identificationRemarks;

        return $this;
    }

    public function getIdentificationQualifier(): ?string
    {
        return $this->identificationQualifier;
    }

    public function setIdentificationQualifier(?string $identificationQualifier): self
    {
        $this->identificationQualifier = $identificationQualifier;

        return $this;
    }

    public function getTypeStatus(): ?string
    {
        return $this->typeStatus;
    }

    public function setTypeStatus(?string $typeStatus): self
    {
        $this->typeStatus = $typeStatus;

        return $this;
    }

    public function getRecordedBy(): ?string
    {
        return $this->recordedBy;
    }

    public function setRecordedBy(?string $recordedBy): self
    {
        $this->recordedBy = $recordedBy;

        return $this;
    }

    public function getRecordNumberPrefix(): ?string
    {
        return $this->recordNumberPrefix;
    }

    public function setRecordNumberPrefix(?string $recordNumberPrefix): self
    {
        $this->recordNumberPrefix = $recordNumberPrefix;

        return $this;
    }

    public function getRecordNumberSuffix(): ?string
    {
        return $this->recordNumberSuffix;
    }

    public function setRecordNumberSuffix(?string $recordNumberSuffix): self
    {
        $this->recordNumberSuffix = $recordNumberSuffix;

        return $this;
    }

    public function getRecordNumber(): ?string
    {
        return $this->recordNumber;
    }

    public function setRecordNumber(?string $recordNumber): self
    {
        $this->recordNumber = $recordNumber;

        return $this;
    }

    public function getCollectorFamilyName(): ?string
    {
        return $this->collectorFamilyName;
    }

    public function setCollectorFamilyName(?string $collectorFamilyName): self
    {
        $this->collectorFamilyName = $collectorFamilyName;

        return $this;
    }

    public function getCollectorInitials(): ?string
    {
        return $this->collectorInitials;
    }

    public function setCollectorInitials(?string $collectorInitials): self
    {
        $this->collectorInitials = $collectorInitials;

        return $this;
    }

    public function getAssociatedCollectors(): ?string
    {
        return $this->associatedCollectors;
    }

    public function setAssociatedCollectors(?string $associatedCollectors): self
    {
        $this->associatedCollectors = $associatedCollectors;

        return $this;
    }

    public function getEventDate(): ?\DateTimeInterface
    {
        return $this->eventDate;
    }

    public function setEventDate(?\DateTimeInterface $eventDate): self
    {
        $this->eventDate = $eventDate;

        return $this;
    }

    public function getYear(): ?int
    {
        return $this->year;
    }

    public function setYear(?int $year): self
    {
        $this->year = $year;

        return $this;
    }

    public function getMonth(): ?int
    {
        return $this->month;
    }

    public function setMonth(?int $month): self
    {
        $this->month = $month;

        return $this;
    }

    public function getDay(): ?int
    {
        return $this->day;
    }

    public function setDay(?int $day): self
    {
        $this->day = $day;

        return $this;
    }

    public function getStartDayOfYear(): ?int
    {
        return $this->startDayOfYear;
    }

    public function setStartDayOfYear(?int $startDayOfYear): self
    {
        $this->startDayOfYear = $startDayOfYear;

        return $this;
    }

    public function getEndDayOfYear(): ?int
    {
        return $this->endDayOfYear;
    }

    public function setEndDayOfYear(?int $endDayOfYear): self
    {
        $this->endDayOfYear = $endDayOfYear;

        return $this;
    }

    public function getLatestDateCollected(): ?\DateTimeInterface
    {
        return $this->latestDateCollected;
    }

    public function setLatestDateCollected(?\DateTimeInterface $latestDateCollected): self
    {
        $this->latestDateCollected = $latestDateCollected;

        return $this;
    }

    public function getVerbatimEventDate(): ?string
    {
        return $this->verbatimEventDate;
    }

    public function setVerbatimEventDate(?string $verbatimEventDate): self
    {
        $this->verbatimEventDate = $verbatimEventDate;

        return $this;
    }

    public function getHabitat(): ?string
    {
        return $this->habitat;
    }

    public function setHabitat(?string $habitat): self
    {
        $this->habitat = $habitat;

        return $this;
    }

    public function getSubstrate(): ?string
    {
        return $this->substrate;
    }

    public function setSubstrate(?string $substrate): self
    {
        $this->substrate = $substrate;

        return $this;
    }

    public function getHost(): ?string
    {
        return $this->host;
    }

    public function setHost(?string $host): self
    {
        $this->host = $host;

        return $this;
    }

    public function getFieldNotes(): ?string
    {
        return $this->fieldNotes;
    }

    public function setFieldNotes(?string $fieldNotes): self
    {
        $this->fieldNotes = $fieldNotes;

        return $this;
    }

    public function getFieldNumber(): ?string
    {
        return $this->fieldNumber;
    }

    public function setFieldNumber(?string $fieldNumber): self
    {
        $this->fieldNumber = $fieldNumber;

        return $this;
    }

    public function getOccurrenceRemarks(): ?string
    {
        return $this->occurrenceRemarks;
    }

    public function setOccurrenceRemarks(?string $occurrenceRemarks): self
    {
        $this->occurrenceRemarks = $occurrenceRemarks;

        return $this;
    }

    public function getInformationWithheld(): ?string
    {
        return $this->informationWithheld;
    }

    public function setInformationWithheld(?string $informationWithheld): self
    {
        $this->informationWithheld = $informationWithheld;

        return $this;
    }

    public function getDataGeneralizations(): ?string
    {
        return $this->dataGeneralizations;
    }

    public function setDataGeneralizations(?string $dataGeneralizations): self
    {
        $this->dataGeneralizations = $dataGeneralizations;

        return $this;
    }

    public function getAssociatedOccurrences(): ?string
    {
        return $this->associatedOccurrences;
    }

    public function setAssociatedOccurrences(?string $associatedOccurrences): self
    {
        $this->associatedOccurrences = $associatedOccurrences;

        return $this;
    }

    public function getAssociatedMedia(): ?string
    {
        return $this->associatedMedia;
    }

    public function setAssociatedMedia(?string $associatedMedia): self
    {
        $this->associatedMedia = $associatedMedia;

        return $this;
    }

    public function getAssociatedReferences(): ?string
    {
        return $this->associatedReferences;
    }

    public function setAssociatedReferences(?string $associatedReferences): self
    {
        $this->associatedReferences = $associatedReferences;

        return $this;
    }

    public function getAssociatedSequences(): ?string
    {
        return $this->associatedSequences;
    }

    public function setAssociatedSequences(?string $associatedSequences): self
    {
        $this->associatedSequences = $associatedSequences;

        return $this;
    }

    public function getAssociatedTaxa(): ?string
    {
        return $this->associatedTaxa;
    }

    public function setAssociatedTaxa(?string $associatedTaxa): self
    {
        $this->associatedTaxa = $associatedTaxa;

        return $this;
    }

    public function getDynamicProperties(): ?string
    {
        return $this->dynamicProperties;
    }

    public function setDynamicProperties(?string $dynamicProperties): self
    {
        $this->dynamicProperties = $dynamicProperties;

        return $this;
    }

    public function getVerbatimAttributes(): ?string
    {
        return $this->verbatimAttributes;
    }

    public function setVerbatimAttributes(?string $verbatimAttributes): self
    {
        $this->verbatimAttributes = $verbatimAttributes;

        return $this;
    }

    public function getBehavior(): ?string
    {
        return $this->behavior;
    }

    public function setBehavior(?string $behavior): self
    {
        $this->behavior = $behavior;

        return $this;
    }

    public function getReproductiveCondition(): ?string
    {
        return $this->reproductiveCondition;
    }

    public function setReproductiveCondition(?string $reproductiveCondition): self
    {
        $this->reproductiveCondition = $reproductiveCondition;

        return $this;
    }

    public function getCultivationStatus(): ?int
    {
        return $this->cultivationStatus;
    }

    public function setCultivationStatus(?int $cultivationStatus): self
    {
        $this->cultivationStatus = $cultivationStatus;

        return $this;
    }

    public function getEstablishmentMeans(): ?string
    {
        return $this->establishmentMeans;
    }

    public function setEstablishmentMeans(?string $establishmentMeans): self
    {
        $this->establishmentMeans = $establishmentMeans;

        return $this;
    }

    public function getLifeStage(): ?string
    {
        return $this->lifeStage;
    }

    public function setLifeStage(?string $lifeStage): self
    {
        $this->lifeStage = $lifeStage;

        return $this;
    }

    public function getSex(): ?string
    {
        return $this->sex;
    }

    public function setSex(?string $sex): self
    {
        $this->sex = $sex;

        return $this;
    }

    public function getIndividualCount(): ?string
    {
        return $this->individualCount;
    }

    public function setIndividualCount(?string $individualCount): self
    {
        $this->individualCount = $individualCount;

        return $this;
    }

    public function getSamplingProtocol(): ?string
    {
        return $this->samplingProtocol;
    }

    public function setSamplingProtocol(?string $samplingProtocol): self
    {
        $this->samplingProtocol = $samplingProtocol;

        return $this;
    }

    public function getSamplingEffort(): ?string
    {
        return $this->samplingEffort;
    }

    public function setSamplingEffort(?string $samplingEffort): self
    {
        $this->samplingEffort = $samplingEffort;

        return $this;
    }

    public function getPreparations(): ?string
    {
        return $this->preparations;
    }

    public function setPreparations(?string $preparations): self
    {
        $this->preparations = $preparations;

        return $this;
    }

    public function getCountry(): ?string
    {
        return $this->country;
    }

    public function setCountry(?string $country): self
    {
        $this->country = $country;

        return $this;
    }

    public function getStateProvince(): ?string
    {
        return $this->stateProvince;
    }

    public function setStateProvince(?string $stateProvince): self
    {
        $this->stateProvince = $stateProvince;

        return $this;
    }

    public function getCounty(): ?string
    {
        return $this->county;
    }

    public function setCounty(?string $county): self
    {
        $this->county = $county;

        return $this;
    }

    public function getMunicipality(): ?string
    {
        return $this->municipality;
    }

    public function setMunicipality(?string $municipality): self
    {
        $this->municipality = $municipality;

        return $this;
    }

    public function getLocality(): ?string
    {
        return $this->locality;
    }

    public function setLocality(?string $locality): self
    {
        $this->locality = $locality;

        return $this;
    }

    public function getLocalitySecurity(): ?int
    {
        return $this->localitySecurity;
    }

    public function setLocalitySecurity(?int $localitySecurity): self
    {
        $this->localitySecurity = $localitySecurity;

        return $this;
    }

    public function getLocalitySecurityReason(): ?string
    {
        return $this->localitySecurityReason;
    }

    public function setLocalitySecurityReason(?string $localitySecurityReason): self
    {
        $this->localitySecurityReason = $localitySecurityReason;

        return $this;
    }

    public function getDecimalLatitude(): ?float
    {
        return $this->decimalLatitude;
    }

    public function setDecimalLatitude(?float $decimalLatitude): self
    {
        $this->decimalLatitude = $decimalLatitude;

        return $this;
    }

    public function getDecimalLongitude(): ?float
    {
        return $this->decimalLongitude;
    }

    public function setDecimalLongitude(?float $decimalLongitude): self
    {
        $this->decimalLongitude = $decimalLongitude;

        return $this;
    }

    public function getGeodeticDatum(): ?string
    {
        return $this->geodeticDatum;
    }

    public function setGeodeticDatum(?string $geodeticDatum): self
    {
        $this->geodeticDatum = $geodeticDatum;

        return $this;
    }

    public function getCoordinateUncertaintyInMeters(): ?int
    {
        return $this->coordinateUncertaintyInMeters;
    }

    public function setCoordinateUncertaintyInMeters(?int $coordinateUncertaintyInMeters): self
    {
        $this->coordinateUncertaintyInMeters = $coordinateUncertaintyInMeters;

        return $this;
    }

    public function getFootprintWkt(): ?string
    {
        return $this->footprintWkt;
    }

    public function setFootprintWkt(?string $footprintWkt): self
    {
        $this->footprintWkt = $footprintWkt;

        return $this;
    }

    public function getCoordinatePrecision()
    {
        return $this->coordinatePrecision;
    }

    public function setCoordinatePrecision($coordinatePrecision): self
    {
        $this->coordinatePrecision = $coordinatePrecision;

        return $this;
    }

    public function getLocationRemarks(): ?string
    {
        return $this->locationRemarks;
    }

    public function setLocationRemarks(?string $locationRemarks): self
    {
        $this->locationRemarks = $locationRemarks;

        return $this;
    }

    public function getVerbatimCoordinates(): ?string
    {
        return $this->verbatimCoordinates;
    }

    public function setVerbatimCoordinates(?string $verbatimCoordinates): self
    {
        $this->verbatimCoordinates = $verbatimCoordinates;

        return $this;
    }

    public function getVerbatimCoordinateSystem(): ?string
    {
        return $this->verbatimCoordinateSystem;
    }

    public function setVerbatimCoordinateSystem(?string $verbatimCoordinateSystem): self
    {
        $this->verbatimCoordinateSystem = $verbatimCoordinateSystem;

        return $this;
    }

    public function getLatitudeDegrees(): ?int
    {
        return $this->latitudeDegrees;
    }

    public function setLatitudeDegrees(?int $latitudeDegrees): self
    {
        $this->latitudeDegrees = $latitudeDegrees;

        return $this;
    }

    public function getLatitudeMinutes(): ?float
    {
        return $this->latitudeMinutes;
    }

    public function setLatitudeMinutes(?float $latitudeMinutes): self
    {
        $this->latitudeMinutes = $latitudeMinutes;

        return $this;
    }

    public function getLatitudeSeconds(): ?float
    {
        return $this->latitudeSeconds;
    }

    public function setLatitudeSeconds(?float $latitudeSeconds): self
    {
        $this->latitudeSeconds = $latitudeSeconds;

        return $this;
    }

    public function getLatitudeNorthSouth(): ?string
    {
        return $this->latitudeNorthSouth;
    }

    public function setLatitudeNorthSouth(?string $latitudeNorthSouth): self
    {
        $this->latitudeNorthSouth = $latitudeNorthSouth;

        return $this;
    }

    public function getLongitudeDegrees(): ?int
    {
        return $this->longitudeDegrees;
    }

    public function setLongitudeDegrees(?int $longitudeDegrees): self
    {
        $this->longitudeDegrees = $longitudeDegrees;

        return $this;
    }

    public function getLongitudeMinutes(): ?float
    {
        return $this->longitudeMinutes;
    }

    public function setLongitudeMinutes(?float $longitudeMinutes): self
    {
        $this->longitudeMinutes = $longitudeMinutes;

        return $this;
    }

    public function getLongitudeSeconds(): ?float
    {
        return $this->longitudeSeconds;
    }

    public function setLongitudeSeconds(?float $longitudeSeconds): self
    {
        $this->longitudeSeconds = $longitudeSeconds;

        return $this;
    }

    public function getLongitudeEastWest(): ?string
    {
        return $this->longitudeEastWest;
    }

    public function setLongitudeEastWest(?string $longitudeEastWest): self
    {
        $this->longitudeEastWest = $longitudeEastWest;

        return $this;
    }

    public function getVerbatimLatitude(): ?string
    {
        return $this->verbatimLatitude;
    }

    public function setVerbatimLatitude(?string $verbatimLatitude): self
    {
        $this->verbatimLatitude = $verbatimLatitude;

        return $this;
    }

    public function getVerbatimLongitude(): ?string
    {
        return $this->verbatimLongitude;
    }

    public function setVerbatimLongitude(?string $verbatimLongitude): self
    {
        $this->verbatimLongitude = $verbatimLongitude;

        return $this;
    }

    public function getUtmNorthing(): ?string
    {
        return $this->utmNorthing;
    }

    public function setUtmNorthing(?string $utmNorthing): self
    {
        $this->utmNorthing = $utmNorthing;

        return $this;
    }

    public function getUtmEasting(): ?string
    {
        return $this->utmEasting;
    }

    public function setUtmEasting(?string $utmEasting): self
    {
        $this->utmEasting = $utmEasting;

        return $this;
    }

    public function getUtmZone(): ?string
    {
        return $this->utmZone;
    }

    public function setUtmZone(?string $utmZone): self
    {
        $this->utmZone = $utmZone;

        return $this;
    }

    public function getTownship(): ?string
    {
        return $this->township;
    }

    public function setTownship(?string $township): self
    {
        $this->township = $township;

        return $this;
    }

    public function getRange(): ?string
    {
        return $this->range;
    }

    public function setRange(?string $range): self
    {
        $this->range = $range;

        return $this;
    }

    public function getSection(): ?string
    {
        return $this->section;
    }

    public function setSection(?string $section): self
    {
        $this->section = $section;

        return $this;
    }

    public function getSectionDetails(): ?string
    {
        return $this->sectionDetails;
    }

    public function setSectionDetails(?string $sectionDetails): self
    {
        $this->sectionDetails = $sectionDetails;

        return $this;
    }

    public function getGeoreferencedBy(): ?string
    {
        return $this->georeferencedBy;
    }

    public function setGeoreferencedBy(?string $georeferencedBy): self
    {
        $this->georeferencedBy = $georeferencedBy;

        return $this;
    }

    public function getGeoreferenceProtocol(): ?string
    {
        return $this->georeferenceProtocol;
    }

    public function setGeoreferenceProtocol(?string $georeferenceProtocol): self
    {
        $this->georeferenceProtocol = $georeferenceProtocol;

        return $this;
    }

    public function getGeoreferenceSources(): ?string
    {
        return $this->georeferenceSources;
    }

    public function setGeoreferenceSources(?string $georeferenceSources): self
    {
        $this->georeferenceSources = $georeferenceSources;

        return $this;
    }

    public function getGeoreferenceVerificationStatus(): ?string
    {
        return $this->georeferenceVerificationStatus;
    }

    public function setGeoreferenceVerificationStatus(?string $georeferenceVerificationStatus): self
    {
        $this->georeferenceVerificationStatus = $georeferenceVerificationStatus;

        return $this;
    }

    public function getGeoreferenceRemarks(): ?string
    {
        return $this->georeferenceRemarks;
    }

    public function setGeoreferenceRemarks(?string $georeferenceRemarks): self
    {
        $this->georeferenceRemarks = $georeferenceRemarks;

        return $this;
    }

    public function getMinimumelEvationInMeters(): ?int
    {
        return $this->minimumelEvationInMeters;
    }

    public function setMinimumelEvationInMeters(?int $minimumelEvationInMeters): self
    {
        $this->minimumelEvationInMeters = $minimumelEvationInMeters;

        return $this;
    }

    public function getMaximumElevationInMeters(): ?int
    {
        return $this->maximumElevationInMeters;
    }

    public function setMaximumElevationInMeters(?int $maximumElevationInMeters): self
    {
        $this->maximumElevationInMeters = $maximumElevationInMeters;

        return $this;
    }

    public function getElevationNumber(): ?string
    {
        return $this->elevationNumber;
    }

    public function setElevationNumber(?string $elevationNumber): self
    {
        $this->elevationNumber = $elevationNumber;

        return $this;
    }

    public function getElevationUnits(): ?string
    {
        return $this->elevationUnits;
    }

    public function setElevationUnits(?string $elevationUnits): self
    {
        $this->elevationUnits = $elevationUnits;

        return $this;
    }

    public function getVerbatimElevation(): ?string
    {
        return $this->verbatimElevation;
    }

    public function setVerbatimElevation(?string $verbatimElevation): self
    {
        $this->verbatimElevation = $verbatimElevation;

        return $this;
    }

    public function getMinimumDepthInMeters(): ?int
    {
        return $this->minimumDepthInMeters;
    }

    public function setMinimumDepthInMeters(?int $minimumDepthInMeters): self
    {
        $this->minimumDepthInMeters = $minimumDepthInMeters;

        return $this;
    }

    public function getMaximumDepthInMeters(): ?int
    {
        return $this->maximumDepthInMeters;
    }

    public function setMaximumDepthInMeters(?int $maximumDepthInMeters): self
    {
        $this->maximumDepthInMeters = $maximumDepthInMeters;

        return $this;
    }

    public function getVerbatimDepth(): ?string
    {
        return $this->verbatimDepth;
    }

    public function setVerbatimDepth(?string $verbatimDepth): self
    {
        $this->verbatimDepth = $verbatimDepth;

        return $this;
    }

    public function getPreviousIdentifications(): ?string
    {
        return $this->previousIdentifications;
    }

    public function setPreviousIdentifications(?string $previousIdentifications): self
    {
        $this->previousIdentifications = $previousIdentifications;

        return $this;
    }

    public function getDisposition(): ?string
    {
        return $this->disposition;
    }

    public function setDisposition(?string $disposition): self
    {
        $this->disposition = $disposition;

        return $this;
    }

    public function getStorageLocation(): ?string
    {
        return $this->storageLocation;
    }

    public function setStorageLocation(?string $storageLocation): self
    {
        $this->storageLocation = $storageLocation;

        return $this;
    }

    public function getExsiccatiIdentifier(): ?int
    {
        return $this->exsiccatiIdentifier;
    }

    public function setExsiccatiIdentifier(?int $exsiccatiIdentifier): self
    {
        $this->exsiccatiIdentifier = $exsiccatiIdentifier;

        return $this;
    }

    public function getExsiccatiNumber(): ?string
    {
        return $this->exsiccatiNumber;
    }

    public function setExsiccatiNumber(?string $exsiccatiNumber): self
    {
        $this->exsiccatiNumber = $exsiccatiNumber;

        return $this;
    }

    public function getExsiccatiNotes(): ?string
    {
        return $this->exsiccatiNotes;
    }

    public function setExsiccatiNotes(?string $exsiccatiNotes): self
    {
        $this->exsiccatiNotes = $exsiccatiNotes;

        return $this;
    }

    public function getModified(): ?\DateTimeInterface
    {
        return $this->modified;
    }

    public function setModified(?\DateTimeInterface $modified): self
    {
        $this->modified = $modified;

        return $this;
    }

    public function getLanguage(): ?string
    {
        return $this->language;
    }

    public function setLanguage(?string $language): self
    {
        $this->language = $language;

        return $this;
    }

    public function getRecordEnteredBy(): ?string
    {
        return $this->recordEnteredBy;
    }

    public function setRecordEnteredBy(?string $recordEnteredBy): self
    {
        $this->recordEnteredBy = $recordEnteredBy;

        return $this;
    }

    public function getDuplicateQuantity(): ?int
    {
        return $this->duplicateQuantity;
    }

    public function setDuplicateQuantity(?int $duplicateQuantity): self
    {
        $this->duplicateQuantity = $duplicateQuantity;

        return $this;
    }

    public function getLabelProject(): ?string
    {
        return $this->labelProject;
    }

    public function setLabelProject(?string $labelProject): self
    {
        $this->labelProject = $labelProject;

        return $this;
    }

    public function getProcessingStatus(): ?string
    {
        return $this->processingStatus;
    }

    public function setProcessingStatus(?string $processingStatus): self
    {
        $this->processingStatus = $processingStatus;

        return $this;
    }

    public function getTempField01(): ?string
    {
        return $this->tempField01;
    }

    public function setTempField01(?string $tempField01): self
    {
        $this->tempField01 = $tempField01;

        return $this;
    }

    public function getTempField02(): ?string
    {
        return $this->tempField02;
    }

    public function setTempField02(?string $tempField02): self
    {
        $this->tempField02 = $tempField02;

        return $this;
    }

    public function getTempField03(): ?string
    {
        return $this->tempField03;
    }

    public function setTempField03(?string $tempField03): self
    {
        $this->tempField03 = $tempField03;

        return $this;
    }

    public function getTempField04(): ?string
    {
        return $this->tempField04;
    }

    public function setTempField04(?string $tempField04): self
    {
        $this->tempField04 = $tempField04;

        return $this;
    }

    public function getTempField05(): ?string
    {
        return $this->tempField05;
    }

    public function setTempField05(?string $tempField05): self
    {
        $this->tempField05 = $tempField05;

        return $this;
    }

    public function getTempField06(): ?string
    {
        return $this->tempField06;
    }

    public function setTempField06(?string $tempField06): self
    {
        $this->tempField06 = $tempField06;

        return $this;
    }

    public function getTempField07(): ?string
    {
        return $this->tempField07;
    }

    public function setTempField07(?string $tempField07): self
    {
        $this->tempField07 = $tempField07;

        return $this;
    }

    public function getTempField08(): ?string
    {
        return $this->tempField08;
    }

    public function setTempField08(?string $tempField08): self
    {
        $this->tempField08 = $tempField08;

        return $this;
    }

    public function getTempField09(): ?string
    {
        return $this->tempField09;
    }

    public function setTempField09(?string $tempField09): self
    {
        $this->tempField09 = $tempField09;

        return $this;
    }

    public function getTempField10(): ?string
    {
        return $this->tempField10;
    }

    public function setTempField10(?string $tempField10): self
    {
        $this->tempField10 = $tempField10;

        return $this;
    }

    public function getTempField11(): ?string
    {
        return $this->tempField11;
    }

    public function setTempField11(?string $tempField11): self
    {
        $this->tempField11 = $tempField11;

        return $this;
    }

    public function getTempField12(): ?string
    {
        return $this->tempField12;
    }

    public function setTempField12(?string $tempField12): self
    {
        $this->tempField12 = $tempField12;

        return $this;
    }

    public function getTempField13(): ?string
    {
        return $this->tempField13;
    }

    public function setTempField13(?string $tempField13): self
    {
        $this->tempField13 = $tempField13;

        return $this;
    }

    public function getTempField14(): ?string
    {
        return $this->tempField14;
    }

    public function setTempField14(?string $tempField14): self
    {
        $this->tempField14 = $tempField14;

        return $this;
    }

    public function getTempField15(): ?string
    {
        return $this->tempField15;
    }

    public function setTempField15(?string $tempField15): self
    {
        $this->tempField15 = $tempField15;

        return $this;
    }

    public function getInitialTimestamp(): ?\DateTimeInterface
    {
        return $this->initialTimestamp;
    }

    public function setInitialTimestamp(?\DateTimeInterface $initialTimestamp): InitialTimestampInterface
    {
        $this->initialTimestamp = $initialTimestamp;

        return $this;
    }

    public function getCollectionId(): ?Collections
    {
        return $this->collectionId;
    }

    public function setCollectionId(?Collections $collectionId): self
    {
        $this->collectionId = $collectionId;

        return $this;
    }


}
