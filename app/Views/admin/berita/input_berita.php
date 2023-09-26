<?= $this->extend('layout/_template') ?>

<?= $this->section('contentAdmin') ?>
<section class="content-header">
  <h1>
    Input Menu
    <small>Control panel</small>
  </h1>
  <ol class="breadcrumb">
    <li><a href="/admin"><i class="fa fa-dashboard"></i> Home</a></li>
    <li class="">Berita</li>
    <li class="active">Input</li>
  </ol>
</section>


<!-- Main content -->
<section class="content">
  <div class="box box-warning">
    <div class="box-header with-border">
      <h3 class="box-title">Input Berita</h3>

      <div class="box-tools pull-right">
        <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
        </button>
      </div>
      <!-- /.box-tools -->
    </div>
    <!-- /.box-header -->
    <div class="box-body">

      <!-- /.box-header -->
      <div class="box-body">
        <form action="/berita/process_input_berita" method="post" enctype="multipart/form-data">
          <?= csrf_field() ?>

          <div class="form-group <?= ($validation->hasError('judul')) ? 'has-error' : '' ?>">
            <label>Judul</label>
            <input type="text" class="form-control" placeholder="Enter ..." name="judul" value="<?= old('judul') ?>">
            <small class="text-danger"><?= $validation->getError('judul') ?></small>
          </div>

          <!-- select -->
          <div class="form-group <?= ($validation->hasError('level')) ? 'has-error' : '' ?>">
            <label>Level Berita</label>
            <select class="form-control" name="level">
              <option value="" disabled <?= old('level') == null ? 'selected' : '' ?>>pilih</option>
              <option value="1" <?= old('level') == 1 ? 'selected' : '' ?>>Provinsi</option>
              <option value="2" <?= old('level') == 2 ? 'selected' : '' ?>>Kabupaten</option>
              <option value="3" <?= old('level') == 3 ? 'selected' : '' ?>>Kecamatan</option>
            </select>
            <small class="text-danger"><?= $validation->getError('level') ?></small>
          </div>

          <!-- tools box -->
          <h3 class="box-title">Tuliskan Berita
          <small class="text-danger"><?= $validation->getError('isi_berita') ?></small>
          </h3>
          <!-- /. tools -->
          <!-- /.box-header -->
          <div class="box-body pad">
            <textarea id="textarea" placeholder="Place some text here" style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;" name="isi_berita"><?= old('isi_berita') ?></textarea>
          </div>

          <input id="input-id" type="file" name="gambar" accept=".jpg, .png, image/jpeg, image/png">
          <small class="text-danger"><?= $validation->getError('gambar') ?></small>

          <!-- checkbox -->
          <div class="form-group">
            <div class="checkbox">
              <label>
                <input type="checkbox" name="publish" <?= old('publish') ? 'checked' : '' ?>>
                Publish
              </label>
            </div>
          </div>

          <button type="submit" class="btn btn-primary">SUBMIT</button>
        </form>
      </div>

    </div>
    <!-- /.box-body -->
  </div>
</section>

<?= $this->endSection() ?>