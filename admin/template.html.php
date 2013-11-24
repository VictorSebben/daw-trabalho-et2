<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>Gerenciar conteúdos</title>

        <link rel="stylesheet" href="css/reset.css">
        <link rel="stylesheet" href="css/layout.css">

        <script type="text/javascript" src="js/jquery-1.10.2.js"></script>
		<script type="text/javascript" src="js/main.js"></script>
    </head>
    <body>
        <h1>Gerenciamento de conteúdos</h1>

        <div class="menu_conteudos">
            <ul>
                <li><a <?php H::menuAtivo("artigos") ?> href="?menu=artigos">Artigos</a></li>
                <li><a <?php H::menuAtivo("citacoes") ?> href="?menu=citacoes">Citações</a></li>
                <li><a <?php H::menuAtivo("audit_logins") ?> href="?menu=audit_logins" target="_blank">Hist. Logins</a></li>
                <li><a <?php H::menuAtivo("ranking") ?> href="?menu=ranking">Ranking de acessos</a></li>
                <li><a <?php H::menuAtivo("usuario") ?> href="?menu=usuario">Dados pessoais</a></li>
                <li><a href='../' target='_blank'>Site</a></li>
            </ul>
        </div>
        <div><a  class="sair" href="./?logout">SAIR</a></div>

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
