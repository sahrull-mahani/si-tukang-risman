$.fn.fileinputBsVersion = "3.3.7"; // if not set, this will be auto-derived
// initialize plugin with defaults
$("#input-id").fileinput();
// with plugin options
$("#input-id").fileinput({
  'showUpload': false,
  'previewFileType': 'any',
  'browseOnZoneClick': true
});

$("#textarea").wysihtml5({
  toolbar: {
    "image": false
  }
})

$('#example1').DataTable()
$('#example2').DataTable({
  'paging': true,
  'lengthChange': false,
  'searching': false,
  'ordering': true,
  'info': true,
  'autoWidth': false
})

$('.edit-inline').dblclick(function () {
  var span = $(this);
  var text = span.text();
  let id = span.data('id')

  var new_text = prompt("Change value", text);

  if (new_text != null) {
    // span.text("GANTI");
    $.ajax({
      'url': "/user/process_edit_user",
      'type': "POST",
      'data': { username: new_text, id: id },
      'success': function (result) {
        if (result == "gagal") {
          alert("Pastikan username belum terdaftar & username tidak mengandung spasi!")
        } else {
          span.text(new_text)
        }
      }
    })
  }
})

$('#myForm input[type="text"]').blur(function () {
  if (!$(this).val()) {
    $('.btn-disable-check').prop('disabled', true)
  } else {
    $('.btn-disable-check').prop('disabled', false)
  }
})

$(".btn-ask").on('click', function(e) {
  e.preventDefault()
  let href = $(this).attr("href")
  let data = $(this).data('text')
  let judul = $(this).data('judul')
  Swal.fire({
    title: judul,
    html: data,
    icon: 'question',
    confirmButtonText: 'Yakin',
    showCancelButton: true,
    confirmButtonColor: "#3085d6",
    cancelButtonColor: "#d33"
  }).then((result) => {
    if(result.value) {
      document.location.href = href
    }
  })
})

$(".btn-collapse").on('click', function() {
  if ($(this).data('visible') == "show") {
    $(this).text("sembunyikan")
    $(this).data('visible', 'hidden')
  }else{
    $(this).text($(this).data('text'))
    $(this).data('visible', 'show')
  }
})