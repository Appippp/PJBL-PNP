@extends('layouts.main')

@section('title', 'Pengisian Data Pengusul')

@section('content')

    <section class="content-header">
        <h1>
            Data Usulan PBL
            <small>Data Usulan Judul PBL</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="{{ route('backsite.dashboard.index') }}"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Data Usulan Judul PBL</li>
        </ol>
    </section>

    <section class="content">

        <div class="row">
            <div class="col-md-6">
                <div class="box box-primary">
                    <div class="box-header with-border">
                        <h3 class="box-title">Identitas Pengusul</h3>
                    </div>
                    <div class="box-body">
                        <table class="table table-bordered ">
                            <tr>
                                <th width="30%">NAMA LENGKAP</th>
                                <td width="1%">:</td>
                                <td>{{ $detail_proposal->proposal->mahasiswa->nama_mahasiswa }}</td>
                            </tr>
                            <tr>
                                <th width="30%">NIM</th>
                                <td width="1%">:</td>
                                <td>{{ $detail_proposal->proposal->mahasiswa->nim }}</td>
                            </tr>
                            <tr>
                                <th width="30%">PROGRAM STUDI</th>
                                <td width="1%">:</td>
                                <td>{{ $detail_proposal->proposal->mahasiswa->prodi->nama_prodi }}</td>
                            </tr>
                            <tr>
                                <th width="30%">ANGKATAN</th>
                                <td width="1%">:</td>
                                <td>{{ $detail_proposal->proposal->mahasiswa->tahun_masuk }}</td>
                            </tr>
                        </table>

                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="box box-primary">
                    <div class="box-header with-border">
                        <h3 class="box-title">Data Usulan</h3>
                    </div>
                    <div class="box-body">
                        <table class="table table-bordered ">
                            <tr>
                                <th width="30%">JUDUL</th>
                                <td width="1%">:</td>
                                <td>{{ $detail_proposal->proposal->judul_proposal }}</td>
                            </tr>
                            <tr>
                                <th width="30%">UPLOAD</th>
                                <td width="1%">:</td>
                                <td><a href="#" target="_blank">Test </a> </td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
        </div>

    </section>
@endsection
