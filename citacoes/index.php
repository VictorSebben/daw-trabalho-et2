<?php
$citacoesDAO = new CitacoesDAO( new Conexao() );
$catDAO = new CategoriasDAO( new Conexao() );

$url = "?menu=citacoes";

$items_per_group = 4;
$total_registros = $citacoesDAO->getTotal();
$total_grupos = ceil( $total_registros / $items_per_group );

?>


<?php
//$rs = $citacoesDAO->listar();
$view = 'citacoes/list.html.php';
?>
