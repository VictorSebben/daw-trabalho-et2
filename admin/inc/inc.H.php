<?php

class H {
    public static function getVar($nomeParam, $metodo = 'REQUEST') {
        if( $metodo == 'GET' ) {
            return isset( $_GET[$nomeParam] ) ?
                $_GET[$nomeParam] : NULL;
        }

        else if( $metodo == 'POST' ) {
            return isset( $_POST[$nomeParam] ) ?
                $_POST[$nomeParam] : NULL;
        }

        else {
            return isset( $_REQUEST[$nomeParam] ) ?
                $_REQUEST[$nomeParam] : NULL;
        }
    }

    public static function menuAtivo( $menu ) {
        if( H::getVar( 'menu' ) == $menu ) {
            echo "class='ativo'";
        }
    }
}