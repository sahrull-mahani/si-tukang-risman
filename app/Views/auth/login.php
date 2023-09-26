<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?= $title ?> | Log in</title>

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
                <a href="" class="h1"><b><?= lang('Auth.login_heading'); ?></b></a>
            </div>
            <div class="card-body">
                <p class="login-box-msg"><?= lang('Auth.login_subheading'); ?></p>
                <?= isset($message) ? '<p class="login-box-msg error">' . $message . '</p>' : ''; ?>
                <?= form_open('log-in', array('id' => 'form-login', 'class' => 'mode2')); ?>
                <div class="mb-3 item">
                    <div class="input-group">
                        <input type="email" class="form-control" name="identity" placeholder="<?= lang('Auth.login_identity_label') ?>" required />
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-envelope"></span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="mb-3 item">
                    <div class="input-group">
                        <input type="password" class="form-control" name="password" placeholder="<?= lang('Auth.login_password_label') ?>" required />
                        <div class="input-group-append" id="show-password" role="button" tabindex="0">
                            <div class="input-group-text">
                                <span class="fas fa-lock"></span>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-6">
                        <a href="<?= site_url('register'); ?>" class="btn btn-warning btn-block">Daftar</a>
                    </div>
                    <div class="col-6">
                        <?= form_submit('submit', lang('Auth.login_submit_btn'), 'class="btn btn-primary btn-block"') ?>
                    </div>
                    <div class="col-12 mt-2">
                        <a href="/" class="btn btn-xs btn-secondary btn-block">Home</a>
                    </div>
                </div>
                </form>
                   
            </div>
        </div>
    </div>
    <script src="<?= base_url('assets/plugins/jquery/jquery.min.js') ?>"></script>
    <!-- Bootstrap 4 -->
    <script src="<?= base_url('assets/plugins/bootstrap/js/bootstrap.bundle.min.js') ?>"></script>
    <!-- AdminLTE App -->
    <script src="<?= base_url('assets/dist/js/adminlte.min.js') ?>"></script>
    <script src="<?= base_url('assets/plugins/sweetalert2/sweetalert2.all.min.js') ?>"></script>
    <script src="<?= base_url('assets/dist/js/validator.js') ?>"></script>
    <script>
        $('#show-password').on('click', function(e) {
            e.preventDefault()
            let icon = $(this).children().find('.fas')
            icon.toggleClass('fa-lock fa-unlock')
            if (icon.attr('class') == 'fas fa-unlock') {
                $('input[name=password]').attr('type', 'text')
            }else{
                $('input[name=password]').attr('type', 'password')
            }
        })
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
                            title: 'Request Login',
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
                                window.location.replace(location.origin + data.href);
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