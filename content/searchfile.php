    <?php
        require_once($_SERVER['DOCUMENT_ROOT'].'/raymexworkingstation/functions/seshandle.php');
        require_once($_SERVER['DOCUMENT_ROOT'].'/raymexworkingstation/config/dbCnnct.php');


    if (isset($_SESSION['gebruiker'])) 
  {
    print "<h1>Zoek een file.</h1><br>";
    
        print "<table border='0'> <h2>Zoek op BL</h2>";
    print"<form method='POST' action='begin.php?id=searchklanten'>";
    print "<tr><td>BL Nummer</td><td>";
    print "<td><b>RL<input type='text' name='bl'></td></tr>";
    print "<tr><td><input type='submit' name='submit' value='Zoek'></td></tr>";
    print "</table></form>";
    
            print "<table border='0'> <h2>Zoek op Carrier Boooking Nr.</h2>";
    print"<form method='POST' action='begin.php?id=searchklanten'>";
    print "<tr><td>Carrier booking ref:</td><td>";
    print "<td><b><input type='text' name='carrierbookingref'></td></tr>";
    print "<tr><td><input type='submit' name='submit' value='Zoek'></td></tr>";
    print "</table></form>";
    
    print "<table border='0'><h2>Zoek file per klant</h2>";
    print"<form method='POST' action='begin.php?id=searchklanten'>";
    print "<tr><td>Export/Import</td><td>";
    print "<select name='expImp2' ><option id='expImp2' value='export'>Export</option><option id='expImp2' value='import'>Import</option><option id='expImp2' value='all'>Alles</option></select>";
    print "</td></tr>";
    print "<tr><td>Klant</td><td>";
    $db = new database();
    $conn = $db->connect();
    $getnames=$conn->query("SELECT adresNaam FROM adresTabel WHERE adresType= 'klant'");
    print "<select name='klant2' >";
    while ($row = $getnames->fetch()){
    print "<option id='klant2' value='$row[adresNaam]'>$row[adresNaam]</option>";
    }
    print "</select></td></tr>";
    print "<tr><td>Sorteer:</td><td>";
    print "<select name='sortby' ><option id='sortby' value='*'>Geen</option><option id='sortby' value='klant'>Klant</option><option id='sortby' value='fileNr'>BL Nummer</option><<option id='sortby' value='pod'>Destination</option>/select>";
    print "</td></tr>";
    print "<tr><td><input type='submit' name='submit' value='Zoek'></td></tr>";
    print "</table></form>";
    


    
  } else {
  include ($_SERVER['DOCUMENT_ROOT'].'/raymexworkingstation/functions/loggedout.php');
  }
  
    
    ?>