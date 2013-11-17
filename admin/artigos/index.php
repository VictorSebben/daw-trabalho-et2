<?php

$artigosDAO = new ArtigosDAO( new Conexao() );
$catDAO = new CategoriasDAO( new Conexao() );

$url = "?menu=artigos";

/* Verificar se chegaram ações do usuário */
$acao = H::getVar('acao');

if( $acao == 'listar' || $acao == NULL ) {
    $pagmenu = 'artigos';
    $pagordem = isset($_REQUEST['ordem']) ? $_REQUEST['ordem'] : 'nome';
    $pagpesq = H::getVar( 'pesquisa' );

    $pagina_atual = ( ! empty( $_GET[ 'pag' ] ) ) ? ( int ) $_GET[ 'pag' ] : 1;
    $num_registros_por_pagina = 2;

    if ( $pagpesq !== NULL ) {
        $artigosDAO->setPesquisa( $pagpesq );
    }

    $artigosDAO->setPagAtual( $pagina_atual );
    $artigosDAO->setLimit( $num_registros_por_pagina );

    $total_registros = $artigosDAO->getTotal();

    $rs = $artigosDAO->listar();
    $view = './artigos/list.html.php';
}

else if($acao == 'inserir'){
    $catDAO = new CategoriasDAO( new Conexao() );
    $categorias = $catDAO->listar();

    $art = new Artigo();

    $view = 'artigos/form.html.php';
 }

else if($acao == 'despublicar'){
    echo $artigosDAO->despublicar($id) ? 1 : 0;
    exit();
}

else if($acao == 'editar'){
    $categorias = $catDAO->listar();

    $art = $artigosDAO->getArtigo( $id );

    $view = 'artigos/form.html.php';
}

else if($acao == 'gravar_inserir'){
    $artigo = new Artigo();

    $artigo->setTitulo( $_POST['titulo'] );
    $artigo->setTexto( $_POST['texto'] );
    $artigo->setCategoria( $_POST['categoria'] );

	if( $artigosDAO->gravar( $artigo ) ) {
		echo 'true';
	}
	else {
		echo 'false';
	}

	exit();
}

else if($acao == 'gravar_editar'){
    $artigo = new Artigo();

    $artigo->setId( $id );
    $artigo->setTitulo( $_POST['titulo'] );
    $artigo->setTexto( $_POST['texto'] );
    $artigo->setCategoria( $_POST['categoria'] );

    if( $artigosDAO->gravar( $artigo ) ) {
		echo 'true';
	}
	else {
		echo 'false';
	}

    exit();
}