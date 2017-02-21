## Warning: All the following steps are in the Linux system

## Download and unzip the main package

Download the InterVar zip package at [here](https://github.com/WGLab/InterVar/archive/master.zip) using `wget https://github.com/WGLab/InterVar/archive/master.zip -O InterVar.zip`:

```
qli@sched1|:~> wget https://github.com/WGLab/InterVar/archive/master.zip -O InterVar.zip
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
qli@sched1|:~> unzip InterVar.zip
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
Go to the folder `InterVar-master` and check the files using `ls -alrt .`

```
qli@sched1|:~> cd InterVar-master/
qli@sched1|:~/InterVar-master> ls -alrt .
total 128
-rw-r-----  1 qli qli  5613 Feb 17 22:40 README.md
-rw-r-----  1 qli qli   752 Feb 17 22:40 mkdocs.yml
-rw-r-----  1 qli qli  1085 Feb 17 22:40 LICENSE
-rw-r-----  1 qli qli 80051 Feb 17 22:40 Intervar.py
drwxr-x---  2 qli qli  4096 Feb 17 22:40 intervardb
-rw-r-----  1 qli qli   702 Feb 17 22:40 .gitignore
drwxr-x---  2 qli qli  4096 Feb 17 22:40 example
drwxr-x---  5 qli qli  4096 Feb 17 22:40 docs
-rw-r-----  1 qli qli  3089 Feb 17 22:40 config.ini
drwxr-x---  5 qli qli  4096 Feb 17 22:40 .
drwx------ 33 qli qli  4096 Feb 21 11:13 ..

```
Now you can find the main python program as `Intervar.py`, and test the main program of InterVar can run properly or not by `python Intervar.py` :

```
qli@sched1|:~/InterVar-master> python Intervar.py
Usage: Intervar.py [OPTION] -i  INPUT -o  OUTPUT ...
       Intervar.py  --config=config.ini ...


=============================================================================
InterVar
Interpretation of Pathogenic/Benign for variants using python scripts of
InterVar.
=============================================================================

Options:
  --version             show program's version number and exit
  -h, --help            show this help message and exit
  -c config.ini, --config=config.ini
                        The config file of all options. it is for your own
                        configure file.You can edit all the options in the
                        configure and if you use this options,you can ignore
                        all the other options bellow
  -b hg19, --buildver=hg19
                        The genomic build version, it can be hg19 and will
                        support GRCh37 hg18 GRCh38 later
  -i example/ex1.avinput, --input=example/ex1.avinput
                        The input file contains your variants
  --input_type=AVinput  The input file type, it can be  AVinput(Annovar's
                        format),VCF(VCF with single sample),VCF_m(VCF with
                        multiple samples)
  -o example/myanno, --output=example/myanno
                        The prefix of output file which contains the results,
                        the file of results will be as [$$prefix].intervar

  InterVar Other Options:
    -t intervardb, --database_intervar=intervardb
                        The  database location/dir for the InterVar dataset
                        files
    -s your_evidence_file, --evidence_file=your_evidence_file
                        User specified Evidence file for each variant

     How to add your own Evidence for each Variant:
     Prepare your own evidence  file as tab-delimited,the line format:
    (The code for additional evidence should be as: PS5/PM7/PP6/BS5/BP8 ;
    The format for upgrad/downgrade of criteria should be like:
    grade_PS1=2;           1 for Strong; 2 for Moderate; 3 for Supporting)
    Chr Pos Ref_allele Alt_allele  PM1=1;BS2=1;BP3=0;PS5=1;grade_PM1=1

  Annovar Options:
    Caution: check these options from manual of Annovar.

    --table_annovar=./table_annovar.pl
                        The Annovar perl script of table_annovar.pl
    --convert2annovar=./convert2annovar.pl
                        The Annovar perl script of convert2annovar.pl
    --annotate_variation=./annotate_variation.pl
                        The Annovar perl script of annotate_variation.pl
    -d humandb, --database_locat=humandb
                        The  database location/dir for the annotation datasets

  Examples:
    ./InterVar.py -c config.ini  # Run the examples in config.ini
    ./InterVar.py  -b hg19 -i your_input  --input_type=VCF  -o your_output

```
The `Intervar.py` can run when python version > 2.6 .
If you see above screen output after `python Intervar.py` , that mean the InterVar can run on your system without problem.
Otherwise, please check your python version using `env python --version`

Next we need to download the ANNOVAR and  OMIM dataset.

## Download Third-party Program and datasets

Several third-party researchers have provided additional annotation program and datasets that can be used by InterVar directly. However, users need to agree to specific license terms set forth by the third parties:


* ANNOVAR main package : The latest version of ANNOVAR (2016Feb01) can be downloaded [here](http://www.openbioinformatics.org/annovar/annovar_download_form.php) (registration required).  ANNOVAR is written in Perl and can be run as a standalone application on diverse hardware systems where standard Perl modules are installed.

* OMIM dataset: Please download the  mim2gene.txt  from OMIM at [here](http://www.omim.org/downloads),Please use the updated files from OMIM, outdated files will bring problems of InterVar.


Now,assume that we have downloaded ANNOVAR package and used `tar xvfz annovar.latest.tar.gz` to unpack the package. You will see that the `bin/` directory contains several Perl programs with .pl suffix. 

Also Download the mim2gene.txt by using `wget https://www.omim.org/static/omim/data/mim2gene.txt -O mim2gene.txt`.

```
qli@sched1|:~/InterVar-master> wget https://www.omim.org/static/omim/data/mim2gene.txt -O mim2gene.txt
--2017-02-21 11:47:05--  https://www.omim.org/static/omim/data/mim2gene.txt
Resolving www.omim.org... 54.84.223.11
Connecting to www.omim.org|54.84.223.11|:443... connected.
HTTP request sent, awaiting response... 200 OK
Length: 1090455 (1.0M) [text/plain]
Saving to: "mim2gene.txt"

100%[=============================================================================================>] 1,090,455   2.31M/s   in 0.4s

2017-02-21 11:47:06 (2.31 MB/s) - "mim2gene.txt" saved [1090455/1090455]
```

Then please copy or link three ANNOVAR perl files: `annotate_variation.pl` `table_annovar.pl` `convert2annovar.pl` to InterVar's folder of `InterVar-master`.
 
Also please move or copy the `mim2gene.txt` to intervardb folder of `InterVar-master/intervardb`

```
qli@sched1|:~/tools/annovar> cp -f annotate_variation.pl table_annovar.pl convert2annovar.pl ~/InterVar-master/

qli@sched1|:~/InterVar-master> cp -f mim2gene.txt ~/InterVar-master/intervardb/

```

Please go to InterVar's install folder of `InterVar-master`,check and edit the config.ini using `vim config.ini`, please check these lines in the config.ini . The names and locations in config.ini  should match with your downloaded files:
 
 `mim2gene = %(database_intervar)s/mim2gene.txt` 
This line is for location of the OMIM's mim2gene file

`convert2annovar = ./convert2annovar.pl`
This line is for location of ANNOVAR's `convert2annovar.pl` file

`table_annovar = ./table_annovar.pl`
This line is for location of ANNOVAR's `table_annovar.pl` file

`annotate_variation = ./annotate_variation.pl`
This line is for location of ANNOVAR's `table_annovar.pl` file


```
[InterVar]
buildver = hg19
# hg19
inputfile = example/ex1.avinput
# the inputfile and the path  example/ex1.avinput hg19_clinvar_20151201.avinput
# tab-delimited will be better for including the other information
inputfile_type = AVinput
# the input file type VCF(vcf file with single sample),AVinput,VCF_m(vcf file with multiple samples)
outfile = example/myanno
# the output file location and prefix of output file
database_intervar = intervardb
# the database location/dir for Intervar
lof_genes = %(database_intervar)s/PVS1.LOF.genes
pm1_domain = %(database_intervar)s/PM1_domains_with_benigns
mim2gene = %(database_intervar)s/mim2gene.txt
#morbidmap = %(database_intervar)s/morbidmap.txt
mim_recessive = %(database_intervar)s/mim_recessive.txt
mim_domin = %(database_intervar)s/mim_domin.txt
mim_adultonset = %(database_intervar)s/mim_adultonset.txt
mim_pheno = %(database_intervar)s/mim_pheno.txt
mim_orpha = %(database_intervar)s/mim_orpha.txt
orpha = %(database_intervar)s/orpha.txt
knowngenecanonical = %(database_intervar)s/knownGeneCanonical.txt
pp2_genes = %(database_intervar)s/PP2.genes
bp1_genes = %(database_intervar)s/BP1.genes
ps1_aa = %(database_intervar)s/PS1.AA.change.patho
# do not add the builder version
ps4_snps = %(database_intervar)s/PS4.variants
# do not add the builder version
bs2_snps = %(database_intervar)s/BS2_hom_het
# do not add the builder version
exclude_snps = %(database_intervar)s/ext.variants
# do not add the builder version,the variant in this list will not check the frequency, it is causal.
# the list should be tab-delimited,format like this:
# Chr Pos Ref_allele Alt_allele
evidence_file = None
# add your own Evidence file for each Variant:
# evidence file as tab-delimited,format like this:
# Chr Pos Ref_allele Alt_allele  PM1=1;BS2=1;PP2=0
disorder_cutoff = 0.01
#It is for BS1: Allele frequency is greater than expected for disorder
[InterVar_Bool]
onetranscript = FALSE
# TRUE or FALSE: print out only one transcript for exonic variants (default: FALSE/all transcripts)
otherinfo = FALSE
# TRUE or FALSE: print out otherinfo (infomration in fifth column in queryfile,default: FALSE)
# this option only perform well with AVinput file,and the other information only can be put in the fifth column.  The information in >5th column will be lost.
# When input as  VCF or VCF_m files with otherinfo option, only het/hom will be kept, depth and qual will be lost.
[Annovar]
convert2annovar = ./convert2annovar.pl
#convert input file to annovar format
table_annovar = ./table_annovar.pl
# table_annovar.pl of file location
annotate_variation = ./annotate_variation.pl
# annotate_variation of file location
database_locat = humandb
# the database location/dir from annnovar   check if database file exists
database_names = refGene esp6500siv2_all 1000g2015aug avsnp144 dbnsfp30a clinvar_20160302 exac03 dbscsnv11 dbnsfp31a_interpro rmsk ensGene knownGene
# specify the database_names from ANNOVAR or UCSC
[Other]
current_version = Intervar_20170217
# pipeline version
public_dev = https://github.com/WGLab/InterVar/releases
```


## Prepare your input files:
The format of input file can be VCF or AVinput as ANNOVAR input,actually the input file only need information of Chr,Position start,Position end, Reference_allele,Alternative_allele.
```
qli@sched1|:~/work/InterVar/InterVar> head -4  example/ex1.avinput
1       948921  948921  T       C       comments: rs15842, a SNP in 5' UTR of ISG15
1       984971  984971  G       A       comments: rs111818381
1       984971  984971  G       C       comments: rs111818381
1       1404001 1404001 G       T       comments: rs149123833, a SNP in 3' UTR of ATAD3C
```

The input file type can be specified by option of  `--input_type`, there are three types:  AVinput(Annovar's format),VCF(VCF with single sample),VCF_m(VCF with multiple samples)

## Run the Annotation on the  file `example/ex1.avinput`.
Please be advice that for the first running, the InterVar will use the `perl ./annotate_variation.pl` to download the necessary ANNOVAR datasests,it will take some time.(If you also were ANNOVAR user before, you can specify the ANNOVAR's database_location by option `--database_locat`, you also can edit the config.ini, find the line `database_locat = humandb` and replace with your location  , InterVar will check if all database file exist in you provided location).From second running , InterVar will not  download the same ANNOVAR's datasets again.

```
qli@sched1|:~/InterVar-master> python Intervar.py  -i example/ex1.avinput  -o example/myanno
=============================================================================
InterVar
Interpretation of Pathogenic/Benign for variants using python scripts of InterVar.
=============================================================================

%prog 0.1.5
Written by Quan LI,leequan@gmail.com.
InterVar is free for non-commercial use without warranty.
Please contact the authors for commercial use.
Copyright (C) 2016 Wang Genomic Lab
============================================================================

Notice: Your command of InterVar is ['Intervar.py', '-i', 'example/ex1.avinput', '-o', 'example/myanno']
INFO: The options are {'pp2_genes': 'intervardb/PP2.genes', 'inputfile': 'example/ex1.avinput', 'exclude_snps': 'intervardb/ext.variants.hg19', 'annotate_variation': './annotate_variation.pl', 'ps4_snps': 'intervardb/PS4.variants.hg19', 'mim_recessive': 'intervardb/mim_recessive.txt', 'current_version': 'Intervar_20170217', 'bs2_snps': 'intervardb/BS2_hom_het.hg19', 'evidence_file': 'None', 'public_dev': 'https://github.com/WGLab/InterVar/releases', 'otherinfo': 'FALSE', 'database_names': 'refGene esp6500siv2_all 1000g2015aug avsnp144 dbnsfp30a clinvar_20160302 exac03 dbscsnv11 dbnsfp31a_interpro rmsk ensGene knownGene', 'mim_pheno': 'intervardb/mim_pheno.txt', 'table_annovar': './table_annovar.pl', 'buildver': 'hg19', 'inputfile_type': 'AVinput', 'onetranscript': 'FALSE', 'mim2gene': 'intervardb/mim2gene.txt', 'orpha': 'intervardb/orpha.txt', 'ps1_aa': 'intervardb/PS1.AA.change.patho.hg19', 'mim_adultonset': 'intervardb/mim_adultonset.txt', 'morbidmap': 'intervardb/morbidmap.txt', 'outfile': 'example/myanno', 'knowngenecanonical': 'intervardb/knownGeneCanonical.txt', 'convert2annovar': './convert2annovar.pl', 'database_locat': 'humandb', 'database_intervar': 'intervardb', 'lof_genes': 'intervardb/PVS1.LOF.genes', 'disorder_cutoff': '0.01', 'mim_domin': 'intervardb/mim_domin.txt', 'pm1_domain': 'intervardb/PM1_domains_with_benigns', 'mim_orpha': 'intervardb/mim_orpha.txt', 'bp1_genes': 'intervardb/BP1.genes'}
Notice: the folder of humandb is created!
Warning: The Annovar dataset file of refGene is not in humandb,begin to download this humandb/hg19_refGene.txt ...
perl ./annotate_variation.pl -buildver hg19 -downdb -webfrom annovar refGene humandb
NOTICE: Web-based checking to see whether ANNOVAR new version is available ... Done
NOTICE: Downloading annotation database http://www.openbioinformatics.org/annovar/download/hg19_refGene.txt.gz ... OK
NOTICE: Downloading annotation database http://www.openbioinformatics.org/annovar/download/hg19_refGeneMrna.fa.gz ... OK
NOTICE: Downloading annotation database http://www.openbioinformatics.org/annovar/download/hg19_refGeneVersion.txt.gz ... OK
NOTICE: Uncompressing downloaded files
NOTICE: Finished downloading annotation files for hg19 build version, with files saved at the 'humandb' directory
Warning: The Annovar dataset file of esp6500siv2_all is not in humandb,begin to download this humandb/hg19_esp6500siv2_all.txt ...
perl ./annotate_variation.pl -buildver hg19 -downdb -webfrom annovar esp6500siv2_all humandb
......
......
......
perl ./annotate_variation.pl -buildver hg19 -downdb -webfrom annovar ensGene humandb
NOTICE: Web-based checking to see whether ANNOVAR new version is available ... Done
NOTICE: Downloading annotation database http://www.openbioinformatics.org/annovar/download/hg19_ensGene.txt.gz ... OK
NOTICE: Downloading annotation database http://www.openbioinformatics.org/annovar/download/hg19_ensGeneMrna.fa.gz ... OK
NOTICE: Uncompressing downloaded files
NOTICE: Finished downloading annotation files for hg19 build version, with files saved at the 'humandb' directory
Warning: The Annovar dataset file of knownGene is not in humandb,begin to download this humandb/hg19_knownGene.txt ...
perl ./annotate_variation.pl -buildver hg19 -downdb -webfrom annovar knownGene humandb
NOTICE: Web-based checking to see whether ANNOVAR new version is available ... Done
NOTICE: Downloading annotation database http://www.openbioinformatics.org/annovar/download/hg19_knownGene.txt.gz ... OK
NOTICE: Downloading annotation database http://www.openbioinformatics.org/annovar/download/hg19_kgXref.txt.gz ... OK
NOTICE: Downloading annotation database http://www.openbioinformatics.org/annovar/download/hg19_knownGeneMrna.fa.gz ... OK
NOTICE: Uncompressing downloaded files
NOTICE: Finished downloading annotation files for hg19 build version, with files saved at the 'humandb' directory
perl ./table_annovar.pl example/ex1.avinput humandb -buildver hg19 -remove -out example/myanno -protocol refGene,esp6500siv2_all,1000g2015aug_all,avsnp144,dbnsfp30a,clinvar_20160302,exac03,dbscsnv11,dbnsfp31a_interpro,rmsk,ensGene,knownGene  -operation  g,f,f,f,f,f,f,f,f,r,g,g   -nastring .
-----------------------------------------------------------------
```
After download all the ANNOVAR datasets, then beigin to annotate the variants:
```

NOTICE: Processing operation=g protocol=refGene

NOTICE: Running with system command <annotate_variation.pl -geneanno -buildver hg19 -dbtype refGene -outfile example/myanno.refGene -exonsort example/ex1.avinput humandb>
NOTICE: Output files were written to example/myanno.refGene.variant_function, example/myanno.refGene.exonic_variant_function
NOTICE: Reading gene annotation from humandb/hg19_refGene.txt ... Done with 52068 transcripts (including 11837 without coding sequence annotation) for 26464 unique genes
NOTICE: Processing next batch with 18 unique variants in 18 input lines
NOTICE: Reading FASTA sequences from humandb/hg19_refGeneMrna.fa ... Done with 17 sequences
WARNING: A total of 356 sequences will be ignored due to lack of correct ORF annotation
-----------------------------------------------------------------
NOTICE: Processing operation=f protocol=esp6500siv2_all

NOTICE: Running system command <annotate_variation.pl -filter -dbtype esp6500siv2_all -buildver hg19 -outfile example/myanno example/ex1.avinput humandb>
NOTICE: the --dbtype esp6500siv2_all is assumed to be in generic ANNOVAR database format
NOTICE: Variants matching filtering criteria are written to example/myanno.hg19_esp6500siv2_all_dropped, other variants are written to example/myanno.hg19_esp6500siv2_all_filtered
NOTICE: Processing next batch with 18 unique variants in 18 input lines
NOTICE: Database index loaded. Total number of bins is 594771 and the number of bins to be scanned is 12
NOTICE: Scanning filter database humandb/hg19_esp6500siv2_all.txt...Done
......
......
......

NOTICE: Processing operation=g protocol=knownGene

NOTICE: Running with system command <annotate_variation.pl -geneanno -buildver hg19 -dbtype knownGene -outfile example/myanno.knownGene -exonsort example/ex1.avinput humandb>
NOTICE: Output files were written to example/myanno.knownGene.variant_function, example/myanno.knownGene.exonic_variant_function
NOTICE: Reading gene annotation from humandb/hg19_knownGene.txt ... Done with 78963 transcripts (including 18502 without coding sequence annotation) for 28495 unique genes
NOTICE: Processing next batch with 18 unique variants in 18 input lines
NOTICE: Reading FASTA sequences from humandb/hg19_knownGeneMrna.fa ... Done with 47 sequences
WARNING: A total of 43 sequences will be ignored due to lack of correct ORF annotation
-----------------------------------------------------------------
NOTICE: Multianno output file is written to example/myanno.hg19_multianno.txt

Notice: Begin the variants interpretation by InterVar
Notice: About 18 lines in your variant file!
Notice: About 22 variants has been processed by InterVar
Notice: The InterVar is finished, the output file is [ example/myanno.hg19_multianno.txt.intervar ]
=============================================================================
Thanks for using InterVar!
Report bugs to leequan@gmail.com;
InterVar homepage: <https://wInterVar.wglab.org>
=============================================================================


```
Then you can check your result file `example/myanno.hg19_multianno.txt.intervar`.

```
qli@sched1|:~/InterVar-master> head -3 example/myanno.hg19_multianno.txt.intervar
#Chr    Start   End     Ref     Alt     Ref.Gene        Func.refGene    ExonicFunc.refGene      Gene.ensGene    avsnp144        AAChange.ensGene       AAChange.refGene        clinvar: Clinvar         InterVar: InterVar and Evidence        Freq_ExAC_ALL   Freq_esp6500siv2_all   Freq_1000g2015aug_all   CADD_raw        CADD_phred      SIFT_score      GERP++_RS       phyloP46way_placental   dbscSNV_ADA_SCORE      dbscSNV_RF_SCORE        Interpro_domain AAChange.knownGene      rmsk    MetaSVM_score   Freq_ExAC_POPs  OMIM    Phenotype_MIM OrphaNumber      Orpha
1       948921  948921  T       C       ISG15   UTR5    .       ENSG00000187608 rs15842 .       .       clinvar: UNK     InterVar: Benign PVS1=0 PS=[0, 0, 0, 0, 0] PM=[0, 0, 0, 0, 0, 0, 0] PP=[0, 0, 0, 0, 0, 0] BA1=1 BS=[1, 0, 0, 0, 0] BP=[0, 0, 0, 0, 0, 0, 0, 0]      0.9416   0.8858  0.903155        .       .       .       .       .       .       .       .       .       .       .       AFR:0.7386,AMR:0.9632,EAS:0.9998,FIN:0.9681,NFE:0.9543,OTH:0.9410,SAS:0.9617   147571  616126; 319563; 319563|MSMD due to complete ISG15 deficiency|<1 / 1 000 000|Autosomal recessive|Childhood|616126 ~
1       984971  984971  G       A       AGRN    exonic  nonsynonymous SNV       ENSG00000188157 rs111818381     ENSG00000188157:ENST00000379370:exon26:c.G4540A:p.A1514T       AGRN:NM_198576:exon26:c.G4540A:p.A1514T clinvar: Likely benign   InterVar: Likely benign PVS1=0 PS=[0, 0, 0, 0, 0] PM=[0, 0, 0, 0, 0, 0, 0] PP=[0, 0, 0, 0, 0, 0] BA1=0 BS=[1, 0, 0, 0, 0] BP=[0, 0, 0, 1, 0, 1, 0, 0]         0.01270.0079   0.00439297      -0.923  0.023   0.594   -1.43   .       .       .       Concanavalin A-like lectin/glucanase domain;Laminin G domain   AGRN:uc001ack.2:exon26:c.G4540A:p.A1514T        .       -1.041  AFR:0.0034,AMR:0.0160,EAS:0,FIN:0.0162,NFE:0.0191,OTH:0.0174,SAS:0.0033        103320  615120; 590;98913;98914;        590|CMS|1-9 / 1 000 000|Autosomal dominant<br>or&nbsp;Autosomal recessive|Infancy<br>Neonatal|254190 254210 254300 601462 603034 605809 608930 608931 610542 614198 614750 615120 616040 616227 616228 616304 616313 616314 616321 616322 616323 616324 616325 616326 616330 616720 617143 ~98913|-|-|-|-|254300 601462 605809 608930 608931 614198 615120 616304 616313 616314 616321 616322 616323 616324 616325 616326 616720 ~98914|-|-|Autosomal dominant<br>or&nbsp;Autosomal recessive|-|254210 615120 616040 616330 616720 617143 ~

```
The resutl is tab-delimited,you can import this file into Excel, The colunm of "InterVar: InterVar and Evidence" give the InterVar interpretation result with all the criteria.



## Advanced usage: 

* How to add your own evidence 

In this section, I will give the example of how to add the user's own evidence for the variants.

For one variant in the example:

`1   67705958    67705958    G   A   IL23R   exonic  nonsynonymous SNV`

Firstly, we need to check the automated interpretation information in the `example/myanno.hg19_multianno.txt.intervar ` by `grep "67705958"  example/myanno.hg19_multianno.txt.intervar | awk -F '\t' '{OFS=FS;print $1,$2,$3,$4,$5,$6,$7,$8,$14}'`

```
qli@sched1|:~/InterVar-master> grep "67705958"  example/myanno.hg19_multianno.txt.intervar | awk -F '\t' '{OFS=FS;print $1,$2,$3,$4,$5,$6,$7,$8,$14}'
1       67705958        67705958        G       A       IL23R   exonic  nonsynonymous SNV        InterVar: Uncertain significance PVS1=0 PS=[0, 0, 0, 0, 0] PM=[0, 0, 0, 0, 0, 0, 0] PP=[0, 0, 0, 0, 0, 0] BA1=0 BS=[1, 0, 0, 0, 0] BP=[0, 0, 0, 0, 0, 0, 0, 0]

```

This variant is annotated by InterVar as `Uncertain significance`, and the criteria is 

`PVS1=0 PS=[0, 0, 0, 0, 0] PM=[0, 0, 0, 0, 0, 0, 0] PP=[0, 0, 0, 0, 0, 0] BA1=0 BS=[1, 0, 0, 0, 0] BP=[0, 0, 0, 0, 0, 0, 0, 0]`

Only BS1=1, all other criterai is 0;

We want add two criteria  as PS3=1 for "Well-established in vitro or in vivo functional studies supportive of a damaging effect " and  PM6=1 for "Assumed de novo, but without confirmation of paternity and maternity".

Please vim a tab-delimited text file with name as "evdience.txt". The format should be like:

Chr Position Ref_allele Alt_allele evidence_list

(If you want to add more than one  criteria ,it should be semicolon-delimited in the evidence_list column.)

it will like this:

```
qli@sched1|:~/InterVar-master> cat evdience.txt
1       67705958        G       A       PS3=1;PM6=1

```
Re-run the annotation and add the option of --evidence_file by `python Intervar.py  -i example/ex1.avinput  -o example/myanno --evidence_file=evdience.txt`

```
qli@sched1|:~/InterVar-master> python Intervar.py  -i example/ex1.avinput  -o example/myanno --evidence_file=evdience.txt               =============================================================================
InterVar
Interpretation of Pathogenic/Benign for variants using python scripts of InterVar.
=============================================================================

%prog 0.1.5
Written by Quan LI,leequan@gmail.com.
InterVar is free for non-commercial use without warranty.
Please contact the authors for commercial use.
Copyright (C) 2016 Wang Genomic Lab
============================================================================

Notice: Your command of InterVar is ['Intervar.py', '-i', 'example/ex1.avinput', '-o', 'example/myanno', '--evidence_file=evdience.txt']
Warning: You provided your own evidence file [ evdience.txt ] for the InterVar.
INFO: The options are {'pp2_genes': 'intervardb/PP2.genes', 'inputfile': 'example/ex1.avinput', 'exclude_snps': 'intervardb/ext.variants.hg19', 'annotate_variation': './annotate_variation.pl', 'ps4_snps': 'intervardb/PS4.variants.hg19', 'mim_domin': 'intervardb/mim_domin.txt', 'current_version': 'Intervar_20170217', 'bs2_snps': 'intervardb/BS2_hom_het.hg19', 'evidence_file': 'evdience.txt', 'public_dev': 'https://github.com/WGLab/InterVar/releases', 'otherinfo': 'FALSE', 'database_names': 'refGene esp6500siv2_all 1000g2015aug avsnp144 dbnsfp30a clinvar_20160302 exac03 dbscsnv11 dbnsfp31a_interpro rmsk ensGene knownGene', 'mim_pheno': 'intervardb/mim_pheno.txt', 'table_annovar': './table_annovar.pl', 'buildver': 'hg19', 'inputfile_type': 'AVinput', 'onetranscript': 'FALSE', 'mim2gene': 'intervardb/mim2gene.txt', 'orpha': 'intervardb/orpha.txt', 'ps1_aa': 'intervardb/PS1.AA.change.patho.hg19', 'mim_adultonset': 'intervardb/mim_adultonset.txt', 'knowngenecanonical': 'intervardb/knownGeneCanonical.txt', 'outfile': 'example/myanno', 'convert2annovar': './convert2annovar.pl', 'database_locat': 'humandb', 'database_intervar': 'intervardb', 'lof_genes': 'intervardb/PVS1.LOF.genes', 'disorder_cutoff': '0.01', 'mim_recessive': 'intervardb/mim_recessive.txt', 'pm1_domain': 'intervardb/PM1_domains_with_benigns', 'mim_orpha': 'intervardb/mim_orpha.txt', 'bp1_genes': 'intervardb/BP1.genes'}
Warning: the folder of humandb is already created!
Notice: Begin the variants interpretation by InterVar
Notice: About 18 lines in your variant file!
Notice: About 22 variants has been processed by InterVar
Notice: The InterVar is finished, the output file is [ example/myanno.hg19_multianno.txt.intervar ]
=============================================================================
Thanks for using InterVar!
Report bugs to leequan@gmail.com;
InterVar homepage: <https://wInterVar.wglab.org>
=============================================================================

```

Then we check the new result of `example/myanno.hg19_multianno.txt.intervar`, by `grep "67705958"  example/myanno.hg19_multianno.txt.intervar | awk -F '\t' '{OFS=FS;print $1,$2,$3,$4,$5,$6,$7,$8,$14}'`

```
qli@sched1|:~/InterVar-master> grep "67705958"  example/myanno.hg19_multianno.txt.intervar | awk -F '\t' '{OFS=FS;print $1,$2,$3,$4,$5,$6,$7,$8,$14}'
1       67705958        67705958        G       A       IL23R   exonic  nonsynonymous SNV        InterVar: Likely pathogenic PVS1=0 PS=[0, 0, 1, 0, 0] PM=[0, 0, 0, 0, 0, 1, 0] PP=[0, 0, 0, 0, 0, 0] BA1=0 BS=[1, 0, 0, 0, 0] BP=[0, 0, 0, 0, 0, 0, 0, 0]

```

The annotation results change to `Likely pathogenic`, and also you can find that  PS3 change to 1 and PM6 change to 1;





* How to change the strength of criteria

In this section, I will give the example of how to change the strength of  criteria.

we will use the same variant as before:

`1   67705958    67705958    G   A   IL23R   exonic  nonsynonymous SNV`

we already add more evidence `PS3=1;PM6=11, and we also want to increase the PM6 from moderate to strong:

The format for upgrad/downgrade of criteria should be like:    

`grade_PXX=2;grade_BXX=3`           `1 for Strong; 2 for Moderate; 3 for Supporting`

so we need add a `grade_PM6=1`, then the finally user own evidence file of evdience.txt will like this:

```
qli@sched1|:~/InterVar-master> cat evdience.txt
1       67705958        G       A       PS3=1;PM6=1;grade_PM6=1;

```

Then we re-interpret the variants:

```
qli@sched1|:~/InterVar-master> python Intervar.py  -i example/ex1.avinput  -o example/myanno --evidence_file=evdience.txt 
......
......
Notice: About 18 lines in your variant file!
Notice: About 22 variants has been processed by InterVar
Notice: The InterVar is finished, the output file is [ example/myanno.hg19_multianno.txt.intervar ]
=============================================================================
Thanks for using InterVar!
Report bugs to leequan@gmail.com;
InterVar homepage: <https://wInterVar.wglab.org>
=============================================================================

```

Check the new result of `example/myanno.hg19_multianno.txt.intervar`, by `grep "67705958"  example/myanno.hg19_multianno.txt.intervar | awk -F '\t' '{OFS=FS;print $1,$2,$3,$4,$5,$6,$7,$8,$14}'`

```
qli@sched1|:~/InterVar-master> grep "67705958"  example/myanno.hg19_multianno.txt.intervar | awk -F '\t' '{OFS=FS;print $1,$2,$3,$4,$5,$6,$7,$8,$14}'
1       67705958        67705958        G       A       IL23R   exonic  nonsynonymous SNV        InterVar: Pathogenic PVS1=0 PS=[0, 0, 1, 0, 0] PM=[0, 0, 0, 0, 0, 1, 0] PP=[0, 0, 0, 0, 0, 0] BA1=0 BS=[1, 0, 0, 0, 0] BP=[0, 0, 0, 0, 0, 0, 0, 0]

```
You can find that now the interpretation changed as `Pathogenic`.  Two strong pathogenic criteria will make clinical significance to `pathogenic`.




* 

## Tips:
There are  some tips for quickly running InterVar.



## Following is the full synopsis and options of InterVar

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
The input file type, it can be  AVinput(Annovar''sformat),VCF(VCF with single sample),VCF_m(VCF with multiple samples)

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

