<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends ADMIN_Controller {

	public function index() {
		$this->data['main_view'] = 'admin/dashboard/home';
		$this->load->view('layout/admin/main', $this->data);
	}
}
