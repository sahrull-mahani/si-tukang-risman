$(document).ready(function () {
    $('#search').on('submit', function(e) {
        e.preventDefault()
        let key = $('input[name=keyword]').val()
        if (key == 0) {
            alert("tidak bleh kososng")
        }
    })
})