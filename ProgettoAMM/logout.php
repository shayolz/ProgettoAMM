<?php session_start(); ?>
<?php include "include/errorReport.php"; ?>
<?php

// sistema di logout dell`utente

$_SESSION = array();
if (session_id() != "" || isset($_COOKIE[session_name()])) {
    setcookie(session_name(), '', time() - 2592000, '/');
}
session_destroy
();
// Ritorno alla home page
echo '<script language=javascript>document.location.href="index.php"</script>';

exit();
?>
