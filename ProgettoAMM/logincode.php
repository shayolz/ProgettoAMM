<?php session_start(); ?>
<?php include "include/errorReport.php"; ?>
<?php

/*
 * LEGGERE QUA:
 * 
 * Ho sostituito il sistema di login con quello riportato nelle slides.
 * Il file logincode2.php non viene piu' utlizzato anche se funzionante.
 * Utilizzava il database per i due utenti.
 * 
 */

if (isset($_REQUEST["login"]) && isset($_REQUEST["username"]) && isset($_REQUEST["password"])) {
    if (login($_REQUEST["username"], $_REQUEST["password"])) {
        /* Registro la sessione "loginsuccess" */
        $_SESSION["loginsuccess"] = "autorizzato";

        // redirect alla pagina protetta
        echo '<script language=javascript>document.location.href="accesso.php"</script>';
    } else {

        // user e pass erroati, redirect a pagina loginfailed
        echo '<script language=javascript>document.location.href="index.php?msg=loginfailed"</script>';
    }
}

function login($user, $password) {
    if ($user == "amministratore" && $password == "prova") {
        /* Registro la sessione "admin" */
        $_SESSION["admin"] = 1;

        /* Registro la sessione col nome utente */
        $_SESSION["cod"] = $user;

        return true;
    } else if ($user == "operatore" && $password == "prova") {
        /* Registro la sessione "admin" */
        $_SESSION["admin"] = 0;

        /* Registro la sessione col nome utente */
        $_SESSION["cod"] = $user;

        return true;
    }

    return false;
}

?>