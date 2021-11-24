<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Orders extends USER_Controller {

	private function ListBookByCategoryBuyInMonth($category, $month, $year) {
		$this->db = $this->load->database('default', true);
		$sql = "CALL ListBookByCategoryBuyInMonth(?, ?, ?, ?)";
		$query = $this->db->query($sql, [$_SESSION['id'], $category, $month, $year]);

		if ($query->num_rows() == 0) {
			return [];
		}

		$result = $query->result();
		mysqli_next_result($this->db->conn_id); 
		$query->free_result(); 

		return $result;
	}

	private function ListBooksBuyInMonth($month, $year) {
		$this->db = $this->load->database('default', true);
		$sql = "CALL ListBooksBuyInMonth(?, ?, ?)";
		$query = $this->db->query($sql, [$_SESSION['id'], $month, $year]);

		if ($query->num_rows() == 0) {
			return [];
		}

		$result = $query->result();
		mysqli_next_result($this->db->conn_id); 
		$query->free_result(); 

		return $result;
	}

	private function ListAllBuyBooks() {
		$this->db = $this->load->database('default', true);
		$sql = "CALL ListAllBuyBooks(?)";
		$query = $this->db->query($sql, [$_SESSION['id']]);

		if ($query->num_rows() == 0) {
			return [];
		}

		$result = $query->result();
		mysqli_next_result($this->db->conn_id); 
		$query->free_result(); 

		return $result;
	}

	private function ListOrderInMonth($month, $year) {
		$this->db = $this->load->database('default', true);
		$sql = "CALL ListOrderInMonth(?, ?, ?)";
		$query = $this->db->query($sql, [$_SESSION['id'], $month, $year]);

		if ($query->num_rows() == 0) {
			return [];
		}

		$result = $query->result();
		mysqli_next_result($this->db->conn_id); 
		$query->free_result(); 

		return $result;
	}

	private function ListErrorOrderInMonth($month, $year) {
		$this->db = $this->load->database('default', true);
		$sql = "CALL ListErrorOrderInMonth(?, ?, ?)";
		$query = $this->db->query($sql, [$_SESSION['id'], $month, $year]);

		if ($query->num_rows() == 0) {
			return [];
		}

		$result = $query->result();
		mysqli_next_result($this->db->conn_id); 
		$query->free_result(); 

		return $result;
	}

	private function ListNotFinishedOrder($month, $year) {
		$this->db = $this->load->database('default', true);
		$sql = "CALL ListNotFinishedOrder(?, ?, ?)";
		$query = $this->db->query($sql, [$_SESSION['id'], $month, $year]);

		if ($query->num_rows() == 0) {
			return [];
		}

		$result = $query->result();
		mysqli_next_result($this->db->conn_id); 
		$query->free_result(); 

		return $result;
	}

	private function ListMostBuyBookOrderInMonth($month, $year) {
		$this->db = $this->load->database('default', true);
		$sql = "CALL ListMostBuyBookOrderInMonth(?, ?, ?)";
		$query = $this->db->query($sql, [$_SESSION['id'], $month, $year]);

		if ($query->num_rows() == 0) {
			return [];
		}

		$result = $query->result();
		mysqli_next_result($this->db->conn_id); 
		$query->free_result(); 

		return $result;
	}

	private function ListBothTradAndElecOrderInMonth($month, $year) {
		$this->db = $this->load->database('default', true);
		$sql = "CALL ListBothTradAndElecOrderInMonth(?, ?, ?)";
		$query = $this->db->query($sql, [$_SESSION['id'], $month, $year]);

		if ($query->num_rows() == 0) {
			return [];
		}

		$result = $query->result();
		mysqli_next_result($this->db->conn_id); 
		$query->free_result(); 

		return $result;
	}

	private function ListAllBuyOrders() {
		$this->db = $this->load->database('default', true);
		$sql = "CALL ListAllBuyOrders(?)";
		$query = $this->db->query($sql, [$_SESSION['id']]);

		if ($query->num_rows() == 0) {
			return [];
		}

		$result = $query->result();
		mysqli_next_result($this->db->conn_id); 
		$query->free_result(); 

		return $result;
	}

	private function ListAllCategories() {
		$this->db = $this->load->database('default', true);
		$sql = "CALL ListAllCategories()";
		$query = $this->db->query($sql);

		if ($query->num_rows() == 0) {
			return [];
		}

		$result = $query->result();
		mysqli_next_result($this->db->conn_id); 
		$query->free_result(); 

		return $result;
	}

	public function index() {

		$this->data["categories"] = $this->ListAllCategories();

		if (isset($_GET["order-done"]) && $_GET["order-done"] != "") {
			$month = explode("-", $_GET["order-done"])[1];
			$year = explode("-", $_GET["order-done"])[0];
			$this->data["orders_list"] = $this->ListOrderInMonth($month, $year);
		}
		else if (isset($_GET["order-error"]) && $_GET["order-error"] != "") {
			$month = explode("-", $_GET["order-error"])[1];
			$year = explode("-", $_GET["order-error"])[0];
			$this->data["orders_list"] = $this->ListErrorOrderInMonth($month, $year);
		} 
		else if (isset($_GET["order-notfinish"]) && $_GET["order-notfinish"] != "") {
			$month = explode("-", $_GET["order-notfinish"])[1];
			$year = explode("-", $_GET["order-notfinish"])[0];
			$this->data["orders_list"] = $this->ListNotFinishedOrder($month, $year);
		} 
		else if (isset($_GET["order-mostbook"]) && $_GET["order-mostbook"] != "") {
			$month = explode("-", $_GET["order-mostbook"])[1];
			$year = explode("-", $_GET["order-mostbook"])[0];
			$this->data["orders_list"] = $this->ListMostBuyBookOrderInMonth($month, $year);
		} 
		else if (isset($_GET["order-ttdt"]) && $_GET["order-ttdt"] != "") {
			$month = explode("-", $_GET["order-ttdt"])[1];
			$year = explode("-", $_GET["order-ttdt"])[0];
			$this->data["orders_list"] = $this->ListBothTradAndElecOrderInMonth($month, $year);
		} 
		else {
			$this->data["orders_list"] = $this->ListAllBuyOrders();
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
