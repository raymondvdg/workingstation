<?php
require_once "../config/dbCnnct.php";

// Required field names
$required = array('gebruiker', 'wachtwoord', 'wachtwoordConfirm', 'email', 'gebruikerslevel');

// Loop over field names, make sure each one exists and is not empty
$error = false;
foreach($required as $field) {
  if (empty($_POST[$field])) {
    $error = true;
  }
}

if ($error) {
  echo "All fields are required.";
} else {
date_default_timezone_set ("Europe/Berlin");
$errorstring ="";
$successtring ="";
$gebruiker= $_POST['gebruiker'];
$wachtwoord= $_POST['wachtwoord'];
$wachtwoordConfirm = $_POST['wachtwoordConfirm'];
$gebruiker= strip_tags($gebruiker);
$email= $_POST['email'];
$email= strip_tags($email);
$gebruikerslevel= $_POST['gebruikerslevel'];

//username schoonmaken
$gebruiker = preg_replace('/[^A-Za-z0-9\-]/', ' ', $gebruiker); // Replace special chars with space.
$gebruiker = preg_replace('!\s+!', ' ', $gebruiker); // Replaces all spaces with one spcace.
$gebruiker = ucwords(strtolower($gebruiker));
$email = filter_var($email, FILTER_VALIDATE_EMAIL);

//passwoord hashen en zouten
//$cost = 13; // hoe hoger hoe beter
//$salt = strtr(base64_encode(mcrypt_create_iv(16, MCRYPT_DEV_URANDOM)), '+', '.'); // de random salt maken
//$salt = sprintf("$2a$%02d$", $cost) . $salt;
//$hashedPassword = crypt($password, $salt);
// MCRYPT INSTALLEREN!
// DB INSERT FF AANPASSEN
 
if ($wachtwoord==$wachtwoordConfirm)
{
  $db = new database();
  $conn = $db->connect();
  $isgebruiker=$conn->prepare("SELECT * from rl_gebruikersTabel where gebruiker=:gebruiker");
  $isgebruiker->execute(array('gebruiker'=>$gebruiker));
  $fetch=$isgebruiker->fetch();
  if($fetch || strlen($gebruiker)<3)
  {

     print "Deze gebruikersnaam is al in gebruik of minder dan 3 characters.";
  }
  else
  {
    $db = new database();
    $conn = $db->connect();
    $isadres=$conn->prepare("SELECT * from rl_gebruikersTabel where email=:email");
    $isadres->execute(array('email'=>$email));
    $fetch2=$isadres->fetch();
    if($fetch2)
    {
      print "Dit e-mail address is al in gebruik";
    }
    else
    {
    $db = new database();
    $conn = $db->connect();
    $wachtwoord=md5($wachtwoord);
    $SQL =$conn->prepare("INSERT into rl_gebruikersTabel (gebruiker, wachtwoord, email, gebruikerslevel, registerdate)
            VALUES (:gebruiker, :wachtwoord, :email, :gebruikerslevel, NOW())"); 
    $SQL->execute(array('gebruiker'=>$gebruiker,'wachtwoord'=>$wachtwoord,'email'=>$email,'gebruikerslevel'=>$gebruikerslevel));

      print "Registratie gelukt.\n Klik <a href='index.php'>hier</a> om terug te gaan naar het admin panel.";
    }
  }
}

else
{
 
  print "Niet 2 dezelfde wachtwoorden";
}
}
?>
 
 