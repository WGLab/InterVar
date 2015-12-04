#########################################################################
# Author: Lee Quan (leequan@gmail.com)
# Created Time: 2015-11-11 11:34:22 Tuesday
# File Name: Intervar.py File type: python
# Last Change:.
# Description: python script for  Interpretation of Pathogenetic Benign
#########################################################################
#!/usr/bin/env python

import configparser,copy,logging,os,io,re,time

paras = {}

def ConfigSectionMap(config,section):
        global paras
        options = config.options(section)
        for option in options:
                try:
                        paras[option] = config.get(section, option)
                        if paras[option] == -1:
                                DebugPrint("skip: %s" % option)
                except:
                        print("exception on %s!" % option)
                        paras[option] = None
        return

def check_downdb():
        path=paras['database_locat']
        path=path.strip()
        path=path.rstrip("\/")
        isExists=os.path.exists(path)
        if not isExists:
                os.makedirs(path)
                print("%s is created!" % path)
        else:
                print("%s is already created!" % path)
        ds=paras['database_names']
        ds.expandtabs(1);
        for dbs in ds.split():
                cmd="perl "+paras['annotate_variation']+" -buildver "+paras['buildver']+" -downdb -webfrom annovar "+dbs+" "+paras['database_locat']
                print("%s" %cmd)
                #os.system(cmd)

def check_input():
        inputft= paras['inputfile_type']
        if inputft.lower() == 'avinput' :
                return
        if inputft.lower() == 'vcf':
                #convert2annovar.pl -format vcf4 variantfile > variant.avinput
                cmd="perl "+paras['convert2annovar']+" -format vcf4 "+ paras['inputfile']+"> "+paras['inputfile']+".avinput"
                print("%s" %cmd)
                #os.system(cmd)
        return

def check_annovar_result():
# table_annovar.pl example/ex1.avinput humandb/ -buildver hg19 -out myanno -remove -protocol refGene,esp6500siv2_all,1000g2014oct_all,snp138,ljb26_all,clinvar_20150629,exac03,phastConsElements46way   -operation  g,f,f,f,f,f,f,r   -nastring . -csvout
        inputft= paras['inputfile_type']
        if inputft.lower() == 'avinput' :
                cmd="perl "+paras['table_annovar']+" "+paras['inputfile']+" "+paras['database_locat']+" -buildver "+paras['buildver']+" -remove -out "+ paras['outfile']+" -protocol refGene,esp6500siv2_all,1000g2014oct_all,snp138,ljb26_all,clinvar_20150629,exac03,phastConsElements46way   -operation  g,f,f,f,f,f,f,r   -nastring ."
        else:
                cmd="perl "+paras['table_annovar']+" "+paras['inputfile']+".avinput "+paras['database_locat']+" -buildver "+paras['buildver']+" -remove -out "+ paras['outfile']+" -protocol refGene,esp6500siv2_all,1000g2014oct_all,snp138,ljb26_all,clinvar_20150629,exac03,phastConsElements46way   -operation  g,f,f,f,f,f,f,r   -nastring ."
        print("%s" %cmd)
        os.system(cmd)
        return

def get_gdi_rvs_lof(gene_name,line_out,dicts,temple):
        try:
                line_out=line_out+"\t"+'\t'.join(str(e) for e in dicts[gene_name])
        except KeyError:
                line_out=line_out+"\t"+'\t'.join(str(e) for e in temple)
        else:
                pass
        return(line_out)


def check_gdi_rvs_LOF(anvfile):
        gdi={}
        rvs={}
        lof={}
        newoutfile=anvfile+".grl_p"
# begin open file  and set dicts for gdi rvs and lof:
        try:
                fh = open(paras['gdi_file'], "r")
                str = fh.read()
                for line in str.split('\n'):
                        cls=line.split('\t')
                        if len(cls)>1:
                                gdi[cls[0]]=cls[1:]
        except IOError:
                print("Error: can\'t read the annovar output file %s" % paras['gdi_file'])
                return
        else:
                pass
                fh.close()

        try:
                fh = open(paras['rvs_file'], "r")
                str = fh.read()
                for line in str.split('\n'):
                        cls=line.split('\t')
                        rvs['Gene']=['RVIS_ExAC_0.05%(AnyPopn)','%RVIS_ExAC_0.05%(AnyPopn)']
                        if len(cls)>1:
                                rvs[cls[4]]=cls[5:]
        except IOError:
                print("Error: can\'t read the annovar output file %s" % paras['rvs_file'])
                return
        else:
                pass
                fh.close()

        try:
                fh = open(paras['lof_file'], "r")
                str = fh.read()
                for line in str.split('\n'):
                        cls=line.split('\t')
                        if len(cls)>1:
                                lof[cls[0]]=cls[1:]
        except IOError:
                print("Error: can\'t read the annovar output file %s" % paras['lof_file'])
                return
        else:
                pass
                fh.close()

        try:
                fh = open(anvfile, "r")
                fw = open(newoutfile, "w")
                str = fh.read()
                for line in str.split('\n'):
                        cls=line.split('\t')
                        if len(cls)>1:
                                gene_name=cls[6]
                                if cls[6] == 'Gene.refGene':
                                        gene_name='Gene'
#some with multiple genes, so one gene by one gene  to annote
                                gdi_temp=['.', '.', '.', '.', '.', '.', '.', '.', '.', '.', '.', '.']
                                rvs_temp=['.', '.']
                                lof_temp=['.']
                                for gg in gene_name.split(','):
                                        line_out=line+"\t"+gg
                                        line_out=get_gdi_rvs_lof(gg,line_out,gdi,gdi_temp)
                                        line_out=get_gdi_rvs_lof(gg,line_out,rvs,rvs_temp)
                                        line_out=get_gdi_rvs_lof(gg,line_out,lof,lof_temp)
                                        fw.write("%s\n" % line_out)

#               fh.write("This is my test file for exception handling!!")
        except IOError:
                print("Error: can\'t read/write the annovar output file %s %s" % (anvfile,newoutfile))
                return
        else:
                pass
                fh.close()
                fw.close()

        return

def sum_of_list(list):
        sum=0
        for i in list:
                sum=sum+i
        return(sum)

def classfy(PVS1,PS,PM,PP,BA1,BS,BP):
        BPS=["Pathogenic","Likely pathogenic","Benign","Likely benign","Uncertain significance"]
        PAS_out=-1
        BES_out=-1
        BPS_out=4 # BPS=[4]:Uncertain significance

        PS_sum=sum_of_list(PS)
        PM_sum=sum_of_list(PM)
        PP_sum=sum_of_list(PP)
        BS_sum=sum_of_list(BS)
        BP_sum=sum_of_list(BP)
        #print("%d %d %d %d %d " %(PS_sum,PM_sum,PP_sum,BS_sum, BP_sum))
        if PVS1 ==1 :
                if PS_sum >=1: PAS_out=0 # 0:Pathogenic
                if PM_sum >=2: PAS_out=0
                if PM_sum ==1 and PP_sum ==1: PAS_out=0
                if PP_sum >=2: PAS_out=0
                if PM_sum ==1: PAS_out=1 # 1:Likely pathogenic
        if PS_sum >=2: PAS_out=0
        if PS_sum ==1:
                if PM_sum >=3: PAS_out=0
                if PM_sum ==2 and PP_sum >=2: PAS_out=0
                if PM_sum ==1 and PP_sum >=4: PAS_out=0
                if PM_sum ==1 or PM_sum ==2: PAS_out=1
        if PS_sum ==1 and PP_sum >=2: PAS_out=1
        if PM_sum >=3: PAS_out=1
        if PM_sum ==2 and PP_sum >=2: PAS_out=1
        if PM_sum ==1 and PP_sum >=4: PAS_out=1

        if BA1 ==1 or BS_sum>=2 : BES_out=2 #2:Benign
        if BS_sum==1 and BP_sum==1 :BES_out=3 #3:Likely benign
        if BP_sum>=2 :BES_out=3

        if PAS_out != -1 and BES_out == -1: BPS_out=PAS_out
        if PAS_out == -1 and BES_out != -1: BPS_out=BES_out
        if PAS_out == -1 and BES_out == -1: BPS_out=4
        if PAS_out != -1 and BES_out != -1: BPS_out=4

        #print("%d %d %d " %(PAS_out,BES_out,BPS_out))

        return(BPS[BPS_out])

def check_PVS1(line,Funcanno_flgs,Allels_flgs):
        '''
        Certain types of variants (e.g., nonsense, frameshift, canonical
        +- 1 or 2 splice sites, initiation codon, single exon or multiexon
        deletion) in a gene where LOF is a known mechanism of disease
        '''
        cls=line.split('\t')
        funcs_tmp=["nonsense","frameshift","splic"]
        line_tmp=cls[Funcanno_flgs['Func.refGene']]+" "+cls[Funcanno_flgs['ExonicFunc.refGene']]
        PVS=0
        # Funcanno_flgs={'Func.refGene':0,'ExonicFunc.refGene':0
        for fc in funcs_tmp:
                if line_tmp.find(fc)>=0 :
                        PVS=1
                        break
        # wait to check LOF genes



        return(PVS)

def check_PS1(line,Funcanno_flgs,Allels_flgs):
        '''
        PS1 Same amino acid change as a previously established pathogenic variant regardless of nucleotide change
        Example: Val->Leu caused by either G>C or G>T in the same codon
        '''

        PS1=0
        cls=line.split('\t')

        return(PS1)

def check_PS2(line,Funcanno_flgs,Allels_flgs):
        '''
        De novo (both maternity and paternity confirmed) in a patient with the disease and no family history
        '''
        PS2=0
        return(PS2)


def check_PS3(line,Funcanno_flgs,Allels_flgs):
        '''
        Well-established in vitro or in vivo functional studies supportive of a damaging effect on the gene or gene
        product
        '''
        PS3=0
        return(PS3)


def check_PS4(line,Funcanno_flgs,Allels_flgs):
        '''
        The prevalence of the variant in affected individuals is significantly increased compared with the prevalence
        in controls; OR
        '''
        PS4=0
        return(PS4)


def check_PM1(line,Funcanno_flgs,Allels_flgs):
        '''
        Located in a mutational hot spot and/or critical and well-established functional domain (e.g., active site of
        an enzyme) without benign variation
        '''
        PM1=0
        return(PM1)

def check_PM2(line,Funcanno_flgs,Allels_flgs):
        '''
        Absent from controls (or at extremely low frequency if recessive) (Table 6) in Exome Sequencing Project,
        1000 Genomes Project, or Exome Aggregation Consortium
        '''
        PM2=0
        return(PM2)

def check_PM3(line,Funcanno_flgs,Allels_flgs):
        '''
        For recessive disorders, detected in trans with a pathogenic variant
        '''
        PM3=0
        return(PM3)

def check_PM4(line,Funcanno_flgs,Allels_flgs):
        '''
        Protein length changes as a result of in-frame deletions/insertions in a nonrepeat region or stop-loss variants
        '''
        PM4=0
        return(PM4)

def check_PM5(line,Funcanno_flgs,Allels_flgs):
        '''
        Novel missense change at an amino acid residue where a different missense change determined to be
        pathogenic has been seen before;Example: Arg156His is pathogenic; now you observe Arg156Cys
        '''
        PM5=0
        return(PM5)

def check_PM6(line,Funcanno_flgs,Allels_flgs):
        '''
        Assumed de novo, but without confirmation of paternity and maternity
        '''
        PM6=0
        return(PM6)

def check_PP1(line,Funcanno_flgs,Allels_flgs):
        '''
        Cosegregation with disease in multiple affected family members in a gene definitively
        known to cause the disease
        '''
        PP1=0
        return(PP1)

def check_PP2(line,Funcanno_flgs,Allels_flgs):
        '''
        Missense variant in a gene that has a low rate of benign missense variation and in which
        missense variants are a common mechanism of disease
        '''
        PP2=0
        return(PP2)

def check_PP3(line,Funcanno_flgs,Allels_flgs):
        '''
        Multiple lines of computational evidence support a deleterious effect on the gene or gene product
        (conservation, evolutionary, splicing impact, etc.)
        '''
        PP3=0
        return(PP3)

def check_PP4(line,Funcanno_flgs,Allels_flgs):
        '''
        Patient's phenotype or family history is highly specific for a disease with a single genetic etiology
        '''
        PP4=0
        return(PP4)


def check_PP5(line,Funcanno_flgs,Allels_flgs):
        '''
        Reputable source recently reports variant as pathogenic, but the evidence is not available to the laboratory
        to perform an independent evaluation
        '''
        PP5=0
        return(PP5)

def check_BA1(line,Freqs_flgs,Allels_flgs):
        '''
        BA1 Allele frequency is >5% in Exome Sequencing Project, 1000 Genomes Project, or Exome Aggregation Consortium
        '''
        BA1=0
        #Freqs_flgs={'1000g2014oct_all':0,'esp6500siv2_all':0,'ExAC_ALL':0}
        cls=line.split('\t')
        for key in Freqs_flgs.keys():
                try:
                        if float(cls[Freqs_flgs[key]])>=0.05 and float(cls[Freqs_flgs[key]])<=0.5: BA1=1
                        if float(cls[Freqs_flgs[key]])>0.5 and float(cls[Freqs_flgs[key]])<=0.95: BA1=1
                except ValueError:
                        pass
                else:
                        pass

        return(BA1)

def check_BS1(line,Funcanno_flgs,Allels_flgs):
        '''
        Allele frequency is greater than expected for disorder (see Table 6)
        '''

        BS1=0
        return(BS1)

def check_BS2(line,Funcanno_flgs,Allels_flgs):
        '''
        Observed in a healthy adult individual for a recessive (homozygous), dominant (heterozygous), or X-linked
        (hemizygous) disorder, with full penetrance expected at an early age
        '''
        BS2=0
        return(BS2)

def check_BS3(line,Funcanno_flgs,Allels_flgs):
        '''
        Well-established in vitro or in vivo functional studies show no damaging effect on protein function or splicing
        '''
        BS3=0
        return(BS3)

def check_BS4(line,Funcanno_flgs,Allels_flgs):
        '''
        Lack of segregation in affected members of a family
        '''
        BS4=0
        return(BS4)

def check_BP1(line,Funcanno_flgs,Allels_flgs):
        '''
        Missense variant in a gene for which primarily truncating variants are known to cause disease
        '''
        BP1=0
        return(BP1)

def check_BP2(line,Funcanno_flgs,Allels_flgs):
        '''
        Observed in trans with a pathogenic variant for a fully penetrant dominant gene/disorder or observed
        in cis with a pathogenic variant in any inheritance pattern
        '''
        BP2=0
        return(BP2)

def check_BP3(line,Funcanno_flgs,Allels_flgs):
        '''
        In-frame deletions/insertions in a repetitive region without a known function
        '''
        BP3=0
        return(BP3)

def check_BP4(line,Funcanno_flgs,Allels_flgs):
        '''
        Multiple lines of computational evidence suggest no impact on gene or gene product (conservation,
        evolutionary,splicing impact, etc.)
        '''
        BP4=0
        return(BP4)


def check_BP5(line,Funcanno_flgs,Allels_flgs):
        '''
        Variant found in a case with an alternate molecular basis for disease
        '''
        BP5=0
        return(BP5)

def check_BP6(line,Funcanno_flgs,Allels_flgs):
        '''
        Reputable source recently reports variant as benign, but the evidence is not available to the
        laboratory to perform an independent evaluation
        '''
        BP6=0
        return(BP6)

def check_BP7(line,Funcanno_flgs,Allels_flgs):
        '''
        A synonymous (silent) variant for which splicing prediction algorithms predict no impact to the
        splice consensus sequence nor the creation of a new splice site AND the nucleotide is not highly
        conserved
        '''
        BP7=0
        return(BP7)


def assign(BP,line,Freqs_flgs,Funcanno_flgs,Allels_flgs):
        PVS1=0
        PS=[0,0,0,0]
        PM=[0,0,0,0,0,0]
        PP=[0,0,0,0,0]

        BA1=0
        BS=[0,0,0,0]
        BP=[0,0,0,0,0,0,0]

        PVS1=check_PVS1(line,Funcanno_flgs,Allels_flgs)
        PS1=check_PVS1(line,Funcanno_flgs,Allels_flgs)
        BA1=check_BA1(line,Freqs_flgs,Allels_flgs)
        print("PVS1= %s PS1= %s BA1= %s " %( PVS1,PS1,BA1))





        cls=line.split('\t')
        if len(cls)>1:#esp6500siv2_all 1000g2014oct_all ExAC_ALL
                BP_out=classfy(PVS1,PS,PM,PP,BA1,BS,BP)
                #print("%s " % BP_out)
                pass

        return(BP)


def search_key_index(line,dict):
        cls=line.split('\t')
        for key in dict.keys():
                for i in range(1,len(cls)):
                        ii=i-1
                        if key==cls[ii]:
                                dict[key]=ii
                                break
        return

def my_inter_var(annovar_outfile):
        newoutfile=annovar_outfile+".grl_p"

        Freqs_flgs={'1000g2014oct_all':0,'esp6500siv2_all':0,'ExAC_ALL':0}
        Funcanno_flgs={'Func.refGene':0,'ExonicFunc.refGene':0,'AAChange.refGene':0,'Gene':0}
        Allels_flgs={'Ref':0,'Alt':0}

        try:
                fh=open(newoutfile, "r")
                str=fh.read()
                line_sum=0;
                for line in str.split('\n'):
                        BP="UNK" # the inter of pathogenetic/benign
                        cls=line.split('\t')
                        if len(cls)<2: break
                        if line_sum==0:
                                search_key_index(line,Freqs_flgs)
                                search_key_index(line,Funcanno_flgs)
                                search_key_index(line,Allels_flgs)

                        else:
                                #print("%s " % cls[Freqs_flgs['1000g2014oct_all']])
                                assign(BP,line,Freqs_flgs,Funcanno_flgs,Allels_flgs)

                        line_sum=line_sum+1

        except IOError:
                print("Error: can\'t read the annovar output file %s" % newoutfile)
                return
        else:
                fh.close()
        return

def main():
        config=configparser.ConfigParser()
        config.read("config.ini")
        sections = config.sections()
        for section in sections:
                ConfigSectionMap(config,section)
        print ("The paras are %s " % paras)
        #check_downdb()
        #check_input()
        #check_annovar_result() #  to obtain myanno.hg19_multianno.csv
        annovar_outfile=paras['outfile']+"."+paras['buildver']+"_multianno.txt"
        #check_gdi_rvs_LOF(annovar_outfile)

        my_inter_var(annovar_outfile)



if __name__ == "__main__":
        main()
