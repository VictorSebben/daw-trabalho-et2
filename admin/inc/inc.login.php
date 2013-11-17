<?php

if( isset( $_POST['email'] ) ){
    $email = $_POST['email'];
    $senha = $_POST['senha'];

    $sql = "SELECT id, nome, email, senha
        FROM usuarios
        WHERE email = '$email'
        AND senha = md5( '$senha' )";

    $db = new Conexao();
    $rs = $db->sqlQuery( $sql );

    if( $rs && pg_num_rows( $rs ) == 1 ) {
        $row = pg_fetch_object( $rs );

        if( $row->email == $email && $row->senha == md5( "$senha" ) ){
            $_SESSION['user_id'] = $row->id;
            $_SESSION['user_nome'] = $row->nome;

            session_write_close();

            // inserir informações no audit_login
            $sql = "INSERT INTO audit_logins ( id_usuario, data_login )
                VALUES ( {$row->id}, LOCALTIMESTAMP )";

            $db->sqlExec( $sql );

            header( 'Location: ./' );
        }
    }

    else {
        header( 'Location: ./?erro' );
    }
}


if( !isset( $_SESSION['user_nome'] ) ){
    include 'login.form.php';
    exit();
}

if( isset( $_GET['logout'] ) ) {
    unset( $_SESSION['user_id'] );
    unset( $_SESSION['user_nome'] );

    session_destroy();

    header( 'Location: ./' );
}