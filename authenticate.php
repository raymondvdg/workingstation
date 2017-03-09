<?php

require_once "config/dbCnnct.php";

if (isset($_POST['submit'])) // name of submit button
{
    $gebruiker=$_POST['gebruiker'];
    $wachtwoord=$_POST['wachtwoord'];
    $gebruiker=strip_tags($gebruiker);
    $wachtwoord=md5($wachtwoord);
    $db = new database();
    $conn = $db->connect();
    $query =$conn->prepare("select * from rl_gebruikersTabel where gebruiker=:gebruiker and wachtwoord=:wachtwoord");
    $query->execute(array('gebruiker'=>$gebruiker,'wachtwoord'=>$wachtwoord));
    $result=$query->fetch();
    if($result)
    {
       session_start();
       $now = time();
       $_SESSION['last_activity'] = $now;
       $_SESSION['gebruiker'] = $gebruiker;
       print "logged in successfully, $gebruiker<br><br>";
       print "<A href='begin.php'>Redirecting to main page..</a>";
       
    }
    else
    {
       print "Wrong username or password.";
    }
}

?>