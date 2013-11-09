<?php

include 'inc/inc.init.php';

$modCit = new CitacoesDAO(new Conexao());

$sql = 'SELECT * FROM citacoes';
$res = $modCit->getCitacoes($sql);
var_dump($res);

while( $row = pg_fetch_object($res) ) {
    var_dump($row->texto);
}