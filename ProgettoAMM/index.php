<?php

include_once './view/ViewDescriptor.php';
include_once './controller/controller.php';
date_default_timezone_set("Europe/Rome");

// punto unico di accesso all'applicazione
FrontController::dispatch($_REQUEST);

/**
 * Classe che controlla il punto unico di accesso all'applicazione
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
                case "master":
                    $controller = new SimpleController();
                    $controller->handleInput($request);
                    break;
                case "accesso":
                    $controller = new SimpleController();
                    $controller->handleInput($request);
                    break;
                case "rimuovi":
                    $controller = new SimpleController();
                    $controller->handleInput($request);
                    break;
                case "rimuovicode":
                    $controller = new SimpleController();
                    $controller->handleInput($request);
                    break;
                case "rimuovicodeid":
                    $controller = new SimpleController();
                    $controller->handleInput($request);
                    break;
                case "inserisci":
                    $controller = new SimpleController();
                    $controller->handleInput($request);
                    break;
                case "inseriscicode":
                    $controller = new SimpleController();
                    $controller->handleInput($request);
                    break;
                case "logincode":
                    $controller = new SimpleController();
                    $controller->handleInput($request);
                    break;
                case "mappa":
                    $controller = new SimpleController();
                    $controller->handleInput($request);
                    break;
                case "mappacode":
                    $controller = new SimpleController();
                    $controller->handleInput($request);
                    break;
                case "totaleprodotti":
                    $controller = new SimpleController();
                    $controller->handleInput($request);
                    break;
                case "totaleprodotticode":
                    $controller = new SimpleController();
                    $controller->handleInput($request);
                    break;
                case "contatta":
                    $controller = new SimpleController();
                    $controller->handleInput($request);
                    break;
                case "contattacode":
                    $controller = new SimpleController();
                    $controller->handleInput($request);
                    break;
                case "contattaleggi":
                    $controller = new SimpleController();
                    $controller->handleInput($request);
                    break;
                case "contattaleggiform":
                    $controller = new SimpleController();
                    $controller->handleInput($request);
                    break;
                case "documentazione":
                    $controller = new SimpleController();
                    $controller->handleInput($request);
                    break;
                case "logout":
                    $controller = new SimpleController();
                    $controller->handleInput($request);
                    break;
                default:
                    self::write404();
                    break;
            }
        } else {
            $request["page"] = "master";
            $controller = new SimpleController();
            $controller->handleInput($request);
            echo '<script language=javascript>document.location.href="index.php?page=master"</script>';
        }
    }

    /**
     * Crea una pagina di errore quando il path specificato non esiste
     */
    public static function write404() {
        // impostiamo il codice della risposta http a 404 (file not found)
        header('HTTP/1.0 404 Not Found');
        $titolo = "<h1>File non trovato.</h1>";
        $messaggio1 = "La pagina che hai richiesto non &egrave; disponibile";
        $messaggio2 = "Per tornare in home page clicca <a href='index.php'><font color='blue'>qui</font></a>";
        echo $titolo . '<br>' . $messaggio1 . '<br>' . $messaggio2;
        exit();
    }
}
