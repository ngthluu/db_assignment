<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0"> Sản phẩm </h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Sản phẩm</li>
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
        <?php for ($i = 0; $i < 10; $i++) { ?>
          <div class="col-lg-3">
            <div class="card card-danger card-outline">
              <div class="card-body">
                <h5 class="card-title mb-2 text-bold">Sách A</h5>

                <p class="card-text">
                  ISBN: 123456789 <br>
                  Category: ABC
                </p>
                <div class="d-flex">
                  <button class="btn btn-primary mr-2"><i class="fa fa-minus"></i></button>
                  <input type="number" class="form-control mr-2" value="0">
                  <button class="btn btn-primary mr-2"><i class="fa fa-plus"></i></button>
                  <button class="btn btn-primary mr-2"><i class="fa fa-shopping-cart"></i></button>
                </div>
              </div>
            </div>
          </div>
          <div class="col-lg-3">
            <div class="card card-primary card-outline">
              <div class="card-body">
                <h5 class="card-title mb-2 text-bold">Sách A</h5>

                <p class="card-text">
                  ISBN: 123456789 <br>
                  Category: ABC
                </p>
                <div class="d-flex">
                  <button class="btn btn-primary mr-2">Thuê</button>
                </div>
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
<!-- /.content-wrapper -->