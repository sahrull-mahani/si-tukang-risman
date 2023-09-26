<aside class="side-bar">
  <div class="widget bg-white p-4 recent-posts-entry">
    <h4 class="widget-title style-1">Agenda Kegiatan</h4>
    <div class="widget-post-bx">
      <ul class="timeline">
        <?php foreach ($agenda as $agn) : ?>
          <?php
          $array = ["deeppink", "mediumvioletred", "darkcyan", "olivedrab", "tomato"];
          $random = $array[Rand(0, count($array) - 1)];
          ?>
          <li>
            <i class="fa fa-calendar" style="background:<?= $random ?>"></i>
            <div class="timeline-item">
              <h3 class="timeline-header">
                <a href="/home/detail_agenda/<?= $agn->slug ?>" class="text-uppercase"><?= $agn->judul ?></a>
                <span class="time-label"><i class="fa fa-clock-o"></i> <?= hariIni("D", strtotime($agn->published_at)) . ", " . date("d-m-Y H.i", strtotime($agn->published_at)) ?></span>
              </h3>
            </div>
          </li>
        <?php endforeach ?>
      </ul>
      <div align="center"><a class="btn btn-danger" href="/home/agenda" role="button">Indeks</a></div>

    </div>
  </div>
</aside>

<aside class="side-bar mt-5">
  <div class="widget bg-white p-4 recent-posts-entry">
    <h4 class="widget-title style-1">Statistik Pengunjung</h4>
    <div class="widget-post-bx">
      <table class="table table-hover table-statistik">
        <tbody>
          <tr>
            <td><i class="fa fa-eye"></i> Hari ini</td>
            <td>:</td>
            <td>25</td>
          </tr>
          <tr>
            <td><i class="fa fa-eye"></i> Minggu Ini</td>
            <td>:</td>
            <td>280</td>
          </tr>
          <tr>
            <td><i class="fa fa-users"></i> Total Pengunjung</td>
            <td>:</td>
            <td>1580</td>
          </tr>
          <tr>
            <td><i class="fa fa-users"></i> HIT Hari Ini</td>
            <td>:</td>
            <td>1580</td>
          </tr>
          <tr>
            <td><i class="fa fa-users"></i> HIT Minggu Ini</td>
            <td>:</td>
            <td>1580</td>
          </tr>
          <tr>
            <td><i class="fa fa-users"></i> Total HIT</td>
            <td>:</td>
            <td>1580</td>
          </tr>
          <tr>
            <td><i class="fa fa-users"></i> IP Anda</td>
            <td>:</td>
            <td><?= get_client_ip() ?></td>
          </tr>
        </tbody>
      </table>
    </div>
  </div>
</aside>

<aside class="side-bar mt-5">
  <div class="widget bg-white p-4 recent-posts-entry">
    <h4 class="widget-title style-1">Berita Populer</h4>
    <div class="widget-post-bx">
      <?php foreach ($beritaPopuler as $beritaPop) : ?>
        <a href="/home/detail_berita/<?= $beritaPop->slug."_".$beritaPop->id ?>" class="berita-populer">
          <div class="row">
            <div class="col-md-6">
              <div class="img-berita-populer">
                <img src="/admin_assets/galeri/<?= $beritaPop->gambar ?>" alt="img-fluid">
              </div>
            </div>
            <div class="col-md-6">
              <h5><?= $beritaPop->judul ?></h5>
              <small class="text-dark"><i class="fa fa-eye"></i> <?= $beritaPop->total ?></small>
            </div>
          </div>
        </a>
      <?php endforeach ?>
    </div>
  </div>
</aside>

<aside class="side-bar mt-5 mb-5">
  <div class="widget bg-white p-4 recent-posts-entry">
    <h4 class="widget-title style-1">Kontak</h4>
    <div class="widget-post-bx">
      <ul class="list-group list-group-flush">
        <li class="list-group-item"><i class="fa fa-plus"></i> <a href="">First <i class="fa fa-phone float-end"></i></a></li>
        <li class="list-group-item"><i class="fa fa-plus"></i> <a href="">A second item <i class="fa fa-phone float-end"></i></a></li>
        <li class="list-group-item"><i class="fa fa-plus"></i> <a href="">A third item <i class="fa fa-phone float-end"></i></a></li>
        <li class="list-group-item"><i class="fa fa-plus"></i> <a href="">A fourth item <i class="fa fa-phone float-end"></i></a></li>
        <li class="list-group-item"><i class="fa fa-plus"></i> <a href="">And a fifth one <i class="fa fa-phone float-end"></i></a></li>
      </ul>
    </div>
  </div>
</aside>