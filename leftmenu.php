        <h1>Snel menu</h1>
            <?php
    if (isset($_SESSION['gebruiker'])) 
  {
    print "- <a href='begin.php?id=start'>Hoofdmenu</a><br />";
    print "- <a href='begin.php?id=createfile'>Nieuwe file</a><br />";
    print "- <a href='begin.php?id=adressenbeheer'>Adressen Beheer</a><br />";

    print "<br /><br />Zoeken<br />";
    print "- <a href='begin.php?id=searchfile'>Zoek een file</a><br />";
    print "- <a href='begin.php?id=exportfiles'>Alle export files</a><br />";
    print "- <a href='begin.php?id=importfiles'>Alle import files</a><br />";


    print "<br />";
  } else {
  include ($_SERVER['DOCUMENT_ROOT'].'/raymexworkingstation/functions/loggedout.php');
  }
  
    
    ?>
       
