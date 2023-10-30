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
                            <h3 class="card-title"><?= $breadcome ?></h3>
                            <div class="card-tools">
                                <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                                    <i class="fas fa-minus"></i>
                                </button>
                                <button type="button" class="btn btn-tool" data-card-widget="remove" title="Remove">
                                    <i class="fas fa-times"></i>
                                </button>
                            </div>
                        </div>
                        <?= form_open_multipart('tukang/save', array('class' => 'mode2 form-post-save')); ?>
                        <div class="card-body">
                            <div class="form-group item">
                                <label for="nama">Nama</label>
                                <input type="text" class="form-control" id="nama" name="nama" placeholder="Nama" value="<?= $get->nama ?>" required />
                            </div>
                            <div class="form-group item">
                                <label for="nik">NIK</label>
                                <input type="text" class="form-control" id="nik" name="nik" placeholder="@ex: 75xxxxxx" value="<?= @$get->nik ?>" required />
                            </div>
                            <div class="form-group item">
                                <label for="umur">Umur</label>
                                <input type="text" class="form-control" id="umur" name="umur" placeholder="Umur" value="<?= @$get->umur ?>" required />
                            </div>
                            <div class="form-group item">
                                <label for="alamat">Alamat</label>
                                <input type="text" class="form-control" id="alamat" name="alamat" placeholder="Alamat" value="<?= @$get->alamat ?>" required />
                            </div>
                            <div class="form-group item">
                                <label for="kategori">Kategori</label>
                                <select name="kategori[]" id="kategori" data-id="<?= @$get->id ?>" class="custom-select select2" multiple>
                                    <optgroup label="Kategori">
                                        <?php foreach ($kategori as $row) : ?>
                                            <option value="<?= $row->id ?>"><?= ucwords($row->nama_kategori) ?></option>
                                        <?php endforeach ?>
                                    </optgroup>
                                </select>
                            </div>
                            <div class="form-group item">
                                <label for="telp">No. Telepon</label>
                                <input type="text" class="form-control" id="telp" name="telp" placeholder="telp" value="<?= @$get->telp ?>" required />
                            </div>
                            <label for="foto">Foto</label>
                            <input class="input-id" type="file" data-urlimage="<?= $get->foto == 'profile.png' ? '/admin_assets/img/profile.png' : base_url("Berita/img_thumb/$get->foto") ?>" data-required="false" name="foto" accept=".jpg, .png, image/jpeg, image/png">
                            <br>
                            <label for="fotoproject">Foto KTP</label>
                            <input class="input-id ktp" type="file" data-urlimage="<?= $get->foto_ktp == '' ? '/admin_assets/img/profile.png' : base_url("Berita/img_thumb/$get->foto_ktp") ?>" data-required="false" name="ktp" accept=".jpg, .png, image/jpeg, image/png">
                            <br>
                            <label for="fotoproject">Foto Project</label>
                            <input class="input-id project" type="file" name="fotoproject[]" data-required="false" accept=".jpg, .png, image/jpeg, image/png" multiple>
                        </div>
                        <div class="card-footer">
                            <input type="hidden" id="id" name="id" value="<?= @$get->id ?>">
                            <input type='hidden' name='action' value="update" />
                            <button type="submit" class="btn btn-primary btn-sub">Submit</button>
                            <button class="btn btn-primary btn-load d-none" type="button" disabled>
                                <span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
                                Loading...
                            </button>
                        </div>
                        <?= form_close() ?>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
<?= $this->endSection() ?>