<?php

class Conexao {
    private $con;

    function __construct() {
        $this->db_conecta();
    }

    public function db_conecta() {
        $this->con = pg_connect( "host='localhost' user='ifsul'"
                . "password='ifsul' dbname='db_repo_conhecimentos_daw1'"
                . "port='5432'" ) or die( "Não foi possível conectar ao banco de dados." );

    }

//    public function getConexao() {
//        if ( ! $this->con ) {
//            new self();
//        }
//
//        return self::$con;
//    }

    public function sqlQuery( $sql ) {
        if ( pg_connection_status($this->con ) === PGSQL_CONNECTION_OK ) {
            pg_send_query( $this->con, $sql );
            $res = pg_get_result( $this->con );
            return pg_num_rows( $res ) > 0 ? $res : FALSE;
        }
        else {
            echo "Erro na conexão";
            die();
        }
    }

    public function sqlExec( $sql ) {
        $res = pg_query($this->con, $sql);

        return pg_affected_rows( $res ) > 0 ? TRUE : FALSE;
    }
}
