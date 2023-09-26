<?= $this->extend('layout/template') ?>

<?= $this->section('content') ?>
<div class="container">
  <div class="row">
    <div class="col-lg-8">
      <h2>Data Statistik Agama</h2>

      <?php

      foreach ($agama as $agm) {
        $agamas[] = $agm->statistik;
        $pria[] = $agm->pria;
        $pria[] = $agm->pria;
        $total[] = $agm->jumlah;
      }

      ?>

      <canvas id="myChart"></canvas>
      <script>
        var ctx = document.getElementById("myChart");
        var myChart = new Chart(ctx, {
          type: 'polarArea',
          data: {
            // labels: ["Red", "Blue", "Yellow", "Green", "Purple", "Orange"],
            labels: <?= json_encode($agamas) ?>,
            datasets: [{
              label: '# of Votes',
              data: <?= json_encode($total) ?>,
              backgroundColor: [
                'rgba(255, 99, 132, 0.2)',
                'rgba(54, 162, 235, 0.2)',
                'rgba(255, 206, 86, 0.2)',
                'rgba(75, 192, 192, 0.2)',
                'rgba(153, 102, 255, 0.2)',
                'rgba(255, 159, 64, 0.2)'
              ],
              borderColor: [
                'rgba(255,99,132,1)',
                'rgba(54, 162, 235, 1)',
                'rgba(255, 206, 86, 1)',
                'rgba(75, 192, 192, 1)',
                'rgba(153, 102, 255, 1)',
                'rgba(255, 159, 64, 1)'
              ],
              borderWidth: 1
            }]
          },
          options: {}
        });
      </script>

      <h2 class="mt-3">Statistik Dalam Tabel</h2>

      <table class="table table-hover table-bordered">
        <thead>
          <tr>
            <th scope="col">NO.</th>
            <th scope="col">Statistik</th>
            <th scope="col">laki - laki</th>
            <th scope="col">Perempuan</th>
            <th scope="col">Jumlah Penduduk</th>
          </tr>
        </thead>
        <tbody>
          <?php $i = 1 ?>
          <?php foreach ($agama as $agm) : ?>
            <tr>
              <th scope="row"><?= $i++ ?></th>
              <td align="center"><?= $agm->statistik ?></td>
              <td align="center"><?= $ttlPria[] = $agm->pria ?></td>
              <td align="center"><?= $ttlWanita[] = $agm->wanita ?></td>
              <td align="center"><?= $agm->jumlah ?></td>
            </tr>
          <?php endforeach ?>
          <tr class="fw-bold">
            <td colspan="2" align="right">Total</td>
            <td align="center"><?= array_sum($ttlPria) ?></td>
            <td align="center"><?= array_sum($ttlWanita) ?></td>
            <td align="center"><?= array_sum($ttlPria) + array_sum($ttlWanita) ?></td>
          </tr>
        </tbody>
      </table>
    </div>
    <div class="col-lg-4">
      <?= $this->include('layout/sidebar') ?>
    </div>
  </div>
</div>
<?= $this->endSection() ?>