<h2>Listagem de acessos:</h2>

<div class="ranking">
	<fieldset>
        <legend>Listar ranking de acessos mensal:</legend>

        <form action="./" method="get">
        <?php $m = H::listarMeses(3); ?>
            <label for="mes">Selecione o mês:</label>
            <select name='mes' id="mes">
            <?php foreach ($m as $mesAtual): ?>
                <option value="<?php echo $mesAtual; ?>"><?php echo $mesAtual; ?></option>
            <?php endforeach; ?>
            </select>

            <input type="hidden" value="ranking" name="menu">
            <input type="submit" value="Enviar">
        </form>
	</fieldset>
	
	<h3>Período: <?php echo $mes ?> </h3>

	<?php if( $rs ): ?>
	<table border='1'>
    	<thead>
      	<tr>
			<th>ID</th>
          	<th>Nome Usuário</th>
          	<th>Número de acessos</th>
      	</tr>
    	</thead>
    	<tbody>
      	<?php while ( $row = pg_fetch_object( $rs ) ): ?>
        	<tr>
            	<td><?php echo $row->id; ?></td>
				<td><?php echo $row->nome; ?></td>
            	<td><?php echo $row->num; ?></td>
        	</tr>
      	<?php endwhile; ?>

		</tbody>

	</table>

	<?php
	else:
		echo "<span class='msg'>Não há registros para a data escolhida.</span>";
	endif;
	?>

</div>