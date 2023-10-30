<?= $this->extend('web/_template/index') ?>
<?= $this->section('page-content') ?>
<div class="ftco-blocks-cover-1" style="height: 200px; overflow: hidden;">
  <div class="ftco-cover-1 overlay innerpage" style="background-image: url(<?= base_url('assets_front/images/hero_2.jpg') ?>)">
    <div class="container">
      <div class="row align-items-center justify-content-center">
        <div class="col-lg-6 text-center">
          <h1>Cari Tukang</h1>
          <p>Daftar tukang yang terdaftar di aplikasi si-tukang</p>
        </div>
      </div>
    </div>
  </div>
</div>

<div class="site-section bg-light">
  <div class="container">
    <div class="row">

      <?php foreach ($tukang as $key => $row) : ?>
        <?php $key++ ?>
        <div class="col-lg-4 col-md-6 mb-4 <?= getKategori($row->id) == 'Kosong' ? 'd-none' : '' ?>">
          <div class="item-1">
            <img src="<?= $row->foto == 'profile.png' ? '/admin_assets/img/profile.png' : site_url("web/img_medium/$row->foto") ?>" alt="Image" class="img-fluid">
            <div class="item-1-contents">
              <div class="text-center">
                <h3><a href="#" data-toggle="modal" data-target="<?= "#modal-$row->id" ?>"><?= ucwords($row->nama) ?></a></h3>
                <div class="rating">
                  <?php if ($row->totalrating != null) : ?>
                    <?php
                    $total = ceil(($row->totalcount / $row->totalrating) * 100);
                    if ($total <= 20) {
                      $total = 1;
                    } elseif ($total <= 40) {
                      $total = 2;
                    } elseif ($total <= 60) {
                      $total = 3;
                    } elseif ($total <= 80) {
                      $total = 4;
                    } elseif ($total <= 100) {
                      $total = 5;
                    } else {
                      $total = 5;
                    }
                    ?>

                    <?php for ($i = 1; $i <= $total; $i++) : ?>
                      <span class="icon-star text-warning"></span>
                    <?php endfor ?>
                    <?php for ($i = 1; $i <= 5 - $total; $i++) : ?>
                      <span class="icon-star-o text-warning"></span>
                    <?php endfor ?>
                  <?php else : ?>
                    <span class="icon-star-o text-warning"></span>
                    <span class="icon-star-o text-warning"></span>
                    <span class="icon-star-o text-warning"></span>
                    <span class="icon-star-o text-warning"></span>
                    <span class="icon-star-o text-warning"></span>
                  <?php endif ?>
                </div>
                <div class="rent-price"><span><?= rupiah($row->tarif) ?>/</span>hari</div>
              </div>
              <ul class="specs">
                <li>
                  <span>Nama</span>
                  <span class="spec"><?= ucwords($row->nama) ?></span>
                </li>
                <li>
                  <span>Kategori</span>
                  <span class="spec"><?= getKategori($row->id) ?></span>
                </li>
                <li>
                  <span>Usia</span>
                  <span class="spec"><?= "$row->umur Tahun" ?></span>
                </li>
                <li>
                  <span>Telpon</span>
                  <span class="spec"><?= $row->telp ?></span>
                </li>
                <li>
                  <span>Total Di Rental</span>
                  <span class="spec"><?= "$row->totalcount x di rental" ?></span>
                </li>
                <li>
                  <span>Status</span>
                  <?= $row->status == 0 ? '<span class="spec">Rental</span>' : '<span class="spec font-weight-bold text-primary">Sementara Dirental</span>' ?>
                </li>
              </ul>
              <?php

              if (logged_in()) {
                $link = "/web/rental/$row->id";
                $login = 'login';
              } else {
                $link = '/login';
                $login = 'not-login';
              }

              ?>
              <?php if (session('userlevel') == 'users') : ?>
                <div class="d-flex action">
                  <?php if ($row->status == 2 && getOrderer($row->id)->user_id == session('user_id')) : ?>
                    <form action="/web/selesai" method="post" class="form-done">
                      <input type="hidden" name="id" value="<?= $row->id ?>">
                      <div class="row mb-2">
                        <div class="col-12 mb-2">
                          <div class="star-rating">
                            <span class="fa-regular fa-star" data-rating="1"></span>
                            <span class="fa-regular fa-star" data-rating="2"></span>
                            <span class="fa-regular fa-star" data-rating="3"></span>
                            <span class="fa-regular fa-star" data-rating="4"></span>
                            <span class="fa-regular fa-star" data-rating="5"></span>
                            <input type="hidden" name="rating" class="rating-value" value="3">
                          </div>
                        </div>
                        <div class="col-12">
                          <textarea name="keterangan" id="" cols="30" rows="3" placeholder="Keterangan..." class="form-control border border-success"></textarea>
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-8">
                          <input type="text" name="durasi" placeholder="dursai pengerjaan.." class="form-control border border-success">
                        </div>
                        <div class="col-2">
                          <button type="submit" class="btn btn-success">Selesai</button>
                        </div>
                      </div>
                    </form>
                  <?php elseif ($row->status == 1 && getOrderer($row->id)->user_id == session('user_id')) : ?>
                    <a href="<?= $link ?>" data-login="<?= $login ?>" class="btn btn-primary disabled">Konfirmasi Tukang 1x24 Jam</a>
                  <?php else : ?>
                    <a href="<?= $link ?>" data-login="<?= $login ?>" data-idtukang="<?= $row->id ?>" class="btn btn-primary <?= $row->status == 0 ? 'rent' : 'disabled' ?>">Rental Sekarang</a>
                  <?php endif ?>
                </div>
              <?php else : ?>
                <a href="<?= $link ?>" data-login="<?= $login ?>" data-idtukang="<?= $row->id ?>" class="btn btn-primary <?= $row->status == 0 ? 'rent' : 'disabled' ?>">Rental Sekarang</a>
              <?php endif ?>
            </div>
          </div>
        </div>
      <?php endforeach ?>

    </div>
  </div>
</div>

<!-- Modal -->
<?php foreach ($tukang as $row) : ?>
  <div class="modal fade" id="<?= "modal-$row->id" ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <img src="<?= $row->foto == 'profile.png' ? '/admin_assets/img/profile.png' : site_url("web/img_medium/$row->foto") ?>" alt="Image" class="img-fluid rounded mx-auto d-block" width="250">

          <table class="table">
            <thead class="bg-primary text-white">
              <tr>
                <th scope="col">Data</th>
                <th scope="col">Nilai</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td>Nama</td>
                <td><?= ucwords($row->nama) ?></td>
              </tr>
              <tr>
                <td>Kategori</td>
                <td><?= getKategori($row->id) ?></td>
              </tr>
              <tr>
                <td>Usia</td>
                <td><?= $row->umur ?></td>
              </tr>
              <tr>
                <td>Tarif</td>
                <td>
                  <div class="rent-price"><span><?= rupiah($row->tarif) ?>/</span>hari</div>
                </td>
              </tr>
              <tr>
                <td>Status</td>
                <td><?= $row->status == 0 ? '<span class="spec">Rental</span>' : '<span class="spec font-weight-bold text-primary">Sementara Dirental</span>' ?></td>
              </tr>
              <tr>
                <td>Tanggal Bergabung</td>
                <td><?= $row->created_at ?></td>
              </tr>
              <tr>
                <td>Total Di Rental</td>
                <td><?= "$row->totalcount x di rental" ?></td>
              </tr>
              <tr>
                <td>Telepon</td>
                <td><?= $row->telp ?></td>
              </tr>
              <tr>
                <td>Alamat</td>
                <td><?= $row->alamat ?></td>
              </tr>
            </tbody>
          </table>
          <?php foreach ($galeri->galeriLikeWhere("project_$row->nama", $row->id)->findAll() as $row) : ?>
            <a href="<?= site_url("Web/img_medium/$row->sumber") ?>" data-lightbox="roadtrip">
              <img src="<?= site_url("Web/img_thumb/$row->sumber") ?>" alt="" width="100">
            </a>
          <?php endforeach ?>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>
<?php endforeach ?>

<div class="container site-section mb-5">
  <div class="row justify-content-center text-center">
    <div class="col-7 text-center mb-5">
      <h2>Cara Order</h2>
      <p>Langkah - langka order / rental tukang</p>
    </div>
  </div>
  <div class="how-it-works d-flex">
    <div class="step">
      <span class="number"><span>01</span></span>
      <span class="caption">Daftar</span>
    </div>
    <div class="step">
      <span class="number"><span>02</span></span>
      <span class="caption">Cari Tukang</span>
    </div>
    <div class="step">
      <span class="number"><span>03</span></span>
      <span class="caption">Pilih Tukang</span>
    </div>
    <div class="step">
      <span class="number"><span>04</span></span>
      <span class="caption">Rental Tukang</span>
    </div>
    <div class="step">
      <span class="number"><span>05</span></span>
      <span class="caption">Selesai</span>
    </div>

  </div>
</div>
<?= $this->endSection() ?>