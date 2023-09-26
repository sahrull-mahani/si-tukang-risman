<?= $this->extend('layout/template') ?>

<?= $this->section('content') ?>
<div class="container mt-4">
  <div class="row">
    <h2>Judul</h2>
    <div class="col-lg-8">
      <table class="table table-bordered">
        <tbody>
          <tr>
            <th scope="row">Tanggal</th>
            <td>:</td>
            <td class="text-uppercase"><?= $detailAgenda['judul'] ?></td>
          </tr>
          <tr>
            <th scope="row">Jam</th>
            <td>:</td>
            <td class="text-uppercase"><?= date('H.i', strtotime($detailAgenda['published_at'])) ?> WITA</td>
          </tr>
          <tr>
            <th scope="row">Agenda</th>
            <td>:</td>
            <td class="text-uppercase"><?= $detailAgenda['isi_agenda'] ?></td>
          </tr>
          <tr>
            <th scope="row">Lokasi</th>
            <td>:</td>
            <td class="text-uppercase"><?= $detailAgenda['lokasi'] ?></td>
          </tr>
        </tbody>
      </table>
    </div>
    <div class="col-lg-4"><?= $this->include('layout/sidebar') ?></div>
  </div>
</div>
<?= $this->endSection() ?>