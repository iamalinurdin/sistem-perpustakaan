<!-- Left side column. contains the logo and sidebar -->
<aside class="main-sidebar">
  <!-- sidebar: style can be found in sidebar.less -->
  <section class="sidebar">
    <!-- /.search form -->
    <!-- sidebar menu: : style can be found in sidebar.less -->
    <ul class="sidebar-menu" data-widget="tree">
      <li><a href="{{ route('admin.author.index') }}"><i class="fa fa-user text-red"></i> <span>Penulis</span></a></li>
      <li><a href="{{ route('admin.book.index') }}"><i class="fa fa-book text-yellow"></i> <span>Buku</span></a></li>
      <li><a href="{{ route('admin.borrow.index') }}"><i class="fa fa-book text-blue"></i> <span>Peminjaman</span></a></li>
      <li class="treeview">
          <a href="#">
            <i class="fa fa-pie-chart text-green"></i> <span>Laporan</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="{{ route('admin.report.topUser') }}"><i class="fa fa-users text-yellow"></i> User</a></li>
            <li><a href="{{ route('admin.report.topBook') }}"><i class="fa fa-book text-red"></i> Peminjaman</a></li>
          </ul>
        </li>
    </ul>
  </section>
  <!-- /.sidebar -->
</aside>