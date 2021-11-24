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
}
