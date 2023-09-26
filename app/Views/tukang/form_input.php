<div class="alert alert-info alert-dismissible  text-center">
    <h5><i class="icon fas fa-info"></i> <?= $nama ?></h5>
</div>
<div class="form-group row mode2">
    <label for="nama" class="col-sm-3 col-form-label">Nama</label>
    <div class="col-sm-9 item">
        <input type="text" class="form-control" id="nama" name="nama[]" value="<?= (isset($get->nama)) ? $get->nama : ''; ?>" placeholder="Nama" required />
    </div>
</div>
<div class="form-group row mode2">
    <label for="nik" class="col-sm-3 col-form-label">Nik</label>
    <div class="col-sm-9 item">
        <input type="text" class="form-control" id="nik" name="nik[]" value="<?= (isset($get->nik)) ? $get->nik : ''; ?>" placeholder="Nik" required />
    </div>
</div>
<div class="form-group row mode2">
    <label for="umur" class="col-sm-3 col-form-label">Umur</label>
    <div class="col-sm-9 item">
        <input type="text" class="form-control" id="umur" name="umur[]" value="<?= (isset($get->umur)) ? $get->umur : ''; ?>" placeholder="Umur" required />
    </div>
</div>
<div class="form-group row mode2">
    <label for="alamat" class="col-sm-3 col-form-label">Alamat</label>
    <div class="col-sm-9 item">
        <input type="text" class="form-control" id="alamat" name="alamat[]" value="<?= (isset($get->alamat)) ? $get->alamat : ''; ?>" placeholder="Alamat" required />
    </div>
</div>
<div class="form-group row mode2">
    <label for="kategori" class="col-sm-3 col-form-label">Kategori</label>
    <div class="col-sm-9 item">
        <input type="text" class="form-control" id="kategori" name="kategori[]" value="<?= (isset($get->kategori)) ? $get->kategori : ''; ?>" placeholder="Kategori" required />
    </div>
</div>
<div class="form-group row mode2">
    <label for="telp" class="col-sm-3 col-form-label">Telp</label>
    <div class="col-sm-9 item">
        <input type="text" class="form-control" id="telp" name="telp[]" value="<?= (isset($get->telp)) ? $get->telp : ''; ?>" placeholder="Telp" required />
    </div>
</div>
<div class="form-group row mode2">
    <label for="foto" class="col-sm-3 col-form-label">Foto</label>
    <div class="col-sm-9 item">
        <input type="text" class="form-control" id="foto" name="foto[]" value="<?= (isset($get->foto)) ? $get->foto : ''; ?>" placeholder="Foto" required />
    </div>
</div>
<div class="form-group row mode2">
    <label for="foto_ktp" class="col-sm-3 col-form-label">Foto Ktp</label>
    <div class="col-sm-9 item">
        <input type="text" class="form-control" id="foto_ktp" name="foto_ktp[]" value="<?= (isset($get->foto_ktp)) ? $get->foto_ktp : ''; ?>" placeholder="Foto Ktp" required />
    </div>
</div>
<div class="form-group row mode2">
    <label for="foto_project" class="col-sm-3 col-form-label">Foto Project</label>
    <div class="col-sm-9 item">
        <input type="file" class="form-control file-input-<?= (isset($get->id)) ? $get->id : ''; ?>" id="foto" name="foto[]" accept="image/*">
    </div>
</div>
<?php foreach ($gambar as $pic) {
    $pics[] = base_url('/Berita/img_medium') . "/$pic->sumber";
} ?>
<input type="hidden" name="id[]" value="<?= (isset($get->id)) ? $get->id : ''; ?>" />
<input type="hidden" name="gambar_lama[]" value="<?= (isset($get->foto)) ? $get->foto : ''; ?>" />
<script>
    <?php if (isset($get->id)) : ?>
        <?php if ($get->foto != null) : ?>
            <?php if ($get->foto == 'avatar.png') : ?>
                $(".file-input-<?= $get->id ?>").fileinput({
                    'showUpload': false,
                    'showCancel': false,
                    'browseOnZoneClick': true,
                    'required': false,
                    'allowFieldExtensions': ['jpg', 'jpeg', 'png'],
                    'overwriteInitial': true,
                    'initialPreviewAsData': true,
                    'initialPreview': [
                        location.origin + '/assets/dist/img/avatar.png'
                    ],
                })
            <?php else : ?>
                $(".file-input-<?= $get->id ?>").fileinput({
                    'showUpload': false,
                    'showCancel': false,
                    'browseOnZoneClick': true,
                    'required': false,
                    'allowFieldExtensions': ['jpg', 'jpeg', 'png'],
                    'overwriteInitial': true,
                    'initialPreviewAsData': true,
                    'initialPreview': [
                        location.origin + '/Home/img_thumb/<?= (isset($get->foto)) ? $get->foto : ''; ?>'
                    ],
                })
            <?php endif ?>
        <?php else : ?>
            $(".file-input-<?= $get->id ?>").fileinput({
                'showUpload': false,
                'showCancel': false,
                'browseOnZoneClick': true,
                'required': false,
                'allowFieldExtensions': ['jpg', 'jpeg', 'png'],
                'overwriteInitial': true
            })
        <?php endif ?>
    <?php else : ?>
        $(".file-input-").fileinput({
            'showUpload': false,
            'showCancel': false,
            'browseOnZoneClick': true,
            'required': false,
            'allowFieldExtensions': ['jpg', 'jpeg', 'png'],
            'overwriteInitial': true
        })
    <?php endif ?>
</script>