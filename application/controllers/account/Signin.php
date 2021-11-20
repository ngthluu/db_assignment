<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Signin extends CI_Controller {

	public function index() {
		$this->data['main_view'] = 'client/account/signin';
		$this->load->view('layout/null', $this->data);
	}

	public function post_signin() {
		$_SESSION["id"] = 1;
		redirect(site_url(""));
	}

	public function signout() {
		unset($_SESSION["id"]);
		redirect(site_url(""));
	}
}
