<header class="main-header">
  <!-- Logo -->
  <a href="index2.html" class="logo">
    <!-- mini logo for sidebar mini 50x50 pixels -->
    <span class="logo-mini">K<b>Kai</b></span>
    <!-- logo for regular state and mobile devices -->
    <span class="logo-lg">Kecamatan<b>Kaidipang</b></span>
  </a>
  <!-- Header Navbar: style can be found in header.less -->
  <nav class="navbar navbar-static-top">
    <!-- Sidebar toggle button-->
    <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
      <span class="sr-only">Toggle navigation</span>
    </a>

    <div class="navbar-custom-menu">
      <ul class="nav navbar-nav">
        <li class="dropdown user user-menu">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown">
            <img src="/admin_assets/img/<?= session('user')['user_image'] ?>" class="user-image" alt="User Image">
            <span class="hidden-xs"><?= session('user')['username'] ?></span>
          </a>
          <ul class="dropdown-menu">
            <!-- User image -->
            <li class="user-header">
              <img src="/admin_assets/img/<?= session('user')['user_image'] ?>" class="img-circle" alt="User Image">

              <p>
                <?= session('user')['fullname'] ? session('user')['fullname'] : session('user')['username']?>
                <small>Terdaftar Sejak <?= bulanIni("M", strtotime(session('user')['created_at']))." ".date('Y', strtotime(session('user')['created_at'])) ?></small>
              </p>
            </li>
            <!-- Menu Footer-->
            <li class="user-footer">
              <div class="pull-left">
                <a href="/admin/profile" class="btn btn-default btn-flat">Profile</a>
              </div>
              <div class="pull-right">
                <a href="/logout" class="btn btn-default btn-flat btn-ask" data-judul="Signout" data-text="Anda yakin ingin keluar?">Sign out</a>
              </div>
            </li>
          </ul>
        </li>
        <!-- Control Sidebar Toggle Button -->
        <li>
          <a href="#" data-toggle="control-sidebar"><i class="fa fa-gears"></i></a>
        </li>
      </ul>
    </div>
  </nav>
</header>