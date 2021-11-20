<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Payment extends CI_Controller {

	public function index() {
		$this->data['main_view'] = 'client/account/payment';
		$this->load->view('layout/main', $this->data);
	}
}
