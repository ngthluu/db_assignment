<?php 
// Get cart info
$CI = &get_instance();
$CI->load->model("Cart_model");
?>

<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>e-Bookstore</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="<?= site_url("assets/adminlte/plugins/fontawesome-free/css/all.min.css"); ?>">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?= site_url("assets/adminlte/dist/css/adminlte.min.css"); ?>">
</head>
<body class="hold-transition layout-top-nav">
<div class="wrapper">

  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand-md navbar-light navbar-white">
    <div class="container">
      <a href="<?= site_url("") ?>" class="navbar-brand">
        <img src="<?= site_url("assets/images/icon.png"); ?>" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light">e-Bookstore</span>
      </a>

      <button class="navbar-toggler order-1" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <!-- Right navbar links -->
      <ul class="order-1 order-md-3 navbar-nav navbar-no-expand ml-auto">
        <!-- Messages Dropdown Menu -->
        <li class="nav-item dropdown">
          <a class="nav-link" data-toggle="dropdown" href="#">
            <i class="fas fa-shopping-cart"></i>
            <span class="badge badge-danger navbar-badge"><?= $CI->Cart_model->get_total_items() ?></span>
          </a>
          <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
            <?php 
            if (!$CI->Cart_model->cart_empty()) {
              $items = $CI->Cart_model->get_cart_items();
              $books_list = $items->books_list;
              $rent_list = $items->rent_list;
              foreach ($books_list as $item) {
            ?>
              <div class="p-2">
                <!-- Message Start -->
                <div class="media">
                  <div class="media-body">
                    <h3 class="dropdown-item-title">
                      <strong><?= $item->bookname ?></strong>
                    </h3>
                    <p>
                    ISBN: <?= $item->isbn ?> <br>
                    Price: <?= $item->price ?>; Quantity: <?= $item->quantity ?>
                    </p>
                  </div>
                </div>
                <!-- Message End -->
              </div>
              <div class="dropdown-divider"></div>
            <?php } foreach ($rent_list as $item) { ?>
              <div class="p-2 bg-primary">
                <!-- Message Start -->
                <div class="media">
                  <div class="media-body">
                    <h3 class="dropdown-item-title">
                      <strong><?= $item->bookname ?></strong>
                    </h3>
                    <p>
                    ISBN: <?= $item->isbn ?> <br>
                    Rent Price: <?= $item->rent_price ?>
                    </p>
                  </div>
                </div>
                <!-- Message End -->
              </div>
              <div class="dropdown-divider"></div>
            <?php } ?>
            <a href="#" class="dropdown-item dropdown-footer bg-red"><strong>Thanh toán</strong></a>
            <?php } else { ?>
              <div class="dropdown-item dropdown-footer"><strong>Giỏ hàng trống</strong></div>
            <?php } ?>
            
          </div>
        </li>
        <!-- Notifications Dropdown Menu -->
        <li class="nav-item dropdown">
        <?php 
        // Logged in
        if (isset($_SESSION["id"])) { 
        ?>
          <a class="nav-link" data-toggle="dropdown" href="#">
            <i class="far fa-user"></i>
          </a>
          <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
            <div class="dropdown-divider"></div>
            <a href="<?= site_url("account/information") ?>" class="dropdown-item">
              <i class="fas fa-user mr-2"></i> Thông tin cá nhân
            </a>
            <div class="dropdown-divider"></div>
            <a href="<?= site_url("account/payment") ?>" class="dropdown-item">
              <i class="fas fa-address-card mr-2"></i> Thông tin thanh toán
            </a>
            <div class="dropdown-divider"></div>
            <a href="<?= site_url("account/orders") ?>" class="dropdown-item">
              <i class="fas fa-save mr-2"></i> Đơn hàng
            </a>
            <div class="dropdown-divider"></div>
            <a href="<?= site_url("account/signin/signout") ?>" class="dropdown-item dropdown-footer bg-red"><strong>Đăng xuất</strong></a>
          </div>
        <?php } else { ?>
        	<a class="nav-link" href="<?= site_url("account/signin"); ?>">
            <i class="far fa-user"></i>
          </a>
        <?php } ?>
        </li>
      </ul>
    </div>
  </nav>
  <!-- /.navbar -->