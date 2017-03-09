<?php
require_once($_SERVER['DOCUMENT_ROOT'].'/raymexworkingstation/config/dbCnnct.php');
    require_once($_SERVER['DOCUMENT_ROOT'].'/raymexworkingstation/functions/seshandle.php');
    if (isset($_SESSION['gebruiker'])) 
  {

print "<h1>Alle Import Files</h1>";
$db = new database();
$conn = $db->connect();
$SQL= $conn->query("SELECT * from globalFileTabel WHERE expImp='import' ORDER by fileNr");
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
} else { print "Geen resultaten."; }
}
print "<br />";
  } else {
  include ($_SERVER['DOCUMENT_ROOT'].'/raymexworkingstation/functions/loggedout.php');
  }
?>