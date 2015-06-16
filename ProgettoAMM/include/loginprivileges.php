<?php

// Se l`utente non e` un amministratore allora viene bloccato.
if (!$_SESSION["admin"]) {
    echo "<h1>Area riservata agli amministratori, accesso negato.</h1>";
    echo "Torna in home page <a href='./pages/accesso.php'><font color='blue'>qui</font></a>";
    die;
}

//Altrimenti Prelevo il codice identificatico dell'utente loggato
$cod = $_SESSION['cod']; // id cod recuperato nel file di verifica
?>