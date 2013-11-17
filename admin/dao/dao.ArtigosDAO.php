<?php

class ArtigosDAO {
    private $db;
    private $totalPag; // para o total de páginas
    private $pag; // número da página atual
    private $limit;
    private $offset;
    private $pesq = FALSE;
    private $ordem = 'nome';

    public function __construct( $banco ) {
        $this->db = $banco;
    }

    public function setPesquisa( $pesquisa ) {
        $this->pesq = $pesquisa;
    }

    public function setPagAtual( $pag ) {
        $this->pag = $pag;
    }

    public function setLimit( $limit ) {
        $this->limit = $limit;
    }

    public function getTotal() {
        $sql = "SELECT COUNT(*) AS num FROM artigos WHERE publicado = 1";

        if ( $this->pesq ) {
            $sql .= " AND texto ILIKE '%{$this->pesq}%';";
        }
        return pg_fetch_object( $this->db->sqlQuery( $sql ) )->num;
    }

    public function listar() {
        if ( isset( $_REQUEST[ 'ordem' ] ) ) {
            $this->ordem = $_REQUEST['ordem'];
        }

        $this->offset = ( $this->pag - 1 ) * $this->limit;

        $sql = "SELECT artigos.id, LEFT ( artigos.texto, 30 ) AS texto, artigos.titulo,
		artigos.id_categoria, usuarios.nome, artigos.data_criacao, artigos.data_edicao
            FROM artigos, usuarios
            WHERE publicado = 1";

        if ( $this->pesq ) {
            $sql .= " AND texto ILIKE '%{$this->pesq}%' ";
        }

        $sql .= " AND usuarios.id = artigos.id_usuario
            ORDER BY {$this->ordem}
            LIMIT {$this->limit} OFFSET {$this->offset};";


        $res = $this->db->sqlQuery( $sql );
        if( $res ) {
            $artigos = array();

            while( $row = pg_fetch_object($res) ) {
                $a = new Artigo();
                $a->setId($row->id);
                $a->setCategoria($row->id_categoria);
                $a->setUsuario($row->nome);
                $a->setTexto($row->texto);
                $a->setTitulo($row->titulo);
                $a->setDataCriacao($row->data_criacao);
                $a->setDataEdicao($row->data_edicao);

                $catDAO = new CategoriasDAO( new Conexao() );
                $desc = $catDAO->getDescCat( $a->getCategoria() )->descricao;
                $a->setDescCategoria( $desc );

                array_push($artigos, $a);
            }

            return $artigos;
        }

        return false;
    }

     public function despublicar( $id ) {
         // gravar informações da remoção em audit_artigos
         $id_desc = REMOCAO;
         $sql = "INSERT INTO audit_artigos ( id_artigo, id_usuario, id_descricao )
             VALUES ( $id, {$_SESSION[ 'user_id' ]}, $id_desc )";

         $this->db->sqlExec( $sql );

         // despublicar artigo
         $sql = "UPDATE artigos SET publicado = 0
            WHERE id = {$id}";

        return $this->db->sqlExec( $sql );
    }
}