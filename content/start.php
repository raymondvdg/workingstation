

    <?php
    require_once($_SERVER['DOCUMENT_ROOT'].'/raymexworkingstation/functions/seshandle.php');

    if (isset($_SESSION['gebruiker'])) 
  {
    $gebruiker = $_SESSION['gebruiker'];
    print "<h1>Welkom in het werkstation voor Raymex.</h1><br>";
    print "Ingelogd als $gebruiker <br />";
    print "Maak je keuze:<br /><br />";
    
    print "<a href='begin.php?id=createfile'>Cre&euml;er een nieuw export file</a><br />";
    print "<a href='begin.php?id=searchfile'>Zoek een export file</a><br />";
    print "<br />";
    
  } else {
  include ($_SERVER['DOCUMENT_ROOT'].'/raymexworkingstation/functions/loggedout.php');
  }
  
    
    ?>