<?php

class Cart_model extends CI_Model {

    public function cart_empty() {
        return !isset($_SESSION["cart"]) || empty($_SESSION["cart"]);
    }

    public function get_total_items() {
        if ($this->cart_empty()) return 0;
        $total = 0;
        foreach ($_SESSION["cart"] as $isbn => $quantity) {
            $total += $quantity;
        }
        return $total;
    }

    public function get_cart_items() {
        if ($this->cart_empty()) {
            return [];
        }

        $isbns = [];
        foreach ($_SESSION["cart"] as $isbn => $quantity) {
            $isbns[] = $isbn;
        }
        $books_list = $this->db
            ->select("
                book.*,
                trad_book.price,
                elec_book.rent_price,
                elec_book.buy_price
            ")
            ->from("book")
            ->join("trad_book", "trad_book.isbn = book.isbn", "left")
            ->join("elec_book", "elec_book.isbn = book.isbn", "left")
            ->where_in("book.isbn", $isbns)
            ->get();
        
        if ($books_list->num_rows() == 0) return [];
        $books_list = $books_list->result();

        foreach ($books_list as $index => &$book) {
            $book->quantity = $_SESSION["cart"][$book->isbn];
        }

        return $books_list;
    }

}
