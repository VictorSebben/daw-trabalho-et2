<?php

Class Citacao {
    private $id;
    private $categoria;
    private $usuario;
    private $texto;
    private $autor;

    public function getId() {
        return $this->id;
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

    public function getAutor() {
        return $this->autor;
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

    public function setAutor($autor) {
        $this->autor = $autor;
    }


}