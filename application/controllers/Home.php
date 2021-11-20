<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

	public function index() {
		$this->data['main_view'] = 'client/home';
		$this->load->view('layout/main', $this->data);
	}

	public function notfound() {
		$this->data['main_view'] = 'client/404';
		$this->load->view('layout/main', $this->data);
	}
}
