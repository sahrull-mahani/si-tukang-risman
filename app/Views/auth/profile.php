<?= $this->extend('template_adminlte/index') ?>
<?= $this->section('page-content') ?>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Profile</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">User Profile</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-3">

                    <!-- Profile Image -->
                    <div class="card card-primary card-outline">
                        <div class="card-body box-profile">
                            <div class="text-center" role="button">
                                <img class="profile-user-img img-fluid img-circle" src="<?= $session->foto; ?>" alt="User profile picture" data-toggle="modal" data-target="#edit-foto-modal">
                            </div>
                            <h3 class="profile-username text-center"><?= $session->nama_user; ?></h3>
                            <p class="text-muted text-center"><?= $session->userlevel; ?></p>
                            <ul class="list-group list-group-unbordered mb-3">
                                <li class="list-group-item">
                                    <b>Terkahir Login</b> <a class="float-right"><?= $session->old_last_login; ?></a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>

                <!-- Modal -->
                <div class="modal fade" id="edit-foto-modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-lg">
                        <div class="modal-content">
                            <?= form_open_multipart('auth/save_profile', array('class' => 'form-horizontal', 'id' => 'save-account')); ?>
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Ganti Foto</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <input type="hidden" name="nama_user" value="<?= isset($get->nama) ? $get->nama : $user->nama_user; ?>" id="nama_user" class="form-control" required="required" <?= isset($get->nama) ? 'readonly' : ''; ?> />
                                <input type="hidden" name="username" value="<?= isset($user->username) ? $user->username : ''; ?>" id="username" class="form-control" required="required" <?= $identityColumn === 'username' ? 'readonly' : ''; ?> />
                                <input type="hidden" name="email" value="<?= isset($user->email) ? $user->email : ''; ?>" id="email" class="form-control" required="required" <?= $identityColumn === 'email' ? 'readonly' : ''; ?> />
                                <input type="hidden" name="phone" value="<?= isset($user->phone) ? $user->phone : ''; ?>" id="phone" class="form-control" required="required" />
                                <input type="hidden" name="old_foto" value="<?= isset($user->img) ? $user->img : ''; ?>" id="img" class="form-control" required="required" />
                                <input type="hidden" name="user_id" value="<?= isset($user->id) ? $user->id : ''; ?>" id="img" class="form-control" required="required" />
                                <?= form_hidden('id', $session->user_id); ?>
                                <input class="input-id" type="file" data-urlimage="<?= $user->img == 'profile.png' ? '/admin_assets/img/profile.png' : base_url("Berita/img_thumb/$user->img") ?>" name="file-img" accept=".jpg, .png, image/jpeg, image/png">
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary">Save changes</button>
                            </div>
                            <?= form_close() ?>
                        </div>
                    </div>
                </div>

                <div class="col-md-9">
                    <div class="card">
                        <div class="card-header p-2">
                            My Account
                        </div><!-- /.card-header -->
                        <div class="card-body">
                            <?= form_open('auth/change_password', array('class' => 'form-horizontal', 'id' => 'save-accounts')); ?>
                            <div class="form-group row mode2">
                                <?= form_label(lang('Auth.edit_user_name_label'), 'nama_user', ['class' => 'col-sm-4 col-form-label']); ?>
                                <div class="col-sm-8 item">
                                    <input type="text" name="nama_user" value="<?= isset($get->nama) ? $get->nama : $user->nama_user; ?>" id="nama_user" class="form-control" required="required" <?= isset($get->nama) ? 'readonly' : ''; ?> />
                                </div>
                            </div>
                            <div class="form-group row mode2">
                                <?= form_label(lang('Auth.edit_username_label'), 'username', ['class' => 'col-sm-4 col-form-label']); ?>
                                <div class="col-sm-8 item">
                                    <input type="text" name="username" value="<?= isset($user->username) ? $user->username : ''; ?>" id="username" class="form-control" required="required" <?= $identityColumn === 'username' ? 'readonly' : ''; ?> />
                                </div>
                            </div>
                            <div class="form-group row mode2">
                                <?= form_label(lang('Auth.edit_user_email_label'), 'email', ['class' => 'col-sm-4 col-form-label']); ?>
                                <div class="col-sm-8 item">
                                    <input type="text" name="email" value="<?= isset($user->email) ? $user->email : ''; ?>" id="email" class="form-control" required="required" <?= $identityColumn === 'email' ? 'readonly' : ''; ?> />
                                </div>
                            </div>
                            <div class="form-group row mode2">
                                <?= form_label(lang('Auth.edit_user_phone_label'), 'phone', ['class' => 'col-sm-4 col-form-label']); ?>
                                <div class="col-sm-8 item">
                                    <input type="text" name="phone" value="<?= isset($user->phone) ? $user->phone : ''; ?>" id="phone" class="form-control" required="required" />
                                </div>
                            </div>
                            <div class="form-group row mode2">
                                <label for="old_password" class="col-sm-4 col-form-label"><?= lang('Auth.change_password_old_password_label'); ?></label>
                                <div class="col-sm-8 item">
                                    <?= form_input($old_password); ?>
                                </div>
                            </div>
                            <div class="form-group row mode2">
                                <label for="new_password" class="col-sm-4 col-form-label"><?= sprintf(lang('Auth.change_password_new_password_label'), $minPasswordLength); ?></label>
                                <div class="col-sm-8 item">
                                    <?= form_input($new_password); ?>
                                </div>
                            </div>
                            <div class="form-group row mode2">
                                <label for="new_password_confirm" class="col-sm-4 col-form-label"><?= lang('Auth.change_password_new_password_confirm_label'); ?></label>
                                <div class="col-sm-8 item">
                                    <?= form_input($new_password_confirm); ?>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="offset-sm-4 col-sm-8">
                                    <?= form_hidden('id', $session->user_id); ?>
                                    <?php //form_submit('submit', lang('Auth.change_password_submit_btn'), ['class' => 'btn btn-primary']); ?>
                                    <button type="submit" class="btn btn-primary">Change</button>
                                </div>
                            </div>
                            <?= form_close() ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
<?= $this->endSection() ?>