<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends ADMIN_Controller {

	public function update() {
		if (isset($_GET["ware_action"])) { // ex1 + 2
			if ($_GET["ware_action"] == '1') if ($this->UpdateInware($_GET["ware_isbn"], $_GET["ware_quantity"], $_GET["ware_stoID"])) $this->data["result"] = "Thành công";
			else if ($this->UpdateOutware($_GET["ware_isbn"], $_GET["ware_quantity"], $_GET["ware_stoID"])) $this->data["result"] = "Thành công";
		} else if (isset($_GET["update_transac_orderid"])) { // ex3
			if ($this->UpdateTransacInfo($_GET["update_transac_orderid"])) $this->data["result"] = "Thành công";
		}
		$this->data['main_view'] = 'admin/user/update';
		$this->load->view('layout/admin/main', $this->data);
	}

    public function statistics() {
		if (isset($_GET["order_method"])) {
			if ($_GET["order_method"] == '2') { // Thẻ ngân hàng
				if (isset($_GET["order_error"])) { // sự cố ex13
					$this->data["result"] = $this->ListTroubleOrder();
				} else { // ko sự cố ex12
					$this->data["result"] = $this->ListBookBuyByCredit();
				}
			}
		} else if (isset($_GET["order_book_type"])) {
			if ($_GET["order_book_type"] == '0') { // ex14 15 16
				if (isset($_GET["is_month"])) { // month ex15 16
					if ($_GET["order_stat_type"] == 1) { // danh sách ex16
						$this->data["result"] = $this->ListStorageExport();
					} else { // tổng số ex15
						$this->data["result"] = $this->ListBookAtStorage();
					}
				} else { // day ex14
					$this->data["result"] = $this->ListStorageHaveBookLessThan10();
				}
			}
		} else if (isset($_GET["stat_order_date"])) {
			if (strlen($_GET["stat_order_date"]) == 7) { // order month jobs ex11
				$split = explode("-", $_GET["stat_order_date"]);
				$year = intval($split[0]);
				$month = intval($split[1]);
				$this->data["result"] = $this->ListBooksBoughtMostMonth($month, $year);
			}
			else if (strlen($_GET["stat_order_date"]) == 10) { // order day jobs
				if ($_GET["order_stat_type"] == '1') { // danh sách ex4
					$this->data["result"] = $this->BooksISBNBoughtDay($_GET["stat_order_date"]);
				} else { // tổng số ex 5 6 7 8
					if ($_GET["order_book_type"] == '1') { // mọi sách ex5
						$this->data["result"] = $this->NumBooksPerISBNBoughtDay($_GET["stat_order_date"]);
					} else if ($_GET["order_book_type"] == '2') { // truyền thống ex6
						$this->data["result"] = $this->NumTradBooksPerISBNBoughtDay($_GET["stat_order_date"]);
					} else { // điện tử ex7 8
						if ($_GET["order_purpose"] == '1') { // mua ex7
							$this->data["result"] = $this->NumElecBooksBoughtDay($_GET["stat_order_date"]);
						} else { // thuê ex8
							$this->data["result"] = $this->NumElecBooksRentDay($_GET["stat_order_date"]);
						}
					}
				}
			}
		} else if (isset($_GET["stat_author_date"])) {
			if (strlen($_GET["stat_author_date"]) == 7) { // author month jobs ex10
				$split = explode("-", $_GET["stat_author_date"]);
				$year = intval($split[0]);
				$month = intval($split[1]);
				$this->data["result"] = $this->ListAuthorMostNumBooksBoughtMonth($month, $year);
			}
			else if (strlen($_GET["stat_author_date"]) == 10) { // author day jobs ex9
				$this->data["result"] = $this->ListAuthorMostNumBooksBoughtDay($_GET["stat_author_date"]);
			}
		}
		$this->data['main_view'] = 'admin/user/statistics';
		$this->load->view('layout/admin/main', $this->data);
	}

	private function UpdateInware($isbn, $quantity, $id) { // 1
		$this->db = $this->load->database('default', true);
		$sql = "CALL UpdateInware(?, ?, ?)";
		$query = $this->db->query($sql, [$isbn, $quantity, $id]);
		if (!$query) {
			$errors = $this->db->error();
			return false;
		}
		return true;
	}

	private function UpdateOutware($isbn, $quantity, $id) { // 2
		$this->db = $this->load->database('default', true);
		$sql = "CALL UpdateOutware(?, ?, ?)";
		$query = $this->db->query($sql, [$isbn, $quantity, $id]);
		if (!$query) {
			$errors = $this->db->error();
			return false;
		}
		return true;
	}

	private function UpdateTransacInfo($order_id) { // 3
		$this->db = $this->load->database('default', true);
		$sql = "CALL UpdateTransacInfo(?)";
		$query = $this->db->query($sql, [$order_id]);
		if (!$query) {
			$errors = $this->db->error();
			return false;
		}
		return true;
	}

	private function BooksISBNBoughtDay($date) { // 4
		$this->db = $this->load->database('default', true);
		$sql = "CALL BooksISBNBoughtDay(?)";
		$query = $this->db->query($sql, [$date]);
		if ($query->num_rows() == 0) {
			return [];
		}
		$result = $query->result();
		mysqli_next_result($this->db->conn_id); 
		$query->free_result(); 

		return $result;
	}

	private function NumBooksPerISBNBoughtDay($date) { // 5
		$this->db = $this->load->database('default', true);
		$sql = "CALL NumBooksPerISBNBoughtDay(?)";
		$query = $this->db->query($sql, [$date]);
		if ($query->num_rows() == 0) {
			return [];
		}
		$result = $query->result();
		mysqli_next_result($this->db->conn_id); 
		$query->free_result(); 

		return $result;
	}

	private function NumTradBooksPerISBNBoughtDay($date) { // 6
		$this->db = $this->load->database('default', true);
		$sql = "CALL NumTradBooksPerISBNBoughtDay(?)";
		$query = $this->db->query($sql, [$date]);
		if ($query->num_rows() == 0) {
			return [];
		}
		$result = $query->result();
		mysqli_next_result($this->db->conn_id); 
		$query->free_result(); 

		return $result;
	}

	private function NumElecBooksBoughtDay($date) { // 7
		$this->db = $this->load->database('default', true);
		$sql = "CALL NumElecBooksBoughtDay(?)";
		$query = $this->db->query($sql, [$date]);
		if ($query->num_rows() == 0) {
			return [];
		}
		$result = $query->result();
		mysqli_next_result($this->db->conn_id); 
		$query->free_result(); 

		return $result;
	}

	private function NumElecBooksRentDay($date) { // 8
		$this->db = $this->load->database('default', true);
		$sql = "CALL NumElecBooksRentDay(?)";
		$query = $this->db->query($sql, [$date]);
		if ($query->num_rows() == 0) {
			return [];
		}
		$result = $query->result();
		mysqli_next_result($this->db->conn_id); 
		$query->free_result(); 

		return $result;
	}

	private function ListAuthorMostNumBooksBoughtDay($date) { // 9
		$this->db = $this->load->database('default', true);
		$sql = "CALL ListAuthorMostNumBooksBoughtDay(?)";
		$query = $this->db->query($sql, [$date]);
		if ($query->num_rows() == 0) {
			return [];
		}

		$result = $query->result();
		mysqli_next_result($this->db->conn_id); 
		$query->free_result(); 

		return $result;
	}

	private function ListAuthorMostNumBooksBoughtMonth($month, $year) { // 10
		$this->db = $this->load->database('default', true);
		$sql = "CALL ListAuthorMostNumBooksBoughtMonth(?, ?)";
		$query = $this->db->query($sql, [$month, $year]);
		if ($query->num_rows() == 0) {
			return [];
		}

		$result = $query->result();
		mysqli_next_result($this->db->conn_id); 
		$query->free_result(); 

		return $result;
	}

	private function ListBooksBoughtMostMonth($month, $year) { // 11
		$this->db = $this->load->database('default', true);
		$sql = "CALL ListBooksBoughtMostMonth(?, ?)";
		$query = $this->db->query($sql, [$month, $year]);
		if ($query->num_rows() == 0) {
			return [];
		}

		$result = $query->result();
		mysqli_next_result($this->db->conn_id); 
		$query->free_result(); 

		return $result;
	}

	private function ListBookBuyByCredit() { // 12
		$this->db = $this->load->database('default', true);
		$sql = "CALL ListBookBuyByCredit(?)";
		$query = $this->db->query($sql, [$this->input->post('_create_date')]);
	
		if ($query->num_rows() == 0) {
			return [];
		}
	
		$result = $query->result();
		mysqli_next_result($this->db->conn_id); 
		$query->free_result(); 
	
		return $result;
	}

	private function ListTroubleOrder() { // 13
		$this->db = $this->load->database('default', true);
		$sql = "CALL ListTroubleOrder(?)";
		$query = $this->db->query($sql, [$this->input->post('_create_date')]);
	
		if ($query->num_rows() == 0) {
			return [];
		}
	
		$result = $query->result();
		mysqli_next_result($this->db->conn_id); 
		$query->free_result(); 
	
		return $result;
	}

	private function ListStorageHaveBookLessThan10() { // 14
		$this->db = $this->load->database('default', true);
		$sql = "CALL ListStorageHaveBookLessThan10(?)";
		$query = $this->db->query($sql, [$this->input->post('_create_date')]);
	
		if ($query->num_rows() == 0) {
			return [];
		}
	
		$result = $query->result();
		mysqli_next_result($this->db->conn_id); 
		$query->free_result(); 
	
		return $result;
	}

	private function ListBookAtStorage() { // 15
		$this->db = $this->load->database('default', true);
		$sql = "CALL ListBookAtStorage(?)";
		$query = $this->db->query($sql, [$this->input->post('_create_date')]);
	
		if ($query->num_rows() == 0) {
			return [];
		}
	
		$result = $query->result();
		mysqli_next_result($this->db->conn_id); 
		$query->free_result(); 
	
		return $result;
	}

	private function ListStorageExport() { // 16
		$this->db = $this->load->database('default', true);
		$sql = "CALL ListStorageExport(?)";
		$query = $this->db->query($sql, [$this->input->post('month')]);
	
		if ($query->num_rows() == 0) {
			return [];
		}
	
		$result = $query->result();
		mysqli_next_result($this->db->conn_id); 
		$query->free_result(); 
	
		return $result;
	}
}
