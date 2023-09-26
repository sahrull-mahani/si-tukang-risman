<?= $this->extend('layout/template') ?>

<?= $this->section('content') ?>
<div class="container">
  <div class="row">
    <div class="col-lg-8">
      <h2>Data Statistik Pekerjaan</h2>

      <canvas id="myChart"></canvas>
      <script>
        var ctx = document.getElementById("myChart");
        var myChart = new Chart(ctx, {
          type: 'polarArea',
          data: {
            labels: ["Red", "Blue", "Yellow", "Green", "Purple", "Orange"],
            datasets: [{
              label: '# of Votes',
              data: [12, 19, 3, 23, 2, 3],
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
          <?php for ($i = 1; $i <= 10; $i++) : ?>
            <tr>
              <th scope="row"><?= $i ?></th>
              <td align="center">Sekolah</td>
              <td align="center">25</td>
              <td align="center">10</td>
              <td align="center">35</td>
            </tr>
          <?php endfor ?>
          <tr class="fw-bold">
            <td colspan="2" align="right">Total</td>
            <td align="center">195</td>
            <td align="center">193</td>
            <td align="center">398</td>
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