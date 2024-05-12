<table class="table">
    <thead>
        <tr>
            <th scope="col">Penyewa</th>
            <th scope="col">Keterangan</th>
            <th scope="col">Rating</th>
            <th scope="col">Deskripsi Pekerjaan</th>
            <th scope="col">Deskripsi Ukuran</th>
            <th scope="col">Jenis Pekerjaan</th>
            <th scope="col">Lokasi</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td><?= $nama ?></td>
            <td><?= $get->keterangan ?></td>
            <td>
                <?php if ($get->rating != null) : ?>
                    <div class="progress">
                        <div class="progress-bar" role="progressbar" style="width: <?= getRating($get->rating) ?>%;" aria-valuenow="<?= getRating($get->rating) ?>" aria-valuemin="0" aria-valuemax="100"><?= getRating($get->rating) . '%' ?></div>
                    </div>
                <?php endif ?>
            </td>
            <td><?= $get->deskripsi ?></td>
            <td><?= $get->ukuran ?></td>
            <td><?= $get->jenis_kerja . "\n" . rupiah(getBiayaKategori($get->tukang_id, $get->kategori)) ?></td>
            <td><?= $get->detail ?></td>
        </tr>
    </tbody>
</table>