<?php

class UsuariosDAO {
    private $db;

    public function __construct( $banco ) {
        $this->db = $banco;
    }

}