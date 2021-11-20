<?php 
$this->load->view('layout/admin/header_main', $this->data);
$this->load->view($main_view, $this->data);
$this->load->view('layout/admin/footer_main', $this->data);
?>