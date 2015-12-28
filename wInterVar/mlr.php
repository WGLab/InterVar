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
    <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
        <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="/">Start InterVar</a>
            </div>
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav">
                    <li>
                        <a href="#">About</a>
                    </li>
                    <li>
                        <a href="#">Services</a>
                    </li>
                    <li>
                        <a href="#">Contact</a>
                        </li>
                        <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">Related projects<span class="caret"></span></a>
                        <ul class="dropdown-menu" role="menu">
                            <li><a href="http://wannovar.usc.edu/">wANNOVAR</a></li>
                        </ul>
                        </li>
                    </ul>
                    <div class="navbar-header navbar-right col-md-3" >

                        <a class="title navbar-brand" href="http://genomics.usc.edu" style="padding:5px" ><img src="/WGL_long.png" alt="" style="height:100%;"></a>

                    </div>
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container -->
    </nav>

    <!-- Half Page Image Background Carousel Header -->
    <header id="myCarousel" class="carousel slide">
        <!-- Indicators -->
        <ol class="carousel-indicators">
            <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
            <li data-target="#myCarousel" data-slide-to="1"></li>
            <li data-target="#myCarousel" data-slide-to="2"></li>
        </ol>

        <!-- Wrapper for InterVars -->
        <div class="carousel-inner">
            <div class="item active">
                <!-- Set the first background image using inline CSS below. -->
                <div class="fill" style="background-image:url('http://placehold.it/1900x1080&text=InterVar One');"></div>
                <div class="carousel-caption">
                    <h2>Caption 1</h2>
                </div>
            </div>
            <div class="item">
                <!-- Set the second background image using inline CSS below. -->
                <div class="fill" style="background-image:url('http://placehold.it/1900x1080&text=InterVar Two');"></div>
                <div class="carousel-caption">
                    <h2>Caption 2</h2>
                </div>
            </div>
            <div class="item">
                <!-- Set the third background image using inline CSS below. -->
                <div class="fill" style="background-image:url('http://placehold.it/1900x1080&text=InterVar Three');"></div>
                <div class="carousel-caption">
                    <h2>Caption 3</h2>
                </div>
            </div>
        </div>

        <!-- Controls -->
        <a class="left carousel-control" href="#myCarousel" data-slide="prev">
            <span class="icon-prev"></span>
        </a>
        <a class="right carousel-control" href="#myCarousel" data-slide="next">
            <span class="icon-next"></span>
        </a>

    </header>

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
        if( $bp6!="") $BP[6]=1;

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
print("<br><hr>");
print("<font size=3 color=black>Notes:<br>");
print("1.       The risk <br>");
print("2.       The evidence<br>");





?>

<center>
<a href=javascript:history.go(-1)>go back!</a><br>


        </div>

        <hr>

        <!-- Footer -->
        <footer>
            <div class="row">
                <div class="col-lg-12">
                    <p>Copyright &copy; WangLab 2016</p>
                </div>
            </div>
            <!-- /.row -->
        </footer>

    </div>
    <!-- /.container -->

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
