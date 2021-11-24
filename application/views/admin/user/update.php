  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Cập nhật</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Cập nhật</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <!-- left column -->
          <div class="col-md-6">
            <!-- general form elements -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Sách nhập / xuất kho</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form action="" id="ware">
                <div class="card-body">
                  <div class="form-group">
                    <label for="ware_isbn">ISBN</label>
                    <input type="text" class="form-control" name="ware_isbn" placeholder="ISBN">
                  </div>
                  <div class="form-group">
                    <label for="ware_quantity">Số lượng</label>
                    <input type="number" class="form-control" name="ware_quantity" placeholder="Số lượng">
                  </div>
                  <div class="form-group">
                    <label for="ware_stoID">ID kho hàng</label>
                    <input type="text" class="form-control" name="ware_stoID" placeholder="Storage ID">
                  </div>
                  <div class="form-group">
                    <label>Hành động</label>
                    <select name="ware_action" class="form-control select2" style="width: 100%;">
                      <option value=1 selected="selected">Nhập kho</option>
                      <option value=2>Xuất kho</option>
                    </select>
                  </div>
                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Submit</button>
                </div>
              </form>
            </div>
            <!-- /.card -->            
            <!-- /.card -->

          </div>
          <!--/.col (left) -->
          <!-- right column -->
          <div class="col-md-6">
            <!-- Form Element sizes -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Cập nhật thông tin giao dịch khi giao dịch trực tuyến gặp sự cố</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form action="" id="update_transac">
                <div class="card-body">
                  <div class="form-group">
                    <label for="update_transac_orderid">Order ID</label>
                    <input type="text" class="form-control" name="update_transac_orderid" placeholder="Order ID">
                  </div>
                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Submit</button>
                </div>
              </form>
            </div>
          </div>
          <!--/.col (right) -->
        </div>
        <div class="row">
          <div class="col-md-12">
            <div class="card card-primary" id="result">
            </div>
          </div>
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-6">
            <div class="card card-primary">
              <?php echo (isset($result) ? $result : "");
              ?>
            </div>
          </div>
        </div>
      </div>
    </section>
  </div>
  <!-- /.control-sidebar -->

<script>
  /*$("#ware").on('submit', (e) => {
    e.preventDefault();
    let isbn = $("#ware_isbn").val();
    let quantity = $("#ware_quantity").val();
    let sto_id = $("#ware_stoID").val();
    let action = $("#ware_action").val();

    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() {
      if (this.readyState == 4 && this.status == 200) {
        $("#result").html(this.responseText);
      }
    };
    let query = "general_db.php?isbn=" + isbn +"&quantity=" + quantity + "&sto_id=" + sto_id + "&action=" + action;
    xhttp.open("GET", query, true);
    xhttp.send();
  });

  $("#update_transac").on('submit', (e) => {
    e.preventDefault();
    let order_id = $("#update_transac_orderid").val();

    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() {
      if (this.readyState == 4 && this.status == 200) {
        $("#result").html(this.responseText);
      }
    };
    let query = "general_db.php?order_id=" + order_id;
    xhttp.open("GET", query, true);
    xhttp.send();
  });*/
</script>
