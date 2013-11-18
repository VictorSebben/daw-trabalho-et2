<?php

class AuditLogins {

    private $id;
    private $nome;
    private $data_hora;

    public function getId() {
        return $this->id;
    }

    public function getNome() {
        return $this->nome;
    }

    public function getDataHora() {
        return $this->data_hora;
    }

    public function setId( $id ) {
        $this->id = $id;
    }

    public function setNome( $nome ) {
        $this->nome = $nome;
    }

    public function setDataHora( $data_hora ) {
        $this->data_hora = $data_hora;
    }

}
