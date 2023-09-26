<?= $this->extend('layout/_template') ?>

<?= $this->section('contentAdmin') ?>
<section class="content-header">
  <h1>
    Statistik Pendidikan
    <small>Control panel</small>
  </h1>
  <ol class="breadcrumb">
    <li><a href="/admin"><i class="fa fa-dashboard"></i> Home</a></li>
    <li class="">Statistik</li>
    <li class="active">Pendidikan</li>
  </ol>
  <?php if (session()->getFlashdata('success')) : ?>
    <div class="alert alert-success alert-dismissible">
      <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
      <h4><i class="icon fa fa-check"></i> Berhasil!</h4>
      <?= session()->getFlashdata('success') ?>
    </div>
  <?php endif ?>
</section>

<div class="row">
  <div class="col-md-12">
    <section class="content">
      <div class="box">
        <div class="box-header">
          <h3 class="box-title">Statistik Pendidikan</h3>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
          <div id="example2_wrapper" class="dataTables_wrapper form-inline dt-bootstrap">
            <div class="row">
              <div class="col-sm-6"></div>
              <div class="col-sm-6"></div>
            </div>
            <div class="row">
              <div class="col-sm-12">
                <table id="example2" class="table table-bordered table-hover dataTable" role="grid" aria-describedby="example2_info">
                  <thead>
                    <tr role="row">
                      <th>No.</th>
                      <th>Judul</th>
                      <th>Pria</th>
                      <th>Wanita</th>
                      <th>Jumlah</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php if (empty($pendidikan)) : ?>
                      <tr role="row" class="odd">
                        <td class="sorting_1" colspan="5" align="center">
                          <h2"><strong>Data Belum Diisi!.</strong> <a href="/statistik/statistik_pendidikan"><i class="fa fa-plus"></i> Tambah Data Statistik Pendidikan</a></h2>
                        </td>
                      </tr>
                    <?php else : ?>
                      <?php $no = 1; ?>
                      <?php foreach ($pendidikan as $pnd) : ?>
                        <tr role="row" class="odd">
                          <td class="sorting_1"><?= $no++ ?></td>
                          <td><?= $pnd->statistik ?></td>
                          <td><?= $pnd->pria ?></td>
                          <td><?= $pnd->wanita ?></td>
                          <td><?= $pnd->jumlah ?></td>
                          <td>
                            <a href="/statistik/edit_pendidikan/<?= $pnd->id ?>" class="btn btn-default btn-xs"><i class="fa fa-edit"></i> Edit</a>
                            <a href="/statistik/hapus_pendidikan/<?= $pnd->id ?>" class="btn btn-default btn-xs btn-ask" data-title="Hapus" data-text="Hapus <?= $pnd->statistik ?> ?"><i class="fa fa-trash"></i> Hapus</a>
                          </td>
                        </tr>
                      <?php endforeach ?>
                    <?php endif ?>
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
        <!-- /.box-body -->
      </div>
    </section>
  </div>
</div>
<?= $this->endSection() ?>