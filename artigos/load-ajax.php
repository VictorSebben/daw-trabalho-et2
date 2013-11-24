<?php

//sanitize post value
$group_number = filter_var($_POST["group_no"], FILTER_SANITIZE_NUMBER_INT, FILTER_FLAG_STRIP_HIGH);


if(!is_numeric($group_number)){
    header('HTTP/1.1 500 Invalid number!');
    exit();
}

$position = ($group_number * 2);

$sql = "SELECT artigos.titulo, artigos.texto, categorias.descricao, usuarios.nome, usuarios.foto
    FROM artigos INNER JOIN categorias ON artigos.id_categoria = categorias.id
	INNER JOIN usuarios ON artigos.id_usuario = usuarios.id
    WHERE artigos.publicado = 1 LIMIT 2 OFFSET $position";

$con = pg_connect( "host='localhost' user='ifsul'"
        . "password='ifsul' dbname='db_repo_conhecimentos_daw1'"
        . "port='5432'" ) or die( "Não foi possível conectar ao banco de dados." );

$res = pg_query( $con, $sql );


while ( $row = pg_fetch_object($res) ) {

$output = <<< HDOC
	<div class='entrada'>
				<h3>$row->titulo</h3>
            	<div class='texto'>
                    <img src='uploads/{$row->foto}' alt='Foto do Editor'>
                    &ldquo;$row->texto&rdquo;
            	</div>

            	<div class='categoria'>
                	Categoria: $row->descricao
            	</div>

   				<div>
					Usuário: $row->nome
				</div>
	</div>
HDOC;
echo $output;
}


