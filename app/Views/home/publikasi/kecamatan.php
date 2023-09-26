<?= $this->extend("layout/template") ?>

<?= $this->section("content") ?>

<div class="container mt-lg-5">
  <div class="row">
    <div class="col-lg-8 mb-5">

      <h2 class="text-center">Berita Kecamatan</h2>
      <div class="divider-custom mb-5 text-center"></div>

      <div class="row">
        <div class="col-md-12 my-3">
          <div class="card p-2">

            <div class="input-group">
              <select class="form-select" aria-label="Default select example">
                <option selected disabled>Tanggal</option>
                <?php for($i = 1; $i < 32; $i++) : ?>
                  <option value="<?= $i ?>"><?= $i ?></option>
                <?php endfor ?>
              </select>
              <select class="form-select" aria-label="Default select example">
                <option selected disabled>Bulan</option>
                <?php for($i = 1; $i < 13; $i++) : ?>
                  <option value="<?= $i ?>"><?= $i ?></option>
                <?php endfor ?>
              </select>
              <select class="form-select" aria-label="Default select example">
                <option selected>Tahun</option>
                <?php for($i = 0; $i < 6; $i++) : ?>
                  <option value="200<?= $i ?>"><?= "200".$i ?></option>
                <?php endfor ?>
              </select>
              <button class="btn btn-primary">Cari</button>
            </div>

          </div>
        </div>
        <?php for ($i = 0; $i <= 10; $i++) : ?>
          <div class="col-md-12 mt-5 mb-3">
            <div class="row">
              <div class="col-md-6">
                <a href="" class="img-hover">
                  <div class="card-img-responsive">
                    <img src="/assets/img/download.jpg" alt="img-fluid">
                  </div>
                </a>
              </div>
              <div class="col-md-6 mt-3">
                <small class="text-warning text-uppercase d-block">jumat, 04 februari | <i class="fa fa-clock-o"></i>
                  16.00 wib</small>
                <h3 class="font-weight-bold">Lorem ipsum dolor sit. Lorem, ipsum dolor.</h3>
                Lorem ipsum dolor, sit amet consectetur adipisicing elit. Maxime, illum! Iste aperiam doloribus earum
                nisi cumque, ullam at maxime tempora voluptas saepe veniam nemo sapiente minima, harum sunt illum
                debitis.
                <a href="#">read more...</a>
              </div>
            </div>
          </div>
        <?php endfor ?>
      </div>
    </div>
    <div class="col-lg-4 mb-5">
      <?= $this->include("layout/sidebar") ?>
    </div>
  </div>
</div>

<?= $this->endSection() ?>