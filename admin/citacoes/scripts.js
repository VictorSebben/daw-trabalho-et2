var cit = {
	excluir : function () {
		var elems = jQuery( '[data-id-despublicar]' );
		console.log( elems );
		
		elems.each( function () {
			$( this ).on( 'click', function () {
				var id = $( this ).attr( 'data-id-despublicar' );
				var that = $( this );
				
				$.ajax( {
					type: "POST",
					url: "index.php",
					data: { 'menu': 'citacoes', 'acao': 'despublicar', 'id': id },
					success: function (res) {
						if ( res == 1 )
							that.parent().remove();
						
						else
							alert( 'Erro ao tentar despublicar citação.' );
					}
				} );
			} );
		} );
	}
};

cit.excluir();