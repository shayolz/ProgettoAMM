<?php

// Evitiamo che il file venga richiesto direttamente
if (__FILE__ == $_SERVER['SCRIPT_FILENAME']) {
    echo '<script language=javascript>document.location.href="../index.php?page=accesso"</script>';
    exit();
}
?>
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
