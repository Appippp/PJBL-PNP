@extends('layouts.main')

@section('title', 'Data Type User')


@section('content')

    <!-- Breadcrumb --->
    <section class="content-header">
        <h1>
            Type User
            <small>Data Type User</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="{{ route('backsite.dashboard.index') }}"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Data Type User</li>
        </ol>
    </section>
    <!-- End Breadcrumb -->


    <section class="content">

        {{-- @can('type-user-table') --}}
        <div class="box">
            <div class="box-header">
                <h3 class="box-title"> <b>LIST TYPE USER</b></h3>
            </div>
            <div class="box-body">
                <table id="example1" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>Name</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($type_user as $key => $type_user_item)
                            <tr data-entry-id="{{ $type_user_item->id }}">
                                <td>{{ $type_user_item->name ?? '' }}</td>
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
