<?php

class Artigo {
    private $id;
    private $categoria;
    private $usuario;
    private $titulo;
    private $texto;
    private $publicado;
    private $dataCriacao;
    private $dataEdicao;

    public function getId() {
        return $this->id;
    }

    public function getCategoria() {
        return $this->categoria;
    }

    public function getUsuario() {
        return $this->usuario;
    }

    public function getTitulo() {
        return $this->titulo;
    }

    public function getTexto() {
        return $this->texto;
    }

    public function getPublicado() {
        return $this->publicado;
    }

    public function getDataCriacao() {
        return $this->dataCriacao;
    }

    public function getDataEdicao() {
        return $this->dataEdicao;
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

    public function setTitulo($titulo) {
        $this->titulo = $titulo;
    }

    public function setTexto($texto) {
        $this->texto = $texto;
    }

    public function setPublicado($publicado) {
        $this->publicado = $publicado;
    }

    public function setDataCriacao($dataCriacao) {
        $this->dataCriacao = $dataCriacao;
    }

    public function setDataEdicao($dataEdicao) {
        $this->dataEdicao = $dataEdicao;
    }


}