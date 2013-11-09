<?php

class CitacoesDAO {
    private $db;


    public function __construct( $banco ) {
        $this->db = $banco;
    }

    public function getCitacoes( $sql ) {
        $res = $this->db->sqlQuery( $sql );
        return $res;
    }
}