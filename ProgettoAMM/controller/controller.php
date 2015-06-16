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
            case "rimuovicode":
                include 'pages/rimuovicode.php';
                break;
            case "rimuovicodeid":
                include 'pages/rimuovicodeid.php';
                break;
            case "inserisci":
                include 'pages/inserisci.php';
                break;
            case "inseriscicode":
                include 'pages/inseriscicode.php';
                break;
            case "mappa":
                include 'pages/mappa.php';
                break;
            case "mappacode":
                include 'pages/mappacode.php';
                break;
            case "totaleprodotti":
                include 'pages/totaleprodotti.php';
                break;
            case "totaleprodotticode":
                include 'pages/totaleprodotticode.php';
                break;
            case "contatta":
                include 'pages/contatta.php';
                break;
            case "contattacode":
                include 'pages/contattacode.php';
                break;
            case "contattaleggi":
                include 'pages/contattaleggi.php';
                break;
            case "contattaleggiform":
                include 'pages/contattaleggiform.php';
                break;
            case "documentazione":
                include 'pages/documentazione.php';
                break;
            case "logincode":
                include 'pages/logincode.php';
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
