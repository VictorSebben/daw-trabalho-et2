<?php

$auditDAO = new AuditoriasDAO( new Conexao() );

if($acao == NULL) {
    if( !isset($_GET['mes'] )){
        $mes =  date( 'm/Y', time() );
    }
    else {
        $mes = H::getVar( 'mes', 'GET' );
    }

    $rs = $auditDAO->listarRanking( $mes );

    $view = 'ranking/list.html.php';
}