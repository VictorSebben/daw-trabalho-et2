<div class='pagn'>
<?php
    $Pagn = new Paginacao($pagina_atual, $num_registros_por_pagina, $total_registros);

     // Só precisamos dos links de navegação se há mais de uma página de resultados
    if ( $Pagn->get_total_pages() > 1 ) {
        // Mostra o link de "anterior" se ainda há páginas naquela direção.
        if ( $Pagn->has_previous_page() ) {
            echo "<span class='pagination-prev-next'>
                    <a href='?menu={$pagmenu}&pag={$Pagn->previous_page()}&ordem={$pagordem}&pesquisa={$pagpesq}'>&laquo; Anterior</a>
                    </span>";
        }

        /**
         *  Mostra o número de páginas.
         * TODO: E se tiver 1000 páginas? Então devemos mostrar no máximo
         * umas 10 e colocar um link para a última, algo similar para
         * voltar a primeira caso estejamos na página 1500, por exemplo.
         */
        for ($i = 1; $i <= $Pagn->get_total_pages(); ++$i) {
            if ( $i == $pagina_atual ) {
                echo " <span>[<span class='pagination-current-page'>{$i}</span>]</span> ";
            }
            else {
                echo " <span class='pagination-numbering'>
                    <a href='?menu={$pagmenu}&pag={$i}&ordem={$pagordem}&pesquisa={$pagpesq}'>{$i}</a></span> ";
            }
        }

        // Mostra o link de "próxima" de ainda há páginas naquela direção.
        if ( $Pagn->has_next_page() ) {
            echo "<span class='patination-prev-next'>
                    <a href='?menu={$pagmenu}&pag={$Pagn->next_page()}&ordem={$pagordem}&pesquisa={$pagpesq}'>Próxima &raquo;</a>
                    </span>";
        }
    }
?>
</div>
