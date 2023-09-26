<!doctype html>
<html lang="en">

<head>
  <title>Si &mdash; Tukang</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <link href="https://fonts.googleapis.com/css?family=Work+Sans:400,500,700&display=swap" rel="stylesheet">
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">
  <link rel="stylesheet" href="<?= base_url('assets_front/fonts/icomoon/style.css') ?>">
  <!-- <link rel="stylesheet" href="css/bootstrap.min.css"> -->
  <link rel="stylesheet" href="<?= base_url('assets_front/css/bootstrap.min.css') ?>">
  <link rel="stylesheet" href="<?= base_url('assets_front/css/bootstrap-datepicker.css') ?>">
  <link rel="stylesheet" href="<?= base_url('assets_front/css/jquery.fancybox.min.css') ?>">
  <link rel="stylesheet" href="<?= base_url('assets_front/css/owl.carousel.min.css') ?>">
  <link rel="stylesheet" href="<?= base_url('assets_front/css/owl.theme.default.min.css') ?>">
  <link rel="stylesheet" href="<?= base_url('assets_front/fonts/flaticon/font/flaticon.css') ?>">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/fontawesome.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/11.6.5/sweetalert2.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/lightbox2/2.11.3/css/lightbox.min.css" integrity="sha512-ZKX+BvQihRJPA8CROKBhDNvoc2aDMOdAlcm7TUQY+35XYtrd3yh95QOOhsPDQY9QnKE0Wqag9y38OIgEvb88cA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <link rel="stylesheet" href="<?= base_url('assets_front/css/aos.css') ?>">
  <link rel="stylesheet" href="<?= base_url('assets_front/css/style.css') ?>">
  <link rel="stylesheet" href="<?= base_url('assets_front/css/mystyle.css') ?>">

  <!-- MAIN CSS -->

</head>

<body data-spy="scroll" data-target=".site-navbar-target" data-offset="300">


  <div class="site-wrap" id="home-section">

    <div class="site-mobile-menu site-navbar-target">
      <div class="site-mobile-menu-header">
        <div class="site-mobile-menu-close mt-3">
          <span class="icon-close2 js-menu-toggle"></span>
        </div>
      </div>
      <div class="site-mobile-menu-body"></div>
    </div>
    <!-- header -->
    <?= $this->include('web/_template/header.php'); ?>
    <!-- end header -->

    <?= $this->renderSection('page-content') ?>

    <!-- footer -->
    <?= $this->include('web/_template/footer.php'); ?>
    <!-- end footer -->

  </div>

  <script src=" <?= base_url('assets_front/js/jquery-3.3.1.min.js') ?>"></script>
  <script src=" <?= base_url('assets_front/js/popper.min.js') ?>"></script>
  <script src=" <?= base_url('assets_front/js/bootstrap.min.js') ?>"></script>
  <script src=" <?= base_url('assets_front/js/owl.carousel.min.js') ?>"></script>
  <script src=" <?= base_url('assets_front/js/jquery.sticky.js') ?>"></script>
  <script src=" <?= base_url('assets_front/js/jquery.waypoints.min.js') ?>"></script>
  <script src=" <?= base_url('assets_front/js/jquery.animateNumber.min.js') ?>"></script>
  <script src=" <?= base_url('assets_front/js/jquery.fancybox.min.js') ?>"></script>
  <script src=" <?= base_url('assets_front/js/jquery.easing.1.3.js') ?>"></script>
  <script src=" <?= base_url('assets_front/js/bootstrap-datepicker.min.js') ?>"></script>
  <script src=" <?= base_url('assets_front/js/aos.js') ?>"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/11.6.5/sweetalert2.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/lightbox2/2.11.3/js/lightbox.min.js" integrity="sha512-k2GFCTbp9rQU412BStrcD/rlwv1PYec9SNrkbQlo6RZCf75l6KcC3UwDY8H5n5hl4v77IDtIPwOk9Dqjs/mMBQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
  <script src=" <?= base_url('assets_front/js/main.js') ?>"></script>
  <script src=" <?= base_url('assets_front/js/script.js') ?>"></script>

</body>

</html>