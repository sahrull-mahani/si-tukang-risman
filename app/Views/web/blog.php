<?= $this->extend('web/_template/index') ?>
<?= $this->section('page-content') ?>

<div class="ftco-blocks-cover-1" style="height: 200px; overflow: hidden;">
  <div class="ftco-cover-1 overlay innerpage" style="background-image: url(<?= base_url('assets_front/images/hero_2.jpg') ?>)">
    <div class="container">
      <div class="row align-items-center justify-content-center">
        <div class="col-lg-6 text-center">
          <h1>Berita Kami</h1>
          <p>Disini anda dapat melihat data data berita berisikan tentang perkembangan tukang</p>
        </div>
      </div>
    </div>
  </div>
</div>

<div class="site-section bg-light">
  <div class="container">
    <div class="row">

      <?php foreach($berita as $row) : ?>
      <div class="col-lg-4 col-md-6 mb-4">
        <div class="post-entry-1 h-100">
          <a href="<?= site_url("web/img_medium/$row->sumber") ?>" data-lightbox="<?= $row->slug ?>">
            <img src="<?= site_url("web/img_medium/$row->sumber") ?>" alt="Image" class="img-fluid">
          </a>
          <div class="post-entry-1-contents">
            <h2><a href="<?= site_url("web/detail/$row->slug") ?>"><?= ucwords($row->judul) ?></a></h2>
            <span class="meta d-inline-block mb-3"><?= date('M d, Y', strtotime($row->updated_at)) ?> <span class="mx-2">by</span> <a href="#">Admin</a></span>
            <p class="text-justify"><?= substr(strip_tags($row->isi_berita), 0, 200) ?>...</p>
          </div>
        </div>
      </div>
      <?php endforeach ?>

      <!-- <div class="col-12 mt-5 text-center">
        <span class="p-3">1</span>
        <a href="#" class="p-3">2</a>
        <a href="#" class="p-3">3</a>
        <a href="#" class="p-3">4</a>
      </div> -->
    </div>
  </div>
</div>

<?= $this->endSection() ?>