<?php
    require_once($_SERVER['DOCUMENT_ROOT'].'/raymexworkingstation/config/dbCnnct.php');
    require_once($_SERVER['DOCUMENT_ROOT'].'/raymexworkingstation/functions/seshandle.php');


$required = array('fileNr', 'UID');

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
$cargoAantal= $_POST['cargoAantal'];
$cargoType= $_POST['cargoType'];
$cargoCbm= $_POST['cargoCbm'];
$cargoKg= $_POST['cargoKg'];
$cargoOmschrijving= $_POST['cargoOmschrijving'];
$fileNr = $_POST['fileNr'];
$UID = $_POST['UID'];


// update cargo
$db = new database();
$conn = $db->connect();
$SQL3= $conn->prepare("UPDATE cargoTabel SET cargoAantal = :cargoAantal, cargoType = :cargoType, cargoCbm = :cargoCbm, cargoKg = :cargoKg, cargoOmschrijving = :cargoOmschrijving WHERE UID = :UID");
$SQL3->execute(array('cargoAantal'=>$cargoAantal,'cargoType'=>$cargoType,'cargoCbm'=>$cargoCbm,'cargoKg'=>$cargoKg,'cargoOmschrijving'=>$cargoOmschrijving,'UID'=>$UID)); 
print "File geupdate! <A href= 'begin.php?id=getfile&file=$fileNr'>Bekijk hier de file.</a>";
}
?>