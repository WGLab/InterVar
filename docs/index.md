# InterVar

InterVar is a bioinformatics software tool for clinical interpretation of genetic variants by the ACMG2015 guideline. The input to InterVar is an annotated file generated from ANNOVAR, while the output of InterVar is the classification of variants into 'benign', 'likely benign', 'VUS', 'likely pathogenic' and 'pathogenic', together with detailed evidence code.

- **Automated interpretation**: The ACMG-AMP published in 2015 the updated standards and guidelines for the clinical interpretation of sequence variants with respect to human diseases, based on 28 criteria. The InterVar can generate automated interpretation on 18 criteria: (PVS1, PS1, PS4, PM1, PM2, PM4, PM5, PP2, PP3, PP5, BA1, BS1, BS2, BP1, BP3, BP4, BP6, BP7)

- **Manual interpretation**: The rest of  criteria (PS2, PS3, PM3, PM6, PP1, PP4, BS3, BS4, BP2, BP5) requires user input in the manual adjustment step.  The user can provide these criteria in the evidence file.

- **Flexible interpretation**: 1.Enable fine-tuned adjustment of the strength of the criteria,we add the option for upgrade/downgrade (strong, moderate and supporting) in each category of criteria. 2. Additional criteria are being added to the ACMG/AMP framework guideline. We suppose that,for each of criteria category as strong,moderate or supporting, it will have up to 10 additional user-provided or outside criteria. We named all these additional criteria as PS5,PM7,PP6,BS5,BP8. All the information of Flexible interpretation can be provided in the evidence file. 

# Pipeline

 Check [here](misc/whatsnew.md) to see what is new in InterVar.

---

![new](img/new.png) 2017Jan26: The InterVar paper is published online now [here](http://www.sciencedirect.com/science/article/pii/S0002929717300046).

![new](img/new.png) 2016Jan24: The web server of InterVar as wInterVar is  online now [here](http://wintervar.wglab.org).

![new](img/new.png) 2015Nov16: The GitHub repository for InterVar is created.

---

## Reference

- Li Q, Wang K. InterVar: Clinical Interpretation of Genetic Variants by the 2015 ACMG-AMP Guidelines. _American Journal of Human Genetics_, 2:267-280, 2017 


