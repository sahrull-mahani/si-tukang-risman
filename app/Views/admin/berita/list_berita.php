<?= $this->extend('layout/_template') ?>

<?= $this->section('contentAdmin') ?>
<section class="content-header">
  <h1>
    Daftar Berita
    <small>Control panel</small>
  </h1>
  <ol class="breadcrumb">
    <li><a href="/admin"><i class="fa fa-dashboard"></i> Home</a></li>
    <li class="">Berita</li>
    <li class="active">Daftar</li>
  </ol>
  <?php if (session()->getFlashdata('success')) : ?>
    <div class="alert alert-success alert-dismissible">
      <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
      <h4><i class="icon fa fa-check"></i> Berhasil!</h4>
      <?= session()->getFlashdata('success') ?>
    </div>
  <?php endif ?>
</section>

<?php if (empty($berita)) : ?>
  <div class="row">
    <div class="col-md-12">
      <section class="content">
        <div class="box box-widget text-center" style="padding: 20px; font-weight: bold;">
          <h2><strong>Data Belum Diisi!.</strong> <a href="/admin/berita"><i class="fa fa-plus"></i> Tambah Berita</a></h2>
        </div>
      </section>
    </div>
  </div>
<?php else : ?>
  <div class="row">
    <?php foreach ($berita as $brt) : ?>
      <div class="col-xl-4 col-lg-6">
        <section class="content">
          <div class="box box-widget">
            <div class="box-header with-border">
              <div class="user-block">
                <img class="img-circle" src="/admin_assets/img/<?= $brt->user_image ?>" alt="User Image">
                <span class="username"><a href="#"><?= $brt->username ?></a> </span>
                <span class="description"><?= $brt->published_at != null ? '<i class="fa fa-check-circle-o"></i> Publish' : '<i class="fa fa-circle"></i> Unpublish' ?> - <i class="fa fa-clock-o"></i> <?= hariIni('D', strtotime($brt->created_at)) . ", " . date("d-m-Y H.i", strtotime($brt->created_at)) ?> | <i class="fa fa-bookmark"></i> <?= $brt->bl == 1 ? "Provinsi" : ($brt->bl == 2 ? "Kabupaten" : "Kecamatan") ?></span>
              </div>
              <!-- /.user-block -->
              <div class="box-tools">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
                <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
              </div>
              <!-- /.box-tools -->
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <img class="img-responsive pad img-overlay" src="/admin_assets/galeri/<?= $brt->gambar ?>" alt="Photo">
              
              <strong style="text-transform: capitalize;"><?= $brt->judul ?></strong>
              <p><?= $brt->excerpt ?>...<a href="/berita/detail_berita/<?= $brt->slug ?>">read more</a></p>
              <?php if (session('user')['id'] == $brt->id_user) : ?>
                <a href="/berita/edit_berita/<?= $brt->slug ?>" class="btn btn-default btn-xs"><i class="fa fa-edit"></i> Edit</a>
                <a href="/berita/hapus_berita/<?= $brt->slug ?>" class="btn btn-default btn-xs btn-ask" data-judul="Hapus" data-text="Hapus <?= $brt->judul ?>"><i class="fa fa-trash"></i> Hapus</a>
              <?php endif ?>
            </div>
          </div>
        </section>
      </div>
    <?php endforeach ?>
  </div>
<?php endif ?>

<?= $this->endSection() ?>