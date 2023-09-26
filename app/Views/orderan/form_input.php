<div class="alert alert-info alert-dismissible  text-center">
    <h5><i class="icon fas fa-info"></i> <?= $nama ?></h5>
</div>
<div class="form-group row mode2">
    <label for="user_id" class="col-sm-3 col-form-label">User Id</label>
    <div class="col-sm-9 item">
        <input type="text" class="form-control" id="user_id" name="user_id[]" value="<?= (isset($get->user_id)) ? $get->user_id : ''; ?>" placeholder="User Id" required />
    </div>
</div>
<div class="form-group row mode2">
    <label for="tukang_id" class="col-sm-3 col-form-label">Tukang Id</label>
    <div class="col-sm-9 item">
        <input type="text" class="form-control" id="tukang_id" name="tukang_id[]" value="<?= (isset($get->tukang_id)) ? $get->tukang_id : ''; ?>" placeholder="Tukang Id" required />
    </div>
</div>
<div class="form-group row mode2">
    <label for="status" class="col-sm-3 col-form-label">Status</label>
    <div class="col-sm-9 item">
        <input type="text" class="form-control" id="status" name="status[]" value="<?= (isset($get->status)) ? $get->status : ''; ?>" placeholder="Status"  />
    </div>
</div>
<div class="form-group row mode2">
    <label for="keterangan" class="col-sm-3 col-form-label">Keterangan</label>
    <div class="col-sm-9 item">
        <input type="text" class="form-control" id="keterangan" name="keterangan[]" value="<?= (isset($get->keterangan)) ? $get->keterangan : ''; ?>" placeholder="Keterangan"  />
    </div>
</div>
<div class="form-group row mode2">
    <label for="rating" class="col-sm-3 col-form-label">Rating</label>
    <div class="col-sm-9 item">
        <input type="text" class="form-control" id="rating" name="rating[]" value="<?= (isset($get->rating)) ? $get->rating : ''; ?>" placeholder="Rating"  />
    </div>
</div>
<div class="form-group row mode2">
    <label for="durasi" class="col-sm-3 col-form-label">Durasi</label>
    <div class="col-sm-9 item">
        <input type="text" class="form-control" id="durasi" name="durasi[]" value="<?= (isset($get->durasi)) ? $get->durasi : ''; ?>" placeholder="Durasi"  />
    </div>
</div>
<input type="hidden" name="id[]" value="<?= (isset($get->id)) ? $get->id : ''; ?>" />