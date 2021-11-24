<footer class="main-footer">
    <strong>Copyright &copy; 2014-2021 <a href="#">HCMUT</a>.</strong>
    All rights reserved.
    <div class="float-right d-none d-sm-inline-block">
      <b>Version</b> 1.0.0
    </div>
  </footer>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="<?= site_url("assets/adminlte/plugins/jquery/jquery.min.js"); ?>"></script>
<!-- jQuery UI 1.11.4 -->
<script src="<?= site_url("assets/adminlte/plugins/jquery-ui/jquery-ui.min.js"); ?>"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Bootstrap 4 -->
<script src="<?= site_url("assets/adminlte/plugins/bootstrap/js/bootstrap.bundle.min.js"); ?>"></script>
<!-- ChartJS -->
<script src="<?= site_url("assets/adminlte/plugins/chart.js/Chart.min.js"); ?>"></script>
<!-- Sparkline -->
<script src="<?= site_url("assets/adminlte/plugins/sparklines/sparkline.js"); ?>"></script>
<!-- JQVMap -->
<script src="<?= site_url("assets/adminlte/plugins/jqvmap/jquery.vmap.min.js"); ?>"></script>
<script src="<?= site_url("assets/adminlte/plugins/jqvmap/maps/jquery.vmap.usa.js"); ?>"></script>
<!-- jQuery Knob Chart -->
<script src="<?= site_url("assets/adminlte/plugins/jquery-knob/jquery.knob.min.js"); ?>"></script>
<!-- daterangepicker -->
<script src="<?= site_url("assets/adminlte/plugins/moment/moment.min.js"); ?>"></script>
<script src="<?= site_url("assets/adminlte/plugins/daterangepicker/daterangepicker.js"); ?>"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="<?= site_url("assets/adminlte/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"); ?>"></script>
<!-- Summernote -->
<script src="<?= site_url("assets/adminlte/plugins/summernote/summernote-bs4.min.js"); ?>"></script>
<!-- overlayScrollbars -->
<script src="<?= site_url("assets/adminlte/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"); ?>"></script>
<!-- AdminLTE App -->
<script src="<?= site_url("assets/adminlte/dist/js/adminlte.js"); ?>"></script>
<!-- AdminLTE for demo purposes -->
<script src="<?= site_url("assets/adminlte/dist/js/demo.js"); ?>"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="<?= site_url("assets/adminlte/dist/js/pages/dashboard.js"); ?>"></script>

<script>
$(document).ready(function() {
    $('.nav-item .nav-treeview').each(function(e) {
        if ($.trim($(this).html()).length == 0) {
            $(this).closest('.nav-item').remove();
        }
    });
    $('.nav-header').each(function() {
        if (!$(this).next().hasClass('nav-item')) {
            $(this).remove();
        }
    });
    $('.nav-link.active').parents('.nav-item').last().addClass('menu-open');
});
</script>
</body>
</html>