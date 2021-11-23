<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Signin extends CI_Controller {

	public function index() {
		if (isset($_SESSION["id"])) {
			redirect(site_url());
		}
		$this->data['main_view'] = 'client/account/signin';
		$this->load->view('layout/client/null', $this->data);
	}

	public function post_signin() {
		
		// Validation
		$this->form_validation->set_data($this->input->post());
        $this->form_validation->set_rules('email', 'Email', 'required|valid_email');
        $this->form_validation->set_rules('password', 'Password', 'required');

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
		$sql = "CALL CustomerLogin(?, ?)";
		$result = $this->db->query($sql, [
			$this->input->post("email"), 
			hashing($this->input->post("password"))
		]);

		if ($result->num_rows() == 0) {
			// Not existed
			$this->output
				->set_status_header(404)
        		->set_content_type('application/json')
        		->set_output(json_encode(["email" => "Username / Password is not correct"]));
			return;
		}

		$user = $result->row();
		$_SESSION["id"] = $user->user_id;
		$this->output
			->set_status_header(200)
			->set_content_type('application/json')
			->set_output(json_encode(["status" => "Success"]));
	}

	public function signout() {
		unset($_SESSION["id"]);
		redirect(site_url(""));
	}
}
