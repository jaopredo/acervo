$('form').on('submit', function (event) {
    $('form button[type="submit"]').attr('disabled', true)
    $('form .loader').show()
})
