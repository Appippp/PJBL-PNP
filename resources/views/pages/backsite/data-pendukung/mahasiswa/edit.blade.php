@extends('layouts.main')

@section('title', 'Edit Mahasiswa')

@section('content')

    <!-- Breadcrumb -->
    <section class="content-header">
        <h1>
            Mahasiswa
            <small>Data Mahasiswa</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="{{ route('backsite.dashboard.index') }}"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Edit Data Mahasiswa</li>
        </ol>
    </section>

    <section class="content">
        <!-- Edit Mahasiswa -->
        <div class="box">
            <div class="box-header with-border">
                <h3 class="box-title">EDIT DATA MAHASISWA</h3>
                <div class="box-tools pull-right">
                    <button class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse">
                        <i class="fa fa-minus"></i>
                    </button>
                    <button class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove">
                        <i class="fa fa-times"></i>
                    </button>
                </div>
            </div>

            <form action="{{ route('backsite.mahasiswa.update', [$mahasiswa->id]) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="box-body">
                    <div class="d-flex justify-content-center">

                        <!-- NIM -->
                        <div class="form-group row">
                            <label for="nim" class="col-sm-4 col-form-label text-right">NIM <code
                                    style="color:red;">required</code></label>
                            <div class="col-sm-6">
                                <input type="text" class="form-control" id="nim" name="nim"
                                    placeholder="Masukkan Nomor Induk Mahasiswa" value="{{ old('nim', $mahasiswa->nim) }}"
                                    required>
                            </div>
                            @error('nim')
                                <span class="invalid-feedback" role="alert">
                                    <small class="text-danger">{{ $message }}</small>
                                </span>
                            @enderror
                        </div>

                        <!-- Nama Mahasiswa -->
                        <div class="form-group row">
                            <label for="nama_mahasiswa" class="col-sm-4 col-form-label text-right">NAMA MAHASISWA <code
                                    style="color:red;">required</code></label>
                            <div class="col-sm-6">
                                <input type="text" class="form-control" id="nama_mahasiswa" name="nama_mahasiswa"
                                    placeholder="Masukkan Nama Lengkap Mahasiswa"
                                    value="{{ old('nama_mahasiswa', $mahasiswa->nama_mahasiswa) }}" required>
                            </div>
                            @error('nama_mahasiswa')
                                <span class="invalid-feedback" role="alert">
                                    <small class="text-danger">{{ $message }}</small>
                                </span>
                            @enderror
                        </div>

                        <!-- Prodi -->
                        <div class="form-group row">
                            <label for="prodi_id" class="col-sm-4 form-label text-right">PRODI <code
                                    style="color:red;">required</code></label>
                            <div class="col-sm-6">
                                <select name="prodi_id" id="prodi_id" class="form-control select2" required>
                                    <option value="" disabled selected>-- PILIH PRODI --</option>
                                    @foreach ($prodi as $prodi_item)
                                        <option value="{{ $prodi_item->id }}"
                                            {{ $mahasiswa->prodi_id == $prodi_item->id ? 'selected' : '' }}>
                                            {{ $prodi_item->nama_prodi }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            @error('prodi_id')
                                <span class="invalid-feedback" role="alert">
                                    <small class="text-danger">{{ $message }}</small>
                                </span>
                            @enderror
                        </div>

                        <!-- Tahun Masuk -->
                        <div class="form-group row">
                            <label for="tahun_masuk" class="col-sm-4 col-form-label text-right">ANGKATAN <code
                                    style="color:red;">required</code></label>
                            <div class="col-sm-6">
                                <input type="number" class="form-control" id="tahun_masuk" name="tahun_masuk"
                                    placeholder="2024" value="{{ old('tahun_masuk', $mahasiswa->tahun_masuk) }}" required>
                            </div>
                            @error('tahun_masuk')
                                <span class="invalid-feedback" role="alert">
                                    <small class="text-danger">{{ $message }}</small>
                                </span>
                            @enderror
                        </div>

                        <!-- Jenis Kelamin -->
                        <div class="form-group row">
                            <label for="jk" class="col-sm-4 col-form-label text-right">JENIS KELAMIN <code
                                    style="color:red;">required</code></label>
                            <div class="col-sm-6">
                                <select name="jk" id="jk" class="form-control" required>
                                    <option value="" disabled>-- PILIH JENIS KELAMIN --</option>
                                    <option value="1" {{ $mahasiswa->jk == 1 ? 'selected' : '' }}>Laki-laki</option>
                                    <option value="2" {{ $mahasiswa->jk == 2 ? 'selected' : '' }}>Perempuan</option>
                                </select>
                            </div>
                            @error('jk')
                                <span class="invalid-feedback" role="alert">
                                    <small class="text-danger">{{ $message }}</small>
                                </span>
                            @enderror
                        </div>

                        <!-- No Telepon -->
                        <div class="form-group row">
                            <label for="no_telp" class="col-sm-4 col-form-label text-right">NO TELP/WA <code
                                    style="color:rgb(60, 242, 60);">optional</code></label>
                            <div class="col-sm-6">
                                <input type="text" class="form-control" id="no_telp" name="no_telp"
                                    placeholder="Masukkan Nomor Telepon / Whatsapp"
                                    value="{{ old('no_telp', $mahasiswa->no_telp) }}">
                            </div>
                            @error('no_telp')
                                <span class="invalid-feedback" role="alert">
                                    <small class="text-danger">{{ $message }}</small>
                                </span>
                            @enderror
                        </div>

                        <!-- Alamat -->
                        <div class="form-group row">
                            <label for="alamat" class="col-sm-4 col-form-label text-right">ALAMAT <code
                                    style="color:rgb(60, 242, 60);">optional</code></label>
                            <div class="col-sm-6">
                                <textarea name="alamat" id="alamat" class="form-control" cols="50" rows="2">{{ old('alamat', $mahasiswa->alamat) }}</textarea>
                            </div>
                            @error('alamat')
                                <span class="invalid-feedback" role="alert">
                                    <small class="text-danger">{{ $message }}</small>
                                </span>
                            @enderror
                        </div>

                        <!-- Akun Pengguna -->
                        <div class="form-group row">
                            <label for="user_id" class="col-sm-4 form-label text-right">AKUN PENGGUNA <code
                                    style="color:red;">required</code></label>
                            <div class="col-sm-6">
                                <select name="user_id" id="user_id" class="form-control select2" required>
                                    <option value="" disabled selected>-- PILIH AKUN --</option>
                                    @foreach ($user as $user_item)
                                        <option value="{{ $user_item->id }}"
                                            {{ $mahasiswa->user_id == $user_item->id ? 'selected' : '' }}>
                                            {{ $user_item->username }}
                                        </option>
                                    @endforeach
                                </select>
                                <small style="color:red;">* Pilih akun berdasarkan NIM</small>
                            </div>
                            @error('user_id')
                                <span class="invalid-feedback" role="alert">
                                    <small class="text-danger">{{ $message }}</small>
                                </span>
                            @enderror
                        </div>
                    </div>
                </div><!-- /.box-body -->

                <div class="box-footer d-flex justify-content-between"> <!-- Buttons aligned -->
                    <a href="{{ route('backsite.mahasiswa.index') }}" class="btn btn-default btn-flat"
                        style="width: 120px;"><i class="fa fa-arrow-left"></i> Kembali</a>
                    <button type="submit" class="btn btn-success btn-flat" style="width: 120px;"><i
                            class="fa fa-save"></i>
                        Simpan</button>
                </div>
            </form>
        </div>
    </section>

@endsection
