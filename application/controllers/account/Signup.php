<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Signup extends CI_Controller {

	public function index() {
		$this->data['main_view'] = 'client/account/signup';
		$this->load->view('layout/client/null', $this->data);
	}

	public function post_signup() {
		
		// Validation
		$this->form_validation->set_data($this->input->post());
        $this->form_validation->set_rules('email', 'Email', 'required|valid_email');
		$this->form_validation->set_rules('password', 'Password', 'required');
		$this->form_validation->set_rules('repassword', 'Re-password', 'required|matches[password]');
		$this->form_validation->set_rules('username', 'Username', 'required');
		$this->form_validation->set_rules('fname', 'First name', 'required');
		$this->form_validation->set_rules('lname', 'Last name', 'required');
        $this->form_validation->set_rules('cmnd', 'CMND', 'required|max_length[12]');

		if (!$this->form_validation->run()) {
            $errors = $this->form_validation->error_array();
            $this->output
				->set_status_header(404)
        		->set_content_type('application/json')
        		->set_output(json_encode($errors));
			return;
        }

		// Check database
		$this->db = $this->load->database('default', true);
		$sql = "CALL CustomerSignup(?, ?, ?, ?, ?, ?)";

		$query = $this->db->query($sql, [
			$this->input->post("cmnd"),
			$this->input->post("lname"),
			$this->input->post("fname"),
			$this->input->post("email"),
			$this->input->post("username"),
			hashing($this->input->post("password"))
		]);

		if (!$query) {
			$errors = $this->db->error();
            $this->output
				->set_status_header(404)
        		->set_content_type('application/json')
        		->set_output(json_encode(["email" => $errors["message"]]));
			return;
		}

		$query->free_result();
		$query->free_result();

		$this->output
			->set_status_header(200)
			->set_content_type('application/json')
			->set_output(json_encode(["status" => "Success"]));
	}
}
