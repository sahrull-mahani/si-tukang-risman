<?= $this->extend('web/_template/index') ?>
<?= $this->section('page-content') ?>

<div class="ftco-blocks-cover-1">
  <div class="ftco-cover-1 overlay" style="background-image: url( <?= base_url('assets_front/images/hero_1.jpg') ?>)">
    <div class="container">
      <div class="row align-items-center">
        <div class="col-lg-5">
          <h1 class="line-bottom">Perfection is always in our mind.</h1>
        </div>
        <div class="col-lg-5 ml-auto"></div>
      </div>
    </div>
  </div>
</div>

<div class="site-section">
  <div class="container">
    <div class="row">
      <div class="col-lg-6 mb-5 mb-lg-0 order-lg-2">
        <img src="<?= base_url('assets_front/images/hero_2.jpg') ?>" alt="Image" class="img-fluid">
      </div>
      <div class="col-lg-4 mr-auto">
        <h2>Sistem Informasi Pencari Jasa Tukang Bangunan</h2>
        <p class="text-justify">Tukang bangunan adalah pekerja yang mempunyai keterampilan dalam bidang pembangunan kebutuhan masyarakat akan seseorang yang memiliki kemampuan khusus dalam masalah pembangunan rumah.</p>
        <p class="text-justify">Pada saat ini masih banyak orang yang kesulitan dalam mencari seseorang untuk membantu pekerjaan yang tidak bisa dilakukan berdasarkan kemapuanya sendiri, untuk karena itu diaplikasi ini masyarakat dapat mencari tukang yang dapat dipekerjaan sesuai dengan tarif yang sesuai dan pekerjaan yang diperlukan.</p>
      </div>
    </div>
  </div>
</div>

<?= $this->endSection() ?>