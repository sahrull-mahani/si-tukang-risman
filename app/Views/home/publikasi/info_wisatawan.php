<?= $this->extend("layout/template") ?>

<?= $this->section("content") ?>
<div class="container mt-5">
  <div class="row">
    <div class="col-lg-8">
      <div class="col-md-12 text-center mb-5">
        <h2>Informasi Wisatawan</h2>
        <div class="divider-custom"></div>
      </div>

      <div class="col-md-12">
        <div class="row">
          <div class="col-md">
            Lorem ipsum dolor sit amet consectetur adipisicing elit. Amet, corporis.
          </div>
        </div>
      </div>
    </div>

    <div class="col-lg-4">
      <?= $this->include("layout/sidebar") ?>
    </div>
  </div>
</div>
<?= $this->endSection() ?>