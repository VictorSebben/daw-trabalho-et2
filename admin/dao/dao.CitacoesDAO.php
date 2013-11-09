<?php

class CitacoesDAO {
    private $db;


    public function __construct( $con ) {
        $this->db = $con;
    }

    public function getCitacoes( $sql ) {
        $res = $this->db->sqlQuery( $sql );
        return $res;
    }
}