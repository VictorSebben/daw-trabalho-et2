<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>Repositório de Conhecimentos</title>

        <link rel="stylesheet" href="css/reset.css">
        <link rel="stylesheet" href="css/layout.css">

        <script type="text/javascript" src="js/jquery-1.10.2.js"></script>
    </head>
    <body>
		<div id="topo">
			<h1>Repositório de Conhecimentos</h1>
		</div>

        <div id="menu">
            <ul>
                <li><a <?php H::menuAtivo("artigos") ?> href="?menu=artigos">Artigos</a></li>
                <li><a <?php H::menuAtivo("citacoes") ?> href="?menu=citacoes">Citações</a></li>
            </ul>
        </div>

        <div class="conteudo">
            <?php
            if( isset( $view ) ) {
                require $view;
            }
            else {
                echo "View não foi definida.";
            }
            ?>
        </div>

        <div class="rodape">

        </div>
    </body>
</html>
