<?php

define( 'CRIACAO', 1 );
define( 'EDICAO', 2 );
define( 'REMOCAO', 3 );

header( 'Content-type: text/html; Charset=UTF-8' );
session_start();

function __autoload( $class_name ) {
    if (file_exists( "dao/dao.$class_name.php" ) ) {
        include "dao/dao.$class_name.php";
    }

    if (file_exists("model/class.$class_name.php" ) ) {
        include "model/class.$class_name.php";
    }
}