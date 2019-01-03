<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * Omoccurrences
 *
 * @ORM\Table(name="omoccurrences", uniqueConstraints={@ORM\UniqueConstraint(name="Index_collid", columns={"collid", "dbpk"})}, indexes={@ORM\Index(name="Index_latestDateCollected", columns={"latestDateCollected"}), @ORM\Index(name="Index_county", columns={"county"}), @ORM\Index(name="Index_eventDate", columns={"eventDate"}), @ORM\Index(name="Index_occurDateEntered", columns={"dateEntered"}), @ORM\Index(name="Index_sciname", columns={"sciname"}), @ORM\Index(name="Index_ownerInst", columns={"ownerInstitutionCode"}), @ORM\Index(name="occelevmin", columns={"minimumElevationInMeters"}), @ORM\Index(name="Index_otherCatalogNumbers", columns={"otherCatalogNumbers"}), @ORM\Index(name="Index_state", columns={"stateProvince"}), @ORM\Index(name="Index_catalognumber", columns={"catalogNumber"}), @ORM\Index(name="Index_occurDateLastModifed", columns={"dateLastModified"}), @ORM\Index(name="FK_omoccurrences_uid", columns={"observeruid"}), @ORM\Index(name="Index_gui", columns={"occurrenceID"}), @ORM\Index(name="occelevmax", columns={"maximumElevationInMeters"}), @ORM\Index(name="Index_locality", columns={"locality"}, flags={"fulltext"}), @ORM\Index(name="Index_country", columns={"country"}), @ORM\Index(name="Index_collnum", columns={"recordNumber"}), @ORM\Index(name="Index_occurrences_typestatus", columns={"typeStatus"}), @ORM\Index(name="FK_omoccurrences_tid", columns={"tidinterpreted"}), @ORM\Index(name="Index_collector", columns={"recordedBy"}), @ORM\Index(name="Index_occurrences_procstatus", columns={"processingstatus"}), @ORM\Index(name="Index_occurRecordEnteredBy", columns={"recordEnteredBy"}), @ORM\Index(name="Index_family", columns={"family"}), @ORM\Index(name="Index_municipality", columns={"municipality"}), @ORM\Index(name="Index_occurrences_cult", columns={"cultivationStatus"}), @ORM\Index(name="IDX_C48904CFEA1D339B", columns={"collid"})})
 * @ORM\Entity(repositoryClass="App\Repository\OmoccurrencesRepository")
 */
class Omoccurrences
{
    /**
     * @var int
     *
     * @ORM\Column(name="occid", type="integer", nullable=false, options={"unsigned"=true})
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $occid;

    /**
     * @var string|null
     *
     * @ORM\Column(name="dbpk", type="string", length=150, nullable=true, options={"default"=NULL})
     */
    private $dbpk = 'NULL';

    /**
     * @var string|null
     *
     * @ORM\Column(name="basisOfRecord", type="string", length=32, nullable=true, options={"default"="PreservedSpecimen","comment"="PreservedSpecimen, LivingSpecimen, HumanObservation"})
     */
    private $basisofrecord = 'PreservedSpecimen';

    /**
     * @var string|null
     *
     * @ORM\Column(name="occurrenceID", type="string", length=255, nullable=true, options={"default"=NULL,"comment"="UniqueGlobalIdentifier"})
     */
    private $occurrenceid = 'NULL';

    /**
     * @var string|null
     *
     * @ORM\Column(name="catalogNumber", type="string", length=32, nullable=true, options={"default"=NULL})
     */
    private $catalognumber = 'NULL';

    /**
     * @var string|null
     *
     * @ORM\Column(name="otherCatalogNumbers", type="string", length=255, nullable=true, options={"default"=NULL})
     */
    private $othercatalognumbers = 'NULL';

    /**
     * @var string|null
     *
     * @ORM\Column(name="ownerInstitutionCode", type="string", length=32, nullable=true, options={"default"=NULL})
     */
    private $ownerinstitutioncode = 'NULL';

    /**
     * @var string|null
     *
     * @ORM\Column(name="institutionID", type="string", length=255, nullable=true, options={"default"=NULL})
     */
    private $institutionid = 'NULL';

    /**
     * @var string|null
     *
     * @ORM\Column(name="collectionID", type="string", length=255, nullable=true, options={"default"=NULL})
     */
    private $collectionid = 'NULL';

    /**
     * @var string|null
     *
     * @ORM\Column(name="datasetID", type="string", length=255, nullable=true, options={"default"=NULL})
     */
    private $datasetid = 'NULL';

    /**
     * @var string|null
     *
     * @ORM\Column(name="institutionCode", type="string", length=64, nullable=true, options={"default"=NULL})
     */
    private $institutioncode = 'NULL';

    /**
     * @var string|null
     *
     * @ORM\Column(name="collectionCode", type="string", length=64, nullable=true, options={"default"=NULL})
     */
    private $collectioncode = 'NULL';

    /**
     * @var string|null
     *
     * @ORM\Column(name="family", type="string", length=255, nullable=true, options={"default"=NULL})
     */
    private $family = 'NULL';

    /**
     * @var string|null
     *
     * @ORM\Column(name="scientificName", type="string", length=255, nullable=true, options={"default"=NULL})
     */
    private $scientificname = 'NULL';

    /**
     * @var string|null
     *
     * @ORM\Column(name="sciname", type="string", length=255, nullable=true, options={"default"=NULL})
     */
    private $sciname = 'NULL';

    /**
     * @var string|null
     *
     * @ORM\Column(name="genus", type="string", length=255, nullable=true, options={"default"=NULL})
     */
    private $genus = 'NULL';

    /**
     * @var string|null
     *
     * @ORM\Column(name="specificEpithet", type="string", length=255, nullable=true, options={"default"=NULL})
     */
    private $specificepithet = 'NULL';

    /**
     * @var string|null
     *
     * @ORM\Column(name="taxonRank", type="string", length=32, nullable=true, options={"default"=NULL})
     */
    private $taxonrank = 'NULL';

    /**
     * @var string|null
     *
     * @ORM\Column(name="infraspecificEpithet", type="string", length=255, nullable=true, options={"default"=NULL})
     */
    private $infraspecificepithet = 'NULL';

    /**
     * @var string|null
     *
     * @ORM\Column(name="scientificNameAuthorship", type="string", length=255, nullable=true, options={"default"=NULL})
     */
    private $scientificnameauthorship = 'NULL';

    /**
     * @var string|null
     *
     * @ORM\Column(name="taxonRemarks", type="text", length=65535, nullable=true, options={"default"=NULL})
     */
    private $taxonremarks = 'NULL';

    /**
     * @var string|null
     *
     * @ORM\Column(name="identifiedBy", type="string", length=255, nullable=true, options={"default"=NULL})
     */
    private $identifiedby = 'NULL';

    /**
     * @var string|null
     *
     * @ORM\Column(name="dateIdentified", type="string", length=45, nullable=true, options={"default"=NULL})
     */
    private $dateidentified = 'NULL';

    /**
     * @var string|null
     *
     * @ORM\Column(name="identificationReferences", type="text", length=65535, nullable=true, options={"default"=NULL})
     */
    private $identificationreferences = 'NULL';

    /**
     * @var string|null
     *
     * @ORM\Column(name="identificationRemarks", type="text", length=65535, nullable=true, options={"default"=NULL})
     */
    private $identificationremarks = 'NULL';

    /**
     * @var string|null
     *
     * @ORM\Column(name="identificationQualifier", type="string", length=255, nullable=true, options={"default"=NULL,"comment"="cf, aff, etc"})
     */
    private $identificationqualifier = 'NULL';

    /**
     * @var string|null
     *
     * @ORM\Column(name="typeStatus", type="string", length=255, nullable=true, options={"default"=NULL})
     */
    private $typestatus = 'NULL';

    /**
     * @var string|null
     *
     * @ORM\Column(name="recordedBy", type="string", length=255, nullable=true, options={"default"=NULL,"comment"="Collector(s)"})
     */
    private $recordedby = 'NULL';

    /**
     * @var string|null
     *
     * @ORM\Column(name="recordNumber", type="string", length=45, nullable=true, options={"default"=NULL,"comment"="Collector Number"})
     */
    private $recordnumber = 'NULL';

    /**
     * @var string|null
     *
     * @ORM\Column(name="associatedCollectors", type="string", length=255, nullable=true, options={"default"=NULL,"comment"="not DwC"})
     */
    private $associatedcollectors = 'NULL';

    /**
     * @var \DateTime|null
     *
     * @ORM\Column(name="eventDate", type="date", nullable=true, options={"default"=NULL})
     */
    private $eventdate = 'NULL';

    /**
     * @var \DateTime|null
     *
     * @ORM\Column(name="latestDateCollected", type="date", nullable=true, options={"default"=NULL})
     */
    private $latestdatecollected = 'NULL';

    /**
     * @var int|null
     *
     * @ORM\Column(name="year", type="integer", nullable=true, options={"default"=NULL})
     */
    private $year = 'NULL';

    /**
     * @var int|null
     *
     * @ORM\Column(name="month", type="integer", nullable=true, options={"default"=NULL})
     */
    private $month = 'NULL';

    /**
     * @var int|null
     *
     * @ORM\Column(name="day", type="integer", nullable=true, options={"default"=NULL})
     */
    private $day = 'NULL';

    /**
     * @var int|null
     *
     * @ORM\Column(name="startDayOfYear", type="integer", nullable=true, options={"default"=NULL})
     */
    private $startdayofyear = 'NULL';

    /**
     * @var int|null
     *
     * @ORM\Column(name="endDayOfYear", type="integer", nullable=true, options={"default"=NULL})
     */
    private $enddayofyear = 'NULL';

    /**
     * @var string|null
     *
     * @ORM\Column(name="verbatimEventDate", type="string", length=255, nullable=true, options={"default"=NULL})
     */
    private $verbatimeventdate = 'NULL';

    /**
     * @var string|null
     *
     * @ORM\Column(name="habitat", type="text", length=65535, nullable=true, options={"default"=NULL,"comment"="Habitat, substrait, etc"})
     */
    private $habitat = 'NULL';

    /**
     * @var string|null
     *
     * @ORM\Column(name="substrate", type="string", length=500, nullable=true, options={"default"=NULL})
     */
    private $substrate = 'NULL';

    /**
     * @var string|null
     *
     * @ORM\Column(name="fieldNotes", type="text", length=65535, nullable=true, options={"default"=NULL})
     */
    private $fieldnotes = 'NULL';

    /**
     * @var string|null
     *
     * @ORM\Column(name="fieldnumber", type="string", length=45, nullable=true, options={"default"=NULL})
     */
    private $fieldnumber = 'NULL';

    /**
     * @var string|null
     *
     * @ORM\Column(name="eventID", type="string", length=45, nullable=true, options={"default"=NULL})
     */
    private $eventid = 'NULL';

    /**
     * @var string|null
     *
     * @ORM\Column(name="occurrenceRemarks", type="text", length=65535, nullable=true, options={"default"=NULL,"comment"="General Notes"})
     */
    private $occurrenceremarks = 'NULL';

    /**
     * @var string|null
     *
     * @ORM\Column(name="informationWithheld", type="string", length=250, nullable=true, options={"default"=NULL})
     */
    private $informationwithheld = 'NULL';

    /**
     * @var string|null
     *
     * @ORM\Column(name="dataGeneralizations", type="string", length=250, nullable=true, options={"default"=NULL})
     */
    private $datageneralizations = 'NULL';

    /**
     * @var string|null
     *
     * @ORM\Column(name="associatedOccurrences", type="text", length=65535, nullable=true, options={"default"=NULL})
     */
    private $associatedoccurrences = 'NULL';

    /**
     * @var string|null
     *
     * @ORM\Column(name="associatedTaxa", type="text", length=65535, nullable=true, options={"default"=NULL,"comment"="Associated Species"})
     */
    private $associatedtaxa = 'NULL';

    /**
     * @var string|null
     *
     * @ORM\Column(name="dynamicProperties", type="text", length=65535, nullable=true, options={"default"=NULL})
     */
    private $dynamicproperties = 'NULL';

    /**
     * @var string|null
     *
     * @ORM\Column(name="verbatimAttributes", type="text", length=65535, nullable=true, options={"default"=NULL})
     */
    private $verbatimattributes = 'NULL';

    /**
     * @var string|null
     *
     * @ORM\Column(name="behavior", type="string", length=500, nullable=true, options={"default"=NULL})
     */
    private $behavior = 'NULL';

    /**
     * @var string|null
     *
     * @ORM\Column(name="reproductiveCondition", type="string", length=255, nullable=true, options={"default"=NULL,"comment"="Phenology: flowers, fruit, sterile"})
     */
    private $reproductivecondition = 'NULL';

    /**
     * @var int|null
     *
     * @ORM\Column(name="cultivationStatus", type="integer", nullable=true, options={"default"=NULL,"comment"="0 = wild, 1 = cultivated"})
     */
    private $cultivationstatus = 'NULL';

    /**
     * @var string|null
     *
     * @ORM\Column(name="establishmentMeans", type="string", length=150, nullable=true, options={"default"=NULL})
     */
    private $establishmentmeans = 'NULL';

    /**
     * @var string|null
     *
     * @ORM\Column(name="lifeStage", type="string", length=45, nullable=true, options={"default"=NULL})
     */
    private $lifestage = 'NULL';

    /**
     * @var string|null
     *
     * @ORM\Column(name="sex", type="string", length=45, nullable=true, options={"default"=NULL})
     */
    private $sex = 'NULL';

    /**
     * @var string|null
     *
     * @ORM\Column(name="individualCount", type="string", length=45, nullable=true, options={"default"=NULL})
     */
    private $individualcount = 'NULL';

    /**
     * @var string|null
     *
     * @ORM\Column(name="samplingProtocol", type="string", length=100, nullable=true, options={"default"=NULL})
     */
    private $samplingprotocol = 'NULL';

    /**
     * @var string|null
     *
     * @ORM\Column(name="samplingEffort", type="string", length=200, nullable=true, options={"default"=NULL})
     */
    private $samplingeffort = 'NULL';

    /**
     * @var string|null
     *
     * @ORM\Column(name="preparations", type="string", length=100, nullable=true, options={"default"=NULL})
     */
    private $preparations = 'NULL';

    /**
     * @var string|null
     *
     * @ORM\Column(name="locationID", type="string", length=100, nullable=true, options={"default"=NULL})
     */
    private $locationid = 'NULL';

    /**
     * @var string|null
     *
     * @ORM\Column(name="waterBody", type="string", length=255, nullable=true, options={"default"=NULL})
     */
    private $waterbody = 'NULL';

    /**
     * @var string|null
     *
     * @ORM\Column(name="country", type="string", length=64, nullable=true, options={"default"=NULL})
     */
    private $country = 'NULL';

    /**
     * @var string|null
     *
     * @ORM\Column(name="stateProvince", type="string", length=255, nullable=true, options={"default"=NULL})
     */
    private $stateprovince = 'NULL';

    /**
     * @var string|null
     *
     * @ORM\Column(name="county", type="string", length=255, nullable=true, options={"default"=NULL})
     */
    private $county = 'NULL';

    /**
     * @var string|null
     *
     * @ORM\Column(name="municipality", type="string", length=255, nullable=true, options={"default"=NULL})
     */
    private $municipality = 'NULL';

    /**
     * @var string|null
     *
     * @ORM\Column(name="locality", type="text", length=65535, nullable=true, options={"default"=NULL})
     */
    private $locality = 'NULL';

    /**
     * @var int|null
     *
     * @ORM\Column(name="localitySecurity", type="integer", nullable=true, options={"default"=NULL,"comment"="0 = no security; 1 = hidden locality"})
     */
    private $localitysecurity = 'NULL';

    /**
     * @var string|null
     *
     * @ORM\Column(name="localitySecurityReason", type="string", length=100, nullable=true, options={"default"=NULL})
     */
    private $localitysecurityreason = 'NULL';

    /**
     * @var float|null
     *
     * @ORM\Column(name="decimalLatitude", type="float", precision=10, scale=0, nullable=true, options={"default"=NULL})
     */
    private $decimallatitude = 'NULL';

    /**
     * @var float|null
     *
     * @ORM\Column(name="decimalLongitude", type="float", precision=10, scale=0, nullable=true, options={"default"=NULL})
     */
    private $decimallongitude = 'NULL';

    /**
     * @var string|null
     *
     * @ORM\Column(name="geodeticDatum", type="string", length=255, nullable=true, options={"default"=NULL})
     */
    private $geodeticdatum = 'NULL';

    /**
     * @var int|null
     *
     * @ORM\Column(name="coordinateUncertaintyInMeters", type="integer", nullable=true, options={"default"=NULL,"unsigned"=true})
     */
    private $coordinateuncertaintyinmeters = 'NULL';

    /**
     * @var string|null
     *
     * @ORM\Column(name="footprintWKT", type="text", length=65535, nullable=true, options={"default"=NULL})
     */
    private $footprintwkt = 'NULL';

    /**
     * @var string|null
     *
     * @ORM\Column(name="coordinatePrecision", type="decimal", precision=9, scale=7, nullable=true, options={"default"=NULL})
     */
    private $coordinateprecision = 'NULL';

    /**
     * @var string|null
     *
     * @ORM\Column(name="locationRemarks", type="text", length=65535, nullable=true, options={"default"=NULL})
     */
    private $locationremarks = 'NULL';

    /**
     * @var string|null
     *
     * @ORM\Column(name="verbatimCoordinates", type="string", length=255, nullable=true, options={"default"=NULL})
     */
    private $verbatimcoordinates = 'NULL';

    /**
     * @var string|null
     *
     * @ORM\Column(name="verbatimCoordinateSystem", type="string", length=255, nullable=true, options={"default"=NULL})
     */
    private $verbatimcoordinatesystem = 'NULL';

    /**
     * @var string|null
     *
     * @ORM\Column(name="georeferencedBy", type="string", length=255, nullable=true, options={"default"=NULL})
     */
    private $georeferencedby = 'NULL';

    /**
     * @var string|null
     *
     * @ORM\Column(name="georeferenceProtocol", type="string", length=255, nullable=true, options={"default"=NULL})
     */
    private $georeferenceprotocol = 'NULL';

    /**
     * @var string|null
     *
     * @ORM\Column(name="georeferenceSources", type="string", length=255, nullable=true, options={"default"=NULL})
     */
    private $georeferencesources = 'NULL';

    /**
     * @var string|null
     *
     * @ORM\Column(name="georeferenceVerificationStatus", type="string", length=32, nullable=true, options={"default"=NULL})
     */
    private $georeferenceverificationstatus = 'NULL';

    /**
     * @var string|null
     *
     * @ORM\Column(name="georeferenceRemarks", type="string", length=255, nullable=true, options={"default"=NULL})
     */
    private $georeferenceremarks = 'NULL';

    /**
     * @var int|null
     *
     * @ORM\Column(name="minimumElevationInMeters", type="integer", nullable=true, options={"default"=NULL})
     */
    private $minimumelevationinmeters = 'NULL';

    /**
     * @var int|null
     *
     * @ORM\Column(name="maximumElevationInMeters", type="integer", nullable=true, options={"default"=NULL})
     */
    private $maximumelevationinmeters = 'NULL';

    /**
     * @var string|null
     *
     * @ORM\Column(name="verbatimElevation", type="string", length=255, nullable=true, options={"default"=NULL})
     */
    private $verbatimelevation = 'NULL';

    /**
     * @var int|null
     *
     * @ORM\Column(name="minimumDepthInMeters", type="integer", nullable=true, options={"default"=NULL})
     */
    private $minimumdepthinmeters = 'NULL';

    /**
     * @var int|null
     *
     * @ORM\Column(name="maximumDepthInMeters", type="integer", nullable=true, options={"default"=NULL})
     */
    private $maximumdepthinmeters = 'NULL';

    /**
     * @var string|null
     *
     * @ORM\Column(name="verbatimDepth", type="string", length=50, nullable=true, options={"default"=NULL})
     */
    private $verbatimdepth = 'NULL';

    /**
     * @var string|null
     *
     * @ORM\Column(name="previousIdentifications", type="text", length=65535, nullable=true, options={"default"=NULL})
     */
    private $previousidentifications = 'NULL';

    /**
     * @var string|null
     *
     * @ORM\Column(name="disposition", type="string", length=250, nullable=true, options={"default"=NULL})
     */
    private $disposition = 'NULL';

    /**
     * @var string|null
     *
     * @ORM\Column(name="storageLocation", type="string", length=100, nullable=true, options={"default"=NULL})
     */
    private $storagelocation = 'NULL';

    /**
     * @var string|null
     *
     * @ORM\Column(name="genericcolumn1", type="string", length=100, nullable=true, options={"default"=NULL})
     */
    private $genericcolumn1 = 'NULL';

    /**
     * @var string|null
     *
     * @ORM\Column(name="genericcolumn2", type="string", length=100, nullable=true, options={"default"=NULL})
     */
    private $genericcolumn2 = 'NULL';

    /**
     * @var \DateTime|null
     *
     * @ORM\Column(name="modified", type="datetime", nullable=true, options={"default"=NULL,"comment"="DateLastModified"})
     */
    private $modified = 'NULL';

    /**
     * @var string|null
     *
     * @ORM\Column(name="language", type="string", length=20, nullable=true, options={"default"=NULL})
     */
    private $language = 'NULL';

    /**
     * @var string|null
     *
     * @ORM\Column(name="processingstatus", type="string", length=45, nullable=true, options={"default"=NULL})
     */
    private $processingstatus = 'NULL';

    /**
     * @var string|null
     *
     * @ORM\Column(name="recordEnteredBy", type="string", length=250, nullable=true, options={"default"=NULL})
     */
    private $recordenteredby = 'NULL';

    /**
     * @var int|null
     *
     * @ORM\Column(name="duplicateQuantity", type="integer", nullable=true, options={"default"=NULL,"unsigned"=true})
     */
    private $duplicatequantity = 'NULL';

    /**
     * @var string|null
     *
     * @ORM\Column(name="labelProject", type="string", length=250, nullable=true, options={"default"=NULL})
     */
    private $labelproject = 'NULL';

    /**
     * @var string|null
     *
     * @ORM\Column(name="dynamicFields", type="text", length=65535, nullable=true, options={"default"=NULL})
     */
    private $dynamicfields = 'NULL';

    /**
     * @var \DateTime|null
     *
     * @ORM\Column(name="dateEntered", type="datetime", nullable=true, options={"default"=NULL})
     */
    private $dateentered = 'NULL';

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="dateLastModified", type="datetime", nullable=false, options={"default"="CURRENT_TIMESTAMP"})
     */
    private $datelastmodified = 'CURRENT_TIMESTAMP';

    /**
     * @var \Taxa
     *
     * @ORM\ManyToOne(targetEntity="Taxa")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="tidinterpreted", referencedColumnName="TID")
     * })
     */
    private $tidinterpreted;

    /**
     * @var \Users
     *
     * @ORM\ManyToOne(targetEntity="Users")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="observeruid", referencedColumnName="uid")
     * })
     */
    private $observeruid;

    /**
     * @var \Omcollections
     *
     * @ORM\ManyToOne(targetEntity="Omcollections")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="collid", referencedColumnName="CollID")
     * })
     */
    private $collid;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="Omexsiccatinumbers", mappedBy="occid")
     */
    private $omenid;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="Omoccurduplicates", inversedBy="occid")
     * @ORM\JoinTable(name="omoccurduplicatelink",
     *   joinColumns={
     *     @ORM\JoinColumn(name="occid", referencedColumnName="occid")
     *   },
     *   inverseJoinColumns={
     *     @ORM\JoinColumn(name="duplicateid", referencedColumnName="duplicateid")
     *   }
     * )
     */
    private $duplicateid;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="Paleochronostratigraphy", inversedBy="occid")
     * @ORM\JoinTable(name="omoccurlithostratigraphy",
     *   joinColumns={
     *     @ORM\JoinColumn(name="occid", referencedColumnName="occid")
     *   },
     *   inverseJoinColumns={
     *     @ORM\JoinColumn(name="chronoId", referencedColumnName="chronoId")
     *   }
     * )
     */
    private $chronoid;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="Omoccurloans", mappedBy="occid")
     */
    private $loanid;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="Referenceobject", mappedBy="occid")
     */
    private $refid;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->omenid = new \Doctrine\Common\Collections\ArrayCollection();
        $this->duplicateid = new \Doctrine\Common\Collections\ArrayCollection();
        $this->chronoid = new \Doctrine\Common\Collections\ArrayCollection();
        $this->loanid = new \Doctrine\Common\Collections\ArrayCollection();
        $this->refid = new \Doctrine\Common\Collections\ArrayCollection();
    }

    public function getOccid(): ?int
    {
        return $this->occid;
    }

    public function getDbpk(): ?string
    {
        return $this->dbpk;
    }

    public function setDbpk(?string $dbpk): self
    {
        $this->dbpk = $dbpk;

        return $this;
    }

    public function getBasisofrecord(): ?string
    {
        return $this->basisofrecord;
    }

    public function setBasisofrecord(?string $basisofrecord): self
    {
        $this->basisofrecord = $basisofrecord;

        return $this;
    }

    public function getOccurrenceid(): ?string
    {
        return $this->occurrenceid;
    }

    public function setOccurrenceid(?string $occurrenceid): self
    {
        $this->occurrenceid = $occurrenceid;

        return $this;
    }

    public function getCatalognumber(): ?string
    {
        return $this->catalognumber;
    }

    public function setCatalognumber(?string $catalognumber): self
    {
        $this->catalognumber = $catalognumber;

        return $this;
    }

    public function getOthercatalognumbers(): ?string
    {
        return $this->othercatalognumbers;
    }

    public function setOthercatalognumbers(?string $othercatalognumbers): self
    {
        $this->othercatalognumbers = $othercatalognumbers;

        return $this;
    }

    public function getOwnerinstitutioncode(): ?string
    {
        return $this->ownerinstitutioncode;
    }

    public function setOwnerinstitutioncode(?string $ownerinstitutioncode): self
    {
        $this->ownerinstitutioncode = $ownerinstitutioncode;

        return $this;
    }

    public function getInstitutionid(): ?string
    {
        return $this->institutionid;
    }

    public function setInstitutionid(?string $institutionid): self
    {
        $this->institutionid = $institutionid;

        return $this;
    }

    public function getCollectionid(): ?string
    {
        return $this->collectionid;
    }

    public function setCollectionid(?string $collectionid): self
    {
        $this->collectionid = $collectionid;

        return $this;
    }

    public function getDatasetid(): ?string
    {
        return $this->datasetid;
    }

    public function setDatasetid(?string $datasetid): self
    {
        $this->datasetid = $datasetid;

        return $this;
    }

    public function getInstitutioncode(): ?string
    {
        return $this->institutioncode;
    }

    public function setInstitutioncode(?string $institutioncode): self
    {
        $this->institutioncode = $institutioncode;

        return $this;
    }

    public function getCollectioncode(): ?string
    {
        return $this->collectioncode;
    }

    public function setCollectioncode(?string $collectioncode): self
    {
        $this->collectioncode = $collectioncode;

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

    public function getScientificname(): ?string
    {
        return $this->scientificname;
    }

    public function setScientificname(?string $scientificname): self
    {
        $this->scientificname = $scientificname;

        return $this;
    }

    public function getSciname(): ?string
    {
        return $this->sciname;
    }

    public function setSciname(?string $sciname): self
    {
        $this->sciname = $sciname;

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

    public function getSpecificepithet(): ?string
    {
        return $this->specificepithet;
    }

    public function setSpecificepithet(?string $specificepithet): self
    {
        $this->specificepithet = $specificepithet;

        return $this;
    }

    public function getTaxonrank(): ?string
    {
        return $this->taxonrank;
    }

    public function setTaxonrank(?string $taxonrank): self
    {
        $this->taxonrank = $taxonrank;

        return $this;
    }

    public function getInfraspecificepithet(): ?string
    {
        return $this->infraspecificepithet;
    }

    public function setInfraspecificepithet(?string $infraspecificepithet): self
    {
        $this->infraspecificepithet = $infraspecificepithet;

        return $this;
    }

    public function getScientificnameauthorship(): ?string
    {
        return $this->scientificnameauthorship;
    }

    public function setScientificnameauthorship(?string $scientificnameauthorship): self
    {
        $this->scientificnameauthorship = $scientificnameauthorship;

        return $this;
    }

    public function getTaxonremarks(): ?string
    {
        return $this->taxonremarks;
    }

    public function setTaxonremarks(?string $taxonremarks): self
    {
        $this->taxonremarks = $taxonremarks;

        return $this;
    }

    public function getIdentifiedby(): ?string
    {
        return $this->identifiedby;
    }

    public function setIdentifiedby(?string $identifiedby): self
    {
        $this->identifiedby = $identifiedby;

        return $this;
    }

    public function getDateidentified(): ?string
    {
        return $this->dateidentified;
    }

    public function setDateidentified(?string $dateidentified): self
    {
        $this->dateidentified = $dateidentified;

        return $this;
    }

    public function getIdentificationreferences(): ?string
    {
        return $this->identificationreferences;
    }

    public function setIdentificationreferences(?string $identificationreferences): self
    {
        $this->identificationreferences = $identificationreferences;

        return $this;
    }

    public function getIdentificationremarks(): ?string
    {
        return $this->identificationremarks;
    }

    public function setIdentificationremarks(?string $identificationremarks): self
    {
        $this->identificationremarks = $identificationremarks;

        return $this;
    }

    public function getIdentificationqualifier(): ?string
    {
        return $this->identificationqualifier;
    }

    public function setIdentificationqualifier(?string $identificationqualifier): self
    {
        $this->identificationqualifier = $identificationqualifier;

        return $this;
    }

    public function getTypestatus(): ?string
    {
        return $this->typestatus;
    }

    public function setTypestatus(?string $typestatus): self
    {
        $this->typestatus = $typestatus;

        return $this;
    }

    public function getRecordedby(): ?string
    {
        return $this->recordedby;
    }

    public function setRecordedby(?string $recordedby): self
    {
        $this->recordedby = $recordedby;

        return $this;
    }

    public function getRecordnumber(): ?string
    {
        return $this->recordnumber;
    }

    public function setRecordnumber(?string $recordnumber): self
    {
        $this->recordnumber = $recordnumber;

        return $this;
    }

    public function getAssociatedcollectors(): ?string
    {
        return $this->associatedcollectors;
    }

    public function setAssociatedcollectors(?string $associatedcollectors): self
    {
        $this->associatedcollectors = $associatedcollectors;

        return $this;
    }

    public function getEventdate(): ?\DateTimeInterface
    {
        return $this->eventdate;
    }

    public function setEventdate(?\DateTimeInterface $eventdate): self
    {
        $this->eventdate = $eventdate;

        return $this;
    }

    public function getLatestdatecollected(): ?\DateTimeInterface
    {
        return $this->latestdatecollected;
    }

    public function setLatestdatecollected(?\DateTimeInterface $latestdatecollected): self
    {
        $this->latestdatecollected = $latestdatecollected;

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

    public function getStartdayofyear(): ?int
    {
        return $this->startdayofyear;
    }

    public function setStartdayofyear(?int $startdayofyear): self
    {
        $this->startdayofyear = $startdayofyear;

        return $this;
    }

    public function getEnddayofyear(): ?int
    {
        return $this->enddayofyear;
    }

    public function setEnddayofyear(?int $enddayofyear): self
    {
        $this->enddayofyear = $enddayofyear;

        return $this;
    }

    public function getVerbatimeventdate(): ?string
    {
        return $this->verbatimeventdate;
    }

    public function setVerbatimeventdate(?string $verbatimeventdate): self
    {
        $this->verbatimeventdate = $verbatimeventdate;

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

    public function getFieldnotes(): ?string
    {
        return $this->fieldnotes;
    }

    public function setFieldnotes(?string $fieldnotes): self
    {
        $this->fieldnotes = $fieldnotes;

        return $this;
    }

    public function getFieldnumber(): ?string
    {
        return $this->fieldnumber;
    }

    public function setFieldnumber(?string $fieldnumber): self
    {
        $this->fieldnumber = $fieldnumber;

        return $this;
    }

    public function getEventid(): ?string
    {
        return $this->eventid;
    }

    public function setEventid(?string $eventid): self
    {
        $this->eventid = $eventid;

        return $this;
    }

    public function getOccurrenceremarks(): ?string
    {
        return $this->occurrenceremarks;
    }

    public function setOccurrenceremarks(?string $occurrenceremarks): self
    {
        $this->occurrenceremarks = $occurrenceremarks;

        return $this;
    }

    public function getInformationwithheld(): ?string
    {
        return $this->informationwithheld;
    }

    public function setInformationwithheld(?string $informationwithheld): self
    {
        $this->informationwithheld = $informationwithheld;

        return $this;
    }

    public function getDatageneralizations(): ?string
    {
        return $this->datageneralizations;
    }

    public function setDatageneralizations(?string $datageneralizations): self
    {
        $this->datageneralizations = $datageneralizations;

        return $this;
    }

    public function getAssociatedoccurrences(): ?string
    {
        return $this->associatedoccurrences;
    }

    public function setAssociatedoccurrences(?string $associatedoccurrences): self
    {
        $this->associatedoccurrences = $associatedoccurrences;

        return $this;
    }

    public function getAssociatedtaxa(): ?string
    {
        return $this->associatedtaxa;
    }

    public function setAssociatedtaxa(?string $associatedtaxa): self
    {
        $this->associatedtaxa = $associatedtaxa;

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

    public function getVerbatimattributes(): ?string
    {
        return $this->verbatimattributes;
    }

    public function setVerbatimattributes(?string $verbatimattributes): self
    {
        $this->verbatimattributes = $verbatimattributes;

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

    public function getReproductivecondition(): ?string
    {
        return $this->reproductivecondition;
    }

    public function setReproductivecondition(?string $reproductivecondition): self
    {
        $this->reproductivecondition = $reproductivecondition;

        return $this;
    }

    public function getCultivationstatus(): ?int
    {
        return $this->cultivationstatus;
    }

    public function setCultivationstatus(?int $cultivationstatus): self
    {
        $this->cultivationstatus = $cultivationstatus;

        return $this;
    }

    public function getEstablishmentmeans(): ?string
    {
        return $this->establishmentmeans;
    }

    public function setEstablishmentmeans(?string $establishmentmeans): self
    {
        $this->establishmentmeans = $establishmentmeans;

        return $this;
    }

    public function getLifestage(): ?string
    {
        return $this->lifestage;
    }

    public function setLifestage(?string $lifestage): self
    {
        $this->lifestage = $lifestage;

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

    public function getIndividualcount(): ?string
    {
        return $this->individualcount;
    }

    public function setIndividualcount(?string $individualcount): self
    {
        $this->individualcount = $individualcount;

        return $this;
    }

    public function getSamplingprotocol(): ?string
    {
        return $this->samplingprotocol;
    }

    public function setSamplingprotocol(?string $samplingprotocol): self
    {
        $this->samplingprotocol = $samplingprotocol;

        return $this;
    }

    public function getSamplingeffort(): ?string
    {
        return $this->samplingeffort;
    }

    public function setSamplingeffort(?string $samplingeffort): self
    {
        $this->samplingeffort = $samplingeffort;

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

    public function getLocationid(): ?string
    {
        return $this->locationid;
    }

    public function setLocationid(?string $locationid): self
    {
        $this->locationid = $locationid;

        return $this;
    }

    public function getWaterbody(): ?string
    {
        return $this->waterbody;
    }

    public function setWaterbody(?string $waterbody): self
    {
        $this->waterbody = $waterbody;

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

    public function getStateprovince(): ?string
    {
        return $this->stateprovince;
    }

    public function setStateprovince(?string $stateprovince): self
    {
        $this->stateprovince = $stateprovince;

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

    public function getLocalitysecurity(): ?int
    {
        return $this->localitysecurity;
    }

    public function setLocalitysecurity(?int $localitysecurity): self
    {
        $this->localitysecurity = $localitysecurity;

        return $this;
    }

    public function getLocalitysecurityreason(): ?string
    {
        return $this->localitysecurityreason;
    }

    public function setLocalitysecurityreason(?string $localitysecurityreason): self
    {
        $this->localitysecurityreason = $localitysecurityreason;

        return $this;
    }

    public function getDecimallatitude(): ?float
    {
        return $this->decimallatitude;
    }

    public function setDecimallatitude(?float $decimallatitude): self
    {
        $this->decimallatitude = $decimallatitude;

        return $this;
    }

    public function getDecimallongitude(): ?float
    {
        return $this->decimallongitude;
    }

    public function setDecimallongitude(?float $decimallongitude): self
    {
        $this->decimallongitude = $decimallongitude;

        return $this;
    }

    public function getGeodeticdatum(): ?string
    {
        return $this->geodeticdatum;
    }

    public function setGeodeticdatum(?string $geodeticdatum): self
    {
        $this->geodeticdatum = $geodeticdatum;

        return $this;
    }

    public function getCoordinateuncertaintyinmeters(): ?int
    {
        return $this->coordinateuncertaintyinmeters;
    }

    public function setCoordinateuncertaintyinmeters(?int $coordinateuncertaintyinmeters): self
    {
        $this->coordinateuncertaintyinmeters = $coordinateuncertaintyinmeters;

        return $this;
    }

    public function getFootprintwkt(): ?string
    {
        return $this->footprintwkt;
    }

    public function setFootprintwkt(?string $footprintwkt): self
    {
        $this->footprintwkt = $footprintwkt;

        return $this;
    }

    public function getCoordinateprecision()
    {
        return $this->coordinateprecision;
    }

    public function setCoordinateprecision($coordinateprecision): self
    {
        $this->coordinateprecision = $coordinateprecision;

        return $this;
    }

    public function getLocationremarks(): ?string
    {
        return $this->locationremarks;
    }

    public function setLocationremarks(?string $locationremarks): self
    {
        $this->locationremarks = $locationremarks;

        return $this;
    }

    public function getVerbatimcoordinates(): ?string
    {
        return $this->verbatimcoordinates;
    }

    public function setVerbatimcoordinates(?string $verbatimcoordinates): self
    {
        $this->verbatimcoordinates = $verbatimcoordinates;

        return $this;
    }

    public function getVerbatimcoordinatesystem(): ?string
    {
        return $this->verbatimcoordinatesystem;
    }

    public function setVerbatimcoordinatesystem(?string $verbatimcoordinatesystem): self
    {
        $this->verbatimcoordinatesystem = $verbatimcoordinatesystem;

        return $this;
    }

    public function getGeoreferencedby(): ?string
    {
        return $this->georeferencedby;
    }

    public function setGeoreferencedby(?string $georeferencedby): self
    {
        $this->georeferencedby = $georeferencedby;

        return $this;
    }

    public function getGeoreferenceprotocol(): ?string
    {
        return $this->georeferenceprotocol;
    }

    public function setGeoreferenceprotocol(?string $georeferenceprotocol): self
    {
        $this->georeferenceprotocol = $georeferenceprotocol;

        return $this;
    }

    public function getGeoreferencesources(): ?string
    {
        return $this->georeferencesources;
    }

    public function setGeoreferencesources(?string $georeferencesources): self
    {
        $this->georeferencesources = $georeferencesources;

        return $this;
    }

    public function getGeoreferenceverificationstatus(): ?string
    {
        return $this->georeferenceverificationstatus;
    }

    public function setGeoreferenceverificationstatus(?string $georeferenceverificationstatus): self
    {
        $this->georeferenceverificationstatus = $georeferenceverificationstatus;

        return $this;
    }

    public function getGeoreferenceremarks(): ?string
    {
        return $this->georeferenceremarks;
    }

    public function setGeoreferenceremarks(?string $georeferenceremarks): self
    {
        $this->georeferenceremarks = $georeferenceremarks;

        return $this;
    }

    public function getMinimumelevationinmeters(): ?int
    {
        return $this->minimumelevationinmeters;
    }

    public function setMinimumelevationinmeters(?int $minimumelevationinmeters): self
    {
        $this->minimumelevationinmeters = $minimumelevationinmeters;

        return $this;
    }

    public function getMaximumelevationinmeters(): ?int
    {
        return $this->maximumelevationinmeters;
    }

    public function setMaximumelevationinmeters(?int $maximumelevationinmeters): self
    {
        $this->maximumelevationinmeters = $maximumelevationinmeters;

        return $this;
    }

    public function getVerbatimelevation(): ?string
    {
        return $this->verbatimelevation;
    }

    public function setVerbatimelevation(?string $verbatimelevation): self
    {
        $this->verbatimelevation = $verbatimelevation;

        return $this;
    }

    public function getMinimumdepthinmeters(): ?int
    {
        return $this->minimumdepthinmeters;
    }

    public function setMinimumdepthinmeters(?int $minimumdepthinmeters): self
    {
        $this->minimumdepthinmeters = $minimumdepthinmeters;

        return $this;
    }

    public function getMaximumdepthinmeters(): ?int
    {
        return $this->maximumdepthinmeters;
    }

    public function setMaximumdepthinmeters(?int $maximumdepthinmeters): self
    {
        $this->maximumdepthinmeters = $maximumdepthinmeters;

        return $this;
    }

    public function getVerbatimdepth(): ?string
    {
        return $this->verbatimdepth;
    }

    public function setVerbatimdepth(?string $verbatimdepth): self
    {
        $this->verbatimdepth = $verbatimdepth;

        return $this;
    }

    public function getPreviousidentifications(): ?string
    {
        return $this->previousidentifications;
    }

    public function setPreviousidentifications(?string $previousidentifications): self
    {
        $this->previousidentifications = $previousidentifications;

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

    public function getStoragelocation(): ?string
    {
        return $this->storagelocation;
    }

    public function setStoragelocation(?string $storagelocation): self
    {
        $this->storagelocation = $storagelocation;

        return $this;
    }

    public function getGenericcolumn1(): ?string
    {
        return $this->genericcolumn1;
    }

    public function setGenericcolumn1(?string $genericcolumn1): self
    {
        $this->genericcolumn1 = $genericcolumn1;

        return $this;
    }

    public function getGenericcolumn2(): ?string
    {
        return $this->genericcolumn2;
    }

    public function setGenericcolumn2(?string $genericcolumn2): self
    {
        $this->genericcolumn2 = $genericcolumn2;

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

    public function getProcessingstatus(): ?string
    {
        return $this->processingstatus;
    }

    public function setProcessingstatus(?string $processingstatus): self
    {
        $this->processingstatus = $processingstatus;

        return $this;
    }

    public function getRecordenteredby(): ?string
    {
        return $this->recordenteredby;
    }

    public function setRecordenteredby(?string $recordenteredby): self
    {
        $this->recordenteredby = $recordenteredby;

        return $this;
    }

    public function getDuplicatequantity(): ?int
    {
        return $this->duplicatequantity;
    }

    public function setDuplicatequantity(?int $duplicatequantity): self
    {
        $this->duplicatequantity = $duplicatequantity;

        return $this;
    }

    public function getLabelproject(): ?string
    {
        return $this->labelproject;
    }

    public function setLabelproject(?string $labelproject): self
    {
        $this->labelproject = $labelproject;

        return $this;
    }

    public function getDynamicfields(): ?string
    {
        return $this->dynamicfields;
    }

    public function setDynamicfields(?string $dynamicfields): self
    {
        $this->dynamicfields = $dynamicfields;

        return $this;
    }

    public function getDateentered(): ?\DateTimeInterface
    {
        return $this->dateentered;
    }

    public function setDateentered(?\DateTimeInterface $dateentered): self
    {
        $this->dateentered = $dateentered;

        return $this;
    }

    public function getDatelastmodified(): ?\DateTimeInterface
    {
        return $this->datelastmodified;
    }

    public function setDatelastmodified(\DateTimeInterface $datelastmodified): self
    {
        $this->datelastmodified = $datelastmodified;

        return $this;
    }

    public function getTidinterpreted(): ?Taxa
    {
        return $this->tidinterpreted;
    }

    public function setTidinterpreted(?Taxa $tidinterpreted): self
    {
        $this->tidinterpreted = $tidinterpreted;

        return $this;
    }

    public function getObserveruid(): ?Users
    {
        return $this->observeruid;
    }

    public function setObserveruid(?Users $observeruid): self
    {
        $this->observeruid = $observeruid;

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

    /**
     * @return Collection|Omexsiccatinumbers[]
     */
    public function getOmenid(): Collection
    {
        return $this->omenid;
    }

    public function addOmenid(Omexsiccatinumbers $omenid): self
    {
        if (!$this->omenid->contains($omenid)) {
            $this->omenid[] = $omenid;
            $omenid->addOccid($this);
        }

        return $this;
    }

    public function removeOmenid(Omexsiccatinumbers $omenid): self
    {
        if ($this->omenid->contains($omenid)) {
            $this->omenid->removeElement($omenid);
            $omenid->removeOccid($this);
        }

        return $this;
    }

    /**
     * @return Collection|Omoccurduplicates[]
     */
    public function getDuplicateid(): Collection
    {
        return $this->duplicateid;
    }

    public function addDuplicateid(Omoccurduplicates $duplicateid): self
    {
        if (!$this->duplicateid->contains($duplicateid)) {
            $this->duplicateid[] = $duplicateid;
        }

        return $this;
    }

    public function removeDuplicateid(Omoccurduplicates $duplicateid): self
    {
        if ($this->duplicateid->contains($duplicateid)) {
            $this->duplicateid->removeElement($duplicateid);
        }

        return $this;
    }

    /**
     * @return Collection|Paleochronostratigraphy[]
     */
    public function getChronoid(): Collection
    {
        return $this->chronoid;
    }

    public function addChronoid(Paleochronostratigraphy $chronoid): self
    {
        if (!$this->chronoid->contains($chronoid)) {
            $this->chronoid[] = $chronoid;
        }

        return $this;
    }

    public function removeChronoid(Paleochronostratigraphy $chronoid): self
    {
        if ($this->chronoid->contains($chronoid)) {
            $this->chronoid->removeElement($chronoid);
        }

        return $this;
    }

    /**
     * @return Collection|Omoccurloans[]
     */
    public function getLoanid(): Collection
    {
        return $this->loanid;
    }

    public function addLoanid(Omoccurloans $loanid): self
    {
        if (!$this->loanid->contains($loanid)) {
            $this->loanid[] = $loanid;
            $loanid->addOccid($this);
        }

        return $this;
    }

    public function removeLoanid(Omoccurloans $loanid): self
    {
        if ($this->loanid->contains($loanid)) {
            $this->loanid->removeElement($loanid);
            $loanid->removeOccid($this);
        }

        return $this;
    }

    /**
     * @return Collection|Referenceobject[]
     */
    public function getRefid(): Collection
    {
        return $this->refid;
    }

    public function addRefid(Referenceobject $refid): self
    {
        if (!$this->refid->contains($refid)) {
            $this->refid[] = $refid;
            $refid->addOccid($this);
        }

        return $this;
    }

    public function removeRefid(Referenceobject $refid): self
    {
        if ($this->refid->contains($refid)) {
            $this->refid->removeElement($refid);
            $refid->removeOccid($this);
        }

        return $this;
    }

}
