<?php
require_once($_SERVER['DOCUMENT_ROOT'].'/raymexworkingstation/config/layoutsettings.php');
require_once($_SERVER['DOCUMENT_ROOT'].'/raymexworkingstation/tmpl/tmpl_header.php');
session_Start();
?>
    
    <!-- Middle Content Big -->
    <div class="maincontent">

        <!-- Linker Menu -->
        <div class="leftmenu">
    <?php include("leftmenu.php"); ?>
    </div>

    
    <!-- Middle Content -->
    
        <div class="main">
        <?php

      // Setup vars
    $FileExt = ".php";
    $IncPath = "./content/";
    $NotFound = "file_not_found";
    $Default = "start";

    // If ?p= doesn't exist set it to Default
    if(empty($_GET['id'])) { $id = $Default; }
    else { $id = $_GET['id']; }

    // Make sure there is nothing but letters in ?p=
    if (!preg_match("/^[Aa-zZ]+$/",$id)) {
    die("Page doesn't exist. " . $IncPath.$id.$FileExt ); }

    // Finally include the file if it exists locally
    if(file_exists($IncPath.$id.$FileExt)) {
    include($IncPath.$id.$FileExt);
    } else {
    include($IncPath.$NotFound.$FileExt); die(); }

   
   ?>
        </div>

    </div>
    <!-- Einde  Content -->
    
    
    
<?php
require_once($_SERVER['DOCUMENT_ROOT'].'/raymexworkingstation/tmpl/tmpl_footer.php');
?> 