<div class="login-box">
  <!-- /.login-logo -->
  <div class="card card-outline card-primary">
    <div class="card-header text-center">
      <a href="<?= site_url() ?>" class="h1"><b>e-Bookstore</b></a>
    </div>
    <div class="card-body">

      <form id="form-submit" action="<?= site_url("account/signup/post_signup") ?>" method="post">
        <label>Email</label>  
        <div class="input-group mb-2">
          <input name="email" type="email" class="form-control" placeholder="Email">
          <div class="invalid-feedback"></div>
        </div>
        <div class="row">
          <div class="col-sm-6">
            <label>Password</label>  
            <div class="input-group mb-2">
              <input name="password" type="password" class="form-control" placeholder="Password">
              <div class="invalid-feedback"></div>
            </div>
          </div>
          <div class="col-sm-6">
            <label>Re-typed Password</label>  
            <div class="input-group mb-2">
              <input name="repassword" type="password" class="form-control" placeholder="Re-typed password">
              <div class="invalid-feedback"></div>
            </div>
          </div>
        </div>
        <label>Username</label>  
        <div class="input-group mb-2">
          <input name="username" type="text" class="form-control" placeholder="Username">
          <div class="invalid-feedback"></div>
        </div>
        <div class="row">
          <div class="col-sm-6">
            <label>First name</label>  
            <div class="input-group mb-2">
              <input name="fname" type="text" class="form-control" placeholder="First name">
              <div class="invalid-feedback"></div>
            </div>
          </div>
          <div class="col-sm-6">
            <label>Last name</label>  
            <div class="input-group mb-2">
              <input name="lname" type="text" class="form-control" placeholder="Last name">
              <div class="invalid-feedback"></div>
            </div>
          </div>
        </div>
        <label>CMND</label>  
        <div class="input-group mb-2">
          <input name="cmnd" type="text" class="form-control" placeholder="CMND">
          <div class="invalid-feedback"></div>
        </div>
        <div class="row">
          <div class="col-6">
          </div>
          <!-- /.col -->
          <div class="col-6">
            <button type="submit" class="btn btn-primary btn-block">Đăng ký</button>
          </div>
          <!-- /.col -->
        </div>
      </form>

      <p class="mb-0">
        <a href="<?= site_url("account/signin") ?>" class="text-center">Đã có tài khoản ? Đăng nhập</a>
      </p>
    </div>
    <!-- /.card-body -->
  </div>
  <!-- /.card -->
</div>
<!-- /.login-box -->

<script>
  document.addEventListener("DOMContentLoaded", function () {
    
    $(document).on('submit', "#form-submit", function(e) {
      e.preventDefault();

      $('.alert-success').remove();
      $(`input, select, textarea`).removeClass('is-invalid');

      var formData = new FormData(this);
      $.ajax({
        url: $(this).attr("action"),
        type: 'post',
        data: formData,
        processData: false,
        contentType: false,
        success: function(data) {
          $(`input`).val('');
          $("#form-submit").prepend(`<div class="alert alert-success">Account created successfully</div>`);
        },
        error: function(data) {
          let response = data.responseJSON;
          for (const [name, message] of Object.entries(response)) {
            $(`[name='${name}'] ~.invalid-feedback`).html(message);
            $(`[name='${name}']`).addClass('is-invalid');
          }
        }
      });
    });

  });
  
</script>