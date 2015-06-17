<?php

include_once 'Pacco.php';

/**
 * Description of Componente
 */
class Componente extends Pacco {

    private $id;
    private $nome;

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
     * Restituisce il nome dell'componente
     * @return string
     */
    public function getNome() {
        return $this->nome;
    }

    /**
     * Imposta il nome dell'componente
     * @param string $nome
     * @return boolean true se il nome e' stato impostato correttamente,
     * false altrimenti
     */
    public function setNome($nome) {
        $this->nome = $nome;
        return $nome != null;
    }

}