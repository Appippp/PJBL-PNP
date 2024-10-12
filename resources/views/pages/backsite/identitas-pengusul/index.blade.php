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
                    <!-- Cek apakah sudah ada usulan, jika belum tampilkan tombol -->
                    @if ($detail_proposal->isEmpty())
                        <a href="{{ route('backsite.proposal.create') }}" class="btn btn-success pull-right">
                            <i class="fa fa-plus"></i> Tambah Usulan
                        </a>
                    @else
                        <!-- Jika sudah ada usulan, tampilkan alert -->
                        <div class="alert alert-info">
                            <strong>Perhatian!</strong> Anda sudah menambahkan usulan. Silakan lengkapi data yang sudah ada.
                        </div>
                    @endif
            </div>
            <div class="box-body">

                <table id="example1" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>Tanggal Usulan</th>
                            <th>Pengusul</th>
                            <th>Judul</th>
                            <th>Peran</th>
                            <th>Proposal</th>
                            <th>Validasi Dospem</th>
                            <th>Validasi Kaprodi</th>
                            <th class="text-center">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($detail_proposal as $key => $detail_proposal_item)

                            <tr data-entry-id="{{ $detail_proposal_item->id }}">
                                <td>{{ date('d-m-Y', strtotime($detail_proposal_item->created_at)) ?? '' }}</td>
                                <td>
                                    {{ $detail_proposal_item->proposal->mahasiswa->nama_mahasiswa ?? '-' }}<br>
                                    {{ $detail_proposal_item->proposal->mahasiswa->nim ?? '-' }} <br>
                                    {{ $detail_proposal_item->proposal->mahasiswa->prodi->nama_prodi ?? '' }}
                                </td>
                                <td>{{ $detail_proposal_item->proposal->judul_proposal ?? '' }}</td>
                                <td>{{ $detail_proposal_item->anggota_kelompok->kelompok->ketua->mahasiswa->nama_mahasiswa ?? '-' }}
                                </td>
                                <td>-</td>
                                <td>-</td>
                                <td>-</td>
                                <td class="text-center">

                                    {{-- @can('proposal-edit') --}}
                                    <a href="{{ route('backsite.proposal.edit', $detail_proposal_item->id) }}"
                                        class="btn btn-sm btn-info"><i class="fa fa-edit"></i> Lengkapi</a>
                                    {{-- @endcan --}}
                                </td>
                            </tr>


                        @empty
                            <!-- tidak ada data -->
                        @endforelse
                    </tbody>
                </table>

            </div>
            <div class="box-footer">
                <!-- footer -->
            </div>
        </div>

    </section>
@endsection
