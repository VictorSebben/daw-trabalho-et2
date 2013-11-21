var form = {
    ajaxIncluir : function() {
        var id = $('#id').val();
        var nome = $('#nome').val();
        var email = $('#email').val();
        var senha = $('#senha').val();
        var foto = $('#foto')[0].files[0];
        
        if( window.FormData ) {
            formdata = new FormData();
			formdata.append( 'foto', foto );
			formdata.append( 'id', id );
			formdata.append( 'nome', nome );
			formdata.append( 'email', email );
			formdata.append( 'senha', senha );
			formdata.append( 'menu', 'usuario' );
			formdata.append( 'acao', 'gravar' );
			
			// enviar Ajax
			$.ajax({
				url: 'index.php',
				type: 'POST',
				data: formdata,
				processData: false,
				contentType: false,
				success: function( res ) {
                	if( res == 1 ) {
						$( '#form' ).remove();
						$( '.conteudo' ).append( '<div class="sucesso">Perfil atualizado com sucesso.</div>' );
						$( '.conteudo' ).append( '<a href="./">Voltar ao início</a>' );
					}
					else {
						$( '.conteudo' ).append( '<div class="erro">Erro ao atualizar o perfil.</div>' );
					}
					
					H.removeMsg();
				}
			});
        }
    }
}


$('#form').on( "submit", function( evt ) {
	form.ajaxIncluir();
	
	evt.preventDefault();
});