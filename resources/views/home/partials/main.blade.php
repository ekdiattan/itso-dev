<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Diskominfo Jabar | {{ $title }}</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <link rel="stylesheet" href="/AdminLTE-3.2.0/plugins/fontawesome-free/css/all.min.css">
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <link rel="stylesheet" href="/AdminLTE-3.2.0/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
    <link rel="stylesheet" href="/AdminLTE-3.2.0/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
    <link rel="stylesheet" href="/AdminLTE-3.2.0/plugins/jqvmap/jqvmap.min.css">
    <link rel="stylesheet" href="/AdminLTE-3.2.0/dist/css/adminlte.min.css">
    <link rel="stylesheet" href="/AdminLTE-3.2.0/plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
    <link rel="stylesheet" href="/AdminLTE-3.2.0/plugins/daterangepicker/daterangepicker.css">
    <link rel="stylesheet" href="/AdminLTE-3.2.0/plugins/summernote/summernote-bs4.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/dataTables.bootstrap5.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.3.6/css/buttons.bootstrap5.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/colreorder/1.6.2/css/colReorder.bootstrap5.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.4.1/css/responsive.dataTables.min.css">
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/css/bootstrap-select.min.css">
    <link rel="shortcut icon" href="{{ asset('assets/images/jabar.png') }}">
    @stack('css')
  </head>
<body>
<div class="wrapper">
  @include('home.partials._sidebar')
  @include('home.partials._navbar')
  <div class="container-fluid">
    <div class="container-scroller">
      <div class="container-fluid page-body-wrapper">
        <div class="main-panel">
            <div class="content-wrapper p-3">
              <section>
                @yield('container')
              </section>
            </div>
          </div>
      </div>
    </div>
</div>
</div>

<script src="/AdminLTE-3.2.0/plugins/jquery/jquery.min.js"></script>
<script src="/AdminLTE-3.2.0/plugins/jquery-ui/jquery-ui.min.js"></script>
<script src="/AdminLTE-3.2.0/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="/AdminLTE-3.2.0/plugins/chart.js/Chart.min.js"></script>
<script src="/AdminLTE-3.2.0/plugins/sparklines/sparkline.js"></script>
<script src="/AdminLTE-3.2.0/plugins/jqvmap/jquery.vmap.min.js"></script>
<script src="/AdminLTE-3.2.0/plugins/jqvmap/maps/jquery.vmap.usa.js"></script>
<script src="/AdminLTE-3.2.0/plugins/jquery-knob/jquery.knob.min.js"></script>
<script src="/AdminLTE-3.2.0/plugins/moment/moment.min.js"></script>
<script src="/AdminLTE-3.2.0/plugins/daterangepicker/daterangepicker.js"></script>
<script src="/AdminLTE-3.2.0/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
<script src="/AdminLTE-3.2.0/plugins/summernote/summernote-bs4.min.js"></script>
<script src="/AdminLTE-3.2.0/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<script src="/AdminLTE-3.2.0/dist/js/adminlte.js"></script>
<script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.13.4/js/dataTables.bootstrap5.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.3.6/js/dataTables.buttons.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.3.6/js/buttons.bootstrap5.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.3.6/js/buttons.colVis.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.3.6/js/buttons.html5.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.3.6/js/buttons.print.min.js"></script>
<script src="https://cdn.datatables.net/colreorder/1.6.2/js/dataTables.colReorder.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/js/bootstrap-select.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/js/i18n/defaults-*.min.js"></script>
@stack('scripts')

<script>
  $(document).ready(function () {
    $('#dataTable').DataTable({
      "paging": true,
      "lengthChange": true,
      "searching": true,
      "ordering": true,
      "info": true,
      "autoWidth": false,
      "responsive": true,
    }).buttons().container().appendTo($('#dataTable_wrapper .col-md-6:eq(0)'));  
    $('#dataTable2').DataTable({
      "paging": true,
      "lengthChange": true,
      "searching": true,
      "ordering": true,
      "info": true,
      "autoWidth": false,
      "responsive": true,
    }).buttons().container().appendTo($('#dataTable2_wrapper .col-md-6:eq(0)'));
  });
</script>
</body>
</html>

<style>
  .table thead tr th {
      text-align: center;
  }
  tbody tr td {
    text-align: center;
  }
</style>