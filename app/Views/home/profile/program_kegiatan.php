<?= $this->extend("layout/template") ?>

<?= $this->section("content") ?>
<div class="container">
  <div class="row">
    <div class="col-lg-8">
      <div class="row">
        <?php foreach ($program as $prg) : ?>
          <div class="col-md-6 my-3">
            <div class="program-box">
              <img src="/admin_assets/galeri/<?= $prg->sumber ?>" alt="com">
              <div class="program-overlay">
                <div class="program-link"><a href="/home/detail_program_kegiatan/<?= $prg->id ?>" class="fw-bold">Lihat</a></div>
                <div class="program-text"><?= $prg->judul ?></div>
              </div>
            </div>
          </div>
        <?php endforeach ?>
      </div>
    </div>

    <div class="col-lg-4">
      <?= $this->include("layout/sidebar") ?>
    </div>
  </div>
</div>
<?= $this->endSection() ?>