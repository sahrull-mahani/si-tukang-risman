<?= $this->extend('layout/template') ?>

<?= $this->section('content') ?>

<div class="container mt-lg-5">
  <div class="row">
    <div class="col-lg-8 mb-5">

      <h2 class="mb-5">Adat & Budaya</h2>

    </div>
    <div class="col-lg-4 mb-5">
      <?= $this->include("layout/sidebar") ?>
    </div>
  </div>
</div>

<?= $this->endSection() ?>