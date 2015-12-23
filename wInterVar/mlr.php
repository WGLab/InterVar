<html>
<head>
<meta http-equiv="Content-Language" content="en-us">
<meta http-equiv="Content-Type" content="text/html;">
<title>Results of InterVar</title>
<!--mstheme--><link rel="stylesheet" href="expe1111-106.css">
<meta name=" Prediction" content="Prediction">
</head>



<body bgcolor='white'>
        <td align=left class="style3"><i><b><font face="Times New Roman" size="7" color="#0000FF">
            InterVar</font></b></i><em><font face="Times New Roman" color="#0000ff" size="6"><strong><br>
<DIV align='center'>
     <hr> </font>
     <!--     <p><font size="7" color="#0000FF" face="Times New Roman"><em><strong>RNA Binding Residue&nbsp;Prediction</strong></em></font></p> -->
     </DIV>


<?php

#$height=$_POST["height"];
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
	if( $bp6!="") $BP[6]=1;

    #$BPS=("Pathogenic","Likely pathogenic","Benign","Likely benign","Uncertain significance");
	$BPS[0]="Pathogenic";
	$BPS[1]="Likely pathogenic";
	$BPS[2]="Benign";
	$BPS[3]="Likely benign";
	$BPS[4]="Uncertain significance";

    $PAS_out=-1;
    $BES_out=-1;
    $BPS_out=4; # BPS=[4]:Uncertain significance

    $PS_sum=array_sum($PS);
    $PM_sum=array_sum($PM);
    $PP_sum=array_sum($PP);
    $BS_sum=array_sum($BS);
    $BP_sum=array_sum($BP);
	
    if ($PVS1 ==1) {
        if ($PS_sum >=1) $PAS_out=0; # 0:Pathogenic
        if ($PM_sum >=2) $PAS_out=0;
        if ($PM_sum ==1 && $PP_sum ==1) $PAS_out=0;
        if ($PP_sum >=2) { $PAS_out=0;
		if ($PM_sum ==1) $PAS_out=1; # 1:Likely pathogenic
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

	

	/*
    PVS1=0
    PS=[0,0,0,0]
	PM=[0,0,0,0,0,0]
    PP=[0,0,0,0,0]

    BA1=0
    BS=[0,0,0,0]
    BP=[0,0,0,0,0,0,0]

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


	 */
if($BPS_out ==4)
print("<center>The status is $BPS[$BPS_out] </center>");
if($BPS_out <=1)
print("<center>The status is <font color=red>$BPS[$BPS_out]</font> </center>");
if($BPS_out ==2 || $BPS_out ==3)
print("<center>The status is <font color=green>$BPS[$BPS_out]</font> </center>");
print("<br><hr>");
print("<font size=2 color=green>Notes:<br>");
print("1.       The risk <br>");
print("2.       The evidence<br>");





?>

<center>
<hr>
<a href=javascript:history.go(-1)>go back!</a><br>
</body>
</html>
