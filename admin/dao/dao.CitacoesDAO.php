<?php

class CitacoesDAO {
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

    public function getCitacoes( $sql ) {
        $res = $this->db->sqlQuery( $sql );
        return $res;
    }

    public function getTotal() {
        $sql = "SELECT COUNT(*) AS num FROM citacoes WHERE publicado = 1";

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

        $sql = "SELECT citacoes.id, LEFT ( citacoes.texto, 30 ) AS texto, categorias.descricao, usuarios.nome
            FROM citacoes, categorias, usuarios
            WHERE categorias.id = citacoes.id_categoria
            AND publicado = 1";

        if ( $this->pesq ) {
            $sql .= " AND texto ILIKE '%{$this->pesq}%' ";
        }

        $sql .= " AND usuarios.id = citacoes.id_usuario
            ORDER BY {$this->ordem}
            LIMIT {$this->limit} OFFSET {$this->offset};";


        $res = $this->db->sqlQuery( $sql );
        if( $res ) {
            $citacoes = array();

            while( $row = pg_fetch_object($res) ) {
                $c = new Citacao();
                $c->setId($row->id);
                $c->setCategoria($row->descricao);
                $c->setUsuario($row->nome);
                $c->setTexto($row->texto);

                array_push($citacoes, $c);
            }

            return $citacoes;
        }

        return false;
    }

    public function despublicar( $id ) {
        $sql = "UPDATE citacoes SET publicado = 0
            WHERE id = {$id}";

        return $this->db->SqlExec( $sql );
    }

    public function gravarInserir( $citacao ) {
        if($citacao->getId() != NULL) {
            //update
        }

        else {
            //inserir
            $sql = "INSERT INTO citacoes ( id_categoria, id_usuario, texto )
				VALUES ( {$citacao->getCategoria()}, 1, '{$citacao->getTexto()}' );";

			if( $this->db->sqlExec( $sql ) ) {
				$_SESSION['msg_sucesso'] = "Citação inserida com sucesso.";
				return true;
			}
			else {
				$_SESSION['msg_erro'] = 'Erro ao inserir citação.';
				return false;
			}
        }
    }
}
