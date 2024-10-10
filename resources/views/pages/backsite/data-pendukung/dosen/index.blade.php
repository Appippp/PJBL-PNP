@extends('layouts.main')

@section('title', 'Data Dosen')

@section('content')

    <!-- Breadcrumb -->
    <section class="content-header">
        <h1>
            Dosen
            <small>Data Dosen</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="{{ route('backsite.dashboard.index') }}"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Data Dosen</li>
        </ol>
    </section>

    <section class="content">

        {{-- @can('mahasiswa-table') --}}
        <div class="box">
            <div class="box-header">
                <h3 class="box-title">LIST DOSEN</h3>
                {{-- @can('mahasiswa-create') --}}
                    <a href="{{ route('backsite.dosen.create') }}" class="btn btn-sm btn-success pull-right"><i class="fa fa-plus"></i> TAMBAH DATA</a>
                {{-- @endcan --}}
            </div>
            <div class="box-body">
                <table id="example1" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>DATE</th>
                            <th>NIDN</th>
                            <th>NAMA DOSEN</th>
                            <th>PROGRAM STUDI</th>
                            <th>EMAIL</th>
                            <th>USERNAME</th>
                            <th class="text-center">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($dosen as $key => $dosen_item)
                            <tr data-entry-id="{{ $dosen_item->id }}">
                                <td>{{ isset($dosen_item->created_at) ? date('d/m/Y H:i:s', strtotime($dosen_item->created_at)) : '' }}</td>
                                <td>{{ $dosen_item->nidn ?? '' }}</td>
                                <td>{{ $dosen_item->nama_dosen ?? '' }}</td>
                                <td>{{ $dosen_item->prodi->nama_prodi ?? '' }}</td>
                                <td>{{ $dosen_item->user->email ?? '' }}</td>
                                <td>{{ $dosen_item->user->username ?? '' }}</td>
                                <td class="text-center">

                                    {{-- @can('dosen-edit') --}}
                                    <a href="{{ route('backsite.dosen.edit', $dosen_item->id) }}"
                                        class="btn btn-sm btn-warning"><i class="fa fa-edit"></i></a>
                                    {{-- @endcan --}}

                                    {{-- @can('dosen-delete') --}}
                                    <form action="{{ route('backsite.dosen.destroy', $dosen_item->id) }}" method="POST"
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
                            <!-- Data Not Found -->
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
        {{-- @endcan --}}


    </section>

@endsection
