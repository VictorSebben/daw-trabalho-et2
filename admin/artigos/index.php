<?php

$artigosDAO = new ArtigosDAO( new Conexao() );

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