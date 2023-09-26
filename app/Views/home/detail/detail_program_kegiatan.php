<?= $this->extend("layout/template") ?>

<?= $this->section("content") ?>
<div class="container mt-5 pb-5">
  <div class="row">
    <div class="col-lg-8">
      <div class="row">
        <div class="col-md-12">
          <small class="text-custom-5 text-uppercase float-end"><i class="fa fa-clock-o"></i> <?= hariIni('D', strtotime($program->published_at)) . ", " . date('d-m-Y H.i', strtotime($program->published_at)) ?> wita</small>
          <h1 class="text-capitalize"><?= $program->judul ?></h1>

          <div class="grid-wrapper mb-5">
            <?php foreach ($gambar as $gbr) : ?>
              <a href="/admin_assets/galeri/<?= $gbr->sumber ?>" class="mason" data-lightbox="masonry" data-title="image-<?= $gbr->sumber ?>">
                <img src="/admin_assets/galeri/<?= $gbr->sumber ?>" alt="" />
              </a>
            <?php endforeach ?>
          </div>

          <p class="text-justify text-alinea"><?= $program->isi_program ?></p>
        </div>

        <h3 class="my-5">Program Lainnya</h3>

        <?php foreach ($programLain as $prg) : ?>
          <div class="col-md-6">
            <div class="card">
              <img src="/admin_assets/galeri" class="card-img-top" alt="...">
              <div class="card-body">
                <h5 class="card-title">Card title</h5>
                <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                <a href="/home/detail_program_kegiatan" class="btn btn-primary">readmore</a>
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