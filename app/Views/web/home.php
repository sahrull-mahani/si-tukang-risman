<?= $this->extend('web/_template/index'); ?>
<?= $this->section('page-content'); ?>

<div class="ftco-blocks-cover-1">
  <div class="ftco-cover-1 overlay" style="background-image: url( <?= base_url('assets_front/images/hero_1.jpg') ?>)">
    <div class="container">
      <div class="row align-items-center">
        <div class="col-lg-5">
          <h1 class="line-bottom">Kesempurnaan selalu ada dalam pikiran kami.</h1>
        </div>
        <div class="col-lg-5 ml-auto"></div>
      </div>
    </div>
  </div>
</div>

<div class="site-section" style="background-color: #dedffe;">
  <div class="container">
    <div class="row align-items-stretch">

      <?php foreach ($kategori as $key => $row) : ?>
        <?php
        $img = [
          site_url('assets_front/images/flaticon/svg/001-renovation.svg'),
          site_url('assets_front/images/flaticon/svg/002-shovel.svg'),
          site_url('assets_front/images/flaticon/svg/003-bulldozer.svg'),
          site_url('assets_front/images/flaticon/svg/004-house-plan.svg'),
          site_url('assets_front/images/flaticon/svg/005-fence.svg'),
          site_url('assets_front/images/flaticon/svg/006-wheelbarrow.svg'),
        ];
        switch ($key) {
          case 0:
            $int = 0;
            break;
          case 1:
            $int = 1;
            break;
          case 2:
            $int = 2;
            break;
          case 3:
            $int = 3;
            break;
          case 4:
            $int = 4;
            break;
          case 5:
            $int = 5;
            break;
          default:
            $int = rand(0, 5);
            break;
        }
        ?>
        <div class="col-md-6 mb-5 mb-lg-5 col-lg-4">
          <div class="service-2 h-100">
            <div class="svg">
              <img src="<?= $img[$int] ?>" alt="Image" class="">
            </div>

            <h3><span><?= ucwords($row->nama_kategori) ?></span></h3>
            <p><?= $row->keterangan ?></p>

          </div>
        </div>
      <?php endforeach ?>

    </div>
  </div>
</div>

<div class="site-section bg-light">
  <div class="container">
    <div class="row mb-5">
      <div class="col-md-4 mx-auto">
        <h2 class="line-bottom text-center">Testimoni</h2>
      </div>
    </div>
    <div class="row">

      <?php foreach ($orderan as $row) : ?>
        <div class="col-lg-6">
          <div class="testimonial-3">
            <blockquote><?= ucfirst($row->keterangan) ?></blockquote>
            <div class="vcard d-flex align-items-center">
              <div class="img-wrap mr-3">
                <img src="<?= $row->img == 'profile.png' ? 'admin_assets/img/profile.png' : site_url("web/img_thumb/$row->img") ?>" alt="Image" class="img-fluid">
              </div>
              <div>
                <span class="d-block"><?= ucwords($row->nama_user) ?></span>
                <span class="position">Klaen</span>
              </div>
            </div>
          </div>
        </div>
      <?php endforeach ?>

    </div>
  </div>
</div>

<div class="site-section">
  <div class="container">
    <div class="row mb-4">

      <div class="col-md-4 mx-auto">
        <h2 class="line-bottom text-center">Proyek Kami</h2>
      </div>

    </div>

    <div class="row">

      <?php foreach ($galeri as $row) : ?>
        <div class="col-md-6 mb-5 mb-lg-5 col-lg-4">
          <div class="project-item">

            <img src="<?= site_url("web/img_medium/$row->sumber") ?>" alt="Image" class="img-fluid" width="100%" style="height: 300px; object-fit: cover;">

            <div class="project-item-overlay">
              <a class="category" href="<?= site_url("web/img_medium/$row->sumber") ?>" data-lightbox="lightbox">Lihat</a>
              <a class="plus" href="<?= site_url("web/img_medium/$row->sumber") ?>" data-lightbox="lightbox">
                <span class="icon-plus"></span>
              </a>

              <a href="#" class="project-title d-none"><span>Renovasi</span></a>
            </div>

          </div>
        </div>
      <?php endforeach ?>

    </div>
  </div>
</div>

<div class="site-section">
  <div class="container">
    <div class="row mb-4">

      <div class="col-md-4 mx-auto">
        <h2 class="line-bottom text-center">Berita Kami</h2>
      </div>

    </div>

    <div class="row">

      <?php foreach ($berita as $row) : ?>
        <div class="col-lg-4 col-md-6 mb-4">
          <div class="post-entry-1 h-100">
            <a href="<?= site_url("web/detail/$row->slug") ?>">
              <img src="<?= site_url("web/img_medium/$row->sumber") ?>" alt="Image" class="img-fluid">
            </a>
            <div class="post-entry-1-contents">

              <h2><a href="<?= site_url("web/detail/$row->slug") ?>"><?= ucwords($row->judul) ?></a></h2>
              <span class="meta d-inline-block mb-3"><?= date('M d, Y', strtok($row->updated_at)) ?> <span class="mx-2">by</span> <a href="#">Admin</a></span>
              <p><?= substr(strip_tags($row->isi_berita), 0, 200) ?>...</p>
            </div>
          </div>
        </div>
      <?php endforeach ?>

    </div>
  </div>
</div>

<?= $this->endSection() ?>