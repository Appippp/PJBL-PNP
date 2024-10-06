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
        <div class="d-flex justify-content-center align-items-center" style="min-height: 80vh;"> <!-- Form Centered -->
            <div class="box col-md-8"> <!-- Adjusted width to 8 columns -->
                <div class="box-header with-border">
                    <h3 class="box-title"><b>EDIT DATA</b></h3>
                    <div class="box-tools pull-right">
                        <button class="btn btn-box-tool" data-widget="collapse" title="Collapse">
                            <i class="fa fa-minus"></i>
                        </button>
                        <button class="btn btn-box-tool" data-widget="remove" title="Remove">
                            <i class="fa fa-times"></i>
                        </button>
                    </div>
                </div>

                <form action="{{ route('backsite.role.update', [$role->id]) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="box-body">
                        <div class="form-group row">
                            <label for="role" class="col-sm-4 col-form-label text-right">Role <code
                                    style="color:red;">required</code></label>
                            <div class="col-sm-7">
                                <input type="text" id="title" name="title" class="form-control" placeholder="example admin or users" value="{{ old('title', isset($role) ? $role->title : '') }}" autocomplete="off" required>

                                @error('role')
                                    <span class="invalid-feedback" role="alert">
                                        <small class="text-danger">{{ $message }}</small>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="role" class="col-sm-4 col-form-label text-right">Permission <code
                                    style="color:green;">optional</code></label>
                            <div class="col-sm-7">
                                <label for="permission">
                                    <span class="btn btn-default btn-sm select-all">{{ 'Select All' }}</span>
                                    <span class="btn btn-default btn-sm deselect-all">{{ 'Deselect All' }}</span>
                                </label>
                                <select name="permission[]" id="permission" class="form-control select2"
                                    style="width: 100%;" multiple='multiple'>
                                    @foreach ($permission as $id => $permission_item)
                                        <option value="{{ $permission_item->id }}"
                                            {{ in_array($permission_item->id, old('permission', [])) || (isset($role) && $role->permission->contains($permission_item->id)) ? 'selected' : '' }}>
                                            {{ $permission_item->title }}
                                        </option>
                                    @endforeach
                                </select>
                                @error('permission')
                                    <span class="invalid-feedback" role="alert">
                                        <small class="text-danger">{{ $message }}</small>
                                    </span>
                                @enderror
                            </div>
                        </div>
                    </div><!-- /.box-body -->

                    <div class="box-footer d-flex justify-content-between"> <!-- Buttons aligned -->
                        <a href="{{ route('backsite.role.index') }}" class="btn btn-default btn-flat"
                            style="width: 120px;"><i class="fa fa-arrow-left"></i> Kembali</a>
                        <button type="submit" class="btn btn-success btn-flat" style="width: 120px;"><i
                                class="fa fa-save"></i> Simpan</button>
                    </div><!-- /.box-footer -->
                </form>
            </div>
        </div>
    </section>
@endsection

@push('after-script')
    <script>
        jQuery(document).ready(function($){
            $('.select-all').click(function () {
                let $select2 = $(this).parent().siblings('.select2')
                $select2.find('option').prop('selected', 'selected')
                $select2.trigger('change')
            })

            $('.deselect-all').click(function () {
                let $select2 = $(this).parent().siblings('.select2')
                $select2.find('option').prop('selected', '')
                $select2.trigger('change')
            })
        });
    </script>

@endpush
