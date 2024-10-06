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
            <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i></button>
          </span>
        </div>
      </form>
      <!-- /.search form -->
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu">
        <li class="header">MENU</li>


        <!-- Menu Dashboard -->
        <li class="active treeview">
          <a href="#">
            <i class="fa fa-dashboard"></i> <span>DASHBOARD</span>
          </a>
        </li>
        <!-- /.Menu Dashboard -->

        <!-- Menu Management Accesss -->
        <li class="treeview">
          <a href="#">
            <i class="fa fa-files-o"></i>
            <span>MANAGAMENT ACCESS</span>
            <i class="fa fa-angle-left pull-right"></i>
          </a>
          <ul class="treeview-menu">
            <li><a href="pages/layout/top-nav.html"><i class="fa fa-circle-o"></i>PERMISSION</a></li>
            <li><a href="pages/layout/boxed.html"><i class="fa fa-circle-o"></i> ROLE</a></li>
            <li><a href="pages/layout/fixed.html"><i class="fa fa-circle-o"></i> TYPE USER</a></li>
            <li><a href="pages/layout/collapsed-sidebar.html"><i class="fa fa-circle-o"></i>USER</a></li>
          </ul>
        </li>
        <!-- /.Menu Management Accesss -->

        <!-- Menu data pendukung -->
        <li class="treeview">
          <a href="#">
            <i class="fa fa-pie-chart"></i>
            <span>DATA PENDUKUNG</span>
            <i class="fa fa-angle-left pull-right"></i>
          </a>
          <ul class="treeview-menu">
            <li><a href="pages/charts/chartjs.html"><i class="fa fa-circle-o"></i> DATA MAHASISWA</a></li>
            <li><a href="pages/charts/morris.html"><i class="fa fa-circle-o"></i> DATA DOSEN</a></li>
            <li><a href="pages/charts/flot.html"><i class="fa fa-circle-o"></i> DATA PRODI</a></li>
          </ul>
        </li>
        <!-- /.Menu data pendukung-->

      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>
