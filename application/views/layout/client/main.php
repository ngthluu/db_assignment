<?php 
$this->load->view('layout/client/header_main', $this->data);
$this->load->view($main_view, $this->data);
$this->load->view('layout/client/footer_main', $this->data);
?>