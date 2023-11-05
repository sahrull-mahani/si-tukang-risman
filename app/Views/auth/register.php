<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Registrasi Tukang</title>
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <link rel="stylesheet" href="<?= base_url('assets/plugins/fontawesome-free/css/all.min.css') ?>" />
  <link rel="stylesheet" href="<?= base_url('assets/plugins/icheck-bootstrap/icheck-bootstrap.min.css') ?>" />
  <link rel="stylesheet" href="<?= base_url('assets/plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css') ?>">
  <!-- select2 -->
  <link rel="stylesheet" href="<?= base_url('assets/plugins/select2/css/select2.min.css') ?>">
  <link rel="stylesheet" href="<?= base_url('assets/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css') ?>">
  <link rel="stylesheet" href="<?= base_url('assets/dist/css/validator.css') ?>" />
  <link rel="stylesheet" href="<?= base_url('assets/dist/css/adminlte.min.css') ?>" />
</head>

<body class="hold-transition register-page">
  <div class="register-box">
    <div class="register-logo">
      <a href="<?= site_url(); ?>"><b>Si &mdash; Tukang</b></a>
    </div>

    <div class="card">
      <div class="card-body register-card-body">
        <p class="login-box-msg">Daftar</p>

        <?= form_open("auth/save"); ?>
        <div class="input-group mb-3">
          <select name="groups[]" id="group" class="form-control">
            <option value="" disabled selected>--- Pilih Daftar Sebagai ---</option>
            <?php foreach ($groups as $group) : ?>
              <?php if ($group->name != 'admin') : ?>
                <option value="<?= $group->id ?>"><b><?= $group->name; ?></b></option>
              <?php endif; ?>
            <?php endforeach; ?>
          </select>
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fa fa-cog"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3" id="kategori">
          <select name="kategori[]" class="form-control select2" multiple>
            <?php foreach ($kategori as $row) : ?>
              <option value="<?= $row->id ?>"><?= ucwords($row->nama_kategori) ?></option>
            <?php endforeach ?>
          </select>
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-th-list"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="text" class="form-control" name="nama_user" id="nama_user" placeholder="Full name" required>
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-user"></span>
            </div>
          </div>
        </div>
        <?php if ($identity_column !== 'email') : ?>
          <div class="input-group mb-3">
            <input type="text" name="identity" id="identity" class="form-control" placeholder="Username" required="required" />
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fa fa-at"></span>
              </div>
            </div>
            <?= '<p>' . \Config\Services::validation()->getError('identity') . '</p>'; ?>
          </div>
        <?php endif ?>
        <div class="input-group mb-3">
          <input type="email" class="form-control" name="email" id="email" placeholder="Email">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-envelope"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="text" class="form-control only-number" name="phone" id="phone" placeholder="No Hp/Wa : 08xxxx" required>
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fa fa-phone"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="password" class="form-control" name="password" id="password" placeholder="Password" required>
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="password" class="form-control" id="password_confirm" name="password_confirm" placeholder="Retype password" required>
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-6">
            <a href="<?= site_url('login'); ?>" class="btn btn-warning btn-block">Login</a>
          </div>
          <!-- /.col -->
          <div class="col-6">
            <input type="hidden" name="action" value="<?= $action; ?>" />
            <button type="submit" class="btn btn-primary btn-block">Daftar</button>
          </div>
          <!-- /.col -->
        </div>
        <?= form_close(); ?>

      </div>
      <!-- /.form-box -->
    </div><!-- /.card -->
  </div>
  <!-- /.register-box -->

  <!-- jQuery -->
  <script src="<?= base_url('assets/plugins/jquery/jquery.min.js') ?>"></script>
  <!-- Bootstrap 4 -->
  <script src="<?= base_url('assets/plugins/bootstrap/js/bootstrap.bundle.min.js') ?>"></script>
  <!-- AdminLTE App -->
  <script src="<?= base_url('assets/dist/js/adminlte.min.js') ?>"></script>
  <script src="<?= base_url('assets/plugins/sweetalert2/sweetalert2.all.min.js') ?>"></script>
  <!-- select2 -->
  <script src="<?= base_url('assets/plugins/select2/js/select2.full.min.js') ?>"></script>
  <script src="<?= base_url('assets/dist/js/validator.js') ?>"></script>
  <script>
    $(".only-number").on('keyup', function() {
      let regex = /[^0-9.]/g
      if (regex.test(this.value)) {
        alert('Masukan Angka!')
        $(this).addClass('border border-danger')
      }
      this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1')
    })
    $('.select2').select2({
      placeholder: 'Pilih Kategori',
      allowClear: true
    })
    $('#kategori').hide()
    $('#group').on('change', function() {
      let value = $(this).val()
      if (value == 3) {
        $('#kategori').removeAttr('name')
        $('#kategori').slideUp('fast')
      } else {
        $('#kategori').slideDown('slow')
      }
    })
    $('form').submit(function(e) {
      e.preventDefault();
      if (!validator.checkAll($(this))) {
        false;
      } else {
        $.ajax({
          url: $(this).attr("action"),
          type: 'post',
          data: $(this).serialize(),
          success: function(response) {
            var data = $.parseJSON(response);
            swal.fire({
              position: 'top',
              icon: data.type,
              title: data.title,
              html: data.text,
              showConfirmButton: false,
              timer: 1500
            }).then((result) => {
              if (data.type == 'success') {
                window.location.replace(location.origin + '/login');
              }
            });
          },
          error: function(jqXHR, exception, thrownError) {
            swal.fire({
              title: "Error code" + jqXHR.status,
              html: thrownError + ", " + exception,
              type: "error"
            }).then(function() {
              $("#spinner").hide();
            });
          }
        });
      }
    });
  </script>
</body>

</html>