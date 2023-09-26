<?= form_open_multipart('berita/save', array('class' => 'form-horizontal mode2')); ?>
<div class="card-body">
    <div class="form-group item">
        <label for="judul">Judul Postingan</label>
        <input type="text" class="form-control" id="judul" name="judul" value="<?= (isset($get->judul)) ? $get->judul : ''; ?>" placeholder="Judul" required />
    </div>
    <input id="input-edit-berita" type="file" name="userfile[]" accept=".jpg, .png, image/jpeg, image/png" multiple>
    <div class="form-group item mt-3">
        <label for="body">Isi Berita</label>
        <textarea class="text-area" name="isi" id="isi"><?= (isset($get->isi_berita)) ? $get->isi_berita : ''; ?></textarea>
    </div>
</div>
<?php foreach ($gambar as $pic) {
    $pics[] = base_url('/Berita/img_medium') . "/$pic->sumber";
} ?>

<div class="card-footer">
    <input type="hidden" name="id" value="<?= (isset($get->id)) ? $get->id : ''; ?>" />
    <input type='hidden' name='action' value="update" />
    <button type="submit" class="btn btn-primary">EDIT</button>
</div>
<?= form_close(); ?>
<script type='text/javascript'>
    $.fn.fileinputBsVersion = "3.3.7"; // if not set, this will be auto-derived
    $("#input-edit-berita").fileinput({
        'showUpload': false,
        'showRemove': true,
        'showCancel': false,
        'initialPreviewShowDelete': true,
        'previewFileType': 'image',
        'browseOnZoneClick': true,
        'allowedFileExtensions': ["jpg", "png", "jpeg"],
        'browseLabel': 'Pilih Gambar',
        'browseClass': 'btn btn-success btn-block',
        'browseIcon': '<i class="fa fa-camera"></i> ',
        'overwriteInitial': true,
        'initialPreviewAsData': true,
        'initialPreview': <?= json_encode($pics) ?>
    })

    $('.text-area').summernote({
        onPaste: function(e) {
            var bufferText = ((e.originalEvent || e).clipboardData || window.clipboardData).getData('Text');
            e.preventDefault();
            document.execCommand('insertText', false, bufferText);
        },
        height: 150,
        inheritPlaceholder: true,
        disableDragAndDrop: true,
        codeviewFilter: false,
        codeviewIframeFilter: true,
        tabDisable: true,
        popover: {
            air: [
                ['color', ['color']],
                ['font', ['bold', 'underline', 'clear']],
                ['para', ['ul', 'paragraph']],
                ['table', ['table']],
                ['insert', ['link', 'picture']]
            ]
        },
        toolbar: [
            // [groupName, [list of button]]
            ['style', ['bold', 'italic', 'underline']],
            ['font', ['fontname', 'fontsize', 'fontsizeunit', 'strikethrough', 'superscript', 'subscript', 'clear']],
            ['color', ['color']],
            ['para', ['ul', 'ol', 'paragraph', 'table']],
            ['media', ['link', 'hr']],
        ]
    })

    $.fn.modal.Constructor.prototype._enforceFocus = function() {};
    $('form').on('blur', 'input[required], input.optional, select.required', validator.checkField).on('change', 'select.required', validator.checkField).on('keypress', 'input[required][pattern]', validator.keypress);
    $('.multi.required').on('keyup blur', 'input', function() {
        validator.checkField.apply($(this).siblings().last()[0]);
    });
    $('form').submit(function(e) {
        e.preventDefault();
        if (!validator.checkAll($(this))) {
            return false;
        } else {
            var data = new FormData(this)
            var url = $(this).attr('action')
            simpan(url, data)
        }
    })

    function simpan(url, data) {
        $.ajax({
            url: url,
            type: 'post',
            data: data,
            processData: false,
            contentType: false,
            cache: false,
            async: false,
            success: function(response) {
                var data = $.parseJSON(response);
                Swal.fire({
                    title: data.title,
                    html: data.text,
                    type: data.type
                }).then((result) => {
                    if (data.type == "success") {
                        $('#modal_content').modal('hide');
                        $('#table').bootstrapTable('refresh');
                    } else {
                        $('#spinner').hide();
                    }
                });
            },
            error: function(jqXHR, exception, thrownError) {
                Swal.fire({
                    title: 'Error code' + jqXHR.status,
                    html: thrownError + ', ' + exception,
                    type: 'error'
                }).then((result) => {
                    $('#spinner').hide();
                });
            }
        });
    }
</script>
<script src="<?= base_url('assets/dist/js/script.js') ?>"></script>