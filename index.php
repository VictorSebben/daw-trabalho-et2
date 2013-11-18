<?php

include 'inc/inc.init.php';
include 'inc/inc.H.php';

$menu = H::getVar('menu', 'REQUEST');
$acao = H::getVar('acao', 'REQUEST');
$id = H::getVar('id', 'REQUEST');

switch($menu) {
    case 'artigos':
        include './artigos/index.php';
        break;

    case 'citacoes':
        include './citacoes/index.php';
        break;

    default:
        $view = './home.php';
}

include 'template.html.php';