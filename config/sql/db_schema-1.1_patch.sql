ALTER TABLE `agents`
  CHANGE COLUMN `type` `type` varchar(255) DEFAULT NULL,
  CHANGE COLUMN `living` `living` varchar(255) NOT NULL;

ALTER TABLE `kmchartaxalink`
  CHANGE COLUMN `EditabilityInherited` `EditabilityInherited` int(1) DEFAULT NULL;

ALTER TABLE `kmcslang`
  DROP FOREIGN KEY `FK_cslang_lang`;

ALTER TABLE `fmchklstchildren`
  DROP FOREIGN KEY `FK_fmchklstchild_child`;

ALTER TABLE `uploaddetermtemp`
  ADD COLUMN `updetid` int(20) NOT NULL AUTO_INCREMENT FIRST,
  ADD PRIMARY KEY (`updetid`);

ALTER TABLE `uploadglossary`
  ADD COLUMN `upgid` int(20) NOT NULL AUTO_INCREMENT FIRST,
  ADD PRIMARY KEY (`upgid`);

ALTER TABLE `uploadimagetemp`
  ADD COLUMN `upimgid` int(20) NOT NULL AUTO_INCREMENT FIRST,
  ADD PRIMARY KEY (`upimgid`);

ALTER TABLE `uploadspectemp`
  ADD COLUMN `upspecid` int(20) NOT NULL AUTO_INCREMENT FIRST,
  ADD PRIMARY KEY (`upspecid`);

ALTER TABLE `uploadtaxa`
  ADD COLUMN `uptid` int(20) NOT NULL AUTO_INCREMENT FIRST,
  ADD PRIMARY KEY (`uptid`);

ALTER TABLE `fmchklsttaxalink`
  DROP FOREIGN KEY `FK_chklsttaxalink_cid`,
  DROP FOREIGN KEY `FK_chklsttaxalink_tid`;

ALTER TABLE `fmchklsttaxastatus`
  DROP FOREIGN KEY `FK_fmchklsttaxastatus_clidtid`;

ALTER TABLE `fmcltaxacomments`
  DROP FOREIGN KEY `FK_clcomment_cltaxa`;

ALTER TABLE `fmvouchers`
  DROP FOREIGN KEY `FK_vouchers_cl`;

ALTER TABLE `fmchklstcoordinates`
  DROP FOREIGN KEY `FKchklsttaxalink`;

ALTER TABLE `referencechklsttaxalink`
  DROP FOREIGN KEY `FK_refchktaxalink_clidtid`;

ALTER TABLE `fmchklsttaxalink`
  DROP PRIMARY KEY;

ALTER TABLE `fmchklsttaxalink`
  ADD COLUMN `cltlid` int(10) NOT NULL AUTO_INCREMENT FIRST,
  ADD PRIMARY KEY (`cltlid`);

ALTER TABLE `fmchklsttaxalink`
  ADD UNIQUE `FK_clidtidmorph_id` (`TID`, `CLID`, `morphospecies`) comment '';

ALTER TABLE `kmchardependance`
  DROP FOREIGN KEY `FK_chardependance_cs`;

ALTER TABLE `kmcsimages`
  DROP FOREIGN KEY `FK_kscsimages_kscs`;

ALTER TABLE `kmcslang`
  CHANGE COLUMN `intialtimestamp` `initialtimestamp` timestamp(0) NOT NULL DEFAULT current_timestamp AFTER `notes`,
  DROP FOREIGN KEY `FK_cslang_1`;

ALTER TABLE `kmdescr`
  CHANGE COLUMN `DateEntered` `InitialTimeStamp` timestamp(0) NOT NULL DEFAULT current_timestamp AFTER `Notes`,
  DROP FOREIGN KEY `FK_descr_cs`;

ALTER TABLE `kmcs`
  DROP PRIMARY KEY;

ALTER TABLE `omoccureditlocks`
  CHANGE COLUMN `uid` `createduid` int(11) NOT NULL AFTER `occid`;

ALTER TABLE `kmcs`
  ADD COLUMN `kmcsid` int(10) NOT NULL AUTO_INCREMENT FIRST,
  ADD PRIMARY KEY (`kmcsid`);

ALTER TABLE `kmcs`
  ADD UNIQUE `FK_cidclid_id` (`cid`, `cs`) comment '';

ALTER TABLE `omoccurdatasetlink`
  DROP PRIMARY KEY;

ALTER TABLE `omoccurdatasetlink`
  ADD COLUMN `ocdatlid` int(10) NOT NULL AUTO_INCREMENT FIRST,
  ADD PRIMARY KEY (`ocdatlid`);

ALTER TABLE `tmtraitdependencies`
  DROP FOREIGN KEY `FK_tmdepend_traitid`;

ALTER TABLE `taxavernaculars`
  DROP INDEX `unique-key`,
  ADD UNIQUE `unique_key` (`Language`, `VernacularName`, `TID`) comment '';

ALTER TABLE `omoccurrencesfulltext`
  DROP INDEX `ft_occur_locality`,
  ADD FULLTEXT `ft_occur_locality` (`locality`(100)) comment '';

ALTER TABLE `omoccurrences`
  CHANGE COLUMN `dateEntered` `InitialTimeStamp` datetime(0) NULL DEFAULT NULL AFTER `dynamicFields`,
  CHANGE COLUMN `dateLastModified` `modifiedTimeStamp` timestamp(0) NOT NULL DEFAULT current_timestamp ON UPDATE CURRENT_TIMESTAMP AFTER `InitialTimeStamp`,
  DROP FOREIGN KEY `FK_omoccurrences_recbyid`;

UPDATE `omoccurrences`
  SET modifiedTimeStamp = modified
  WHERE (modified IS NOT NULL AND ISNULL(modifiedTimeStamp))
	OR (modified > modifiedTimeStamp AND modified IS NOT NULL AND modifiedTimeStamp IS NOT NULL);

ALTER TABLE `omoccurrences`
  DROP COLUMN `modified`;

ALTER TABLE `omoccurrences`
  DROP INDEX `FK_recordedbyid`;

ALTER TABLE `specprocessorrawlabelsfulltext`
  DROP INDEX `Index_ocr_fulltext`,
  ADD FULLTEXT `Index_ocr_fulltext` (`rawstr`(100)) comment '';

ALTER TABLE `users`
  ADD COLUMN `username` varchar(45) NOT NULL AFTER `lastname`,
  ADD COLUMN `password` varchar(255) NOT NULL AFTER `username`,
  ADD COLUMN `lastlogindate` datetime AFTER `usergroups`;

UPDATE users AS u LEFT JOIN userlogin AS ul ON u.uid = ul.uid
SET u.username = ul.username,
  u.`password` = ul.`password`,
  u.lastlogindate = ul.lastlogindate;

ALTER TABLE `omcollpuboccurlink`
  DROP FOREIGN KEY `FK_ompuboccid`,
  DROP INDEX `FK_ompuboccid_idx`;

ALTER TABLE `kmcharacters`
  DROP FOREIGN KEY `FK_charheading`,
  DROP INDEX `FK_charheading_idx`;

ALTER TABLE `taxaprofilepubdesclink`
  DROP FOREIGN KEY `FK_tppubdesclink_id`,
  DROP INDEX `FK_tppubdesclink_id_idx`;

ALTER TABLE `tmtraittaxalink`
  DROP FOREIGN KEY `FK_traittaxalink_tid`,
  DROP INDEX `FK_traittaxalink_tid_idx`;

ALTER TABLE `tmtraittaxalink`
  DROP FOREIGN KEY `FK_traittaxalink_traitid`,
  DROP INDEX `FK_traittaxalink_traitid_idx`;

ALTER TABLE `taxstatus`
  DROP FOREIGN KEY `FK_taxstatus_parent`,
  DROP FOREIGN KEY `FK_taxstatus_taid`,
  DROP FOREIGN KEY `FK_taxstatus_tid`,
  DROP FOREIGN KEY `FK_taxstatus_tidacc`,
  DROP INDEX `FK_taxstatus_tidacc`,
  DROP INDEX `FK_taxstatus_taid`,
  DROP INDEX `Index_parenttid`,
  DROP INDEX `Index_hierarchy`;

ALTER TABLE `taxstatus` DROP PRIMARY KEY;

ALTER TABLE `taxstatus`
  ADD COLUMN `tsid` int(10) UNSIGNED NOT NULL AUTO_INCREMENT FIRST,
  ADD PRIMARY KEY (`tsid`);

ALTER TABLE `omoccurloanslink`
  DROP FOREIGN KEY `FK_occurloanlink_loanid`,
  DROP FOREIGN KEY `FK_occurloanlink_occid`,
  DROP INDEX `FK_occurloanlink_occid`,
  DROP INDEX `FK_occurloanlink_loanid`;

ALTER TABLE `omcollectioncontacts`
  DROP FOREIGN KEY `FK_contact_uid`,
  DROP INDEX `FK_contact_uid_idx`;

ALTER TABLE `taxaprofilepubmaplink`
  DROP FOREIGN KEY `FK_tppubmaplink_id`,
  DROP INDEX `FK_tppubmaplink_id_idx`;

ALTER TABLE `taxaprofilepubimagelink`
  DROP FOREIGN KEY `FK_tppubimagelink_id`,
  DROP INDEX `FK_tppubimagelink_id_idx`;

ALTER TABLE `kmchartaxalink`
  DROP FOREIGN KEY `FK_chartaxalink_tid`,
  DROP INDEX `FK_CharTaxaLink-TID`;

ALTER TABLE `omoccurduplicatelink`
  DROP FOREIGN KEY `FK_omoccurdupelink_dupeid`,
  DROP FOREIGN KEY `FK_omoccurdupelink_occid`,
  DROP INDEX `FK_omoccurdupelink_occid_idx`,
  DROP INDEX `FK_omoccurdupelink_dupeid_idx`;

ALTER TABLE `omoccurlithostratigraphy`
  DROP FOREIGN KEY `FK_occurlitho_chronoid`,
  DROP FOREIGN KEY `FK_occurlitho_occid`,
  DROP INDEX `FK_occurlitho_chronoid`,
  DROP INDEX `FK_occurlitho_occid`;

ALTER TABLE `referenceauthorlink`
  DROP FOREIGN KEY `FK_refauthlink_refauthid`,
  DROP FOREIGN KEY `FK_refauthlink_refid`,
  DROP INDEX `FK_refauthlink_refid_idx`,
  DROP INDEX `FK_refauthlink_refauthid_idx`;

ALTER TABLE `referencechecklistlink`
  DROP FOREIGN KEY `FK_refchecklistlink_clid`,
  DROP FOREIGN KEY `FK_refchecklistlink_refid`,
  DROP INDEX `FK_refcheckllistlink_refid_idx`,
  DROP INDEX `FK_refcheckllistlink_clid_idx`;

ALTER TABLE `referencecollectionlink`
  DROP FOREIGN KEY `FK_refcollectionlink_collid`,
  DROP INDEX `FK_refcollectionlink_collid_idx`;

ALTER TABLE `referenceoccurlink`
  DROP FOREIGN KEY `FK_refoccurlink_occid`,
  DROP FOREIGN KEY `FK_refoccurlink_refid`,
  DROP INDEX `FK_refoccurlink_refid_idx`,
  DROP INDEX `FK_refoccurlink_occid_idx`;

ALTER TABLE `referencetaxalink`
  DROP FOREIGN KEY `FK_reftaxalink_refid`,
  DROP FOREIGN KEY `FK_reftaxalink_tid`,
  DROP INDEX `FK_reftaxalink_refid_idx`,
  DROP INDEX `FK_reftaxalink_tid_idx`;

ALTER TABLE `fmdyncltaxalink`
  DROP FOREIGN KEY `FK_dyncltaxalink_taxa`,
  DROP INDEX `FK_dyncltaxalink_taxa`;

ALTER TABLE `fmchklstprojlink`
  DROP FOREIGN KEY `FK_chklstprojlink_clid`,
  DROP INDEX `FK_chklst`;

ALTER TABLE `taxadescrblock`
  CHANGE COLUMN `uid` `createduid` int(10) UNSIGNED NOT NULL AFTER `displaylevel`,
  DROP FOREIGN KEY `FK_taxadesc_lang`,
  DROP INDEX `FK_taxadesc_lang_idx`;

ALTER TABLE `taxanestedtree`
  DROP FOREIGN KEY `FK_tnt_taxa`,
  DROP FOREIGN KEY `FK_tnt_taxauth`,
  DROP INDEX `FK_tnt_taxa`,
  DROP INDEX `FK_tnt_taxauth`;

ALTER TABLE `taxadescrstmts`
  DROP FOREIGN KEY `FK_taxadescrstmts_tblock`,
  DROP INDEX `FK_taxadescrstmts_tblock`;

ALTER TABLE `taxaenumtree`
  DROP FOREIGN KEY `FK_tet_taxa`,
  DROP FOREIGN KEY `FK_tet_taxa2`,
  DROP FOREIGN KEY `FK_tet_taxauth`,
  DROP INDEX `FK_tet_taxa`,
  DROP INDEX `FK_tet_taxauth`,
  DROP INDEX `FK_tet_taxa2`;

ALTER TABLE `taxamaps`
  DROP FOREIGN KEY `FK_taxamaps_taxa`,
  DROP INDEX `FK_tid_idx`;

ALTER TABLE `taxaprofilepubs`
  DROP FOREIGN KEY `FK_taxaprofilepubs_uid`,
  DROP INDEX `FK_taxaprofilepubs_uid_idx`;

ALTER TABLE `taxaresourcelinks`
  DROP FOREIGN KEY `FK_taxaresource_tid`,
  DROP INDEX `FK_taxaresource_tid_idx`;

ALTER TABLE `taxavernaculars`
  DROP FOREIGN KEY `FK_vern_lang`,
  DROP FOREIGN KEY `FK_vernaculars_tid`,
  DROP INDEX `tid1`,
  DROP INDEX `FK_vern_lang_idx`;

ALTER TABLE `glossaryimages`
  CHANGE COLUMN `uid` `createduid` int(10) UNSIGNED NULL DEFAULT NULL AFTER `createdBy`,
  DROP FOREIGN KEY `FK_glossaryimages_glossid`,
  DROP FOREIGN KEY `FK_glossaryimages_uid`,
  DROP INDEX `FK_glossaryimages_gloss`,
  DROP INDEX `FK_glossaryimages_uid_idx`;

ALTER TABLE `glossarytaxalink`
  DROP FOREIGN KEY `FK_glossarytaxa_tid`,
  DROP INDEX `glossarytaxalink_ibfk_1`;

ALTER TABLE `glossarytermlink`
  DROP FOREIGN KEY `FK_glossarytermlink_glossid`,
  DROP INDEX `glossarytermlink_ibfk_1`;

ALTER TABLE `omcollcatlink`
  DROP FOREIGN KEY `FK_collcatlink_coll`,
  DROP INDEX `FK_collcatlink_coll`;

ALTER TABLE `omcollsecondary`
  DROP FOREIGN KEY `FK_omcollsecondary_coll`,
  DROP INDEX `FK_omcollsecondary_coll`;

ALTER TABLE `omcrowdsourcecentral`
  DROP FOREIGN KEY `FK_omcrowdsourcecentral_collid`,
  DROP INDEX `Index_omcrowdsourcecentral_collid`,
  DROP INDEX `FK_omcrowdsourcecentral_collid`;

ALTER TABLE `omcrowdsourcequeue`
  DROP FOREIGN KEY `FK_omcrowdsourcequeue_occid`,
  DROP FOREIGN KEY `FK_omcrowdsourcequeue_uid`,
  DROP INDEX `Index_omcrowdsource_occid`,
  DROP INDEX `FK_omcrowdsourcequeue_occid`,
  DROP INDEX `FK_omcrowdsourcequeue_uid`;

ALTER TABLE `omexsiccatinumbers`
  DROP FOREIGN KEY `FK_exsiccatiTitleNumber`,
  DROP INDEX `FK_exsiccatiTitleNumber`;

ALTER TABLE `omexsiccatiocclink`
  DROP FOREIGN KEY `FKExsiccatiNumOccLink1`,
  DROP FOREIGN KEY `FKExsiccatiNumOccLink2`,
  DROP INDEX `UniqueOmexsiccatiOccLink`,
  DROP INDEX `FKExsiccatiNumOccLink1`,
  DROP INDEX `FKExsiccatiNumOccLink2`;

ALTER TABLE `omoccurassociations`
  CHANGE COLUMN `datelastmodified` `modifiedTimeStamp` datetime(0) NULL DEFAULT NULL AFTER `createduid`,
  DROP FOREIGN KEY `FK_occurassoc_occid`,
  DROP FOREIGN KEY `FK_occurassoc_occidassoc`,
  DROP FOREIGN KEY `FK_occurassoc_tid`,
  DROP FOREIGN KEY `FK_occurassoc_uidcreated`,
  DROP FOREIGN KEY `FK_occurassoc_uidmodified`,
  DROP INDEX `omossococcur_occid_idx`,
  DROP INDEX `omossococcur_occidassoc_idx`,
  DROP INDEX `FK_occurassoc_tid_idx`,
  DROP INDEX `FK_occurassoc_uidmodified_idx`,
  DROP INDEX `FK_occurassoc_uidcreated_idx`;

ALTER TABLE `omoccurcomments`
  CHANGE COLUMN `uid` `createduid` int(10) UNSIGNED NOT NULL AFTER `comment`,
  DROP FOREIGN KEY `fk_omoccurcomments_occid`,
  DROP FOREIGN KEY `fk_omoccurcomments_uid`,
  DROP INDEX `fk_omoccurcomments_occid`,
  DROP INDEX `fk_omoccurcomments_uid`;

ALTER TABLE `omoccurdatasetlink`
  DROP FOREIGN KEY `FK_omoccurdatasetlink_datasetid`,
  DROP FOREIGN KEY `FK_omoccurdatasetlink_occid`,
  DROP INDEX `FK_omoccurdatasetlink_datasetid`,
  DROP INDEX `FK_omoccurdatasetlink_occid`;

ALTER TABLE `omoccurdatasets`
  CHANGE COLUMN `uid` `createduid` int(11) UNSIGNED NULL DEFAULT NULL AFTER `sortsequence`,
  DROP FOREIGN KEY `FK_omcollections_collid`,
  DROP FOREIGN KEY `FK_omoccurdatasets_uid`,
  DROP INDEX `FK_omoccurdatasets_uid_idx`,
  DROP INDEX `FK_omcollections_collid_idx`;

ALTER TABLE `omoccurdeterminations`
  CHANGE COLUMN `tidinterpreted` `tid` int(10) UNSIGNED NULL DEFAULT NULL AFTER `sciname`,
  DROP FOREIGN KEY `FK_omoccurdets_idby`,
  DROP FOREIGN KEY `FK_omoccurdets_tid`,
  DROP INDEX `FK_omoccurdets_tid`,
  DROP INDEX `FK_omoccurdets_idby_idx`;

UPDATE omoccurdeterminations SET tid = NULL;

UPDATE `omoccurdeterminations` AS d LEFT JOIN taxa AS t ON d.sciname = t.SciName AND d.scientificNameAuthorship = t.Author
  SET d.tid = t.TID
  WHERE t.TID IS NOT NULL;

UPDATE omoccurdeterminations AS d LEFT JOIN taxa AS t ON d.sciname = t.SciName
  SET d.tid = t.TID
  WHERE t.TID IS NOT NULL AND ISNULL(d.tid) AND ISNULL(d.scientificNameAuthorship) AND ISNULL(t.Author);

ALTER TABLE `omoccuredits`
  DROP FOREIGN KEY `fk_omoccuredits_occid`,
  DROP FOREIGN KEY `fk_omoccuredits_uid`,
  DROP INDEX `fk_omoccuredits_uid`,
  DROP INDEX `fk_omoccuredits_occid`;

ALTER TABLE `omoccurexchange`
  DROP FOREIGN KEY `FK_occexch_coll`,
  DROP INDEX `FK_occexch_coll`;

ALTER TABLE `omcollectionstats`
  CHANGE COLUMN `datelastmodified` `modifiedTimeStamp` datetime(0) NULL DEFAULT NULL AFTER `uploaddate`;

ALTER TABLE `omoccurgenetic`
  DROP FOREIGN KEY `FK_omoccurgenetic`,
  DROP INDEX `FK_omoccurgenetic`;

ALTER TABLE `omoccuridentifiers`
  DROP FOREIGN KEY `FK_omoccuridentifiers_occid`,
  DROP INDEX `FK_omoccuridentifiers_occid_idx`;

ALTER TABLE `omoccurloans`
  DROP FOREIGN KEY `FK_occurloans_borrcoll`,
  DROP FOREIGN KEY `FK_occurloans_borrinst`,
  DROP FOREIGN KEY `FK_occurloans_owncoll`,
  DROP FOREIGN KEY `FK_occurloans_owninst`,
  DROP INDEX `FK_occurloans_owninst`,
  DROP INDEX `FK_occurloans_borrinst`,
  DROP INDEX `FK_occurloans_owncoll`,
  DROP INDEX `FK_occurloans_borrcoll`;

ALTER TABLE `omoccurrences`
  DROP FOREIGN KEY `FK_omoccurrences_tid`,
  DROP FOREIGN KEY `FK_omoccurrences_uid`,
  DROP INDEX `FK_omoccurrences_tid`,
  DROP INDEX `FK_omoccurrences_uid`,
  CHANGE COLUMN `tidinterpreted` `tid` int(10) UNSIGNED NULL DEFAULT NULL AFTER `sciname`;

UPDATE omoccurrences SET tid = NULL;

UPDATE `omoccurrences` AS o LEFT JOIN taxa AS t ON o.sciname = t.SciName AND o.scientificNameAuthorship = t.Author
  SET o.tid = t.TID
  WHERE t.TID IS NOT NULL;

UPDATE omoccurrences AS o LEFT JOIN taxa AS t ON o.sciname = t.SciName
  SET o.tid = t.TID
  WHERE t.TID IS NOT NULL AND ISNULL(o.tid) AND ISNULL(o.scientificNameAuthorship) AND ISNULL(t.Author);

ALTER TABLE `omoccurrencetypes`
  DROP FOREIGN KEY `FK_occurtype_occid`,
  DROP FOREIGN KEY `FK_occurtype_refid`,
  DROP FOREIGN KEY `FK_occurtype_tid`,
  DROP INDEX `FK_occurtype_occid_idx`,
  DROP INDEX `FK_occurtype_refid_idx`,
  DROP INDEX `FK_occurtype_tid_idx`;

ALTER TABLE `omoccurrevisions`
  CHANGE COLUMN `uid` `createduid` int(10) UNSIGNED NULL DEFAULT NULL AFTER `errorMessage`,
  DROP FOREIGN KEY `fk_omrevisions_occid`,
  DROP FOREIGN KEY `fk_omrevisions_uid`,
  DROP INDEX `fk_omrevisions_occid_idx`,
  DROP INDEX `fk_omrevisions_uid_idx`;

ALTER TABLE `omoccurverification`
  CHANGE COLUMN `uid` `createduid` int(10) UNSIGNED NULL DEFAULT NULL AFTER `source`,
  DROP FOREIGN KEY `FK_omoccurverification_occid`,
  DROP FOREIGN KEY `FK_omoccurverification_uid`,
  DROP INDEX `FK_omoccurverification_occid_idx`,
  DROP INDEX `FK_omoccurverification_uid_idx`;

ALTER TABLE `actionrequest`
  DROP FOREIGN KEY `FK_actionreq_type`,
  DROP FOREIGN KEY `FK_actionreq_uid1`,
  DROP FOREIGN KEY `FK_actionreq_uid2`,
  DROP INDEX `FK_actionreq_uid1_idx`,
  DROP INDEX `FK_actionreq_uid2_idx`,
  DROP INDEX `FK_actionreq_type_idx`;

ALTER TABLE `adminstats`
  DROP FOREIGN KEY `FK_adminstats_collid`,
  DROP FOREIGN KEY `FK_adminstats_uid`,
  DROP INDEX `FK_adminstats_collid_idx`,
  DROP INDEX `FK_adminstats_uid_idx`;

ALTER TABLE `chotomouskey`
  DROP FOREIGN KEY `FK_chotomouskey_taxa`,
  DROP INDEX `FK_chotomouskey_taxa`;

ALTER TABLE `referencetype`
  CHANGE COLUMN `addedByUid` `createduid` int(11) NULL DEFAULT NULL AFTER `Figures`;

ALTER TABLE `configpageattributes`
  DROP FOREIGN KEY `FK_configpageattributes_id`,
  DROP INDEX `FK_configpageattributes_id_idx`;

ALTER TABLE `fmchecklists`
  CHANGE COLUMN `uid` `createduid` int(10) UNSIGNED NULL DEFAULT NULL AFTER `headerUrl`,
  CHANGE COLUMN `DateLastModified` `modifiedTimeStamp` datetime(0) NULL DEFAULT NULL AFTER `expiration`,
  DROP FOREIGN KEY `FK_checklists_uid`,
  DROP INDEX `FK_checklists_uid`;

ALTER TABLE `fmchklstchildren`
  DROP FOREIGN KEY `FK_fmchklstchild_clid`,
  DROP INDEX `FK_fmchklstchild_clid_idx`;

ALTER TABLE `fmcltaxacomments`
  CHANGE COLUMN `uid` `createduid` int(10) UNSIGNED NOT NULL AFTER `comment`,
  DROP FOREIGN KEY `FK_clcomment_users`,
  DROP INDEX `FK_clcomment_users`;

ALTER TABLE `fmprojectcategories`
  DROP FOREIGN KEY `FK_fmprojcat_pid`,
  DROP INDEX `FK_fmprojcat_pid_idx`;

ALTER TABLE `fmprojects`
  DROP FOREIGN KEY `FK_parentpid_proj`,
  DROP INDEX `FK_parentpid_proj`;

ALTER TABLE `geothescontinent`
  DROP FOREIGN KEY `FK_geothescontinent_accepted`,
  DROP INDEX `FK_geothescontinent_accepted_idx`;

ALTER TABLE `geothescountry`
  DROP FOREIGN KEY `FK_geothescountry_accepted`,
  DROP FOREIGN KEY `FK_geothescountry_gtcid`,
  DROP INDEX `FK_geothescountry__idx`,
  DROP INDEX `FK_geothescountry_parent_idx`;

ALTER TABLE `geothescounty`
  DROP FOREIGN KEY `FK_geothescounty_accepted`,
  DROP FOREIGN KEY `FK_geothescounty_state`,
  DROP INDEX `FK_geothescounty_state_idx`,
  DROP INDEX `FK_geothescounty_accepted_idx`;

ALTER TABLE `geothesmunicipality`
  DROP FOREIGN KEY `FK_geothesmunicipality_accepted`,
  DROP FOREIGN KEY `FK_geothesmunicipality_county`,
  DROP INDEX `FK_geothesmunicipality_county_idx`,
  DROP INDEX `FK_geothesmunicipality_accepted_idx`;

ALTER TABLE `geothesstateprovince`
  DROP FOREIGN KEY `FK_geothesstate_accepted`,
  DROP FOREIGN KEY `FK_geothesstate_country`,
  DROP INDEX `FK_geothesstate_country_idx`,
  DROP INDEX `FK_geothesstate_accepted_idx`;

ALTER TABLE `glossary`
  CHANGE COLUMN `uid` `createduid` int(10) UNSIGNED NULL DEFAULT NULL AFTER `resourceurl`,
  DROP FOREIGN KEY `FK_glossary_uid`,
  DROP INDEX `FK_glossary_uid_idx`;

ALTER TABLE `imageannotations`
  DROP FOREIGN KEY `FK_resourceannotations_tid`,
  DROP INDEX `TID`;

ALTER TABLE `imagekeywords`
  CHANGE COLUMN `uidassignedby` `createduid` int(10) UNSIGNED NULL DEFAULT NULL AFTER `keyword`,
  DROP FOREIGN KEY `FK_imagekeyword_uid`,
  DROP FOREIGN KEY `FK_imagekeywords_imgid`,
  DROP INDEX `FK_imagekeywords_imgid_idx`,
  DROP INDEX `FK_imagekeyword_uid_idx`;

ALTER TABLE `imageprojectlink`
  DROP FOREIGN KEY `FK_imageprojlink_imgprojid`,
  DROP INDEX `FK_imageprojlink_imgprojid_idx`;

ALTER TABLE `images`
  DROP FOREIGN KEY `FK_images_occ`,
  DROP FOREIGN KEY `FK_photographeruid`,
  DROP FOREIGN KEY `FK_taxaimagestid`,
  DROP INDEX `Index_tid`,
  DROP INDEX `FK_images_occ`,
  DROP INDEX `FK_photographeruid`;

ALTER TABLE `imagetag`
  DROP FOREIGN KEY `FK_imagetag_imgid`,
  DROP FOREIGN KEY `FK_imagetag_tagkey`,
  DROP INDEX `keyvalue`,
  DROP INDEX `FK_imagetag_imgid_idx`;

ALTER TABLE `institutions`
  CHANGE COLUMN `IntialTimeStamp` `InitialTimeStamp` timestamp(0) NOT NULL DEFAULT current_timestamp AFTER `modifiedTimeStamp`,
  DROP FOREIGN KEY `FK_inst_uid`,
  DROP INDEX `FK_inst_uid_idx`;

ALTER TABLE `kmcharacterlang`
  DROP FOREIGN KEY `FK_charlang_lang`,
  DROP INDEX `FK_charlang_lang_idx`;

ALTER TABLE `kmchardependance`
  DROP FOREIGN KEY `FK_chardependance_cid`,
  DROP INDEX `FK_chardependance_cid_idx`;

ALTER TABLE `kmcharheading`
  DROP FOREIGN KEY `FK_kmcharheading_lang`,
  DROP INDEX `FK_kmcharheading_lang_idx`;

ALTER TABLE `kmcs`
  DROP FOREIGN KEY `FK_cs_chars`,
  DROP INDEX `FK_cs_chars`;

ALTER TABLE `lkupcounty`
  DROP FOREIGN KEY `fk_stateprovince`,
  DROP INDEX `fk_stateprovince`;

ALTER TABLE `lkupmunicipality`
  DROP FOREIGN KEY `lkupmunicipality_ibfk_1`,
  DROP INDEX `fk_stateprovince`;

ALTER TABLE `lkupstateprovince`
  DROP FOREIGN KEY `fk_country`,
  DROP INDEX `fk_country`;

ALTER TABLE `media`
  DROP FOREIGN KEY `FK_media_occid`,
  DROP FOREIGN KEY `FK_media_taxa`,
  DROP FOREIGN KEY `FK_media_uid`,
  DROP INDEX `FK_media_taxa_idx`,
  DROP INDEX `FK_media_occid_idx`,
  DROP INDEX `FK_media_uid_idx`;

ALTER TABLE `referenceobject`
  CHANGE COLUMN `numbervolumnes` `numbervolumes` varchar(45) NULL DEFAULT NULL AFTER `volume`,
  DROP FOREIGN KEY `FK_refobj_parentrefid`,
  DROP FOREIGN KEY `FK_refobj_reftypeid`,
  DROP INDEX `FK_refobj_parentrefid_idx`,
  DROP INDEX `FK_refobj_typeid_idx`;

ALTER TABLE `specprocessorprojects`
  DROP FOREIGN KEY `FK_specprocessorprojects_coll`,
  DROP INDEX `FK_specprocessorprojects_coll`;

ALTER TABLE `specprocessorrawlabels`
  DROP FOREIGN KEY `FK_specproc_images`,
  DROP FOREIGN KEY `FK_specproc_occid`,
  DROP INDEX `FK_specproc_images`,
  DROP INDEX `FK_specproc_occid`;

ALTER TABLE `specprocnlp`
  DROP FOREIGN KEY `FK_specprocnlp_collid`,
  DROP INDEX `FK_specprocnlp_collid`;

ALTER TABLE `specprocnlpfrag`
  DROP FOREIGN KEY `FK_specprocnlpfrag_spnlpid`,
  DROP INDEX `FK_specprocnlpfrag_spnlpid`;

ALTER TABLE `specprocnlpversion`
  DROP FOREIGN KEY `FK_specprocnlpver_rawtext`,
  DROP INDEX `FK_specprocnlpver_rawtext_idx`;

ALTER TABLE `specprococrfrag`
  DROP FOREIGN KEY `FK_specprococrfrag_prlid`,
  DROP INDEX `FK_specprococrfrag_prlid_idx`;

ALTER TABLE `taxa`
  DROP FOREIGN KEY `FK_taxa_uid`,
  DROP INDEX `FK_taxa_uid_idx`;

ALTER TABLE `tmattributes`
  CHANGE COLUMN `datelastmodified` `modifiedTimeStamp` datetime(0) NULL DEFAULT NULL AFTER `modifieduid`,
  DROP FOREIGN KEY `FK_tmattr_imgid`,
  DROP FOREIGN KEY `FK_tmattr_occid`,
  DROP FOREIGN KEY `FK_tmattr_stateid`,
  DROP FOREIGN KEY `FK_tmattr_uidcreate`,
  DROP FOREIGN KEY `FK_tmattr_uidmodified`,
  DROP INDEX `FK_tmattr_stateid_idx`,
  DROP INDEX `FK_tmattr_occid_idx`,
  DROP INDEX `FK_tmattr_imgid_idx`,
  DROP INDEX `FK_attr_uidcreate_idx`,
  DROP INDEX `FK_tmattr_uidmodified_idx`;

ALTER TABLE `tmstates`
  CHANGE COLUMN `datelastmodified` `modifiedTimeStamp` datetime(0) NULL DEFAULT NULL AFTER `modifieduid`,
  DROP FOREIGN KEY `FK_tmstates_uidcreated`,
  DROP FOREIGN KEY `FK_tmstates_uidmodified`,
  DROP INDEX `FK_tmstate_uidcreated_idx`,
  DROP INDEX `FK_tmstate_uidmodified_idx`;

ALTER TABLE `tmtraitdependencies`
  DROP FOREIGN KEY `FK_tmdepend_stateid`,
  DROP INDEX `FK_tmdepend_stateid_idx`;

ALTER TABLE `tmtraits`
  CHANGE COLUMN `datelastmodified` `modifiedTimeStamp` datetime(0) NULL DEFAULT NULL AFTER `modifieduid`,
  DROP FOREIGN KEY `FK_traits_uidcreated`,
  DROP FOREIGN KEY `FK_traits_uidmodified`,
  DROP INDEX `FK_traits_uidcreated_idx`,
  DROP INDEX `FK_traits_uidmodified_idx`;

ALTER TABLE `uploadspecparameters`
  DROP FOREIGN KEY `FK_uploadspecparameters_coll`,
  DROP INDEX `FK_uploadspecparameters_coll`;

ALTER TABLE `userroles`
  DROP FOREIGN KEY `FK_userrole_uid`,
  DROP FOREIGN KEY `FK_userrole_uid_assigned`,
  DROP INDEX `FK_userroles_uid_idx`,
  DROP INDEX `FK_usrroles_uid2_idx`;

ALTER TABLE `usertaxonomy`
  DROP FOREIGN KEY `FK_usertaxonomy_taxauthid`,
  DROP FOREIGN KEY `FK_usertaxonomy_tid`,
  DROP FOREIGN KEY `FK_usertaxonomy_uid`,
  DROP INDEX `FK_usertaxonomy_uid_idx`,
  DROP INDEX `FK_usertaxonomy_tid_idx`,
  DROP INDEX `FK_usertaxonomy_taxauthid_idx`;

ALTER TABLE `taxalinks`
  DROP FOREIGN KEY `FK_taxalinks_taxa`;

ALTER TABLE `taxonunits`
  DROP INDEX IF EXISTS `UNIQUE_taxonunits`;

DELETE FROM taxonunits
WHERE RankName IN("Organism","Kingdom","Subkingdom","Division","Phylum","Subdivision","Subphylum","Superclass",
	"Class","Subclass","Order","Suborder","Family","Subfamily","Tribe","Subtribe","Genus","Subgenus",
	"Section","Subsection","Species","Subspecies","Variety","Morph","Subvariety","Form","Subform","Cultivated");

INSERT INTO `taxonunits`(`rankid`, `rankname`, `dirparentrankid`, `reqparentrankid`) VALUES (1, 'Organism', 1, 1);
INSERT INTO `taxonunits`(`rankid`, `rankname`, `dirparentrankid`, `reqparentrankid`) VALUES (10, 'Kingdom', 1, 1);
INSERT INTO `taxonunits`(`rankid`, `rankname`, `dirparentrankid`, `reqparentrankid`) VALUES (20, 'Subkingdom', 10, 10);
INSERT INTO `taxonunits`(`rankid`, `rankname`, `dirparentrankid`, `reqparentrankid`) VALUES (25, 'clade', 10, 10);
INSERT INTO `taxonunits`(`rankid`, `rankname`, `dirparentrankid`, `reqparentrankid`) VALUES (30, 'Division', 20, 10);
INSERT INTO `taxonunits`(`rankid`, `rankname`, `dirparentrankid`, `reqparentrankid`) VALUES (30, 'Phylum', 20, 10);
INSERT INTO `taxonunits`(`rankid`, `rankname`, `dirparentrankid`, `reqparentrankid`) VALUES (35, 'clade', 30, 10);
INSERT INTO `taxonunits`(`rankid`, `rankname`, `dirparentrankid`, `reqparentrankid`) VALUES (40, 'Subdivision', 30, 30);
INSERT INTO `taxonunits`(`rankid`, `rankname`, `dirparentrankid`, `reqparentrankid`) VALUES (40, 'Subphylum', 30, 30);
INSERT INTO `taxonunits`(`rankid`, `rankname`, `dirparentrankid`, `reqparentrankid`) VALUES (45, 'clade', 40, 30);
INSERT INTO `taxonunits`(`rankid`, `rankname`, `dirparentrankid`, `reqparentrankid`) VALUES (50, 'Superclass', 40, 30);
INSERT INTO `taxonunits`(`rankid`, `rankname`, `dirparentrankid`, `reqparentrankid`) VALUES (55, 'clade', 50, 30);
INSERT INTO `taxonunits`(`rankid`, `rankname`, `dirparentrankid`, `reqparentrankid`) VALUES (60, 'Class', 50, 30);
INSERT INTO `taxonunits`(`rankid`, `rankname`, `dirparentrankid`, `reqparentrankid`) VALUES (65, 'clade', 60, 30);
INSERT INTO `taxonunits`(`rankid`, `rankname`, `dirparentrankid`, `reqparentrankid`) VALUES (70, 'Subclass', 60, 60);
INSERT INTO `taxonunits`(`rankid`, `rankname`, `dirparentrankid`, `reqparentrankid`) VALUES (75, 'clade', 70, 60);
INSERT INTO `taxonunits`(`rankid`, `rankname`, `dirparentrankid`, `reqparentrankid`) VALUES (100, 'Order', 70, 60);
INSERT INTO `taxonunits`(`rankid`, `rankname`, `dirparentrankid`, `reqparentrankid`) VALUES (105, 'clade', 100, 60);
INSERT INTO `taxonunits`(`rankid`, `rankname`, `dirparentrankid`, `reqparentrankid`) VALUES (110, 'Suborder', 100, 100);
INSERT INTO `taxonunits`(`rankid`, `rankname`, `dirparentrankid`, `reqparentrankid`) VALUES (115, 'clade', 110, 100);
INSERT INTO `taxonunits`(`rankid`, `rankname`, `dirparentrankid`, `reqparentrankid`) VALUES (140, 'Family', 110, 100);
INSERT INTO `taxonunits`(`rankid`, `rankname`, `dirparentrankid`, `reqparentrankid`) VALUES (150, 'Subfamily', 140, 140);
INSERT INTO `taxonunits`(`rankid`, `rankname`, `dirparentrankid`, `reqparentrankid`) VALUES (160, 'Tribe', 150, 140);
INSERT INTO `taxonunits`(`rankid`, `rankname`, `dirparentrankid`, `reqparentrankid`) VALUES (170, 'Subtribe', 160, 140);
INSERT INTO `taxonunits`(`rankid`, `rankname`, `dirparentrankid`, `reqparentrankid`) VALUES (180, 'Genus', 170, 140);
INSERT INTO `taxonunits`(`rankid`, `rankname`, `dirparentrankid`, `reqparentrankid`) VALUES (190, 'Subgenus', 180, 180);
INSERT INTO `taxonunits`(`rankid`, `rankname`, `dirparentrankid`, `reqparentrankid`) VALUES (200, 'Section', 190, 180);
INSERT INTO `taxonunits`(`rankid`, `rankname`, `dirparentrankid`, `reqparentrankid`) VALUES (210, 'Subsection', 200, 180);
INSERT INTO `taxonunits`(`rankid`, `rankname`, `dirparentrankid`, `reqparentrankid`) VALUES (220, 'Species', 210, 180);
INSERT INTO `taxonunits`(`rankid`, `rankname`, `dirparentrankid`, `reqparentrankid`) VALUES (230, 'Subspecies', 220, 180);
INSERT INTO `taxonunits`(`rankid`, `rankname`, `dirparentrankid`, `reqparentrankid`) VALUES (240, 'Variety', 220, 180);
INSERT INTO `taxonunits`(`rankid`, `rankname`, `dirparentrankid`, `reqparentrankid`) VALUES (240, 'Morph', 220, 180);
INSERT INTO `taxonunits`(`rankid`, `rankname`, `dirparentrankid`, `reqparentrankid`) VALUES (250, 'Subvariety', 240, 180);
INSERT INTO `taxonunits`(`rankid`, `rankname`, `dirparentrankid`, `reqparentrankid`) VALUES (260, 'Form', 220, 180);
INSERT INTO `taxonunits`(`rankid`, `rankname`, `dirparentrankid`, `reqparentrankid`) VALUES (270, 'Subform', 260, 180);
INSERT INTO `taxonunits`(`rankid`, `rankname`, `dirparentrankid`, `reqparentrankid`) VALUES (300, 'Cultivated', 220, 220);

TRUNCATE TABLE omoccurgeoindex;

INSERT IGNORE INTO omoccurgeoindex(tid,decimallatitude,decimallongitude)
  SELECT DISTINCT o.tidinterpreted, round(o.decimallatitude,3), round(o.decimallongitude,3)
  FROM omoccurrences o LEFT JOIN omoccurgeoindex g ON o.tidinterpreted = g.tid
  WHERE g.tid IS NULL AND o.tidinterpreted IS NOT NULL AND o.decimallatitude IS NOT NULL AND o.decimallongitude IS NOT NULL;

REPLACE omoccurrencesfulltext(occid,locality,recordedby)
  SELECT occid, CONCAT_WS("; ", municipality, locality), recordedby
  FROM omoccurrences;

#Add edittype field and run update query to tag batch updates (edittype = 1)
ALTER TABLE `omoccuredits`
  ADD COLUMN `editType` INT NULL DEFAULT 0 COMMENT '0 = general edit, 1 = batch edit' AFTER `AppliedStatus`;

UPDATE omoccuredits e INNER JOIN (SELECT initialtimestamp, uid, count(DISTINCT occid) as cnt
FROM omoccuredits
GROUP BY initialtimestamp, uid
HAVING cnt > 2) as inntab ON e.initialtimestamp = inntab.initialtimestamp AND e.uid = inntab.uid
SET edittype = 1;

#Tag all collection admin and editors as non-volunteer crowdsource editors
UPDATE omcrowdsourcecentral c INNER JOIN omcrowdsourcequeue q ON c.omcsid = q.omcsid
  INNER JOIN userroles r ON c.collid = r.tablepk AND q.uidprocessor = r.uid
  SET q.isvolunteer = 0
  WHERE r.role IN("CollAdmin","CollEditor") AND q.isvolunteer = 1;

ALTER TABLE `schemaversion`
  CHANGE COLUMN `dateapplied` `modifiedtimestamp` timestamp(0) NOT NULL DEFAULT current_timestamp AFTER `versionnumber`;

INSERT INTO `schemaversion`(`versionnumber`) VALUES ('2.0');
