<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Signin extends CI_Controller {

	public function index() {
		$this->data['main_view'] = 'admin/signin';
		$this->load->view('layout/main', $this->data);
	}

}
