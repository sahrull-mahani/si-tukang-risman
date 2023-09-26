<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <meta name="description" content="#">
  <meta name="keywords" content="#">
  <meta http-equiv="Copyright" content="#">
  <meta name="author" content="#">
  <meta charset="UTF-8">
  <meta name="language" content="Indonesia" />
  <meta name="webcrawlers" content="all" />
  <meta name="rating" content="general" />
  <meta name="spiders" content="all" />
  <meta name="robots" content="all" />

  <link href="https://fonts.googleapis.com/css?family=Nunito+Sans:400,400i,600,600i,700,700i|Roboto+Condensed:400,700,700i|Roboto:400,400i,500,500i,700,700i&display=swap" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css?family=Oswald:400,500&display=swap" rel="stylesheet">

  <link rel="icon" href="/favicon.ico" type="image/x-icon" />
  <title><?= "Si-Tukang| " . $title ?></title>

  <link rel="stylesheet" href="/assets/plugin/bootstrap/css/bootstrap.min.css">
  <link rel="stylesheet" href="/assets/plugin/font-awesome/css/font-awesome.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/lightbox2/2.11.3/css/lightbox.min.css" integrity="sha512-ZKX+BvQihRJPA8CROKBhDNvoc2aDMOdAlcm7TUQY+35XYtrd3yh95QOOhsPDQY9QnKE0Wqag9y38OIgEvb88cA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <link rel="stylesheet" href="/assets/css/style.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.min.css" />
  <link rel="stylesheet" href="/assets/css/caraousel-style.css">
  <!-- CHAR.JS -->
  <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
  <!-- END CHAR.JS -->
</head>

<body>
  <div class="page-wraper">
    <header>
      <div class="px-3 py-2 bg-info text-white">
        <div class="container">
          <div class="d-flex flex-wrap align-items-center justify-content-center justify-content-lg-start">
            <a href="/" class="d-flex align-items-center my-2 my-lg-0 me-lg-auto text-white text-decoration-none">
              <img src="/assets/img/logo.png" class="bi me-2" width="40" height="32" role="img" aria-label="Bootstrap" alt="logo kominfo">
              <h6>Selamat Datang Di Website Kecamatan</h6>
            </a>
            <ul class="nav col-12 col-lg-auto my-2 justify-content-center my-md-0 text-small">
              <li>
                <a href="#" class="nav-link text-white">
                  <i class="bi d-block mx-auto mb1 fa fa-facebook"></i>
                </a>
              </li>
              <li>
                <a href="#" class="nav-link text-white">
                  <i class="bi d-block mx-auto mb1 fa fa-twitter"></i>
                </a>
              </li>
              <li>
                <a href="#" class="nav-link text-white">
                  <i class="bi d-block mx-auto mb1 fa fa-instagram"></i>
                </a>
              </li>
              <li>
                <a href="#" class="nav-link text-white">
                  <i class="bi d-block mx-auto mb1 fa fa-youtube"></i>
                </a>
              </li>
              <li>
                <a href="#" class="nav-link text-white">
                  <i class="bi d-block mx-auto mb1 fa fa-linkedin"></i>
                </a>
              </li>
            </ul>
          </div>
        </div>
      </div>
    </header>
    <nav class="bd-subnavbar navbar navbar-expand-md navbar-dark fixed-top bg-custom-1">
      <div class="container">
        <a class="navbar-brand" href="/">Kecamatan Kaidipang</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarCollapse">
          <ul class="navbar-nav me-auto mb-2 mb-md-0">
            <li class="nav-item">
              <a class="nav-link <?= $active == 'home' ? "active" : '' ?>" aria-current="page" href="/">Beranda</a>
            </li>
            <li class="nav-item">
              <a class="nav-link <?= $active == 'pariwisata' ? "active" : '' ?>" aria-current="page" href="/home/obyek_wisata">Pariwisata</a>
            </li>
            <li class="nav-item dropdown">
              <a class="nav-link <?= $active == 'profil' ? "active" : '' ?> dropdown-toggle" href="#" id="navbarScrollingDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                Profil
              </a>
              <ul class="dropdown-menu" aria-labelledby="navbarScrollingDropdown">
                <li><a class="dropdown-item" href="/home/sejarah">Sejarah</a></li>
                <li><a class="dropdown-item" href="/home/geografis">Letak Geografis</a></li>
                <li><a class="dropdown-item" href="/home/adat_budaya">Adat & Budaya</a></li>
                <li><a class="dropdown-item" href="/home/visi_misi">Visi & Misi</a></li>
                <li><a class="dropdown-item" href="/home/prestasi">Prestasi Kaidipang</a></li>
                <li><a class="dropdown-item" href="/home/struktur">Struktur Organisasi & Kepegawaian</a></li>
              </ul>
            </li>
            <li class="nav-item dropdown">
              <a class="nav-link <?= $active == 'publikasi' ? "active" : '' ?> dropdown-toggle" href="#" id="navbarScrollingDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                Publikasi
              </a>
              <ul class="dropdown-menu" aria-labelledby="navbarScrollingDropdown">
                <li><a class="dropdown-item" href="/home/berita_kecamatan">Berita Kecamantan Kaidipang</a></li>
                <li><a class="dropdown-item" href="/home/berita_kabupaten">Berita Kabupaten Bolaang Mongodow Utara</a></li>
                <li><a class="dropdown-item" href="/home/berita_provinsi">Berita Kecamantan Sulawesi Utara</a></li>
                <li><a class="dropdown-item" href="/home/galeri">Galeri</a></li>
                <li><a class="dropdown-item" href="/home/agenda">Agenda Kegiatan</a></li>
                <li><a class="dropdown-item" href="/home/program_kegiatan">Program Kegiatan</a></li>
                <li><a class="dropdown-item" href="/home/info_wisatawan">Informasi Untuk Wisatawan</a></li>
              </ul>
            </li>
            <li class="nav-item dropdown">
              <a class="nav-link <?= $active == 'potensi' ? "active" : '' ?> dropdown-toggle" href="#" id="navbarScrollingDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                Potensi
              </a>
              <ul class="dropdown-menu" aria-labelledby="navbarScrollingDropdown">
                <li><a class="dropdown-item" href="/home/bidang_peristiwa">Potensi Bidang Perisitiwa</a></li>
                <li><a class="dropdown-item" href="/home/bidang_kelautan">Potensi Bidang Kelautan</a></li>
                <li><a class="dropdown-item" href="/home/bidang_perdagangan">Potensi Bidang Perdagangan</a></li>
                <li><a class="dropdown-item" href="/home/bidang_pertanian">Potensi Bidang Pertanian</a></li>
                <li><a class="dropdown-item" href="/home/bidang_industri">Potensi Bidang Industri</a></li>
                <li><a class="dropdown-item" href="/home/bidang_pendidikan">Potensi Bidang Pendidikan</a></li>
              </ul>
            </li>
            <li class="nav-item dropdown">
              <a class="nav-link <?= $active == 'statistik' ? "active" : '' ?> dropdown-toggle" href="#" id="navbarScrollingDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                Statistik
              </a>
              <ul class="dropdown-menu" aria-labelledby="navbarScrollingDropdown">
                <li><a class="dropdown-item" href="/home/agama">Agama</a></li>
                <li><a class="dropdown-item" href="/home/pekerjaan">Pekerjaan</a></li>
                <li><a class="dropdown-item" href="/home/pendidikan">Pendidikan</a></li>
                <li><a class="dropdown-item" href="/home/status_perkawinan">Status Perkawinan</a></li>
              </ul>
            </li>
            <li class="nav-item">
              <a class="nav-link <?= $active == 'tentang' ? "active" : '' ?>" aria-current="page" href="/home/tentang">Sekilas Kaidipang</a>
            </li>
          </ul>

          <ul class="navbar-nav">
            <li class="nav-item">
              <div class="search-box">
                <button class="btn-search"><i class="fa fa-search"></i></button>
                <input type="text" class="input-search text-custom-2" placeholder="Masukan Kata Kunci...">
              </div>
            </li>
          </ul>

        </div>
      </div>
    </nav>

    <?php if ($active != "home") : ?>
      <?php if ($active != "login") : ?>
        <div class="container mt-5 bg-custom-4 rounded">
          <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item text-capitalize" aria-current="page"><?= $active ?></li>
              <?php if (isset($detail)) : ?>
                <li class="breadcrumb-item text-capitalize" aria-current="page"><?= $detail ?></li>
              <?php endif ?>
              <li class="breadcrumb-item active" aria-current="page"><?= $title ?></li>
            </ol>
          </nav>
        </div>
      <?php endif ?>
    <?php endif ?>
    <?= $this->renderSection('content') ?>
  </div>
  <footer class="bg-dark pt-5 pb-3">
    <div class="container">
      <div class="row">
        <div class="col-md-3">
          <h6 class="text-white">Profil</h6>
          <ul class="list-group list-group-flush footer">
            <li class="list-group-item"><a href="/home/sejarah">Sejarah</a></li>
            <li class="list-group-item"><a href="/home/geografis">Letak Geografis</a></li>
            <li class="list-group-item"><a href="/home/adat_budaya">Adat & Budaya</a></li>
            <li class="list-group-item"><a href="/home/visi_misi">Visi & Misi</a></li>
            <li class="list-group-item"><a href="/home/prestasi">Prestasi Kaidipang</a></li>
            <li class="list-group-item"><a href="/home/struktur">Struktur Organisasi & Tupoksi</a></li>
          </ul>
        </div>
        <div class="col-md-3">
          <h6 class="text-white">Publikasi</h6>
          <ul class="list-group list-group-flush footer">
            <li class="list-group-item"><a href="/home/berita_kecamatan">Berita Kecamatan</a></li>
            <li class="list-group-item"><a href="/home/berita_kabupaten">Berita Kabupaten</a></li>
            <li class="list-group-item"><a href="/home/berita_provinsi">Berita Provinsi</a></li>
            <li class="list-group-item"><a href="/home/galeri">Galeri</a></li>
            <li class="list-group-item"><a href="/home/agenda">Agenda Kegiatan</a></li>
            <li class="list-group-item"><a href="/home/program_kegiatan">Program Kegiatan</a></li>
            <li class="list-group-item"><a href="/home/info_wisatawan">Informasi Wisatawan</a></li>
          </ul>
        </div>
        <div class="col-md-3">
          <h6 class="text-white">Potensi</h6>
          <ul class="list-group list-group-flush footer">
            <li class="list-group-item"><a href="/home/bidang_perisitiwa">Potensi Bidang Peristiwa</a></li>
            <li class="list-group-item"><a href="/home/bidang_kelautan">Potensi Bidang Kelautan</a></li>
            <li class="list-group-item"><a href="/home/bidang_perdagangan">Potensi Bidang Perdagangan</a></li>
            <li class="list-group-item"><a href="/home/bidang_pertanian">Potensi Bidang Pertanian</a></li>
            <li class="list-group-item"><a href="/home/bidang_industri">Potensi Bidang Industri</a></li>
            <li class="list-group-item"><a href="/home/bidang_pendidikan">Potensi Bidang Pendidikan</a></li>
          </ul>
        </div>
        <div class="col-md-3">
          <h6 class="text-white">Kontak</h6>
          <ul class="list-group list-group-flush footer">
            <li class="list-group-item d-flex justify-content-between align-items-start">
              <div class="ms-2 me-auto">
                <div class="fw-bold"><i class="fa fa-map-marker"></i> Alamat</div>
                Kec. Kaidipang Kab. Bolaang Mongondow Utara
              </div>
            </li>
            <li class="list-group-item d-flex justify-content-between align-items-start">
              <div class="ms-2 me-auto">
                <div class="fw-bold"><i class="fa fa-envelope"></i> Email</div>
                camatkaidipang@gmail.com
              </div>
            </li>
            <li class="list-group-item d-flex justify-content-between align-items-start">
              <div class="ms-2 me-auto">
                <div class="fw-bold"><i class="fa fa-globe"></i> Website</div>
                camatkaidipang.bolmutkab.go.id
              </div>
            </li>
          </ul>
          <div class="d-flex justify-content-between footer-medsos">
            <a href="" class="fa fa-facebook-official p-2 rounded-circle bg-primary"></a>
            <a href="" class="fa fa-twitter p-2 rounded-circle bg-info"></a>
            <a href="" class="fa fa-instagram p-2 rounded-circle bg-custom-ig"></a>
            <a href="" class="fa fa-youtube p-2 rounded-circle bg-danger"></a>
            <a href="" class="fa fa-linkedin p-2 rounded-circle bg-custom-linkid"></a>
          </div>
        </div>
      </div>
    </div>
  </footer>
  <div class="footer-bottom py-3">
    <p class="m-0">Copyright &copy; <?= date("Y") ?> | Kecamatan Kaidipang Kabupaten Bolaang Mongondow Utaran</p class="m-0">
  </div>

  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script src="/assets/plugin/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/masonry-layout@4.2.2/dist/masonry.pkgd.min.js" integrity="sha384-GNFwBvfVxBkLMJpYMOABq3c+d3KnQxudP/mGPkzpZSTYykLBNsZEnG2D9G/X/+7D" crossorigin="anonymous" async></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/lightbox2/2.11.3/js/lightbox.min.js" integrity="sha512-k2GFCTbp9rQU412BStrcD/rlwv1PYec9SNrkbQlo6RZCf75l6KcC3UwDY8H5n5hl4v77IDtIPwOk9Dqjs/mMBQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>

  <script src="/assets/js/caraousel-main.js"></script>
  <script src="/assets/js/masonry-main.js"></script>
  <script src="/assets/js/script.js"></script>
</body>

</html>