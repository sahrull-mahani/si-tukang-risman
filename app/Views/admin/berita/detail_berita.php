<?= $this->extend('layout/_template') ?>

<?= $this->section('contentAdmin') ?>
<section class="content-header">
  <h1>
    <?= $berita->judul ?>
    <small>Control panel</small>
  </h1>
  <ol class="breadcrumb">
    <li><a href="/admin"><i class="fa fa-dashboard"></i> Home</a></li>
    <li class="">Berita</li>
    <li class="active"><?= $berita->judul ?></li>
  </ol>
</section>

<section class="content">
  <div class="row">
    <div class="col-md-12">
      <div class="box box-success">
        <div class="box-header with-border">
          <h3 class="box-title"><?= $berita->judul ?></h3>

          <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
          </div>
          <!-- /.box-tools -->
        </div>
        <!-- /.box-header -->
        <div class="box-body">
          <img class="img-responsive pad" src="/admin_assets/galeri/<?= $berita->gambar ?>" alt="Photo" style="width: 100%; margin-bottom: 20px;" class="d-flex">
          <i class="fa fa-clock-o"></i> <?= hariIni('D', strtotime($berita->created_at)) . ", " . date('d-m-Y H.i', strtotime($berita->created_at)) . " - " . $berita->username ?>
          <hr>
          <?= $berita->isi_berita ?>
          <hr>

          <?php if (session('user')['id'] == $berita->id_user) : ?>
            <?php if ($berita->published_at == null) : ?>
              <a href="/berita/publish_berita/<?= $berita->id_berita ?>" class="btn btn-primary btn-ask" data-judul="Publish" data-text="Publish <?= $berita->judul ?>">PUBLISH</a>
            <?php else : ?>
              <a href="/berita/unpublish_berita/<?= $berita->id_berita ?>" class="btn btn-danger btn-ask" data-judul="Publish" data-text="Publish <?= $berita->judul ?>">UNPUBLISH</a>
            <?php endif ?>
          <?php elseif (session('user')['level'] == 1) : ?>
            <?php if ($berita->published_at == null) : ?>
              <a href="/berita/publish_berita/<?= $berita->id_berita ?>" class="btn btn-primary btn-ask" data-judul="Publish" data-text="Publish <?= $berita->judul ?>">PUBLISH</a>
            <?php else : ?>
              <a href="/berita/unpublish_berita/<?= $berita->id_berita ?>" class="btn btn-danger btn-ask" data-judul="Publish" data-text="Publish <?= $berita->judul ?>">UNPUBLISH</a>
            <?php endif ?>
          <?php endif ?>
        </div>
        <!-- /.box-body -->
      </div>
      <!-- /.box -->
    </div>
  </div>
</section>
<?= $this->endSection() ?>