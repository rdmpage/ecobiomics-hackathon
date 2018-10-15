Mapping files for EMP analysis
------------------------------

### Refined mapping file with select columns 

#### Mapping files

* `emp_qiime_mapping_release1.tsv` -- 27751 samples
* `emp_qiime_mapping_qc_filtered.tsv` -- 23828 samples
* `emp_qiime_mapping_subset_10k.tsv` -- 10000 samples
* `emp_qiime_mapping_subset_5k.tsv` -- 5000 samples
* `emp_qiime_mapping_subset_2k.tsv` -- 2000 samples

#### Information about subsets

This version of the EMP contains 97 studies. The release1 set contains all samples in these 97 studies that have at least one sequence per sample; this set includes controls (blanks and mock communities). The qc_filtered set, from which the subsets are drawn, has samples with >=1000 observations in each of four OTU tables: Closed-reference Greengenes, Closed-reference Silva, Open-reference Greengenes, and Deblur 90-bp OTU tables; controls (empo_1 == 'Control') are excluded.

Subsets are provided which give equal (as possible) representation across EMPO (empo_3) sample types and across studies within those sample types. The subsets contain 10000, 5000, and 2000 samples (nested subsets). In each subset the samples must have >=10000 observations in each of Closed-reference Greengenes, Closed-reference Silva, Open-reference Greengenes OTU tables AND >=5000 observations in the Deblur 90-bp OTU table. 

OTU tables (.biom) for the subsets were generated using the QIIME1 command filter_samples_from_otu_table.py. For example, to get the 2000-sample subset of the Deblur 100-bp biom table, we ran a command like this:

	filter_samples_from_otu_table.py \
	-i /projects/emp/03-otus/04-deblur/emp.100.min25.deblur.withtax.biom \
	-m /projects/emp/00-qiime-maps/merged/emp_qiime_mapping_qc_filtered.tsv \
	-s 'subset_2k:True' \
	-o emp_deblur_100bp.subset_2k.biom \
	-n 5000


#### Description of columns

_Sample_

* `#SampleID` -- unique identifier for sample
* `BarcodeSequence` -- Illumina barcode sequence
* `LinkerPrimerSequence` -- Illumina linker primer sequence
* `Description` -- sample description
* `host_subject_id` -- unique identifier for subject (multiple samples may come from same subject)

_Study_

* `study_id` -- parsed from SampleID
* `title` -- study title
* `principal_investigator` -- PI of the study
* `doi` -- digital object identifier (DOI) of primary publication
* `ebi_accession` -- EBI accession number if submitted

_Prep_

* `target_gene` -- name of gene amplified (e.g., 16S rRNA)
* `target_subfragment` -- name of subfragment of gene amplified (e.g., V4)
* `pcr_primers` -- amplicon primer sequences used
* `illumina_technology` -- model of Illumina sequencer
* `extraction_center` -- where the sample was physically extracted 
* `run_center` -- where the sample was physically sequenced (CCME=U Colorado Boulder, ANL=Argonne Natl Lab, UCSDMI=UC San Diego, CGS-GL=Wash U, UCD=U Colorado Denver)
* `run_date` -- date the sample was physically sequenced

_Quality (not included in qc-filtered and subset mapping files)_

* `release1_study` -- included among 97 studies in 2017 EMP paper
* `study_ok` -- study does not have major issues
* `dense_sampling` -- whether the study has highly similar samples
* `metadata_minimal` -- whether the study has only minimal metadata
* `units_status` -- whether units are provided for measurements

_Sequences_

* `read_length_bp` -- median read length in bp for study after quality filtering
* `sequences_split_libraries` -- number of sequences after split libraries
* `observations_closed_ref_greengenes` -- number of observations in closed-reference Greengenes table
* `observations_closed_ref_silva` -- number of observations in closed-reference Silva table
* `observations_open_ref_greengenes` -- number of observations in open-reference Greengenes table
* `observations_deblur_90bp` -- number of observations in 90-bp Deblur table
* `observations_deblur_100bp` -- number of observations in 100-bp Deblur table
* `observations_deblur_150bp` -- number of observations in 150-bp Deblur table

_Subsets_

* `emp_release1` -- samples with >=1 sequences (split libraries) per sample
* `qc_filtered` -- samples with >=10000 CR-GG & CR-Silva & OR-GG and >=5000 Deblur-90 but excluding controls (all subsets are in this set)
* `subset_10k` -- 10000 samples with >=10000 CR-GG & CR-Silva & OR-GG and >=5000 Deblur-90, evenly distributed across `empo_3` categories and then across studies
* `subset_5k` -- 5000 samples with >=10000 CR-GG & CR-Silva & OR-GG and >=5000 Deblur-90, evenly distributed across `empo_3` categories and then across studies
* `subset_2k` -- 2000 samples with >=10000 CR-GG & CR-Silva & OR-GG and >=5000 Deblur-90, evenly distributed across `empo_3` categories and then across studies

_Taxonomy_

* `sample_taxid` -- NCBI taxonomy ID of sample
* `sample_scientific_name` -- NCBI scientific name of sample, looked up using `sample_taxid`
* `host_taxid` -- NCBI taxonomy ID of host
* `host_common_name_provided` -- user-provided common name of host
* `host_common_name` -- NCBI common name of host, looked up using `host_taxid`
* `host_scientific_name` -- NCBI scientific name of host, looked up using `host_taxid`
* `host_superkingdom` -- from NCBI, looked up using `host_taxid`
* `host_kingdom` -- from NCBI, looked up using `host_taxid`
* `host_phylum` -- from NCBI, looked up using `host_taxid`
* `host_class` -- from NCBI, looked up using `host_taxid`
* `host_order` -- from NCBI, looked up using `host_taxid`
* `host_family` -- from NCBI, looked up using `host_taxid`
* `host_genus` -- from NCBI, looked up using `host_taxid`
* `host_species` -- from NCBI, looked up using `host_taxid`

_Geography_

* `collection_timestamp` -- date and time sample was collected
* `country` -- country where sample was collected
* `latitude_deg` -- latitude where sample was collected
* `longitude_deg` -- longitude where sample was collected
* `depth_m` -- depth in meters where sample was collected (blank if altitude is given)
* `altitude_m` -- altitude in meters where sample was collected (blank if depth is given)
* `elevation_m` -- elevation in meters where sample was collected

_Ontology_

* `env_biome` -- ENVO biome
* `env_feature` -- ENVO feature
* `env_material` -- ENVO material
* `envo_biome_0` -- ENVO biome level 0
* `envo_biome_1` -- ENVO biome level 1
* `envo_biome_2` -- ENVO biome level 2
* `envo_biome_3` -- ENVO biome level 3
* `envo_biome_4` -- ENVO biome level 4
* `envo_biome_5` -- ENVO biome level 5
* `empo_0` -- EMPO level 0
* `empo_1` -- EMPO level 1
* `empo_2` -- EMPO level 2
* `empo_3` -- EMPO level 3

_Alpha-diversity_

* `adiv_observed_otus` -- observed tag sequences in 90-bp Deblur rarefied to 5000 sequences per sample
* `adiv_chao1` -- Chao1 diversity in 90-bp Deblur rarefied to 5000 sequences per sample
* `adiv_shannon` -- Shannon index in 90-bp Deblur rarefied to 5000 sequences per sample
* `adiv_faith_pd` -- Faith's phylogenetic diversity in 90-bp Deblur rarefied to 5000 sequences per sample

_Environment_

* `temperature_deg_c` -- temperature of sample in degrees Celsius
* `ph` -- pH of sample
* `salinity_psu` -- salinity of sample in practical salinity units
* `oxygen_mg_per_l` -- oxygen concentration of sample in mg/L
* `phosphate_umol_per_l` -- phosphate concentration of sample in umol/L
* `ammonium_umol_per_l` -- ammonium concentration of sample in umol/L
* `nitrate_umol_per_l` -- nitrate concentration of sample in umol/L
* `sulfate_umol_per_l` -- sulfate concentration of sample in umol/L


#### Change log

20160627

* First draft

20160701

* host_taxid -- now added

20160707

* `empo_3` -- Study 933 (Thomas Australian algae) changed from "Surface (saline)" to "Plant surface"

20160719

* `title` -- study titles are consistent across each study, i.e. one title per study ID, but some are still undescriptive (updated titles are coming from Gail)
* `taxon_id` -- removed trailing ".0", fixed Excel Auto Fill typos, Study 10145 changed to 412757 (beach sand metagenome), Study 10278 changed to 1799672 (peat metagenome)
* `scientific_name` -- deleted values that refer to host and not sample (Studies 1734, 1795, 1889, 10146, 10245, 10273, 10323) or don't match `scientific_name_lookup` (Studies 10145, 10156, 10180, 10278, 10308, 10346)
* `scientific_name_lookup` -- looked up from NCBI names.dmp using `taxon_id`
* `host_taxid` -- removed trailing ".0", fixed Excel Auto Fill typos (Studies 10180, 1747, 1056)
* `host_common_name` -- now added
* `host_common_name_lookup` -- looked up from NCBI names.dmp using taxon_id
* `host_scientific_name_lookup` -- looked up from NCBI names.dmp using taxon_id
* `collection_timestamp` -- now added, removed timestamps after today's date (some dates have meaningless 00:00:00 for HH:MM:SS)
* `env_biome` -- fixed Studies 723, 776, 1033, 1036
* `empo_3` -- skin samples are now listed as `empo_3` "Animal surface" even though the ENVO material may be sebum and was previously considered "Animal secretion" (other changes to EMPO definitions are coming from Gail)
* `temperature` -- removed "None" and "No data" values, removed "0.0" values for Study 10247
* `ph` -- Study 10246 rounded to hundredths
* `salinity` -- removed "None" values, removed "0.0" values for Study 10247, change ppm to ppt for 3 samples in Study 10145
* `oxygen` -- now added

20160803

* `env_biome` -- Studies 776, 1033 (antarctic diesel spill) now "polar desert biome" instead of "tundra biome", Studies 632, 1521, 1037 reassigned defunct categories
* `title` -- updated from `emp_studies_quality.xlsx`
* `dense_sampling` -- now added from `emp_studies_quality.xlsx`
* `metadata_minimal` -- now added from `emp_studies_quality.xlsx`
* sequences_per_sample -- now added from split libraries output

20160803

* `study_ok` -- now added based on list of studies in `emp_studies_quality.xlsx`

20160808

* `ebi_accession` -- EBI accession number if submitted (from `emp_studies_quality.xlsx`)
* `emp_paper` -- included among 97 studies in 2016 EMP paper (TRUE/FALSE, from `emp_studies_quality.xlsx`)
* `units_status` -- whether units are provided for measurements (from `emp_studies_quality.xlsx`)
* `emp_release1` -- samples with >=1 sequences per sample
* `qcfiltered` -- samples with >1000 sequences per sample but not controls (all subsets are in this set)
* `subset_2000` -- 2000 samples evenly distributed across `empo_3` categories and then across studies
* `subset_5000` -- 5000 samples evenly distributed across `empo_3` categories and then across studies
* `subset_10000` -- 10000 samples evenly distributed across `empo_3` categories and then across studies
* `subset_20000` -- 20000 samples evenly distributed across `empo_3` categories and then across studies

20160810

* `envo_biome_1` -- level 1 envo biome from `envo_biome_name_is_a.txt`
* `envo_biome_2` -- level 2 envo biome from `envo_biome_name_is_a.txt`
* `envo_biome_3` -- level 3 envo biome from `envo_biome_name_is_a.txt`
* `envo_biome_4` -- level 4 envo biome from `envo_biome_name_is_a.txt`
* `envo_biome_5` -- level 5 envo biome from `envo_biome_name_is_a.txt`
* `envo_biome_6` -- level 6 envo biome from `envo_biome_name_is_a.txt`

20160812

* `empo_2` `empo_3` - Study 1883 `env_material` "Coastal water samples" now listed as "Water (saline)". Study 1627 changed to "Sediment (saline)" except 5 samples (1627.GZC, 1627.BGC, 1627.LC, 1627.SMXC, 1627.RWC) which are manually changed to "Sediment (non-saline)" in notebook.
* Added units to headers: `temperature_deg_c`, `salinity_psu`, `oxygen_mg_per_l`, `latitude_deg`, `longitude_deg`, `depth_m`, `altitude_m`, `elevation_m`.
* `altitude_m` is in meters now, not km.
* `temperature_deg_c` -- Study 2300 converted Fahrenheit to Celsius.
* Downloaded new mapping file from Qiita: Study 894.

20160821

* `deblur_90bp_seqs` -- not added yet
* `deblur_100bp_seqs` -- added
* `deblur_1500bp_seqs` -- added
* `sample_taxid` -- formerly `taxon_id`
* `sample_scientific_name` -- formerly `scientific_name_lookup`
* `host_taxid` -- many fixes here
* `host_common_name_provided` -- formerly `host_common_name`
* `host_common_name` -- formerly `host_common_name_lookup`
* `host_scientific_name` -- formerly `host_scientific_name_lookup`

20160821

* `depth_m` -- fixed errors and changed ranges to midpoints

20160928

* New subsets

20161010

* `phosphate_umol_per_l` -- now added, using `phosphate` and `diss_phosphate`
* `ammonium_umol_per_l` -- now added, using `ammonium`
* `nitrate_umol_per_l` -- now added, using `nitrate` and `diss_nitrate`
* `sulfate_umol_per_l` -- now added, using `sulfate`
* `temperature_deg_c` -- Study 945 errors corrected
* `ph` -- Study 945 errors corrected

20161030

* `adiv_observed_otus` -- now added, observed OTUs of 90-bp Deblur rarefied to 5000 sequences per sample
* `adiv_chao1` -- now added, Chao1 diversity of 90-bp Deblur rarefied to 5000 sequences per sample
* `adiv_shannon` -- now added, Shannon index of 90-bp Deblur rarefied to 5000 sequences per sample
* `adiv_faith_pd` -- now added, Faith's phylogenetic diversity of 90-bp Deblur rarefied to 5000 sequences per sample

20161107

* `empo_*` -- added values for samples 861.CS.dec08, 861.XS.dec08 (note: these samples are not in `qc_filtered` subset, only in `emp_release1`)

20161125

* `principal_investigator` -- now added
* `doi` -- was previously `pubmed_id`

20170113

* `empo_3` -- minor changes to a few samples: reassiged 'Intertidal (saline)' and made consistent saliva ('Animal secretion') and sebum/mucus/skin ('Animal surface')
* `ebi_accession` -- added newly uploaded studies
* `doi` -- added more publications

20170216

* `salinity_psu` -- added values for Study 1198 "SWE" samples
* `ebi_accession` -- added newly uploaded studies

20170601

* `target_gene` -- now added
* `target_subfragment` -- now added
* `illumina_technology` -- now added
* `extraction_center` -- now added
* `run_center` -- now added
* `run_date` -- now added

20170718

* `doi` -- added more publications (those with asterisks describe EMP samples but do not use EMP data)
* `ebi_accession` -- added newly uploaded studies
* multiple columns -- no longer using "Not applicable" for empty cells

20170829

* `qc_filtered` -- corrected so there are now 23828 samples in this set (value == True) instead of 24910

20170905

* `depth_m` -- corrected a bug where certain studies had a decimal removed

20170912

* `release1_study` -- the column formerly known as `emp_release1`
* `emp_release1` -- the column formerly known as `all_emp`

<!--

### Other mapping files

#### Full refined mapping file

* `emp_qiime_mapping_latest.tsv`

Contains all samples in the 112 studies (34005 samples), which have refined metadata but are not all included in the paper.

#### Merged original mapping file from Qiita

* `previous/emp_qiime_mapping_union_empo.tsv`

Contains all samples (34,007) and columns (1,811) in the 112 studies (including 97 studies in this paper).

-->
