<?php

// includiamo l'utente
include_once 'Utente.php';

/**
 * Description of Componente
 */
class ContactForm {

    private $id;
    private $testo;

    /**
     * Restituisce un identificatore unico per il componente
     * @return int
     */
    public function getId() {
        return $this->id;
    }

    /**
     * Imposta un identificatore unico per il componente
     * @param int $id
     * @return boolean true se il valore e' stato aggiornato correttamente,
     * false altrimenti
     */
    public function setId($id) {
        $this->id = $id;
    }

    /**
     * Restituisce il testo del messaggio
     * @return string
     */
    public function getTesto() {
        return $this->nome;
    }

    /**
     * Imposta il testo del messaggio
     * @param string $testo
     * @return boolean true se il testo e' stato impostato correttamente,
     * false altrimenti
     */
    public function setTesto($testo) {
        $this->testo = $testo;
        return $testo != null;
    }

}

?>