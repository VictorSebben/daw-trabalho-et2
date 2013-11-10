<?php

class CitacoesDAO {
    private $db;
    private $totalPag; // para o total de páginas
    private $pag; // número da página atual

    public function __construct( $banco ) {
        $this->db = $banco;
    }

    public function getCitacoes( $sql ) {
        $res = $this->db->sqlQuery( $sql );
        return $res;
    }

    public function listar() {
        $sql = "SELECT citacoes.id, LEFT ( citacoes.texto, 30 ) AS texto, citacoes.autor, categorias.descricao, usuarios.nome
            FROM citacoes, categorias, usuarios
            WHERE categorias.id = citacoes.id_categoria
            AND usuarios.id = citacoes.id_usuario";


        $res = $this->db->sqlQuery( $sql );
        if( $res ) {
            $citacoes = array();

            while( $row = pg_fetch_object($res) ) {
                $c = new Citacao();
                $c->setId($row->id);
                $c->setCategoria($row->descricao);
                $c->setUsuario($row->nome);
                $c->setAutor($row->autor);
                $c->setTexto($row->texto);

                array_push($citacoes, $c);
            }

            return $citacoes;
        }

        return false;
    }
}