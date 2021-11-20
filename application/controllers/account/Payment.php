<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Payment extends USER_Controller {

	public function index() {
		$this->data['main_view'] = 'client/account/payment';
		$this->load->view('layout/client/main', $this->data);
	}
}
