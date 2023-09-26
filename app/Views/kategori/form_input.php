<div class="alert alert-info alert-dismissible  text-center">
    <h5><i class="icon fas fa-info"></i> <?= $nama ?></h5>
</div>
<div class="form-group row mode2">
    <label for="nama_kategori" class="col-sm-3 col-form-label">Nama Kategori</label>
    <div class="col-sm-9 item">
        <input type="text" class="form-control" id="nama_kategori" name="nama_kategori[]" value="<?= @$get->nama_kategori ?>" placeholder="Nama Kategori" required />
    </div>
</div>
<div class="form-group row mode2">
    <label for="keterangan" class="col-sm-3 col-form-label">Keterangan</label>
    <div class="col-sm-9 item">
        <input type="text" class="form-control" id="keterangan" name="keterangan[]" value="<?= @$get->keterangan ?>" placeholder="Ketrangan..." />
    </div>
</div>
<input type="hidden" name="id[]" value="<?= @$get->id ?>" />