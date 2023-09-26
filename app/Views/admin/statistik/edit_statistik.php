<?= $this->extend('layout/_template') ?>

<?= $this->section('contentAdmin') ?>
<section class="content-header">
  <h1>
    Edit Menu
    <small>Control panel</small>
  </h1>
  <ol class="breadcrumb">
    <li><a href="/admin"><i class="fa fa-dashboard"></i> Home</a></li>
    <li class="">Statistik</li>
    <li class=""><?= $statistik->bidang ?></li>
    <li class="">Edit</li>
    <li class="active"><?= $statistik->statistik ?></li>
  </ol>
</section>

<!-- Main content -->
<section class="content">
  <div class="box box-warning">
    <div class="box-header with-border">
      <h3 class="box-title">Edit Statistik</h3>

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
        <form action="/statistik/edit_statistik_process" method="post">
          <?= csrf_field() ?>
          <input type="hidden" name="ID" value="<?= $statistik->id ?>">

          <div class="form-group <?= ($validation->hasError('judul')) ? 'has-error' : '' ?>">
            <label>Judul</label>
            <input type="text" class="form-control" placeholder="Enter ..." name="judul" value="<?= old('judul') ? old('judul') : $statistik->statistik ?>">
            <small class="text-danger"><?= $validation->getError('judul') ?></small>
          </div>

          <div class="form-group <?= ($validation->hasError('pria')) ? 'has-error' : '' ?>">
            <label>pria</label>
            <input type="text" class="form-control" placeholder="Enter ..." name="pria" value="<?= old('pria') ? old('pria') : $statistik->pria ?>">
            <small class="text-danger"><?= $validation->getError('pria') ?></small>
          </div>

          <div class="form-group <?= ($validation->hasError('wanita')) ? 'has-error' : '' ?>">
            <label>wanita</label>
            <input type="text" class="form-control" placeholder="Enter ..." name="wanita" value="<?= old('wanita') ? old('wanita') : $statistik->wanita ?>">
            <small class="text-danger"><?= $validation->getError('wanita') ?></small>
          </div>

          <button type="submit" class="btn btn-primary">UPDATE</button>
        </form>
      </div>

    </div>
    <!-- /.box-body -->
  </div>
</section>

<?= $this->endSection() ?>