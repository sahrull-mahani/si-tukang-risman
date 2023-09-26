<?= $this->extend("layout/template") ?>

<?= $this->section("content") ?>
<div class="container mt-5">
  <div class="row">
    <div class="col-lg-8">
      <div class="col-md-12 text-center mb-5">
        <h2>Agenda Kegiatan</h2>
        <div class="divider-custom"></div>
      </div>

      <div class="col-md-12">
        <div class="row">
          <div class="col-md">
            <table class="table">
              <thead>
                <tr>
                  <th scope="col">No</th>
                  <th scope="col">Judul Agenda</th>
                  <th scope="col">Tanggal</th>
                  <th scope="col">Tindakan</th>
                </tr>
              </thead>
              <tbody>
                <?php $no=1 ?>
                <?php foreach($agendaFull as $agn) : ?>
                <tr>
                  <th scope="row"><?= $no++ ?></th>
                  <td class="text-uppercase"><?= $agn['judul'] ?></td>
                  <td><?= hariIni("D", strtotime($agn['published_at'])).", ".date("d-m-Y H.i", strtotime($agn['published_at'])) ?></td>
                  <td><a href="/home/detail_agenda/<?= $agn['slug'] ?>" class="btn btn-success">Detail</a></td>
                </tr>
                <?php endforeach ?>
              </tbody>
            </table>
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