# InterVar
A bioinformatics software tool for clinical interpretation of genetic variants by [the ACMG/AMP 2015 guidelines](http://www.ncbi.nlm.nih.gov/pubmed/25741868)

## SYNOPSIS

Intervar.py [options]

## WHAT DOES IT DO

InterVar is a software for variant interpretation of clinical significance. The input is either a pre-annotated variant file (tab-delimited text file, generate by ANNOVAR or other similar tools), or a VCF file (which will be annotated by ANNOVAR). The output contains 18 criteria based on ACMG/AMP 2015 guidelines, as well as automated interpretation for each variant, which can be used by human reviewers for manual adjustment. The final goal is to assign each variant as "pathogenic", "likely pathogenic", "uncertain significance", "likely benign" or "benign" by rules specified in the ACMG/AMP 2015 guidelines.

## PREREQUISITE

1. You need install Python since InterVar is written in Python.
2. You need install [ANNOVAR](http://annovar.openbioinformatics.org/en/latest/) if your input is a VCF file.
3. You need obtain other files including mim2gene.txt and morbidmap from [OMIM](http://www.omim.org/downloads). We cannot include them in InterVar due to copyright reasons.

## OPTIONS

- `-h, --help`    
show this help message and exit  

- `--version`             
show program''s version number and exit

- `-i INPUTFILE, --input=INPUTFILE`           
input file of  variants for analysis

- `--input_type=AVinput` 
The input file type, it can be  AVinput(Annovar''sformat),VCF

- `-o OUTPUTFILE, --output=OUTPUTFILE`     
prefix the output file (default:output)

- `-b BUILDVER, --buildver=BUILDVER`    
version of reference genome: hg19(default), hg38

- `-t intervardb, --database_intervar=intervardb`
The database location/dir for the InterVar dataset files

- `-s your_evidence_file, --evidence_file=your_evidence_file`

  This argument allows user to specify evidence file for each variant. To to add your own Evidence for each Variant, prepare your own evidence  file as tab-delimited file with the line format "Chr Pos Ref_allele Alt_allele  evidence_list". For example, "1 123456 A G PM1=1;BS2=1;BP3=0" as separated by tab. The fifth column should be the list of criteria, seprated by ";".
  
- `--table_annovar=./table_annovar.pl`
The path to ANNOVAR perl script of table_annovar.pl (if not specified in system PATH)

- `--convert2annovar=./convert2annovar.pl`
The path to ANNOVAR perl script of convert2annovar.pl (if not specified in system PATH)

- `--annotate_variation=./annotate_variation.pl`
The ANNOVAR perl script of annotate_variation.pl (if not specified in system PATH)

-  `-d humandb, --database_locat=humandb` 
The database location/directory for the ANNOVAR annotation datasets


## EXAMPLE

    ./InterVar.py -c config.ini  # Run the examples in config.ini
    ./InterVar.py  -b hg19 -i your_input  --input_type=VCF  -o your_output


## HOW DOES IT WORK

InterVar takes either pre-annotated files for genetic variants as tab-delimited text files, or unannotated input files in VCF format, where each line corresponds to one genetic variant. If the input files are unannotated, InterVar will call ANNOVAR to generate necessary annotations. The execution of InterVar mainly consists of two major steps: 1) automatically interpret 18 criteria; and 2) manual adjustment by users to re-interpret the clinical significance. However, users can specify their own criteria and import into InterVar by using the argument "-evidence_file=your_evidence_file" so that one single step is sufficient to generate the final results. In the output, based on all 28 pieces of criteria that are either automatically generated or supplied by the user, each variant will be assigned as "pathogenic", "likely pathogenic", "uncertain significance", "likely benign" or "benign" by rules specified in the ACMG/AMP 2015 guidelines.

We also developed a web server of InterVar called wInterVar, which can be accessed at [http://wintervar.wglab.org](http://wintervar.wglab.org). The user can directly input their missense variants in wInterVar by chromosomal position, by dbSNP identifier, or by gene name with nucleic acid change information. The wInterVar server will provide full details on the variants, including all the annotations and criteria used for automated interpretation. The user then has the ability to manually adjust these criteria and resubmit to the server to perform re-interpretation. Since all criteria for all possible non-synonymous variants have been pre-computed by us, the execution of wInterVar is very fast, typically less than 1 second to obtain the results. However, the wInterVar server is limited to missense variants, and cannot process other types of variants (such as indels), and the user will need to use InterVar instead.

## REFERENCE

Li Q, Wang K. InterVar: clinical interpretation of genetic variants by the ACMG/AMP 2015 guidelines.
