<?php
class Paginacao {

    public $current_page;
    public $per_page;
    public $total_count;

    /**
     *
     * @param Integer $page Número da página atual.
     * @param Integer $per_page Número de registros por página.
     * @param Integer $total_count Total de registros no banco.
     */
    public function __construct( $page = 1, $per_page = 3, $total_count = 0 ) {
        $this->current_page = (int) $page;
        $this->per_page = (int) $per_page;
        $this->total_count = (int) $total_count;
    }

    public function get_offset() {
        /**
         * Assuming 2 items per page:
         * page 1, offset 0. ( 1 - 1 ) * 2.
         * page 2, offset 2, ( 2 - 2 ) * 2.
         * page 3, offset 4, ( 3 - 1 ) * 2.
         * In other words, page 4 starts with record 5.
         */
        return ( $this->current_page - 1) * $this->per_page;
    }

    public function get_total_pages() {
        return ceil( $this->total_count / $this->per_page );
    }

    public function previous_page() {
        return $this->current_page - 1;
    }

    public function next_page() {
        return $this->current_page + 1;
    }

    public function has_previous_page() {
        return $this->previous_page() >= 1 ? TRUE : FALSE;
    }

    public function has_next_page() {
        return $this->next_page() <= $this->get_total_pages() ? TRUE : FALSE;
    }
}
?>
