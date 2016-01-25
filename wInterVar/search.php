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
            <h4>  Search the Pathogenic or Benign of your missense variants:</h4><br></div>
        <br>


                    <hr>

<form  class="form-inline" role="form" enctype="multipart/form-data" action="results.php" method="post" bgcolor='#ddddee'>

                    <hr>
 <div class="panel-body"> <div class="radio"> 
<label> <input type="radio" name="queryType" id="qtype" value="position" checked> <strong>Query by genomic coordinate</strong> </label> </div>
<br>
<div class="form-group"> <select name="build" class="form-control"><option value="hg19" selected="selected" >hg19</option></select></div>

<div class="form-group"> Chr <select name="chr"  class="form-control">
                <option selected="selected" value="1">1</option>
                <option value="2">2</option>
                <option value="3">3</option>
                <option value="4">4</option>
                <option value="5">5</option>
                <option value="6">6</option>
                <option value="7">7</option>
                <option value="8">8</option>
                <option value="9">9</option>
                <option value="10">10</option>
                <option value="11">11</option>
                <option value="12">12</option>
                <option value="13">13</option>
                <option value="14">14</option>
                <option value="15">15</option>
                <option value="16">16</option>
                <option value="17">17</option>
                <option value="18">18</option>
                <option value="19">19</option>
                <option value="20">20</option>
                <option value="21">21</option>
                <option value="22">22</option>
                <option value="X">X</option>
</div>

<div class="form-group"> <label for="Pos"> POS </label><input type="text" class="form-control" id="pos" name="pos" placeholder="Enter position" size=12  maxlength="12" value="69134"></div>
<div class="form-group"> <label for="ref"> Ref:</label><input type="text" class="form-control" id="ref" name="ref" placeholder="Reference Allele" size=2  maxlength="1" value="A"></div>
<div class="form-group"> <label for="alt"> Alt:</label><input type="text" class="form-control" id="alt" name="alt" placeholder="Alternative Allele" size=2  maxlength="1" value="G"></div>
                    <hr>


 <div class="panel-body"> <div class="radio"> 
<label> <input type="radio" name="queryType" id="qtype" value="region"> <strong>Query by genomic region(<10kb)</strong> </label> </div>
<br>
<div class="form-group"> <select name="bbuild" class="form-control"><option value="hg19" selected="selected" >hg19</option></select></div>

<div class="form-group"> Chr <select name="cchr"  class="form-control">
                <option selected="selected"  value="1">1</option>
                <option value="2">2</option>
                <option value="3">3</option>
                <option value="4">4</option>
                <option value="5">5</option>
                <option value="6">6</option>
                <option value="7">7</option>
                <option value="8">8</option>
                <option value="9">9</option>
                <option value="10">10</option>
                <option value="11">11</option>
                <option value="12">12</option>
                <option value="13">13</option>
                <option value="14">14</option>
                <option value="15">15</option>
                <option value="16">16</option>
                <option value="17">17</option>
                <option value="18">18</option>
                <option value="19">19</option>
                <option value="20">20</option>
                <option value="21">21</option>
                <option value="22">22</option>
                <option value="X">X</option>
</div>

<div class="form-group"> <label for="pos"> Start: </label><input type="text" class="form-control" id="pos" name="start" placeholder="Start position" size=15  maxlength="15" value="881882"></div>
<div class="form-group"> <label for="ref"> - </label><input type="text" class="form-control" id="end" name="end" placeholder="End position " size=15  maxlength="15" value="887952"></div>
                    <hr>



                    <div class="radio">
                        <label>
                            <input type="radio" name="queryType" id="qtype_dbsnp" value="dbsnp" > 
                            <strong>Query by <a href="http://www.ncbi.nlm.nih.gov/projects/SNP/" target="_blank">dbSNP</a> ID</strong>
                        </label>
                    </div> <br>
                        <label for="snp">rs</label>
                        <div class="form-group">
                            <input class="form-control" type="text" name="rsnm" id="snp" size="15" maxlength="15" value="11081070">

                        </div>






                    <hr>
                    <div class="radio">
                        <label>
                            <input type="radio" name="queryType" id="qtype_gene" value="hgnc_gene"> 
                            <strong>Query by <a href="http://www.genenames.org/" target="_blank">HGNC</a> gene symbol</strong>
                        </label>
                    </div>
<br>
                            <div class="form-group">
                                <label for="Gene">Gene:</label>
                                <input class="form-control" type="text" name="hgnc_gene" id="Gene" size="20" maxlength="20" value="OR4F5">
                            </div>
                            <label for="iAAChange">NA change: c.</label>
                            <div class="form-group">
                                <input class="form-control" type="text" name="NAchange" id="NAChange" size="10" maxlength="12" value="T500A">
                            </div>


                    <hr>
                    <div class="radio">
                        <label>
                            <input type="radio" name="queryType" id="qtype_nm" value="NM"> 
                            <strong>Query by <a href="http://www.ncbi.nlm.nih.gov/refseq/" target="_blank">Ref seq</a> gene accession number</strong>
                        </label>
                    </div>
<br>
                            <div class="form-group">
                                <label for="iGene">Gene NM:</label>
                                <input class="form-control" type="text" name="NM_num" id="iGene" size="20" maxlength="20" value="NM_152486">
                            </div>
                            <label for="iAAChange">NA change: c.</label>
                            <div class="form-group">
                                <input class="form-control" type="text" name="NAchange1" id="iAAChange" size="10" maxlength="12" value="G83A">
                            </div>
<hr>
<!--

                    <div class="radio">
                        <label>
                            <input type="radio" name="queryType" id="vkey" value="vkey"> 
                            <strong>Query by <a href="https://rvs.u.hpc.mssm.edu/divas/vkey/" target="_blank">vkey</a></strong>
                        </label>
                    </div>
<br>
                            <div class="form-group"> 
<label for="vkey">Vkey:</label>
                            <input class="form-control" type="text" name="vkeys" id="vkeys" size="10" maxlength="25" value=" _@0J2yY0J2yY01">
                            </div>
-->




                    <br> 
                    <br> 
                 <input type="submit" name=".submit" class="btn  btn-default">
                 <input type="reset" name=".reset" class="col-sm-offset-1 btn  btn-default">

              </FORM>
        <hr>

        </div>



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
