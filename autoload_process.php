<?php

//sanitize post value
$group_number = filter_var($_POST["group_no"], FILTER_SANITIZE_NUMBER_INT, FILTER_FLAG_STRIP_HIGH);


if(!is_numeric($group_number)){
    header('HTTP/1.1 500 Invalid number!');
    exit();
}

$position = ($group_number * 4);

$sql = "SELECT citacoes.texto, categorias.descricao, usuarios.nome
    FROM citacoes INNER JOIN categorias ON citacoes.id_categoria = categorias.id
	INNER JOIN usuarios ON citacoes.id_usuario = usuarios.id
    WHERE citacoes.publicado = 1 LIMIT 4 OFFSET $position";

$con = pg_connect( "host='localhost' user='ifsul'"
        . "password='ifsul' dbname='db_repo_conhecimentos_daw1'"
        . "port='5432'" ) or die( "Não foi possível conectar ao banco de dados." );

$res = pg_query( $con, $sql );


while ( $row = pg_fetch_object($res) ) {
    echo "<div class='entrada'>

            	<div class='texto'>
                    &ldquo;$row->texto&rdquo;
            	</div>

            	<div class='categoria'>
                	Categoria: $row->descricao
            	</div>

   				<div>
					Usuário: $row->nome
				</div>
			</div>";


}


