<?php

$citacoesDAO = new CitacoesDAO( new Conexao() );

$url = "?menu=citacoes";

/* Verificar se chegaram ações do usuário */
$acao = H::getVar('acao');

/* Incluir arquivos conforme ação escolhida pelo usuário */
if($acao == 'listar' || $acao == NULL) {
    $rs = $citacoesDAO->listar();
    $view = 'citacoes/list.html.php';
}

else if($acao == 'inserir'){
    $autores = $citacoesDAO->listarAutores();
    $categorias = $citacoesDAO->listarCategorias();
    $autores_da_citacao = "";
    $rs->fields['id'] = "";
    $rs->fields['texto'] = "";
    $rs->fields['id_categoria'] = "";
    include('citacoes_form.php');
}

else if($acao == 'remover'){
    $citacoesDAO->remover($_GET['id']);
    header("Location: $url");
}

else if($acao == 'editar'){
    $autores = $citacoesDAO->listarAutores();
    $categorias = $citacoesDAO->listarCategorias();
    $autores_da_citacao = $citacoesDAO->listarAutoresDaCitacao($_GET['id']);
    $rs = $citacoesDAO->mostrar($_GET['id']);
    include('citacoes_form.php');
}

else if($acao == 'gravar_inserir'){
    $texto = $_POST['texto'];
    $autores = $_POST['autores'];
    $categoria = $_POST['categoria'];

    $citacoesDAO->gravarInserir($texto, $autores, $categoria);
    header("Location: $url");
}

else if($acao == 'gravar_editar'){
    $texto = $_POST['texto'];
    $autores = $_POST['autores'];
    $categoria = $_POST['categoria'];
    $id = $_POST['id'];

    $citacoesDAO->gravarEditar($texto, $autores, $categoria, $id);
    header("Location: $url");
}

?>

