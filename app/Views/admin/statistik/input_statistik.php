<?= $this->extend('layout/_template') ?>

<?= $this->section('contentAdmin') ?>
<section class="content-header">
  <h1>
    Input Menu
    <small>Control panel</small>
  </h1>
  <ol class="breadcrumb">
    <li><a href="/admin"><i class="fa fa-dashboard"></i> Home</a></li>
    <li class="">Statistik</li>
    <li class="active">Input</li>
  </ol>
</section>


<!-- Main content -->
<section class="content">
  <div class="box box-warning">
    <div class="box-header with-border">
      <h3 class="box-title">Input Statistik</h3>

      <div class="box-tools pull-right">
        <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
        </button>
      </div>
      <!-- /.box-tools -->
    </div>
    <!-- /.box-header -->
    <div class="box-body">
      <form action="/statistik/process_input_statistik" method="post">
        <?= csrf_field() ?>

        <div class="row">
          <div class="col-md-3">
            <!-- select -->
            <div class="form-group <?= ($validation->hasError('bidang')) ? 'has-error' : '' ?>">
              <label>Bidang</label>
              <select class="form-control" name="bidang">
                <option value="" disabled selected>pilih</option>
                <option value="agama" <?= old('bidang') == "agama" ? 'selected' : '' ?>>Agama</option>
                <option value="pekerjaan" <?= old('bidang') == "pekerjaan" ? 'selected' : '' ?>>Pekerjaan</option>
                <option value="pendidikan" <?= old('bidang') == "pendidikan" ? 'selected' : '' ?>>Pendidikan</option>
                <option value="perkawinan" <?= old('bidang') == "perkawinan" ? 'selected' : '' ?>>Perkawinan</option>
              </select>
              <small class="text-danger"><?= $validation->getError('bidang') ?></small>
            </div>
          </div>
          <div class="col-md-3">
            <div class="form-group <?= ($validation->hasError('judul')) ? 'has-error' : '' ?>">
              <label>Judul</label>
              <input type="text" class="form-control" placeholder="Enter ..." name="judul" value="<?= old('judul') ?>">
              <small class="text-danger"><?= $validation->getError('judul') ?></small>
            </div>
          </div>
          <div class="col-md-3">
            <div class="form-group <?= ($validation->hasError('pria')) ? 'has-error' : '' ?>">
              <label>Pria</label>
              <input type="text" class="form-control" placeholder="Enter ..." name="pria" value="<?= old('pria') ?>">
              <small class="text-danger"><?= $validation->getError('pria') ?></small>
            </div>
          </div>
          <div class="col-md-3">
            <div class="form-group <?= ($validation->hasError('wanita')) ? 'has-error' : '' ?>">
              <label>Wanita</label>
              <input type="text" class="form-control" placeholder="Enter ..." name="wanita" value="<?= old('wanita') ?>">
              <small class="text-danger"><?= $validation->getError('wanita') ?></small>
            </div>
          </div>
        </div>

        <button type="submit" class="btn btn-primary btn-block">SUBMIT</button>
      </form>

    </div>
    <!-- /.box-body -->
  </div>
</section>

<?= $this->endSection() ?>