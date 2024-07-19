$('.rent').on('click', function (e) {
  e.preventDefault()
  $('#myModal').find('input[type="radio"]').prop('checked', false)
  $('#borongan').attr('disabled', true)
  $('#borongan').removeAttr('data-value')
  $('label[for="borongan"]').text('Borongan')

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
    $('#kategori').append(`<label class="btn btn-outline-primary category ${kategori.length == 1 ? 'active' : ''}">
                            <input type="checkbox" name="kategori[]" value="${val}" ${kategori.length == 1 ? 'checked' : ''}> ${value}
                          </label>`)
  })
  $('#harian').attr('data-value', tarif)
  $('#myModal').find('label[for="harian"]').text(`Harian : Rp. ${formatRupiah(tarif)}`)
  $('#myModal').find('input[name="idtukang"]').val(idtukang)

  if (kategori.length == 1) {
    $('#harga-borongan').remove()
    $('#borongan').attr('data-value', kategori[0].split('|')[1])
    $('#borongan').removeAttr('disabled')
    $('label[for="borongan"]').text(`Borongan ${kategori[0].split('|')[0]} : Rp. ${formatRupiah(kategori[0].split('|')[1])}`)
  }
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



$('body').on('click', 'input[name="konsumsi"]', function (e) {
  let pekerjaan = $('input[name="pembayaran"]:checked').val()

  if (pekerjaan == undefined) {
    alert('Pastikan Anda sudah memilih jenis pekerjaan = Harian atau Borongan!')
    return e.preventDefault()
  }

  if (pekerjaan == 'harian') {
    let tarif = parseInt($('#harian').data('value'))
    if (this.value == 'disediakan') {
      tarif = tarif - 25000
      $('label[for="harian"]').text(`Harian : Rp. ${formatRupiah(tarif)}`)
      $('input[name="tarif"]').val(tarif)
    } else {
      $('label[for="harian"]').text(`Harian : Rp. ${formatRupiah(tarif)}`)
      $('input[name="tarif"]').val(tarif)
    }
  } else {
    $('input[name="tarif"]').val(parseInt($('input[name="pembayaran"]:checked').data('value')))
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



$('.order-ditolak').on('click', function (e) {
  e.preventDefault()
  Swal.fire({
    title: $(this).data('title'),
    html: $(this).data('pesan'),
    icon: $(this).data('icon'),
    confirmButtonText: 'Dibaca',
    showCancelButton: true,
    cancelButtonText: 'Kembali',
  }).then((result) => {
    if (result.isConfirmed) {
      $.post({
        url: location.origin + '/web/dibaca',
        data: { id: $(this).data('id') },
        dataType: 'json',
        success: function (res) {
          window.location.reload()
        }
      })
    }
  })
})

$('#cari-tukang').find('input').on('keyup', function () {
  if (this.value.length > 0) {
    $(this).next().find('#search').show()
  } else {
    $(this).next().find('#search').hide()
  }
})
$('#cari-tukang').find('#clear').on('click', function (e) {
  e.preventDefault()
  $(this).parent().prev().val('')
  $(this).prev().hide()
  let urlArr = location.href.split('/')
  let newUrlArr = urlArr.slice(0, 5)
  let url = newUrlArr.join('/')
  location.href = url
})
$('#cari-tukang').find('#search').on('click', function (e) {
  e.preventDefault()
  let word = $(this).parent().prev().val()
  let urlArr = location.href.split('/')
  let newUrlArr = urlArr.slice(0, 5)
  let url = newUrlArr.join('/') + '/' + word
  location.href = url
})
$('#filter-kategori').on('change', function () {
  const kategori = $(this).val().replace(' ', '-')
  if (kategori == 'all') {
    $('.kategori').removeClass('d-none')
  } else {
    $('.kategori').removeClass('d-none')
    $('.kategori').addClass('d-none')
    $(`.${kategori}`).removeClass('d-none')
  }
})

// #PUSHER
Pusher.logToConsole = false
let pusher = new Pusher('f3ddd543d7a028f9e4b9', {
  cluster: 'ap1'
})

let channel = pusher.subscribe('my-channel')
// Surat Masuk
channel.bind('chat', function (data) {
  if ($('#user-id').length) {
    let iduser = $('#user-id').data('value')
    if (iduser == data.userid) {
      $(`.tukang-${data.tukangid}`).html('Hubungi tukang <span class="badge badge-info">ada pesan</span>')
    }
  }
})
// #END-PUSHER