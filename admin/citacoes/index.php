<?php

$citacoesDAO = new CitacoesDAO( new Conexao() );

$url = "?menu=citacoes";

/* Verificar se chegaram ações do usuário */
$acao = H::getVar('acao');

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
    $catDao = new CategoriasDAO( new Conexao() );
    $categorias = $catDao->listar();

    $cit = new Citacao();

    $view = 'citacoes/form.html.php';
 }

else if($acao == 'despublicar'){
    echo $citacoesDAO->despublicar($id) ? 1 : 0;
    exit();
}

else if($acao == 'editar'){
    $categorias = $citacoesDAO->listarCategorias();
    $autores_da_citacao = $citacoesDAO->listarAutoresDaCitacao($_GET['id']);
    $rs = $citacoesDAO->mostrar($_GET['id']);
    include('citacoes_form.php');
}

else if($acao == 'gravar_inserir'){
    $citacao = new Citacao();

    $citacao->setTexto($_POST['texto']);
    $citacao->setCategoria($_POST['categoria']);

	if( $citacoesDAO->gravarInserir( $citacao ) ) {
		echo 'true';
	}
	else {
		echo 'false';
	}
	
	exit();
}

else if($acao == 'gravar_editar'){
    $texto = $_POST['texto'];
    $autores = $_POST['autores'];
    $categoria = $_POST['categoria'];
    $id = $_POST['id'];

    if( $citacoesDAO->gravarEditar($texto, $autores, $categoria, $id) ) {
		echo 'true';
	}
	else {
		echo 'false';
	}
}

?>

