var cit = {
    excluir : function () {
        var elems = jQuery( '[data-id-despublicar]' );
        
        elems.each( function () {
            $( this ).on( 'click', function () {
                var id = $( this ).attr( 'data-id-despublicar' );
                var that = $( this );
                
                $.ajax( {
                    type: "POST",
                    url: "index.php",
                    data: { 'menu': 'citacoes', 'acao': 'despublicar', 'id': id },
                    success: function (res) {
                        if ( res == 1 ) {
                            that.parent().remove();
                            if ( $( '.sucesso' ).length < 1 ) {
                                $( '.artigo' ).before( '<div class="sucesso">Citação removida com sucesso.</div>' );
                            }
                        }
                        
                        else {
                            if ( $( '.erro' ).length < 1 ) {
                                $( '.artigo' ).before( '<div class="erro">Erro ao remover citação.</div>' );
                            }                            
                        }
                        
                        H.removeMsg();
                    }
                } );
            } );
        } );
    }
};

cit.excluir();
