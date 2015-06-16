<?php

/**
 * Struttura dati per popolare la vista generica master.php
 */
class ViewDescriptor {

    /**
     * GET http
     */
    const get = 'get';

    /**
     * Post HTTP
     */
    const post = 'post';

    /**
     * Titolo della finestra del browser
     * @var string
     */
    private $titolo;

    /**
     * File che include la definizione HTML dei tab della pagina (parte dello header)
     * @var string
     */
    private $menu_file;

    /**
     * File che include la definizione HTML della sidebar sinistra
     * @var string
     */
    private $footerBar_file;

    /**
     * File che include la definizione HTML della sidebar destra
     * @var string
     */
    private $topBar_file;

    /**
     * Variabile utilizzata in modalita' amministratore per impersonare
     * degli utenti (vedere metodo setImpToken)
     * @var string
     */
    private $impToken;

    /**
     * lista di script javascript da aggiungere alla pagina
     * @var array
     */
    private $js;

    /**
     * flag per dati json (non scrive html)
     * @var boolean
     */
    private $json;

    /**
     * Costruttore
     */
    public function __construct() {
        $this->js = array();
        $this->json = false;
    }

    /**
     * Restituisce il titolo della scheda del browser
     * @return string
     */
    public function getTitolo() {
        return $this->titolo;
    }

    /**
     * Imposta il titolo della scheda del browser
     * @param string $titolo il titolo della scheda del browser
     */
    public function setTitolo($titolo) {
        $this->titolo = $titolo;
    }

    public function getTopFile() {
        return $this->topBar_file;
    }

    public function setTopFile($logoFile) {
        $this->topBar_file = $logoFile;
    }

    public function getMenuFile() {
        return $this->menu_file;
    }

    public function setMenuFile($menuFile) {
        $this->menu_file = $menuFile;
    }

    public function getFooterFile() {
        return $this->footerBar_file;
    }

    public function setFooterFile($footerBar) {
        $this->footerBar_file = $footerBar;
    }

    /**
     * Restituisce il valore corrente del token per fare in modo che
     * un amministratore possa impersonare uno studente o un docente
     * @param string $token
     */
    public function setImpToken($token) {
        $this->impToken = $token;
    }

    /**
     * Scrive un token per gestire quale sia l'utente che l'amministratore
     * sta impersonando per svolgere delle operazioni in sua vece.
     *
     * Questo metodo concentra in un solo punto il mantenimento di questa
     * informazione, che deve essere appesa per ogni get e per ogni post
     * quando si accede all'interfaccia dello studente o del docente
     * in modalita' amministratore, in modo che possano essere impersonati
     * piu' utenti tramite diversi schede dello stesso browser
     *
     * Se avessimo inserito questa informazione in sessione, sarebbe stato
     * possibile gestirne solo uno. Inoltre, in caso di piu' schede aperte con
     * lo stesso browser, i dati sarebbero stati mescolati.
     *
     * Questo e' un esempio di gestione di variabili a livello pagina.
     *
     * @param string $pre il prefisso per attaccare il parametro del token nella
     * query string. Si usi '?' se il token e' il primo parametro e '&' altrimenti
     * @param int $method metodo HTTP (get o set)
     * @return string il valore da scrivere nella URL in caso di get o come
     * hidden input in caso di form
     */
    public function scriviToken($pre = '', $method = self::get) {
        $imp = BaseController::impersonato;
        switch ($method) {
            case self::get:
                if (isset($this->impToken)) {
// nel caso della
                    return $pre . "$imp=$this->impToken";
                }
                break;
            case self::post:
                if (isset($this->impToken)) {
                    return "<input type=\"hidden\" name=\"$imp\" value=\"$this->impToken\"/>";
                }
                break;
        }
        return '';
    }

}
?>

