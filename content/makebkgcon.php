<?php
require_once($_SERVER['DOCUMENT_ROOT'].'/raymexworkingstation/config/dbCnnct.php');
require_once($_SERVER['DOCUMENT_ROOT'].'/raymexworkingstation/config/layoutsettings.php');
require_once($_SERVER['DOCUMENT_ROOT'].'/raymexworkingstation/functions/bkg.php');
session_start();

    if (isset($_SESSION['gebruiker'])) 
  {
    function loadFileDetails($fileNr){
    $db = new database();
    $conn = $db->connect();
    $query0=$conn->prepare('SELECT * from globalFileTabel where fileNr=:fileNr');
    $query0->execute(array(':fileNr' => $fileNr));
    while($row0 = $query0->fetch()) {
    $klant= $row0['klant'];
    $pol= ucwords(strtolower($row0['pol']));
    $pod= ucwords(strtolower($row0['pod']));
    $finalDest= ucwords(strtolower($row0['finalDest']));
    $vessel= $row0['vessel'];
    $voyage= $row0['voyage'];
    $ets= $row0['ets'];
    $eta= $row0['eta'];
    $etaDest= $row0['etaDest'];
    $laadAdres= nl2br($row0['laadAdres']);
    $shipperRef= $row0['shipperRef'];
    $poNr= $row0['poNr'];
    $country= $row0['country'];
    $levertaanophalen= $row0['levertaanophalen']; 
    $warehouse= $row0['warehouse']; 
    $losRefWhs= $row0['losRefWhs'];
    $laadDatum= $row0['laadDatum']; 
    $laadTijd= $row0['laadTijd'];
    $closing= $row0['closing']; 

    return array($klant, $pol, $pod, $finalDest, $vessel, $voyage, $ets, $eta, $etaDest, $laadAdres, $shipperRef, $poNr, $country, $levertaanophalen, $warehouse, $losRefWhs, $laadDatum, $laadTijd, $closing);
                //0       1     2      3            4        5       6    7      8          9           10          11      12          13              14          15          16          17         18     
}
}
$fileNr = $_GET['file'];
$getDetails = loadFileDetails($fileNr);

?>

<html><head><title> </title>
<link rel="stylesheet" type="text/css" href="<?=$path?>/tmpl/stylingBkgcon.css" /> 
</head><body>
<div class='logotop'><center><img src='<?=$path?>/images/logo.jpg'></center></div><br />

<div class='bkgheadercontainer'>
<div class='bkgheader'><h1>Booking Confirmation</h1></div><br/>
</div>

<!-- customer details -->
<div class='customerdetailscontainer'>
<div class='vesseldetailsleft'>
<b><?=$getDetails[0];?><br /></b>
<?php
    $db = new database();
$conn = $db->connect();
$getKlant=$conn->prepare("SELECT * FROM adresTabel WHERE adresNaam=:klant");
$getKlant->execute(array('klant'=>$getDetails[0]));
while ($row1 = $getKlant->fetch()){
print "$row1[adresStraat]<br />";
print "$row1[adresPostcode]<br />";
print "$row1[adresStad]<br />";
print "$row1[adresLand]<br /><br />";
}
?>
</div>
<div class='vesseldetailsright'>
<b>Onze referentie:</b> RL<?=$fileNr;?><br />
<b>Uw referentie:</b> <?=$getDetails[10];?><br />
<b>PO Nr.:</b> <?=$getDetails[11];?>
</div>
</div>
<!-- end customer details -->


<!-- vessel details -->
<div class='vesseldetailscontainer'>
<div class='vesseldetailsleft'>
    <b>Vessel:</b> <?=$getDetails[4]?><br />
    <b>POL:</b> <?=$getDetails[1]?><br />
    <b>POD:</b> <?=$getDetails[2]?><br />
    <b>Final Destination:</b> <?=$getDetails[3]?><br />
</div>
<div class='vesseldetailsright'>
    <b>Voyage:</b> <?=$getDetails[5]?><br />
    <b>ETS:</b> <?=$getDetails[6]?><br />
    <b>ETA:</b> <?=$getDetails[7]?><br />
    <b>ETA Final Destination:</b> <?=$getDetails[8]?><br />    
</div>
</div>
<Br />
<!-- end vessel details -->


<!-- cargo details -->
<div class='middlecontainer'>
<div class='cargodetailscontainer'>
    <div class='cargodetailsblock'>

<?php
$totalaantal = 0;
$totalcbm = 0;
$totalkg = 0;
print "<h2>Cargo Details</h2>";
$db = new database();
$conn = $db->connect();
$getCargo=$conn->prepare("SELECT * FROM cargoTabel WHERE fileNr=:fileNr");
$getCargo->execute(array('fileNr'=>$fileNr));
while ($row = $getCargo->fetch()){
print "<div class='cargodetails'>$row[cargoAantal]</div>
<div class='cargodetails'>$row[cargoType]</div>
<div class='cargodetails'>$row[cargoCbm] Cbm</div>
<div class='cargodetails'>$row[cargoKg] Kg</div><br/>
<div class='cargodetails'>STC: $row[cargoOmschrijving]</div><br />";
$totalaantal += $row['cargoAantal'];
$totalcbm += $row['cargoCbm'];
$totalkg += $row['cargoKg'];
}
print "<br />";
print "<div class='cargototal'>Totaal: $totalaantal colli | $totalcbm CBM | $totalkg KG</div>";
?>
    </div>
</div>

<div class='cargodetailsblock'>
<?php
if($getDetails[13] == "levertaan"){
    print "<h2>Svp aanleveren op onderstaand adres:</h2>";
    print "<b>$getDetails[14]<Br /></b>";
    $db = new database();
$conn = $db->connect();
$getWhsAdres=$conn->prepare("SELECT * FROM adresTabel WHERE adresNaam=:warehouse");
$getWhsAdres->execute(array('warehouse'=>$getDetails[14]));
while ($row1 = $getWhsAdres->fetch()){
print "$row1[adresStraat]<br />";
print "$row1[adresPostcode]<br />";
print "$row1[adresStad]<br />";
print "$row1[adresLand]<br /><br />";


}
    print "Aanlever referentie: <b>$getDetails[15]</b> deze moet u vermelden bij aanlevering!<br />";
    print "Svp uiterlijk aanleveren op: <b>$getDetails[18]</b>.<Br /> Aanleveren kan maandag t/m donderdag tussen 07:30 t/m 14:30 & vrijdag tussen 07:30 en 12:30";
    
} elseif($getDetails[13] == "ophalen"){
    print "<h2>Afhaal gegevens:</h2>";
    print "Wij komen bij u laden op onderstaand adres:<Br/><Br/>";
    print "$getDetails[9] <br /><br />";
    print "Laaddatum: $getDetails[16] $getDetails[17] <Br />";
    print "Indien bovengenoemde informatie incorrect is laat dit dan svp zsm weten!";
} else {
    print "$getDetails[13]";
    }

?>
</div>
<p><p></p></p>
<div class='clausuledetails'>
<h2>Notes</h2>
<?=$ispm15?><br /><Br />
<?=$bkgclausules?><br />
<?php if($row[12] == "United States"){
    print $usaclausule;
} else {  }
    ?><br />
</div>
</div>

<!-- end cargo details -->


<!-- footer -->
<div class='footercontainer'>
<div class='footer'>
<?=$fenex?><br /><br />
<?=$adres?>
</div>
</div><Br />
<!-- end footer -->

</body></html>


<?php


    } else {
  include ($_SERVER['DOCUMENT_ROOT'].'/raymexworkingstation/functions/loggedout.php');
  }

  

?>