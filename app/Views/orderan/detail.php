<table class="table">
    <thead>
        <tr>
            <th scope="col">Penyewa</th>
            <th scope="col">Keterangan</th>
            <th scope="col">Durasi</th>
            <th scope="col">Rating</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td><?= $nama ?></td>
            <td><?= $get->keterangan ?></td>
            <td><?= $get->durasi ?></td>
            <td>
                <?php if ($get->rating != null) : ?>
                    <div class="progress">
                        <div class="progress-bar" role="progressbar" style="width: <?= getRating($get->rating) ?>%;" aria-valuenow="<?= getRating($get->rating) ?>" aria-valuemin="0" aria-valuemax="100"><?= getRating($get->rating) . '%' ?></div>
                    </div>
                <?php endif ?>
            </td>
        </tr>
    </tbody>
</table>