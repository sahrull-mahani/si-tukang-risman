<header class="site-navbar site-navbar-target" role="banner">
  <div class="container">
    <div class="row align-items-center position-relative">

      <div class="col-4">
        <div class="site-logo">
          <a href="/"><strong>Si-</strong>Tukang<span class="text-primary">.</span> </a>
        </div>
        <?php if (session('nama_user')) : ?>
          <span class="text-white">Selamat Datang</span>
          <?php if (session('userlevel') == 'users') : ?>
            <a href="/profile" class="text-white font-weight-bold"><?= session('nama_user') ?></a>
          <?php else : ?>
            <a href="/tukang" class="text-white font-weight-bold"><?= session('nama_user') ?></a>
          <?php endif ?>
        <?php endif ?>
      </div>
      <div class="col-8 text-center">
        <span class="d-inline-block d-lg-none"><a href="#" class="text-white site-menu-toggle js-menu-toggle py-5 text-white"><span class="icon-menu h3 text-white"></span></a></span>
        <nav class="site-navigation text-center ml-auto d-none d-lg-block" role="navigation">
          <ul class="site-menu main-menu js-clone-nav ml-auto ">
            <li class="<?= @$a_home ?>"><a href="/" class="nav-link">Beranda</a></li>
            <li class="<?= @$a_tentang ?>"><a href="/web/tentang" class="nav-link">Tentang</a></li>
            <li class="<?= @$a_blog ?>"><a href="/web/blog" class="nav-link">Berita</a></li>
            <li class="<?= @$a_proyek ?>"><a href="/web/proyek" class="nav-link">Order Tukang</a></li>
            <li>
              <?php if (session('nama_user')) : ?>
                <a href="/web/orderan" class="text-danger">Riwayat Orderan</a>
                <a href="<?= site_url('auth/logout') ?>">Keluar</a>
              <?php else : ?>
                <a href="<?= site_url('login') ?>">Masuk</a>
              <?php endif ?>
            </li>
          </ul>
        </nav>
      </div>
    </div>
  </div>
</header>