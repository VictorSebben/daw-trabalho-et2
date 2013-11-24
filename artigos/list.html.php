<h2>Lista de Artigos</h2>

<script type="text/javascript">
$(document).ready(function() {
    var track_load = 0;
    var loading = false;
    var total_grupos = <?php echo $total_grupos; ?>;
    var items_per_group = <?php echo $items_per_group; ?>;

    $('#results').load("artigos/load-ajax.php", {'group_no':track_load}, function() {track_load++;}); //carregar primeira leva

    $(window).scroll(function() { // detecta quando o usuário scrolleia a página

        if($(window).scrollTop() + $(window).height() == $(document).height()) { // usuário foi até embaixo
            if(track_load <= total_grupos && loading==false) { // há mais para carregar
                loading = true;
                $('.animation_image').show();

                // carregar informações do servidor usando um request HTTP Post
                $.post('artigos/load-ajax.php', {'group_no': track_load}, function(data){

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


<div id="results">

</div>

<div class="animation_image" style="display:none" align="center">
    <img src="./images/ajax-loader.gif">
</div>
