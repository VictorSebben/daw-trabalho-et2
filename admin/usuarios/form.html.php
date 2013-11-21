<h2>Gerenciamento de dados do usuário</h2>

<form name="form1" id="form" method="post" action="./"
      class="form">
    <fieldset>
		<div>
			<img src="../uploads/<?php echo $u->getFoto(); ?>" >
		</div>

        <div>
            <label for="id">ID:</label>
            <input name="id" type="hidden" id="id"
                   value="<?php echo $u->getId(); ?>" >
        </div>

        <div>
            <label for="nome">Nome:</label>
            <input name="nome" type="text" id="nome"
                   value="<?php echo $u->getNome(); ?>" size="20"  maxlength="20">
        </div>

        <div>
            <label for="email">Email:</label>
            <input name="email" type="text" id="email"
                   value="<?php echo $u->getEmail(); ?>" size="20"  maxlength="20">
        </div>

        <div>
            <label for="senha">Senha:</label>
            <input name="senha" type="password" id="senha"
                   value="" size="20" autocomplete="off"
                   maxlength="20">
        </div>

        <div>
            <label for="foto">Foto:</label>
            <input name="foto" type="file" id="foto"
                   value="" size="50">
        </div>

         <div>
            <label for="gravar">&nbsp;</label>
            <input type="submit" value="Gravar" id="btnGravar" />
            <input type="button" id="btnCancelar"
                   value="Cancelar" onclick="location='?menu'">
        </div>
    </fieldset>
</form>

<script src="usuarios/form.js"></script>