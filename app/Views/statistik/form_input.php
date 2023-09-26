<div class="alert alert-info alert-dismissible  text-center">
    <h5><i class="icon fas fa-info"></i> <?= $nama ?></h5>
</div>
<div class="form-group row mode2">
    <label for="data" class="col-sm-3 col-form-label">Bidang</label>
    <?php $defaults = array('' => '==Pilih Bidang==');
    $options = array(
        'agama' => 'agama',
        'pekerjaan' => 'pekerjaan',
        'pendidikan' => 'pendidikan',
        'perkawinana' => 'perkawinana',
    );
    echo form_dropdown('bidang[]', $defaults + $options, (isset($get->bidang)) ? $get->bidang : '', 'class="form-control" id="bidang" required');
    ?>
</div>
<div class="form-group row mode2">
    <label for="data" class="col-sm-3 col-form-label">Pria</label>
    <div class="col-sm-9 item">
        <input type="number" class="form-control" min="0" maxlength="3" name="pria[]" value="<?= (isset($get->pria)) ? $get->pria : ''; ?>" placeholder="Data" required />
    </div>
</div>
<div class="form-group row mode2">
    <label for="data" class="col-sm-3 col-form-label">Wanita</label>
    <div class="col-sm-9 item">
        <input type="number" class="form-control" min="0" maxlength="3" name="wanita[]" value="<?= (isset($get->wanita)) ? $get->wanita : ''; ?>" placeholder="Data" required />
    </div>
</div>
<div class="form-group row mode2">
    <label for="data" class="col-sm-3 col-form-label">Usia</label>
    <div class="col-sm-9 item">
        <input type="number" class="form-control" min="0" maxlength="3" name="usia[]" value="<?= (isset($get->usia)) ? $get->usia : ''; ?>" placeholder="Data" required />
    </div>
</div>
<input type="hidden" name="id[]" value="<?= (isset($get->id)) ? $get->id : ''; ?>" />