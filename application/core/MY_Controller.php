<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MY_Controller extends CI_Controller {}

class USER_Controller extends CI_Controller {

    public function __construct() {
        parent::__construct();
        if (!isset($_SESSION["id"])) {
            redirect("account/signin");
        }
    }
}

class ADMIN_Controller extends CI_Controller {

    public function __construct() {
        parent::__construct();
        if (!isset($_SESSION["system_id"])) {
            redirect("admin/auth/signin");
        }
    }
}
