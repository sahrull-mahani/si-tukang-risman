$.fn.fileinputBsVersion = "3.3.7"; // if not set, this will be auto-derived
$.post({
    url: location.origin + '/Tukang/fotoproject',
    async: false,
    data: { id: $('#id').val(), nama: $('#nama').val() },
    success: function (res) {
        let data = $.parseJSON(res)
        let fotoproject = []
        $.each(data, function (i, v) {
            fotoproject.push(location.origin + '/Web/img_thumb/' + v.sumber)
        })
        if (fotoproject.length > 0) {
            $('.input-id.project').fileinput({
                'showUpload': false,
                'showRemove': false,
                'showCancel': false,
                'previewFileType': 'image',
                'browseOnZoneClick': true,
                'required': false,
                'allowedFileExtensions': ["jpg", "png", "jpeg"],
                'browseLabel': 'Pilih Gambar',
                'browseClass': 'btn btn-success btn-block',
                'browseIcon': '<i class="fa fa-camera"></i> ',
                'initialPreviewAsData': true,
                'initialPreview': fotoproject
            })
        } else {
            $('.input-id.project').fileinput({
                'showUpload': false,
                'showRemove': false,
                'showCancel': false,
                'previewFileType': 'image',
                'browseOnZoneClick': true,
                'required': false,
                'allowedFileExtensions': ["jpg", "png", "jpeg"],
                'browseLabel': 'Pilih Gambar',
                'browseClass': 'btn btn-success btn-block',
                'browseIcon': '<i class="fa fa-camera"></i> ',
            })
        }
    }
})

if ($('.ktp').data('urlimage') != '') {
    let ktp = $('.ktp').data('urlimage')
    $(".ktp").fileinput({
        'showUpload': false,
        'showRemove': false,
        'showCancel': false,
        'previewFileType': 'image',
        'browseOnZoneClick': true,
        'required': false,
        'allowedFileExtensions': ["jpg", "png", "jpeg"],
        'browseLabel': 'Pilih Gambar',
        'browseClass': 'btn btn-success btn-block',
        'browseIcon': '<i class="fa fa-camera"></i> ',
        'initialPreviewAsData': true,
        'initialPreview': [ktp],
        'initialPreviewConfig': [{
            caption: 'KTP', size: 10, url: location.origin, key: 99
        }]
    })
} else {
    $(".ktp").fileinput({
        'showUpload': false,
        'showRemove': false,
        'showCancel': false,
        'previewFileType': 'image',
        'browseOnZoneClick': true,
        'required': false,
        'allowedFileExtensions': ["jpg", "png", "jpeg"],
        'browseLabel': 'Pilih Gambar',
        'browseClass': 'btn btn-success btn-block',
        'browseIcon': '<i class="fa fa-camera"></i> '
    })
}

if ($('.input-id').length > 0) {
    if ($('.input-id').data('urlimage') != '') {
        let image = $('.input-id').data('urlimage')

        $(".input-id").fileinput({
            'showUpload': false,
            'showRemove': false,
            'showCancel': false,
            'previewFileType': 'image',
            'browseOnZoneClick': true,
            'required': false,
            'maxFileSize': 3 * 1024,
            'uploadUrl': location.origin,
            'allowedFileExtensions': ["jpg", "png", "jpeg"],
            'browseLabel': 'Pilih Gambar',
            'browseClass': 'btn btn-success btn-block',
            'browseIcon': '<i class="fa fa-camera"></i> ',
            'overwriteInitial': true,
            'initialPreviewShowDelete': false,
            'fileActionSettings': {
                'showUpload': false,
                'showRemove': false,
            },
            'initialPreviewAsData': true,
            'initialPreview': [image],
            'initialPreviewConfig': [
                { caption: 'Image', size: 12000, url: location.origin, key: 99 }
            ]
        })
    } else {
        $(".input-id").fileinput({
            'showUpload': false,
            'showRemove': false,
            'showCancel': false,
            'previewFileType': 'image',
            'browseOnZoneClick': true,
            'required': false,
            'maxFileSize': 3 * 1024,
            'uploadUrl': location.origin,
            'allowedFileExtensions': ["jpg", "png", "jpeg"],
            'browseLabel': 'Pilih Gambar',
            'browseClass': 'btn btn-success btn-block',
            'browseIcon': '<i class="fa fa-camera"></i> ',
        })
    }
}


$('.text-area').summernote({
    onPaste: function (e) {
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

$('.select2').select2({
    placeholder: 'Pilih Kategori',
    allowClear: true
})
$.get({
    url: location.origin + '/tukang/getkategori/' + $('#kategori').data('id'),
    success: function (res) {
        let data = $.parseJSON(res)
        $.each(data, function (i, v) {
            $('#kategori').val(v.id_kategori).change()
        })
    }
})

function previewImg(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();
        reader.onload = function (e) {
            $(".img-preview")
                .attr("src", e.target.result)
                .height(100);
        };
        reader.readAsDataURL(input.files[0]);
        $(".img-preview").show();
    } else {
        $("img-preview").hide();
    }
}
$(".tag-with-input").select2({
    theme: 'bootstrap4',
    tags: true,
    tokenSeparators: [',', ' ']
})

const tooltipTriggerList = document.querySelectorAll('[data-bs-toggle="tooltip"]')
const tooltipList = [...tooltipTriggerList].map(tooltipTriggerEl => new bootstrap.Tooltip(tooltipTriggerEl))

$(".only-number").on('keyup', function () {
    let regex = /[^0-9.]/g
    if (regex.test(this.value)) {
        alert('Masukan Angka!')
        // $(this).addClass('border border-danger')
    }
    this.value = this.value.replace(regex, '').replace(/(\..*?)\..*/g, '$1')
})
$(".only-alpha").on('keyup', function () {
    let regex = /[^a-z/A-Z/ ]/g
    if (regex.test(this.value)) {
        alert('Masukan Alphabets!')
        // $(this).addClass('border border-danger')
    }
    this.value = this.value.replace(regex, '')
})

$('.tolak-pesanan').on('click', function (e) {
    e.preventDefault()
    Swal.fire({
        title: 'Anda yakin menolak pesanan ini?',
        html: `<textarea id="alasan" class="swal2-input" placeholder="Berikan alasan Anda menolak pesanan..."></textarea>`,
        icon: 'question',
        confirmButtonText: 'Yakin!',
        confirmButtonColor: '#ff0000',
        showCancelButton: true,
        cancelButtonColor: '#333333',
        cancelButtonText: 'Tidak Yakin',
        preConfirm: () => {
            const alasan = Swal.getPopup().querySelector('#alasan').value
            if (!alasan) {
                Swal.showValidationMessage(`Anda harus memasukan alasan Anda!..,`)
            }
            let value
            let idorder = $(this).data('idorder')
            $.post({
                url: $(this).attr('href'),
                data: { alasan, idorder },
                dataType: 'json',
                async: false,
                success: function (val) {
                    return value = val
                }
            })
            return value
        }
    }).then(() => {
        Swal.fire('Success', 'Berhasil', 'success').then((result) => {
            if (result.isConfirmed || result.isDismissed) {
                window.location.href = location.href + '/home'
            }
        })
    })
})

$('.rupiah-format').on('keyup', function () {
    $(this).val(formatRupiah(this.value))
})

const formatRupiah = function (num) {
    var str = num.toString().replace("", ""), parts = false, output = [], i = 1, formatted = null;
    if (str.indexOf(",") > 0) {
        parts = str.split(",");
        str = parts[0];
    }
    str = str.split("").reverse();
    for (var j = 0, len = str.length; j < len; j++) {
        if (str[j] != ".") {
            output.push(str[j]);
            if (i % 3 == 0 && j < (len - 1)) {
                output.push(".");
            }
            i++;
        }
    }
    formatted = output.reverse().join("");
    return ("" + formatted + ((parts) ? "," + parts[1].substr(0, 2) : ""));
}

$('select#kategori').on('change', function () {
    let val = $(this).val()
    $('#harga-borongan').empty()
    val.map((v, i) => {
        let text = $(this).find(`option[value="${v}"]`).text().toLowerCase()
        let tarif = $(this).find(`option[value="${v}"]`).data('price')
        $('#harga-borongan').append(`<input type="text" class="form-control ${val.length > 1 ? 'my-2' : ''}" name="harga_borongan[]" placeholder="masukan harga ${text}..." value="${tarif}" required />`)
    })
})

$('#chat').on('click', function () {
    $('#messages').empty()
    $.post({
        url: location.origin + '/chat/getMessages',
        data: { id_order: $('input[name="id_order"]').val() },
        dataType: 'json',
        success: function (res) {
            if (!$('#badge-message').hasClass('d-none')) {
                $('#badge-message').addClass('d-none')
            }
            $('#messages').append(res.html)
            $('#messages').animate({ scrollTop: 99999 }, 'slow')
        }
    })
})

$('#form-chat').on('submit', function (e) {
    e.preventDefault()
    $.post({
        url: $(this).attr('action'),
        data: $(this).serialize(),
        dataType: 'json',
        success: function (res) {
            $('#messages').append(res.html)
            $('input[name="pesan"]').val('')
            $('#messages').animate({ scrollTop: 99999 }, 'slow')
        },
        error: function (err) {
            toastr.error(err.responseJSON.message, 'error')
        }
    })
})


// #PUSHER
Pusher.logToConsole = false
let pusher = new Pusher('f3ddd543d7a028f9e4b9', {
    cluster: 'ap1'
})

let channel = pusher.subscribe('my-channel')
channel.bind('chat', function (data) {
    if ($(`#badge-message[data-user="${data.level}"]`).hasClass('d-none') && $('.card').hasClass('collapsed-card')) {
        $(`#badge-message[data-user="${data.level}"]`).removeClass('d-none')
    }
    $(`#messages[data-user="${data.level}"]`).append(data.html)
    $(`#messages[data-user="${data.level}"]`).animate({ scrollTop: 99999 }, 'slow')
})
// #END-PUSHER