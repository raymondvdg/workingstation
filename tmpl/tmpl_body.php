<html>
    <head><title>The Game</title>
    <link rel="stylesheet" type="text/css" href="stylingIndex.css" /> 
</head>
    <body>
    <div id="main">
    <div class="topbar">Spel - by de spelmakers</div>
        
    <!-- Register / Login-->
        <div class="playBar">
        <div class="clickPlay"><a href="login.php">Play Free</a></div>
        <br>
        <div class="registerAccount">If you don't have an account click to <a href="registeracc.php">register</a> a free account!</div>
        </div>
    <!-- Register / Login end -->
    
    <!-- Game Content -->
    <div class="maincontent">

        <!-- Linker Menu -->
        <div class="leftmenu">
        <b>Op Zak</b><br>
        <A href="#">$ 100,000</A><br>        
        <A href="#">Nog iets</A><br>
        
    </div>
    <!-- Einde Linker Menu -->



<!-- Rechter Menu 

    <div class="rightmenu">
        <b>Map</b><br>

    </div>

<!-- Einde Rechter Menu -->

    
    <!-- Middle Content -->
        <div class="maingame">
   <?php include("skills.php"); ?>
   <?php include("engine.php"); ?>
        </div>
<!-- end Middle content -->

    </div>
    <!-- Einde Game Content -->
    
    
    
    </div>
    </body>
</html>