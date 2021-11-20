<div class="login-box">
  <!-- /.login-logo -->
  <div class="card card-outline card-primary">
    <div class="card-header text-center">
      <a href="<?= site_url() ?>" class="h1"><b>e-Bookstore</b></a>
    </div>
    <div class="card-body">

      <form action="<?= site_url("account/signin/post_signin") ?>" method="post">
        <div class="input-group mb-3">
          <div class="input-group-prepend">
            <div class="input-group-text">
              <span class="fas fa-envelope"></span>
            </div>
          </div>
          <input type="email" class="form-control" placeholder="Email">
        </div>
        <div class="input-group mb-3">
          <div class="input-group-prepend">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
          <input type="password" class="form-control" placeholder="Password">
        </div>
        <div class="row">
          <div class="col-6">
          </div>
          <!-- /.col -->
          <div class="col-6">
            <button type="submit" class="btn btn-primary btn-block">Đăng nhập</button>
          </div>
          <!-- /.col -->
        </div>
      </form>

      <p class="mb-0">
        <a href="<?= site_url("account/signup") ?>" class="text-center">Đăng ký tài khoản mới</a>
      </p>
    </div>
    <!-- /.card-body -->
  </div>
  <!-- /.card -->
</div>
<!-- /.login-box -->