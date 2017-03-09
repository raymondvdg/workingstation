<?php
    require_once($_SERVER['DOCUMENT_ROOT'].'/raymexworkingstation/config/dbCnnct.php');
    require_once($_SERVER['DOCUMENT_ROOT'].'/raymexworkingstation/functions/seshandle.php');
   
   
    $fileNr = $_GET['file'];

    print"<form method='POST' action='begin.php?id=updatecargo'>";
    print "<h1>B/l nr.: $fileNr</h1>";
    print "<table border='0'>";
    print "<tr><td>Update cargo:</td></tr>";
    print "<tr><td>Lading Gegevens</td></tr>";   
    print "<tr><td>Aantal | type | cbm | kg</td></tr>";
    $db = new database();
    $conn = $db->connect();
    $getCargo=$conn->prepare("SELECT * FROM cargoTabel WHERE fileNr=:fileNr");
    $getCargo->execute(array('fileNr'=>$fileNr));
    while ($row = $getCargo->fetch()){
    print "<tr><td><input type='text' name='cargoAantal' size='5' maxlength='5' value='$row[cargoAantal]'><input type='text' name='cargoType' size='6' maxlength='10' value='$row[cargoType]'><input type='text' name='cargoCbm' size='5' maxlength='5' value='$row[cargoCbm]'><input type='text' name='cargoKg' size='5' maxlength='6' value='$row[cargoKg]'></td></tr>";
    print "<tr><td><input type='text' name='cargoOmschrijving' value='$row[cargoOmschrijving]'></td></tr>";
    print "<tr><td><input type='hidden' name='UID' value='$row[UID]'></td></tr>";
    }
    print "<tr><td></td></tr>";
    print "<tr><td><input type='hidden' name='fileNr' value='$fileNr'></td></tr>";
    print "<tr><td><input type='submit' name='submit' value='Opslaan'></td></tr>";
    print "</table></form>";
    
    print "<br /><br />";
    
    print"<form method='POST' action='begin.php?id=addcargo'>";
    print "<table border='0'>";
    print "<tr><td>Voeg cargo toe:</td></tr>";
    print "<tr><td>Lading Gegevens</td></tr>";   
    print "<tr><td>Aantal | type | cbm | kg</td></tr>";
    print "<tr><td><input type='text' name='cargoAantal' size='5' maxlength='5'><input type='text' name='cargoType' size='6' maxlength='10'><input type='text' name='cargoCbm' size='5' maxlength='5'><input type='text' name='cargoKg' size='5' maxlength='6'></td></tr>";
    print "<tr><td><input type='text' name='cargoOmschrijving'td></tr>";
    print "<tr><td></td></tr>";
    print "<tr><td><input type='hidden' name='fileNr' value='$fileNr'></td></tr>";
    print "<tr><td><input type='submit' name='submit' value='Toevoegen'></td></tr>";
    print "</table></form>";

?>
