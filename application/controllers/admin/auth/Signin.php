<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Signin extends CI_Controller {

	public function index() {
		$this->data['main_view'] = 'admin/auth/signin';
		$this->load->view('layout/admin/null', $this->data);
	}

	public function post_signin() {
		$_SESSION["system_id"] = 1;
		redirect(site_url("admin/dashboard"));
	}

	public function signout() {
		unset($_SESSION["system_id"]);
		redirect(site_url("admin/dashboard"));
	}

}
