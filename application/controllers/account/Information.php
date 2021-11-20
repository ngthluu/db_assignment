<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Information extends USER_Controller {

	public function index() {
		$this->data['main_view'] = 'client/account/information';
		$this->load->view('layout/client/main', $this->data);
	}
}
