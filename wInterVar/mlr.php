<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>InterVar-Interpretation of genetic variants by ACMG2015 guideline</title>

    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="css/half-slider.css" rel="stylesheet">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>

    <!-- Navigation -->
<?php        include "nav.html";        ?>
    <!-- Page Content -->
    <div class="container">

        <div class="row">
            <div class="col-lg-12">
                <h1>Interpretation of genetic variants by ACMG2015 guideline</h1>
                <p>InterVar is a bioinformatics software tool for clinical interpretation of genetic variants by the ACMG2015 guideline. The input to InterVar is an annotated file generated from ANNOVAR, while the output of InterVar is the classification of variants into 'Benign', 'Likely benign', 'Uncertain significance', 'Likely pathogenic' and 'Pathogenic', together with detailed evidence code.</p>

                     <HR>
            </div>
                <hr>
<?php

        $pvs1=$_POST["pvs1"];
        $ps1=$_POST["ps1"];
        $ps2=$_POST["ps2"];
        $ps3=$_POST["ps3"];
        $ps4=$_POST["ps4"];
        $pm1=$_POST["pm1"];
        $pm2=$_POST["pm2"];
        $pm3=$_POST["pm3"];
        $pm4=$_POST["pm4"];
        $pm5=$_POST["pm5"];
        $pm6=$_POST["pm6"];
        $pp1=$_POST["pp1"];
        $pp2=$_POST["pp2"];
        $pp3=$_POST["pp3"];
        $pp4=$_POST["pp4"];
        $pp5=$_POST["pp5"];
        $bp1=$_POST["bp1"];
        $bp2=$_POST["bp2"];
        $bp3=$_POST["bp3"];
        $bp4=$_POST["bp4"];
        $bp5=$_POST["bp5"];
        $bp6=$_POST["bp6"];
        $bp7=$_POST["bp7"];
        $bs1=$_POST["bs1"];
        $bs2=$_POST["bs2"];
        $bs3=$_POST["bs3"];
        $bs4=$_POST["bs4"];
        $ba1=$_POST["ba1"];

        $PVS1=0;
        $PS=array(0,0,0,0);
        $PM=array(0,0,0,0,0,0);
        $PP=array(0,0,0,0,0);
        $BA1=0;
        $BS=array(0,0,0,0);
        $BP=array(0,0,0,0,0,0,0);

        if( $pvs1!="") $PVS1=1;
        if( $ps1!="") $PS[0]=1;
        if( $ps2!="") $PS[1]=1;
        if( $ps3!="") $PS[2]=1;
        if( $ps4!="") $PS[3]=1;

        if( $pm1!="") $PM[0]=1;
        if( $pm2!="") $PM[1]=1;
        if( $pm3!="") $PM[2]=1;
        if( $pm4!="") $PM[3]=1;
        if( $pm5!="") $PM[4]=1;
        if( $pm6!="") $PM[5]=1;


        if( $pp1!="") $PP[0]=1;
        if( $pp2!="") $PP[1]=1;
        if( $pp3!="") $PP[2]=1;
        if( $pp4!="") $PP[3]=1;
        if( $pp5!="") $PP[4]=1;

        if( $ba1!="") $BA1=1;

        if( $bs1!="") $BS[0]=1;
        if( $bs2!="") $BS[1]=1;
        if( $bs3!="") $BS[2]=1;
        if( $bs4!="") $BS[3]=1;

        if( $bp1!="") $BP[0]=1;
        if( $bp2!="") $BP[1]=1;
        if( $bp3!="") $BP[2]=1;
        if( $bp4!="") $BP[3]=1;
        if( $bp5!="") $BP[4]=1;
        if( $bp6!="") $BP[5]=1;
        if( $bp7!="") $BP[6]=1;

    //#$BPS=("Pathogenic","Likely pathogenic","Benign","Likely benign","Uncertain significance");
        $BPS[0]="Pathogenic";
        $BPS[1]="Likely pathogenic";
        $BPS[2]="Benign";
        $BPS[3]="Likely benign";
        $BPS[4]="Uncertain significance";

    $BPS_out=4; // BPS=[4]:Uncertain significance
    $PAS_out=-1;
    $BES_out=-1;

    $PS_sum=array_sum($PS);
    $PM_sum=array_sum($PM);
    $PP_sum=array_sum($PP);
    $BS_sum=array_sum($BS);
    $BP_sum=array_sum($BP);

    if ($PVS1 ==1)
    {
        if ($PS_sum >=1) $PAS_out=0; // 0:Pathogenic
        if ($PM_sum >=2) $PAS_out=0;
        if ($PM_sum ==1 && $PP_sum ==1) $PAS_out=0;
        if ($PP_sum >=2) { $PAS_out=0;
                if ($PM_sum ==1) $PAS_out=1; // 1:Likely pathogenic
                }
        }
    if ($PS_sum >=2) $PAS_out=0;
    if ($PS_sum ==1){
        if ($PM_sum >=3) $PAS_out=0;
        if ($PM_sum ==2 && $PP_sum >=2) $PAS_out=0;
        if ($PM_sum ==1 && $PP_sum >=4) $PAS_out=0;
        if ($PM_sum ==1 || $PM_sum ==2) {$PAS_out=1;
                        if ($PS_sum ==1 && $PP_sum >=2) $PAS_out=1;}
        }
    if ($PM_sum >=3) $PAS_out=1;
    if ($PM_sum ==2 && $PP_sum >=2) $PAS_out=1;
    if ($PM_sum ==1 && $PP_sum >=4) $PAS_out=1;

    if ($BA1 ==1 || $BS_sum>=2)  $BES_out=2; #2:Benign
    if ($BS_sum==1 && $BP_sum==1) $BES_out=3; #3:Likely benign
    if ($BP_sum>=2) $BES_out=3;

    if ($PAS_out != -1 && $BES_out == -1) $BPS_out=$PAS_out;
    if ($PAS_out == -1 && $BES_out != -1) $BPS_out=$BES_out;
    if ($PAS_out == -1 && $BES_out == -1) $BPS_out=4;
    if ($PAS_out != -1 && $BES_out != -1) $BPS_out=4;

if($BPS_out ==4)
print("<center><h2>This variant is<u> $BPS[$BPS_out]</u></h2> </center>");
if($BPS_out <=1)
print("<center><h2>This variant is <font color=red><u>$BPS[$BPS_out]</u></h2></font> </center>");
if($BPS_out ==2 || $BPS_out ==3)
print("<center><h2>This variant is <font color=green><u>$BPS[$BPS_out]</u></h2></font> </center>");
print("<br>");
print("The evidence details:<br>");
print("PVS1: $PVS1 | ");
/*print("PS:["); for($i=0;$i< sizeof($PS)-1;$i++) print("$PS[$i],"); print("$PS[$i]] ");
print("PM:["); for($i=0;$i< sizeof($PM)-1;$i++) print("$PM[$i],"); print("$PM[$i]] ");
print("PP:["); for($i=0;$i< sizeof($PP)-1;$i++) print("$PP[$i],"); print("$PP[$i]] <br>");
print("BA1: $BA1 ");
print("BS:["); for($i=0;$i< sizeof($BS)-1;$i++) print("$BS[$i],"); print("$BS[$i]] ");
print("BP:["); for($i=0;$i< sizeof($BP)-1;$i++) print("$BP[$i],"); print("$BP[$i]] <br>");
 */

 for($i=0;$i<= sizeof($PS)-1;$i++) {$j=$i+1;print("PS$j:$PS[$i] | "); }
 for($i=0;$i<= sizeof($PM)-1;$i++) {$j=$i+1;print("PM$j:$PM[$i] | "); }
 for($i=0;$i<= sizeof($PP)-1;$i++) {$j=$i+1;print("PP$j:$PP[$i] | "); }
    
print("<br>&nbsp; BA1: $BA1 | ");
 for($i=0;$i<= sizeof($BS)-1;$i++) {$j=$i+1;print("BS$j:$BS[$i] | "); }
 for($i=0;$i<= sizeof($BP)-1;$i++) {$j=$i+1;print("BP$j:$BP[$i] | "); }
print("<br> ");


print("<font color=red>The evidence for Pathogenic:<br>");
    if($PVS1>0) print("PVS1 ");
for($i=1;$i<=sizeof($PS);$i++) if($PS[$i-1]>0)  print("PS$i ");
for($i=1;$i<=sizeof($PM);$i++) if($PM[$i-1]>0)  print("PM$i ");
for($i=1;$i<=sizeof($PP);$i++) if($PP[$i-1]>0)  print("PP$i ");
print("<br></font>");


print("<font color=green>The evidence for Benign:<br>");
    if($BA1>0) print("BA1 ");
for($i=1;$i<=sizeof($BS);$i++) if($BS[$i-1]>0)  print("BS$i ");
for($i=1;$i<=sizeof($BP);$i++) if($BP[$i-1]>0)  print("BP$i ");
print("<br></font>");

print("<hr><font size=3 color=black>Notes:<br>");
print("1.       The paper: Standards and guidelines for the interpretation of sequenc variants: a joint consensus recommendation of the American College of Medical Genetics and Genomics and the Association for Molecular Pathology <br>");
print("2.       The evidences of your provided<br>");



?>

<center>

<a href=javascript:history.go(-1) class="btn btn-info" >go back!</a><br>


        </div>

        <hr>


    </div>
    <!-- /.container -->
<?php        include "footer.html";        ?>
    <!-- jQuery -->
    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

    <!-- Script to Activate the Carousel -->
    <script>
    $('.carousel').carousel({
        interval: 5000 //changes the speed
    })
    </script>

</body>

</html>
