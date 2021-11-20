<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Signin extends CI_Controller {

	public function index() {
		$this->data['main_view'] = 'client/account/signin';
		$this->load->view('layout/null', $this->data);
	}
}
