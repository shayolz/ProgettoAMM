<?php
include_once './view/ViewDescriptor.php';
date_default_timezone_set("Europe/Rome");
// punto unico di accesso all'applicazione
FrontController::dispatch($_REQUEST);
/**
* Classe che controlla il punto unico di accesso all'applicazione
* @author Davide Spano
*/
class FrontController {
/**
* Gestore delle richieste al punto unico di accesso all'applicazione
* @param array $request i parametri della richiesta
*/
public static function dispatch(&$request) {
// inizializziamo la sessione
session_start();
if (isset($request["page"])) {
switch ($request["page"]) {
case "destinatario":
break;
default:
self::write404();
break;
}
} else {
self::write404();
}
}
/**
* Crea una pagina di errore quando il path specificato non esiste
*/
public static function write404() {
// impostiamo il codice della risposta http a 404 (file not found)
header('HTTP/1.0 404 Not Found');
$titolo = "File non trovato!";
$messaggio = "La pagina che hai richiesto non &egrave; disponibile";
//include_once('error.php');
exit();
}
/**
* Crea una pagina di errore quando l'utente non ha i privilegi
* per accedere alla pagina
*/
public static function write403() {
// impostiamo il codice della risposta http a 404 (file not found)
header('HTTP/1.0 403 Forbidden');
$titolo = "Accesso negato";
$messaggio = "Non hai i diritti per accedere a questa pagina";
$login = true;
//include_once('error.php');
exit();
}
}
