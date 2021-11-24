<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Payment extends USER_Controller {
	private function getAllCredits() {
		$this->db = $this->load->database('default', true);
		$sql = "CALL GetAllCredits(?)";
		$query = $this->db->query($sql, [$_SESSION['id']]);

		if ($query->num_rows() == 0) {
			return [];
		}

		$result = $query->result();
		mysqli_next_result($this->db->conn_id); 
		$query->free_result(); 

		return $result;
	}
	public function index() {
		$this->data['credits'] = $this->getAllCredits();

		$this->data['main_view'] = 'client/account/payment';
		$this->load->view('layout/client/main', $this->data);
	}
}
