<h2>Lista de artigos</h2>
<a href="?menu=artigos&acao=inserir" class="inserir">Inserir artigo</a>

<?php
if( $rs ) :

?>
    <div id="pesquisa">
    <form id="form" name="form" method="get" action="index.php?menu=artigos">
        <label for="pesquisa">Pesquisar por texto:</label>
        <input name="pesquisa" type="text" id="pesquisa"
               size="40" maxlength="40" />
        <input type="submit" id="btnFiltrar"
               value="Filtrar" />
        <input name="menu" type="hidden" id="menu" value="artigos" />
    </form>
    </div>

    <?php echo H::sysMsgs(); ?>

    <div class="artigo">
        <table border="0">
            <thead>
                <tr>
                    <th>Categoria</th>
                    <th>Usuário</th>
                    <th>Título</th>
                    <th>Texto</th>
                    <th>Data de criação</th>
                    <th>Data de edição</th>
                    <th>Editar</th>
                    <th>Excluir</th>
                </tr>
            </thead>
            <tbody>

<?php
    foreach ($rs as $art) :
?>

                <tr>
                    <td><?php echo $art->getDescCategoria(); ?></td>
                    <td><?php echo $art->getUsuario(); ?></td>
                    <td><?php echo $art->getTitulo(); ?></td>
                    <td><?php echo $art->getTexto(); ?></td>
                    <td><?php echo $art->getDataCriacao(); ?></td>
                    <td><?php echo $art->getDataEdicao(); ?></td>
                    <td>
                        <a href="?menu=artigos&acao=editar&id=<?php echo $art->getId(); ?>">Editar</a>
                    </td>
                    <td class="hover" data-id-despublicar="<?php echo $art->getId(); ?>">Excluir</td>
                </tr>
<?php
    endforeach;//fim do laço while
?>

            </tbody>
        </table>

    </div><!--Fim da div artigo-->

<?php
else :
    echo "<span class='msg'>Não há citações cadastradas.</span>";
endif;
?>

<div class="caixa">
    Total de Registros: <?php echo $artigosDAO->getTotal(); ?>
</div>

<div class='paginacao'>
  <?php include 'inc/inc.paginacao.html.php'; ?>
</div>

<script src="artigos/list.js"></script>