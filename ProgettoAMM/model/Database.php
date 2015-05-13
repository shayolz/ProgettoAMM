<?php

class Settings {

// Localhost
    public static $db_host = 'localhost'; // MySQL Host ip
    public static $db_user = 'root'; // MysQL DB User
    public static $db_password = 'davide'; // MySQL DB Pass
    public static $db_name = 'progettoAM'; // MySQL DB Name

// Server pubblico
//public static $db_host = 'localhost'; // MySQL Host ip
//public static $db_user='silvanoEnrico'; // MysQL DB User
//public static $db_password='criceto6923'; // MySQL DB Pass
//public static $db_name='amm15_silvanoEnrico'; // MySQL DB Name
}

$mysqli = new mysqli();
$mysqli->connect(Settings::$db_host, Settings::$db_user, Settings::$db_password, Settings::$db_name);

// controllo se ci sono errori
if ($mysqli->connect_errno != 0) {
//gestione errore
    $idErrore = $mysqli->connect_errno;
    $msg = $mysqli->connect_error;
    error_log("Errore nella connessione al server$idErrore:$msg", 0);
    echo "Errore nella connessione $msg";
} else {
// tutto ok
}
?>