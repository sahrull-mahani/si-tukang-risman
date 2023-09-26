$('.rent').on('click', function (e) {
  e.preventDefault()
  let href = $(this).attr('href')
  Swal.fire({
    title: 'Anda yakin?',
    text: 'Pastikan anda sudah login terlebih dahulu, jika sudah anda bisa langsung rental tukang yang dipilih',
    icon: 'question',
    showCancelButton: true,
    confirmButtonText: 'Ya',
  }).then((result) => {
    /* Read more about isConfirmed, isDenied below */
    if (result.isConfirmed) {
      location.href = location.origin + href
    }
  })
})

$('.form-done').on('submit', function(e) {
  e.preventDefault()
  $.ajax({
    url: location.origin + $(this).attr('action'),
    type: 'POST',
    data: $(this).serialize(),
    success: function(res) {
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