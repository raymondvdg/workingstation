<?php
require_once($_SERVER['DOCUMENT_ROOT'].'/raymexworkingstation/config/dbCnnct.php');
require_once($_SERVER['DOCUMENT_ROOT'].'/raymexworkingstation/functions/seshandle.php');

    if (isset($_SESSION['gebruiker'])) 
  {
function loadFileDetails($fileNr){
    $db = new database();
    $conn = $db->connect();
    $query0=$conn->prepare('SELECT * from globalFileTabel where fileNr=:fileNr');
    $query0->execute(array(':fileNr' => $fileNr));
    while($row0 = $query0->fetch()) {
    $klant= $row0['klant'];
    $rederij = $row0['rederij'];
    $pol= ucwords(strtolower($row0['pol']));
    $pod= ucwords(strtolower($row0['pod']));
    $finalDest= ucwords(strtolower($row0['finalDest']));
    $vessel= $row0['vessel'];
    $voyage= $row0['voyage'];
    $ets= $row0['ets'];
    $eta= $row0['eta'];
    $etaDest= $row0['etaDest'];
    $laadAdres= $row0['laadAdres'];
    $shipperRef= $row0['shipperRef'];
    $poNr= $row0['poNr'];
    $levertaanophalen= $row0['levertaanophalen']; 
    $warehouse= $row0['warehouse']; 
    $losRefWhs= $row0['losRefWhs'];
    $laadTijd= $row0['laadTijd']; 
    $laadDatum= $row0['laadDatum'];
    $closing= $row0['closing'];
    $expImp= $row0['expImp'];
    $UID = $row0['UID'];
    $commentFile= $row0['commentFile'];
    $carrierBooking = $row0['carrierBooking'];


    return array($klant, $pol, $pod, $finalDest, $vessel, $voyage, $ets, $eta, $etaDest, $laadAdres, $shipperRef, $poNr, $levertaanophalen, $warehouse, $losRefWhs, $laadDatum, $laadTijd, $closing, $expImp, $UID, $rederij, $commentFile, $carrierBooking);
            //    0        1     2      3           4       5       6      7     8          9           10          11      12                  13          14          15          16      17          18     19       20          21        22
}
}

print "<h1>File</h1>";

if(!isset($_GET['file'])){
print "Er is geen file geselecteerd.";
}else{
$fileNr = $_GET['file'];
stripslashes($fileNr);
$file = loadFileDetails($fileNr);

/* DATE COMPAREEEEE (WORKING)
date_default_timezone_set("Europe/Amsterdam");
$today = new DateTime('now');
$f_today=$today->format("d-m-Y");
$tomorrow = new Datetime('tomorrow');
$f_tomorrow=$tomorrow->format("d-m-Y");
$saildate = datetime::createfromformat('d-m-Y',$file[6]);
$f_saildate=$saildate->format("d-m-Y");
//unixit
$u_today = $today->format('U');
$u_saildate = $saildate->format('U');
print "Today is : $f_today. ($u_today)";
print "<br />";
print "Tomorrow is: $f_tomorrow. <br/>";
print "Saildate = $f_saildate ($u_saildate)<Br />";



if($u_today >= $u_saildate){
   print "ship shouldve sailed.<br />";
    
} else {
    print "ship hasnt set sail yet.<br />";
}
*/
    print "<a href='content/makefront.php?file=$fileNr' target='new'>[Voorblad]</a> -<a href='content/makebkgcon.php?file=$fileNr' target='new'>[Boekingsbevestiging]</a>  <br />";
    print"<form method='POST' action='begin.php?id=updatefileexec'>";
    print "<table border='0'>";
    print "<tr><td>BL / Filenr:</td>";
    print "<td><input type='text' name='fileNr' value='$fileNr' readonly></td><td><input type='hidden' name='expImp' value='$file[18]'></td></tr>";
    print "</td></tr>";
    print "<tr><td>Klant</td>";
    print "<td><input type='text' name='klant' value='$file[0]' readonly></td></tr>";
    print "<tr><td></td><td><select name='levertaanophalen'><option id='levertaanophalen' value='$file[12]'>$file[12]</option><option id='levertaanophalen' value='levertaan'>Levert zelf aan</option><option id='levertaanophalen' value='ophalen'>Ophalen</option></select></td></tr>";
    print "<tr><td>Rederij</td><td><select name='rederij'> ";
    print "<option id='rederij' value='$file[20]'>$file[20]</option>";
    $db = new database();
    $conn = $db->connect();
    $getred=$conn->query("SELECT adresNaam FROM adresTabel WHERE adresType = 'rederij'");
    print "<option id='rederij' value=''></option>";
    while ($row3 = $getred->fetch()){
    print "<option id='rederij' value='$row3[adresNaam]'>$row3[adresNaam]</option>";
    }
    print "</select></td></tr>";
    print "<tr><td>Carrier Booking nr</td>";
    print "<td><input type='text' name='carrierBooking' value='$file[22]' ></td></tr>";
    print "<tr><td>POL</td>";
    print "<td><input type='text' name='pol' value='$file[1]' ></td></tr>";
    print "<tr><td>POD</td>";
    print "<td><input type='text' name='pod' value='$file[2]' ><td></tr>";
    print "<tr><td>Final dest.</td>";
    print "<td><input type='text' name='finalDest' value='$file[3]' ><td></tr>";
    print "<tr><td>Vessel</td>";    
    print "<td><input type='text' name='vessel' value='$file[4]' ></td></tr>";
    print "<tr><td>Voyage nr</td>";    
    print "<td><input type='text' name='voyage' value='$file[5]' ></td></tr>";
    print "<tr><td>ETS</td>";    
    print "<td><input type='date' class='datepicker'  id='datepicker1' name='ets' value='$file[6]' ></td></tr>";
    print "<tr><td>ETA nr</td>";    
    print "<td><input type='date' class='datepicker'  id='datepicker2'  name='eta' value='$file[7]' ></td></tr>";
    print "<tr><td>ETA dest</td>";    
    print "<td><input type='date' class='datepicker'  id='datepicker3'  name='etaDest' value='$file[8]' ></td></tr>";
    print "<tr><td>Aanleveradres</td><td><select name='warehouse'> ";
    print "<option id='warehouse' value='$file[13]'>$file[13]</option>";
    $db = new database();
    $conn = $db->connect();
    $getwhs=$conn->query("SELECT adresNaam FROM adresTabel WHERE adresType = 'warehouse'");
    while ($row2 = $getwhs->fetch()){
    print "<option id='warehouse' value='$row2[adresNaam]'>$row2[adresNaam]</option>";
    }
    print "</select></td></tr>";
    print "<tr><td>Los referentie nr</td>";    
    print "<td><input type='text' name='losRefWhs' value='$file[14]'></td></tr>";
    print "<tr><td>Closing</td>";    
    print "<td><input type='date' class='datepicker'  id='datepicker4'  name='closing' value='$file[17]'></td></tr>";
    print "<tr><td>Laadadres</td>";    
    print "<td><textarea style='resize:none' wrap='soft' cols='50' name='laadAdres' rows='5' maxlength='500'>$file[9]</textarea></td></tr>";
    print "<tr><td>Laaddatum:</td>";    
    print "<td><input type='date' class='datepicker'  id='datepicker5'  name='laadDatum' value='$file[15]'>";
    print "Tijd: <input type='text' name='laadTijd' maxlength='5' size='6' value='$file[16]'></td></tr>";   
    print "<tr><td>Shipper referentie nr</td>";    
    print "<td><input type='text' name='shipperRef' value='$file[10]' ></td></tr>";
    print "<tr><td>PO nr</td>";    
    print "<td><input type='text' name='poNr' value='$file[11]' ></td></tr>";
    print "<tr><td>Lading Gegevens</td></tr>";   
    print "<tr><td>Aantal | type | cbm | kg</td></tr>";
    $db = new database();
    $conn = $db->connect();
    $getCargo=$conn->prepare("SELECT * FROM cargoTabel WHERE fileNr=:fileNr");
    $getCargo->execute(array('fileNr'=>$fileNr));
    while ($row = $getCargo->fetch()){
    print "<tr><td><input type='text' name='cargoAantal' size='5' maxlength='5' value='$row[cargoAantal]' disabled='disabled'><input type='text' name='cargoType' size='5' maxlength='8' value='$row[cargoType]' disabled='disabled'><input type='text' name='cargoCbm' size='5' maxlength='5' value='$row[cargoCbm]' disabled='disabled'><input type='text' name='cargoKg' size='5' maxlength='6' value='$row[cargoKg]' disabled='disabled'></td></tr>";
    print "<tr><td><input type='text' name='cargoOmschrijving' value='$row[cargoOmschrijving]' disabled='disabled'></td></tr>";
    }
    print "<tr><td><a href='begin.php?id=getcargo&file=$fileNr'>Klik hier om lading aan te passen/toe te voegen.</a></td></tr>";
    print "<tr><td></td></tr>";
    print "<tr><td>Comments</td>";    
    print "<td><textarea style='resize:none' wrap='soft' cols='50' name='commentFile' rows='5' maxlength='500'>$file[21]</textarea></td></tr>";
    print "<tr><td><input type='submit' name='submit' value='Update Boeking'></td></tr>";
    print "</table></form>";
}

  } else {
  include ($_SERVER['DOCUMENT_ROOT'].'/raymexworkingstation/functions/loggedout.php');
  }

?>