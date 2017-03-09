<?php
require_once($_SERVER['DOCUMENT_ROOT'].'/raymexworkingstation/config/dbCnnct.php');
require_once($_SERVER['DOCUMENT_ROOT'].'/raymexworkingstation/functions/seshandle.php');

    if (isset($_SESSION['gebruiker'])) 
  {
function loadAdresDetails($klantnaam){
    $db = new database();
    $conn = $db->connect();
    $query0=$conn->prepare('SELECT * from adresTabel where adresNaam=:klantnaam');
    $query0->execute(array(':klantnaam' => $klantnaam));
    while($row0 = $query0->fetch()) {
$adresNaam = $row0['adresNaam'];
$adresStraat = $row0['adresStraat'];
$adresPostcode = $row0['adresPostcode'];
$adresStad = $row0['adresStad'];
$adresLand = $row0['adresLand'];
$adresTelefoon = $row0['adresTelefoon'];
$adresBtw = $row0['adresBtw'];
$adresEORI = $row0['adresEORI'];
$adresRekening = $row0['adresRekening'];
$adresContact = $row0['adresContact']; 
$adresEmail = $row0['adresEmail'];
$adresType = $row0['adresType'];
$adresPost = $row0['adresPost'];
$adresIban = $row0['adresIban'];



    return array($adresNaam, $adresStraat, $adresPostcode, $adresStad, $adresLand, $adresTelefoon, $adresBtw, $adresEORI, $adresRekening, $adresContact, $adresEmail, $adresType, $adresPost, $adresIban);
            //     0            1               2               3           4           5               6       7           8                   9           10          11          12          13
}
}

print "<h1>File</h1>";

if(!isset($_GET['klantnaam'])){
print "Er is geen file geselecteerd.";
}else{
$klantnaam = urldecode($_GET['klantnaam']);
$adres = loadAdresDetails($klantnaam);
print "$klantnaam";

    print"<form method='POST' action='begin.php?id=updateadresexec'>";
    print "<table border='0'>";
    print "<tr><td>Type Adres</td><td><select name='adresType'><option id='adresType' value='$adres[11]'>$adres[11]</option><option id='adresType' value='klant'>Klant</option><option id='adresType' value='agent'>Agent</option><option id='adresType' value='warehouse'>Warehouse</option><option id='adresType' value='laadlosadres'>Laad/Los adres</option></select></td></tr>";
    print "<tr><td>Bedrijfsnaam:</td>";
    print "<td><input type='text' name='adresNaam' value='$adres[0]'></td></tr>";
    print "<tr><td>Straat</td>";    
    print "<td><input type='text' name='adresStraat' value='$adres[1]'></td></tr>";
    print "<tr><td>Postcode</td>";    
    print "<td><input type='text' name='adresPostcode' value='$adres[2]'></td></tr>";
    print "<tr><td>Stad</td>";
    print "<td><input type='text' name='adresStad' value='$adres[3]'></td></tr>";
    print "<tr><td>Land</td>";
    print "<td><input type='text' name='adresLand' value='$adres[4]'><td></tr>";
    print "<tr><td>Postadres (voluit, incl alles)</td>";
    print "<td><input type='text' name='adresPost' value='$adres[12]'><td></tr>";
    print "<tr><td>Rekening nr.</td>";
    print "<td><input type='text' name='adresRekening' value='$adres[8]'><td></tr>";
    print "<tr><td>Iban nr.</td>";
    print "<td><input type='text' name='adresIban' value='$adres[13]'><td></tr>";
    print "<tr><td>Btw nr.</td>";    
    print "<td><input type='text' name='adresBtw' value='$adres[6]'></td></tr>";
    print "<tr><td>EORI Nr.:</td>";    
    print "<td><input type='text' name='adresEORI' value='$adres[7]'></td></tr>";
    print "<tr><td>Contact persoon</td>";    
    print "<td><input type='text' name='adresContact' value='$adres[9]'></td></tr>";
    print "<tr><td>Email adres</td>";    
    print "<td><input type='text' name='adresEmail' value='$adres[10]'></td></tr>";
    print "<tr><td>Telefoon nr.</td>";    
    print "<td><input type='text' name='adresTelefoon' value='$adres[5]'></td></tr>";
    print "<tr><td><input type='submit' name='submit' value='Aanpassen'></td></tr>";
    print "</table></form>";
}

  } else {
  include ($_SERVER['DOCUMENT_ROOT'].'/raymexworkingstation/functions/loggedout.php');
  }

?>