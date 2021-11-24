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
                  <a href="<?= site_url("account/information") ?>" class="dropdown-item">
                    <i class="fas fa-user mr-2"></i> Thông tin cá nhân
                  </a>
                  <div class="dropdown-divider"></div>
                  <a href="<?= site_url("account/payment") ?>" class="dropdown-item">
                    <i class="fas fa-address-card mr-2"></i> Thông tin thanh toán
                  </a>
                  <div class="dropdown-divider"></div>
                  <a href="<?= site_url("account/orders") ?>" class="dropdown-item active">
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
              <h1 class="m-0"> Đơn hàng </h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item"><a href="#">Tài khoản</a></li>
                <li class="breadcrumb-item active">Đơn hàng</li>
              </ol>
            </div><!-- /.col -->
          </div><!-- /.row -->
        </div><!-- /.container-fluid -->
      </div>
      <!-- /.content-header -->

      <!-- Main content -->
      <div class="content">
        <div class="container">
          <div class="mb-3">
            <button class="btn btn-secondary" type="button" data-toggle="collapse" data-target="#order-option1">
              Đã thực hiện
            </button>
            <button class="btn btn-secondary" type="button" data-toggle="collapse" data-target="#order-option2">
              Gặp sự cố
            </button>
            <button class="btn btn-secondary" type="button" data-toggle="collapse" data-target="#order-option3">
              Chưa hoàn tất
            </button>
            <button class="btn btn-secondary" type="button" data-toggle="collapse" data-target="#order-option4">
              Nhiều sách nhất
            </button>
            <button class="btn btn-secondary" type="button" data-toggle="collapse" data-target="#order-option5">
              TT + điện tử
            </button>
          </div>
          <div class="mb-3" id="orderGroup">
            <form action="">
            <div class="collapse <?= isset($_GET["order-done"]) ? "show" : "" ?>" id="order-option1" data-parent="#orderGroup">
              <div class="form-inline">
                <input value="<?= isset($_GET["order-done"]) ? $_GET["order-done"] : "" ?>" type="month" class="form-control mr-2" name="order-done" placeholder="">
                <button class="btn btn-secondary"><i class="fa fa-search"></i></button>
              </div>
            </div>
            </form>
            <form action="">
            <div class="collapse <?= isset($_GET["order-error"]) ? "show" : "" ?>" id="order-option2" data-parent="#orderGroup">
              <div class="form-inline">
                <input value="<?= isset($_GET["order-error"]) ? $_GET["order-error"] : "" ?>" type="month" class="form-control mr-2" name="order-error" placeholder="">
                <button class="btn btn-secondary"><i class="fa fa-search"></i></button>
              </div>
            </div>
            </form>
            <form action="">
            <div class="collapse <?= isset($_GET["order-notfinish"]) ? "show" : "" ?>" id="order-option3" data-parent="#orderGroup">
              <div class="form-inline">
                <input value="<?= isset($_GET["order-notfinish"]) ? $_GET["order-notfinish"] : "" ?>" type="month" class="form-control mr-2" name="order-notfinish" placeholder="">
                <button class="btn btn-secondary"><i class="fa fa-search"></i></button>
              </div>
            </div>
            </form>
            <form action="">
            <div class="collapse <?= isset($_GET["order-mostbook"]) ? "show" : "" ?>" id="order-option4" data-parent="#orderGroup">
              <div class="form-inline">
                <input value="<?= isset($_GET["order-mostbook"]) ? $_GET["order-mostbook"] : "" ?>" type="month" class="form-control mr-2" name="order-mostbook" placeholder="">
                <button class="btn btn-secondary"><i class="fa fa-search"></i></button>
              </div>
            </div>
            </form>
            <form action="">
            <div class="collapse <?= isset($_GET["order-ttdt"]) ? "show" : "" ?>" id="order-option5" data-parent="#orderGroup">
              <div class="form-inline">
                <input value="<?= isset($_GET["order-ttdt"]) ? $_GET["order-ttdt"] : "" ?>" type="month" class="form-control mr-2" name="order-ttdt" placeholder="">
                <button class="btn btn-secondary"><i class="fa fa-search"></i></button>
              </div>
            </div>
            </form>
          </div>
          <div class="row">
            <?php foreach ($orders_list as $order) { ?>
            <div class="col-lg-6">
              <div class="card">
                <div class="card-body">
                  <h5 class="card-title mb-2">#ORDER<?= $order->order_id?></h5>
                  <p class="card-text">
                    <strong>Date: </strong> <?= $order->created_date ?> <br>
                    <strong>State: </strong>
                      <?php if ($order->order_state == "Đã hủy") { ?>
                      <label class="badge badge-danger"><?= $order->order_state ?></label> 
                      <?php } else { ?>
                      <label class="badge badge-success"><?= $order->order_state ?></label> 
                      <?php } ?>

                      <?php if ($order->error_state == "Sự cố") { ?>
                      <label class="badge badge-danger"><?= $order->error_state ?></label> 
                      <?php } else { ?>
                      <label class="badge badge-success"><?= $order->error_state ?></label> 
                      <?php } ?>
                    <br>
                    <strong>Method: </strong> <?= $order->method ?> <br>
                    <strong>Books number: </strong> <?= $order->book_count ?> <br>
                  </p>
                </div>
              </div>
            </div>
            <?php } ?>
          </div>
          <!-- /.row -->
        </div><!-- /.container-fluid -->
      </div>

      <div class="content-header">
        <div class="container">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1 class="m-0"> Sách đã mua </h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
            </div><!-- /.col -->
          </div><!-- /.row -->
        </div><!-- /.container-fluid -->
      </div>
      <!-- /.content-header -->

      <!-- Main content -->
      <div class="content">
        <div class="container">
          <div class="mb-3">
            <form action="">
            <div>
              <div class="form-inline">
                <input value="<?= isset($_GET["book-month"]) ? $_GET["book-month"] : "" ?>" type="month" class="form-control mr-2" name="book-month" placeholder="">
                <select name="book-category" class="form-control mr-2">
                  <option value="-1">Chọn thể loại</option>
                  <?php foreach ($categories as $category) { ?>
                    <option <?= isset($_GET["book-category"]) && $_GET["book-category"] == $category->category ? "selected" : "" ?> value="<?= $category->category ?>"><?= $category->category ?></option>
                  <?php } ?>
                </select>
                <button class="btn btn-secondary"><i class="fa fa-search"></i></button>
              </div>
            </div>
            </form>
          </div>
          <div class="row">
          <?php foreach ($books_list as $book) { ?>
            <div class="col-lg-3">
              <div class="card card-danger card-outline">
                <div class="card-body">
                  <h5 class="card-title mb-2 text-bold"><?= $book->bookname ?></h5>

                  <p class="card-text">
                    <strong>ISBN:</strong> <?= $book->isbn ?> <br>
                    <strong>Category:</strong> <?= $book->category ?> <br>
                    <strong>Author:</strong> <?= $book->author_name ?> <br>
                    <strong>Release date: </strong> <?= $book->date_release ?>
                  </p>
                </div>
              </div>
            </div>
          <?php } ?>
          </div>
          <!-- /.row -->
        </div><!-- /.container-fluid -->
      </div>
      <!-- /.content -->
    </div>
  </div>

</div>
<!-- /.content-wrapper -->