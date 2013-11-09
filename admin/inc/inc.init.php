<?php

function __autoload( $class_name ) {
    if (file_exists( "dao/dao.$class_name.php" ) ) {
        include "dao/dao.$class_name.php";
    }

    if (file_exists("model/class.$class_name.php" ) ) {
        include "model/class.$class_name.php";
    }
}