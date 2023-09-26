<?= $this->extend('layout/_template') ?>

<?= $this->section('contentAdmin') ?>
<section class="content-header">
  <h1>
    User Profile
  </h1>
  <ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
    <li><a href="#">Profile</a></li>
    <li class="active">User profile</li>
  </ol>
  <?php if (session()->getFlashdata('success')) : ?>
    <div class="alert alert-success alert-dismissible">
      <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
      <h4><i class="icon fa fa-check"></i> Berhasil!</h4>
      <?= session()->getFlashdata('success') ?>
    </div>
  <?php endif ?>
</section>

<!-- Main content -->
<section class="content">

  <div class="row">
    <div class="col-md-2"></div>
    <div class="col-md-8">

      <div class="box box-primary">
        <div class="box-body box-profile">
          <img class="profile-user-img img-responsive img-circle" style="height: 100px; object-fit: cover;" src="/admin_assets/img/<?= session('user')['user_image'] ?>" alt="User profile picture">

          <h3 class="profile-username text-center"><?= session('user')['username'] ?></h3>

          <p class="text-muted text-center"><?= session('user')['level'] == 1 ? "Adminstrator" : "Regular User" ?></p>

          <form action="/admin/process_edit_profile" id="myForm" method="post" enctype="multipart/form-data" style="padding: 0 20px; text-align: center;">
            <?= csrf_field() ?>

            <input type="hidden" name="emailAsli" value="<?= session('user')['email'] ?>">

            <div class="row">
              <div class="col-md-6">
                <div class="form-group <?= ($validation->hasError('fullname')) ? 'has-error' : '' ?>">
                  <label style="text-align: left; display: block;">Fullname</label>
                  <input type="text" class="form-control field-empty" placeholder="Masukan fullname" name="fullname" value="<?= old('fullname') ? old('fullname') : $user['fullname'] ?>" style="text-align: left;">
                  <small class="text-danger" style="text-align: left; display:block"><?= $validation->getError('fullname') ?></small>
                </div>
              </div>

              <div class="col-md-6">
                <div class="form-group <?= ($validation->hasError('email')) ? 'has-error' : '' ?>">
                  <label style="text-align: right; display: block;">Email</label>
                  <input type="email" class="form-control field-empty" placeholder="contoh@gmail.com" name="email" value="<?= old('email') ? old('email') : $user['email'] ?>" style="text-align: right;">
                  <small class="text-danger" style="text-align: right; display:block"><?= $validation->getError('email') ?></small>
                </div>
              </div>
            </div>

            <a class="btn btn-block btn-default btn-collapse" data-toggle="collapse" href="#footwear" aria-expanded="false" aria-controls="footwear" data-visible="show" data-text="edit password">edit password</a>
            <div class="row collapse" id="footwear">
              <div class="col-md-6">
                <div class="form-group <?= ($validation->hasError('password')) ? 'has-error' : '' ?>">
                  <label style="text-align: left; display: block;">Password</label>
                  <input type="password" class="form-control" placeholder="Masukan password" name="password" value="<?= old('password') ?>" style="text-align: left;">
                  <small class="text-danger" style="text-align: left; display:block"><?= $validation->getError('password') ?></small>
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group <?= ($validation->hasError('password2')) ? 'has-error' : '' ?>">
                  <label style="text-align: right; display: block;">Konfimasi password</label>
                  <input type="password" class="form-control" placeholder="Masukan konfirmasi password" name="password2" value="<?= old('password2') ?>" style="text-align: right;">
                  <small class="text-danger" style="text-align: right; display:block"><?= $validation->getError('password2') ?></small>
                </div>
              </div>
            </div>

            <a class="btn btn-block btn-default btn-collapse" data-toggle="collapse" href="#gambar" aria-expanded="false" aria-controls="gambar" data-visible="show" data-text="ganti poto profil">ganti poto profil</a>
            <div class="form-group collapse <?= ($validation->hasError('gambar')) ? 'has-error' : '' ?>" id="gambar">
              <label>Gambar</label>
              <input id="input-id" type="file" name="gambar" accept=".jpg, .png, image/jpeg, image/png">
              <small class="text-danger"><?= $validation->getError('gambar') ?></small>
            </div>

            <button type="submit" class="btn btn-primary btn-block btn-disable-check"><b>SUBMIT</b></button>
          </form>
        </div>
        <!-- /.box-body -->
      </div>
    </div>
  </div>
</section>
<?= $this->endSection() ?>