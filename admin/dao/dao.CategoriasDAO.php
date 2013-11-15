<?php

class CategoriasDAO {
    private $db;

    public function __construct( $banco ) {
        $this->db = $banco;
    }

    public function listar() {

        $sql = "SELECT categorias.id, categorias.descricao FROM categorias";

        $res = $this->db->sqlQuery( $sql );
        if( $res ) {
            $categorias = array();

            while( $row = pg_fetch_object($res) ) {
                $c = new Categoria();
                $c->setId($row->id);
                $c->setDescricao($row->descricao);

                array_push($categorias, $c);
            }

            return $categorias;
        }

        return false;
    }
}