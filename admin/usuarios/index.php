<?php

$usuarioDAO = new UsuariosDAO( new Conexao() );

if( $acao == 'listar' || $acao == NULL ) {
    $u = $usuarioDAO->getUsuario( $_SESSION['user_id'] );

    $view = 'usuarios/form.html.php';
}

else if( $acao == 'gravar' ) {
    $id = H::getVar( 'id', 'POST' );
    $nome = H::getVar( 'nome', 'POST' );
    $email = H::getVar( 'email', 'POST' );
    $senha = H::getVar( 'senha', 'POST' );

    if( isset($_FILES['foto'] )) {
        $foto = $_FILES['foto'];
    }
    else {
        $foto = null;
    }

    $res = $usuarioDAO->gravar( $id, $nome, $email, $senha, $foto );

    echo $res ? 1 : 0;
    exit();
}