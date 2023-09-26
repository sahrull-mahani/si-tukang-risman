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
                        <li class="breadcrumb-item active"><?= $breadcome ?></li>
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

                            <div class="btn-group mb-3" role="group" aria-label="Basic example">
                                <a href="/statistik/templateXL/1" class="btn btn-sm btn-success"><i class="fa fa-file-excel"></i> Template XL Agama</a>
                                <a href="/statistik/templateXL/2" class="btn btn-sm btn-info"><i class="fa fa-file-excel"></i> Template XL Pekerjaan</a>
                                <a href="/statistik/templateXL/3" class="btn btn-sm btn-success"><i class="fa fa-file-excel"></i> Template XL Pendidikan</a>
                                <a href="/statistik/templateXL/4" class="btn btn-sm btn-info"><i class="fa fa-file-excel"></i> Template XL Perkawinan</a>
                            </div>
                            <form action="statistik/import" method="post" enctype="multipart/form-data">
                                <div class="input-group">
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input" id="customFile" name="importexcel">
                                        <label class="custom-file-label" for="customFile">Choose file</label>
                                    </div>
                                    <div class="input-group-append">
                                        <button type="submit" class="btn btn-primary btn-block">IMPORT</button>
                                    </div>
                                </div>
                                <small class="text-danger ml-1"><?= $validation->getError('importexcel') ?></small>
                            </form>
                        </div>
                        <div class="card-footer">
                            <?php if (session()->getFlashdata('success')) : ?>
                                <div class="alert alert-success alert-dismissible fade show" role="alert">
                                    <strong>Berhasil!</strong> <?= session()->getFlashdata('success') ?>
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                            <?php elseif (session()->getFlashdata('errors')) : ?>
                                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                    <ul class="list-group list-group-flush">
                                        <?php foreach (session()->getFlashdata('errors') as $key => $error) : ?>
                                            <li class="list-group-item bg-transparent"><?= "$key : $error" ?></li>
                                        <?php endforeach ?>
                                    </ul>
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                            <?php elseif (session()->getFlashdata('error')) : ?>
                                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                    <strong>Gagal!</strong> <?= session()->getFlashdata('error') ?>
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                            <?php endif ?>
                        </div>
                    </div>

                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Daftar <?= $breadcome ?></h3>
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
                            <div id="toolbar">
                                <button type="button" class="btn btn-danger" id="remove" disabled><i class="fa fa-trash"></i> Hapus</button>
                            </div>
                            <table id="table" data-toggle="table" data-ajax="ajaxRequest" data-side-pagination="server" data-pagination="true" data-search="true" data-show-columns="true" data-show-refresh="true" data-key-events="true" data-show-toggle="true" data-resizable="true" data-cookie="true" data-cookie-id-table="saveId" data-click-to-select="true" data-toolbar="#toolbar">
                                <thead>
                                    <tr>
                                        <th data-field="state" data-checkbox="true"></th>
                                        <th data-field="id" data-visible="false">ID</th>
                                        <th data-field="nomor">No</th>
                                        <th data-field="pria">Pria</th>
                                        <th data-field="wanita">Wanita</th>
                                        <th data-field="jumlah">Jumlah</th>
                                        <th data-field="tahun">Tahun</th>
                                    </tr>
                                </thead>
                            </table>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-header">
                                    <div class="card-title">Filter</div>
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
                                    <select name="filter" id="filter" class="custom-select">
                                        <?php foreach ($tahunFilter as $row) : ?>
                                            <option value="<?= $row->tahun ?>" <?= $row->tahun == date('Y') ? 'selected' : '' ?>><?= $row->tahun ?></option>
                                        <?php endforeach ?>
                                    </select>
                                </div>
                            </div>
                        </div>

                        <div class="col-6">
                            <div class="card">
                                <div class="card-header">
                                    CHART AGAMA
                                    <div class="card-tools">
                                        <button type="button" class="btn btn-tool" data-card-widget="maximize"><i class="fas fa-expand"></i>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <canvas id="agama" width="400" height="400"></canvas>
                                </div>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="card">
                                <div class="card-header">
                                    CHART PEKERJAAN
                                    <div class="card-tools">
                                        <button type="button" class="btn btn-tool" data-card-widget="maximize"><i class="fas fa-expand"></i>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <canvas id="pekerjaan" width="400" height="400"></canvas>
                                </div>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="card">
                                <div class="card-header">
                                    CHART PENDIDIKAN
                                    <div class="card-tools">
                                        <button type="button" class="btn btn-tool" data-card-widget="maximize"><i class="fas fa-expand"></i>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <canvas id="pendidikan" width="400" height="400"></canvas>
                                </div>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="card">
                                <div class="card-header">
                                    CHART PERKAWINAN
                                    <div class="card-tools">
                                        <button type="button" class="btn btn-tool" data-card-widget="maximize"><i class="fas fa-expand"></i>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <canvas id="perkawinan" width="400" height="400"></canvas>
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