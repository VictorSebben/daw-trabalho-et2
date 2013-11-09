<?php

class H {
    public static function getVar($nomeParam, $metodo = 'REQUEST') {
        if( $metodo == 'GET' ) {
            return isset( $_GET[$nomeParam] ) ?
                filter_input( INPUT_GET, $nomeParam, FILTER_SANITIZE_SPECIAL_CHARS ) : NULL;
        }

        else if( $metodo == 'POST' ) {
            return isset( $_POST[$nomeParam] ) ?
                filter_input( INPUT_POST, $nomeParam, FILTER_SANITIZE_SPECIAL_CHARS ): NULL;
        }

        else {
            return isset( $_REQUEST[$nomeParam] ) ?
                filter_input( INPUT_REQUEST, $nomeParam, FILTER_SANITIZE_SPECIAL_CHARS ) : NULL;
        }
    }
}

