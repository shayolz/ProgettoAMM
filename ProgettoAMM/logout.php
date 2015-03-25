<?php session_start(); ?>
<?php include "include/errorReport.php"; ?>
<?php

// sistema di logout dell`utente

$_SESSION = array();
session_destroy(); // distruggo tutte le sessioni
// Ritorno alla home page
echo '<script language=javascript>document.location.href="index.php"</script>';

exit();
?>
