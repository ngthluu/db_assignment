<div class="login-box">
  <!-- /.login-logo -->
  <div class="card card-outline card-primary">
    <div class="card-header text-center">
      <a href="<?= site_url("admin/auth/signin") ?>" class="h1"><b>e-Bookstore system</b></a>
    </div>
    <div class="card-body">
      <form id="form-submit" action="<?= site_url("admin/auth/signin/post_signin") ?>" method="post">
        <label>Email</label>  
        <div class="input-group mb-3">
          <input type="email" name="email" class="form-control" placeholder="Email">
          <div class="invalid-feedback"></div>
        </div>
        <label>Password</label>
        <div class="input-group mb-3">
          <input type="password" name="password" class="form-control" placeholder="Password">
          <div class="invalid-feedback"></div>
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

      $(`input, select, textarea`).removeClass('is-invalid');

      var formData = new FormData(this);
      $.ajax({
        url: $(this).attr("action"),
        type: 'post',
        data: formData,
        processData: false,
        contentType: false,
        success: function(data) {
          location.reload();
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