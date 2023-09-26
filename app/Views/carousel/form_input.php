<div class="alert alert-info alert-dismissible  text-center">
    <h5><i class="icon fas fa-info"></i> <?= $nama ?></h5>
</div>
<div class="form-group mode2">
    <input type="text" class="form-control" id="nama" name="nama[]" value="<?= (isset($get->nama)) ? $get->nama : ''; ?>" placeholder="Nama" required />
</div>
<div class="form-group mode2">
    <input type="file" class="form-control file-input-<?= (isset($get->id)) ? $get->id : ''; ?>" id="gambar" name="gambar[]" accept="image/*">
</div>
<input type="hidden" name="gambar_lama[]" value="<?= (isset($get->gambar)) ? $get->gambar : ''; ?>" />
<input type="hidden" name="id[]" value="<?= (isset($get->id)) ? $get->id : ''; ?>" />
<script>
    <?php if (isset($get->id)) : ?>
        $(".file-input-<?= $get->id ?>").fileinput({
            'showUpload': false,
            'showCancel': false,
            'browseOnZoneClick': true,
            'required': false,
            'allowFieldExtensions': ['jpg', 'jpeg', 'png'],
            'overwriteInitial': true,
            'initialPreviewAsData': true,
            'initialPreview': [
                location.origin + '/Berita/img_medium/<?= $get->gambar ?>'
            ],
        })
    <?php else : ?>
        $(".file-input-").fileinput({
            'showUpload': false,
            'showCancel': false,
            'browseOnZoneClick': true,
            'required': true,
            'allowFieldExtensions': ['jpg', 'jpeg', 'png'],
            'overwriteInitial': true
        })
    <?php endif ?>
</script>