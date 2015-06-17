<?php

/**
 * Description of Componente
 */
class Pacco {

    private $id;
    private $reparto;
    private $sezione;
    private $quantità;

    /**
     * Restituisce un identificatore unico per il pacco
     * @return int
     */
    public function getId() {
        return $this->id;
    }

    /**
     * Imposta un identificatore unico per il pacco
     * @param int $id
     * @return boolean true se il valore e' stato aggiornato correttamente,
     * false altrimenti
     */
    public function setId($id) {
        $this->id = $id;
    }

        /**
     * Imposta il reparto
     * @param string $reparto
     * @return boolean true se il testo e' stato impostato correttamente,
     * false altrimenti
     */
    public function setReparto($reparto) {
        $this->reparto = $reparto;
        return $reparto != null;
    }
    
    /**
     * Restituisce il reparto
     * @return string
     */
    public function getReparto() {
        return $this->reparto;
    }

    /**
     * Imposta la sezione
     * @param string $sezione
     * @return boolean true se il testo e' stato impostato correttamente,
     * false altrimenti
     */
    public function setSezione($sezione) {
        $this->sezione = $sezione;
        return $sezione != null;
    }
    
    /**
     * Restituisce il sezione
     * @return string
     */
    public function getSezione() {
        return $this->sezione;
    }

    /**
     * Imposta la quantità
     * @param string $quantità
     * @return boolean true se il testo e' stato impostato correttamente,
     * false altrimenti
     */
    public function setQuantità($quantità) {
        $this->quantità = $quantità;
        return $quantità != null;
    }
    
    /**
     * Restituisce la quantità
     * @return string
     */
    public function getQuantità() {
        return $this->quantità;
    }

}