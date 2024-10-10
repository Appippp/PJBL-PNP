@extends('layouts.main')

@section('title', 'Data User')


@section('content')

    <!-- Breadcrumb --->
    <section class="content-header">
        <h1>
            User
            <small>Data User</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="{{ route('backsite.dashboard.index') }}"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Data User</li>
        </ol>
    </section>
    <!-- End Breadcrumb -->


    <section class="content">

        {{-- @can('user-create') --}}
        <div class="box collapsed-box">
            <div class="box-header with-border ">
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
            <form action="{{ route('backsite.user.store') }}" method="POST">
                @csrf
                <div class="box-body">
                    <div class="d-flex justify-content-center">
                        <!-- username -->
                        <div class="form-group row">
                            <label for="username" class="col-sm-4 form-label text-right">Nomor Indentitas <code
                                    style="color:red;">required</code></label>
                            <div class="col-sm-6">
                                <input type="text" class="form-control" id="username" name="username"
                                    placeholder="Nomor Identitas" required>
                            </div>
                            @error('username')
                                <span class="invalid-feedback" role="alert">
                                    <small class="text-danger">{{ $message }}</small>
                                </span>
                            @enderror
                        </div>

                        <!-- Email -->
                        <div class="form-group row">
                            <label for="email" class="col-sm-4 form-label text-right">Email <code
                                    style="color:red;">required</code></label>
                            <div class="col-sm-6">
                                <input type="email" id="email" name="email" class="form-control"
                                    placeholder="Email" value="{{ old('email') }}" autocomplete="off" required>
                            </div>
                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <small class="text-danger">{{ $message }}</small>
                                </span>
                            @enderror
                        </div>

                        <!-- role -->
                        <div class="form-group row }}">
                            <label for="role" class="col-sm-4 col-form-label text-right">Role <code
                                    style="color:red;">required</code></label>
                            <div class="col-sm-6">
                                <label for="permission">
                                    <span class="btn btn-primary btn-sm select-all">{{ 'Select All' }}</span>
                                    <span class="btn btn-primary btn-sm deselect-all">{{ 'Deselect All' }}</span>
                                </label>
                                <select name="role[]" id="role" class="form-control select2" style="width: 100%;"
                                    multiple='multiple'>
                                    @foreach ($roles as $id => $roles)
                                        <option value="{{ $id }}"
                                            {{ in_array($id, old('roles', [])) || (isset($role) && $user->roles->contains($id)) ? 'selected' : '' }}>
                                            {{ $roles }}
                                        </option>
                                    @endforeach
                                </select>
                                @error('role')
                                    <span class="invalid-feedback" role="alert">
                                        <small class="text-danger">{{ $message }}</small>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <!-- Type -->
                        <div class="form-group row">
                            <label for="type_user_id" class="col-sm-4 form-label text-right">Type User<code
                                    style="color:red;">required</code></label>
                            <div class="col-sm-6">
                                <select name="type_user_id" id="type_user_id" class="form-control select2" required>
                                    <option value="{{ '' }}" disabled selected>-- PILIH -- </option>
                                    @foreach ($type_user as $key => $type_user_item)
                                        <option value="{{ $type_user_item->id }}">{{ $type_user_item->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            @error('type_user_id')
                                <span class="invalid-feedback" role="alert">
                                    <small class="text-danger">{{ $message }}</small>
                                </span>
                            @enderror
                        </div>


                    </div>
                </div><!-- /.box-body -->
                <div class="box-footer">
                    <button type="submit" class="btn btn-primary btn-flat pull-right"> <i class="fa fa-save"></i>
                        Simpan</button>
                </div><!-- /.box-footer-->
            </form>
        </div>
        {{-- @endcan --}}

        {{-- @can('user-table') --}}
        <div class="box">
            <div class="box-header">
                <h3 class="box-title">LIST USER</h3>
            </div>
            <div class="box-body">
                <table id="example1" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>Date</th>
                            <th>Username</th>
                            <th>Email</th>
                            <th>Role</th>
                            <th>Type</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($user as $key => $user_item)
                            <tr data-entry-id="{{ $user_item->id }}">
                                <td>{{ date('d/m/Y H:i:s', strtotime($user_item->created_at)) ?? '' }}</td>
                                <td>{{ $user_item->username ?? '' }}</td>
                                <td>{{ $user_item->email ?? '' }}</td>
                                <td style="width:150px;">
                                    @foreach ($user_item->role as $key => $item)
                                        <span class="badge bg-yellow text-dark mr-1 mb-1">{{ $item->title }}</span>
                                    @endforeach
                                </td>
                                <td style="width:200px;">
                                    <span
                                        class="badge bg-success mr-1 mb-1">{{ $user_item->detail_user->type_user->name ?? '' }}</span>
                                </td>
                                <td>
                                    {{-- @can('user-edit') --}}
                                    <a href="{{ route('backsite.user.edit', $user_item->id) }}"
                                        class="btn btn-warning btn-sm"><i class="fa fa-edit"></i></a>
                                    {{-- @endcan --}}

                                    {{-- @can('user-delete') --}}
                                    <form action="{{ route('backsite.user.destroy', $user_item->id) }}" method="POST"
                                        onsubmit="return confirm('Apakah Anda yakin ingin menghapus data ini?');"
                                        style="display: inline;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-danger">
                                            <i class="fa fa-trash"></i>
                                        </button>
                                    </form>
                                    {{-- @endcan --}}

                                    {{-- @can('user-show') --}}
                                    <a href="{{ route('backsite.user.show', $user_item->id) }}"
                                        class="btn btn-info btn-sm"><i class="fa fa-eye"></i></a>
                                    {{-- @endcan --}}
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="1" class="text-center">Tidak ada data</td>
                            </tr>
                        @endforelse
                    </tbody>

                </table>
            </div><!-- /.box-body -->
        </div><!-- /.box -->
        {{-- @endcan --}}

    </section>

@endsection


@push('after-script')
    <script>
        jQuery(document).ready(function($) {
            $('.select-all').click(function() {
                let $select2 = $(this).parent().siblings('.select2')
                $select2.find('option').prop('selected', 'selected')
                $select2.trigger('change')
            })

            $('.deselect-all').click(function() {
                let $select2 = $(this).parent().siblings('.select2')
                $select2.find('option').prop('selected', '')
                $select2.trigger('change')
            })
        });
    </script>
@endpush
