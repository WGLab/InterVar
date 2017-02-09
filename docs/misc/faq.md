1. **How to report a bug or to ask a question?**

    The best way is: First, do read the website thoroughly especially FAQ. I received too many emails whose answers can easily be found in FAQ. Second, if you cannot find answer in FAQ or do not understand the answer well, then drop me an email  as which should contain (1) command line argument (2) error message in screen or the LOG file (3) sometimes example inputfile (4) in case you use Mac or Windows, let me know. The reason is that I can fix something or diagnose something only if I can understand the question and reproduce the results. So do yourself a favor and do me a favor, include details in your email to avoid wasting our mutual time sending multiple emails.

2. **Can I use wInterVar in batch mode?**

    Unfortunately the wInterVar server only takes variants one by one. You will need to download InterVar and run the command line tools to analyze many variants, such as an entire exome.

3. **What is the difference between the pre-built InterVar scores in ANNOVAR versus using InterVar?**

    To facilitate people with quick-and-dirty analysis of variants, we pre-computed InterVar step 1 (automated interpretation) scores for ~80 million missense/nonsense variants (based on refGene definition) and provide this database through ANNOVAR. However, please note that these scores are only for missense/nonsense variants, so you cannot interpret indels by this database. Furthermore, the variant definitions were purely based on RefSeq and it may miss some genuine missense/nonsense variants not defined in that particular version of RefSeq. Finally, the results are generated using all default parameters in InterVar, and they may not suit the specific needs of a user. For these reasons, caution should be exercised when using these results.


