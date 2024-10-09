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
                <h3 class="box-title">Detail User: {{ isset($user->username) ? $user->username : 'N/A' }}</h3>
                <div class="box-tools pull-right">
                    <button class="btn btn-box-tool" data-widget="collapse" title="Collapse"><i
                            class="fa fa-minus"></i></button>
                    <button class="btn btn-box-tool" data-widget="remove" title="Remove"><i
                            class="fa fa-times"></i></button>
                </div>
            </div>
            <div class="box-body">
                <table class="table table-bordered">
                    <tr>
                        <th>Username</th>
                        <td>{{ isset($user->username) ? $user->username : 'N/A' }}</td>
                    </tr>
                    <tr>
                        <th>Email</th>
                        <td>{{ isset($user->email) ? $user->email : 'N/A' }}</td>
                    </tr>
                    <tr>
                        <th>Role</th>
                        <td>
                            @foreach ($user->role as $id => $role)
                                <span
                                    class="badge bg-yellow text-dark mr-1 mb-1">{{ isset($role->title) ? $role->title : 'N/A' }}</span>
                            @endforeach
                        </td>
                    </tr>
                    <tr>
                        <th>Type User</th>
                        <td>
                            <span
                                class="badge bg-success mr-1 mb-1">{{ isset($user->detail_user->type_user->name) ? $user->detail_user->type_user->name : 'N/A' }}</span>
                        </td>
                    </tr>
                </table>
            </div><!-- /.box-body -->
            <div class="box-footer">
                <a href="{{ route('backsite.user.index') }}" class="btn btn-default"><i class="fa fa-arrow-left"></i> Kembali  </a>
            </div><!-- /.box-footer -->
        </div><!-- /.box -->
    </section>

@endsection
