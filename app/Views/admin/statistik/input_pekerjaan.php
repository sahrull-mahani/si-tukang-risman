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
    <li class="">Pekerjaan</li>
    <li class="active">Input</li>
  </ol>
</section>


<!-- Main content -->
<section class="content">
  <div class="box box-warning">
    <div class="box-header with-border">
      <h3 class="box-title">Input Statistik Pekerjaan</h3>

      <div class="box-tools pull-right">
        <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
        </button>
      </div>
      <!-- /.box-tools -->
    </div>
    <!-- /.box-header -->
    <div class="box-body">
      <form action="/statistik/process_input_pekerjaan" method="post">
        <?= csrf_field() ?>

        <div class="form-group <?= ($validation->hasError('judul')) ? 'has-error' : '' ?>">
          <label>Judul</label>
          <input type="text" class="form-control" placeholder="Enter ..." name="judul" value="<?= old('judul') ?>">
          <small class="text-danger"><?= $validation->getError('judul') ?></small>
        </div>

        <div class="form-group <?= ($validation->hasError('pria')) ? 'has-error' : '' ?>">
          <label>Pria</label>
          <input type="text" class="form-control" placeholder="Enter ..." name="pria" value="<?= old('pria') ?>">
          <small class="text-danger"><?= $validation->getError('pria') ?></small>
        </div>

        <div class="form-group <?= ($validation->hasError('wanita')) ? 'has-error' : '' ?>">
          <label>Wanita</label>
          <input type="text" class="form-control" placeholder="Enter ..." name="wanita" value="<?= old('wanita') ?>">
          <small class="text-danger"><?= $validation->getError('wanita') ?></small>
        </div>

        <button type="submit" class="btn btn-primary">SUBMIT</button>
      </form>

    </div>
    <!-- /.box-body -->
  </div>
</section>

<?= $this->endSection() ?>