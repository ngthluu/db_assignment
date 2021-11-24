<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Information extends USER_Controller {
	public function change_information() {
		$this->db = $this->load->database('default', true);
		$sql = "CALL UpdateUserInform(?, '', ?, ?, '', '', '')";
		$query = $this->db->query($sql, [$_SESSION['id'], $this->input->post('lname'), $this->input->post('fname')]);

		mysqli_next_result($this->db->conn_id); 

		$this->index();
	}

	public function change_password() {
		$this->db = $this->load->database('default', true);
		$sql = "CALL UpdateUserInform(?, '', '', '', '' , '', ?)";
		$query = $this->db->query($sql, [$_SESSION['id'], hashing($this->input->post('newpass'))]);

		mysqli_next_result($this->db->conn_id);

		$this->index();
	}

	private function getInformation() {
		$this->db = $this->load->database('default', true);
		$sql = "CALL GetInformation(?)";
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
		$this->data['information'] = $this->getInformation();

		$this->data['main_view'] = 'client/account/information';
		$this->load->view('layout/client/main', $this->data);
	}
}
