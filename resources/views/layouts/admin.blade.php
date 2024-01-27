<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Dashboard 2</title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="{{asset('public')}}/plugins/fontawesome-free/css/all.min.css">
    <!-- overlayScrollbars -->
    <link rel="stylesheet" href="{{asset('public')}}/plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{asset('public')}}/dist/css/adminlte.min.css">
    <!-- toastr style -->
    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css">
    <link rel="stylesheet" href="{{asset('public')}}/plugins/toastr/toastr.css">
    <link rel="stylesheet" href="{{asset('public')}}/plugins/sweetalert2.min.css">
    <!-- DataTables -->
    <link rel="stylesheet" href="{{asset('public')}}/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="{{asset('public')}}/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
    <link rel="stylesheet" href="{{asset('public')}}/plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
    <!--- summernote --->
    <link rel="stylesheet" href="{{asset('public')}}/plugins/summernote/summernote-bs4.min.css">

</head>

<body>
    <div class="hold-transition dark-mode sidebar-mini layout-fixed layout-navbar-fixed layout-footer-fixed">
        <div class="wrapper">
            <!-- Navbar -->
            @include('layouts.admin_partial.navbar')

            <!-- Main Sidebar Container -->
            @include('layouts.admin_partial.sidebar')

            <!-- Content Wrapper. Contains page content -->
            <main class="py-4">
                @yield('admin_content')
            </main>
            <!-- /.content-wrapper -->

            <!-- Control Sidebar -->
            <aside class="control-sidebar control-sidebar-dark">
                <!-- Control sidebar content goes here -->
            </aside>
            <!-- /.control-sidebar -->

            <!-- Main Footer -->
            <footer class="main-footer">
                <strong>Copyright &copy; 2014-2021 <a href="https://adminlte.io">AdminLTE.io</a>.</strong>
                All rights reserved.
                <div class="float-right d-none d-sm-inline-block">
                    <b>Version</b> 3.2.0
                </div>
            </footer>
        </div>
        <!-- ./wrapper -->
    </div>
    <!-- REQUIRED SCRIPTS -->
    <!-- jQuery -->
    <script src="{{asset('public')}}/plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap -->
    <script src="{{asset('public')}}/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- overlayScrollbars -->
    <script src="{{asset('public')}}/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
    <!-- AdminLTE App -->
    <script src="{{asset('public')}}/dist/js/adminlte.js"></script>
    <!-- PAGE PLUGINS -->
    <!-- jQuery Mapael -->
    <script src="{{asset('public')}}/plugins/jquery-mousewheel/jquery.mousewheel.js"></script>
    <script src="{{asset('public')}}/plugins/raphael/raphael.min.js"></script>
    <script src="{{asset('public')}}/plugins/jquery-mapael/jquery.mapael.min.js"></script>
    <script src="{{asset('public')}}/plugins/jquery-mapael/maps/usa_states.min.js"></script>
    <!-- ChartJS -->
    <script src="{{asset('public')}}/plugins/chart.js/Chart.min.js"></script>
    <!-- sweetalert -->
    <script src="{{asset('public')}}/plugins/sweetalert2/sweetalert2.all.min.js"></script>
    <!-- DataTables  & Plugins -->
    <script src="{{asset('public')}}/plugins/datatables/jquery.dataTables.min.js"></script>
    <script src="{{asset('public')}}/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
    <script src="{{asset('public')}}/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
    <script src="{{asset('public')}}/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
    <script src="{{asset('public')}}/plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
    <script src="{{asset('public')}}/plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
    <script src="{{asset('public')}}/plugins/jszip/jszip.min.js"></script>
    <script src="{{asset('public')}}/plugins/pdfmake/pdfmake.min.js"></script>
    <script src="{{asset('public')}}/plugins/pdfmake/vfs_fonts.js"></script>
    <script src="{{asset('public')}}/plugins/datatables-buttons/js/buttons.html5.min.js"></script>
    <script src="{{asset('public')}}/plugins/datatables-buttons/js/buttons.print.min.js"></script>
    <script src="{{asset('public')}}/plugins/datatables-buttons/js/buttons.colVis.min.js"></script>
    <!-- Summernote -->
    <script src="{{asset('public')}}/plugins/summernote/summernote-bs4.min.js"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="{{asset('public')}}/dist/js/demo.js"></script>
    <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
    <script src="{{asset('public')}}/dist/js/pages/dashboard2.js"></script>
	<script src="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
    <script>
        $(document).on("click", "#delete", function(e) {
            e.preventDefault();
            var link = $(this).attr("href");
            swal({
                    title: "Are you Want to delete?",
                    text: "Once Delete, This will be Permanently Delete!",
                    icon: "warning",
                    buttons: true,
                    dangerMode: true,
                })
                .then((willDelete) => {
                    if (willDelete) {
                        window.location.href = link;
                    } else {
                        swal("Safe Data!");
                    }
                });
        });
    </script>
    <!-- Page specific script -->
    <script>
        $(function() {
            $("#example1").DataTable({
                "responsive": true,
                "lengthChange": false,
                "autoWidth": false,
                "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
            }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
            $('#example2').DataTable({
                "paging": true,
                "lengthChange": false,
                "searching": false,
                "ordering": true,
                "info": true,
                "autoWidth": false,
                "responsive": true,
            });
        });
    </script>
    <!-- Summernote -->
    <script>
        $(function(){
            $('.textarea').summernote();
        })
    </script>
</body>

</html>