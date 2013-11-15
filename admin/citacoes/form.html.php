<h2>Gerenciamento de citações</h2>

<form name="citacoes_form" method="POST" action="" class="form" id="form">
    <fieldset>
        <div>
            <label for="id">ID:</label>
            <input name="id" type="text" id="id"
                   value="<?php H::pAttr($cit, 'id'); ?>" size="10"
                   maxlength="10" readonly="readonly">
        </div>

        <div>
            <label for="categoria">Categoria:</label>
            <select name="categoria" id="categoria">

            <?php
            foreach ( $categorias as $categoria ){
                var_dump($categoria->getId(), $cit->getCategoria());
                if( $categoria->getId() == $cit->getCategoria() )
                    echo "<option value='{$categoria->getId()}' selected='selected'> {$categoria->getDescricao()} </option>";
                else
                    echo "<option value='{$categoria->getId()}'> {$categoria->getDescricao()} </option>";
            }
            ?>
            </select>
        </div>

        <div>
            <label for="texto">Texto:</label><br>
            <textarea id="texto" name="texto" rows="20" cols="80"><?php H::pAttr($cit, 'texto'); ?></textarea>
        </div>

        <div>
            <label for="gravar">&nbsp;</label>
            <input type="button" value="Gravar" id="btnGravar" />
            <input type="button" id="btnCancelar"
                   value="Cancelar" onclick="location='index.php?menu=citacoes'">
        </div>

        <input name="menu" type="hidden" id="menu" value="citacoes" />
        <input name="acao" type="hidden" id="acao" value="gravar_<?php echo $acao; ?>"/>
    </fieldset>
</form>

<script src="citacoes/form.js"></script>