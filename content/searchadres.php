

    <?php
    require_once($_SERVER['DOCUMENT_ROOT'].'/raymexworkingstation/config/dbCnnct.php');
    require_once($_SERVER['DOCUMENT_ROOT'].'/raymexworkingstation/functions/seshandle.php');

    if (isset($_SESSION['gebruiker'])) 
  {
    $gebruiker = $_SESSION['gebruiker'];
    print "<h1>Adres aanpassen</h1><br>";

    print "Kies een adres om aan te passen<br /><br />";
    print "<div class='searchresult'><b>Klantnaam</b></div>";
    print "<div class='searchresult'><b>Actie</b></div><br />";
    $db = new database();
    $conn = $db->connect();
    $getnames=$conn->query("SELECT adresNaam FROM adresTabel WHERE adresType = 'klant'");
    while ($row = $getnames->fetch()){
      $urlnaam = urlencode($row['adresNaam']);
    print "<div class='searchresult'>$row[adresNaam]</div> <div class='searchresult'><a href='begin.php?id=getadres&klantnaam=$urlnaam'>Aanpassen</a></div><br />";
    }
  print "<br />";
  print "<a href='javascript: history.go(-1)'>Klik hier om terug te gaan naar het zoekvenster</a>";

  print "<br /><br /><br />";
    
  } else {
  include ($_SERVER['DOCUMENT_ROOT'].'/raymexworkingstation/functions/loggedout.php');
  }
  
    
    ?>