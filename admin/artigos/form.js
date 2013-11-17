var form = {
	ajaxIncluir : function () {
		var id = $('#id').val();
		var categoria = $('#categoria').val();
		var titulo = $('#titulo').val();
		var texto = $('#texto').val();
		var acao = $('#acao').val();
		
		$.post (
			'index.php',
			{ 'menu': 'artigos', 'acao': acao, 'id': id, 'categoria': categoria, 'texto': texto, 'titulo': titulo },
			function ( res ) {
				if ( res == 'true' ) {
					window.location.href = '?menu=artigos&acao=listar';
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