<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Orders extends USER_Controller {

	public function index() {
		$this->data['main_view'] = 'client/account/orders';
		$this->load->view('layout/client/main', $this->data);
	}
}
