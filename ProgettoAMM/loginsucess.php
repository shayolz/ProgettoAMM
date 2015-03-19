<?php include "include/errorReport.php";?>
<?php
// Protezione in caso un utenti cerchi ad accedere direttamente ai files
// senza passare per il login.

// Se non c'è la sessione registrata
if (empty($_SESSION['loginsuccess'])) {
  echo "<h1>Area riservata, accesso negato.</h1>";
  echo "Per effettuare il login clicca <a href='index.php'><font color='blue'>qui</font></a>";
  die;
}

// Altrimenti Prelevo il codice identificatico dell'utente loggato
$cod = $_SESSION['cod']; // id cod recuperato nel file di verifica
?>
