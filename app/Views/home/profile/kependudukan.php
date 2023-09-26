<?= $this->extend('layout/template') ?>

<?= $this->section('content') ?>

<div class="container mt-lg-5">
  <div class="row">
    <div class="col-lg-8 mb-5">

      <h2 class="mb-5">Kependudukan</h2>

      <table class="table">
        <thead>
          <tr>
            <th scope="col">#</th>
            <th scope="col">First</th>
            <th scope="col">Last</th>
            <th scope="col">Handle</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <th scope="row">1</th>
            <td>Mark</td>
            <td>Otto</td>
            <td>@mdo</td>
          </tr>
          <tr>
            <th scope="row">2</th>
            <td>Jacob</td>
            <td>Thornton</td>
            <td>@fat</td>
          </tr>
          <tr>
            <th scope="row">3</th>
            <td colspan="2">Larry the Bird</td>
            <td>@twitter</td>
          </tr>
        </tbody>
      </table>
    </div>
    <div class="col-lg-4 mb-5">
      <?= $this->include("layout/sidebar") ?>
    </div>
  </div>
</div>

<?= $this->endSection() ?>