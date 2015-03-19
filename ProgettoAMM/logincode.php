<?php session_start(); ?>
<?php include "include/errorReport.php"; ?>
<?php
// includo i file necessari a collegarmi al db con relativo script di accesso
include "./include/config.php";

// connessione al DB
$connessione = mysql_connect("$host", "$user", "$pass");

// controllo parametri per la connessione
if (!$connessione) {
    die("Errore critico di Connessione al Database" . mysql_error());
}

// mi collego al db
mysql_select_db("$dbname", $connessione);

// variabili POST con anti sql Injection
$username = mysql_real_escape_string($_POST['username']);
$password = mysql_real_escape_string($_POST['password']); //senza sha1 (decriptazione)

// query da eseguire sul DB per trovare l`utente
$query = "SELECT * FROM login WHERE username = '$username' AND password = '$password' ";
$ris = mysql_query($query, $connessione) or die(mysql_error());
$riga = mysql_fetch_array($ris);

// Prelevo l'identificativo dell'utente
$cod = $riga['username'];

// effettuo controllo
if ($cod == NULL)
    $trovato = 0;
else
    $trovato = 1;

// Se username e password sono corrette
if ($trovato === 1) {
    
    /* Registro la sessione "loginsuccess" */
    $_SESSION["loginsuccess"] = "autorizzato";
    
    /* Registro la sessione "admin" */
    // Questo check l`ho fatto cosi semplice perche in questo caso abbiamo solo due utenti amministratore e operatore.
    // In un sistema piu` grande semplicemente si poteva aggiungere un campo nel DB con un valore 0/1 in base se l`utente
    // doveva essere un operatore o un amministratore.
    if ($riga['username'] == "amministratore")
        $_SESSION["admin"] = 1;
    else
        $_SESSION["admin"] = 0;
    
    /* Registro il codice dell'utente */
    $_SESSION['cod'] = $cod;
    
    // redirect alla pagina protetta
    echo '<script language=javascript>document.location.href="accesso.php"</script>';
} else {
    
    // user e pass erroati, redirect a pagina loginfailed
    echo '<script language=javascript>document.location.href="index.php?msg=loginfailed"</script>';
}

// chiudiamo la connessione con il DB
mysql_close();
?>
