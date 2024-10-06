@extends('layouts.main')

@section('title', 'Data Permission')


@section('content')

    <section class="content-header">
        <h1>
            Permission
            <small>Data Permission</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="{{ route('backsite.dashboard.index') }}"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Data Permission</li>
        </ol>
    </section>

    <section class="content">
        <div class="box">
            <div class="box-header">
                <h3 class="box-title">LIST PERMISSION</h3>
            </div>
            <div class="box-body">
                <table id="example1" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>Permission</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($permission as $key => $permission_item)
                            <tr data-entry-id="{{ $permission_item->id }}">
                                <td>{{ $permission_item->title ?? '' }}</td>
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
    </section>

@endsection

