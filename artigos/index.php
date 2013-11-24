<?php
$artigosDAO = new ArtigosDAO( new Conexao() );
$catDAO = new CategoriasDAO( new Conexao() );

$url = '?menu=artigos';

$items_per_group = 2;
$total_registros = $artigosDAO->getTotal();
$total_grupos = ceil( $total_registros / $items_per_group );

//$rs = $citacoesDAO->listar();
$view = 'artigos/list.html.php';
?>
