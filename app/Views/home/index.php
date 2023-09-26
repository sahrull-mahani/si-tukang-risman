<?= $this->extend('layout/template') ?>

<?= $this->section('content') ?>
<div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img src="https://source.unsplash.com/1290x645?computer" class="d-block w-100 img-fluid" alt="...">
    </div>
    <div class="carousel-item">
      <img src="https://source.unsplash.com/1290x645?office" class="d-block w-100 img-fluid" alt="...">
    </div>
    <div class="carousel-item">
      <img src="https://source.unsplash.com/1290x645?coffee" class="d-block w-100 img-fluid" alt="...">
    </div>
  </div>
  <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Previous</span>
  </button>
  <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Next</span>
  </button>
</div>
<div class="container mt-lg-5">
  <div class="row">
    <div class="col-lg-8 mb-10">
      <div class="row">
        <div class="col-md-12">
          <div class="card">
            <div class="card-body">
              <h3 class="mb-15 title">Lorem ipsum dolor sit amet.</h3>
              Lorem ipsum dolor sit amet consectetur adipisicing elit. In dolore quisquam earum,
              nihil recusandae eos iusto vero corrupti, optio possimus delectus, soluta repellat
              distinctio magnam saepe labore at? Sunt, laboriosam?
              <div class="d-flex mt-2">
                <div class="flex-shrink-0">
                  <img src="https://camatrupat.bengkaliskab.go.id/camat.png" alt="John Doe" class="mr-3 rounded-circle" style="width:60px;">
                </div>
                <div class="flex-grow-1 ms-3">
                  <h5 class="mb-0">Lorem ipsum dolor sit amet.</h5>
                  <p>Lorem, ipsum dolor.</p>
                </div>
              </div>
            </div>
          </div>
        </div>

        <?php foreach ($berita as $brt) : ?>
          <div class="col-md-12 mt-5 mb-3">
            <div class="row">
              <div class="col-md-6">
                <a href="/home/detail_berita/<?= $brt['slug'] . "_" . $brt['id'] ?>" class="img-hover">
                  <div class="card-img-responsive">
                    <img src="/admin_assets/galeri/<?= $brt['gambar'] ?>" alt="img-fluid">
                  </div>
                </a>
              </div>
              <div class="col-md-6 mt-3">
                <small class="text-warning text-uppercase d-block"><i class="fa fa-clock-o"></i> <?= $brt['published_at'] ?> WITA</small>
                <h3 class="font-weight-bold"><?= $brt['judul'] ?></h3>
                <?= strip_tags(html_entity_decode($brt['excerpt'])) ?>
                <a href="/home/detail_berita/<?= $brt['slug'] . "_" . $brt['id'] ?>">read more...</a>
              </div>
            </div>
          </div>
        <?php endforeach ?>

      </div>
    </div>
    <!-- SIDEBAR -->
    <div class="col-lg-4">
      <?= $this->include('layout/sidebar') ?>
    </div>
    <!-- END SIDEBAR -->
  </div>
</div>
<!-- </div> -->

<section class="ftco-section">
  <div class="container">
    <div class="row">
      <div class="col-md-12 text-center mb-5">
        <h2 class="heading-section">#KecamatanKaidipang</h2>
        <div class="divider-custom"></div>
      </div>
      <div class="col-md-12">
        <div class="featured-carousel owl-carousel">
          <?php foreach ($pariwisata as $prt) : ?>
            <div class="item">
              <div class="work">
                <div class="img d-flex align-items-end justify-content-center" style="background-image: url(/admin_assets/galeri/<?= $prt->sumber ?>);">
                  <div class="text w-100">
                    <span class="cat">Wisata</span>
                    <h3><a href="/home/detail_obwisata/<?= $prt->id_sumber ?>"><?= ucwords($prt->nama) ?></a></h3>
                  </div>
                </div>
              </div>
            </div>
          <?php endforeach ?>
        </div>
      </div>
    </div>
  </div>
</section>

<section class="bg-custom-5 pt-5 mb-5 pb-5">
  <div class="container">
    <div class="row">
      <div class="col-md-12 text-center mb-5">
        <h2>#Jelajah</h2>
        <div class="divider-custom"></div>
      </div>
      <div class="col-md-12">
        <div class="row">
          <div class="col-md-4 my-4 my-4">
            <a href="/home/obyek_wisata" class="jajak-link">
              <div class="bg-white my-2 jajak-box">
                <div class="jajak-icon fa fa-map-o text-custom-1 mb-3 mt-5"></div>
                <div class="jajak-text">01</div>
                <div class="fs-1">Obyek Wisata</div>
              </div>
            </a>
          </div>
          <div class="col-md-4 my-4">
            <a href="/home/kuliner" class="jajak-link">
              <div class="bg-white my-2 jajak-box">
                <div class="jajak-icon fa fa-cutlery text-custom-1 mb-3 mt-5"></div>
                <div class="jajak-text">02</div>
                <div class="fs-1">Kuliner</div>
              </div>
            </a>
          </div>
          <div class="col-md-4 my-4">
            <a href="/home/penginapan" class="jajak-link">
              <div class="bg-white my-2 jajak-box">
                <div class="jajak-icon fa fa-bed text-custom-1 mb-3 mt-5"></div>
                <div class="jajak-text">03</div>
                <div class="fs-1">Penginapan</div>
              </div>
            </a>
          </div>
<!--           <div class="col-md-4 my-4">
            <a href="/home/transportasi" class="jajak-link">
              <div class="bg-white my-2 jajak-box">
                <div class="jajak-icon fa fa-bus text-custom-1 mb-3 mt-5"></div>
                <div class="jajak-text">02</div>
                <div class="fs-1">Transportasi</div>
              </div>
            </a>
          </div> -->
          <!-- <div class="col-md-4 my-4">
            <a href="/home/oleh_oleh" class="jajak-link">
              <div class="bg-white my-2 jajak-box">
                <div class="jajak-icon fa fa-gift text-custom-1 mb-3 mt-5"></div>
                <div class="jajak-text">04</div>
                <div class="fs-1">Oleh-oleh</div>
              </div>
            </a>
          </div> -->
          <!-- <div class="col-md-4 my-4">
            <a href="/home/home_stay" class="jajak-link">
              <div class="bg-white my-2 jajak-box">
                <div class="jajak-icon fa fa-home text-custom-1 mb-3 mt-5"></div>
                <div class="jajak-text">06</div>
                <div class="fs-1">Home Stay</div>
              </div>
            </a>
          </div> -->

        </div>
      </div>
    </div>
  </div>

</section>

<section class="mt-5 pb-5">
  <div class="container">
    <div class="row">
      <div class="col-md-12 text-center mb-5">
        <h2>Program Kegiatan</h2>
        <div class="divider-custom"></div>
      </div>
      <div class="col-md-12">
        <div class="row">
          <?php foreach ($program as $prg) : ?>
            <div class="col-md-4 my-3">
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
      <div class="col-md-12 mt-4 text-center">
        <a href="/home/program_kegiatan" class="btn btn-info text-white">load more</a>
      </div>
    </div>
  </div>
</section>

<!-- <section class="mt-5 py-5 bg-custom-5">
  <div class="container">
    <div class="row">
      <div class="col-md-12 text-center mb-5">
        <h2>#Galeri Kegiatan</h2>
        <div class="divider-custom"></div>
      </div>

      <div class="col-md-12">
        <div class="row">
          <div class="col-lg-4 my-2">
            <div class="card">
              <div class="overlay-img">
                <img src="https://source.unsplash.com/400x400?computer" class="card-img-top" alt="...">
              </div>
              <div class="card-body">
                <h5 class="card-title"><a href="https://source.unsplash.com/400x400?computer" data-lightbox="computer" data-title="com">Link</a></h5>
                <small class="text-muted">Rabu, 09 Maret 2022</small>
              </div>
            </div>
          </div>
          <div class="col-lg-4 my-2">
            <div class="card">
              <div class="overlay-img">
                <img src="https://source.unsplash.com/400x700?computer" class="card-img-top" alt="...">
              </div>
              <div class="card-body">
                <h5 class="card-title"><a href="https://source.unsplash.com/400x700?computer" data-lightbox="computer" data-title="com">Link</a></h5>
                <small class="text-muted">Rabu, 09 Maret 2022</small>
              </div>
            </div>
          </div>
          <div class="col-lg-4 my-2">
            <div class="card">
              <div class="overlay-img">
                <img src="https://source.unsplash.com/1200x400?computer" class="card-img-top" alt="...">
              </div>
              <div class="card-body">
                <h5 class="card-title"><a href="https://source.unsplash.com/1200x400?computer" data-lightbox="computer" data-title="com">Link</a></h5>
                <small class="text-muted">Rabu, 09 Maret 2022</small>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section> -->
<?= $this->endSection() ?>