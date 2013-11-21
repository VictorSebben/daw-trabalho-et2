var H = {
	removeMsg: function() {
		$( '.sucesso' ).on( 'click', function () {
			$( this ).hide( 'slow', function () {
	   			$( this ).remove();
			} );
		} );
	
		$( '.erro' ).on( 'click', function () {
			$( this ).hide('slow', function () {
				$( this ).remove();
			} );
		} );
	}
}