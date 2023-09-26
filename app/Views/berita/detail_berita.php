<?= $get->isi_berita ?>
<p class="px-3">
  <?php foreach ($gambar as $row) : ?>
    <a href="<?= base_url('/Berita/img_medium') . "/$row->sumber" ?>" data-lightbox="roadtrip">
      <img src="<?= base_url('/Berita/img_thumb') . "/$row->sumber" ?>" alt="berita" width="200">
    </a>
  <?php endforeach ?>
</p>