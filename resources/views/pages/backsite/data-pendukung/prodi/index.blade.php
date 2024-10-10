@extends('layouts.main')

@section('title', 'Data Prodi')


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

        {{-- @can('prodi-create') --}}
        <div class="box collapsed-box">
            <div class="box-header with-border ">
                <h3 class="box-title">TAMBAH DATA</h3>
                <div class="box-tools pull-right">
                    <button class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse">
                        <i class="fa fa-minus"></i>
                    </button>
                    <button class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove">
                        <i class="fa fa-times"></i>
                    </button>
                </div>
            </div>

            <form action="{{ route('backsite.prodi.store') }}" method="POST">
                @csrf
                <div class="box-body">

                    <div class="d-flex justify-content-center">
                        <div class="form-group row">
                            <label for="kode-prodi" class="col-sm-4 form-label text-right">Kode Prodi <code
                                    style="color:red;">required</code></label>
                            <div class="col-sm-6">
                                <input type="text" class="form-control" id="kode_prodi" name="kode_prodi" required>
                            </div>
                            @error('kode_prodi')
                                <span class="invalid-feedback" role="alert">
                                    <small class="text-danger">{{ $message }}</small>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group row">
                            <label for="nama-prodi" class="col-sm-4 col-form-label text-right">Nama Prodi <code
                                    style="color:red;">required</code></label>
                            <div class="col-sm-6">
                                <input type="text" class="form-control" id="nama_prodi" name="nama_prodi" required>
                            </div>
                            @error('nama_prodi')
                                <span class="invalid-feedback" role="alert">
                                    <small class="text-danger">{{ $message }}</small>
                                </span>
                            @enderror
                        </div>
                        <div class="text-center">
                        </div>

                    </div>
                </div><!-- /.box-body -->
                <div class="box-footer">
                    <button type="submit" class="btn btn-success btn-flat pull-right"> <i class="fa fa-save"></i>
                        Simpan</button>
                </div><!-- /.box-footer-->
            </form>
        </div>
        {{-- @endcan --}}

        {{-- @can('prodi-table') --}}
            <div class="box">
                <div class="box-header">
                    <h3 class="box-title">LIST PRODI</h3>
                </div>
                <div class="box-body">
                    <table id="example1" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Kode Prodi</th>
                                <th>Nama Prodi</th>
                                <th class="text-center">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($prodi as $key => $prodi_item)
                                <tr data-entry-id="{{ $prodi_item->id }}">
                                    <td>{{ $loop->iteration }}</td>
                                    </td>
                                    <td>{{ $prodi_item->kode_prodi ?? '' }}</td>
                                    <td>{{ $prodi_item->nama_prodi ?? '' }}</td>
                                    <td class="text-center">

                                        {{-- @can('prodi-edit') --}}
                                            <a href="{{ route('backsite.prodi.edit', $prodi_item->id) }}" class="btn btn-sm btn-warning"><i class="fa fa-edit"></i></a>
                                        {{-- @endcan --}}

                                        {{-- @can('prodi-delete') --}}
                                        <form action="{{ route('backsite.prodi.destroy', $prodi_item->id) }}" method="POST"
                                            onsubmit="return confirm('Apakah Anda yakin ingin menghapus data ini?');"
                                            style="display: inline;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-sm btn-danger">
                                                <i class="fa fa-trash"></i>
                                            </button>
                                        </form>
                                        {{-- @endcan --}}
                                    </td>
                                </tr>
                            @empty
                               <!-- tidak ada data -->
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        {{-- @endcan --}}


    </section>


@endsection
