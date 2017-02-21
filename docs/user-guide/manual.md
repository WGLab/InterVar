## Warning: All the following steps are in the Linux system

## download and  unzip the main package

Download the InterVar zip package at [here](https://github.com/WGLab/InterVar/archive/master.zip) using wget:

```
qli@sched1|:~>wget https://github.com/WGLab/InterVar/archive/master.zip -O InterVar.zip
--2017-02-21 11:09:52--  https://github.com/WGLab/InterVar/archive/master.zip
Resolving github.com... 192.30.253.112, 192.30.253.113
Connecting to github.com|192.30.253.112|:443... connected.
HTTP request sent, awaiting response... 302 Found
Location: https://codeload.github.com/WGLab/InterVar/zip/master [following]
--2017-02-21 11:09:52--  https://codeload.github.com/WGLab/InterVar/zip/master
Resolving codeload.github.com... 192.30.253.121, 192.30.253.120
Connecting to codeload.github.com|192.30.253.121|:443... connected.
HTTP request sent, awaiting response... 200 OK
Length: unspecified [application/zip]
Saving to: "InterVar.zip"

    [         <=>                                                                                  ] 23,586,075  13.4M/s   in 1.7s

2017-02-21 11:09:55 (13.4 MB/s) - "InterVar.zip" saved [23586075]
```

 

Assume that we have successfully  downloaded the InterVar package as `InterVar.zip` and used `unzip InterVar.zip` to unpack the package.

```
qli@sched1|:~>unzip InterVar.zip
Archive:  InterVar.zip
7182a4e6e4d01349dd699d2aa55fa955028fc0b4
   creating: InterVar-master/
  inflating: InterVar-master/.gitignore
  inflating: InterVar-master/Intervar.py
  inflating: InterVar-master/LICENSE
  inflating: InterVar-master/README.md
  inflating: InterVar-master/config.ini
   creating: InterVar-master/docs/
  inflating: InterVar-master/docs/favicon.ico
   creating: InterVar-master/docs/img/
 extracting: InterVar-master/docs/img/new.png
  inflating: InterVar-master/docs/index.md
   creating: InterVar-master/docs/misc/
  inflating: InterVar-master/docs/misc/contributing.md
  inflating: InterVar-master/docs/misc/credit.md
  inflating: InterVar-master/docs/misc/faq.md
 extracting: InterVar-master/docs/misc/whatsnew.md
   creating: InterVar-master/docs/user-guide/
  inflating: InterVar-master/docs/user-guide/download.md
  inflating: InterVar-master/docs/user-guide/manual.md
  inflating: InterVar-master/docs/user-guide/startup.md
   creating: InterVar-master/example/
  inflating: InterVar-master/example/ex1.avinput
  inflating: InterVar-master/example/myanno.hg19_multianno.txt
  inflating: InterVar-master/example/myanno.hg19_multianno.txt.grl_p
   creating: InterVar-master/intervardb/
  inflating: InterVar-master/intervardb/BP1.genes
  inflating: InterVar-master/intervardb/BS2_hom_het.hg19
  inflating: InterVar-master/intervardb/PM1_domains_with_benigns
  inflating: InterVar-master/intervardb/PP2.genes
  inflating: InterVar-master/intervardb/PS1.AA.change.patho
  inflating: InterVar-master/intervardb/PS1.AA.change.patho.hg19
  inflating: InterVar-master/intervardb/PS1.AA.change.patho.hg38
  inflating: InterVar-master/intervardb/PS4.variants.hg19
  inflating: InterVar-master/intervardb/PS4.variants.hg38
  inflating: InterVar-master/intervardb/PVS1.LOF.genes
  inflating: InterVar-master/intervardb/ext.variants.hg19
  inflating: InterVar-master/intervardb/knownGeneCanonical.txt
  inflating: InterVar-master/intervardb/mim_adultonset.txt
  inflating: InterVar-master/intervardb/mim_domin.txt
  inflating: InterVar-master/intervardb/mim_orpha.txt
  inflating: InterVar-master/intervardb/mim_pheno.txt
  inflating: InterVar-master/intervardb/mim_recessive.txt
  inflating: InterVar-master/intervardb/orpha.txt
  inflating: InterVar-master/mkdocs.yml
```



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

