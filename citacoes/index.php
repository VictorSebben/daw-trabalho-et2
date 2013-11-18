<?php
$citacoesDAO = new CitacoesDAO( new Conexao() );
$catDAO = new CategoriasDAO( new Conexao() );

$url = "?menu=citacoes";


$total_registros = $citacoesDAO->getTotal();
$total_grupos = ceil( $total_registros / 5 );

?>

<script type="text/javascript">
$(document).ready(function() {
	var track_load = 0;
	var loading = false;
	var total_grupos = <?php echo $total_grupos; ?>;
	
	$('#results').load("autoload_process.php", {'page':track_load}, function() {track_load++;}); //carregar primeira leva
	
	$(window).scroll(function() { // detecta quando o usuário scrolleia a página
		
		if($(window).scrollTop() + $(window).height() == $(document).height()) { // usuário foi até embaixo
			if(track_load <= total_grupos && loading==false) { // há mais para carregar
				loading = true;
				$('.animation_image').show();
				
				// carregar informações do servidor usando um request HTTP Post
				$.post('autoload_process.php',{'group_no': track_load}, function(data){
									
					$("#results").append(data); // append info recebida no elemento

					//hide loading image
					$('.animation_image').hide(); // esconde gif de carregamento quando ele terminar
					
					track_load++; // incremento no nº de grupos carregados
					loading = false; 
				
				}).fail(function(xhr, ajaxOptions, thrownError) { // de problema?
					
					alert(thrownError); //alert com HTTP error
					$('.animation_image').hide(); // esconde imagem loading
					loading = false;
				});
			}
		} 
	});
});
</script>

<?php
//$rs = $citacoesDAO->listar();
$view = 'citacoes/list.html.php';
?>
