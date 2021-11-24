<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>e-Bookstore | Dashboard</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?= site_url("assets/adminlte/plugins/fontawesome-free/css/all.min.css"); ?>">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Tempusdominus Bootstrap 4 -->
  <link rel="stylesheet" href="<?= site_url("assets/adminlte/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css"); ?>">
  <!-- iCheck -->
  <link rel="stylesheet" href="<?= site_url("assets/adminlte/plugins/icheck-bootstrap/icheck-bootstrap.min.css"); ?>">
  <!-- JQVMap -->
  <link rel="stylesheet" href="<?= site_url("assets/adminlte/plugins/jqvmap/jqvmap.min.css"); ?>">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?= site_url("assets/adminlte/dist/css/adminlte.min.css"); ?>">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="<?= site_url("assets/adminlte/plugins/overlayScrollbars/css/OverlayScrollbars.min.css"); ?>">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="<?= site_url("assets/adminlte/plugins/daterangepicker/daterangepicker.css"); ?>">
  <!-- summernote -->
  <link rel="stylesheet" href="<?= site_url("assets/adminlte/plugins/summernote/summernote-bs4.min.css"); ?>">
</head>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">

  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      <!-- Notifications Dropdown Menu -->
      <li class="nav-item dropdown">
        <a class="nav-link" data-toggle="dropdown" href="#">
          <i class="far fa-user"></i>
        </a>
        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
            <a href="<?= site_url("admin/auth/signin/signout") ?>" class="dropdown-item dropdown-footer bg-red"><strong>Đăng xuất</strong></a>
        </div>
      </li>
    </ul>
  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="<?= site_url("admin/dashboard") ?>" class="brand-link">
      <img src="<?= site_url("assets/images/icon.png"); ?>" alt="e-Bookstore" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">e-Bookstore</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Dashboard
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-copy"></i>
              <p>
                Nhân viên
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="<?= site_url("admin/user/update") ?>" class="nav-link <?= ($this->router->class == "user" && $this->router->method == "update") ? "active" : "" ?>">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Cập nhật</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?= site_url("admin/user/statistics") ?>" class="nav-link <?= ($this->router->class == "user" && $this->router->method == "statistics") ? "active" : "" ?>">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Thống kê</p>
                </a>
              </li>
            </ul>
          </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>