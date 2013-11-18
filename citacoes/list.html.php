<h2>Lista de citações</h2>

<?php
if( $rs ) :

?>
    <div id="pesquisa">
    <form id="form" name="form" method="get" action="index.php?menu=citacoes">
        <label for="pesquisa">Pesquisar por texto:</label>
        <input name="pesquisa" type="text" id="pesquisa"
               size="40" maxlength="40" />
        <input type="submit" id="btnFiltrar"
               value="Filtrar" />
        <input name="menu" type="hidden" id="menu" value="citacoes" />
    </form>
    </div>

   
	<?php
    	foreach ($rs as $cit) :
	?>
		<div id="results">
			<div class="entrada">
	
            	<div class="texto">
    				"<?php echo $cit->getTexto(); ?>"
            	</div>

            	<div class="categoria">
                	Categoria: <?php echo $cit->getDescCategoria(); ?>
            	</div>
            
   				<div>
					Usuário: <?php echo $cit->getUsuario(); ?>
				</div>
			</div>
		</div>
                  
	<?php
    	endforeach;//fim do laço while
	?>
	<div class="animation_image" style="display:none" align="center"><img src="./images/ajax-loader.gif"></div>

<?php
else :
    echo "<span class='msg'>Não há citações cadastradas.</span>";
endif;
?>

<div class="caixa">
    Total de Registros: <?php echo $citacoesDAO->getTotal(); ?>
</div>

<div class='paginacao'>
  <?php include 'inc/inc.paginacao.html.php'; ?>
</div>