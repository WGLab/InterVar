## SYNOPSIS

Intervar.py [options]

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
version of reference genome: hg19(default)

- -t intervardb, --database_intervar=intervardb
The database location/dir for the InterVar dataset files

- -s your_evidence_file, --evidence_file=your_evidence_file

  This potion is for user specified evidence file for each variant,

  How to add your own Evidence for each Variant:
     
  Prepare your own evidence  file as tab-delimited,the line format:
    
(The code for additional evidence should be as: PS5/PM7/PP6/BS5/BP8 ;

    The format for upgrad/downgrade of criteria should be like:
   
    grade_PS1=2;           1 for Strong; 2 for Moderate; 3 for Supporting)
   
 Chr Pos Ref_allele Alt_allele  evidence_list 

1 123456 A G PM1=1;BS2=1;BP3=0;PS5=1;grade_PM1=1

- --table_annovar=./table_annovar.pl
The Annovar perl script of table_annovar.pl

- --convert2annovar=./convert2annovar.pl
The Annovar perl script of convert2annovar.pl

- --annotate_variation=./annotate_variation.pl
The Annovar perl script of annotate_variation.pl

-  -d humandb, --database_locat=humandb
The database location/dir for the Annovar annotation datasets

