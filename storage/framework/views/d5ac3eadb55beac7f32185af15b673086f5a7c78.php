<!-- jQuery -->
<script src="<?php echo e(url('plugins/jquery/jquery.min.js')); ?>"></script>
<!-- jQuery UI 1.11.4 -->
<script src="<?php echo e(url('plugins/jquery-ui/jquery-ui.min.js')); ?>"></script>
<!-- Bootstrap 4 -->
<script src="<?php echo e(url('plugins/bootstrap/js/bootstrap.bundle.min.js')); ?>"></script>
<!-- ChartJS -->
<script src="<?php echo e(url('plugins/chart.js/Chart.min.js')); ?>"></script>
<link href="//maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
<link href='https://fonts.googleapis.com/css?family=Lato:100,300,400,700,900' rel='stylesheet' type='text/css'>
<!-- Sparkline -->
<script src="<?php echo e(url('plugins/sparklines/sparkline.js')); ?>"></script>
<!-- jQuery Knob Chart -->
<script src="<?php echo e(url('plugins/jquery-knob/jquery.knob.min.js')); ?>"></script>
<!-- daterangepicker -->
<script src="<?php echo e(url('plugins/moment/moment.min.js')); ?>"></script>
<script src="<?php echo e(url('plugins/daterangepicker/daterangepicker.js')); ?>"></script>
<script src="https://cdnjs.cloudflare.cogm/ajax/libs/bootstrap-datetimepicker/4.17.47/js/bootstrap-datetimepicker.min.js"></script>
<script src="<?php echo e(url('plugins/ekko-lightbox/ekko-lightbox.js')); ?>"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="<?php echo e(url('plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js')); ?>"></script>
<!-- Summernote -->
<script src="<?php echo e(url('plugins/summernote/summernote-bs4.min.js')); ?>"></script>
<!-- overlayScrollbars -->
<script src="<?php echo e(url('plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js')); ?>"></script>
<!-- AdminLTE App -->
<script src="<?php echo e(url('dist/js/adminlte.js')); ?>"></script>
<!-- DataTables -->
<script src="<?php echo e(url('plugins/datatables/jquery.dataTables.min.js')); ?>"></script>
<script src="<?php echo e(url('plugins/datatables-bs4/js/dataTables.bootstrap4.min.js')); ?>"></script>
<script src="<?php echo e(url('plugins/datatables-responsive/js/dataTables.responsive.min.js')); ?>"></script>
<script src="<?php echo e(url('plugins/datatables-responsive/js/responsive.bootstrap4.min.js')); ?>"></script>
<script src="<?php echo e(url('plugins/datatables-fixedheader/js/dataTables.fixedHeader.min.js')); ?>" type="text/javascript"></script>
<script src="<?php echo e(url('plugins/datatables-buttons/js/dataTables.buttons.min.js')); ?>"></script>
<script src="<?php echo e(url('plugins/datatables-buttons/js/buttons.bootstrap4.min.js')); ?>"></script>
<script src="<?php echo e(url('plugins/jszip/jszip.min.js')); ?>"></script>
<script src="<?php echo e(url('plugins/pdfmake/pdfmake.min.js')); ?>"></script>
<script src="<?php echo e(url('plugins/pdfmake/vfs_fonts.js')); ?>"></script>
<script src="<?php echo e(url('plugins/datatables-buttons/js/buttons.html5.min.js')); ?>"></script>
<script src="<?php echo e(url('plugins/datatables-buttons/js/buttons.print.min.js')); ?>"></script>
<script src="<?php echo e(url('plugins/datatables-buttons/js/buttons.colVis.min.js')); ?>"></script>
<script src="<?php echo e(url('js/admin/disableInspectElecment.js')); ?>"></script>
<script src="<?php echo e(url('js/admin/preventbackbutton.js')); ?>"></script>
<!-- Toastr-->
<script src="<?php echo e(url('js/toastr.min.js')); ?>"></script>
<!-- Validate -->
<script src="<?php echo e(url('plugins/jquery-validation/jquery.validate.min.js')); ?>"></script>
<script src="<?php echo e(url('plugins/print/jQuery.print.min.js')); ?>"></script>
<script src="<?php echo e(url('js/jquery.classyqr.min.js')); ?>"></script>
<script src="<?php echo e(url('js/select2.js')); ?>"></script>
<script src="<?php echo e(url('plugins/sweet-alert/sweetalert.min.js')); ?>"></script>
<script src="<?php echo e(url('js/admin/topbar.js')); ?>"></script>
<script src="<?php echo e(url('js/admin/sample.js')); ?>"></script>
<!-- Scripts Translation -->
<script>
  var translations=`<?php echo session("trans"); ?>`;
  function trans(key)
  {
    var trans=JSON.parse(translations);
    return (trans[key]!=null?trans[key]:key);
  }
</script>
<!-- Main dashboard -->
<?php if(auth()->guard('admin')->check()): ?>
  <script src="<?php echo e(url('js/admin/main.js')); ?>"></script>
<?php else: ?> 
  <script src="<?php echo e(url('js/patient/main.js')); ?>"></script>
<?php endif; ?>
<!-- Flash messages -->
<script>
  <?php if(session()->has('success')): ?>
    toastr_success(trans("<?php echo e(Session::get('success')); ?>"));
  <?php endif; ?>
  <?php if(Session()->has('failed')||session()->has('errors')): ?>
    toastr_error(trans("<?php echo e(Session::get('failed')); ?>"));
  <?php endif; ?>
</script>
<?php /**PATH C:\laragon\www\Interweb\resources\views/partials/scripts.blade.php ENDPATH**/ ?>