<?php

class UsuariosDAO {
    private $db;

    public function __construct( $banco ) {
        $this->db = $banco;
    }

    public function getUsuario( $id ) {
        $sql = "SELECT nome, email, senha, foto
            FROM usuarios
            WHERE id = $id";

        $res = $this->db->sqlQuery( $sql );
        if( $res ) {
            $row = pg_fetch_object( $res );

            $user = new Usuario();

            $user->setId( $id );
            $user->setNome( $row->nome );
            $user->setEmail( $row->email );
            $user->setSenha( $row->senha );
            $user->setFoto( $row->foto );

            return $user;
        }

        return false;
    }

    public function gravar( $id, $nome, $email, $senha, $foto ) {
        $status = true;

        $sql = "UPDATE usuarios SET
            nome = '$nome', email = '$email'";

        if( $senha != NULL ) {
            $sql .= ", senha = md5( '$senha' )";
        }
        if( $foto['tmp_name'] != NULL ) {
            $nomeFoto = "avatar$id.jpeg";
            $sql .= ", foto = '$nomeFoto'";

            if( !$this->salvaArq( $foto['tmp_name'], $nomeFoto ) ) {
                $status = false;
            }
        }

        $sql .= " WHERE id = $id;";

        if( !$this->db->sqlExec( $sql ) ) {
            $status = false;
        }

        return $status;
    }

    private function salvaArq( $arq, $nomeArq ) {
        return move_uploaded_file( $arq, "../uploads/$nomeArq" );
    }

}