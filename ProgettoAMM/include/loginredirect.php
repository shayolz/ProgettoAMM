<?php

// Questo codice serve per reindirizzare direttamente ad accesso.php
// in caso ci fosse ancora la sessione attiva.
// Se c'e' la sessione registrata faccio il redirect
if (!empty($_SESSION['loginsuccess']) && $_SESSION['loginsuccess'] == "autorizzato") {
    echo '<script language=javascript>document.location.href="./index.php?page=accesso"</script>';
    $cod = $_SESSION['cod']; // id cod recuperato nel file di verifica
}

// Altrimenti rimango nel login form
?>