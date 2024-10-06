@extends('layouts.main')

@section('title', 'Data Role')


@section('content')

    <!-- Breadcrumb -->
    <section class="content-header">
        <h1>
            Role
            <small>Data Role</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="{{ route('backsite.dashboard.index') }}"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Data Role</li>
        </ol>
    </section>
    <!-- End Breadcrumb -->



    <section class="content">


        {{-- @can('role-create') --}}
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
            <form action="{{ route('backsite.role.store') }}" method="POST">
                @csrf
                <div class="box-body">
                    <div class="d-flex justify-content-center">
                        <div class="form-group row">
                            <label for="role" class="col-sm-4 form-label text-right">Role <code
                                    style="color:red;">required</code></label>
                            <div class="col-sm-6">
                                <input type="text" class="form-control" id="title" name="title" required>
                            </div>
                            @error('title')
                                <span class="invalid-feedback" role="alert">
                                    <small class="text-danger">{{ $message }}</small>
                                </span>
                            @enderror
                        </div>
                    </div>
                </div><!-- /.box-body -->
                <div class="box-footer">
                    <button type="submit" class="btn btn-success btn-flat pull-right"> <i class="fa fa-save"></i>
                        Simpan</button>
                </div><!-- /.box-footer-->
            </form>
        </div>
        {{-- @endcan --}}


        {{-- @can('role-table') --}}
        <div class="box">
            <div class="box-header">
                <h3 class="box-title"> <b>LIST ROLE</b></h3>
            </div>
            <div class="box-body">
                <table id="example1" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>Date</th>
                            <th>Role</th>
                            <th>Permission</th>
                            <th class="text-center">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($role as $key => $role_item)
                            <tr data-entry-id="{{ $role_item->id }}">
                                <td>{{ isset($role_item->created_at) ? date('d/m/Y H:i:s', strtotime($role_item->created_at)) : '' }}
                                </td>
                                <td>{{ $role_item->title ?? '' }}</td>
                                <td>{{ count($role_item->permission) . ' Permissions' }}</td>
                                <td class="text-center">

                                    {{-- @can('role-edit') --}}
                                    <a href="{{ route('backsite.role.edit', $role_item->id) }}" class="btn btn-warning btn-sm"><i class="fa fa-edit"></i></a>
                                    {{-- @endcan --}}

                                    {{-- @can('role-delete') --}}
                                    <form action="{{ route('backsite.role.destroy', $role_item->id) }}" method="POST"
                                        onsubmit="return confirm('Apakah Anda yakin ingin menghapus data ini?');"
                                        style="display: inline;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-danger">
                                            <i class="fa fa-trash"></i>
                                        </button>
                                    </form>
                                    {{-- @endcan --}}

                                    {{-- @can('role-show') --}}
                                    <a href="{{ route('backsite.role.show', $role_item->id) }}"
                                        class="btn btn-info btn-sm"><i class="fa fa-eye"></i></a>
                                    {{-- @endcan --}}
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="4" class="text-center">Tidak ada data</td>
                            </tr>
                        @endforelse
                    </tbody>

                </table>
            </div><!-- /.box-body -->
        </div><!-- /.box -->
    </section>
    {{-- @endcan --}}

@endsection
