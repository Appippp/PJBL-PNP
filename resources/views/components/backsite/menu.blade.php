<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
        <!-- Sidebar user panel -->
        <div class="user-panel">
            <div class="pull-left image">
                <img src="{{ asset('assets/backsite/dist/img/user2-160x160.jpg') }}" class="img-circle" alt="User Image">
            </div>
            <div class="pull-left info">
                <p>Alexander Pierce</p>
                <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
            </div>
        </div>
        <!-- search form -->
        <form action="#" method="get" class="sidebar-form">
            <div class="input-group">
                <input type="text" name="q" class="form-control" placeholder="Search...">
                <span class="input-group-btn">
                    <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i
                            class="fa fa-search"></i></button>
                </span>
            </div>
        </form>
        <!-- /.search form -->
        <!-- sidebar menu: : style can be found in sidebar.less -->
        <ul class="sidebar-menu">
            <li class="header">MENU</li>

            {{-- @can('dashboard-access') --}}
            <!-- Menu Dashboard -->
            <li class="active treeview">
                <a href="{{ route('backsite.dashboard.index') }}">
                    <i class="fa fa-dashboard"></i> <span>DASHBOARD</span>
                </a>
            </li>
            <!-- /.Menu Dashboard -->
            {{-- @endcan --}}


            {{-- @can('management-access') --}}
            <!-- Menu Management Accesss -->
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-files-o"></i>
                    <span>MANAGAMENT ACCESS</span>
                    <i class="fa fa-angle-left pull-right"></i>
                </a>
                <ul class="treeview-menu">
                    {{-- @can('permission-access') --}}
                    <li><a href="{{ route('backsite.permission.index') }}"><i class="fa fa-circle-o"></i> PERMISSION</a>
                    </li>
                    {{-- @endcan --}}

                    {{-- @can('role-access') --}}
                    <li><a href="{{ route('backsite.role.index') }}"><i class="fa fa-circle-o"></i> ROLE</a></li>
                    {{-- @endcan --}}

                    {{-- @can('type-user-access') --}}
                    <li><a href="{{ route('backsite.type_user.index') }}"><i class="fa fa-circle-o"></i> TYPE USER</a>
                    </li>
                    {{-- @endcan --}}

                    {{-- @can('user-access') --}}
                    <li><a href="{{ route('backsite.user.index') }}"><i class="fa fa-circle-o"></i> USER</a></li>
                    {{-- @endcan --}}
                </ul>
            </li>
            <!-- /.Menu Management Accesss -->
            {{-- @endcan --}}


            {{-- @can('data-pendukung-access') --}}
            <!-- Menu data pendukung -->
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-files-o"></i>
                    <span>DATA PENDUKUNG</span>
                    <i class="fa fa-angle-left pull-right"></i>
                </a>
                <ul class="treeview-menu">
                    {{-- @can('mahasiswa-access') --}}
                    <li><a href="{{ route('backsite.mahasiswa.index') }}"><i class="fa fa-circle-o"></i> DATA
                            MAHASISWA</a></li>
                    {{-- @endcan --}}

                    {{-- @can('dosen-access') --}}
                    <li><a href="{{ route('backsite.dosen.index') }}"><i class="fa fa-circle-o"></i> DATA DOSEN</a></li>
                    {{-- @endcan --}}

                    {{-- @can('prodi-access') --}}
                    <li><a href="{{ route('backsite.prodi.index') }}"><i class="fa fa-circle-o"></i> DATA PRODI</a></li>
                    {{-- @endcan --}}

                     {{-- @can('mitra-access') --}}
                     <li><a href="{{ route('backsite.mitra.index') }}"><i class="fa fa-circle-o"></i> DATA MITRA</a></li>
                     {{-- @endcan --}}

                </ul>
            </li>
            <!-- /.Menu data pendukung-->
            {{-- @endcan --}}

            {{-- @can('pengusul-access') --}}
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-files-o"></i>
                    <span>PENGAJUAN USULAN</span>
                    <i class="fa fa-angle-left pull-right"></i>
                </a>


                <ul class="treeview-menu">
                    {{-- @can('identitas-usulan-access') --}}
                    <li><a href="{{ route('backsite.proposal.index') }}"><i class="fa fa-circle-o"></i>
                            IDENTITAS USULAN</a></li>
                    {{-- @endcan --}}
                </ul>
            </li>
            {{-- @endcan --}}


        </ul>
    </section>
    <!-- /.sidebar -->
</aside>
