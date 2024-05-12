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
            <img src="<?= $row->foto == 'profile.png' ? '/admin_assets/img/profile.png' : site_url("web/img_medium/$row->foto") ?>" alt="Image" class="img-fluid" style="object-fit: cover; width: 100%; height: 320px;">
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
              </div>
              <ul class="specs">
                <li>
                  <span>Nama</span>
                  <span class="spec"><?= ucwords($row->nama) ?></span>
                </li>
                <?php foreach (explode(', ', getKategori($row->id)) as $kat) : ?>
                  <li>
                    <span>Kategori</span>
                    <span class="spec"><?= $kat ?></span>
                  </li>
                <?php endforeach ?>
                <li>
                  <span>Usia</span>
                  <span class="spec"><?= "$row->umur Tahun" ?></span>
                </li>
                <li>
                  <span>Total Di Rental</span>
                  <span class="spec"><?= "$row->totalcount x di rental" ?></span>
                </li>
                <?php if (getRejected($row->id)) : ?>
                  <li>
                    <span>Alasan Ditolak</span>
                    <span class="spec badge badge-primary lihat-alasan-tolak" style="cursor: pointer;" data-alasan="<?= getRejected($row->id)->keterangan ?>">lihat</span>
                  </li>
                <?php endif ?>
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
                    <form action="<?= site_url('web/selesai') ?>" method="post" class="form-done">
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
                        <div class="col-12">
                          <?php if ($row->wa == 1) : ?>
                            <?php $nowa = str_replace('-', '', str_replace('+', '', $row->telp)) ?>
                            <a href="https://api.whatsapp.com/send?phone=<?= $nowa ?>" target="_blank"><?= $row->telp ?> Hubungi Tukang Nomor Whatsapp</a>
                          <?php else : ?>
                            <?= $row->telp ?> Hubungi Tukang
                            <br>
                            <small class="text-muted">Bukan nomor whatsapp!</small>
                          <?php endif ?>
                        </div>
                      </div>
                      <button type="submit" class="btn btn-success">Selesai</button>
                    </form>
                  <?php elseif ($row->status == 1 && getOrderer($row->id)->user_id == session('user_id')) : ?>
                    <a href="<?= $link ?>" data-login="<?= $login ?>" class="btn btn-primary disabled">Konfirmasi Tukang 1x24 Jam</a>
                  <?php else : ?>
                    <?php if (!getRejected($row->id)) : ?>
                      <a href="<?= $link ?>" data-login="<?= $login ?>" data-idtukang="<?= $row->id ?>" data-kategori="<?= getKategori($row->id, true) ?>" data-tarif="<?= $row->tarif ?>" class="btn btn-primary <?= $row->status == 0 ? 'rent' : 'disabled' ?>">Rental Sekarang</a>
                    <?php endif ?>
                  <?php endif ?>
                </div>
              <?php else : ?>
                <?php if (!getRejected($row->id)) : ?>
                  <a href="<?= $link ?>" data-login="<?= $login ?>" data-idtukang="<?= $row->id ?>" data-kategori="<?= getKategori($row->id, true) ?>" data-tarif="<?= $row->tarif ?>" class="btn btn-primary <?= $row->status == 0 ? 'rent' : 'disabled' ?>">Rental Sekarang</a>
                <?php endif ?>
              <?php endif ?>
            </div>
          </div>
        </div>
      <?php endforeach ?>

    </div>
  </div>
</div>

<!-- Modal -->
<div class="modal fade" tabindex="-1" id="myModal" data-backdrop="static" data-keyboard="false">
  <div class="modal-dialog modal-lg modal-dialog-scrollable modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="<?= site_url('web/rental') ?>" method="post" id="form-rental">
          <?= csrf_field() ?>
          <input type="hidden" name="idtukang">
          <input type="hidden" name="tarif">

          <div class="btn-group btn-group-toggle" id="kategori" data-toggle="buttons"></div>

          <div class="form-group">
            <label for="deskripsi">Deskripsi</label>
            <textarea class="form-control border" id="deskripsi" name="deskripsi" rows="3" placeholder="Masukan deskripsi pekerjaan..." required></textarea>
          </div>

          <div class="form-group">
            <label for="deskripsi-ukuran">Deskripsi ukuran</label>
            <textarea class="form-control border" id="deskripsi-ukuran" name="ukuran" rows="3" placeholder="Contoh panjang berapa meter dan tinggi berapa meter..." required></textarea>
          </div>

          <div class="form-check">
            <input class="form-check-input" type="radio" name="pembayaran" id="harian" data-value="" value="harian" required>
            <label class="form-check-label" for="harian">Harian : Rp. 175.000</label>
          </div>
          <div class="form-check">
            <input class="form-check-input" type="radio" name="pembayaran" id="borongan" data-value="" value="borongan" required disabled>
            <label class="form-check-label" for="borongan">Borongan :</label>
            <span id="harga-borongan" class="badge badge-primary" style="cursor: pointer;">hitung</span>
            <div class="spinner-border text-primary" role="status" style="display: none;">
              <span class="sr-only">Loading...</span>
            </div>
          </div>

          <div class="mt-2">
            <label for="" class="font-weight-bold">Konsumsi</label>
            <div class="form-check form-check-inline">
              <input class="form-check-input" type="radio" name="konsumsi" id="ya" value="disediakan" required>
              <label class="form-check-label" for="ya">Disediakan</label>
            </div>
            <div class="form-check form-check-inline">
              <input class="form-check-input" type="radio" name="konsumsi" id="tidak" value="tidak disediakan" required>
              <label class="form-check-label" for="tidak">Tidak Disediakan</label>
            </div>
          </div>

          <div class="mt-2">
            <label for="" class="font-weight-bold">Alat kerja yang diperlukan</label>
            <div class="form-check form-check-inline">
              <input class="form-check-input" type="radio" name="alat" id="ya2" value="disediakan" required>
              <label class="form-check-label" for="ya2">Disediakan</label>
            </div>
            <div class="form-check form-check-inline">
              <input class="form-check-input" type="radio" name="alat" id="tidak2" value="tidak disediakan" required>
              <label class="form-check-label" for="tidak2">Tidak Disediakan</label>
            </div>
          </div>

          <div class="form-group">
            <label for="deskripsi-ukuran">Detail alamat pekerjaan</label>
            <textarea class="form-control border" id="deskripsi-ukuran" name="detail" rows="3" placeholder="Masukan detail alamat pekerjaan..." required></textarea>
          </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
        <button type="submit" class="btn btn-primary">Rental</button>
      </div>
      </form>
    </div>
  </div>
</div>

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