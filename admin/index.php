<?php

include 'inc/inc.init.php';
include 'inc/inc.H.php';
include 'inc/inc.login.php';

$menu = H::getVar('menu', 'REQUEST');
$acao = H::getVar('acao', 'REQUEST');
$id = H::getVar('id', 'REQUEST');

$tmpl = TRUE;

switch($menu) {
    case 'artigos':
        include './artigos/index.php';
        break;

    case 'citacoes':
        include './citacoes/index.php';
        break;

    case 'ranking':
        include './ranking/index.php';
        break;

    case 'audit_logins':
        $auditDAO = new AuditoriasDAO( new Conexao() );
        $audits = $auditDAO->listarLogins();
        include './audits/logins.php';
        $tmpl = FALSE;
        break;

    case 'usuario':
        include './usuarios/index.php';
        break;

    default:
        $view = './welcome.php';
}

if ( $tmpl ) {
    include 'template.html.php';
}
