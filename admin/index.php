<?php

include 'inc/inc.init.php';
include 'inc/inc.H.php';

//$modCit = new CitacoesDAO(new Conexao());
//
//$sql = 'SELECT * FROM citacoes';
//$res = $modCit->getCitacoes($sql);
//var_dump($res);
//
//while( $row = pg_fetch_object($res) ) {
//    var_dump($row->texto);
//}

$menu = H::getVar('menu', 'GET');
var_dump($menu);