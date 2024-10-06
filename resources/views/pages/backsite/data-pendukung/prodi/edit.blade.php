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

            <form action="{{ route('backsite.prodi.update', $prodi->id) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="box-body">
                    <div class="d-flex justify-content-center">
                        <div class="form-group row">
                            <label for="kode-prodi" class="col-sm-4 col-form-label text-right ">Kode Prodi
                                <code style="color:red;">required</code></label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" id="kode_prodi" name="kode_prodi"
                                    value="{{ $prodi->kode_prodi }}" required>
                            </div>
                            @error('kode_prodi')
                                <span class="invalid-feedback" role="alert">
                                    <small class="text-danger">{{ $message }}</small>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group row">
                            <label for="nama-prodi" class="col-sm-4 col-form-label text-right ">Nama Prodi
                                <code style="color:red;">required</code></label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" id="nama_prodi" name="nama_prodi"
                                    value="{{ $prodi->nama_prodi }}" required>
                            </div>
                            @error('nama_prodi')
                                <span class="invalid-feedback" role="alert">
                                    <small class="text-danger">{{ $message }}</small>
                                </span>
                            @enderror
                        </div>
                    </div>
                </div><!-- /.box-body -->
                <div class="box-footer d-flex justify-content-between"> <!-- Buttons aligned -->
                    <a href="{{ route('backsite.prodi.index') }}" class="btn btn-default btn-flat"
                        style="width: 120px;"><i class="fa fa-arrow-left"></i> Kembali</a>
                    <button type="submit" class="btn btn-success btn-flat" style="width: 120px;"><i
                            class="fa fa-save"></i> Simpan</button>
                </div>
            </form>
        </div>
    </section>
@endsection
