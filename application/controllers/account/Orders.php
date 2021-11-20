<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Orders extends CI_Controller {

	public function index() {
		$this->data['main_view'] = 'client/account/orders';
		$this->load->view('layout/main', $this->data);
	}
}
