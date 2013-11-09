<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>Gerenciar conteúdos</title>

        <link rel="stylesheet" href="css/reset.css">
        <link rel="stylesheet" href="css/layout.css">

        <script type="text/javascript" src="../js/jquery-1.9.1.min.js"></script>
        <script type="text/javascript" src="../js/jquery.validate.min.js"></script>
    </head>
    <body>
        <h1>Gerenciamento de conteúdos</h1>

        <div class="menu_conteudos">
            <ul>
                <li><a <?php H::menuAtivo("artigos") ?> href="?menu=artigos">Artigos</a></li>
                <li><a <?php H::menuAtivo("citacoes") ?> href="?menu=citacoes">Citações</a></li>
                <li><a <?php H::menuAtivo("categorias") ?> href="?menu=categorias">Categorias</a></li>
                <li><a <?php H::menuAtivo("usuarios") ?> href="?menu=usuarios">Usuários</a></li>
            </ul>
        </div>
        <div><a  class="sair" href="index.php?menu=sair">SAIR</a></div>

        <div class="conteudo">
            <?php
            if( isset( $view ) ) {
                include $view;
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