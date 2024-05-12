<?= $this->extend("template_adminlte/index") ?>

<?= $this->section("page-content") ?>
<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1><?= $breadcome ?></h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active text-lowercase"><?= $breadcome ?></li>
                    </ol>
                </div>
            </div>
        </div>
    </section>
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Data <?= $breadcome ?></h3>
                            <div class="card-tools">
                                <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                                    <i class="fas fa-minus"></i>
                                </button>
                                <button type="button" class="btn btn-tool" data-card-widget="remove" title="Remove">
                                    <i class="fas fa-times"></i>
                                </button>
                            </div>
                        </div>
                        <div class="card-body">
                            <table class="table table-striped table-bordered">
                                <thead class="thead-dark">
                                    <tr>
                                        <th scope="col">Kolom</th>
                                        <th scope="col">Data</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>Nama</td>
                                        <td><?= $tukang->nama_user ?></td>
                                    </tr>
                                    <tr>
                                        <td>Nomor Telepon</td>
                                        <td><?= $tukang->phone ?></td>
                                    </tr>
                                    <tr>
                                        <td>Deksripsi Pekerjaan</td>
                                        <td><?= $tukang->deskripsi ?></td>
                                    </tr>
                                    <tr>
                                        <td>Deskripsi Ukuran</td>
                                        <td><?= $tukang->ukuran ?></td>
                                    </tr>
                                    <tr>
                                        <td>Jenis Kerja</td>
                                        <td><?= $tukang->jenis_kerja ?></td>
                                    </tr>
                                    <tr>
                                        <td>Biaya</td>
                                        <td><?= rupiah(getBiayaKategori($tukang->idtukang, $tukang->kategori)) ?></td>
                                    </tr>
                                    <tr>
                                        <td>Konsumsi</td>
                                        <td><?= $tukang->konsumsi ?></td>
                                    </tr>
                                    <tr>
                                        <td>Alat Kerja</td>
                                        <td><?= $tukang->alat ?></td>
                                    </tr>
                                    <tr>
                                        <td>Deskripsi Alamat Pekerjaan</td>
                                        <td><?= $tukang->detail ?></td>
                                    </tr>
                                </tbody>
                            </table>

                            <div class="d-flex flex-row-reverse">
                                <div class="btn-group mt-4">
                                    <a href="<?= site_url('orderan/tolak') ?>" data-idorder="<?= $tukang->id ?>" class="btn btn-danger tolak-pesanan">Tolak</a>
                                    <a href="<?= site_url("orderan/konfir/$tukang->id") ?>" class="btn btn-primary btn-ask" data-title="Anda yakin?" data-message="Anda akan menerima pekerjaan?, Jika anda yakin maka tekan tombol yakin dan jika tidak tekan tombol tidak yakin" data-icon="question">Terima</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
<?= $this->endSection() ?>