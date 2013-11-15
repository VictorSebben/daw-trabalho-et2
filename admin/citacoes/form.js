var form = {
	ajaxIncluir : function () {
		var id = $('#id').val();
		var categoria = $('#categoria').val();
		var texto = $('#texto').val();
		var acao = $('#acao').val();
		
		$.post (
			'index.php',
			{ 'menu': 'citacoes', 'acao': acao, 'id': id, 'categoria': categoria, 'texto': texto },
			function ( res ) {
				if ( res == 'true' ) {
					window.location.href = '?menu=citacoes&acao=listar';
				}
				else {
					alert( 'Erro ao inserir.' );
				}
			}
		);
	}
}

$( '#btnGravar' ).on( 'click', function () {
	form.ajaxIncluir();
} );