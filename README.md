# InterVar
A bioinformatics software tool for clinical interpretation of genetic variants by ACMG2015 guideline

## SYNOPSIS

Intervar.py [options]

## WHAT DOES IT DO

InterVar is a python script for variant interpretation of clinical significance. 

## PREREQUISITE

1. You need install Python.
2. You need install [ANNOVAR](http://annovar.openbioinformatics.org/en/latest/)
3. You need download other files such as mim2gene.txt and morbidmap from [OMIM](http://www.omim.org/downloads)

## OPTIONS

- -h, --help              
show this help message and exit  

- --version             
show program''s version number and exit

- -i INPUTFILE, --input=INPUTFILE           
input file of  variants for analysis

- --input_type=AVinput 
The input file type, it can be  AVinput(Annovar''sformat),VCF

- -o OUTPUTFILE, --output=OUTPUTFILE     
prefix the output file (default:output)

- -b BUILDVER, --buildver=BUILDVER    
version of reference genome: hg18, hg19(default)

- -t intervardb, --database_intervar=intervardb
The database location/dir for the InterVar dataset files

- -s your_evidence_file, --evidence_file=your_evidence_file

  This potion is for user specified evidence file for each variant,
  
  How to add your own Evidence for each Variant:
  
  Prepare your own evidence  file as tab-delimited,the line format:
  
  (The fifth column should be the evidence list, seprated by ";")
  
  Chr Pos Ref_allele Alt_allele  evidence_list
  
  1 123456 A G PM1=1;BS2=1;BP3=0

- --table_annovar=./table_annovar.pl
The Annovar perl script of table_annovar.pl

- --convert2annovar=./convert2annovar.pl
The Annovar perl script of convert2annovar.pl

- --annotate_variation=./annotate_variation.pl
The Annovar perl script of annotate_variation.pl

-  -d humandb, --database_locat=humandb 
The database location/dir for the Annovar annotation datasets


## EXAMPLE

    ./InterVar.py -c config.ini  # Run the examples in config.ini
    ./InterVar.py  -b hg19 -i your_input  --input_type=VCF  -o your_output


## HOW DOES IT WORK

InterVar takes either pre-annotated files, or unannotated input files in VCF format or ANNOVAR input format, where each line corresponds to one genetic variant; if the input files are unannotated, InterVar will call ANNOVAR to generate necessary annotations. The execution of InterVar mainly consists of two major steps: 1) automatically interpret 28 evidence codes; and 2) manual adjustment by users to re-interpret the clinical significance. However, users can specify their own evidence code and import into InterVar by using the argument "-evidence_file=your_evidence_file" so that one single step is sufficient to generate the final results. In the output, based on all 28 pieces of evidence codes that are either automatically generated or supplied by the user, each variant will be assigned as "pathogenic", "likely pathogenic", "uncertain significance", "likely benign" or "benign" by rules specified in the ACMG2015 guidelines 24.  

We also developed a web server of InterVar called wInterVar, which can be accessed at [http://wintervar.wglab.org](http://wintervar.wglab.org). The user can directly input their missense variants in wInterVar by chromosomal position, by dbSNP identifier, or by gene name with nucleic acid change information. The wInterVar server will provide full details on the variants, including all the evidence codes for the variants. The user then has the ability to manually adjust these evidence codes and resubmit to the server to perform re-interpretation. Since all evidence codes for all possible non-synonymous variants have been pre-computed by us, the execution of wInterVar is very fast, typically less than 1 second to obtain the results. However, the wInterVar server cannot process other types of variants (such as indels), and the user will need to use InterVar instead.
[The ACMG 2015 guide](http://www.ncbi.nlm.nih.gov/pubmed/25741868)
Richards, S. et al. Standards and guidelines for the interpretation of sequence variants: a joint consensus recommendation of the American College of Medical Genetics and Genomics and the Association for Molecular Pathology. Genetics in medicine : official journal of the American College of Medical Genetics 17, 405-424 (2015).


