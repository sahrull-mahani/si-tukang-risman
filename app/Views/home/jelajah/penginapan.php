<?= $this->extend("layout/template") ?>

<?= $this->section("content") ?>
<div class="container mt-5 pb-5">
  <div class="row">
    <div class="col-lg-8">
      <h2>Penginapan</h2>
      <div class="row">
        <div class="col-md-6">
          <div class="card">
            <img src="https://source.unsplash.com/1200x800?beach" class="card-img-top" alt="...">
            <div class="card-body">
              <h5 class="card-title">Card title</h5>
              <a href="/home/detail_penginapan" class="btn btn-primary btn-sm">readmore</a>
            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="col-lg-4">
      <?= $this->include('layout/sidebar') ?>
    </div>
  </div>
</div>
<?= $this->endSection() ?>