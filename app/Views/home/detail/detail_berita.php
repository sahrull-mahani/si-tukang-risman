<?= $this->extend("layout/template") ?>

<?= $this->section("content") ?>
<div class="container mt-5 pb-5">
  <div class="row">
    <div class="col-lg-8">
      <div class="row">
        <div class="col-md-12">
          <h6 class="text-custom-5 text-uppercase"><i class="fa fa-clock-o"></i> <?= hariIni('D', strtotime($berita['published_at'])). ", " . date("d-m-Y H.i", strtotime($berita['published_at'])) ?> wita | Dibaca : <?= $total ?> kali</h6>
          <h1 class="text-capitalize"><?= $berita['judul'] ?></h1>
          <small class="text-custom-5 text-uppercase mb-4">
            <i class="fa fa-user"></i> Editor: <span class="text-capitalize"><?= $user->fullname ? $user->fullname : $user->username ?></span> <i class="fa fa-tags"></i> Berita <?= $berita['level'] == 1 ? 'Provinsi' : ($berita['level'] == 2 ? 'Kabupaten' : 'Kecamatan') ?> <i class="fa fa-camera"></i> FOTO: <span class="text-capitalize"><?= $user->fullname ? $user->fullname : $user->username ?></span>
          </small>

          <div class="img-detail-berita rounded mt-4 mb-3">
            <img src="/admin_assets/galeri/<?= $berita['gambar'] ?>" alt="">
          </div>

          <p class="text-alinea text-justify"><?= $berita['isi_berita'] ?></p>
        </div>

        <h3 class="my-5">Berita Lainnya</h3>

        <?php foreach ($beritaLain as $brt) : ?>
        <div class="col-md-6">
          <div class="card">
            <img src="/admin_assets/galeri/<?= $brt->gambar ?>" class="card-img-top" alt="...">
            <div class="card-body">
              <h5 class="card-title"><?= $brt->judul ?></h5>
              <p class="card-text"><?= $brt->excerpt ?>...</p>
              <a href="/home/detail_berita/<?= $brt->slug."_".$brt->id ?>" class="btn btn-primary">readmore</a>
            </div>
          </div>
        </div>
        <?php endforeach ?>
      </div>
    </div>
    <div class="col-lg-4">
      <?= $this->include('layout/sidebar') ?>
    </div>
  </div>
</div>
<?= $this->endSection() ?>