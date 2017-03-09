   <?php
    require_once($_SERVER['DOCUMENT_ROOT'].'/raymexworkingstation/config/dbCnnct.php');
    require_once($_SERVER['DOCUMENT_ROOT'].'/raymexworkingstation/functions/seshandle.php');
   
    
    if (isset($_SESSION['gebruiker'])) 
  {
   $gebruiker = $_SESSION['gebruiker'];
    print "<h1>Maak een nieuwe file aan.</h1><br>";
  
    print"<form method='POST' action='begin.php?id=createfileexec'>";
    print "<table border='0'>";
    print "<tr><td>Export/Import file:</td><td>";
    print "<select name='expImp' ><option id='expImp' value='export'>Export</option><option id='expImp' value='import'>Import</option></select>";
    print "</td></tr>";
    print "<tr><td>Klant</td><td><select name='klant' >";
    $db = new database();
    $conn = $db->connect();
    $getnames=$conn->query("SELECT adresNaam FROM adresTabel WHERE adresType = 'klant'");
    while ($row = $getnames->fetch()){
    print "<option id='klant' value='$row[adresNaam]'>$row[adresNaam]</option>";
    }
    print "</select></td></tr>";
    print "<tr><td></td><td><select name='levertaanophalen'><option id='levertaanophalen' value='levertaan'>Levert zelf aan</option><option id='levertaanophalen' value='ophalen'>Ophalen</option></select></td></tr>";
    print "<tr><td>Shipper referentie nr</td>";    
    print "<td><input type='text' name='shipperRef'></td></tr>";
    print "<tr><td>PO nr</td>";    
    print "<td><input type='text' name='poNr'></td></tr>";
    print "<tr><td>Rederij</td><td><select name='rederij' >";
    print "<option id='rederij' value=''></option>";
    $db = new database();
    $conn = $db->connect();
    $getred=$conn->query("SELECT adresNaam FROM adresTabel WHERE adresType = 'rederij'");
    while ($row1 = $getred->fetch()){
    print "<option id='rederij' value='$row1[adresNaam]'>$row1[adresNaam]</option>";
    }
    print "</select></td></tr>";
    print "<tr><td>POL</td>";
    print "<td><input type='text' name='pol'></td></tr>";
    print "<tr><td>POD</td>";
    print "<td><input type='text' name='pod'><td></tr>";
    print "<tr><td>Final dest.</td>";
    print "<td><input type='text' name='finalDest'><td></tr>";
    print "<tr><td>Vessel</td>";    
    print "<td><input type='text' name='vessel'></td></tr>";
    print "<tr><td>Voyage nr</td>";    
    print "<td><input type='text' name='voyage'></td></tr>";
    print "<tr><td>ETS</td>";    
    print "<td><input type='date' class='datepicker'  id='datepicker1' name='ets'></td></tr>";
    print "<tr><td>ETA nr</td>";    
    print "<td><input type='date' class='datepicker'  id='datepicker2'  name='eta'></td></tr>";
    print "<tr><td>ETA dest</td>";    
    print "<td><input type='date' class='datepicker'  id='datepicker3'  name='etaDest'></td></tr>";
    print "<tr><td>Aanleveradres</td><td><select name='warehouse'>";
    $db = new database();
    $conn = $db->connect();
    $getwhs=$conn->query("SELECT adresNaam FROM adresTabel WHERE adresType = 'warehouse'");
    while ($row2 = $getwhs->fetch()){
    print "<option id='warehouse' value='$row2[adresNaam]'>$row2[adresNaam]</option>";
    }
    print "</select></td></tr>";
    print "<tr><td>Los referentie nr</td>";    
    print "<td><input type='text' name='losRefWhs'></td></tr>";
    print "<tr><td>Closing</td>";    
    print "<td><input type='date' class='datepicker'  id='datepicker4'  name='closing'></td></tr>";
    print "<tr><td>Laadadres</td>";    
    print "<td><textarea style='resize:none' wrap='soft' cols='25' name='laadAdres' rows='5' maxlength='500'></textarea></td></tr>";
    print "<tr><td>Laaddatum:</td>";    
    print "<td><input type='date' class='datepicker'  id='datepicker5'  name='laadDatum'>";
    print "Tijd: <input type='text' name='laadTijd' maxlength='5' size='6'></td></tr>";
    print "<tr><td>Lading Gegevens</td></tr>";   
    print "<tr><td>Aantal | type | cbm | kg</td></tr>";
    print "<tr><td><input type='text' name='cargoAantal' size='5' maxlength='5'><input type='text' name='cargoType' size='6' maxlength='10'><input type='text' name='cargoCbm' size='5' maxlength='5'><input type='text' name='cargoKg' size='5' maxlength='6'></td></tr>";
    print "<tr><td><input type='text' name='cargoOmschrijving'td></tr>";
    print "<tr><td><input type='submit' name='submit' value='Inboeken'></td></tr>";
    print "</table></form>";
    

    
  } else {
  include ($_SERVER['DOCUMENT_ROOT'].'/raymexworkingstation/functions/loggedout.php');
  }
  
    
    ?>