<?php

include 'inc/inc.init.php';
include 'inc/inc.H.php';

$menu = H::getVar('menu', 'GET');
$acao = H::getVar('acao', 'GET');

switch($menu) {
    case 'artigos':
        include './artigos/index.php';
        break;

    case 'citacoes':
        include './citacoes/index.php';
        break;
}

include 'template.html.php';