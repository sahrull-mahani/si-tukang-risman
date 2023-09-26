<?= $this->extend("layout/template") ?>

<?= $this->section("content") ?>
<div class="container mt-5 pb-5">
  <div class="row">
    <div class="col-lg-8">
      <div class="row">
        <div class="col-md-12">
          <small class="text-custom-5 text-uppercase float-end"><i class="fa fa-clock-o"></i> Senin, 24 februari 2022-14.40 wib | Dibaca : 220 kali</small>
          <h1 class="text-capitalize"><?= isset($params['berita']) ? $params['berita']['judul'] : (isset($params['program']) ? $params['program']['judul'] : 'kosong') ?></h1>

          <?php if (isset($params['program'])) : ?>
            <div class="grid-wrapper mb-5">
              <?php foreach ($params['gambar'] as $gbr) : ?>
                <a href="/admin_assets/galeri/<?= $gbr->sumber ?>" class="mason" data-lightbox="masonry" data-title="image-<?= "okok" ?>">
                  <img src="/admin_assets/galeri/<?= $gbr->sumber ?>" alt="" />
                </a>
              <?php endforeach ?>
            </div>
          <?php endif ?>
        </div>
      </div>
    </div>
    <div class="col-lg-4">
      <?= $this->include('layout/sidebar') ?>
    </div>
  </div>
</div>
<?= $this->endSection() ?>