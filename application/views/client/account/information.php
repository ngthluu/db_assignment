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
                <?php foreach ($information as $inform) { ?>
                  <!-- <h5 class="card-title"> Họ và tên: <? echo $inform->lname . ' '. $inform->fname ?></h5> -->
                  <p class="card-text">
                  <form>
                    <div class="form-group">
                        <label for="exampleFormControlInput1">Họ</label>
                        <input value="<?= isset($_GET["lname"]) ? $_GET["lname"] : "" ?>" 
                            type="email" class="form-control" id="exampleFormControlInput1" placeholder="<?echo $inform->lname ?>">
                      </div>
                      <div class="form-group">
                        <label for="exampleFormControlInput1">Tên</label>
                        <input value="<?= isset($_GET["fname"]) ? $_GET["fname"] : "" ?>" 
                          type="email" class="form-control" id="exampleFormControlInput1" placeholder="<?echo $inform->fname ?>">
                      </div>
                      <div class="form-group">
                        <label for="exampleFormControlInput1">Chứng minh nhân dân</label>
                        <input type="email" class="form-control" disabled id="exampleFormControlInput1" placeholder="<?echo $inform->cmnd ?>">
                      </div>
                      <div class="form-group">
                        <label for="exampleFormControlInput1">Username</label>
                        <input type="email" class="form-control" disabled id="exampleFormControlInput1" placeholder="<?echo $inform->username ?>">
                      </div>
                      <div class="form-group">
                        <label for="exampleFormControlInput1">Địa chỉ email</label>
                        <input type="email" class="form-control" disabled id="exampleFormControlInput1" placeholder="<?echo $inform->email ?>">
                      </div>
                      <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                  </p>
                <?php } ?>
                </div>
              </div>
            </div>
          </div>
          <!-- /.row -->
          </div>
        </div><!-- /.container-fluid -->
        <div class="content-header">
        <div class="container">
          <div class="row mb-2">
            <div class="col-sm-12">
              <h1 class="m-0"> Đổi mật khẩu </h1>
            </div><!-- /.col -->
          </div><!-- /.row -->
        </div><!-- /.container-fluid -->

        <div class="content">
        <div class="container">
          <div class="row">
            <div class="col-lg-12">
              <div class="card">
                <div class="card-body">
                <?php foreach ($information as $inform) { ?>
                  <p class="card-text">
                  <form>
                    <div class="form-group">
                        <label for="exampleFormControlInput1">Mật khẩu cũ</label>
                        <input type="password" class="form-control" id="exampleFormControlInput1" placeholder="">
                      </div>
                      <div class="form-group">
                        <label for="exampleFormControlInput1">Mật khẩu mới</label>
                        <input type="password" class="form-control" id="exampleFormControlInput1" placeholder="">
                      </div>
                      <div class="form-group">
                        <label for="exampleFormControlInput1">Nhập lại mật khẩu</label>
                        <input type="password" class="form-control" id="exampleFormControlInput1" placeholder="">
                      </div>
                      <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                  </p>
                <?php } ?>
                </div>
              </div>
            </div>
          </div>
          <!-- /.row -->
          </div>
        </div>
      </div>
      </div>
      <!-- /.content -->
      
    </div>
  </div>

</div>
<!-- /.content-wrapper -->