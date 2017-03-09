<?php
require_once($_SERVER['DOCUMENT_ROOT'].'/raymexworkingstation/config/dbCnnct.php');
require_once($_SERVER['DOCUMENT_ROOT'].'/raymexworkingstation/functions/seshandle.php');


    if (isset($_SESSION['gebruiker'])) 
  {

function zoekBl($blNr){
print "<h1>Zoekresultaten</h1>";
$db = new database();
$conn = $db->connect();
$SQL= $conn->prepare("SELECT * from globalFileTabel WHERE fileNr=:blNr ORDER by fileNr");
$SQL->execute(array('blNr'=>$blNr));
print "<div class='searchresult'><b>B/L Nr</b></div>
<div class='searchresult'><b>Klant</b></div>
<div class='searchresult'><b>POL</b></div>
<div class='searchresult'><b>Destination</b></div>
<div class='searchresult'><b>ETS</b></div>
<div class='searchresult'><b>ETA</b></div>
<div class='searchresult'><b>Link</b></div><br />";
while($row = $SQL->fetch()){
if($SQL->rowCount() > 0){
$pod = ucwords(strtolower($row['pod']));
$pol = ucwords(strtolower($row['pol']));
print "<div class='searchresult'>$row[fileNr]</div>
<div class='searchresult'>$row[klant]</div>
<div class='searchresult'>$pol</div>
<div class='searchresult'>$pod</div>
<div class='searchresult'>$row[ets]</div>
<div class='searchresult'>$row[eta]</div>
<div class='searchresult'>
<a href='begin.php?id=getfile&file=$row[fileNr]'>Ga naar file</a></div><br />";
} else { print "Geen resultaten voor deze zoekopdracht"; }
}
print "<br />";
print "<a href='javascript: history.go(-1)'>Klik hier om terug te gaan naar het zoekvenster</a>";

}

function zoekCarrierBookingRef($carrierbookingref){
print "<h1>Zoekresultaten</h1>";
$db = new database();
$conn = $db->connect();
$SQL= $conn->prepare("SELECT * from globalFileTabel WHERE carrierBooking=:carrierbookingref ORDER by fileNr");
$SQL->execute(array('carrierbookingref'=>$carrierbookingref));
print "<div class='searchresult'><b>B/L Nr</b></div>
<div class='searchresult'><b>Klant</b></div>
<div class='searchresult'><b>POL</b></div>
<div class='searchresult'><b>Destination</b></div>
<div class='searchresult'><b>ETS</b></div>
<div class='searchresult'><b>ETA</b></div>
<div class='searchresult'><b>Link</b></div><br />";
while($row = $SQL->fetch()){
if($SQL->rowCount() > 0){
$pod = ucwords(strtolower($row['pod']));
$pol = ucwords(strtolower($row['pol']));
print "<div class='searchresult'>$row[fileNr]</div>
<div class='searchresult'>$row[klant]</div>
<div class='searchresult'>$pol</div>
<div class='searchresult'>$pod</div>
<div class='searchresult'>$row[ets]</div>
<div class='searchresult'>$row[eta]</div>
<div class='searchresult'>
<a href='begin.php?id=getfile&file=$row[fileNr]'>Ga naar file</a></div><br />";
} else { print "Geen resultaten voor deze zoekopdracht"; }
}
print "<br />";
print "<a href='javascript: history.go(-1)'>Klik hier om terug te gaan naar het zoekvenster</a>";

}

function allGlobal($expImp2, $klant2, $sortby, $sqlstring){
  print "<h1>Zoekresultaten</h1>";
  print "<div class='searchresult'><b>B/L Nr</b></div>
<div class='searchresult'><b>Klant</b></div>
<div class='searchresult'><b>POL</b></div>
<div class='searchresult'><b>Destination</b></div>
<div class='searchresult'><b>ETS</b></div>
<div class='searchresult'><b>ETA</b></div>
<div class='searchresult'><b>Link</b></div><br />";
$db = new database();
$conn = $db->connect();
$SQL4= $conn->prepare($sqlstring);
$SQL4->bindParam('klant', $klant2);
if($_POST['expImp2'] == 'all'){
}else{ $SQL4->bindParam('expImp', $expImp2);}
$SQL4->bindParam('sortby', $sortby);
$SQL4->execute();
while($row4 = $SQL4->fetch()){
$pod = ucwords(strtolower($row4['pod']));
$pol = ucwords(strtolower($row4['pol']));
print "<div class='searchresult'>$row4[fileNr]</div>
<div class='searchresult'>$row4[klant]</div>
<div class='searchresult'>$pol</div>
<div class='searchresult'>$pod</div>
<div class='searchresult'>$row4[ets]</div>
<div class='searchresult'>$row4[eta]</div>
<div class='searchresult'>
<a href='begin.php?id=getfile&file=$row4[fileNr]'>Ga naar file</a></div><br />";
}
print "<br />";
print "<a href='javascript: history.go(-1)'>Klik hier om terug te gaan naar het zoekvenster</a>";
}


  
  
  if(isset($_POST['bl'])){
    $blNr = $_POST['bl']; 
    zoekBl($blNr);
  } else {
    print "";
  }

    if(isset($_POST['carrierbookingref'])){
    $carrierbookingref = $_POST['carrierbookingref']; 
    zoekCarrierBookingRef($carrierbookingref);
  } else {
    print "";
  }

  
  
  
if(isset($_POST['expImp2'], $_POST['klant2'], $_POST['sortby'])){
    if($_POST['expImp2'] == 'all'){
      $expImp2 = $_POST['expImp2'];
      $klant2 = $_POST['klant2'];
      $sortby = stripslashes($_POST['sortby']);
      $sqlstring = sprintf("SELECT * from globalFileTabel WHERE klant=:klant AND expImp IN ('export', 'import') ORDER by :sortby");
    }else{
    $klant2 = $_POST['klant2'];
    $sortby = stripslashes($_POST['sortby']);
    $expImp2 = stripslashes($_POST['expImp2']);
    $sqlstring = sprintf("SELECT * from globalFileTabel WHERE klant=:klant and expImp=:expImp ORDER by :sortby");
    }

    print $expImp2;
    allGlobal($expImp2, $klant2, $sortby, $sqlstring);  
}

  } else {
  include ($_SERVER['DOCUMENT_ROOT'].'/raymexworkingstation/functions/loggedout.php');
  }

?>