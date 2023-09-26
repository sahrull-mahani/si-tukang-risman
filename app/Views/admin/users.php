<?= $this->extend('layout/_template') ?>

<?= $this->section('contentAdmin') ?>
<section class="content-header">
  <h1>
    Users Menu
    <small>Control panel</small>
  </h1>
  <ol class="breadcrumb">
    <li><a href="/admin"><i class="fa fa-dashboard"></i> Home</a></li>
    <li class="">Users</li>
    <li class="active">Tambah</li>
  </ol>
  <?php if (session()->getFlashdata('success')) : ?>
    <div class="alert alert-success alert-dismissible" style="margin-top: 5px;">
      <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
      <h4><i class="icon fa fa-check"></i> Berhasil!</h4>
      <?= session()->getFlashdata('success') ?>
    </div>
  <?php endif ?>
</section>

<!-- Main content -->
<section class="content">
  <div class="box box-warning">
    <div class="box-header with-border">
      <h3 class="box-title">Tambah User</h3>

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
        <form action="/user/process_tambah_user" method="post">
          <?= csrf_field() ?>

          <div class="form-group <?= ($validation->hasError('username')) ? 'has-error' : '' ?>">
            <label>Username</label>
            <input type="text" class="form-control" placeholder="Enter ..." name="username" value="<?= old('username') ?>">
            <small class="text-danger"><?= $validation->getError('username') ?></small>
          </div>

          <button type="submit" class="btn btn-primary">SUBMIT</button>
        </form>
      </div>

    </div>
    <!-- /.box-body -->
  </div>
</section>

<!-- Main content -->
<section class="content">
  <div class="box box-warning">
    <div class="box-header with-border">
      <h3 class="box-title">Daftar Users</h3>

      <div class="box-tools pull-right">
        <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
        </button>
      </div>
      <!-- /.box-tools -->
    </div>
    <!-- /.box-header -->
    <div class="box-body">

      <table id="example2" class="table table-bordered table-hover dataTable" role="grid" aria-describedby="example2_info">
        <thead>
          <tr role="row">
            <th>No.</th>
            <th>Username</th>
            <th>Email</th>
            <th>Fulname</th>
            <th>Action</th>
          </tr>
        </thead>
        <tbody>
          <?php if (empty($users)) : ?>
            <tr role="row" class="odd">
              <td class="sorting_1" colspan="5" align="center">
                <h2><strong>Data Belum Diisi!.</strong></h2>
              </td>
            </tr>
          <?php else : ?>
            <?php $no = 1; ?>
            <?php foreach ($users as $user) : ?>
              <tr role="row" class="odd">
                <td class="sorting_1 text-center"><?= $no++ ?></td>
                <td align="center"><span class="edit-inline" data-id="<?= $user['id'] ?>"><?= $user['username'] ?></span></td>
                <td align="center"><?= $user['email'] ?></td>
                <td align="center"><?= $user['fullname'] ?></td>
                <td align="center">
                  <a href="/user/user_reset/<?= $user['id'] ?>" class="btn btn-default btn-xs btn-ask" data-judul="Reset User" data-text="Anda yakin ingin me-reset user <?= $user['username'] ?>?"><i class="fa fa-rotate-left"></i> Reset</a>
                  <?php if ($user['active'] == 0) : ?>
                    <a href="/user/user_aktif/<?= $user['id'] ?>" class="btn btn-default btn-xs btn-ask" data-judul="Aktifkan" data-text="Aktifkan <?= $user['username'] ?> ?"><i class="fa fa-check-circle-o"></i> Aktifkan</a>
                  <?php else : ?>
                    <a href="/user/user_nonaktif/<?= $user['id'] ?>" class="btn btn-default btn-xs btn-ask" data-judul="Nonaktifkan" data-text="Nonaktifkan <?= $user['username'] ?> ?"><i class="fa fa-circle"></i> Nonaktifkan</a>
                  <?php endif ?>
                </td>
              </tr>
            <?php endforeach ?>
          <?php endif ?>
        </tbody>
      </table>

    </div>
    <!-- /.box-body -->
  </div>
</section>

<?= $this->endSection() ?>