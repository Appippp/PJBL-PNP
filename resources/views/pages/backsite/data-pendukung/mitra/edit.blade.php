@extends('layouts.main')

@section('title', 'Edit Prodi')

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
            <div class="box-header with-border ">
                <h3 class="box-title"><b>TAMBAH DATA</b></h3>
                <div class="box-tools pull-right">
                    <button class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse">
                        <i class="fa fa-minus"></i>
                    </button>
                    <button class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove">
                        <i class="fa fa-times"></i>
                    </button>
                </div>
            </div>

            <form action="{{ route('backsite.mitra.update', $mitra->id) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="box-body">

                    <div class="d-flex justify-content-center">

                        <!-- nama mitra -->
                        <div class="form-group row">
                            <label for="nama_mitra" class="col-sm-4 form-label text-right">Nama Mitra <code
                                    style="color:red;">required</code></label>
                            <div class="col-sm-6">
                                <input type="text" class="form-control" id="nama_mitra" name="nama_mitra"
                                    value="{{ old('nama_mitra', $mitra->nama_mitra) }}">
                                @if ($errors->has('nama_mitra'))
                                    <p style="font-style: bold; color: red;">{{ $errors->first('nama_mitra') }}</p>
                                @endif
                            </div>
                        </div>

                        <!-- alamat -->
                        <div class="form-group row">
                            <label for="alamat" class="col-sm-4 col-form-label text-right">Alamat <code
                                    style="color:red;">required</code></label>
                            <div class="col-sm-6">
                                <textarea class="form-control" name="alamat" id="alamat" cols="30" rows="3">{{ old('alamat', $mitra->alamat) }}</textarea>
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
                                    value="{{ old('kontak', $mitra->kontak) }}">
                                @if ($errors->has('kontak'))
                                    <p style="font-style: bold; color: red;">{{ $errors->first('kontak') }}</p>
                                @endif
                            </div>
                        </div>

                    </div>
                </div><!-- /.box-body -->
                <div class="box-footer"> <!-- Buttons aligned to the right -->
                    <div class="pull-right">
                        <button type="submit" class="btn btn-success btn-flat" style="width: 120px;">
                            <i class="fa fa-save"></i> Simpan
                        </button>
                        <a href="{{ route('backsite.mitra.index') }}" class="btn btn-default btn-flat"
                            style="width: 120px; margin-right: 10px;">
                            <i class="fa fa-arrow-left"></i>   Kembali
                        </a>

                    </div>
                </div>

            </form>

        </div>
    </section>
@endsection
