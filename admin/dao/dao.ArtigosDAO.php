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

    public function getArtigo( $id ) {
        $sql = "SELECT artigos.id_categoria, artigos.texto, artigos.titulo
            FROM artigos WHERE id = '{$id}'";

        $res = $this->db->sqlQuery( $sql );
        if( $res ) {
            $row = pg_fetch_object( $res );
            $a = new Artigo();
            $a->setTexto( $row->texto );
            $a->setTitulo( $row->titulo );
            $a->setId( $id );
            $a->setCategoria( $row->id_categoria );

            return $a;
        }

        return false;
    }

    public function listar() {
        if ( isset( $_REQUEST[ 'ordem' ] ) ) {
            $this->ordem = $_REQUEST['ordem'];
        }

        $this->offset = ( $this->pag - 1 ) * $this->limit;

        $sql = "SELECT artigos.id, LEFT ( artigos.texto, 30 ) AS texto, artigos.titulo,
		artigos.id_categoria, usuarios.nome, TO_CHAR(artigos.data_criacao, 'DD/MM/YYYY - HH24:MI:SS') AS data_criacao,
        TO_CHAR(artigos.data_edicao, 'DD/MM/YYYY - HH24:MI:SS') AS data_edicao
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
         // despublicar artigo
         $sql = "UPDATE artigos SET publicado = 0
            WHERE id = {$id}";

        return $this->db->sqlExec( $sql );
    }

    public function gravar( $artigo ) {
        if( $artigo->getId() != NULL ) {

            //update
            $sql = "UPDATE artigos SET
                id_categoria = {$artigo->getCategoria()},
                    titulo = '{$artigo->getTitulo()}',
                    texto = '{$artigo->getTexto()}',
                        data_edicao = LOCALTIMESTAMP
                        WHERE id = {$artigo->getId()};";

        }

        else {
            //inserir
            $sql = "INSERT INTO artigos ( id_categoria, id_usuario, titulo, texto )
                VALUES ( {$artigo->getCategoria()}, {$_SESSION['user_id']}, '{$artigo->getTitulo()}', '{$artigo->getTexto()}' );";

        }

        if( $this->db->sqlExec( $sql ) ) {
            $_SESSION['msg_sucesso'] = "Artigo gravado com sucesso.";
            return true;
        }
        else {
            $_SESSION['msg_erro'] = 'Programa falhou com sucesso.';
            return false;
        }
    }
}