<?= form_open("auth/save", array("class" => "form-horizontal mode2")); ?>
<div class="modal-body">
    <div class="form-group row">
        <label for="nama_user" class="col-sm-3 col-form-label">Nama User :</label>
        <div class="col-sm-9 item">
            <input type="text" name="nama_user" value="<?= isset($user->nama_user)  && $action == 'update' ? $user->nama_user : ''; ?>" id="nama_user" class="form-control" required="required" />
        </div>
    </div>
    <?php if ($identity_column !== 'email') { ?>
        <div class="form-group row mode2">
            <label for="identity" class="col-sm-3 col-form-label">Identitas:</label>
            <div class="col-sm-9 item">
                <input type="text" name="identity" value="<?= isset($user->username)  && $action == 'update' ? $user->username : ''; ?>" id="identity" class="form-control" required="required" />
            </div>
            <?= '<p>' . \Config\Services::validation()->getError('identity') . '</p>'; ?>
        </div>
    <?php } ?>
    <div class="form-group row mode2">
        <label for="identity" class="col-sm-3 col-form-label">Surel:</label>
        <div class="col-sm-9 item">
            <input type="text" name="email" value="<?= isset($user->email) && $action == 'update' ? $user->email : ''; ?>" id="email" class="form-control" required="required" />
        </div>
    </div>
    <div class="form-group row mode2">
        <?php echo form_label(lang('Auth.create_user_phone_label'), 'phone', array("class" => "col-sm-3 col-form-label")); ?>
        <div class="col-sm-9 item">
            <input type="text" name="phone" value="<?= isset($user->phone)  && $action == 'update' ? $user->phone : ''; ?>" id="phone" class="form-control" placeholder="08xxx" required="required" />
        </div>
    </div>
    <div class="form-group row mode2">
        <label for="jenis_user" class="col-sm-3 col-form-label">Jenis User **</label>
        <div class="col-sm-9 item">
            <?php //if ($action == 'update') : 
            ?>
            <?php $no = 1;
            foreach ($groups as $group) :
                $gID = $group->id;
                $checked = null;
                foreach ($currentGroups as $grp) {
                    if ($action == 'update') {
                        if ($gID == $grp->id) {
                            $checked = ' checked="checked"';
                            break;
                        }
                    }
                } ?>
                <div class="custom-control custom-checkbox">
                    <input class="custom-control-input custom-control-input-danger custom-control-input-outline" type="radio" name="groups[]" value="<?= $group->id; ?>" <?= $checked; ?> id="customCheckbox<?= $no; ?>" />
                    <label for="customCheckbox<?= $no; ?>" class="custom-control-label"><?= htmlspecialchars($group->name, ENT_QUOTES, 'UTF-8'); ?></label>
                </div>
            <?php $no++;
            endforeach; ?>
            <?php //endif 
            ?>
        </div>
    </div>
    <div class="form-group row mode2">
        <?php echo form_label(lang('Auth.create_user_password_label'), 'password', array("class" => "col-sm-3 col-form-label")); ?>
        <div class="col-sm-9 item">
            <input type="password" name="password" value="" id="password" class="form-control" <?= isset($required) ? $required : ''; ?> />
        </div>
    </div>
    <div class="form-group row mode2">
        <?php echo form_label(lang('Auth.create_user_password_confirm_label'), 'password_confirm', array("class" => "col-sm-3 col-form-label")); ?>
        <div class="col-sm-9 item">
            <input type="password" name="password_confirm" value="" id="password_confirm" class="form-control" <?= isset($required) ? $required : ''; ?> />
        </div>
    </div>
</div>
<div class="modal-footer">
    <input type="hidden" name="action" value="<?= $action; ?>" />
    <input type="hidden" name="id" value="<?= isset($user->id) ? $user->id : ''; ?>" />
    <button type="submit" class="btn btn-primary pull-right"><i class="fa fa-send"></i> <?= $btn; ?></a></button>
</div>
<?= form_close(); ?>
<script type="text/javascript">
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
                success: function(response) {
                    var data = $.parseJSON(response);
                    Lobibox.notify(data.type, {
                        position: 'top right',
                        msg: data.text,
                        icon: data.type
                    });
                    $('#modal_content').modal('hide')
                    $('#table').bootstrapTable('refresh');
                },
                error: function(jqXHR, exception, thrownError) {
                    swal({
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