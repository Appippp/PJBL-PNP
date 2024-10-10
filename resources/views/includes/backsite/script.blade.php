<!-- jQuery -->
<script src="{{ asset('assets/backsite/plugins/jQuery/jQuery-2.1.4.min.js') }}"></script>

<!-- Bootstrap -->
<script src="{{ asset('assets/backsite/bootstrap/js/bootstrap.min.js') }}"></script>

<!-- Select2 -->
<script src="{{ asset('assets/backsite/plugins/select2/select2.full.min.js') }}"></script>

<!-- DataTables -->
<script src="{{ asset('assets/backsite/plugins/datatables/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('assets/backsite/plugins/datatables/dataTables.bootstrap.min.js') }}"></script>

<!-- SlimScroll -->
<script src="{{ asset('assets/backsite/plugins/slimScroll/jquery.slimscroll.min.js') }}"></script>

<!-- FastClick -->
<script src="{{ asset('assets/backsite/plugins/fastclick/fastclick.min.js') }}"></script>

<!-- AdminLTE App -->
<script src="{{ asset('assets/backsite/dist/js/app.min.js') }}"></script>
<!-- page script -->
<script>
    $(function() {

         //Initialize Select2 Elements
         $(".select2").select2();

        $("#example1").DataTable();
        $('#example2').DataTable({
            "paging": false,
            "lengthChange": false,
            "searching": false,
            "ordering": false,
            "info": false,
            "autoWidth": false
        });

    });
</script>
