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
$rederij= $_POST['rederij'];
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
$cargoAantal= $_POST['cargoAantal'];
$cargoType= $_POST['cargoType'];
$cargoCbm= $_POST['cargoCbm'];
$cargoKg= $_POST['cargoKg'];
$cargoOmschrijving= $_POST['cargoOmschrijving'];


foreach($_POST as $key => $value) {
    $value = preg_replace('/[^A-Za-z0-9\-]/', '', $value); // Replace special chars with space.
}

$db = new database();
$conn = $db->connect();
$SQL= $conn->prepare("INSERT into globalFileTabel (expImp, klant, rederij, pol, pod, finalDest, vessel, voyage, ets, eta, etaDest, levertaanophalen, warehouse, closing, losRefWhs, laadAdres, laadDatum, laadTijd, shipperRef, poNr) VALUES (:expImp, :klant, :rederij, :pol, :pod, :finalDest, :vessel, :voyage, :ets, :eta, :etaDest, :levertaanophalen, :warehouse, :closing, :losRefWhs, :laadAdres, :laadDatum, :laadTijd, :shipperRef, :poNr)");
$SQL->execute(array('expImp'=>$expImp,'klant'=>$klant,'rederij'=>$rederij,'pol'=>$pol,'pod'=>$pod,'finalDest'=>$finalDest,'vessel'=>$vessel,'voyage'=>$voyage,'ets'=>$ets,'eta'=>$eta,'etaDest'=>$etaDest,'levertaanophalen'=>$levertaanophalen,'warehouse'=>$warehouse,'closing'=>$closing,'losRefWhs'=>$losRefWhs,'laadAdres'=>$laadAdres, 'laadDatum'=>$laadDatum,'laadTijd'=>$laadTijd,'shipperRef'=>$shipperRef,'poNr'=>$poNr)); 
// last inserted id
$lastid = $conn->lastInsertId();
$SQL3= $conn->prepare("INSERT into cargoTabel (cargoAantal, cargoType, cargoCbm, cargoKg, cargoOmschrijving, fileNr) VALUES (:cargoAantal, :cargoType, :cargoCbm, :cargoKg, :cargoOmschrijving, :lastid)");
$SQL3->execute(array('cargoAantal'=>$cargoAantal,'cargoType'=>$cargoType,'cargoCbm'=>$cargoCbm,'cargoKg'=>$cargoKg,'cargoOmschrijving'=>$cargoOmschrijving,'lastid'=>$lastid)); 
print "File is aangemaakt!<Br /><a href='begin.php?id=getfile&file=$lastid'>Bekijk file.</a>";

// hbl aanmaken
$shipperNaam = " ";
$shipperStraat = " ";
$shipperPostcodeStad = " ";
$shipperLand = " ";
$shipperExtra = " ";
$consigneeNaam = " ";
$consigneeStraat = " ";
$consigneePostcodeStad = " ";
$consigneeLand = " ";
$consigneeContact = " ";
$notifyNaam = " ";
$notifyStraat = " ";
$notifyPostcodeStad = " ";
$notifyLand = " ";
$notifyContact = " ";
$agentNaam = " ";
$agentStraat = " ";
$agentPostcodeStad = " ";
$agentLand = " ";
$agentContact = " ";
$chargesAccount = " ";
$aantalOrigineel = " ";
$clausule1 = " ";
$clausule2 = " ";
$clausule3 = " ";
$clausule4 = " ";

$db = new database();
$conn = $db->connect();
$SQL= $conn->prepare("INSERT into hblTabel (shipperNaam, shipperStraat, shipperPostcodeStad, shipperLand, shipperExtra, consigneeNaam, consigneeStraat, consigneePostcodeStad, consigneeLand, consigneeContact, notifyNaam, notifyStraat, notifyPostcodeStad, notifyLand, notifyContact, agentNaam, agentStraat, agentPostcodeStad, agentLand, agentContact, chargesAccount, aantalOrigineel, clausule1, clausule2, clausule3, clausule4, fileNr, UID) VALUES (:shipperNaam, :shipperStraat, :shipperPostcodeStad, :shipperLand, :shipperExtra, :consigneeNaam, :consigneeStraat, :consigneePostcodeStad, :consigneeLand, :consigneeContact, :notifyNaam, :notifyStraat, :notifyPostcodeStad, :notifyLand, :notifyContact, :agentNaam, :agentStraat, :agentPostcodeStad, :agentLand, :agentContact, :chargesAccount, :aantalOrigineel, :clausule1, :clausule2, :clausule3, :clausule4, :file, UID)");
$SQL->execute(array('shipperNaam'=>$shipperNaam, 'shipperStraat'=>$shipperStraat, 'shipperPostcodeStad'=>$shipperPostcodeStad, 'shipperLand'=>$shipperLand, 'shipperExtra'=>$shipperExtra, 'consigneeNaam'=>$consigneeNaam, 'consigneeStraat'=>$consigneeStraat, 'consigneePostcodeStad'=>$consigneePostcodeStad, 'consigneeLand'=>$consigneeLand, 'consigneeContact'=>$consigneeContact, 'notifyNaam'=>$notifyNaam, 'notifyStraat'=>$notifyStraat, 'notifyPostcodeStad'=>$notifyPostcodeStad, 'notifyLand'=>$notifyLand, 'notifyContact'=>$notifyContact, 'agentNaam'=>$agentNaam, 'agentStraat'=>$agentStraat, 'agentPostcodeStad'=>$agentPostcodeStad, 'agentLand'=>$agentLand, 'agentContact'=>$agentContact, 'chargesAccount'=>$chargesAccount, 'aantalOrigineel'=>$aantalOrigineel, 'clausule1'=>$clausule1, 'clausule2'=>$clausule2, 'clausule3'=>$clausule3, 'clausule4'=>$clausule4, 'file'=>$lastid)); 



}

  } else {
  include ($_SERVER['DOCUMENT_ROOT'].'/raymexworkingstation/functions/loggedout.php');
  }

?>
 
 