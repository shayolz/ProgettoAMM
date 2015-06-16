<?php

include_once './model/Destinatario.php';

/**
 *  BaseController
 */
class SimpleController {

    public function handleInput(&$request) {

        if (!isset($request['page'])) {
            $request['page'] = "master";
        }

        switch ($request["page"]) {
            case "master":
                include 'view/master.php';
                break;
            case "accesso":
                include 'pages/accesso.php';
                break;
            case "rimuovi":
                include 'pages/rimuovi.php';
                break;
            case "inserisci":
                include 'pages/inserisci.php';
                break;
            case "mappa":
                include 'pages/mappa.php';
                break;
            case "totaleprodotti":
                include 'pages/totaleprodotti.php';
                break;
            case "contatta":
                include 'pages/contatta.php';
                break;
            case "contattacode":
                include 'pages/contattacode.php';
                break;
            case "documentazione":
                include 'pages/documentazione.php';
                break;
            case "logout":
                include 'pages/logout.php';          
                break;

            default:
                include 'view/master.php';
                break;
        }
    }
}
