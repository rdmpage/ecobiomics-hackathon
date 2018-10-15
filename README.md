# ecobiomics-hackathon
Ecobiomics hackathon


## Data and use cases for the Ecobiomics hackathon on graph databases and Wikidata (Oct. 16 - 19).

We’ll use this page to collect data and ideas that we may want to draw on at the hackathon. Feel free to comment on existing ideas, or to add your own. Our focus is on metagenomics, but we want to build general purpose biodiversity knowledge graph infrastructure, so any related datasets or use cases are welcome.

### i. Data from the Earth Microbiome Project
https://drive.google.com/drive/folders/1gc2iJHFxCYnIS6aXD9Z4Wf1Ht7w3y4r6 contains metadata from 97 EMP studies. about_mapping_files.md describes the structure of each file.
EMPO (the Earth Microbiome Project Ontology) is described here. A full discussion of the data, ontology, and analysis is in https://www.nature.com/articles/nature24621.

### ii. Ozymandias
https://ozymandias-demo.herokuapp.com/
Rod has a few blog posts describing this, starting with 
http://iphylo.blogspot.com/2018/08/ozymandias-biodiversity-knowledge-graph.html .
The data model: https://github.com/rdmpage/ozymandias-demo/blob/master/model/model.png 
Rod’s bigger picture: https://riojournal.com/article/8767/

Question for us: How do metagenomics data, metadata, and analysis results embed in the graph?

Ozymandias runs on Blazegraph, and the ETL scripts are in the repo. One of the hackathon activities could be to do for Canada what Ozymandias does for Australia. Another could (and, I think, should) be to extend Ozymandias to include the basic concepts of metagenomics.

### iii. Linking genomic/metagenomic data to OpenBiodiv
(previously called OBKMS - Open Biodiversity Knowledge Management System)
Semantic system running on top of a biodiversity knowledge graph. 
Deployed at: http://openbiodiv.net/, SPARQL endpoint: http://graph.openbiodiv.net/
Poster summarising the main components: https://biss.pensoft.net/articles.php?id=20246
Project description: https://riojournal.com/article/7757/
Based on OpenBiodiv ontology (OpenBiodiv-O): https://jbiomedsem.biomedcentral.com/articles/10.1186/s13326-017-0174-5
The knowledge graph is composed of semantically enhanced information from 5000 full-text articles, 200 000 taxonomic treatments extracted from Plazi and the GBIF taxonomic backbone, all converted to RDF at Pensoft. 

The first step would be to link (1) species-level taxon names (and information linked to these available in OpenBiodiv) to (2) their gene identifiers (barcodes or BINs to mention first) and the information linked to these gene identifiers (e.g. metadata but also information coming from taxonomic, phylogenetic or metagenomic samples (e.g. from particular habitats or species-level associations).

### iv. Integrated Flora of Canada
AAFC is working on an Integrated Flora of Canada, based on our Semantic Mediawiki representation of Flora of North America. We want to build the new flora on Wikidata (instead of SMW), and we want to include sequence data, soil microbiome data, and more helpful habitat data. Can we take baby steps toward this in the hackathon?  

### v. How can we incorporate the results of metagenomic analysis into the graph?

### vi. Linking sequences to geography (ht Rod Page and Bob Robbins)

### vii. Merging diverse datasets from GBIF by mapping them to a common graph model.  
In 2016, I (Steve Baskauf) downloaded several kinds of datasets (occurrence-based, event core, GGBN themed, etc.) and applied a common graph model (Darwin-SW) to them.  There are details at http://baskauf.blogspot.com/2016/11/guid-o-matic-meets-dwc-rdf-octopus.html The data in their mapped form are still available and it would be possible to try scaling this up by adding more or large data sets.  People say this is the kind of thing they want to do, but the big question in my mind is "what can we actually do with such a graph once we have it"?

### viii. Function in microbial "dark matter". (from Titus Brown - http://ivory.idyll.org/blog/2014-moore-ddd-round2-final.html)
Assigning putative function to sequence from complex microbial communities is incredibly challenging. In support of building putative functional assignments, we need a rich query interface that lets us search for correlations between gene presence and metadata characteristics across databases. We are already working with soil, sediment, symbiosis, marine virome, and hot spring data.
