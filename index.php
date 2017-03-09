<?php
session_start();
if(isset($_SESSION['gebruiker']))
{
  session_destroy();
}
?>

<?php
require_once($_SERVER['DOCUMENT_ROOT'].'/raymexworkingstation/config/layoutsettings.php');
require_once($_SERVER['DOCUMENT_ROOT'].'/raymexworkingstation/tmpl/tmpl_header.php');
?>
    <!-- Middle Content Big -->
    <div class="maincontent">

        <!-- Linker Menu -->
        <div class="leftmenu">
    <?php include("leftmenu.php"); ?>
    </div>

    
    <!-- Middle Content -->
      <div class="main">
        <form method="POST" action="authenticate.php">

        <Table>
<tr><td>Gebruikersnaam:</td><td><input type="text" name="gebruiker" size="20"></td></tr><br>
<tr><td>Wachtwoord:</td><td><input type="password" name="wachtwoord" size="20" mask="x"></td></tr><br>
<tr><td><input type="submit" value="submit" name="submit"></td></tr>

</form>
        </div>

    </div>
    <!-- Einde  Content -->
    
    
    
<?php
require_once($_SERVER['DOCUMENT_ROOT'].'/raymexworkingstation/tmpl/tmpl_footer.php');
?> 

