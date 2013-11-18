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

    public static function pAttr( $obj, $field ) {
        if ( $obj->__get( $field ) != NULL )
            echo $obj->__get( $field );
    }

	public static function sysMsgs(  ) {
        if( isset( $_SESSION['msg_sucesso'] )){
            echo "<div class='sucesso'>{$_SESSION['msg_sucesso']}</div>";
            unset( $_SESSION['msg_sucesso'] );
        }

        if( isset( $_SESSION['msg_erro'] )) {
            echo "<div class='erro'>{$_SESSION['msg_erro']}</div>";
            unset( $_SESSION['msg_erro'] );
        }
    }

    public static function listarMeses( $intervalo ) {
        $meses = array();
        $mesAtual = ( int ) date( 'm' );

        for( $x = $mesAtual; $x > $mesAtual - $intervalo; $x-- ) {
            $meses[] = date( 'm/Y', mktime(0, 0, 0, $x, 1) );
        }

        return $meses;
    }
}