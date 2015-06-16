<?php

class Database {

    // Localhost
    public static $db_host = 'localhost'; // MySQL Host ip
    public static $db_user = 'root'; // MysQL DB User
    public static $db_password = 'davide'; // MySQL DB Pass
    public static $db_name = 'progettoAM'; // MySQL DB Name
    // Debug, mostra l'apertura e la chiusura di una connessione
    public static $db_debug = 'true'; // Debug mode

// Server pubblico
//public static $db_host = 'localhost'; // MySQL Host ip
//public static $db_user='silvanoEnrico'; // MysQL DB User
//public static $db_password='criceto6923'; // MySQL DB Pass
//public static $db_name='amm15_silvanoEnrico'; // MySQL DB Name
}

$mysqli = new mysqli();
$mysqli->connect(Database::$db_host, Database::$db_user, Database::$db_password, Database::$db_name);

// controllo se ci sono errori
if ($mysqli->connect_errno != 0) {
//gestione errore
    $idErrore = $mysqli->connect_errno;
    $msg = $mysqli->connect_error;
    error_log("Errore nella connessione al server$idErrore:$msg", 0);
    echo "Errore nella connessione $msg";
} else {
    if (Database::$db_debug == "true") {
        echo "DEBUG MODE: Connessione aperta.</br>";
    }
// tutto ok
}
?>