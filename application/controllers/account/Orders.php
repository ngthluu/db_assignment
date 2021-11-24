<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Orders extends USER_Controller {

	private function ListBookByCategoryBuyInMonth($category, $month, $year) {
		$this->db = $this->load->database('default', true);
		$sql = "CALL ListBookByCategoryBuyInMonth(?, ?, ?, ?)";
		$result = $this->db->query($sql, [$_SESSION['id'], $category, $month, $year]);

		if ($result->num_rows() == 0) {
			return [];
		}

		return $result->result();
	}

	private function ListBooksBuyInMonth($month, $year) {
		$this->db = $this->load->database('default', true);
		$sql = "CALL ListBooksBuyInMonth(?, ?, ?)";
		$result = $this->db->query($sql, [$_SESSION['id'], $month, $year]);

		if ($result->num_rows() == 0) {
			return [];
		}

		return $result->result();
	}

	private function ListAllBuyBooks() {
		$this->db = $this->load->database('default', true);
		$sql = "CALL ListAllBuyBooks(?)";
		$result = $this->db->query($sql, [$_SESSION['id']]);

		if ($result->num_rows() == 0) {
			return [];
		}

		return $result->result();
	}

	private function ListOrderInMonth($month) {
		$this->db = $this->load->database('default', true);
		$sql = "CALL ListOrderInMonth(?, ?)";
		$result = $this->db->query($sql, [$_SESSION['id'], $month]);

		if ($result->num_rows() == 0) {
			return [];
		}

		return $result->result();
	}

	private function ListErrorOrderInMonth($month) {
		$this->db = $this->load->database('default', true);
		$sql = "CALL ListErrorOrderInMonth(?, ?)";
		$result = $this->db->query($sql, [$_SESSION['id'], $month]);

		if ($result->num_rows() == 0) {
			return [];
		}

		return $result->result();
	}

	private function ListNotFinishedOrder() {
		$this->db = $this->load->database('default', true);
		$sql = "CALL ListNotFinishedOrder(?)";
		$result = $this->db->query($sql, [$_SESSION['id']]);

		if ($result->num_rows() == 0) {
			return [];
		}

		return $result->result();
	}

	private function ListMostBuyBookOrderInMonth($month) {
		$this->db = $this->load->database('default', true);
		$sql = "CALL ListMostBuyBookOrderInMonth(?, ?)";
		$result = $this->db->query($sql, [$_SESSION['id'], $month]);

		if ($result->num_rows() == 0) {
			return [];
		}

		return $result->result();
	}

	private function ListBothTradAndElecOrderInMonth($month) {
		$this->db = $this->load->database('default', true);
		$sql = "CALL ListBothTradAndElecOrderInMonth(?)";
		$result = $this->db->query($sql, [$_SESSION['id'], $month]);

		if ($result->num_rows() == 0) {
			return [];
		}

		return $result->result();
	}

	private function ListAllBuyOrder() {
		return [];
	}

	private function ListAllCategories() {
		$this->db = $this->load->database('default', true);
		$sql = "CALL ListAllCategories()";
		$result = $this->db->query($sql);

		if ($result->num_rows() == 0) {
			return [];
		}

		return $result->result();
	}

	public function index() {

		$this->data["categories"] = $this->ListAllCategories();

		if (isset($_GET["order-done"]) && $_GET["order-done"] != "") {
			$month = $_GET["order-done"];
			$this->data["orders_list"] = $this->ListOrderInMonth($month);
		}
		else if (isset($_GET["order-error"]) && $_GET["order-error"] != "") {
			$month = $_GET["order-error"];
			$this->data["orders_list"] = $this->ListErrorOrderInMonth($month);
		} 
		else if (isset($_GET["order-notfinish"]) && $_GET["order-notfinish"] != "") {
			$this->data["orders_list"] = $this->ListNotFinishedOrder();
		} 
		else if (isset($_GET["order-mostbook"]) && $_GET["order-mostbook"] != "") {
			$month = $_GET["order-mostbook"];
			$this->data["orders_list"] = $this->ListMostBuyBookOrderInMonth($month);
		} 
		else if (isset($_GET["order-ttdt"]) && $_GET["order-ttdt"] != "") {
			$month = $_GET["order-ttdt"];
			$this->data["orders_list"] = $this->ListBothTradAndElecOrderInMonth($month);
		} 
		else {
			$this->data["orders_list"] = $this->ListAllBuyOrder();
		}

		if (isset($_GET["book-month"]) && $_GET["book-month"] != "") {
			if (isset($_GET["book-category"]) && $_GET["book-category"] != -1) {
				$category = $_GET["book-category"];
				$month = explode("-", $_GET["book-month"])[1];
				$year = explode("-", $_GET["book-month"])[0];
				$this->data["books_list"] = $this->ListBookByCategoryBuyInMonth($category, $month, $year);
			} else {
				$month = explode("-", $_GET["book-month"])[1];
				$year = explode("-", $_GET["book-month"])[0];
				$this->data["books_list"] = $this->ListBooksBuyInMonth($month, $year);
			}
		} else {
			$this->data["books_list"] = $this->ListAllBuyBooks();
		}

		$this->data['main_view'] = 'client/account/orders';
		$this->load->view('layout/client/main', $this->data);
	}
}
