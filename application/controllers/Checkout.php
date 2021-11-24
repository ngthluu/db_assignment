<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Checkout extends CI_Controller {

	public function add_to_cart() {
        if (!isset($_SESSION["cart"])) {
            $_SESSION["cart"] = [];
        }

        $isbn = $this->input->post("isbn");
        $quantity = $this->input->post("quantity");

        if (!isset($_SESSION["cart"][$isbn])) {
            $_SESSION["cart"][$isbn] = intval($quantity);
        } else {
            $_SESSION["cart"][$isbn] += intval($quantity);
        }
    }

    public function add_to_cart_rent() {
        if (!isset($_SESSION["cart_rent"])) {
            $_SESSION["cart_rent"] = [];
        }

        $isbn = $this->input->post("isbn");
        if (!in_array($isbn, $_SESSION["cart_rent"])) {
            $_SESSION["cart_rent"][] = $isbn;
        }
    }
}
