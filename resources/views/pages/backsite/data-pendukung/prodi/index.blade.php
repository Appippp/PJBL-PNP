@extends('layouts.main')

@section('title', 'Data Prodi')

@push('after-style')
<!-- DataTables -->
<link rel="stylesheet" href="{{ asset('assets/backsite/plugins/datatables/dataTables.bootstrap.css') }}">
@endpush

@section('content')

    <section class="content-header">
        <h1>
            Prodi
            <small>Data Prodi</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="{{ route('backsite.dashboard.index') }}"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Data Prodi</li>
        </ol>
    </section>

    <section class="content">
        <div class="box">
            <div class="box-header">
                <h3 class="box-title">LIST PRODI</h3>
            </div><!-- /.box-header -->
            <div class="box-body">
                <table id="example1" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Kode Prodi</th>
                            <th>Nama Prodi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td></td>
                        </tr>
                    </tbody>

                </table>
            </div><!-- /.box-body -->
        </div><!-- /.box -->
    </section>

@endsection

@push('after-script')
    <!-- jQuery 2.1.4 -->
    <script src="{{ asset('assets/backsite/plugins/jQuery/jQuery-2.1.4.min.js') }}"></script>
    <!-- Bootstrap 3.3.5 -->
    <script src="{{ asset('assets/backsite/bootstrap/js/bootstrap.min.js') }}"></script>
    <!-- DataTables -->
    <script src="{{ asset('assets/backsite/plugins/datatables/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('assets/backsite/plugins/datatables/dataTables.bootstrap.min.js') }}"></script>
    <!-- AdminLTE App -->
    <script src="{{ asset('assets/backsite/dist/js/app.min.js') }}"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="{{ asset('assets/backsite/dist/js/demo.js') }}"></script>
    <!-- page script -->
    <script>
      $(function () {
        $("#example1").DataTable();
        $('#example2').DataTable({
          "paging": true,
          "lengthChange": false,
          "searching": false,
          "ordering": true,
          "info": true,
          "autoWidth": false
        });
      });
    </script>
@endpush
