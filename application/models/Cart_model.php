<?php

class Cart_model extends CI_Model {

    public function cart_empty() {
        return !isset($_SESSION["cart"]) || empty($_SESSION["cart"]);
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
            ->select("*")
            ->from("book")
            ->where_in("isbn", $isbn)
            ->get();
        
        if ($books_list->num_rows() == 0) return [];
        $books_list = $books_list->result();

        foreach ($books_list as $index => &$book) {
            $book->quantity = $_SESSION["cart"][$book->isbn];
        }

        return $books_list;
    }

}
