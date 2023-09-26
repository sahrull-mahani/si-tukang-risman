<aside class="main-sidebar">
  <!-- sidebar: style can be found in sidebar.less -->
  <section class="sidebar">
    <!-- Sidebar user panel -->
    <div class="user-panel">
      <div class="pull-left image">
        <img src="/admin_assets/img/<?= session('user')['user_image'] ?>" class="img-circle" style="height: 50px; width: 100%; object-fit: cover;" alt="User Image">
      </div>
      <div class="pull-left info">
        <p><?= session('user')['username'] ?></p>
        <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
      </div>
    </div>
    <!-- search form -->
    <form action="#" method="get" class="sidebar-form">
      <div class="input-group">
        <input type="text" name="q" class="form-control" placeholder="Search...">
        <span class="input-group-btn">
          <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
          </button>
        </span>
      </div>
    </form>
    <!-- /.search form -->
    <!-- sidebar menu: : style can be found in sidebar.less -->
    <ul class="sidebar-menu" data-widget="tree">
      <li class="header">MAIN NAVIGATION</li>
      <li class="<?= $active == 'admin' ? 'active' : '' ?>">
        <a href="/admin">
          <i class="fa fa-dashboard"></i> <span>Dashboard</span>
        </a>
      </li>
      <li class="treeview <?= $active == 'input' ? 'active' : '' ?>">
        <a href="#">
          <i class="fa fa-plus-circle"></i>
          <span>Input</span>
          <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
          </span>
        </a>
        <ul class="treeview-menu">
          <li><a href="/berita"><i class="fa fa-newspaper-o"></i> Berita</a></li>
          <li><a href="/agenda"><i class="fa fa-address-book"></i> Agenda Kegiatan</a></li>
          <li><a href="/program"><i class="fa fa-address-book-o"></i> Program Kegiatan</a></li>
          <li><a href="/pariwisata"><i class="fa fa-tree"></i> Pariwisata</a></li>
          <li><a href="/potensi"><i class="fa fa-book"></i> Potensi</a></li>
          <li><a href="/statistik/input_statistik"><i class="fa fa-pie-chart"></i> Statistik</a></li>
        </ul>
      </li>
      <li class="treeview <?= $active == 'list' ? 'active' : '' ?>">
        <a href="#">
          <i class="fa fa-list"></i>
          <span>Data</span>
          <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
          </span>
        </a>
        <ul class="treeview-menu">
          <li><a href="/berita/list_berita"><i class="fa fa-newspaper-o"></i> Berita</a></li>
          <li><a href="/agenda/list_agenda"><i class="fa fa-address-book"></i> Agenda Kegiatan</a></li>
          <li><a href="/program/list_program"><i class="fa fa-address-book-o"></i> Program Kegiatan</a></li>
          <li><a href="/pariwisata/list_pariwisata"><i class="fa fa-tree"></i> Pariwisata</a></li>
          <li><a href="/potensi/list_potensi"><i class="fa fa-book"></i> Potensi</a></li>
          <li><a href="/statistik"><i class="fa fa-pie-chart"></i> Statistik</a></li>
        </ul>
      </li>
      <?php if (session('user')['level'] == 1) : ?>
        <li class="<?= $active == 'user' ? 'active' : '' ?>">
          <a href="/user">
            <i class="fa fa-users"></i> <span>Managament Users</span>
          </a>
        </li>
      <?php endif ?>
    </ul>
  </section>
  <!-- /.sidebar -->
</aside>