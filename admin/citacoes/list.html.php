<h2>Lista de citações</h2>
<a href="?menu=citacoes&acao=inserir" class="inserir">Inserir citação</a>

<?php
if( $rs ) :

?>
    <div class="artigo">
        <table border="0">
            <thead>
                <tr>
                    <th>Categoria</th>
                    <th>Usuário</th>
                    <th>Texto</th>
                    <th>Autor</th>
                    <th>Editar</th>
                    <th>Excluir</th>
                </tr>
            </thead>
            <tbody>

<?php
    foreach ($rs as $cit) :
?>

                <tr>
                    <td><?php echo $cit->getCategoria(); ?></td>
                    <td><?php echo $cit->getUsuario(); ?></td>
                    <td><?php echo $cit->getTexto(); ?></td>
                    <td><?php echo $cit->getAutor(); ?></td>
                    <td data-id="<?php echo $cit->getId(); ?>">Editar</td>
                    <td data-id="<?php echo $cit->getId(); ?>">Excluir</td>
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
    Total de Registros: <?php echo $citacoesDAO->getTotal(); ?>
</div>

<div class="paginacao">
    <?php echo $citacoesDAO->paginacao(); ?>
</div>