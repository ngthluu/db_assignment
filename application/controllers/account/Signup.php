<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Signup extends CI_Controller {

	public function index() {
		$this->data['main_view'] = 'client/account/signup';
		$this->load->view('layout/client/null', $this->data);
	}
}
