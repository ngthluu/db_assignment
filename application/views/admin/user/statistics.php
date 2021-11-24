  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Thống kê</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Thống kê</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-6">
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Thống kê đơn hàng - kho hàng</h3>
              </div>
              <form action="" id="stat_order">
                <div class="card-body">
                  <div class="form-group">
                    <label>Ngày:</label>
                    <div class="input-group">
                      <div class="input-group-prepend">
                        <span class="input-group-text">
                          <i class="far fa-calendar-alt"></i>
                        </span>
                      </div>
                      <input id="stat_order_date" type="text" class="form-control float-right" name="stat_order_date">
                    </div>
                    <div class="form-check">
                      <input name="is_month" class="form-check-input" type="checkbox">
                      <label class="form-check-label">Tháng</label>
                    </div>
                    <!-- /.input group -->
                  </div>
                  <div class="form-group">
                    <label>Loại sách</label>
                    <select name="order_book_type" class="form-control select2" style="width: 100%;">
                      <option value=0 selected="selected"></option>
                      <option value=1>Mọi loại sách</option>
                      <option value=2>Sách truyền thống</option>
                      <option value=3>Sách điện tử</option>
                    </select>
                  </div>
                  <div class="form-group">
                    <label>Mục đích</label>
                    <select name="order_purpose" class="form-control select2" style="width: 100%;">
                      <option value=0 selected="selected"></option>
                      <option value=1>Mua</option>
                      <option value=2>Thuê</option>
                    </select>
                  </div>
                  <div class="form-group">
                    <label>Cách thống kê</label>
                    <select name="order_stat_type" class="form-control select2" style="width: 100%;">
                      <option value=0 selected="selected"></option>
                      <option value=1>Danh sách</option>
                      <option value=2>Tổng số</option>
                    </select>
                  </div>
                  <div class="form-group">
                    <label>Sắp xếp</label>
                    <div class="form-check">
                      <input name="order_desc" class="form-check-input" type="checkbox">
                      <label class="form-check-label">Nhiều nhất</label>
                    </div>
                  </div>
                  <div class="form-group">
                    <label>Hình thức thanh toán</label>
                    <select name="order_method" class="form-control select2" style="width: 100%;">
                      <option value=0 selected="selected"></option>
                      <option value=1>Tất cả</option>
                      <option value=2>Thẻ ngân hàng</option>
                      <option value=3>ZaloPay</option>
                    </select>
                    <div class="form-check">
                      <input name="order_error" class="form-check-input" type="checkbox">
                      <label class="form-check-label">Sự cố</label>
                    </div>
                  </div>
                  <!-- /.form group -->
                </div>
                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Submit</button>
                </div>
              </form>
            </div>
          </div>
          <!-- /.col (left) -->
          <div class="col-md-6">
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Thống kê tác giả</h3>
              </div>
              <form id="stat_author">
                <div class="card-body">
                  <div class="form-group">
                    <label>Ngày:</label>
                    <div class="input-group">
                      <div class="input-group-prepend">
                        <span class="input-group-text">
                          <i class="far fa-calendar-alt"></i>
                        </span>
                      </div>
                      <input type="text" class="form-control float-right" name="stat_author_date">
                    </div>
                    <!-- /.input group -->
                  </div>
                  <div class="form-group">
                    <label>Mục đích</label>
                    <select name="author_purpose" class="form-control select2" style="width: 100%;">
                      <option value=1 selected="selected">Mua</option>
                      <option value=2>Thuê</option>
                    </select>
                  </div>
                  <div class="form-group">
                    <label>Cách thống kê</label>
                    <select name="author_stat_type" class="form-control select2" style="width: 100%;">
                      <option value=1 selected="selected">Danh sách</option>
                      <option value=2>Tổng số</option>
                    </select>
                  </div>
                  <!-- /.form group -->
                </div>
                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Submit</button>
                </div>
              </form>
            </div>
          </div>
          <!-- /.col (right) -->
        </div>
        <!-- /.row -->
        <div class="row">
          <div class="col-md-12">
            <div id="result" class="card card-primary">
            </div>
          </div>
        </div>
        <!-- /.row -->
      </div>
      <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-6">
            <div class="card card-primary">
              <?php if (isset($result)) foreach ($result as $res) {
                echo $res;
              }?>
            </div>
          </div>
        </div>
      </div>
    </section>
  </div>
  
<script>
  /*$("#stat_order").on('submit', (e) => {
    e.preventDefault();
    let order_date = $("#stat_order_date").val();
    let order_start_date = order_date.split(' - ')[0].trim();
    let order_end_date = order_date.split(' - ')[1].trim();

    let order_book_type = $("#order_book_type").val();
    // 1: Mọi loại sách, 2: Truyền thống, 3: Điện tử
    let order_purpose = $("#order_purpose").val();
    // 1: Mua, 2: Thuê
    let order_stat_type = $("#order_stat_type").val();
    // 1: Danh sách, 2: Tổng số
    let order_desc = $("#order_desc").is(':checked');
    // Cách sắp xếp: Có chọn là nhiều nhất đến ít nhất
    let order_method = $("#order_method").val();
    // 1: Tất cả, 2: Thẻ ngân hàng, 3: ZaloPay
    let order_error = $("#order_error").is(':checked');
    // Có sự cố hay không

    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() {
      if (this.readyState == 4 && this.status == 200) {
        $("#result").html(this.responseText);
      }
    };
    let query = "advanced_db.php?action=order&start_date=" + order_start_date + 
    "&end_date=" + order_end_date + "&book_type=" + order_book_type + "&purpose=" + order_purpose +
    "&stat_type=" + order_stat_type + "&desc=" + order_desc + "&method=" + order_method +
    "&error=" + order_error;
    xhttp.open("GET", query, true);
    xhttp.send();
  });

  $("#stat_author").on('submit', (e) => {
    e.preventDefault();
    let author_date = $("#stat_author_date").val();
    let author_start_date = author_date.split(' - ')[0].trim();
    let author_end_date = author_date.split(' - ')[1].trim();

    let author_purpose = $("#author_purpose").val();
    // 1: Mua, 2: Thuê
    let author_stat_type = $("#author_stat_type").val();
    // 1: Danh sách, 2: Tổng số

    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() {
      if (this.readyState == 4 && this.status == 200) {
        $("#result").html(this.responseText);
      }
    };
    let query = "advanced_db.php?action=author&start_date=" + author_start_date +
    "&end_date=" + author_end_date + "&purpose=" + author_purpose + "&stat_type=" + author_stat_type;
    xhttp.open("GET", query, true);
    xhttp.send();
  });*/
  $(function () {
    //Initialize Select2 Elements
    $('.select2').select2()

    //Initialize Select2 Elements
    $('.select2bs4').select2({
      theme: 'bootstrap4'
    })

    //Datemask dd/mm/yyyy
    $('#datemask').inputmask('dd/mm/yyyy', { 'placeholder': 'dd/mm/yyyy' })
    //Datemask2 mm/dd/yyyy
    $('#datemask2').inputmask('mm/dd/yyyy', { 'placeholder': 'mm/dd/yyyy' })
    //Money Euro
    $('[data-mask]').inputmask()

    //Date picker
    $('#reservationdate_order').datetimepicker({
        format: 'L'
    });

    $('#reservationdate_author').datetimepicker({
        format: 'L'
    });

    //Date and time picker
    $('#reservationdatetime').datetimepicker({ icons: { time: 'far fa-clock' } });

    //Date range picker
    $('#stat_order_date').daterangepicker({
      locale: {
        format: 'YYYY/MM/DD'
      }
    })
    $('#stat_author_date').daterangepicker({
      locale: {
        format: 'YYYY/MM/DD'
      }
    })
    //Date range picker with time picker
    //Date range as a button
    $('#daterange-btn').daterangepicker(
      {
        ranges   : {
          'Today'       : [moment(), moment()],
          'Yesterday'   : [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
          'Last 7 Days' : [moment().subtract(6, 'days'), moment()],
          'Last 30 Days': [moment().subtract(29, 'days'), moment()],
          'This Month'  : [moment().startOf('month'), moment().endOf('month')],
          'Last Month'  : [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
        },
        startDate: moment().subtract(29, 'days'),
        endDate  : moment()
      },
      function (start, end) {
        $('#reportrange span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'))
      }
    )

    //Timepicker
    $('#timepicker').datetimepicker({
      format: 'LT'
    })

    //Bootstrap Duallistbox
    $('.duallistbox').bootstrapDualListbox()

    //Colorpicker
    $('.my-colorpicker1').colorpicker()
    //color picker with addon
    $('.my-colorpicker2').colorpicker()

    $('.my-colorpicker2').on('colorpickerChange', function(event) {
      $('.my-colorpicker2 .fa-square').css('color', event.color.toString());
    })

    $("input[data-bootstrap-switch]").each(function(){
      $(this).bootstrapSwitch('state', $(this).prop('checked'));
    })

  })
  // BS-Stepper Init
  document.addEventListener('DOMContentLoaded', function () {
    window.stepper = new Stepper(document.querySelector('.bs-stepper'))
  })

  // DropzoneJS Demo Code Start
  Dropzone.autoDiscover = false

  // Get the template HTML and remove it from the doumenthe template HTML and remove it from the doument
  var previewNode = document.querySelector("#template")
  previewNode.id = ""
  var previewTemplate = previewNode.parentNode.innerHTML
  previewNode.parentNode.removeChild(previewNode)

  var myDropzone = new Dropzone(document.body, { // Make the whole body a dropzone
    url: "/target-url", // Set the url
    thumbnailWidth: 80,
    thumbnailHeight: 80,
    parallelUploads: 20,
    previewTemplate: previewTemplate,
    autoQueue: false, // Make sure the files aren't queued until manually added
    previewsContainer: "#previews", // Define the container to display the previews
    clickable: ".fileinput-button" // Define the element that should be used as click trigger to select files.
  })

  myDropzone.on("addedfile", function(file) {
    // Hookup the start button
    file.previewElement.querySelector(".start").onclick = function() { myDropzone.enqueueFile(file) }
  })

  // Update the total progress bar
  myDropzone.on("totaluploadprogress", function(progress) {
    document.querySelector("#total-progress .progress-bar").style.width = progress + "%"
  })

  myDropzone.on("sending", function(file) {
    // Show the total progress bar when upload starts
    document.querySelector("#total-progress").style.opacity = "1"
    // And disable the start button
    file.previewElement.querySelector(".start").setAttribute("disabled", "disabled")
  })

  // Hide the total progress bar when nothing's uploading anymore
  myDropzone.on("queuecomplete", function(progress) {
    document.querySelector("#total-progress").style.opacity = "0"
  })

  // Setup the buttons for all transfers
  // The "add files" button doesn't need to be setup because the config
  // `clickable` has already been specified.
  document.querySelector("#actions .start").onclick = function() {
    myDropzone.enqueueFiles(myDropzone.getFilesWithStatus(Dropzone.ADDED))
  }
  document.querySelector("#actions .cancel").onclick = function() {
    myDropzone.removeAllFiles(true)
  }
  // DropzoneJS Demo Code End
</script>
</body>
</html>
