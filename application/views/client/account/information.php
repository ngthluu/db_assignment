<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <div class="row">
    <div class="col-sm-3">
      <!-- Content Header (Page header) -->
      <div class="content-header">
      </div>
      <!-- /.content-header -->

      <!-- Main content -->
      <div class="content">
        <div class="container">
          <div class="row">
            <div class="col-lg-12">
              <div class="card">
                <div class="card-header">
                  <h5 class="card-title m-0">TÀI KHOẢN</h5>
                </div>
                <div class="card-body">
                  <a href="<?= site_url("account/information") ?>" class="dropdown-item active">
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
              </div>
            </div>
            <!-- /.col-md-6 -->
          </div>
          <!-- /.row -->
        </div><!-- /.container-fluid -->
      </div>
      <!-- /.content -->
    </div>
    <div class="col-sm-9">
      <!-- Content Header (Page header) -->
      <div class="content-header">
        <div class="container">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1 class="m-0"> Thông tin cá nhân </h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item"><a href="#">Tài khoản</a></li>
                <li class="breadcrumb-item active">Thông tin cá nhân</li>
              </ol>
            </div><!-- /.col -->
          </div><!-- /.row -->
        </div><!-- /.container-fluid -->
      </div>
      <!-- /.content-header -->

      <!-- Main content -->
      <div class="content">
        <div class="container">
          <div class="row">
            <div class="col-lg-12">
              <div class="card">
                <div class="card-body">
                  <h5 class="card-title"> <?php foreach ($information as $inform) echo $inform->user_id ?></h5>

                  <p class="card-text">
                    Some quick example text to build on the card title and make up the bulk of the card's
                    content.
                  </p>

                  <a href="#" class="card-link">Card link</a>
                  <a href="#" class="card-link">Another link</a>
                </div>
              </div>
            </div>
          </div>
          <!-- /.row -->
        </div><!-- /.container-fluid -->
      </div>
      <!-- /.content -->
    </div>
  </div>

</div>
<!-- /.content-wrapper -->