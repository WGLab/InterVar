# InterVar
A bioinformatics software tool for clinical interpretation of genetic variants by ACMG2015 guideline

## SYNOPSIS

Intervar.py [options]

## WHAT DOES IT DO

InterVar is a python script for variant interpretation of clinical significance. 

## PREREQUISITE

First, you need install Python.
Second, you need to install [ANNOVAR](http://annovar.openbioinformatics.org/en/latest/)

## OPTIONS

- -h, --help              
show this help message and exit  

- --version             
show program''s version number and exit

- -i INPUTFILE, --input=INPUTFILE           
input file of  variants for analysis

-  --input_type=AVinput
 The input file type, it can be  AVinput(Annovar''sformat),VCF

- -o OUTPUTFILE, --output=OUTPUTFILE     
prefix the output file (default:output)

- -b BUILDVER, --buildver=BUILDVER    
version of reference genome: hg18, hg19(default)

- -t intervardb, --database_intervar=intervardb
The  database location/dir for the InterVar dataset files

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

Intervar will based on the annovar''s annotation results to score the criteria for benign and pathogenic;
There are totally 28 evidences: for pathogenic criterion, it is about 16 evidences weighted as very strong (PVS1), strong (PS1–4); moderate (PM1–6), or supporting (PP1–5); and for benign criterion, it is about 11 evidence weighted as stand-alone (BA1), strong (BS1–4), or supporting (BP1–7). The InterVar will chek these 28 evidence one by one, then combined criteria according the rules, each variant will be assigned as "pathogenic", "likely pathogenic", "uncertain significance", "likely benign" or "benign" ;The "Uncertain significance" will be assigned to the variant which criteria for benign and pathogenic are contradictory or are not meet. 
The ACMG 2015 guide:
Richards, S. et al. Standards and guidelines for the interpretation of sequence variants: a joint consensus recommendation of the American College of Medical Genetics and Genomics and the Association for Molecular Pathology. Genetics in medicine : official journal of the American College of Medical Genetics 17, 405-424 (2015).


