<p class="px-3">
<table class="table">
  <thead class="thead-dark">
    <tr>
      <th scope="col">Data</th>
      <th scope="col">Nilai</th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <td>Nama</td>
      <td><?= $get->nama ?></td>
    </tr>
    <tr>
      <td>NIK</td>
      <td><?= $get->nik ?></td>
    </tr>
    <tr>
      <td>Tarif harian</td>
      <td><?= rupiah($get->tarif) ?></td>
    </tr>
    <tr>
      <td>Umur</td>
      <td><?= "$get->umur Tahun" ?></td>
    </tr>
    <tr>
      <td>Alamat</td>
      <td><?= $get->alamat ?></td>
    </tr>
    <tr>
      <td>Kategori</td>
      <td>
        <?php $categories = explode(', ', getKategori($get->id, true)) ?>
        <dl>
          <?php foreach ($categories as $category) : ?>
            <?php
            $cat = explode('|', $category);
            $nama = current($cat);
            $biaya = $cat[1];
            $satuan = $cat[2];
            ?>
            <dt><?= $nama ?></dt>
            <dd><?= "$satuan : " . rupiah($biaya) ?></dd>
          <?php endforeach ?>
        </dl>
      </td>
    </tr>
    <tr>
      <td>Nomor Telpon</td>
      <td><?= $get->telp ?></td>
    </tr>
    <?php if ($get->foto_ktp) : ?>
      <tr>
        <td>Foto KTP</td>
        <td>
          <a href="<?= base_url('Web/img_medium') . "/$get->foto_ktp" ?>" data-lightbox="roadtrip">
            <img src="<?= base_url('Web/img_thumb') . "/$get->foto_ktp" ?>" alt="Foto KTP Tukang" width="200">
          </a>
        </td>
      </tr>
    <?php endif ?>
    <?php if ($get->foto) : ?>
      <tr>
        <td>Foto Tukang</td>
        <td>
          <a href="<?= $get->foto != 'profile.png' ? base_url('Web/img_medium') . "/$get->foto" : '/admin_assets/img/profile.png' ?>" data-lightbox="roadtrip">
            <img src="<?= $get->foto != 'profile.png' ? base_url('Web/img_medium') . "/$get->foto" : '/admin_assets/img/profile.png' ?>" alt="Foto Tukang" width="200">
          </a>
        </td>
      </tr>
    <?php endif ?>
  </tbody>
</table>

<?php if (!empty($gambar)) : ?>
  <hr>
  <h6 class="font-weight-bolder">Foto Project</h6>
  <?php foreach ($gambar as $row) : ?>
    <a href="<?= base_url('/Berita/img_medium') . "/$row->sumber" ?>" data-lightbox="roadtrip">
      <img src="<?= base_url('/Berita/img_thumb') . "/$row->sumber" ?>" alt="project tukang" width="200">
    </a>
  <?php endforeach ?>
<?php endif ?>
</p>