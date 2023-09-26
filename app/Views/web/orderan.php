<?= $this->extend('web/_template/index') ?>
<?= $this->section('page-content') ?>

<div class="ftco-blocks-cover-1">
  <div class="ftco-cover-1 overlay innerpage" style="background-image: url(<?= site_url('assets_front/images/hero_2.jpg') ?>)">
    <div class="container">
      <div class="row align-items-center justify-content-center">
        <div class="col-lg-6 text-center">
          <h1>List Orderan</h1>
          <p>Daftar rental tukang yang oernah dirental</p>
        </div>
      </div>
    </div>
  </div>
</div>

<div class="site-section bg-light" id="contact-section">
  <div class="container">
    <div class="row justify-content-center text-center">
      <div class="col-8 text-center mb-5">

        <div class="accordion" id="accordionExample">

          <?php if (!empty($orderan)) : ?>
            <?php foreach ($orderan as $key => $row) : ?>
              <div class="card">
                <div class="card-header" id="headingOne">
                  <h2 class="mb-0">
                    <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#<?= "colapse-$key" ?>" aria-expanded="true" aria-controls="<?= "colapse-$key" ?>">
                      Oderan Tanggal <?= $row->created_at ?>
                    </button>
                  </h2>
                </div>

                <div id="<?= "colapse-$key" ?>" class="collapse" aria-labelledby="headingOne" data-parent="#accordionExample">
                  <div class="card-body">

                    <div class="row">
                      <div class="col-sm-4">
                        <img src="<?= $row->foto == 'profile.png' ? '/admin_assets/img/profile.png' : site_url("web/img_thumb/$row->foto") ?>" alt="Foto Tukang" width="100">
                      </div>
                      <div class="col-sm-8">
                        <ul class="list-group list-group-flush">
                          <li class="list-group-item d-flex justify-content-between align-items-center">
                            Nama
                            <h6><?= ucwords($row->nama) ?></h6>
                          </li>
                          <li class="list-group-item d-flex justify-content-between align-items-center">
                            Kategori
                            <h6><?= getKategori($row->id) ?></h6>
                          </li>
                          <li class="list-group-item d-flex justify-content-between align-items-center">
                            Durasi
                            <h6><?= $row->durasi ?></h6>
                          </li>
                          <li class="list-group-item d-flex justify-content-between align-items-center">
                            Total Harga
                            <small class="bg-primary text-white rounded-pill px-2"><?= rupiah((int)filter_var($row->durasi, FILTER_SANITIZE_NUMBER_INT) * (int)$row->tarif) ?></small>
                          </li>
                          <li class="list-group-item d-flex justify-content-between align-items-center">
                            Rating
                            <?php for ($i = 1; $i <= $row->rating; $i++) : ?>
                              <span class="icon-star text-warning"></span>
                            <?php endfor ?>
                            <?php for ($i = 1; $i <= 5 - $row->rating; $i++) : ?>
                              <span class="icon-star-o text-warning"></span>
                            <?php endfor ?>
                          </li>
                        </ul>
                      </div>
                    </div>

                  </div>
                </div>
              </div>
            <?php endforeach ?>
          <?php else : ?>
            Belum <a href="/web/proyek">Order Tukang</a>
          <?php endif ?>

        </div>

      </div>

      <div class="col-4">
        <h3 class="text-right">Berita Terbaru</h3>
        <?php if ($berita) : ?>
          <div class="card">
            <img src="<?= site_url("web/img_medium/$berita->sumber") ?>" class="card-img-top" alt="Berita">
            <div class="card-body">
              <h5 class="card-title"><?= ucwords($berita->judul) ?></h5>
              <p class="card-text text-justify"><?= substr(strip_tags($berita->isi_berita), 0, 100) ?>...</p>
              <a href="<?= site_url("web/detail/$berita->slug") ?>" class="btn btn-primary">Detail</a>
            </div>
          </div>
        <?php else : ?>
          <div class="card">
            <h6>Belum ada berita</h6>
          </div>
        <?php endif ?>
      </div>

    </div>
    <div class="row">
      <div class="col-lg-12 mb-5">

      </div>
    </div>
  </div>
</div>

<?= $this->endSection() ?>