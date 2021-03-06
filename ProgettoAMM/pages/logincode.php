<?php

// Evitiamo che il file venga richiesto direttamente
if (__FILE__ == filter_input(INPUT_SERVER, 'SCRIPT_FILENAME', FILTER_SANITIZE_STRING)) {
    echo '<script language=javascript>document.location.href="../index.php?page=accesso"</script>';
    exit();
}
?>
<?php

include_once './view/magazzino.php';
include_once './view/ViewDescriptor.php';
?>
<?php

if (isset($_REQUEST["login"]) && isset($_REQUEST["username"]) && isset($_REQUEST["password"])) {
    if (login($_REQUEST["username"], $_REQUEST["password"])) {
        /* Registro la sessione "loginsuccess" */
        $_SESSION["loginsuccess"] = "autorizzato";

        if ($_REQUEST["username"] == "amministratore") {
            $utente->setAdmin(1);
        } else {
            $utente->setAdmin(0);
        }
        
        // redirect alla pagina protetta
        echo '<script language=javascript>document.location.href="./index.php?page=accesso"</script>';
    } else {
        // user e pass erroati, redirect a pagina loginfailed
        echo '<script language=javascript>document.location.href="./index.php?msg=loginfailed"</script>';
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
