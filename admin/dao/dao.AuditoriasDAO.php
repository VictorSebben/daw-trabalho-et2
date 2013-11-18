<?php

class AuditoriasDAO {
    private $db;

    public function __construct( $banco ) {
        $this->db = $banco;
    }

    public function listarLogins() {
        $sql = "SELECT
                   audit_logins.id,
                   usuarios.nome,
                   TO_CHAR(audit_logins.data_login, 'DD/MM/YYYY - HH24:MI:SS') AS data_hora
                FROM usuarios
                INNER JOIN audit_logins ON audit_logins.id_usuario = usuarios.id;";

        $res = $this->db->sqlQuery( $sql );
        if( $res ) {
            $audits = array();

            while( $row = pg_fetch_object( $res ) ) {
                $al = new AuditLogins();
                $al->setId( $row->id );
                $al->setNome( $row->nome );
                $al->setDataHora( $row->data_hora );

                array_push( $audits, $al );
            }

            return $audits;
        }

        return false;
    }

    public function listarRanking( $mes ) {
        list($mes, $ano) = explode('/', $mes);

        $sql = "SELECT
                   usuarios.id,
                   usuarios.nome,
                   COUNT( audit_logins.id ) AS num
                FROM usuarios
                INNER JOIN audit_logins ON audit_logins.id_usuario = usuarios.id
                WHERE EXTRACT ( MONTH FROM audit_logins.data_login ) = '$mes'
                    AND EXTRACT ( YEAR FROM audit_logins.data_login ) = '$ano'
                GROUP BY usuarios.id, usuarios.nome
                ORDER BY num DESC";

        $res = $this->db->sqlQuery( $sql );

        if( $res ) {
            return $res;
        }

        return false;
    }
}

