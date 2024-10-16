@extends('layouts.main')

@section('title', 'Data Mahasiswa')

@section('content')

    <!-- Breadcrumb -->
    <section class="content-header">
        <h1>
            Mahasiswa
            <small>Data Mahasiswa</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="{{ route('backsite.dashboard.index') }}"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Data Mahasiswa</li>
        </ol>
    </section>

    <section class="content">

        {{-- @can('mahasiswa-table') --}}
        <div class="box">
            <div class="box-header">
                <h3 class="box-title">LIST MAHASISWA</h3>
                {{-- @can('mahasiswa-create') --}}
                    <a href="{{ route('backsite.mahasiswa.create') }}" class="btn btn-sm btn-success pull-right"><i class="fa fa-plus"></i> TAMBAH DATA</a>
                {{-- @endcan --}}
            </div>
            <div class="box-body">
                <table id="example1" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>DATE</th>
                            <th>NIM</th>
                            <th>NAMA MAHASISWA</th>
                            <th>PROGRAM STUDI</th>
                            <th>ANGKATAN</th>
                            <th>USERNAME</th>
                            <th class="text-center">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($mahasiswa as $key => $mahasiswa_item)
                            <tr data-entry-id="{{ $mahasiswa_item->id }}">
                                <td>{{ isset($mahasiswa_item->created_at) ? date('d/m/Y H:i:s', strtotime($mahasiswa_item->created_at)) : '' }}</td>
                                <td>{{ $mahasiswa_item->nim ?? '' }}</td>
                                <td>{{ $mahasiswa_item->nama_mahasiswa ?? '' }}</td>
                                <td>{{ $mahasiswa_item->prodi->nama_prodi ?? '' }}</td>
                                <td>{{ $mahasiswa_item->tahun_masuk ?? '' }}</td>
                                <td>{{ $mahasiswa_item->user->username ?? '' }}</td>
                                <td class="text-center">

                                    {{-- @can('mahasiswa-edit') --}}
                                    <a href="{{ route('backsite.mahasiswa.edit', $mahasiswa_item->id) }}"
                                        class="btn btn-sm btn-warning"><i class="fa fa-edit"></i></a>
                                    {{-- @endcan --}}

                                    {{-- @can('mahasiswa-delete') --}}
                                    <form action="{{ route('backsite.mahasiswa.destroy', $mahasiswa_item->id) }}" method="POST"
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
