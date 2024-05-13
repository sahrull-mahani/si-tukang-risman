$('.rent').on('click', function (e) {
  e.preventDefault()
  $('#myModal').find('input[type="radio"]').prop('checked', false)
  let href = $(this).attr('href')
  let login = $(this).data('login')
  let idtukang = $(this).data('idtukang')
  let tarif = $(this).data('tarif')
  if (login == 'not-login') {
    return location.href = location.origin + href
  }
  $('#myModal').modal('show')
  let name = $(this).parent().prev().find('li:nth-child(1) > span:nth-child(2)').text()
  $('#myModal').find('.modal-title').text(`Rental ${name}`)
  let kategori = $(this).data('kategori').split(', ')
  $('#kategori').empty()
  kategori.map((val, _) => {
    let value = val.split('|')[0]
    $('#kategori').append(`<label class="btn btn-outline-primary category">
                            <input type="checkbox" name="kategori[]" value="${val}"> ${value}
                          </label>`)
  })
  $('#harian').attr('data-value', tarif)
  $('#myModal').find('label[for="harian"]').text(`Harian : Rp. ${formatRupiah(tarif)}`)
  $('#myModal').find('input[name="idtukang"]').val(idtukang)
})
$('body').on('click', '#harga-borongan', function () {
  let myelm = $('#kategori').find('label')
  let n = 0
  let satuan = []
  myelm.each(function (i, val) {
    let value = val.querySelector('input').value
    value = value.split('|')
    let biaya = parseInt(value[1])

    let active = val.classList.contains('active')
    if (active) {
      n += biaya
      if ($.inArray(value[2], satuan) == -1) {
        satuan.push(value[2])
      }
    }
  })
  if (n > 0) {
    $('#borongan').removeAttr('disabled')
  } else {
    $('#borongan').attr('disabled', true)
  }
  $('#borongan').attr('data-value', n)
  $('label[for="borongan"]').text(`Borongan ${satuan.join(', ')} : Rp. ${formatRupiah(n)}`)
})
$('body').on('click', 'input[name="konsumsi"]', function () {
  let tarif = parseInt($('.rent').data('tarif'))
  if (this.value == 'disediakan') {
    tarif = tarif - 25000
    $('label[for="harian"]').text(`Harian : Rp. ${formatRupiah(tarif)}`)
  } else {
    $('label[for="harian"]').text(`Harian : Rp. ${formatRupiah(tarif)}`)
  }
})
$('input[name="pembayaran"]').on('change', function () {
  $('input[name="tarif"]').val($(this).data('value'))
})

function formatRupiah(n) {
  return n.toString().replace(/(\d)(?=(\d{3})+(?!\d))/g, "$1.")
}

$('#form-rental').on('submit', function (e) {
  e.preventDefault()
  $.post({
    url: $(this).attr('action'),
    data: $(this).serialize(),
    dataType: 'json',
    success: function (res) {
      console.log(res)
      Swal.fire({
        title: res.title,
        text: res.text,
        icon: res.type
      }).then((result) => {
        console.log(result)
        if (result.isConfirmed || result.isDismissed) {
          $('#myModal').modal('toggle')
          setTimeout(() => {
            window.location.reload()
          }, 500)
        }
      })
    }
  })
})

$('.form-done').on('submit', function (e) {
  e.preventDefault()
  $.post({
    url: $(this).attr('action'),
    data: $(this).serialize(),
    dataType: 'json',
    success: function (data) {
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

$('.lihat-alasan-tolak').on('click', function () {
  let alasan = $(this).data('alasan')
  Swal.fire({
    title: 'Alasan ditolak',
    html: alasan,
    icon: 'info',
    footer: "<span class='text-danger font-italic'>Anda belum bisa melakukan rental pada tukang yang menolak pesanan Anda! \n Anda baru bisa melakukan pemesanan lagi pada tukan ini paling cepat besok!</span>"
  })
})