@extends('layouts.main')

@section('title', 'Data Mitra')


@section('content')

    <section class="content-header">
        <h1>
            Mitra
            <small>Data Mitra</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="{{ route('backsite.dashboard.index') }}"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Data Mitra</li>
        </ol>
    </section>

    <section class="content">

        {{-- @can('mitra-create') --}}
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

            <form action="{{ route('backsite.mitra.store') }}" method="POST">
                @csrf
                <div class="box-body">

                    <div class="d-flex justify-content-center">

                        <!-- nama mitra -->
                        <div class="form-group row">
                            <label for="kode-prodi" class="col-sm-4 form-label text-right">Nama Mitra <code
                                    style="color:red;">required</code></label>
                            <div class="col-sm-6">
                                <input type="text" class="form-control" id="nama_mitra" name="nama_mitra"
                                    value="{{ old('nama_mitra') }}">
                                @if ($errors->has('nama_mitra'))
                                    <p style="font-style: bold; color: red;">{{ $errors->first('nama_mitra') }}</p>
                                @endif
                            </div>

                        </div>

                        <!-- alamat -->
                        <div class="form-group row">
                            <label for="nama-prodi" class="col-sm-4 col-form-label text-right">Alamat <code
                                    style="color:red;">required</code></label>
                            <div class="col-sm-6">
                                <textarea class="form-control" name="alamat" id="alamat" cols="30" rows="3">{{ old('alamat') }}</textarea>
                                @if ($errors->has('alamat'))
                                    <p style="font-style: bold; color: red;">{{ $errors->first('alamat') }}</p>
                                @endif
                            </div>
                        </div>

                        <!-- kontak -->
                        <div class="form-group row">
                            <label for="kontak" class="col-sm-4 form-label text-right">Kontak <code
                                    style="color:red;">required</code></label>
                            <div class="col-sm-6">
                                <input type="text" class="form-control" id="kontak" name="kontak"
                                    value="{{ old('kontak') }}">
                                @if ($errors->has('kontak'))
                                    <p style="font-style: bold; color: red;">{{ $errors->first('kontak') }}</p>
                                @endif
                            </div>
                        </div>

                    </div>
                </div><!-- /.box-body -->
                <div class="box-footer">
                    <button type="submit" class="btn btn-success btn-flat pull-right">
                        <i class="fa fa-save"></i> Simpan
                    </button>
                </div><!-- /.box-footer-->
            </form>
        </div>
        {{-- @endcan --}}

        {{-- @can('mitra-table') --}}
        <div class="box">
            <div class="box-header">
                <h3 class="box-title">LIST MITRA</h3>
            </div>
            <div class="box-body">
                <table id="example1" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama Perusahaan</th>
                            <th>Alamat</th>
                            <th>Kontak</th>
                            <th class="text-center">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($mitra as $key => $mitra_item)
                            <tr data-entry-id="{{ $mitra_item->id }}">
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $mitra_item->nama_mitra ?? '' }}</td>
                                <td class="text-justify" width="30%">{{ $mitra_item->alamat ?? '' }}</td>
                                <td>{{ $mitra_item->kontak ?? '' }}</td>
                                <td class="text-center">

                                    {{-- @can('mitra-edit') --}}
                                    <a href="{{ route('backsite.mitra.edit', $mitra_item->id) }}"
                                        class="btn btn-sm btn-warning"><i class="fa fa-edit"></i></a>
                                    {{-- @endcan --}}

                                    {{-- @can('mitra-delete') --}}
                                    <form action="{{ route('backsite.mitra.destroy', $mitra_item->id) }}" method="POST"
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
                            <!-- data empty -->
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
        {{-- @endcan --}}


    </section>


@endsection
