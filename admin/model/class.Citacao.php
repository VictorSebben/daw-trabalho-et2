<?php

class Citacao {
    private $id;
    private $categoria;
    private $usuario;
    private $texto;
    private $publicado;

    public function getId() {
        return $this->id;
    }

    public function __get( $field ) {
        return $this->$field;
    }

    public function getCategoria() {
        return $this->categoria;
    }

    public function getUsuario() {
        return $this->usuario;
    }

    public function getTexto() {
        return $this->texto;
    }

    public function getPublicado() {
        return $this->publicado;
    }

    public function setId($id) {
        $this->id = $id;
    }

    public function setCategoria($categoria) {
        $this->categoria = $categoria;
    }

    public function setUsuario($usuario) {
        $this->usuario = $usuario;
    }

    public function setTexto($texto) {
        $this->texto = $texto;
    }

    public function setPublicado($publicado) {
        $this->publicado = $publicado;
    }

}