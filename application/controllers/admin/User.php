<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends ADMIN_Controller {

	public function update() {
		$this->data['main_view'] = 'admin/user/update';
		$this->load->view('layout/admin/main', $this->data);
	}

    public function statistics() {
		$this->data['main_view'] = 'admin/user/statistics';
		$this->load->view('layout/admin/main', $this->data);
	}
}
