<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Google Font: Source Sans Pro -->
    <title><?= $title; ?> | Presensi THL</title>

    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <link rel="stylesheet" href="<?= base_url('assets/plugins/fontawesome-free/css/all.min.css') ?>" />
    <link rel="stylesheet" href="<?= base_url('assets/plugins/icheck-bootstrap/icheck-bootstrap.min.css') ?>" />
    <link rel="stylesheet" href="<?= base_url('assets/plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css') ?>">
    <link rel="stylesheet" href="<?= base_url('assets/dist/css/validator.css') ?>" />
    <link rel="stylesheet" href="<?= base_url('assets/dist/css/adminlte.min.css') ?>" />
</head>

<body class="hold-transition login-page">
    <div class="login-box">
        <div class="card card-outline card-primary">
            <div class="card-header text-center">
                <a href="<?= site_url() ?>">presensi.diskominfo.bolmutkab<b>.go.id</b></a>
            </div>
            <div class="card-body">
                <p class="login-box-msg"><?= lang('Auth.reset_password_heading'); ?> <br> <?= $message; ?> </p>
                <?= form_open('reset_password/' . $code, array("class" => "mode2")); ?>
                <div class="input-group mb-3">
                    <input type="password" name="new" id='new' class="form-control" placeholder="<?= sprintf(lang('Auth.reset_password_new_password_label'), $minPasswordLength) ?> " required="required" data-validate-length-range="8,15">
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-lock"></span>
                        </div>
                    </div>
                </div>
                <div class="input-group mb-3">
                    <input type="password" name="new_confirm" id="new_confirm" class="form-control" placeholder="<?= lang('Auth.reset_password_new_password_confirm_label'); ?>" data-validate-linked="new" required="required">
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-lock"></span>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <input type="hidden" name="user_id" value="<?= $user_id; ?>" id="user_id" />
                        <?= form_submit('submit', lang('Auth.reset_password_submit_btn'), 'class="btn btn-primary btn-block"'); ?>
                    </div>
                    <!-- /.col -->
                </div>
                </form>

                <p class="mt-3 mb-1">
                    <a href="login.html">Login</a>
                </p>
            </div>
            <!-- /.login-card-body -->
        </div>
    </div>
    <!-- /.login-box -->

    <!-- jQuery -->
    <script src="<?= base_url('assets/plugins/jquery/jquery.min.js') ?>"></script>
    <!-- Bootstrap 4 -->
    <script src="<?= base_url('assets/plugins/bootstrap/js/bootstrap.bundle.min.js') ?>"></script>
    <!-- AdminLTE App -->
    <script src="<?= base_url('assets/dist/js/adminlte.min.js') ?>"></script>
    <script src="<?= base_url('assets/plugins/sweetalert2/sweetalert2.all.min.js') ?>"></script>
    <script src="<?= base_url('assets/dist/js/validator.js') ?>"></script>
    <script>
        $('form').on('blur', 'input[required], input.optional, select.required', validator.checkField).on('change', 'select.required', validator.checkField).on('keypress', 'input[required][pattern]', validator.keypress);
        $('.multi.required').on('keyup blur', 'input', function() {
            validator.checkField.apply($(this).siblings().last()[0]);
        });
        $('form').submit(function(e) {
            e.preventDefault();
            if (!validator.checkAll($(this))) {
                false;
            } else {
                $.ajax({
                    url: $(this).attr("action"),
                    type: 'post',
                    data: $("form").serialize(),
                    beforeSend: function() {
                        let timerInterval
                        Swal.fire({
                            position: 'top',
                            title: 'Request reset password',
                            html: 'Mohon Tunggu Sebentar in <b></b> milliseconds.',
                            timer: 2000,
                            timerProgressBar: true,
                            didOpen: () => {
                                Swal.showLoading()
                                const b = Swal.getHtmlContainer().querySelector('b')
                                timerInterval = setInterval(() => {
                                    b.textContent = Swal.getTimerLeft()
                                }, 100)
                            },
                            willClose: () => {
                                clearInterval(timerInterval)
                            }
                        })
                    },
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
                                window.location.replace('<?= site_url('login') ?>');
                            } else {
                                window.location.replace('<?= site_url('admin/auth/reset_password/' . $code) ?>');
                            }
                        });
                    },
                    error: function(jqXHR, exception, thrownError) {
                        swal.fire({
                            title: "Error code" + jqXHR.status,
                            html: thrownError + ", " + exception,
                            icon: "error"
                        }).then((result) => {
                            $("#spinner").hide();
                        });
                    }
                });
            }
        });
    </script>
</body>

</html>