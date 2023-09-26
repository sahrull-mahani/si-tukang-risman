<?= $this->extend('web/_template/index') ?>
<?= $this->section('page-content') ?>
<div class="ftco-blocks-cover-1">
  <div class="ftco-cover-1 innerpage overlay" style="background-image: url(<?= base_url('assets_front/images/hero_2.jpg') ?>)">
    <div class="container">
      <div class="row align-items-center justify-content-center">
        <div class="col-lg-6 text-center">
          <span class="d-block mb-3 text-white" data-aos="fade-up"><?= date('M d, Y', strtotime($berita->updated_at)) ?> <span class="mx-2 text-primary">&bullet;</span> by <?= ucwords($author->nama_user) ?></span>
          <h1 class="mb-4" data-aos="fade-up" data-aos-delay="100"><?= ucwords($berita->judul) ?></h1>
        </div>
      </div>
    </div>
  </div>
</div>


<div class="site-section">
  <div class="container">
    <div class="row">
      <div class="col-md-8 blog-content">
        <p class="text-justify">
          <?= $berita->isi_berita ?>
        </p>
        <hr>
        <h3>Berita Galeri</h3>
        <div class="row">
          <?php foreach ($galeri->galeriLikeWhere('berita_', $berita->id)->findAll() as $row) : ?>
            <div class="col-md-6 my-2">
              <a href="<?= site_url("web/img_medium/$row->sumber") ?>" data-lightbox="lightbox">
                <img src="<?= site_url("web/img_thumb/$row->sumber") ?>" alt="" width="250">
              </a>
            </div>
          <?php endforeach ?>
        </div>
      </div>
      <div class="col-md-4 sidebar">
        <div class="sidebar-box">
          <img src="<?= $author->img == 'profile.png' ? '/admin_assets/img/profile.png' : site_url("web/img_medium/$author->img") ?>" alt="Free Website Template by Free-Template.co" class="img-fluid img-thumbnail mb-4 w-50 border border-primary rounded-circle mx-auto d-block">
          <h3 class="text-black">About The Author</h3>
          <ul class="list-group">
            <li class="list-group-item"><?= ucwords($author->nama_user) ?></li>
            <li class="list-group-item"><?= $author->phone ?></li>
          </ul>
        </div>
      </div>
    </div>
  </div>
</div>
<?= $this->endSection() ?>