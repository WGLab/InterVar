## Quick guide to InterVar

For beginners, the easiest way to use InterVar is to annotate a VCF file by ANNOVAR and generate a multianno file, then InterVar will use this file directly as input  for clinical interpretation.

1. You need install Python.
2. You need install [ANNOVAR](http://annovar.openbioinformatics.org/en/latest/)
3. You need download [InterVar](https://github.com/WGLab/InterVar/archive/master.zip) or git clone using URL  https://github.com/WGLab/InterVar.git
4. You need download other files such as mim2gene.txt and morbidmap from [OMIM](http://www.omim.org/downloads).Please use the updated files from OMIM, outdated files will bring problems of InterVar.
5. Downlad all necessary datasets from ANNOVAR( InterVar also will download automatically)
6. Prepare your input file, it can be VCF file or AVinput as ANNOVAR input,actually the input file only need information of Chr,Position start,Position end, Reference_allele,Alternative_allele 
7. Run the InterVar!



## EXAMPLE

    ./InterVar.py -c config.ini  # Run the examples in config.ini

    ./InterVar.py  -b hg19 -i your_input  --input_type=VCF  -o your_output

## Additional resources

A step-by-step protocol on using InterVar  is available at the manual document.

