<?php

namespace App\Entities;

use Doctrine\ORM\Mapping as ORM;

/**
 * Uploadspectemp
 *
 * @ORM\Table(name="uploadspectemp", indexes={@ORM\Index(name="FK_uploadspectemp_coll", columns={"collid"}), @ORM\Index(name="Index_uploadspectemp_occid", columns={"occid"}), @ORM\Index(name="Index_uploadspectemp_dbpk", columns={"dbpk"}), @ORM\Index(name="Index_uploadspec_sciname", columns={"sciname"}), @ORM\Index(name="Index_uploadspec_catalognumber", columns={"catalogNumber"})})
 * @ORM\Entity
 */
class Uploadspectemp
{
    /**
     * @var int
     *
     * @ORM\Column(name="upspecid", type="integer", precision=0, scale=0, nullable=false, unique=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $upspecid;

    /**
     * @var string|null
     *
     * @ORM\Column(name="dbpk", type="string", length=150, precision=0, scale=0, nullable=true, unique=false)
     */
    private $dbpk;

    /**
     * @var int|null
     *
     * @ORM\Column(name="occid", type="integer", precision=0, scale=0, nullable=true, options={"unsigned"=true}, unique=false)
     */
    private $occid;

    /**
     * @var string|null
     *
     * @ORM\Column(name="basisOfRecord", type="string", length=32, precision=0, scale=0, nullable=true, options={"comment"="PreservedSpecimen, LivingSpecimen, HumanObservation"}, unique=false)
     */
    private $basisofrecord;

    /**
     * @var string|null
     *
     * @ORM\Column(name="occurrenceID", type="string", length=255, precision=0, scale=0, nullable=true, options={"comment"="UniqueGlobalIdentifier"}, unique=false)
     */
    private $occurrenceid;

    /**
     * @var string|null
     *
     * @ORM\Column(name="catalogNumber", type="string", length=32, precision=0, scale=0, nullable=true, unique=false)
     */
    private $catalognumber;

    /**
     * @var string|null
     *
     * @ORM\Column(name="otherCatalogNumbers", type="string", length=255, precision=0, scale=0, nullable=true, unique=false)
     */
    private $othercatalognumbers;

    /**
     * @var string|null
     *
     * @ORM\Column(name="ownerInstitutionCode", type="string", length=32, precision=0, scale=0, nullable=true, unique=false)
     */
    private $ownerinstitutioncode;

    /**
     * @var string|null
     *
     * @ORM\Column(name="institutionID", type="string", length=255, precision=0, scale=0, nullable=true, unique=false)
     */
    private $institutionid;

    /**
     * @var string|null
     *
     * @ORM\Column(name="collectionID", type="string", length=255, precision=0, scale=0, nullable=true, unique=false)
     */
    private $collectionid;

    /**
     * @var string|null
     *
     * @ORM\Column(name="datasetID", type="string", length=255, precision=0, scale=0, nullable=true, unique=false)
     */
    private $datasetid;

    /**
     * @var string|null
     *
     * @ORM\Column(name="institutionCode", type="string", length=64, precision=0, scale=0, nullable=true, unique=false)
     */
    private $institutioncode;

    /**
     * @var string|null
     *
     * @ORM\Column(name="collectionCode", type="string", length=64, precision=0, scale=0, nullable=true, unique=false)
     */
    private $collectioncode;

    /**
     * @var string|null
     *
     * @ORM\Column(name="family", type="string", length=255, precision=0, scale=0, nullable=true, unique=false)
     */
    private $family;

    /**
     * @var string|null
     *
     * @ORM\Column(name="scientificName", type="string", length=255, precision=0, scale=0, nullable=true, unique=false)
     */
    private $scientificname;

    /**
     * @var string|null
     *
     * @ORM\Column(name="sciname", type="string", length=255, precision=0, scale=0, nullable=true, unique=false)
     */
    private $sciname;

    /**
     * @var int|null
     *
     * @ORM\Column(name="tidinterpreted", type="integer", precision=0, scale=0, nullable=true, options={"unsigned"=true}, unique=false)
     */
    private $tidinterpreted;

    /**
     * @var string|null
     *
     * @ORM\Column(name="genus", type="string", length=255, precision=0, scale=0, nullable=true, unique=false)
     */
    private $genus;

    /**
     * @var string|null
     *
     * @ORM\Column(name="specificEpithet", type="string", length=255, precision=0, scale=0, nullable=true, unique=false)
     */
    private $specificepithet;

    /**
     * @var string|null
     *
     * @ORM\Column(name="taxonRank", type="string", length=32, precision=0, scale=0, nullable=true, unique=false)
     */
    private $taxonrank;

    /**
     * @var string|null
     *
     * @ORM\Column(name="infraspecificEpithet", type="string", length=255, precision=0, scale=0, nullable=true, unique=false)
     */
    private $infraspecificepithet;

    /**
     * @var string|null
     *
     * @ORM\Column(name="scientificNameAuthorship", type="string", length=255, precision=0, scale=0, nullable=true, unique=false)
     */
    private $scientificnameauthorship;

    /**
     * @var string|null
     *
     * @ORM\Column(name="taxonRemarks", type="text", length=65535, precision=0, scale=0, nullable=true, unique=false)
     */
    private $taxonremarks;

    /**
     * @var string|null
     *
     * @ORM\Column(name="identifiedBy", type="string", length=255, precision=0, scale=0, nullable=true, unique=false)
     */
    private $identifiedby;

    /**
     * @var string|null
     *
     * @ORM\Column(name="dateIdentified", type="string", length=45, precision=0, scale=0, nullable=true, unique=false)
     */
    private $dateidentified;

    /**
     * @var string|null
     *
     * @ORM\Column(name="identificationReferences", type="text", length=65535, precision=0, scale=0, nullable=true, unique=false)
     */
    private $identificationreferences;

    /**
     * @var string|null
     *
     * @ORM\Column(name="identificationRemarks", type="text", length=65535, precision=0, scale=0, nullable=true, unique=false)
     */
    private $identificationremarks;

    /**
     * @var string|null
     *
     * @ORM\Column(name="identificationQualifier", type="string", length=255, precision=0, scale=0, nullable=true, options={"comment"="cf, aff, etc"}, unique=false)
     */
    private $identificationqualifier;

    /**
     * @var string|null
     *
     * @ORM\Column(name="typeStatus", type="string", length=255, precision=0, scale=0, nullable=true, unique=false)
     */
    private $typestatus;

    /**
     * @var string|null
     *
     * @ORM\Column(name="recordedBy", type="string", length=255, precision=0, scale=0, nullable=true, options={"comment"="Collector(s)"}, unique=false)
     */
    private $recordedby;

    /**
     * @var string|null
     *
     * @ORM\Column(name="recordNumberPrefix", type="string", length=45, precision=0, scale=0, nullable=true, unique=false)
     */
    private $recordnumberprefix;

    /**
     * @var string|null
     *
     * @ORM\Column(name="recordNumberSuffix", type="string", length=45, precision=0, scale=0, nullable=true, unique=false)
     */
    private $recordnumbersuffix;

    /**
     * @var string|null
     *
     * @ORM\Column(name="recordNumber", type="string", length=32, precision=0, scale=0, nullable=true, options={"comment"="Collector Number"}, unique=false)
     */
    private $recordnumber;

    /**
     * @var string|null
     *
     * @ORM\Column(name="CollectorFamilyName", type="string", length=255, precision=0, scale=0, nullable=true, options={"comment"="not DwC"}, unique=false)
     */
    private $collectorfamilyname;

    /**
     * @var string|null
     *
     * @ORM\Column(name="CollectorInitials", type="string", length=255, precision=0, scale=0, nullable=true, options={"comment"="not DwC"}, unique=false)
     */
    private $collectorinitials;

    /**
     * @var string|null
     *
     * @ORM\Column(name="associatedCollectors", type="string", length=255, precision=0, scale=0, nullable=true, options={"comment"="not DwC"}, unique=false)
     */
    private $associatedcollectors;

    /**
     * @var \DateTime|null
     *
     * @ORM\Column(name="eventDate", type="date", precision=0, scale=0, nullable=true, unique=false)
     */
    private $eventdate;

    /**
     * @var int|null
     *
     * @ORM\Column(name="year", type="integer", precision=0, scale=0, nullable=true, unique=false)
     */
    private $year;

    /**
     * @var int|null
     *
     * @ORM\Column(name="month", type="integer", precision=0, scale=0, nullable=true, unique=false)
     */
    private $month;

    /**
     * @var int|null
     *
     * @ORM\Column(name="day", type="integer", precision=0, scale=0, nullable=true, unique=false)
     */
    private $day;

    /**
     * @var int|null
     *
     * @ORM\Column(name="startDayOfYear", type="integer", precision=0, scale=0, nullable=true, unique=false)
     */
    private $startdayofyear;

    /**
     * @var int|null
     *
     * @ORM\Column(name="endDayOfYear", type="integer", precision=0, scale=0, nullable=true, unique=false)
     */
    private $enddayofyear;

    /**
     * @var \DateTime|null
     *
     * @ORM\Column(name="LatestDateCollected", type="date", precision=0, scale=0, nullable=true, unique=false)
     */
    private $latestdatecollected;

    /**
     * @var string|null
     *
     * @ORM\Column(name="verbatimEventDate", type="string", length=255, precision=0, scale=0, nullable=true, unique=false)
     */
    private $verbatimeventdate;

    /**
     * @var string|null
     *
     * @ORM\Column(name="habitat", type="text", length=65535, precision=0, scale=0, nullable=true, options={"comment"="Habitat, substrait, etc"}, unique=false)
     */
    private $habitat;

    /**
     * @var string|null
     *
     * @ORM\Column(name="substrate", type="string", length=500, precision=0, scale=0, nullable=true, unique=false)
     */
    private $substrate;

    /**
     * @var string|null
     *
     * @ORM\Column(name="host", type="string", length=250, precision=0, scale=0, nullable=true, unique=false)
     */
    private $host;

    /**
     * @var string|null
     *
     * @ORM\Column(name="fieldNotes", type="text", length=65535, precision=0, scale=0, nullable=true, unique=false)
     */
    private $fieldnotes;

    /**
     * @var string|null
     *
     * @ORM\Column(name="fieldnumber", type="string", length=45, precision=0, scale=0, nullable=true, unique=false)
     */
    private $fieldnumber;

    /**
     * @var string|null
     *
     * @ORM\Column(name="occurrenceRemarks", type="text", length=65535, precision=0, scale=0, nullable=true, options={"comment"="General Notes"}, unique=false)
     */
    private $occurrenceremarks;

    /**
     * @var string|null
     *
     * @ORM\Column(name="informationWithheld", type="string", length=250, precision=0, scale=0, nullable=true, unique=false)
     */
    private $informationwithheld;

    /**
     * @var string|null
     *
     * @ORM\Column(name="dataGeneralizations", type="string", length=250, precision=0, scale=0, nullable=true, unique=false)
     */
    private $datageneralizations;

    /**
     * @var string|null
     *
     * @ORM\Column(name="associatedOccurrences", type="text", length=65535, precision=0, scale=0, nullable=true, unique=false)
     */
    private $associatedoccurrences;

    /**
     * @var string|null
     *
     * @ORM\Column(name="associatedMedia", type="text", length=65535, precision=0, scale=0, nullable=true, unique=false)
     */
    private $associatedmedia;

    /**
     * @var string|null
     *
     * @ORM\Column(name="associatedReferences", type="text", length=65535, precision=0, scale=0, nullable=true, unique=false)
     */
    private $associatedreferences;

    /**
     * @var string|null
     *
     * @ORM\Column(name="associatedSequences", type="text", length=65535, precision=0, scale=0, nullable=true, unique=false)
     */
    private $associatedsequences;

    /**
     * @var string|null
     *
     * @ORM\Column(name="associatedTaxa", type="text", length=65535, precision=0, scale=0, nullable=true, options={"comment"="Associated Species"}, unique=false)
     */
    private $associatedtaxa;

    /**
     * @var string|null
     *
     * @ORM\Column(name="dynamicProperties", type="text", length=65535, precision=0, scale=0, nullable=true, options={"comment"="Plant Description?"}, unique=false)
     */
    private $dynamicproperties;

    /**
     * @var string|null
     *
     * @ORM\Column(name="verbatimAttributes", type="text", length=65535, precision=0, scale=0, nullable=true, unique=false)
     */
    private $verbatimattributes;

    /**
     * @var string|null
     *
     * @ORM\Column(name="behavior", type="string", length=500, precision=0, scale=0, nullable=true, unique=false)
     */
    private $behavior;

    /**
     * @var string|null
     *
     * @ORM\Column(name="reproductiveCondition", type="string", length=255, precision=0, scale=0, nullable=true, options={"comment"="Phenology: flowers, fruit, sterile"}, unique=false)
     */
    private $reproductivecondition;

    /**
     * @var int|null
     *
     * @ORM\Column(name="cultivationStatus", type="integer", precision=0, scale=0, nullable=true, options={"comment"="0 = wild, 1 = cultivated"}, unique=false)
     */
    private $cultivationstatus;

    /**
     * @var string|null
     *
     * @ORM\Column(name="establishmentMeans", type="string", length=32, precision=0, scale=0, nullable=true, options={"comment"="cultivated, invasive, escaped from captivity, wild, native"}, unique=false)
     */
    private $establishmentmeans;

    /**
     * @var string|null
     *
     * @ORM\Column(name="lifeStage", type="string", length=45, precision=0, scale=0, nullable=true, unique=false)
     */
    private $lifestage;

    /**
     * @var string|null
     *
     * @ORM\Column(name="sex", type="string", length=45, precision=0, scale=0, nullable=true, unique=false)
     */
    private $sex;

    /**
     * @var string|null
     *
     * @ORM\Column(name="individualCount", type="string", length=45, precision=0, scale=0, nullable=true, unique=false)
     */
    private $individualcount;

    /**
     * @var string|null
     *
     * @ORM\Column(name="samplingProtocol", type="string", length=100, precision=0, scale=0, nullable=true, unique=false)
     */
    private $samplingprotocol;

    /**
     * @var string|null
     *
     * @ORM\Column(name="samplingEffort", type="string", length=200, precision=0, scale=0, nullable=true, unique=false)
     */
    private $samplingeffort;

    /**
     * @var string|null
     *
     * @ORM\Column(name="preparations", type="string", length=100, precision=0, scale=0, nullable=true, unique=false)
     */
    private $preparations;

    /**
     * @var string|null
     *
     * @ORM\Column(name="country", type="string", length=64, precision=0, scale=0, nullable=true, unique=false)
     */
    private $country;

    /**
     * @var string|null
     *
     * @ORM\Column(name="stateProvince", type="string", length=255, precision=0, scale=0, nullable=true, unique=false)
     */
    private $stateprovince;

    /**
     * @var string|null
     *
     * @ORM\Column(name="county", type="string", length=255, precision=0, scale=0, nullable=true, unique=false)
     */
    private $county;

    /**
     * @var string|null
     *
     * @ORM\Column(name="municipality", type="string", length=255, precision=0, scale=0, nullable=true, unique=false)
     */
    private $municipality;

    /**
     * @var string|null
     *
     * @ORM\Column(name="locality", type="text", length=65535, precision=0, scale=0, nullable=true, unique=false)
     */
    private $locality;

    /**
     * @var int|null
     *
     * @ORM\Column(name="localitySecurity", type="integer", precision=0, scale=0, nullable=true, options={"comment"="0 = display locality, 1 = hide locality"}, unique=false)
     */
    private $localitysecurity;

    /**
     * @var string|null
     *
     * @ORM\Column(name="localitySecurityReason", type="string", length=100, precision=0, scale=0, nullable=true, unique=false)
     */
    private $localitysecurityreason;

    /**
     * @var float|null
     *
     * @ORM\Column(name="decimalLatitude", type="float", precision=10, scale=0, nullable=true, unique=false)
     */
    private $decimallatitude;

    /**
     * @var float|null
     *
     * @ORM\Column(name="decimalLongitude", type="float", precision=10, scale=0, nullable=true, unique=false)
     */
    private $decimallongitude;

    /**
     * @var string|null
     *
     * @ORM\Column(name="geodeticDatum", type="string", length=255, precision=0, scale=0, nullable=true, unique=false)
     */
    private $geodeticdatum;

    /**
     * @var int|null
     *
     * @ORM\Column(name="coordinateUncertaintyInMeters", type="integer", precision=0, scale=0, nullable=true, options={"unsigned"=true}, unique=false)
     */
    private $coordinateuncertaintyinmeters;

    /**
     * @var string|null
     *
     * @ORM\Column(name="footprintWKT", type="text", length=65535, precision=0, scale=0, nullable=true, unique=false)
     */
    private $footprintwkt;

    /**
     * @var string|null
     *
     * @ORM\Column(name="coordinatePrecision", type="decimal", precision=9, scale=7, nullable=true, unique=false)
     */
    private $coordinateprecision;

    /**
     * @var string|null
     *
     * @ORM\Column(name="locationRemarks", type="text", length=65535, precision=0, scale=0, nullable=true, unique=false)
     */
    private $locationremarks;

    /**
     * @var string|null
     *
     * @ORM\Column(name="verbatimCoordinates", type="string", length=255, precision=0, scale=0, nullable=true, unique=false)
     */
    private $verbatimcoordinates;

    /**
     * @var string|null
     *
     * @ORM\Column(name="verbatimCoordinateSystem", type="string", length=255, precision=0, scale=0, nullable=true, unique=false)
     */
    private $verbatimcoordinatesystem;

    /**
     * @var int|null
     *
     * @ORM\Column(name="latDeg", type="integer", precision=0, scale=0, nullable=true, unique=false)
     */
    private $latdeg;

    /**
     * @var float|null
     *
     * @ORM\Column(name="latMin", type="float", precision=10, scale=0, nullable=true, unique=false)
     */
    private $latmin;

    /**
     * @var float|null
     *
     * @ORM\Column(name="latSec", type="float", precision=10, scale=0, nullable=true, unique=false)
     */
    private $latsec;

    /**
     * @var string|null
     *
     * @ORM\Column(name="latNS", type="string", length=3, precision=0, scale=0, nullable=true, unique=false)
     */
    private $latns;

    /**
     * @var int|null
     *
     * @ORM\Column(name="lngDeg", type="integer", precision=0, scale=0, nullable=true, unique=false)
     */
    private $lngdeg;

    /**
     * @var float|null
     *
     * @ORM\Column(name="lngMin", type="float", precision=10, scale=0, nullable=true, unique=false)
     */
    private $lngmin;

    /**
     * @var float|null
     *
     * @ORM\Column(name="lngSec", type="float", precision=10, scale=0, nullable=true, unique=false)
     */
    private $lngsec;

    /**
     * @var string|null
     *
     * @ORM\Column(name="lngEW", type="string", length=3, precision=0, scale=0, nullable=true, unique=false)
     */
    private $lngew;

    /**
     * @var string|null
     *
     * @ORM\Column(name="verbatimLatitude", type="string", length=45, precision=0, scale=0, nullable=true, unique=false)
     */
    private $verbatimlatitude;

    /**
     * @var string|null
     *
     * @ORM\Column(name="verbatimLongitude", type="string", length=45, precision=0, scale=0, nullable=true, unique=false)
     */
    private $verbatimlongitude;

    /**
     * @var string|null
     *
     * @ORM\Column(name="UtmNorthing", type="string", length=45, precision=0, scale=0, nullable=true, unique=false)
     */
    private $utmnorthing;

    /**
     * @var string|null
     *
     * @ORM\Column(name="UtmEasting", type="string", length=45, precision=0, scale=0, nullable=true, unique=false)
     */
    private $utmeasting;

    /**
     * @var string|null
     *
     * @ORM\Column(name="UtmZoning", type="string", length=45, precision=0, scale=0, nullable=true, unique=false)
     */
    private $utmzoning;

    /**
     * @var string|null
     *
     * @ORM\Column(name="trsTownship", type="string", length=45, precision=0, scale=0, nullable=true, unique=false)
     */
    private $trstownship;

    /**
     * @var string|null
     *
     * @ORM\Column(name="trsRange", type="string", length=45, precision=0, scale=0, nullable=true, unique=false)
     */
    private $trsrange;

    /**
     * @var string|null
     *
     * @ORM\Column(name="trsSection", type="string", length=45, precision=0, scale=0, nullable=true, unique=false)
     */
    private $trssection;

    /**
     * @var string|null
     *
     * @ORM\Column(name="trsSectionDetails", type="string", length=45, precision=0, scale=0, nullable=true, unique=false)
     */
    private $trssectiondetails;

    /**
     * @var string|null
     *
     * @ORM\Column(name="georeferencedBy", type="string", length=255, precision=0, scale=0, nullable=true, unique=false)
     */
    private $georeferencedby;

    /**
     * @var string|null
     *
     * @ORM\Column(name="georeferenceProtocol", type="string", length=255, precision=0, scale=0, nullable=true, unique=false)
     */
    private $georeferenceprotocol;

    /**
     * @var string|null
     *
     * @ORM\Column(name="georeferenceSources", type="string", length=255, precision=0, scale=0, nullable=true, unique=false)
     */
    private $georeferencesources;

    /**
     * @var string|null
     *
     * @ORM\Column(name="georeferenceVerificationStatus", type="string", length=32, precision=0, scale=0, nullable=true, unique=false)
     */
    private $georeferenceverificationstatus;

    /**
     * @var string|null
     *
     * @ORM\Column(name="georeferenceRemarks", type="string", length=255, precision=0, scale=0, nullable=true, unique=false)
     */
    private $georeferenceremarks;

    /**
     * @var int|null
     *
     * @ORM\Column(name="minimumElevationInMeters", type="integer", precision=0, scale=0, nullable=true, unique=false)
     */
    private $minimumelevationinmeters;

    /**
     * @var int|null
     *
     * @ORM\Column(name="maximumElevationInMeters", type="integer", precision=0, scale=0, nullable=true, unique=false)
     */
    private $maximumelevationinmeters;

    /**
     * @var string|null
     *
     * @ORM\Column(name="elevationNumber", type="string", length=45, precision=0, scale=0, nullable=true, unique=false)
     */
    private $elevationnumber;

    /**
     * @var string|null
     *
     * @ORM\Column(name="elevationUnits", type="string", length=45, precision=0, scale=0, nullable=true, unique=false)
     */
    private $elevationunits;

    /**
     * @var string|null
     *
     * @ORM\Column(name="verbatimElevation", type="string", length=255, precision=0, scale=0, nullable=true, unique=false)
     */
    private $verbatimelevation;

    /**
     * @var int|null
     *
     * @ORM\Column(name="minimumDepthInMeters", type="integer", precision=0, scale=0, nullable=true, unique=false)
     */
    private $minimumdepthinmeters;

    /**
     * @var int|null
     *
     * @ORM\Column(name="maximumDepthInMeters", type="integer", precision=0, scale=0, nullable=true, unique=false)
     */
    private $maximumdepthinmeters;

    /**
     * @var string|null
     *
     * @ORM\Column(name="verbatimDepth", type="string", length=50, precision=0, scale=0, nullable=true, unique=false)
     */
    private $verbatimdepth;

    /**
     * @var string|null
     *
     * @ORM\Column(name="previousIdentifications", type="text", length=65535, precision=0, scale=0, nullable=true, unique=false)
     */
    private $previousidentifications;

    /**
     * @var string|null
     *
     * @ORM\Column(name="disposition", type="string", length=32, precision=0, scale=0, nullable=true, options={"comment"="Dups to"}, unique=false)
     */
    private $disposition;

    /**
     * @var string|null
     *
     * @ORM\Column(name="storageLocation", type="string", length=100, precision=0, scale=0, nullable=true, unique=false)
     */
    private $storagelocation;

    /**
     * @var string|null
     *
     * @ORM\Column(name="genericcolumn1", type="string", length=100, precision=0, scale=0, nullable=true, unique=false)
     */
    private $genericcolumn1;

    /**
     * @var string|null
     *
     * @ORM\Column(name="genericcolumn2", type="string", length=100, precision=0, scale=0, nullable=true, unique=false)
     */
    private $genericcolumn2;

    /**
     * @var int|null
     *
     * @ORM\Column(name="exsiccatiIdentifier", type="integer", precision=0, scale=0, nullable=true, unique=false)
     */
    private $exsiccatiidentifier;

    /**
     * @var string|null
     *
     * @ORM\Column(name="exsiccatiNumber", type="string", length=45, precision=0, scale=0, nullable=true, unique=false)
     */
    private $exsiccatinumber;

    /**
     * @var string|null
     *
     * @ORM\Column(name="exsiccatiNotes", type="string", length=250, precision=0, scale=0, nullable=true, unique=false)
     */
    private $exsiccatinotes;

    /**
     * @var \DateTime|null
     *
     * @ORM\Column(name="modified", type="datetime", precision=0, scale=0, nullable=true, options={"comment"="DateLastModified"}, unique=false)
     */
    private $modified;

    /**
     * @var string|null
     *
     * @ORM\Column(name="language", type="string", length=20, precision=0, scale=0, nullable=true, unique=false)
     */
    private $language;

    /**
     * @var string|null
     *
     * @ORM\Column(name="recordEnteredBy", type="string", length=250, precision=0, scale=0, nullable=true, unique=false)
     */
    private $recordenteredby;

    /**
     * @var int|null
     *
     * @ORM\Column(name="duplicateQuantity", type="integer", precision=0, scale=0, nullable=true, options={"unsigned"=true}, unique=false)
     */
    private $duplicatequantity;

    /**
     * @var string|null
     *
     * @ORM\Column(name="labelProject", type="string", length=45, precision=0, scale=0, nullable=true, unique=false)
     */
    private $labelproject;

    /**
     * @var string|null
     *
     * @ORM\Column(name="processingStatus", type="string", length=45, precision=0, scale=0, nullable=true, unique=false)
     */
    private $processingstatus;

    /**
     * @var string|null
     *
     * @ORM\Column(name="tempfield01", type="text", length=65535, precision=0, scale=0, nullable=true, unique=false)
     */
    private $tempfield01;

    /**
     * @var string|null
     *
     * @ORM\Column(name="tempfield02", type="text", length=65535, precision=0, scale=0, nullable=true, unique=false)
     */
    private $tempfield02;

    /**
     * @var string|null
     *
     * @ORM\Column(name="tempfield03", type="text", length=65535, precision=0, scale=0, nullable=true, unique=false)
     */
    private $tempfield03;

    /**
     * @var string|null
     *
     * @ORM\Column(name="tempfield04", type="text", length=65535, precision=0, scale=0, nullable=true, unique=false)
     */
    private $tempfield04;

    /**
     * @var string|null
     *
     * @ORM\Column(name="tempfield05", type="text", length=65535, precision=0, scale=0, nullable=true, unique=false)
     */
    private $tempfield05;

    /**
     * @var string|null
     *
     * @ORM\Column(name="tempfield06", type="text", length=65535, precision=0, scale=0, nullable=true, unique=false)
     */
    private $tempfield06;

    /**
     * @var string|null
     *
     * @ORM\Column(name="tempfield07", type="text", length=65535, precision=0, scale=0, nullable=true, unique=false)
     */
    private $tempfield07;

    /**
     * @var string|null
     *
     * @ORM\Column(name="tempfield08", type="text", length=65535, precision=0, scale=0, nullable=true, unique=false)
     */
    private $tempfield08;

    /**
     * @var string|null
     *
     * @ORM\Column(name="tempfield09", type="text", length=65535, precision=0, scale=0, nullable=true, unique=false)
     */
    private $tempfield09;

    /**
     * @var string|null
     *
     * @ORM\Column(name="tempfield10", type="text", length=65535, precision=0, scale=0, nullable=true, unique=false)
     */
    private $tempfield10;

    /**
     * @var string|null
     *
     * @ORM\Column(name="tempfield11", type="text", length=65535, precision=0, scale=0, nullable=true, unique=false)
     */
    private $tempfield11;

    /**
     * @var string|null
     *
     * @ORM\Column(name="tempfield12", type="text", length=65535, precision=0, scale=0, nullable=true, unique=false)
     */
    private $tempfield12;

    /**
     * @var string|null
     *
     * @ORM\Column(name="tempfield13", type="text", length=65535, precision=0, scale=0, nullable=true, unique=false)
     */
    private $tempfield13;

    /**
     * @var string|null
     *
     * @ORM\Column(name="tempfield14", type="text", length=65535, precision=0, scale=0, nullable=true, unique=false)
     */
    private $tempfield14;

    /**
     * @var string|null
     *
     * @ORM\Column(name="tempfield15", type="text", length=65535, precision=0, scale=0, nullable=true, unique=false)
     */
    private $tempfield15;

    /**
     * @var \DateTime|null
     *
     * @ORM\Column(name="initialTimestamp", type="datetime", precision=0, scale=0, nullable=true, options={"default"="CURRENT_TIMESTAMP"}, unique=false)
     */
    private $initialtimestamp = 'CURRENT_TIMESTAMP';

    /**
     * @var \App\Entities\Omcollections
     *
     * @ORM\ManyToOne(targetEntity="App\Entities\Omcollections")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="collid", referencedColumnName="CollID", nullable=true)
     * })
     */
    private $collid;


    /**
     * Get upspecid.
     *
     * @return int
     */
    public function getUpspecid()
    {
        return $this->upspecid;
    }

    /**
     * Set dbpk.
     *
     * @param string|null $dbpk
     *
     * @return Uploadspectemp
     */
    public function setDbpk($dbpk = null)
    {
        $this->dbpk = $dbpk;

        return $this;
    }

    /**
     * Get dbpk.
     *
     * @return string|null
     */
    public function getDbpk()
    {
        return $this->dbpk;
    }

    /**
     * Set occid.
     *
     * @param int|null $occid
     *
     * @return Uploadspectemp
     */
    public function setOccid($occid = null)
    {
        $this->occid = $occid;

        return $this;
    }

    /**
     * Get occid.
     *
     * @return int|null
     */
    public function getOccid()
    {
        return $this->occid;
    }

    /**
     * Set basisofrecord.
     *
     * @param string|null $basisofrecord
     *
     * @return Uploadspectemp
     */
    public function setBasisofrecord($basisofrecord = null)
    {
        $this->basisofrecord = $basisofrecord;

        return $this;
    }

    /**
     * Get basisofrecord.
     *
     * @return string|null
     */
    public function getBasisofrecord()
    {
        return $this->basisofrecord;
    }

    /**
     * Set occurrenceid.
     *
     * @param string|null $occurrenceid
     *
     * @return Uploadspectemp
     */
    public function setOccurrenceid($occurrenceid = null)
    {
        $this->occurrenceid = $occurrenceid;

        return $this;
    }

    /**
     * Get occurrenceid.
     *
     * @return string|null
     */
    public function getOccurrenceid()
    {
        return $this->occurrenceid;
    }

    /**
     * Set catalognumber.
     *
     * @param string|null $catalognumber
     *
     * @return Uploadspectemp
     */
    public function setCatalognumber($catalognumber = null)
    {
        $this->catalognumber = $catalognumber;

        return $this;
    }

    /**
     * Get catalognumber.
     *
     * @return string|null
     */
    public function getCatalognumber()
    {
        return $this->catalognumber;
    }

    /**
     * Set othercatalognumbers.
     *
     * @param string|null $othercatalognumbers
     *
     * @return Uploadspectemp
     */
    public function setOthercatalognumbers($othercatalognumbers = null)
    {
        $this->othercatalognumbers = $othercatalognumbers;

        return $this;
    }

    /**
     * Get othercatalognumbers.
     *
     * @return string|null
     */
    public function getOthercatalognumbers()
    {
        return $this->othercatalognumbers;
    }

    /**
     * Set ownerinstitutioncode.
     *
     * @param string|null $ownerinstitutioncode
     *
     * @return Uploadspectemp
     */
    public function setOwnerinstitutioncode($ownerinstitutioncode = null)
    {
        $this->ownerinstitutioncode = $ownerinstitutioncode;

        return $this;
    }

    /**
     * Get ownerinstitutioncode.
     *
     * @return string|null
     */
    public function getOwnerinstitutioncode()
    {
        return $this->ownerinstitutioncode;
    }

    /**
     * Set institutionid.
     *
     * @param string|null $institutionid
     *
     * @return Uploadspectemp
     */
    public function setInstitutionid($institutionid = null)
    {
        $this->institutionid = $institutionid;

        return $this;
    }

    /**
     * Get institutionid.
     *
     * @return string|null
     */
    public function getInstitutionid()
    {
        return $this->institutionid;
    }

    /**
     * Set collectionid.
     *
     * @param string|null $collectionid
     *
     * @return Uploadspectemp
     */
    public function setCollectionid($collectionid = null)
    {
        $this->collectionid = $collectionid;

        return $this;
    }

    /**
     * Get collectionid.
     *
     * @return string|null
     */
    public function getCollectionid()
    {
        return $this->collectionid;
    }

    /**
     * Set datasetid.
     *
     * @param string|null $datasetid
     *
     * @return Uploadspectemp
     */
    public function setDatasetid($datasetid = null)
    {
        $this->datasetid = $datasetid;

        return $this;
    }

    /**
     * Get datasetid.
     *
     * @return string|null
     */
    public function getDatasetid()
    {
        return $this->datasetid;
    }

    /**
     * Set institutioncode.
     *
     * @param string|null $institutioncode
     *
     * @return Uploadspectemp
     */
    public function setInstitutioncode($institutioncode = null)
    {
        $this->institutioncode = $institutioncode;

        return $this;
    }

    /**
     * Get institutioncode.
     *
     * @return string|null
     */
    public function getInstitutioncode()
    {
        return $this->institutioncode;
    }

    /**
     * Set collectioncode.
     *
     * @param string|null $collectioncode
     *
     * @return Uploadspectemp
     */
    public function setCollectioncode($collectioncode = null)
    {
        $this->collectioncode = $collectioncode;

        return $this;
    }

    /**
     * Get collectioncode.
     *
     * @return string|null
     */
    public function getCollectioncode()
    {
        return $this->collectioncode;
    }

    /**
     * Set family.
     *
     * @param string|null $family
     *
     * @return Uploadspectemp
     */
    public function setFamily($family = null)
    {
        $this->family = $family;

        return $this;
    }

    /**
     * Get family.
     *
     * @return string|null
     */
    public function getFamily()
    {
        return $this->family;
    }

    /**
     * Set scientificname.
     *
     * @param string|null $scientificname
     *
     * @return Uploadspectemp
     */
    public function setScientificname($scientificname = null)
    {
        $this->scientificname = $scientificname;

        return $this;
    }

    /**
     * Get scientificname.
     *
     * @return string|null
     */
    public function getScientificname()
    {
        return $this->scientificname;
    }

    /**
     * Set sciname.
     *
     * @param string|null $sciname
     *
     * @return Uploadspectemp
     */
    public function setSciname($sciname = null)
    {
        $this->sciname = $sciname;

        return $this;
    }

    /**
     * Get sciname.
     *
     * @return string|null
     */
    public function getSciname()
    {
        return $this->sciname;
    }

    /**
     * Set tidinterpreted.
     *
     * @param int|null $tidinterpreted
     *
     * @return Uploadspectemp
     */
    public function setTidinterpreted($tidinterpreted = null)
    {
        $this->tidinterpreted = $tidinterpreted;

        return $this;
    }

    /**
     * Get tidinterpreted.
     *
     * @return int|null
     */
    public function getTidinterpreted()
    {
        return $this->tidinterpreted;
    }

    /**
     * Set genus.
     *
     * @param string|null $genus
     *
     * @return Uploadspectemp
     */
    public function setGenus($genus = null)
    {
        $this->genus = $genus;

        return $this;
    }

    /**
     * Get genus.
     *
     * @return string|null
     */
    public function getGenus()
    {
        return $this->genus;
    }

    /**
     * Set specificepithet.
     *
     * @param string|null $specificepithet
     *
     * @return Uploadspectemp
     */
    public function setSpecificepithet($specificepithet = null)
    {
        $this->specificepithet = $specificepithet;

        return $this;
    }

    /**
     * Get specificepithet.
     *
     * @return string|null
     */
    public function getSpecificepithet()
    {
        return $this->specificepithet;
    }

    /**
     * Set taxonrank.
     *
     * @param string|null $taxonrank
     *
     * @return Uploadspectemp
     */
    public function setTaxonrank($taxonrank = null)
    {
        $this->taxonrank = $taxonrank;

        return $this;
    }

    /**
     * Get taxonrank.
     *
     * @return string|null
     */
    public function getTaxonrank()
    {
        return $this->taxonrank;
    }

    /**
     * Set infraspecificepithet.
     *
     * @param string|null $infraspecificepithet
     *
     * @return Uploadspectemp
     */
    public function setInfraspecificepithet($infraspecificepithet = null)
    {
        $this->infraspecificepithet = $infraspecificepithet;

        return $this;
    }

    /**
     * Get infraspecificepithet.
     *
     * @return string|null
     */
    public function getInfraspecificepithet()
    {
        return $this->infraspecificepithet;
    }

    /**
     * Set scientificnameauthorship.
     *
     * @param string|null $scientificnameauthorship
     *
     * @return Uploadspectemp
     */
    public function setScientificnameauthorship($scientificnameauthorship = null)
    {
        $this->scientificnameauthorship = $scientificnameauthorship;

        return $this;
    }

    /**
     * Get scientificnameauthorship.
     *
     * @return string|null
     */
    public function getScientificnameauthorship()
    {
        return $this->scientificnameauthorship;
    }

    /**
     * Set taxonremarks.
     *
     * @param string|null $taxonremarks
     *
     * @return Uploadspectemp
     */
    public function setTaxonremarks($taxonremarks = null)
    {
        $this->taxonremarks = $taxonremarks;

        return $this;
    }

    /**
     * Get taxonremarks.
     *
     * @return string|null
     */
    public function getTaxonremarks()
    {
        return $this->taxonremarks;
    }

    /**
     * Set identifiedby.
     *
     * @param string|null $identifiedby
     *
     * @return Uploadspectemp
     */
    public function setIdentifiedby($identifiedby = null)
    {
        $this->identifiedby = $identifiedby;

        return $this;
    }

    /**
     * Get identifiedby.
     *
     * @return string|null
     */
    public function getIdentifiedby()
    {
        return $this->identifiedby;
    }

    /**
     * Set dateidentified.
     *
     * @param string|null $dateidentified
     *
     * @return Uploadspectemp
     */
    public function setDateidentified($dateidentified = null)
    {
        $this->dateidentified = $dateidentified;

        return $this;
    }

    /**
     * Get dateidentified.
     *
     * @return string|null
     */
    public function getDateidentified()
    {
        return $this->dateidentified;
    }

    /**
     * Set identificationreferences.
     *
     * @param string|null $identificationreferences
     *
     * @return Uploadspectemp
     */
    public function setIdentificationreferences($identificationreferences = null)
    {
        $this->identificationreferences = $identificationreferences;

        return $this;
    }

    /**
     * Get identificationreferences.
     *
     * @return string|null
     */
    public function getIdentificationreferences()
    {
        return $this->identificationreferences;
    }

    /**
     * Set identificationremarks.
     *
     * @param string|null $identificationremarks
     *
     * @return Uploadspectemp
     */
    public function setIdentificationremarks($identificationremarks = null)
    {
        $this->identificationremarks = $identificationremarks;

        return $this;
    }

    /**
     * Get identificationremarks.
     *
     * @return string|null
     */
    public function getIdentificationremarks()
    {
        return $this->identificationremarks;
    }

    /**
     * Set identificationqualifier.
     *
     * @param string|null $identificationqualifier
     *
     * @return Uploadspectemp
     */
    public function setIdentificationqualifier($identificationqualifier = null)
    {
        $this->identificationqualifier = $identificationqualifier;

        return $this;
    }

    /**
     * Get identificationqualifier.
     *
     * @return string|null
     */
    public function getIdentificationqualifier()
    {
        return $this->identificationqualifier;
    }

    /**
     * Set typestatus.
     *
     * @param string|null $typestatus
     *
     * @return Uploadspectemp
     */
    public function setTypestatus($typestatus = null)
    {
        $this->typestatus = $typestatus;

        return $this;
    }

    /**
     * Get typestatus.
     *
     * @return string|null
     */
    public function getTypestatus()
    {
        return $this->typestatus;
    }

    /**
     * Set recordedby.
     *
     * @param string|null $recordedby
     *
     * @return Uploadspectemp
     */
    public function setRecordedby($recordedby = null)
    {
        $this->recordedby = $recordedby;

        return $this;
    }

    /**
     * Get recordedby.
     *
     * @return string|null
     */
    public function getRecordedby()
    {
        return $this->recordedby;
    }

    /**
     * Set recordnumberprefix.
     *
     * @param string|null $recordnumberprefix
     *
     * @return Uploadspectemp
     */
    public function setRecordnumberprefix($recordnumberprefix = null)
    {
        $this->recordnumberprefix = $recordnumberprefix;

        return $this;
    }

    /**
     * Get recordnumberprefix.
     *
     * @return string|null
     */
    public function getRecordnumberprefix()
    {
        return $this->recordnumberprefix;
    }

    /**
     * Set recordnumbersuffix.
     *
     * @param string|null $recordnumbersuffix
     *
     * @return Uploadspectemp
     */
    public function setRecordnumbersuffix($recordnumbersuffix = null)
    {
        $this->recordnumbersuffix = $recordnumbersuffix;

        return $this;
    }

    /**
     * Get recordnumbersuffix.
     *
     * @return string|null
     */
    public function getRecordnumbersuffix()
    {
        return $this->recordnumbersuffix;
    }

    /**
     * Set recordnumber.
     *
     * @param string|null $recordnumber
     *
     * @return Uploadspectemp
     */
    public function setRecordnumber($recordnumber = null)
    {
        $this->recordnumber = $recordnumber;

        return $this;
    }

    /**
     * Get recordnumber.
     *
     * @return string|null
     */
    public function getRecordnumber()
    {
        return $this->recordnumber;
    }

    /**
     * Set collectorfamilyname.
     *
     * @param string|null $collectorfamilyname
     *
     * @return Uploadspectemp
     */
    public function setCollectorfamilyname($collectorfamilyname = null)
    {
        $this->collectorfamilyname = $collectorfamilyname;

        return $this;
    }

    /**
     * Get collectorfamilyname.
     *
     * @return string|null
     */
    public function getCollectorfamilyname()
    {
        return $this->collectorfamilyname;
    }

    /**
     * Set collectorinitials.
     *
     * @param string|null $collectorinitials
     *
     * @return Uploadspectemp
     */
    public function setCollectorinitials($collectorinitials = null)
    {
        $this->collectorinitials = $collectorinitials;

        return $this;
    }

    /**
     * Get collectorinitials.
     *
     * @return string|null
     */
    public function getCollectorinitials()
    {
        return $this->collectorinitials;
    }

    /**
     * Set associatedcollectors.
     *
     * @param string|null $associatedcollectors
     *
     * @return Uploadspectemp
     */
    public function setAssociatedcollectors($associatedcollectors = null)
    {
        $this->associatedcollectors = $associatedcollectors;

        return $this;
    }

    /**
     * Get associatedcollectors.
     *
     * @return string|null
     */
    public function getAssociatedcollectors()
    {
        return $this->associatedcollectors;
    }

    /**
     * Set eventdate.
     *
     * @param \DateTime|null $eventdate
     *
     * @return Uploadspectemp
     */
    public function setEventdate($eventdate = null)
    {
        $this->eventdate = $eventdate;

        return $this;
    }

    /**
     * Get eventdate.
     *
     * @return \DateTime|null
     */
    public function getEventdate()
    {
        return $this->eventdate;
    }

    /**
     * Set year.
     *
     * @param int|null $year
     *
     * @return Uploadspectemp
     */
    public function setYear($year = null)
    {
        $this->year = $year;

        return $this;
    }

    /**
     * Get year.
     *
     * @return int|null
     */
    public function getYear()
    {
        return $this->year;
    }

    /**
     * Set month.
     *
     * @param int|null $month
     *
     * @return Uploadspectemp
     */
    public function setMonth($month = null)
    {
        $this->month = $month;

        return $this;
    }

    /**
     * Get month.
     *
     * @return int|null
     */
    public function getMonth()
    {
        return $this->month;
    }

    /**
     * Set day.
     *
     * @param int|null $day
     *
     * @return Uploadspectemp
     */
    public function setDay($day = null)
    {
        $this->day = $day;

        return $this;
    }

    /**
     * Get day.
     *
     * @return int|null
     */
    public function getDay()
    {
        return $this->day;
    }

    /**
     * Set startdayofyear.
     *
     * @param int|null $startdayofyear
     *
     * @return Uploadspectemp
     */
    public function setStartdayofyear($startdayofyear = null)
    {
        $this->startdayofyear = $startdayofyear;

        return $this;
    }

    /**
     * Get startdayofyear.
     *
     * @return int|null
     */
    public function getStartdayofyear()
    {
        return $this->startdayofyear;
    }

    /**
     * Set enddayofyear.
     *
     * @param int|null $enddayofyear
     *
     * @return Uploadspectemp
     */
    public function setEnddayofyear($enddayofyear = null)
    {
        $this->enddayofyear = $enddayofyear;

        return $this;
    }

    /**
     * Get enddayofyear.
     *
     * @return int|null
     */
    public function getEnddayofyear()
    {
        return $this->enddayofyear;
    }

    /**
     * Set latestdatecollected.
     *
     * @param \DateTime|null $latestdatecollected
     *
     * @return Uploadspectemp
     */
    public function setLatestdatecollected($latestdatecollected = null)
    {
        $this->latestdatecollected = $latestdatecollected;

        return $this;
    }

    /**
     * Get latestdatecollected.
     *
     * @return \DateTime|null
     */
    public function getLatestdatecollected()
    {
        return $this->latestdatecollected;
    }

    /**
     * Set verbatimeventdate.
     *
     * @param string|null $verbatimeventdate
     *
     * @return Uploadspectemp
     */
    public function setVerbatimeventdate($verbatimeventdate = null)
    {
        $this->verbatimeventdate = $verbatimeventdate;

        return $this;
    }

    /**
     * Get verbatimeventdate.
     *
     * @return string|null
     */
    public function getVerbatimeventdate()
    {
        return $this->verbatimeventdate;
    }

    /**
     * Set habitat.
     *
     * @param string|null $habitat
     *
     * @return Uploadspectemp
     */
    public function setHabitat($habitat = null)
    {
        $this->habitat = $habitat;

        return $this;
    }

    /**
     * Get habitat.
     *
     * @return string|null
     */
    public function getHabitat()
    {
        return $this->habitat;
    }

    /**
     * Set substrate.
     *
     * @param string|null $substrate
     *
     * @return Uploadspectemp
     */
    public function setSubstrate($substrate = null)
    {
        $this->substrate = $substrate;

        return $this;
    }

    /**
     * Get substrate.
     *
     * @return string|null
     */
    public function getSubstrate()
    {
        return $this->substrate;
    }

    /**
     * Set host.
     *
     * @param string|null $host
     *
     * @return Uploadspectemp
     */
    public function setHost($host = null)
    {
        $this->host = $host;

        return $this;
    }

    /**
     * Get host.
     *
     * @return string|null
     */
    public function getHost()
    {
        return $this->host;
    }

    /**
     * Set fieldnotes.
     *
     * @param string|null $fieldnotes
     *
     * @return Uploadspectemp
     */
    public function setFieldnotes($fieldnotes = null)
    {
        $this->fieldnotes = $fieldnotes;

        return $this;
    }

    /**
     * Get fieldnotes.
     *
     * @return string|null
     */
    public function getFieldnotes()
    {
        return $this->fieldnotes;
    }

    /**
     * Set fieldnumber.
     *
     * @param string|null $fieldnumber
     *
     * @return Uploadspectemp
     */
    public function setFieldnumber($fieldnumber = null)
    {
        $this->fieldnumber = $fieldnumber;

        return $this;
    }

    /**
     * Get fieldnumber.
     *
     * @return string|null
     */
    public function getFieldnumber()
    {
        return $this->fieldnumber;
    }

    /**
     * Set occurrenceremarks.
     *
     * @param string|null $occurrenceremarks
     *
     * @return Uploadspectemp
     */
    public function setOccurrenceremarks($occurrenceremarks = null)
    {
        $this->occurrenceremarks = $occurrenceremarks;

        return $this;
    }

    /**
     * Get occurrenceremarks.
     *
     * @return string|null
     */
    public function getOccurrenceremarks()
    {
        return $this->occurrenceremarks;
    }

    /**
     * Set informationwithheld.
     *
     * @param string|null $informationwithheld
     *
     * @return Uploadspectemp
     */
    public function setInformationwithheld($informationwithheld = null)
    {
        $this->informationwithheld = $informationwithheld;

        return $this;
    }

    /**
     * Get informationwithheld.
     *
     * @return string|null
     */
    public function getInformationwithheld()
    {
        return $this->informationwithheld;
    }

    /**
     * Set datageneralizations.
     *
     * @param string|null $datageneralizations
     *
     * @return Uploadspectemp
     */
    public function setDatageneralizations($datageneralizations = null)
    {
        $this->datageneralizations = $datageneralizations;

        return $this;
    }

    /**
     * Get datageneralizations.
     *
     * @return string|null
     */
    public function getDatageneralizations()
    {
        return $this->datageneralizations;
    }

    /**
     * Set associatedoccurrences.
     *
     * @param string|null $associatedoccurrences
     *
     * @return Uploadspectemp
     */
    public function setAssociatedoccurrences($associatedoccurrences = null)
    {
        $this->associatedoccurrences = $associatedoccurrences;

        return $this;
    }

    /**
     * Get associatedoccurrences.
     *
     * @return string|null
     */
    public function getAssociatedoccurrences()
    {
        return $this->associatedoccurrences;
    }

    /**
     * Set associatedmedia.
     *
     * @param string|null $associatedmedia
     *
     * @return Uploadspectemp
     */
    public function setAssociatedmedia($associatedmedia = null)
    {
        $this->associatedmedia = $associatedmedia;

        return $this;
    }

    /**
     * Get associatedmedia.
     *
     * @return string|null
     */
    public function getAssociatedmedia()
    {
        return $this->associatedmedia;
    }

    /**
     * Set associatedreferences.
     *
     * @param string|null $associatedreferences
     *
     * @return Uploadspectemp
     */
    public function setAssociatedreferences($associatedreferences = null)
    {
        $this->associatedreferences = $associatedreferences;

        return $this;
    }

    /**
     * Get associatedreferences.
     *
     * @return string|null
     */
    public function getAssociatedreferences()
    {
        return $this->associatedreferences;
    }

    /**
     * Set associatedsequences.
     *
     * @param string|null $associatedsequences
     *
     * @return Uploadspectemp
     */
    public function setAssociatedsequences($associatedsequences = null)
    {
        $this->associatedsequences = $associatedsequences;

        return $this;
    }

    /**
     * Get associatedsequences.
     *
     * @return string|null
     */
    public function getAssociatedsequences()
    {
        return $this->associatedsequences;
    }

    /**
     * Set associatedtaxa.
     *
     * @param string|null $associatedtaxa
     *
     * @return Uploadspectemp
     */
    public function setAssociatedtaxa($associatedtaxa = null)
    {
        $this->associatedtaxa = $associatedtaxa;

        return $this;
    }

    /**
     * Get associatedtaxa.
     *
     * @return string|null
     */
    public function getAssociatedtaxa()
    {
        return $this->associatedtaxa;
    }

    /**
     * Set dynamicproperties.
     *
     * @param string|null $dynamicproperties
     *
     * @return Uploadspectemp
     */
    public function setDynamicproperties($dynamicproperties = null)
    {
        $this->dynamicproperties = $dynamicproperties;

        return $this;
    }

    /**
     * Get dynamicproperties.
     *
     * @return string|null
     */
    public function getDynamicproperties()
    {
        return $this->dynamicproperties;
    }

    /**
     * Set verbatimattributes.
     *
     * @param string|null $verbatimattributes
     *
     * @return Uploadspectemp
     */
    public function setVerbatimattributes($verbatimattributes = null)
    {
        $this->verbatimattributes = $verbatimattributes;

        return $this;
    }

    /**
     * Get verbatimattributes.
     *
     * @return string|null
     */
    public function getVerbatimattributes()
    {
        return $this->verbatimattributes;
    }

    /**
     * Set behavior.
     *
     * @param string|null $behavior
     *
     * @return Uploadspectemp
     */
    public function setBehavior($behavior = null)
    {
        $this->behavior = $behavior;

        return $this;
    }

    /**
     * Get behavior.
     *
     * @return string|null
     */
    public function getBehavior()
    {
        return $this->behavior;
    }

    /**
     * Set reproductivecondition.
     *
     * @param string|null $reproductivecondition
     *
     * @return Uploadspectemp
     */
    public function setReproductivecondition($reproductivecondition = null)
    {
        $this->reproductivecondition = $reproductivecondition;

        return $this;
    }

    /**
     * Get reproductivecondition.
     *
     * @return string|null
     */
    public function getReproductivecondition()
    {
        return $this->reproductivecondition;
    }

    /**
     * Set cultivationstatus.
     *
     * @param int|null $cultivationstatus
     *
     * @return Uploadspectemp
     */
    public function setCultivationstatus($cultivationstatus = null)
    {
        $this->cultivationstatus = $cultivationstatus;

        return $this;
    }

    /**
     * Get cultivationstatus.
     *
     * @return int|null
     */
    public function getCultivationstatus()
    {
        return $this->cultivationstatus;
    }

    /**
     * Set establishmentmeans.
     *
     * @param string|null $establishmentmeans
     *
     * @return Uploadspectemp
     */
    public function setEstablishmentmeans($establishmentmeans = null)
    {
        $this->establishmentmeans = $establishmentmeans;

        return $this;
    }

    /**
     * Get establishmentmeans.
     *
     * @return string|null
     */
    public function getEstablishmentmeans()
    {
        return $this->establishmentmeans;
    }

    /**
     * Set lifestage.
     *
     * @param string|null $lifestage
     *
     * @return Uploadspectemp
     */
    public function setLifestage($lifestage = null)
    {
        $this->lifestage = $lifestage;

        return $this;
    }

    /**
     * Get lifestage.
     *
     * @return string|null
     */
    public function getLifestage()
    {
        return $this->lifestage;
    }

    /**
     * Set sex.
     *
     * @param string|null $sex
     *
     * @return Uploadspectemp
     */
    public function setSex($sex = null)
    {
        $this->sex = $sex;

        return $this;
    }

    /**
     * Get sex.
     *
     * @return string|null
     */
    public function getSex()
    {
        return $this->sex;
    }

    /**
     * Set individualcount.
     *
     * @param string|null $individualcount
     *
     * @return Uploadspectemp
     */
    public function setIndividualcount($individualcount = null)
    {
        $this->individualcount = $individualcount;

        return $this;
    }

    /**
     * Get individualcount.
     *
     * @return string|null
     */
    public function getIndividualcount()
    {
        return $this->individualcount;
    }

    /**
     * Set samplingprotocol.
     *
     * @param string|null $samplingprotocol
     *
     * @return Uploadspectemp
     */
    public function setSamplingprotocol($samplingprotocol = null)
    {
        $this->samplingprotocol = $samplingprotocol;

        return $this;
    }

    /**
     * Get samplingprotocol.
     *
     * @return string|null
     */
    public function getSamplingprotocol()
    {
        return $this->samplingprotocol;
    }

    /**
     * Set samplingeffort.
     *
     * @param string|null $samplingeffort
     *
     * @return Uploadspectemp
     */
    public function setSamplingeffort($samplingeffort = null)
    {
        $this->samplingeffort = $samplingeffort;

        return $this;
    }

    /**
     * Get samplingeffort.
     *
     * @return string|null
     */
    public function getSamplingeffort()
    {
        return $this->samplingeffort;
    }

    /**
     * Set preparations.
     *
     * @param string|null $preparations
     *
     * @return Uploadspectemp
     */
    public function setPreparations($preparations = null)
    {
        $this->preparations = $preparations;

        return $this;
    }

    /**
     * Get preparations.
     *
     * @return string|null
     */
    public function getPreparations()
    {
        return $this->preparations;
    }

    /**
     * Set country.
     *
     * @param string|null $country
     *
     * @return Uploadspectemp
     */
    public function setCountry($country = null)
    {
        $this->country = $country;

        return $this;
    }

    /**
     * Get country.
     *
     * @return string|null
     */
    public function getCountry()
    {
        return $this->country;
    }

    /**
     * Set stateprovince.
     *
     * @param string|null $stateprovince
     *
     * @return Uploadspectemp
     */
    public function setStateprovince($stateprovince = null)
    {
        $this->stateprovince = $stateprovince;

        return $this;
    }

    /**
     * Get stateprovince.
     *
     * @return string|null
     */
    public function getStateprovince()
    {
        return $this->stateprovince;
    }

    /**
     * Set county.
     *
     * @param string|null $county
     *
     * @return Uploadspectemp
     */
    public function setCounty($county = null)
    {
        $this->county = $county;

        return $this;
    }

    /**
     * Get county.
     *
     * @return string|null
     */
    public function getCounty()
    {
        return $this->county;
    }

    /**
     * Set municipality.
     *
     * @param string|null $municipality
     *
     * @return Uploadspectemp
     */
    public function setMunicipality($municipality = null)
    {
        $this->municipality = $municipality;

        return $this;
    }

    /**
     * Get municipality.
     *
     * @return string|null
     */
    public function getMunicipality()
    {
        return $this->municipality;
    }

    /**
     * Set locality.
     *
     * @param string|null $locality
     *
     * @return Uploadspectemp
     */
    public function setLocality($locality = null)
    {
        $this->locality = $locality;

        return $this;
    }

    /**
     * Get locality.
     *
     * @return string|null
     */
    public function getLocality()
    {
        return $this->locality;
    }

    /**
     * Set localitysecurity.
     *
     * @param int|null $localitysecurity
     *
     * @return Uploadspectemp
     */
    public function setLocalitysecurity($localitysecurity = null)
    {
        $this->localitysecurity = $localitysecurity;

        return $this;
    }

    /**
     * Get localitysecurity.
     *
     * @return int|null
     */
    public function getLocalitysecurity()
    {
        return $this->localitysecurity;
    }

    /**
     * Set localitysecurityreason.
     *
     * @param string|null $localitysecurityreason
     *
     * @return Uploadspectemp
     */
    public function setLocalitysecurityreason($localitysecurityreason = null)
    {
        $this->localitysecurityreason = $localitysecurityreason;

        return $this;
    }

    /**
     * Get localitysecurityreason.
     *
     * @return string|null
     */
    public function getLocalitysecurityreason()
    {
        return $this->localitysecurityreason;
    }

    /**
     * Set decimallatitude.
     *
     * @param float|null $decimallatitude
     *
     * @return Uploadspectemp
     */
    public function setDecimallatitude($decimallatitude = null)
    {
        $this->decimallatitude = $decimallatitude;

        return $this;
    }

    /**
     * Get decimallatitude.
     *
     * @return float|null
     */
    public function getDecimallatitude()
    {
        return $this->decimallatitude;
    }

    /**
     * Set decimallongitude.
     *
     * @param float|null $decimallongitude
     *
     * @return Uploadspectemp
     */
    public function setDecimallongitude($decimallongitude = null)
    {
        $this->decimallongitude = $decimallongitude;

        return $this;
    }

    /**
     * Get decimallongitude.
     *
     * @return float|null
     */
    public function getDecimallongitude()
    {
        return $this->decimallongitude;
    }

    /**
     * Set geodeticdatum.
     *
     * @param string|null $geodeticdatum
     *
     * @return Uploadspectemp
     */
    public function setGeodeticdatum($geodeticdatum = null)
    {
        $this->geodeticdatum = $geodeticdatum;

        return $this;
    }

    /**
     * Get geodeticdatum.
     *
     * @return string|null
     */
    public function getGeodeticdatum()
    {
        return $this->geodeticdatum;
    }

    /**
     * Set coordinateuncertaintyinmeters.
     *
     * @param int|null $coordinateuncertaintyinmeters
     *
     * @return Uploadspectemp
     */
    public function setCoordinateuncertaintyinmeters($coordinateuncertaintyinmeters = null)
    {
        $this->coordinateuncertaintyinmeters = $coordinateuncertaintyinmeters;

        return $this;
    }

    /**
     * Get coordinateuncertaintyinmeters.
     *
     * @return int|null
     */
    public function getCoordinateuncertaintyinmeters()
    {
        return $this->coordinateuncertaintyinmeters;
    }

    /**
     * Set footprintwkt.
     *
     * @param string|null $footprintwkt
     *
     * @return Uploadspectemp
     */
    public function setFootprintwkt($footprintwkt = null)
    {
        $this->footprintwkt = $footprintwkt;

        return $this;
    }

    /**
     * Get footprintwkt.
     *
     * @return string|null
     */
    public function getFootprintwkt()
    {
        return $this->footprintwkt;
    }

    /**
     * Set coordinateprecision.
     *
     * @param string|null $coordinateprecision
     *
     * @return Uploadspectemp
     */
    public function setCoordinateprecision($coordinateprecision = null)
    {
        $this->coordinateprecision = $coordinateprecision;

        return $this;
    }

    /**
     * Get coordinateprecision.
     *
     * @return string|null
     */
    public function getCoordinateprecision()
    {
        return $this->coordinateprecision;
    }

    /**
     * Set locationremarks.
     *
     * @param string|null $locationremarks
     *
     * @return Uploadspectemp
     */
    public function setLocationremarks($locationremarks = null)
    {
        $this->locationremarks = $locationremarks;

        return $this;
    }

    /**
     * Get locationremarks.
     *
     * @return string|null
     */
    public function getLocationremarks()
    {
        return $this->locationremarks;
    }

    /**
     * Set verbatimcoordinates.
     *
     * @param string|null $verbatimcoordinates
     *
     * @return Uploadspectemp
     */
    public function setVerbatimcoordinates($verbatimcoordinates = null)
    {
        $this->verbatimcoordinates = $verbatimcoordinates;

        return $this;
    }

    /**
     * Get verbatimcoordinates.
     *
     * @return string|null
     */
    public function getVerbatimcoordinates()
    {
        return $this->verbatimcoordinates;
    }

    /**
     * Set verbatimcoordinatesystem.
     *
     * @param string|null $verbatimcoordinatesystem
     *
     * @return Uploadspectemp
     */
    public function setVerbatimcoordinatesystem($verbatimcoordinatesystem = null)
    {
        $this->verbatimcoordinatesystem = $verbatimcoordinatesystem;

        return $this;
    }

    /**
     * Get verbatimcoordinatesystem.
     *
     * @return string|null
     */
    public function getVerbatimcoordinatesystem()
    {
        return $this->verbatimcoordinatesystem;
    }

    /**
     * Set latdeg.
     *
     * @param int|null $latdeg
     *
     * @return Uploadspectemp
     */
    public function setLatdeg($latdeg = null)
    {
        $this->latdeg = $latdeg;

        return $this;
    }

    /**
     * Get latdeg.
     *
     * @return int|null
     */
    public function getLatdeg()
    {
        return $this->latdeg;
    }

    /**
     * Set latmin.
     *
     * @param float|null $latmin
     *
     * @return Uploadspectemp
     */
    public function setLatmin($latmin = null)
    {
        $this->latmin = $latmin;

        return $this;
    }

    /**
     * Get latmin.
     *
     * @return float|null
     */
    public function getLatmin()
    {
        return $this->latmin;
    }

    /**
     * Set latsec.
     *
     * @param float|null $latsec
     *
     * @return Uploadspectemp
     */
    public function setLatsec($latsec = null)
    {
        $this->latsec = $latsec;

        return $this;
    }

    /**
     * Get latsec.
     *
     * @return float|null
     */
    public function getLatsec()
    {
        return $this->latsec;
    }

    /**
     * Set latns.
     *
     * @param string|null $latns
     *
     * @return Uploadspectemp
     */
    public function setLatns($latns = null)
    {
        $this->latns = $latns;

        return $this;
    }

    /**
     * Get latns.
     *
     * @return string|null
     */
    public function getLatns()
    {
        return $this->latns;
    }

    /**
     * Set lngdeg.
     *
     * @param int|null $lngdeg
     *
     * @return Uploadspectemp
     */
    public function setLngdeg($lngdeg = null)
    {
        $this->lngdeg = $lngdeg;

        return $this;
    }

    /**
     * Get lngdeg.
     *
     * @return int|null
     */
    public function getLngdeg()
    {
        return $this->lngdeg;
    }

    /**
     * Set lngmin.
     *
     * @param float|null $lngmin
     *
     * @return Uploadspectemp
     */
    public function setLngmin($lngmin = null)
    {
        $this->lngmin = $lngmin;

        return $this;
    }

    /**
     * Get lngmin.
     *
     * @return float|null
     */
    public function getLngmin()
    {
        return $this->lngmin;
    }

    /**
     * Set lngsec.
     *
     * @param float|null $lngsec
     *
     * @return Uploadspectemp
     */
    public function setLngsec($lngsec = null)
    {
        $this->lngsec = $lngsec;

        return $this;
    }

    /**
     * Get lngsec.
     *
     * @return float|null
     */
    public function getLngsec()
    {
        return $this->lngsec;
    }

    /**
     * Set lngew.
     *
     * @param string|null $lngew
     *
     * @return Uploadspectemp
     */
    public function setLngew($lngew = null)
    {
        $this->lngew = $lngew;

        return $this;
    }

    /**
     * Get lngew.
     *
     * @return string|null
     */
    public function getLngew()
    {
        return $this->lngew;
    }

    /**
     * Set verbatimlatitude.
     *
     * @param string|null $verbatimlatitude
     *
     * @return Uploadspectemp
     */
    public function setVerbatimlatitude($verbatimlatitude = null)
    {
        $this->verbatimlatitude = $verbatimlatitude;

        return $this;
    }

    /**
     * Get verbatimlatitude.
     *
     * @return string|null
     */
    public function getVerbatimlatitude()
    {
        return $this->verbatimlatitude;
    }

    /**
     * Set verbatimlongitude.
     *
     * @param string|null $verbatimlongitude
     *
     * @return Uploadspectemp
     */
    public function setVerbatimlongitude($verbatimlongitude = null)
    {
        $this->verbatimlongitude = $verbatimlongitude;

        return $this;
    }

    /**
     * Get verbatimlongitude.
     *
     * @return string|null
     */
    public function getVerbatimlongitude()
    {
        return $this->verbatimlongitude;
    }

    /**
     * Set utmnorthing.
     *
     * @param string|null $utmnorthing
     *
     * @return Uploadspectemp
     */
    public function setUtmnorthing($utmnorthing = null)
    {
        $this->utmnorthing = $utmnorthing;

        return $this;
    }

    /**
     * Get utmnorthing.
     *
     * @return string|null
     */
    public function getUtmnorthing()
    {
        return $this->utmnorthing;
    }

    /**
     * Set utmeasting.
     *
     * @param string|null $utmeasting
     *
     * @return Uploadspectemp
     */
    public function setUtmeasting($utmeasting = null)
    {
        $this->utmeasting = $utmeasting;

        return $this;
    }

    /**
     * Get utmeasting.
     *
     * @return string|null
     */
    public function getUtmeasting()
    {
        return $this->utmeasting;
    }

    /**
     * Set utmzoning.
     *
     * @param string|null $utmzoning
     *
     * @return Uploadspectemp
     */
    public function setUtmzoning($utmzoning = null)
    {
        $this->utmzoning = $utmzoning;

        return $this;
    }

    /**
     * Get utmzoning.
     *
     * @return string|null
     */
    public function getUtmzoning()
    {
        return $this->utmzoning;
    }

    /**
     * Set trstownship.
     *
     * @param string|null $trstownship
     *
     * @return Uploadspectemp
     */
    public function setTrstownship($trstownship = null)
    {
        $this->trstownship = $trstownship;

        return $this;
    }

    /**
     * Get trstownship.
     *
     * @return string|null
     */
    public function getTrstownship()
    {
        return $this->trstownship;
    }

    /**
     * Set trsrange.
     *
     * @param string|null $trsrange
     *
     * @return Uploadspectemp
     */
    public function setTrsrange($trsrange = null)
    {
        $this->trsrange = $trsrange;

        return $this;
    }

    /**
     * Get trsrange.
     *
     * @return string|null
     */
    public function getTrsrange()
    {
        return $this->trsrange;
    }

    /**
     * Set trssection.
     *
     * @param string|null $trssection
     *
     * @return Uploadspectemp
     */
    public function setTrssection($trssection = null)
    {
        $this->trssection = $trssection;

        return $this;
    }

    /**
     * Get trssection.
     *
     * @return string|null
     */
    public function getTrssection()
    {
        return $this->trssection;
    }

    /**
     * Set trssectiondetails.
     *
     * @param string|null $trssectiondetails
     *
     * @return Uploadspectemp
     */
    public function setTrssectiondetails($trssectiondetails = null)
    {
        $this->trssectiondetails = $trssectiondetails;

        return $this;
    }

    /**
     * Get trssectiondetails.
     *
     * @return string|null
     */
    public function getTrssectiondetails()
    {
        return $this->trssectiondetails;
    }

    /**
     * Set georeferencedby.
     *
     * @param string|null $georeferencedby
     *
     * @return Uploadspectemp
     */
    public function setGeoreferencedby($georeferencedby = null)
    {
        $this->georeferencedby = $georeferencedby;

        return $this;
    }

    /**
     * Get georeferencedby.
     *
     * @return string|null
     */
    public function getGeoreferencedby()
    {
        return $this->georeferencedby;
    }

    /**
     * Set georeferenceprotocol.
     *
     * @param string|null $georeferenceprotocol
     *
     * @return Uploadspectemp
     */
    public function setGeoreferenceprotocol($georeferenceprotocol = null)
    {
        $this->georeferenceprotocol = $georeferenceprotocol;

        return $this;
    }

    /**
     * Get georeferenceprotocol.
     *
     * @return string|null
     */
    public function getGeoreferenceprotocol()
    {
        return $this->georeferenceprotocol;
    }

    /**
     * Set georeferencesources.
     *
     * @param string|null $georeferencesources
     *
     * @return Uploadspectemp
     */
    public function setGeoreferencesources($georeferencesources = null)
    {
        $this->georeferencesources = $georeferencesources;

        return $this;
    }

    /**
     * Get georeferencesources.
     *
     * @return string|null
     */
    public function getGeoreferencesources()
    {
        return $this->georeferencesources;
    }

    /**
     * Set georeferenceverificationstatus.
     *
     * @param string|null $georeferenceverificationstatus
     *
     * @return Uploadspectemp
     */
    public function setGeoreferenceverificationstatus($georeferenceverificationstatus = null)
    {
        $this->georeferenceverificationstatus = $georeferenceverificationstatus;

        return $this;
    }

    /**
     * Get georeferenceverificationstatus.
     *
     * @return string|null
     */
    public function getGeoreferenceverificationstatus()
    {
        return $this->georeferenceverificationstatus;
    }

    /**
     * Set georeferenceremarks.
     *
     * @param string|null $georeferenceremarks
     *
     * @return Uploadspectemp
     */
    public function setGeoreferenceremarks($georeferenceremarks = null)
    {
        $this->georeferenceremarks = $georeferenceremarks;

        return $this;
    }

    /**
     * Get georeferenceremarks.
     *
     * @return string|null
     */
    public function getGeoreferenceremarks()
    {
        return $this->georeferenceremarks;
    }

    /**
     * Set minimumelevationinmeters.
     *
     * @param int|null $minimumelevationinmeters
     *
     * @return Uploadspectemp
     */
    public function setMinimumelevationinmeters($minimumelevationinmeters = null)
    {
        $this->minimumelevationinmeters = $minimumelevationinmeters;

        return $this;
    }

    /**
     * Get minimumelevationinmeters.
     *
     * @return int|null
     */
    public function getMinimumelevationinmeters()
    {
        return $this->minimumelevationinmeters;
    }

    /**
     * Set maximumelevationinmeters.
     *
     * @param int|null $maximumelevationinmeters
     *
     * @return Uploadspectemp
     */
    public function setMaximumelevationinmeters($maximumelevationinmeters = null)
    {
        $this->maximumelevationinmeters = $maximumelevationinmeters;

        return $this;
    }

    /**
     * Get maximumelevationinmeters.
     *
     * @return int|null
     */
    public function getMaximumelevationinmeters()
    {
        return $this->maximumelevationinmeters;
    }

    /**
     * Set elevationnumber.
     *
     * @param string|null $elevationnumber
     *
     * @return Uploadspectemp
     */
    public function setElevationnumber($elevationnumber = null)
    {
        $this->elevationnumber = $elevationnumber;

        return $this;
    }

    /**
     * Get elevationnumber.
     *
     * @return string|null
     */
    public function getElevationnumber()
    {
        return $this->elevationnumber;
    }

    /**
     * Set elevationunits.
     *
     * @param string|null $elevationunits
     *
     * @return Uploadspectemp
     */
    public function setElevationunits($elevationunits = null)
    {
        $this->elevationunits = $elevationunits;

        return $this;
    }

    /**
     * Get elevationunits.
     *
     * @return string|null
     */
    public function getElevationunits()
    {
        return $this->elevationunits;
    }

    /**
     * Set verbatimelevation.
     *
     * @param string|null $verbatimelevation
     *
     * @return Uploadspectemp
     */
    public function setVerbatimelevation($verbatimelevation = null)
    {
        $this->verbatimelevation = $verbatimelevation;

        return $this;
    }

    /**
     * Get verbatimelevation.
     *
     * @return string|null
     */
    public function getVerbatimelevation()
    {
        return $this->verbatimelevation;
    }

    /**
     * Set minimumdepthinmeters.
     *
     * @param int|null $minimumdepthinmeters
     *
     * @return Uploadspectemp
     */
    public function setMinimumdepthinmeters($minimumdepthinmeters = null)
    {
        $this->minimumdepthinmeters = $minimumdepthinmeters;

        return $this;
    }

    /**
     * Get minimumdepthinmeters.
     *
     * @return int|null
     */
    public function getMinimumdepthinmeters()
    {
        return $this->minimumdepthinmeters;
    }

    /**
     * Set maximumdepthinmeters.
     *
     * @param int|null $maximumdepthinmeters
     *
     * @return Uploadspectemp
     */
    public function setMaximumdepthinmeters($maximumdepthinmeters = null)
    {
        $this->maximumdepthinmeters = $maximumdepthinmeters;

        return $this;
    }

    /**
     * Get maximumdepthinmeters.
     *
     * @return int|null
     */
    public function getMaximumdepthinmeters()
    {
        return $this->maximumdepthinmeters;
    }

    /**
     * Set verbatimdepth.
     *
     * @param string|null $verbatimdepth
     *
     * @return Uploadspectemp
     */
    public function setVerbatimdepth($verbatimdepth = null)
    {
        $this->verbatimdepth = $verbatimdepth;

        return $this;
    }

    /**
     * Get verbatimdepth.
     *
     * @return string|null
     */
    public function getVerbatimdepth()
    {
        return $this->verbatimdepth;
    }

    /**
     * Set previousidentifications.
     *
     * @param string|null $previousidentifications
     *
     * @return Uploadspectemp
     */
    public function setPreviousidentifications($previousidentifications = null)
    {
        $this->previousidentifications = $previousidentifications;

        return $this;
    }

    /**
     * Get previousidentifications.
     *
     * @return string|null
     */
    public function getPreviousidentifications()
    {
        return $this->previousidentifications;
    }

    /**
     * Set disposition.
     *
     * @param string|null $disposition
     *
     * @return Uploadspectemp
     */
    public function setDisposition($disposition = null)
    {
        $this->disposition = $disposition;

        return $this;
    }

    /**
     * Get disposition.
     *
     * @return string|null
     */
    public function getDisposition()
    {
        return $this->disposition;
    }

    /**
     * Set storagelocation.
     *
     * @param string|null $storagelocation
     *
     * @return Uploadspectemp
     */
    public function setStoragelocation($storagelocation = null)
    {
        $this->storagelocation = $storagelocation;

        return $this;
    }

    /**
     * Get storagelocation.
     *
     * @return string|null
     */
    public function getStoragelocation()
    {
        return $this->storagelocation;
    }

    /**
     * Set genericcolumn1.
     *
     * @param string|null $genericcolumn1
     *
     * @return Uploadspectemp
     */
    public function setGenericcolumn1($genericcolumn1 = null)
    {
        $this->genericcolumn1 = $genericcolumn1;

        return $this;
    }

    /**
     * Get genericcolumn1.
     *
     * @return string|null
     */
    public function getGenericcolumn1()
    {
        return $this->genericcolumn1;
    }

    /**
     * Set genericcolumn2.
     *
     * @param string|null $genericcolumn2
     *
     * @return Uploadspectemp
     */
    public function setGenericcolumn2($genericcolumn2 = null)
    {
        $this->genericcolumn2 = $genericcolumn2;

        return $this;
    }

    /**
     * Get genericcolumn2.
     *
     * @return string|null
     */
    public function getGenericcolumn2()
    {
        return $this->genericcolumn2;
    }

    /**
     * Set exsiccatiidentifier.
     *
     * @param int|null $exsiccatiidentifier
     *
     * @return Uploadspectemp
     */
    public function setExsiccatiidentifier($exsiccatiidentifier = null)
    {
        $this->exsiccatiidentifier = $exsiccatiidentifier;

        return $this;
    }

    /**
     * Get exsiccatiidentifier.
     *
     * @return int|null
     */
    public function getExsiccatiidentifier()
    {
        return $this->exsiccatiidentifier;
    }

    /**
     * Set exsiccatinumber.
     *
     * @param string|null $exsiccatinumber
     *
     * @return Uploadspectemp
     */
    public function setExsiccatinumber($exsiccatinumber = null)
    {
        $this->exsiccatinumber = $exsiccatinumber;

        return $this;
    }

    /**
     * Get exsiccatinumber.
     *
     * @return string|null
     */
    public function getExsiccatinumber()
    {
        return $this->exsiccatinumber;
    }

    /**
     * Set exsiccatinotes.
     *
     * @param string|null $exsiccatinotes
     *
     * @return Uploadspectemp
     */
    public function setExsiccatinotes($exsiccatinotes = null)
    {
        $this->exsiccatinotes = $exsiccatinotes;

        return $this;
    }

    /**
     * Get exsiccatinotes.
     *
     * @return string|null
     */
    public function getExsiccatinotes()
    {
        return $this->exsiccatinotes;
    }

    /**
     * Set modified.
     *
     * @param \DateTime|null $modified
     *
     * @return Uploadspectemp
     */
    public function setModified($modified = null)
    {
        $this->modified = $modified;

        return $this;
    }

    /**
     * Get modified.
     *
     * @return \DateTime|null
     */
    public function getModified()
    {
        return $this->modified;
    }

    /**
     * Set language.
     *
     * @param string|null $language
     *
     * @return Uploadspectemp
     */
    public function setLanguage($language = null)
    {
        $this->language = $language;

        return $this;
    }

    /**
     * Get language.
     *
     * @return string|null
     */
    public function getLanguage()
    {
        return $this->language;
    }

    /**
     * Set recordenteredby.
     *
     * @param string|null $recordenteredby
     *
     * @return Uploadspectemp
     */
    public function setRecordenteredby($recordenteredby = null)
    {
        $this->recordenteredby = $recordenteredby;

        return $this;
    }

    /**
     * Get recordenteredby.
     *
     * @return string|null
     */
    public function getRecordenteredby()
    {
        return $this->recordenteredby;
    }

    /**
     * Set duplicatequantity.
     *
     * @param int|null $duplicatequantity
     *
     * @return Uploadspectemp
     */
    public function setDuplicatequantity($duplicatequantity = null)
    {
        $this->duplicatequantity = $duplicatequantity;

        return $this;
    }

    /**
     * Get duplicatequantity.
     *
     * @return int|null
     */
    public function getDuplicatequantity()
    {
        return $this->duplicatequantity;
    }

    /**
     * Set labelproject.
     *
     * @param string|null $labelproject
     *
     * @return Uploadspectemp
     */
    public function setLabelproject($labelproject = null)
    {
        $this->labelproject = $labelproject;

        return $this;
    }

    /**
     * Get labelproject.
     *
     * @return string|null
     */
    public function getLabelproject()
    {
        return $this->labelproject;
    }

    /**
     * Set processingstatus.
     *
     * @param string|null $processingstatus
     *
     * @return Uploadspectemp
     */
    public function setProcessingstatus($processingstatus = null)
    {
        $this->processingstatus = $processingstatus;

        return $this;
    }

    /**
     * Get processingstatus.
     *
     * @return string|null
     */
    public function getProcessingstatus()
    {
        return $this->processingstatus;
    }

    /**
     * Set tempfield01.
     *
     * @param string|null $tempfield01
     *
     * @return Uploadspectemp
     */
    public function setTempfield01($tempfield01 = null)
    {
        $this->tempfield01 = $tempfield01;

        return $this;
    }

    /**
     * Get tempfield01.
     *
     * @return string|null
     */
    public function getTempfield01()
    {
        return $this->tempfield01;
    }

    /**
     * Set tempfield02.
     *
     * @param string|null $tempfield02
     *
     * @return Uploadspectemp
     */
    public function setTempfield02($tempfield02 = null)
    {
        $this->tempfield02 = $tempfield02;

        return $this;
    }

    /**
     * Get tempfield02.
     *
     * @return string|null
     */
    public function getTempfield02()
    {
        return $this->tempfield02;
    }

    /**
     * Set tempfield03.
     *
     * @param string|null $tempfield03
     *
     * @return Uploadspectemp
     */
    public function setTempfield03($tempfield03 = null)
    {
        $this->tempfield03 = $tempfield03;

        return $this;
    }

    /**
     * Get tempfield03.
     *
     * @return string|null
     */
    public function getTempfield03()
    {
        return $this->tempfield03;
    }

    /**
     * Set tempfield04.
     *
     * @param string|null $tempfield04
     *
     * @return Uploadspectemp
     */
    public function setTempfield04($tempfield04 = null)
    {
        $this->tempfield04 = $tempfield04;

        return $this;
    }

    /**
     * Get tempfield04.
     *
     * @return string|null
     */
    public function getTempfield04()
    {
        return $this->tempfield04;
    }

    /**
     * Set tempfield05.
     *
     * @param string|null $tempfield05
     *
     * @return Uploadspectemp
     */
    public function setTempfield05($tempfield05 = null)
    {
        $this->tempfield05 = $tempfield05;

        return $this;
    }

    /**
     * Get tempfield05.
     *
     * @return string|null
     */
    public function getTempfield05()
    {
        return $this->tempfield05;
    }

    /**
     * Set tempfield06.
     *
     * @param string|null $tempfield06
     *
     * @return Uploadspectemp
     */
    public function setTempfield06($tempfield06 = null)
    {
        $this->tempfield06 = $tempfield06;

        return $this;
    }

    /**
     * Get tempfield06.
     *
     * @return string|null
     */
    public function getTempfield06()
    {
        return $this->tempfield06;
    }

    /**
     * Set tempfield07.
     *
     * @param string|null $tempfield07
     *
     * @return Uploadspectemp
     */
    public function setTempfield07($tempfield07 = null)
    {
        $this->tempfield07 = $tempfield07;

        return $this;
    }

    /**
     * Get tempfield07.
     *
     * @return string|null
     */
    public function getTempfield07()
    {
        return $this->tempfield07;
    }

    /**
     * Set tempfield08.
     *
     * @param string|null $tempfield08
     *
     * @return Uploadspectemp
     */
    public function setTempfield08($tempfield08 = null)
    {
        $this->tempfield08 = $tempfield08;

        return $this;
    }

    /**
     * Get tempfield08.
     *
     * @return string|null
     */
    public function getTempfield08()
    {
        return $this->tempfield08;
    }

    /**
     * Set tempfield09.
     *
     * @param string|null $tempfield09
     *
     * @return Uploadspectemp
     */
    public function setTempfield09($tempfield09 = null)
    {
        $this->tempfield09 = $tempfield09;

        return $this;
    }

    /**
     * Get tempfield09.
     *
     * @return string|null
     */
    public function getTempfield09()
    {
        return $this->tempfield09;
    }

    /**
     * Set tempfield10.
     *
     * @param string|null $tempfield10
     *
     * @return Uploadspectemp
     */
    public function setTempfield10($tempfield10 = null)
    {
        $this->tempfield10 = $tempfield10;

        return $this;
    }

    /**
     * Get tempfield10.
     *
     * @return string|null
     */
    public function getTempfield10()
    {
        return $this->tempfield10;
    }

    /**
     * Set tempfield11.
     *
     * @param string|null $tempfield11
     *
     * @return Uploadspectemp
     */
    public function setTempfield11($tempfield11 = null)
    {
        $this->tempfield11 = $tempfield11;

        return $this;
    }

    /**
     * Get tempfield11.
     *
     * @return string|null
     */
    public function getTempfield11()
    {
        return $this->tempfield11;
    }

    /**
     * Set tempfield12.
     *
     * @param string|null $tempfield12
     *
     * @return Uploadspectemp
     */
    public function setTempfield12($tempfield12 = null)
    {
        $this->tempfield12 = $tempfield12;

        return $this;
    }

    /**
     * Get tempfield12.
     *
     * @return string|null
     */
    public function getTempfield12()
    {
        return $this->tempfield12;
    }

    /**
     * Set tempfield13.
     *
     * @param string|null $tempfield13
     *
     * @return Uploadspectemp
     */
    public function setTempfield13($tempfield13 = null)
    {
        $this->tempfield13 = $tempfield13;

        return $this;
    }

    /**
     * Get tempfield13.
     *
     * @return string|null
     */
    public function getTempfield13()
    {
        return $this->tempfield13;
    }

    /**
     * Set tempfield14.
     *
     * @param string|null $tempfield14
     *
     * @return Uploadspectemp
     */
    public function setTempfield14($tempfield14 = null)
    {
        $this->tempfield14 = $tempfield14;

        return $this;
    }

    /**
     * Get tempfield14.
     *
     * @return string|null
     */
    public function getTempfield14()
    {
        return $this->tempfield14;
    }

    /**
     * Set tempfield15.
     *
     * @param string|null $tempfield15
     *
     * @return Uploadspectemp
     */
    public function setTempfield15($tempfield15 = null)
    {
        $this->tempfield15 = $tempfield15;

        return $this;
    }

    /**
     * Get tempfield15.
     *
     * @return string|null
     */
    public function getTempfield15()
    {
        return $this->tempfield15;
    }

    /**
     * Set initialtimestamp.
     *
     * @param \DateTime|null $initialtimestamp
     *
     * @return Uploadspectemp
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
     * Set collid.
     *
     * @param \App\Entities\Omcollections|null $collid
     *
     * @return Uploadspectemp
     */
    public function setCollid(\App\Entities\Omcollections $collid = null)
    {
        $this->collid = $collid;

        return $this;
    }

    /**
     * Get collid.
     *
     * @return \App\Entities\Omcollections|null
     */
    public function getCollid()
    {
        return $this->collid;
    }
}
