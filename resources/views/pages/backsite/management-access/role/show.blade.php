@extends('layouts.main')

@section('title', 'Detail Role')

@section('content')

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

<section class="content">
    <div class="box">
        <div class="box-header with-border">
            <h3 class="box-title">Detail Role: {{ isset($role->title) ? $role->title : 'N/A' }}</h3>
            <div class="box-tools pull-right">
                <button class="btn btn-box-tool" data-widget="collapse" title="Collapse"><i class="fa fa-minus"></i></button>
                <button class="btn btn-box-tool" data-widget="remove" title="Remove"><i class="fa fa-times"></i></button>
            </div>
        </div>
        <div class="box-body">
            <table class="table table-bordered">
                <tbody>
                    <tr>
                        <th style="width: 30%;">Role</th>
                        <td>{{ isset($role->title) ? $role->title : 'N/A' }}</td>
                    </tr>
                    <tr>
                        <th>Permission</th>
                        <td>
                            @if ($role->permission->isEmpty())
                                <span class="badge bg-danger">No Permissions Assigned</span>
                            @else
                                @foreach ($role->permission as $permission)
                                    <span class="badge bg-yellow text-dark mr-1 mb-1">{{ isset($permission->title) ? $permission->title : 'N/A' }}</span>
                                @endforeach
                            @endif
                        </td>
                    </tr>
                </tbody>
            </table>
        </div><!-- /.box-body -->
        <div class="box-footer">
            <a href="{{ route('backsite.role.index') }}" class="btn btn-default"><i class="fa fa-arrow-left"></i> Kembali</a>
        </div><!-- /.box-footer -->
    </div><!-- /.box -->
</section>

@endsection
