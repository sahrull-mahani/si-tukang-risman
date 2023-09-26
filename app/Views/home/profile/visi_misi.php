<?= $this->extend('layout/template') ?>

<?= $this->section('content') ?>

<div class="container mt-lg-5">
  <div class="row">
    <div class="col-lg-8 mb-5">

      <h2 class="mb-5">Adat & Budaya</h2>

      <p class="text-justify text-alinea">
        Visi Kecamatan Rupat dirumuskan dan diarahkan untuk menunjang terwujudnya Visi Pemerintah Kabupaten Bengkalis, berdasarkan ketentuan tersebut Visi Kecamatan Rupat diharapkan mampu berperan dalam dinamika perubahan lingkungan strategis, sehingga dalam mengemban tugas Pokok dan fungsinya dapat bergerak maju menuju masa depan yang lebih baik.
      </p>

      <h3 class="mb-1">Motto</h3>
      <blockquote class="blockstyle"> <span class="triangle"></span>The Kadence Importer allows you to easily import all including images, from any of our Kadence themes demos. When you install a Kadence theme, the importer will automatically see what theme you are using and give you options to import anyone of those themes </blockquote>
    </div>
    <div class="col-lg-4 mb-5">
      <?= $this->include("layout/sidebar") ?>
    </div>
  </div>
</div>

<?= $this->endSection() ?>