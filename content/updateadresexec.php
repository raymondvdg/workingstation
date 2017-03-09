<?php
require_once($_SERVER['DOCUMENT_ROOT'].'/raymexworkingstation/config/dbCnnct.php');

    if (isset($_SESSION['gebruiker'])) 
  {

$required = array('adresNaam');

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
$adresNaam = $_POST['adresNaam'];
$adresStraat = $_POST['adresStraat'];
$adresPostcode = $_POST['adresPostcode'];
$adresStad = $_POST['adresStad'];
$adresLand = $_POST['adresLand'];
$adresTelefoon = $_POST['adresTelefoon'];
$adresBtw = $_POST['adresBtw'];
$adresEORI = $_POST['adresEORI'];
$adresRekening = $_POST['adresRekening'];
$adresContact = $_POST['adresContact']; 
$adresEmail = $_POST['adresEmail'];
$adresType = $_POST['adresType'];
$adresPost = $_POST['adresPost'];
$adresIban = $_POST['adresIban'];


foreach($_POST as $key => $value) {
    $value = preg_replace('/[^A-Za-z0-9\-]/', '', $value); // Replace special chars with space.
}

$db = new database();
$conn = $db->connect();
$SQL= $conn->prepare("UPDATE  adresTabel SET adresNaam = :adresNaam, adresStraat = :adresStraat, adresPostcode = :adresPostcode, adresStad = :adresStad, adresLand = :adresLand, adresTelefoon = :adresTelefoon, adresBtw = :adresBtw, adresEORI = :adresEORI, adresRekening = :adresRekening, adresContact = :adresContact, adresEmail = :adresEmail, adresType = :adresType, adresPost = :adresPost, adresIban = :adresIban WHERE adresNaam = :adresNaam");
$SQL->execute(array('adresNaam'=>$adresNaam,'adresStraat'=>$adresStraat,'adresPostcode'=>$adresPostcode,'adresStad'=>$adresStad,'adresLand'=>$adresLand,'adresTelefoon'=>$adresTelefoon,'adresBtw'=>$adresBtw,'adresEORI'=>$adresEORI,'adresRekening'=>$adresRekening,'adresContact'=>$adresContact,'adresEmail'=>$adresEmail,'adresType'=>$adresType,'adresPost'=>$adresPost, 'adresIban'=>$adresIban)); 
$urlnaam = urlencode($adresNaam);
print "Adres is aangepast!<Br /><a href='begin.php?id=getadres&klantnaam=$urlnaam'>Bekijk file.</a>";

}

  } else {
  include ($_SERVER['DOCUMENT_ROOT'].'/raymexworkingstation/functions/loggedout.php');
  }

?>
 
 