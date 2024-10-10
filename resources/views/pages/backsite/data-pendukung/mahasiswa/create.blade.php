@extends('layouts.main')

@section('title', 'Tambah Data')

@section('content')

    <!-- Breadcrumb -->
    <section class="content-header">
        <h1>
            Mahasiswa
            <small>Data Mahasiswa</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="{{ route('backsite.dashboard.index') }}"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Tambah Data Mahasiswa</li>
        </ol>
    </section>

    <section class="content">
        <div class="box">
            <div class="box-header with-border">
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

            <!-- Form -->
            <form action="{{ route('backsite.mahasiswa.store') }}" method="POST">
                @csrf
                <div class="box-body">

                    <div class="form-group row">
                        <label for="nim" class="col-sm-4 col-form-label text-right">NIM <code style="color:red;">required</code></label>
                        <div class="col-sm-6">
                            <input type="text" class="form-control" id="nim" name="nim" placeholder="Masukkan Nomor Induk Mahasiswa" required>
                            @error('nim')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="nama_mahasiswa" class="col-sm-4 col-form-label text-right">Nama Lengkap <code style="color:red;">required</code></label>
                        <div class="col-sm-6">
                            <input type="text" class="form-control" id="nama_mahasiswa" name="nama_mahasiswa" placeholder="Masukkan Nama Lengkap Mahasiswa" required>
                            @error('nama_mahasiswa')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="prodi_id" class="col-sm-4 col-form-label text-right">Prodi <code style="color:red;">required</code></label>
                        <div class="col-sm-6">
                            <select name="prodi_id" id="prodi_id" class="form-control select2" required>
                                <option value="" disabled selected>-- Pilih Prodi --</option>
                                @foreach ($prodi as $prodi_item)
                                    <option value="{{ $prodi_item->id }}">{{ $prodi_item->nama_prodi }}</option>
                                @endforeach
                            </select>
                            @error('prodi_id')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="tahun_masuk" class="col-sm-4 col-form-label text-right">Angkatan <code style="color:red;">required</code></label>
                        <div class="col-sm-6">
                            <input type="number" class="form-control" id="tahun_masuk" name="tahun_masuk" placeholder="2024" required>
                            @error('tahun_masuk')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="jk" class="col-sm-4 col-form-label text-right">Jenis Kelamin <code style="color:red;">required</code></label>
                        <div class="col-sm-6">
                            <select name="jk" id="jk" class="form-control" required>
                                <option value="" disabled selected>-- Pilih Jenis Kelamin --</option>
                                <option value="1">Laki-laki</option>
                                <option value="2">Perempuan</option>
                            </select>
                            @error('jk')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="no_telp" class="col-sm-4 col-form-label text-right">No Telp/WA <code style="color:rgb(16, 232, 45);">optional</code></label>
                        <div class="col-sm-6">
                            <input type="text" class="form-control" id="no_telp" name="no_telp" placeholder="Masukkan Nomor Telpon / Whatsapp">
                            @error('no_telp')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="alamat" class="col-sm-4 col-form-label text-right">Alamat  <code style="color:rgb(16, 232, 45);">optional</code></label>
                        <div class="col-sm-6">
                            <textarea name="alamat" id="alamat" class="form-control" cols="30" rows="2"></textarea>
                            @error('alamat')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="user_id" class="col-sm-4 col-form-label text-right">Akun Pengguna <code style="color:red;">required</code></label>
                        <div class="col-sm-6">
                            <select name="user_id" id="user_id" class="form-control select2" required>
                                <option value="" disabled selected>-- Pilih Akun --</option>
                                @foreach ($user as $user_item)
                                    <option value="{{ $user_item->id }}">{{ $user_item->username }}</option>
                                @endforeach
                            </select>
                            <small style="color:red">* Pilih akun berdasarkan NIM</small>
                            @error('user_id')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                    </div>

                </div><!-- /.box-body -->

                <div class="box-footer d-flex justify-content-between">
                    <a href="{{ route('backsite.mahasiswa.index') }}" class="btn btn-default btn-flat">
                        <i class="fa fa-arrow-left"></i> Kembali
                    </a>
                    <button type="submit" class="btn btn-success btn-flat">
                        <i class="fa fa-save"></i> Simpan
                    </button>
                </div><!-- /.box-footer-->
            </form>
        </div>
    </section>

@endsection
