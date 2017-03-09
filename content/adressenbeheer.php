

    <?php
    require_once($_SERVER['DOCUMENT_ROOT'].'/raymexworkingstation/functions/seshandle.php');

    if (isset($_SESSION['gebruiker'])) 
  {
    $gebruiker = $_SESSION['gebruiker'];
    print "<h1>Adressen beheer</h1><br>";
    print "<div class='insidemenu'>";
    print "- <a href='begin.php?id=createadres'>Maak een nieuw adres aan</a><br />";
    print "- <a href='begin.php?id=searchadres'>Zoek een klant</a><br />";
    print "</div>";
    print "<br /><br /><br />";
    
  } else {
  include ($_SERVER['DOCUMENT_ROOT'].'/raymexworkingstation/functions/loggedout.php');
  }
  
    
    ?>