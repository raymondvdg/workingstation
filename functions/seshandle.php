    <?php
if (!isset($_SESSION)) {
  session_start();
}

$now = time();
$limit = $now - 60 * 120;

if (isset ($_SESSION['last_activity']) && $_SESSION['last_activity'] < $limit) {
  // if too old, clear the session array and redirect
    session_unset();     // unset $_SESSION variable for the run-time 
    session_destroy();   // destroy session data in storage
    print "Session expired. <br /> <A href='index.php'>Pls login again.</a>";
    exit;
} else {
  $_SESSION['last_activity'] = $now;
}
?>