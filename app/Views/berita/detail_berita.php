<?= $get->isi_berita ?>
<hr>
<p class="px-3m mt-5">
  <?php foreach ($gambar as $q => $row) : ?>
    <a href="<?= site_url("Berita/img_medium/$row->sumber") ?>" data-title="<?= "Gambar $q" ?>" data-lightbox="roadtrip">
      <img src="<?= site_url("Berita/img_thumb/$row->sumber") ?>" alt="berita" width="200">
    </a>
  <?php endforeach ?>
</p>