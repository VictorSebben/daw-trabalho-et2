<?php

$citacoesDAO = new CitacoesDAO( new Conexao() );
$catDAO = new CategoriasDAO( new Conexao() );

$url = "?menu=citacoes";

/* Incluir arquivos conforme ação escolhida pelo usuário */
if($acao == 'listar' || $acao == NULL) {
    $pagmenu = 'citacoes';
    $pagordem = isset($_REQUEST['ordem']) ? $_REQUEST['ordem'] : 'nome';
    $pagpesq = H::getVar( 'pesquisa' );

    $pagina_atual = ( ! empty( $_GET[ 'pag' ] ) ) ? ( int ) $_GET[ 'pag' ] : 1;
    $num_registros_por_pagina = 2;

    if ( $pagpesq !== NULL ) {
        $citacoesDAO->setPesquisa( $pagpesq );
    }

    $citacoesDAO->setPagAtual( $pagina_atual );
    $citacoesDAO->setLimit( $num_registros_por_pagina );

    $total_registros = $citacoesDAO->getTotal();

    $rs = $citacoesDAO->listar();
    $view = 'citacoes/list.html.php';
}

else if($acao == 'inserir'){
    $catDAO = new CategoriasDAO( new Conexao() );
    $categorias = $catDAO->listar();

    $cit = new Citacao();

    $view = 'citacoes/form.html.php';
 }

else if($acao == 'despublicar'){
    echo $citacoesDAO->despublicar($id) ? 1 : 0;
    exit();
}

else if($acao == 'editar'){
    $categorias = $catDAO->listar();

    $cit = $citacoesDAO->getCitacao( $id );

    $view = 'citacoes/form.html.php';
}

else if($acao == 'gravar_inserir'){
    $citacao = new Citacao();

    $citacao->setTexto($_POST['texto']);
    $citacao->setCategoria($_POST['categoria']);

	if( $citacoesDAO->gravar( $citacao ) ) {
		echo 'true';
	}
	else {
		echo 'false';
	}

	exit();
}

else if($acao == 'gravar_editar'){
    $citacao = new Citacao();

    $citacao->setId( $id );
    $citacao->setCategoria( $_POST['categoria'] );
    $citacao->setTexto( $_POST['texto'] );

    if( $citacoesDAO->gravar( $citacao ) ) {
		echo 'true';
	}
	else {
		echo 'false';
	}

    exit();
}

?>

