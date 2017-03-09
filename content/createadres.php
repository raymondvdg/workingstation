   <?php
    require_once($_SERVER['DOCUMENT_ROOT'].'/raymexworkingstation/config/dbCnnct.php');
    require_once($_SERVER['DOCUMENT_ROOT'].'/raymexworkingstation/functions/seshandle.php');
   
    
    if (isset($_SESSION['gebruiker'])) 
  {
    print "<h1>Maak een nieuw adres aan.</h1><br>";
  
    print"<form method='POST' action='begin.php?id=createadresexec'>";
    print "<table border='0'>";
    print "<tr><td>Type Adres</td><td><select name='adresType'><option id='adresType' value='klant'>Klant</option><option id='adresType' value='agent'>Agent</option><option id='adresType' value='warehouse'>Warehouse</option><option id='adresType' value='laadlosadres'>Laad/Los adres</option><option id='adresType' value='rederij'>Rederij</option></select></td></tr>";
    print "<tr><td>Bedrijfsnaam:</td>";
    print "<td><input type='text' name='adresNaam'></td></tr>";
    print "<tr><td>Straat</td>";    
    print "<td><input type='text' name='adresStraat'></td></tr>";
    print "<tr><td>Postcode</td>";    
    print "<td><input type='text' name='adresPostcode'></td></tr>";
    print "<tr><td>Stad</td>";
    print "<td><input type='text' name='adresStad'></td></tr>";
    print "<tr><td>Land</td>";
    print "<td><input type='text' name='adresLand'><td></tr>";
    print "<tr><td>Post adres (voluit incl alles)</td>";
    print "<td><input type='text' name='adresPost'><td></tr>";
    print "<tr><td>Rekening nr.</td>";
    print "<td><input type='text' name='adresRekening'><td></tr>";
    print "<tr><td>Iban nr.</td>";
    print "<td><input type='text' name='adresIban'><td></tr>";
    print "<tr><td>Btw nr.</td>";    
    print "<td><input type='text' name='adresBtw'></td></tr>";
    print "<tr><td>EORI nr</td>";    
    print "<td><input type='text' name='adresEORI'></td></tr>";
    print "<tr><td>Contact persoon</td>";    
    print "<td><input type='text' name='adresContact'></td></tr>";
    print "<tr><td>Email adres</td>";    
    print "<td><input type='text' name='adresEmail'></td></tr>";
    print "<tr><td>Telefoon nr.</td>";    
    print "<td><input type='text' name='adresTelefoon'></td></tr>";
    print "<tr><td><input type='submit' name='submit' value='Toevoegen'></td></tr>";
    print "</table></form>";
    
  } else {
  include ($_SERVER['DOCUMENT_ROOT'].'/raymexworkingstation/functions/loggedout.php');
  }
  
    
    ?>