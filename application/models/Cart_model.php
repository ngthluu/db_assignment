<?php

class Cart_model extends CI_Model {

    public function cart_empty() {
        $cart_empty = !isset($_SESSION["cart"]) || empty($_SESSION["cart"]);
        $rent_empty = !isset($_SESSION["cart_rent"]) || empty($_SESSION["cart_rent"]);
        return $cart_empty && $rent_empty;
    }

    public function get_total_items() {
        if ($this->cart_empty()) return 0;
        $total = 0;
        if (!empty($_SESSION["cart"])) {
            foreach ($_SESSION["cart"] as $isbn => $quantity) {
                $total += $quantity;
            }
        }
        if (!empty($_SESSION["cart_rent"])) {
            foreach ($_SESSION["cart_rent"] as $isbn) {
                $total += 1;
            }
        }
        return $total;
    }

    public function get_cart_items() {
        if ($this->cart_empty()) {
            return [];
        }

        if (!empty($_SESSION["cart"])) {
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
            
            if ($books_list->num_rows() == 0) $books_list = [];
            else {
                $books_list = $books_list->result();
                foreach ($books_list as $index => &$book) {
                    $book->quantity = $_SESSION["cart"][$book->isbn];
                }
            }
            
        } else {
            $books_list = [];
        }

        if (!empty($_SESSION["cart_rent"])) {
            $rent_list = $this->db
                ->select("
                    book.*,
                    trad_book.price,
                    elec_book.rent_price,
                    elec_book.buy_price
                ")
                ->from("book")
                ->join("trad_book", "trad_book.isbn = book.isbn", "left")
                ->join("elec_book", "elec_book.isbn = book.isbn", "left")
                ->where_in("book.isbn", $_SESSION["cart_rent"])
                ->get();
        
            if ($rent_list->num_rows() == 0) $rent_list = [];
            else {
                $rent_list = $rent_list->result();
            }
        } else {
            $rent_list = [];
        }

        return (object)[
            "books_list" => $books_list,
            "rent_list" => $rent_list
        ];
    }

}
