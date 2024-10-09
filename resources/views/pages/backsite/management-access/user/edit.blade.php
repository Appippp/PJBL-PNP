@extends('layouts.main')

@section('title', 'Edit Role')

@section('content')
    <section class="content-header">
        <h1>
            Role
            <small>Data Role</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="{{ route('backsite.dashboard.index') }}"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Edit Role</li>
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
            <form action="{{ route('backsite.user.update', [$user->id]) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="box-body">
                    <div class="d-flex justify-content-center">
                        <!-- username -->
                        <div class="form-group row">
                            <label for="username" class="col-sm-4 form-label text-right">Username <code
                                    style="color:red;">required</code></label>
                            <div class="col-sm-6">
                                <input type="text" id="username" name="username" class="form-control" placeholder="No BP" value="{{ old('username', isset($user) ? $user->username : '') }}" autocomplete="off" readonly>

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
                                    placeholder="Jhoe@mail.com" value="{{ old('email', isset($user) ? $user->email : '') }}"
                                    autocomplete="off" readonly>
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
                                    @foreach ($role as $id => $role)
                                        <option value="{{ $id }}"
                                            {{ in_array($id, old('role', [])) || (isset($user) && $user->role->contains($id)) ? 'selected' : '' }}>
                                            {{ $role }}</option>
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
                                    <option value="{{ '' }}" disabled selected>Choose</option>
                                    @foreach($type_user as $key => $type_user_item)
                                        <option value="{{ $type_user_item->id }}" {{ $type_user_item->id == $user->detail_user->type_user_id ? 'selected' : '' }}>{{ $type_user_item->name }}</option>
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
                <div class="box-footer d-flex justify-content-between"> <!-- Buttons aligned -->
                    <a href="{{ route('backsite.user.index') }}" class="btn btn-default btn-flat" style="width: 120px;"><i
                            class="fa fa-arrow-left"></i> Kembali</a>
                    <button type="submit" class="btn btn-success btn-flat" style="width: 120px;"><i class="fa fa-save"></i>
                        Simpan</button>
                </div><!-- /.box-footer -->
            </form>
        </div>
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
