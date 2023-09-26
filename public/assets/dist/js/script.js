$.fn.fileinputBsVersion = "3.3.7"; // if not set, this will be auto-derived
$.post({
    url: location.origin + '/Tukang/fotoproject',
    async: false,
    data: {id: $('#id').val(), nama: $('#nama').val()},
    success: function(res) {
        let data = $.parseJSON(res)
        console.log(data.length)
        let fotoproject = []
        $.each(data, function(i, v) {
            fotoproject.push(location.origin + '/Berita/img_thumb/' + v.sumber)
        })
        console.log(fotoproject)
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
        }else{
            $('.input-id.project').fileinput({
                'showUpload': false,
                'showRemove': false,
                'showCancel': false,
                'previewFileType': 'image',
                'browseOnZoneClick': true,
                'required': true,
                'allowedFileExtensions': ["jpg", "png", "jpeg"],
                'browseLabel': 'Pilih Gambar',
                'browseClass': 'btn btn-success btn-block',
                'browseIcon': '<i class="fa fa-camera"></i> ',
            })
        }
    }
})

if ($('.input-id.ktp').data('urlimage') != '') {
    $(".input-id.ktp").fileinput({
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
        'initialPreview': $('.input-id.ktp').data('urlimage')
    })
}else{
    $(".input-id.ktp").fileinput({
        'showUpload': false,
        'showRemove': false,
        'showCancel': false,
        'previewFileType': 'image',
        'browseOnZoneClick': true,
        'required': true,
        'allowedFileExtensions': ["jpg", "png", "jpeg"],
        'browseLabel': 'Pilih Gambar',
        'browseClass': 'btn btn-success btn-block',
        'browseIcon': '<i class="fa fa-camera"></i> ',
    })

}

if ($('.input-id').data('urlimage') != '') {
    $(".input-id").fileinput({
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
        'initialPreview': $('.input-id').data('urlimage')
    })
}else{
    $(".input-id").fileinput({
        'showUpload': false,
        'showRemove': false,
        'showCancel': false,
        'previewFileType': 'image',
        'browseOnZoneClick': true,
        'required': true,
        'allowedFileExtensions': ["jpg", "png", "jpeg"],
        'browseLabel': 'Pilih Gambar',
        'browseClass': 'btn btn-success btn-block',
        'browseIcon': '<i class="fa fa-camera"></i> ',
    })
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
    success: function(res) {
        let data = $.parseJSON(res)
        $.each(data, function(i, v) {
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