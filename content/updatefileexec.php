<?php
require_once($_SERVER['DOCUMENT_ROOT'].'/raymexworkingstation/config/dbCnnct.php');

    if (isset($_SESSION['gebruiker'])) 
  {

$required = array('expImp', 'klant', 'pol', 'pod');

// Loop over field names, make sure each one exists and is not empty
$error = false;
foreach($required as $field) {
  if (empty($_POST[$field])) {
    $error = true;
  }
}

if ($error) {
  echo "All fields are required.";
} else {
$expImp= $_POST['expImp'];
$klant= $_POST['klant'];
$pol= strtolower($_POST['pol']);
$pod= strtolower($_POST['pod']);
$finalDest= strtolower($_POST['finalDest']);
$vessel= $_POST['vessel'];
$voyage= $_POST['voyage'];
$ets= $_POST['ets'];
$eta= $_POST['eta'];
$etaDest= $_POST['etaDest'];
$levertaanophalen= $_POST['levertaanophalen']; 
$warehouse= $_POST['warehouse'];
$closing= $_POST['closing']; 
$losRefWhs= $_POST['losRefWhs']; 
$laadAdres= $_POST['laadAdres'];
$laadDatum= $_POST['laadDatum'];
$laadTijd= $_POST['laadTijd'];
$shipperRef= $_POST['shipperRef'];
$poNr= $_POST['poNr'];
$fileNr= $_POST['fileNr'];
$rederij = $_POST['rederij'];
$commentFile = $_POST['commentFile'];
$carrierBooking = $_POST['carrierBooking'];


foreach($_POST as $key => $value) {
    $value = preg_replace('/[^A-Za-z0-9\-]/', '', $value); // Replace special chars with space.
}
$db = new database();
$conn = $db->connect();
$SQL= $conn->prepare("UPDATE globalFileTabel SET expImp = :expImp, klant = :klant, rederij = :rederij, pol = :pol, pod = :pod, finalDest = :finalDest, vessel = :vessel, voyage = :voyage, ets = :ets, eta = :eta, etaDest = :etaDest, levertaanophalen = :levertaanophalen, warehouse = :warehouse, closing = :closing, losRefWhs = :losRefWhs, laadAdres = :laadAdres,  laadDatum = :laadDatum, laadTijd = :laadTijd, shipperRef = :shipperRef, poNr = :poNr,  commentFile = :commentFile, carrierBooking = :carrierBooking WHERE fileNr = :fileNr");
$SQL->execute(array('expImp'=>$expImp,'klant'=>$klant,'rederij'=>$rederij, 'pol'=>$pol,'pod'=>$pod,'finalDest'=>$finalDest,'vessel'=>$vessel,'voyage'=>$voyage,'ets'=>$ets,'eta'=>$eta,'etaDest'=>$etaDest,'levertaanophalen'=>$levertaanophalen,'warehouse'=>$warehouse,'closing'=>$closing,'losRefWhs'=>$losRefWhs,'laadAdres'=>$laadAdres, 'laadDatum'=>$laadDatum,'laadTijd'=>$laadTijd,'shipperRef'=>$shipperRef,'poNr'=>$poNr,'fileNr'=>$fileNr, 'commentFile'=>$commentFile, 'carrierBooking'=>$carrierBooking)); 
print "File geupdate! <A href= 'begin.php?id=getfile&file=$fileNr'>Bekijk hier de file.</a>";

}

  } else {
  include ($_SERVER['DOCUMENT_ROOT'].'/raymexworkingstation/functions/loggedout.php');
  }

?>
 
 