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
  <script src="js/jquery.min.js"></script>
  <script src="js/bootstrap.min.js"></script>


    <!-- Custom CSS -->
    <link href="css/half-slider.css" rel="stylesheet">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

<style>
table {
    width:100%;
}
table, th, td {
    border: 1px solid black;
    border-collapse: collapse;
}
th, td {
    padding: 5px;
    text-align: left;
}
table#t01 tr:nth-child(even) {
    background-color: #eee;
}
table#t01 tr:nth-child(odd) {
   background-color:#fff;
}
table#t01 th    {
    background-color: black;
    color: white;
}
</style>
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

//begin connect the database and display.
$dbhost = 'localhost';
$dbname = 'intervar_temp';
#$dbname = 'intervar';
$tablename = 'missense';

$conn = new Mongo("mongodb://$dbhost/$dbname");
$db=$conn->selectDB("$dbname");
$collection=$db->selectCollection("$tablename");

echo "<h4> For the  nonsynonymous SNV in exons</h4><br>";

$user_select=$_POST["queryType"];

if($user_select=="vkey")  //vkey
{
$vkey=trim($_POST["vkeys"]);
echo "user: $user_select $vkey";
$query = array('$or'=>array( array('Vkey1'=>$vkey),array('Vkey2'=>$vkey)));
#$query = array('Vkey1'=>$vkey);
#$query = array('Vkey2'=>$vkey);
}
#Vkey1   Vkey2   Chr     Start   End     Ref     Alt     Gene_refGene    Func_refGene    ExonicFunc_refGene     Gene_ensGene     snp138  Trans_ensGene   Exon_ensGene    NAchange_ensGene        AAchange_ensGene        NM     Clinvar  Intervar        PVS1    PS1     PS2     PS3     PS4     PM1     PM2     PM3     PM4     PM5     PM6    PP1      PP2     PP3     PP4     PP5     ba1     BS1     BS2     BS3     BS4     BP1     BP2     BP3     BP4    BP5      BP6     BP7     Evidence_list

if($user_select=="NM") // Query by Ref seq gene accession number  
     
{
$nm=trim($_POST["NM_num"]);
$nachange="c.".trim($_POST["NAchange1"]);
echo "You searched by  Ref seq gene accession number  with NM: $nm and NA change: $nachange";
$query = array('NM' => $nm, 'NAchange_ensGene' => $nachange);
#$query = array('NAchange_ensGene' => $nachange);
#$query = array('NM' => $nm);

}

if($user_select=="hgnc_gene") // Query by HGNC gene symbol  
     
{
$hgnc=trim($_POST["hgnc_gene"]);
$nachange="c.".trim($_POST["NAchange"]);
echo "You searched by HGNC gene symbol with name as $hgnc and  NA change: $nachange";
$query = array('Gene_refGene' => $hgnc, 'NAchange_ensGene' => $nachange);
#$query = array('GenerefGene' => $hgnc);

}

if($user_select=="dbsnp")  // Query by dbSNP ID  
     
{
$rs="rs".trim($_POST["rsnm"]);
echo "You searched by dbSNP ID with $rs";
$query = array('snp138'=>$rs);

}
if($user_select=="position")  // Query by chromosomal coordinate 
{
$hg=$_POST["build"];
if(is_numeric($_POST["cchr"]))$chr=(int)$_POST["chr"]; else $cchr=$_POST["chr"];
$pos=(int)trim($_POST["pos"]);
$ref=trim($_POST["ref"]);
$alt=trim($_POST["alt"]);
$query = array('Chr'=>$chr,'Start'=>$pos,'Ref' => $ref, 'Alt' => $alt);

echo "You searched by  chromosomal coordinates and Alleles<br> builder:$hg  Chr:$chr Pos:$pos Ref:$ref Alt:$alt";
}
if($user_select=="region")  // Query by genomic region
{
$hhg=$_POST["bbuild"];
if(is_numeric($_POST["cchr"]))$cchr=(int)$_POST["cchr"]; else $cchr=$_POST["cchr"];
$start=(int)trim($_POST["start"]);
$end=(int)trim($_POST["end"]);

if(($end-$start)>10000)
{
    echo "<br><font color=red> Your region for query is >10kb ! The Query was changed as  10kb from start position instead!</font><br>";
        $end=$start+10000;

    }
echo "You searched by genomic region<br> builder:$hhg  Chr:$cchr Start:$start End:$end";
$query = array('Chr'=>$cchr,'Start'=>array('$gte'=>$start),'End'=>array('$lte'=>$end));
}

echo "<br>";
echo "<br>";
#echo "my count:".$collection->count()."<br>";


$cursor = $collection->find($query)->limit(100);
//end serach



//begin display
echo "<div class=\"table-responsive data-double-scroll-bar-horizontal \">";

if($cursor->count()>0)
{
    echo "<table border=3 class=\"table\" style=\"width:100%\"  id=\"t01\">
        <tr>
        <th align='center'>Chr</th>
        <th align='center'>Position</th>
        <th align='center'>Ref</th>
        <th align='center'>Alt</th>
        <th align='center'>Gene (refGene)</th>
        <th align='center'>Intervar</th>
        <th align='center'>Clinvar</th>
        <th align='center'>Func (refGene)</th>
        <th align='center'>ExonicFunc (refGene)</th>
        <th align='center'>Gene (ensembl)</th>
        <th align='center'>SNP138</th>
        <th align='center'>Transcript (ensembl)</th>
        <th align='center'>Exon No. (ensembl)</th>
        <th align='center'>NAchange (ensembl)</th>
        <th align='center'>AAchange (ensembl)</th>
        <th align='center'>NM</th>
        <th align='center'>MAF in ExAC_ALL</th>
        <th align='center'>MAF in ESP6500</th>
        <th align='center'>MAF in 1000g2014oct</th>
        <th align='center'>CADD_raw</th>
        <th align='center'>CADD_phred</th>
        <th align='center'>SIFT_score</th>
        <th align='center'>GERP++_RS</th>
        <th align='center'>phyloP46way placental</th>
        <th align='center'>dbscSNV ADA_SCORE</th>
        <th align='center'>dbscSNV RF_SCORE</th>
        <th align='center'>Interpro_domain</th>

        </tr>         ";


foreach($cursor as $id=>$val){
#  var_dump($val);
    #        echo "<tr>
    #        <td>".$val["_ival["Vkey1"]."</td><td>".$val["Chr"]."</td><td>".$val["Start"]."</td><td>".$val["Gene_refGene"]."</td></tr>";
    echo "<tr>
        <td>".$val["Chr"]."</td>
        <td>".$val["Start"]."</td>
        <td>".$val["Ref"]."</td>
        <td>".$val["Alt"]."</td>
        <td>".$val["Gene_refGene"]."</td>
        <td>    <button type=\"button\" class=\"btn btn-danger btn-sm\"   data-placement=\"left\"  data-trigger=\"focus\" data-toggle=\"popover\" title=\"Evidence List\"  data-html=\"true\"
data-content=\"28 Evidences:<br><strong>PVS1:</strong>".$val["PVS1"]."<br> <strong>PS1:</strong>".$val["PS1"]."<br> <strong>PS2:</strong>".$val["PS2"]."<br> <strong>PS3:</strong>".$val["PS3"]."<br> <strong>PS4:</strong>".$val["PS4"]."<br> <strong>PM1:</strong>".$val["PM1"]."<br> <strong>PM2:</strong>".$val["PM2"]."<br> <strong>PM3:</strong>".$val["PM3"]."<br> <strong>PM4:</strong>".$val["PM4"]."<br> <strong>PM5:</strong>".$val["PM5"]."<br> <strong>PM6:</strong>".$val["PM6"]."<br> <strong>PP1:</strong>".$val["PP1"]."<br> <strong>PP2:</strong>".$val["PP2"]."<br> <strong>PP3:</strong>".$val["PP3"]."<br> <strong>PP4:</strong>".$val["PP4"]."<br> <strong>PP5:</strong>".$val["PP5"]."<br> <br> <strong>BA1:</strong>".$val["ba1"]."<br> <strong>BS1:</strong>".$val["BS1"]."<br> <strong>BS2:</strong>".$val["BS2"]."<br> <strong>BS3:</strong>".$val["BS3"]."<br> <strong>BS4:</strong>".$val["BS4"]."<br> <strong>BP1:</strong>".$val["BP1"]."<br> <strong>BP2:</strong>".$val["BP2"]."<br> <strong>BP3:</strong>".$val["BP3"]."<br> <strong>BP4:</strong>".$val["BP4"]."<br> <strong>BP5:</strong>".$val["BP5"]."<br> <strong>BP6:</strong>".$val["BP6"]."<br> <strong>BP7:</strong>".$val["BP7"]."\">

        ".$val["Intervar"]." </button> </td>
        <td>".$val["Clinvar"]."</td>
        <td>".$val["Func_refGene"]."</td>
        <td>".$val["ExonicFunc_refGene"]."</td>
        <td><a href=\"http://www.ensembl.org/Homo_sapiens/Gene/Summary?g=".$val["Gene_ensGene"]."\" target=\"_blank\">".$val["Gene_ensGene"]."</a></td>
        <td><a href=\"http://www.ncbi.nlm.nih.gov/snp/?term=".$val["snp138"]."\" target=\"_blank\">".$val["snp138"]."</a></td>
        <td><a href=\"http://www.ensembl.org/Homo_sapiens/Transcript/Summary?t=".$val["Trans_ensGene"]."\" target=\"_blank\">".$val["Trans_ensGene"]."</a></td>

        <td>".$val["Exon_ensGene"]."</td>
        <td>".$val["NAchange_ensGene"]."</td>
        <td>".$val["AAchange_ensGene"]."</td>
        <td><a href=\"http://www.ncbi.nlm.nih.gov/nuccore/".$val["NM"]."\" target=\"_blank\">".$val["NM"]."</a></td>
        <td>".$val["ExAC_ALL"]."</td>
        <td>".$val["ESP6500"]."</td>
        <td>".$val["1000g2014oct"]."</td>
        <td>".$val["CADD_raw"]."</td>
        <td>".$val["CADD_phred"]."</td>
        <td>".$val["SIFT_score"]."</td>
        <td>".$val["GERP++_RS"]."</td>
        <td>".$val["phyloP46way_placental"]."</td>
        <td>".$val["dbscSNV_ADA_SCORE"]."</td>
        <td>".$val["dbscSNV_RF_SCORE"]."</td>
        <td>".$val["Interpro_domain"]."</td>

        </tr>   ";

}

echo "</table>";
echo "</div>";

}
else
{
    echo "<h4>Found Nothing!<h4><br>";
}




//end display















    ?>
<center>
        <hr>
<br>

<a href=javascript:history.go(-1) class="btn btn-info" >go back!</a><br>


        </div>

        <hr>


    </div>

<script>
$(document).ready(function(){
            $('[data-toggle="popover"]').popover();
});
</script>


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
