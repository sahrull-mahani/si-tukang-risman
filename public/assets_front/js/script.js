$('.rent').on('click', function (e) {
  e.preventDefault()
  let href = $(this).attr('href')
  let login = $(this).data('login')
  let idtukang = $(this).data('idtukang')
  let status = $(this).parent().prev().find('li:contains("Status"):last').children('span.spec')
  if (login == 'not-login') {
    return location.href = location.origin + href
  }
  Swal.fire({
    title: 'Anda yakin?',
    icon: 'question',
    html: `<input type="text" id="lokasi" class="swal2-input" placeholder="Lokasi">
    <textarea id="tugas" class="swal2-input" placeholder="Deskripsi pekerjaan..."></textarea>
    <select id="jenis_kerja" class="swal2-input" style="width: 60%;">
      <option value="harian" selected>Harian</option>
      <option value="borongan">Borongan</option>
    </select>`,
    confirmButtonText: 'Rental',
    focusConfirm: false,
    preConfirm: () => {
      const lokasi = Swal.getPopup().querySelector('#lokasi').value
      const tugas = Swal.getPopup().querySelector('#tugas').value
      const jenis_kerja = Swal.getPopup().querySelector('#jenis_kerja').value
      if (!lokasi || !tugas || !jenis_kerja) {
        Swal.showValidationMessage(`Data tidak boleh kosong!`)
      }
      let value
      $.post({
        url: location.origin + '/web/rental',
        data: { idtukang, lokasi, tugas, jenis_kerja },
        dataType: 'json',
        async: false,
        success: function (val) {
          return value = val
        }
      })
      return value
    }
  }).then((result) => {
    Swal.fire({
      title: result.value.title,
      text: result.value.text,
      icon: result.value.type
    })
    if (result.isConfirmed) {
      $(this).toggleClass('rent').toggleClass('disabled').text('Konfirmasi Tukang 1x24 Jam')
      status.addClass('font-weight-bold text-primary').text('Sementara Dirental')
    }
  })
})

$('.form-done').on('submit', function (e) {
  e.preventDefault()
  $.ajax({
    url: location.origin + $(this).attr('action'),
    type: 'POST',
    data: $(this).serialize(),
    success: function (res) {
      let data = $.parseJSON(res)
      Swal.fire({
        title: data.type,
        text: data.message,
        icon: data.type
      }).then((result) => {
        if (result.isConfirmed) {
          location.reload()
        }
      })
    }
  })
})


// rating
var $star_rating = $('.star-rating .fa-star');

var SetRatingStar = function () {
  return $star_rating.each(function () {
    if (parseInt($star_rating.siblings('input.rating-value').val()) >= parseInt($(this).data('rating'))) {
      return $(this).removeClass('fa-regular').addClass('fa-solid');
    } else {
      return $(this).removeClass('fa-solid').addClass('fa-regular');
    }
  });
};

$star_rating.on('click', function (e) {
  e.preventDefault()
  $star_rating.siblings('input.rating-value').val($(this).data('rating'));
  return SetRatingStar();
});

SetRatingStar()
// endrating