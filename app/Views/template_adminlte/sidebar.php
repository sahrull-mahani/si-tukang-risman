<aside class="main-sidebar main-sidebar-custom sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="/home" class="brand-link">
        <img src="<?= base_url('assets/dist/img/AdminLTELogo.png'); ?>" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: 0.8" />
        <span class="brand-text font-weight-light">Si-Tukang</span>
    </a>
    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="<?= session('foto') ?>" class="img-circle elevation-2" alt="User Image" />
            </div>
            <div class="info">
                <a href="<?= site_url('profile'); ?>" class="d-block"><?= session('nama_user') ?></a>
            </div>
        </div>
        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
                <li class="nav-item">
                    <a href="<?= session('userlevel') == 'users' ? site_url('/') : site_url('/home'); ?>" class="nav-link <?= isset($m_home) ? $m_home : ''; ?>">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>
                            Home
                        </p>
                    </a>
                </li>
                <?php if (is_admin()) : ?>
                    <li class="nav-item <?= isset($m_open_berita) ? $m_open_berita : ''; ?>">
                        <a href="#" class="nav-link <?= isset($mm_berita) ? $mm_berita : ''; ?>">
                            <i class="nav-icon fas fa-newspaper"></i>
                            <p>
                                Berita
                                <i class="fas fa-angle-left right"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="<?= site_url('post-berita'); ?>" class="nav-link <?= isset($m_post) ? $m_post : ''; ?>">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Post Berita</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="<?= site_url('berita'); ?>" class="nav-link <?= isset($m_berita) ? $m_berita : ''; ?>">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>List Berita</p>
                                </a>
                            </li>
                        </ul>
                    </li>
                <?php endif ?>
                <?php if (in_groups([1, 2])) : ?>
                    <li class="nav-item">
                        <a href="<?= site_url('/tukang'); ?>" class="nav-link <?= isset($m_tukang) ? $m_tukang : ''; ?>">
                            <i class='nav-icon fas fa-user'></i>
                            <p>
                                Tukang
                            </p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="<?= site_url('/orderan'); ?>" class="nav-link <?= isset($m_orderan) ? $m_orderan : ''; ?>">
                            <i class='nav-icon fas fa-list'></i>
                            <p>
                                Orderan
                                <?php if (session('userlevel') == 'tukang' && count(getNotifikasiOrderan(session('user_id'))) > 0) : ?>
                                    <span class="right badge badge-danger"><?= count(getNotifikasiOrderan(session('user_id'))) ?> Pesan</span>
                                <?php endif ?>
                            </p>
                        </a>
                    </li>
                <?php endif ?>
                <?php if (is_admin()) : ?>
                    <li class="nav-item">
                        <a href="<?= site_url('/kategori'); ?>" class="nav-link <?= isset($m_kategori) ? $m_kategori : ''; ?>">
                            <i class="nav-icon fa fa-list-alt"></i>
                            <p>
                                Kategori
                            </p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="<?= site_url('/users'); ?>" class="nav-link <?= isset($m_users) ? $m_users : ''; ?>">
                            <i class="nav-icon fa fa-users"></i>
                            <p>
                                Users
                            </p>
                        </a>
                    </li>
                <?php endif ?>
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
    <div class="sidebar-custom">
        <!-- <a href="<?= site_url('setting'); ?>" class="btn btn-link"><i class="fas fa-cogs"></i></a> -->
        <a href="<?= site_url('auth/logout'); ?>" class="btn btn-danger hide-on-collapse pos-right">log Out <i class="fas fa-sign-out-alt"></i></a>
    </div>
</aside>