<?php include "include/errorReport.php"; ?>
<?php

// Questo codice serve per reindirizzare direttamente ad accesso.php
// in caso ci fosse ancora la sessione attiva.
// Se c'� la sessione registrata faccio il redirect
if (!empty($_SESSION['loginsuccess']) && $_SESSION['loginsuccess'] == "autorizzato") {
    echo '<script language=javascript>document.location.href="accesso.php"</script>';
    $cod = $_SESSION['cod']; // id cod recuperato nel file di verifica
    die;
}

// Altrimenti rimango nel login form
?>