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
            <li class="<?= @$a_proyek ?>"><a href="/web/proyek" class="nav-link">Pesan Tukang</a></li>
            <?php if (getTolakPesanan(session('user_id'))->total > 0) : ?>
              <li>
                <a href="javascript:void(0)" class="dropdown-toggle" role="button" data-toggle="dropdown"><i class="fa fa-bell"></i><span class="badge badge-warning position-absolute"><?= getTolakPesanan(session('user_id'))->total ?></span></a>
                <div class="dropdown-menu">
                  <?php foreach (getTolakPesanan(session('user_id'))->data as $row) : ?>
                    <a class="dropdown-item order-ditolak <?= $row->status == 'ditolak' ? 'text-danger font-weight-bold' : 'text-success' ?>" href="javascript:void(0)" data-title="<?= strtoupper($row->status) ?>" data-icon="<?= $row->status == 'ditolak' ? 'warning' : 'info' ?>" data-pesan="<?= $row->status == 'ditolak' ? $row->keterangan : ("Hubungi tukang : <a href='https://api.whatsapp.com/send?phone=$row->telp'>$row->telp</a> " . ($row->wa ? '(nomor WA)' : '(Bukan Nomor WA)')) ?>" data-id="<?= $row->id ?>"><?= $row->nama ?></a>
                  <?php endforeach ?>
                </div>
              </li>
            <?php endif ?>
            <li>
              <?php if (session('nama_user')) : ?>
                <a href="/web/orderan" class="text-danger">Riwayat Pesanan</a>
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