# InterVar
A bioinformatics software tool for clinical interpretation of genetic variants by ACMG2015 guideline

## SYNOPSIS

Intervar.py [options]

## WHAT DOES IT DO

InterVar is a python script for variant interpretation of clinical significance. 

## PREREQUISITE

1. You need install Python >=2.6.6.
2. You need install [ANNOVAR](http://annovar.openbioinformatics.org/en/latest/) version >=  2016-02-01.
3. You need download other files such as mim2gene.txt from [OMIM](http://www.omim.org/downloads).
4. Please use the updated files(should be generated: >= 2016-09) from OMIM, outdated files will bring problems of InterVar.

## OPTIONS

- -h, --help              
show this help message and exit  

- --version             
show program''s version number and exit

- --config=config.ini
Load your config file. The config file contains all options.

if you use this options,you can ignore all the other options bellow.

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

(The code for additional evidence should be as: PS5/PM7/PP6/BS5/BP8 ;

    The format for upgrad/downgrade of criteria should be like:

    grade_PS1=2;           1 for Strong; 2 for Moderate; 3 for Supporting)
'''
 Chr Pos Ref_allele Alt_allele  evidence_list

 1 123456 A G PM1=1;BS2=1;BP3=0;PS5=1;grade_PM1=1
'''
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

## Web server
wInterVar:  [http://wintervar.wglab.org](http://wintervar.wglab.org)

## LICENSE

InterVar is free for non-commercial use without warranty. Users need to obtain licenses such as OMIM and ANNOVAR by themselves. Please contact the authors for commercial use.

## REFERENCE
Quan Li and Kai Wang. InterVar: Clinical interpretation of genetic variants by ACMG-AMP 2015 guideline. The American Journal of Human Genetics 100, 1-14, February 2, 2017,[http://dx.doi.org/10.1016/j.ajhg.2017.01.004](http://dx.doi.org/10.1016/j.ajhg.2017.01.004)

[The ACMG 2015 guide](http://www.ncbi.nlm.nih.gov/pubmed/25741868)
Richards, S. et al. Standards and guidelines for the interpretation of sequence variants: a joint consensus recommendation of the American College of Medical Genetics and Genomics and the Association for Molecular Pathology. Genetics in medicine : official journal of the American College of Medical Genetics 17, 405-424 (2015).

<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-88917545-3', 'auto');
  ga('send', 'pageview');

</script>
