<?php session_start(); ?>
<?php include "include/errorReport.php"; ?>
<?php

/*
 * LEGGERE QUA:
 * 
 * Questo file non viene piu' utilizzato anche se funzionante.
 * Avevo fatto il login degli utenti tramite database.
 * Ho usato il sistema piu' semplice proiettato nelle slides.
 * Il file utilizzato dal sistema e' logincode.php
 * 
 */

// includo i file necessari a collegarmi al db con relativo script di accesso
                include "./model/Database.php";
                
// Ho fatto che gli utenti sono salvati nel database
// quindi il sistema controlla se l`id e la pass sono corretti
// attraverso una connessione con il database.

// connessione al DB
$connessione = mysql_connect("$host", "$user", "$pass");

// controllo parametri per la connessione
if (!$connessione) {
    die("Errore critico di Connessione al Database" . mysql_error());
}

// mi collego al db
mysql_select_db("$dbname", $connessione);

// Se una delle due variabili non e' stata inizializzata viene reindirizzato al login
// Non dovrebbe mai accadere!!
if(!isset($_REQUEST['username']) || !isset($_REQUEST['password'])){
    echo '<script language=javascript>document.location.href="index.php"</script>';
    return;  
}
    
// variabili POST con anti sql Injection
$username = mysql_real_escape_string($_REQUEST['username']);
$password = mysql_real_escape_string($_REQUEST['password']); //senza sha1 (decriptazione)

// query da eseguire sul DB per trovare l`utente
$query = "SELECT * FROM login WHERE username = '$username' AND password = '$password' ";
$ris = $mysqli->query($query, $connessione) or die(mysql_error());
$riga = $ris->fetch_array();

// Prelevo l'identificativo dell'utente se l`id e la pass coincidono
$cod = $riga['username'];

// effettuo controllo
if ($cod == NULL) {
    $trovato = 0;
} else {
    $trovato = 1;
}

// Se username e password sono corrette
if ($trovato === 1) {

    /* Registro la sessione "loginsuccess" */
    $_SESSION["loginsuccess"] = "autorizzato";

    /* Registro la sessione "admin" */
    // Questo check l`ho fatto cosi semplice perche in questo caso abbiamo solo due utenti amministratore e operatore.
    // In un sistema piu` grande semplicemente si poteva aggiungere un campo nel DB con un valore 0/1 in base se l`utente
    // doveva essere un operatore o un amministratore.
    if ($riga['username'] == "amministratore") {
        $_SESSION["admin"] = 1;
    } else {
        $_SESSION["admin"] = 0;
    }

    /* Registro il codice dell'utente */
    $_SESSION['cod'] = $cod; // nome utente univoco

    // redirect alla pagina protetta
    echo '<script language=javascript>document.location.href="accesso.php"</script>';
} else {

    // user e pass erroati, redirect a pagina loginfailed
    echo '<script language=javascript>document.location.href="index.php?msg=loginfailed"</script>';
}

               //Chiusura della connessione
               $mysqli->close();
               
               if(Database::$db_debug == "true"){
                  echo "DEBUG MODE: Connessione chiusa.<br>";
                }
?>