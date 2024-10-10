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
        <div class="box box-primary">
            <div class="box-header with-border">
                <h3 class="box-title">Data Usulan</h3>
            </div>
            <div class="box-body">

                <form action="{{ route('backsite.proposal.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf

                    <input type="text" name="mahasiswa_id" hidden value="{{ $mahasiswa->id }}">

                    <div class="form-group">
                        <label for="judul_proposal">JUDUL PROPOSAL <span class="text-red">*</span></label>
                        <input type="text" class="form-control" id="judul_proposal" name="judul_proposal"
                            placeholder="Judul Proposal" required>
                    </div>

                    <div class="form-group">
                        <label for="file_proposal">UPLOAD PROPOSAL <span class="text-red">*</span></label>
                        <input type="file" class="form-control" id="file_proposal" name="file_proposal"
                            accept="application/pdf" required>
                        <small class="text-red">*File harus berupa PDF dengan ukuran maksimal 10 MB</small>
                    </div>

                    <div class="form-group">
                        <button type="submit" class="btn btn-success"> <i class="fa fa-save"></i> Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </section>
@endsection
